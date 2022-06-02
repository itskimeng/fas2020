<?php
session_start();
date_default_timezone_set('Asia/Manila');
require_once "../../Model/Connection.php";
require '../../Model/Procurement.php';
$pr = new Procurement();
$today = new DateTime();
$conn = mysqli_connect("localhost", "fascalab_2020", "w]zYV6X9{*BN", "fascalab_2020");

$pr_no = $_GET['cform-pr-no-hidden'];
$user = $_GET['cform-user-hidden'];
$office = $_GET['cform-office-hidden'];


$pr->insert(
    'pr',
    [
        'pr_no' => $pr_no,
        'pmo' => $office,
        'pr_date' => date('Y-m-d'),
        'stat' => 0,
        'username' => $user,
        'submitted_by' => $user
    ]
);

function setUnit($unit_val)
{
    $unit = [
        'bottle' => 11,
        'box' => 2,
        'bundle' => 14,
        'can' => 10,
        'cart' => 21,
        'crtg' => 6,
        'dozen' => 18,
        'gallon' => 20,
        'jar' => 13,
        'lot' => 4,
        'pack' => 7,
        'pad' => 15,
        'pair' => 19,
        'piece' => 1,
        'pouch' => 17,
        'ream' => 3,
        'roll' => 9,
        'set' => 12,
        'tube' => 8,
        'unit' => 5,
        'pax' => 22,
        'liters' => 23,
        'meters' => 24
    ];
}
