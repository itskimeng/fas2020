<?php
session_start();
date_default_timezone_set('Asia/Manila');

require 'ICTTechnicalAssistance/manager/ICTTechAssistanceManager.php';


$admin = ['Mark','Maybelline'];
$default_year = '2023';
$ict = new ICTTechAssistanceManager();

$tasks      = ($_GET['role'] == '21232f297a57a5a743894a0e4a801fc3') ? $ict->getData(null,$_GET['quarter'],$default_year) : $ict->getData($_SESSION['currentuser'],$_GET['quarter'],$default_year);   //$ict->getData($_GET['quarter'],$default_year);
$ict_opts   = ($_GET['role'] == '21232f297a57a5a743894a0e4a801fc3') ? $ict->monitoringTable($_GET['role'],$_GET['year'])  : $ict->monitoringTable($_SESSION['currentuser'],$_GET['year']);
$rictu_opts = $ict->fetchRICTUDetails();
$workload   = $ict->fetchWorkLoad();
$psl_opts = $ict->fetchPSLDataSheet($_GET['quarter'],$_GET['year']);




?>
