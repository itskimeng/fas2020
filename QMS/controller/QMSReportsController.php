<?php
date_default_timezone_set('Asia/Manila');
session_start();

require_once 'Model/Connection.php';
require_once 'Model/QMSProcedure.php';
require_once 'QMS/manager/QMSManager.php';

$qms = new QMSManager();
$qms_procedure = new QMSProcedure(0);

$is_admin = $qms->fetchAdmins($_SESSION['currentuser']);
$sys_admin = $qms->fetch_sys_admin($_SESSION['currentuser']);

$route = 'QMS/route/insert_report_entry.php';

$qp_codes = $qms->fetchQP(0);

$qp_frequency = [1 => 'Monthly', 2 => 'Quarterly', 3 => 'Annually']; 
$status = [0 => 'Draft', 1 => 'Submitted', 2 => 'Received', 3 => 'Completed'];
$status_style = [0 => '#f5f2f1', 1 => '#e1f1f7', 2 => '#fcf9e8', 3 => '#eafcf4'];
$badge_style = [0 => '#de5941', 1 => '#46a8d0', 2 => '#d2c04a', 3 => '#00a65a'];

$qop_entries = $qms->fetch_qop_entries(0);
if (isset($_GET['id'])) 
{
	$qp_data = $qms->fetch_qop_entries($_GET['id']);
	$entries = $qms->fetchQOEData($_GET['parent']);
	$qp_data = $qp_data[$_GET['id']];
	// exit();
	if ($qp_data['frequency_monitoring'] == 1) {
		$currentperiod_opts = $qms->fetchMonthOpts();
		$period = array_search($qp_data['qp_covered'], $currentperiod_opts);
	}
	else if ($qp_data['frequency_monitoring'] == 2) {
		$currentperiod_opts = $qms->fetchQuarterOpts();
		$period = array_search($qp_data['qp_covered'], $currentperiod_opts);
	}
	else if ($qp_data['frequency_monitoring'] == 3) {
		$currentperiod_opts = $qms->fetchYearOpts();
		$period = array_search($qp_data['qp_covered'], $currentperiod_opts);
	}
}

$coverage = $qms->fetchCoverage();


$counter = 1;
