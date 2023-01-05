<?php
session_start();
date_default_timezone_set('Asia/Manila');

require_once "../../connection.php";
 $default_year = '2023';




$stock_number = $_GET['stockNo'];
$code = $_GET['code'];
$itemTitle = $_GET['itemTitle'];
$unit = $_GET['unit'];
$category = $_GET['category'];
$office = $_GET['hidden-office'];
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


insertDetails($conn,$data,$default_year);


function insertDetails($conn, $data,$default_year) {
	$sql = "INSERT INTO app_items(sn,code,new_entry,merge_code,procurement,unit_id,source_of_funds_id,category_id,pmo_id,qty,qty_original,mode_of_proc_id,price,app_price,remarks,app_year)
			VALUES(
			'".$data['stock_number']."',
			'".$data['code']."',
			1,
			'".$data['code']."',
			'".$data['item_title']."',
			'".$data['unit']."',
			'".$data['source_fund']."',
			'".$data['category']."',
			'".$data['office']."',
			'".$data['qty']."',
			'".$data['qty']."',
			'".$data['mode_pr']."',
			'".$data['app_price']."',
			'".$data['app_price']."',
			'".$data['remarks']."',
			'".$default_year."')";
		$result = mysqli_query($conn, $sql);

	$sql1 = "INSERT INTO app(sn,code,new_entry,merge_code,procurement,unit_id,source_of_funds_id,category_id,pmo_id,qty,mode_of_proc_id,price,app_price,remarks,app_year)
			VALUES(
		'".$data['stock_number']."',
		'".$data['code']."',
		1,
		'".$data['code']."',
		'".$data['item_title']."',
		'".$data['unit']."',
		'".$data['source_fund']."',
		'".$data['category']."',
		'".$data['office']."',
		'".$data['qty']."',
		'".$data['mode_pr']."',
		'".$data['app_price']."',
		'".$data['app_price']."',
		'".$data['remarks']."',
		'".$default_year."')";
		echo $sql1;
		$result = mysqli_query($conn, $sql1);


		return $result;
}

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

