<?php
session_start();
date_default_timezone_set('Asia/Manila');

require_once '../manager/Entity.php';
require_once "../../connection.php";
require_once "../manager/Notification.php";

$event_id = isset($_POST['delete_event_id']) ? $_POST['delete_event_id'] : '';

// call instance of class
$entity = new Entity();
$notif = new Notification();

// clear
$task_counter = $entity->countTask($conn, $event_id);

if ($task_counter == 0 or empty($task_counter) or $task_counter == null) {
    $participants = $entity->clear($conn, 'event_collaborators', 'event_id', $event_id);
    $event = $entity->clear($conn, 'events','id', $event_id);
    
    if (!$event) {
        $event = mysqli_error($conn);
        $_SESSION['toastr'] = $notif->addFlash('error', 'A problem occured while submitting your data', 'Error');
    } else {
        $_SESSION['toastr'] = $notif->addFlash('success', 'Event has been deleted successfully', 'Success');
    }
} else {
    $_SESSION['toastr'] = $notif->addFlash('warning', 'The selected activity has ongoing tasks', 'Oops!');
}

header('location:../../base_activity_planner.html.php?division='.$_SESSION['division']);


    

    