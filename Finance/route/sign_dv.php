<?php 
session_start();
date_default_timezone_set('Asia/Manila');

require_once "../../Model/Connection.php";
require_once "../../ActivityPlanner/manager/Notification.php";
require_once "../../connection.php";
require_once "../../Model/History.php";

$notif = new Notification();
$log = new History();


$folder="../views/AccountingDisbursement/signed_files/";
$path_parts = pathinfo($_FILES["signatory"]["name"]);
$dv_id = $_POST["dv_id"];
// $_SESSION['currentuser'];

$temp_name = date('Ymd').time().'.'.$path_parts['extension'];
$filename = $_FILES["signatory"]["name"];


if ($_FILES['signatory']['size'] > 2000000 )
{
	$_SESSION['toastr'] = $notif->addFlash('warning', 'File exceeded 2MB limit.', 'File too big!');
}
else
{ 
	move_uploaded_file($_FILES["signatory"]["tmp_name"], $folder.$temp_name);
	$sql = ' INSERT INTO `tbl_dv_signatory`(`dv_id`, `uploader_id`, `filename`, `temp_name`, `date_created`) VALUES ( '.$dv_id.', '.$_SESSION['currentuser'].', "'.$filename.'", "'.$temp_name.'", NOW() ) ';
	$conn->query($sql);

	$update = ' UPDATE `tbl_dv_entries` SET `status` = "Signed" WHERE id = '.$dv_id.' ';
	$conn->query($update);

	$_SESSION['toastr'] = $notif->addFlash('success', 'Disbursement Attachment Successfully Uploaded.', 'Success!');
}


header('location:../../accounting_disbursement_po.php');
