<?php
date_default_timezone_set('Asia/Manila');

$username = $_SESSION['username'];
$userid = $_SESSION['currentuser'];

$data['certificate_type'] = $_GET['certificate_type'];
$data['activity_title'] = $_GET['activity_title'];
$data['date_from'] = $_GET['date_from'];
$data['date_to'] = $_GET['date_to'];
$data['activity_venue'] = $_GET['activity_venue'];
$data['date_given'] = $_GET['date_given'];
$data['date_generated'] = $_GET['date_generated'];
$data['opr'] = !empty($_GET['opr']) ? $_GET['opr'] : null;


$details = fetchData($data);

function fetchData($data) {
	$conn=mysqli_connect("localhost","fascalab_2020","w]zYV6X9{*BN","fascalab_2020");
	$details = [];

	$current_date = date('Y-m-d H:i:s');
	$sql = "SELECT 
			certificate_type, 
			attendee, 
			position,
			office,
			activity_title, 
			DATE_FORMAT(date_from, '%Y-%m-%d') as date_from, 
			DATE_FORMAT(date_to, '%Y-%m-%d') as date_to, 
			activity_venue, DATE_FORMAT(date_given, '%Y-%m-%d') as date_given, 
			DATE_FORMAT(date_generated, '%Y-%m-%d') as date_generated,
			opr
			FROM template_generator
			WHERE certificate_type = '".$data['certificate_type']."' AND activity_title = '".$data['activity_title']."' AND date_from = '".$data['date_from']." 00:00:00' AND date_to = '".$data['date_to']." 23:59:59' AND activity_venue = '".$data['activity_venue']."' AND date_given = '".$data['date_given']." 00:00:00' AND date_generated = '".$data['date_generated']." 00:00:00'"; 
	if ($data['opr'] != '') {
		$sql.= "AND opr = '".$data['opr']."'";
	} else {
		$sql.= "AND opr is NULL";
	}
			
	// $sql = "SELECT count(*) FROM template_generator WHERE certificate_type = '".$data['certificate_type']."' AND attendee = '".$data['attendee']."' AND activity_title = '".$data['activity_title']."' AND date_from = '".$data['date_from']."' AND date_to = '".$data['date_to']."' AND activity_venue = '".$data['activity_venue']."' AND date_given = '".$data['date_given']."' AND opr = '".$data['opr']."'";			

	$query = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_assoc($query)) {    

 		$details[] = [
 			'certificate_type' => $row['certificate_type'],
 			'attendee' => $row['attendee'],
 			'position' => $row['position'],
 			'office' => $row['office'],
 			'activity_title' => $row['activity_title'],
 			'date_from' => $row['date_from'],
 			'date_to' => $row['date_to'],
 			'activity_venue' => $row['activity_venue'],
 			'date_given' => $row['date_given'],
 			'date_generated' => $row['date_generated'],
 			'opr' => $row['opr']
 		];

    }
   
    return $details;
}








