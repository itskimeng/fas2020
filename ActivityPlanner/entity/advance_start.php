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
    $data = ['id'=>$id, 'status' => 'Created', 'user' => $user];
    $result = updateEventSubtask($conn, 'event_subtasks', $data);
    $notif->addNew($conn, 'event_notif', $currentuser, $data);   

}

$_SESSION['toastr'] = $notif->addFlash('success', 'Task has been updated successfully.', 'Add Task');

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