<?php
session_start();
date_default_timezone_set('Asia/Manila');

require_once "../../Model/Connection.php";
require_once "../../Model/RequestForQuatation.php";

$rfq = new RequestForQuotation();
$rfq_no = $_POST['rfq_no'];
$rfq_date = date('Y-m-d',strtotime($_POST['date']));

    
$rfq->update(
    'rfq',
    [
        'rfq_date' => $rfq_date
    ],
    "rfq_no='$rfq_no'"
);
