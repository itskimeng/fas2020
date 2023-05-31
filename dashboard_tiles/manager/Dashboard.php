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
		$this->conn = mysqli_connect("localhost", "fascalab_2020", "w]zYV6X9{*BN", "fascalab_2020");
		$this->color = [0 => 'bg-green', 1 => 'bg-yellow', 2 => 'bg-aqua'];
		$this->gender_opts = [0 => 'Male', 1 => 'Female'];
		$this->types_opts = [0 => 'Yes', 1 => 'No'];
	}

	public function getProcurements()
	{
		// $pmo = $this->divisionChecker($this->division);
		$pmo = $this->division;

		$sql = "SELECT 
							pur.id AS pr_id, 
							pur.pr_no AS pr_no, 
							DATE_FORMAT(pur.pr_date, '%m/%d/%Y') as pr_date, 
							pur.pmo AS pr_pmo, 
							pur.purpose AS pr_purpose, 
							DATE_FORMAT(pur.target_date, '%m/%d/%Y') AS pr_target_date 
						FROM pr pur 
						WHERE pur.pmo = '$pmo' 
						ORDER BY pur.id desc LIMIT 5";

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

	public function getCalendarEvents()
	{
		$data = [];
		$color = $this->color;
		$count = 0;

		$sql = "SELECT e.id as id, e.start as date_start, e.end as date_end, e.title as title, e.venue as venue, tp.DIVISION_M as office FROM events e LEFT JOIN tblpersonneldivision tp on tp.DIVISION_N = e.office WHERE MONTH(e.start) = MONTH(NOW()) AND YEAR(e.start) = YEAR(NOW()) AND DAY(e.start) >= DAY(NOW()) ORDER BY e.start ASC LIMIT 3";

		$query = mysqli_query($this->conn, $sql);

		while ($row = mysqli_fetch_assoc($query)) {
			$data[] = [
				'color' => $color[$count],
				'month' => date('M', strtotime($row['date_start'])),
				'day' => date('d', strtotime($row['date_start'])),
				'title' => $row['title'],
				'venue' => $row['venue'],
				'office' => $row['office']
			];
			$count++;
		}

		return $data;
	}

	public function getIssuances()
	{
		$sql = "SELECT id,issuance_no,subject,office_responsible,pdf_file FROM issuances where YEAR(dateposted) in ('2022','2023') ORDER BY id DESC LIMIT 10";

		$data = [];
		$query = mysqli_query($this->conn, $sql);

		while ($row = mysqli_fetch_array($query)) {
			$data[] = [
				'id' => $row['id'],
				'issuance_no' => $row['issuance_no'],
				'subject' => $row['subject'],
				'office' => $row['office_responsible'],
				'file'	=> 'files/' . $row['pdf_file']
			];
		}

		return $data;
	}

	public function getObligations()
	{
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

	public function getEmployees()
	{
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
					$data[$division] = $total > 9 ? $total : '0' . $total;
				} else {
					$data[$division] = $row['counter'] > 9 ? $row['counter'] : '0' . $row['counter'];
				}
			}
		}

		return $data;
	}

	public function getOverviews()
	{
		$genders = $this->gender_opts;
		$types = $this->types_opts;
		$data = [];

		foreach ($types as $key => $type) {
			$gg = [];
			$total = 0;
			foreach ($genders as $index => $gender) {
				$sql = "SELECT count(*) as count FROM tblemployeeinfo WHERE SEX_C = '$gender' AND ACTIVATED = '$type'";
				$query = mysqli_query($this->conn, $sql);
				$result = mysqli_fetch_array($query);
				$gg[$gender] = $result['count'] > 9 ? $result['count'] : '0' . $result['count'];
				$total += $result['count'];
			}
			$title = $key == 0 ? 'regular' : 'contractual';

			$data[$title] = $gg;
			$data[$title]['total'] = $total > 9 ? $total : '0' . $total;
		}

		return $data;
	}

	public function getRODepartmentTotal()
	{
		$sql = "SELECT count(*) as count FROM tblemployeeinfo WHERE OFFICE_STATION = 1";
		$query = mysqli_query($this->conn, $sql);
		$result = mysqli_fetch_array($query);
		$data = $result['count'];

		return $data;
	}

	public function getRegionalOfficeTotal()
	{
		$genders = $this->gender_opts;
		$types = $this->types_opts;
		$data = [];

		foreach ($types as $key => $type) {
			$gg = [];
			$total = 0;
			foreach ($genders as $index => $gender) {
				$sql = "SELECT count(*) as count FROM tblemployeeinfo WHERE SEX_C = '$gender' AND ACTIVATED = '$type' AND OFFICE_STATION = 1";
				$query = mysqli_query($this->conn, $sql);
				$result = mysqli_fetch_array($query);
				$gg[$gender] = $result['count'] > 9 ? $result['count'] : '0' . $result['count'];
				$total += $result['count'];
			}
			$title = $key == 0 ? 'regular' : 'contractual';

			$data[$title] = $gg;
			$data[$title]['total'] = $total > 9 ? $total : '0' . $total;
		}

		return $data;
	}

	public function getProvinces($province)
	{
		$genders = $this->gender_opts;
		$types = $this->types_opts;
		$locations = $this->getLocation($province);
		$data = [];

		foreach ($types as $key => $type) {
			$gg = [];
			$total = 0;
			foreach ($genders as $index => $gender) {
				$sql = "SELECT count(*) as count FROM tblemployeeinfo WHERE SEX_C = '$gender' AND ACTIVATED = '$type' AND DIVISION_C IN $locations";

				$query = mysqli_query($this->conn, $sql);
				$result = mysqli_fetch_array($query);
				$gg[$gender] = $result['count'] > 9 ? $result['count'] : '0' . $result['count'];
				$total += $result['count'];
			}
			$title = $key == 0 ? 'regular' : 'contractual';

			$data[$title] = $gg;
			$data[$title]['total'] = $total > 9 ? $total : '0' . $total;
		}

		return $data;
	}

	public function getLocation($province)
	{
		$locations = [];
		switch ($province) {
			case 'Batangas':
				$locations = [19, 28, 29, 30, 44];
				break;
			case 'Cavite':
				$locations = [20, 34, 35, 36, 45];
				break;
			case 'Laguna':
				$locations = [21, 40, 41, 42, 47, 51, 52];
				break;
			case 'Rizal':
				$locations = [23, 37, 38, 39, 46, 50];
				break;
			case 'Quezon':
				$locations = [22, 31, 32, 33, 48, 49, 53];
				break;
			case 'Lucena':
				$locations = [24];
				break;
		}

		$locations = '(' . implode(',', $locations) . ')';

		return $locations;
	}

	public function getPayments()
	{
		$data = [];
		$sql = "SELECT * FROM ntaob where status ='Paid' order by id desc LIMIT 3";
		$view_query = mysqli_query($this->conn, $sql);

		while ($row = mysqli_fetch_assoc($view_query)) {
			$data[] = $row;
		}

		return $data;
	}

	public function getAnnouncements()
	{
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
				'title' => $row["title"],
				'posted_date' => $row["posted_date"],
				'profile' => $profile
			];
		}

		return $data;
	}

	public function fileChecker($profile, $extension)
	{
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
						$profile = 'images/male-user.png';
					}
					break;
				default:
					$profile = 'images/male-user.png';
					break;
			}
		} else {
			$profile = 'images/male-user.png';
		}

		return $profile;
	}

	public function divisionChecker($division)
	{
		$user_id = '';
		switch ($division) {
			case '10':
			case '11':
			case '12':
			case '13':
			case '14':
			case '15':
			case '16':
				$user_id = 'FAD';
				break;
			case '3':
			case '5':
			case '1':
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

	public function getDtr($user_id, $date_now, $punch_state)
	{
		$data = [];
		$sql = "SELECT
				    `id`,
				    `UNAME`,
				    `date_today`,
				    `time_in`,
				    `lunch_in`,
				    `lunch_out`,
				    `time_out`,
				    `t1`,
				    `l1`,
				    `l2`,
				    `t2`,
				    `t_o`,
				    `o_b`,
				    `workforce_arrangement`
				FROM
				    `dtr`
				WHERE `UNAME` = '$user_id' AND date_today LIKE '%$date_now%' AND $punch_state IS NOT NULL
				";

		$query = mysqli_query($this->conn, $sql);
		$row = mysqli_fetch_assoc($query);


		return $row;
	}


	public function insertDtr($data, $stamp)
	{
		$sql = ' INSERT INTO dtr(UNAME, date_today, ' . $stamp . ', workforce_arrangement) VALUES ("' . $data['emp_id'] . '","' . $data['date_now'] . '","' . $data['time_now'] . '","' . $data['wf_arrangement'] . '") ';
		mysqli_query($this->conn, $sql);
	}


	public function updateDtr($data, $stamp)
	{
		$sql = ' UPDATE dtr SET ' . $stamp . ' = "' . $data['time_now'] . '", workforce_arrangement = "' . $data['wf_arrangement'] . '" WHERE UNAME = "' . $data['emp_id'] . '" AND date_today = "' . $data['date_now'] . '" ';
		mysqli_query($this->conn, $sql);
	}


	public function getDv()
	{
		$data = [];
		$sql = "SELECT
				    dv.dv_number AS dv_number,
				    dv.status AS status,
				    ob.purpose AS particular
				FROM
				    tbl_dv_entries dv 
				LEFT JOIN
					tbl_obligation ob ON ob.id = dv.obligation_id
			    ";

		$query = mysqli_query($this->conn, $sql);

		while ($row = mysqli_fetch_assoc($query)) {


			$data[] = [
				'dv_number'  => $row["dv_number"],
				'status'  	 => $row["status"],
				'particular' => $row["particular"]
			];
		}

		return $data;
	}

	public function selectDivision($posted_by)
	{

		$get_dv = "SELECT DIVISION_C FROM tblemployeeinfo WHERE UNAME = '$posted_by'";
		$query = mysqli_query($this->conn, $get_dv);
		$rowdv = mysqli_fetch_assoc($query);
		$rDIVISION_C = $rowdv['DIVISION_C'];

		$div = "SELECT DIVISION_M FROM tblpersonneldivision WHERE DIVISION_N = '$rDIVISION_C'";
		$query = mysqli_query($this->conn, $div);
		$rowdiv = mysqli_fetch_assoc($query);

		return $rowdiv;
	}


	public function insertAnnouncement($data)
	{
		$sql = " INSERT INTO announcementt(posted_by, division, title, content, `date`) VALUES('" . $data['posted_by'] . "','" . $data['division'] . "','" . $data['title'] . "','" . $data['content'] . "','" . $data['date'] . "') ";
		$query = mysqli_query($this->conn, $sql);
	}

	public function updateAnnouncement($data)
	{
		$title = $data['title'];
		$content = $data['content'];
		$idC = $data['idC'];

		$update = "UPDATE announcementt SET title = '$title' , content = '$content' WHERE id = $idC ";
		$query = mysqli_query($this->conn, $update);
	}


	public function getBirthday()
	{
		$sql = " SELECT FIRST_M, MIDDLE_M, LAST_M, DATE_FORMAT(BIRTH_D, '%M %d') AS BIRTH_D, PROFILE, STATUS,tp.POSITION_M FROM tblemployeeinfo left join tblposition tp on tp.POSITION_C = tblemployeeinfo.POSITION_c WHERE STATUS = 0 AND MONTH(BIRTH_D) = MONTH(NOW()) ORDER BY day(BIRTH_D)";

		$query = mysqli_query($this->conn, $sql);

		while ($row = mysqli_fetch_assoc($query)) {


			$data[] = [
				'FIRST_M'  		 => strtolower($row["FIRST_M"]),
				'MIDDLE_M'  	 => strtoupper($row["MIDDLE_M"]),
				'LAST_M' 		 => strtolower($row["LAST_M"]),
				'BIRTH_D' 		 => $row["BIRTH_D"],
				'PROFILE' 		 => $row["PROFILE"],
				'POSITION' 		 => $row["POSITION_M"],

			];
		}
		return $data;
	}
	public function fetchReportInfo($type, $office)
	{

		$sql = "SELECT count(*) as total FROM `pr` 
        LEFT JOIN tblpersonneldivision d on d.DIVISION_N = pr.pmo
        LEFT JOIN tbl_pr_type t on t.id = pr.type
        where d.DIVISION_N != 0 and pr.type = '$type' and stat != 17 and year(pr_date) = 2023 and  ";
		$fad = ['10', '11', '12', '13', '14', '15', '16'];
		$ord = ['1', '2', '3', '5'];
		$lgmed = ['7', '18', '7'];
		$lgcdd = ['8', '9', '17', '9'];
		if (!empty($office)) {
			if (in_array($office, $fad)) {
				$sql .= "pr.pmo IN('10', '11', '12', '13', '14', '15', '16')";
			} else if (in_array($office, $ord)) {
				$sql .= "pr.pmo IN('1', '2', '3', '5')";
			} else if (in_array($office, $lgmed)) {
				$sql .= "pr.pmo IN('7', '18', '7')";
			} else if (in_array($office, $lgcdd)) {
				$sql .= "pr.pmo IN('8', '9', '17', '9')";
			}
		} else {
			$sql .= "pr.pmo IN('10', '11', '12', '13', '14', '15', '16','1', '2', '3', '5','7', '18', '7''8', '9', '17', '9')";
		}
		$query = mysqli_query($this->conn, $sql);
		$rowdv = mysqli_fetch_assoc($query);
		$total = $rowdv['total'];

		return number_format($total);
	}
	public function fetchRanking()
	{
		$sql = "SELECT
					s.id,
                    s.supplier_title,
					s.contact_details,
					s.supplier_address
                FROM
                    `supplier_quote` sq
                LEFT JOIN supplier s on s.id = sq.supplier_id
                WHERE supplier_title != '' and sq.is_winner = 1

                GROUP BY sq.supplier_id";
		$query = mysqli_query($this->conn, $sql);
		$data = [];
		$count = 1;
		while ($row = mysqli_fetch_assoc($query)) {

			$data[] = [
				'sup_id' => $row['id'],
				'supplier_title'     => $row['supplier_title'],
				'contact_details'	 => $row['contact_details'],
				'supplier_address'	 => $row['supplier_address'],
			];
		}
		return $data;
	}
	public function fetchICTRequest()
	{
		$sql = "SELECT ID,CONTROL_NO,TYPE_REQ,ISSUE_PROBLEM,REQ_DATE from tbltechnical_assistance where YEAR(REQ_DATE) = '2023' order by ID desc limit 10";
		$query = mysqli_query($this->conn, $sql);
		$data = [];
		$count = 1;
		while ($row = mysqli_fetch_assoc($query)) {

			$data[] = [
				'id'			 => $row['ID'],
				'control_no'     => $row['CONTROL_NO'],
				'request_type'	 => $row['TYPE_REQ'],
				'issue'			 => $row['ISSUE_PROBLEM'],
				'request_date'	 => date('F d, Y', strtotime($row['REQ_DATE']))
			];
		}
		return $data;
	}
	public function countPRperDivision($office)
	{
		$sql = "SELECT count(*) as total FROM `pr` where stat != 17 and year(pr_date) = 2023 and ";
		$fad = ['10', '11', '12', '13', '14', '15', '16'];
		$ord = ['1', '2', '3', '5'];
		$lgmed = ['7', '18', '7'];
		$lgcdd = ['8', '9', '17', '9'];
		if (!empty($office)) {
			if (in_array($office, $fad)) {
				$sql .= "pr.pmo IN('10', '11', '12', '13', '14', '15', '16')";
			} else if (in_array($office, $ord)) {
				$sql .= "pr.pmo IN('1', '2', '3', '5')";
			} else if (in_array($office, $lgmed)) {
				$sql .= "pr.pmo IN('7', '18', '7')";
			} else if (in_array($office, $lgcdd)) {
				$sql .= "pr.pmo IN('8', '9', '17', '9')";
			}
		}
		$query = mysqli_query($this->conn, $sql);
		$row = mysqli_fetch_array($query);


		return number_format($row['total']);
	}
	public function getPRRank()
	{
		$sql = "SELECT  
		pr.id,
pr.pr_no,
pr.pr_date,
 pr.pmo,
 pr.action_officer,
  sum(items.abc*items.qty) as 'total_abc'

  FROM pr  
	  LEFT JOIN tblemployeeinfo as emp ON pr.action_officer = emp.EMP_N
	  LEFT JOIN pr_items as items ON pr.id = items.pr_id
	  LEFT JOIN tbl_pr_status as ps on ps.id = pr.stat
	  LEFT JOIN po as p on p.pr_id = pr.id
	  LEFT JOIN rfq as r on r.pr_id = pr.id
	  LEFT JOIN supplier_quote as sq on sq.rfq_id = r.id
	  LEFT JOIN supplier as s on s.id = sq.supplier_id
	  LEFT JOIN abstract_of_quote as aq on aq.rfq_id = r.id
	  LEFT JOIN po as po on po.rfq_id = r.id


	  where YEAR(pr.pr_date) = 2023
	  GROUP BY pr.pr_no
	  order by total_abc desc
	  LIMIT 10";
		$query = mysqli_query($this->conn, $sql);
		$data = [];
		$count = 1;
		while ($row = mysqli_fetch_assoc($query)) {

			$office = $row['pmo'];
            $fad = ['10', '11', '12', '13', '14', '15', '16'];
            $ord = ['1', '2', '3', '5'];
            $lgmed = ['7', '18', '7',];
            $lgcdd = ['8', '9', '17', '9'];
            $cavite = ['20', '34', '35', '36', '45'];
            $laguna = ['21', '40', '41', '42', '47', '51', '52'];
            $batangas = ['19', '28', '29', '30', '44'];
            $rizal = ['23', '37', '38', '39', '46', '50'];
            $quezon = ['22', '31', '32', '33', '48', '49', '53'];
            $lucena_city = ['24'];
            if (in_array($office, $fad)) {
                $office = 'FAD';
            } else if (in_array($office, $lgmed)) {
                $office = 'LGMED';
            } else if (in_array($office, $lgcdd)) {
                $office = 'LGCDD';
            } else if (in_array($office, $cavite)) {
                $office = 'CAVITE';
            } else if (in_array($office, $laguna)) {
                $office = 'LAGUNA';
            } else if (in_array($office, $batangas)) {
                $office = 'BATANGAS';
            } else if (in_array($office, $rizal)) {
                $office = 'RIZAL';
            } else if (in_array($office, $quezon)) {
                $office = 'QUEZON';
            } else if (in_array($office, $lucena_city)) {
                $office = 'LUCENA CITY';
            } else if (in_array($office, $ord)) {
                $office = 'ORD';
            } else {
                $office = '~';
            }


			$data[] = [
				'id'			 => $row['id'],
				'pr_no'     => $row['pr_no'],
				'pmo'	 => $office,
				'action_officer'			 => $row['action_officer'],
				'amount'			 => 'Php'. number_format($row['total_abc'],2),
				'pr_date'	 => date('F d, Y', strtotime($row['pr_date']))
			];
		}
		return $data;
	}
}
