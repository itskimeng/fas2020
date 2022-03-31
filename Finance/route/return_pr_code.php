<?php
session_start();
date_default_timezone_set('Asia/Manila');

require_once "../../Model/Connection.php";
require_once "../../Model/FundSource.php";
require_once '../manager/BudgetManager.php';
require_once "../../ActivityPlanner/manager/Notification.php";

$fs = new FundSource();
$bm = new BudgetManager();
$notif = new Notification();

$user = $_SESSION['currentuser'];
$id = $_POST['id'];
$reason = $_POST['reason'];


if (!empty($reason)) {
	$sql = "UPDATE pr SET stat = 14, reason = '".$reason."' WHERE id = $id";

    $getQry = $bm->db->query($sql);

    $_SESSION['toastr'] = $notif->addFlash('success', 'Successfully returned Purchase Request', 'Update');
} else {
    $_SESSION['toastr'] = $notif->addFlash('error', 'Please input reason!', 'Error');
}

header('location:../../budget_obligation.php');

