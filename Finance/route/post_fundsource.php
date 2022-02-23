<?php
session_start();
date_default_timezone_set('Asia/Manila');

require_once '../../Model/Connection.php';
require_once '../../Model/FundSource.php';
require_once '../manager/BudgetManager.php';
require_once "../../ActivityPlanner/manager/Notification.php";

$fs = new FundSource();
$bm = new BudgetManager();
$user = $_SESSION['currentuser'];
$notif = new Notification();


$dd = [
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

$parent = $fs->post($dd);

$expense_class = $_POST['expense_class'];
foreach ($expense_class as $key => $class) {
	$data = [
		'source_id' 		=> $parent,
		'is_lock'			=> false,
		'expense_class' 	=> $class,
		'uacs'				=> $_POST['uacs'][$key],
		'expense_group'		=> $_POST['group'][$key],
		'allotment_amount'	=> $bm->removeComma($_POST['amount'][$key]),
		'obligated_amount'	=> $bm->removeComma($_POST['obligated_amt'][$key]),
		'balance'			=> $bm->removeComma($_POST['balance'][$key]),
	];
	
	$fs->postEntry($data);
}

$_SESSION['toastr'] = $notif->addFlash('success', 'Successfully created new fund source', 'Add New');

if (isset($_POST['save'])) {
	header('location:../../budget_fundsource_edit.php?source='.$parent);
} else {
	header('location:../../budget_fundsource_create.php');

}
