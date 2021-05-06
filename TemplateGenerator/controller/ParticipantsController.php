<?php
date_default_timezone_set('Asia/Manila');

$username = $_SESSION['username'];
$userid = $_SESSION['currentuser'];

$data['certificate_type'] = $_GET['certificate_type'];
$data['activity_title'] = $_GET['activity_title'];
$data['date_from'] = $_GET['date_from'];
$data['date_to'] = !empty($_GET['date_to']) ? $_GET['date_to'] : $_GET['date_from'];
$data['activity_venue'] = $_GET['activity_venue'];
$data['date_given'] = $_GET['date_given'];
$data['date_generated'] = $_GET['date_generated'];
$data['opr'] = !empty($_GET['opr']) ? $_GET['opr'] : null;
$data['place'] = !empty($_GET['place']) ? $_GET['place'] : null;

$details = fetchData($data);


$date_from = new DateTime($_GET['date_from']);
$date_to = new DateTime($_GET['date_to']);
// $date_issued = new DateTime($data['date_given']);
// $date_generated = new DateTime($data['date_generated']);
$dates = '';
if (empty($_GET['date_to']) OR $date_from->format('Y-m-d') == $date_to->format('Y-m-d')) {
	$dates = $date_from->format('Y-m-d');
} elseif ($date_from->format('Y-m') === $date_to->format('Y-m')) {
	$dates = $date_from->format('F d ') ." to ". $date_to->format('d, Y');
} else {
	$dates = $date_from->format('F d, Y') ."<br>". $date_to->format('F d, Y');

}



function fetchData($data) {
	$conn=mysqli_connect("localhost","fascalab_2020","w]zYV6X9{*BN","fascalab_2020");
	$details = [];

	$date_from = new DateTime($data['date_from']);
	$date_to = new DateTime($data['date_to']);
	$date_issued = new DateTime($data['date_given']);
	$date_generated = new DateTime($data['date_generated']);

    $date_from = $date_from->format('Y-m-d'); 
    $date_to = $date_to->format('Y-m-d'); 
		
	$date_issued = $date_issued->format('Y-m-d');
	$date_generated = $date_generated->format('Y-m-d');


	$current_date = date('Y-m-d H:i:s');
	$sql = "SELECT 
			id,
			certificate_type, 
			attendee, 
			position,
			office,
			activity_title, 
			DATE_FORMAT(date_from, '%Y-%m-%d') as date_from, 
			DATE_FORMAT(date_to, '%Y-%m-%d') as date_to, 
			activity_venue, DATE_FORMAT(date_given, '%Y-%m-%d') as date_given, 
			DATE_FORMAT(date_generated, '%Y-%m-%d') as date_generated,
			opr, 
			email
			FROM template_generator
			WHERE certificate_type = '".$data['certificate_type']."' AND activity_title = '".$data['activity_title']."' AND date_from = '".$date_from." 00:00:00' AND date_to = '".$date_to." 23:59:59' AND activity_venue = '".$data['activity_venue']."' AND date_given = '".$date_issued." 00:00:00' AND date_generated = '".$date_generated." 00:00:00'"; 
	if ($data['opr'] != '') {
		$sql.= "AND opr = '".$data['opr']."'";
	} else {
		$sql.= "AND opr is NULL";
	}
			
	// $sql = "SELECT count(*) FROM template_generator WHERE certificate_type = '".$data['certificate_type']."' AND attendee = '".$data['attendee']."' AND activity_title = '".$data['activity_title']."' AND date_from = '".$data['date_from']."' AND date_to = '".$data['date_to']."' AND activity_venue = '".$data['activity_venue']."' AND date_given = '".$data['date_given']."' AND opr = '".$data['opr']."'";			

	$query = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_assoc($query)) {    
    	

 		$details[] = [
 			'id' => $row['id'],
 			'attendee' => $row['attendee'],
 			'position' => $row['position'],
 			'office' => $row['office'],
 			'email' => $row['email']
 		];

    }
   	
    return $details;
}








