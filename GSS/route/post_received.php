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
        'stat' => Procurement::STATUS_SUBMITTED_TO_GSS,
        'submitted_date_gss'=>date('Y-m-d H:i:a'),'submitted_by_gss'=>$_SESSION['username'],
    ], 
    "pr_no='$pr_no'");
