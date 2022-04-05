<?php
session_start();
date_default_timezone_set('Asia/Manila');

require_once "../../Model/Connection.php";
require_once "../../Model/Payment.php";
require_once '../manager/CashManager.php';
require_once "../../ActivityPlanner/manager/Notification.php";
require_once "../../Model/History.php";

$pay = new Payment();
$cm = new CashManager();
$notif = new Notification();
$log = new History();

$ne_id = $_POST['ne_id'];
$dvid = $_POST['dvid'];
$obid = $_POST['obid'];
$date_created = $_POST['lddap_date'];
$nta_amount = $_POST['nta_amount'];
$nta_balance = $_POST['nta_balance'];
$disbursed_amount = $_POST['disbursed_amount'];
$ob_is_dfunds = $_POST['ob_is_dfunds'];
$ob_supplier = $_POST['ob_supplier'];

$user = $_SESSION['currentuser'];
$today = new DateTime($date_created);
$current = new DateTime();

$data = [
	'dv_no' 			=> $_POST['dvid'],
	'date_created' 		=> $_POST['lddap_date'],
	'lddap' 			=> $_POST['lddap'],
	'link' 				=> $_POST['link'],
	'remarks' 			=> $_POST['remarks'],
	'current' 			=> $current,
	'nta_amount' 		=> $nta_amount,
	'nta_balance' 		=> $nta_balance,
	'disbursed_amount' 	=> $disbursed_amount,
	'ob_is_dfunds' 		=> $ob_is_dfunds,
	'ob_supplier' 		=> $ob_supplier,
	'today' 			=> $today
]; 

if (empty($ne_id)) 
{
	$_SESSION['toastr'] = $notif->addFlash('warning', 'Please Select Disbursement Voucher | NTA/NCA', 'Warning');
	header('location:../../cash_payment_new.php');
}
else
{

	$parent = $pay->insert($data);

	if (!empty($ne_id)) {
		foreach ($ne_id as $key => $ne) {
			$pay->insertEntry($parent, $dvid[$key], $obid[$key], $ne);
		}
		$log->post_history($user, 3, $obid[$key], $dv, $parent, "received", "Successfully received your Disbursement Voucher.");
	}

	
	if (isset($_POST['paid'])) {
		$_SESSION['toastr'] = $notif->addFlash('success', 'Successfully Paid Payment', 'Release');
	} else {
		$_SESSION['toastr'] = $notif->addFlash('success', 'Successfully created new Payment', 'Add');
	} 
	header('location:../../cash_payment_new.php?id='.$parent.'&status=Draft');
}

