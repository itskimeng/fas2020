<?php
date_default_timezone_set('Asia/Manila');
session_start();

require_once '../../Model/Connection.php';
require_once '../../Model/QMSProcedure.php';
require_once '../manager/QMSManager.php';

$qms_procedure = new QMSProcedure();
$qms_manager = new QMSManager();

$parent = isset($_POST['parent_id']) ? $_POST['parent_id'] : '';
$id = isset($_POST['id']) ? $_POST['id'] : '';
$is_gap_analysis = isset($_POST['switch_objective_indicator']) ? ($_POST['switch_objective_indicator'] == 'on' ? 1 : 0) : 0;
$gap_analysis = isset($_POST['gap_analysis']) ? $_POST['gap_analysis'] : '';
$entry_id = isset($_POST['entry_id']) ? $_POST['entry_id'] : '';

$data = [
	'id'				=>	$id,
	'is_gap_analysis'	=>	$is_gap_analysis,
	'gap_analysis'		=>	$gap_analysis
];

$qms_manager->update_gap($data);

if ($is_gap_analysis == 1) 
{
	$qms_manager->update_gap_analysis($data);
}
else
{
	$qms_manager->remove_gap_analysis($data);
}

// header('location:../../qms_procedures_objective.php?parent='.$parent.'&division='.$_SESSION['division'].'&id='.$id);
header('location:../../qms_procedure_ob_entries.php?parent='.$parent.'&division='.$_SESSION['division'].'&id='.$id.'&entry_id='.$entry_id);

