<?php
session_start();
date_default_timezone_set('Asia/Manila');

require_once "../../Model/Connection.php";
require_once "../../Model/Procurement.php";
$conn = mysqli_connect("localhost", "fascalab_2020", "w]zYV6X9{*BN", "fascalab_2020");

$pr = new Procurement();

$pr_no = $_GET['pr_no'];
$target_date = date('Y-m-d',strtotime($_GET['target_date']));
$pr_date = date('Y-m-d',strtotime($_GET['pr_date']));
$type = $_GET['type'];
$purpose = $_GET['purpose'];


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
for ($i = 0; $i < count($_GET['items1']); $i++) {
    echo $_GET['unit1'][$i];
    
    $item_title =   $_GET['item_title'][$i];
    $abc        =   $_GET['abc1'][$i];
    $description =   $_GET['description1'][$i];
    $unit       =   $_GET['unit1'][$i];
    $qty        =   $_GET['qty1'][$i];
    $total      =   $_GET['grand_total'][$i];
    $items      =   $_GET['items1'][$i];

    $select_app_id = mysqli_query($conn, "SELECT id,sn FROM app WHERE id = $items");
    $rowAI = mysqli_fetch_array($select_app_id);
    $snAi = $rowAI['sn'];

    $insert_items = mysqli_query($conn, 'INSERT INTO pr_items(pr_no,items,description,unit,qty,abc)
      VALUES("' . $pr_no . '","' . $_GET['app_items'][$i] . '","' . $_GET['description1'][$i] . '","' .$_GET['unit1'][$i] . '","' . $_GET['qty1'][$i] . '","' . $_GET['abc1'][$i] . '")');

    // $update_minus = mysqli_query($conn, 'UPDATE app_items SET qty_original = qty_original - ' . $_GET['qty1'][$i] . ' WHERE pmo_id = ' . $office . ' AND sn = "' . $snAi . '" ');
}