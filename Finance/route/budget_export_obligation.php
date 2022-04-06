<?php
session_start();
date_default_timezone_set('Asia/Manila');

require_once '../../Model/Connection.php';
require_once '../../Model/Obligation.php';
require_once '../manager/BudgetManager.php';
require_once '../../PHPExcel-1.8/Classes/PHPExcel.php';  

$ob = new Obligation();
$bm = new BudgetManager();

$division = $_SESSION['division'];

$division_chiefs = [
	10 => ['name'=> 'DR. CARINA S. CRUZ', 'position'=> 'CHIEF, FAD'], 	
	18 => ['name'=> 'DON AYER A. ABRAZALDO', 'position'=> 'CHIEF, LGMED'], 	
	17 => ['name'=> 'JAY-AR T. BELTRAN', 'position'=> 'CHIEF, LGCDD'], 	
	9 => ['name'=> 'JAY-AR T. BELTRAN', 'position'=> 'CHIEF, LGCDD'],  
	1 => ['name'=> 'ARD NOEL R. BARTOLABAC', 'position'=> 'Assistant Regional Director'] 	
];

$division_chief = $division_chiefs[$division];

$spreadsheet = new PHPExcel();

$data = $bm->getObligations($_GET['id']);
$huc_opts = $bm->getHUCsOpts();

$spreadsheet->getProperties()->setTitle("Monthly Report");
$spreadsheet->getProperties()->setCreator("RISO Administrator");
$spreadsheet->getProperties()->setDescription("Monthly Report");
$writer = PHPExcel_IOFactory::createWriter($spreadsheet, "Excel2007");
$activeSheet = $spreadsheet->getActiveSheet();
$activeSheet->setTitle('OBR');


$activeSheet->getPageSetup()->setFitToPage(false);
$activeSheet->getPageSetup()->setScale(68);

$activeSheet->getColumnDimension('B')->setWidth('4');	
$activeSheet->getColumnDimension('C')->setWidth('5.5');
$activeSheet->getColumnDimension('J')->setWidth('4');	
$activeSheet->getColumnDimension('K')->setWidth('5.5');
$activeSheet->getColumnDimension('L')->setWidth('20');	
$activeSheet->getColumnDimension('M')->setWidth('22');

$activeSheet->getRowDimension('49')->setRowHeight('8');


// Creating spreadsheet header
$activeSheet->getStyle('M1')->getFont('Times New Roman')->setBold(true)->setItalic(true)->setSize(16);
$activeSheet->getCell('M1')->setValue('Appendix 11');
$activeSheet->getStyle('A3:J3')->getFont('Times New Roman')->setBold(true)->setSize(14);
$activeSheet->getCell('A3')->setValue('OBLIGATION REQUEST AND STATUS');
$activeSheet->getCell('A4')->setValue('DILG IV-A');
$activeSheet->getCell('A5')->setValue('Entity Name');

$activeSheet->getStyle('K3:M3')->getFont('Times New Roman')->setBold(true)->setSize(8);
$activeSheet->getCell('K3')->setValue('Serial No.: _____________ ');
$activeSheet->getStyle('K4:M4')->getFont('Times New Roman')->setBold(true)->setSize(8);
$activeSheet->getCell('K4')->setValue('Date: _____________ ');
$activeSheet->getStyle('K5:M5')->getFont('Times New Roman')->setBold(true)->setSize(8);
$activeSheet->getCell('K5')->setValue('Fund Cluster: _____________ ');

$activeSheet->getCell('A6')->setValue('Payee');
$activeSheet->getCell('A8')->setValue('Office');
$activeSheet->getCell('A10')->setValue('Address');
$activeSheet->getCell('A12')->setValue('Responsibility Center');
$activeSheet->getCell('D12')->setValue('Particulars');
$activeSheet->getCell('I12')->setValue('MFO/PAP');
$activeSheet->getCell('K12')->setValue('UACS Object Code');
$activeSheet->getCell('M12')->setValue('Amount');
$activeSheet->getCell('A34')->setValue('A.');
$activeSheet->getCell('B35')->setValue('Certified: ');
$activeSheet->getCell('D35')->setValue('Charges to appropriation/alloment are necessary, ');
$activeSheet->getCell('D36')->setValue('lawful and under my direct supervision; and ');
$activeSheet->getCell('D37')->setValue('supporting documents valid, proper and legal');
$activeSheet->getCell('I34')->setValue('B.');
$activeSheet->getCell('J35')->setValue('Certified: ');
$activeSheet->getCell('L35')->setValue('Allotment available and obligated for the purpose');
$activeSheet->getCell('L36')->setValue('or adjustment necessary as indicated above');
$activeSheet->getCell('A41')->setValue('Signature');
$activeSheet->getCell('C41')->setValue(': ___________________________________________');
$activeSheet->getCell('A43')->setValue('Printed Name');
$activeSheet->getCell('C43')->setValue(': '.$division_chief['name']);
$activeSheet->getCell('A45')->setValue('Position');
$activeSheet->getCell('C45')->setValue(': '.$division_chief['position']);
$activeSheet->getCell('A47')->setValue('Date: ');
$activeSheet->getCell('C47')->setValue(': ___________________________________________');

$activeSheet->getCell('I41')->setValue('Signature');
$activeSheet->getCell('K41')->setValue(': ___________________________________________');
$activeSheet->getCell('I43')->setValue('Printed Name');
$activeSheet->getCell('K43')->setValue(': MS. JORIELYN S. CUBIO');
$activeSheet->getCell('I45')->setValue('Position');
$activeSheet->getCell('K45')->setValue(': Budget Officer');
$activeSheet->getCell('I47')->setValue('Date: ');
$activeSheet->getCell('K47')->setValue(': ___________________________________________');

$activeSheet->getCell('A50')->setValue('C.');
$activeSheet->getCell('B50')->setValue('STATUS OF OBLIGATION');

$activeSheet->getCell('A51')->setValue('Reference');
$activeSheet->getCell('G51')->setValue('Amount');

$activeSheet->getCell('A52')->setValue('Date');
$activeSheet->getCell('B52')->setValue('Particulars');
$activeSheet->getCell('E52')->setValue('ORS/JEV/Check/ ADA/TRA No.');
$activeSheet->getCell('G52')->setValue('Obligation');
$activeSheet->getCell('H52')->setValue('Payable');
$activeSheet->getCell('I52')->setValue('Payment');
$activeSheet->getCell('K52')->setValue('Balance');
$activeSheet->getCell('K53')->setValue('Not Yet Due');
$activeSheet->getCell('M53')->setValue('Due and Demandable');



$activeSheet->getStyle('A3:J3')
    ->getAlignment()->setWrapText(true); 

$activeSheet->getStyle('A12:M12')
    ->getAlignment()->setWrapText(true); 

$activeSheet->getStyle('A52:M52')
    ->getAlignment()->setWrapText(true); 

$font_style = array(
    'font'  => array(
        'name'  => 'Times New Roman'
));

$custom_style1 = array(
    'alignment' => array(
        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
    ),
    'borders' => array(
	    'allborders' => array(
	      'style' => PHPExcel_Style_Border::BORDER_THICK
	    )
	  )
);

$custom_style2 = array(
    'borders' => array(
	    'allborders' => array(
	      'style' => PHPExcel_Style_Border::BORDER_THICK
	    )
	  )
);

$custom_style3 = array(
    'alignment' => array(
        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
    ),
    'borders' => array(
	    'allborders' => array(
	      'style' => PHPExcel_Style_Border::BORDER_THIN
	    )
	  )
);

$custom_style4 = array(
    'borders' => array(
	    'right' => array(
	      'style' => PHPExcel_Style_Border::BORDER_THIN
	    ),
	    'left' => array(
	      'style' => PHPExcel_Style_Border::BORDER_THIN
	    )
	  )
);

$custom_style5 = array(
    'borders' => array(
	    'top' => array(
	      'style' => PHPExcel_Style_Border::BORDER_THICK
	    ),
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

$custom_style6 = array(
    'borders' => array(
	    'top' => array(
	      'style' => PHPExcel_Style_Border::BORDER_THICK
	   	)
	)
);

$custom_style7 = array(
    'borders' => array(
	    'right' => array(
	      'style' => PHPExcel_Style_Border::BORDER_THICK
	   	)
	)
);

$custom_style8 = array(
    'borders' => array(
	    'bottom' => array(
	      'style' => PHPExcel_Style_Border::BORDER_THICK
	   	)
	)
);

$custom_style9 = array(
    'borders' => array(
	    'right' => array(
	      'style' => PHPExcel_Style_Border::BORDER_THIN
	   	)
	)
);

$custom_style10 = array(
    'borders' => array(
	    'left' => array(
	      'style' => PHPExcel_Style_Border::BORDER_THICK
	   	)
	)
);

$custom_style11 = array(
    'borders' => array(
	    'right' => array(
	      'style' => PHPExcel_Style_Border::BORDER_THICK
	   	)
	)
);

$custom_style12 = array(
    'alignment' => array(
        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
    ),
    'borders' => array(
	    'allborders' => array(
	      'style' => PHPExcel_Style_Border::BORDER_THIN
	    )
	  )
);

$activeSheet->getStyle("A1:M65")->applyFromArray($font_style);
$activeSheet->getStyle("A3:J3")->applyFromArray($custom_style1);
$activeSheet->getStyle("A4:J4")->applyFromArray($custom_style1);
$activeSheet->getStyle("A5:J5")->applyFromArray($custom_style1);
$activeSheet->getStyle("K3:M3")->applyFromArray($custom_style2);
$activeSheet->getStyle("K4:M4")->applyFromArray($custom_style2);
$activeSheet->getStyle("K5:M5")->applyFromArray($custom_style2);

$activeSheet->getStyle("A6:C7")->applyFromArray($custom_style3);
$activeSheet->getStyle("A8:C9")->applyFromArray($custom_style3);
$activeSheet->getStyle("A10:C11")->applyFromArray($custom_style3);

$activeSheet->getStyle("D6:M7")->applyFromArray($custom_style12);
$activeSheet->getStyle("D8:M9")->applyFromArray($custom_style12);
$activeSheet->getStyle("D10:M11")->applyFromArray($custom_style12);

$activeSheet->getStyle("A12:C13")->applyFromArray($custom_style1);
$activeSheet->getStyle("D12:H13")->applyFromArray($custom_style1);
$activeSheet->getStyle("I12:J13")->applyFromArray($custom_style1);
$activeSheet->getStyle("K12:K13")->applyFromArray($custom_style1);
$activeSheet->getStyle("L12:M13")->applyFromArray($custom_style1);

$activeSheet->getStyle("A14:C33")->applyFromArray($custom_style4);
$activeSheet->getStyle("D14:H33")->applyFromArray($custom_style4);
$activeSheet->getStyle("I14:J33")->applyFromArray($custom_style4);
$activeSheet->getStyle("K14:K33")->applyFromArray($custom_style4);
$activeSheet->getStyle("L14:M33")->applyFromArray($custom_style4);
$activeSheet->getStyle("A34:A35")->applyFromArray($custom_style4);

$activeSheet->getStyle("A34:A35")->applyFromArray($custom_style5);
$activeSheet->getStyle("B34:M34")->applyFromArray($custom_style6);
$activeSheet->getStyle("I34:I35")->applyFromArray($custom_style5);

$activeSheet->getStyle("A48:H48")->applyFromArray($custom_style8);
$activeSheet->getStyle("I48:M48")->applyFromArray($custom_style8);

$activeSheet->getStyle("A50")->applyFromArray($custom_style1);
$activeSheet->getStyle("B50:M50")->applyFromArray($custom_style1);

$activeSheet->getStyle("A51:G51")->applyFromArray($custom_style1);
$activeSheet->getStyle("H51:M51")->applyFromArray($custom_style1);

$activeSheet->getStyle("A52:A54")->applyFromArray($custom_style3);
$activeSheet->getStyle("B52:D54")->applyFromArray($custom_style3);
$activeSheet->getStyle("E52:G54")->applyFromArray($custom_style3);
$activeSheet->getStyle("H52:H54")->applyFromArray($custom_style3);
$activeSheet->getStyle("I52:I54")->applyFromArray($custom_style3);
$activeSheet->getStyle("K52:K54")->applyFromArray($custom_style3);
$activeSheet->getStyle("L52:L54")->applyFromArray($custom_style3);
$activeSheet->getStyle("M52:M54")->applyFromArray($custom_style3);
$activeSheet->getStyle("I54:J54")->applyFromArray($custom_style3);
$activeSheet->getStyle("A63:M63")->applyFromArray($custom_style8);
$activeSheet->getStyle("A52")->applyFromArray($custom_style10);
$activeSheet->getStyle("A53")->applyFromArray($custom_style10);
$activeSheet->getStyle("A54")->applyFromArray($custom_style10);
$activeSheet->getStyle("M52")->applyFromArray($custom_style11);
$activeSheet->getStyle("M53")->applyFromArray($custom_style11);
$activeSheet->getStyle("M54")->applyFromArray($custom_style11);

$activeSheet->mergeCells('A3:J3');
$activeSheet->mergeCells('A4:J4');
$activeSheet->mergeCells('A5:J5');
$activeSheet->mergeCells('K3:M3');
$activeSheet->mergeCells('K4:M4');
$activeSheet->mergeCells('K5:M5');

$activeSheet->mergeCells('A6:C7');
$activeSheet->mergeCells('A8:C9');
$activeSheet->mergeCells('A10:C11');
$activeSheet->mergeCells('A6:C7');
$activeSheet->mergeCells('D6:M7');
$activeSheet->mergeCells('D8:M9');
$activeSheet->mergeCells('D10:M11');
$activeSheet->mergeCells('A12:C13');
$activeSheet->mergeCells('D12:H13');
$activeSheet->mergeCells('I12:J13');
$activeSheet->mergeCells('K12:L13');
$activeSheet->mergeCells('M12:M13');
$activeSheet->mergeCells('D15:H15');
$activeSheet->mergeCells('D15:H15');
$activeSheet->mergeCells('A34:A35');
$activeSheet->mergeCells('B35:C35');
$activeSheet->mergeCells('D35:H35');
$activeSheet->mergeCells('D36:H36');
$activeSheet->mergeCells('D37:H37');
$activeSheet->mergeCells('I34:I35');
$activeSheet->mergeCells('J35:K35');

$activeSheet->mergeCells('B50:M50');
$activeSheet->mergeCells('A51:F51');
$activeSheet->mergeCells('G51:M51');

$activeSheet->mergeCells('A52:A54');
$activeSheet->mergeCells('B52:D54');
$activeSheet->mergeCells('E52:F54');
$activeSheet->mergeCells('G52:G53');
$activeSheet->mergeCells('H52:H53');
$activeSheet->mergeCells('I52:J53');
$activeSheet->mergeCells('K52:M52');
$activeSheet->mergeCells('K53:L53');
$activeSheet->mergeCells('I54:J54');
$activeSheet->mergeCells('K54:L54');



for ($i=6; $i < 14 ; $i++) { 
	$activeSheet->getStyle("A".$i)->applyFromArray($custom_style10);
	$activeSheet->getStyle("M".$i)->applyFromArray($custom_style7);
}

for ($i=14; $i < 34; $i++) { 
	$activeSheet->mergeCells('A'.$i.':C'.$i);
	$activeSheet->mergeCells('K'.$i.':L'.$i);
	$activeSheet->getStyle("A".$i)->applyFromArray($custom_style10);
	$activeSheet->getStyle("M".$i)->applyFromArray($custom_style7);
	$activeSheet->getStyle("L".$i)->applyFromArray($custom_style9);
}

for ($i=34; $i < 49; $i++) { 
	$activeSheet->getStyle("H".$i)->applyFromArray($custom_style7);
	$activeSheet->getStyle("M".$i)->applyFromArray($custom_style7);
	$activeSheet->getStyle("A".$i)->applyFromArray($custom_style10);
}

for ($i=55; $i < 64; $i++) { 
	$activeSheet->getStyle("A".$i)->applyFromArray($custom_style9);
	$activeSheet->getStyle("D".$i)->applyFromArray($custom_style9);
	$activeSheet->getStyle("F".$i)->applyFromArray($custom_style9);
	$activeSheet->getStyle("G".$i)->applyFromArray($custom_style9);
	$activeSheet->getStyle("H".$i)->applyFromArray($custom_style9);
	$activeSheet->getStyle("J".$i)->applyFromArray($custom_style9);
	$activeSheet->getStyle("L".$i)->applyFromArray($custom_style9);
}

for ($i=55; $i < 64; $i++) { 
	$activeSheet->getStyle("A".$i)->applyFromArray($custom_style10);
}

for ($i=55; $i < 64; $i++) { 
	$activeSheet->getStyle("M".$i)->applyFromArray($custom_style11);
}

if ($data['is_dfunds']) {
	$payee = $huc_opts[$data['ob_payee']];
	$payee = $payee['name'];
} else {
	$payee = $data['supplier_title'];
}



$activeSheet->getCell('D6')->setValue($payee);
$activeSheet->getCell('D10')->setValue($data['address']);
$activeSheet->getCell('D15')->setValue($data['purpose']);
$activeSheet->getCell('M15')->setValue('₱'.number_format($data['total_amount'], 2),);



header('Content-type: application/vnd.ms-excel');
$filename = 'OBR-Report.xls';
header('Content-Disposition: attachment; filename="'.$filename.'"');
$writer->save('php://output');
