<?php
session_start();
date_default_timezone_set('Asia/Manila');

require '../../Model/Connection.php';
require 'GSS/manager/GSSManager.php';

$app = new GSSManager();

$stock_number = $_GET['stock_no'];
$isDuplicate = $app->checkDuplicate($stock_number);
if($isDuplicate)
{
   echo true;
}else{
    echo false;
}

