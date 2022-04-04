<?php
session_start();
date_default_timezone_set('Asia/Manila');

require_once "../../Model/Connection.php";
require_once "../../ActivityPlanner/manager/Notification.php";
require_once "../../connection.php";
require_once "../../Model/History.php";

$notif = new Notification();
$log = new History();

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

$select = ' SELECT `id`, `dv_id`, `ors_id`, `nta_id`, `disbursed_amount`, `status`, `date_created` FROM `tbl_nta_entries` WHERE dv_id = '.$dv_id.' ';
$exec = $conn->query($select);
while ($res = $exec->fetch_assoc())
{
	$update_nta = ' UPDATE tbl_nta SET obligated = obligated - '.$res['disbursed_amount'].', balance = balance + '.$res['disbursed_amount'].' WHERE id = '.$res['nta_id'].' ';
	$conn->query($update_nta);
}


$delete_ne = ' DELETE FROM tbl_nta_entries WHERE dv_id = '.$dv_id.' ';
$conn->query($delete_ne);
$array_count = count($array_nta_id);


for ($i=0; $i < $array_count; $i++) { 
	
	$sql = ' INSERT INTO `tbl_nta_entries`(`dv_id`, `ors_id`, `nta_id`, `disbursed_amount`, `date_created`) VALUES ( '.$dv_id.', '.$ors.', '.$array_nta_id[$i].', '.$array_disburse_amount[$i].', NOW() ) ';
	
	$conn->query($sql);
	$updateNta = ' UPDATE `tbl_nta` SET `obligated` = obligated + '.$array_disburse_amount[$i].', `balance` = balance - '.$array_disburse_amount[$i].' WHERE id = '.$array_nta_id[$i].' ';
	$conn->query($updateNta);

}
$update = ' UPDATE `tbl_dv_entries` SET `dv_number` = "'.$dv_number.'", `dv_date` = "'.$dv_date.'", `tax` = "'.$tax.'", `gsis` = "'.$gsis.'", `pagibig` = "'.$pagibig.'", `philhealth` = "'.$philhealth.'", `other` = "'.$other.'", `total` = '.$total.',`net_amount` = '.$net_amount.',`remarks` = "'.$remarks.'",`status` = "Disbursed", `date_process` = NOW(), `date_released` = NOW() WHERE `obligation_id` = '.$ors.' ';
// $update = ' UPDATE `tbl_dv_entries` SET `dv_number` = "'.$dv_number.'", `dv_date` = "'.$dv_date.'", `tax` = "'.$tax.'", `gsis` = "'.$gsis.'", `pagibig` = "'.$pagibig.'", `philhealth` = "'.$philhealth.'", `other` = "'.$other.'", `total` = '.$total.',`net_amount` = '.$net_amount.',`remarks` = "'.$remarks.'",`status` = "Draft", `date_process` = NOW() WHERE `obligation_id` = '.$ors.' ';

$exec = $conn->query($update);

// $log->post_history($user, 1, $ors, $dv_id, 0, "update_disbursement", "Successfully Updated ".$dv_number);
$log->post_history($user, 2, $ors, $dv_id, 0, "disbursed", "Successfully Disbursed ".$dv_number.' amounting '.$net_amount);

if ($exec) 
{
	$_SESSION['toastr'] = $notif->addFlash('success', 'Successfully Updated!', 'Update');
}
else
{
	$_SESSION['toastr'] = $notif->addFlash('error', 'There is an error! Please try encoding again.', 'Warning');
}

// header('location:../../accounting_disbursement.php');
header('location:../../accounting_disbursement_update.php?ors='.$ors.'&status=Paid');
$_SESSION['toastr'] = $notif->addFlash('success', 'Successfully Paid Disbursement', 'Completed');