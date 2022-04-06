<?php
define('EOL',(PHP_SAPI == 'cli') ? PHP_EOL : '<br />');
require_once 'library/PHPExcel/Classes/PHPExcel/IOFactory.php';
// require 'connection.php';
require_once 'Finance/controller/DisbursementController.php';

$objPHPExcel = PHPExcel_IOFactory::load("library/export_dv.xlsx");
$styleTop = array(
  'borders' => array(
    'top' => array('style' => PHPExcel_Style_Border::BORDER_MEDIUM),
  ),
);

$styleLeft = array(
  'borders' => array(
    'left' => array('style' => PHPExcel_Style_Border::BORDER_MEDIUM),
  ),
);

$styleRight = array(
  'borders' => array(
    'right' => array('style' => PHPExcel_Style_Border::BORDER_MEDIUM)
  ),
);

$stylebottom = array(
  'borders' => array(
    'bottom' => array('style' => PHPExcel_Style_Border::BORDER_MEDIUM)
  ),
);


foreach ($data2 as $key => $row) {

  if ($row['po_supplier'] == 1) 
  {
    $po_supplier = 'Cavite';
  }
  else if ($row['po_supplier'] == 2) 
  {
    $po_supplier = 'Laguna';
  }
  else if ($row['po_supplier'] == 3) 
  {
    $po_supplier = 'Batangas';
  }
  else if ($row['po_supplier'] == 4) 
  {
    $po_supplier = 'Rizal';
  }
  else if ($row['po_supplier'] == 5) 
  {
    $po_supplier = 'Quezon';
  }
  else
  {
    $po_supplier = 'Lucena';
  }

  $division_chiefs = [
    10 => ['name'=> 'DR. CARINA S. CRUZ', 'position'=> 'CHIEF, FAD'],   
    18 => ['name'=> 'DON AYER A. ABRAZALDO', 'position'=> 'CHIEF, LGMED'],  
    17 => ['name'=> 'JAY-AR T. BELTRAN', 'position'=> 'CHIEF, LGCDD'],  
    9 => ['name'=> 'JAY-AR T. BELTRAN', 'position'=> 'CHIEF, LGCDD'],  
    1 => ['name'=> 'ARD NOEL R. BARTOLABAC', 'position'=> 'CHIEF, ORD']   
  ];



  $objPHPExcel->setActiveSheetIndex()->setCellValue('AB12',$row['serial_no']);
  if ($row['supplier'] != '') 
  {
    $objPHPExcel->setActiveSheetIndex()->setCellValue('E11',$row['supplier']);
  }
  else
  {
    $objPHPExcel->setActiveSheetIndex()->setCellValue('E11',$po_supplier);
  }
  $objPHPExcel->setActiveSheetIndex()->setCellValue('E13','');
  $objPHPExcel->setActiveSheetIndex()->setCellValue('E41','AGNES SJ. SANGEL');
  $objPHPExcel->setActiveSheetIndex()->setCellValue('E43','Regional Accountant');
  $objPHPExcel->setActiveSheetIndex()->setCellValue('B16',$row['particular']);
  $objPHPExcel->setActiveSheetIndex()->setCellValue('AB16',$row['amount1']);
  $objPHPExcel->setActiveSheetIndex()->setCellValue('B23',$division_chiefs[$row['division']]['name']);
  $objPHPExcel->setActiveSheetIndex()->setCellValue('B24',$division_chiefs[$row['division']]['position']);

}

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save(str_replace('.php', '.xlsx', __FILE__));
header('location: export_dv.xlsx');

?>