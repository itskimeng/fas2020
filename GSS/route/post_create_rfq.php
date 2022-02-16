<?php
session_start();
date_default_timezone_set('Asia/Manila');
require_once "../../Model/Connection.php";
require '../../Model/Procurement.php';


$pr = new Procurement();
$today = new DateTime();

$rfq_no = $_GET['rfq_no'];
$purpose = $_GET['purpose'];
$rfq_date = date('Y-m-d', strtotime($_GET['rfq_date']));
$pr_no = $_GET['pr_no'];



$pr->insert(
    'rfq',
    [
        'rfq_no' => $rfq_no,
        'purpose' => $purpose,
        'rfq_date' => $rfq_date,
        'pr_no' => $pr_no,
        'stat' => Procurement::STATUS_WITH_RFQ
    ]
);
$pr->insert(
    'tbl_pr_history',
    [
        'PR_NO' => $pr_no,
        'ACTION_DATE' => date('Y-m-d H:i:s'),
        'ACTION_TAKEN' => Procurement::STATUS_WITH_RFQ,
        'ASSIGN_EMP' => $_SESSION['currentuser']
    ]
);

$pr->update(
    'pr',
    [
        'stat' => Procurement::STATUS_WITH_RFQ,
    ],
    "pr_no='$pr_no'"
);
