<?php
// ============///////////////////////////////////////////////////////////////////////      WIN 1        ///////////////////////////////////
  $suppliers1 = mysqli_query($conn, "
  SELECT s.philgeps_reg_no, s.id,rq.rfq_id,sq.id,s.id as sid,s.supplier_title,s.supplier_address,s.contact_details,s.remarks FROM supplier s 
  LEFT JOIN supplier_quote sq on sq.supplier_id = s.id 
  LEFT JOIN rfq_items rq on rq.id = sq.rfq_item_id WHERE sq.rfq_item_id = $rid  ");


  $rowS1 = mysqli_fetch_assoc($suppliers1);
  $supplier_title1 = $rowS1['supplier_title'];
  $philgeps1 = $rowS1['philgeps_reg_no'];
  $sid1 = $rowS1['sid'];

  $select_ifwin1 = mysqli_query($conn,"SELECT abstract_no FROM abstract_of_quote WHERE supplier_id = $sid1 AND rfq_id = $rfq_id");
  $rowWin1 = mysqli_fetch_array($select_ifwin1);
  $rowabsno1 = $rowWin1['abstract_no'];


  if ($rowabsno1 != NULL) {
    $objPHPExcel->getActiveSheet()->getStyle('F9')->applyFromArray($SelectedStyle);
    // $objPHPExcel->getActiveSheet()->getStyle('I15')->applyFromArray($SelectedStyle);
    // $objPHPExcel->getActiveSheet()->getStyle('J15')->applyFromArray($SelectedStyle);
  }

  $objPHPExcel->setActiveSheetIndex()->setCellValue('F9',$supplier_title1);
  $objPHPExcel->setActiveSheetIndex()->setCellValue('F22',$philgeps1);
//==============///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



//=============///////////////////////////////////////////////////////////////////////     WIN 2     ////////////////////////////////////////////////////////////////////////////////////////
  $suppliers2 = mysqli_query($conn, "
  SELECT s.philgeps_reg_no,s.id,rq.rfq_id,sq.id,s.id as sid,s.supplier_title,s.supplier_address,s.contact_details,s.remarks FROM supplier s 
  LEFT JOIN supplier_quote sq on sq.supplier_id = s.id 
  LEFT JOIN rfq_items rq on rq.id = sq.rfq_item_id WHERE sq.rfq_item_id = $rid  AND s.supplier_title != '$supplier_title1' ");
  $rowS2 = mysqli_fetch_assoc($suppliers2);
  $supplier_title2 = $rowS2['supplier_title'];
  $philgeps2 = $rowS2['philgeps_reg_no'];
  $sid2 = $rowS2['sid'];


  $select_ifwin2 = mysqli_query($conn,"SELECT abstract_no FROM abstract_of_quote WHERE supplier_id = $sid2 AND rfq_id = $rfq_id");
  $rowWin2 = mysqli_fetch_array($select_ifwin2);
  $rowabsno2 = $rowWin2['abstract_no'];



  if ($rowabsno2 != NULL) {
    $objPHPExcel->getActiveSheet()->getStyle('G9')->applyFromArray($SelectedStyle);
    // $objPHPExcel->getActiveSheet()->getStyle('K15')->applyFromArray($SelectedStyle);
    // $objPHPExcel->getActiveSheet()->getStyle('L15')->applyFromArray($SelectedStyle);
  }

  $objPHPExcel->setActiveSheetIndex()->setCellValue('G9',$supplier_title2);
  $objPHPExcel->setActiveSheetIndex()->setCellValue('G22',$philgeps2);
//====================//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//====================////////////////////////////////////////////////////////////////////   WIN 3 ///////////////////////////////////////////////////////////////////////////////////////////////////////////////
  $suppliers3 = mysqli_query($conn, "SELECT  s.philgeps_reg_no, s.id,rq.rfq_id,sq.id,s.id as sid,s.supplier_title,s.supplier_address,s.contact_details,s.remarks FROM supplier s LEFT JOIN supplier_quote sq on sq.supplier_id = s.id LEFT JOIN rfq_items rq on rq.id = sq.rfq_item_id WHERE sq.rfq_item_id = $rid  AND s.supplier_title != '$supplier_title1' AND s.supplier_title != '$supplier_title2' ");
  $rowS3 = mysqli_fetch_assoc($suppliers3);
  $supplier_title3 = $rowS3['supplier_title'];
  $philgeps3 = $rowS3['philgeps_reg_no'];
  $sid3 = $rowS3['sid'];

  $select_ifwin3 = mysqli_query($conn,"SELECT abstract_no FROM abstract_of_quote WHERE supplier_id = $sid3 AND rfq_id = $rfq_id");
  $rowWin3 = mysqli_fetch_array($select_ifwin3);
  $rowabsno3 = $rowWin3['abstract_no'];



  if ($rowabsno3 != NULL) {
    $objPHPExcel->getActiveSheet()->getStyle('H9')->applyFromArray($SelectedStyle);
    // $objPHPExcel->getActiveSheet()->getStyle('M15')->applyFromArray($SelectedStyle);
    // $objPHPExcel->getActiveSheet()->getStyle('N15')->applyFromArray($SelectedStyle);
  }

  $objPHPExcel->setActiveSheetIndex()->setCellValue('H9',$supplier_title3);
  $objPHPExcel->setActiveSheetIndex()->setCellValue('H22',$philgeps3);
//=================///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

?>