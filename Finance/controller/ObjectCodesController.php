<?php
session_start();
date_default_timezone_set('Asia/Manila');

require_once 'Model/Connection.php';
require_once 'Model/ObjectCodes.php';
require_once 'Finance/manager/BudgetManager.php';

$oc = new ObjectCodes();
$budget = new BudgetManager();
$data = $oc->fetch();

$is_admin = false;

$now = new DateTime();
$now = $now->format('m/d/Y');
$currentuser = $_SESSION['UNAME'];
$source_id = isset($_GET['source']) ? $_GET['source'] : 0;

$route_add = 'Finance/route/post_object_code.php';

if (in_array($_SESSION['currentuser'], [2668, 2702, 3316, 3320])) {
	$is_admin = true;
} elseif ($fsource['is_lock']) {
	$is_admin = true;
}

