<?php
session_start();
require '../../vendor/autoload.php';
require_once "../../connection.php";

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Style\Protection;


$spreadsheet = new Spreadsheet();
$spreadsheet->createSheet();
$sheet = $spreadsheet->setActiveSheetIndex(0);
$sheet->getProtection()->setSheet(true);
$security = $spreadsheet->getSecurity();
$security->setLockWindows(true);
$security->setLockStructure(true);
$sheet->setTitle('Participants');


//set column width
$sheet->getColumnDimension('A')->setWidth(30);
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
$sheet->getStyle('A3:D3')->getAlignment()->setHorizontal('center');

$sheet->getStyle('A1:D1')->getProtection()->setLocked(Protection::PROTECTION_PROTECTED);
$sheet->getStyle('A2:D2')->getProtection()->setLocked(Protection::PROTECTION_PROTECTED);
$sheet->getStyle('A3:D3')->getProtection()->setLocked(Protection::PROTECTION_PROTECTED);


//styling
$sheet->getStyle('A1')->applyFromArray(
	array(
		'font'=>array(
			'size' => 24
		)
	)
);

$styleArray = [
    'borders' => [
        'top' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
        ],
        'bottom' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
        ],
        'left' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
        ],
        'right' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
        ]
    ]
];

$sheet->getStyle('A1:D1')->applyFromArray(
	array(
		'borders' => [
	        'top' => [
	            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
	        ],
	        'left' => [
	            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
	        ],
	        'right' => [
	            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
	        ]
	    ]
	)    
);
$sheet->getStyle('A2')->applyFromArray(array('borders' => [
	        'left' => [
	            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
	        ]
	    ]));

$sheet->getStyle('A2:D2')->applyFromArray(array('borders' => [
	        'right' => [
	            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
	        ]
	    ]));

$sheet->getStyle('A3:D3')->applyFromArray($styleArray);


$sheet->getStyle('A3:D3')->applyFromArray(
	array(
		'font' => [
			'bold'=>true
		]
	)
);

// $sheet->getStyle('A1')->getProtection()

$spreadsheet->createSheet();
$sheet2 = $spreadsheet->setActiveSheetIndex(1);
$sheet2->setTitle('Instructions');


$sheet2->setCellValue('A5', 'Mark Kim A. Sacluti')
	  ->setCellValue('B5', 'FAD-RICTU')
	  ->setCellValue('C5', 'Database Administrator')
	  ->setCellValue('D5', 'markkimsacluti@gmail.com');

$sheet2->setCellValue('A6', 'Jon Eric Castillo')
	  ->setCellValue('B6', 'FAD-RICTU')
	  ->setCellValue('C6', 'Web Developer')
	  ->setCellValue('D6', 'jonericcastillo@gmail.com');	  

$sheet2->setCellValue('A8', 'This is a sample only');	  

//set column width
$sheet2->getColumnDimension('A')->setWidth(30);
$sheet2->getColumnDimension('B')->setWidth(30);
$sheet2->getColumnDimension('C')->setWidth(30);
$sheet2->getColumnDimension('D')->setWidth(30);

//make table headers
$sheet2->setCellValue('A1' , 'Instructions: Please accomplish all the information') 
    ->setCellValue('A2' , 'List Of Participants') //this is a title
	->setCellValue('A4' , 'Participant')
	->setCellValue('B4' , 'Position')
	->setCellValue('C4' , 'Office')
	->setCellValue('D4' , 'Email');

//merging the title
$sheet2->mergeCells('A2:D2');
$sheet2->mergeCells('A8:D8');

$sheet2->getStyle('A1')->applyFromArray(
	array(
		'font' => array(
			'bold'=>true
		)
	)
);

//aligning
$sheet2->getStyle('A2')->getAlignment()->setHorizontal('center');
$sheet2->getStyle('A8')->getAlignment()->setHorizontal('center');


//styling
$sheet2->getStyle('A2')->applyFromArray(
	array(
		'font'=>array(
			'size' => 24,
		)
	)
);

//styling
$sheet2->getStyle('A8')->applyFromArray(
	array(
		'font'=>array(
			'size' => 24,
		)
	)
);

$sheet2->getStyle('A8')->applyFromArray(
	array(
		'font' => array(
			'name'=> 'Adobe Arabic',
			'italic'=>true
		)
	)
);

$sheet2->getStyle('A4:D4')->applyFromArray(
	array(
		'font' => array(
			'bold'=>true
		)
	)
);


$today = new DateTime();
$filename = 'participants_template.xlsx';

// $writer = new Xlsx($spreadsheet);
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="'.$filename.'"');

$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save('php://output');
