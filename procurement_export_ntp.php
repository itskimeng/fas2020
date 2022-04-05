<?php
define('EOL', (PHP_SAPI == 'cli') ? PHP_EOL : '<br />');
include 'Model/Connection.php';
require_once 'GSS/controller/RFQController.php';
require_once 'library/PHPExcel/Classes/PHPExcel/IOFactory.php';
$objPHPExcel = PHPExcel_IOFactory::load("library/procurement_export_ntp.xlsx");

$styleBorder = array(
     'borders' => array(
          'allborders' => array('style' => PHPExcel_Style_Border::BORDER_THIN)
     ),
);

    $objPHPExcel->getActiveSheet()->getStyle('A13')->getFont()->setBold(true);
    $objPHPExcel->getActiveSheet()->getStyle('A15')->getFont()->setBold(true);
    $objPHPExcel->setActiveSheetIndex()->setCellValue('A13',$noa_opts['ntp_date']);
    $objPHPExcel->setActiveSheetIndex()->setCellValue('A15',$noa_opts['contact_person']);
    $objPHPExcel->setActiveSheetIndex()->setCellValue('A16',$noa_opts['supplier_title']);
    $objPHPExcel->setActiveSheetIndex()->setCellValue('A43',"                                    ".$noa_opts['contact_person']);
    $objPHPExcel->setActiveSheetIndex()->setCellValue('A17',$noa_opts['supplier_address']);
    $objPHPExcel->setActiveSheetIndex()->setCellValue('A20','Dear Mr./Ms. '.$noa_opts['contact_person']);
    $objPHPExcel->setActiveSheetIndex()->setCellValue('A23',$noa_opts['supplier_title'].' that the Procurement of '.$noa_opts['type'].' for the '.$noa_opts['purpose'].' shall commence upon receipt of the Notice to Proceed. ');
    $objPHPExcel->setActiveSheetIndex()->setCellValue('C37',$designation);
    
    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
    $objWriter->save(str_replace('.php', '.xlsx', __FILE__));
    header('location: procurement_export_ntp.xlsx');
    
?>