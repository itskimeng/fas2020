<?php
session_start();
date_default_timezone_set('Asia/Manila');

require_once "../../Model/Connection.php";
require_once "../../ActivityPlanner/manager/Notification.php";
require_once "../../connection.php";
require_once "../../Model/History.php";
require_once "../../Model/Payment.php";
require_once "../manager/AccountingManager.php";

$notif = new Notification();
$log = new History();
$am = new AccountingManager();
$pay = new Payment();
$stat = 'Draft';	

$user = $_SESSION['currentuser'];

$lddap_number = $_POST['lddap_number'];
$lddap_amount = $_POST['lddap_amount'];

if (isset($_POST['btn_paid'])) 
{
	$stat = 'Disbursed';
}

if (count($lddap_number) < 1) 
{
	$_SESSION['toastr'] = $notif->addFlash('warning', 'Please select LDDAP!', 'Error');
	header('location:../../accounting_disbursement_create.php');
}
else
{
	for ($i=0; $i < count($lddap_number); $i++) 
	{ 
		$data = [
			'dv_number' 			=> $_POST['dv_number'],
			'dv_date' 				=> $_POST['dv_date'],
			'remarks' 				=> $_POST['remarks'],
			'lddap_amount' 			=> $lddap_amount[$i],
			'lddap_number' 			=> $lddap_number[$i],
			'status'				=> $stat
		];

		$parent = $am->createDv($data);
		if ($stat == 'Disbursed') 
		{
			$pay->updateLddapAmount($data);
		}
	}
	header('location:../../accounting_disbursement_create.php?id='.$parent.'&lddap_id='.$data['lddap_number']);
}




