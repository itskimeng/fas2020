<?php
session_start();
date_default_timezone_set('Asia/Manila');

require_once '../../Model/Connection.php';
require_once '../../Model/Payment.php';
require_once '../manager/CashManager.php';
require_once "../../ActivityPlanner/manager/Notification.php";

$cash = new CashManager();
$notif = new Notification();

$id = $_GET['id'];
$status = $_GET['status'];

$cash->updateDVStatus($id);

$_SESSION['toastr'] = $notif->addFlash('success', 'Successfully received Disbursement', 'Received');

header('location:../../cash_payment.php');





