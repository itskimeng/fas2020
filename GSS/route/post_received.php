<?php
session_start();
date_default_timezone_set('Asia/Manila');

require_once "../../Model/Connection.php";
require_once "../../Model/Procurement.php";

$pr = new Procurement();


$data = [
	'pr_no' 				=> $_POST['pr_no'],
	'received_by' 			=> $_POST['received_by']
]; 

$pr->post_received($data);