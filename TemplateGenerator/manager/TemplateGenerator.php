<?php

class TemplateGenerator
{
	
	public function insert($conn, $data) 
	{
	    $sql = "INSERT INTO template_generator (certificate_type, attendee, activity_title, date_from, date_to, activity_venue, date_given, date_generated) 
	            VALUES('".$data['certificate_type']."', '".$data['attendee']."', '".$data['activity_title']."', '".$data['date_from']."', '".$data['date_to']."', '".$data['activity_venue']."', '".$data['date_given']."', '".$data['date_generated']."')";

	    $result = mysqli_query($conn, $sql);

	    return $result;    
	}

	public function find($conn, $data) 
	{
	    $sql = "SELECT * FROM template_generator WHERE certificate_type = '".$data['certificate_type']."' AND attendee = '".$data['attendee']."' AND activity_title = '".$data['activity_title']."' AND date_from = '".$data['date_from']."' AND date_to = '".$data['date_to']."' AND activity_venue = '".$data['activity_venue']."' AND date_given = '".$data['date_given']."'";
	    
	    $result = mysqli_query($conn, $sql);
		$result = mysqli_fetch_assoc($result);

	    return $result;    
	}

	public function generateContent($data, $attendee) 
	{
		$html = '';
		
		if ($data['certificate_type'] == "CERTIFICATE OF PARTICIPATION") {
			$html = '<br><br><div style="text-align:center; font-size:10pt;">This<br>
	            <b style="font-family:Trajan Pro Bold; font-weight:bold;font-size:29pt;">'.$data['certificate_type'].'</b><br><br>
	            is hereby awarded to<br><div style="font-family:helvetica;font-weight:bold;font-size:35pt; text-align:center;">'.$attendee.'</div><br><div style="font-family:Verdana Regular;font-size:12pt; text-align:center;">in recognition of his/her active participation during the conduct of the <br><b>'.$data['activity_title'].'</b><br>held on '.$data['date_range'].' via '.$data['activity_venue'].'.<br><br>Given this <b>'.$data['date_given_day'].'</b> day of <b>'.$data['date_given_my'].'.</b></div>
	            </div>';
		} else {
			$html = '<br><br><div style="text-align:center; font-family:Verdana, sans-serif; font-size:13pt;"><br><br><br><br><b>
            is hereby given to</b><br><div style="font-family:Calibri (Body), sans-serif;font-weight:bold;font-size:48pt; text-align:center;">'.$attendee.'</div><br><div style="font-family:Verdana, sans-serif;font-size:16pt; text-align:center;">For having successfully completed <br><b>'.$data['activity_title'].'</b><br>Held on '.$data['date_range'].' via '.$data['activity_venue'].'.<br><br>Given this <b>'.$data['date_given_day'].'</b> day of <b>'.$data['date_given_my'].'.</b></div>
            </div>';
		}

		return $html;
	}
}