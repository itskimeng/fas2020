<?php
date_default_timezone_set('Asia/Manila');
session_start();

require_once '../../Model/Connection.php';
require_once '../../Model/QMSProcedure.php';
require_once '../manager/QMSManager.php';
require_once "../../ActivityPlanner/manager/Notification.php";

$qms_procedure = new QMSProcedure();
$notif = new Notification();	

$parent_id = isset($_POST['parent_id']) ? $_POST['parent_id'] : '';
$frequency = isset($_POST['frequency']) ? $_POST['frequency'] : '';
$coverage = isset($_POST['coverage']) ? $_POST['coverage'] : '';
$office = isset($_POST['office']) ? $_POST['office'] : '';
$process_owner = isset($_POST['process_owner']) ? $_POST['process_owner'] : '';
$qp_code = isset($_POST['qp_code']) ? $_POST['qp_code'] : '';
$procedure_title = isset($_POST['procedure_title']) ? $_POST['procedure_title'] : '';
$created_by = $_SESSION['currentuser'];

$data = [
	'frequency' 		=> $frequency,
	'coverage' 			=> $coverage,
	'office'			=> $office,
	'process_owner'		=> $process_owner,
	'qp_code'			=> $qp_code,
	'procedure_title'	=> $procedure_title,
	'updated_by'		=> $created_by
];

$qms_procedure->update($data, $parent_id);

$_SESSION['toastr'] = $notif->addFlash('success', 'Successfully updated Quality Procedure', 'Update');

header('location:../../qms_procedures_new.php?id='.$parent_id);
