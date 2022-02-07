<?php
session_start();
date_default_timezone_set('Asia/Manila');

require_once '../../Model/Connection.php';
require_once '../manager/BudgetManager.php';

$bm = new BudgetManager();
$startdate = new DateTime($_GET['startdate']);
$enddate = new DateTime($_GET['enddate']);

$data = $bm->getFundSources($startdate->format('Y-m-d 00:00:00'), $enddate->format('Y-m-d 23:59:59'));

echo json_encode($data);
