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

$pay_id = $_POST['pay_id'];
$dvid = $_POST['dvid'];
$obid = $_POST['obid'];
$date_created = $_POST['lddap_date'];

$today = new DateTime($date_created);
$current = new DateTime();

$data = [
	'dvid' 				=> $_POST['dvid'],
	'acct_no' 			=> $_POST['source_no'],
	'date_created' 		=> $_POST['lddap_date'],
	'lddap' 			=> $_POST['lddap'],
	'link' 				=> $_POST['link'],
	'remarks' 			=> $_POST['remarks'],
	'current' 			=> $current,
	'today' 			=> $today
]; 



if (isset($_POST['save'])) 
{
	$parent = $pay->insert($data);

	if (!empty($dvid)) {
		foreach ($dvid as $key => $dv) {
			$pay->insertEntry($parent, $dv, $obid[$key]);
		}
	}
	$_SESSION['toastr'] = $notif->addFlash('success', 'Successfully Uploaded Payment', 'Add');
	// header('location:../../cash_payment_new.php?id='.$parent);
}
else if (isset($_POST['update'])) 
{
	$parent = $pay->update($pay_id, $data);

	foreach ($dvid as $key => $dv) {
		$pay->deleteEntry($dv);
	}

	if (!empty($dvid)) {
		foreach ($dvid as $key => $dv) {
			$pay->insertEntry($parent, $dv, $obid[$key]);
		}
	}

	$_SESSION['toastr'] = $notif->addFlash('success', 'Successfully Updated Payment', 'Update');
	// header('location:../../cash_payment_new.php?id='.$pay_id.'&status=Draft');
}
else 
{
	$_SESSION['toastr'] = $notif->addFlash('success', 'Successfully Paid Payment', 'Release');
}

