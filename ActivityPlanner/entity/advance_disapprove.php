<?php
session_start();
date_default_timezone_set('Asia/Manila');

require_once '../manager/Notification.php';
require_once "../../connection.php";


$notif = new Notification();

$actn_checker = $_POST['actn_checker'];
$task_status = $_POST['task_status'];

$start_date = new DateTime();
$currentuser = $_SESSION['currentuser']; 
$user = $_SESSION['complete_name'];

foreach ($actn_checker as $id => $checker) {
    $data = ['id'=>$id, 'status' => 'Disapprove', 'user' => $user];
    $result = updateEventSubtask($conn, 'event_subtasks', $data);   
    $notif_update = updateNotif($conn, 'event_notif', $data);
    $notif->addNew($conn, 'event_notif', $currentuser, $data, 'Disapprove');
}

$_SESSION['toastr'] = $notif->addFlash('success', 'Task has been set to To Do status', 'Add Task');

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
        $sql .= "approver = '".$data['user']."', ";
    }

    $sql .= "status = '".$status."' ";
    $sql .= "WHERE id = ".$data['id']."";

    $result = mysqli_query($conn, $sql);

    return $result;    
}

function getRejected($conn,$table,$id) {
    $sql = "SELECT task_counter FROM event_subtasks WHERE id = ".$id."";

    $result = mysqli_query($conn, $sql);
    $result = mysqli_fetch_array($result);

    return $result['task_counter'];    
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