<?php
session_start();
date_default_timezone_set('Asia/Manila');

require 'GSS/manager/GSSManager.php';
$office = $_GET['division'];
$admin = ['masacluti','jsodsod','jecastillo','cmfiscal'];
if(isset($_GET['id']))
{
    $id=$_GET['id'];
}else{
    $id = $_GET['pr_no'];
}
$gm = new GSSManager();
$route = 'GSS/route/';
$pr_count       = $gm->fetchPRStatusCount();
$pmo            = $gm->getPMO();
$pr_details     = $gm->fetchPRInfo($office);
$get_pr         = $gm->fetchPrNo('2022');
$pr_data        = $gm->view_pr($id);
$pr_items       = $gm->view_pr_items($id);
$pr             = $gm->fetch_abc($_GET['id']);
$unit_opts      = $gm->getItemUnit();
$pr_unit_opts      = $gm->getAppItemUnit();
$mode_opts      = $gm->getMode();
$monitor_pr     = $gm->monitorPR();
$encoded_pr     = $gm->countEncodePR();
$trans_opt      = $gm->transparencyTable();
?>

