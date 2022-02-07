<?php
session_start();
date_default_timezone_set('Asia/Manila');

require_once 'Model/Connection.php';
require_once 'Finance/manager/BudgetManager.php';

$budget = new BudgetManager();

$data = $budget->getFundSources();

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

