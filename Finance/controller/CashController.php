<?php
date_default_timezone_set('Asia/Manila');
session_start();

require_once 'Model/Connection.php';
require_once 'Model/Payment.php';
require_once 'Finance/manager/CashManager.php';

// $pay = new Payment();
$cash = new CashManager();

// $data = $cash->getCashData();
$data1 = $cash->getCash();
$data2 = $cash->getDV();
// if (!empty($data1) AND !empty($data2)) {
	// $data = array_merge($data1, $data2);
// }
