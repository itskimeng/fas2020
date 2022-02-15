<?php
session_start();
date_default_timezone_set('Asia/Manila');

require 'GSS/manager/RFQManager.php';
require 'Model/Procurement.php';

$office = $_GET['division'];
$admin = ['masacluti','jsodsod','jecastillo','cmfiscal'];

$rfq = new RFQManager();
$pr = new Procurement();
$route = 'GSS/route/';

$rfq_pr_opts    =       $rfq->fetch(Procurement::STATUS_RECEIVED_BY_GSS);
$rfq_data       =       $rfq->fetchRFQ();
$rfq_no         =       $rfq->generateRFQNo();
$supplier_opts  =       $rfq->fetchSupplier();


?>

