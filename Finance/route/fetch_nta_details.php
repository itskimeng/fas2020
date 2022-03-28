<?php
date_default_timezone_set('Asia/Manila');
session_start();

require_once "../../connection.php";

$id = $_GET['id'];



$sql = "SELECT `id`, `nta_date`, `received_date`, `nta_number`, `saro_number`, `account_number`, `particular`, `quarter`, `amount`, `obligated`, `balance`, `created_by`, `date_created`, `status` FROM `tbl_nta` WHERE id = $id";
$exec = $conn->query($sql);
$row = $exec->fetch_assoc();

echo json_encode($row);
?>