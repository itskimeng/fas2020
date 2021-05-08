<?php

require '../../PHPExcel-1.8/Classes/PHPExcel.php';

$spreadsheet = new PHPExcel();

$spreadsheet->createSheet();
$sheet = $spreadsheet->setActiveSheetIndex(0);
// set the security
$security = $spreadsheet->getSecurity();
$security->setLockWindows(true);
$security->setLockStructure(true);

// set title
$sheet->setTitle('Participants');
$protection = $sheet->getProtection();
$protection->setSheet(true);
$protection->setPassword('dilg4a_kimpogi');

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

$sheet->getStyle('A4:D500')->getProtection()->setLocked(PHPExcel_Style_Protection::PROTECTION_UNPROTECTED);

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
            'borderStyle' => PHPExcel_Style_Border::BORDER_THIN,
        ],
        'bottom' => [
            'borderStyle' => PHPExcel_Style_Border::BORDER_THIN,
        ],
        'left' => [
            'borderStyle' => PHPExcel_Style_Border::BORDER_THIN,
        ],
        'right' => [
            'borderStyle' => PHPExcel_Style_Border::BORDER_THIN,
        ]
    ]
];

$sheet->getStyle('A1:D1')->applyFromArray(
	array(
		'borders' => [
	        'top' => [
	            'borderStyle' => PHPExcel_Style_Border::BORDER_THIN,
	        ],
	        'left' => [
	            'borderStyle' => PHPExcel_Style_Border::BORDER_THIN,
	        ],
	        'right' => [
	            'borderStyle' => PHPExcel_Style_Border::BORDER_THIN,
	        ]
	    ]
	)    
);
$sheet->getStyle('A2')->applyFromArray(array('borders' => [
	        'left' => [
	            'borderStyle' => PHPExcel_Style_Border::BORDER_THIN,
	        ]
	    ]));

$sheet->getStyle('A2:D2')->applyFromArray(array('borders' => [
	        'right' => [
	            'borderStyle' => PHPExcel_Style_Border::BORDER_THIN,
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


// INSTRUCTIONS
$spreadsheet->createSheet();
$sheet2 = $spreadsheet->setActiveSheetIndex(1);

// set the security
$security = $spreadsheet->getSecurity();
$security->setLockWindows(true);
$security->setLockStructure(true);

$sheet2->setTitle('Instructions');
$protection = $sheet2->getProtection();
$protection->setSheet(true);
$protection->setPassword('dilg4a_kimpogi');


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



$objWriter = PHPExcel_IOFactory::createWriter($spreadsheet, 'Excel2007');
ob_end_clean();

// redirect output to client browser
header('Content-type: application/vnd.ms-excel');
header('Content-Disposition: attachment; filename="participants_template.xlsx"');
header('Cache-Control: max-age=0');

$objWriter->save('php://output'); 

