<?php
session_start();
date_default_timezone_set('Asia/Manila');

require_once "../../Model/Connection.php";
require_once "../../Model/Procurement.php";
$conn = mysqli_connect("localhost", "fascalab_2020", "w]zYV6X9{*BN", "fascalab_2020");

$pr = new Procurement();

$sn = $_GET['sn'];
$qty = $_GET['qty'];
$pr_no = $_GET['pr_no'];
$pr_id = $_GET['pr_id'];
$desc = $_GET['desc'];
$unit = $_GET['unit_id'];
$abc = $_GET['abc'];
$id = substr($_GET['id'], 1);

$pr->update(
    'pr_items',
    [
        'qty' => $qty,
        'abc' => $abc,
        'description' => $desc,
        'unit' => $unit,
        'pr_id' =>$pr_id,
        'pr_no' => $pr_no,
        'items' => $_GET['app_item']
    ],
    "items='$id'"
);
