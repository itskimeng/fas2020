<?php 
date_default_timezone_set('Asia/Manila');
$conn = mysqli_connect("localhost","fascalab_2020","w]zYV6X9{*BN","fascalab_2020");

$id = $_POST['id'];
$availability_code = $_POST['code'];

$query = mysqli_query($conn,"UPDATE pr SET `budget_availability_status` = 'CERTIFIED', availability_code = '$availability_code', date_certify = NOW() WHERE id = $id ");


?>