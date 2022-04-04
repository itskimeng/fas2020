<?php
session_start();
date_default_timezone_set('Asia/Manila');

require_once "../../Model/Connection.php";
require_once "../../ActivityPlanner/manager/Notification.php";
require_once "../../connection.php";

$notif = new Notification();

$user = $_SESSION['currentuser'];

$id = $_POST['id'];

$sql = ' UPDATE `tbl_nta` SET is_lock = false WHERE `id` = '.$id.' ';

$exec = $conn->query($sql);


// $_SESSION['toastr'] = $notif->addFlash('success', 'Successfully Unlocked NTA/NCA', 'Locked');

header('location:../../accounting_nta_update.php?getid='.$id.'&lock=0');
