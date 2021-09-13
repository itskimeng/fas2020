<?php 
/**
 * 
 */
class Dashboard
{
	public $division = '';
	public $conn = '';
	public $color = '';
	public $gender_opts = '';
	public $type_opts = '';


	function __construct() 
	{
		$this->division = $_SESSION['division'];
        $this->conn = mysqli_connect("localhost","fascalab_2020","w]zYV6X9{*BN","fascalab_2020");
        $this->color = [0 => 'bg-green', 1 => 'bg-yellow', 2 => 'bg-aqua'];
        $this->gender_opts = [0=>'Male', 1=>'Female'];
        $this->types_opts = [0=>'Yes', 1=>'No'];
	}

	public function getProcurements() 
	{
		$pmo = $this->divisionChecker($this->division);

		$sql = "SELECT pur.id as pr_id, pur.pr_no as pr_no, DATE_FORMAT(pur.pr_date, '%m/%d/%Y') as pr_date, pur.pmo as pr_pmo, pur.purpose as pr_purpose, DATE_FORMAT(pur.target_date, '%m/%d/%Y') as pr_target_date FROM pr pur where pur.pmo='$pmo' order by pur.id desc LIMIT 5";
		    
		$query = mysqli_query($this->conn, $sql);
		$data = [];

		while ($row = mysqli_fetch_assoc($query)) {
			$pr_no = $row['pr_no'];
			$pr_id = $row['pr_id'];
			$rfqs = [];

			$data[$row['pr_id']] = [
			  'pr_id' => $row['pr_id'],
			  'pr_no' => $row['pr_no'],
			  'pr_date' => $row['pr_date'],
			  'pr_pmo' => $row['pr_pmo'],
			  'pr_purpose' => $row['pr_purpose'],
			  'pr_target_date' => $row['pr_target_date'],
			  'rfqs' => $rfqs
			];

			$sql2 = "SELECT id, rfq_no, rfq_date FROM rfq where pr_no = '$pr_no'";
			$query2 = mysqli_query($this->conn, $sql2);  

			while ($row2 = mysqli_fetch_assoc($query2)) {
				$rfqs[] = [
					'id' => $row2['id'],
					'rfq_no' => $row2['rfq_no'],
					'rfq_date' => $row2['rfq_date']
				];

			  $data[$pr_id]['rfqs'] = $rfqs;
			}
		}		
		
		return $data;
	}

	public function getCalendarEvents() {
		$data = [];
		$color = $this->color;
		$count = 0;

		// $sql = "SELECT e.id as id, e.start as date_start, e.end as date_end, e.title as title, e.venue as venue, tp.DIVISION_M as office FROM events e LEFT JOIN tblpersonneldivision tp on tp.DIVISION_N = e.office ORDER BY e.id DESC LIMIT 3";

		$sql = "SELECT e.id as id, e.start as date_start, e.end as date_end, e.title as title, e.venue as venue, tp.DIVISION_M as office FROM events e LEFT JOIN tblpersonneldivision tp on tp.DIVISION_N = e.office ORDER BY e.start DESC LIMIT 3";

		$query = mysqli_query($this->conn, $sql);

		while ($row = mysqli_fetch_assoc($query)) {
			$data[] = [
			  'color' => $color[$count],
			  'month' => date('M',strtotime($row['date_start'])),
			  'day' => date('d',strtotime($row['date_start'])),
			  'title' => $row['title'],
			  'venue' => $row['venue'],
			  'office' => $row['office']
			];
			$count++;
		}

		return $data;
	}

	public function getIssuances() {
		$sql = "SELECT id,issuance_no,subject FROM issuances ORDER BY id DESC LIMIT 3";

		$data = [];
		$query = mysqli_query($this->conn, $sql);
      	
      	while ($row = mysqli_fetch_array($query)) {
        	$data[] = [
        		'id' => $row['id'],
        		'issuance_no' => $row['issuance_no'],
        		'subject' => $row['subject']
        	];
    	}

    	return $data;
	}

	public function getObligations() {
		$data = [];
		$sql = "SELECT * FROM saroob where status = 'Obligated' group by ors desc  order by date desc LIMIT 5";

		$query = mysqli_query($this->conn, $sql);
        
        while ($row = mysqli_fetch_assoc($query)) {
			// date released
			if ($row["datereceived"] == '0000-00-00') {
				$datereceived11 = '';
			} else {
				$datereceived11 = date('F d, Y', strtotime($row["datereceived"]));
			}

			// date processed 
			if ($row["datereprocessed"] == '0000-00-00') {
				$datereprocessed11 = '';
			} else {
				$datereprocessed11 = date('F d, Y', strtotime($row["datereprocessed"]));
			}

			// date released
			if ($row["datereleased"] == '0000-00-00') {
				$datereleased11 = '';
			} else {
				$datereleased11 = date('F d, Y', strtotime($row["datereleased"]));
			}

			$data[] = [
				'id' => $row['id'],
				'date_received' => $datereceived11,
				'date_processed' => $dateprocessed11,
				'date_released' => $datereleased11,
				'ors' => $row["ors"],
				'ponum' => $row["ponum"],
				'payee' => $row["payee"],
				'particular' => $row["particular"],
				'saronumber' => $row["saronumber"],
				'ppa' => $row["ppa"],
				'uacs' => $row["uacs"],
				'amount1' => $row["amount"],
				'amount' => number_format($row["amount"], 2),
				'date' => $row["date"],
				'remarks' => $row["remarks"],
				'sarogroup' => $row["sarogroup"],
				'status' => $row["status"]
			];
		}
         
        return $data;	
	}

	public function getEmployees() {
		$sql = 'SELECT dd.DIVISION_N as id, dd.division_m as name, count(dd.DIVISION_N) as counter
				FROM tblemployeeinfo emp
				LEFT JOIN tblpersonneldivision dd on dd.DIVISION_N = emp.DIVISION_C
				group by emp.division_c';

		$query = mysqli_query($this->conn, $sql);
		$data = [];

    	while ($row = mysqli_fetch_assoc($query)) {
    		$division = $this->divisionChecker($row['id']);

    		if (!empty($division)) {
	    		if (array_key_exists($division, $data)) {
	    			$total = $data[$division] + $row['counter'];
	    			$data[$division] = $total > 9 ? $total : '0'.$total; 
	    		} else {
	    			$data[$division] = $row['counter'] > 9 ? $row['counter'] : '0'.$row['counter'];
	    		}
    		}
    	}
    	
  		return $data;
	}

	public function getOverviews() {
		$genders = $this->gender_opts;
		$types = $this->types_opts;
		$data = [];

		foreach ($types as $key =>$type) {
			$gg = [];
			$total = 0;
			foreach ($genders as $index => $gender) {
				$sql = "SELECT count(*) as count FROM tblemployeeinfo WHERE SEX_C = '$gender' AND ACTIVATED = '$type'";
				$query = mysqli_query($this->conn, $sql);
	        	$result = mysqli_fetch_array($query);
	        	$gg[$gender] = $result['count'] > 9 ? $result['count'] : '0'.$result['count'];
	        	$total += $result['count'];
			}
        	$title = $key == 0 ? 'regular' : 'contractual';
        	
        	$data[$title] = $gg;
     		$data[$title]['total'] = $total > 9 ? $total : '0'.$total; 
		}

		return $data;
	}

	public function getRODepartmentTotal() {
		$sql = "SELECT count(*) as count FROM tblemployeeinfo WHERE OFFICE_STATION = 1";
      	$query = mysqli_query($this->conn, $sql);
      	$result = mysqli_fetch_array($query);
      	$data = $result['count'];

      	return $data;
	}

	public function getRegionalOfficeTotal() {
		$genders = $this->gender_opts;
		$types = $this->types_opts;
		$data = [];

		foreach ($types as $key =>$type) {
			$gg = [];
			$total = 0;
			foreach ($genders as $index => $gender) {
				$sql = "SELECT count(*) as count FROM tblemployeeinfo WHERE SEX_C = '$gender' AND ACTIVATED = '$type' AND OFFICE_STATION = 1";
				$query = mysqli_query($this->conn, $sql);
	        	$result = mysqli_fetch_array($query);
	        	$gg[$gender] = $result['count'] > 9 ? $result['count'] : '0'.$result['count'];
	        	$total += $result['count'];
			}
        	$title = $key == 0 ? 'regular' : 'contractual';
        	
        	$data[$title] = $gg;
     		$data[$title]['total'] = $total > 9 ? $total : '0'.$total;
		}

		return $data;
	}

	public function getProvinces($province) {
		$genders = $this->gender_opts;
		$types = $this->types_opts;
		$locations = $this->getLocation($province);
		$data = [];

		foreach ($types as $key =>$type) {
			$gg = [];
			$total = 0;
			foreach ($genders as $index => $gender) {
				$sql = "SELECT count(*) as count FROM tblemployeeinfo WHERE SEX_C = '$gender' AND ACTIVATED = '$type' AND DIVISION_C IN $locations";
				
				$query = mysqli_query($this->conn, $sql);
	        	$result = mysqli_fetch_array($query);
	        	$gg[$gender] = $result['count'] > 9 ? $result['count'] : '0'.$result['count'];
	        	$total += $result['count'];
			}
        	$title = $key == 0 ? 'regular' : 'contractual';
        	
        	$data[$title] = $gg;
     		$data[$title]['total'] = $total > 9 ? $total : '0'.$total; 
		}
		
		return $data;	
	}

	public function getLocation($province) {
		$locations = [];
		switch ($province) {
			case 'Batangas':
				$locations = [19,28,29,30,44];
				break;
			case 'Cavite':
				$locations = [20,34,35,36,45];
				break;
			case 'Laguna':
				$locations = [21,40,41,42,47,51,52];
				break;
			case 'Rizal':
				$locations = [23,37,38,39,46,50];
				break;
			case 'Quezon':
				$locations = [22,31,32,33,48,49,53];
				break;
			case 'Lucena':
				$locations = [24];
				break;
		}

		$locations = '('.implode(',', $locations).')';

		return $locations;
	}

	public function getPayments() {
		$data = [];
		$sql = "SELECT * FROM ntaob where status ='Paid' order by id desc LIMIT 3";
		$view_query = mysqli_query($this->conn, $sql);

		while ($row = mysqli_fetch_assoc($view_query)) {
			$data[] = $row;
		}

		return $data;
	}

	public function getAnnouncements() {
		$data = [];
		$sql = "SELECT 
				tp.DIVISION_M,
				te.PROFILE,
				DATE_FORMAT(a.date, '%Y-%m-%d') as posted_date,
				a.id,
				a.posted_by,
				a.content,
				a.title,
				CONCAT(te.FIRST_M,' ',te.MIDDLE_M,' ',te.LAST_M) as fname  
				FROM announcementt a 
				LEFT JOIN tblemployeeinfo te on te.UNAME = a.posted_by 
				LEFT JOIN tblpersonneldivision tp on tp.DIVISION_N = te.DIVISION_C 
				ORDER BY id DESC";

		$query = mysqli_query($this->conn, $sql);
                          
        while ($row = mysqli_fetch_assoc($query)) {
            
            $profile = $row["PROFILE"];  
            $extension = pathinfo($profile, PATHINFO_EXTENSION);
 			$profile = $this->fileChecker($profile, $extension);

        	$data[] = [
        		'id' => $row["id"],
        		'division' => $row["DIVISION_M"],
            	'fname' => $row["fname"],
            	'posted_by' => $row["posted_by"],  
            	'content' => $row["content"],  
            	'title' => $row["title"]  ,
            	'posted_date' => $row["posted_date"],
            	'profile' => $profile
        	];	  
        }

        return $data;
	}

	public function fileChecker($profile, $extension) {
		if (file_exists($profile)) {
          switch ($extension) {
            case 'jpg':
              if (empty($profile)) {
                $profile = 'images/male-user.png';
              }
              break;

            case 'JPG':
              if (empty($profile)) {
                $profile = 'images/male-user.png';
              }
              break;

            case 'jpeg':
              if (empty($profile)) {
                $profile = 'images/male-user.png';
              }
              break;
            case 'png':
              if (empty($profile)) {
                $profile ='images/male-user.png';
              }
              break;
            default:
              $profile ='images/male-user.png';
              break;
          }
        } else {
         $profile ='images/male-user.png';
        }

        return $profile;
	}

	public function divisionChecker($division) {
	    $user_id = '';
	    switch ($division) {
	      case '10': case '11': case '12': case '13': 
	      case '14': case '15': case '16':
	        $user_id = 'FAD';
	        break;
	      case '3': case '5': case '1':
	        $user_id = 'ORD';
	        break;
	      case '17':
	        $user_id = 'LGCDD';
	        break;    
	      case '9':
	        $user_id = 'LGMED-PDMU';  
	        break;
	      case '7':
	        $user_id = 'LGCDD-MBTRG';  
	        break;  
	      case '18':
	        $user_id = 'LGMED';  
	        break;
	    }

	    return $user_id;
	}
}