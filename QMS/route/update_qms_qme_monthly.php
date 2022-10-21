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


$is_na = $rr = [];


// if ($is_admin) {
	$is_na['01'] = isset($isna['01']) ? 'y' : '';
	$is_na['02'] = isset($isna['02']) ? 'y' : '';
	$is_na['03'] = isset($isna['03']) ? 'y' : '';
	$is_na['04'] = isset($isna['04']) ? 'y' : '';
	$is_na['05'] = isset($isna['05']) ? 'y' : '';
	$is_na['06'] = isset($isna['06']) ? 'y' : '';
	$is_na['07'] = isset($isna['07']) ? 'y' : '';
	$is_na['08'] = isset($isna['08']) ? 'y' : '';
	$is_na['09'] = isset($isna['09']) ? 'y' : '';
	$is_na['10'] = isset($isna['10']) ? 'y' : '';
	$is_na['11'] = isset($isna['11']) ? 'y' : '';
	$is_na['12'] = isset($isna['12']) ? 'y' : '';
// } else {
	$rr['01'] = isset($rate[0]) ? $rate[0] : '';
	$rr['02'] = isset($rate[1]) ? $rate[1] : '';
	$rr['03'] = isset($rate[2]) ? $rate[2] : '';
	$rr['04'] = isset($rate[3]) ? $rate[3] : '';
	$rr['05'] = isset($rate[4]) ? $rate[4] : '';
	$rr['06'] = isset($rate[5]) ? $rate[5] : '';
	$rr['07'] = isset($rate[6]) ? $rate[6] : '';
	$rr['08'] = isset($rate[7]) ? $rate[7] : '';
	$rr['09'] = isset($rate[8]) ? $rate[8] : '';
	$rr['10'] = isset($rate[9]) ? $rate[9] : '';
	$rr['11'] = isset($rate[10]) ? $rate[10] : '';
	$rr['12'] = isset($rate[11]) ? $rate[11] : '';
// }


$data = [
	'id'		=> $qme_id, 
	'rate' 		=> json_encode($rr),
	'is_na' 	=> json_encode($is_na),
	'author' 	=> $created_by,
	'indicator' => $indicator,
	'year' 		=> $year,
	'qoe_id' 	=> $qoe_id
];

// if ($is_admin) {
	$qms_procedure->updateQMEByAdmin($data);
	$qms_procedure->updateQMEByAdminCache($data);
// } else {
	$qms_procedure->updateQME($data);
	$qms_procedure->updateCache($data);
// }

header('location:../../qms_procedure_ob_entries.php?parent='.$parent.'&division='.$_SESSION['division'].'&id='.$qoe_id.'&entry_id='.$entry_id.'&auth=entry');
