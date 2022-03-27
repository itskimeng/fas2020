<?php
session_start();
date_default_timezone_set('Asia/Manila');

require_once "../../Model/Connection.php";
require_once "../../Model/Obligation.php";
require_once "../manager/BudgetManager.php";
require_once "../manager/AccountingManager.php";

$ob = new Obligation();
$bm = new BudgetManager();
$am = new AccountingManager();

$dvs = $_GET['dvs'];
$obs = $_GET['obs'];

$data = [];

$uacs = $bm->getObUACS($obs);
$ntas = $am->getDvNTA($dvs);

$data['uacs'] = $uacs;
$data['ntas'] = $ntas;

echo json_encode($data);