<?php
session_start();
date_default_timezone_set('Asia/Manila');

require '../../PHPExcel-1.8/Classes/PHPExcel.php';
require_once '../../Model/Connection.php';
require_once '../../Model/UploadDTR.php';
require_once '../manager/HRManager.php';

$timeline = explode(' - ', $_POST['timeline']);
$date_fromraw = new DateTime($timeline[0]);
$date_toraw = new DateTime($timeline[1]);
$author = $_SESSION['currentuser'];

$date_from = $date_fromraw->format('Y-m-d H:m:s');
$date_to = $date_toraw->format('Y-m-d H:m:s');

$spreadsheet = new PHPExcel();
$hrm = new HRManager;
$fs = new UploadDTR;

$dtrs = [];

if ($_FILES['uploadfile']['error'] == UPLOAD_ERR_OK && is_uploaded_file($_FILES['uploadfile']['tmp_name'])) { 
	$file_type = PHPExcel_IOFactory::identify($_FILES['uploadfile']['tmp_name']);
    $reader = PHPExcel_IOFactory::createReader($file_type);

    $spreadsheet = $reader->load($_FILES['uploadfile']['tmp_name']);
    $worksheet = $spreadsheet->getActiveSheet();
    $dtrs = $worksheet->toArray();
}

foreach ($dtrs as $key => $dtr) {
	if ($key > 0 AND $dtr[3] < 255) {
		$emp_no = $dtr[0];
		$dtr_date = new DateTime($dtr[1]);
		$dtr_datetime = $dtr_date->format('Y-m-d 00:00:00');
		$dtr_time = $dtr_date->format('H:m:s');
		$dtr_day = $dtr_date->format('Y-m-d');
		$unknown_1 = $dtr[2];
		$state = $dtr[3]; // 0 = am_in, 1 = am_out, 2 = pm_in, 3 = pm_out
		$scan_type = $dtr[4]; // 1 = fingerprint, 15 = facial_scanner
		$unknown_2 = $dtr[5];

		$employee = $hrm->findUser($emp_no);

		if (!empty($employee)) {
			$ename = $employee['UNAME'];
			$ecode = $employee['EMP_NUMBER'];
			$eid = $employee['EMP_N'];

			$data = [
				'emp_code'	=> $eid,
				'author'	=> $author,
				'time'		=> $dtr_time,
				'date'		=> $dtr_datetime
			];

			if (inBetweenDate($date_from, $date_to, $dtr_datetime)) {
				$has_record = $hrm->getDTRRecord($eid, $ename, $dtr_datetime, $dtr_time, $state);

				if (!$has_record) { //IF NO RECORDS FOUND
					$hrm->insertDTR($data, $state);
				} else { //IF DATA IS EXISTING
					$hrm->updateDTR($data, $state);
				}	
			}	
		}
	}
}

$history = [
	'cut_off' 	=> '',
	'date_from' => $date_fromraw->format('Y-m-d 00:00:00'),
	'date_to' 	=> $date_toraw->format('Y-m-d 00:00:00'),
	'uploader' 	=> $author
];

$hrm->insertUploadDTRHistory($history);


function inBetweenDate($from, $to, $base) {
	$is_between = false;

	if ($base >= $from AND $base <= $to) {
		$is_between = true;	
	}

	return $is_between;
}




