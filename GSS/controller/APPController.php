<?php
require_once 'Model/Connection.php';
require_once 'Model/APP.php';

$data = new APP();

$path = 'route';
$app_sn = $data->fetch();
$pmo = $data->setPMO();
$app = $data->fetchAPP($_GET['page']);
$app_category = $data->setCategory();
$pages = $data->setPages();







