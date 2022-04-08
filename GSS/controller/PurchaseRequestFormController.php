<?php
session_start();
date_default_timezone_set('Asia/Manila');

require 'GSS/manager/GSSManager.php';
$office = $_GET['division'];
$admin = ['masacluti','jsodsod','jecastillo','cmfiscal','mmmonteiro'];
$flag='';
if(isset($_GET['id']) )
{
    $id=$_GET['id'];
    if($id > 0)
    {
        $id = $_GET['pr_no'];
    }else{
    $id=$_GET['id'];
    $flad=0;

    }
}else if(isset($_GET['pr_no'])){
    $id = $_GET['pr_no'];
    $flag=1;
}
$pmo_id = $_GET['division'];  

$gm = new GSSManager();
$route = 'GSS/route/';
$get_pr         = $gm->fetchPrNo('2022');//CREATE PR
$get_pr_id      = $gm->fetchPRID($_GET['pr_no']);//CREATE PR
$pmo            = $gm->getPMO();//CREATE PR
$pr_items       = $gm->view_pr_items($id,$flag);//CREATE PR
$pr_data        = $gm->view_pr($id);//view pr
$type_opt       = $gm->fetchType();//view pr
$pr             = $gm->fetch_abc($_GET['pr_no']);



?>

