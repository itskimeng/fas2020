<?php
session_start();
date_default_timezone_set('Asia/Manila');

require_once "../../Model/Connection.php";
require_once "../../Model/Obligation.php";
require_once '../manager/BudgetManager.php';
require_once "../../ActivityPlanner/manager/Notification.php";

$ob = new Obligation();
$bm = new BudgetManager();
$notif = new Notification();

$user = $_SESSION['currentuser'];
$id = $_POST['source_id'];
$fund_source = isset($_POST['fund_source']) ? $_POST['fund_source'] : '';
$status = 'updated';

$data = [
	'type' 			=> $_POST['ob_type'],
	'is_dfund' 		=> isset($_POST['dfunds']) ? true : false,
	'serial_no' 	=> $_POST['serial_no'],
	'po_id' 		=> $_POST['po_no'],
	'supplier' 		=> isset($_POST['supplier']) ? $_POST['supplier'] : $_POST['hidden-supplier'],
	'address' 		=> $_POST['address'],
	'amount' 		=> isset($_POST['po_amount']) ? $bm->removeComma($_POST['po_amount']) : 0.00,
	'purpose' 		=> $_POST['particulars'],
	'created_by'	=> $user
]; 

$ob->update($data, $id);
// clear entries 
$ob->clearEntry($id);

if (!empty($fund_source)) {
	foreach ($fund_source as $key => $source) {
		$entry = [
			'ob_id' 		=> $id,
			'fund_source' 	=> $source,
			'mfo_ppa'		=> $_POST['ppa'][$key],
			'uacs'			=> $_POST['uacs'][$key],
			'amount'		=> $bm->removeComma($_POST['amount'][$key])
		];
		
		$ob->postEntries($entry);
	}
}

if (isset($_POST['submit'])) {
	$status = Obligation::STATUS_SUBMITTED;
}

if (isset($_POST['receive'])) {
	$status = Obligation::STATUS_RECEIVED;
}

if (isset($_POST['obligate'])) {
	$status = Obligation::STATUS_OBLIGATED;
}

if (isset($_POST['release'])) {
	$status = Obligation::STATUS_RELEASED;
}

if (isset($_POST['return'])) {
	$status = Obligation::STATUS_RETURNED;
}

$ob->updateStatus($id, $user, $status);

$msg = 'Successfully '.strtolower($status).' obligation';

$_SESSION['toastr'] = $notif->addFlash('success', $msg, 'Update');

if (isset($_POST['save']) OR $status != 'updated') {
	header('location:../../budget_obligation_edit.php?id='.$id);
} else {
	header('location:../../budget_create_obligation.php');
}
