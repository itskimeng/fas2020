<?php
session_start();
date_default_timezone_set('Asia/Manila');

require_once '../../Model/Connection.php';
require_once '../../Model/QMSProcedure.php';
require_once '../manager/QMSManager.php';
require_once "../../ActivityPlanner/manager/Notification.php";

$qms_procedure = new QMSProcedure();
$notif = new Notification();	

$source_id = $_GET['id'];

$qms_procedure->delete_owner($source_id);

