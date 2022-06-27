<?php
session_start();
date_default_timezone_set('Asia/Manila');

require_once "../../Model/Connection.php";
require_once "../../Model/Procurement.php";
$conn = mysqli_connect("localhost", "fascalab_2020", "w]zYV6X9{*BN", "fascalab_2020");

$pr = new Procurement();

$qty = $_GET['quantity'];
$desc = $_GET['description'];
$unit = $_GET['unit-id'];
$abc = $_GET['abc'];
$id = $_GET['app-items'];
$item_id = $_GET['app-id'];
$pr_id = $_GET['id'];

$pr->update(
    'pr_items',
    [
        'qty' => $qty,
        'abc' => $abc,
        'description' => $desc,
        'unit' => $unit,
        'items' => $_GET['app-items']
    ],
    "items='$id' and id = '$item_id'"
);

$pr->insert(
    'tbl_pr_history',
    [
        'PR_NO' => $pr_no,
        'PR_ID' => $pr_id,
        'ACTION_DATE' => date('Y-m-d H:i:s'),
        'ACTION_TAKEN' => Procurement::STATUS_AWARDED,
        'ASSIGN_EMP' => $_SESSION['currentuser']
    ]
);

