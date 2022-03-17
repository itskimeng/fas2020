<?php
session_start();
date_default_timezone_set('Asia/Manila');

require_once 'Model/Connection.php';
require_once 'Finance/manager/BudgetManager.php';

$budget = new BudgetManager();
$data = $budget->getFundSources2();
$allotment = $budget->getFundSources3();
$is_admin = false;

$now = new DateTime();
$now = $now->format('m/d/Y');
$currentuser = $_SESSION['UNAME'];
$source_id = isset($_GET['source']) ? $_GET['source'] : 0;

if (isset($_GET['source'])) {
	$route = 'Finance/route/update_fundsource.php';
} else {
	$route = 'Finance/route/post_fundsource.php';
}

$expenseclass_opts = $budget->getExpenseClassOpts();
$fsource = $budget->getFundSourceData($source_id);
$fsentries = $budget->getFSEntries($source_id);
$uacs_opts = $budget->getUACS();

if (in_array($_SESSION['currentuser'], [2668, 2702, 3316, 3320, 3319])) {
	$is_admin = true;
} elseif ($fsource['is_lock']) {
	$is_admin = true;
}

