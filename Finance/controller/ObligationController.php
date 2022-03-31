<?php
session_start();
date_default_timezone_set('Asia/Manila');

require_once 'Model/Connection.php';
require_once "Model/Obligation.php";
require_once 'Finance/manager/BudgetManager.php';

$ob = new Obligation();
$bm = new BudgetManager();
$route = 'Finance/route/post_obligation.php';
$uacs_opts = $bm->getUACSOpts();
$is_readonly = false;
$is_admin = false;

if (isset($_GET['poid'])) {
	$poid = $_GET['poid'];
}

if (in_array($_SESSION['currentuser'], [2668, 2702, 3316, 3320, 3319])) {
	$is_admin = true;
}

if (isset($_GET['id'])) {
	$data = $bm->getObligations($_GET['id']);
	$route = 'Finance/route/update_obligation.php';

	$entries = $bm->getObligationEntries($_GET['id']);
	$has_entries = count($entries) > 0 ? true : false;

	if (in_array($data['status'], [Obligation::STATUS_RELEASED_PO, Obligation::STATUS_RELEASED])) {
		$is_readonly = true;
	} elseif (!$is_admin AND !in_array($data['status'], ['Draft', 'Returned'])) {
		$is_readonly = true;
	} elseif ($is_admin AND in_array($data['status'], ['Submitted', 'Returned'])) {
		$is_readonly = true;
	}

}

$ob_count = $bm->getObligationsCount();
$month_opts = $bm->monthOptions();
$payee_opts = $bm->payeeOptions();
$ors_data = $bm->getObligationsData();
$count_normal = isset($ors_data['normal']) ? count($ors_data['normal']) : 0;
$count_dfunds = isset($ors_data['dfund']) ? count($ors_data['dfund']) :  0;

$pos = $bm->getPurchaseOrders();
$prs = $bm->getPurchaseRequest();

$supplier_opts = $bm->getSupplierOpts();
$now = new DateTime();
$now = $now->format('m/d/Y');
$obligation_opts = ['burs' => 'Budget Utilization Request (BURS)', 'ors' => 'Obligation Request and Status (ORS)'];
$po_opts = $bm->getPurchaseOrderOpts();
// $po_opts = $bm->getPurchaseOrders();
$fund_sources = $bm->getFundSourceOpts2();	
$huc_opts = $bm->getHUCsOpts();
	