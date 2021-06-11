<?php
session_start();
date_default_timezone_set('Asia/Manila');

require_once '../manager/Notification.php';
require_once "../../connection.php";

// call instance of class
$actn_checker = $_POST['actn_checker'];

$notif = new Notification();

foreach ($actn_checker as $id => $checker) {
    $status = fetchTaskStatus($conn, 'event_subtasks', $id);

    if (($status == 'Draft') OR ($status == 'Created')) {
        $result = removeCollaborator($conn, 'event_subtasks', $id);
        $notif = updateNotif($conn, 'event_notif', $id);
    }
}

$_SESSION['toastr'] = $notif->addFlash('success', 'Tasks has been deleted successfully.', 'Add Task');


function removeCollaborator($conn,$table, $id) {
    $sql = "DELETE FROM $table WHERE id = $id";
    
    $result = mysqli_query($conn, $sql);

    return $result;    
}

function fetchTaskStatus($conn,$table,$id) {
    $sql = "SELECT status FROM $table WHERE id = $id";

    $emp = mysqli_query($conn, $sql);
    $result = mysqli_fetch_assoc($emp);
    
    return $result['status'];    
}

function updateNotif($conn,$table,$task_id) {
    $sql = "UPDATE $table SET is_read = TRUE WHERE task_id = $task_id ";

    $result = mysqli_query($conn, $sql);

    return $result;    
}   
