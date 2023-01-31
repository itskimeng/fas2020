po<?php
session_start();
date_default_timezone_set('Asia/Manila');

require 'GSS/manager/RFQManager.php';
require 'Model/Procurement.php';

$office = $_SESSION['division'];
$admin = ['masacluti', 'jsodsod', 'jecastillo', 'cmfiscal'];

$rfq = new RFQManager();
$pr = new Procurement();
$route = 'GSS/route/';
$supplier_id = '';
$flag = '';
if (isset($_GET['supplier_id'])) {
    $supplier_id = $_GET['supplier_id'];
}
if (isset($_GET['flag'])) {
    $flag = $_GET['flag'];
}


if($menuchecker['rfq']){
    $rfq_pending_pr_opts     =       $rfq->fetch(Procurement::STATUS_SUBMITTED_TO_GSS);
    $supplier                =       $rfq->fetchSupplierHistory();
    $rfq_data                =       $rfq->fetchRFQ();
    $pr_count                =       $rfq->fetchPRStatusCount();
    $is_multiple_pr          =       $rfq->fetchMultiplePRtoRFQ($_GET['rfq_no']);
    $rfq_no                  =       $rfq->generateRFQNo();
    $supplier_list           =       $rfq->fetchSupplier();
    $abstract_no             =       $rfq->generateAbstractNo();
    $urgent_opts             =       $rfq->fetchUrgent();


    
    
}else if($menuchecker['rfq_form_create']){
    $rfq_mode_opts           =       $rfq->fetchModeofProc();
    $rfq_items                =       $rfq->fetchPRItems($_GET['pr_no']);
    $rfq_no                  =       $rfq->generateRFQNo();
    $rfq_data                =       $rfq->fetchRFQ();

}else if($menuchecker['rfq_form_view']){
    $fetch_rfq_pos           =       $rfq->fetchSuppAward();
    $rfq_mode_opts           =       $rfq->fetchModeofProc();
    $rfq_report_opt          =       $rfq->fetchRFQReportDetails($_GET['rfq_id']);
    $is_multiple_pr          =       $rfq->fetchMultiplePRtoRFQ($_GET['rfq_no']);
    $pr_details              =       $rfq->fetchPRInfo($_GET['rfq_no']);//INDEX


    $rfq_report_multi_opt    =        $rfq->fetchRFQReportDetailsMultiple($_GET['rfq_id']);
    $rfq_items                =       $rfq->fetchRFQItems($_GET['rfq_id'],$is_multiple_pr['is_multiple']); 
    $rfq_details             =       $rfq->fetchRFQDetails($_GET['rfq_id']);
    $rfq_item_report_multi_opt=       $rfq->getchMultiRFQItemSummary($_GET['rfq_no']);
    $abs_req_opt             =       $rfq->fetchABSReq();
    $supp_opts               =       $rfq->fetchSupplierWinnerDetails($_GET['rfq_no'],$_GET['rfq_id']);
    $supplier_winner         =       $rfq->fetchWinnerSupplier($_GET['rfq_no']);
    $supplier_item_total     =       $rfq->fetchSupplierTotalABC($_GET['rfq_no']);
    $a = array();
foreach ($supp_opts as $key => $task) {
     $a[] = $task['supplier_title'];
 }
 $supp_winner = implode(', ', $a);

}else if($menuchecker['rfq_form_edit']){
    $fetch_rfq_pos           =       $rfq->fetchSuppAward();
    $rfq_mode_opts           =       $rfq->fetchModeofProc();
    $rfq_report_multi_opt    =        $rfq->fetchRFQReportDetailsMultiple($_GET['rfq_id']);
    $rfq_items                =       $rfq->fetchRFQItems($_GET['rfq_id'],$is_multiple_pr['is_multiple']); 
    $rfq_details             =       $rfq->fetchRFQDetails($_GET['rfq_no']);
    $rfq_item_report_multi_opt=       $rfq->getchMultiRFQItemSummary($_GET['rfq_no']);
    $abs_req_opt             =       $rfq->fetchABSReq();
    $supp_opts               =       $rfq->fetchSupplierWinnerDetails($_GET['rfq_no'],$_GET['rfq_id']);
    $supplier_winner         =       $rfq->fetchWinnerSupplier($_GET['rfq_no']);
    $supplier_item_total     =       $rfq->fetchSupplierTotalABC($_GET['rfq_no']);


}else if($menuchecker['abstract_create']){
    $is_multiple_pr          =       $rfq->fetchMultiplePRtoRFQ($_GET['rfq_no']);

    $rfq_items                =       $rfq->fetchRFQItems($_GET['rfq_id'],$is_multiple_pr['is_multiple']); 
    $supp_ppu       =$rfq->fetchPPU($_GET['rfq_id']);
    $supplier_winner         =       $rfq->fetchWinnerSupplier($_GET['rfq_no']);
    $supplier_item_total     =       $rfq->fetchSupplierTotalABC($_GET['rfq_no']);
    $rfq_items_quotation     = $rfq->monitorPR();
    $setSupplierHeader = $rfq->setHeader($_GET['rfq_no']);
    $item_stat = $rfq->itemStat($_GET['rfq_id']);
    $app_item = $rfq->fetchITem($_GET['rfq_id']);
  

        $dataPoints = $rfq->fetchDataPoint($_GET['rfq_id'],$_GET['rfq_no'],$is_multiple_pr['is_multiple']);

   

    //     $dataPoints = array( 
    // 	array("y" => 7,"label" => "March" ),
    // 	array("y" => 12,"label" => "April" ),
    // 	array("y" => 28,"label" => "May" ),
    // 	array("y" => 18,"label" => "June" ),
    // 	array("y" => 41,"label" => "July" )
    // );
    



}else if($menuchecker['abstract_view']){
    $rfq_items                =       $rfq->fetchRFQItems($_GET['rfq_id'],$is_multiple_pr['is_multiple']);  
    $rfq_item_report_multi_opt  =       $rfq->getchMultiRFQItemSummary($_GET['rfq_no']);
    $rfq_report_multi_opt       =        $rfq->fetchRFQReportDetailsMultiple($_GET['rfq_no']);
    $rfq_details                =       $rfq->fetchRFQDetails($_GET['rfq_no']);
    $abs_req_opt             =       $rfq->fetchABSReq();
    $supp_opts               =       $rfq->fetchSupplierWinnerDetails($_GET['rfq_no'],$_GET['rfq_id']);
    $supplier_winner         =       $rfq->fetchWinnerSupplier($_GET['rfq_no']);
    $supplier_item_total     =       $rfq->fetchSupplierTotalABC($_GET['rfq_no']);
    
}else if($menuchecker['po_view']){
    $supp_opts               =       $rfq->fetchSupplierWinnerDetails($_GET['rfq_no'],$_GET['rfq_id']);
    $supp_opts2               =       $rfq->fetchSupplierWinnerDetails2($_GET['rfq_no'],$_GET['rfq_id']);

    $arr = array();
    foreach ($supp_opts as $key => $task) {
        $arr[] = $task['supplier_title'];
    }
    

    
    $po_items                =       $rfq->fetchPOItems($_GET['rfq_id']);
    $rfq_details             =       $rfq->fetchRFQDetails($_GET['rfq_id']);
    $po_opts                 =       $rfq->fetchPO($_GET['po_no']);
    $po_ids                  =       $rfq->fetchPOIds($_GET['po_no']);
    $pr_count                =       $rfq->fetchPRStatusCount();

}else if($menuchecker['po_create']){
    $is_multiple_pr          =       $rfq->fetchMultiplePRtoRFQ($_GET['rfq_no']);

    $po                      =       $rfq->purchaseOrderCreateDetails($_GET['rfq_no'],$_GET['rfq_id']);
    $supplier_winner         =       $rfq->fetchSupplierWinner($_GET['rfq_id']);
  
    $po_no                   =       $rfq->generatePONo();


}
    $rfq_report_multi_opt    =        $rfq->fetchRFQReportDetailsMultiple($_GET['rfq_id']);
    $po_no                   =       $rfq->generatePONo();
    $rfq_id                  =       $rfq->fetchLatestRFQID();
    $ids                     =       $rfq->fetchRFQID($_GET['rfq_no']);
    $pr_id                   =       $rfq->fetchPRID($_GET['pr_no']);
    $rfq_pr_opts             =       $rfq->fetchPendingPR();
    $fetch_rfq_abc           =       $rfq->fetchRFQAmount($_GET['rfq_no']);
    $rfq_item_report_opt     =       $rfq->getchRFQItemSummary($_GET['pr_id']);
    $rfq_pos_opt             =       $rfq->fetchPOSdata($supplier_id);
    $is_awarded              =       $rfq->checkRFQ($_GET['rfq_no']);
    $supplier_quote          =       $rfq->fetchSupplierQuote($_GET['rfq_no']);
    $sel_supplier_quote      =       $rfq->fetchSelectedSupplier($_GET['rfq_no']);
    $supplier_opts           =       $rfq->fetchSupplier();
    $supplier_award_opts     =       $rfq->fetchSuppAward();
    $supplier_item_quotation =       $rfq->fetchSupplierItem($_GET['rfq_no'], $flag);
    $count_supp_item         =       $rfq->countItem($_GET['pr_no']);
    $abstract_no             =       $rfq->generateAbstractNo();
    $totalABC                =       $rfq->fetchTotalABC($_GET['pr_no']);
    $noa_opts                =       $rfq->fetchNOAandNTPData($_GET['po_no']);
    $is_multiple_pr          =       $rfq->fetchMultiplePRtoRFQ($_GET['rfq_no']);
    
   if($is_multiple_pr == '' || $is_multiple_pr == null)
   {
    $_SESSION['is_multiple'] = 0;

   }else{
    $_SESSION['is_multiple'] =       $is_multiple_pr;

   }
    $_SESSION['rfq_id']      =       $rfq_report_multi_opt;
    $pr_no = array();
    $mode = array();
    $pmo = array();
    foreach ($rfq_report_multi_opt as $key => $value) {
        $pr_no[] = $value['pr_no'];
        $mode[] = $value['mode'];
        $pmo[] = $value['pmo'];
    }
    $pr_n = implode(', ', $pr_no);
    $mode_n = implode(', ', $mode);
    $pmo_n = implode(', ', $pmo);
