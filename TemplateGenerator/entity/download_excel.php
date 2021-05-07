<?php
require_once "../../connection.php";
require '../../vendor/autoload.php';


use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

//populate the data
$query = mysqli_query($conn,"select * from template_generator");
$row = 4;

$sheet->setCellValue('A'.$row, 'Mark Kim A. Sacluti')
	  ->setCellValue('B'.$row, 'FAD-RICTU')
	  ->setCellValue('C'.$row, 'Database Administrator')
	  ->setCellValue('D'.$row, 'markkimsacluti@gmail.com');

//set column width
$sheet->getColumnDimension('A')->setWidth(10);
$sheet->getColumnDimension('B')->setWidth(30);
$sheet->getColumnDimension('C')->setWidth(30);
$sheet->getColumnDimension('D')->setWidth(30);

//make table headers
$sheet->setCellValue('A1' , 'List Of Participants') //this is a title
	->setCellValue('A3' , 'Participant')
	->setCellValue('B3' , 'Position')
	->setCellValue('C3' , 'Office')
	->setCellValue('D3' , 'Email')
	;

//merging the title
$sheet->mergeCells('A1:D1');

//aligning
$sheet->getStyle('A1')->getAlignment()->setHorizontal('center');

//styling
$sheet->getStyle('A1')->applyFromArray(
	array(
		'font'=>array(
			'size' => 24,
		)
	)
);
$sheet->getStyle('A3:D3')->applyFromArray(
	array(
		'font' => array(
			'bold'=>true
		)
	)
);


$writer = new Xlsx($spreadsheet);
$writer->save('hello world.xlsx');
