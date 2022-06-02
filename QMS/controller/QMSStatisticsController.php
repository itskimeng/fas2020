<?php
date_default_timezone_set('Asia/Manila');
session_start();

require_once 'Model/Connection.php';
require_once 'Model/QMSProcedure.php';
require_once 'QMS/manager/QMSManager.php';

$qms = new QMSManager();
$qms_procedure = new QMSProcedure();
$is_new = isset($_GET['new']) ? true : false;

$is_admin = $qms->fetchAdmins($_SESSION['currentuser']);
$documents = $qms->fetchQMSDocuments();
$activities = $qms->fetchQMSActivities();

