<?php
session_start();
date_default_timezone_set('Asia/Manila');

require_once "../../connection.php";
require_once('../../tcpdfv02/tcpdf.php');

$userid = $_SESSION['currentuser'];

$activity = $_GET['activity'];
$task = $_GET['task'];
$collaborators = isset($_GET['collaborators']) ? implode(', ', $_GET['collaborators']) : '';
$daterange = explode(' - ', $_GET['daterange']);
$drange = convertToTime($daterange);

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// $data = fetchData($conn, $activity, $task, $collaborators);

$data = fetchData($conn, ['activity'=>$activity, 'task'=>$task, 'collaborators'=>$collaborators, 'dfrom'=>$drange['date_from'], 'dto'=>$drange['date_to']]);

$user = getUserData($conn, $userid);

if (!empty($data)) {
	$genpdf = generatePDF($conn, $user, $pdf, $data, $drange);
	echo $genpdf;
} else {
	echo '';
}




function convertToTime($daterange) 
{
	// timeline
	// $timeline = explode("-", $_POST['timeline']);
	$date_from = strtotime($daterange[0]);
	$date_from = date('Y-m-d H:i:s', $date_from);
	$date_to = strtotime($daterange[1]);
	$date_to = date('Y-m-d H:i:s', $date_to);

	return array('date_from'=>$date_from, 'date_to'=>$date_to);
}

function getUserData($conn, $user) 
{
	$sql = "SELECT CONCAT(FIRST_M, ' ', MIDDLE_M, ' ', LAST_M) as fname FROM tblemployeeinfo where EMP_N = $user";

	$query = mysqli_query($conn, $sql);
	$result = mysqli_fetch_assoc($query);

	return $result;
}

function generatePDF($conn, $user, $pdf, $data, $drange)
{
	error_reporting(~0);
	ini_set('display_errors', 1);

	// set document information
	$pdf->SetCreator('DILG RICTU');
	$pdf->SetAuthor('DILG RICTU');
	$pdf->SetTitle('LGCDD Task Management');
	$pdf->SetSubject('LGCDD Activity Planner');
	$pdf->SetKeywords('TCPDF, PDF, todo');

	// set default header data
	$pdf->SetHeaderData('', '0', '', '');

	$pdf->SetPrintHeader(false);

	// set header and footer fonts
	$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
	$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

	// set default monospaced font
	$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

	// set margins
	$pdf->SetMargins(5, 10, PDF_MARGIN_RIGHT);
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
	
	// $html = generateHeader();
	// $pdf->writeHTML($html, true, false, true, false, '');

	$html = generateDetails($user, $drange);
	$pdf->writeHTML($html, true, false, true, false, '');

	$html = generateFiles($data);
	$pdf->writeHTML($html, true, false, true, false, '');
	$pdf->lastPage();
	$pdf->Output('report_generated.pdf', 'D');
	// $pdf->Output(__DIR__ . 'report_generated.pdf', 'D');

	return true;	
}	

function generateHeader()
{
	$html = '<table class="table table-bordered" cellspacing="1" cellpadding="5" style="font-size:9pt;">';
	$html.= '<tr>';

	$html.= '<td style="text-align:center;">';
	$html.= '<img src="../../images/logo_dilg.jpg" style="width:55px; height:55px;">';
	$html.= '</td>';
	$html.= '</tr>';
	$html.= '<tr>';
	$html.= '<td style="text-align:center; font-size:8pt;">';
	$html.= '<b>DEPARTMENT OF THE INTERIOR AND LOCAL GOVERNMENT</b><br>';
	$html.= '<b>REGION IV-A CALABARZON</b><br>';
	$html.= '<b>Local Government Capability Development Division (LGCDD)</b><br>';
	$html.= '</td>';

	$html.= '</tr>';
	$html.= '</table>';

	return $html;
}

function generateDetails($user, $drange)
{
	$today = new DateTime();
	$today = $today->format('M d, Y');
	$date_from = strtotime($drange['date_from']);
	$date_from = date('m/d/Y', $date_from);

	$date_to = strtotime($drange['date_to']);
	$date_to = date('m/d/Y', $date_to);

	$html = '<table class="table table-bordered" cellspacing="1" cellpadding="5" style="font-size:9pt;">';
	$html.= '<tr>';

	$html.= '<td style="text-align:center;">';
	$html.= '<img src="../../images/logo_dilg.jpg" style="width:55px; height:55px;">';
	$html.= '</td>';
	$html.= '</tr>';
	$html.= '<tr>';
	$html.= '<td style="text-align:center; font-size:8pt;">';
	$html.= '<b>DEPARTMENT OF THE INTERIOR AND LOCAL GOVERNMENT</b><br>';
	$html.= '<b>REGION IV-A CALABARZON</b><br>';
	$html.= '<b>Local Government Capability Development Division (LGCDD)</b><br>';
	$html.= '</td>';

	$html.= '</tr>';
	$html.= '</table>';



	$html.= '<table class="table table-bordered" cellspacing="1" cellpadding="2" style="font-size:9pt;">';
	
	$html.= '<tr>';
	$html.= '<td style="width:100%; text-align:center; font-size:11pt;" colspan="2">';
	$html.= '<b>TASK MANAGEMENT REPORT</b>';
	$html.= '</td>';
	$html.= '</tr>';

	// $html.= '<tr>';
	// $html.= '<td rowspan="2">';
	// $html.= '</td>';
	// $html.= '</tr>';

	$html.= '<tr>';
	$html.= '<td style="text-align:left; width:50%;">';
	$html.= 'Date Generated: '.$today;
	$html.= '</td>';
	$html.= '<td style="text-align:right; width:50%;">';
	$html.= 'Generated by: '.$user['fname'];
	$html.= '</td>';
	$html.= '</tr>';

	$html.= '<tr>';
	$html.= '<td style="text-align:left; width:50%;">';
	$html.= 'Filter: '.$date_from .' - '. $date_to;
	$html.= '</td>';
	$html.= '</tr>';

	$html.= '</table>';

	return $html;
}


function generateFiles($data)
{
	$html = '<table class="table-striped" border="1" cellspacing="1" cellpadding="6" style="font-size:9pt;">';
	$html.= '<thead>';
	
	$html.= '<tr nobr="true" style="text-align:center; background-color:gray; color:white;">';
	$html.= '<th style="width:7%;"></th>';
	$html.= '<th><b>ACTIVITY</b></th>';
	$html.= '<th><b>TASK</b></th>';
	$html.= '<th style="width:19%;"><b>COLLABORATOR</b></th>';
	$html.= '<th style="width:19%;"><b>TIMELINE</b></th>';
	$html.= '<th style="width:19%;"><b>PROGRESS</b></th>';
	$html.= '<th style="width:13%;"><b>STATUS</b></th>';
	$html.= '</tr>';
	$html.= '</thead>';

	$html.= '</tbody>';

	foreach ($data as $key => $item) {
		$html.= '<tr nobr="true">';
		$html.= '<td style="width:7%;">';
		$html.= $key+1;
		$html.= '.</td>';
		$html.= '<td>';
		$html.= $item['activity'];
		$html.= '</td>';
		$html.= '<td>';
		$html.= $item['task'];
		$html.= '</td>';
		$html.= '<td style="width:19%;">';
		$html.= $item['collaborators'];
		$html.= '</td>';
		$html.= '<td style="width:19%;">';
			$html.= '<table border="1">';
			
			$html.= '<tr>';
			$html.= '<td style="text-align:center; padding:1">';
			$html.= '<b>From</b>';
			$html.= '</td>';
			$html.= '</tr>';
			$html.= '<tr>';
			$html.= '<td style="text-align:center; padding:1">';
			$html.= $item['date_from'];
			$html.= '</td>';
			$html.= '</tr>';

			$html.= '<tr>';
			$html.= '<td style="text-align:center; padding:1">';
			$html.= '<b>To</b>';
			$html.= '</td>';
			$html.= '</tr>';
			$html.= '<tr>';
			$html.= '<td style="text-align:center; padding:1">';
			$html.= $item['date_to'];
			$html.= '</td>';
			$html.= '</tr>';

			$html.= '</table>';
		$html.= '</td>';

		$html.= '<td style="text-align:center; width:19%;">';
			if (!empty($item['date_start'])) {
				$html.= '<table border="1">';
				
				$html.= '<tr>';
				$html.= '<td style="text-align:center; padding:1">';
				$html.= '<b>Start</b>';
				$html.= '</td>';
				$html.= '</tr>';
				$html.= '<tr>';
				$html.= '<td style="text-align:center; padding:1">';
				$html.= $item['date_start'];
				$html.= '</td>';
				$html.= '</tr>';

				$html.= '<tr>';
				$html.= '<td style="text-align:center; padding:1">';
				$html.= '<b>End</b>';
				$html.= '</td>';
				$html.= '</tr>';
				$html.= '<tr>';
				$html.= '<td style="text-align:center; padding:1">';
				if (!empty($item['date_end'])) {
					$html.= $item['date_end'];
				} else {
					$html.= 'N/A';
				}
				$html.= '</td>';
				$html.= '</tr>';

				$html.= '</table>';
			} else {
				$html.= 'Not yet Started';
			}
		$html.= '</td>';
		$html.= '<td style="text-align:center; width:13%">';
		if ($item['status'] == 'Done') {
			$html.= '<span style="background-color:lightgreen">';
			$html.= ' '.$item['status'].' ';
			$html.= '</span>';
		} elseif ($item['status'] == 'Ongoing') {
			$html.= '<span style="background-color:yellow">';
			$html.= ' '.$item['status'].' ';
			$html.= '</span>';
		} elseif ($item['status'] == 'For Checking') {
			$html.= '<span style="background-color:blue; color:white;">';
			$html.= ' '.$item['status'].' ';
			$html.= '</span>';
		} else {
			$html.= $item['status'];
		}
		$html.= '</td>';

		$html.= '</tr>';
	}
	
	$html.= '</tbody>';
	$html.= '</table>';

	return $html;
}


function fetchData($conn, $data) 
{
	$array = $data['collaborators'];
	$sql = "SELECT e.title as activity, es.title as task, es.emp_id as emps, es.status as status, DATE_FORMAT(es.date_from, '%m/%d/%Y %h:%i %p') as tdate_from, DATE_FORMAT(es.date_to, '%m/%d/%Y %h:%i %p') as tdate_to, DATE_FORMAT(es.date_start, '%m/%d/%Y %h:%i %p') as pdate_start, DATE_FORMAT(es.date_end, '%m/%d/%Y %h:%i %p') as pdate_end FROM event_subtasks es LEFT JOIN events e on e.id = es.event_id WHERE es.status <> 'Draft'";

	if (!empty($data['dfrom']) AND !empty($data['dto'])) {
		$dfrom = $data['dfrom'];
		$dto = $data['dto'];

		$sql.= " AND es.date_from >= '".$dfrom."' AND es.date_to <= '".$dto."' ";
	}
	
	if (!empty($data['activity'])) {
		$sql.= " AND e.title LIKE '%".$data['activity']."%' ";
	}

	if (!empty($data['task'])) {
		$sql.= " AND es.title LIKE '%".$data['task']."%' ";
	}

	if (!empty($array)) {
		$sql.= " AND es.emp_id LIKE '%$array%' ";
	}

	$sql.= "ORDER BY e.title, es.status";

	$query = mysqli_query($conn, $sql);
	$results = [];

	while($row = mysqli_fetch_assoc($query)) {
		$persons = json_decode($row['emps'], true);
		$collaborators = fetchEmployee($conn, $persons);
		$status = $row['status'];

		if ($row['status'] == 'Created') {
			$status = 'To Do';
		}

		$results[] = [
			'activity' 		=> $row['activity'],
			'task' 			=> $row['task'],
			'status' 		=> $status,
			'date_from' 	=> $row['tdate_from'],
	 		'date_to' 		=> $row['tdate_to'],
	 		'date_start' 	=> $row['pdate_start'] != '' ? $row['pdate_start'] : '',
	 		'date_end' 		=> $row['pdate_end'] != '' ? $row['pdate_end'] : '',
	 		'collaborators'	=> count($collaborators) > 1 ? implode(", <br>", $collaborators) : implode("<br>", $collaborators)
		];
	}

	return $results;
}

function fetchEmployee($conn, $data) 
{
	$dd = [];

	if (is_array($data)) {
		foreach ($data as $key => $id) {
			if (!empty($id)) {
				$sql = "SELECT LAST_M as lname, FIRST_M as fname
				  FROM tblemployeeinfo 
				  WHERE EMP_N = $id";

				$query = mysqli_query($conn, $sql);
				$result = mysqli_fetch_array($query);  
				$dd[] = $result['fname'] .' ' .$result['lname'];
			}
		}
	} else {
		if (!empty($data)) {
			$sql = "SELECT LAST_M as lname, FIRST_M as fname
			  FROM tblemployeeinfo 
			  WHERE EMP_N = $data";

			$query = mysqli_query($conn, $sql);
			$result = mysqli_fetch_array($query);  
			$dd[] = $result['fname'] .' ' .$result['lname'];
		}
	}

	return $dd;
}