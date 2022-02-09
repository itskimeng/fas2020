<?php
session_start();
date_default_timezone_set('Asia/Manila');
require_once "../../Model/Connection.php";
require '../../Model/Procurement.php';


$pr = new Procurement();
$today = new DateTime();

$rfq_no = $_GET['rfq'];
$purpose = $_GET['purpose'];
$rfq_date = date('Y-m-d',strtotime($_GET['rfq_date']));
$pr_no = $_GET['pr_no'];
$quotation_date = date('Y-m-d',strtotime($_GET['q_date']));



$pr->insert(
    'rfq',
    [
        'rfq_no'=>$rfq_no,
        'purpose'=>$purpose,
        'rfq_date'=>$rfq_date,
        'pr_no'=>$pr_no,
        'quotation_date'=>$quotation_date,
        'stat' => Procurement::STATUS_WITH_RFQ
    ]);

$pr->update( 'pr', 
[ 
    'stat'=> Procurement::STATUS_WITH_RFQ ,
], 
"pr_no='$id'" );

