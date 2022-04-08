<?php
define('EOL',(PHP_SAPI == 'cli') ? PHP_EOL : '<br />');
require_once 'library/PHPExcel/Classes/PHPExcel/IOFactory.php';

$objPHPExcel = PHPExcel_IOFactory::load("library/export_pos.xlsx");

$styleTop = array(
  'borders' => array(
    'top' => array('style' => PHPExcel_Style_Border::BORDER_THIN),
  ),
);

$styleLeft = array(
  'borders' => array(
    'left' => array('style' => PHPExcel_Style_Border::BORDER_THIN),
  ),
);

$styleRight = array(
  'borders' => array(
    'right' => array('style' => PHPExcel_Style_Border::BORDER_THIN)
  ),
);

$stylebottom = array(
  'borders' => array(
    'bottom' => array('style' => PHPExcel_Style_Border::BORDER_THIN)
  ),
);

$styleContent = array('font'  => array('size'  => 9, 'name'  => 'Cambria'),'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER));

$styleHeader = array('font'  => array('bold'  => true, 'size'  => 11, 'name'  => 'Calibri'),'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER));

$styleLabel = array('font'  => array('size'  => 11, 'name'  => 'Calibri'),'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT));


$rfq_no = $_GET['rfq_no'];
$purpose = $_GET['purpose'];
$pmo = $_GET['pmo'];
$pr_no = $_GET['pr_no'];
$supplier_id = $_GET['supplier_id'];

$conn=mysqli_connect("localhost","fascalab_2020","w]zYV6X9{*BN","fascalab_2020");
  
$sql_items1 = mysqli_query($conn, "SELECT SUM(pi.qty * pi.abc) AS totalABC FROM rfq LEFT JOIN pr ON pr.id = rfq.pr_id LEFT JOIN pr_items pi ON pi.pr_id = pr.id LEFT JOIN app ON app.id = pi.items where rfq.id= '$rfq_no'");
$rowA = mysqli_fetch_array($sql_items1);
$totalABC = $rowA["totalABC"];

$select_supp = mysqli_query($conn,"SELECT * FROM supplier WHERE id = $supplier_id");
$rowSup = mysqli_fetch_array($select_supp);
$supName = $rowSup['supplier_title'];
$supContact = $rowSup['contact_person'];
$supAddress = $rowSup['supplier_address'];

$objPHPExcel->setActiveSheetIndex()->setCellValue('A13',$supContact);
$objPHPExcel->setActiveSheetIndex()->setCellValue('A14',$supName);
$objPHPExcel->setActiveSheetIndex()->setCellValue('A15',$supAddress);
$objPHPExcel->setActiveSheetIndex()->setCellValue('D22',$rfq_no);
$objPHPExcel->setActiveSheetIndex()->setCellValue('D23',$totalABC);
$objPHPExcel->setActiveSheetIndex()->setCellValue('D24',$purpose);
$objPHPExcel->setActiveSheetIndex()->setCellValue('D28',$pmo);
$objPHPExcel->setActiveSheetIndex()->setCellValue('B43',$supName);


$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save(str_replace('.php', '.xlsx', __FILE__));
header('location: export_pos.xlsx');




$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save(str_replace('.php', '.xlsx', __FILE__));
header('Content-type: application/vnd.ms-excel');
header('Content-Disposition: attachment; filename="POS-' . $supContact . '.xlsx"');
header('Cache-Control: max-age=0');

$objWriter->save('php://output');

?>