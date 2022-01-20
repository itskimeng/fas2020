<?php
session_start();
date_default_timezone_set('Asia/Manila');

require '../../Model/Connection.php';
require_once '../../Model/APP.php';

$app = new APP();

$stock_number = $_GET['stock_no'];
$isDuplicate = $app->checkDuplicate($stock_number);
if($isDuplicate)
{
   echo true;
}else{
    echo false;
}

