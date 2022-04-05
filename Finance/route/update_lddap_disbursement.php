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

$user = $_SESSION['currentuser'];
$stat = 'Draft';	

$lddap_number = $_POST['lddap_number'];
$lddap_amount = $_POST['lddap_amount'];

if (isset($_POST['btn_paid'])) 
{
	$stat = 'Disbursed';
}



if (count($lddap_number) < 1) 
{
	$_SESSION['toastr'] = $notif->addFlash('warning', 'Please select LDDAP!', 'Error');
	header('location:../../accounting_disbursement_create.php?id='.$_GET['id'].'&lddap='.$_GET['lddap_id']);
}
else
{
	for ($i=0; $i < count($lddap_number); $i++) 
	{ 
		$data = [
			'id' 					=> $_GET['id'],
			'lddap_id' 				=> $_GET['lddap_id'],
			'dv_number' 			=> $_POST['dv_number'],
			'dv_date' 				=> date("Y-m-d H:i:s",strtotime($_POST['dv_date'])),
			'remarks' 				=> $_POST['remarks'],
			'lddap_amount' 			=> $pay->removeComma($lddap_amount[$i]),
			'lddap_number' 			=> $lddap_number[$i],
			'status' 				=> $stat
		];

		// $pay->returnLddapAmount($data);
		$am->updateDv($data);
		if ($stat == 'Disbursed') 
		{
			$pay->updateLddapAmount($data);
		}
	}

	$_SESSION['toastr'] = $notif->addFlash('success', 'Disbursement Successfully Updated!', 'Success');
	if ($stat == 'Disbursed') 
	{
		header('location:../../accounting_disbursement_create.php?id='.$data['id'].'&lddap_id='.$data['lddap_number'].'&status=Paid');
	}
	else
	{
		header('location:../../accounting_disbursement_create.php?id='.$data['id'].'&lddap_id='.$data['lddap_number'].'&status=Draft');
	}

}




