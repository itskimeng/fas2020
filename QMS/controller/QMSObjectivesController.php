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

// print_r($_GET['id']);
// print_r($_GET['entry_id']);

if ($is_new) {
	$route = 'QMS/route/post_qms_objectives.php';
	$formula = $qms->fetchFormula();
} elseif ($is_edit) {
	// print_r($_GET['edit']);
	$id = $_GET['edit'];
	$route = 'QMS/route/update_qms_objectives.php?id='.$id.'';
	$data = $qms->fetchObjectiveData($_GET['edit']);
	$formula = $qms->fetchFormula();
} else {
	$data = $qms->fetchObjectiveData($_GET['id']);
	$formula = $qms->fetchFormula();

	if ($_GET['auth'] == 'entry') {
		$qp_covered = $qms->get_qp_covered($_GET['entry_id']);
		$frequencies = $qms->fetchQOEFrequency($_GET['entry_id'], $_GET['id']);
		// $form = $frequencies[0]['total'] / $frequencies[1]['total'] * 100;
		// print_r($form);
		// print_r($frequencies[4]['gap_analysis']);
		// print_r($frequencies[4]['is_gap_analysis']);
		// print_r($qp_covered);
		// die();
	}
	else
	{
		$frequencies = $qms->fetchQOEFrequencyBase($_GET['id']);
	}

	$procedure = $qms->fetchProcedureData($_GET['parent']);


}



$ob_label = 'A';

