<?php
session_start();
date_default_timezone_set('Asia/Manila');

require_once "../../Model/Connection.php";
require_once "../../Model/Procurement.php";

$pr = new Procurement();

$pr_no = $_GET['pr_no'];
$target_date = date('Y-m-d',strtotime($_GET['target_date']));
$pr_date = date('Y-m-d',strtotime($_GET['pr_date']));
$type = $_GET['type'];
$purpose = $_GET['purpose'];
print_r($_GET);


$pr->update(
    'pr',
    [
        'purpose' => $purpose,
        'pr_date' => $pr_date,
        'target_date' => $target_date,
        'type' => $type,
        'date_added' => date('Y-m-d H:i:s')
    ],
    "pr_no='$pr_no'"
);
