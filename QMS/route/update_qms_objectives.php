<?php
date_default_timezone_set('Asia/Manila');
session_start();

require_once '../../Model/Connection.php';
require_once '../../Model/QMSProcedure.php';
require_once '../manager/QMSManager.php';
require_once "../../ActivityPlanner/manager/Notification.php";

$qms_procedure = new QMSProcedure();
$qms_manager = new QMSManager();
$notif = new Notification();

$id = isset($_GET['id']) ? $_GET['id'] : '';
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

$data = [
    'id'                    => $id,
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

$qms_procedure->UpdateEntries($data,$parent);

$_SESSION['toastr'] = $notif->addFlash('success', 'Successfully updated Quality Objective', 'Update');

header('location:../../qms_procedures_objective.php?parent='.$parent.'&division='.$_SESSION['division'].'&edit='.$id);
