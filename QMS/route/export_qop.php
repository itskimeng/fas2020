<?php
session_start();
date_default_timezone_set('Asia/Manila');

require_once '../../PHPExcel-1.8/Classes/PHPExcel.php';
require_once '../../Model/Connection.php';
require_once '../../Model/QMSProcedure.php';
require_once '../manager/QMSManager.php';

$qms = new QMSManager();
$date = new DateTime();

$id = $_GET['id'];
$period = $_GET['period'];

$qop = $qms->fetchProcedureData($id);
$qoe = $qms->fetchQOEs($id);
$process_owner = $qms->fetchProcessOwner($id);

$office_opts = $qms->fetchOfficeOpts();
$month_opts = $qms->fetchMonthOpts();

$text = '';
foreach ($qoe as $key => $dd) {
	$text .= '* '. $dd['objective'] .';';
}

$frequency_type = $qop['frequency_monitoring'];
$image = 'images/logo.png';

$phpExcel = new PHPExcel;
$objRichText = new PHPExcel_RichText();

$phpExcel->getProperties()->setTitle("Employee Daily Time Record");
$phpExcel->getProperties()->setCreator("Official Personnel");
$writer = PHPExcel_IOFactory::createWriter($phpExcel, "Excel2007");

$gdImage = imagecreatefromjpeg('../../images/logo_dilg.jpg');
$objDrawing = new PHPExcel_Worksheet_MemoryDrawing();
$objDrawing->setName('Sample image');
$objDrawing->setDescription('TEST');
$objDrawing->setImageResource($gdImage);
$objDrawing->setRenderingFunction(PHPExcel_Worksheet_MemoryDrawing::RENDERING_JPEG);
$objDrawing->setMimeType(PHPExcel_Worksheet_MemoryDrawing::MIMETYPE_DEFAULT);
$objDrawing->setHeight(100);
$objDrawing->setCoordinates('A1');
$objDrawing->setWorksheet($phpExcel->getActiveSheet());

$styleArray = array(
    'font'  => array(
        'size'  => 11,
        'name'  => 'Cambria'
    ));

$phpExcel->getDefaultStyle()->applyFromArray($styleArray);
$sheet = $phpExcel->getActiveSheet();
// $sheet->getStyle()->getFont('Cambria')->setBold(true)->setSize(11);

$sheet->getPageSetup()->setFitToPage(true);
$sheet->getPageSetup()->setFitToWidth(1);    
$sheet->getPageSetup()->setFitToHeight(0);  
$sheet->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
$sheet->getPageSetup()->setPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4);


$sheet->getColumnDimension('A')->setWidth('1.11');
$sheet->getColumnDimension('B')->setWidth('2.22');
$sheet->getColumnDimension('C')->setWidth('2.22');
$sheet->getColumnDimension('D')->setWidth('4.33');
$sheet->getColumnDimension('E')->setWidth('3.44');
$sheet->getColumnDimension('F')->setWidth('3.44');
$sheet->getColumnDimension('V')->setWidth('9.22');
$sheet->getColumnDimension('W')->setWidth('9.78');
$sheet->getColumnDimension('X')->setWidth('1.11');
$sheet->getRowDimension('2')->setRowHeight('18');
$sheet->getRowDimension('15')->setRowHeight('8.4');
$sheet->getRowDimension('16')->setRowHeight('14.4');
// $sheet->getRowDimension('17')->setRowHeight('14.4');
// $sheet->getRowDimension('18')->setRowHeight('14.4');
// $sheet->getRowDimension('19')->setRowHeight('14.4');
// $sheet->getRowDimension('20')->setRowHeight('14.4');
// $sheet->getRowDimension('21')->setRowHeight('35.4');

$sheet->getCell('F2')->setValue('DEPARTMENT OF THE INTERIOR AND LOCAL GOVERNMENT');
$sheet->getCell('F3')->setValue('QUALITY MONITORING AND EVALUATION (QME)');
$sheet->getStyle('F3')->getFont('Cambria')->setBold(true)->setSize(18);
$sheet->getCell('U1')->setValue('Document Code');
$sheet->getCell('U2')->setValue('QME-QP-DILG-AS-RO-15');
$sheet->getCell('U3')->setValue('Rev. No.');
$sheet->getCell('V3')->setValue('Eff. Date');
$sheet->getCell('W3')->setValue('Page No.');
$sheet->getCell('A6')->setValue(' OFFICE');
$sheet->getCell('I6')->setValue(' '. $office_opts[$qop['office']]);
$sheet->getCell('A8')->setValue(' QUALITY PROCEDURE');
$sheet->getCell('I8')->setValue(' '. $qop['procedure_title']);
$sheet->getCell('A10')->setValue(' OBJECTIVE STATEMENT');
$sheet->getCell('I10')->setValue($text);
$sheet->getCell('A13')->setValue(' CURRENT PERIOD');
$sheet->getCell('I13')->setValue(' '. $month_opts[$period] .' '. $date->format('Y'));
$sheet->getCell('D16')->setValue(' INDICATORS');
$sheet->getCell('J16')->setValue('JAN');
$sheet->getCell('K16')->setValue('FEB');
$sheet->getCell('L16')->setValue('MAR');
$sheet->getCell('M16')->setValue('APR');
$sheet->getCell('N16')->setValue('MAY');
$sheet->getCell('O16')->setValue('JUN');
$sheet->getCell('P16')->setValue('JUL');
$sheet->getCell('Q16')->setValue('AUG');
$sheet->getCell('R16')->setValue('SEP');
$sheet->getCell('S16')->setValue('OCT');
$sheet->getCell('T16')->setValue('NOV');
$sheet->getCell('U16')->setValue('DEC');
$sheet->getCell('V16')->setValue('TOTAL');
$sheet->getCell('U4')->setValue('0');
$sheet->getCell('V4')->setValue('06.15.21');
$sheet->getStyle('D16:X16')->getFont('Cambria')->setBold(true);

$sheet->getStyle('U1:X1')->applyFromArray(
    array(
    	'alignment' => array(
	        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
		),
    	'font'  => array(
	        'bold'  => true,
	        'color' => array('rgb' => 'FFFFFF'),
	        'size'  => 8,
	        'name'  => 'Cambria'
    	),
        'fill' => array(
            'type' => PHPExcel_Style_Fill::FILL_SOLID,
            'color' => array('rgb' => '#000000')
        ),
        'borders' => array(
		   	'allborders' => array(
		      'style' => PHPExcel_Style_Border::BORDER_THICK
		   	)
		)
    )
);

$sheet->getStyle('U2:X2')->applyFromArray(
    array(
    	'alignment' => array(
	        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
	        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
		),
    	'font'  => array(
	        'bold'  => true,
	        'size'  => 12,
	        'name'  => 'Cambria'
    	),
        'borders' => array(
		   	'allborders' => array(
		      'style' => PHPExcel_Style_Border::BORDER_THICK
		   	)
		)
    )
);

$sheet->getStyle('U3:X3')->applyFromArray(
    array(
    	'alignment' => array(
	        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
	        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
		),
    	'font'  => array(
	        'color' => array('rgb' => 'FFFFFF'),
	        'size'  => 8,
	        'name'  => 'Cambria'
    	),
        'fill' => array(
            'type' => PHPExcel_Style_Fill::FILL_SOLID,
            'color' => array('rgb' => '808080')
        ),
        'borders' => array(
		   	'allborders' => array(
		      'style' => PHPExcel_Style_Border::BORDER_THICK
		   	)
		)
    )
);

$sheet->getStyle('U4:X4')->applyFromArray(
    array(
    	'alignment' => array(
	        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
	        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
		),
    	'font'  => array(
	        'size'  => 8,
	        'name'  => 'Cambria'
    	),
        'borders' => array(
		   	'allborders' => array(
		      'style' => PHPExcel_Style_Border::BORDER_THICK
		   	)
		)
    )
);

$sheet->getStyle('A6:H14')->applyFromArray(
    array(
    	'alignment' => array(
	        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
		),
		'font'  => array(
	        'bold'  => true
    	),
        'fill' => array(
            'type' => PHPExcel_Style_Fill::FILL_SOLID,
            'color' => array('rgb' => 'E7E6E6')
        ),
        'borders' => array(
		   	'allborders' => array(
		      'style' => PHPExcel_Style_Border::BORDER_THIN
		   	)
		)
    )
);

$sheet->getStyle('I6:X14')->applyFromArray(
    array(
    	'alignment' => array(
	        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
		),
		'font'  => array(
	        'name'  => 'Cambria'
    	),
        'borders' => array(
		   	'allborders' => array(
		      'style' => PHPExcel_Style_Border::BORDER_THIN
		   	)
		)
    )
);

$sheet->getStyle('A8:H9')->applyFromArray(
    array(
    	'alignment' => array(
	        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
		),
		'font'  => array(
	        'bold'  => true
    	),
        'fill' => array(
            'type' => PHPExcel_Style_Fill::FILL_SOLID,
            'color' => array('rgb' => 'E7E6E6')
        ),
        'borders' => array(
		   	'allborders' => array(
		      'style' => PHPExcel_Style_Border::BORDER_THIN
		   	)
		)
    )
);

$sheet->getStyle('B16:W16')->applyFromArray(
    array(
        'borders' => array(
		   	'allborders' => array(
		      'style' => PHPExcel_Style_Border::BORDER_THIN
		   	)
		)
    )
);

$sheet->getStyle('A15:X15')->applyFromArray(
    array(
        'fill' => array(
            'type' => PHPExcel_Style_Fill::FILL_SOLID,
            'color' => array('rgb' => 'E7E6E6')
        ),
        'borders' => array(
		   	'left' => array(
		      'style' => PHPExcel_Style_Border::BORDER_THIN
		   	),
		   	'right' => array(
		      'style' => PHPExcel_Style_Border::BORDER_THIN
		   	)
		)
    )
);

$sheet->getStyle('J16:X16')->applyFromArray(
    array(
    	'alignment' => array(
	        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
	        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
		)
    )
);

$sheet->getStyle('A16')->applyFromArray(
    array(
        'fill' => array(
            'type' => PHPExcel_Style_Fill::FILL_SOLID,
            'color' => array('rgb' => 'E7E6E6')
        ),
        'borders' => array(
		   	'left' => array(
		      'style' => PHPExcel_Style_Border::BORDER_THIN
		   	),
		   	'right' => array(
		      'style' => PHPExcel_Style_Border::BORDER_THIN
		   	)
		)
    )
);

$sheet->getStyle('X16')->applyFromArray(
    array(
        'fill' => array(
            'type' => PHPExcel_Style_Fill::FILL_SOLID,
            'color' => array('rgb' => 'E7E6E6')
        ),
        'borders' => array(
		   	'left' => array(
		      'style' => PHPExcel_Style_Border::BORDER_THIN
		   	),
		   	'right' => array(
		      'style' => PHPExcel_Style_Border::BORDER_THIN
		   	)
		)
    )
);

$style1 = array(
		'alignment' => array(
			'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
	        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
		),
        'fill' => array(
            'type' => PHPExcel_Style_Fill::FILL_SOLID,
            'color' => array('rgb' => 'E7E6E6')
        ),
        'borders' => array(
		   	'allborders' => array(
		      'style' => PHPExcel_Style_Border::BORDER_THIN
		   	)
		)
    );

$style2 = array(
		'alignment' => array(
	        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
		),
        'fill' => array(
            'type' => PHPExcel_Style_Fill::FILL_SOLID,
            'color' => array('rgb' => 'E7E6E6')
        ),
        'borders' => array(
		   	'allborders' => array(
		      'style' => PHPExcel_Style_Border::BORDER_THIN
		   	)
		)
    );

$style3 = array(
        'fill' => array(
            'type' => PHPExcel_Style_Fill::FILL_SOLID,
            'color' => array('rgb' => 'E7E6E6')
        ),
        'borders' => array(
		   	'left' => array(
		      'style' => PHPExcel_Style_Border::BORDER_THIN
		   	),
		   	'right' => array(
		      'style' => PHPExcel_Style_Border::BORDER_THIN
		   	)
		)
    );

$style4 = array(
        'fill' => array(
            'type' => PHPExcel_Style_Fill::FILL_SOLID,
            'color' => array('rgb' => 'E7E6E6')
        ),
        'borders' => array(
		   	'left' => array(
		      'style' => PHPExcel_Style_Border::BORDER_THIN
		   	),
		   	'right' => array(
		      'style' => PHPExcel_Style_Border::BORDER_THIN
		   	),
		   	'bottom' => array(
		      'style' => PHPExcel_Style_Border::BORDER_THIN
		   	)
		)
    );

$sheet->getStyle('U1:X1')->getAlignment()->setWrapText(true); 
$sheet->getStyle('U1:X1')->getAlignment()->setWrapText(true);
$sheet->getStyle('I6:X6')->getAlignment()->setWrapText(true);  
$sheet->getStyle('I8:X8')->getAlignment()->setWrapText(true);  
$sheet->getStyle('I10:X10')->getAlignment()->setWrapText(true); 

$sheet->mergeCells('U1:X1');
$sheet->mergeCells('U2:X2');
$sheet->mergeCells('A6:H7');
$sheet->mergeCells('A8:H9');
$sheet->mergeCells('I6:X7');
$sheet->mergeCells('I8:X9');
$sheet->mergeCells('A10:H12');
$sheet->mergeCells('I10:X12');
$sheet->mergeCells('A13:H14');
$sheet->mergeCells('I13:X14');
$sheet->mergeCells('B16:C16');
$sheet->mergeCells('D16:I16');
$sheet->mergeCells('A15:X15');
$sheet->mergeCells('V16:W16');
$sheet->mergeCells('W3:X3');
$sheet->mergeCells('W4:X4');

$row = 17;
$counter = 0;

foreach ($qoe as $key => $entry) {
	$qmes = $qms->fetchQOEFrequency($key);
	
	$indicator = 'Objective '. ++$counter .': '. $entry['objective'];
	$sheet->getCell('B'.$row)->setValue($indicator);
    $sheet->getStyle("B".$row.':W'.$row)->applyFromArray($style2);
    $sheet->getStyle("A".$row)->applyFromArray($style3);
    $sheet->getStyle("X".$row)->applyFromArray($style3);
	$sheet->mergeCells('B'.$row.':W'.$row++);


	// INDICATOR A
	$sheet->getCell('B'.$row)->setValue('A');
	$sheet->getCell('D'.$row)->setValue($entry['indicator_a']);

	// === CONVERT THIS TO DYNAMIC
	// === DATA TO BE DISPLAY WILL DEPEND ON CURRENT PERIOD 
	for ($i=1; $i < 13; $i++) { 
		$sheet->getCell('J'.$row)->setValue(!empty($qmes) ? $qmes[0]['rate']['01'] : '');
		$sheet->getCell('K'.$row)->setValue(!empty($qmes) ? $qmes[0]['rate']['02'] : '');
		$sheet->getCell('L'.$row)->setValue(!empty($qmes) ? $qmes[0]['rate']['03'] : '');
		$sheet->getCell('M'.$row)->setValue(!empty($qmes) ? $qmes[0]['rate']['04'] : '');
		$sheet->getCell('N'.$row)->setValue(!empty($qmes) ? $qmes[0]['rate']['05'] : '');
		$sheet->getCell('O'.$row)->setValue(!empty($qmes) ? $qmes[0]['rate']['06'] : '');
		$sheet->getCell('P'.$row)->setValue(!empty($qmes) ? $qmes[0]['rate']['07'] : '');
		$sheet->getCell('Q'.$row)->setValue(!empty($qmes) ? $qmes[0]['rate']['08'] : '');
		$sheet->getCell('R'.$row)->setValue(!empty($qmes) ? $qmes[0]['rate']['09'] : '');
		$sheet->getCell('S'.$row)->setValue(!empty($qmes) ? $qmes[0]['rate']['10'] : '');
		$sheet->getCell('T'.$row)->setValue(!empty($qmes) ? $qmes[0]['rate']['11'] : '');
		$sheet->getCell('U'.$row)->setValue(!empty($qmes) ? $qmes[0]['rate']['12'] : '');
	}
	// ====

	$sheet->getCell('V'.$row)->setValue(!empty($qmes) ? ($qmes[0]['total'] > 0 ? $qmes[0]['total'] : '') : '');

	// AUTO ROW HEIGHT NOT WORKING DUE TO VERSION CONFLICT
	$char_len = strlen($entry['indicator_a']); 
	if ($char_len > 100) {
		$sheet->getRowDimension($row)->setRowHeight('48');
	} else {
		$sheet->getRowDimension($row)->setRowHeight('30');
	}
    $sheet->getStyle("B".$row.':C'.$row)->applyFromArray($style1);
    $sheet->getStyle("J".$row.':W'.$row)->applyFromArray($style1);
    $sheet->getStyle("A".$row)->applyFromArray($style3);
    $sheet->getStyle("X".$row)->applyFromArray($style3);
	$sheet->getStyle("B".$row.':C'.$row)->getAlignment()->setWrapText(true); 

    $sheet->getStyle("D".$row.':I'.$row)->applyFromArray($style2);
	$sheet->getStyle("D".$row.':I'.$row)->getAlignment()->setWrapText(true); 

	$sheet->mergeCells('B'.$row.':C'.$row);
	$sheet->mergeCells('D'.$row.':I'.$row);
	$sheet->mergeCells('V'.$row.':W'.$row++);

	// INDICATOR B
	$sheet->getCell('B'.$row)->setValue('B');
	$sheet->getCell('D'.$row)->setValue($entry['indicator_b']);
	
	// === CONVERT THIS TO DYNAMIC
	// === DATA TO BE DISPLAY WILL DEPEND ON CURRENT PERIOD 
	for ($i=1; $i < 13; $i++) { 
		$sheet->getCell('J'.$row)->setValue(!empty($qmes) ? $qmes[1]['rate']['01'] : '');
		$sheet->getCell('K'.$row)->setValue(!empty($qmes) ? $qmes[1]['rate']['02'] : '');
		$sheet->getCell('L'.$row)->setValue(!empty($qmes) ? $qmes[1]['rate']['03'] : '');
		$sheet->getCell('M'.$row)->setValue(!empty($qmes) ? $qmes[1]['rate']['04'] : '');
		$sheet->getCell('N'.$row)->setValue(!empty($qmes) ? $qmes[1]['rate']['05'] : '');
		$sheet->getCell('O'.$row)->setValue(!empty($qmes) ? $qmes[1]['rate']['06'] : '');
		$sheet->getCell('P'.$row)->setValue(!empty($qmes) ? $qmes[1]['rate']['07'] : '');
		$sheet->getCell('Q'.$row)->setValue(!empty($qmes) ? $qmes[1]['rate']['08'] : '');
		$sheet->getCell('R'.$row)->setValue(!empty($qmes) ? $qmes[1]['rate']['09'] : '');
		$sheet->getCell('S'.$row)->setValue(!empty($qmes) ? $qmes[1]['rate']['10'] : '');
		$sheet->getCell('T'.$row)->setValue(!empty($qmes) ? $qmes[1]['rate']['11'] : '');
		$sheet->getCell('U'.$row)->setValue(!empty($qmes) ? $qmes[1]['rate']['12'] : '');
	}
	// ===

	$sheet->getCell('V'.$row)->setValue(!empty($qmes) ? ($qmes[1]['total'] > 0 ? $qmes[1]['total'] : '') : '');

	// AUTO ROW HEIGHT NOT WORKING DUE TO VERSION CONFLICT
	$char_len = strlen($entry['indicator_b']); 
	if ($char_len > 100) {
		$sheet->getRowDimension($row)->setRowHeight('48');
	} else {
		$sheet->getRowDimension($row)->setRowHeight('30');
	}
    $sheet->getStyle("B".$row.':C'.$row)->applyFromArray($style1);
    $sheet->getStyle("J".$row.':W'.$row)->applyFromArray($style1);
    $sheet->getStyle("A".$row)->applyFromArray($style3);
    $sheet->getStyle("X".$row)->applyFromArray($style3);
	$sheet->getStyle("B".$row.':C'.$row)->getAlignment()->setWrapText(true); 

    $sheet->getStyle("D".$row.':I'.$row)->applyFromArray($style2);
	$sheet->getStyle("D".$row.':I'.$row)->getAlignment()->setWrapText(true); 

	$sheet->mergeCells('B'.$row.':C'.$row);
	$sheet->mergeCells('D'.$row.':I'.$row);
	$sheet->mergeCells('V'.$row.':W'.$row++);

	// INDICATOR C
	$sheet->getCell('B'.$row)->setValue('B');
	$sheet->getCell('D'.$row)->setValue($entry['indicator_b']);

	// === CONVERT THIS TO DYNAMIC
	// === DATA TO BE DISPLAY WILL DEPEND ON CURRENT PERIOD 
	for ($i=1; $i < 13; $i++) { 
		$sheet->getCell('J'.$row)->setValue(!empty($qmes) ? $qmes[2]['rate']['01'] : '');
		$sheet->getCell('K'.$row)->setValue(!empty($qmes) ? $qmes[2]['rate']['02'] : '');
		$sheet->getCell('L'.$row)->setValue(!empty($qmes) ? $qmes[2]['rate']['03'] : '');
		$sheet->getCell('M'.$row)->setValue(!empty($qmes) ? $qmes[2]['rate']['04'] : '');
		$sheet->getCell('N'.$row)->setValue(!empty($qmes) ? $qmes[2]['rate']['05'] : '');
		$sheet->getCell('O'.$row)->setValue(!empty($qmes) ? $qmes[2]['rate']['06'] : '');
		$sheet->getCell('P'.$row)->setValue(!empty($qmes) ? $qmes[2]['rate']['07'] : '');
		$sheet->getCell('Q'.$row)->setValue(!empty($qmes) ? $qmes[2]['rate']['08'] : '');
		$sheet->getCell('R'.$row)->setValue(!empty($qmes) ? $qmes[2]['rate']['09'] : '');
		$sheet->getCell('S'.$row)->setValue(!empty($qmes) ? $qmes[2]['rate']['10'] : '');
		$sheet->getCell('T'.$row)->setValue(!empty($qmes) ? $qmes[2]['rate']['11'] : '');
		$sheet->getCell('U'.$row)->setValue(!empty($qmes) ? $qmes[2]['rate']['12'] : '');
	}
	// ===

	$sheet->getCell('V'.$row)->setValue(!empty($qmes) ? ($qmes[2]['total'] > 0 ? $qmes[2]['total'] : '') : '');


	// AUTO ROW HEIGHT NOT WORKING DUE TO VERSION CONFLICT
	$char_len = strlen($entry['indicator_b']); 
	if ($char_len > 100) {
		$sheet->getRowDimension($row)->setRowHeight('48');
	} else {
		$sheet->getRowDimension($row)->setRowHeight('30');
	}
    $sheet->getStyle("B".$row.':C'.$row)->applyFromArray($style1);
    $sheet->getStyle("J".$row.':W'.$row)->applyFromArray($style1);
    $sheet->getStyle("A".$row)->applyFromArray($style3);
    $sheet->getStyle("X".$row)->applyFromArray($style3);
	$sheet->getStyle("B".$row.':C'.$row)->getAlignment()->setWrapText(true); 

    $sheet->getStyle("D".$row.':I'.$row)->applyFromArray($style2);
	$sheet->getStyle("D".$row.':I'.$row)->getAlignment()->setWrapText(true); 

	$sheet->mergeCells('B'.$row.':C'.$row);
	$sheet->mergeCells('D'.$row.':I'.$row);
	$sheet->mergeCells('V'.$row.':W'.$row++);

	// INDICATOR D
	$sheet->getCell('B'.$row)->setValue('D');
	$sheet->getCell('D'.$row)->setValue('Gap Analysis: In case the objective is not met, put your analysis why it is not met.');

	$sheet->getRowDimension($row)->setRowHeight('30');
    
    $sheet->getStyle("B".$row.':C'.$row)->applyFromArray($style1);
    $sheet->getStyle("J".$row.':W'.$row)->applyFromArray($style1);
    $sheet->getStyle("D".$row.':I'.$row)->applyFromArray($style2);
    $sheet->getStyle("A".$row)->applyFromArray($style3);
    $sheet->getStyle("X".$row)->applyFromArray($style3);
	$sheet->getStyle("D".$row.':I'.$row)->getAlignment()->setWrapText(true); 
	$sheet->mergeCells('B'.$row.':C'.$row);
	$sheet->mergeCells('D'.$row.':I'.$row);
	$sheet->mergeCells('J'.$row.':W'.$row++);
}


$sheet->getStyle("A".$row.':X'.$row)->applyFromArray($style4);
$sheet->mergeCells('A'.$row.':X'.$row);
$sheet->getRowDimension($row)->setRowHeight('8.4');

$row = $row+3;

$style5 = array(
		'alignment' => array(
	        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
		),
    	'font'  => array(
	        'color' => array('rgb' => 'FFFFFF'),
	        'name'  => 'Cambria'
    	),
        'fill' => array(
            'type' => PHPExcel_Style_Fill::FILL_SOLID,
            'color' => array('rgb' => '000000')
        ),
        'borders' => array(
		   	'allborders' => array(
		      'style' => PHPExcel_Style_Border::BORDER_THIN
		   	)
		)
    );

$style6 = array(
		'alignment' => array(
	        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
		),
        'borders' => array(
		   	'allborders' => array(
		      'style' => PHPExcel_Style_Border::BORDER_THIN
		   	)
		)
    );

$style7 = array(
		'alignment' => array(
	        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
		),
		'font'  => array(
	        'bold'  => true
    	),
        'fill' => array(
            'type' => PHPExcel_Style_Fill::FILL_SOLID,
            'color' => array('rgb' => 'E7E6E6')
        ),
        'borders' => array(
		   	'allborders' => array(
		      'style' => PHPExcel_Style_Border::BORDER_THIN
		   	)
		)
    );

$sheet->getCell('E'.$row)->setValue('Prepared by:');
$sheet->getCell('L'.$row)->setValue('Reviewed by:');
$sheet->getCell('Q'.$row)->setValue('Approved by:');
$sheet->getStyle("E".$row.':V'.$row)->applyFromArray($style5);
$sheet->mergeCells('E'.$row.':K'.$row);
$sheet->mergeCells('L'.$row.':P'.$row);
$sheet->mergeCells('Q'.$row.':V'.$row);


$row = ++$row;
$sheet->getCell('E'.$row)->setValue($process_owner);
$sheet->getStyle("E".$row.':K'.$row+5)->applyFromArray($style6);
$sheet->mergeCells('E'.$row.':K'.$row+5);

$sheet->getCell('L'.$row)->setValue('DR. CARINA S. CRUZ');
$sheet->getStyle("L".$row.':P'.$row+5)->applyFromArray($style6);
$sheet->mergeCells('L'.$row.':P'.$row+5);

$sheet->getCell('Q'.$row)->setValue('NOEL R. BARTOLABAC');
$sheet->getStyle("Q".$row.':V'.$row+5)->applyFromArray($style6);
$sheet->mergeCells('Q'.$row.':V'.$row+5);

$row = $row + 6;
$sheet->getCell('E'.$row)->setValue('Process Owner');
$sheet->getStyle("E".$row.':K'.$row)->applyFromArray($style7);
$sheet->mergeCells('E'.$row.':K'.$row);

$sheet->getCell('L'.$row)->setValue('Regional QMR Deputy');
$sheet->getStyle("L".$row.':P'.$row)->applyFromArray($style7);
$sheet->mergeCells('L'.$row.':P'.$row);

$sheet->getCell('Q'.$row)->setValue('Regional QMR');
$sheet->getStyle("Q".$row.':V'.$row)->applyFromArray($style7);
$sheet->mergeCells('Q'.$row.':V'.$row);









header('Content-type: application/vnd.ms-excel');
$filename = 'report-dtr.xls';
header('Content-Disposition: attachment; filename="'.$filename.'"');
$writer->save('php://output');
