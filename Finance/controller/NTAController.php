<?php
date_default_timezone_set('Asia/Manila');
session_start();

require_once 'Model/Connection.php';
require_once 'Finance/manager/AccountingManager.php';


$accounting = new AccountingManager();

$data = $accounting->getAccountingData();
$nta_admin = false;
$lock = '';

$getTotalNta = $accounting->getTotalNta();
$getTotalDisbursedNta = $accounting->getTotalDisbursedNta();
$getTotalBalance = $accounting->getTotalBalance();


if (isset($_GET['getid'])) {
	$update = $accounting->fetchNtaUpdate($_GET['getid']);
	if ($_GET['lock'] == true) 
	{
		$lock = 'readonly';
	}	
}

if (isset($_GET['nta_id'])) {
	$getNtaSummary = $accounting->getNtaSummary($_GET['nta_id']);
	$nta_details = $accounting->getNtaDetails($_GET['nta_id']);
}


// if (isset($_POST['btn_post'])) {
// 	$route = 'Finance/route/update_nta.php';
// }
// else if (isset($_POST['btn_lock'])) {
// 	$route = 'Finance/route/lock_nta.php';
// }


if (in_array($_SESSION['currentuser'], [2563, 2876, 3319])) {
	$nta_admin = true;
}




?>