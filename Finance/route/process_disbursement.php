<?php
session_start();
date_default_timezone_set('Asia/Manila');

require_once "../../Model/Connection.php";
require_once "../../ActivityPlanner/manager/Notification.php";
require_once "../../connection.php";

$notif = new Notification();

$user = $_SESSION['currentuser'];
$total = 0;
$net_amount = 0;
$ors = $_POST['ors_number'];
$dv_id = $_POST['dv_id'];

$dv_number = $_POST['dv_number'];
$dv_date = $_POST['dv_date'];
$tax = $_POST['tax'];
$gsis = $_POST['gsis'];
$pagibig = $_POST['pagibig'];
$philhealth = $_POST['philhealth'];
$other = $_POST['other'];
$remarks = $_POST['remarks'];
$amount = $_POST['amount_obligated'];

$total = (int)$tax + (int)$gsis + (int)$pagibig + (int)$philhealth + (int)$other;
$net_amount = $amount - $total;

$array_nta_id = $_POST['nta_number'];
$array_nta_amount = $_POST['nta_amount'];
$array_nta_balance = $_POST['nta_balance'];
$array_disburse_amount = $_POST['disburse_amount'];

$array_count = count($array_nta_id);

for ($i=1; $i <= $array_count; $i++) { 
	// echo $array_nta_id[$i].' - '.$array_nta_amount[$i].' - '.$array_nta_balance[$i].'<br>';

	$sql = ' INSERT INTO `tbl_nta_entries`(`dv_id`, `ors_id`, `nta_id`, `disbursed_amount`, `date_created`) VALUES ( '.$dv_id.', '.$ors.', '.$array_nta_id[$i].', '.$array_disburse_amount[$i].', NOW() ) ';
	$conn->query($sql);
	$updateNta = ' UPDATE `tbl_nta` SET `obligated` = obligated + '.$array_disburse_amount[$i].', `balance` = balance - '.$array_disburse_amount[$i].' WHERE id = '.$array_nta_id[$i].' ';
	$conn->query($updateNta);

}

$update = ' UPDATE `tbl_dv_entries` SET `dv_number` = "'.$dv_number.'", `dv_date` = "'.$dv_date.'", `tax` = "'.$tax.'", `gsis` = "'.$gsis.'", `pagibig` = "'.$pagibig.'", `philhealth` = "'.$philhealth.'", `other` = "'.$other.'", `total` = '.$total.',`net_amount` = '.$net_amount.',`remarks` = "'.$remarks.'",`status` = "Disbursed", `date_process` = NOW(), `date_released` = NOW() WHERE `obligation_id` = '.$ors.' ';

$exec = $conn->query($update);


if ($exec) 
{
	$_SESSION['toastr'] = $notif->addFlash('success', 'Successfully Disbursed!', 'Add New');
}
else
{
	$_SESSION['toastr'] = $notif->addFlash('error', 'There is an error! Please try encoding again.', 'Warning');
}

header('location:../../accounting_disbursement.php');
