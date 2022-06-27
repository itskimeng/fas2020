<?php
session_start();
date_default_timezone_set('Asia/Manila');

require_once "../../Model/Connection.php";
require_once "../../Model/FundSource.php";
require_once '../manager/BudgetManager.php';
require_once "../../ActivityPlanner/manager/Notification.php";
require_once "../../Model/Procurement.php";

$fs = new FundSource();
$bm = new BudgetManager();
$notif = new Notification();
$pr = new Procurement();

$user = $_SESSION['currentuser'];
$id = $_POST['id'];
$code = $_POST['code'];


if (!empty($code)) {
	$sql = "UPDATE pr SET availability_code = '".$code."', stat = 2 WHERE id = $id";
    $getQry = $bm->db->query($sql);

    $_SESSION['toastr'] = $notif->addFlash('success', 'Successfully confirmed availability of funds', 'Update');
} else {
    $_SESSION['toastr'] = $notif->addFlash('error', 'Please input availability code!', 'Error');
}

// for tracking purchase request
$pr->insert('tbl_pr_history',
[
    'PR_ID'=>$id,
    'ACTION_DATE'=>date('Y-m-d H:i:s'),
    'ACTION_TAKEN' => Procurement::STATUS_RECEIVED_BY_BUDGET, 
    'ASSIGN_EMP'=>$user
]);
header('location:../../budget_obligation.php');

