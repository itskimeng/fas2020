<?php
date_default_timezone_set('Asia/Manila');
session_start();

require_once 'Model/Connection.php';
require_once 'Model/Payment.php';
require_once 'Finance/manager/CashManager.php';

$pay = new Payment();
$cash = new CashManager();
$now = new DateTime();
$now = $now->format('m/d/Y');

if (isset($_GET['id'])) {
	$data = $cash->getDVData($_GET['id']);
	$entries = $cash->getDVFundsource($data['obligation_id']);
}

$data1 = $cash->getCash();
$data2 = $cash->getDV();
// if (!empty($data1) AND !empty($data2)) {
	// $data = array_merge($data1, $data2);
// }
