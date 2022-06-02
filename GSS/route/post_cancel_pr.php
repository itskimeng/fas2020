<?php
session_start();
date_default_timezone_set('Asia/Manila');

require_once "../../Model/Connection.php";
require_once "../../Model/Procurement.php";
$conn = mysqli_connect("localhost", "fascalab_2020", "w]zYV6X9{*BN", "fascalab_2020");

$pr = new Procurement();

$pr_no = $_POST['pr_no'];
$reason = $_POST['reason'];
$pr->update(
    'pr',
    [
        'stat' => Procurement::STATUS_CANCEL_PR,
        'reason_gss' => $reason
    ],
    "pr_no='$pr_no'"
);
