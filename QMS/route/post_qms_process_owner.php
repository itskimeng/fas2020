<?php
date_default_timezone_set('Asia/Manila');
session_start();

require_once '../../Model/Connection.php';
require_once '../../Model/QMSProcedure.php';
require_once '../../Model/QMSProcessOwner.php';
require_once '../manager/QMSManager.php';

$process_owner = new QMSProcessOwner();
$author = $_SESSION['currentuser'];
$emp_id = $_GET['emp_id'];

$process_owner->post($emp_id, $author);

header('location:../../qms_process_owners.php');

