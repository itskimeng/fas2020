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


$dvid = $_POST['dvid'];
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

if (isset($_POST['paid'])) 
{
	$pay->update($dvid, $data);
	$pay->pay_entry($dvid);

	$_SESSION['toastr'] = $notif->addFlash('success', 'Successfully Paid Payment', 'Release');
}
else
{
	$pay->update($dvid, $data);
	echo $pay->setDVTrigger($dvid);

	$_SESSION['toastr'] = $notif->addFlash('success', 'Successfully Updated Payment', 'Update');
}


header('location:../../cash_payment.php');
