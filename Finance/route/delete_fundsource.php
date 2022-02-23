<?php
session_start();
date_default_timezone_set('Asia/Manila');

require_once "../../Model/Connection.php";
require_once "../../Model/FundSource.php";
require_once "../../ActivityPlanner/manager/Notification.php";

$fs = new FundSource();
$notif = new Notification();

$user = $_SESSION['currentuser'];
$source_id = $_POST['source_id'];
$source_code = $_POST['source_code'];

$fs->delete($source_id);
$fs->clearEntry($source_id);

$_SESSION['toastr'] = $notif->addFlash('success', 'Fund Source has been successfully deleted.', 'Delete');


header('location:../../budget_fundsource.php');
