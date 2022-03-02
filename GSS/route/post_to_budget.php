<?php 
session_start();
date_default_timezone_set('Asia/Manila');

require_once "../../Model/Connection.php";
require_once "../../Model/Procurement.php";

$pr = new Procurement();
$currdate = date('Y-m-d');
$id = $_GET['pr_no'];
$username = $_GET['username'];


$pr->update( 'pr', 
[ 
    'stat'=> Procurement::STATUS_SUBMITTED_TO_BUDGET ,
    'budget_availability_status' => 'Submitted',
    'submitted_date' => $currdate,
    'submitted_by' => $_SESSION['username']
], 
"pr_no='$id'" );

$pr->insert('tbl_pr_history',
[
    'PR_NO'=>$id,
    'ACTION_DATE'=>date('Y-m-d H:i:s'),
    'ACTION_TAKEN' => Procurement::STATUS_SUBMITTED_TO_BUDGET, 
    'ASSIGN_EMP'=>$_SESSION['currentuser']
]);
header('location: ../../procurement_request_for_quotation.php?division='.$_GET['division']);

