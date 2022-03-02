<?php
session_start();
date_default_timezone_set('Asia/Manila');

require_once "../../Model/Connection.php";
require_once "../../Model/Obligation.php";
require_once "../../Model/FundSource.php";
require_once '../manager/BudgetManager.php';
require_once "../../ActivityPlanner/manager/Notification.php";
require_once "../../Model/History.php";

$ob = new Obligation();
$fs = new FundSource();
$bm = new BudgetManager();
$notif = new Notification();
$log = new History();
$is_valid = true;

$action_button = '';
$log_message = '';

$user = $_SESSION['currentuser'];
$id = $_POST['source_id'];
$fund_source = isset($_POST['fund_source']) ? $_POST['fund_source'] : '';
$status = 'updated';
$amount = isset($_POST['total_po_amount']) ? $bm->removeComma($_POST['total_po_amount']) : 0.00;
$dd = $ob->fetch($id);
$is_ob_submitted = $dd['is_submitted'];
$current_status = $_POST['status'];
$is_admin = false;
$obligation = $bm->getObligations($id);
$serial_no = $_POST['serial_no'];

if (isset($_POST['release'])) {
	if (isset($_POST['uacs'])) {
		foreach ($_POST['uacs'] as $key => $uacs) {
			$uacs = $bm->getSelectedUACSBalance($uacs);
			$amt = $bm->removeComma($_POST['amount'][$key]);

			$total_balance = $uacs['balance'] - $amt;
			$total_obligated = $uacs['obligated'] + $amt;
			
			if ($total_balance < 0) {
				$valid = false;
			}

			if ($total_obligated > $uacs['allotment']) {
				$valid = false;
			}
		}
	}
}

if (!$is_valid) {
	$_SESSION['toastr'] = $notif->addFlash('error', 'May problem sa UACS', 'Error');

	header('location:../../budget_obligation_edit.php?id='.$id);
}


if (in_array($user, [2668, 2702, 3316, 3320, 3319])) {
	$is_admin = true;
}

if (isset($_POST['po_no'])) {
	if ($bm->removeComma($_POST['po_amount']) > 0) {
		$amount = $bm->removeComma($_POST['po_amount']);
	}
}

$data = [
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
	if (!empty($obligation['obligated_by'])) {
		$status = Obligation::STATUS_OBLIGATED;
		$log_message = $serial_no.' Obligated';
	} elseif (!empty($obligation['received_by'])) {
		$status = Obligation::STATUS_RECEIVED;
		$log_message = 'Obligation '.$serial_no.' Received';
	} else {
		$status = Obligation::STATUS_SUBMITTED;
		$log_message = 'Obligation '.$serial_no.' Submitted';
	}
	$action_button = 'submit';
}

if (isset($_POST['receive'])) {
	$status = Obligation::STATUS_RECEIVED;
	$action_button = 'receive';
	$log_message = 'Obligation '.$serial_no.' Received';
}

if (isset($_POST['obligate'])) {
	$status = Obligation::STATUS_OBLIGATED;
	$action_button = 'obligate';
	$log_message =  $serial_no.' Obligated';
}

if (isset($_POST['release'])) {
	$status = Obligation::STATUS_RELEASED;

	if (isset($_POST['uacs'])) {
		foreach ($_POST['uacs'] as $key => $uacs_id) {
			$uacs = $bm->getSelectedUACSBalance($uacs_id);
			$amt = $bm->removeComma($_POST['amount'][$key]);

			$total_balance = $uacs['balance'] - $amt;
			$total_obligated = $uacs['obligated'] + $amt;
			
			$fs->updateUacs($uacs_id, $total_balance, $total_obligated);
		}
	}
	$action_button = 'release';
	$log_message = 'Obligation '.$serial_no.' Released';
}

if (isset($_POST['return'])) {
	$status = Obligation::STATUS_RETURNED;
	$action_button = 'release';
	$log_message = 'Obligation '.$serial_no.' Returned';
}

if ($is_admin AND $status == 'Submitted') {
	$ob->updateStatusAdmin($id, $user, 'Received');
	$action_button = 'submit';
	$log_message = 'Obligation '.$serial_no.' Submitted';
} else {
	if ($is_ob_submitted AND $status == 'updated') {
		$status = $current_status;
		$action_button = 'updated';
		$log_message = 'Obligation '.$serial_no.' Updated';
	}

	$ob->updateStatus($id, $user, $status);



}


$log->post_history($user, 1, $id, 0, 0, $action_button, $log_message);


$msg = 'Successfully '.strtolower($status).' obligation';

$_SESSION['toastr'] = $notif->addFlash('success', $msg, 'Update');

if (isset($_POST['save']) OR $status != 'updated') {
	header('location:../../budget_obligation_edit.php?id='.$id);
} else {
	header('location:../../budget_create_obligation.php');
}
