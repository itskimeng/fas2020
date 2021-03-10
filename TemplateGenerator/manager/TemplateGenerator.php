<?php

class TemplateGenerator
{
	
	function insert($conn,$table,$data) {
	    $sql = "INSERT INTO $table (certificate_type, attendee, activity_title, date_from, date_to, activity_venue, date_given, date_generated) 
	            VALUES('".$data['certificate_type']."', '".$data['attendee']."', '".$data['activity_title']."', '".$data['date_from']."', '".$data['date_to']."', '".$data['activity_venue']."', '".$data['date_given']."', '".$data['date_generated']."')";

	    $result = mysqli_query($conn, $sql);

	    return $result;    
	}
}