<?php
date_default_timezone_set('Asia/Manila');
session_start();

require_once 'Model/Connection.php';
require_once 'Finance/manager/AccountingManager.php';


$accounting = new AccountingManager();

$data = $accounting->getAccountingData();

$getTotalNta = $accounting->getTotalNta();
$getTotalDisbursedNta = $accounting->getTotalDisbursedNta();
$getTotalBalance = $accounting->getTotalBalance();

if (isset($_GET['getid'])) {
	$update = $accounting->fetchNtaUpdate($_GET['getid']);	
}

if (isset($_GET['nta_id'])) {
	$getNtaSummary = $accounting->getNtaSummary($_GET['nta_id']);
	$nta_details = $accounting->getNtaDetails($_GET['nta_id']);
}


?>