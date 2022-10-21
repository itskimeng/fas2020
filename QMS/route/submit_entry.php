<?php
date_default_timezone_set('Asia/Manila');
session_start();

require_once '../../Model/Connection.php';
require_once '../../Model/QMSProcedure.php';
require_once '../manager/QMSManager.php';

$qms_procedure = new QMSProcedure();
$qms = new QMSManager();

$is_admin = $qms->fetchAdmins($_SESSION['currentuser']);

$entry_id = isset($_POST['entry_id']) ? $_POST['entry_id'] : '';

$status = 0;


if (isset($_POST['submit'])) 
{
	$status = 1;
}
else if (isset($_POST['receive']))  
{
	$status = 2;
}
else if (isset($_POST['complete']))  
{
	$status = 3;
}

$qms->update_entry_status($entry_id, $status);

header('location:../../qms_report_submission.php?division='.$_SESSION['division']);
