<?php
define('EOL', (PHP_SAPI == 'cli') ? PHP_EOL : '<br />');
include 'Model/Connection.php';
require_once 'GSS/controller/RFQController.php';
require_once 'library/PHPExcel/Classes/PHPExcel/IOFactory.php';
$objPHPExcel = PHPExcel_IOFactory::load("library/procurement_export_rfq.xlsx");
$styleBorder = array(
     'borders' => array(
          'allborders' => array('style' => PHPExcel_Style_Border::BORDER_THIN)
     ),
);
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
$objPHPExcel->setActiveSheetIndex()->setCellValue('F27','DR. CARINA S. CRUZ');


//R F Q  I T E M S
$item_row = 31;
$count_supp_item = 0;
foreach ($rfq_items as $key => $item) {
     $objPHPExcel->setActiveSheetIndex()->setCellValue('A' . $item_row, $no);
    //  $objPHPExcel->setActiveSheetIndex(0)->mergeCells( 'B' .$item_row. ':' .'C'.$item_row);
    //  $objPHPExcel->getActiveSheet()->getStyle('B' . '' . $item_row)->getAlignment()->setWrapText(true);

     $objPHPExcel->setActiveSheetIndex()->setCellValue('B' . $item_row, $item['item'] ."\n\n". $item['description']);
     $objPHPExcel->setActiveSheetIndex()->setCellValue('I' . $item_row, '₱'.number_format($item['cost'],2));
     $objPHPExcel->setActiveSheetIndex()->setCellValue('J' . $item_row, '₱'.number_format($item['total'],2));
     $objPHPExcel->setActiveSheetIndex()->setCellValue('G' . $item_row, $item['qty']);
     $objPHPExcel->setActiveSheetIndex()->setCellValue('H' . $item_row, $item['unit']);
    $objPHPExcel->getActiveSheet()->getRowDimension($item_row)->setRowHeight(45);

     $item_row++;
     $no++;
     $count_supp_item++;
     
}
$note = "NOTE:
*In order to be eligible for this procurement, suppliers/service providers must submit together with the quotation the following Eligibility Documents:
  1. Valid Business Permit 2022 ( Application for renewal with Official Receipt 2022) 
  2. Latest Income/Business Tax Return
  3. PhilGEPS Registration No. (Please indicate on the space provided above)
  4. a. Any documents to prove that the signatory of the quotation is autorized representative of the company.
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



$objPHPExcel->getActiveSheet()->getRowDimension($row)->setRowHeight(250);
$objPHPExcel->getActiveSheet()->getStyle('A'.$row)->getAlignment()->setWrapText(true);
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save(str_replace('.php', '.xlsx', __FILE__));
header('location: procurement_export_rfq.xlsx');

