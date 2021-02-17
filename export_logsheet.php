<?php
define('EOL',(PHP_SAPI == 'cli') ? PHP_EOL : '<br />');
require_once 'library/PHPExcel/Classes/PHPExcel/IOFactory.php';
$objPHPExcel = PHPExcel_IOFactory::load("library/export_logsheet.xlsx");

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
      'size' => 8
  ]
];



$conn=mysqli_connect("localhost","fascalab_2020","w]zYV6X9{*BN","fascalab_2020");
$month = $_GET['month'];
$year = $_GET['year'];

$sql_q10 = mysqli_query($conn, "SELECT 
MONTHNAME(`REQUESTED_DATE`) AS 'month',
`REQUESTED_DATE`, COUNT(`REQUESTED_DATE`) as 'count' 
FROM `tblwebposting` 
WHERE MONTH(`REQUESTED_DATE`) = '$month' and YEAR(`REQUESTED_DATE`) = '$year' 
GROUP BY `REQUESTED_DATE` 
ORDER BY `REQUESTED_DATE`");
if (mysqli_num_rows($sql_q10)>0) 
{
    $row = 18;
    $no = 1;
    $count = (mysqli_num_rows($sql_q10));
   $total = ($row + $count)+1;
    while($excelrow= mysqli_fetch_assoc($sql_q10) ) 
    {
      
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A'.$row,date('F d, Y',strtotime($excelrow['REQUESTED_DATE'])));
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('B'.$row,$excelrow['count']);
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('E'.$row,$excelrow['count']);
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('G'.$row,$excelrow['count']);
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('H'.$row,$excelrow['count']);
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('E13','Month of '.$excelrow['month'].' '.$year);
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A'.$total,'Total');
        $objPHPExcel->getActiveSheet()->mergeCells("J".$total.":L".$total);
        $objPHPExcel->getActiveSheet()->mergeCells("M".$total.":O".$total);

        $objPHPExcel->getActiveSheet(0) ->setCellValue('B'.$total,'=SUM(B18:B'.($row).')' );
        $objPHPExcel->getActiveSheet(0) ->setCellValue('E'.$total,'=SUM(E18:E'.($row).')' );
        $objPHPExcel->getActiveSheet(0) ->setCellValue('G'.$total,'=SUM(G18:G'.($row).')' );
        $objPHPExcel->getActiveSheet(0) ->setCellValue('H'.$total,'=SUM(H18:H'.($row).')' );

        $objPHPExcel->getActiveSheet()->getStyle('A'.$total)->getFont()->setBold( true );
        $objPHPExcel->getActiveSheet()->getStyle('B'.$total)->getFont()->setBold( true );
        $objPHPExcel->getActiveSheet()->getStyle('E'.$total)->getFont()->setBold( true );
        $objPHPExcel->getActiveSheet()->getStyle('G'.$total)->getFont()->setBold( true );
        $objPHPExcel->getActiveSheet()->getStyle('H'.$total)->getFont()->setBold( true );
        $objPHPExcel->getActiveSheet()->getStyle('I'.$total)->getFont()->setBold( true );
        $objPHPExcel->getActiveSheet()->getStyle('J'.$total)->getFont()->setBold( true );
        $objPHPExcel->getActiveSheet()->getStyle('M'.$total)->getFont()->setBold( true );
        $objPHPExcel->getActiveSheet()->getStyle('N'.$total)->getFont()->setBold( true );

        $objPHPExcel->getActiveSheet()->mergeCells("J".$row.":L".$row);
        $objPHPExcel->getActiveSheet()->mergeCells("M".$row.":O".$row);

        
        $objPHPExcel->getActiveSheet()
        ->getStyle("A".$total.":O".$total)
        ->applyFromArray($fontStyle);

        $objPHPExcel->getActiveSheet()->getStyle('A'.$row.':O'.$row)->applyFromArray($styleArray);
        $objPHPExcel->getActiveSheet()->getStyle('A'.$total.':O'.$total)->applyFromArray($styleArray);
        
      $row++;
    }

}



$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save(str_replace('.php', '.xlsx', __FILE__));
header('location: export_logsheet.xlsx');

?>