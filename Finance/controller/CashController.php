<?php
date_default_timezone_set('Asia/Manila');
session_start();

require_once 'Model/Connection.php';
require_once 'Model/Payment.php';
require_once 'Finance/manager/CashManager.php';
require_once 'Finance/manager/BudgetManager.php';
require_once 'Finance/manager/AccountingManager.php';

$pay = new Payment();
$bm = new BudgetManager();
$cash = new CashManager();
$acctg = new AccountingManager();

$now = new DateTime();
$now = $now->format('m/d/Y');
$status = 'Draft';	
$current_user = $_SESSION['username'];
$route = "Finance/route/post_payment.php";
$readonly = false;

if (isset($_GET['id'])) {
	$data = $cash->getLDDAPDetails($_GET['id']);
	$dentries = $cash->getLDDAPEntries($_GET['id']);	
	
	if (in_array($data['status'], ['Paid', 'Delivered to Bank'])) {
		$readonly = true;
	}

	$obs = implode(', ', $dentries['obs']);
	$dvs = implode(', ', $dentries['dvs']);
	
	$pdvs = $acctg->getAccountingDisbursement3($dvs);
	$uacs = $bm->getObUACS($obs);
	$ntas = $acctg->getDvNTA($dvs);
}


$dv_list = $acctg->getAccountingDisbursement2();

$data1 = $cash->getCash();
// $data2 = $cash->getDV();
// if (!empty($data1) AND !empty($data2)) {
	// $data = array_merge($data1, $data2);
// }
