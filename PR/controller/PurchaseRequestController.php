<?php
date_default_timezone_set('Asia/Manila');

require 'manager/PR_Manager.php';


$conn = mysqli_connect("localhost", "fascalab_2020", "w]zYV6X9{*BN", "fascalab_2020");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


$pr = new PR_Manager();
$pr_count = $pr->fetchPRStatusCount();

$pmo = $pr->getPMO();
$pr_details = $pr->fetchPRInfo();
$get_pr = $pr->fetchPrNo('2021');
if(isset($_GET['office'])){ 
    $office=$_GET['office'];
}
if(isset($_GET['pr_no']))
{
    $pr_no = $_GET['pr_no'];
}

?>

