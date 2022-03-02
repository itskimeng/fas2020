<?php
session_start();
date_default_timezone_set('Asia/Manila');

require_once 'Model/Connection.php';
require_once 'Model/History.php';
require_once 'Finance/manager/BudgetManager.php';

$his = new History();
$bm = new BudgetManager();

$id = $_GET['id'];
$history = $his->fetch($id);
$obligation = $bm->getObligations($id);
$po_opts = $bm->getPurchaseOrderOpts();
$huc_opts = $bm->getHUCsOpts();
$supplier_opts = $bm->getSupplierOpts();
$obligation_opts = ['burs' => 'Budget Utilization Request (BURS)', 'ors' => 'Obligation Request and Status (ORS)'];




	

	