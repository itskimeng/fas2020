<?php
session_start();
date_default_timezone_set('Asia/Manila');

require_once 'Model/Connection.php';
require_once 'Finance/manager/BudgetManager.php';

$bm = new BudgetManager();

// $budget->getCodeFromGSS();
$ob_count = $bm->getObligationsCount();
