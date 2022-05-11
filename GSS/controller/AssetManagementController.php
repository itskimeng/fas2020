<?php
session_start();
date_default_timezone_set('Asia/Manila');

require 'GSS/manager/AssetManagementManager.php';

$am = new AssetManagementManager();
if($menuchecker['view_iar']){
    $iar_opts = $am->fetchIAR();
}else if($menuchecker['create_iar'])
{
    $po_opts = $am->setPONo();
    $iar_officer = ['Reschiel B. Veridiano','Leticia A. Delgado','Medel A. Saturno','Rafael M. Saturno', 'Camille T. Ronquillo', 'Art Brian G. Rubio', 'Hanna Grace P. Solis', 'Eunice A. Sales'];
    $iar_no = $am->fetchIARNo(2022);
}

?>

