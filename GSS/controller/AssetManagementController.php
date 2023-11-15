<?php
session_start();
date_default_timezone_set('Asia/Manila');

require 'GSS/manager/AssetManagementManager.php';

$am = new AssetManagementManager();
if($menuchecker['view_iar']){
    $iar_opts = $am->fetchIAR();
}else if($menuchecker['create_iar'])
{
    $po_opts        = $am->setPONo();
    $iar_no         = $am->fetchIARNo(2022);
    $iar_officer    = ['Reschiel B. Veridiano','Leticia A. Delgado','Medel A. Saturno','Rafael M. Saturno', 'Camille T. Ronquillo', 'Art Brian G. Rubio', 'Hanna Grace P. Solis', 'Eunice A. Sales'];

}else if($menuchecker['create_ris'])
{
    $ris_no     = $am->fetchIARNo(2022);
    $po_opts    = $am->setPONo();
    $pr_opts    = $am->fetchPRNo(2022);
    $officers   = ['JAY-R T. BELTRAN','DON AYER A. ABRAZALDO','DR. CARINA S. CRUZ','ATTY. JORDAN V. NADAL', 'NOEL R. BARTOLABAC'];
}else if($menuchecker['par'])
{
    
    $par_opts   = $am->fetchPARDetails();
    $employees  = $am->fetchEmployee();
    $ppe_details= $am->fetchCurrentUser($_GET['id']);
    $ppe_opts = $am->fetchPPEDetails($_GET['id']);
    $ppe_history= $am->fetchPPEHistory($_GET['id']);



}

?>

