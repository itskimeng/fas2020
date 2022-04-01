<?php
session_start();
date_default_timezone_set('Asia/Manila');

require 'GSS/manager/RFQManager.php';
require 'Model/Procurement.php';

$office = $_SESSION['division'];
$admin = ['masacluti','jsodsod','jecastillo','cmfiscal'];

$rfq = new RFQManager();
$pr = new Procurement();
$route = 'GSS/route/';
$supplier_id = '';
$flag = '';
$getPO = '';
if(isset($_GET['supplier_id']))
{
    $supplier_id =$_GET['supplier_id'];
}
if(isset($_GET['flag']))
{
    $flag =$_GET['flag'];
}
if(isset($_GET['po_no']))
{
    $getPO=$_GET['po_no'];
}

$rfq_pending_pr_opts     =       $rfq->fetch(Procurement::STATUS_SUBMITTED_TO_GSS);
$rfq_data                =       $rfq->fetchRFQ();
$rfq_no                  =       $rfq->generateRFQNo();
$po_no                   =       $rfq->generatePONo();
$rfq_id                  =       $rfq->fetchLatestRFQID();
$ids                     =       $rfq->fetchRFQID($_GET['rfq_no']);
$pr_id                   =       $rfq->fetchPRID($_GET['pr_no']);

$rfq_details             =       $rfq->fetchRFQDetails($_GET['rfq_no']);
$rfq_items               =       $rfq->fetchRFQItems($_GET['rfq_no']);
$rfq_pr_opts             =       $rfq->fetchPendingPR(Procurement::STATUS_RECEIVED_BY_GSS);
$rfq_mode_opts           =       $rfq->fetchModeofProc();
$fetch_rfq_pos           =       $rfq->fetchSuppAward();
$is_multiple_pr          =       $rfq->fetchMultiplePRtoRFQ($_GET['rfq_no']);
$rfq_report_opt          =        $rfq->fetchRFQReportDetails($_GET['rfq_no']);
$rfq_report_multi_opt    =        $rfq->fetchRFQReportDetailsMultiple($_GET['rfq_no']);


$rfq_item_report_opt     =       $rfq->getchRFQItemSummary($_GET['pr_no']);
$rfq_item_report_multi_opt     =       $rfq->getchMultiRFQItemSummary($_GET['rfq_no']);
$rfq_pos_opt            =       $rfq->fetchPOSdata($supplier_id);
$abs_req_opt            =       $rfq->fetchABSReq();
$_SESSION['is_multiple'] =       $is_multiple_pr;
$_SESSION['is_multiple'] =       $is_multiple_pr;
$_SESSION['rfq_id']      = $rfq_report_multi_opt;



$is_awarded              =       $rfq->checkRFQ($_GET['rfq_no']);
$supplier_quote          =       $rfq->fetchSupplierQuote($_GET['rfq_no']);
$sel_supplier_quote      =       $rfq->fetchSelectedSupplier($_GET['rfq_no']);
$supplier_opts           =       $rfq->fetchSupplier();
$supplier_award_opts     =       $rfq->fetchSuppAward();
$supplier_item_quotation =       $rfq->fetchSupplierItem($_GET['rfq_no'],$flag);
$count_supp_item         =       $rfq->countItem($_GET['pr_no']);
$supplier_winner         =       $rfq->fetchWinnerSupplier($_GET['rfq_no']);
$abstract_no             =       $rfq->generateAbstractNo();
$supplier_item_total     =       $rfq->fetchSupplierTotalABC($_GET['rfq_no']);
$totalABC                =       $rfq->fetchTotalABC($_GET['pr_no']);

$po_opts                 =       $rfq->fetchPO($getPO);
$po                      =       $rfq->purchaseOrderCreateDetails($_GET['rfq_no']);
$supp_opts               =       $rfq->fetchSupplierWinnerDetails($_GET['rfq_no']);
$supplier                =       $rfq->fetchSupplierHistory();
$po_ids                  =       $rfq->fetchPOIds($getPO);
$po_items                =       $rfq->fetchPOItems($_GET['rfq_no']);
$noa_opts                =       $rfq->fetchNOAandNTPData($getPO);


foreach ($rfq_report_multi_opt as $key => $value) {
$pr_no[] = $value['pr_no'];
$mode[] = $value['mode'];
$pmo[] = $value['pmo'];
}
$pr_n = implode(', ',$pr_no);
$mode_n = implode(', ',$mode);
$pmo_n = implode(', ',$pmo);
