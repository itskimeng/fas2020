<?php
session_start();
date_default_timezone_set('Asia/Manila');

require_once "../../Model/Connection.php";
require_once "../../Model/RequestForQuatation.php";

$rfq = new RequestForQuotation();
$rfq_id = $_POST['rfq_id'];
$rfq_no = $_POST['rfq_no'];
$mode = $_POST['mode_val'];
$rfq_date = date('Y-m-d',strtotime($_POST['date']));

$rfq->update(
    'rfq',
    [
        'rfq_no' => $rfq_no,
        'rfq_mode_id' => $mode,
        'rfq_date' => $rfq_date
    ],
    "id='$rfq_id'"
);
