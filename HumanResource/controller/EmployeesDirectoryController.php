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

$admins = ['mmmonteiro', 'epdeluna', 'hpsolis', 'masacluti'];
$hr_admins = $hrm->moduleAccess(1);
$po_admins = $hrm->moduleAccess(2);
$sys_admins = array_merge($po_admins, $hr_admins, $admins);

$current_month = isset($_GET['month']) ? $_GET['month'] : $current_date->format('m');
$current_year = isset($_GET['year']) ? $_GET['year'] : $current_date->format('Y');

$parameters = [
    'office' => $_GET['office'] ?? null,
    'emp_id' => $_GET['emp_id'] ?? null,
    'name' => $_GET['name'] ?? null,
    'age_category' => $_GET['age_category'] ?? null,
    'civil_status' => $_GET['civil_status'] ?? null,
    'health_issues' => $_GET['health_issues'] ?? null,
    'gender' => $_GET['gender'] ?? null,
];

$hasFilters = false;
foreach ($parameters as $parameter) {
    if ($parameter !== null) {
        $hasFilters = true;
        break;
    }
}

if ($hasFilters) {
    $data = $hrm->fetchEmployeesDirectory(
        $parameters['office'],
        $parameters['emp_id'],
        $parameters['name'],
        $parameters['age_category'],
        $parameters['civil_status'],
        $parameters['health_issues'],
        $parameters['gender']
    );

    // Continue with your code logic using the fetched data
    // ...
}else{
    $data = $hrm->fetchEmployeesDirectory(null,null,null,null,null,null);

}


//export employee data
$emp_opts = $hrm->downloadEmpData();
// employees account statistics

$emp_stat_opts['region']      = $hrm->fetchEmployeePerProvince(1);
$emp_stat_opts['cavite']      = $hrm->fetchEmployeePerProvince(20);
$emp_stat_opts['laguna']      = $hrm->fetchEmployeePerProvince(21);
$emp_stat_opts['batangas']    = $hrm->fetchEmployeePerProvince(19);
$emp_stat_opts['rizal']       = $hrm->fetchEmployeePerProvince(23);
$emp_stat_opts['quezon']      = $hrm->fetchEmployeePerProvince(22);
$emp_stat_opts['lucena']      = $hrm->fetchEmployeePerProvince(24);
$emp_stat_opts['duplicate_empid'] = $hrm->fetchDuplicateEmployeeID();
$emp_stat_opts['missing_office'] = $hrm->fetchEmpwithMissingOffice();
$emp_stat_opts['block_account'] = $hrm->fetchEmpBlockAccount();
$emp_stat_opts['activated'] = $hrm->fetchNewlyRegisteredAccount();
$emp_stat_opts['all'] = $emp_stat_opts['region']+$emp_stat_opts['cavite']+$emp_stat_opts['laguna']+$emp_stat_opts['batangas']+$emp_stat_opts['rizal']+$emp_stat_opts['quezon']+$emp_stat_opts['lucena'];

$user_info = $hrm->getUserInformation($currentuser);
// $firstElement = array_slice($data, 0, 1);
// $date_generated = $firstElement[0]['date_generated'];


// $date_generated = array_shift(array_slice($data, 0, 1))['date_generated'];
$office_opts = $hrm->generateOffice();
$civil_status_opts = [
    "Married" => "Married",
    "Single" => "Single",
    "Widow" => "Widow",
    "Separated" => "Separated",
];

$health_issues_opts = [
    "YES" => "YES",
    "NONE" => "NONE",
];

$gender_opts = [
    "Male" => "Male",
    "Female" => "Female"
];

$age_category_opts = [
    "18-24" => "18-24",
    "25-34" => "25-34",
    "35-44" => "35-44",
    "45-54" => "45-54",
    "55-64" => "55-64",
    "65 and over" => "65 and over"
];
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