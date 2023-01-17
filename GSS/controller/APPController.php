<?php
session_start();
date_default_timezone_set('Asia/Manila');

require_once 'Model/Connection.php';
require_once 'GSS/manager/GSSManager.php';

$data = new GSSManager();
$division = $_GET['division'];
$id = $_GET['id'];
$admins = ['masacluti','cmfiscal','jedeleon'];

$path = 'GSS/route/';
$app_sn = $data->fetch();
$pmo_list = $data->setPMO();
$app_pmo_list = $data->setAppPMO();
$app = $data->fetchAPP($admins,$_GET['year']);

$app_category = $data->setCategory();
$pages = $data->setPages();
$app_unit = $data->getItemUnit();
$app_item_unit = $data->getAppItemUnit();
$app_sf = $data->getSF();
$app_mode = $data->getMode();
$app_item_list = $data->getAPPItemList('2023');

$app_opts = $data->getAPP();
// $app_type = ['1' => 'Catering Services', '2' => 'Meals, Venue and Accommodation','3' => 'Repair and Maintenance','4' => 'Supplies, Materials and Devices','5' => 'Other Services','6' => 'Reimbursement and Petty Cash'];
$app_type           =       $data->fetchModeofProc();

$app_stockn = $data->setStockNo();
$app_opts =$data->viewAPPInfo($id);










