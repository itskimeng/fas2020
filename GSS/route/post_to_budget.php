<?php 
session_start();
date_default_timezone_set('Asia/Manila');

require_once "../../Model/Connection.php";
require_once "../../Model/Procurement.php";

$pr = new Procurement();
$currdate = date('Y-m-d');
$id = $_GET['id'];
$username = $_GET['username'];


$pr->update( 'pr', 
[ 
    'stat'=> Procurement::STATUS_SUBMITTED_TO_BUDGET ,
    'budget_availability_status' => 'Submitted',
    'submitted_date_budget' => $currdate,
    'submitted_date' => $currdate,
    'submitted_by' => $_SESSION['username']
], 
    "pr_no='$id'" );
header('location: ../../procurement_purchase_request.php?division='.$_GET['division']);

