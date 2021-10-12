
<?php
// HEADER
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

  $objPHPExcel->setActiveSheetIndex()->setCellValue('B15','REF:');
  $objPHPExcel->setActiveSheetIndex()->setCellValue('B16','PR No. '.$pr_no.' date received:______');
  $objPHPExcel->setActiveSheetIndex()->setCellValue('B17','PUR: '.$purpose);
  $objPHPExcel->setActiveSheetIndex()->setCellValue('B6','RFQ NO.' .$rfq_no);
  $objPHPExcel->setActiveSheetIndex()->setCellValue('H7',$mode_of_proc_title);
// END OF HEADER



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
if(count($Asupplier) == 1)
{
  $abc_for_winner = mysqli_query($conn,"SELECT supplier_id FROM abstract_of_quote WHERE supplier_id =$implode AND rfq_id = $rfq_id");
  
}else{
    $abc_for_winner = mysqli_query($conn,"SELECT supplier_id FROM abstract_of_quote WHERE supplier_id in($implode) AND rfq_id = $rfq_id AND abstract_no IS NOT NULL");

}
$abcrow = mysqli_fetch_array($abc_for_winner);
$win_id = $abcrow['supplier_id'];

$winneryey = mysqli_query($conn,"SELECT supplier_title FROM supplier WHERE id = $win_id");
$rowWinY = mysqli_fetch_array($winneryey);
$WinSupply = $rowWinY['supplier_title'];

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
$objPHPExcel->setActiveSheetIndex()->setCellValue('B7','ABC: Php '.number_format($abc12,2).'');
?>