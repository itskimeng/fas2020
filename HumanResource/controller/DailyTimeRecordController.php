<?php
session_start();
date_default_timezone_set('Asia/Manila');

require_once 'Model/Connection.php';
require_once 'Model/UploadDTR.php';
require_once 'HumanResource/manager/HRManager.php';
require_once 'Finance/manager/BudgetManager.php';

$hrm = new HRManager;

$current_date = new DateTime();

if (isset($_GET['emp_n'])) {	
	$currentuser = $_GET['emp_n'];
} else {
	$emp_name = $_SESSION['complete_name3'];
	$currentuser = $_SESSION['currentuser'];
}

$admins = ['mmmonteiro', 'jbaco', 'hpsolis', 'jecastillo'];
$hr_admins = $hrm->moduleAccess(1);
$po_admins = $hrm->moduleAccess(2);
$sys_admins = $admins + $hr_admins + $po_admins;
$current_month = isset($_GET['month']) ? $_GET['month'] : $current_date->format('m');
$current_year = isset($_GET['year']) ? $_GET['year'] : $current_date->format('Y');
$data = $hrm->fetchDailyTimeRecord($currentuser, $current_year, $current_month);
$user_info = $hrm->getUserInformation($currentuser);
$username = $_SESSION['username'];
$emp_code = $user_info['emp_code'];

if (isset($_GET['emp_n'])) {
	$emp_name = $user_info['fullname'];
}

// $date_generated = array_shift(array_slice($data, 0, 1))['date_generated'];
$date_generated = array_shift(array_slice($data, 0, 1))['date_created'];

$month_opts = [
	'01' => 'January',
	'02' => 'February',
	'03' => 'March',
	'04' => 'April',
	'05' => 'May',
	'06' => 'June',
	'07' => 'July',
	'08' => 'August',
	'09' => 'September',
	'10' => 'October',
	'11' => 'November',
	'12' => 'December'
];



