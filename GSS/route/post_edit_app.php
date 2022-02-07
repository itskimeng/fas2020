<?php
session_start();
date_default_timezone_set('Asia/Manila');

require_once "../../Model/Connection.php";
require_once "../../Model/Procurement.php";

$pr = new Procurement();

$sn = $_GET['stockNo'];
if ($_GET['mode'] == 'Small Value Procurement') {
    $mode = 1;
} else if ($_GET['mode'] == 'Shopping') {
    $mode = 2;
} else if ($_GET['mode'] ==  'NP Lease of Venue') {
    $mode = 4;
} else if ($_GET['mode'] == 'Direct Contracting') {
    $mode = 5;
} else if ($_GET['mode'] == 'Agency to Agency') {
    $mode = 6;
} else if ($_GET['mode'] == 'Public Bidding') {
    $mode = 7;
} else if ($_GET['mode'] == 'Not Applicable N/A') {
    $mode = 8;
}
if ($_GET['office'] == 'ORD') {
    $office = 1;
} else if ($_GET['office'] == 'LGMED-MBRTG') {
    $office = 7;
} else if ($_GET['office'] == 'LGCDD-PDMU') {
    $office = 9;
} else if ($_GET['office'] == 'FAD') {
    $office = 10;
} else if ($_GET['office'] == 'LGCDD') {
    $office = 17;
} else if ($_GET['office'] == 'LGMED') {
    $office = 18;
} else if ($_GET['office'] == 'BATANGAS') {
    $office = 19;
} else if ($_GET['office'] == 'CAVITE') {
    $office = 20;
} else if ($_GET['office'] == 'LAGUNA') {
    $office = 21;
} else if ($_GET['office'] == 'QUEZON') {
    $office = 22;
} else if ($_GET['office'] == 'RIZAL') {
    $office = 23;
} else if ($_GET['office'] == 'LUCENA') {
    $office = 24;
}

$pr->update(
    'app',
    [
        'code' => $_GET['code'],
        'procurement' => $_GET['itemTitle'],
        'unit_id' => $_GET['unit'],
        'category_id' => $_GET['category'],
        'pmo_id' => $office,
        'qty' => $_GET['qty'],
        'app_price' => $_GET['app_price'],
        'mode_of_proc_id' => $mode,
    ],
    "sn='$sn'"
);
