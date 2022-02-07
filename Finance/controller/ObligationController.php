<?php
session_start();
date_default_timezone_set('Asia/Manila');

require_once 'Model/Connection.php';
require_once 'Finance/manager/BudgetManager.php';

$bm = new BudgetManager();

if (isset($_GET['id'])) {
	$data = $bm->getObligations($_GET['id']);
}

$is_admin = false;
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
$fund_sources = $bm->getFundSourceOpts();	



