<?php
define('EOL', (PHP_SAPI == 'cli') ? PHP_EOL : '<br />');
require_once 'library/PHPExcel/Classes/PHPExcel/IOFactory.php';
$objPHPExcel = PHPExcel_IOFactory::load("library/cssPMLReport.xlsx");


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
$styleArray = array(
  'borders' => array(
    'allborders' => array(
      'style' => PHPExcel_Style_Border::BORDER_THIN
    )
  )
);

$setFont = array(
  'font'  => array(
    'size'  => 11,
    'name'  => 'Arial'
  )
);

$setColor =  array(
  'fill' => array(
      'type' => PHPExcel_Style_Fill::FILL_SOLID,
      'color' => array('rgb' => '000000')
  )
  );
  
$approvedBy =array(
  'font'  => array(
      'bold'  => true,
      'color' => array('rgb' => 'FAFAFA'),
      'size'  => 11,
      'name'  => 'Cambria'
  ));

  $signatories =array(
    'font'  => array(
        'bold'  => true,
        'color' => array('rgb' => '000000'),
        'size'  => 11,
        'name'  => 'Cambria'
    ));
function settoZero()
{
  $conn = mysqli_connect("localhost", "fascalab_2020", "w]zYV6X9{*BN", "fascalab_2020");
  $update = "UPDATE `tbltechnical_assistance` SET `CONTROL_NO`='' where `REQ_DATE` != '0000-00-00' ";
  if (mysqli_query($conn, $update)) {
  }
}

function updateControlNo()
{
  $conn = mysqli_connect("localhost", "fascalab_2020", "w]zYV6X9{*BN", "fascalab_2020");
  $sql = mysqli_query($conn, "SELECT MONTHNAME(`REQ_DATE`) AS 'month', YEAR(`REQ_DATE`) AS 'year', `ID`, `CONTROL_NO`, `REQ_DATE`, `REQ_TIME`, `REQ_BY`, `OFFICE`, `POSITION`, `CONTACT_NO`, `EMAIL_ADD`, `EQUIPMENT_TYPE`, `BRAND_MODEL`, `PROPERTY_NO`, `SERIAL_NO`, `IP_ADDRESS`, `MAC_ADDRESS`, `TYPE_REQ`, `TYPE_REQ_DESC`, `ISSUE_PROBLEM`, `START_DATE`, `START_TIME`, `STATUS_DESC`, `COMPLETED_DATE`, `COMPLETED_TIME`, `ASSIST_BY`, `PERSON_ASSISTED`, `TIMELINESS`, `QUALITY`, `STATUS` FROM `tbltechnical_assistance`  where `REQ_DATE` != '0000-00-00' order by REQ_DATE");
  $i = 1;
  if (mysqli_num_rows($sql) > 0) {
    while ($row = mysqli_fetch_assoc($sql)) {
      if ($i >= 10) {
        $insert = "UPDATE `tbltechnical_assistance` SET `CONTROL_NO`='2021-" . $i++ . "' WHERE `ID` = '" . $row['ID'] . "' ";
      } else {
        $insert = "UPDATE `tbltechnical_assistance` SET `CONTROL_NO`='2021-" . $i++ . "' WHERE `ID` = '" . $row['ID'] . "' ";
      }


      if (mysqli_query($conn, $insert)) {
      }
    }
  }
}


$conn = mysqli_connect("localhost", "fascalab_2020", "w]zYV6X9{*BN", "fascalab_2020");


$month = $_GET['month'];
$year = $_GET['year'];
if($month==0){
  $month = 1;
}

// $year = $_GET['year'];            


$sql_q10 = mysqli_query($conn, "SELECT * FROM `tblcustomer_satisfaction_survey`  where month(DATE_ACCOMPLISHED) = $month   ");
if (mysqli_num_rows($sql_q10) > 0) {
  $row = 13;
  $no = 1;
  $prname1 = array();
  $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A8', 'Covered Period:'.date('F Y',strtotime($year.'-'.$month)));

  while ($excelrow = mysqli_fetch_assoc($sql_q10)) {

    $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A' . $row, $no); // no
    $prname1[] = $excelrow['SD_ID'];


    if (strlen($excelrow['CLIENT']) >= 10) {
      $objPHPExcel->setActiveSheetIndex(0)->setCellValue('B' . $row, $excelrow['CLIENT']); // name of client
      $objPHPExcel->getActiveSheet(0)->getRowDimension($row)->setRowHeight(25);
      $objPHPExcel->getActiveSheet(0)->getStyle('B' . $row)->getAlignment()->setWrapText(true);
      $objPHPExcel->getActiveSheet()->getStyle('A' . $row . ':Q' . $row)->applyFromArray($styleArray);
      $objPHPExcel->getDefaultStyle()->applyFromArray($setFont);
    } else {
      $objPHPExcel->setActiveSheetIndex(0)->setCellValue('B' . $row, $excelrow['CLIENT']);
      $objPHPExcel->getActiveSheet(2)->getRowDimension($row)->setRowHeight(10);
      $objPHPExcel->getActiveSheet(2)->getStyle('B' . $row)->getAlignment()->setWrapText(true);
      $objPHPExcel->getActiveSheet()->getStyle('A' . $row . ':Q' . $row)->applyFromArray($styleArray);
      $objPHPExcel->getDefaultStyle()->applyFromArray($setFont);
    }

    $objPHPExcel->setActiveSheetIndex(0)->setCellValue('C' . $row, date('F d, Y', strtotime($excelrow['DATE_ACCOMPLISHED'])));
    $objPHPExcel->getActiveSheet(2)->getStyle('C' . $row)->getAlignment()->setWrapText(true);
    $objPHPExcel->setActiveSheetIndex(0)->setCellValue('H' . $row, 'Free of Charge');


    $row++;
    $no++;
  }

 

  $column = 'D';
  $row1 = 13;
  $string = "'" . implode("','", $prname1) . "'";
  $sql_q11 = mysqli_query($conn, "SELECT * FROM `tblcustomer_satisfaction_survey` INNER JOIN tblservice_dimension ON tblcustomer_satisfaction_survey.SD_ID = tblservice_dimension.CONTROL_NO WHERE month(tblcustomer_satisfaction_survey.`DATE_ACCOMPLISHED`) =$month and year(tblcustomer_satisfaction_survey.`DATE_ACCOMPLISHED`) = $year ");
  if (mysqli_num_rows($sql_q11) > 0) {
    $row1 = 13;
    $i = 0;
    $excelrow1 = '';
    $data = array();
    $service = array();
    $j = 'D';
    while ($excelrow1 = mysqli_fetch_array($sql_q11)) {
      $data[] = $excelrow1['RATING_SCALE'];
      $service[] = $excelrow1['SERVICE_DIMENTION'];
    }
    $dimension = ["Responsiveness", "Reliability", "Access & Facilities", "Communication", "Costs", "Integrity", "Assurance", "Outcome"];
    $hRow = $objPHPExcel->setActiveSheetIndex(0)->getHighestRow();

  


    for ($i = 0; $i < count($service); $i++) {
      if (in_array($service[$i], $dimension)) {
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue($column . $row1, $data[$i]);
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('H' . $row1, 'Free of charge');
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('L' . $row1, '=AVERAGE(D'.$row1.':K'.$row1.')');
        $objPHPExcel->getActiveSheet(0)->getStyle('B' . $row1)->getAlignment()->setWrapText(true);
        $objPHPExcel->getActiveSheet()->getStyle('A' . $row1 . ':Q' . $row1)->applyFromArray($styleArray);
      }
      
      if ($column == 'K') {
        $column = 'C';
        $row1++;
      }
      $j++;
      $column++;
    }
  }
}


// signatories
$cur_row = $row1 + 13;


$objPHPExcel->getActiveSheet(0)->mergeCells('D'.$cur_row.':G'.$cur_row.'');
$objPHPExcel->getActiveSheet()->getStyle('D'.$cur_row)->applyFromArray($setColor);
$objPHPExcel->getActiveSheet()->getStyle('D'.$cur_row)->applyFromArray($approvedBy);
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('D'.$cur_row,'Approved By:');
$objPHPExcel->getActiveSheet() ->getStyle('D'.$cur_row) ->getAlignment() ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);

$cur_row+=5;
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('D'.$cur_row,'MAYBELLINE M. MONTEIRO');
$objPHPExcel->getActiveSheet()->getStyle('D'.$cur_row)->applyFromArray($signatories);
$cur_row+=2;
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('D'.$cur_row,'Date:'.date('F d, Y'));
$objPHPExcel->getActiveSheet()->getStyle('D'.$cur_row)->applyFromArray($signatories);
$cur_row+=1;
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('D'.$cur_row,'Position');

$cur_row = $row1+13;
$last= $cur_row+8;
$col = 'D';
for($i = 0; $i < 9; $i++){
  $objPHPExcel->getActiveSheet()->getStyle('D'.$cur_row)->applyFromArray($styleLeft);
  $objPHPExcel->getActiveSheet()->getStyle('G'.$cur_row)->applyFromArray($styleRight);
  
  $objPHPExcel->getActiveSheet()->getStyle($col.$last)->applyFromArray($stylebottom);
$cur_row++;
if ($col == 'G') {
  $col = 'D';
  $col++;

}
$col++;
}






// $objPHPExcel->setActiveSheetIndex(0)->getHighestRow();


// $objDrawing = new PHPExcel_Worksheet_Drawing();
// $objDrawing->setPath('images/pml_sig.PNG');

// $objDrawing->setCoordinates('C1');    

// //setOffsetX works properly
// $cur_row = $row+9;
// $objDrawing->setCoordinates('C'.$cur_row);        //set image to cell             
// //set width, height
// $objDrawing->setWidth(600); 
// $objDrawing->setHeight(200); 
// $objDrawing->setWorksheet($objPHPExcel->getActiveSheet());



// ========================================================================

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save(str_replace('.php', '.xlsx', __FILE__));
header('location: cssPMLReport.xlsx');
