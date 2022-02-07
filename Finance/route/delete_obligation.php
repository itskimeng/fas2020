<?php
session_start();
date_default_timezone_set('Asia/Manila');

require_once "../../Model/Connection.php";
require_once "../../Model/Obligation.php";
require_once "../../ActivityPlanner/manager/Notification.php";

$ob = new Obligation();
$notif = new Notification();

$user = $_SESSION['currentuser'];
$source_id = $_POST['source_id'];
$source_code = $_POST['source_code'];

$ob->delete($source_id);
$ob->clearEntry($source_id);

$_SESSION['toastr'] = $notif->addFlash('success', $source_code.' has been successfully deleted.', 'Delete');

header('location:../../budget_obligation.php');
