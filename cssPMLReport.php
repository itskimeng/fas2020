<?php
define('EOL',(PHP_SAPI == 'cli') ? PHP_EOL : '<br />');
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


$conn=mysqli_connect("localhost","fascalab_2020","w]zYV6X9{*BN","fascalab_2020");
  

$month = $_GET['month'];

// $year = $_GET['year'];            


$sql_q10 = mysqli_query($conn, "SELECT * FROM `tblcustomer_satisfaction_survey`  where month(DATE_ACCOMPLISHED) = $month   ");
    if (mysqli_num_rows($sql_q10)>0) {
    $row = 13;
    $no = 1;
    $prname1=array();

    while($excelrow= mysqli_fetch_assoc($sql_q10) ) 
    {

      $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A'.$row,$no); // no
      $prname1[]=$excelrow['SD_ID'];


      if(strlen($excelrow['CLIENT']) >= 10)
      {
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('B'.$row,$excelrow['CLIENT']); // name of client
        $objPHPExcel->getActiveSheet(0)->getRowDimension($row)->setRowHeight(25);
        $objPHPExcel->getActiveSheet(0)->getStyle('B'.$row)->getAlignment()->setWrapText(true);
        $objPHPExcel->getActiveSheet()->getStyle('A'.$row.':Q'.$row)->applyFromArray($styleArray);
        $objPHPExcel->getDefaultStyle()->applyFromArray($setFont);

      }else{
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('B'.$row,$excelrow['CLIENT']);
        $objPHPExcel->getActiveSheet(2)->getRowDimension($row)->setRowHeight(10);
        $objPHPExcel->getActiveSheet(2)->getStyle('B'.$row)->getAlignment()->setWrapText(true);
        $objPHPExcel->getActiveSheet()->getStyle('A'.$row.':Q'.$row)->applyFromArray($styleArray);
        $objPHPExcel->getDefaultStyle()->applyFromArray($setFont);
      }
      $objPHPExcel->setActiveSheetIndex(0)->setCellValue('C'.$row,date('F d, Y',strtotime($excelrow['DATE_ACCOMPLISHED'])));
      $objPHPExcel->getActiveSheet(2)->getStyle('C'.$row)->getAlignment()->setWrapText(true);
      $objPHPExcel->setActiveSheetIndex(0)->setCellValue('H'.$row,'Free of Charge');

    
      $row++;
      $no++;

      
    }
  
    $step = 9;
    $column = 'D';
    $row1 = 13;


    $string = "'".implode("','", $prname1)."'";

    $sql_q11 = mysqli_query($conn, "SELECT * FROM `tblservice_dimension` where CONTROL_NO IN ($string) ");
    if (mysqli_num_rows($sql_q11)>0) {
      $row1 = 13;
      $i = 0;
      $a = array();
      $excelrow1 ='';
    while($excelrow1= mysqli_fetch_array($sql_q11) ) 
    {

          $objPHPExcel->setActiveSheetIndex(0)->setCellValue($column.'13',$excelrow1['SERVICE_DIMENTION']);


    }
 
    $input_array = array('a', 'b', 'c', 'd', 'e');

   $b = array_chunk($input_array, 9);
   foreach ($b as $value) {
    echo $value, "\n";
}
    
  

    
$row1++;

    
  }

     


     
  
    
    
    
  //     $column = 'D';
  //     $step = 9; // number of columns to step by
  //   

  //   }
   
  // }
    EXIT();
  }else{
    echo 'a';
    exit();
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
