<?php

class TemplateGenerator
{
	
	public function insert($conn, $data) 
	{
	    $sql = "INSERT INTO template_generator (certificate_type, attendee, activity_title, date_from, date_to, activity_venue, date_given, date_generated, opr, position, office, issued_place) 
	            VALUES('".$data['certificate_type']."', '".utf8_encode($data['attendee'])."', '".utf8_encode($data['activity_title'])."', '".$data['date_from']."', '".$data['date_to']."', '".utf8_encode($data['activity_venue'])."', '".$data['date_given']."', '".$data['date_generated']."', '".utf8_encode($data['opr'])."', '".utf8_encode($data['attendee_position'])."', '".utf8_encode($data['attendee_office'])."', '".utf8_encode($data['issued_place'])."')";

	    $result = mysqli_query($conn, $sql);

	    return $result;    
	}

	public function find($conn, $data) 
	{
	    $sql = "SELECT count(*) as count 
	    	FROM template_generator WHERE 
	    	certificate_type = '".$data['certificate_type']."' 
	    	AND attendee = '".utf8_encode($data['attendee'])."' 
	    	AND position = '".utf8_encode($data['attendee_position'])."' 
	    	AND office = '".utf8_encode($data['attendee_office'])."' 
	    	AND activity_title = '".utf8_encode($data['activity_title'])."'
	    	AND date_from = '".$data['date_from']."'
	    	AND date_to = '".$data['date_to']."'
	    	AND activity_venue = '".$data['activity_venue']."'
	    	AND date_given = '".$data['date_given']."'
	    	AND date_generated = '".$data['date_generated']."'
	    	AND issued_place = '".$data['issued_place']."'";

	    $result = mysqli_query($conn, $sql);
	    $results = mysqli_fetch_array($result);

	    return $results['count'] > 0;    
	}

	public function generateContent($data, $attendee) 
	{
		$html = '';

		if ($data['certificate_type'] == "CERTIFICATE OF PARTICIPATION") {
			$html = '<br><br>';
			$html.= '<div style="text-align:center; font-size:10pt;">';
			$html.= 'This';
			$html.= '<br>';
			$html.= '<b style="font-family:Trajan Pro Bold; font-weight:bold;font-size:29pt;">';
			$html.= $data['certificate_type'];
			$html.= '</b><br><br>';
			$html.= 'is hereby awarded to<br>';
			$html.= '<div style="font-family:helvetica;font-weight:bold;font-size:35pt; text-align:center;">';
			$html.= $attendee;
			$html.= '</div><br>';
			$html.= '<div style="font-family:Verdana Regular;font-size:12pt; text-align:center;">';
			$html.= 'in recognition of his/her active participation during the conduct of the <br>';
			$html.= '<b>';
			$html.= $data['activity_title'].'</b><br>';
			$html.= 'held on ';
			$html.= $data['date_range'];
			$html.= ' via '.$data['activity_venue'];
			$html.= '.<br><br>Given this <b>'.$data['date_given_day'].'</b> day of <b>'.$data['date_given_my'].'.</b></div>
	            </div>';
		} elseif ($data['certificate_type'] == "CERTIFICATE OF APPRECIATION") {
			$html = '<br><br>';
			$html.= '<div style="text-align:center; font-size:11pt;">';
			$html.= 'This';
			$html.= '<br>';
			$html.= '<b style="font-family:Trajan Pro Bold; font-weight:bold;font-size:29pt;">';
			$html.= $data['certificate_type'];
			$html.= '</b><br><br>';
			$html.= 'is hereby awarded to<br>';
			$html.= '<div style="font-family:helvetica;font-weight:bold;font-size:35pt; text-align:center;">';
			$html.= $attendee;
			$html.= '</div><br>';
			$html.= '<div style="font-family:Verdana Regular;font-size:13pt; text-align:center;">';
			$html.= 'In recognition of his/her valuable contribution as a <b>Resource Speaker</b> <br>';
			$html.= 'during the conduct of the ';
			$html.= '<b>';
			$html.= $data['activity_title'].'</b><br>';
			$html.= 'held on ';
			$html.= $data['date_range'];
			$html.= ' at '.$data['activity_venue'];
			$html.= '.<br><br>Awarded this <b>'.$data['date_given_day'].'</b> day of <b>'.$data['date_given_my'].'</b> at <b>'.$data['issued_place'].'</b></div>
	            </div>';
		} else {
			$html = '<br><br><div style="text-align:center; font-family:Verdana, sans-serif; font-size:13pt;"><br><br><br><br><b>
            is hereby given to</b><br><div style="font-family:Calibri (Body), sans-serif;font-weight:bold;font-size:48pt; text-align:center;">'.$attendee.'</div><br><div style="font-family:Verdana, sans-serif;font-size:16pt; text-align:center;">For having successfully completed <br><b>'.$data['activity_title'].'</b><br>Held on '.$data['date_range'].' via '.$data['activity_venue'].'.<br><br>Given this <b>'.$data['date_given_day'].'</b> day of <b>'.$data['date_given_my'].'.</b></div>
            </div>';
		}

		return $html;
	}

	public function getCSVData($files) 
	{
		$row = 0;
		$data = [];
	    if (($handle = fopen($files, "r")) !== FALSE) {
	        while (($csv = fgetcsv($handle, 1000, ",")) !== FALSE) {
	            // if not header
	            if ($row > 0) {
	                $data[] = $csv; 
	            }
	            $row++;
	        }
	        fclose($handle);
	    }

	    return $data;
	}

	public function exportCSV($conn, $sql) 
	{
		$filename = "list_of_participants.csv";
		$fp = fopen('php://output', 'w');

		header('Content-type: application/csv');
		header('Content-Disposition: attachment; filename='.$filename);


		$result = mysqli_query($conn, $sql);
		while($row = mysqli_fetch_row($result)) {
			$training = $row[1];
			$date_from = $row[3];
			$date_to = $row[4];
			$venue = $row[5];
			$date_issued = $row[6];
			$date_generated = $row[7];
			$opr = $row[8];
		}

		$date_from = new DateTime($date_from);
		$date_to = new DateTime($date_to);
		$db_datefrom = $date_from;
		$db_dateto = $date_to;
		$date_given = new DateTime($date_issued);
		$db_dategiven = $date_given;
		$date_generated = new DateTime($date_generated);


		if ($date_from->format('Y-m-d') == $date_to->format('Y-m-d')) {
		    $dates = $date_to->format('F d, Y'); 
		} elseif ($date_from->format('Y-m') === $date_to->format('Y-m')) {
		    $dates = $date_from->format('F d ') .' to '. $date_to->format('d, Y'); 
		} else {
		    $dates = $date_from->format('F d, Y') .' and '. $date_to->format('F d, Y');
		}

		$date_from = $date_from->format('F d, Y');
		$date_to = $date_to->format('F d, Y');
		$date_given_day = $date_given->format('F d, Y');
		$date_given_my = $date_generated->format('F d, Y');

		$details_tr[] = 'Training: ';
		$details_tr[] = $training;
		fputcsv($fp, $details_tr);
		
		$details_opr[] = 'OPR: ';
		$details_opr[] = $opr;
		fputcsv($fp, $details_opr);

		$details_venue[] = 'Venue: ';
		$details_venue[] = $venue;
		fputcsv($fp, $details_venue);

		$details_timeline[] = 'Activity Timeline: ';
		$details_timeline[] = $dates;
		fputcsv($fp, $details_timeline);

		$details_issued[] = 'Date Issued: ';
		$details_issued[] = $date_given_day;
		fputcsv($fp, $details_issued);

		$details_generated[] = 'Date Generated: ';
		$details_generated[] = $date_given_my;
		fputcsv($fp, $details_generated);

		$spacing1[] = ' ';		
		fputcsv($fp, $spacing1);

		$spacing2[] = ' ';		
		fputcsv($fp, $spacing2);

		fputcsv($fp, ['PARTICIPANTS', 'POSITION', 'OFFICE']);

		$result = mysqli_query($conn, $sql);
		while($row = mysqli_fetch_row($result)) {
			$data[] = [
				'attendee' => trim($row[2]),
				'position' => $row[9],
				'office' => $row[10]
			];
		}
	
		foreach ($data as $key => $dd) {
			fputcsv($fp, $dd);
		}

		return 0;
	}
}