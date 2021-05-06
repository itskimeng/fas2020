<?php
	session_start();
	date_default_timezone_set('Asia/Manila');

	$filename = "list_of_participants.csv";
	$fp = fopen('php://output', 'w');

	header('Content-type: application/csv');
	header('Content-Disposition: attachment; filename='.$filename);

	fputcsv($fp, ['PARTICIPANTS', 'POSITION', 'OFFICE']);
	fputcsv($fp, ["* Don't forget to remove the sample data before inserting real data!", " ", " "]);
	fputcsv($fp, ["Mark Kim Sacluti", "Database Administrator", "FAD-RICTU"]);

	exit;