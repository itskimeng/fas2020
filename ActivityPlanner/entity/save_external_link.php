<?php
session_start();
date_default_timezone_set('Asia/Manila');

require_once "../../connection.php";
require_once "../manager/Notification.php";

$notif = new Notification();

$is_new = true;
$event_id = $_POST['event_id'];
$event_program = $_POST['event_program'];
$currentuser = $_SESSION['currentuser'];
$task_id = $_POST['task_id'];
$external_link = $_POST['external_link'];
$code = $_POST['code'];

$data = [
    'event_id' => $event_id,
    'event_program' => $event_program,
    'task_id' => $task_id,
	'external_link' => $external_link
];

$sql = "UPDATE event_subtasks SET external_link = '".$external_link."' WHERE id = ".$task_id."";
$result = mysqli_query($conn, $sql);


$_SESSION['toastr'] = $notif->addFlash('success', 'Successfully uploaded external link', $code);

header('location:../../base_planner_subtasks.html.php?event_planner_id='.$event_id.'&username='.$_SESSION["username"].'&division='.$_SESSION["division"].'');


