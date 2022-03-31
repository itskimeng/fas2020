<?php
define('EOL',(PHP_SAPI == 'cli') ? PHP_EOL : '<br />');
require_once 'library/PHPExcel/Classes/PHPExcel/IOFactory.php';
$conn=mysqli_connect("localhost","fascalab_2020","w]zYV6X9{*BN","fascalab_2020");
$id = $_GET['pr_no'];

$sql = mysqli_query($conn, "SELECT * FROM pr WHERE  pr_no = '$id' ");
$row = mysqli_fetch_array($sql);
$pr_no = $row['pr_no'];
$pmo = $row['pmo'];
$purpose = $row['purpose'];
$pr_date = $row['pr_date'];

$fad = ['10', '11', '12', '13', '14', '15', '16'];
$ord = ['1', '2', '3', '5'];
$lgmed = ['7', '18'];
$lgcdd = ['8', '9', '17'];
$cavite = ['20', '34', '35', '36', '45'];
$laguna = ['21', '40', '41', '42', '47', '51', '52'];
$batangas = ['19', '28', '29', '30', '44'];
$rizal = ['23', '37', '38', '39', '46', '50'];
$quezon = ['22', '31', '32', '33', '48', '49', '53'];
$lucena_city = ['24'];
if (in_array($pmo, $fad)) {
  $pmo = 'FAD';
} else if (in_array($pmo, $lgmed)) {
  $pmo = 'LGMED';
} else if (in_array($pmo, $lgcdd)) {
  $pmo = 'LGCDD';
} else if (in_array($pmo, $cavite)) {
  $pmo = 'CAVITE';
} else if (in_array($pmo, $laguna)) {
  $pmo = 'LAGUNA';
} else if (in_array($pmo, $batangas)) {
  $pmo = 'BATANGAS';
} else if (in_array($pmo, $rizal)) {
  $pmo = 'RIZAL';
} else if (in_array($pmo, $quezon)) {
  $pmo = 'QUEZON';
} else if (in_array($pmo, $lucena_city)) {
  $pmo = 'LUCENA CITY';
} else if (in_array($pmo, $ord)) {
  $pmo = 'ORD';
}


$sql_items = mysqli_query($conn, "SELECT a.sn,a.id,a.procurement,pr.description,pr.unit,pr.qty,pr.abc FROM pr_items pr left join app a on a.id = pr.items WHERE pr.pr_no = '$pr_no' ");
if (mysqli_num_rows($sql_items)>30) {
  
$objPHPExcel = PHPExcel_IOFactory::load("library/export_pr15.xlsx");
}else{
$objPHPExcel = PHPExcel_IOFactory::load("library/export_pr.xlsx");
}
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

$styleHeader = array('font'  => array('bold'  => true, 'size'  => 11, 'name'  => 'Calibri'),'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER));

 $styleLabel = array('font'  => array('size'  => 11, 'name'  => 'Calibri'),'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT));



$d1 = date('F d, Y', strtotime($pr_date));

$objPHPExcel->setActiveSheetIndex()->setCellValue('B7',$pmo);
$objPHPExcel->setActiveSheetIndex()->setCellValue('C7','PR No.:  '.$pr_no);
if($pr_date == '0000-00-00'){
$objPHPExcel->setActiveSheetIndex()->setCellValue('F7',"");  

}
else{
  

$objPHPExcel->setActiveSheetIndex()->setCellValue('E7',$d1);  
}

$totalcount = mysqli_query($conn, "SELECT sum(pr.qty) as first ,sum(pr.abc) as second FROM pr_items pr left join app a on a.id = pr.items WHERE pr.pr_no = '$pr_no' "); 



 
$row = 11;
$rowA = 12;
$rowB = 13;
$rowC = 14;
$rowD = 15;
$rowE = 16;

while($excelrow = mysqli_fetch_assoc($sql_items) ){

$unit = $excelrow['unit'];


// if ($unit == "1") {
//   $unit = "piece";
// }

// if ($unit == "2") {
//   $unit = "box";
// }

// if ($unit == "3") {
//   $unit = "ream";
// }

// if ($unit == "4") {
//   $unit = "lot";
// }

// if ($unit == "5") {
//   $unit = "unit";
// }

// if ($unit == "6") {
//   $unit = "crtg";
// }

// if ($unit == "7") {
//   $unit = "pack";
// }
// if ($unit == "8") {
//   $unit = "tube";
// }

// if ($unit == "9") {
//   $unit= "roll";
// }

// if ($unit == "10") {
//   $unit = "can";
// }

// if ($unit == "11") {
//   $unit = "bottle";
// }

// if ($unit == "12") {
//   $unit = "set";
// }

// if ($unit == "13") {
//   $unit = "jar";
// }

// if ($unit == "14") {
//   $unit = "bundle";
// }

// if ($unit == "15") {
//   $unit = "pad";
// }

// if ($unit == "16") {
//   $unit = "book";
// }

// if ($unit == "17") {
//   $unit = "pouch";
// }

// if ($unit == "18") {
//   $unit = "dozen";
// }

// if ($unit== "19") {
//   $unit = "pair";
// }

// if ($unit == "20") {
//   $unit = "gallon";
// }
// if ($unit == "21") {
//   $unit = "cart";
// }

// if ($unit == "22") {
//   $unit = "pax";
// }
// if ($unit == "23") {
//   $unit = "liters";
// }
// if ($unit == "24") {
//   $unit = "meters";
// }
    $total = $excelrow['qty']*$excelrow['abc'];

    $objPHPExcel->setActiveSheetIndex()->setCellValue('A'.$row,$excelrow['sn']);
    $objPHPExcel->setActiveSheetIndex()->setCellValue('B'.$row,$unit);

    $objPHPExcel->getActiveSheet()->getRowDimension($row)->setRowHeight(-1);
    $objPHPExcel->setActiveSheetIndex()->setCellValue('C'.$row,$excelrow['procurement'] ."\n\n".$excelrow['description']);
    $objPHPExcel->setActiveSheetIndex()->setCellValue('D'.$row,$excelrow['qty']);
    $objPHPExcel->setActiveSheetIndex()->setCellValue('E'.$row,'₱'.number_format($excelrow['abc'],2));
    $objPHPExcel->setActiveSheetIndex()->setCellValue('F'.$row,'₱'.number_format($total,2));
   
  
    $objPHPExcel->getActiveSheet()->getProtection()->setSheet(true);
    $objPHPExcel->getActiveSheet()->getProtection()->setSort(true);
    $objPHPExcel->getActiveSheet()->getProtection()->setInsertRows(true);
    $objPHPExcel->getActiveSheet()->getProtection()->setFormatCells(true);
       

    $objPHPExcel->getActiveSheet()->getProtection()->setPassword('icandothis');

$total_abc += $total;

    
    $row++;
    $rowA++;
    $rowB++;
    $rowC++;
    $rowD++;
    $rowE++;
  }
  $objPHPExcel->setActiveSheetIndex()->setCellValue('F35','₱'.number_format($total_abc,2));


  
  $sql = mysqli_query($conn,"SELECT pr.purpose,pr.pmo,pmo.pmo_contact_person,pmo.designation FROM pr left join pmo on pmo.id = pr.pmo WHERE pr.pr_no = '$id' ");
$rowP = mysqli_fetch_array($sql);
$pmo_contact_person = $rowP['pmo_contact_person'];

$designation = $rowP['designation'];
if (mysqli_num_rows($sql_items)>30) {
  $objPHPExcel->setActiveSheetIndex()->setCellValue('B59',$purpose);
$objPHPExcel->setActiveSheetIndex()->setCellValue('B65',strtoupper($pmo_contact_person));
$objPHPExcel->setActiveSheetIndex()->setCellValue('B66',$designation);
}else{
$objPHPExcel->setActiveSheetIndex()->setCellValue('B36',$purpose);
$objPHPExcel->setActiveSheetIndex()->setCellValue('B42',strtoupper($pmo_contact_person));
$objPHPExcel->setActiveSheetIndex()->setCellValue('B43',$designation);
}



$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save(str_replace('.php', '.xlsx', __FILE__));
header('location: export_pr.xlsx');


// $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
// $objWriter->save(str_replace('.php', '.xlsx', __FILE__));
// // header('location: 'export_dtr.xlsx');

// header('Content-type: application/vnd.ms-excel');
// header('Content-Disposition: attachment; filename="PR-NO-'.$id.'.xlsx"');
// header('Cache-Control: max-age=0');

// $objWriter->save('php://output'); 
?>