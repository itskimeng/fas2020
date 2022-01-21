<?php
session_start();
date_default_timezone_set('Asia/Manila');

require_once "../../Model/Connection.php";
require_once "../../Model/Obligation.php";

$ob = new Obligation();

$user = $_SESSION['currentuser'];

$dd = [
	'type' 				=> $_POST['ob_type'],
	'is_dfund' 			=> isset($_POST['dfunds']) ? true : false,
	'serial_no' 		=> $_POST['serial_no'],
	'po_id' 			=> $_POST['po_no'],
	'supplier' 			=> $_POST['supplier'],
	'address' 			=> $_POST['address'],
	'amount' 			=> isset($_POST['total_amount']) ? $_POST['total_amount'] : $_POST['po_amount'],
	'purpose' 			=> $_POST['particulars'],
	// 'date_received'		=> !empty($data['date_received']) ? new DateTime($data['date_received']) : '',
	// 'date_obligated'	=> !empty($data['date_processsed']) ? new DateTime($data['date_processsed']) : '',
	// 'date_released'		=> !empty($data['date_processsed']) ? new DateTime($data['date_processsed']) : '',  
	'created_by'		=> $user
]; 

$ob->post($dd);


if (isset($_POST['save'])) {
	// header('location:../../budget_create_obligation.php');
} else {
	header('location:../../budget_ors.php');

}
