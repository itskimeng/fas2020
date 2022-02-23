<?php
session_start();
date_default_timezone_set('Asia/Manila');

require_once "../../Model/Connection.php";
require_once "../../ActivityPlanner/manager/Notification.php";
require_once "../../connection.php";

$notif = new Notification();

$user = $_SESSION['currentuser'];

$nta_date = $_POST['nta_date'];
$nta_date = date('Y-m-d H:i:s');

$received_date = $_POST['received_date'];
$received_date = date('Y-m-d H:i:s');

$nta_number = $_POST['nta_number'];
$saro_number = $_POST['saro_number'];
$account_number = $_POST['account_number'];
$particular = $_POST['particular'];
$quarter = $_POST['quarter'];
$amount = $_POST['amount'];


$sql = ' INSERT INTO `tbl_nta`( `nta_date`, `received_date`, `nta_number`, `saro_number`, `account_number`, `particular`, `quarter`, `amount`, `balance`, `created_by`, `date_created` ) VALUES ( "'.$nta_date.'", "'.$received_date.'", "'.$nta_number.'", "'.$saro_number.'", "'.$account_number.'", "'.$particular.'", "'.$quarter.'", "'.$amount.'", "'.$amount.'", "'.$user.'", NOW() ) ';
$exec = $conn->query($sql);

if ($exec) 
{
	$_SESSION['toastr'] = $notif->addFlash('success', 'Successfully created NTA/NCA', 'Add New');
}
else
{
	$_SESSION['toastr'] = $notif->addFlash('error', 'There is an error! Please try encoding again.', 'Warning');
}

header('location:../../accounting_nta.php');
