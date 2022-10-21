<?php
date_default_timezone_set('Asia/Manila');
session_start();

require_once '../../Model/Connection.php';
require_once '../../Model/QMSProcedure.php';
require_once '../manager/QMSManager.php';

$qms_procedure = new QMSProcedure();
$qms_manager = new QMSManager();

$parent = isset($_POST['parent_id']) ? $_POST['parent_id'] : '';
$objective = isset($_POST['quality_objective']) ? $_POST['quality_objective'] : '';
$target_percentage = isset($_POST['target_percentage']) ? $_POST['target_percentage'] : '';
$indicator_a = isset($_POST['indicator_a']) ? $_POST['indicator_a'] : '';
$indicator_b = isset($_POST['indicator_b']) ? $_POST['indicator_b'] : '';
$indicator_c = isset($_POST['indicator_c']) ? $_POST['indicator_c'] : '';
$indicator_d = isset($_POST['indicator_d']) ? $_POST['indicator_d'] : '';
$indicator_e = isset($_POST['indicator_e']) ? $_POST['indicator_e'] : '';
$created_by = $_SESSION['currentuser'];
$formula = isset($_POST['formula']) ? $_POST['formula'] : '';

$parent_data = $qms_manager->fetchProcedureData($parent);

$data = [
	'qop_id'				=> isset($_POST['parent_id']) ? $_POST['parent_id'] : '', 
	'objective' 			=> isset($_POST['quality_objective']) ? $_POST['quality_objective'] : '',
	'target_percentage'		=> isset($_POST['target_percentage']) ? $_POST['target_percentage'] : '',
	'indicator_a'			=> isset($_POST['indicator_a']) ? $_POST['indicator_a'] : '',
	'indicator_b'			=> isset($_POST['indicator_b']) ? $_POST['indicator_b'] : '',
	'indicator_c'			=> isset($_POST['indicator_c']) ? $_POST['indicator_c'] : '',
	'indicator_d'			=> isset($_POST['indicator_d']) ? $_POST['indicator_d'] : '',
	'indicator_e'			=> isset($_POST['indicator_e']) ? $_POST['indicator_e'] : '',
	'formula'				=> isset($_POST['formula']) ? $_POST['formula'] : '',
	'created_by'			=> $created_by
];

$id = $qms_procedure->postEntries($data);

for ($i=1; $i <= 5; $i++) { 
	$frequenceis = ['qoe_id'=> $id, 'indicator'=> $i, 'frequency_type'=> $parent_data['frequency_monitoring']];
	$qms_procedure->postQOEFrequency($frequenceis);	
}

header('location:../../qms_procedures_objective.php?parent='.$parent.'&division='.$_SESSION['division'].'&id='.$id);
