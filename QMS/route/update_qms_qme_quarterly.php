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
$isna = isset($_POST['is_na']) ? $_POST['is_na'] : '';
$created_by = $_SESSION['currentuser'];
$entry_id = isset($_GET['entry_id']) ? $_GET['entry_id'] : ''; 
$indicator = isset($_GET['indicator']) ? $_GET['indicator'] : '';
$year = isset($_GET['year']) ? $_GET['year'] : '';

$is_na['01'] = isset($isna['01']) ? 'y' : '';
$is_na['02'] = isset($isna['02']) ? 'y' : '';
$is_na['03'] = isset($isna['03']) ? 'y' : '';
$is_na['04'] = isset($isna['04']) ? 'y' : '';

$rr['01'] = isset($rate[0]) ? $rate[0] : '';
$rr['02'] = isset($rate[1]) ? $rate[1] : '';
$rr['03'] = isset($rate[2]) ? $rate[2] : '';
$rr['04'] = isset($rate[3]) ? $rate[3] : '';



$data = [
	'id'		=> $qme_id, 
	'rate' 		=> json_encode($rr),
	'is_na' 	=> json_encode($is_na),
	'author' 	=> $created_by,
	'indicator' => $indicator,
	'year' 		=> $year,
	'qoe_id' 	=> $qoe_id
];

$qms_procedure->updateQMEByAdmin($data);
$qms_procedure->updateQMEByAdminCache($data);
$qms_procedure->updateQME($data);
$qms_procedure->updateCache($data);

// header('location:../../qms_procedures_objective.php?parent='.$parent.'&division='.$_SESSION['division'].'&id='.$qoe_id);
header('location:../../qms_procedure_ob_entries.php?parent='.$parent.'&division='.$_SESSION['division'].'&id='.$qoe_id.'&entry_id='.$entry_id.'&auth=entry');
