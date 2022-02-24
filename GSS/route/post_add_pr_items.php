<?php
session_start();
date_default_timezone_set('Asia/Manila');
require_once "../../Model/Connection.php";
require '../../Model/Procurement.php';
$pr = new Procurement();
$today = new DateTime();

$pr_no      = $_POST['pr_no'];
$item_title = $_POST['item_title'];
$app_items  = $_POST['app_items'];
$qty        = $_POST['qty'];
$unit       = $_POST['unit'];
$desc       = $_POST['desc'];
$unit_cost  = $_POST['unit_cost'];
$pr->insert(
    'pr_items',
    [
        'pr_no'=>$pr_no,
        'items'=>$app_items,
        'description'=>$desc,
        'unit'=>$unit,
        'qty'=>$qty,
        'abc'=>$qty*$unit_cost
    ]);




