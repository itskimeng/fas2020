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
$upload = 'err'; 
$response = [];

$date_from = $date_fromraw->format('Y-m-d 00:00:00');
$date_to = $date_toraw->format('Y-m-d 23:59:59');

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
	if ($dtr[3] < 255 AND !empty($dtr[0])) {
		$emp_no = $dtr[0];
		$dtr_date = new DateTime($dtr[1]);
		$dtr_datetime = $dtr_date->format('Y-m-d 00:00:00');
		$dtr_datetime_f = $dtr_date->format('Y-m-d H:i:s');
		$dtr_time = $dtr_date->format('H:i:s');
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

					$record = $hrm->getDTRRecord2($eid, $ename, $dtr_datetime, $dtr_time, $state);
					$toggle = false;
					if ($state == 0) {
						$am_in_f = new DateTime($record['am_in']);
						if ($dtr_datetime_f < $am_in_f->format('Y-m-d H:i:s')) {
							$toggle = true;
						}
					} elseif ($state == 1) {
						$am_out_f = new DateTime($record['am_out']);

						if ($dtr_time_f < $am_out_f->format('Y-m-d H:i:s')) {
							$toggle = true;
						}
					} elseif ($state == 2) {
						$pm_in_f = new DateTime($record['pm_in']);

						if ($dtr_time_f < $pm_in_f->format('Y-m-d H:i:s')) {
							$toggle = true;
						}
					} elseif ($state == 3) {
						$pm_out_f = new DateTime($record['pm_out']);

						if ($dtr_time_f < $pm_out_f->format('Y-m-d H:i:s')) {
							$toggle = true;
						}
					}

					if ($toggle) {
						$hrm->updateDTR($data, $state);
					}
				}	
			}	

			$response[] = $ename;
			$upload = 'success'; 
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

echo json_encode($response);


function inBetweenDate($from, $to, $base) {
	$is_between = false;

	if ($base >= $from AND $base <= $to) {
		$is_between = true;	
	}

	return $is_between;
}




