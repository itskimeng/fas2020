<?php
session_start();
date_default_timezone_set('Asia/Manila');

require_once '../../Model/Connection.php';
require_once '../manager/BudgetManager.php';

$bm = new BudgetManager();

$d1 = new DateTime($_GET['date1']);
$d2 = new DateTime($_GET['date2']);

$data = $bm->getFundSourcesFilter($d1->format('Y-m-d 00:00:00'), $d2->format('Y-m-d 23:59:59'));

echo json_encode($data);