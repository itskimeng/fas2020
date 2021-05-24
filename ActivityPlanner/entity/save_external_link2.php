<?php
session_start();
date_default_timezone_set('Asia/Manila');

require_once "../../connection.php";
require_once "../manager/Notification.php";

$notif = new Notification();

$id = $_GET['id'];
$elink = $_GET['elink'];
$code = $_GET['code'];

$sql = "UPDATE event_subtasks SET external_link = '".$elink."' WHERE id = $id";
$result = mysqli_query($conn, $sql);

echo $result;

// $_SESSION['toastr'] = $notif->addFlash('success', 'Successfully uploaded external link', $code);


