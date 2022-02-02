<?php
session_start();
date_default_timezone_set('Asia/Manila');

require_once "../../Model/Connection.php";
require_once "../../Model/Procurement.php";

$pr = new Procurement();
$pr_no = $_POST['pr_no'];


$pr->update( 'pr', 
    [ 
        'stat' => Procurement::STATUS_SUBMITTED_TO_GSS,
        'submitted_date_gss'=>date('Y-m-d'),
        'submitted_by_gss'=>$_SESSION['username'],
    ], 
    "pr_no='$pr_no'");
