<?php
session_start();
date_default_timezone_set('Asia/Manila');

require_once "../../Model/Connection.php";
require_once "../../Model/Procurement.php";

$pr = new Procurement();

$id = $_POST['id'];
$pr_no = $_POST['pr_no'];


$pr->update(
    'pr_items',
    [
        'description' => $_POST['description'],
        'items' => $_POST['app_item'],
        'qty' => $_POST['qty'],
        'unit' => $_POST['unit'],
        'abc' => $_POST['unit_cost'],
        'date_a' => date('Y-m-d H:i:s')
    ],
    "pr_no='$pr_no' AND id = '$id'"
);
