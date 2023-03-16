<?php
session_start();
date_default_timezone_set('Asia/Manila');

require 'ICTTechnicalAssistance/manager/ICTTechAssistanceManager.php';


$office = $_GET['division'];
$admin = ['Mark','Maybelline'];
$default_year = '2023';
$ict = new ICTTechAssistanceManager();

$tasks      = ($_GET['role'] == '21232f297a57a5a743894a0e4a801fc3') ? $ict->getData(null,$_GET['quarter'],$default_year) : $ict->getData($_SESSION['complete_name2'],$_GET['quarter'],$default_year);   //$ict->getData($_GET['quarter'],$default_year);
$ict_opts   = ($_GET['role'] == '21232f297a57a5a743894a0e4a801fc3') ? $ict->monitoringTable($_GET['role'])  : $ict->monitoringTable($_SESSION['complete_name2']);
$rictu_opts = $ict->fetchRICTUDetails();
$workload   = $ict->fetchWorkLoad();

?>
