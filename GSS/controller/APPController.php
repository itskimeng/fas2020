<?php
session_start();
date_default_timezone_set('Asia/Manila');

require_once 'Model/Connection.php';
require_once 'GSS/manager/GSSManager.php';

$data = new GSSManager();
$division = $_GET['division'];

$path = 'GSS/route/';
$app_sn = $data->fetch();
$pmo_list = $data->setPMO();
$app = $data->fetchAPP($_GET['page']);
$app_category = $data->setCategory();
$pages = $data->setPages();
$app_unit = $data->getItemUnit();
$app_stockn = $data->setStockNo();










