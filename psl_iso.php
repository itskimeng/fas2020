<?php
define('EOL',(PHP_SAPI == 'cli') ? PHP_EOL : '<br />');
require_once 'library/PHPExcel/Classes/PHPExcel/IOFactory.php';
$objPHPExcel = PHPExcel_IOFactory::load("library/psl_iso.xlsx");

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
$fontStyle = [
  'font' => [
      'size' => 8,
      'name'  => 'Cambria'

  ]
];
$style = array(
  'alignment' => array(
      'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
  )
);



$conn=mysqli_connect("localhost","fascalab_2020","w]zYV6X9{*BN","fascalab_2020");

$year = $_GET['year'];
$month = $_GET['month'];
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

$sql_q10 = mysqli_query($conn, "SELECT  MONTHNAME(`REQ_DATE`) AS 'month',`REQ_DATE`, COUNT(`REQ_DATE`) as 'count'  FROM `tbltechnical_assistance` WHERE MONTH(`REQ_DATE`) IN $months and YEAR(`REQ_DATE`) = $year GROUP BY `REQ_DATE` ORDER BY `REQ_DATE`");

if (mysqli_num_rows($sql_q10)>0) 
{
    $row = 14;
    $no = 1;
    $count = (mysqli_num_rows($sql_q10));
   $total = ($row + $count)+1;
   $objPHPExcel->setActiveSheetIndex(0)->setCellValue('C10',$quarter);

   while($excelrow= mysqli_fetch_assoc($sql_q10) ) 
   {
     
       $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A'.$row,date('F d, Y',strtotime($excelrow['REQ_DATE'])));
       $objPHPExcel->setActiveSheetIndex(0)->setCellValue('B'.$row,$excelrow['count']);
       $objPHPExcel->setActiveSheetIndex(0)->setCellValue('C'.$row,$excelrow['count']);
       $objPHPExcel->setActiveSheetIndex(0)->setCellValue('D'.$row,"100%");
       $objPHPExcel->setActiveSheetIndex(0)->setCellValue('F'.$row,$excelrow['count']);
       $objPHPExcel->setActiveSheetIndex(0)->setCellValue('G'.$row,"100%");
       

 

       $objPHPExcel->getActiveSheet()->getStyle('A'.$total)->getFont()->setBold( true );
       $objPHPExcel->getActiveSheet()->getStyle('B'.$total)->getFont()->setBold( true );
       $objPHPExcel->getActiveSheet()->getStyle('E'.$total)->getFont()->setBold( true );
       $objPHPExcel->getActiveSheet()->getStyle('G'.$total)->getFont()->setBold( true );
       $objPHPExcel->getActiveSheet()->getStyle('H'.$total)->getFont()->setBold( true );
       $objPHPExcel->getActiveSheet()->getStyle('I'.$total)->getFont()->setBold( true );
       $objPHPExcel->getActiveSheet()->getStyle('J'.$total)->getFont()->setBold( true );
       $objPHPExcel->getActiveSheet()->getStyle('M'.$total)->getFont()->setBold( true );
       $objPHPExcel->getActiveSheet()->getStyle('N'.$total)->getFont()->setBold( true );
       
       $objPHPExcel->getActiveSheet()->getStyle("A".$total.":H".$total) ->applyFromArray($fontStyle);

       $objPHPExcel->getActiveSheet()->getStyle('A'.$row.':H'.$row)->applyFromArray($styleArray);
       $objPHPExcel->getActiveSheet()->getStyle('A'.$total.':H'.$total)->applyFromArray($styleArray);
       
       $objPHPExcel->getActiveSheet(0)->setCellValue('B'.$total,'=SUM(B14:B'.($row).')');
       $objPHPExcel->getActiveSheet(0)->setCellValue('C'.$total,'=SUM(C14:C'.($row).')');
       $objPHPExcel->getActiveSheet(0)->setCellValue('F'.$total,'=SUM(F14:F'.($row).')');
       $objPHPExcel->getActiveSheet(0)->setCellValue('A'.$total,'TOTAL');
  
   

     $row++;
   }
   $pb = $total + 2;
   $b1 = $total + 3;
   $b2 = $total + 4;
    $objPHPExcel->getActiveSheet()->mergeCells('B'.$pb.':C'.$pb);
    $objPHPExcel->getActiveSheet(0) ->setCellValue('B'.$pb,'PREPARED BY:');
    $objPHPExcel->getActiveSheet()
    ->getStyle('B'.$pb)
    ->getFill()
    ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
    ->getStartColor()
    ->setRGB('000000');
    $objPHPExcel->getActiveSheet()->getStyle("B".$pb)->getFont()->setBold(true)
    ->getColor()
    ->setRGB('FFFFFF');
    $objPHPExcel->getActiveSheet()->getStyle('B'.$pb.':C'.$pb)->applyFromArray($styleArray);
    $objPHPExcel->getActiveSheet()->getStyle('B'.$b1.':C'.$b1)->applyFromArray($styleLeft);
    $objPHPExcel->getActiveSheet()->getStyle('B'.$b2.':C'.$b2)->applyFromArray($styleLeft);


    $total1 = $total+5;
    $total2 = $total+4;
    $total3 = $total+3;
    $objPHPExcel->getActiveSheet()->getStyle('B'.$total3.':C'.$total3)->applyFromArray($styleRight);
    $objPHPExcel->getActiveSheet()->getStyle('B'.$total2.':C'.$total2)->applyFromArray($styleRight);
    $objPHPExcel->getActiveSheet()->getStyle('B'.$total1.':C'.$total1)->applyFromArray($styleLeft);
    $objPHPExcel->getActiveSheet()->getStyle('B'.$total1.':C'.$total1)->applyFromArray($styleRight);
    $objPHPExcel->getActiveSheet()->getStyle('B'.$total1.':C'.$total1)->applyFromArray($stylebottom);
    $objPHPExcel->getActiveSheet()->mergeCells('B'.$total1.':C'.$total1);
    $objPHPExcel->getActiveSheet(0) ->setCellValue('B'.$total1,'MAYBELLINE M. MONTEIRO');
    $objPHPExcel->getActiveSheet()->getStyle('B'.$total1)->applyFromArray($style);

    
    $po= $total + 6;
    $po1= $total + 5;
    $objPHPExcel->getActiveSheet()->mergeCells('B'.$po.':C'.$po);
    $objPHPExcel->getActiveSheet()->getStyle('B'.$po1.':C'.$po1)->applyFromArray($styleLeft);
    $objPHPExcel->getActiveSheet()->getStyle('B'.$po1.':C'.$po1)->applyFromArray($styleRight);
    $objPHPExcel->getActiveSheet()->getStyle('B'.$po.':C'.$po1)->applyFromArray($styleLeft);
    $objPHPExcel->getActiveSheet()->getStyle('B'.$po.':C'.$po)->applyFromArray($styleRight);
    $objPHPExcel->getActiveSheet()->getStyle('B'.$po.':C'.$po)->applyFromArray($styleLeft);
    $objPHPExcel->getActiveSheet()->getStyle('B'.$po.':C'.$po)->applyFromArray($stylebottom);
    $objPHPExcel->getActiveSheet(0) ->setCellValue('B'.$po,'Process Owner');
    $objPHPExcel->getActiveSheet()->getStyle('B'.$po)->applyFromArray($style);


    $objPHPExcel->getActiveSheet()->getStyle("B".$total.":C".$total) ->applyFromArray($fontStyle);

    $objPHPExcel->getActiveSheet()->getStyle('B'.$row.':C'.$row)->applyFromArray($styleArray);
    $objPHPExcel->getActiveSheet()->getStyle('B'.$total.':C'.$total)->applyFromArray($styleArray);


    

    
  }
  // $objPHPExcel->setActiveSheetIndex(0)->getHighestRow();
  // $objPHPExcel->setActiveSheetIndex(0)->getHighestRow();
  // $objDrawing = new PHPExcel_Worksheet_Drawing();
  // $objDrawingg = new PHPExcel_Worksheet_Drawing();
  // $objDrawing->setPath('images/psl_new.PNG');
  // $objDrawingg->setPath('images/psl_new2.PNG');

  // $objDrawing->setCoordinates('B1');
  // $objDrawingg->setCoordinates('F1');
                    
  // //setOffsetX works properly
  // $cur_row = $row+5;
  // $cur_row2 = $row+5;
  // $objDrawing->setCoordinates('B'.$cur_row);
  // $objDrawingg->setCoordinates('E'.$cur_row2);//set image to cell             
  // //set width, height
  // // $objDrawing->setWidth(300);
  // // $objDrawing->setHeight(200);
  // $objDrawing->setResizeProportional(true);

  // $objDrawing->setWorksheet($objPHPExcel->getActiveSheet());
  //   $objDrawingg->setWorksheet($objPHPExcel->getActiveSheet());


  

// ==================================================================================



$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save(str_replace('.php', '.xlsx', __FILE__));
header('location: psl_iso.xlsx');

?>