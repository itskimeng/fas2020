<?php
date_default_timezone_set('Asia/Manila');

$username = $_SESSION['username'];
$userid = $_SESSION['currentuser'];

$today = new DateTime();
$date_today = $today->format('m-d-Y');

$data = fetchData($userid);

$offices = getOffices();

$title_opts = [];
foreach ($data as $key => $dd) {
	$title_opts[$dd['activity_title']] = $dd['activity_title'];
}

$venue_opts = [];
foreach ($data as $key => $dd) {
	$venue_opts[$dd['activity_venue']] = $dd['activity_venue'];
}

$opr_opts = [];
foreach ($data as $key => $dd) {
	$opr_opts[$dd['opr']] = $dd['opr'];
}

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
		selected_dates as selected_dates,
		opr,
		issued_place,
		send_counter
		FROM template_generator
		GROUP BY activity_title, date_from, date_to, activity_venue, date_given, date_generated, opr, issued_place
		ORDER BY id DESC"; 	

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

		$ssd = explode(' ',$row['selected_dates']);
		$ssr = implode('-',$ssd);

    	
 		$data[] = [
 			'certificate_type' => $row['certificate_type'],
 			'attendee' => $row['attendee'],
 			'activity_title' => $row['activity_title'],
 			'date_from' => !empty($row['selected_dates']) ? '' : $date1,
 			'date_to' => !empty($row['selected_dates']) ? '' : $date2,
 			'activity_venue' => $row['activity_venue'],
 			'date_given' => $date_issued,
 			'date_generated' => $date_generated,
 			'opr' => $row['opr'],
 			'place' => $row['issued_place'],
 			'send_counter' => $row['send_counter'],
 			'date_type' => !empty($row['selected_dates']) ? 'selected' : 'range',
 			'selected_date_format' => !empty($row['selected_dates']) ? $row['selected_dates'] : '',
 			'selected_dates' => $ssr
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

function getOffices()
{ 
	$conn=mysqli_connect("localhost","fascalab_2020","w]zYV6X9{*BN","fascalab_2020");
	$data = [];
  $output = '';
  $sql = "SELECT DIVISION_N, DIVISION_M FROM tblpersonneldivision WHERE DIVISION_M IS NOT NULL AND DIVISION_N != 0 ORDER BY DIVISION_M ASC  ";

  $query = mysqli_query($conn, $sql);
  
  while ($row = mysqli_fetch_assoc($query)) {    

  	$data[$row["DIVISION_M"]] = $row["DIVISION_M"];
  }

  return $data;
}








