<?php
session_start();

require_once 'Model/Connection.php';
require_once 'Finance/manager/Budget.php';

date_default_timezone_set('Asia/Manila');

$budget = new Budget();

$data = $budget->fetch();
