<?php

class HRManager extends Connection
{

	function __construct()
	{
		if (!isset($this->db)) {
			$conn = new mysqli($this->hostname, $this->dbUser, $this->dbPassword, $this->dbName);
			if ($conn->connect_error) {
				die("Database is not connected: " . $conn->connect_error);
			} else {
				$this->db = $conn;
			}
		}
	}

	public function fetch($id = null)
	{
		$sql = "SELECT 
					o.id, 
					IF(o.cut_off = 1, '1st', '2nd') AS cut_off,
					DATE_FORMAT(o.date_from, '%b %d, %Y') AS date_from,
					DATE_FORMAT(o.date_to, '%b %d, %Y') AS date_to,
					e.UNAME AS uploader
				FROM tbl_upload_dtr o 
				LEFT JOIN 
					tblemployeeinfo e ON e.EMP_N = o.uploader";

		if (!empty($id)) {
			$sql .= " WHERE id = $id";
		}

		$getQry = $this->db->query($sql);
		$data = [];

		while ($row = mysqli_fetch_assoc($getQry)) {
			$data[$row['id']] = [
				'cut_off'	=> $row['cut_off'],
				'date_from'	=> $row['date_from'],
				'date_to'	=> $row['date_to'],
				'uploader'	=> $row['uploader']
			];
		}

		return $data;
	}

	public function getDTRRecord($emp_no, $emp, $current_date, $time, $state, $sel = 0)
	{
		$has_data = false;
		$sql = "SELECT 
					o.attendance,
					o.am_in,
					o.am_out,
					o.pm_in,
					o.pm_out
				FROM tbl_bisbio o 
				LEFT JOIN 
					tblemployeeinfo e ON e.EMP_N = o.emp_id
				WHERE 
					e.EMP_N = '" . $emp_no . "' AND e.UNAME = '" . $emp . "' AND o.attendance = '" . $current_date . "'";

		if ($sel > 0) {
			if ($state == 0) {
				$sql .= " AND o.am_in = '" . $time . "'";
			} elseif ($state == 1) {
				$sql .= " AND o.am_out = '" . $time . "'";
			} elseif ($state == 2) {
				$sql .= " AND o.pm_in = '" . $time . "'";
			} elseif ($state == 3) {
				$sql .= " AND o.pm_out = '" . $time . "'";
			}
		}

		$getQry = $this->db->query($sql);
		$data = [];

		$result = mysqli_fetch_assoc($getQry);

		if (!empty($result)) {
			$has_data = true;
		}

		return $has_data;
	}

	public function getDTRRecord2($emp_no, $emp, $current_date, $time, $state, $sel = 0)
	{
		$has_data = false;
		$sql = "SELECT 
					o.attendance,
					DATE_FORMAT(o.am_in, '%H:%i:%s') AS am_in,
					DATE_FORMAT(o.am_out, '%H:%i:%s') AS am_out,
					DATE_FORMAT(o.pm_in, '%H:%i:%s') AS pm_in,
					DATE_FORMAT(o.pm_out, '%H:%i:%s') AS pm_out
				FROM tbl_bisbio o 
				LEFT JOIN 
					tblemployeeinfo e ON e.EMP_N = o.emp_id
				WHERE 
					e.EMP_N = '" . $emp_no . "' AND e.UNAME = '" . $emp . "' AND o.attendance = '" . $current_date . "'";

		if ($sel > 0) {
			if ($state == 0) {
				$sql .= " AND o.am_in = '" . $time . "'";
			} elseif ($state == 1) {
				$sql .= " AND o.am_out = '" . $time . "'";
			} elseif ($state == 2) {
				$sql .= " AND o.pm_in = '" . $time . "'";
			} elseif ($state == 3) {
				$sql .= " AND o.pm_out = '" . $time . "'";
			}
		}

		$getQry = $this->db->query($sql);
		$data = [];

		$result = mysqli_fetch_assoc($getQry);

		return $result;
	}

	public function findUser($emp_no)
	{
		$sql = "SELECT EMP_N, EMP_NUMBER, UNAME FROM tblemployeeinfo WHERE EMP_NUMBER like '%$emp_no%'";

		$getQry = $this->db->query($sql);

		$result = mysqli_fetch_assoc($getQry);

		return $result;
	}

	public function insertDTR($data, $state)
	{
		$sql = "INSERT INTO tbl_bisbio ";

		if ($state == 0) {
			$field = 'am_in';
		}

		if ($state == 1) {
			$field = 'am_out';
		}

		if ($state == 2) {
			$field = 'pm_in';
		}

		if ($state == 3) {
			$field = 'pm_out';
		}

		$sql .= " SET $field = '" . $data['time'] . "', attendance = '" . $data['date'] . "', emp_id = " . $data['emp_code'] . ", created_by = " . $data['author'] . "";

		$this->db->query($sql);
		$last_id = mysqli_insert_id($this->db);

		return $last_id;
	}

	public function updateDTR($data, $state)
	{
		$sql = "UPDATE tbl_bisbio ";

		if ($state == 0) {
			$field = 'am_in';
		}

		if ($state == 1) {
			$field = 'am_out';
		}

		if ($state == 2) {
			$field = 'pm_in';
		}

		if ($state == 3) {
			$field = 'pm_out';
		}

		$sql .= " SET $field = '" . $data['time'] . "' WHERE attendance = '" . $data['date'] . "' AND emp_id = " . $data['emp_code'] . "";
		$result = $this->db->query($sql);

		return $result;
	}

	public function insertUploadDTRHistory($data)
	{
		$sql = "INSERT INTO tbl_upload_dtr_history SET date_from = '" . $data['date_from'] . "', date_to = '" . $data['date_to'] . "', uploader = '" . $data['uploader'] . "', action = '" . $data['action'] . "' ";
		$result = $this->db->query($sql);

		$last_id = mysqli_insert_id($this->db);

		return $last_id;
	}

	public function fetchDTRUploadHistory()
	{
		$sql = "SELECT 
					e.UNAME as uploader,
					DATE_FORMAT(o.date_from, '%b %d, %Y') AS date_from,
					DATE_FORMAT(o.date_to, '%b %d, %Y') AS date_to,
					DATE_FORMAT(o.date_uploaded, '%b %d, %Y') AS date_uploaded,
					o.action AS action
				FROM tbl_upload_dtr_history o
				LEFT JOIN tblemployeeinfo e ON e.EMP_N = o.uploader";

		$getQry = $this->db->query($sql);
		$data = [];

		while ($row = mysqli_fetch_assoc($getQry)) {
			$data[] = [
				'uploader'		=> $row['uploader'],
				'date_from'		=> $row['date_from'],
				'date_to'		=> $row['date_to'],
				'date_uploaded' => $row['date_uploaded'],
				'action' 		=> $row['action']
			];
		}

		return $data;
	}

	public function fetchDailyTimeRecord($id = null, $year, $month)
	{
		$sql = "SELECT 
					CONCAT(e.LAST_M, ', ', e.FIRST_M, ' ', e.MIDDLE_M) AS fullname,
					e.UNAME AS username,
					DATE_FORMAT(o.attendance, '%d') AS attendance,
					DATE_FORMAT(o.attendance, '%M %d, %Y') AS attendance_date,
				    DATE_FORMAT(o.attendance, '%w') AS attendance_day,
				    DATE_FORMAT(o.attendance, '%W') AS attendance_day_c,
				    DATE_FORMAT(o.am_in, '%H:%i') AS am_in,
				    DATE_FORMAT(o.am_in, '%h:%i %p') AS am_in_f,
				    DATE_FORMAT(o.am_out, '%H:%i') AS am_out,
				    DATE_FORMAT(o.am_out, '%h:%i %p') AS am_out_f,
				    DATE_FORMAT(o.pm_in, '%H:%i') AS pm_in,
				    DATE_FORMAT(o.pm_in, '%h:%i %p') AS pm_in_f,
				    DATE_FORMAT(o.pm_out, '%H:%i') AS pm_out,
				    DATE_FORMAT(o.pm_out, '%h:%i %p') AS pm_out_f,
				    DATE_FORMAT(o.date_created, '%M %d, %Y') AS date_created,
				    DATE_FORMAT(o.date_generated, '%M %d, %Y') AS date_generated
				FROM tbl_bisbio o
				LEFT JOIN tblemployeeinfo e ON e.EMP_N = o.emp_id";

		if (!empty($id)) {
			$sql .= " WHERE e.EMP_N = '" . $id . "' AND YEAR(o.attendance) = '" . $year . "' AND MONTH(o.attendance) = '" . $month . "'";
		}

		$getQry = $this->db->query($sql);

		$data = $days = [];
		$d = cal_days_in_month(CAL_GREGORIAN, $month, $year);

		while ($row = mysqli_fetch_assoc($getQry)) {
			for ($i = 1; $i <= $d; $i++) {
				$index = '';
				$jd = GregorianToJD($month, $i, $year);
				$month_f = JDMonthName($jd, 1);
				$day = JDDayOfWeek($jd, 1);
				$day_int = JDDayOfWeek($jd, 0);
				$index = $i > 9 ? $i : '0' . $i;

				if (!array_key_exists($i, $data)) {
					$days[$index] = [
						'attendance'		=> $index,
						'attendance_date'	=> $month_f . ' ' . $index . ', ' . $year . '<br>' . $day,
						'attendance_date_f'	=> $month_f . ' ' . $index . ', ' . $year,
						'attendance_day'	=> $day,
						'attendance_day_int' => $day_int,
						'am_in'				=> $day_int > 0 ? '--' : '',
						'am_out' 			=> $day_int > 0 ? '--' : '',
						'pm_in' 			=> $day_int > 0 ? '--' : '',
						'pm_out' 			=> $day_int > 0 ? '--' : '',
						'undertime' 		=> '',
						'hours' 			=> '',
						'mins' 				=> '',
						'fullname'			=> $row['fullname'],
						'username'			=> $row['username'],
						'date_created'		=> $row['date_created']
					];
				}
			}
		}


		$sql = "SELECT 
					CONCAT(e.LAST_M, ', ', e.FIRST_M, ' ', e.MIDDLE_M) AS fullname,
					e.UNAME AS username,
					DATE_FORMAT(o.attendance, '%d') AS attendance,
					DATE_FORMAT(o.attendance, '%M %d, %Y') AS attendance_date,
				    DATE_FORMAT(o.attendance, '%w') AS attendance_day,
				    DATE_FORMAT(o.attendance, '%W') AS attendance_day_c,
				    DATE_FORMAT(o.am_in, '%H:%i') AS am_in,
				    DATE_FORMAT(o.am_in, '%h:%i %p') AS am_in_f,
				    DATE_FORMAT(o.am_out, '%H:%i') AS am_out,
				    DATE_FORMAT(o.am_out, '%h:%i %p') AS am_out_f,
				    DATE_FORMAT(o.pm_in, '%H:%i') AS pm_in,
				    DATE_FORMAT(o.pm_in, '%h:%i %p') AS pm_in_f,
				    DATE_FORMAT(o.pm_out, '%H:%i') AS pm_out,
				    DATE_FORMAT(o.pm_out, '%h:%i %p') AS pm_out_f,
				    DATE_FORMAT(o.date_created, '%M %d, %Y') AS date_created,
				    DATE_FORMAT(o.date_generated, '%M %d, %Y') AS date_generated
				FROM tbl_bisbio o
				LEFT JOIN tblemployeeinfo e ON e.EMP_N = o.emp_id";

		if (!empty($id)) {
			$sql .= " WHERE e.EMP_N = '" . $id . "' AND YEAR(o.attendance) = '" . $year . "' AND MONTH(o.attendance) = '" . $month . "'";
		}

		$getQry = $this->db->query($sql);
		// $data = [];

		while ($row = mysqli_fetch_assoc($getQry)) {

			$undertime = $this->getUndertime2($row['attendance_day'], $row['am_in'], $row['pm_out']);
			$undertime_f = '';
			if (!empty($undertime)) {
				if ($undertime['hours'] != null and $undertime['mins']) {
					$undertime_f = $undertime['hours'] . ' hour(s) & ' . $undertime['mins'] . ' mins';
				} elseif ($undertime['hours'] != null) {
					$undertime_f = $undertime['hours'] . ' hour(s)';
				} elseif ($undertime['mins'] != null) {
					$undertime_f = $undertime['mins'] . ' min(s)';
				}
			}

			$days[$row['attendance']] = [
				'attendance'		=> $row['attendance'],
				'attendance_date'	=> $row['attendance_date'] . '<br>' . $row['attendance_day_c'],
				'attendance_date_f'	=> $row['attendance_date'],
				'attendance_day'	=> $row['attendance_day'],
				'am_in'				=> $row['am_in_f'],
				'am_out' 			=> $row['am_out_f'],
				'pm_in' 			=> $row['pm_in_f'],
				'pm_out' 			=> $row['pm_out_f'],
				'date_generated' 	=> $row['date_generated'],
				'undertime' 		=> $undertime_f,
				'hours'				=> !empty($undertime) ? $undertime['hours'] : '',
				'mins'				=> !empty($undertime) ? $undertime['mins'] : '',
				'fullname'			=> $row['fullname'],
				'username'			=> $row['username'],
				'date_created'		=> $row['date_created']
			];
		}

		return $days;
	}

	public function getUndertime($day, $am_in, $pm_out)
	{
		$undertime = '';
		$is_monday = false;
		if ($day == 1) { //if monday
			$is_monday = true;
			$max_am_in = '08:00';
			$max_pm_out = '17:00';
		} else {
			$max_am_in = '09:00';
			$max_pm_out = '18:00';
		}

		$max_am_in = $nwam_in = new DateTime($max_am_in);
		$max_pm_out = $nwpm_out = new DateTime($max_pm_out);

		if (!empty($am_in) and !empty($pm_out)) {
			if ($is_monday) {
				$nwam_in = '08:00';
				$nwpm_out = date('h:i', strtotime($pm_out)) > date('h:i', strtotime('17:00')) ? '17:00' : $pm_out;
			} else {
				$nwam_in = date('h:i', strtotime($am_in)) < date('h:i', strtotime('07:00')) ? '07:00' : $am_in;
				$nwpm_out = date('h:i', strtotime($pm_out)) > date('h:i', strtotime('18:00')) ? '18:00' : $pm_out;
			}

			$amin = new DateTime($nwam_in);
			$pout = new DateTime($nwpm_out);

			$ud = $pout->diff($amin);
			$date3333 = new DateTime($ud->format('%H' . ':' . '%i'));
			$finalfinal = $date3333->diff($max_am_in);
			$dateZero = new DateTime("00:00");

			if ($ud->format('%H' . ':' . '%i') > $max_am_in->format('H:i') || $finalfinal->format('%I') == $dateZero->format('I')) {
				$undertime = '';
			} else {
				$late_hours = $late_mins = '';
				if ($finalfinal->format('%H') > 0 and $finalfinal->format('%i') > 0) {
					if ($finalfinal->format('%H') > 1) {
						$late_hours = $finalfinal->format('%H') . ' hrs & ' . $finalfinal->format('%i') . ' min(s)';
					} else {
						$late_hours = $finalfinal->format('%H') . ' hr & ' . $finalfinal->format('%i') . ' min(s)';
					}
				} else if ($finalfinal->format('%H') > 0 and $finalfinal->format('%i') == 0) {
					if ($finalfinal->format('%H') > 1) {
						$late_hours = $finalfinal->format('%H') . ' hrs';
					} else {
						$late_hours = $finalfinal->format('%H') . ' hr';
					}
				} else {
					$late_hours = $finalfinal->format('%i') . ' min(s)';
				}

				$undertime = $late_hours . ' late';
			}
		} else {
			$undertime = 'incomplete data';
		}

		return $undertime;
	}

	public function getUndertime2($day, $am_in, $pm_out)
	{
		$undertime = [];
		$is_monday = false;
		if ($day == 1) { //if monday
			$is_monday = true;
			// $max_am_in = '08:00';
			// $max_pm_out = '17:00';
			$max_am_in = '09:00';
			$max_pm_out = '18:00';
		} else {
			$max_am_in = '09:00';
			$max_pm_out = '18:00';
		}

		$max_am_in = $nwam_in = new DateTime($max_am_in);
		$max_pm_out = $nwpm_out = new DateTime($max_pm_out);

		if (!empty($am_in) and !empty($pm_out)) {
			if ($is_monday) {
				// $nwam_in = '08:00';
				//$nwpm_out = date('h:i',strtotime($pm_out)) > date('h:i',strtotime('17:00')) ? '17:00' : $pm_out;
				$nwam_in = date('h:i', strtotime($am_in)) < date('h:i', strtotime('08:00')) ? '08:00' : $am_in;
				$nwpm_out = date('h:i', strtotime($pm_out)) > date('h:i', strtotime('17:00')) ? '17:00' : $pm_out;
			} else {
				$nwam_in = date('h:i', strtotime($am_in)) < date('h:i', strtotime('07:00')) ? '07:00' : $am_in;
				$nwpm_out = date('h:i', strtotime($pm_out)) > date('h:i', strtotime('18:00')) ? '18:00' : $pm_out;
			}

			$amin = new DateTime($nwam_in);
			$pout = new DateTime($nwpm_out);

			$ud = $pout->diff($amin);
			$date3333 = new DateTime($ud->format('%H' . ':' . '%i'));
			$finalfinal = $date3333->diff($max_am_in);
			$dateZero = new DateTime("00:00");

			if ($ud->format('%H' . ':' . '%i') > $max_am_in->format('H:i') || $finalfinal->format('%I') == $dateZero->format('I')) {
				$undertime = '';
			} else {
				$late_hours = $late_mins = '';
				if ($finalfinal->format('%H') > 0 and $finalfinal->format('%i') > 0) {
					if ($finalfinal->format('%H') > 1) {
						$late_hours = $finalfinal->format('%H');
						$late_mins = $finalfinal->format('%i');
						// $late_hours = $finalfinal->format('%H') .' hrs & '. $finalfinal->format('%i') .' min(s)';
					} else {
						$late_hours = $finalfinal->format('%H');
						$late_mins = $finalfinal->format('%i');
						// $late_hours = $finalfinal->format('%H') .' hr & '. $finalfinal->format('%i') .' min(s)';
					}
				} else if ($finalfinal->format('%H') > 0 and $finalfinal->format('%i') == 0) {
					$late_hours = $finalfinal->format('%H');
				} else {
					$late_mins = $finalfinal->format('%i');
				}

				$undertime['hours'] = $late_hours;
				$undertime['mins'] = $late_mins;
			}
		}

		return $undertime;
	}
	public function fetchEmployeePerProvince($office)
	{
		$divisions = [
			'region' => ['1', '2', '3', '5', '7', '18', '8', '9', '17', '9', '7', '10', '11', '12', '13', '14', '15', '16'],
			'batangas' => ['19', '28', '29', '30', '44'],
			'cavite' => ['20', '34', '35', '36', '45'],
			'laguna' => ['21', '40', '41', '42', '47', '51', '52'],
			'rizal' => ['23', '37', '38', '39', '46', '50'],
			'quezon' => ['22', '31', '32', '33', '48', '49', '53'],
			'lucena' => ['24']
		];

		$sql = "SELECT COUNT(*) AS total FROM `tblemployeeinfo` o 
			LEFT JOIN tblpersonneldivision d ON d.DIVISION_N = o.DIVISION_c
			WHERE o.BLOCK = 'N' AND";

		foreach ($divisions as  $values) {
			if (in_array($office, $values)) {
				$sql .= "  d.DIVISION_N IN ('" . implode("', '", $values) . "') and o.STATUS = 0 ";
				break;
			}
		}

		$query = $this->db->query($sql);
		$row = mysqli_fetch_array($query);

		return number_format($row['total']);
	}
	public function fetchDuplicateEmployeeID()
	{
		$sql = "SELECT SUM(cnt) AS total_count
		FROM (
			SELECT EMP_NUMBER, COUNT(*) AS cnt
			FROM tblemployeeinfo
			GROUP BY EMP_NUMBER
			HAVING COUNT(*) > 1
		) AS subquery;
		";
		$query = $this->db->query($sql);
		$row = mysqli_fetch_array($query);

		return number_format($row['total_count']);
	}
	public function fetchEmpwithMissingOffice()
	{
		$sql = 'select count(*) as "total_count" from tblemployeeinfo where DIVISION_C = 0';
		$query = $this->db->query($sql);
		$row = mysqli_fetch_array($query);

		return number_format($row['total_count']);
	}
	public function fetchEmpBlockAccount()
	{
		$sql = "SELECT COUNT(*) AS 'total_count' FROM `tblemployeeinfo` where BLOCK = 'N' ";
		$query = $this->db->query($sql);
		$row = mysqli_fetch_array($query);

		return number_format($row['total_count']);
	}
	public function fetchEmpFemale()
	{
		$sql = "SELECT COUNT(*) AS 'total_count' FROM `tblemployeeinfo` where SEX_C = 'Female' and BLOCK = 'N'";
		$query = $this->db->query($sql);
		$row = mysqli_fetch_array($query);

		return number_format($row['total_count']);
	}
	public function fetchEmpMale()
	{
		$sql = "SELECT COUNT(*) AS 'total_count' FROM `tblemployeeinfo` where SEX_C = 'Male' and BLOCK = 'Y'";
		$query = $this->db->query($sql);
		$row = mysqli_fetch_array($query);

		return number_format($row['total_count']);
	}
	public function fetchNewlyRegisteredAccount()
	{
		$sql = "SELECT count(*) 'total_count' from tblemployeeinfo where ACTIVATED = 'No'";
		$query = $this->db->query($sql);
		$row = mysqli_fetch_array($query);

		return number_format($row['total_count']);
	}
	public function getUserInformation($id)
	{
		$sql = "SELECT 
					CONCAT('F', o.EMP_NUMBER) as emp_code,
					p.POSITION_M as position_m,
					CONCAT(o.FIRST_M, ' ', o.MIDDLE_M, ' ', o.LAST_M) as fullname, 
					CONCAT(d.DIVISION_LONG_M, ' (', d.DIVISION_M, ')')  as division_long_m,
					IF(o.PROFILE IS NOT NULL, o.PROFILE, 'images/logo.png') AS profile  
				FROM tblemployeeinfo o 
				LEFT JOIN tbldilgposition p ON p.POSITION_ID = o.POSITION_C
				LEFT JOIN tblpersonneldivision d ON d.DIVISION_N = o.DIVISION_C
				WHERE o.EMP_N = '" . $id . "'";

		$getQry = $this->db->query($sql);

		$result = mysqli_fetch_assoc($getQry);

		return $result;
	}

	public function fetchProcessOwners($office=null)
	{
		$sql = "SELECT 
					o.LANDPHONE, 
					o.REMARKS_M, 
					o.EMP_N, 
					CONCAT('F', o.EMP_NUMBER) AS EMP_NUMBER, 
					o.FIRST_M, 
					o.MIDDLE_M, 
					o.UNAME, 
					o.LAST_M, 
					DATE_FORMAT(o.BIRTH_D, '%b. %d, %Y') as bday, 
					o.EMAIL, 
					o.ALTER_EMAIL, 
					o.MOBILEPHONE, 
					d.DIVISION_M, 
					p.POSITION_M, 
					ds.DESIGNATION_M,  
					pr.LGU_M,  
					o.STATUS,
					o.SEX_C,
					CONCAT(o.LAST_M, ', ', o.FIRST_M, ' ', substring(o.MIDDLE_M, 1, 1)) as fullname,
					-- CAST(YEAR(NOW()) - YEAR(o.BIRTH_D) AS decimal) AS age
					TIMESTAMPDIFF(YEAR, o.BIRTH_D, CURDATE()) AS age,  
					o.BLOCK as emp_status
          		FROM tblemployeeinfo o 
          		LEFT JOIN tblpersonneldivision d on d.DIVISION_N = o.DIVISION_C 
      			LEFT JOIN tbldilgposition p on p.POSITION_ID = o.POSITION_C 
      			LEFT JOIN tbldesignation ds on ds.DESIGNATION_ID = o.DESIGNATION
      			LEFT JOIN tbl_province pr on pr.PROVINCE_C = o.PROVINCE_C 
      			WHERE o.STATUS = 0";

      	if (!empty($office)) {
      		$sql .= " AND d.DIVISION_N = '".$office."'";
      	}
      	
      	$sql .= " ORDER BY o.LAST_M ASC";

      	$getQry = $this->db->query($sql);

      	$data = [];
		
        while ($row = mysqli_fetch_assoc($getQry)) {
        	$data[$row['EMP_N']] = [
        		'uname'				=> $row['UNAME'],
        		'emp_c'				=> $row['EMP_NUMBER'],
        		'fullname'			=> $row['fullname'],
        		'office'			=> $row['DIVISION_M'],
        		'position'			=> $row['POSITION_M'],
        		'office_email'		=> $row['LANDPHONE'],
        		'bday' 				=> $row['bday'],
        		'email' 			=> $row['EMAIL'],
        		'gender' 			=> $row['SEX_C'],
        		'age' 				=> $row['age'],
        		'mobile_no'			=> $row['MOBILEPHONE'],
        		'emp_status'		=> $row['emp_status']
        	]; 
        }

        return $data;
	}

	public function fetchEmployeesDirectory($office = null, $emp_id = null, $name = null, $age_category = null, $civil_status, $health_issues = null,$pwd = null, $gender=null,$solo = null)
	{
		$sql = "SELECT
		CASE WHEN COALESCE(GENERATION, '') = '' THEN 0 ELSE 1 END AS generation_count,
		CASE WHEN COALESCE(AWARDS, '') = ''  THEN 0 ELSE 1 END AS awards_count,
		CASE WHEN COALESCE(YEARS_IN_SERVICE, '') = '' THEN 0 ELSE 1 END AS years_in_service_count,
		CASE WHEN COALESCE(Q1, '') = '' THEN 0 ELSE 1 END AS q1_count,
		CASE WHEN COALESCE(Q2, '') = '' THEN 0 ELSE 1 END AS q2_count,
		CASE WHEN COALESCE(Q3, '') = '' THEN 0 ELSE 1 END AS q3_count,
		CASE WHEN COALESCE(Q4, '') = '' THEN 0 ELSE 1 END AS q4_count,
		CASE WHEN COALESCE(Q5, '') = '' THEN 0 ELSE 1 END AS q5_count,
		CASE WHEN COALESCE(Q6, '') = '' THEN 0 ELSE 1 END AS q6_count,
		CASE WHEN COALESCE(Q7, '') = '' THEN 0 ELSE 1 END AS q7_count,
		CASE WHEN COALESCE(Q8, '') = '' THEN 0 ELSE 1 END AS q8_count,
		o.LANDPHONE,
		o.REMARKS_M,
		o.EMP_N,
		CONCAT('F', o.EMP_NUMBER) AS EMP_NUMBER,
		o.FIRST_M,
		o.MIDDLE_M,
		o.UNAME,
		o.LAST_M,
		DATE_FORMAT(o.BIRTH_D, '%b. %d, %Y') AS bday,
		o.EMAIL,
		o.ALTER_EMAIL,
		o.MOBILEPHONE,
		o.CURRENT_ADDRESS,
		o.PERMANENT_ADDRESS,
		o.HEA,
		o.DATE_HIRED,
		o.GENERATION AS 'generation',
		o.AWARDS AS 'awards',
		o.Q1 AS 'q1',
		o.Q2 AS 'q2',
		o.Q3 AS 'q3',
		o.Q4 AS 'q4',
		o.Q5 AS 'q5',
		o.Q6 AS 'q6',
		o.Q7 AS 'q7',
		o.Q8 AS 'q8',
		o.SOLO_PARENT_ID AS 'spid',
		o.PWD_ID AS 'pwd_id',
		o.HEALTH_ISSUES AS 'health_issues',
		o.GYNECOLOGICAL AS 'gynecological',
		o.YEARS_IN_SERVICE AS 'years_in_service',
		d.DIVISION_M,
		p.POSITION_M,
		ds.DESIGNATION_M,
		pr.LGU_M,
		o.STATUS,
		o.SEX_C,
		CONCAT(o.LAST_M, ', ', o.FIRST_M, ' ', SUBSTRING(o.MIDDLE_M, 1, 1)) AS fullname,
		TIMESTAMPDIFF(YEAR, o.BIRTH_D, CURDATE()) AS age,
			o.BLOCK AS emp_status
		FROM
			tblemployeeinfo o
		LEFT JOIN
			tblpersonneldivision d ON d.DIVISION_N = o.DIVISION_C
		LEFT JOIN
			tbldilgposition p ON p.POSITION_ID = o.POSITION_C
		LEFT JOIN
			tbldesignation ds ON ds.DESIGNATION_ID = o.DESIGNATION
		LEFT JOIN
			tbl_province pr ON pr.PROVINCE_C = o.PROVINCE_C
		WHERE
		o.STATUS = 0 and o.BLOCK = 'N'";

		if (!empty($office)) {
			$sql .= " AND d.DIVISION_N = '" . $office . "'";
		}
		if (!empty($emp_id)) {
			$sql .= " AND o.EMP_NUMBER = '" . $emp_id . "'";
		}
		if (!empty($gender)) {
			$sql .= " AND o.SEX_C = '" . $gender . "'";
		}
		if (!empty($name)) {
			$sql .= " AND o.LAST_M = '" . $name . "' and o.FIRST_M = '" . $name . "' ";
		}
		if (!empty($age_category)) {
			switch ($age_category) {
				case 'All':
					$ageCondition = ">= 18";

					break;
				case '18-24':
					$ageCondition = "BETWEEN 18 AND 24";
					break;
				case '25-34':
					$ageCondition = "BETWEEN 25 AND 34";
					break;
				case '35-44':
					$ageCondition = "BETWEEN 35 AND 44";
					break;
				case '45-54':
					$ageCondition = "BETWEEN 45 AND 54";
					break;
				case '55-64':
					$ageCondition = "BETWEEN 55 AND 64";
					break;
				case '65 and over':
					$ageCondition = ">= 65";
					break;
			}

			$sql .= " AND YEAR(CURDATE()) - YEAR(o.BIRTH_D) - (DATE_FORMAT(CURDATE(), '%m%d') < DATE_FORMAT(o.BIRTH_D, '%m%d')) $ageCondition";
		}
		if (!empty($civil_status)) {
			$sql .= " AND o.CIVIL_STATUS = '" . $civil_status . "' ";
		}
		if (!empty($health_issues)) {
			$sql .= " AND o.Q8 = '" . $health_issues . "' ";
		}
		if (!empty($pwd)) {
			$sql .= " AND o.Q3 = '" . $pwd . "' ";
		}
		if (!empty($solo)) {
			$sql .= " AND o.Q4 = '" . $solo . "' ";
		}
		

		$sql .= " ORDER BY o.LAST_M ASC";
	
		$getQry = $this->db->query($sql);

		$data = [];
		$totalCheckboxes = 0;
		$checkedCount = 0;
		while ($row = mysqli_fetch_assoc($getQry)) {
			$totalCheckboxes = 11; // Adjust this number based on the total checkboxes in the query
			$checkedCount = $row['generation_count'] + $row['awards_count'] + $row['years_in_service_count'] + $row['q1_count'] + $row['q2_count'] + $row['q3_count'] + $row['q4_count'] + $row['q5_count'] + $row['q6_count'] + $row['q7_count'] + $row['q8_count'];
			print_r($checkedCount);
			$percentage = null;
			if ($checkedCount != "" || $percentage != null) {
				$percentage = number_format(($checkedCount / $totalCheckboxes) * 100, 2);
			} else {
				$percentage = 0;
			}
			$data[$row['EMP_N']] = [
				'percentage'		=> $percentage,
				'uname'				=> $row['UNAME'],
				'emp_c'				=> $row['EMP_NUMBER'],
				'fullname'			=> $row['fullname'],
				'office'			=> $row['DIVISION_M'],
				'position'			=> $row['POSITION_M'],
				'office_email'		=> $row['EMAIL'],
				'bday' 				=> $row['bday'],
				'email' 			=> $row['EMAIL'],
				'gender' 			=> $row['SEX_C'],
				'age' 				=> $row['age'],
				'mobile_no'			=> $row['MOBILEPHONE'],
				'emp_status'		=> $row['emp_status'],
				'res_address'		=> $row['CURRENT_ADDRESS'],
				'permanent_address' => $row['PERMANENT_ADDRESS'],
				'hea' 				=> $row['HEA'],
				'employment_date' 	=> $row['DATE_HIRED'],
				//count row generation up to years in service if empty or not
				'generation' 		=> $row['generation'],
				'awards' 			=> $row['awards'],
				'q1' 				=> $row['q1'],
				'q2' 				=> $row['q2'],
				'q3' 				=> $row['q3'],
				'q4' 				=> $row['q4'],
				'q5' 				=> $row['q5'],
				'q6' 				=> $row['q6'],
				'q7' 				=> $row['q7'],
				'q8' 				=> $row['q8'],
				'spid'				=> $row['spid'],
				'pwd_id'			=> $row['pwd_id'],
				'years_in_service'  => $row['years_in_service'],
				'health_issues' => $row['health_issues'],
				'gynecological' => $row['gynecological']

			];
		}

		return $data;
	}
	public function downloadEmpData()
	{
		$sql = "SELECT
		o.EMP_N AS Employee_ID,
		CONCAT('F', o.EMP_NUMBER) AS EMP_NUMBER,
		CONCAT(o.LAST_M, ', ', o.FIRST_M, ' ', SUBSTRING(o.MIDDLE_M, 1, 1)) AS Full_Name,
		o.UNAME AS Username,
		DATE_FORMAT(o.BIRTH_D, '%b. %d, %Y') AS BIRTH_DATE,
		TIMESTAMPDIFF(YEAR, o.BIRTH_D, CURDATE()) AS Age,
		o.SEX_C AS Gender,
		o.EMAIL AS Email,
		o.ALTER_EMAIL AS Alternate_Email,
		o.MOBILEPHONE AS Mobile_Phone,
		o.CURRENT_ADDRESS AS Current_Address,
		o.PERMANENT_ADDRESS AS Permanent_Address,
		d.DIVISION_M AS Division,
		p.POSITION_M AS Position,
		ds.DESIGNATION_M AS Designation,
		pr.LGU_M AS Province,
		o.HEA AS Highest_Education_Attainment,
		o.DATE_HIRED AS Date_Hired,
		o.YEARS_IN_SERVICE AS Years_In_Service,
		o.GENERATION AS Generation,
		o.AWARDS AS Awards_Received,
		o.Q1 AS With_Children_6_Years_and_Below,
		o.Q2 AS Member_of_Indigenous_Group,
		o.Q3 AS PWD,
		o.Q4 AS Solo_Parent,
		o.Q5 AS Number_of_Children_Below_18_Years_Old,
		o.Q6 AS Number_of_Children_with_Special_Needs,
		o.Q7 AS Existing_Gynecological_Disorder,
		o.Q8 AS Existing_Health_Concerns,
		o.HEALTH_ISSUES AS health_issues,
		o.GYNECOLOGICAL AS gynecological	
		FROM
			tblemployeeinfo o
		LEFT JOIN
			tblpersonneldivision d ON d.DIVISION_N = o.DIVISION_C
		LEFT JOIN
			tbldilgposition p ON p.POSITION_ID = o.POSITION_C
		LEFT JOIN
			tbldesignation ds ON ds.DESIGNATION_ID = o.DESIGNATION
		LEFT JOIN
			tbl_province pr ON pr.PROVINCE_C = o.PROVINCE_C
		WHERE
			o.STATUS = 0 order by  o.LAST_M;

	";
		$data = [];
		$getQry = $this->db->query($sql);

		while ($row = mysqli_fetch_assoc($getQry)) {

			$data[] = [
				'employee_id' => $row['Employee_ID'],
				'emp_number' => $row['EMP_NUMBER'],
				'full_name' => $row['Full_Name'],
				'username' => $row['Username'],
				'birth_date' => $row['BIRTH_DATE'],
				'age' => $row['Age'],
				'gender' => $row['Gender'],
				'email' => $row['Email'],
				'alternate_email' => $row['Alternate_Email'],
				'mobile_phone' => $row['Mobile_Phone'],
				'current_address' => $row['Current_Address'],
				'permanent_address' => $row['Permanent_Address'],
				'division' => $row['Division'],
				'position' => $row['Position'],
				'designation' => $row['Designation'],
				'province' => $row['Province'],
				'highest_education_attainment' => $row['Highest_Education_Attainment'],
				'date_hired' => $row['Date_Hired'],
				'years_in_service' => $row['Years_In_Service'],
				'generation' => $row['Generation'],
				'awards_received' => $row['Awards_Received'],
				'with_children_6_years_and_below' => $row['With_Children_6_Years_and_Below'],
				'member_of_indigenous_group' => $row['Member_of_Indigenous_Group'],
				'pwd' => $row['PWD'],
				'solo_parent' => $row['Solo_Parent'],
				'number_of_children_below_18_years_old' => $row['Number_of_Children_Below_18_Years_Old'],
				'number_of_children_with_special_needs' => $row['Number_of_Children_with_Special_Needs'],
				'existing_gynecological_disorder' => $row['Existing_Gynecological_Disorder'],
				'existing_health_concerns' => $row['Existing_Health_Concerns'],
				'health_issues' => $row['health_issues'],
				'gynecological' => $row['gynecological']
			];
		}
		return $data;

	}
	public function generateOffice()
	{

		$asd = '0,1, 10, 18, 17, 9, 7, 19, 20, 21, 22, 23, 24';

		$sql = "SELECT 
					DIVISION_N, 
					DIVISION_M 
				FROM `tblpersonneldivision` 
				WHERE DIVISION_N IN ($asd) AND DIVISION_M IS NOT NULL 
				ORDER BY DIVISION_M ASC";

		$getQry = $this->db->query($sql);

		$data = [];

		while ($row = mysqli_fetch_assoc($getQry)) {
			$data[$row['DIVISION_N']] = $row['DIVISION_M'];
		}

		return $data;
	}

	public function moduleAccess($access)
	{
		$sql = "SELECT 
					access.access_type, 
					emp.UNAME as 'username' 
				FROM tbl_module_access access 
				LEFT JOIN tblemployeeinfo as emp on access.user_id = emp.EMP_N 
				WHERE access.access_type = $access";

		$getQry = $this->db->query($sql);
		$data = [];

		while ($row = mysqli_fetch_assoc($getQry)) {
			$data[] = $row['username'];
		}

		return $data;
	}

	public function fetchEmployeesDTR($office = null, $month = null, $year = null)
	{
		$sql = "SELECT 
					e.EMP_N as emp_n,
					CONCAT(e.LAST_M, ', ', e.FIRST_M, ' ', e.MIDDLE_M) AS fullname,
					e.UNAME AS username,
					DATE_FORMAT(o.attendance, '%d') AS attendance,
					DATE_FORMAT(o.attendance, '%M %d, %Y') AS attendance_date,
				    DATE_FORMAT(o.attendance, '%w') AS attendance_day,
				    DATE_FORMAT(o.attendance, '%W') AS attendance_day_c,
				    DATE_FORMAT(o.am_in, '%H:%i') AS am_in,
				    DATE_FORMAT(o.am_in, '%h:%i %p') AS am_in_f,
				    DATE_FORMAT(o.am_out, '%H:%i') AS am_out,
				    DATE_FORMAT(o.am_out, '%h:%i %p') AS am_out_f,
				    DATE_FORMAT(o.pm_in, '%H:%i') AS pm_in,
				    DATE_FORMAT(o.pm_in, '%h:%i %p') AS pm_in_f,
				    DATE_FORMAT(o.pm_out, '%H:%i') AS pm_out,
				    DATE_FORMAT(o.pm_out, '%h:%i %p') AS pm_out_f,
				    DATE_FORMAT(o.date_generated, '%M %d, %Y') AS date_generated
          		FROM tbl_bisbio o 
          		LEFT JOIN tblemployeeinfo e ON e.EMP_N = o.emp_id 
          		LEFT JOIN tblpersonneldivision d on d.DIVISION_N = e.DIVISION_C
      			WHERE d.DIVISION_N = '" . $office . "' AND MONTH(o.attendance) = '" . $month . "' AND YEAR(o.attendance) = '" . $year . "'";

		$sql .= " ORDER BY e.UNAME, o.attendance";

		$getQry = $this->db->query($sql);
		$data = $days = [];
		$d = cal_days_in_month(CAL_GREGORIAN, $month, $year);

		while ($row = mysqli_fetch_assoc($getQry)) {
			for ($i = 1; $i <= $d; $i++) {
				$index = '';
				$jd = GregorianToJD($month, $i, $year);
				$month_f = JDMonthName($jd, 1);
				$day = JDDayOfWeek($jd, 1);
				$day_int = JDDayOfWeek($jd, 0);
				$index = $i > 9 ? $i : '0' . $i;

				if (!array_key_exists($i, $data)) {
					$days[$row['emp_n']][$index] = [
						'attendance'		=> $index,
						'attendance_date'	=> $month_f . ' ' . $index . ', ' . $year,
						'attendance_day'	=> $day,
						'attendance_day_int' => $day_int,
						'am_in'				=> '',
						'am_out' 			=> '',
						'pm_in' 			=> '',
						'pm_out' 			=> '',
						'undertime' 		=> '',
						'hours' 			=> '',
						'mins' 				=> '',
						'fullname'			=> $row['fullname'],
						'username'			=> $row['username']
					];
				}
			}
		}


		$sql = "SELECT 
					e.EMP_N as emp_n,
					CONCAT(e.LAST_M, ', ', e.FIRST_M, ' ', e.MIDDLE_M) AS fullname,
					e.UNAME AS username,
					DATE_FORMAT(o.attendance, '%d') AS attendance,
					DATE_FORMAT(o.attendance, '%M %d, %Y') AS attendance_date,
				    DATE_FORMAT(o.attendance, '%w') AS attendance_day,
				    DATE_FORMAT(o.attendance, '%W') AS attendance_day_c,
				    DATE_FORMAT(o.am_in, '%H:%i') AS am_in,
				    DATE_FORMAT(o.am_in, '%h:%i %p') AS am_in_f,
				    DATE_FORMAT(o.am_out, '%H:%i') AS am_out,
				    DATE_FORMAT(o.am_out, '%h:%i %p') AS am_out_f,
				    DATE_FORMAT(o.pm_in, '%H:%i') AS pm_in,
				    DATE_FORMAT(o.pm_in, '%h:%i %p') AS pm_in_f,
				    DATE_FORMAT(o.pm_out, '%H:%i') AS pm_out,
				    DATE_FORMAT(o.pm_out, '%h:%i %p') AS pm_out_f,
				    DATE_FORMAT(o.date_generated, '%M %d, %Y') AS date_generated
          		FROM tbl_bisbio o 
          		LEFT JOIN tblemployeeinfo e ON e.EMP_N = o.emp_id 
          		LEFT JOIN tblpersonneldivision d on d.DIVISION_N = e.DIVISION_C
      			WHERE d.DIVISION_N = '" . $office . "' AND MONTH(o.attendance) = '" . $month . "' AND YEAR(o.attendance) = '" . $year . "'";

		$sql .= " ORDER BY o.emp_id, o.attendance";

		$getQry = $this->db->query($sql);


		while ($row = mysqli_fetch_assoc($getQry)) {
			$undertime = $this->getUndertime2($row['attendance_day'], $row['am_in'], $row['pm_out']);
			$days[$row['emp_n']][$row['attendance']] = [
				'attendance'		=> $row['attendance'],
				'attendance_date'	=> $row['attendance_date'],
				'attendance_day'	=> $row['attendance_day'],
				'am_in'				=> $row['am_in_f'],
				'am_out' 			=> $row['am_out_f'],
				'pm_in' 			=> $row['pm_in_f'],
				'pm_out' 			=> $row['pm_out_f'],
				'date_generated' 	=> $row['date_generated'],
				'undertime' 		=> $undertime,
				'hours'				=> !empty($undertime) ? $undertime['hours'] : '',
				'mins'				=> !empty($undertime) ? $undertime['mins'] : '',
				'fullname'			=> $row['fullname'],
				'username'			=> $row['username']
			];
		}

		return $days;
	}

	public function findEmployee($id)
	{
		$sql = "SELECT 
					EMP_N,
					CONCAT(LAST_M, ', ', FIRST_M, ' ', MIDDLE_M) AS fullname,
					UNAME 
				FROM tblemployeeinfo WHERE EMP_N = $id";
		$getQry = $this->db->query($sql);

		$result = mysqli_fetch_assoc($getQry);

		return $result;
	}

	public function insertExportDTRHistory($data)
	{
		// type = 1 employee
		// type = 2 office
		$sql = "INSERT INTO tbl_export_dtr_history 
				SET month = '" . $data['month'] . "', 
				year = '" . $data['year'] . "', 
				tid = '" . $data['tid'] . "', 
				type = '" . $data['type'] . "', 
				uid = '" . $data['uid'] . "',
				date_created = NOW()";

		$result = $this->db->query($sql);

		$last_id = mysqli_insert_id($this->db);

		return $last_id;
	}

	public function fetchDivision($id)
	{
		$sql = "SELECT DIVISION_M FROM tblpersonneldivision WHERE DIVISION_N = '" . $id . "'";
		$getQry = $this->db->query($sql);

		$result = mysqli_fetch_assoc($getQry);

		return $result;
	}


	public function blockEmployee($emp_id)
	{
		$sql = "UPDATE tblemployeeinfo SET BLOCK = 'Y' WHERE EMP_N = '" . $emp_id . "'";
		$getQry = $this->db->query($sql);
	}


	public function approveEmployee($emp_id)
	{
		$sql = "UPDATE tblemployeeinfo SET BLOCK = 'N' WHERE EMP_N = '" . $emp_id . "'";
		$getQry = $this->db->query($sql);
	}


	public function deleteEmployee($emp_id)
	{
		$sql = "DELETE FROM `tblemployeeinfo` WHERE EMP_N = '" . $emp_id . "'";
		$getQry = $this->db->query($sql);
	}
}
