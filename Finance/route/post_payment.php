<?php
session_start();
date_default_timezone_set('Asia/Manila');

require_once "../../Model/Connection.php";
require_once "../../Model/Payment.php";
require_once '../manager/CashManager.php';
require_once "../../ActivityPlanner/manager/Notification.php";

$pay = new Payment();
$cm = new CashManager();
$notif = new Notification();

$acct_no = $_POST['source_no'];
$dvid = $_POST['dvid'];
$date_created = $_POST['date_created'];
$lddap = $_POST['lddap'];
$link = $_POST['link'];
$remarks = $_POST['remarks'];

$today = new DateTime($date_created);
$current = new DateTime();

$pay->post($acct_no, $dvid, $current, $lddap, $today, $remarks, $link);

$_SESSION['toastr'] = $notif->addFlash('success', 'Successfully created new Payment', 'Add New');

header('location:../../cash_payment.php');
