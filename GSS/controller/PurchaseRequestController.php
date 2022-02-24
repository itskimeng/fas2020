<?php
session_start();
date_default_timezone_set('Asia/Manila');

require 'GSS/manager/GSSManager.php';
$office = $_GET['division'];
$admin = ['masacluti','jsodsod','jecastillo','cmfiscal'];

$gm = new GSSManager();
$route = 'GSS/route/';
$pr_count       = $gm->fetchPRStatusCount();
$pmo            = $gm->getPMO();
$pr_details     = $gm->fetchPRInfo($office);
$get_pr         = $gm->fetchPrNo('2022');
$pr_data        = $gm->view_pr($_GET['id']);
$pr_items       = $gm->view_pr_items($_GET['id']);
$pr             = $gm->fetch_abc($_GET['id']);
$unit_opts      = $gm->getItemUnit();
$mode_opts      = $gm->getMode();
?>

