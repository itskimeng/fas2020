<?php
ob_start();
define('EOL', (PHP_SAPI == 'cli') ? PHP_EOL : '<br />');
require_once 'menu_checker.php';
$menuchecker = menuChecker('css');
include 'Model/Connection.php';
require_once 'controller/TechnicalAssistanceController.php';
require_once 'library/PHPExcel/Classes/PHPExcel/IOFactory.php';
$objPHPExcel = PHPExcel_IOFactory::load("library/cssDataSheet.xlsx");



$styleBorder = array(
    'borders' => array(
        'allborders' => array('style' => PHPExcel_Style_Border::BORDER_THIN)
    ),
);
$toLeft = array(
    'alignment' => array(
        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT
    ),
    
);
$toCenter = array(
    'alignment' => array(
        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER
    )
);
$styleBold = array(
    'font' => array(
        'bold' => true
    )
);


$covered_period = '';


$objPHPExcel->setActiveSheetIndex()->setCellValue('A6','Office: DILG IV-A (CALABARZON)');
$objPHPExcel->setActiveSheetIndex()->setCellValue('A7', 'Procedure Title/Service Provided: Provision of Preventive Maintenance and Technical Assistance on ICT Resources');
$objPHPExcel->setActiveSheetIndex()->setCellValue('A8','Covered Period:'.$covered_period);

$item_row = 12;
$no = 1;
foreach ($css_data as $key => $data) {
    // $objPHPExcel->getActiveSheet()->getStyle("C" . $item_row . "")->applyFromArray($toLeft);
    // $objPHPExcel->getActiveSheet()->getStyle("E" . $item_row . "")->applyFromArray($toLeft);
    // $objPHPExcel->getActiveSheet()->getStyle("F" . $item_row . "")->applyFromArray($toLeft);
    // $objPHPExcel->getActiveSheet()->getStyle("G" . $item_row . "")->applyFromArray($toLeft);
    $objPHPExcel->getActiveSheet()->getStyle('A' . $item_row . ':' . 'V' . $item_row)->applyFromArray($toLeft);



    $objPHPExcel->setActiveSheetIndex()->setCellValue('A' . $item_row,$no++);
    $objPHPExcel->setActiveSheetIndex()->setCellValue('B' . $item_row,$data['date_released']);
    $objPHPExcel->setActiveSheetIndex()->setCellValue('C' . $item_row,$data['date_received']);
    $objPHPExcel->setActiveSheetIndex()->setCellValue('D' . $item_row,$data['client_type']);
    $objPHPExcel->setActiveSheetIndex()->setCellValue('E' . $item_row,$data['age']);
    $objPHPExcel->setActiveSheetIndex()->setCellValue('F' . $item_row,$data['gender']);
    $objPHPExcel->setActiveSheetIndex()->setCellValue('G' . $item_row,$data['cc1']);
    $objPHPExcel->setActiveSheetIndex()->setCellValue('H' . $item_row,$data['cc2']);
    $objPHPExcel->setActiveSheetIndex()->setCellValue('I' . $item_row,$data['cc3']);
    $objPHPExcel->setActiveSheetIndex()->setCellValue('J' . $item_row,$data['sqd0']);
    $objPHPExcel->setActiveSheetIndex()->setCellValue('K' . $item_row,$data['sqd1']);
    $objPHPExcel->setActiveSheetIndex()->setCellValue('L' . $item_row,$data['sqd2']);
    $objPHPExcel->setActiveSheetIndex()->setCellValue('M' . $item_row,$data['sqd3']);
    $objPHPExcel->setActiveSheetIndex()->setCellValue('N' . $item_row,$data['sqd4']);
    $objPHPExcel->setActiveSheetIndex()->setCellValue('O' . $item_row,$data['sqd5']);
    $objPHPExcel->setActiveSheetIndex()->setCellValue('P' . $item_row,$data['sqd6']);
    $objPHPExcel->setActiveSheetIndex()->setCellValue('Q' . $item_row,$data['sqd7']);
    $objPHPExcel->setActiveSheetIndex()->setCellValue('R' . $item_row,$data['sqd8']);
    $objPHPExcel->setActiveSheetIndex()->setCellValue('T' . $item_row,$data['client_name']);
    $objPHPExcel->setActiveSheetIndex()->setCellValue('U' . $item_row,$data['email_address']);
    $objPHPExcel->setActiveSheetIndex()->setCellValue('V' . $item_row,$data['contact_details']);

    $item_row++;
    $no++;
}
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save(str_replace('.php', '.xlsx', __FILE__));
header('location: cssDataSheet.xlsx');

?>
