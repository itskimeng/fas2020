<?php
include('connection.php');

require_once 'GSS/controller/RFQController.php';
$conn = mysqli_connect("localhost", "fascalab_2020", "w]zYV6X9{*BN", "fascalab_2020");

define('EOL', (PHP_SAPI == 'cli') ? PHP_EOL : '<br />');
require_once 'library/PHPExcel/Classes/PHPExcel/IOFactory.php';
$objPHPExcel = PHPExcel_IOFactory::load("library/export_abstract.xlsx");


$supplier_row = 9;
$supplier_col = 'F';
$item_col = 'F';
$no = 1;


$objPHPExcel->setActiveSheetIndex()->setCellValue('B6', 'RFQ NO.'.$_GET['rfq_no']);
$objPHPExcel->setActiveSheetIndex()->setCellValue('G8', $_GET['abstract_no']);

// S U P P L I E R   I T E M S
$item_row = 12;
$count_supp_item = 0;
foreach ($rfq_items as $key => $item) {
  $objPHPExcel->setActiveSheetIndex()->setCellValue('A' . $item_row, $no);
  $objPHPExcel->setActiveSheetIndex()->setCellValue('B' . $item_row, $item['item'] . '' . $item['desc']);
  $objPHPExcel->setActiveSheetIndex()->setCellValue('C' . $item_row, $item['cost']);
  $objPHPExcel->setActiveSheetIndex()->setCellValue('D' . $item_row, $item['qty']);
  $objPHPExcel->setActiveSheetIndex()->setCellValue('E' . $item_row, $item['unit']);
  $item_row++;
  $no++;
  $count_supp_item++;
}
// S U P P L I E R header
foreach ($supplier_winner as $key => $item) {
  $supplier_title = $item['supplier'];
  $objPHPExcel->setActiveSheetIndex()->setCellValue($supplier_col . '' . $supplier_row, $item['supplier']);

  if ($item['winner'] == 1) {
    // winner is
    $objPHPExcel
      ->getActiveSheet()
      ->getStyle($supplier_col . '' . $supplier_row)
      ->getFill()
      ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
      ->getStartColor()->setRGB('B3E5FC');
  }
  $item_row = 12;

  foreach ($supplier_item_total[$key] as $i => $data) {
    $objPHPExcel->setActiveSheetIndex()->setCellValue($supplier_col . '' . $item_row, $data['price_per_unit']);
    if($data['winner'] ==1){
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
header('location: export_abstract.xlsx');
