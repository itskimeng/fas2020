<?php
session_start();
date_default_timezone_set('Asia/Manila');

require '../../library/PHPExcel-1.8/Classes/PHPExcel.php';	
require_once 'Model/Connection.php';
require_once 'Model/UploadDTR.php';
require_once 'HumanResource/manager/HRManager.php';
require_once 'Finance/manager/BudgetManager.php';

$hrm = new HRManager;
$data = $hrm->fetchEmployeesDirectory();

$phpExcel = new PHPExcel;

$phpExcel->getProperties()->setTitle("Employee Directory List");
$phpExcel->getProperties()->setCreator("Official Personnel");
$writer = PHPExcel_IOFactory::createWriter($phpExcel, "Excel2007");
$sheet = $phpExcel->getActiveSheet();
$sheet->setTitle('employees');

// Creating spreadsheet header
$sheet->getStyle('A1:R1')->getFont('Arial Black')->setBold(true)->setSize(11);
$sheet->getCell('A1')->setValue('MASTERLIST OF PERSONAL INFORMATION');
$sheet->getCell('A3')->setValue('NAME');
$sheet->getCell('B3')->setValue('GENDER');
$sheet->getCell('C3')->setValue('BIRTHDATE');
$sheet->getCell('D3')->setValue('AGE');
$sheet->getCell('E3')->setValue('STREET');
$sheet->getCell('F3')->setValue('LGU');
$sheet->getCell('G3')->setValue('PROVINCE');
$sheet->getCell('H3')->setValue('REGION');
$sheet->getCell('I3')->setValue('CONTACT #');
$sheet->getCell('J3')->setValue('STATUS');
$sheet->getStyle('A3:L3')->getAlignment()->setWrapText(true); 

$i = 4;
$x = 1;

foreach ($suspects_data as $id => $dd) {
	$sheet->getCell('A'.$i)->setValue($dd['name']);
	$sheet->getCell('B'.$i)->setValue($dd['gender']);
	$sheet->getCell('C'.$i)->setValue($dd['birthdate']);
	$sheet->getCell('D'.$i)->setValue($dd['age']);
	$sheet->getCell('E'.$i)->setValue($dd['street']);
	$sheet->getCell('F'.$i)->setValue($dd['lgu']);
	$sheet->getCell('G'.$i)->setValue($dd['province']);
	$sheet->getCell('H'.$i)->setValue($dd['region']);
	$sheet->getCell('I'.$i)->setValue($dd['contact_no']);
	$sheet->getCell('J'.$i)->setValue($dd['status']);

	$i++;
	$x++;
}

header('Content-type: application/vnd.ms-excel');
$filename = 'Masterlist-Report.xls';
header('Content-Disposition: attachment; filename="'.$filename.'"');
$writer->save('php://output');

