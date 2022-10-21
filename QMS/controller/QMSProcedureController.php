<?php
date_default_timezone_set('Asia/Manila');
session_start();

require_once 'Model/Connection.php';
require_once 'Model/QMSProcedure.php';
require_once 'QMS/manager/QMSManager.php';

$qms = new QMSManager();
$qms_procedure = new QMSProcedure();
$is_new = isset($_GET['new']) ? true : false;

$is_admin = $qms->fetchAdmins($_SESSION['currentuser']);
$coverage_opts = $qms->fetchCoverage();
$office_opts = $qms->fetchOfficeOpts();
$processowners_opts = $qms->fetchProcessOwnersList();
$frequency_opts = $qms->fetchFrequencyMonitoring();
// $month_opts = $qms->fetchMonthOpts();
// $quarter_opts = $qms->fetchQuarterOpts();

$frequency_name = ['1' => 'Monthly', '2' => 'Quarterly', '3' => 'Yearly'];

$data = $qms->fetchQualityProcedures();

if (isset($_GET['new'])) {
	if ($is_new) {
		$route = 'QMS/route/post_qms_procedures.php';
	} else {
		$route = 'QMS/route/update_qms_procedures.php';
		$data = $qms->fetchProcedureData($_GET['id']);
		$entries = $qms->fetchQOEData($_GET['id']);
	}
}

if (isset($_GET['id'])) {
	$route = 'QMS/route/update_qms_procedures.php';
	$data = $qms->fetchProcedureData($_GET['id']);
	$entries = $qms->fetchQOEData($_GET['id']);

	if ($data['frequency_monitoring'] == 1) {
		$currentperiod_opts = $qms->fetchMonthOpts();
	}
}

$counter = 1;