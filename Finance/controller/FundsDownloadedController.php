<?php
session_start();
date_default_timezone_set('Asia/Manila');

require_once 'Model/Connection.php';
require_once "Model/FundSource.php";
require_once 'Model/Payment.php';
require_once 'Finance/manager/BudgetManager.php';
require_once 'Finance/manager/CashManager.php';

$fs = new FundSource();
$pay = new Payment();
$bm = new BudgetManager();
$cash = new CashManager();

$route = 'Finance/route/post_obligation.php';
$is_readonly = false;
$is_admin = false;

if (in_array($_SESSION['currentuser'], [2668, 2702, 3316, 3320, 3319])) {
	$is_admin = true;
}

$data = $cash->getCash('Delivered to Bank');


	