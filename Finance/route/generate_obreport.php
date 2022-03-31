<?php
require '../../PHPExcel-1.8/Classes/PHPExcel.php';

// $phpExcel = new PHPExcel;
$inputFileName = 'report/ML-and-PSL-2022.xlsx';

$inputFileType = PHPExcel_IOFactory::identify($inputFileName);
$objReader = PHPExcel_IOFactory::createReader($inputFileType);
$objPHPExcel = $objReader->load($inputFileName);

$sheet = $objPHPExcel->getSheet(0);
  $highestRow = $sheet->getHighestRow();
  $highestColumn = $sheet->getHighestColumn();
  $ii = 16;

  for ($row = 1; $row <= $highestRow; $row++) { 
    $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, 
                                    null, true, false);

    //Prints out data in each row.
    //Replace this with whatever you want to do with the data.
    // echo '<pre>';
      // print_r($rowData);
    // echo '</pre>';
    $sheet->getCell('B17')->setValue('joms');
  }

$writer = PHPExcel_IOFactory::createWriter($objPHPExcel, "Excel2007");


// We'll be outputting an excel file
header('Content-type: application/vnd.ms-excel');

// It will be called file.xls
header('Content-Disposition: attachment; filename="hi.xls"');

// Write file to the browser
$writer->save('php://output');