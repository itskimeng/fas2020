<?php
date_default_timezone_set('Asia/Manila');
session_start();

require_once 'Model/Connection.php';
require_once 'Finance/manager/AccountingManager.php';

$accounting = new AccountingManager();

$data = $accounting->getAccountingDisbursement();

$getTotalPending = $accounting->getTotalPending();
$getTotalReceived = $accounting->getTotalReceived();
$getTotalDisbursed = $accounting->getTotalDisbursed();
$getTotalReleased = $accounting->getTotalReleased();

$getNta = $accounting->getNta();
