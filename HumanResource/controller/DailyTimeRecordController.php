<?php
session_start();
date_default_timezone_set('Asia/Manila');

require_once 'Model/Connection.php';
require_once 'Model/UploadDTR.php';
require_once 'HumanResource/manager/HRManager.php';
require_once 'Finance/manager/BudgetManager.php';

$hrm = new HRManager;

$current_date = new DateTime();

if (isset($_GET['emp_n'])) {	
	$currentuser = $_GET['emp_n'];
} else {
	$emp_name = $_SESSION['complete_name3'];
	$currentuser = $_SESSION['currentuser'];
}

$admins = ['mmmonteiro', 'masacluti', 'seolivar'];
$hr_admins = $hrm->moduleAccess(1);
$po_admins = $hrm->moduleAccess(2);

$sys_admins = $admins + $hr_admins + $po_admins;

$current_month = isset($_GET['month']) ? $_GET['month'] : $current_date->format('m');
$current_year = isset($_GET['year']) ? $_GET['year'] : $current_date->format('Y');

$data = $hrm->fetchDailyTimeRecord($currentuser, $current_year, $current_month);
$user_info = $hrm->getUserInformation($currentuser);

if (isset($_GET['emp_n'])) {
	$emp_name = $user_info['fullname'];
}

$date_generated = array_shift(array_slice($data, 0, 1))['date_generated'];
$new_arr = $days = [];

$d=cal_days_in_month(CAL_GREGORIAN,$current_month,$current_year);

if (!empty($data)) {
	for ($i=1; $i <= $d; $i++) { 
		$index = '';
		$jd = GregorianToJD($current_month, $i, $current_year);
		$month = JDMonthName($jd, 1);
		$day = JDDayOfWeek($jd, 1);
		$day_int = JDDayOfWeek($jd, 0);
		$index = $i > 9 ? $i : '0'.$i;

		if (!array_key_exists($i, $data)) {
			$days[$index] = [
				'attendance'		=> $index,
				'attendance_date'	=> $month.' '.$index.', '.$current_year.' <br>'.$day,
	    		'attendance_day'	=> $day,
	    		'attendance_day_int'=> $day_int,
	    		'am_in'				=> $day_int > 0 ? '--' : '',
	    		'am_out' 			=> $day_int > 0 ? '--' : '',
	    		'pm_in' 			=> $day_int > 0 ? '--' : '',
	    		'pm_out' 			=> $day_int > 0 ? '--' : '',
	    		'undertime' 		=> $day_int > 0 ? '--' : ''
			];
		}
	}
	
	$new_arr = $data + $days;
}

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



