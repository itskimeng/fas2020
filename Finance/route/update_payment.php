<?php
session_start();
date_default_timezone_set('Asia/Manila');

require_once "../../Model/Connection.php";
require_once "../../Model/Payment.php";
require_once '../manager/AccountingManager.php';
require_once "../../ActivityPlanner/manager/Notification.php";

$pay = new Payment();
$acctg = new AccountingManager();
$notif = new Notification();

$id = $_GET['id'];

$pos = $acctg->getOBPurchaseOrders($id);
$acctg->updatePO($pos, 16);

$pay->updateStatus($id, 'Paid');

$_SESSION['toastr'] = $notif->addFlash('success', 'Successfully Paid Payment', 'Release');

header('location:../../cash_payment_new.php?id='.$id);
