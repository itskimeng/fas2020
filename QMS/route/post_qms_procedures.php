<?php
date_default_timezone_set('Asia/Manila');
session_start();

require_once '../../Model/Connection.php';
require_once '../../Model/QMSProcedure.php';
require_once '../manager/QMSManager.php';

$qms_procedure = new QMSProcedure();

$frequency = isset($_POST['frequency']) ? $_POST['frequency'] : '';
$coverage = isset($_POST['coverage']) ? $_POST['coverage'] : '';
$office = isset($_POST['office']) ? $_POST['office'] : '';
$rev_no = isset($_POST['rev_no']) ? $_POST['rev_no'] : '';
$EffDate = isset($_POST['EffDate']) ? $_POST['EffDate'] : '';
$process_owner = isset($_POST['process_owner']) ? $_POST['process_owner'] : '';
$qp_code = isset($_POST['qp_code']) ? $_POST['qp_code'] : '';
$procedure_title = isset($_POST['procedure_title']) ? $_POST['procedure_title'] : '';
$created_by = $_SESSION['currentuser'];

$data = [
	'frequency' 		=> isset($_POST['frequency']) ? $_POST['frequency'] : '',
	'coverage' 			=> isset($_POST['coverage']) ? $_POST['coverage'] : '',
	'office'			=> isset($_POST['office']) ? $_POST['office'] : '',
	'rev_no'			=> isset($_POST['rev_no']) ? $_POST['rev_no'] : '',
	'EffDate'			=> isset($_POST['EffDate']) ? $_POST['EffDate'] : '',
	'process_owner'		=> implode(',', isset($_POST['process_owner']) ? $_POST['process_owner'] : ''),
	'qp_code'			=> isset($_POST['qp_code']) ? $_POST['qp_code'] : '',
	'procedure_title'	=> isset($_POST['procedure_title']) ? $_POST['procedure_title'] : '',
	'created_by'		=> $_SESSION['currentuser']
];
// print_r($data);
// exit();
$id = $qms_procedure->post($data);

header('location:../../qms_procedures_new.php?id='.$id);
