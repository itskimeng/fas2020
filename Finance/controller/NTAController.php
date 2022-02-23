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

$update = $accounting->fetchNtaUpdate($id);

$getNtaSummary = $accounting->getNtaSummary($nta_id);
$nta_details = $accounting->getNtaDetails($nta_id);

?>