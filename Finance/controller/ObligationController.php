<?php
session_start();
date_default_timezone_set('Asia/Manila');

require_once 'Model/Connection.php';
require_once 'Finance/manager/Budget.php';

$budget = new Budget();

// $budget->getCodeFromGSS();
$ob_count = $budget->getObligationsCount();

