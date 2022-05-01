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
		$sql = "INSERT INTO tbl_upload_dtr_history SET date_from = '".$data['date_from']."', date_to = '".$data['date_to']."', uploader = '".$data['uploader']."'";
		$result = $this->db->query($sql);

        $last_id = mysqli_insert_id($this->db);

		return $last_id;
	}

	public function fetchDTRUploadHistory() 
	{
		$sql = "SELECT 
					e.UNAME as uploader,
					DATE_FORMAT(o.date_from, '%b %d, %Y') AS date_from,
					DATE_FORMAT(o.date_to, '%b %d, %Y') AS date_to
				FROM tbl_upload_dtr_history o
				LEFT JOIN tblemployeeinfo e ON e.EMP_N = o.uploader";

		$getQry = $this->db->query($sql);		
		$data = [];
		
        while ($row = mysqli_fetch_assoc($getQry)) {
        	$data[] = [
        		'uploader'	=> $row['uploader'],
        		'date_from'	=> $row['date_from'],
        		'date_to'	=> $row['date_to']
        	]; 
        }

		return $data;
	}

}