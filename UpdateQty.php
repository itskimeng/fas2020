<?php 
$id = $_GET['id'];
date_default_timezone_set('Asia/Manila');

$conn = mysqli_connect("localhost","fascalab_2020","w]zYV6X9{*BN","fascalab_2020");



$selectQuery = mysqli_query($conn,"SELECT * FROM ris_stock_issuetomany WHERE id = '$id' ");
$row = mysqli_fetch_array($selectQuery);
$procurement_id = $row['procurement_id'];
$qty = $row['qty'];
$UpdateQty = mysqli_query($conn,"UPDATE iar_stock SET qty = qty - '$qty' WHERE id = '$procurement_id' ");
$UpdateStatus = mysqli_query($conn,"UPDATE ris_stock_issuetomany SET status = 1 WHERE id = '$id' ");
header("Location:ViewRISmany.php");
?>