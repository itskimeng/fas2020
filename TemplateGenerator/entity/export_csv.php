<?php
session_start();

require_once "../../connection.php";
require '../../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;



$data['certificate_type'] = $_GET['certificate_type'];
$data['activity_title'] = $_GET['activity_title'];
$data['date_from'] = $_GET['date_from'];
$data['date_to'] = !empty($_GET['date_to']) ? $_GET['date_to'] : $_GET['date_from'];
$data['activity_venue'] = $_GET['activity_venue'];
$data['date_given'] = $_GET['date_given'];
$data['date_generated'] = $_GET['date_generated'];
$data['opr'] = !empty($_GET['opr']) ? $_GET['opr'] : null;

$date_from = new DateTime($data['date_from']);
$date_to = new DateTime($data['date_to']);
$date_given = new DateTime($data['date_given']);
$date_generated = new DateTime($data['date_generated']);

$date_from = $date_from->format('Y-m-d');
$date_to = $date_to->format('Y-m-d');
$date_given = $date_given->format('Y-m-d');
$date_generated = $date_generated->format('Y-m-d');


$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

$sql = "SELECT *
			FROM template_generator
			WHERE certificate_type = '".$data['certificate_type']."' AND activity_title = '".$data['activity_title']."' AND date_from = '".$date_from." 00:00:00' AND date_to = '".$date_to." 23:59:59' AND activity_venue = '".$data['activity_venue']."' AND date_given = '".$date_given." 00:00:00' AND date_generated = '".$date_generated." 00:00:00'"; 
	if ($data['opr'] != '') {
		$sql.= " AND opr = '".$data['opr']."'";
	} else {
		$sql.= " AND opr is NULL";
	}

$query = mysqli_query($conn, $sql);	

$row = 4;

while($data = mysqli_fetch_object($query)){
	$sheet->setCellValue('A'.$row , $data->attendee)
		->setCellValue('B'.$row , $data->position)
		->setCellValue('C'.$row , $data->position)
		->setCellValue('D'.$row , $data->email);
	//increment the row
	$row++;
}

//set column width
$sheet->getColumnDimension('A')->setWidth(30);
$sheet->getColumnDimension('B')->setWidth(30);
$sheet->getColumnDimension('C')->setWidth(30);
$sheet->getColumnDimension('D')->setWidth(30);

//make table headers
$sheet->setCellValue('A1' , 'List Of Participants') //this is a title
	->setCellValue('A3' , 'Participant')
	->setCellValue('B3' , 'Position')
	->setCellValue('C3' , 'Office')
	->setCellValue('D3' , 'Email')
	;

//merging the title
$sheet->mergeCells('A1:D1');

//aligning
$sheet->getStyle('A1')->getAlignment()->setHorizontal('center');

//styling
$sheet->getStyle('A1')->applyFromArray(
	array(
		'font'=>array(
			'size' => 24,
		)
	)
);
$sheet->getStyle('A3:D3')->applyFromArray(
	array(
		'font' => array(
			'bold'=>true
		)
	)
);

$today = new DateTime();
$filename = 'export_'.$today->format('Y-m-d').'.xlsx';

// $writer = new Xlsx($spreadsheet);
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="'.$filename.'"');

$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save('php://output');
