<?php
session_start();
date_default_timezone_set('Asia/Manila');

require_once "../../Model/Connection.php";
require_once "../../Model/Payment.php";
require_once '../manager/CashManager.php';
require_once "../../ActivityPlanner/manager/Notification.php";

$pay = new Payment();
$cm = new CashManager();
$notif = new Notification();

$id = $_GET['id'];

$dvid = $_POST['dvid'];
$obid = $_POST['obid'];
$date_created = $_POST['lddap_date'];

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
}
else
{
	$pay->update($id, $data);

	$delete = $pay->deleteEntry($id);

	if (!empty($dvid)) {
		foreach ($dvid as $key => $dv) {
			$pay->insertEntry($id, $dv, $obid[$key]);
		}
	}

	$_SESSION['toastr'] = $notif->addFlash('success', 'Successfully Update Payment', 'Update');
}




header('location:../../cash_payment_new.php?id='.$id.'&status=Draft');
