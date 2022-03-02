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

$user = $_SESSION['currentuser'];
$fund_source = isset($_POST['fund_source']) ? $_POST['fund_source'] : '';
$amount = isset($_POST['total_po_amount']) ? $bm->removeComma($_POST['total_po_amount']) : 0.00;

if (isset($_POST['po_no'])) {
	if ($bm->removeComma($_POST['po_amount']) > 0) {
		$amount = $bm->removeComma($_POST['po_amount']);
	}
}

$dd = [
	'type' 			=> isset($_POST['ob_type']) ? $_POST['ob_type'] : $_POST['hidden-ob_type'],
	'is_dfund' 		=> isset($_POST['dfunds']) ? true : false,
	'serial_no' 	=> $_POST['serial_no'],
	'po_id' 		=> isset($_POST['po_no']) ? $_POST['po_no'] : $_POST['hidden-po_no'],
	'supplier' 		=> isset($_POST['supplier']) ? $_POST['supplier'] : $_POST['hidden-supplier'],
	'address' 		=> $_POST['address'],
	'amount' 		=> $amount,
	'purpose' 		=> $_POST['particulars'],
	'created_by'	=> $user
];

$id = $ob->post($dd);

if (!empty($fund_source)) {
	foreach ($fund_source as $key => $source) {
		$entry = [
			'ob_id' 		=> $id,
			'fund_source' 	=> $source,
			'uacs'			=> $_POST['uacs'][$key],
			'amount'		=> $bm->removeComma($_POST['amount'][$key])
		];
		
		$ob->postEntries($entry);
	}
}


$log->post_history($user, 1, $id, 0, 0, "save", "Created New Obligation Amounting ₱".$amount);

$_SESSION['toastr'] = $notif->addFlash('success', 'Successfully created new obligation', 'Add New');

if (isset($_POST['save'])) {
	header('location:../../budget_obligation_edit.php?id='.$id);
} else {
	header('location:../../budget_create_obligation.php');
}
