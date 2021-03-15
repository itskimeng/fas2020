<?php

class TemplateGenerator
{
	
	function insert($conn, $data) {
	    $sql = "INSERT INTO template_generator (certificate_type, attendee, activity_title, date_from, date_to, activity_venue, date_given, date_generated) 
	            VALUES('".$data['certificate_type']."', '".$data['attendee']."', '".$data['activity_title']."', '".$data['date_from']."', '".$data['date_to']."', '".$data['activity_venue']."', '".$data['date_given']."', '".$data['date_generated']."')";

	    $result = mysqli_query($conn, $sql);

	    return $result;    
	}

	function find($conn, $data) {
	    $sql = "SELECT * FROM template_generator WHERE certificate_type = '".$data['certificate_type']."' AND attendee = '".$data['attendee']."' AND activity_title = '".$data['activity_title']."' AND date_from = '".$data['date_from']."' AND date_to = '".$data['date_to']."' AND activity_venue = '".$data['activity_venue']."' AND date_given = '".$data['date_given']."'";
	    
	    $result = mysqli_query($conn, $sql);
		$result = mysqli_fetch_assoc($result);

	    return $result;    
	}
}