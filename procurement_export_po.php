<?php
define('EOL', (PHP_SAPI == 'cli') ? PHP_EOL : '<br />');
include 'Model/Connection.php';
require_once 'GSS/controller/RFQController.php';
require_once 'GSS/controller/PurchaseRequestController.php';
require_once 'library/PHPExcel/Classes/PHPExcel/IOFactory.php';
$objPHPExcel = PHPExcel_IOFactory::load("library/procurement_export_po.xlsx");
$styleBorder = array(
     'borders' => array(
          'allborders' => array('style' => PHPExcel_Style_Border::BORDER_THIN)
     ),
);
$toLeft = array(
     'alignment' => array(
          'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT
     )
);
$toCenter = array(
     'alignment' => array(
          'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER
     )
);
function group_array($array)
{
     $val = array_unique($array);
     return $val;
}



$objPHPExcel->setActiveSheetIndex()->setCellValue('C7',$supp_opts['supplier_title']);
$objPHPExcel->setActiveSheetIndex()->setCellValue('C8',$supp_opts['supplier_address']);
$objPHPExcel->setActiveSheetIndex()->setCellValue('F7',$po_opts['po_no']);
$objPHPExcel->setActiveSheetIndex()->setCellValue('F8',date('F d, Y',strtotime($po_opts['po_date'])));
$objPHPExcel->setActiveSheetIndex()->setCellValue('E10',$po_opts['mode']);
$item_row = 17;
foreach ($po_items as $key => $data) {
    $objPHPExcel->getActiveSheet()->getStyle("C" . $item_row . "")->applyFromArray($toLeft);
    $objPHPExcel->getActiveSheet()->getStyle("E" . $item_row . "")->applyFromArray($toLeft);
    $objPHPExcel->getActiveSheet()->getStyle("F" . $item_row . "")->applyFromArray($toLeft);
    $objPHPExcel->getActiveSheet()->getStyle("G" . $item_row . "")->applyFromArray($toLeft);
    $objPHPExcel->getActiveSheet()->getRowDimension($item_row)->setRowHeight(60);


    $objPHPExcel->setActiveSheetIndex()->setCellValue('A' . $item_row, $data['sn']);
    $objPHPExcel->setActiveSheetIndex()->setCellValue('B' . $item_row, $data['unit']);
    $objPHPExcel->setActiveSheetIndex()->setCellValue('C' . $item_row, $data['items'] . "\n" . $data['description']);
    $objPHPExcel->setActiveSheetIndex()->setCellValue('E' . $item_row, $data['qty']);
    $objPHPExcel->setActiveSheetIndex()->setCellValue('F' . $item_row, '₱'.number_format($data['ppu'],2));
    $objPHPExcel->setActiveSheetIndex()->setCellValue('G' . $item_row, '₱'.number_format($data['qty'] * $data['ppu'],2));
    $total_abc += $data['qty'] * $data['ppu'];
  
    $item_row++;
}
$item_row += 1;

$objPHPExcel->setActiveSheetIndex()->mergeCells('A'.$item_row.':F'.$item_row);
$objPHPExcel->setActiveSheetIndex()->setCellValue('A'.$item_row,'(Total Amount in Words)    pesos only');

$objPHPExcel->setActiveSheetIndex()->setCellValue('G'.$item_row,'₱'.number_format($total_abc,2));
$objPHPExcel->getActiveSheet()->getRowDimension($item_row)->setRowHeight(30);
$objPHPExcel->getActiveSheet()->getStyle("G" . $item_row . "")->applyFromArray($toLeft);
$objPHPExcel->getActiveSheet()->getStyle("A" . $item_row . "")->applyFromArray($toCenter);
$objPHPExcel->getActiveSheet()->getStyle('A'.$item_row . ':' . 'G'.$item_row)->applyFromArray($styleBorder);


$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save(str_replace('.php', '.xlsx', __FILE__));
header('location: procurement_export_po.xlsx');
?>
