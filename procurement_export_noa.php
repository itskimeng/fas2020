<?php
define('EOL', (PHP_SAPI == 'cli') ? PHP_EOL : '<br />');
include 'Model/Connection.php';
require_once 'GSS/controller/RFQController.php';
require_once 'library/PHPExcel/Classes/PHPExcel/IOFactory.php';
$objPHPExcel = PHPExcel_IOFactory::load("library/procurement_export_noa.xlsx");

$styleBorder = array(
     'borders' => array(
          'allborders' => array('style' => PHPExcel_Style_Border::BORDER_THIN)
     ),
);

    $objPHPExcel->getActiveSheet()->getStyle('A13')->getFont()->setBold(true);
    $objPHPExcel->getActiveSheet()->getStyle('A15')->getFont()->setBold(true);
    $objPHPExcel->setActiveSheetIndex()->setCellValue('A13',$noa_opts['po_date']);
    $objPHPExcel->setActiveSheetIndex()->setCellValue('A15',$noa_opts['contact_person']);
    $objPHPExcel->setActiveSheetIndex()->setCellValue('A41',"                                  ".$noa_opts['contact_person']);
    $objPHPExcel->setActiveSheetIndex()->setCellValue('A16',$noa_opts['supplier_title']);
    $objPHPExcel->setActiveSheetIndex()->setCellValue('A20','Dear '.$noa_opts['supplier_title']);
    $objPHPExcel->setActiveSheetIndex()->setCellValue('A17',$noa_opts['supplier_address']);
    $objPHPExcel->getActiveSheet()->getRowDimension('A22')->setRowHeight(-1);
    $objPHPExcel->setActiveSheetIndex()->setCellValue('A22','We are pleased to inform you that your Quotation for the Procurement of '.$type.' for the '.$noa_opts['purpose'].'with  Purchase Order equivalent to Php '.number_format($noa_opts['totalABC'],2).' is hereby accepted. ');
    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
    $objWriter->save(str_replace('.php', '.xlsx', __FILE__));
    header('location: procurement_export_noa.xlsx');
    
?>