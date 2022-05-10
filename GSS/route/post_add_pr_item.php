<?php
session_start();
date_default_timezone_set('Asia/Manila');
require_once "../../Model/Connection.php";
require '../../Model/Procurement.php';
$pr = new Procurement(  );
$today = new DateTime();
$conn = mysqli_connect("localhost", "fascalab_2020", "w]zYV6X9{*BN", "fascalab_2020");

$pr_no          = $_GET['cform-pr-no'];
$pr_id          = $_GET['cform-pr-id'];
$item           = $_GET['cform-app-items'];
$description    = $_GET['cform-description'];
$unit_id        = $_GET['cform-unit-id'];
$unit_cost      = $_GET['cform-abc'];
$quantity       = $_GET['cform-quantity'];
$pmo            = $_GET['cform-pmo'];

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
        'flag'=> '1'
    ]
);



