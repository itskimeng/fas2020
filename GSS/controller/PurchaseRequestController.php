<?php
date_default_timezone_set('Asia/Manila');
// PURCHASE REQUEST CONTROLLER
require 'manager/PR_Manager.php';


$conn = mysqli_connect("localhost", "fascalab_2020", "w]zYV6X9{*BN", "fascalab_2020");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


$pr = new PR_Manager();
$pr_count = $pr->fetchPRStatusCount();
$office = $_GET['division'];

$pmo = $pr->getPMO();
$pr_details = $pr->fetchPRInfo($office);
$get_pr = $pr->fetchPrNo('2022');
if(isset($_GET['office'])){ 
    $office=$_GET['office'];
}
if(isset($_GET['pr_no']))
{
    $pr_no = $_GET['pr_no'];
}

?>

