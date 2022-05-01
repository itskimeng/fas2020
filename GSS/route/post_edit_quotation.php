<?php
session_start();
date_default_timezone_set('Asia/Manila');

require_once "../../Model/Connection.php";
require_once "../../Model/Procurement.php";

$pr = new Procurement();
$ppu_supplier = $_GET['ppu_supplier'];
$ppu          = $_GET['cform-ppu'];
$id           = $_GET['cform-id'];

$pr->update(
    'supplier_quote',
    [
        'supplier_id' => $ppu_supplier,
        'ppu' => $ppu,
    ],
    "id='$id'"
);
?>