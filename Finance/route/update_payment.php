<?php
session_start();
date_default_timezone_set('Asia/Manila');

require_once "../../Model/Connection.php";
require_once "../../Model/Payment.php";
require_once '../manager/AccountingManager.php';
require_once "../../ActivityPlanner/manager/Notification.php";
require_once "../../Model/History.php";
require_once '../manager/CashManager.php';

$pay = new Payment();
$acctg = new AccountingManager();
$notif = new Notification();
$log = new History();
$cash = new CashManager();

$user = $_SESSION['currentuser'];
$id = $_GET['id'];



$dentries = $cash->getLDDAPEntries($id);	
foreach ($dentries['obs'] as $key => $obs) {

	$log->post_history($user, 3, $obs, $dentries['dvs'][$key], $id, "paid", "Successfully Paid LDDAP Payment");

}


$pos = $acctg->getOBPurchaseOrders($id);
$acctg->updatePO($pos, 16);

$pay->updateStatus($id, 'Paid');


$_SESSION['toastr'] = $notif->addFlash('success', 'Successfully Paid Payment', 'Release');

header('location:../../cash_payment_new.php?id='.$id.'&status=Paid');
