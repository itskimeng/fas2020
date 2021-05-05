<?php

// require_once '../manager/TemplateGenerator.php';

date_default_timezone_set('Asia/Manila');

$username = $_SESSION['username'];
$userid = $_SESSION['currentuser'];

$data = fetchData($userid);

function fetchData($currentuser='') {
	$conn=mysqli_connect("localhost","fascalab_2020","w]zYV6X9{*BN","fascalab_2020");
	// $template_generator = new TemplateGenerator();
	$data = [];

	$current_date = date('Y-m-d H:i:s');
	$sql = "SELECT 
		certificate_type, 
		attendee, 
		activity_title, 
		DATE_FORMAT(date_from, '%Y-%m-%d') as date_from, 
		DATE_FORMAT(date_to, '%Y-%m-%d') as date_to, 
		activity_venue, 
		DATE_FORMAT(date_given, '%Y-%m-%d') as date_given, 
		DATE_FORMAT(date_generated, '%Y-%m-%d') as date_generated,
		opr
		FROM template_generator
		GROUP BY activity_title, date_from, date_to, activity_venue, date_given, date_generated, opr
		ORDER BY id"; 	

	$query = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_assoc($query)) {    
    	
 		$data[] = [
 			'certificate_type' => $row['certificate_type'],
 			'attendee' => $row['attendee'],
 			'activity_title' => $row['activity_title'],
 			'date_from' => $row['date_from'],
 			'date_to' => $row['date_to'],
 			'activity_venue' => $row['activity_venue'],
 			'date_given' => $row['date_given'],
 			'date_generated' => $row['date_generated'],
 			'opr' => $row['opr']
 		];

    }
   
    return $data;
}


function fetchData2($currentuser='') {
	$conn=mysqli_connect("localhost","fascalab_2020","w]zYV6X9{*BN","fascalab_2020");
	$data = [];

	$current_date = date('Y-m-d H:i:s');
	$sql = "SELECT certificate_type, attendee, activity_title, DATE_FORMAT(date_from, '%Y-%m-%d') as date_from, DATE_FORMAT(date_to, '%Y-%m-%d') as date_to, activity_venue, DATE_FORMAT(date_given, '%Y-%m-%d') as date_given, DATE_FORMAT(date_generated, '%Y-%m-%d') as date_generated
	FROM template_generator"; 	

	$query = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_assoc($query)) {    

 		$data[] = [
 			'certificate_type' => $row['certificate_type'],
 			'attendee' => $row['attendee'],
 			'activity_title' => $row['activity_title'],
 			'date_from' => $row['date_from'],
 			'date_to' => $row['date_to'],
 			'activity_venue' => $row['activity_venue'],
 			'date_given' => $row['date_given'],
 			'date_generated' => $row['date_generated']
 		];

    }
   
    return $data;
}








