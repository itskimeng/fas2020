<?php
session_start();
date_default_timezone_set('Asia/Manila');

require_once 'Model/Connection.php';
require_once 'Finance/manager/BudgetManager.php';

$bm = new BudgetManager();

// $budget->getCodeFromGSS();
$ob_count = $bm->getObligationsCount();
$month_opts = $bm->monthOptions();
$payee_opts = $bm->payeeOptions();
$ors_data = $bm->getObligationsData();
$pos = $bm->getPurchaseOrders();
$prs = $bm->getPurchaseRequest();
$obligation_opts = ['burs' => 'Budget Utilization Request (BURS)', 'ors' => 'Obligation Request and Status (ORS)'];


if (isset($_GET['id'])) {
	$ob_po = $bm->getSAROOB($_GET['id']);
}


