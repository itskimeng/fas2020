<?php
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

        
$bgWhite = array(
  'font'  => array('size'  => 11, 'name'  => 'Cambria'),
  'fill' => array('type' => PHPExcel_Style_Fill::FILL_SOLID,'color' => array('rgb' => 'FFFFFF'))
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


?>