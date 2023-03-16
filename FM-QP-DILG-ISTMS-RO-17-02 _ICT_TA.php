<?php

define('EOL',(PHP_SAPI == 'cli') ? PHP_EOL : '<br />');
require_once 'library/PHPExcel/Classes/PHPExcel/IOFactory.php';
$objPHPExcel = PHPExcel_IOFactory::load("library/FM-QP-DILG-ISTMS-RO-17-02 _ICT_TA.xlsx");

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
       'size'  => 8,
       'name'  => 'Cambria'
   )); 
function settoZero()
{
  $conn=mysqli_connect("localhost","fascalab_2020","w]zYV6X9{*BN","fascalab_2020");
       $update ="UPDATE `tbltechnical_assistance` SET `CONTROL_NO`='' where `REQ_DATE` != '0000-00-00' ";
       if (mysqli_query($conn, $update))
        {
        }
}

  function updateControlNo()
  {
    $conn=mysqli_connect("localhost","fascalab_2020","w]zYV6X9{*BN","fascalab_2020");
    $sql = mysqli_query($conn, "SELECT MONTHNAME(`REQ_DATE`) AS 'month', YEAR(`REQ_DATE`) AS 'year', `ID`, `CONTROL_NO`, `REQ_DATE`, `REQ_TIME`, `REQ_BY`, `OFFICE`, `POSITION`, `CONTACT_NO`, `EMAIL_ADD`, `EQUIPMENT_TYPE`, `BRAND_MODEL`, `PROPERTY_NO`, `SERIAL_NO`, `IP_ADDRESS`, `MAC_ADDRESS`, `TYPE_REQ`, `TYPE_REQ_DESC`, `ISSUE_PROBLEM`, `START_DATE`, `START_TIME`, `STATUS_DESC`, `COMPLETED_DATE`, `COMPLETED_TIME`, `ASSIST_BY`, `PERSON_ASSISTED`, `TIMELINESS`, `QUALITY`, `STATUS` FROM `tbltechnical_assistance`  where `REQ_DATE` != '0000-00-00' order by REQ_DATE");
    $i = 1;
      if (mysqli_num_rows($sql)>0) {
        while($row= mysqli_fetch_assoc($sql)) 
        {
          if($i >= 10)
          {
            $insert ="UPDATE `tbltechnical_assistance` SET `CONTROL_NO`='2021-".$i++."' WHERE `ID` = '".$row['ID']."' ";

          }else{
            $insert ="UPDATE `tbltechnical_assistance` SET `CONTROL_NO`='2021-".$i++."' WHERE `ID` = '".$row['ID']."' ";

          }

 
         if (mysqli_query($conn, $insert))
          {
          }
        }

 
    }
  }


//settoZero();
//updateControlNo();


$conn=mysqli_connect("localhost","fascalab_2020","w]zYV6X9{*BN","fascalab_2020");
  print_r($_GET);

$month = $_GET['quarter'];
$year = $_GET['year']; 
$months='';           
$quarter = '';

if($month == '1st Quarter' || $month == 0)
{
  $months = "('1','2','3')";
  $quarter = '1st Quarter';
}else if($month == '2nd Quarter')
{
  $months = "('4','5','6')";
  $quarter = '2nd Quarter';


}else if($month == '3rd Quarter')
{
  $months = "('7','8','9')";
  $quarter = '3rd Quarter';

  
}else if($month == '4th Quarter')
{
  $months = "('10','11','12')";
  $quarter = '4th Quarter';

  
}
// echo "SELECT MONTHNAME(`REQ_DATE`) AS 'month', YEAR(`REQ_DATE`) AS 'year', `ID`, `CONTROL_NO`, `REQ_DATE`, `REQ_TIME`, `REQ_BY`, `OFFICE`, `POSITION`, `CONTACT_NO`, `EMAIL_ADD`, `EQUIPMENT_TYPE`, `BRAND_MODEL`, `PROPERTY_NO`, `SERIAL_NO`, `IP_ADDRESS`, `MAC_ADDRESS`, `TYPE_REQ`, `TYPE_REQ_DESC`, `ISSUE_PROBLEM`, `START_DATE`, `START_TIME`, `STATUS_DESC`, `COMPLETED_DATE`, `COMPLETED_TIME`, `ASSIST_BY`, `PERSON_ASSISTED`, `TIMELINESS`, `QUALITY`, `STATUS` FROM `tbltechnical_assistance` WHERE MONTH(REQ_DATE) IN $months and YEAR(REQ_DATE) = $year and `REQ_DATE` != '0000-00-00'   order by  `CONTROL_NO`";
// exit();
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('C7',$quarter);

$sql_q10 = mysqli_query($conn, "SELECT MONTHNAME(`REQ_DATE`) AS 'month', YEAR(`REQ_DATE`) AS 'year', `ID`, `CONTROL_NO`, `REQ_DATE`, `REQ_TIME`, `REQ_BY`, `OFFICE`, `POSITION`, `CONTACT_NO`, `EMAIL_ADD`, `EQUIPMENT_TYPE`, `BRAND_MODEL`, `PROPERTY_NO`, `SERIAL_NO`, `IP_ADDRESS`, `MAC_ADDRESS`, `TYPE_REQ`, `TYPE_REQ_DESC`, `ISSUE_PROBLEM`, `START_DATE`, `START_TIME`, `STATUS_DESC`, `COMPLETED_DATE`, `COMPLETED_TIME`, `ASSIST_BY`, `PERSON_ASSISTED`, `TIMELINESS`, `QUALITY`, `STATUS` FROM `tbltechnical_assistance` WHERE MONTH(REQ_DATE) IN $months and YEAR(REQ_DATE) = $year and `REQ_DATE` != '0000-00-00'   order by  `CONTROL_NO`");
 
if (mysqli_num_rows($sql_q10)>0) {
    $row = 10;
    $no = 1;
    
    while($excelrow= mysqli_fetch_assoc($sql_q10) ) 
    {
      $objPHPExcel->getDefaultStyle() ->applyFromArray($setFont);

      if(strlen($excelrow['REQ_BY']) >= 10)
      {
      $objPHPExcel->getActiveSheet(0)->getRowDimension($row)->setRowHeight(30);
      $objPHPExcel->getActiveSheet(0)->getStyle('E'.$row)->getAlignment()->setWrapText(true);

      }else{
      $objPHPExcel->getActiveSheet(2)->getRowDimension($row)->setRowHeight(14.40);
      $objPHPExcel->getActiveSheet(2)->getStyle('E'.$row)->getAlignment()->setWrapText(true);
      }

      $startTime = date('F d, Y',strtotime($excelrow['START_DATE']));
      $endTime = date('F d, Y',strtotime($excelrow['COMPLETED_DATE']));
      


      $date1 = strtotime($startTime."".$excelrow['START_TIME']);  
      $date2 = strtotime($endTime."".$excelrow['COMPLETED_TIME']);  
    
      // Formulate the Difference between two dates 
      $diff = abs($date2 - $date1);  
    
    
      // To get the year divide the resultant date into 
      // total seconds in a year (365*60*60*24) 
      $years = floor($diff / (365*60*60*24));  
        
        
      // To get the month, subtract it with years and 
      // divide the resultant date into 
      // total seconds in a month (30*60*60*24) 
      $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));  
        
        
      // To get the day, subtract it with years and  
      // months and divide the resultant date into 
      // total seconds in a days (60*60*24) 
      $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24)); 
        
        
      // To get the hour, subtract it with years,  
      // months & seconds and divide the resultant 
      // date into total seconds in a hours (60*60) 
      $hours = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24) / (60*60));  
        
      // To get the minutes, subtract it with years, 
      // months, seconds and hours and divide the  
      // resultant date into total seconds i.e. 60 
      $minutes = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60)/ 60);  
        
        
      // To get the minutes, subtract it with years, 
      // months, seconds, hours and minutes  
      $seconds = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60 - $minutes*60));  
        
      // Print the result 
      if($hours == 0)
      {
        $calc_mins = sprintf("%d minutes", $minutes);

      }else{
      $calc_mins = sprintf("%d hours and %d minutes",$hours, $minutes);

      }
      // echo $excelrow['START_TIME'];

      
    
    

      
        $requested_time = date('g:i A',strtotime($excelrow['START_DATE'].' '.$excelrow['REQ_TIME']));
        $start_time     = date('g:i A',strtotime($excelrow['START_DATE'].' '.$excelrow['START_TIME']));
        $completed_time = date('g:i A',strtotime($excelrow['COMPLETED_DATE'].' '.$excelrow['COMPLETED_TIME']));


          $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A'.$row,$no);
          $objPHPExcel->setActiveSheetIndex(0)->setCellValue('B'.$row,$excelrow['CONTROL_NO']);
          $objPHPExcel->setActiveSheetIndex(0)->setCellValue('C'.$row,date('F d, Y', strtotime($excelrow['START_DATE'])));
          $objPHPExcel->setActiveSheetIndex(0)->setCellValue('D'.$row,$start_time);
          // $objPHPExcel->getActiveSheet(0)->mergeCells("E".$row.":F".$row);
          $objPHPExcel->setActiveSheetIndex(0)->setCellValue('E'.$row,$excelrow['REQ_BY']);
          $objPHPExcel->setActiveSheetIndex(0)->setCellValue('F'.$row,$excelrow['OFFICE']);
          $objPHPExcel->setActiveSheetIndex(0)->setCellValue('G'.$row,$excelrow['ISSUE_PROBLEM']);
          // $objPHPExcel->setActiveSheetIndex(0)->setCellValue('I'.$row,$excelrow['TYPE_REQ']);
          $objPHPExcel->setActiveSheetIndex(0)->setCellValue('H'.$row,$excelrow['ASSIST_BY']);
          // $objPHPExcel->setActiveSheetIndex(0)->setCellValue('L'.$row,date('F d, Y', strtotime($excelrow['START_DATE'])));
          // $objPHPExcel->setActiveSheetIndex(0)->setCellValue('M'.$row,$start_time);
          $objPHPExcel->setActiveSheetIndex(0)->setCellValue('K'.$row,date('F d, Y', strtotime($excelrow['COMPLETED_DATE'])));
          $objPHPExcel->setActiveSheetIndex(0)->setCellValue('L'.$row,$completed_time);
          $objPHPExcel->setActiveSheetIndex(0)->setCellValue('M'.$row,$calc_mins);
          $objPHPExcel->setActiveSheetIndex(0)->setCellValue('N'.$row,$excelrow['QUALITY']);
          // $objPHPExcel->getActiveSheet(0)->mergeCells("E11"."".":Q11");
          // $objPHPExcel->setActiveSheetIndex(0)->setCellValue('E11','Month of '.$excelrow['month'].' '.$year);
          $objPHPExcel->getActiveSheet()->getStyle('A'.$row.':N'.$row)->applyFromArray($styleArray);

          $objPHPExcel->getActiveSheet(0)->getStyle('B'.$row)->getAlignment()->setWrapText(true);
          $objPHPExcel->getActiveSheet(0)->getStyle('C'.$row)->getAlignment()->setWrapText(true);
          $objPHPExcel->getActiveSheet(0)->getStyle('D'.$row)->getAlignment()->setWrapText(true);
          $objPHPExcel->getActiveSheet(0)->getStyle('E'.$row)->getAlignment()->setWrapText(true);
          $objPHPExcel->getActiveSheet(0)->getStyle('F'.$row)->getAlignment()->setWrapText(true);
          $objPHPExcel->getActiveSheet(0)->getStyle('G'.$row)->getAlignment()->setWrapText(true);
          $objPHPExcel->getActiveSheet(0)->getStyle('H'.$row)->getAlignment()->setWrapText(true);
          $objPHPExcel->getActiveSheet(0)->getStyle('K'.$row)->getAlignment()->setWrapText(true);
          $objPHPExcel->getActiveSheet(0)->getStyle('L'.$row)->getAlignment()->setWrapText(true);
          $objPHPExcel->getActiveSheet(0)->getStyle('M'.$row)->getAlignment()->setWrapText(true);



          $row++;
          $no++;
    }
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
header('location: FM-QP-DILG-ISTMS-RO-17-02 _ICT_TA.xlsx');

?>