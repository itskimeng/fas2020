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
$user = $_SESSION['currentuser'];


$obligation = ' SELECT `serial_no`, `amount` FROM `tbl_obligation` WHERE id = '.$ors.' ';
$exec = $conn->query($obligation);
$result = $exec->fetch_assoc();

$insert = ' INSERT INTO `tbl_dv_entries`(`obligation_id`, `status`, `date_received`,`date_created`) VALUES ( '.$ors.', "Draft", NOW(), NOW() ) ';
$conn->query($insert);
$last_id = mysqli_insert_id($conn);


$log = "INSERT INTO tbl_finance_history 
        SET user_id = '".$user."',
        menu_id = '2',
        ob_id = '".$ors."',
        dv_id = '".$last_id."',
        pay_id = '0',
        action = 'received_dv',
        message = 'Obligation Serial Number: ".$result['serial_no']." has been received amounting ".$result['amount']."',
        date_created = NOW()";

$conn->query($log);


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