<?php
define('EOL',(PHP_SAPI == 'cli') ? PHP_EOL : '<br />');
require_once 'library/PHPExcel/Classes/PHPExcel/IOFactory.php';
$objPHPExcel = PHPExcel_IOFactory::load("library/export_monitoring_logsheet.xlsx");

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
       'name'  => 'Cambria'
   )); 
function settoZero()
{
      $conn=mysqli_connect("localhost","fascalab_2020","w]zYV6X9{*BN","fascalab_2020");
       $update ="UPDATE `tblwebposting` SET `CONTROL_NO`='' where `REQUESTED_DATE` != '0000-00-00' ";
       if (mysqli_query($conn, $update))
        {
        }
}

  function updateControlNo()
  {
    $conn=mysqli_connect("localhost","fascalab_2020","w]zYV6X9{*BN","fascalab_2020");
    $sql = mysqli_query($conn, "SELECT MONTHNAME(`REQUESTED_DATE`) AS 'month', YEAR(`REQUESTED_DATE`) AS 'year', `ID`, `CONTROL_NO`, `REQUESTED_DATE`, `REQUESTED_TIME`, `REQUESTED_BY`, `OFFICE`, `POSITION`, `MOBILE_NO`, `CATEGORY`, `PURPOSE`, `ATTACHMENT`, `RECEIVED_DATE`, `RECEIVED_TIME`, `POSTED_DATE`, `POSTED_TIME`, `POSTED_BY`, `REMARKS`, `CONFIRMED_DATE`, `CONFIRMED_TIME`, `CONFIRMED_BY`, `APPROVED_BY`, `STATUS`, `ASSIGN_DATE` FROM tblwebposting  where `REQUESTED_DATE` != '0000-00-00' order by REQUESTED_DATE");
    $i = 1;
      if (mysqli_num_rows($sql)>0) {
        while($row= mysqli_fetch_assoc($sql)) 
        {
          if($i >= 10)
          {
            $insert ="UPDATE `tblwebposting` SET `CONTROL_NO`='2021-0".$i++."' WHERE `ID` = '".$row['ID']."' ";

          }else{
            $insert ="UPDATE `tblwebposting` SET `CONTROL_NO`='2021-00".$i++."' WHERE `ID` = '".$row['ID']."' ";

          }

 
         if (mysqli_query($conn, $insert))
          {
          }
        }

 
    }
  }


// echo settoZero();
// updateControlNo();


$conn=mysqli_connect("localhost","fascalab_2020","w]zYV6X9{*BN","fascalab_2020");
$month = $_GET['month'];
$year = $_GET['year'];                                                                                                                                                                                                           

$sql_q10 = mysqli_query($conn, "SELECT MONTHNAME(`REQUESTED_DATE`) AS 'month', YEAR(`REQUESTED_DATE`) AS 'year', `ID`, `CONTROL_NO`, `REQUESTED_DATE`, `REQUESTED_TIME`, `REQUESTED_BY`, `OFFICE`, `POSITION`, `MOBILE_NO`, `CATEGORY`, `PURPOSE`, `ATTACHMENT`, `RECEIVED_DATE`, `RECEIVED_TIME`, `POSTED_DATE`, `POSTED_TIME`, `POSTED_BY`, `REMARKS`, `CONFIRMED_DATE`, `CONFIRMED_TIME`, `CONFIRMED_BY`, `IS_APPROVED`, `STATUS`, `ASSIGN_DATE` FROM `tblwebposting` WHERE MONTH(REQUESTED_DATE) = $month and YEAR(REQUESTED_DATE) = $year and `REQUESTED_DATE` != '0000-00-00' order by  `REQUESTED_DATE`");
    if (mysqli_num_rows($sql_q10)>0) {
    $row = 15;
    $no = 1;
    while($excelrow= mysqli_fetch_assoc($sql_q10) ) 
    {

      if(strlen($excelrow['REQUESTED_BY']) >= 10)
      {
      $objPHPExcel->getActiveSheet(0)->getRowDimension($row)->setRowHeight(53);
      $objPHPExcel->getActiveSheet(0)->getStyle('E'.$row)->getAlignment()->setWrapText(true);

      }else{
      $objPHPExcel->getActiveSheet(2)->getRowDimension($row)->setRowHeight(14.40);
      $objPHPExcel->getActiveSheet(2)->getStyle('E'.$row)->getAlignment()->setWrapText(true);
      }

      $startTime = date('F d, Y',strtotime($excelrow['RECEIVED_DATE']));
      $endTime = date('F d, Y',strtotime($excelrow['POSTED_DATE']));
      


      $date1 = strtotime($startTime."".$excelrow['RECEIVED_TIME']);  
      $date2 = strtotime($endTime."".$excelrow['POSTED_TIME']);  
    
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
      $calc_mins = sprintf("%d hours and %d minutes",$hours, $minutes);
      // echo $excelrow['RECEIVED_TIME'];

      
    
    

      
        $requested_time = date('g:i A',strtotime($excelrow['REQUESTED_TIME']));
        $RECEIVED_TIME     = date('g:i A',strtotime($excelrow['RECEIVED_TIME']));
        
        $POSTED_TIME = date('g:i A',strtotime($excelrow['POSTED_TIME']));


          $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A'.$row,$no);
          $objPHPExcel->setActiveSheetIndex(0)->setCellValue('B'.$row,$excelrow['CONTROL_NO']);
          $objPHPExcel->setActiveSheetIndex(0)->setCellValue('C'.$row,date('F d, Y', strtotime($excelrow['REQUESTED_DATE'])));
          $objPHPExcel->setActiveSheetIndex(0)->setCellValue('D'.$row,$requested_time);
          $objPHPExcel->getActiveSheet(0)->mergeCells("E".$row.":F".$row);
          $objPHPExcel->setActiveSheetIndex(0)->setCellValue('E'.$row,$excelrow['REQUESTED_BY']);
          $objPHPExcel->setActiveSheetIndex(0)->setCellValue('G'.$row,$excelrow['OFFICE']);
          $objPHPExcel->setActiveSheetIndex(0)->setCellValue('H'.$row,$excelrow['CATEGORY']);
          $objPHPExcel->setActiveSheetIndex(0)->setCellValue('I'.$row,$excelrow['POSTED_BY']);
          $objPHPExcel->setActiveSheetIndex(0)->setCellValue('K'.$row,date('F d, Y', strtotime($excelrow['RECEIVED_DATE'])));
          $objPHPExcel->setActiveSheetIndex(0)->setCellValue('L'.$row,$RECEIVED_TIME);
          $objPHPExcel->setActiveSheetIndex(0)->setCellValue('M'.$row,date('F d, Y', strtotime($excelrow['POSTED_DATE'])));
          $objPHPExcel->setActiveSheetIndex(0)->setCellValue('N'.$row,$POSTED_TIME);
          $objPHPExcel->setActiveSheetIndex(0)->setCellValue('O'.$row,$calc_mins);
        
          $objPHPExcel->getActiveSheet(0)->mergeCells("E11"."".":O11");
          $objPHPExcel->setActiveSheetIndex(0)->setCellValue('E11','Month of '.$excelrow['month'].' '.$year);
          $objPHPExcel->getActiveSheet()->getStyle('A'.$row.':O'.$row)->applyFromArray($styleArray);

          $objPHPExcel->getActiveSheet(0)->getStyle('C'.$row)->getAlignment()->setWrapText(true);
          $objPHPExcel->getActiveSheet(0)->getStyle('E'.$row)->getAlignment()->setWrapText(true);
          $objPHPExcel->getActiveSheet(0)->getStyle('H'.$row)->getAlignment()->setWrapText(true);
          $objPHPExcel->getActiveSheet(0)->getStyle('I'.$row)->getAlignment()->setWrapText(true);
          $objPHPExcel->getActiveSheet(0)->getStyle('J'.$row)->getAlignment()->setWrapText(true);
          $objPHPExcel->getActiveSheet(0)->getStyle('L'.$row)->getAlignment()->setWrapText(true);
          $objPHPExcel->getActiveSheet(0)->getStyle('N'.$row)->getAlignment()->setWrapText(true);
          $objPHPExcel->getDefaultStyle()->applyFromArray($setFont);



          $row++;
          $no++;
    }
  }




$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save(str_replace('.php', '.xlsx', __FILE__));
header('location: export_monitoring_logsheet.xlsx');

?>