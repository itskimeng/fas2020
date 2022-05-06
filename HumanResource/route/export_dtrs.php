<?php
session_start();
date_default_timezone_set('Asia/Manila');

require_once '../../PHPExcel-1.8/Classes/PHPExcel.php';
require_once '../../Model/Connection.php';
require_once '../../Model/UploadDTR.php';
require_once '../manager/HRManager.php';


$hrm = new HRManager();
$office = $_GET['office'];
$month = $_GET['month'];
$year = $_GET['year'];

$data = $hrm->fetchEmployeesDTR($office, $month, $year);

$phpExcel = new PHPExcel;
$objRichText = new PHPExcel_RichText();


$phpExcel->getProperties()->setTitle("Employee Daily Time Record");
$phpExcel->getProperties()->setCreator("Official Personnel");
$writer = PHPExcel_IOFactory::createWriter($phpExcel, "Excel2007");
$sheet = $phpExcel->getActiveSheet();
$counter = count($data);

$i=0;
$this_date = $year.'-'.$month;

$objRichText->createText('For the month of ');
$objBold = $objRichText->createTextRun(date('F Y',strtotime($this_date)));
$objBold->getFont('Calibri')->setBold(true);


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



foreach ($data as $key => $dd) {
	$fullname = $dd['01']['fullname'];
	$username = $dd['01']['username'];
  	$newSheet = $phpExcel->createSheet($key); //Setting index when creating

  	$newSheet->getPageSetup()->setFitToPage(false);
	$newSheet->getPageSetup()->setScale(91);

	$newSheet->getPageSetup()->setFitToWidth(1);    
    $newSheet->getPageSetup()->setFitToHeight(0); 

  	$newSheet->getColumnDimension('A')->setWidth('26.78');
  	$newSheet->getColumnDimension('B')->setWidth('13.5');
  	$newSheet->getColumnDimension('C')->setWidth('13.5');
  	$newSheet->getColumnDimension('D')->setWidth('13.5');
  	$newSheet->getColumnDimension('E')->setWidth('13.5');
  	$newSheet->getColumnDimension('F')->setWidth('12');
  	$newSheet->getColumnDimension('G')->setWidth('12');
	$newSheet->getRowDimension('5')->setRowHeight('30');

	$newSheet->getCell('A1')->setValue('DEPARTMENT OF THE INTERIOR AND LOCAL GOVERNMENT');
	$newSheet->getCell('A2')->setValue('REGION IV-A (CALABARZON)');
	$newSheet->getCell('A3')->setValue('');
	$newSheet->getStyle('A4')->getFont('Calibri')->setBold(true)->setSize(11);
	$newSheet->getCell('A4')->setValue('DAILY TIME RECORD');
	$newSheet->getCell('A5')->setValue('Civil Service Form No. 48');
	$newSheet->getStyle('A6')->getFont('Calibri')->setBold(true)->setSize(11);
	$newSheet->getCell('A6')->setValue($fullname);
	$newSheet->setCellValue('A8', $objRichText);
	$newSheet->getCell('A9')->setValue('Official Hours for Arrival and Departure');
	$newSheet->getCell('E8')->setValue('Regular Days');
	$newSheet->getCell('F8')->setValue('________________________');
	$newSheet->getCell('E9')->setValue('Saturdays');
	$newSheet->getCell('F9')->setValue('________________________');
	$newSheet->getCell('A12')->setValue('Date');
	$newSheet->getCell('B12')->setValue('A.M');
	$newSheet->getCell('D12')->setValue('P.M');
	$newSheet->getCell('B13')->setValue('Arrival');
	$newSheet->getCell('C13')->setValue('Departure');
	$newSheet->getCell('D13')->setValue('Arrival');
	$newSheet->getCell('E13')->setValue('Departure');
	$newSheet->getCell('F12')->setValue('Undertime');
	$newSheet->getCell('F13')->setValue('Hours');
	$newSheet->getCell('G13')->setValue('Minutes');
	

	$newSheet->getStyle('A1:G1')->getAlignment()->setWrapText(true); 
	$newSheet->getStyle('A2:G2')->getAlignment()->setWrapText(true); 
	$newSheet->getStyle('A3:G3')->getAlignment()->setWrapText(true); 
	$newSheet->getStyle('A6:G6')->getAlignment()->setWrapText(true); 
	$newSheet->getStyle('A8:C8')->getAlignment()->setWrapText(true); 
	$newSheet->getStyle('A12:A13')->getAlignment()->setWrapText(true); 
	$newSheet->getStyle('B12:C12')->getAlignment()->setWrapText(true); 
	$newSheet->getStyle('D12:E12')->getAlignment()->setWrapText(true); 
	$newSheet->getStyle('F12:G12')->getAlignment()->setWrapText(true); 


	$newSheet->mergeCells('A1:G1');
	$newSheet->mergeCells('A2:G2');
	$newSheet->mergeCells('A3:G3');
	$newSheet->mergeCells('A4:G4');
	$newSheet->mergeCells('A6:G6');
	$newSheet->mergeCells('A8:C8');
	$newSheet->mergeCells('A12:A13');
	$newSheet->mergeCells('B12:C12');
	$newSheet->mergeCells('D12:E12');
	$newSheet->mergeCells('F12:G12');

	$newSheet->getStyle("A1:G1")->applyFromArray($custom_style1);
	$newSheet->getStyle("A2:G2")->applyFromArray($custom_style1);
	$newSheet->getStyle("A3:G3")->applyFromArray($custom_style1);
	$newSheet->getStyle("A4:G4")->applyFromArray($custom_style1);
	$newSheet->getStyle("A6:G6")->applyFromArray($custom_style1);
	$newSheet->getStyle("A12")->applyFromArray($custom_style5);
	$newSheet->getStyle("A13")->applyFromArray($custom_style5);
	$newSheet->getStyle("B12")->applyFromArray($custom_style5);
	$newSheet->getStyle("C12")->applyFromArray($custom_style5);
	$newSheet->getStyle("D12")->applyFromArray($custom_style5);
	$newSheet->getStyle("E12")->applyFromArray($custom_style5);
	$newSheet->getStyle("B13")->applyFromArray($custom_style5);
	$newSheet->getStyle("C13")->applyFromArray($custom_style5);
	$newSheet->getStyle("D13")->applyFromArray($custom_style5);
	$newSheet->getStyle("E13")->applyFromArray($custom_style5);
	$newSheet->getStyle("F12")->applyFromArray($custom_style5);
	$newSheet->getStyle("G12")->applyFromArray($custom_style5);
	$newSheet->getStyle("F13")->applyFromArray($custom_style5);
	$newSheet->getStyle("G13")->applyFromArray($custom_style5);

	$row = 14;
	$row2 = 16;
	$row3 = 18;
	$row4 = 20;
	$row5 = 22;
	$row6 = 23;

	foreach ($dd as $index => $attendance) {
		$newSheet->setCellValue('A'.$row, $attendance['attendance_date'])
               ->setCellValue('B'.$row, $attendance['am_in'])
               ->setCellValue('C'.$row, $attendance['am_out'])
               ->setCellValue('D'.$row,  $attendance['pm_in'])
               ->setCellValue('E'.$row,  $attendance['pm_out'])
               ->setCellValue('F'.$row,  $attendance['hours'])
               ->setCellValue('G'.$row,  $attendance['mins']);

        $newSheet->getStyle("A".$row)->applyFromArray($custom_style5);
        $newSheet->getStyle("B".$row)->applyFromArray($custom_style5);
        $newSheet->getStyle("C".$row)->applyFromArray($custom_style5);
        $newSheet->getStyle("D".$row)->applyFromArray($custom_style5);
        $newSheet->getStyle("E".$row)->applyFromArray($custom_style5);
        $newSheet->getStyle("F".$row)->applyFromArray($custom_style5);
        $newSheet->getStyle("G".$row)->applyFromArray($custom_style5);

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

	$newSheet->getStyle('A'.$extension)->getFont('Calibri')->setItalic(true)->setSize(9);
	$newSheet->getCell('A'.$extension)->setValue('I certify on my honor that the above is a true and correct report of the hours of work performed, record of which was made daily at the time of arrival and departure from office.');

	$newSheet->getCell('C'.$extension2)->setValue('________________________________________');
	$newSheet->getCell('C'.$extension4)->setValue('________________________________________');
	$newSheet->getCell('C'.$extension5)->setValue('In Charge');
	$newSheet->getStyle('A'.$extension)->getFont('Calibri')->setItalic(true)->setSize(10);
	$newSheet->getCell('A'.$extension3)->setValue('VERIFIED as to the prescribed office hours:');

	$newSheet->getStyle('A'.$extension)->getAlignment()->setWrapText(true); 
	$newSheet->getStyle('A'.$extension5)->getAlignment()->setWrapText(true); 
	$newSheet->mergeCells('A'.$extension.':'.'G'.$extension);
	$newSheet->mergeCells('C'.$extension2.':'.'E'.$extension2);
	$newSheet->mergeCells('C'.$extension4.':'.'E'.$extension4);

	$newSheet->mergeCells('C'.$extension5.':'.'E'.$extension5);

	$newSheet->getStyle('A'.$extension.':'.'G'.$extension)->applyFromArray($custom_style1);
	$newSheet->getStyle('C'.$extension5.':'.'E'.$extension5)->applyFromArray($custom_style1);
	$newSheet->getRowDimension($extension)->setRowHeight(25);

	$newSheet->setBreak('A52', PHPExcel_Worksheet::BREAK_ROW );
	$newSheet->setBreak('G52', PHPExcel_Worksheet::BREAK_COLUMN );
	$newSheet->setTitle(''.$username);

}

$history = [
	'month' 	=> $month,
	'year' 		=> $year,
	'uid' 		=> $_SESSION['currentuser'],
	'type'		=> 2,
	'tid'		=> $office
];

$hrm->insertExportDTRHistory($history);

header('Content-type: application/vnd.ms-excel');
$filename = 'dtr_.xls';
header('Content-Disposition: attachment; filename="'.$filename.'"');
$writer->save('php://output');
