<?php
session_start();
date_default_timezone_set('Asia/Manila');
$timeNow = (new DateTime('now'))->format('Y-m-d');
$timeNow1 = (new DateTime('now'))->format('H:m:i');
//Replace now() Variable
// echo $timeNow;
?>
<?php
date_default_timezone_set('Asia/Manila');
$conn = mysqli_connect("localhost","fascalab_2020","w]zYV6X9{*BN","fascalab_2020");



$ors = $_GET['ors'];

$insert = ' INSERT INTO `tbl_dv_entries`(`obligation_id`, `status`, `date_received`,`date_created`) VALUES ( '.$ors.', "Received", NOW(), NOW() ) ';
$conn->query($insert);

$sql = ' UPDATE tbl_obligation SET designation = 1 WHERE id = '.$ors.' ';
$exec = $conn->query($sql);


if ($exec) 
{
	  // echo ("<SCRIPT LANGUAGE='JavaScript'>
	  //   window.alert('Successfuly Received!')
	  //   window.location.href = 'accounting_disbursement.php';
	  //   </SCRIPT>");


	$_SESSION['toastr'] = 'true';
	header('location: accounting_disbursement.php');
}
else
{
	echo ("<SCRIPT LANGUAGE='JavaScript'>
	window.alert('Error Occured!')
	window.location.href = 'accounting_disbursement.php';
	</SCRIPT>");
}

?>