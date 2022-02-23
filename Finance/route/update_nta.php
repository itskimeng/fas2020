<?php
session_start();
date_default_timezone_set('Asia/Manila');

require_once "../../Model/Connection.php";
require_once "../../ActivityPlanner/manager/Notification.php";
require_once "../../connection.php";

$notif = new Notification();

$user = $_SESSION['currentuser'];

$id = $_POST['id'];

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
$obligated = $_POST['obligated'];
$balance = $_POST['balance'];


$sql = ' UPDATE `tbl_nta` SET `nta_date` = "'.$nta_date.'", `received_date` = "'.$received_date.'", `nta_number` = "'.$nta_number.'", `saro_number` = "'.$saro_number.'", `account_number` = "'.$account_number.'", `particular` = "'.$particular.'", `quarter` = "'.$quarter.'", `amount` = "'.$amount.'", `obligated` = "'.$obligated.'", `balance` = "'.$balance.'" WHERE `id` = '.$id.' ';
$exec = $conn->query($sql);

if ($exec) 
{
	$_SESSION['toastr'] = $notif->addFlash('success', 'Successfully updated NTA/NCA', 'Add New');
}
else
{
	$_SESSION['toastr'] = $notif->addFlash('error', 'There is an error! Please try updating again.', 'Warning');
}

header('location:../../accounting_nta.php');
