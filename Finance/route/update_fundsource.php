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
$source_id = $_POST['source_id'];
$expense_class = $_POST['expense_class'];

if (isset($_POST['lock'])) {
	$fs->setUnlock($source_id);
	header('location:../../budget_fundsource_edit.php?source='.$source_id);
	exit();
} elseif (isset($_POST['unlock'])) {
	$fs->setLock($source_id);
	header('location:../../budget_fundsource_edit.php?source='.$source_id);
	exit();
}


$data = [
	'source' 					=> $_POST['source_no'],
	'name' 						=> $_POST['fund_name'],
	'ppa' 						=> $_POST['ppa'],
	'legal_basis' 				=> $_POST['legal_basis'],
	'particulars' 				=> $_POST['particulars'],
	'total_allotment_amount'	=> $bm->removeComma($_POST['total_amount']),
	'total_allotment_obligated'	=> $bm->removeComma($_POST['total_obligated']),
	'total_balance' 			=> $bm->removeComma($_POST['total_balance']),
	'created_by' 				=> $user
]; 

// call update
$parent = $fs->update($data, $source_id);
// clear entries 
$fs->removeUnusedEntry($source_id);

if (isset($_POST['is_lock2'])) {
	foreach ($_POST['is_lock2'] as $key => $lock) {
		$val = $lock == 'true' ? true : false;
		$fs->updateEntryStatus($key, $val);
	}
}

foreach ($expense_class as $key => $class) {
	$entry = [
		'source_id' 		=> $source_id,
		'is_lock' 			=> $_POST['is_lock'][$key] == 'true' ? true : false,
		'expense_class' 	=> $class,
		'uacs'				=> $_POST['uacs'][$key],
		'expense_group'		=> $_POST['group'][$key],
		'allotment_amount'	=> $bm->removeComma($_POST['amount'][$key]),
		'obligated_amount'	=> $bm->removeComma($_POST['obligated_amt'][$key]),
		'balance'			=> $bm->removeComma($_POST['balance'][$key]),
	];
	
	$fs->postEntry($entry);
}

$_SESSION['toastr'] = $notif->addFlash('success', 'Successfully updated fund source', 'Update');

if (isset($_POST['save'])) {
	header('location:../../budget_fundsource_edit.php?source='.$source_id);
} else {
	header('location:../../budget_fundsource_create.php');

}
