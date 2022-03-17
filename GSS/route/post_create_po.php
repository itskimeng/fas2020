
<?php
session_start();
date_default_timezone_set('Asia/Manila');
require_once "../../Model/Connection.php";
require '../../Model/Procurement.php';
$pr = new Procurement();
$today = new DateTime();

$po_no    =   $_POST['cform-po-no'];
$rfq_no   =   $_POST['cform-rfq-no'];
$rfq_id   =   $_POST['cform-rfq-id'];
$supplier =   $_POST['supplier'];  
$amount   =   $_POST['cform-amount'];  
$po_date  =   date('Y-m-d',strtotime($_POST['cform-po-date']));  
$ntp_date =   date('Y-m-d',strtotime($_POST['cform-ntp-date']));  
$noa_date =   date('Y-m-d',strtotime($_POST['cform-noa-date']));  

$pr->insert(
    'po',
    [
        'id'=>null,
        'po_no'=>$po_no,
        'rfq_no'=>$rfq_no,
        'rfq_id'=>$rfq_id,
        'po_date'=>$po_date,
        'noa_date'=>$noa_date,
        'ntp_date'=>$ntp_date,
        'po_amount'=>$amount,
    ]);
 header('Location: ../../procurement_request_for_quotation.php');
 