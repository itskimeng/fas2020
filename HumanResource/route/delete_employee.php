<?php
session_start();
date_default_timezone_set('Asia/Manila');

require_once '../../Model/Connection.php';
require_once '../../Model/UploadDTR.php';
require_once '../../HumanResource/manager/HRManager.php';
require_once '../../Finance/manager/BudgetManager.php';
require_once "../../ActivityPlanner/manager/Notification.php";

$notif = new Notification();
$hrm = new HRManager;


$hrm->deleteEmployee($_GET['emp_id']);
