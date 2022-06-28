<?php
session_start();
date_default_timezone_set('Asia/Manila');

require_once "../../Model/Connection.php";
require_once "../../Model/Procurement.php";
$conn = mysqli_connect("localhost", "fascalab_2020", "w]zYV6X9{*BN", "fascalab_2020");

$pr = new Procurement();

$pr_no = $_POST['pr_no'];
$pr_id = $_POST['pr_id'];
$reason = $_POST['reason'];
$pr->update(
    'pr',
    [
        'stat' => Procurement::STATUS_CANCEL_PR,
        'action_officer' => $_SESSION['currentuser'],
        'action_date' => date('Y-m-d H:i:s'),
        'reason_gss' => $reason
    ],
    "pr_no='$pr_no'"
);
$pr->insert(
    'tbl_pr_history',
    [
        'PR_NO' => $pr_no,
        'PR_ID' => $pr_id,
        'ACTION_DATE' => date('Y-m-d H:i:s'),
        'ACTION_TAKEN' => Procurement::STATUS_CANCEL_PR,
        'ASSIGN_EMP' => $_SESSION['currentuser']
    ]
);
