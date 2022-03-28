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

$id = $_GET['id'];

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
}
else
{
	$pay->update($id, $data);

	$delete = $pay->deleteEntry($id);
	
	if (!empty($ne_id)) {
		foreach ($ne_id as $key => $ne) {
			echo $pay->insertEntry($id, $dvid[$key], $obid[$key], $ne);
		}
		$log->post_history($user, 3, $obid[$key], $dv, $id, "update", "Successfully Updated LDDAP: ".$data['lddap']);
	}


	$_SESSION['toastr'] = $notif->addFlash('success', 'Successfully Update Payment', 'Update');
}




header('location:../../cash_payment_new.php?id='.$id.'&status=Draft');
