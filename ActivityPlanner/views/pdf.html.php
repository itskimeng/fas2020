<?php
session_start();
date_default_timezone_set('Asia/Manila');

require_once('../../tcpdfv02/tcpdf.php');
require_once "../../connection.php";
require_once '../controller/ActivityTaskController.php';

error_reporting(~0);
ini_set('display_errors', 1);

$status = $_GET['status'];

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);


$header = getHeader($status);

// set document information
$pdf->SetCreator('DILG RICTU');
$pdf->SetAuthor('DILG RICTU');
$pdf->SetTitle('LGCDD Task Management | '.$header['text'].' List');
$pdf->SetSubject('LGCDD Activity Planner');
$pdf->SetKeywords('TCPDF, PDF, todo');

// set default header data
$pdf->SetHeaderData('', '0', 'DEPARTMENT OF THE INTERIOR AND LOCAL GOVERNMENT (DILG) IV-A CALABARZON', 'Local Government Capability Development Division (LGCDD)');

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

$pdf->SetFont('', '', 10);

// add a page
$pdf->AddPage();
// $html = file_get_contents(htmlentities('print.html.php'));
$html = files($status, $header, $tasks);

$pdf->writeHTML($html, true, false, true, false, '');

$pdf->lastPage();
$pdf->Output('personnel_report.pdf', 'I');
//============================================================+
// END OF FILE
//============================================================+

function files($pointer='', $header='',$tasks) {

	$html = '<h2 style="color:'.$header['color'].';">'.$header['text'].' LIST:</h2>';
	$html .= '<table class="table-striped" border="1" cellspacing="1" cellpadding="5">';
	
	$html .= '<thead>'; 
	$html .= '<tr nobr="true" style="text-align:center; background-color:'.$header['color'].'; color:white;">';
	$html .= '<th>Activity</th>';
	$html .= '<th>Task</th>';
	$html .= '<th style="width:25%;">Collaborator</th>';
	$html .= '<th style="width:25%;">Timeline</th>';
	// $html .= '<th style="width:10%;">Status</th>';
	$html .= '</tr>';
	$html .= '</thead>';

	$html .= '<tbody>';
	foreach ($tasks[$pointer] as $item) {

	$html .= '<tr nobr="true">';
	$html .= '<td>';
	$html .= $item['event_title'];
	$html .= '</td>';
	$html .= '<td>';
	$html .= $item['task_title'];
	$html .= '</td>';
	$html .= '<td>';
	$html .= $item['collaborators'];
	$html .= '</td>';
	$html .= '<td>';
	$html .= $item['date_start'].' ~ '.$item['date_end'];
	$html .= '</td>';
	$html .= '</tr>';
	}
	$html .= '</tbody>';
	$html .= '</table>';

	return $html;
}

function getHeader($pointer) {
	switch ($pointer) {
		case 'Created':
			$header['text'] = 'TO DO';
			$header['color'] = 'gray';
			break;
		case 'Ongoing':
			$header['text'] = 'ONGOING';
			$header['color'] = 'orange';
			break;
		case 'For Checking':
			$header['text'] = 'FOR CHECKING';
			$header['color'] = 'blue';
			break;
		case 'Done':
			$header['text'] = 'DONE';
			$header['color'] = 'green';
			break;
	}

	return $header;
}
