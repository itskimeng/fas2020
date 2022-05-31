<?php
session_start();
date_default_timezone_set('Asia/Manila');

require_once "../../Model/Connection.php";
require_once "../../Model/Obligation.php";
require_once '../manager/BudgetManager.php';
require_once "../../ActivityPlanner/manager/Notification.php";
require_once "../../Model/History.php";
require_once "../manager/AccountingManager.php";


$ob = new Obligation();
$bm = new BudgetManager();
$notif = new Notification();
$log = new History();
$am = new AccountingManager();

$id = $_GET['id'];
$dv_id = $_GET['dv_id'];
$status = 'Returned';
$remarks = isset($_GET['remarks']) ? $_GET['remarks'] : ''; 
$user = $_SESSION['currentuser'];

if ($dv_id != '') 
{
	$am->returnDisbursement($dv_id);
	$am->removeDv($dv_id);
}



$ob->updateStatus($id, $user, $status, $remarks);


$log->post_history($user, 1, $id, 0, 0, strtolower($status), 'Successfully '.strtolower($status).' obligation');


$_SESSION['toastr'] = $notif->addFlash('success', 'Successfully '.strtolower($status).' obligation', 'Update');

header('location:../../accounting_disbursement.php');



