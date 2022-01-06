<?php 
$id = $_POST['id'];
$note = $_POST['note'];
$option = $_POST['option'];

$conn = mysqli_connect("localhost","fascalab_2020","w]zYV6X9{*BN","fascalab_2020");
$activate = mysqli_query($conn,"UPDATE `tblemployeeinfo` SET `STATUS` = 1, `CURRENT_STATUS` = '$option', `REMARKS` = '$note' WHERE EMP_N = $id");

