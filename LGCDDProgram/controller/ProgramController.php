<?php
date_default_timezone_set('Asia/Manila');

$programs = fetchPrograms();

function fetchPrograms() {
	$conn=mysqli_connect("localhost","fascalab_2020","w]zYV6X9{*BN","fascalab_2020");
	$programs = [];
	$sql = "SELECT * FROM event_programs ORDER BY id ASC";

	$query = mysqli_query($conn, $sql);

	while ($row = mysqli_fetch_assoc($query)) {
		$programs[$row['id']] = [
			'code' => $row['code'],
			'name' => $row['name']
		];
	} 

	return $programs;  
}










