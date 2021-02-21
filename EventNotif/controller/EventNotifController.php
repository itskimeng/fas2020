<?php
session_start();
date_default_timezone_set('Asia/Manila');

$user = $_SESSION['currentuser'];
$notifs = fetchNotifications($user);
$counter = count($notifs);
$data['notifs'] = $notifs;
$data['counter'] = $counter;

return $data;

function fetchNotifications($id = '') {

	$conn=mysqli_connect("localhost","fascalab_2020","w]zYV6X9{*BN","fascalab_2020");
	$data = [];

	$sql = "SELECT 
		notif.id as id, 
		notif.planner_id as planner_id, 
		notif.task_id as task_id, 
		notif.receiver as emp_id, 
		notif.message as message, 
		notif.code as code, 
		notif.status as status, 
		notif.type as type,
		notif.posted_by as posted_by,
		DATE_FORMAT(notif.date_created, '%Y-%m-%d %H:%i:%s') as date_created, 
		creator.FIRST_M as emp_fname,
		creator.LAST_M as emp_lname,
		creator.profile as profile
		FROM event_notif notif
	    JOIN tblemployeeinfo creator on creator.EMP_N = notif.posted_by
	    JOIN tblemployeeinfo rcvr on rcvr.EMP_N = notif.receiver
		where notif.receiver = $id AND notif.is_read = FALSE AND notif.status IN ('Created','For Checking', 'Done') ";
 
	$query = mysqli_query($conn, $sql);

	$start_date = new DateTime();	

	while ($row = mysqli_fetch_assoc($query)) {
		
		$since_start = $start_date->diff(new DateTime($row['date_created']));
		$date_interval = $since_start->s.' seconds';

		if ($since_start->d > 0) {
			$date_interval = $since_start->d.' days';
		} elseif ($since_start->h > 0) {
			$date_interval = $since_start->h.' hours';
		} elseif ($since_start->i > 0) {
			$date_interval = $since_start->i.' minutes';
		}

		$profile = ''; 
		if (strpos($row['profile'], '.png') || strpos($row['profile'], '.jpg') || strpos($row['profile'], '.jpeg')) {
			$profile = $row['profile']; 
 		}

	    $data[] = [
	    	'id' => $row['id'],
	    	'planner_id' => $row['planner_id'],
	    	'task_id' => $row['task_id'],
	    	'emp_id' => $row['emp_id'],
	    	'emp_name' => $row['emp_fname'] .' '.$row['emp_lname'],
	    	'message' => mb_strimwidth($row['message'], 0, 40, "..."),
	    	'code' => $row['code'],
	    	'status' => $row['status'],
	    	'interval' => $date_interval,
			'initials' => $row['emp_fname'][0] .''.$row['emp_lname'][0],
			'profile' => $profile
	    ];
	}

	return $data;
}









