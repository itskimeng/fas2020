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

$rfq_pending_pr_opts     =       $rfq->fetch(Procurement::STATUS_RECEIVED_BY_GSS);
$rfq_data                =       $rfq->fetchRFQ();
$rfq_no                  =       $rfq->generateRFQNo();
$po_no                   =       $rfq->generatePONo();
$rfq_id                  =       $rfq->fetchLatestRFQID();
$ids                     =       $rfq->fetchRFQID($_GET['rfq_no']);
$rfq_details             =       $rfq->fetchRFQDetails($_GET['pr_no'],$_GET['rfq_no']);
$rfq_items               =       $rfq->fetchRFQItems($_GET['pr_no']);
$rfq_pr_opts             =       $rfq->fetchPendingPR(Procurement::STATUS_RECEIVED_BY_GSS);
$rfq_mode_opts           =       $rfq->fetchModeofProc();

$is_awarded              =       $rfq->checkRFQ($_GET['rfq_no']);
$supplier_quote          =       $rfq->fetchSupplierQuote($_GET['rfq_no']);
$sel_supplier_quote      =       $rfq->fetchSelectedSupplier($_GET['rfq_no']);
$supplier_opts           =       $rfq->fetchSupplier();
$supplier_item_quotation =       $rfq->fetchSupplierItem($_GET['pr_no']);
$count_supp_item         =       $rfq->countItem($_GET['pr_no']);
$supplier_winner         =       $rfq->fetchWinnerSupplier($_GET['rfq_no']);
$abstract_no             =       $rfq->generateAbstractNo();
$supplier_item_total     =       $rfq->fetchSupplierTotalABC($_GET['rfq_no']);
$totalABC                =       $rfq->fetchTotalABC($_GET['pr_no']);

$po_opts                 =       $rfq->fetchPO($_GET['po_no']);
$po                      =       $rfq->purchaseOrderCreateDetails($_GET['rfq_no']);
$supp_opts               =       $rfq->fetchSupplierWinnerDetails($_GET['pr_no']);
$supplier                =       $rfq->fetchSupplierHistory();

$noa_opts                =       $rfq->fetchNOAandNTPData($_GET['po_no']);
