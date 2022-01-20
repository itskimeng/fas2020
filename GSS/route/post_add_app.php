<?php
session_start();
date_default_timezone_set('Asia/Manila');

require '../../Model/Connection.php';
require_once '../../Model/APP.php';

$app = new APP();



$stock_number = $_GET['stockNo'];
$code = $_GET['code'];
$itemTitle = $_GET['itemTitle'];
$unit = $_GET['unit'];
$category = $_GET['category'];
$office = $_GET['office'];
$qty = $_GET['qty'];
$app_price = $_GET['app_price'];
$fund = $_GET['sf'];
$mode = $_GET['mode'];
$remarks = $_GET['remarks'];
$fund_val = '';
$mode_val = '';
$source_fund = getFund($fund_val,$fund);
$mode_pr = getMode($mode_val,$mode);
$data = [
	'stock_number' => $stock_number,
	'code' => $code,
	'item_title' => $itemTitle,
	'unit' => $unit,
	'category' => $category,
	'office' => $office,
	'qty' => $qty,
	'app_price' => $app_price,
	'source_fund' => $source_fund,
	'mode_pr' => $mode_pr,
	'qty' => $qty,
	'remarks' => $remarks	
];

print_r($data);

//Else proceed in saving data

// if ($is_new) {
// 	insertDetails($conn, $data);
// 	$_SESSION['toastr'] = $am->addFlash('success', 'Applicant has been successfully added.', 'Add New');
// 	header('location:../admin_application_edit.php?appid='.$token);
// } else {
// 	updateDetails($conn, $data);
// 	$_SESSION['toastr'] = $am->addFlash('success', 'Applicant has been successfully updated.', 'Update');
// }




// function insertDetails($conn, $data) {
// 	$sql = "INSERT INTO tbl_app_checklist(control_no, user_id, agency,establishment, nature, address, person,contact_details, status, has_consent, date_created, date_proceed, receiver_id, date_received, token,application_type, lgu) VALUES('".$data['control_no']."', ".$data['userid'].", '".$data['agency']."', '".$data['establishment']."', '".$data['nature']."', '".$data['address']."', '".$data['person']."', '".$data['contact_details']."', '".$data['status']."', true, '".$data['date_registered']."', '".$data['date_registered']."', '".$data['userid']."', '".$data['date_registered']."', '".$data['token']."', '".$data['application_type']."', '".$data['lgu']."')";

// 	$result = mysqli_query($conn, $sql);
//     return $result;
// }

function getMode($mode_val,$mode)
{
	for ($i=0; $i < count($mode); $i++) { 
		$mode_val .= $mode[$i];
	}
	return $mode_val;
}

function getFund($fund_val, $fund)
{
	for ($i=0; $i < count($fund) ; $i++) { 
		$fund_val .= $fund[$i];
	}
	return $fund_val;
}
exit();
