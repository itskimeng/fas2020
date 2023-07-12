<?php
session_start();
date_default_timezone_set('Asia/Manila');

require_once '../../Model/Connection.php';
require_once '../../Model/QMSProcedure.php';
require_once '../manager/QMSManager.php';
require_once "../../ActivityPlanner/manager/Notification.php";

$qms = new QMSManager();
$notif = new Notification();	

$id = $_GET['id'];

$qms->delete_gap_entry($id);
$qms->delete_qop_entry($id);
$qms->delete_qoe_entry($id);

