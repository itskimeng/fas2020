<?php
date_default_timezone_set('Asia/Manila');
session_start();

require_once 'Model/Connection.php';
require_once 'Model/QMSProcedure.php';
require_once 'QMS/manager/QMSManager.php';


$qms = new QMSManager();
$qms_procedure = new QMSProcedure();
$is_new = isset($_GET['new']) ? true : false;
$is_edit = isset($_GET['edit']) ? true : false;
$is_admin = $qms->fetchAdmins($_SESSION['currentuser']);

if ($is_new) {
	$route = 'QMS/route/post_qms_objectives.php';
} elseif ($is_edit) {
	$data = $qms->fetchObjectiveData($_GET['edit']);
} else {
	$data = $qms->fetchObjectiveData($_GET['id']);

	if ($_GET['auth'] == 'entry') {
		$frequencies = $qms->fetchQOEFrequency($_GET['entry_id'], $_GET['id']);
		$qp_covered = $qms->get_qp_covered($_GET['entry_id']);
	}
	else
	{
		$frequencies = $qms->fetchQOEFrequencyBase($_GET['id']);
	}

	$procedure = $qms->fetchProcedureData($_GET['parent']);


}

$ob_label = 'A';

