<?php
session_start();
date_default_timezone_set('Asia/Manila');

require_once '../../Model/Connection.php';
require_once '../../Model/ObjectCodes.php';
require_once '../manager/BudgetManager.php';
require_once "../../ActivityPlanner/manager/Notification.php";

$oc = new ObjectCodes();
$bm = new BudgetManager();
$user = $_SESSION['currentuser'];
$division = $_SESSION['division'];
$notif = new Notification();

$dd = [
	'code'	=> $_POST['obc'],
	'uacs' 	=> $_POST['uacs']
]; 

$oc->post($dd);

$_SESSION['toastr'] = $notif->addFlash('success', 'Successfully created new Object Code', 'Add New');

header('location:../../budget_fundsource_objectcode.php?division='.$division);
