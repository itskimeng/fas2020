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

$sheet->getStyle('A4:D10000')->getProtection()->setLocked(PHPExcel_Style_Protection::PROTECTION_UNPROTECTED);

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


$objWriter = PHPExcel_IOFactory::createWriter($spreadsheet, 'Excel2007');
ob_end_clean();

// redirect output to client browser
header('Content-type: application/vnd.ms-excel');
header('Content-Disposition: attachment; filename="participants_template.xlsx"');
header('Cache-Control: max-age=0');

$objWriter->save('php://output'); 

