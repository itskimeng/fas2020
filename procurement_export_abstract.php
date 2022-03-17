<?php
define('EOL', (PHP_SAPI == 'cli') ? PHP_EOL : '<br />');
include 'Model/Connection.php';
require_once 'GSS/controller/RFQController.php';
require_once 'library/PHPExcel/Classes/PHPExcel/IOFactory.php';
$objPHPExcel = PHPExcel_IOFactory::load("library/procurement_export_abstract.xlsx");
$styleBorder = array(
     'borders' => array(
          'allborders' => array('style' => PHPExcel_Style_Border::BORDER_THIN)
     ),
);


$supplier_row = 9;
$supplier_col = 'F';
$item_col = 'F';
$no = 1;

$objPHPExcel->setActiveSheetIndex()->setCellValue('B6', 'RFQ NO.' . $_GET['rfq_no']);
$objPHPExcel->setActiveSheetIndex()->setCellValue('B7', 'ABC:Php '.$totalABC['total_abc']);
$objPHPExcel->setActiveSheetIndex()->setCellValue('G8', $_GET['abstract_no']);

// S U P P L I E R   I T E M S
$item_row = 12;
$count_supp_item = 0;
foreach ($rfq_items as $key => $item) {
     $objPHPExcel->setActiveSheetIndex()->setCellValue('A' . $item_row, $no);
     $objPHPExcel->setActiveSheetIndex()->setCellValue('B' . $item_row, $item['item'] . '' . $item['description']);
     $objPHPExcel->getActiveSheet()->getStyle('B' . '' . $item_row)->getAlignment()->setWrapText(true);
     $objPHPExcel->setActiveSheetIndex()->setCellValue('C' . $item_row, $item['cost']);
     $objPHPExcel->setActiveSheetIndex()->setCellValue('D' . $item_row, $item['qty']);
     $objPHPExcel->setActiveSheetIndex()->setCellValue('E' . $item_row, $item['unit']);
     $item_row++;
     $no++;
     $count_supp_item++;
}

$item_info_row = $item_row+1;
$objPHPExcel->getActiveSheet()->getRowDimension('1')->setRowHeight(60);
$objPHPExcel->setActiveSheetIndex()->setCellValue('B'.$item_info_row, 'REF');
$item_info_row += 1;
$objPHPExcel->getActiveSheet()->getRowDimension('1')->setRowHeight(60);
$objPHPExcel->setActiveSheetIndex()->setCellValue('B'.$item_info_row, 'PR No. '.$rfq_details['pr_no'].' Date received: '.date('F d, Y',strtotime($rfq_details['rfq_date'].'')));
$item_info_row += 1;
$objPHPExcel->getActiveSheet()->getRowDimension('1')->setRowHeight(60);
$objPHPExcel->setActiveSheetIndex()->setCellValue('B'.$item_info_row, $rfq_details['purpose']);

// S U P P L I E R header
$count_supplier = 0;
foreach ($supplier_winner as $key => $item) {
    $count_supplier++;
     $supplier_title = $item['supplier'];
     // SUPPLIER HEADER FORMATTING
     $objPHPExcel->getActiveSheet()->getColumnDimension($supplier_col)->setWidth(9);
     $objPHPExcel->getActiveSheet()->getRowDimension('1')->setRowHeight(43);
     $objPHPExcel->getActiveSheet()->getStyle("A9:".$supplier_col."25")->applyFromArray($styleBorder);
     $objPHPExcel->setActiveSheetIndex()->setCellValue($supplier_col . '' . $supplier_row, $item['supplier']);
     $objPHPExcel->getActiveSheet()->getStyle($supplier_col . '' . $supplier_row)->getAlignment()->setWrapText(true);
     $objPHPExcel->setActiveSheetIndex(0)->mergeCells($supplier_col . '9' . ':' . $supplier_col . '11');

     if ($item['winner'] == 1) {
          // winner is
          $objPHPExcel
               ->getActiveSheet()
               ->getStyle($supplier_col . '' . $supplier_row)
               ->getFill()
               ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
               ->getStartColor()->setRGB('B3E5FC');
          $objPHPExcel->getActiveSheet()->getStyle($supplier_col . '' . $supplier_row)->getFont()->setBold( true );
     }else{
          $objPHPExcel
          ->getActiveSheet()
          ->getStyle($supplier_col . '' . $supplier_row)
          ->getFill()
          ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
          ->getStartColor()->setRGB('FFFFFF');
          $objPHPExcel->getActiveSheet()->getStyle($supplier_col . '' . $supplier_row)->getFont()->setBold( false );

     }
     $item_row = 12;
     foreach ($supplier_item_total[$key] as $i => $data) {
          $objPHPExcel->setActiveSheetIndex()->setCellValue($supplier_col . '' . $item_row, $data['price_per_unit']);
          if ($data['winner'] == 1) {
               $objPHPExcel
                    ->getActiveSheet()
                    ->getStyle($supplier_col . '' . $item_row)
                    ->getFill()
                    ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
                    ->getStartColor()->setRGB('B3E5FC');
          }
          $item_row++;
     }
     $supplier_col++;
}




$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save(str_replace('.php', '.xlsx', __FILE__));
header('Content-type: application/vnd.ms-excel');
header('Content-Disposition: attachment; filename="ABSTRACT-NO-'.$_GET['abstract_no'].'.xlsx"');
header('Cache-Control: max-age=0');

$objWriter->save('php://output');

