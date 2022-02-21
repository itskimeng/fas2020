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
$rfq_id         =       $rfq->fetchLatestRFQID();
$supplier_opts  =       $rfq->fetchSupplier();
$rfq_details    =       $rfq->fetchRFQDetails($_GET['pr_no'],$_GET['rfq_no']);
$rfq_items      =       $rfq->fetchRFQItems($_GET['pr_no']);
$is_awarded     =       $rfq->checkRFQ($_GET['rfq_no']);
$supplier_quote =       $rfq->fetchSupplierQuote($_GET['rfq_no']);
$sel_supplier_quote =       $rfq->fetchSelectedSupplier($_GET['rfq_no']);

$supplier_item_quotation = $rfq->fetchSupplierItem($_GET['pr_no']);
$count_supp_item = $rfq->countItem($_GET['pr_no']);



?>

