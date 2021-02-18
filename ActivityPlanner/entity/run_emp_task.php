<?php
session_start();
date_default_timezone_set('Asia/Manila');

require_once "../../connection.php";
    
    $event_id = $_GET['id'];
    $start_date = new DateTime();
    $status = ucwords($_GET['status']);
    $is_new = isset($_GET['is_new']) ? $_GET['is_new'] : '';   


    $data = ['id'=>$event_id, 'status' => $status];

    if ($status == "Ongoing") {
        $is_new = checkStatusIfNew($conn, 'event_subtasks', $event_id);
        if ($is_new) {
            $is_startdate = true;
            $data = ['id'=>$event_id, 'start_date'=>$start_date->format('Y-m-d H:i:s'), 'status' => $status];
            
            $result = updateEventSubtask($conn, 'event_subtasks', $data, true);   
        } else {
            $result = updateEventSubtask($conn, 'event_subtasks', $data);   
        }
    } else {
        $result = updateEventSubtask($conn, 'event_subtasks', $data);
        if ($is_new OR $start_date = "Done") {
            $notif = insertNotif($conn, 'event_notif', $data);   
        }
        

        if (!$result) {
            $result = mysqli_error($conn);
            flashMessage("A problem occured while submitting your data", "danger", "ban");
        } else {
            flashMessage("Event has been updated successfully", "success", "check");
        }
    }

    function insertNotif($conn,$table,$data) {
        $tasks = fetchLatestInsert($conn, 'event_subtasks', $data['id']);
        $date = new DateTime();

        $date = $date->format('Y-m-d H:i:s');

        $sql = "INSERT INTO $table (planner_id, task_id, emp_id, message, date_created, code) 
                VALUES(".$tasks['event_id'].", ".$tasks['id'].", ".$tasks['emp_id'].", '".$tasks['message']."', '".$date."', '".$tasks['code']."')";

        $result = mysqli_query($conn, $sql);

        return $result;    
    }

    function fetchLatestInsert($conn,$table, $id) {
        $sql = "SELECT id, event_id, emp_id, title, code FROM $table WHERE id = $id";
        $data = [];

        $query = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_assoc($query)) {
            $data = [
                'id' => $row['id'],
                'event_id' => $row['event_id'],
                'emp_id' => $row['emp_id'],
                'message' => $row['title'],
                'code' => $row['code']
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

    function flashMessage($message="", $type="success") {
        $notification = [];

        $notification = [
            'message' => $message,
            'type' => $type,
            'icon' => $type == 'ban' ? 'ban' : 'check',
            'header' => $type == 'ban' ? 'Error' : 'Success'
        ];

        $_SESSION['alert'] = $notification;

        return 0;
    }  

