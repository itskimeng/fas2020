<?php
session_start();
date_default_timezone_set('Asia/Manila');

require_once "../../Model/Connection.php";
require_once "../../Model/Obligation.php";
require_once '../manager/BudgetManager.php';
require_once "../../ActivityPlanner/manager/Notification.php";
require_once "../../Model/History.php";

$ob = new Obligation();
$bm = new BudgetManager();
$notif = new Notification();
$log = new History();

$id = $_GET['id'];
$status = $_GET['status'];
$remarks = isset($_GET['remarks']) ? $_GET['remarks'] : ''; 
$user = $_SESSION['currentuser'];

$ob->updateStatus($id, $user, $status, $remarks);


$log->post_history($user, 1, $id, 0, 0, strtolower($status), 'Successfully '.strtolower($status).' obligation');


$_SESSION['toastr'] = $notif->addFlash('success', 'Successfully '.strtolower($status).' obligation', 'Update');

if ($_GET['edit']) {
	header('location:../../budget_obligation_edit.php?id='.$id);
} else {
	header('location:../../budget_obligation.php');
}


