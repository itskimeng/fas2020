<?php
// session_start();
date_default_timezone_set('Asia/Manila');
	
$tasks = fetchTasks();

function fetchTasks() {
	$conn=mysqli_connect("localhost","fascalab_2020","w]zYV6X9{*BN","fascalab_2020");
	$result = [];
	$status=['Created', 'Ongoing', 'Paused', 'For Checking', 'Done'];

	foreach ($status as $stat) {
		$sql = "SELECT 
				ev.title as event_title,
				es.title as task_title,
				CONCAT(te.FIRST_M, ' ', te.LAST_M)  as emp_name,
				DATE_FORMAT(es.date_from, '%m-%d-%Y') as date_start, 
				DATE_FORMAT(es.date_to, '%m-%d-%Y') as date_end
				FROM event_subtasks es 
		        LEFT JOIN events ev on ev.id = es.event_id
		     	LEFT JOIN tblemployeeinfo te on te.EMP_N = es.emp_id
				where es.status = '".$stat."'";
		
		
		$query = mysqli_query($conn, $sql);

		$result[$stat] = mysqli_fetch_all($query, MYSQLI_ASSOC);
	}	


	return $result;
}
