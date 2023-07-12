<?php
date_default_timezone_set('Asia/Manila');
session_start();

require_once '../../Model/Connection.php';
require_once '../../Model/QMSProcedure.php';
require_once '../manager/QMSManager.php';

$qms_procedure = new QMSProcedure();
$qms_manager = new QMSManager();

$is_admin = $qms_manager->fetchAdmins($_SESSION['currentuser']);
// print_r($_GET);
$parent = isset($_POST['parent_id']) ? $_POST['parent_id'] : '';
$id = isset($_POST['id']) ? $_POST['id'] : '';
$is_gap_analysis = isset($_POST['switch_objective_indicator']) ? ($_POST['switch_objective_indicator'] == 'on' ? 1 : 0) : 0;
$gap_analysis = isset($_POST['gap_analysis']) ? $_POST['gap_analysis'] : '';
$entry_id = isset($_POST['entry_id']) ? $_POST['entry_id'] : '';

// $qoe_id = isset($_GET['qoe_id']) ? $_GET['qoe_id'] : '';
// $qme_id = isset($_GET['id']) ? $_GET['id'] : '';
// $rate = isset($_GET['rate']) ? $_GET['rate'] : '';
// $isna = isset($_GET['is_na']) ? $_GET['is_na'] : '';
// $created_by = $_SESSION['currentuser'];
// $indicator = isset($_GET['indicator']) ? $_GET['indicator'] : '';
// $year = isset($_GET['year']) ? $_GET['year'] : '';

// $is_na['01'] = isset($isna['01']) ? 'y' : '';
// $is_na['02'] = isset($isna['02']) ? 'y' : '';
// $is_na['03'] = isset($isna['03']) ? 'y' : '';
// $is_na['04'] = isset($isna['04']) ? 'y' : '';

// $rr['01'] = isset($rate[1]) ? $rate[1] : '';
// $rr['02'] = isset($rate[2]) ? $rate[2] : '';
// $rr['03'] = isset($rate[3]) ? $rate[3] : '';
// $rr['04'] = isset($rate[4]) ? $rate[4] : '';

// $indicator['1'] = isset($rate[1]) ? '1': '';
// $indicator['2'] = isset($rate[2]) ? '2': '';
// $indicator['3'] = isset($rate[3]) ? '3': '';
// $indicator['4'] = isset($rate[4]) ? '4': '';
// $indicator['5'] = isset($rate[5]) ? '5': '';

// print_r($rate);
// print_r($indicator);



$data = [
	'id'				=>	$id,
	'is_gap_analysis'	=>	$is_gap_analysis,
	'gap_analysis'		=>	$gap_analysis
];
print_r($data);
exit();

// $qms_manager->update_gap($data);
// if ($is_gap_analysis == 0) 
// {
// 	$qms_manager->update_gap_analysis($data);
// }
// else
// {
// 	$qms_manager->remove_gap_analysis($data);
// }

// $data = [
// 	'id'		=> $qme_id, 
// 	'rate' 		=> json_encode($rr),
// 	'is_na' 	=> json_encode($is_na),
// 	'author' 	=> $created_by,
// 	'indicator' => $indicator,
// 	'year' 		=> $year,
// 	'qoe_id' 	=> $qoe_id
// ];

// print_r($data);
// print_r($dataGA);

// exit();

// $qms_procedure->updateQMEByAdmin($data);
// $qms_procedure->updateQMEByAdminCache($data);
// $qms_procedure->updateQME($data);
// $qms_procedure->updateCache($data);

// header('location:../../qms_procedures_objective.php?parent='.$parent.'&division='.$_SESSION['division'].'&id='.$id);
header('location:../../qms_procedure_ob_entries.php?parent='.$parent.'&division='.$_SESSION['division'].'&id='.$id.'&entry_id='.$entry_id);

