<?php
date_default_timezone_set('Asia/Manila');
session_start();

require_once 'Model/Connection.php';
require_once 'Model/QMSProcedure.php';
require_once 'QMS/manager/QMSManager.php';
require_once 'HumanResource/manager/HRManager.php';

$qms = new QMSManager();
$hrm = new HRManager;

$employee_lists = $hrm->fetchEmployeesDirectory('', 77);
$process_owners = $qms->fetchProcessOwners();

