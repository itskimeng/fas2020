<?php
session_start();
date_default_timezone_set('Asia/Manila');
require_once "../../Model/Connection.php";
require '../../Model/Procurement.php';
$pr = new Procurement();
$today = new DateTime();
$conn = mysqli_connect("localhost", "fascalab_2020", "w]zYV6X9{*BN", "fascalab_2020");

$pr_no          = $_POST['pr_no'];
$pr_id          = $_POST['pr_id'];
$stocknumber    = $_POST['pr_no'];
$item           = $_POST['item'];
$description    = $_POST['description'];
$unit_id        = $_POST['unit_id'];
$unit_cost      = $_POST['unit_cost'];
$quantity       = $_POST['quantity'];
$pmo            = $_POST['pmo'];

$pr->insert(
    'pr_items',
    [
        'pr_id' => $pr_id,
        'pr_no' => $pr_no,
        'items' => $item,
        'description' => $description,
        'unit' => $unit_id,
        'qty' => $quantity,
        'abc' => $unit_cost,
        'pmo' => $pmo,
    ]
);



