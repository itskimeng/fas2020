<?php

$title = $_GET['title'];
$venue = $_GET['venue'];
$opr = $_GET['opr'];
$activity_date = explode('-', $_GET['activity_date']);;
$date_issued = !empty($_GET['date_issued']) ? new DateTime($_GET['date_issued']) : '';
$date_generated = !empty($_GET['date_generated']) ? new DateTime($_GET['date_generated']) : '';

$date_from = new DateTime($activity_date[0]);
$date_to = new DateTime($activity_date[1]);

$data = [
	'title' => $title,
	'venue' => $venue,
	'opr' => $opr,
	'date_from' => $date_from->format('Y-m-d 00:00:00'),
	'date_to' => $date_to->format('Y-m-d 23:59:59'),
	'date_issued' => !empty($date_issued) ? $date_issued->format('Y-m-d') : '',
	'date_generated' => !empty($date_generated) ? $date_generated->format('Y-m-d') : ''
];

$results = fetchData($data);

echo $results;

function fetchData($data) {
	$conn = mysqli_connect("localhost","fascalab_2020","w]zYV6X9{*BN","fascalab_2020");
	$details = [];
	$date_from = $data['date_from'];
	$date_tos = $data['date_to'];

	$sql = "SELECT certificate_type, attendee, activity_title, DATE_FORMAT(date_from, '%Y-%m-%d') as date_from, DATE_FORMAT(date_to, '%Y-%m-%d') as date_to, activity_venue, DATE_FORMAT(date_given, '%Y-%m-%d') as date_given, DATE_FORMAT(date_generated, '%Y-%m-%d') as date_generated, opr, issued_place 
		FROM template_generator 
		WHERE date_from >= '$date_from' AND date_to <= '$date_tos'";

	if (!empty($data['title'])) {
		$sql.= " AND activity_title = '".$data['title']."'"; 
	}	

	if (!empty($data['venue'])) {
		$sql.= " AND activity_venue = '".$data['venue']."'"; 
	}

	if (!empty($data['opr'])) {
		$sql.= " AND opr = '".$data['opr']."'"; 
	}	

	if (!empty($data['date_issued'])) {
		$sql.= " AND date_given = '".$data['date_issued']."'"; 
	}	

	if (!empty($data['date_generated'])) {
		$sql.= " AND date_generated = '".$data['date_generated']."'"; 
	}

	$sql.= " GROUP BY activity_title, date_from, date_to, activity_venue, date_given, date_generated, opr, issued_place ORDER BY id"; 	

	$query = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_assoc($query)) {    
    	$date1 = '';
    	$date2 = '';
    	$date_from = new DateTime($row['date_from']);
		$date_to = new DateTime($row['date_to']);
		$date_issued = new DateTime($row['date_given']);
		$date_generated = new DateTime($row['date_generated']);

		if ($date_from->format('Y-m-d') == $date_to->format('Y-m-d')) {
		    $date1 = $date_to->format('F d, Y');
		} elseif ($date_from->format('Y-m') === $date_to->format('Y-m')) {
		    $date1 = $date_from->format('F d, Y');
		    $date2 = $date_to->format('F d, Y'); 
		} else {
		    $date1 = $date_from->format('F d, Y');
		    $date2 = $date_to->format('F d, Y');
		}

		$date_issued = $date_issued->format('F d, Y');
		$date_generated = $date_generated->format('F d, Y');
    	
 		$details[] = [
 			'certificate_type' => $row['certificate_type'],
 			'attendee' => $row['attendee'],
 			'activity_title' => $row['activity_title'],
 			'date_from' => $date1,
 			'date_to' => $date2,
 			'activity_venue' => $row['activity_venue'],
 			'date_issued' => $date_issued,
 			'date_generated' => $date_generated,
 			'opr' => $row['opr'],
 			'place' => $row['issued_place']
 		];

    }
   
    return json_encode($details);
}