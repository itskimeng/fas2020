<?php
define('EOL',(PHP_SAPI == 'cli') ? PHP_EOL : '<br />');
require_once 'library/PHPExcel/Classes/PHPExcel/IOFactory.php';
$objPHPExcel = PHPExcel_IOFactory::load("library/export_abstract2.xlsx");
define('FORMAT_CURRENCY_PHP', '₱#,##0.00_-');

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

$border = array('borders' => array('allborders' => array('style' => PHPExcel_Style_Border::BORDER_MEDIUM, 'color' => array( 'rgb' => '6a6d6d'))));

$SelectedStyle = array(
            'font'  => array('size'  => 11, 'name'  => 'Cambria'),
            'fill' => array('type' => PHPExcel_Style_Fill::FILL_SOLID,'color' => array('rgb' => 'd9edf7'))
        );
$SelectedStyleG = array(
            'font'  => array('size'  => 11, 'name'  => 'Cambria','bold'  => true),
            'fill' => array('type' => PHPExcel_Style_Fill::FILL_SOLID,'color' => array('rgb' => 'd9edf7'))
        );

 $styleBoldRed = array(
  'font'  => array('bold'  => true, 'size'  => 11, 'name'  => 'Cambria', 'color' => array('rgb' => 'ff0000')),'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_RIGHT),
'fill' => array('type' => PHPExcel_Style_Fill::FILL_SOLID,'color' => array('rgb' => 'd9edf7'))
);

$styleContent77 = array('font'  => array('bold'  => true,'size'  => 10, 'name'  => 'Cambria'),'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT));
$styleContent = array('font'  => array('bold'  => false,'size'  => 11, 'name'  => 'Cambria'),'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT));
$styleContent18 = array('font'  => array('bold'  => false,'size'  => 11, 'name'  => 'Cambria'),'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER));
// $styleContent2 = array('font'  => array('bold'  => true,'size'  => 11, 'name'  => 'Cambria'));
$styleContent2 = array('font'  => array('bold'  => true, 'size'  => 11, 'name'  => 'Cambria'),'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER));
$styleContent24 = array('font'  => array('bold'  => true, 'size'  => 11, 'name'  => 'Cambria'),'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT));
$styleContent21 = array('font'  => array('size'  => 11, 'name'  => 'Cambria'),'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER));

$styleLabel = array('font'  => array('size'  => 11, 'name'  => 'Cambria'),'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT));

$ALIGNRIGHT = array('font'  => array('size'  => 11, 'name'  => 'Cambria'),'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_RIGHT));

$GrayStyle = array(
            'font'  => array('bold'  => true,'size'  => 11, 'name'  => 'Cambria'),
            'fill' => array('type' => PHPExcel_Style_Fill::FILL_SOLID,'color' => array('rgb' => 'D3D3D3'))
        );

$styleSam = array('font'  => array('size'  => 11, 'name'  => 'Cambria'),'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT));

$setCenter = array(
  'font'  => array(
    'bold' => true,
    'size'  => 18, 
    'name'  => 'Cambria'
  ),
  'alignment' => array(
      'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
  )
);

$setFont = array(
  'font'  => array(
    'bold' => true,
    'size'  => 11, 
    'name'  => 'Cambria'
  ),
);

$setFontnotBold = array(
  'font'  => array(
    'bold' => false,
    'size'  => 12, 
    'name'  => 'Cambria'
  ),
);





$conn=mysqli_connect("localhost","fascalab_2020","w]zYV6X9{*BN","fascalab_2020");
$rfq_id = $_GET['rfq_id'];
$abstract_id = $_GET['abstract_no'];

$top_content1 = mysqli_query($conn,"SELECT abstract_no FROM abstract_of_quote WHERE rfq_id = $rfq_id AND abstract_no IS NOT NULL");
$roT = mysqli_fetch_array($top_content1);
$rotabsno = $roT['abstract_no'];

$select_tc = mysqli_query($conn,"SELECT datetime_created FROM aoq_data WHERE id = $rotabsno");
$rowtc = mysqli_fetch_array($select_tc);
$rtcdate = $rowtc['datetime_created'];
$date1 = date('F d, Y',strtotime($rtcdate));
$date2 = date('h:i a',strtotime($rtcdate));

// $abs_date = date("Y-m-d\TH:i:s",strtotime($abs_date1));


$objPHPExcel->setActiveSheetIndex()->setCellValue('J9','For the quotation opened on'.' '.$date1.' '.'at'.' '.$date2);


$header_content = mysqli_query($conn,"SELECT mop.mode_of_proc_title,rfq.rfq_no,rfq.rfq_date,pr.pr_no,pr.pmo,pr.pr_date,pr.purpose FROM rfq LEFT JOIN rfq_items rq on rq.rfq_id = rfq.id LEFT JOIN pr on pr.pr_no = rfq.pr_no LEFT JOIN mode_of_proc mop on mop.id = rfq.rfq_mode_id WHERE rfq.id = $rfq_id");
$hc = mysqli_fetch_array($header_content);
$mode_of_proc_title = $hc['mode_of_proc_title'];
$rfq_no = $hc['rfq_no'];
$rfq_date1 = $hc['rfq_date'];
$rfq_date = date('F d, Y',strtotime($rfq_date1));
$pr_no = $hc['pr_no'];
$pmo = $hc['pmo'];
$pr_date1 = $hc['pr_date'];
$pr_date = date('F d, Y',strtotime($pr_date1));
$purpose = $hc['purpose'];

$objPHPExcel->setActiveSheetIndex()->setCellValue('I10',$pr_no);
$objPHPExcel->setActiveSheetIndex()->setCellValue('I11',$rfq_no);
$objPHPExcel->setActiveSheetIndex()->setCellValue('L10',$pr_date);
$objPHPExcel->setActiveSheetIndex()->setCellValue('L11',$rfq_date);
$objPHPExcel->setActiveSheetIndex()->setCellValue('L12',$pmo);
$objPHPExcel->setActiveSheetIndex()->setCellValue('P10',$mode_of_proc_title);
$objPHPExcel->setActiveSheetIndex()->setCellValue('P11',$purpose);


$sql = mysqli_query($conn, "SELECT rq.id,app.procurement,rq.description,rq.qty,rq.abc,iu.item_unit_title FROM rfq_items rq LEFT JOIN app on app.id = rq.app_id LEFT JOIN item_unit iu on iu.id = rq.unit_id WHERE rfq_id = '$rfq_id' ");
$row = mysqli_fetch_array($sql);
$rid = $row['id'];
$procurement = $row['procurement'];
$description = $row['description'];
$qty = $row['qty'];
$abc = $row['abc'];
$item_unit_title = $row['item_unit_title'];

$all_selected_suppliers1 = mysqli_query($conn, "SELECT count(*) as 'count_supplier', s.id,rq.rfq_id,sq.id,s.id as sid,s.supplier_title,s.supplier_address,s.contact_details,s.remarks FROM supplier s LEFT JOIN supplier_quote sq on sq.supplier_id = s.id LEFT JOIN rfq_items rq on rq.id = sq.rfq_item_id WHERE sq.rfq_item_id = $rid  ");
$count_supplier = '';
while ($allS = mysqli_fetch_assoc($all_selected_suppliers1)) {
  $Asupplier[] = $allS['sid'];
  $count_supplier = $allS['count_supplier'];
}


$implode = implode(',', $Asupplier);


$abc_for_winner = mysqli_query($conn,"SELECT supplier_id FROM abstract_of_quote WHERE supplier_id in($implode) AND rfq_id = $rfq_id AND abstract_no IS NOT NULL");
$abcrow = mysqli_fetch_array($abc_for_winner);
$win_id = $abcrow['supplier_id'];

$winneryey = mysqli_query($conn,"SELECT supplier_title FROM supplier WHERE id = $win_id");
$rowWinY = mysqli_fetch_array($winneryey);
$WinSupply = $rowWinY['supplier_title'];
echo $WinSupply;
exit();

$select_rfqitems = mysqli_query($conn,"SELECT id FROM rfq_items WHERE rfq_id = $rfq_id");
while ($rfqitems = mysqli_fetch_assoc($select_rfqitems)) {
  $rfq_items_id_abc[] = $rfqitems['id'];
}
$implode2 = implode(',', $rfq_items_id_abc);

// $select_tots = mysqli_query($conn,"SELECT sum(ppu*qty) as ABCtots FROM supplier_quote sq LEFT JOIN rfq_items rq on rq.id = sq.rfq_item_id WHERE rfq_item_id in($implode2) AND supplier_id = $win_id");

$view_query1 = mysqli_query($conn, "SELECT  sum(abc*qty) as aa from pr_items WHERE pr_no = '$pr_no' ");
            $rowppu = mysqli_fetch_array($view_query1);
            $abc12 = $rowppu["aa"];
            $tot = number_format($abc12,2);
// while($rowppu = mysqli_fetch_array($select_tots)){
    // $ABCtots = $rowppu['ABCtots'];
$objPHPExcel->getActiveSheet()->getStyle('C12')->getNumberFormat()->setFormatCode(FORMAT_CURRENCY_PHP);
$objPHPExcel->setActiveSheetIndex()->setCellValue('I12',$abc12);

// }












// ============///////////////////////////////////////////////////////////////////////      WIN 1        ///////////////////////////////////
$suppliers1 = mysqli_query($conn, "SELECT s.id,rq.rfq_id,sq.id,s.id as sid,s.supplier_title,s.supplier_address,s.contact_details,s.remarks FROM supplier s LEFT JOIN supplier_quote sq on sq.supplier_id = s.id LEFT JOIN rfq_items rq on rq.id = sq.rfq_item_id WHERE sq.rfq_item_id = $rid  ");
$rowS1 = mysqli_fetch_assoc($suppliers1);
$supplier_title1 = $rowS1['supplier_title'];
$sid1 = $rowS1['sid'];

$select_ifwin1 = mysqli_query($conn,"SELECT abstract_no FROM abstract_of_quote WHERE supplier_id = $sid1 AND rfq_id = $rfq_id");
$rowWin1 = mysqli_fetch_array($select_ifwin1);
$rowabsno1 = $rowWin1['abstract_no'];


if ($rowabsno1 != NULL) {
  $objPHPExcel->getActiveSheet()->getStyle('I14')->applyFromArray($SelectedStyle);
  $objPHPExcel->getActiveSheet()->getStyle('I15')->applyFromArray($SelectedStyle);
  $objPHPExcel->getActiveSheet()->getStyle('J15')->applyFromArray($SelectedStyle);
}
$objPHPExcel->setActiveSheetIndex()->setCellValue('I14',$supplier_title1);
//==============///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



//=============///////////////////////////////////////////////////////////////////////     WIN 2     ////////////////////////////////////////////////////////////////////////////////////////
$suppliers2 = mysqli_query($conn, "SELECT s.id,rq.rfq_id,sq.id,s.id as sid,s.supplier_title,s.supplier_address,s.contact_details,s.remarks FROM supplier s LEFT JOIN supplier_quote sq on sq.supplier_id = s.id LEFT JOIN rfq_items rq on rq.id = sq.rfq_item_id WHERE sq.rfq_item_id = $rid  AND s.supplier_title != '$supplier_title1' ");
$rowS2 = mysqli_fetch_assoc($suppliers2);
$supplier_title2 = $rowS2['supplier_title'];
$sid2 = $rowS2['sid'];


$select_ifwin2 = mysqli_query($conn,"SELECT abstract_no FROM abstract_of_quote WHERE supplier_id = $sid2 AND rfq_id = $rfq_id");
$rowWin2 = mysqli_fetch_array($select_ifwin2);
$rowabsno2 = $rowWin2['abstract_no'];



if ($rowabsno2 != NULL) {
  $objPHPExcel->getActiveSheet()->getStyle('K14')->applyFromArray($SelectedStyle);
  $objPHPExcel->getActiveSheet()->getStyle('K15')->applyFromArray($SelectedStyle);
  $objPHPExcel->getActiveSheet()->getStyle('L15')->applyFromArray($SelectedStyle);
}

$objPHPExcel->setActiveSheetIndex()->setCellValue('K14',$supplier_title2);
//====================//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//====================////////////////////////////////////////////////////////////////////   WIN 3 ///////////////////////////////////////////////////////////////////////////////////////////////////////////////
$suppliers3 = mysqli_query($conn, "SELECT s.id,rq.rfq_id,sq.id,s.id as sid,s.supplier_title,s.supplier_address,s.contact_details,s.remarks FROM supplier s LEFT JOIN supplier_quote sq on sq.supplier_id = s.id LEFT JOIN rfq_items rq on rq.id = sq.rfq_item_id WHERE sq.rfq_item_id = $rid  AND s.supplier_title != '$supplier_title1' AND s.supplier_title != '$supplier_title2' ");
$rowS3 = mysqli_fetch_assoc($suppliers3);
$supplier_title3 = $rowS3['supplier_title'];
$sid3 = $rowS3['sid'];

$select_ifwin3 = mysqli_query($conn,"SELECT abstract_no FROM abstract_of_quote WHERE supplier_id = $sid3 AND rfq_id = $rfq_id");
$rowWin3 = mysqli_fetch_array($select_ifwin3);
$rowabsno3 = $rowWin3['abstract_no'];



if ($rowabsno3 != NULL) {
  $objPHPExcel->getActiveSheet()->getStyle('M14')->applyFromArray($SelectedStyle);
  $objPHPExcel->getActiveSheet()->getStyle('M15')->applyFromArray($SelectedStyle);
  $objPHPExcel->getActiveSheet()->getStyle('N15')->applyFromArray($SelectedStyle);
}

$objPHPExcel->setActiveSheetIndex()->setCellValue('M14',$supplier_title3);
//=================///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  //=============///////////////////////////////////////////////////////////////////////     WIN 4     ////////////////////////////////////////////////////////////////////////////////////////
  $suppliers4 = mysqli_query($conn, "SELECT s.id,rq.rfq_id,sq.id,s.id as sid,s.supplier_title,s.supplier_address,s.contact_details,s.remarks FROM supplier s LEFT JOIN supplier_quote sq on sq.supplier_id = s.id LEFT JOIN rfq_items rq on rq.id = sq.rfq_item_id WHERE sq.rfq_item_id = $rid  AND s.supplier_title != '$supplier_title1' AND s.supplier_title != '$supplier_title2' AND s.supplier_title != '$supplier_title3'");
  $rowS4 = mysqli_fetch_assoc($suppliers4);
  $supplier_title4 = $rowS4['supplier_title'];
  $sid4 = $rowS4['sid'];


  $select_ifwin4 = mysqli_query($conn,"SELECT abstract_no FROM abstract_of_quote WHERE supplier_id = $sid4 AND rfq_id = $rfq_id");
  $rowWin4 = mysqli_fetch_array($select_ifwin4);
  $rowabsno4 = $rowWin4['abstract_no'];



  if ($rowabsno4 != NULL) {
    $objPHPExcel->getActiveSheet()->getStyle('I14')->applyFromArray($SelectedStyle);
    $objPHPExcel->getActiveSheet()->getStyle('I15')->applyFromArray($SelectedStyle);
    $objPHPExcel->getActiveSheet()->getStyle('J15')->applyFromArray($SelectedStyle);
  }

  $objPHPExcel->setActiveSheetIndex()->setCellValue('O14',$supplier_title4);
  $objPHPExcel->getActiveSheet()->mergeCells("O14:P14");
  //====================//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  //=============///////////////////////////////////////////////////////////////////////     WIN 5     ////////////////////////////////////////////////////////////////////////////////////////
  $suppliers5 = mysqli_query($conn, "SELECT s.id,rq.rfq_id,sq.id,s.id as sid,s.supplier_title,s.supplier_address,s.contact_details,s.remarks FROM supplier s LEFT JOIN supplier_quote sq on sq.supplier_id = s.id LEFT JOIN rfq_items rq on rq.id = sq.rfq_item_id WHERE sq.rfq_item_id = $rid  AND s.supplier_title != '$supplier_title1' AND s.supplier_title != '$supplier_title2' AND s.supplier_title != '$supplier_title3' AND s.supplier_title != '$supplier_title4'");
  $rowS5 = mysqli_fetch_assoc($suppliers5);
  $supplier_title5 = $rowS5['supplier_title'];
  $sid5 = $rowS5['sid'];


  $select_ifwin5 = mysqli_query($conn,"SELECT abstract_no FROM abstract_of_quote WHERE supplier_id = $sid5 AND rfq_id = $rfq_id");
  $rowWin5 = mysqli_fetch_array($select_ifwin5);
  $rowabsno5 = $rowWin5['abstract_no'];



  if ($rowabsno5 != NULL) {
    $objPHPExcel->getActiveSheet()->getStyle('Q14')->applyFromArray($SelectedStyle);
    $objPHPExcel->getActiveSheet()->getStyle('Q15')->applyFromArray($SelectedStyle);
    $objPHPExcel->getActiveSheet()->getStyle('R15')->applyFromArray($SelectedStyle);
  }

  $objPHPExcel->setActiveSheetIndex()->setCellValue('Q14',$supplier_title5);
  $objPHPExcel->getActiveSheet()->mergeCells("Q14:R14");
  //====================//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  //=============///////////////////////////////////////////////////////////////////////     WIN 6     ////////////////////////////////////////////////////////////////////////////////////////
  $suppliers6 = mysqli_query($conn, "SELECT s.id,rq.rfq_id,sq.id,s.id as sid,s.supplier_title,s.supplier_address,s.contact_details,s.remarks FROM supplier s LEFT JOIN supplier_quote sq on sq.supplier_id = s.id LEFT JOIN rfq_items rq on rq.id = sq.rfq_item_id WHERE sq.rfq_item_id = $rid  AND s.supplier_title != '$supplier_title1' AND s.supplier_title != '$supplier_title2' AND s.supplier_title != '$supplier_title3' AND s.supplier_title != '$supplier_title4'  AND s.supplier_title != '$supplier_title5'");
  $rowS6 = mysqli_fetch_assoc($suppliers6);
  $supplier_title6 = $rowS6['supplier_title'];
  $sid6 = $rowS6['sid'];


  $select_ifwin6 = mysqli_query($conn,"SELECT abstract_no FROM abstract_of_quote WHERE supplier_id = $sid6 AND rfq_id = $rfq_id");
  $rowWin6 = mysqli_fetch_array($select_ifwin6);
  $rowabsno6 = $rowWin6['abstract_no'];



  if ($rowabsno6 != NULL) {
    $objPHPExcel->getActiveSheet()->getStyle('S14')->applyFromArray($SelectedStyle);
    $objPHPExcel->getActiveSheet()->getStyle('S15')->applyFromArray($SelectedStyle);
    $objPHPExcel->getActiveSheet()->getStyle('T15')->applyFromArray($SelectedStyle);
  }

  $objPHPExcel->setActiveSheetIndex()->setCellValue('S14',$supplier_title6);
  $objPHPExcel->getActiveSheet()->mergeCells("S14:T14");
  //====================//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


///  IF SUPPLIER IS GREATER THAN 3, TURN INTO NEXT SHEET ////////////////////


$rowOne = 16;
$rowA = 18;
$rowB = 19;
$rowB1 = 20;
$rowB11 = 22;
$rowC = 25;
$rowD = 26;
$rowE = 30;
$rowF = 31;
$rowG = 33;
$rowH = 34;
$rowI = 35;
$itemno = 1;

$sql_items = mysqli_query($conn, "SELECT rq.id,app.procurement,rq.description,rq.qty,rq.abc,iu.item_unit_title FROM rfq_items rq LEFT JOIN app on app.id = rq.app_id LEFT JOIN item_unit iu on iu.id = rq.unit_id WHERE rfq_id = '$rfq_id' ");

while($excelrow = mysqli_fetch_assoc($sql_items) ){
  $rid = $excelrow['id'];
  $procurement = $excelrow['procurement'];
  $description = $excelrow['description'];
  $qtyL = $excelrow['qty'];
  $abc = $excelrow['abc'];
  $item_unit_title = $excelrow['item_unit_title'];
  $str = strlen($procurement);
  // $unit = $excelrow['unit'];

  $objPHPExcel->getActiveSheet()->mergeCells('B'.$rowOne.':'.'E'.$rowOne);

  if($str >= 37)
  {
    $objPHPExcel->getActiveSheet()->getRowDimension($rowOne)->setRowHeight(30);
  } else{
    $objPHPExcel->getActiveSheet()->getRowDimension($rowOne)->setRowHeight(19);

  }
  $objPHPExcel->getDefaultStyle()->getAlignment()->setWrapText(true);
  $objPHPExcel->getActiveSheet()->getStyle('B'.$rowOne.':'.'E'.$rowOne)->getAlignment()->setWrapText(true); 


  $objPHPExcel->getActiveSheet()->getStyle('A'.$rowOne.':'.'E'.$rowOne)->applyFromArray($border);

  $objPHPExcel->getActiveSheet()->getStyle('A'.$rowOne)->applyFromArray($styleContent18);
  $objPHPExcel->setActiveSheetIndex()->setCellValue('A'.$rowOne,$itemno);
  $objPHPExcel->getActiveSheet()->getStyle('B'.$rowOne)->applyFromArray($styleContent);
  $objPHPExcel->setActiveSheetIndex()->setCellValue('B'.$rowOne,$excelrow['procurement']);
  $objPHPExcel->getActiveSheet()->getStyle('F'.$rowOne)->applyFromArray($styleContent);
  $objPHPExcel->getActiveSheet()->getStyle('F'.$rowOne)->applyFromArray($border);
  $objPHPExcel->setActiveSheetIndex()->setCellValue('F'.$rowOne,$excelrow['qty']);
  $objPHPExcel->getActiveSheet()->getStyle('G'.$rowOne)->applyFromArray($border);
  $objPHPExcel->getActiveSheet()->getStyle('G'.$rowOne)->applyFromArray($styleContent);
  $objPHPExcel->setActiveSheetIndex()->setCellValue('G'.$rowOne,$item_unit_title);
  $objPHPExcel->getActiveSheet()->getStyle('H'.$rowOne)->applyFromArray($border);
  $objPHPExcel->getActiveSheet()->getStyle('F'.$rowOne)->applyFromArray($styleContent);
  $objPHPExcel->getActiveSheet()->getStyle('F'.$rowOne)->applyFromArray($ALIGNRIGHT);
  $objPHPExcel->getActiveSheet()->getStyle('G'.$rowOne)->applyFromArray($styleContent);
  $objPHPExcel->getActiveSheet()->getStyle('G'.$rowOne)->applyFromArray($ALIGNRIGHT);
  $objPHPExcel->getActiveSheet()->getStyle('H'.$rowOne)->applyFromArray($styleContent);
  $objPHPExcel->getActiveSheet()->getStyle('H'.$rowOne)->applyFromArray($ALIGNRIGHT);
  $objPHPExcel->setActiveSheetIndex()->setCellValue('H'.$rowOne,number_format($excelrow['abc'],2));

  $rowOne++;
  $itemno++;
  $rowA++;
  $rowB++;
  $rowB1++;
  $rowB11++;
  $rowC++;
  $rowD++;
  $rowE++;
  $rowF++;
  $rowG++;
  $rowH++;
  $rowI++;
}


$rowFirst = 16;

$select_rfid1 = mysqli_query($conn,"SELECT ppu,qty FROM supplier_quote sq LEFT JOIN rfq_items rq on rq.id = sq.rfq_item_id WHERE sq.supplier_id = $sid1 AND rq.rfq_id = $rfq_id");
while ($rowrfid1 = mysqli_fetch_assoc($select_rfid1)) 
{
    $ppu1 = $rowrfid1['ppu'];
    $qty1 = $rowrfid1['qty'];
    $price_per_item1 = $ppu1 * $qty1;

    if ($rowabsno1 != NULL) {
    $objPHPExcel->getActiveSheet()->getStyle('I'.$rowFirst)->applyFromArray($SelectedStyle);
    $objPHPExcel->getActiveSheet()->getStyle('J'.$rowFirst)->applyFromArray($SelectedStyle);
  }
    $objPHPExcel->getActiveSheet()->getStyle('I'.$rowFirst)->applyFromArray($border);
    $objPHPExcel->getActiveSheet()->getStyle('J'.$rowFirst)->applyFromArray($border);
    $objPHPExcel->getActiveSheet()->getStyle('I'.$rowFirst)->applyFromArray($styleContent);
    $objPHPExcel->getActiveSheet()->getStyle('J'.$rowFirst)->applyFromArray($styleContent);
    $objPHPExcel->setActiveSheetIndex()->setCellValue('I'.$rowFirst,number_format($ppu1,2));
    $objPHPExcel->getActiveSheet()->getStyle('I'.$rowFirst)->applyFromArray($ALIGNRIGHT);
    $objPHPExcel->getActiveSheet()->getStyle('J'.$rowFirst)->applyFromArray($ALIGNRIGHT);
    $objPHPExcel->setActiveSheetIndex()->setCellValue('J'.$rowFirst,number_format($price_per_item1,2));
    $rowFirst++;


}

$select_tots_per_sup = mysqli_query($conn,"SELECT sum(ppu*qty) as totalABCperItem FROM supplier_quote sq LEFT JOIN rfq_items rq on rq.id = sq.rfq_item_id WHERE sq.supplier_id = $sid1 AND rq.id in($implode2)");
$tots_sup = mysqli_fetch_array($select_tots_per_sup);
$totalABCperItem = $tots_sup['totalABCperItem'];
  $objPHPExcel->getActiveSheet()->mergeCells('A'.$rowFirst.':'.'H'.$rowFirst);
  $objPHPExcel->getActiveSheet()->getStyle('A'.$rowFirst.':'.'H'.$rowFirst)->applyFromArray($border);
  $objPHPExcel->setActiveSheetIndex()->setCellValue('I'.$rowFirst,'GRANDTOTAL');
  $objPHPExcel->getActiveSheet()->getStyle('I'.$rowFirst)->applyFromArray($border);
  $objPHPExcel->getActiveSheet()->getStyle('J'.$rowFirst)->applyFromArray($styleContent);
  $objPHPExcel->getActiveSheet()->getStyle('J'.$rowFirst)->applyFromArray($ALIGNRIGHT);
  $objPHPExcel->getActiveSheet()->getStyle('I'.$rowFirst)->applyFromArray($ALIGNRIGHT);
  $objPHPExcel->setActiveSheetIndex()->setCellValue('J'.$rowFirst,number_format($totalABCperItem,2));
  $objPHPExcel->getActiveSheet()->getStyle('J'.$rowFirst)->applyFromArray($border);


if ($rowabsno1 != NULL) {
  $objPHPExcel->getActiveSheet()->getStyle('I'.$rowFirst)->applyFromArray($SelectedStyleG);
  $objPHPExcel->getActiveSheet()->getStyle('J'.$rowFirst)->applyFromArray($styleBoldRed);
}else{
  $objPHPExcel->getActiveSheet()->getStyle('I'.$rowFirst)->applyFromArray($GrayStyle);
}


$rowsecond = 16;

$select_rfid2 = mysqli_query($conn,"SELECT ppu,qty FROM supplier_quote sq LEFT JOIN rfq_items rq on rq.id = sq.rfq_item_id WHERE sq.supplier_id = $sid2 AND rq.rfq_id = $rfq_id");
while ($rowrfid2 = mysqli_fetch_assoc($select_rfid2)) {
  $ppu2 = $rowrfid2['ppu'];
  $qty2 = $rowrfid2['qty'];
  $price_per_item2 = $ppu2 * $qty2;
  if ($rowabsno2 != NULL) {
  $objPHPExcel->getActiveSheet()->getStyle('K'.$rowsecond)->applyFromArray($SelectedStyle);
  $objPHPExcel->getActiveSheet()->getStyle('L'.$rowsecond)->applyFromArray($SelectedStyle);
}
  $objPHPExcel->getActiveSheet()->getStyle('K'.$rowsecond)->applyFromArray($border);
  $objPHPExcel->getActiveSheet()->getStyle('L'.$rowsecond)->applyFromArray($border);
  $objPHPExcel->getActiveSheet()->getStyle('K'.$rowsecond)->applyFromArray($styleContent);
  $objPHPExcel->getActiveSheet()->getStyle('L'.$rowsecond)->applyFromArray($styleContent);
  $objPHPExcel->getActiveSheet()->getStyle('K'.$rowsecond)->applyFromArray($ALIGNRIGHT);
  $objPHPExcel->setActiveSheetIndex()->setCellValue('K'.$rowsecond,number_format($ppu2,2));
  $objPHPExcel->getActiveSheet()->getStyle('L'.$rowsecond)->applyFromArray($ALIGNRIGHT);
  $objPHPExcel->setActiveSheetIndex()->setCellValue('L'.$rowsecond,number_format($price_per_item2,2));
  $rowsecond++;

}

$select_tots_per_sup2 = mysqli_query($conn,"SELECT sum(ppu*qty) as totalABCperItem FROM supplier_quote sq LEFT JOIN rfq_items rq on rq.id = sq.rfq_item_id WHERE sq.supplier_id = $sid2 AND rq.id in($implode2)");
$tots_sup2 = mysqli_fetch_array($select_tots_per_sup2);
$totalABCperItem2 = $tots_sup2['totalABCperItem'];
  $objPHPExcel->setActiveSheetIndex()->setCellValue('K'.$rowsecond,'GRANDTOTAL');
  $objPHPExcel->getActiveSheet()->getStyle('K'.$rowsecond)->applyFromArray($border);
  $objPHPExcel->getActiveSheet()->getStyle('L'.$rowsecond)->applyFromArray($styleContent);
  $objPHPExcel->getActiveSheet()->getStyle('L'.$rowsecond)->applyFromArray($ALIGNRIGHT);
  $objPHPExcel->setActiveSheetIndex()->setCellValue('L'.$rowsecond,number_format($totalABCperItem2,2));
  $objPHPExcel->getActiveSheet()->getStyle('L'.$rowsecond)->applyFromArray($border);

if ($rowabsno2 != NULL) {
  $objPHPExcel->getActiveSheet()->getStyle('K'.$rowsecond)->applyFromArray($SelectedStyleG);
  $objPHPExcel->getActiveSheet()->getStyle('L'.$rowsecond)->applyFromArray($styleBoldRed);
}else{
  $objPHPExcel->getActiveSheet()->getStyle('K'.$rowsecond)->applyFromArray($GrayStyle);
}


$rowthird = 16;

$select_rfid3 = mysqli_query($conn,"SELECT ppu,qty FROM supplier_quote sq LEFT JOIN rfq_items rq on rq.id = sq.rfq_item_id WHERE sq.supplier_id = $sid3 AND rq.rfq_id = $rfq_id");
while ($rowrfid3 = mysqli_fetch_assoc($select_rfid3)) {
  $ppu3 = $rowrfid3['ppu'];
  $qty3 = $rowrfid3['qty'];
  $price_per_item3 = $ppu3 * $qty3;
  if ($rowabsno3 != NULL) {
  $objPHPExcel->getActiveSheet()->getStyle('M'.$rowthird)->applyFromArray($SelectedStyle);
  $objPHPExcel->getActiveSheet()->getStyle('N'.$rowthird)->applyFromArray($SelectedStyle);
}
  $objPHPExcel->getActiveSheet()->getStyle('M'.$rowthird)->applyFromArray($border);
  $objPHPExcel->getActiveSheet()->getStyle('N'.$rowthird)->applyFromArray($border);
  $objPHPExcel->getActiveSheet()->getStyle('M'.$rowthird)->applyFromArray($styleContent);
  $objPHPExcel->getActiveSheet()->getStyle('N'.$rowthird)->applyFromArray($styleContent);
  $objPHPExcel->getActiveSheet()->getStyle('M'.$rowthird)->applyFromArray($ALIGNRIGHT);
  $objPHPExcel->setActiveSheetIndex()->setCellValue('M'.$rowthird,number_format($ppu3,2));
  $objPHPExcel->getActiveSheet()->getStyle('N'.$rowthird)->applyFromArray($ALIGNRIGHT);
  $objPHPExcel->setActiveSheetIndex()->setCellValue('N'.$rowthird,number_format($price_per_item3,2));
  $rowthird++;

}

$select_tots_per_sup3 = mysqli_query($conn,"SELECT sum(ppu*qty) as totalABCperItem FROM supplier_quote sq LEFT JOIN rfq_items rq on rq.id = sq.rfq_item_id WHERE sq.supplier_id = $sid3 AND rq.id in($implode2)");
$tots_sup3 = mysqli_fetch_array($select_tots_per_sup3);
$totalABCperItem3 = $tots_sup3['totalABCperItem'];

if ($rowabsno3 != NULL) {
  $objPHPExcel->getActiveSheet()->getStyle('M'.$rowthird)->applyFromArray($SelectedStyleG);
  $objPHPExcel->getActiveSheet()->getStyle('N'.$rowthird)->applyFromArray($styleBoldRed);
}else{
  $objPHPExcel->getActiveSheet()->getStyle('M'.$rowthird)->applyFromArray($GrayStyle);
  
}
$objPHPExcel->setActiveSheetIndex()->setCellValue('M'.$rowthird,'GRANDTOTAL');
$objPHPExcel->getActiveSheet()->getStyle('M'.$rowthird)->applyFromArray($border);
$objPHPExcel->getActiveSheet()->getStyle('N'.$rowthird)->applyFromArray($styleContent);
$objPHPExcel->getActiveSheet()->getStyle('N'.$rowthird)->applyFromArray($ALIGNRIGHT);
$objPHPExcel->setActiveSheetIndex()->setCellValue('N'.$rowthird,number_format($totalABCperItem3,2));
$objPHPExcel->getActiveSheet()->getStyle('N'.$rowthird)->applyFromArray($border);
//=====================================================================================================================================================
$rowfourth = 16;

$select_rfid4 = mysqli_query($conn,"SELECT ppu,qty FROM supplier_quote sq LEFT JOIN rfq_items rq on rq.id = sq.rfq_item_id WHERE sq.supplier_id = $sid4 AND rq.rfq_id = $rfq_id");
while ($rowrfid4 = mysqli_fetch_assoc($select_rfid4)) {
  $ppu4 = $rowrfid4['ppu'];
  $qty4 = $rowrfid4['qty'];
  $price_per_item4 = $ppu4 * $qty4;
  if ($rowabsno4 != NULL) {
  $objPHPExcel->getActiveSheet()->getStyle('O'.$rowfourth)->applyFromArray($SelectedStyle);
  $objPHPExcel->getActiveSheet()->getStyle('P'.$rowfourth)->applyFromArray($SelectedStyle);
}
  $objPHPExcel->getActiveSheet()->getStyle('O'.$rowfourth)->applyFromArray($border);
  $objPHPExcel->getActiveSheet()->getStyle('P'.$rowfourth)->applyFromArray($border);
  $objPHPExcel->getActiveSheet()->getStyle('O'.$rowfourth)->applyFromArray($styleContent);
  $objPHPExcel->getActiveSheet()->getStyle('P'.$rowfourth)->applyFromArray($styleContent);
  $objPHPExcel->getActiveSheet()->getStyle('O'.$rowfourth)->applyFromArray($ALIGNRIGHT);
  $objPHPExcel->setActiveSheetIndex()->setCellValue('O'.$rowfourth,number_format($ppu4,2));
  $objPHPExcel->getActiveSheet()->getStyle('P'.$rowfourth)->applyFromArray($ALIGNRIGHT);
  $objPHPExcel->setActiveSheetIndex()->setCellValue('P'.$rowfourth,number_format($price_per_item4,2));
  $rowfourth++;

}

$select_tots_per_sup4 = mysqli_query($conn,"SELECT sum(ppu*qty) as totalABCperItem FROM supplier_quote sq LEFT JOIN rfq_items rq on rq.id = sq.rfq_item_id WHERE sq.supplier_id = $sid4 AND rq.id in($implode2)");
$tots_sup4 = mysqli_fetch_array($select_tots_per_sup4);
$totalABCperItem4 = $tots_sup4['totalABCperItem'];

if ($rowabsno4 != NULL) {
  $objPHPExcel->getActiveSheet()->getStyle('O'.$rowfourth)->applyFromArray($SelectedStyleG);
  $objPHPExcel->getActiveSheet()->getStyle('P'.$rowfourth)->applyFromArray($styleBoldRed);
}else{
  $objPHPExcel->getActiveSheet()->getStyle('O'.$rowfourth)->applyFromArray($GrayStyle);
  
}
$objPHPExcel->setActiveSheetIndex()->setCellValue('O'.$rowfourth,'GRANDTOTAL');
$objPHPExcel->getActiveSheet()->getStyle('O'.$rowfourth)->applyFromArray($border);
$objPHPExcel->getActiveSheet()->getStyle('P'.$rowfourth)->applyFromArray($styleContent);
$objPHPExcel->getActiveSheet()->getStyle('P'.$rowfourth)->applyFromArray($ALIGNRIGHT);
$objPHPExcel->setActiveSheetIndex()->setCellValue('P'.$rowfourth,number_format($totalABCperItem4,2));
$objPHPExcel->getActiveSheet()->getStyle('P'.$rowfourth)->applyFromArray($border);
// =====================================================================================================================================================================================
//=====================================================================================================================================================
$rowfifth = 16;

$select_rfid5 = mysqli_query($conn,"SELECT ppu,qty FROM supplier_quote sq LEFT JOIN rfq_items rq on rq.id = sq.rfq_item_id WHERE sq.supplier_id = $sid5 AND rq.rfq_id = $rfq_id");
while ($rowrfid5 = mysqli_fetch_assoc($select_rfid5)) {
  $ppu5 = $rowrfid5['ppu'];
  $qty5 = $rowrfid5['qty'];
  $price_per_item5 = $ppu5 * $qty5;
  if ($rowabsno5 != NULL) {
  $objPHPExcel->getActiveSheet()->getStyle('Q'.$rowfifth)->applyFromArray($SelectedStyle);
  $objPHPExcel->getActiveSheet()->getStyle('R'.$rowfifth)->applyFromArray($SelectedStyle);
}
  $objPHPExcel->getActiveSheet()->getStyle('Q'.$rowfifth)->applyFromArray($border);
  $objPHPExcel->getActiveSheet()->getStyle('R'.$rowfifth)->applyFromArray($border);
  $objPHPExcel->getActiveSheet()->getStyle('Q'.$rowfifth)->applyFromArray($styleContent);
  $objPHPExcel->getActiveSheet()->getStyle('R'.$rowfifth)->applyFromArray($styleContent);
  $objPHPExcel->getActiveSheet()->getStyle('Q'.$rowfifth)->applyFromArray($ALIGNRIGHT);
  $objPHPExcel->setActiveSheetIndex()->setCellValue('Q'.$rowfifth,number_format($ppu5,2));
  $objPHPExcel->getActiveSheet()->getStyle('R'.$rowfifth)->applyFromArray($ALIGNRIGHT);
  $objPHPExcel->setActiveSheetIndex()->setCellValue('R'.$rowfifth,number_format($price_per_item5,2));
  $rowfifth++;

}

$select_tots_per_sup5= mysqli_query($conn,"SELECT sum(ppu*qty) as totalABCperItem FROM supplier_quote sq LEFT JOIN rfq_items rq on rq.id = sq.rfq_item_id WHERE sq.supplier_id = $sid5 AND rq.id in($implode2)");
$tots_sup5 = mysqli_fetch_array($select_tots_per_sup5);
$totalABCperItem5 = $tots_sup5['totalABCperItem'];

if ($rowabsno5 != NULL) {
  $objPHPExcel->getActiveSheet()->getStyle('Q'.$rowfifth)->applyFromArray($SelectedStyleG);
  $objPHPExcel->getActiveSheet()->getStyle('R'.$rowfifth)->applyFromArray($styleBoldRed);
}else{
  $objPHPExcel->getActiveSheet()->getStyle('Q'.$rowfifth)->applyFromArray($GrayStyle);
  
}
$objPHPExcel->setActiveSheetIndex()->setCellValue('Q'.$rowfifth,'GRANDTOTAL');
$objPHPExcel->getActiveSheet()->getStyle('Q'.$rowfifth)->applyFromArray($border);
$objPHPExcel->getActiveSheet()->getStyle('R'.$rowfifth)->applyFromArray($styleContent);
$objPHPExcel->getActiveSheet()->getStyle('R'.$rowfifth)->applyFromArray($ALIGNRIGHT);
$objPHPExcel->setActiveSheetIndex()->setCellValue('R'.$rowfifth,number_format($totalABCperItem5,2));
$objPHPExcel->getActiveSheet()->getStyle('R'.$rowfifth)->applyFromArray($border);
// =====================================================================================================================================================================================
//=====================================================================================================================================================
$rowsix = 16;

$select_rfid6 = mysqli_query($conn,"SELECT ppu,qty FROM supplier_quote sq LEFT JOIN rfq_items rq on rq.id = sq.rfq_item_id WHERE sq.supplier_id = $sid6 AND rq.rfq_id = $rfq_id");
while ($rowrfid6 = mysqli_fetch_assoc($select_rfid6)) {
  $ppu6 = $rowrfid6['ppu'];
  $qty6 = $rowrfid6['qty'];
  $price_per_item6 = $ppu6 * $qty6;
  if ($rowabsno6 != NULL) {
  $objPHPExcel->getActiveSheet()->getStyle('S'.$rowsix)->applyFromArray($SelectedStyle);
  $objPHPExcel->getActiveSheet()->getStyle('T'.$rowsix)->applyFromArray($SelectedStyle);
}
  $objPHPExcel->getActiveSheet()->getStyle('S'.$rowsix)->applyFromArray($border);
  $objPHPExcel->getActiveSheet()->getStyle('T'.$rowsix)->applyFromArray($border);
  $objPHPExcel->getActiveSheet()->getStyle('S'.$rowsix)->applyFromArray($styleContent);
  $objPHPExcel->getActiveSheet()->getStyle('T'.$rowsix)->applyFromArray($styleContent);
  $objPHPExcel->getActiveSheet()->getStyle('S'.$rowsix)->applyFromArray($ALIGNRIGHT);
  $objPHPExcel->setActiveSheetIndex()->setCellValue('S'.$rowsix,number_format($ppu6,2));
  $objPHPExcel->getActiveSheet()->getStyle('T'.$rowsix)->applyFromArray($ALIGNRIGHT);
  $objPHPExcel->setActiveSheetIndex()->setCellValue('T'.$rowsix,number_format($price_per_item6,2));
  $rowsix++;

}

$select_tots_per_sup6= mysqli_query($conn,"SELECT sum(ppu*qty) as totalABCperItem FROM supplier_quote sq LEFT JOIN rfq_items rq on rq.id = sq.rfq_item_id WHERE sq.supplier_id = $sid6 AND rq.id in($implode2)");
$tots_sup6 = mysqli_fetch_array($select_tots_per_sup6);
$totalABCperItem6 = $tots_sup6['totalABCperItem'];

if ($rowabsno6 != NULL) {
  $objPHPExcel->getActiveSheet()->getStyle('S'.$rowsix)->applyFromArray($SelectedStyleG);
  $objPHPExcel->getActiveSheet()->getStyle('T'.$rowsix)->applyFromArray($styleBoldRed);
}else{
  $objPHPExcel->getActiveSheet()->getStyle('S'.$rowsix)->applyFromArray($GrayStyle);
  
}
$objPHPExcel->setActiveSheetIndex()->setCellValue('S'.$rowsix,'GRANDTOTAL');
$objPHPExcel->getActiveSheet()->getStyle('S'.$rowsix)->applyFromArray($border);
$objPHPExcel->getActiveSheet()->getStyle('T'.$rowsix)->applyFromArray($styleContent);
$objPHPExcel->getActiveSheet()->getStyle('T'.$rowsix)->applyFromArray($ALIGNRIGHT);
$objPHPExcel->setActiveSheetIndex()->setCellValue('T'.$rowsix,number_format($totalABCperItem5,2));
$objPHPExcel->getActiveSheet()->getStyle('T'.$rowsix)->applyFromArray($border);
//====================================================================================================


 $objPHPExcel->getActiveSheet()->getStyle('A'.$rowA)->getFont()->setItalic( true );
  $objPHPExcel->setActiveSheetIndex()->setCellValue('A'.$rowA,'Remarks:');
  $objPHPExcel->setActiveSheetIndex()->setCellValue('A'.$rowB,'Based on the above quotation of prices by the different dealers called for on the above articles, the Committee hereby recommends that the award be given to the dealer (s) which offered the lowest');
  $objPHPExcel->setActiveSheetIndex()->setCellValue('A'.$rowB1,'price(s), Which certify as fair and reasonable in the locality, as follows:');

  $querycount = mysqli_query($conn,"Select count(id) as count from rfq_items where rfq_id = $rfq_id");
  $fetch = mysqli_fetch_array($querycount);
  $num = $fetch['count'];

  $objPHPExcel->setActiveSheetIndex()->setCellValue('A'.$rowB11,'For Item(s) 1 to '.$num." to ".$WinSupply);


  if ($abc12 > 49999) {
  $objPHPExcel->getActiveSheet()->getStyle('D'.$rowC)->applyFromArray($styleContent2);
  $objPHPExcel->getActiveSheet()->getStyle('D'.$rowD)->applyFromArray($styleContent21);
  $objPHPExcel->getActiveSheet()->mergeCells('D'.$rowC.':'.'G'.$rowC);
  $objPHPExcel->getActiveSheet()->mergeCells('D'.$rowD.':'.'G'.$rowD);
  $objPHPExcel->setActiveSheetIndex()->setCellValue('D'.$rowC,'DR. CARINA S. CRUZ');
  $objPHPExcel->setActiveSheetIndex()->setCellValue('D'.$rowD,'BAC Chairman');

  $objPHPExcel->getActiveSheet()->getStyle('K'.$rowC)->applyFromArray($styleContent2);
  $objPHPExcel->getActiveSheet()->getStyle('K'.$rowD)->applyFromArray($styleContent21);
  $objPHPExcel->getActiveSheet()->mergeCells('K'.$rowC.':'.'N'.$rowC);
  $objPHPExcel->getActiveSheet()->mergeCells('K'.$rowD.':'.'N'.$rowD);
  $objPHPExcel->setActiveSheetIndex()->setCellValue('K'.$rowC,'JOHN M. CEREZO');
  $objPHPExcel->setActiveSheetIndex()->setCellValue('K'.$rowD,'BAC Vice Chairman');

  $objPHPExcel->getActiveSheet()->getStyle('P'.$rowC)->applyFromArray($styleContent2);
  $objPHPExcel->getActiveSheet()->getStyle('P'.$rowD)->applyFromArray($styleContent21);
  $objPHPExcel->getActiveSheet()->mergeCells('P'.$rowC.':'.'S'.$rowC);
  $objPHPExcel->getActiveSheet()->mergeCells('P'.$rowD.':'.'S'.$rowD);
  $objPHPExcel->setActiveSheetIndex()->setCellValue('P'.$rowC,'ATTY. JORDAN V. NADAL');
  $objPHPExcel->setActiveSheetIndex()->setCellValue('P'.$rowD,'BAC Member');

  $objPHPExcel->getActiveSheet()->getStyle('H'.$rowE)->applyFromArray($styleContent2);
  $objPHPExcel->getActiveSheet()->getStyle('H'.$rowF)->applyFromArray($styleContent21);
  $objPHPExcel->getActiveSheet()->mergeCells('H'.$rowE.':'.'J'.$rowE);
  $objPHPExcel->getActiveSheet()->mergeCells('H'.$rowF.':'.'J'.$rowF);
  $objPHPExcel->setActiveSheetIndex()->setCellValue('H'.$rowE,'GILBERTO L. TUMAMAC');
  $objPHPExcel->setActiveSheetIndex()->setCellValue('H'.$rowF,'BAC Member');

   $objPHPExcel->getActiveSheet()->getStyle('N'.$rowE)->applyFromArray($styleContent2);
  $objPHPExcel->getActiveSheet()->getStyle('N'.$rowF)->applyFromArray($styleContent21);
  $objPHPExcel->getActiveSheet()->mergeCells('N'.$rowE.':'.'P'.$rowE);
  $objPHPExcel->getActiveSheet()->mergeCells('N'.$rowF.':'.'P'.$rowF);
  $objPHPExcel->setActiveSheetIndex()->setCellValue('N'.$rowE,'JAY-AR T. BELTRAN');
  $objPHPExcel->setActiveSheetIndex()->setCellValue('N'.$rowF,'Alternate BAC Member');
  }else{
    $objPHPExcel->getActiveSheet()->getStyle('B'.$rowC)->applyFromArray($styleContent2);
  $objPHPExcel->getActiveSheet()->getStyle('B'.$rowD)->applyFromArray($styleContent21);
  $objPHPExcel->getActiveSheet()->mergeCells('B'.$rowC.':'.'E'.$rowC);
  $objPHPExcel->getActiveSheet()->mergeCells('B'.$rowD.':'.'E'.$rowD);
  $objPHPExcel->setActiveSheetIndex()->setCellValue('B'.$rowC,'MAYBELLINE M. MONTEIRO');
  $objPHPExcel->setActiveSheetIndex()->setCellValue('B'.$rowD,'SSVPC Member');

  $objPHPExcel->getActiveSheet()->getStyle('G'.$rowC)->applyFromArray($styleContent2);
  $objPHPExcel->getActiveSheet()->getStyle('G'.$rowD)->applyFromArray($styleContent21);
  $objPHPExcel->getActiveSheet()->mergeCells('G'.$rowC.':'.'K'.$rowC);
  $objPHPExcel->getActiveSheet()->mergeCells('G'.$rowD.':'.'K'.$rowD);
  $objPHPExcel->setActiveSheetIndex()->setCellValue('G'.$rowC,'JOYCE ARLA PEACH B. ESCALANTE');
  $objPHPExcel->setActiveSheetIndex()->setCellValue('G'.$rowD,'SSVPC Member');

  $objPHPExcel->getActiveSheet()->getStyle('L'.$rowC)->applyFromArray($styleContent2);
  $objPHPExcel->getActiveSheet()->getStyle('L'.$rowD)->applyFromArray($styleContent21);
  $objPHPExcel->getActiveSheet()->mergeCells('L'.$rowC.':'.'M'.$rowC);
  $objPHPExcel->getActiveSheet()->mergeCells('L'.$rowD.':'.'M'.$rowD);
  $objPHPExcel->setActiveSheetIndex()->setCellValue('L'.$rowC,'HANNAH GRACE P. SOLIS');
  $objPHPExcel->setActiveSheetIndex()->setCellValue('L'.$rowD,'Alternate SSVPC Member');

  $objPHPExcel->getActiveSheet()->getStyle('I'.$rowE)->applyFromArray($styleContent2);
  $objPHPExcel->getActiveSheet()->getStyle('I'.$rowF)->applyFromArray($styleContent21);
  $objPHPExcel->getActiveSheet()->mergeCells('I'.$rowE.':'.'J'.$rowE);
  $objPHPExcel->getActiveSheet()->mergeCells('I'.$rowF.':'.'J'.$rowF);
  $objPHPExcel->setActiveSheetIndex()->setCellValue('H'.$rowE,'Noted By:');
  $objPHPExcel->setActiveSheetIndex()->setCellValue('I'.$rowE,'BEZALEEL O. SOLTURA');
  $objPHPExcel->setActiveSheetIndex()->setCellValue('I'.$rowF,'SSVPC Head');

  }

   $objPHPExcel->getActiveSheet()->getStyle('A'.$rowG)->applyFromArray($styleSam);
   $objPHPExcel->getActiveSheet()->getStyle('A'.$rowG)->getFont()->setItalic( true );
   $objPHPExcel->getActiveSheet()->getStyle('A'.$rowH)->applyFromArray($styleSam);
   $objPHPExcel->getActiveSheet()->getStyle('A'.$rowH)->getFont()->setItalic( true );
   $objPHPExcel->getActiveSheet()->getStyle('A'.$rowI)->applyFromArray($styleSam);
   $objPHPExcel->getActiveSheet()->getStyle('A'.$rowI)->getFont()->setItalic( true );
  $objPHPExcel->setActiveSheetIndex()->setCellValue('A'.$rowG,'Eligibility Requirements:');
  $objPHPExcel->setActiveSheetIndex()->setCellValue('A'.$rowH,'Note: In order to be eligible for this procurement, suppliers / service providers must submit together with the quotation / proposal the following eligibility requirements:');
  $objPHPExcel->setActiveSheetIndex()->setCellValue('A'.$rowI,'          1. Valid Business Permit       2. Latest Income / Business Tax Return       3. PhilGEPS Registration No.');




$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save(str_replace('.php', '.xlsx', __FILE__));
header('location: export_abstract2.xlsx');

?>