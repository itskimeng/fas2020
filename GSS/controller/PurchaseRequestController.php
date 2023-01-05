<?php
session_start();
date_default_timezone_set('Asia/Manila');

require 'GSS/manager/GSSManager.php';


$office = $_GET['division'];
$admin = ['masacluti','jsodsod','jecastillo','cmfiscal','mmmonteiro','mjllegos','cmfiscal','jmhernandez','ctronquillo'];
if(isset($_GET['id']) )
{
    $id=$_GET['id'];
    if($id > 0)
    {
        $id = $_GET['pr_no'];
    }else{
    $id=$_GET['id'];

    }
}else{
    $id = $_GET['pr_no'];
}
$pmo_id = $_GET['division'];  

$gm = new GSSManager();
$route = 'GSS/route/';

// $get_pr_id      = $gm->fetchID();//CREATE PR
// $pr_items       = $gm->view_pr_items($id);//CREATE PR

// $pr_data        = $gm->view_pr($id);//view pr
// $pr             = $gm->fetch_abc($_GET['pr_no']);
// $unit_opts      = $gm->getItemUnit();
// $pr_unit_opts      = $gm->getAppItemUnit();
// $mode_opts      = $gm->getMode();

if($menuchecker['procurement'])
{
$pmo            = $gm->getPMO();//CREATE PR
$get_pr         = $gm->fetchPrNo('2023');//CREATE PR
$get_pr_id      = $gm->fetchPRID($_GET['pr_no']);//CREATE PR


$pr_count       = $gm->fetchPRStatusCount();
$pr_details     = $gm->fetchPRInfo($_GET['quarter'],$_GET['year'],$_GET['office'],'');//INDEX
$pr_opts        = $gm->fetchUsersPR($_SESSION['currentuser']);
$pr_copy_opts   = $gm->fetchPRItems($_GET['id']);

$pending_pr     = $gm->fetchPendingPR($_SESSION['currentuser']);
$pending_pr_status = $gm->checkPendingPR($_SESSION['currentuser']);
$active_state1 = null;
$active_state2 = null;
$active_state3 = null;
$active_state4 = null;
switch ($_GET['quarter']) {
    case '1':
        $active_state1 = "active";
        return $active_state1;

        break;
    case '2':
        $active_state2 = "active";
        return $active_state2;

        break;
    case '3':
        $active_state3 = "active";
        return $active_state3;

        break;
    case '4':
        $active_state4 = "active";
        return $active_state4;
        break;
    
    default:
    $active_state = "";

        break;
}






}else if($menuchecker['transparency'])
{
    $trans_opt      = $gm->transparencyTable();
    $monitor_pr     = $gm->monitorPR();
    $monitor_awardedpr     = $gm->countAwardedPR();
   
    $encoded_pr     = $gm->countEncodePR();

    $report_opts['total_catering_serv'] = $gm->fetchReportInfo(1,'');
    $report_opts['total_mva_serv']      = $gm->fetchReportInfo(2,'');
    $report_opts['total_repair_serv']   = $gm->fetchReportInfo(3,'');
    $report_opts['total_smd_serv']      = $gm->fetchReportInfo(4,'');
    $report_opts['total_other_serv']    = $gm->fetchReportInfo(5,'');
    $report_opts['total_rpc_serv']      = $gm->fetchReportInfo(6,'');

    $report_opts['fad_catering_serv'] = $gm->fetchReportInfo(1,10);
    $report_opts['fad_mva_serv']      = $gm->fetchReportInfo(2,10);
    $report_opts['fad_repair_serv']   = $gm->fetchReportInfo(3,10);
    $report_opts['fad_smd_serv']      = $gm->fetchReportInfo(4,10);
    $report_opts['fad_other_serv']    = $gm->fetchReportInfo(5,10);
    $report_opts['fad_rpc_serv']      = $gm->fetchReportInfo(6,10);

    $report_opts['lgcdd_catering_serv'] = $gm->fetchReportInfo(1,8);
    $report_opts['lgcdd_mva_serv']      = $gm->fetchReportInfo(2,8);
    $report_opts['lgcdd_repair_serv']   = $gm->fetchReportInfo(3,8);
    $report_opts['lgcdd_smd_serv']      = $gm->fetchReportInfo(4,8);
    $report_opts['lgcdd_other_serv']    = $gm->fetchReportInfo(5,8);
    $report_opts['lgcdd_rpc_serv']      = $gm->fetchReportInfo(6,8);

    $report_opts['lgmed_catering_serv'] = $gm->fetchReportInfo(1,7);
    $report_opts['lgmed_mva_serv']      = $gm->fetchReportInfo(2,7);
    $report_opts['lgmed_repair_serv']   = $gm->fetchReportInfo(3,7);
    $report_opts['lgmed_smd_serv']      = $gm->fetchReportInfo(4,7);
    $report_opts['lgmed_other_serv']    = $gm->fetchReportInfo(5,7);
    $report_opts['lgmed_rpc_serv']      = $gm->fetchReportInfo(6,7);

    $report_opts['ord_catering_serv'] = $gm->fetchReportInfo(1,1);
    $report_opts['ord_mva_serv']      = $gm->fetchReportInfo(2,1);
    $report_opts['ord_repair_serv']   = $gm->fetchReportInfo(3,1);
    $report_opts['ord_smd_serv']      = $gm->fetchReportInfo(4,1);
    $report_opts['ord_other_serv']    = $gm->fetchReportInfo(5,1);
    $report_opts['ord_rpc_serv']      = $gm->fetchReportInfo(6,1);

    $pr_summary_opts['fad'] = $gm->countPRperDivision(10);
    $pr_summary_opts['lgcdd'] = $gm->countPRperDivision(8);
    $pr_summary_opts['lgmed'] = $gm->countPRperDivision(7);
    $pr_summary_opts['ord'] = $gm->countPRperDivision(1);
}
// $type_opt       = $gm->fetchType();//view pr
// $fs_opt         = $gm->fetchFundSource();
// $pr_id          = $gm->fetchPRID($id);
