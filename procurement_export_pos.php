<?php
ob_start();
define('EOL', (PHP_SAPI == 'cli') ? PHP_EOL : '<br />');
require_once 'menu_checker.php';
$menuchecker = menuChecker('rfq_form_view');

include 'Model/Connection.php';
require_once 'GSS/controller/RFQController.php';
require_once 'library/PHPExcel/Classes/PHPExcel/IOFactory.php';
$objPHPExcel = PHPExcel_IOFactory::load("library/procurement_export_pos.xlsx");
$purpose = $_GET['purpose'];
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
if (($is_multiple_pr['is_multiple'])) { 
    foreach ($rfq_report_multi_opt as $key => $data) {
        $office_id[] = $data['pmo'];
    }
    $department_val =  implode(",",group_array($office_id));
    $objPHPExcel->setActiveSheetIndex()->setCellValue('D28',$department_val);


    $objPHPExcel->setActiveSheetIndex()->setCellValue('A13',$rfq_pos_opt['supplier_contact_person']);
    $objPHPExcel->setActiveSheetIndex()->setCellValue('A14',$rfq_pos_opt['supplier_name']);
    $objPHPExcel->setActiveSheetIndex()->setCellValue('A15',$rfq_pos_opt['supplier_address']);
    $objPHPExcel->setActiveSheetIndex()->setCellValue('D22',$_GET['rfq_no']);
    $objPHPExcel->setActiveSheetIndex()->setCellValue('D23','PHP'.number_format($rfq_item_report_multi_opt['total_amount'],2));
    $objPHPExcel->setActiveSheetIndex()->setCellValue('D24',$rfq_item_report_multi_opt['purpose']);
    $objPHPExcel->setActiveSheetIndex()->setCellValue('B43',$rfq_pos_opt['supplier_name']);
    $objPHPExcel->setActiveSheetIndex()->setCellValue('D28',$rfq_report_opt['pmo']);


}else{
    $objPHPExcel->setActiveSheetIndex()->setCellValue('A13',$rfq_pos_opt['supplier_contact_person']);
    $objPHPExcel->setActiveSheetIndex()->setCellValue('A14',$rfq_pos_opt['supplier_name']);
    $objPHPExcel->setActiveSheetIndex()->setCellValue('A15',$rfq_pos_opt['supplier_address']);
    $objPHPExcel->setActiveSheetIndex()->setCellValue('D22',$_GET['rfq_no']);
    $objPHPExcel->setActiveSheetIndex()->setCellValue('D23','PHP'.number_format($rfq_item_report_opt['total_amount'],2));
    $objPHPExcel->setActiveSheetIndex()->setCellValue('D24',$purpose);
    $objPHPExcel->setActiveSheetIndex()->setCellValue('D28',$rfq_report_opt['pmo']);
    $objPHPExcel->setActiveSheetIndex()->setCellValue('B43',$rfq_pos_opt['supplier_name']);
    
    $objPHPExcel->getActiveSheet()->getRowDimension($row)->setRowHeight(250);
    $objPHPExcel->getActiveSheet()->getStyle('A'.$row)->getAlignment()->setWrapText(true);
}
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save(str_replace('.php', '.xlsx', __FILE__));
header('location: procurement_export_pos.xlsx');

