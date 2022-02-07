<?php
session_start();
date_default_timezone_set('Asia/Manila');

require_once "../../Model/Connection.php";
require_once "../../Model/Obligation.php";

$ob = new Obligation();

$user = $_SESSION['currentuser'];

print_r($_POST);
die();

$dd = [
	'type' 			=> $_POST['ob_type'],
	'is_dfund' 		=> isset($_POST['dfunds']) ? true : false,
	'serial_no' 	=> $_POST['serial_no'],
	'po_id' 		=> $_POST['po_no'],
	'supplier' 		=> $_POST['supplier'],
	'address' 		=> $_POST['address'],
	'amount' 		=> isset($_POST['total_amount']) ? $_POST['total_amount'] : $_POST['po_amount'],
	'purpose' 		=> $_POST['particulars'],
	'created_by'	=> $user
]; 

$id = $ob->post($dd);

if (isset($_POST['save'])) {
	header('location:../../budget_obligation_edit.php?id='.$id);
} else {
	header('location:../../budget_create_obligation.php');
}
