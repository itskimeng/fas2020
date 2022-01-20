<?php
session_start();

require_once 'Model/Connection.php';
require_once 'Model/APP.php';
date_default_timezone_set('Asia/Manila');

$data = new APP();
$division = $_GET['division'];

$path = 'GSS/route/';
$app_sn = $data->fetch();
$pmo_list = $data->setPMO();
$app = $data->fetchAPP($_GET['page']);
$app_category = $data->setCategory();
$pages = $data->setPages();
$app_unit = $data->getItemUnit();
$app_stockn = $data->setStockNo();










