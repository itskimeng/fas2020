<?php
session_start();
date_default_timezone_set('Asia/Manila');

require_once "../../connection.php";
require_once "../manager/Notification.php";

// call instance of class
$notification = new Notification();

$id = $_GET['id'];
$result = $notification->markAsRead($conn, $id);

echo $result;
    