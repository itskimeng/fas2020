<?php
ob_start();
define('EOL', (PHP_SAPI == 'cli') ? PHP_EOL : '<br />');
require_once 'menu_checker.php';
$menuchecker = menuChecker('rfq_form_view');

include 'Model/Connection.php';
require_once 'GSS/controller/RFQController.php';
require_once 'library/PHPExcel/Classes/PHPExcel/IOFactory.php';
$objPHPExcel = PHPExcel_IOFactory::load("library/procurement_export_rfq.xlsx");
$styleBorder = array(
     'borders' => array(
          'allborders' => array('style' => PHPExcel_Style_Border::BORDER_THIN)
     ),
);


$bottomBorder = array(
    'borders' => array(
         'bottom' => array('style' => PHPExcel_Style_Border::BORDER_THIN)
    ),
);
$outlineBorder = array(
    'borders' => array(
         'outline' => array('style' => PHPExcel_Style_Border::BORDER_THIN)
    ),
);


$fontStyle = [
    'font' => [
        'size' => 8
    ]
];
function group_array($array)
{
  $val = array_unique($array);
    return $val;
}
$no = 1;
$objPHPExcel->setActiveSheetIndex()->setCellValue('A3','DILG IV-A CALABARZON, Andenson Bldg1. National Highway , Brgy. Parian, Calamba City, Laguna');
$objPHPExcel->setActiveSheetIndex()->setCellValue('D5',$rfq_report_opt['mode']);
$objPHPExcel->setActiveSheetIndex()->setCellValue('D6',"DILG IV-A CALABARZON");
$objPHPExcel->setActiveSheetIndex()->setCellValue('I5',$rfq_report_opt['rfq_no']);
$objPHPExcel->setActiveSheetIndex()->setCellValue('I6',date('F d, Y',strtotime($rfq_report_opt['rfq_date'])));
if (($is_multiple_pr['is_multiple'])) { 
    foreach ($rfq_report_multi_opt as $key => $data) {
        $office_id[] = $data['pmo'];
    }
    $department_val =  implode(",",group_array($office_id));
    $objPHPExcel->setActiveSheetIndex()->setCellValue('D7',$department_val);
    
    $objPHPExcel->setActiveSheetIndex()->setCellValue('A27','PHP '.number_format($rfq_item_report_multi_opt['total_amount'],2));
}else{
    
    $objPHPExcel->setActiveSheetIndex()->setCellValue('D7',$rfq_report_opt['pmo']);
    $objPHPExcel->setActiveSheetIndex()->setCellValue('A27','PHP '.number_format($rfq_item_report_opt['total_amount'],2));
}
$objPHPExcel->setActiveSheetIndex()->setCellValue('F27','DON AYER ABRAZALDO');


//R F Q  I T E M S
$item_row = 31;
$count_supp_item = 0;
foreach ($rfq_items as $key => $item) {
     $objPHPExcel->setActiveSheetIndex()->setCellValue('A' . $item_row, $no);
     $objPHPExcel->setActiveSheetIndex(0)->mergeCells( 'B' .$item_row. ':' .'F'.$item_row);
     $objPHPExcel->getActiveSheet()->getStyle('B' . '' . $item_row)->getAlignment()->setWrapText(true);

     $objPHPExcel->setActiveSheetIndex()->setCellValue('B' . $item_row, $item['item'] ."\n\n". $item['description']);
     $objPHPExcel->setActiveSheetIndex()->setCellValue('I' . $item_row, '₱'.number_format($item['cost'],2));
     $objPHPExcel->setActiveSheetIndex()->setCellValue('G' . $item_row, $item['qty']);
     $objPHPExcel->setActiveSheetIndex()->setCellValue('H' . $item_row, $item['unit']);
     $objPHPExcel->getActiveSheet()->getRowDimension($item_row)->setRowHeight(45);
     $objPHPExcel->getActiveSheet()->getStyle('A'.$item_row.':J'.$item_row.'')->applyFromArray($styleBorder);


     $item_row++;
     $no++;
     $count_supp_item++;
     
}

$note = "NOTE:
*In order to be eligible for this procurement, suppliers/service providers must submit together with the quotation the following Eligibility Documents:
  1. Valid Business Permit 2023 ( Application for renewal with Official Receipt 2023) 
  2. Latest Income/Business Tax Return
  3. PhilGEPS Registration No. (Please indicate on the space provided above)
  4. a. Any documents to prove that the signatory of the quotation is authorized representative of the company.
      b. Photocopy of ID bearing the pictures/ signature of the representatives. 
  5. Notarized Omnibus Sworn Statement 
 * Please submit your quotation using our official Request for Quotation (RFQ) Form. You can secure a copy of the 
RFQ from the General Services and Supply Section, Finance and Administrative Division.
 *Please submit your quotation together with the Eligibility Documents through any of the following : 
      a. Email us at dilg4a.bac@gmail.com
      b. Deliver on hand at the receiving area of DILG IV-A CALABARZON, Andenson Bldg1. National Highway, Parian, Calamba City, Laguna";
$note_row = $item_row;
$objPHPExcel->getActiveSheet()->getRowDimension($item_row)->setRowHeight(370);


$objPHPExcel->setActiveSheetIndex()->setCellValue('B'.$note_row,$note);
$objPHPExcel->setActiveSheetIndex(0)->mergeCells('B'.$note_row.':F'.$note_row.'');
$objPHPExcel->getActiveSheet()->getStyle('B' . '' . $note_row)->getAlignment()->setWrapText(true);
$objPHPExcel->getActiveSheet()->getRowDimension($row)->setRowHeight(250);
$objPHPExcel->getActiveSheet()->getStyle('A'.$note_row.':J'.$note_row.'')->applyFromArray($styleBorder);
$objPHPExcel->getActiveSheet()->getStyle('A'.$row)->getAlignment()->setWrapText(true);

$footer_row = $note_row+2;
$objPHPExcel->setActiveSheetIndex()->setCellValue('A'.$footer_row,'Waranty');
$objPHPExcel->setActiveSheetIndex()->setCellValue('F'.$footer_row,'Price Validity');
$objPHPExcel->getActiveSheet()->getStyle('A'.$footer_row.':J'.$footer_row.'')->applyFromArray($fontStyle);
$objPHPExcel->getActiveSheet()->getStyle('A'.$footer_row.':D'.$footer_row.'')->applyFromArray($outlineBorder);
$objPHPExcel->getActiveSheet()->getStyle('F'.$footer_row.':I'.$footer_row.'')->applyFromArray($outlineBorder);

$objPHPExcel->setActiveSheetIndex(0)->mergeCells('F'.$footer_row.':G'.$footer_row.'');

$footer_row1 = $footer_row+2;
$objPHPExcel->setActiveSheetIndex()->setCellValue('A'.$footer_row1,'                After having carefully read and accepted your General Conditions, I/WE quote on the item(s) at prices noted above.');
$objPHPExcel->setActiveSheetIndex(0)->mergeCells('A'.$footer_row1.':J'.$footer_row1.'');
$objPHPExcel->getActiveSheet()->getStyle('A'.$footer_row1.':J'.$footer_row1)->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getRowDimension($footer_row1)->setRowHeight(60);

$footer_row2 = $footer_row1 + 1;
$objPHPExcel->getActiveSheet()->getStyle('G'.$footer_row2.':I'.$footer_row2.'')->applyFromArray($bottomBorder);

$footer_row3 = $footer_row2 + 1;
$objPHPExcel->setActiveSheetIndex()->setCellValue('G'.$footer_row3,'Printed Name/Signature/Date');
$objPHPExcel->getActiveSheet()->getStyle('G'.$footer_row3.':G'.$footer_row3)->getFont()->setBold(true);


$footer_row4= $footer_row3 + 1;
$objPHPExcel->getActiveSheet()->getStyle('G'.$footer_row4.':I'.$footer_row4.'')->applyFromArray($bottomBorder);


$footer_row5 = $footer_row4 + 1;
$objPHPExcel->setActiveSheetIndex()->setCellValue('G'.$footer_row5,'Tel. No/Cellphone No.');
$objPHPExcel->setActiveSheetIndex()->setCellValue('A'.$footer_row5,'Revised Form 2012');
$objPHPExcel->getActiveSheet()->getStyle('A'.$footer_row5.':A'.$footer_row5.'')->applyFromArray($fontStyle);


$objPHPExcel->getActiveSheet()->getStyle('G'.$footer_row5.':G'.$footer_row5)->getFont()->setBold(true);









$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save(str_replace('.php', '.xlsx', __FILE__));
header('location: procurement_export_rfq.xlsx');
?>
