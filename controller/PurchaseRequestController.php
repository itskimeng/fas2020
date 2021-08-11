<?php
date_default_timezone_set('Asia/Manila');

require 'manager/PR_Manager.php';


    $conn=mysqli_connect("localhost","fascalab_2020","w]zYV6X9{*BN","fascalab_2020");
if(!$conn)
{
die("Connection failed: " . mysqli_connect_error());
echo 'a';
}


$pr = new PR_Manager();


$pmo = $pr->getPMO();




?>

