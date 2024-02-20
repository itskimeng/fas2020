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
$entry_id = $_GET['entry_id'];

$qop = $qms->fetchProcedureData($id);
$qoe = $qms->fetchQOEs($id);
$process_owner = $qms->fetchProcessOwner($id);
$division = $qms->fetchDivision($id);

$office_opts = $qms->fetchOfficeOpts();
$month_opts = $qms->fetchMonthOpts();

if($division == '1'|| $division == '2' || $division == '3' || $division == '5'){
	$approver = 'DARRELL I. DIZON';

}else if ($division == '7' || $division == '18'){
	$approver = 'GILBERTO L. TUMAMAC';

}else if($division == '10'|| $division == '11' || $division == '12' || $division == '13' || $division == '14' || $division == '15' || $division == '26'){
	$approver = 'DR. CARINA S. CRUZ';

}else if($division == '17' || $division == '9' || $division == '8'){
	$approver = 'JAY-AR T. BELTRAN';
}

$text = '';
$n = 1;
foreach ($qoe as $key => $dd) {
	$text .= $n++ .'. '. $dd['objective'] ."\n";
}

$frequency_type = $qop['frequency_monitoring'];
$image = 'images/logo.png';

$phpExcel = new PHPExcel;
$objRichText = new PHPExcel_RichText();

$phpExcel->getProperties()->setTitle($qop['qp_code']);
$phpExcel->getProperties()->setCreator("QMS Secretariat");
$writer = PHPExcel_IOFactory::createWriter($phpExcel, "Excel2007");

$gdImage = imagecreatefromjpeg('../../images/logo_dilg.jpg');
$objDrawing = new PHPExcel_Worksheet_MemoryDrawing();
$objDrawing->setName('logo_dilg');
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
$sheet->getPageMargins()->setTop(0.75);
$sheet->getPageMargins()->setRight(0.4);
$sheet->getPageMargins()->setLeft(0.44);
$sheet->getPageMargins()->setBottom(0.75);
$sheet->getHeaderFooter()->setAlignWithMargins(false);
$sheet->getPageSetup()->setRowsToRepeatAtTopByStartAndEnd(1, 5);
$sheet->getHeaderFooter()->setOddHeader("&R&9 \n\n &8\n\n\n\n\n\n\n &P of &N");
$sheet->getHeaderFooter()->setEvenHeader("&R&8 \n\n &8\n\n\n\n\n\n\n &P of &N");

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

$sheet->getCell('F2')->setValue('DEPARTMENT OF THE INTERIOR AND LOCAL GOVERNMENT');
$sheet->getCell('F3')->setValue('QUALITY MONITORING AND EVALUATION (QME)');
$sheet->getStyle('F3')->getFont('Cambria')->setBold(true)->setSize(18);
$sheet->getCell('U1')->setValue('Document Code');
$sheet->getCell('U2')->setValue($qop['qp_code']);
$sheet->getCell('U3')->setValue('Rev. No.');
$sheet->getCell('V3')->setValue('Eff. Date');
$sheet->getCell('W3')->setValue('Page No.');

$sheet->getCell('A6')->setValue(' OFFICE');
$sheet->getCell('I6')->setValue(' '. $office_opts[$qop['office']]);
$sheet->getCell('A8')->setValue(' QUALITY PROCEDURE');
$sheet->getCell('I8')->setValue(' '. $qop['procedure_title']);
$sheet->getCell('A10')->setValue(' OBJECTIVE STATEMENT');
$sheet->getCell('I10')->setValue($text);
$text_len = strlen($text); 
if ($text_len >= 100) 
{
	$phpExcel->getActiveSheet()->getRowDimension('10')->setRowHeight(50);
}
else if ($text_len >= 200) 
{
	$phpExcel->getActiveSheet()->getRowDimension('10')->setRowHeight(70);
}
else if ($text_len >= 300)
{
	$phpExcel->getActiveSheet()->getRowDimension('10')->setRowHeight(80);
}
else if ($text_len >= 400)
{
	$phpExcel->getActiveSheet()->getRowDimension('10')->setRowHeight(90);
}
else if ($text_len >= 500)
{
	$phpExcel->getActiveSheet()->getRowDimension('10')->setRowHeight(110);
}
else if ($text_len >= 600)
{
	$phpExcel->getActiveSheet()->getRowDimension('10')->setRowHeight(120);
}
else if($text_len >= 700)
{
	$phpExcel->getActiveSheet()->getRowDimension('10')->setRowHeight(130);
}
else if($text_len >= 800)
{
	$phpExcel->getActiveSheet()->getRowDimension('10')->setRowHeight(140);
}
else if($text_len >= 900)
{
	$phpExcel->getActiveSheet()->getRowDimension('10')->setRowHeight(150);
}
else if($text_len >= 1000)
{
	$phpExcel->getActiveSheet()->getRowDimension('10')->setRowHeight(180);
}
$sheet->getCell('I10')->getStyle('I10')->getAlignment()->setWrapText(true); 

$sheet->getCell('A13')->setValue(' CURRENT PERIOD');
$sheet->getCell('I13')->setValue(' '. $month_opts[$period] .' '. $date->format('Y'));
$sheet->getCell('A16')->setValue(' INDICATORS');
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
$sheet->getCell('U4')->setValue(' '. $qop['rev_no'].' ');
$sheet->getCell('V4')->setValue(' '. $qop['EffDate'].' ');
$sheet->getStyle('A16:X16')->getFont('Cambria')->setBold(true);

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
        // 'fill' => array(
        //     'type' => PHPExcel_Style_Fill::FILL_SOLID,
        //     'color' => array('rgb' => 'E7E6E6')
        // ),
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

// $sheet->getStyle('A8:H9')->applyFromArray(
//     array(
//     	'alignment' => array(
// 	        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
// 		),
// 		'font'  => array(
// 	        'bold'  => true
//     	),
//         'fill' => array(
//             'type' => PHPExcel_Style_Fill::FILL_SOLID,
//             'color' => array('rgb' => 'E7E6E6')
//         ),
//         'borders' => array(
// 		   	'allborders' => array(
// 		      'style' => PHPExcel_Style_Border::BORDER_THIN
// 		   	)
// 		)
//     )
// );

$sheet->getStyle('A16:X16')->applyFromArray(
    array(
        'borders' => array(
		   	'allborders' => array(
		      'style' => PHPExcel_Style_Border::BORDER_THIN
		   	)
		)
    )
);

// $sheet->getStyle('A15:X15')->applyFromArray(
//     array(
//         // 'fill' => array(
//         //     'type' => PHPExcel_Style_Fill::FILL_SOLID,
//         //     'color' => array('rgb' => 'E7E6E6')
//         // ),
//         'borders' => array(
// 		   	'left' => array(
// 		      'style' => PHPExcel_Style_Border::BORDER_THIN
// 		   	),
// 		   	'right' => array(
// 		      'style' => PHPExcel_Style_Border::BORDER_THIN
// 		   	)
// 		)
//     )
// );

$sheet->getStyle('J16:X16')->applyFromArray(
    array(
    	'alignment' => array(
	        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
	        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
		)
    )
);

// $sheet->getStyle('A16')->applyFromArray(
//     array(
//         'fill' => array(
//             'type' => PHPExcel_Style_Fill::FILL_SOLID,
//             'color' => array('rgb' => 'E7E6E6')
//         ),
//         'borders' => array(
// 		   	'left' => array(
// 		      'style' => PHPExcel_Style_Border::BORDER_THIN
// 		   	),
// 		   	'right' => array(
// 		      'style' => PHPExcel_Style_Border::BORDER_THIN
// 		   	)
// 		)
//     )
// );

// $sheet->getStyle('X16')->applyFromArray(
//     array(
//         'fill' => array(
//             'type' => PHPExcel_Style_Fill::FILL_SOLID,
//             'color' => array('rgb' => 'E7E6E6')
//         ),
//         'borders' => array(
// 		   	'left' => array(
// 		      'style' => PHPExcel_Style_Border::BORDER_THIN
// 		   	),
// 		   	'right' => array(
// 		      'style' => PHPExcel_Style_Border::BORDER_THIN
// 		   	)
// 		)
//     )
// );

$style1 = array(
		'alignment' => array(
			'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
	        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
		),
        // 'fill' => array(
        //     'type' => PHPExcel_Style_Fill::FILL_SOLID,
        //     'color' => array('rgb' => 'E7E6E6')
        // ),
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
        // 'fill' => array(
        //     'type' => PHPExcel_Style_Fill::FILL_SOLID,
        //     'color' => array('rgb' => 'E7E6E6')
        // ),
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
$sheet->getStyle('J18:V18')->getAlignment()->setWrapText(true); 

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
// $sheet->mergeCells('B16:C16');
$sheet->mergeCells('A16:I16');
$sheet->mergeCells('A15:X15');
$sheet->mergeCells('V16:X16');
$sheet->mergeCells('W3:X3');
$sheet->mergeCells('W4:X4');



$row = 17;
$counter = 0;
$initial_count = 0;
foreach ($qoe as $key => $entry) {

	$qmes = $qms->fetchQOEFrequency($entry_id, $entry['qoe_id']);
	// print_r($entry);
	// var_dump($entry);
	// print_r($qmes[1]);
	// print_r($qmes);
	// print_r($qmes[1]['rate']);
	// print_r($qmes[2]['rate']);
	// print_r($qmes[3]['rate']);
	// print_r($qmes[4]['rate']);
	// print_r($qmes[4]['total']);
	// die();
	
	$indicator = 'Objective '. ++$counter .': '. $entry['objective'];
	$sheet->getCell('A'.$row)->setValue($indicator);
    $sheet->getStyle("A".$row.':X'.$row)->applyFromArray($style2);
    // $sheet->getStyle("A".$row)->applyFromArray($style3);
    // $sheet->getStyle("X".$row)->applyFromArray($style3);
	$sheet->mergeCells('A'.$row.':X'.$row++);

	$formula = '';
	$gap_analysis = '';

	// INDICATOR A
	if ($entry['indicator_a'] != '') 
	{
		$sheet->getCell('A'.$row)->setValue('A');
		$sheet->getCell('D'.$row)->setValue($entry['indicator_a']);
		$formula = 'B';
		$gap_analysis = 'C';
		// === CONVERT THIS TO DYNAMIC
		// === DATA TO BE DISPLAY WILL DEPEND ON CURRENT PERIOD 
		for ($i=1; $i < 13; $i++) { 
			$sheet->getCell('J'.$row)->setValue(!empty($qmes) ? $qmes[0]['rate']['01'] : 'n/a');
			$sheet->getCell('K'.$row)->setValue(!empty($qmes) ? $qmes[0]['rate']['02'] : 'n/a');
			$sheet->getCell('L'.$row)->setValue(!empty($qmes) ? $qmes[0]['rate']['03'] : 'n/a');
			$sheet->getCell('M'.$row)->setValue(!empty($qmes) ? $qmes[0]['rate']['04'] : 'n/a');
			$sheet->getCell('N'.$row)->setValue(!empty($qmes) ? $qmes[0]['rate']['05'] : 'n/a');
			$sheet->getCell('O'.$row)->setValue(!empty($qmes) ? $qmes[0]['rate']['06'] : 'n/a');
			$sheet->getCell('P'.$row)->setValue(!empty($qmes) ? $qmes[0]['rate']['07'] : 'n/a');
			$sheet->getCell('Q'.$row)->setValue(!empty($qmes) ? $qmes[0]['rate']['08'] : 'n/a');
			$sheet->getCell('R'.$row)->setValue(!empty($qmes) ? $qmes[0]['rate']['09'] : 'n/a');
			$sheet->getCell('S'.$row)->setValue(!empty($qmes) ? $qmes[0]['rate']['10'] : 'n/a');
			$sheet->getCell('T'.$row)->setValue(!empty($qmes) ? $qmes[0]['rate']['11'] : 'n/a');
			$sheet->getCell('U'.$row)->setValue(!empty($qmes) ? $qmes[0]['rate']['12'] : 'n/a');
		}
		// ====

		$sheet->getCell('V'.$row)->setValue(!empty($qmes) ? ($qmes[0]['total'] > 0 ? $qmes[0]['total'] : '0') : '0');

		// AUTO ROW HEIGHT NOT WORKING DUE TO VERSION CONFLICT
		$sheet->getRowDimension($row)->setRowHeight('45');
		$char_len = strlen($entry['indicator_a']); 
		if ($char_len > 100) {
			$sheet->getRowDimension($row)->setRowHeight('70');
		} else if ($char_len > 150) {
			$sheet->getRowDimension($row)->setRowHeight('110');
		}
	    $sheet->getStyle("A".$row.':C'.$row)->applyFromArray($style1);
	    $sheet->getStyle("J".$row.':X'.$row)->applyFromArray($style1);
	    // $sheet->getStyle("A".$row)->applyFromArray($style3);
	    // $sheet->getStyle("X".$row)->applyFromArray($style3);
		$sheet->getStyle("A".$row.':C'.$row)->getAlignment()->setWrapText(true); 

	    $sheet->getStyle("D".$row.':I'.$row)->applyFromArray($style2);
		$sheet->getStyle("D".$row.':I'.$row)->getAlignment()->setWrapText(true); 

		$sheet->mergeCells('A'.$row.':C'.$row);
		$sheet->mergeCells('D'.$row.':I'.$row);
		$sheet->mergeCells('V'.$row.':X'.$row++);

	}

	// INDICATOR B
	if ($entry['indicator_b'] != '') 
	{
		$sheet->getCell('A'.$row)->setValue('B');
		$sheet->getCell('D'.$row)->setValue($entry['indicator_b']);
		$formula = 'C';
		$gap_analysis = 'D';
		
		// === CONVERT THIS TO DYNAMIC
		// === DATA TO BE DISPLAY WILL DEPEND ON CURRENT PERIOD 
		for ($i=1; $i < 13; $i++) { 
			$sheet->getCell('J'.$row)->setValue(!empty($qmes) ? $qmes[1]['rate']['01'] : 'n/a');
			$sheet->getCell('K'.$row)->setValue(!empty($qmes) ? $qmes[1]['rate']['02'] : 'n/a');
			$sheet->getCell('L'.$row)->setValue(!empty($qmes) ? $qmes[1]['rate']['03'] : 'n/a');
			$sheet->getCell('M'.$row)->setValue(!empty($qmes) ? $qmes[1]['rate']['04'] : 'n/a');
			$sheet->getCell('N'.$row)->setValue(!empty($qmes) ? $qmes[1]['rate']['05'] : 'n/a');
			$sheet->getCell('O'.$row)->setValue(!empty($qmes) ? $qmes[1]['rate']['06'] : 'n/a');
			$sheet->getCell('P'.$row)->setValue(!empty($qmes) ? $qmes[1]['rate']['07'] : 'n/a');
			$sheet->getCell('Q'.$row)->setValue(!empty($qmes) ? $qmes[1]['rate']['08'] : 'n/a');
			$sheet->getCell('R'.$row)->setValue(!empty($qmes) ? $qmes[1]['rate']['09'] : 'n/a');
			$sheet->getCell('S'.$row)->setValue(!empty($qmes) ? $qmes[1]['rate']['10'] : 'n/a');
			$sheet->getCell('T'.$row)->setValue(!empty($qmes) ? $qmes[1]['rate']['11'] : 'n/a');
			$sheet->getCell('U'.$row)->setValue(!empty($qmes) ? $qmes[1]['rate']['12'] : 'n/a');
		}
		// ===

		$sheet->getCell('V'.$row)->setValue(!empty($qmes) ? ($qmes[1]['total'] > 0 ? $qmes[1]['total'] : '0') : '0');

		// AUTO ROW HEIGHT NOT WORKING DUE TO VERSION CONFLICT
		$sheet->getRowDimension($row)->setRowHeight('45');
		$char_len = strlen($entry['indicator_b']); 
		if ($char_len > 100) {
			$sheet->getRowDimension($row)->setRowHeight('70');
		} else if ($char_len > 150) {
			$sheet->getRowDimension($row)->setRowHeight('110');
		}
	    $sheet->getStyle("A".$row.':C'.$row)->applyFromArray($style1);
	    $sheet->getStyle("J".$row.':X'.$row)->applyFromArray($style1);
	    // $sheet->getStyle("A".$row)->applyFromArray($style3);
	    // $sheet->getStyle("X".$row)->applyFromArray($style3);
		$sheet->getStyle("A".$row.':C'.$row)->getAlignment()->setWrapText(true); 

	    $sheet->getStyle("D".$row.':I'.$row)->applyFromArray($style2);
		$sheet->getStyle("D".$row.':I'.$row)->getAlignment()->setWrapText(true); 

		$sheet->mergeCells('A'.$row.':C'.$row);
		$sheet->mergeCells('D'.$row.':I'.$row);
		$sheet->mergeCells('V'.$row.':X'.$row++);

	}



	// INDICATOR C
	if ($entry['indicator_c'] != '') 
	{
		$sheet->getCell('A'.$row)->setValue('C');
		$sheet->getCell('D'.$row)->setValue($entry['indicator_c']);
		$formula = 'D';
		$gap_analysis = 'E';

		// === CONVERT THIS TO DYNAMIC
		// === DATA TO BE DISPLAY WILL DEPEND ON CURRENT PERIOD 
		for ($i=1; $i < 13; $i++) { 
			$sheet->getCell('J'.$row)->setValue(!empty($qmes) ? $qmes[2]['rate']['01'] : 'n/a');
			$sheet->getCell('K'.$row)->setValue(!empty($qmes) ? $qmes[2]['rate']['02'] : 'n/a');
			$sheet->getCell('L'.$row)->setValue(!empty($qmes) ? $qmes[2]['rate']['03'] : 'n/a');
			$sheet->getCell('M'.$row)->setValue(!empty($qmes) ? $qmes[2]['rate']['04'] : 'n/a');
			$sheet->getCell('N'.$row)->setValue(!empty($qmes) ? $qmes[2]['rate']['05'] : 'n/a');
			$sheet->getCell('O'.$row)->setValue(!empty($qmes) ? $qmes[2]['rate']['06'] : 'n/a');
			$sheet->getCell('P'.$row)->setValue(!empty($qmes) ? $qmes[2]['rate']['07'] : 'n/a');
			$sheet->getCell('Q'.$row)->setValue(!empty($qmes) ? $qmes[2]['rate']['08'] : 'n/a');
			$sheet->getCell('R'.$row)->setValue(!empty($qmes) ? $qmes[2]['rate']['09'] : 'n/a');
			$sheet->getCell('S'.$row)->setValue(!empty($qmes) ? $qmes[2]['rate']['10'] : 'n/a');
			$sheet->getCell('T'.$row)->setValue(!empty($qmes) ? $qmes[2]['rate']['11'] : 'n/a');
			$sheet->getCell('U'.$row)->setValue(!empty($qmes) ? $qmes[2]['rate']['12'] : 'n/a');
		}
		// ===

		$sheet->getCell('V'.$row)->setValue(!empty($qmes) ? ($qmes[2]['total'] > 0 ? $qmes[2]['total'] : '0') : '0');


		// AUTO ROW HEIGHT NOT WORKING DUE TO VERSION CONFLICT
		$sheet->getRowDimension($row)->setRowHeight('45');
		$char_len = strlen($entry['indicator_c']); 
		if ($char_len > 100) {
			$sheet->getRowDimension($row)->setRowHeight('70');
		} else if ($char_len > 150) {
			$sheet->getRowDimension($row)->setRowHeight('110');
		}
	    $sheet->getStyle("A".$row.':C'.$row)->applyFromArray($style1);
	    $sheet->getStyle("J".$row.':X'.$row)->applyFromArray($style1);
	    // $sheet->getStyle("A".$row)->applyFromArray($style3);
	    // $sheet->getStyle("X".$row)->applyFromArray($style3);
		$sheet->getStyle("A".$row.':C'.$row)->getAlignment()->setWrapText(true); 

	    $sheet->getStyle("D".$row.':I'.$row)->applyFromArray($style2);
		$sheet->getStyle("D".$row.':I'.$row)->getAlignment()->setWrapText(true); 

		$sheet->mergeCells('A'.$row.':C'.$row);
		$sheet->mergeCells('D'.$row.':I'.$row);
		$sheet->mergeCells('V'.$row.':X'.$row++);
	}



	// INDICATOR D
	if ($entry['indicator_d'] != '') 
	{
		$sheet->getCell('A'.$row)->setValue('D');
		$sheet->getCell('D'.$row)->setValue($entry['indicator_d']);
		$formula = 'E';
		$gap_analysis = 'F';

		// === CONVERT THIS TO DYNAMIC
		// === DATA TO BE DISPLAY WILL DEPEND ON CURRENT PERIOD 
		for ($i=1; $i < 13; $i++) { 
			$sheet->getCell('J'.$row)->setValue(!empty($qmes) ? $qmes[3]['rate']['01'] : 'n/a');
			$sheet->getCell('K'.$row)->setValue(!empty($qmes) ? $qmes[3]['rate']['02'] : 'n/a');
			$sheet->getCell('L'.$row)->setValue(!empty($qmes) ? $qmes[3]['rate']['03'] : 'n/a');
			$sheet->getCell('M'.$row)->setValue(!empty($qmes) ? $qmes[3]['rate']['04'] : 'n/a');
			$sheet->getCell('N'.$row)->setValue(!empty($qmes) ? $qmes[3]['rate']['05'] : 'n/a');
			$sheet->getCell('O'.$row)->setValue(!empty($qmes) ? $qmes[3]['rate']['06'] : 'n/a');
			$sheet->getCell('P'.$row)->setValue(!empty($qmes) ? $qmes[3]['rate']['07'] : 'n/a');
			$sheet->getCell('Q'.$row)->setValue(!empty($qmes) ? $qmes[3]['rate']['08'] : 'n/a');
			$sheet->getCell('R'.$row)->setValue(!empty($qmes) ? $qmes[3]['rate']['09'] : 'n/a');
			$sheet->getCell('S'.$row)->setValue(!empty($qmes) ? $qmes[3]['rate']['10'] : 'n/a');
			$sheet->getCell('T'.$row)->setValue(!empty($qmes) ? $qmes[3]['rate']['11'] : 'n/a');
			$sheet->getCell('U'.$row)->setValue(!empty($qmes) ? $qmes[3]['rate']['12'] : 'n/a');
		}
		// ===

		$sheet->getCell('V'.$row)->setValue(!empty($qmes) ? ($qmes[3]['total'] > 0 ? $qmes[3]['total'] : '0') : '0');


		// AUTO ROW HEIGHT NOT WORKING DUE TO VERSION CONFLICT
		$sheet->getRowDimension($row)->setRowHeight('45');
		$char_len = strlen($entry['indicator_d']); 
		if ($char_len > 100) {
			$sheet->getRowDimension($row)->setRowHeight('70');
		} else if ($char_len > 150) {
			$sheet->getRowDimension($row)->setRowHeight('110');
		}
	    $sheet->getStyle("A".$row.':C'.$row)->applyFromArray($style1);
	    $sheet->getStyle("J".$row.':X'.$row)->applyFromArray($style1);
	    // $sheet->getStyle("A".$row)->applyFromArray($style3);
	    // $sheet->getStyle("X".$row)->applyFromArray($style3);
		$sheet->getStyle("A".$row.':C'.$row)->getAlignment()->setWrapText(true); 

	    $sheet->getStyle("D".$row.':I'.$row)->applyFromArray($style2);
		$sheet->getStyle("D".$row.':I'.$row)->getAlignment()->setWrapText(true); 

		$sheet->mergeCells('A'.$row.':C'.$row);
		$sheet->mergeCells('D'.$row.':I'.$row);
		$sheet->mergeCells('V'.$row.':X'.$row++);
	}


	//FORMULA---------------------

		// $sheet->unmergeCells('D'.($row).':I'.($row));

		$sheet->getCell('A'.$row)->setValue($formula);
		$sheet->getCell('D'.$row)->setValue('Formula: '.$entry['formula']);
		$sheet->getCell('H'.$row)->setValue('Target: '.$entry['target_percentage']);

		// === CONVERT THIS TO DYNAMIC
		// === DATA TO BE DISPLAY WILL DEPEND ON CURRENT PERIOD 
		for ($i=1; $i < 13; $i++) { 
			$sheet->getCell('J'.$row)->setValue(!empty($qmes) ? $qmes[4]['rate']['01'] : 'n/a');
			$sheet->getCell('K'.$row)->setValue(!empty($qmes) ? $qmes[4]['rate']['02'] : 'n/a');
			$sheet->getCell('L'.$row)->setValue(!empty($qmes) ? $qmes[4]['rate']['03'] : 'n/a');
			$sheet->getCell('M'.$row)->setValue(!empty($qmes) ? $qmes[4]['rate']['04'] : 'n/a');
			$sheet->getCell('N'.$row)->setValue(!empty($qmes) ? $qmes[4]['rate']['05'] : 'n/a');
			$sheet->getCell('O'.$row)->setValue(!empty($qmes) ? $qmes[4]['rate']['06'] : 'n/a');
			$sheet->getCell('P'.$row)->setValue(!empty($qmes) ? $qmes[4]['rate']['07'] : 'n/a');
			$sheet->getCell('Q'.$row)->setValue(!empty($qmes) ? $qmes[4]['rate']['08'] : 'n/a');
			$sheet->getCell('R'.$row)->setValue(!empty($qmes) ? $qmes[4]['rate']['09'] : 'n/a');
			$sheet->getCell('S'.$row)->setValue(!empty($qmes) ? $qmes[4]['rate']['10'] : 'n/a');
			$sheet->getCell('T'.$row)->setValue(!empty($qmes) ? $qmes[4]['rate']['11'] : 'n/a');
			$sheet->getCell('U'.$row)->setValue(!empty($qmes) ? $qmes[4]['rate']['12'] : 'n/a');
		}
		
		$A = !empty($qmes[0]['total']) ? (int)$qmes[0]['total'] : 'n/a';
		$B = !empty($qmes[1]['total']) ? (int)$qmes[1]['total'] : 'n/a';
		$C = !empty($qmes[2]['total']) ? (int)$qmes[2]['total'] : 'n/a';
		$D = !empty($qmes[3]['total']) ? (int)$qmes[3]['total'] : 'n/a';

		if($entry['formula'] == 'A/Bx100'){
			if($A != 0 || $B !=0){
				$div = round($A / $B * 100) . '%';
				$sheet->getCell('V'.$row)->setValue($div);
			}else{
				$sheet->getCell('V'.$row)->setValue('0');
			}

			// print_r($div);
			}else if ($entry['formula'] == 'No. of Days Elapsed B-A'){
			// $div = (int)(int)($qmes[1]['total'] - (int)$qmes[0]['total']);
			$sheet->getCell('V'.$row)->setValue('');
			}else if($entry['formula'] == 'Notice of Suspension/Disallowance'){
			// $div = '3';
			//no indicator
			$sheet->getCell('V'.$row)->setValue('');
			}else if($entry['formula'] == 'A/(B+C)-Dx100'){
				if($A != 0 || $B !=0){
					$div = round($A / ($B + $C) - $D * 100) . '%';
					$sheet->getCell('V'.$row)->setValue($div);
				}else{
					$sheet->getCell('V'.$row)->setValue('0');
				}
			}
		

		// AUTO ROW HEIGHT NOT WORKING DUE TO VERSION CONFLICT
		$char_len = strlen($entry['indicator_e']); 
		$sheet->getRowDimension($row)->setRowHeight('45');
		$char_len = strlen($entry['indicator_e']); 
		if ($char_len > 100) {
			$sheet->getRowDimension($row)->setRowHeight('70');
		} else if ($char_len > 150) {
			$sheet->getRowDimension($row)->setRowHeight('110');
		}
	    $sheet->getStyle("A".$row.':C'.$row)->applyFromArray($style1);
	    $sheet->getStyle("J".$row.':X'.$row)->applyFromArray($style1);
	    // $sheet->getStyle("A".$row)->applyFromArray($style3);
	    // $sheet->getStyle("X".$row)->applyFromArray($style3);
		$sheet->getStyle("A".$row.':C'.$row)->getAlignment()->setWrapText(true); 

	    $sheet->getStyle("D".$row.':I'.$row)->applyFromArray($style2);
		$sheet->getStyle("D".$row.':I'.$row)->getAlignment()->setWrapText(true); 

		$sheet->mergeCells('A'.$row.':C'.$row);
		$sheet->mergeCells('D'.$row.':G'.$row);
		$sheet->mergeCells('H'.$row.':I'.$row);
		$sheet->mergeCells('V'.$row.':X'.$row++);
	//FORMULA---------------------


	// GAP ANALYSIS = TRUE
	// if ($entry['is_gap_analysis'] == 1) 
	// {
		$sheet->getCell('A'.$row)->setValue($gap_analysis);
		$sheet->getCell('D'.$row)->setValue('Gap Analysis: In case the objective is not met, put your analysis why it is not met.');

		$sheet->getRowDimension($row)->setRowHeight('30');
	    
	    $sheet->getStyle("A".$row.':C'.$row)->applyFromArray($style1);
	    $sheet->getStyle("J".$row.':X'.$row)->applyFromArray($style1);
	    $sheet->getStyle("D".$row.':I'.$row)->applyFromArray($style2);
	    // $sheet->getStyle("A".$row)->applyFromArray($style3);
	    // $sheet->getStyle("X".$row)->applyFromArray($style3);
		$sheet->getStyle("D".$row.':I'.$row)->getAlignment()->setWrapText(true); 
		$sheet->mergeCells('A'.$row.':C'.$row);
		$sheet->mergeCells('D'.$row.':I'.$row);
		// $sheet->getCell('J'.$row)->setValue($entry['gap_analysis']);
		$sheet->getCell('J'.$row)->setValue($qmes[0]['gap_analysis'])->getStyle('J'.$row)->getAlignment()->setWrapText(true)->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
		$sheet->mergeCells('J'.$row.':X'.$row++);	
	// }


}



// $sheet->getStyle("A".$row.':X'.$row)->applyFromArray($style4);
// $sheet->mergeCells('A'.$row.':X'.$row);
// $sheet->getRowDimension($row)->setRowHeight('8.4');

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
			'wrap'		=> true
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

if($division == '1'|| $division == '2' || $division == '3' || $division == '5'){
	$sheet->getCell('E'.$row)->setValue('Prepared by:');
	// $sheet->getCell('L'.$row)->setValue('Reviewed by:');
	$sheet->getCell('Q'.$row)->setValue('Reviewed and Approved by:');
	$sheet->getStyle("E".$row.':K'.$row)->applyFromArray($style5);
	$sheet->getStyle("Q".$row.':V'.$row)->applyFromArray($style5);
	$sheet->mergeCells('E'.$row.':K'.$row);
	// $sheet->mergeCells('L'.$row.':P'.$row);
	$sheet->mergeCells('Q'.$row.':V'.$row);
	
	
	$row = ++$row;
	$a = $row+5;
	
	$sheet->getCell('E'.$row)->setValue($process_owner);
	$sheet->getStyle("E".$row.':K'.$a)->applyFromArray($style6);
	$sheet->mergeCells('E'.$row.':K'.$a);
	
	// $sheet->getCell('L'.$row)->setValue($approver);
	// $sheet->getStyle("L".$row.':P'.$a)->applyFromArray($style6);
	// $sheet->mergeCells('L'.$row.':P'.$a);
	
	$sheet->getCell('Q'.$row)->setValue('DARRELL I. DIZON');
	$sheet->getStyle("Q".$row.':V'.$a)->applyFromArray($style6);
	$sheet->mergeCells('Q'.$row.':V'.$a);
	
	$row = $row + 6;
	$sheet->getCell('E'.$row)->setValue('Process Owner');
	$sheet->getStyle("E".$row.':K'.$row)->applyFromArray($style7);
	$sheet->mergeCells('E'.$row.':K'.$row);
	
	// $sheet->getCell('L'.$row)->setValue('Regional QMR Deputy');
	// $sheet->getStyle("L".$row.':P'.$row)->applyFromArray($style7);
	// $sheet->mergeCells('L'.$row.':P'.$row);
	
	$sheet->getCell('Q'.$row)->setValue('Regional QMR');
	$sheet->getStyle("Q".$row.':V'.$row)->applyFromArray($style7);
	$sheet->mergeCells('Q'.$row.':V'.$row);
}else{
	$sheet->getCell('E'.$row)->setValue('Prepared by:');
	$sheet->getCell('L'.$row)->setValue('Reviewed by:');
	$sheet->getCell('Q'.$row)->setValue('Approved by:');
	$sheet->getStyle("E".$row.':V'.$row)->applyFromArray($style5);
	$sheet->mergeCells('E'.$row.':K'.$row);
	$sheet->mergeCells('L'.$row.':P'.$row);
	$sheet->mergeCells('Q'.$row.':V'.$row);
	
	
	$row = ++$row;
	$a = $row+5;
	
	$sheet->getCell('E'.$row)->setValue($process_owner);
	$sheet->getStyle("E".$row.':K'.$a)->applyFromArray($style6);
	$sheet->mergeCells('E'.$row.':K'.$a);
	
	$sheet->getCell('L'.$row)->setValue($approver);
	$sheet->getStyle("L".$row.':P'.$a)->applyFromArray($style6);
	$sheet->mergeCells('L'.$row.':P'.$a);
	
	$sheet->getCell('Q'.$row)->setValue('DARRELL I. DIZON');
	$sheet->getStyle("Q".$row.':V'.$a)->applyFromArray($style6);
	$sheet->mergeCells('Q'.$row.':V'.$a);
	
	$row = $row + 6;
	$sheet->getCell('E'.$row)->setValue('Process Owner');
	$sheet->getStyle("E".$row.':K'.$row)->applyFromArray($style7);
	$sheet->mergeCells('E'.$row.':K'.$row);
	
	$sheet->getCell('L'.$row)->setValue('Regional Deputy QMR');
	$sheet->getStyle("L".$row.':P'.$row)->applyFromArray($style7);
	$sheet->mergeCells('L'.$row.':P'.$row);
	
	$sheet->getCell('Q'.$row)->setValue('Regional QMR');
	$sheet->getStyle("Q".$row.':V'.$row)->applyFromArray($style7);
	$sheet->mergeCells('Q'.$row.':V'.$row);
}


header('Content-type: application/vnd.ms-excel');
$filename = 'QME_'.$qop['qp_code'].'_'.date('m-d-Y').'.xls';
header('Content-Disposition: attachment; filename="'.$filename.'"');
$writer->save('php://output');
