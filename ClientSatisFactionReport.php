<?php
ob_start();
define('EOL', (PHP_SAPI == 'cli') ? PHP_EOL : '<br />');
require_once 'menu_checker.php';
$menuchecker = menuChecker('css');
include 'Model/Connection.php';
require_once 'controller/TechnicalAssistanceController.php';
require_once 'library/PHPExcel/Classes/PHPExcel/IOFactory.php';
require_once 'library/PHPExcel/Classes/PHPExcel.php'; // include the PHPExcel library

$objPHPExcel = PHPExcel_IOFactory::load("library/ClientSatisFactionReport.xlsx");



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


$objPHPExcel->setActiveSheetIndex()->setCellValue('C8', 'Covered Period:' . $covered_period);

$item_row = 12;
$no = 1;

// P A R T 1. CLIENT DEMOGRAPHIC
$cType_row = 13;
$cGender_row = 25;
$cAge_row = 17;
$cCC_row = 25;
$sd_col = 'D';
$sd_row = 11;

foreach ($client_type_opts as $key => $data) {
    $objPHPExcel->setActiveSheetIndex()->setCellValue('C' . $cType_row, $data['client_type']);
    $cType_row++;
}

foreach ($client_gender_opts as $key => $data) {
    $objPHPExcel->setActiveSheetIndex()->setCellValue('C' . $cGender_row, $data['client_gender']);
    $cGender_row++;
}

foreach ($client_age_opts as $key => $data) {
    $objPHPExcel->setActiveSheetIndex()->setCellValue('C' . $cAge_row, $data['client_age']);
    $cAge_row++;
}

foreach ($client_cc_question as $key => $data) {
    $objPHPExcel->setActiveSheetIndex()->setCellValue('M' . $cCC_row, $data['count_cc_entry']);
    $cCC_row++;
}

//  P A R T 3. Service Quality Dimension (SQD) Ratings
$counter = 0;
foreach ($service_dimension as $key => $data) {
    ECHO $data['dimension'].'='. $data['count_sd_entry'].'<br>';
    if (!empty($sd_col)) {
        $objPHPExcel->setActiveSheetIndex(1)->setCellValue($sd_col . '' . $sd_row, $data['count_sd_entry']);
        $columnIndex = PHPExcel_Cell::columnIndexFromString($sd_col);
        $columnIndex++;
        $sd_col = PHPExcel_Cell::stringFromColumnIndex($columnIndex);

        $objPHPExcel->setActiveSheetIndex(1)->setCellValue('N' . $sd_row,'=SUM(J'.$sd_row.':L'.$sd_row.')');
        // Total Count of Desired Response
        // Percentage of Desire Response	
        $objPHPExcel->setActiveSheetIndex(1)->setCellValue('P' . $sd_row,'=(N'.$sd_row.')/'.$no_of_respondents['total_respondents'].'*100');
        $counter++;
        if ($counter % 5 == 0) {
            $sd_row++;
            $sd_col = 'D';
        }
    }


}
EXIT();
$objPHPExcel->setActiveSheetIndex(1)->setCellValue('A23',$no_of_desire_respondents['total_desire_repondent'] );
$objPHPExcel->setActiveSheetIndex(1)->setCellValue('H23','=('.$no_of_desire_respondents['total_desire_repondent'].' / '.$no_of_respondent['total_respondents'].')*100');













// foreach ($css_data as $key => $data) {
//     // $objPHPExcel->getActiveSheet()->getStyle("C" . $item_row . "")->applyFromArray($toLeft);
//     // $objPHPExcel->getActiveSheet()->getStyle("E" . $item_row . "")->applyFromArray($toLeft);
//     // $objPHPExcel->getActiveSheet()->getStyle("F" . $item_row . "")->applyFromArray($toLeft);
//     // $objPHPExcel->getActiveSheet()->getStyle("G" . $item_row . "")->applyFromArray($toLeft);
//     $objPHPExcel->getActiveSheet()->getStyle('A' . $item_row . ':' . 'V' . $item_row)->applyFromArray($toLeft);



//     $objPHPExcel->setActiveSheetIndex()->setCellValue('A' . $item_row,$no++);
//     $objPHPExcel->setActiveSheetIndex()->setCellValue('B' . $item_row,$data['date_released']);
//     $objPHPExcel->setActiveSheetIndex()->setCellValue('C' . $item_row,$data['date_received']);
//     $objPHPExcel->setActiveSheetIndex()->setCellValue('D' . $item_row,$data['client_type']);
//     $objPHPExcel->setActiveSheetIndex()->setCellValue('E' . $item_row,$data['age']);
//     $objPHPExcel->setActiveSheetIndex()->setCellValue('F' . $item_row,$data['gender']);
//     $objPHPExcel->setActiveSheetIndex()->setCellValue('G' . $item_row,$data['cc1']);
//     $objPHPExcel->setActiveSheetIndex()->setCellValue('H' . $item_row,$data['cc2']);
//     $objPHPExcel->setActiveSheetIndex()->setCellValue('I' . $item_row,$data['cc3']);
//     $objPHPExcel->setActiveSheetIndex()->setCellValue('J' . $item_row,$data['sqd0']);
//     $objPHPExcel->setActiveSheetIndex()->setCellValue('K' . $item_row,$data['sqd1']);
//     $objPHPExcel->setActiveSheetIndex()->setCellValue('L' . $item_row,$data['sqd2']);
//     $objPHPExcel->setActiveSheetIndex()->setCellValue('M' . $item_row,$data['sqd3']);
//     $objPHPExcel->setActiveSheetIndex()->setCellValue('N' . $item_row,$data['sqd4']);
//     $objPHPExcel->setActiveSheetIndex()->setCellValue('O' . $item_row,$data['sqd5']);
//     $objPHPExcel->setActiveSheetIndex()->setCellValue('P' . $item_row,$data['sqd6']);
//     $objPHPExcel->setActiveSheetIndex()->setCellValue('Q' . $item_row,$data['sqd7']);
//     $objPHPExcel->setActiveSheetIndex()->setCellValue('R' . $item_row,$data['sqd8']);
//     $objPHPExcel->setActiveSheetIndex()->setCellValue('T' . $item_row,$data['client_name']);
//     $objPHPExcel->setActiveSheetIndex()->setCellValue('U' . $item_row,$data['email_address']);
//     $objPHPExcel->setActiveSheetIndex()->setCellValue('V' . $item_row,$data['contact_details']);

//     $item_row++;
//     $no++;
// }
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save(str_replace('.php', '.xlsx', __FILE__));
header('location: ClientSatisFactionReport.xlsx');
