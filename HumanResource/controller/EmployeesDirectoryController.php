<?php
session_start();
date_default_timezone_set('Asia/Manila');

require_once 'Model/Connection.php';
require_once 'Model/UploadDTR.php';
require_once 'HumanResource/manager/HRManager.php';
require_once 'Finance/manager/BudgetManager.php';

$hrm = new HRManager;
$bm = new BudgetManager();
$current_date = new DateTime();
    
$division = $_SESSION['division'];
$username = $_SESSION['username'];
$emp_name = $_SESSION['complete_name3'];
$currentuser = $_SESSION['currentuser'];

$admins = ['mmmonteiro', 'jbaco', 'hpsolis','masacluti','ljbanalan'];
$hr_admins = $hrm->moduleAccess(1);
$po_admins = $hrm->moduleAccess(2);
$sys_admins = array_merge($po_admins, $hr_admins, $admins);

$current_month = isset($_GET['month']) ? $_GET['month'] : $current_date->format('m');
$current_year = isset($_GET['year']) ? $_GET['year'] : $current_date->format('Y');

if (isset($_GET['office'])) {
    $data = $hrm->fetchEmployeesDirectory($_GET['office']);
} else {
    $data = $hrm->fetchEmployeesDirectory();
}

$user_info = $hrm->getUserInformation($currentuser);
$date_generated = array_shift(array_slice($data, 0, 1))['date_generated'];
$office_opts = $hrm->generateOffice();
$month_opts = [
    '01' => 'January',
    '02' => 'February',
    '03' => 'March',
    '04' => 'April',
    '05' => 'May',
    '06' => 'June',
    '07' => 'July',
    '08' => 'August',
    '09' => 'September',
    '10' => 'October',
    '11' => 'November',
    '12' => 'December'
];