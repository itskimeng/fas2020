<?php
date_default_timezone_set('Asia/Manila');
session_start();

require_once '../../Model/Connection.php';
require_once '../../Model/QMSProcedure.php';
require_once '../manager/QMSManager.php';

$qms_procedure = new QMSProcedure();
$qms_manager = new QMSManager();

$is_admin = $qms_manager->fetchAdmins($_SESSION['currentuser']);

$parent = isset($_GET['parent']) ? $_GET['parent'] : '';
$qoe_id = isset($_GET['qoe_id']) ? $_GET['qoe_id'] : '';
$qme_id = isset($_GET['id']) ? $_GET['id'] : '';
$rate = isset($_POST['rate']) ? $_POST['rate'] : '';
$isna = isset($_POST['hidden_isna']) ? $_POST['hidden_isna'] : '';
$created_by = $_SESSION['currentuser'];

$rr['01'] = $rate[0];
$rr['02'] = $rate[1];
$rr['03'] = $rate[2];
$rr['04'] = $rate[3];

$data = [
	'id'		=> $qme_id, 
	'rate' 		=> json_encode($rr),
	'author' 	=> $created_by
];

$qms_procedure->updateQME($data);

header('location:../../qms_procedures_objective.php?parent='.$parent.'&division='.$_SESSION['division'].'&id='.$qoe_id);
