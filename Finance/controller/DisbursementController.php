<?php
date_default_timezone_set('Asia/Manila');
session_start();

require_once 'Model/Connection.php';
require_once 'Finance/manager/AccountingManager.php';

$accounting = new AccountingManager();

$data = $accounting->getAccountingDisbursement();
$data1 = $accounting->getAccountingDisbursement('Submitted by PO');

$getTotalPending = $accounting->getTotalPending();
$getTotalReceived = $accounting->getTotalReceived();
$getTotalDisbursed = $accounting->getTotalDisbursed();
$getTotalReleased = $accounting->getTotalReleased();

$route = "Finance/route/process_disbursement.php";
$is_admin = false;


$getNta = $accounting->getNta();


if (isset($_GET['ors'])) 
{
	$ors = $_GET['ors'];    
	$flag = $_GET['flag'];
	$data2 = $accounting->getAccountingDisbursement('',$ors);
	$getNtaEntries = $accounting->getNTAEntries('',$ors);

	// print_r($getNtaEntries);
	// die();
}



$getLddap = $accounting->getLddap();


if (in_array($_SESSION['currentuser'], [2668, 2702, 3316, 3320, 3319])) {
	$is_admin = true;
}