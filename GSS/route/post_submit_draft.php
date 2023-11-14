<?php
session_start();
date_default_timezone_set('Asia/Manila');
require_once "../../Model/Connection.php";
require '../../Model/Procurement.php';
$pr = new Procurement();
$today = new DateTime();
$conn = mysqli_connect("localhost", "fascalab_2020", "w]zYV6X9{*BN", "fascalab_2020");

$pr_no = $_GET['pr_no'];
$id = $_GET['cform-id'];
$type = $_GET['type'];
$pr_date = date('Y-m-d',strtotime($_GET['pr_date']));
$target_date = date('Y-m-d',strtotime($_GET['target_date']));
$purpose = $_GET['purpose'];
$office = $_GET['cform-pmo'];


$is_urgent = $_GET['chk-urgent'];

$unit = setUnit($_GET['unit1']);

$pr->update(
    'pr',
    [
        'pmo' => $office,
        'purpose' => addslashes($purpose),
        'action_officer' => $_SESSION['currentuser'],
        'action_date' => date('Y-m-d H:i:s'),
        'pr_date' => $pr_date,  
        'type' => $type,
        'target_date' => $target_date,
        'fund_source' => $fund_source,
        'stat' => 0,
        'is_urgent' => $is_urgent,
        'username' => $_SESSION['currentuser'],
        'submitted_by' => $_SESSION['currentuser']
    ],
    "id='$id'"

);
exit();
// $pr->insert('tbl_pr_history', ['PR_ID' => $id, 'ACTION_DATE' => date('Y-m-d H:i:s'), 'ACTION_TAKEN' => Procurement::STATUS_DRAFT, 'ASSIGN_EMP' => $_SESSION['currentuser']]);



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
