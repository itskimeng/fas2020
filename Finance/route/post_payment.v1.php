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

$user = $_SESSION['currentuser'];
$today = new DateTime($date_created);
$current = new DateTime();

$data = [
	'acct_no' 			=> $_POST['source_no'],
	'date_created' 		=> $_POST['lddap_date'],
	'lddap' 			=> $_POST['lddap'],
	'link' 				=> $_POST['link'],
	'remarks' 			=> $_POST['remarks'],
	'current' 			=> $current,
	'today' 			=> $today
]; 


if (empty($dvid)) 
{
	$_SESSION['toastr'] = $notif->addFlash('warning', 'Please Select Disbursement Voucher', 'Warning');
	header('location:../../cash_payment_new.php');
}
else
{

	$parent = $pay->insert($data);

	$entries = [
		'lddap_id' 	 	 			=> $parent,
		'total_gross'  				=>$_POST['total_gross'],
		'x_total_dv_deduction'  	=>$_POST['x_total_dv_deduction'],
		'total_net_amount'  		=>$_POST['total_net_amount'],
		'x_total_ob_amount'  		=>$_POST['x_total_ob_amount'],
		'x_total_nta_amount'  		=>$_POST['x_total_nta_amount'],
		'x_total_nta_balance'  		=>$_POST['x_total_nta_balance'],
		'x_total_disbursed_amount'  =>$_POST['x_total_disbursed_amount'],
		'current' 				 	=> $current
	];
	$pay->insertLddapTotal($entries);

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
	header('location:../../cash_payment_new.php?id='.$parent);
}

