<?php

class HRManager extends Connection
{ 

	function __construct() {
        if (!isset($this->db)) {
            $conn = new mysqli($this->hostname, $this->dbUser, $this->dbPassword, $this->dbName);
            if ($conn->connect_error) {
                die("Database is not connected: " . $conn->connect_error);
            } else {
                $this->db = $conn;
            }
        }
    }

	public function fetch($id=null)
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

        while ($row = mysqli_fetch_assoc($getQry)	) {
        	$data[$row['id']] = [
        		'cut_off'	=> $row['cut_off'],
        		'date_from'	=> $row['date_from'],
        		'date_to'	=> $row['date_to'],
        		'uploader'	=> $row['uploader']
        	]; 
        }

        return $data;
	}

	public function getDTRRecord($emp_no, $emp, $current_date, $time, $state, $sel=0)
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
					e.EMP_N = '".$emp_no."' AND e.UNAME = '".$emp."' AND o.attendance = '".$current_date."'";

		if ($sel > 0) {
			if ($state == 0) {
				$sql .= " AND o.am_in = '".$time."'";
			} elseif ($state == 1) {
				$sql .= " AND o.am_out = '".$time."'";
			} elseif ($state == 2) {
				$sql .= " AND o.pm_in = '".$time."'";
			} elseif ($state == 3) {
				$sql .= " AND o.pm_out = '".$time."'";
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

	public function getDTRRecord2($emp_no, $emp, $current_date, $time, $state, $sel=0)
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
					e.EMP_N = '".$emp_no."' AND e.UNAME = '".$emp."' AND o.attendance = '".$current_date."'";

		if ($sel > 0) {
			if ($state == 0) {
				$sql .= " AND o.am_in = '".$time."'";
			} elseif ($state == 1) {
				$sql .= " AND o.am_out = '".$time."'";
			} elseif ($state == 2) {
				$sql .= " AND o.pm_in = '".$time."'";
			} elseif ($state == 3) {
				$sql .= " AND o.pm_out = '".$time."'";
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

		$sql .= " SET $field = '".$data['time']."', attendance = '".$data['date']."', emp_id = ".$data['emp_code'].", created_by = ".$data['author']."";

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

		$sql .= " SET $field = '".$data['time']."' WHERE attendance = '".$data['date']."' AND emp_id = ".$data['emp_code']."";
		$result = $this->db->query($sql);

        return $result;
	}

	public function insertUploadDTRHistory($data) 
	{
		$sql = "INSERT INTO tbl_upload_dtr_history SET date_from = '".$data['date_from']."', date_to = '".$data['date_to']."', uploader = '".$data['uploader']."', action = '".$data['action']."' ";
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

	public function fetchDailyTimeRecord($id=null, $year, $month) 
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
			$sql .= " WHERE e.EMP_N = '".$id."' AND YEAR(o.attendance) = '".$year."' AND MONTH(o.attendance) = '".$month."'";
		}

		$getQry = $this->db->query($sql);		

		$data = $days = [];
        $d=cal_days_in_month(CAL_GREGORIAN,$month,$year);

      	while ($row = mysqli_fetch_assoc($getQry)) {
			for ($i=1; $i <= $d; $i++) { 
				$index = '';
				$jd = GregorianToJD($month, $i, $year);
				$month_f = JDMonthName($jd, 1);
				$day = JDDayOfWeek($jd, 1);
				$day_int = JDDayOfWeek($jd, 0);
				$index = $i > 9 ? $i : '0'.$i;

				if (!array_key_exists($i, $data)) {
					$days[$index] = [
						'attendance'		=> $index,
						'attendance_date'	=> $month_f.' '.$index.', '.$year.'<br>'.$day,
						'attendance_date_f'	=> $month_f.' '.$index.', '.$year,
			    		'attendance_day'	=> $day,
			    		'attendance_day_int'=> $day_int,
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
			$sql .= " WHERE e.EMP_N = '".$id."' AND YEAR(o.attendance) = '".$year."' AND MONTH(o.attendance) = '".$month."'";
		}
				
		$getQry = $this->db->query($sql);		
		// $data = [];
		
        while ($row = mysqli_fetch_assoc($getQry)) {

        	$undertime = $this->getUndertime2($row['attendance_day'], $row['am_in'], $row['pm_out']);
        	$undertime_f = '';
        	if (!empty($undertime)) {
	        	if ($undertime['hours'] != null AND $undertime['mins']) {
	        		$undertime_f = $undertime['hours'] .' hour(s) & '. $undertime['mins'] .' mins';
	        	} elseif ($undertime['hours'] != null) {
	        		$undertime_f = $undertime['hours'] .' hour(s)';
	        	} elseif ($undertime['mins'] != null) {
	        		$undertime_f = $undertime['mins'] .' min(s)';
	        	}
        	}

        	$days[$row['attendance']] = [
        		'attendance'		=> $row['attendance'],
        		'attendance_date'	=> $row['attendance_date'] .'<br>'.$row['attendance_day_c'],
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

    	if (!empty($am_in) AND !empty($pm_out)) {
    		if ($is_monday) {
    			$nwam_in = '08:00';
            	$nwpm_out = date('h:i',strtotime($pm_out)) > date('h:i',strtotime('17:00')) ? '17:00' : $pm_out;
    		} else {
            	$nwam_in = date('h:i',strtotime($am_in)) < date('h:i',strtotime('07:00')) ? '07:00' : $am_in;
            	$nwpm_out = date('h:i',strtotime($pm_out)) > date('h:i',strtotime('18:00')) ? '18:00' : $pm_out;
    		}

    		$amin = new DateTime($nwam_in);
    		$pout = new DateTime($nwpm_out);

    		$ud = $pout->diff($amin);
            $date3333 = new DateTime($ud->format('%H'.':'.'%i'));
            $finalfinal = $date3333->diff($max_am_in);
            $dateZero = new DateTime("00:00");
    		
    		if ($ud->format('%H'.':'.'%i') > $max_am_in->format('H:i') || $finalfinal->format('%I') == $dateZero->format('I')) {
            	$undertime = ''; 
            } else {
            	$late_hours = $late_mins = '';
            	if ($finalfinal->format('%H') > 0 AND $finalfinal->format('%i') > 0) {
            		if ($finalfinal->format('%H') > 1) {
            			$late_hours = $finalfinal->format('%H') .' hrs & '. $finalfinal->format('%i') .' min(s)';
            		} else {
            			$late_hours = $finalfinal->format('%H') .' hr & '. $finalfinal->format('%i') .' min(s)';
            		}
            	} else if ($finalfinal->format('%H') > 0 AND $finalfinal->format('%i') == 0) {
            		if ($finalfinal->format('%H') > 1) {
            			$late_hours = $finalfinal->format('%H') .' hrs';
            		} else {
            			$late_hours = $finalfinal->format('%H') .' hr';
            		}
            	} else {
            		$late_hours = $finalfinal->format('%i') .' min(s)';
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

    	if (!empty($am_in) AND !empty($pm_out)) {
    		if ($is_monday) {
    			// $nwam_in = '08:00';
       			//$nwpm_out = date('h:i',strtotime($pm_out)) > date('h:i',strtotime('17:00')) ? '17:00' : $pm_out;
            	$nwam_in = date('h:i',strtotime($am_in)) < date('h:i',strtotime('08:00')) ? '08:00' : $am_in;
            	$nwpm_out = date('h:i',strtotime($pm_out)) > date('h:i',strtotime('17:00')) ? '17:00' : $pm_out;
    		} else {
            	$nwam_in = date('h:i',strtotime($am_in)) < date('h:i',strtotime('07:00')) ? '07:00' : $am_in;
            	$nwpm_out = date('h:i',strtotime($pm_out)) > date('h:i',strtotime('18:00')) ? '18:00' : $pm_out;
    		}

    		$amin = new DateTime($nwam_in);
    		$pout = new DateTime($nwpm_out);

    		$ud = $pout->diff($amin);
            $date3333 = new DateTime($ud->format('%H'.':'.'%i'));
            $finalfinal = $date3333->diff($max_am_in);
            $dateZero = new DateTime("00:00");
    		
    		if ($ud->format('%H'.':'.'%i') > $max_am_in->format('H:i') || $finalfinal->format('%I') == $dateZero->format('I')) {
            	$undertime = ''; 
            } else {
            	$late_hours = $late_mins = '';
            	if ($finalfinal->format('%H') > 0 AND $finalfinal->format('%i') > 0) {
            		if ($finalfinal->format('%H') > 1) {
            			$late_hours = $finalfinal->format('%H');
            			$late_mins = $finalfinal->format('%i');
            			// $late_hours = $finalfinal->format('%H') .' hrs & '. $finalfinal->format('%i') .' min(s)';
            		} else {
            			$late_hours = $finalfinal->format('%H');
            			$late_mins = $finalfinal->format('%i');
            			// $late_hours = $finalfinal->format('%H') .' hr & '. $finalfinal->format('%i') .' min(s)';
            		}
            	} else if ($finalfinal->format('%H') > 0 AND $finalfinal->format('%i') == 0) {
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
				WHERE o.EMP_N = '".$id."'";

		$getQry = $this->db->query($sql);
        
        $result = mysqli_fetch_assoc($getQry);

        return $result;
	}

	public function fetchEmployeesDirectory($office=null)
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

	public function generateOffice()
	{

		$asd = '1, 10, 18, 17, 9, 7, 19, 20, 21, 22, 23, 24';
		
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

	public function fetchEmployeesDTR($office=null, $month=null, $year=null)
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
      			WHERE d.DIVISION_N = '".$office."' AND MONTH(o.attendance) = '".$month."' AND YEAR(o.attendance) = '".$year."'";
      	
      	$sql .= " ORDER BY e.UNAME, o.attendance";

      	$getQry = $this->db->query($sql);
      	$data = $days = [];
        $d=cal_days_in_month(CAL_GREGORIAN,$month,$year);

      	while ($row = mysqli_fetch_assoc($getQry)) {
			for ($i=1; $i <= $d; $i++) { 
				$index = '';
				$jd = GregorianToJD($month, $i, $year);
				$month_f = JDMonthName($jd, 1);
				$day = JDDayOfWeek($jd, 1);
				$day_int = JDDayOfWeek($jd, 0);
				$index = $i > 9 ? $i : '0'.$i;

				if (!array_key_exists($i, $data)) {
					$days[$row['emp_n']][$index] = [
						'attendance'		=> $index,
						'attendance_date'	=> $month_f.' '.$index.', '.$year,
			    		'attendance_day'	=> $day,
			    		'attendance_day_int'=> $day_int,
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
      			WHERE d.DIVISION_N = '".$office."' AND MONTH(o.attendance) = '".$month."' AND YEAR(o.attendance) = '".$year."'";
      	
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
				SET month = '".$data['month']."', 
				year = '".$data['year']."', 
				tid = '".$data['tid']."', 
				type = '".$data['type']."', 
				uid = '".$data['uid']."',
				date_created = NOW()";

		$result = $this->db->query($sql);

        $last_id = mysqli_insert_id($this->db);

		return $last_id;
	}

	public function fetchDivision($id)
	{
		$sql = "SELECT DIVISION_M FROM tblpersonneldivision WHERE DIVISION_N = '".$id."'";
		$getQry = $this->db->query($sql);
        
        $result = mysqli_fetch_assoc($getQry);

        return $result;
	}


	public function blockEmployee($emp_id)
	{
		$sql = "UPDATE tblemployeeinfo SET BLOCK = 'Y' WHERE EMP_N = '".$emp_id."'";
		$getQry = $this->db->query($sql);
	}


	public function approveEmployee($emp_id)
	{
		$sql = "UPDATE tblemployeeinfo SET BLOCK = 'N' WHERE EMP_N = '".$emp_id."'";
		$getQry = $this->db->query($sql);
	}


	public function deleteEmployee($emp_id)
	{
		$sql = "DELETE FROM `tblemployeeinfo` WHERE EMP_N = '".$emp_id."'";
		$getQry = $this->db->query($sql);
	}
}