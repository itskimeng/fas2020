<?php
session_start();
date_default_timezone_set('Asia/Manila');

require_once '../../PHPExcel-1.8/Classes/PHPExcel.php';
require_once '../../Model/Connection.php';
require_once '../../Model/UploadDTR.php';
require_once '../manager/HRManager.php';


$hrm = new HRManager();
$current_date = new DateTime();

if (isset($_GET['emp_n'])) {
	$currentuser = $_GET['emp_n'];
} else {
	$emp_name = $_SESSION['complete_name3'];
	$currentuser = $_SESSION['currentuser'];
}

$current_month = isset($_GET['month']) ? $_GET['month'] : $current_date->format('m');
$current_year = isset($_GET['year']) ? $_GET['year'] : $current_date->format('Y');

$employee = $hrm->findEmployee($currentuser);
$data = $hrm->fetchDailyTimeRecord($currentuser, $current_year, $current_month);

$phpExcel = new PHPExcel;
$objRichText = new PHPExcel_RichText();


$phpExcel->getProperties()->setTitle("Employee Daily Time Record");
$phpExcel->getProperties()->setCreator("Official Personnel");
$writer = PHPExcel_IOFactory::createWriter($phpExcel, "Excel2007");
$sheet = $phpExcel->getActiveSheet();
$protection = $sheet->getProtection();
$protection->setSheet(true);
$protection->setPassword('dilg4@_jeckkimpogi');
$counter = count($data);

$i=0;
$this_date = $current_year.'-'.$current_month;

$objRichText->createText('For the month of ');
$objBold = $objRichText->createTextRun(date('F Y',strtotime($this_date)));
$objBold->getFont('Calibri')->setBold(true);
$fullname = $employee['fullname'];


$custom_style1 = array(
    'alignment' => array(
        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
	    )
);

$custom_style2 = array(
    'alignment' => array(
        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER
	    ),
    'borders' => array(
	   	'left' => array(
	      'style' => PHPExcel_Style_Border::BORDER_THIN
	   	)
	)
);

$custom_style3 = array(
    'borders' => array(
	   	'left' => array(
	      'style' => PHPExcel_Style_Border::BORDER_THIN
	   	)
	)
);

$custom_style4 = array(
    'borders' => array(
	   	'right' => array(
	      'style' => PHPExcel_Style_Border::BORDER_THIN
	   	)
	)
);

$custom_style5 = array(
    'alignment' => array(
        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER
	    ),
    'borders' => array(
	   	'allborders' => array(
	      'style' => PHPExcel_Style_Border::BORDER_THIN
	   	)
	)
);


$sheet->getPageSetup()->setFitToPage(true);
// $sheet->getPageSetup()->setScale(80);

// $sheet->getPageSetup()->setFitToWidth(1);    
// $sheet->getPageSetup()->setFitToHeight(0); 

$sheet->getPageSetup()->setPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4);

$sheet->getColumnDimension('A')->setWidth('26.78');
$sheet->getColumnDimension('B')->setWidth('13.5');
$sheet->getColumnDimension('C')->setWidth('13.5');
$sheet->getColumnDimension('D')->setWidth('13.5');
$sheet->getColumnDimension('E')->setWidth('13.5');
$sheet->getColumnDimension('F')->setWidth('12');
$sheet->getColumnDimension('G')->setWidth('12');
$sheet->getRowDimension('5')->setRowHeight('30');
$sheet->getRowDimension('45')->setRowHeight('3');

$sheet->getCell('A1')->setValue('DEPARTMENT OF THE INTERIOR AND LOCAL GOVERNMENT');
$sheet->getCell('A2')->setValue('REGION IV-A (CALABARZON)');
$sheet->getCell('A3')->setValue('');
$sheet->getStyle('A4')->getFont('Calibri')->setBold(true)->setSize(11);
$sheet->getCell('A4')->setValue('DAILY TIME RECORD');
$sheet->getCell('A5')->setValue('Civil Service Form No. 48');
$sheet->getStyle('A6')->getFont('Calibri')->setBold(true)->setSize(11);
$sheet->getCell('A6')->setValue($fullname);
$sheet->setCellValue('A8', $objRichText);
$sheet->getCell('A9')->setValue('Official Hours for Arrival and Departure');
$sheet->getCell('E8')->setValue('Regular Days');
$sheet->getCell('F8')->setValue('________________________');
$sheet->getCell('E9')->setValue('Saturdays');
$sheet->getCell('F9')->setValue('________________________');
$sheet->getCell('A12')->setValue('Date');
$sheet->getCell('B12')->setValue('A.M');
$sheet->getCell('D12')->setValue('P.M');
$sheet->getCell('B13')->setValue('Arrival');
$sheet->getCell('C13')->setValue('Departure');
$sheet->getCell('D13')->setValue('Arrival');
$sheet->getCell('E13')->setValue('Departure');
$sheet->getCell('F12')->setValue('Undertime');
$sheet->getCell('F13')->setValue('Hours');
$sheet->getCell('G13')->setValue('Minutes');


$sheet->getStyle('A1:G1')->getAlignment()->setWrapText(true); 
$sheet->getStyle('A2:G2')->getAlignment()->setWrapText(true); 
$sheet->getStyle('A3:G3')->getAlignment()->setWrapText(true); 
$sheet->getStyle('A6:G6')->getAlignment()->setWrapText(true); 
$sheet->getStyle('A8:C8')->getAlignment()->setWrapText(true); 
$sheet->getStyle('A12:A13')->getAlignment()->setWrapText(true); 
$sheet->getStyle('B12:C12')->getAlignment()->setWrapText(true); 
$sheet->getStyle('D12:E12')->getAlignment()->setWrapText(true); 
$sheet->getStyle('F12:G12')->getAlignment()->setWrapText(true); 


$sheet->mergeCells('A1:G1');
$sheet->mergeCells('A2:G2');
$sheet->mergeCells('A3:G3');
$sheet->mergeCells('A4:G4');
$sheet->mergeCells('A6:G6');
$sheet->mergeCells('A8:C8');
$sheet->mergeCells('A12:A13');
$sheet->mergeCells('B12:C12');
$sheet->mergeCells('D12:E12');
$sheet->mergeCells('F12:G12');

$sheet->getStyle("A1:G1")->applyFromArray($custom_style1);
$sheet->getStyle("A2:G2")->applyFromArray($custom_style1);
$sheet->getStyle("A3:G3")->applyFromArray($custom_style1);
$sheet->getStyle("A4:G4")->applyFromArray($custom_style1);
$sheet->getStyle("A6:G6")->applyFromArray($custom_style1);
$sheet->getStyle("A12")->applyFromArray($custom_style5);
$sheet->getStyle("A13")->applyFromArray($custom_style5);
$sheet->getStyle("B12")->applyFromArray($custom_style5);
$sheet->getStyle("C12")->applyFromArray($custom_style5);
$sheet->getStyle("D12")->applyFromArray($custom_style5);
$sheet->getStyle("E12")->applyFromArray($custom_style5);
$sheet->getStyle("B13")->applyFromArray($custom_style5);
$sheet->getStyle("C13")->applyFromArray($custom_style5);
$sheet->getStyle("D13")->applyFromArray($custom_style5);
$sheet->getStyle("E13")->applyFromArray($custom_style5);
$sheet->getStyle("F12")->applyFromArray($custom_style5);
$sheet->getStyle("G12")->applyFromArray($custom_style5);
$sheet->getStyle("F13")->applyFromArray($custom_style5);
$sheet->getStyle("G13")->applyFromArray($custom_style5);

$row = 14;
$row2 = 16;
$row3 = 18;
$row4 = 20;
$row5 = 22;
$row6 = 23;

foreach ($data as $index => $attendance) {
	$sheet->setCellValue('A'.$row, $attendance['attendance_date_f'])
           ->setCellValue('B'.$row, $attendance['am_in'] != '--' ? $attendance['am_in'] : '')
           ->setCellValue('C'.$row, $attendance['am_out'] != '--' ? $attendance['am_out'] : '')
           ->setCellValue('D'.$row, $attendance['pm_in'] != '--' ? $attendance['pm_in'] : '')
           ->setCellValue('E'.$row, $attendance['pm_out'] != '--' ? $attendance['pm_out'] : '')
           ->setCellValue('F'.$row, $attendance['hours'])
           ->setCellValue('G'.$row, $attendance['mins']);

    $sheet->getStyle("A".$row)->applyFromArray($custom_style5);
    $sheet->getStyle("B".$row)->applyFromArray($custom_style5);
    $sheet->getStyle("C".$row)->applyFromArray($custom_style5);
    $sheet->getStyle("D".$row)->applyFromArray($custom_style5);
    $sheet->getStyle("E".$row)->applyFromArray($custom_style5);
    $sheet->getStyle("F".$row)->applyFromArray($custom_style5);
    $sheet->getStyle("G".$row)->applyFromArray($custom_style5);

	$i++;
	$row++;
	$row2++;
	$row3++;
	$row4++;
	$row5++;
	$row6++;
}

$extension = $row + 1;
$extension2 = $extension + 3;
$extension3 = $extension + 5;
$extension4 = $extension + 6;
$extension5 = $extension4 + 1;
$extension6 = $extension5 + 1;

$sheet->getStyle('A'.$extension)->getFont('Calibri')->setItalic(true)->setSize(9);
$sheet->getCell('A'.$extension)->setValue('I certify on my honor that the above is a true and correct report of the hours of work performed, record of which was made daily at the time of arrival and departure from office.');

$sheet->getCell('C'.$extension2)->setValue('________________________________________');
$sheet->getCell('C'.$extension4)->setValue('________________________________________');
$sheet->getCell('C'.$extension5)->setValue('In Charge');
$sheet->getStyle('A'.$extension)->getFont('Calibri')->setItalic(true)->setSize(10);
$sheet->getCell('A'.$extension3)->setValue('VERIFIED as to the prescribed office hours:');

$sheet->getStyle('A'.$extension)->getAlignment()->setWrapText(true); 
$sheet->getStyle('A'.$extension5)->getAlignment()->setWrapText(true); 
$sheet->mergeCells('A'.$extension.':'.'G'.$extension);
$sheet->mergeCells('C'.$extension2.':'.'E'.$extension2);
$sheet->mergeCells('C'.$extension4.':'.'E'.$extension4);

$sheet->mergeCells('C'.$extension5.':'.'E'.$extension5);

$sheet->getStyle('A'.$extension.':'.'G'.$extension)->applyFromArray($custom_style1);
$sheet->getStyle('C'.$extension5.':'.'E'.$extension5)->applyFromArray($custom_style1);
$sheet->getRowDimension($extension)->setRowHeight(25);

$sheet->getStyle('C'.$extension4.':'.'E'.$extension4)->getProtection()->setLocked(PHPExcel_Style_Protection::PROTECTION_UNPROTECTED);


$sheet->setBreak('A52', PHPExcel_Worksheet::BREAK_ROW );
$sheet->setBreak('G52', PHPExcel_Worksheet::BREAK_COLUMN );

$sheet->setTitle('dtr');

$history = [
	'month' 	=> $current_month,
	'year' 		=> $current_year,
	'uid' 		=> $_SESSION['currentuser'],
	'type'		=> 1,
	'tid'		=> $currentuser
];

$hrm->insertExportDTRHistory($history);

header('Content-type: application/vnd.ms-excel');
$filename = $employee['UNAME'].'-'.$current_month.$current_year.'-dtr_.xls';
header('Content-Disposition: attachment; filename="'.$filename.'"');
$writer->save('php://output');
