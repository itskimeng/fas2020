<?php
session_start();
date_default_timezone_set('Asia/Manila');

require_once('../../tcpdfv02/tcpdf.php');
require_once "../../connection.php";


$list[] = $_POST['attendee'];
$message = $_POST['message'];
$title = $_POST['title'];

if ($_FILES['uploadfile']['error'] == UPLOAD_ERR_OK && is_uploaded_file($_FILES['uploadfile']['tmp_name'])) { 
	$list = file_get_contents($_FILES['uploadfile']['tmp_name']); 
	$list = explode(',', $list);
}

// print_r(explode(",", $list));
// die();


//============================================================+
// File name   : example_051.php
// Begin       : 2009-04-16
// Last Update : 2013-05-14
//
// Description : Example 051 for TCPDF class
//               Full page background
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: Full page background
 * @author Nicola Asuni
 * @since 2009-04-16
 */

// Include the main TCPDF library (search for installation path).


// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF {
    //Page header
    public function Header() {
        // get the current page break margin
        $bMargin = $this->getBreakMargin();
        // get current auto-page-break mode
        $auto_page_break = $this->AutoPageBreak;
        // disable auto-page-break
        $this->SetAutoPageBreak(false, 0);
        // set bacground image
        // $img_file = K_PATH_IMAGES.'image_demo.jpg';
        $img_file = '../../images/template/base_template.jpg';

        // $this->Image(file, LEFT, RIGHT, WIDTH, HEIGHT, '', '', '', false, 300, '', false, false, 0);
        $this->Image($img_file, 5, 5, 280, 198, '', '', '', false, 300, '', false, false, 0);
        // restore auto-page-break status
        $this->SetAutoPageBreak($auto_page_break, $bMargin);
        // set the starting point for the page content
        $this->setPageMark();
    }
}

// create new PDF document
$pdf = new MYPDF('Landscape', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('TCPDF Example 051');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(50, 5, 50);
$pdf->SetHeaderMargin(0);
$pdf->SetFooterMargin(0);

// remove default footer
$pdf->setPrintFooter(false);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

$pdf->SetFont('times', '', 48);


foreach ($list as $attendee) {
	$pdf->AddPage();

	$html = '<br><br><div style="text-align:center; font-size:10pt;">This<br>
	<b style="font-family:Trajan Pro Bold; font-weight:bold;font-size:29pt;">'.$title.'</b><br><br>
	is hereby awarded to<br><br><br><br><div style="font-family:helvetica;font-weight:bold;font-size:26pt; text-align:center;">'.$attendee.'</div><br><br><div style="font-family:Verdana Regular;font-size:12pt; text-align:center;">'.nl2br($message).'</div>
	</div>';

	// $pdf->writeHTML($html, true, false, true, false, '');

	// $html = nl2br('<div style="font-family:helvetica;font-weight:bold;font-size:26pt; text-align:center;">'.$attendee.'</div>');

	// $pdf->writeHTML($html, true, false, true, false, '');

	// $html = nl2br('<div style="font-family:Verdana Regular;font-size:12pt; text-align:center;">'.$message.'</div>');
	$pdf->writeHTML($html, true, false, true, false, '');
	
}
	$pdf->lastPage();
	$pdf->Output('certificate.pdf', 'I');


//============================================================+
// END OF FILE
//============================================================+