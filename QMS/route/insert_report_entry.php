<?php
date_default_timezone_set('Asia/Manila');
session_start();

require_once '../../Model/Connection.php';
require_once '../manager/QMSManager.php';

$qms = new QMSManager();

$parent_id = isset($_POST['parent_id']) ? $_POST['parent_id'] : '';
$created_by = isset($_POST['created_by']) ? $_POST['created_by'] : '';
$qp_covered = isset($_POST['qp_covered']) ? $_POST['qp_covered'] : '';
$qp_year = isset($_POST['qp_year']) ? $_POST['qp_year'] : '';


$entry_id = $qms->create_qop_entry($parent_id, $qp_covered);

$test = $qms->duplicate_qop_frequency($parent_id, $entry_id, $qp_year);

// $data = [
//     'qop_entry_id'  => $entry_id
// ];

// print_r($test);
// exit();

// header('location:../../qms_report_view.php?id='.$id);
header('location:../../qms_report_view.php?id='.$entry_id.'&parent='.$parent_id);
