<?php
date_default_timezone_set('Asia/Manila');
session_start();

require_once 'Model/Connection.php';
require_once 'Finance/manager/AccountingManager.php';

$accounting = new AccountingManager();

$data = $accounting->getAccountingDisbursement();
$data1 = $accounting->getAccountingDisbursement('Released for PO');
;
$getTotalPending = $accounting->getTotalPending();
$getTotalReceived = $accounting->getTotalReceived();
$getTotalDisbursed = $accounting->getTotalDisbursed();
$getTotalReleased = $accounting->getTotalReleased();

$route = "Finance/route/process_disbursement.php";
$lddap_route = 'Finance/route/create_disbursement.php';
$is_admin = false;
$readonly = false;


$getNta = $accounting->getNta();


if (isset($_GET['ors'])) 
{
	$ors = $_GET['ors'];    
	$flag = $_GET['flag'];
	$data2 = $accounting->getAccountingDisbursement('',$ors);
	$getNtaEntries = $accounting->getNTAEntries('',$ors);

}


if (isset($_GET['id'])) 
{
	$item = $accounting->selectDV($_GET['id']);
	$lddapEntries = $accounting->lddapEntries($_GET['lddap_id'],$_GET['id']);
	$lddap_route = 'Finance/route/update_lddap_disbursement.php?id='.$_GET['id'].'&lddap_id='.$_GET['lddap'];
	$readonly = true;
}


if (isset($_GET['lddap_id'])) 
{
	$endUserDv1 = $accounting->getEnduserDisbursement($_GET['lddap_id']);
	$getDvEntries = $accounting->getDvEntries($_GET['lddap_id']);
	
}



$getLddap = $accounting->getLddap();
$endUserDv = $accounting->getEnduserDisbursement();


if (in_array($_SESSION['currentuser'], [2668, 2702, 3316, 3320, 3319, 2563])) {
	$is_admin = true;
}

