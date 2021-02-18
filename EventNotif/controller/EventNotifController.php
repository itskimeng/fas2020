<?php
date_default_timezone_set('Asia/Manila');

$user = $_SESSION['currentuser'];
$notifs = fetchNotifications($user);
$notifs_forchecking = fetchForCheckingNotifications($user);
$counter = count($notifs) + count($notifs_forchecking);


function fetchNotifications($id = '') {

	$conn=mysqli_connect("localhost","fascalab_2020","w]zYV6X9{*BN","fascalab_2020");
	$data = [];

	$sql = "SELECT evp.id as evp_id, evp.planner_id as pln_id, evp.id as task_id, evp.emp_id as emp_id, evp.message as message, evp.code as code, es.status as status, DATE_FORMAT(evp.date_created, '%Y-%m-%d %h:%i:%s') as date_created, CONCAT(te.FIRST_M, ' ', te.LAST_M) as emp_name
		FROM event_notif evp
	    LEFT JOIN event_subtasks es on es.id = evp.task_id
	    JOIN tblemployeeinfo te on te.EMP_N = es.posted_by
		where evp.emp_id = $id AND es.status = 'Created' AND es.is_new = TRUE"; 
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

	    $data[$row['evp_id']] = [
	    	'pln_id' => $row['pln_id'],
	    	'task_id' => $row['task_id'],
	    	'emp_id' => $row['emp_id'],
	    	'emp_name' => $row['emp_name'],
	    	'message' => mb_strimwidth($row['message'], 0, 40, "..."),
	    	'code' => $row['code'],
	    	'status' => $row['status'],
	    	'interval' => $date_interval
	    ];
	}

	return $data;
}

function fetchForCheckingNotifications($id = '') {

	$conn=mysqli_connect("localhost","fascalab_2020","w]zYV6X9{*BN","fascalab_2020");
	$data = [];

	$sql = "SELECT evp.id as evp_id, evp.planner_id as pln_id, evp.id as task_id, evp.emp_id as emp_id, evp.message as message, evp.code as code, es.status as status, DATE_FORMAT(evp.date_created, '%Y-%m-%d %h:%i:%s') as date_created, CONCAT(te.FIRST_M, ' ', te.LAST_M) as emp_name
		FROM event_notif evp
	    LEFT JOIN event_subtasks es on es.id = evp.task_id
	    LEFT JOIN tblemployeeinfo te on te.EMP_N = es.posted_by
		where es.posted_by = $id AND es.status = 'For Checking'"; 

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

	    $data[$row['evp_id']] = [
	    	'pln_id' => $row['pln_id'],
	    	'task_id' => $row['task_id'],
	    	'emp_id' => $row['emp_id'],
	    	'emp_name' => $row['emp_name'],
	    	'message' => mb_strimwidth($row['message'], 0, 40, "..."),
	    	'code' => $row['code'],
	    	'status' => $row['status'],
	    	'interval' => $date_interval
	    ];
	}	

	return $data;
}









