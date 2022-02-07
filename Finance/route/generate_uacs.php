<?php
session_start();
date_default_timezone_set('Asia/Manila');

require_once "../../Model/Connection.php";
require_once "../../Model/Obligation.php";
require_once "../manager/BudgetManager.php";

$ob = new Obligation();
$bm = new BudgetManager();

$id = $_GET['fs'];

$uacs = $bm->getFSUACS($id);

echo json_encode($uacs);