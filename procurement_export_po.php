<?php
ob_start();
define('EOL', (PHP_SAPI == 'cli') ? PHP_EOL : '<br />');
require_once 'menu_checker.php';
$menuchecker = menuChecker('po_view');
include 'Model/Connection.php';
require_once 'GSS/controller/RFQController.php';
//require_once 'GSS/controller/PurchaseRequestController.php';
require_once 'library/PHPExcel/Classes/PHPExcel/IOFactory.php';
$objPHPExcel = PHPExcel_IOFactory::load("library/procurement_export_po.xlsx");
$styleBorder = array(
     'borders' => array(
          'allborders' => array('style' => PHPExcel_Style_Border::BORDER_THIN)
     ),
);
$toLeft = array(
     'alignment' => array(
          'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT
     )
);
$toCenter = array(
     'alignment' => array(
          'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER
     )
);
$styleBold = array(
     'font' => array(
          'bold' => true
     )
     );
$numberTowords = array(
     'font' => array(
         'bold' => true,
         'italic'=>true
     )
 );
 $bottom_border = array(
     'borders' => array(
       'bottom' => array(
         'style' => PHPExcel_Style_Border::BORDER_THIN
       )
     )
   );
   $top_border = array(
     'borders' => array(
       'top' => array(
         'style' => PHPExcel_Style_Border::BORDER_THIN
       )
     )
   );
   $left_border = array(
     'borders' => array(
       'left' => array(
         'style' => PHPExcel_Style_Border::BORDER_THIN
       )
     )
   );
   $right_border = array(
     'borders' => array(
       'right' => array(
         'style' => PHPExcel_Style_Border::BORDER_THIN
       )
     )
   );
function group_array($array)
{
     $val = array_unique($array);
     return $val;
}



$objPHPExcel->setActiveSheetIndex()->setCellValue('C7',$supp_opts2['supplier_title']);
$objPHPExcel->setActiveSheetIndex()->setCellValue('C8',$supp_opts2['supplier_address']);
$objPHPExcel->setActiveSheetIndex()->setCellValue('C9',$supp_opts2['contact_details']);

$objPHPExcel->setActiveSheetIndex()->setCellValue('F7',$po_opts['po_no']);
$objPHPExcel->setActiveSheetIndex()->setCellValue('F8',date('F d, Y',strtotime($po_opts['po_date'])));
$objPHPExcel->setActiveSheetIndex()->setCellValue('E10',$po_opts['mode']);
$item_row = 17;
$total_abc = 0;
foreach ($po_items as $key => $data) {
    $objPHPExcel->getActiveSheet()->getStyle("C" . $item_row . "")->applyFromArray($toLeft);
    $objPHPExcel->getActiveSheet()->getStyle("E" . $item_row . "")->applyFromArray($toLeft);
    $objPHPExcel->getActiveSheet()->getStyle("F" . $item_row . "")->applyFromArray($toLeft);
    $objPHPExcel->getActiveSheet()->getStyle("G" . $item_row . "")->applyFromArray($toLeft);
    $objPHPExcel->getActiveSheet()->getStyle('A'.$item_row . ':' . 'G'.$item_row)->applyFromArray($styleBorder);

    $objPHPExcel->getActiveSheet()->getRowDimension($item_row)->setRowHeight(60);


    $objPHPExcel->setActiveSheetIndex()->setCellValue('A' . $item_row, $data['sn']);
    $objPHPExcel->setActiveSheetIndex()->setCellValue('B' . $item_row, $data['unit']);
    $objPHPExcel->setActiveSheetIndex()->setCellValue('C' . $item_row, $data['items'] . "\n" . $data['description']);
    $objPHPExcel->setActiveSheetIndex()->mergeCells('C'.$item_row.':D'.$item_row);

    $objPHPExcel->setActiveSheetIndex()->setCellValue('E' . $item_row, $data['qty']);
    $objPHPExcel->setActiveSheetIndex()->setCellValue('F' . $item_row, '₱'.number_format($data['ppu'],2));
    $objPHPExcel->setActiveSheetIndex()->setCellValue('G' . $item_row, '₱'.number_format($data['qty'] * $data['ppu'],2));
    $total_abc += $data['qty'] * $data['ppu'];
  
    $item_row++;
}    
$f = new NumberFormatter("en", NumberFormatter::SPELLOUT);

$number_to_words = ucwords('(Total Amount in Words) '.$f->format($total_abc).'pesos only');
$objPHPExcel->setActiveSheetIndex()->mergeCells('A'.$item_row.':F'.$item_row);
$objPHPExcel->setActiveSheetIndex()->setCellValue('A'.$item_row,$number_to_words);
$objPHPExcel->getActiveSheet()->getStyle('A'.$item_row)->applyFromArray($numberTowords);


$objPHPExcel->setActiveSheetIndex()->setCellValue('G'.$item_row,'₱'.number_format($total_abc,2));
$objPHPExcel->getActiveSheet()->getRowDimension($item_row)->setRowHeight(30);
$objPHPExcel->getActiveSheet()->getStyle("G" . $item_row . "")->applyFromArray($toLeft);
$objPHPExcel->getActiveSheet()->getStyle("A" . $item_row . "")->applyFromArray($toCenter);
$objPHPExcel->getActiveSheet()->getStyle('A'.$item_row . ':' . 'G'.$item_row)->applyFromArray($styleBorder);

$item_row += 1;
$objPHPExcel->setActiveSheetIndex()->mergeCells('A'.$item_row.':G'.$item_row);
$objPHPExcel->getActiveSheet()->getStyle('A'.$item_row)->getAlignment()->setWrapText(true);
$objPHPExcel->getActiveSheet()->getRowDimension($item_row)->setRowHeight(40);
$objPHPExcel->setActiveSheetIndex()->setCellValue('A'.$item_row,'               In case of failure to make full delivery within time specified above, a penalty of one-tenth (1/10) of one percent for every day of delay shall be imposed.');

$item_row += 1;
$objPHPExcel->setActiveSheetIndex()->mergeCells('E'.$item_row.':F'.$item_row);
$objPHPExcel->setActiveSheetIndex()->setCellValue('E'.$item_row,'Very Truly Yours:');






$item_row += 1;
$objPHPExcel->setActiveSheetIndex()->mergeCells('A'.$item_row.':B'.$item_row);
$objPHPExcel->getActiveSheet()->getStyle("A" . $item_row . "")->applyFromArray($styleBold);
$objPHPExcel->setActiveSheetIndex()->setCellValue('A'.$item_row,'Conforme:');
$objPHPExcel->getActiveSheet()->getStyle("C" . $item_row . "")->applyFromArray($bottom_border);


$item_row += 1;
$objPHPExcel->setActiveSheetIndex()->mergeCells('E'.$item_row.':G'.$item_row);
$objPHPExcel->getActiveSheet()->getStyle("E" . $item_row . "")->applyFromArray($styleBold);
$objPHPExcel->setActiveSheetIndex()->setCellValue('E'.$item_row,'Approving Authority');

$item_row += 2;
$objPHPExcel->getActiveSheet()->getStyle("A" . $item_row . "")->applyFromArray($styleBold);
$objPHPExcel->setActiveSheetIndex()->setCellValue('A'.$item_row,'Date:');
$objPHPExcel->getActiveSheet()->getStyle("C" . $item_row . "")->applyFromArray($bottom_border);

$objPHPExcel->setActiveSheetIndex()->mergeCells('E'.$item_row.':G'.$item_row);
$objPHPExcel->getActiveSheet()->getStyle("E" . $item_row . "")->applyFromArray($styleBold);
$objPHPExcel->getActiveSheet()->getStyle("E" . $item_row . "")->applyFromArray($toCenter);
$objPHPExcel->setActiveSheetIndex()->setCellValue('E'.$item_row,'ARIEL O. IGLESIA');

$item_row += 1;
$objPHPExcel->setActiveSheetIndex()->mergeCells('E'.$item_row.':G'.$item_row);
$objPHPExcel->getActiveSheet()->getStyle("E" . $item_row . "")->applyFromArray($toCenter);
$objPHPExcel->setActiveSheetIndex()->setCellValue('E'.$item_row,'Regional Director');

$item_row += 1;
$objPHPExcel->setActiveSheetIndex()->mergeCells('A'.$item_row.':D'.$item_row);
$objPHPExcel->setActiveSheetIndex()->setCellValue('A'.$item_row,'FUNDS PROVIDED');
$objPHPExcel->getActiveSheet()->getStyle("A" . $item_row . "")->applyFromArray($styleBold);
$objPHPExcel->getActiveSheet()->getStyle("A" . $item_row . "")->applyFromArray($top_border);
$objPHPExcel->getActiveSheet()->getStyle("A" . $item_row . "")->applyFromArray($left_border);
$objPHPExcel->getActiveSheet()->getStyle("A" . $item_row . "")->applyFromArray($right_border);

$objPHPExcel->setActiveSheetIndex()->mergeCells('E'.$item_row.':G'.$item_row);
$objPHPExcel->getActiveSheet()->getStyle("E" . $item_row . "")->applyFromArray($styleBold);
$objPHPExcel->getActiveSheet()->getStyle("E" . $item_row . "")->applyFromArray($top_border);
$objPHPExcel->getActiveSheet()->getStyle("E" . $item_row . "")->applyFromArray($right_border);

$objPHPExcel->setActiveSheetIndex()->setCellValue('E'.$item_row,'AMOUNT:');
  
for ($i=0; $i < 4; $i++) { 
     $row = $item_row;
$objPHPExcel->getActiveSheet()->getStyle("E" . $item_row . "")->applyFromArray($left_border);
$objPHPExcel->getActiveSheet()->getStyle("G" . $item_row . "")->applyFromArray($left_border);
$objPHPExcel->setActiveSheetIndex()->mergeCells('E'.$item_row.':G'.$item_row);

$item_row++;
}

$item_row = $item_row-2;
$objPHPExcel->getActiveSheet()->getStyle("A" . $item_row . "")->applyFromArray($styleBold);
$objPHPExcel->getActiveSheet()->getStyle("A" . $item_row . "")->applyFromArray($left_border);
$objPHPExcel->getActiveSheet()->getStyle("A" . $item_row . "")->applyFromArray($right_border);

$objPHPExcel->setActiveSheetIndex()->setCellValue('A'.$item_row,'AGNES S. SANGEL');

$item_row += 1;
$objPHPExcel->getActiveSheet()->getStyle("A" . $item_row . "")->applyFromArray($left_border);
$objPHPExcel->getActiveSheet()->getStyle("A" . $item_row . "")->applyFromArray($right_border);
$objPHPExcel->getActiveSheet()->getStyle("A" . $item_row . "")->applyFromArray($bottom_border);
$objPHPExcel->getActiveSheet()->getStyle('A'.$item_row.':G'.$item_row)->applyFromArray($bottom_border);

$objPHPExcel->setActiveSheetIndex()->setCellValue('A'.$item_row,'Regional Accountant');










						


$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save(str_replace('.php', '.xlsx', __FILE__));
header('location: procurement_export_po.xlsx');

?>
<script>
  $(document).ready(function(){
    let total_abc = $('#total_abc').val();
    $('#total_abc').val(numberToWords(total_abc));
  })
  function numberToWords(number) {  
        var digit = ['zero', 'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine'];  
        var elevenSeries = ['ten', 'eleven', 'twelve', 'thirteen', 'fourteen', 'fifteen', 'sixteen', 'seventeen', 'eighteen', 'nineteen'];  
        var countingByTens = ['twenty', 'thirty', 'forty', 'fifty', 'sixty', 'seventy', 'eighty', 'ninety'];  
        var shortScale = ['', 'thousand', 'million', 'billion', 'trillion'];  
  
        number = number.toString(); number = number.replace(/[\, ]/g, ''); if (number != parseFloat(number)) return 'not a number'; var x = number.indexOf('.'); if (x == -1) x = number.length; if (x > 15) return 'too big'; var n = number.split(''); var str = ''; var sk = 0; for (var i = 0; i < x; i++) { if ((x - i) % 3 == 2) { if (n[i] == '1') { str += elevenSeries[Number(n[i + 1])] + ' '; i++; sk = 1; } else if (n[i] != 0) { str += countingByTens[n[i] - 2] + ' '; sk = 1; } } else if (n[i] != 0) { str += digit[n[i]] + ' '; if ((x - i) % 3 == 0) str += 'hundred '; sk = 1; } if ((x - i) % 3 == 1) { if (sk) str += shortScale[(x - i - 1) / 3] + ' '; sk = 0; } } if (x != number.length) { var y = number.length; str += 'point '; for (var i = x + 1; i < y; i++) str += digit[n[i]] + ' '; } str = str.replace(/\number+/g, ' '); return str.trim() + ".";  
  
    } 
</script>