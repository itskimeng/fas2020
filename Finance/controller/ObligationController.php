<?php
session_start();
date_default_timezone_set('Asia/Manila');

require_once 'Model/Connection.php';
require_once 'Finance/manager/BudgetManager.php';

$bm = new BudgetManager();

$route = 'Finance/route/';
$ob_count = $bm->getObligationsCount();
$month_opts = $bm->monthOptions();
$payee_opts = $bm->payeeOptions();
$ors_data = $bm->getObligationsData();
$pos = $bm->getPurchaseOrders();
$prs = $bm->getPurchaseRequest();
$supplier_opts = $bm->getSupplierOpts();
$now = new DateTime();
$now = $now->format('m/d/Y');
$obligation_opts = ['burs' => 'Budget Utilization Request (BURS)', 'ors' => 'Obligation Request and Status (ORS)'];
$po_opts = $bm->getPurchaseOrderOpts();

if (isset($_GET['id'])) {
	$ob_po = $bm->getSAROOB($_GET['id']);
}


