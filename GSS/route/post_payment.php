<?php
session_start();
require_once "../../Model/Connection.php";
require_once "../../Model/Awarding.php";
require_once "../../Model/Procurement.php";

$pr = new Procurement();

    
$id = $_GET['id'];
$pr_id = $_GET['pr_id'];
$pr_no = $_GET['pr_no'];
$pr->update(
    'rfq',
    [
        'stat' => 10,
    ],
    "id='$id'"
);

$pr->update(
    'pr',
    [
        'stat' => 10,
    ],
    "id='$pr_id'"
);

$pr->insert(
    'tbl_pr_history',
    [
        'PR_NO' => $pr_no,
        'PR_ID' => $pr_id,
        'ACTION_DATE' => date('Y-m-d H:i:s'),
        'ACTION_TAKEN' => Procurement::STATUS_DELIVERED_BY_SUPPLIER,
        'ASSIGN_EMP' => $_SESSION['currentuser']
    ]
);

header('location: ../../procurement_request_for_quotation.php');
