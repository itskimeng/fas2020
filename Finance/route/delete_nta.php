<?php
session_start();
date_default_timezone_set('Asia/Manila');

require_once "../../Model/Connection.php";
require_once "../../ActivityPlanner/manager/Notification.php";
require_once "../../connection.php";

$notif = new Notification();

$user = $_SESSION['currentuser'];

$id = $_GET['id'];

$sql = ' DELETE FROM `tbl_nta` WHERE `id` = '.$id.' ';
$exec = $conn->query($sql);

$_SESSION['toastr'] = $notif->addFlash('success', 'Successfully deleted NTA/NCA', 'Delete');

header('location:../../accounting_nta.php');
