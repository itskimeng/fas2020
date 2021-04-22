<?php
session_start();
date_default_timezone_set('Asia/Manila');

require_once "../manager/FlashMessage.php";
require_once "../manager/Notification.php";
require_once "../../connection.php";
    
    $task_id = $_POST['id'];
    $start_date = new DateTime();
    $status = ucwords($_POST['status']);
    $is_new = isset($_POST['is_new']) ? $_POST['is_new'] : '';  
    $currentuser = $_SESSION['currentuser']; 

    $data = ['id'=>$task_id, 'status' => $status];
    
    // call instance of class 
    $notif = new Notification();
    $flash = new FlashMessage();

    // applied only in Personnel Workspace
    if ($status == "Ongoing") {
        $is_new = checkStatusIfNew($conn, 'event_subtasks', $task_id);
        if ($is_new) {
            $is_startdate = true;
            $data = ['id'=>$task_id, 'start_date'=>$start_date->format('Y-m-d H:i:s'), 'status' => $status];
            
            $result = updateEventSubtask($conn, 'event_subtasks', $data, true);   
        } else {
            $result = updateEventSubtask($conn, 'event_subtasks', $data);   
        }
        $notif = updateNotif($conn, 'event_notif', $data);
    } else {
        // update the status of task
        $result = updateEventSubtask($conn, 'event_subtasks', $data);

        if ($is_new === 'true' OR $is_new === true) {
            $notif = $notif->addNew($conn, 'event_notif', $currentuser, $data);   
        } elseif ($status == "For Checking") {
            $notif = $notif->addNew($conn, 'event_notif', $currentuser, $data);   
        } elseif (in_array($status, ['Done', 'Disapprove'])) {
            $notif_update = updateNotif($conn, 'event_notif', $data);
            $notif = $notif->addNew($conn, 'event_notif', $currentuser, $data, $status);   
        } else {
            $notif = updateNotif($conn, 'event_notif', $data);
        } 
    }    

    if (!$result) {
        $result = mysqli_error($conn);
        $flash->generateNew("A problem occured while submitting your data", "danger", "ban");
    } else {
        $flash->generateNew("Task has been updated successfully", "success", "check");
    }

    function updateNotif($conn,$table,$data) {
        $tasks = fetchLatestInsert($conn, 'event_subtasks', $data['id']);

        $sql = "UPDATE $table SET is_read = TRUE WHERE planner_id = ".$tasks['planner_id']." AND task_id = ".$tasks['task_id']." ";

        $result = mysqli_query($conn, $sql);

        return $result;    
    }

    function fetchLatestInsert($conn,$table, $id) {
        $sql = "SELECT id, event_id, emp_id, title, code, status, posted_by FROM $table WHERE id = $id";
        $data = [];

        $query = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_assoc($query)) {
            $data = [
                'planner_id' => $row['event_id'],
                'task_id' => $row['id'],
                'emp_id' => $row['emp_id'],
                'message' => $row['title'],
                'code' => $row['code'],
                'status' => $row['status'],
                'posted_by' => $row['posted_by']
            ];
        }  


        return $data;    
    } 

    function checkStatusIfNew($conn,$table,$id) {
        
        $sql = "SELECT is_new FROM event_subtasks WHERE id = ".$id."";

        $result = mysqli_query($conn, $sql);
        $result = mysqli_fetch_array($result);

        return $result['is_new'];    
    } 

    function getRejected($conn,$table,$id) {
        
        $sql = "SELECT task_counter FROM event_subtasks WHERE id = ".$id."";

        $result = mysqli_query($conn, $sql);
        $result = mysqli_fetch_array($result);

        return $result['task_counter'];    
    } 

    function updateEventSubtask($conn,$table,$data,$is_startdate=false) {
        $status = $data['status'];
        $date_end = new DateTime();

        $sql = "UPDATE ".$table." SET ";
        if ($is_startdate) {
            $sql .= " date_start = '".$data['start_date']."', ";
            $sql .= " is_new = FALSE, ";
        }

        if ($data['status'] == "Disapprove") {
            $status = "Created";
            $count = 1 + getRejected($conn,$table,$data['id']);
        
            $sql .= "task_counter = '".$count."', ";
        }

        if ($data['status'] == "Done") {
            $sql .= "date_end = '".$date_end->format('Y-m-d H:i:s')."', ";
        }

        $sql .= "status = '".$status."' ";
        $sql .= "WHERE id = ".$data['id']."";

        $result = mysqli_query($conn, $sql);

        return $result;    
    } 