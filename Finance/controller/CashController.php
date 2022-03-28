<?php
date_default_timezone_set('Asia/Manila');
session_start();

require_once 'Model/Connection.php';
require_once 'Model/Payment.php';
require_once 'Finance/manager/CashManager.php';
require_once 'Finance/manager/BudgetManager.php';
require_once 'Finance/manager/AccountingManager.php';

$pay = new Payment();
$bm = new BudgetManager();
$cash = new CashManager();
$acctg = new AccountingManager();

$now = new DateTime();
$now = $now->format('m/d/Y');
$status = 'Draft';	
$current_user = $_SESSION['username'];
$route = "Finance/route/post_payment.php";
$readonly = false;

if (isset($_GET['id'])) {
	$data = $cash->getLDDAPDetails($_GET['id']);
	$dentries = $cash->getLDDAPEntries($_GET['id']);	
	$ntaentries = $cash->getNtaEntries($_GET['id']);
		
	if (in_array($data['status'], ['Paid', 'Delivered to Bank'])) {
		$readonly = true;
	}

	// $obs = implode(', ', $dentries['obs']);
	// $dvs = implode(', ', $dentries['dvs']);
	
	// $pdvs = $acctg->getAccountingDisbursement3($dvs);
	// $uacs = $bm->getObUACS($obs);
	// $ntas = $acctg->getDvNTA($dvs);
	$route = "Finance/route/edit_payment.php?id=".$_GET['id'];
}


// $dv_list = $acctg->getAccountingDisbursement2();
//updated to nta entry list
$ne_list = $acctg->getNTAEntries();

$data1 = $cash->getCash();
$data2 = $cash->getCash('Delivered to Bank');
// $data2 = $cash->getDV();
// if (!empty($data1) AND !empty($data2)) {
	// $data = array_merge($data1, $data2);
// }

$receiving = $cash->receiving();
$draft = $cash->draft();
$paid = $cash->paid();
$returned = $cash->returned();



function currencyTxtBox($inputClass="", $inputValue="")
{
	$element = '<div class="input-group">';
	  $element .= '<span class="input-group-addon">₱</span>';
	  $element .= '<input type="text" class="form-control '.$inputClass.'" name="'.$inputClass.'" placeholder="00.00" readonly>';
	  $element .= '<input type="hidden" class="form-control '.$inputValue.'" name="'.$inputValue.'" placeholder="00.00" readonly>';
	$element .= '</div>';

	return $element;
}