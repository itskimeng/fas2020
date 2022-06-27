<?php
session_start();
date_default_timezone_set('Asia/Manila');

require 'GSS/manager/GSSManager.php';


$office = $_GET['division'];
$admin = ['masacluti','jsodsod','jecastillo','cmfiscal','mmmonteiro','mjllegos','cmfiscal','jmhernandez'];
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
$get_pr         = $gm->fetchPrNo('2022');//CREATE PR
$get_pr_id      = $gm->fetchPRID($_GET['pr_no']);//CREATE PR


$pr_count       = $gm->fetchPRStatusCount();
$pr_details     = $gm->fetchPRInfo($office);//INDEX
$pr_opts        = $gm->fetchUsersPR($_SESSION['currentuser']);
$pr_copy_opts   = $gm->fetchPRItems($_GET['id']);




}else if($menuchecker['transparency'])
{
    $trans_opt      = $gm->transparencyTable();
    $monitor_pr     = $gm->monitorPR();
    $monitor_awardedpr     = $gm->countAwardedPR();
   
    $encoded_pr     = $gm->countEncodePR();
}
// $type_opt       = $gm->fetchType();//view pr
// $fs_opt         = $gm->fetchFundSource();
// $pr_id          = $gm->fetchPRID($id);
