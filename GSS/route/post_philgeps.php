
<?php
session_start();
date_default_timezone_set('Asia/Manila');
require_once "../../Model/Connection.php";
require '../../Model/Procurement.php';
$pr = new Procurement();

$philgeps_no     =   $_POST['cform-philgeps'];
$id     =   $_POST['cform-id'];
$posting_date    =   date('Y-m-d',strtotime($_POST['posted_date']));
$closing_date    =   date('Y-m-d',strtotime($_POST['closing_date']));

$pr->update(
    'rfq',
    [
        'philgeps_no' => $philgeps_no,
        'posting_date' => $posting_date,
        'closing_date' => $closing_date

    ],
    "id='$id'"
);


header('Location: ../../procurement_request_for_quotation.php');
