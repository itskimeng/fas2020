<?php
session_start();
date_default_timezone_set('Asia/Manila');

require_once "../../Model/Connection.php";
require_once "../../Model/Payment.php";
require_once '../manager/AccountingManager.php';
require_once "../../ActivityPlanner/manager/Notification.php";
require_once "../../Model/History.php";

$pay = new Payment();
$acctg = new AccountingManager();
$notif = new Notification();
$log = new History();

$user = $_SESSION['currentuser'];
$id = $_GET['id'];

$pos = $acctg->getOBPurchaseOrders($id);
$acctg->updatePO($pos, 16);

$pay->updateStatus($id, 'Paid');

$log->post_history($user, 3, 0, 0, $id, "paid", "Successfully Paid LDDAP Payment");

$_SESSION['toastr'] = $notif->addFlash('success', 'Successfully Paid Payment', 'Release');

header('location:../../cash_payment_new.php?id='.$id.'&status=Paid');
