<?php
session_start();
date_default_timezone_set('Asia/Manila');

require_once "../../Model/Connection.php";
require_once "../../Model/Procurement.php";

$pr = new Procurement();
$pr_no = $_POST['pr_no'];


$pr->update( 'pr', 
    [ 
        'received_by' => $name,
        'stat' => Procurement::STATUS_RECEIVED_BY_GSS,
        'submitted_date_gss'=>date('Y-m-d H:i:a'),
        'submitted_by_gss'=>$_SESSION['username'],
    ], 
"pr_no='$pr_no'");
$pr->insert('tbl_pr_history',
[
    'PR_NO'=>$pr_no,
    'ACTION_DATE'=>date('Y-m-d H:i:s'),
    'ACTION_TAKEN' => Procurement::STATUS_RECEIVED_BY_GSS, 
    'ASSIGN_EMP'=>$_SESSION['currentuser']
]);
