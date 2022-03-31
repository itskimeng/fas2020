<?php
date_default_timezone_set('Asia/Manila');
session_start();

require_once "../../connection.php";

$id = $_GET['id'];



$sql = "SELECT `id`, `account_no`, `dv_no`, `status`, `date_created`, `lddap`, `remarks`, DATE_FORMAT(`lddap_date`, '%M %d, %Y') AS lddap_date, `link`, `disbursed_amount`, `balance`, `fundsource_amount`, `is_dfunds`, `province` FROM `tbl_payment` WHERE id = $id";
$exec = $conn->query($sql);
$row = $exec->fetch_assoc();

echo json_encode($row);
?>