<?php

class QMSManager extends Connection
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

	public function fetchCoverage()
	{	
		return $coverage = [1 => QMSProcedure::COVERAGE_1, 2 => QMSProcedure::COVERAGE_2, 3 => QMSProcedure::COVERAGE_3, 4 => QMSProcedure::COVERAGE_4];
	}

    public function fetchOfficeOpts()
    {
        return $office = [
            1   => 'Office of the Regional Director (ORD)', 
            18  => 'Local Government Monitoring and Evaluation Division (LGMED)',
            9   => 'Local Government Capability Development Division (LGCDD)',
            10  => 'Finance and Administrative Division (FAD)'
        ];
    }

    public function fetchMonthOpts()
    {
        return $months = [
            '01'    => 'January', 
            '02'    => 'February',
            '03'    => 'March',
            '04'    => 'April',
            '05'    => 'May',
            '06'    => 'June',
            '07'    => 'July',
            '08'    => 'August',
            '09'    => 'September',
            '10'    => 'October',
            '11'    => 'November',
            '12'    => 'December'
        ];
    }

    public function fetchQuarterOpts()
    {
        return $months = [
            '01'    => '1st Quarter', 
            '02'    => '2nd Quarter',
            '03'    => '3rd Quarter',
            '04'    => '4th Quarter'
        ];
    }

    public function fetchProcessOwners()
    {
        $sql = "SELECT
                    o.id,
                    e.LAST_M AS lname,
                    e.FIRST_M AS fname,
                    SUBSTRING(e.MIDDLE_M, 1, 1) AS mi,
                    d.DIVISION_M AS division,
                    p.POSITION_M AS position
                FROM
                    tbl_qms_process_owners o
                LEFT JOIN tblemployeeinfo e ON
                    e.EMP_N = o.emp_id
                LEFT JOIN tblpersonneldivision d ON
                    d.DIVISION_N = e.DIVISION_C
                LEFT JOIN tbldilgposition p ON
                    p.POSITION_ID = e.POSITION_C
                LEFT JOIN tbldesignation ds ON
                    ds.DESIGNATION_ID = e.DESIGNATION";
        
        $getQry = $this->db->query($sql);

        $data = [];
        
        while ($row = mysqli_fetch_assoc($getQry)) {
            $data[$row['id']] = [
                'lname'     => $row['lname'],
                'fname'     => $row['fname'],
                'mi'        => $row['mi'],
                'office'    => $row['division'],
                'position'  => $row['position'],
            ]; 
        }
        print_r($data);


        return $data;
        exit();
    }

    public function fetchProcessOwnersList()
    {
        $sql = "SELECT
                    o.id,
                    CONCAT(e.LAST_M, ', ', e.FIRST_M, ' ', substring(e.MIDDLE_M, 1, 1)) as fullname
                FROM
                    tbl_qms_process_owners o
                LEFT JOIN tblemployeeinfo e ON
                    e.EMP_N = o.emp_id";
        
        $getQry = $this->db->query($sql);

        $data = [];
        
        while ($row = mysqli_fetch_assoc($getQry)) {
            $data[$row['id']] = $row['fullname']; 
        }

        return $data;
    }

    public function fetchProcedureData($id) 
    {
        $sql = "SELECT
                    o.id,
                    o.frequency_monitoring,
                    o.coverage,
                    o.office,
                    o.process_owner,
                    o.qp_code,
                    o.procedure_title,
                    DATE_FORMAT(o.date_created, '%Y-%m-%d') AS date_created,
                    e.UNAME AS created_by
                FROM
                    tbl_qop o
                LEFT JOIN tblemployeeinfo e ON
                    e.EMP_N = o.created_by
                WHERE
                    id = $id";

        $getQry = $this->db->query($sql);
        $result = mysqli_fetch_array($getQry);

        return $result;
    }

    public function fetchFrequencyMonitoring()
    {
        return $office = [
            1   => QMSProcedure::FREQUENCY_1, 
            2   => QMSProcedure::FREQUENCY_2,
            3   => QMSProcedure::FREQUENCY_3
        ];
    }

    public function fetchObjectiveData($id) 
    {
        $sql = "SELECT
                    objective,
                    target_percentage,
                    indicator_a,
                    rate_a,
                    indicator_b,
                    rate_b,
                    indicator_c,
                    rate_c
                FROM
                    tbl_qoe 
                WHERE
                    id = $id";
                    
        $getQry = $this->db->query($sql);
        $result = mysqli_fetch_array($getQry);

        return $result;
    }

    public function fetchQOEFrequency($id) 
    {
        $sql = "SELECT
                    *
                FROM
                    tbl_qoe_frequency 
                WHERE
                    qoe_id = $id";
                    
        $getQry = $this->db->query($sql);
        $data = [];

        while ($row = mysqli_fetch_array($getQry)) {
            $rate = (array)json_decode($row['rate']);
            $is_na = (array)json_decode($row['is_na']);

            $data[] = [
                'id'    => $row['id'],
                'rate'  => $rate,
                'is_na' => $is_na,
                'total' => $this->getTotal($rate)
            ];
        }

        return $data;
    }

    public function getTotal($data) 
    {
        $total = 0;
        foreach ($data as $key => $dd) {
            if (!empty($dd) AND is_numeric($dd)) {
                $total += $dd;
            }
        }

        return number_format($total, 2);
    }

    public function fetchQOEData($id) 
    {
        $sql = "SELECT
                    id,
                    objective
                FROM
                    tbl_qoe 
                WHERE
                    qop_id = $id";

        $getQry = $this->db->query($sql);
        $data = [];
        
        while ($row = mysqli_fetch_assoc($getQry)) {
            $data[$row['id']] = $row['objective']; 
        }

        return $data;
    }

    public function fetchQualityProcedures() 
    {
        $currentuser = $_SESSION['currentuser'];
        $sql = "SELECT
                o.id,
                o.coverage,
                o.office,
                CONCAT(ei.LAST_M, ', ', ei.FIRST_M, ' ', substring(ei.MIDDLE_M, 1, 1)) as fullname,
                o.qp_code,
                o.procedure_title,
                DATE_FORMAT(o.date_created, '%Y-%m-%d') AS date_created,
                e.UNAME AS created_by,
                ei.EMP_N AS emp_n
            FROM
                tbl_qop o
            LEFT JOIN tblemployeeinfo e ON
                e.EMP_N = o.created_by 
            LEFT JOIN tbl_qms_process_owners pr ON
                pr.id = o.process_owner 
            LEFT JOIN tblemployeeinfo ei ON
                ei.EMP_N = pr.emp_id ";

        $getQry = $this->db->query($sql);
        $data = [];
        
        while ($row = mysqli_fetch_assoc($getQry)) {

            $coverage_opts = $this->fetchCoverage();
            $office_opts = $this->fetchOfficeOpts();
            $is_owner = $currentuser == $row['emp_n'] ? true : false;

            $data[$row['id']] = [
                'coverage'          => $coverage_opts[$row['coverage']],
                'office'            => $office_opts[$row['office']],
                'process_owner'     => $row['fullname'],
                'procedure_title'   => $row['procedure_title'],
                'qp_code'           => $row['qp_code'],
                'emp_n'             => $row['emp_n'],
                'is_owner'          => $is_owner
            ]; 
        }

        return $data;
    }

    public function fetchAdmins($id)
    {
        $is_admin = false;
        if (in_array($id, [3300, 2563, 3174])) {//sdcatapang, mmmonteiro, masacluti
            $is_admin = true;
        }

        return $is_admin;
    }

    public function fetchQOEs($id) 
    {
        $sql = "SELECT
                    id,
                    objective,
                    indicator_a,
                    indicator_b,
                    indicator_c
                FROM
                    tbl_qoe 
                WHERE
                    qop_id = $id";

        $getQry = $this->db->query($sql);
        $data = [];
        
        while ($row = mysqli_fetch_assoc($getQry)) {
            $data[$row['id']] = [
                'objective'     => $row['objective'],
                'indicator_a'   => $row['indicator_a'],
                'indicator_b'   => $row['indicator_b'],
                'indicator_c'   => $row['indicator_c']
            ]; 
        }

        return $data;
    }

    public function fetchProcessOwner($id) {
        $sql = "SELECT 
                CONCAT(ei.FIRST_M, ' ', substring(ei.MIDDLE_M, 1, 1), '. ', ei.LAST_M) as fullname
            FROM
                tbl_qop o
            LEFT JOIN tblemployeeinfo e ON
                e.EMP_N = o.created_by 
            LEFT JOIN tbl_qms_process_owners pr ON
                pr.id = o.process_owner 
            LEFT JOIN tblemployeeinfo ei ON
                ei.EMP_N = pr.emp_id 
            WHERE o.id = $id";

        $getQry = $this->db->query($sql);
        $result = mysqli_fetch_array($getQry);
        
        return $result['fullname'];
    }

    public function fetchQMSDocuments() 
    {
        $sql = "SELECT * from issuances WHERE qms_type IS NOT NULL";
        $getQry = $this->db->query($sql);
        $data = [];
        
        while ($row = mysqli_fetch_assoc($getQry)) {
            $data[$row['qms_type']][] = [
                'id'            => $row['id'],
                'link'          => $row['url'],
                'title'         => $row['subject'],
                'date_issued'   => date('m.d', strtotime($row['date_issued']))
            ]; 
        }

        return $data;
    }

    public function fetchQMSActivities()
    {
        $sql = "SELECT 
                    id,
                    title,
                    start,
                    IF (MONTH(start) = MONTH(NOW()), true, false) AS is_currentmonth 
                FROM events WHERE program = 'QMS' AND YEAR(start) = YEAR(NOW()) ORDER BY start DESC limit 4";

        $getQry = $this->db->query($sql);
        $date_now = new DateTime();
        $data = [];
        
        while ($row = mysqli_fetch_assoc($getQry)) {
            $interval = '';
            if ($row['is_currentmonth']) {
                $act_date = new DateTime($row['start']);
                $interval = $date_now->diff($act_date);
            }

            $data[] = [
                'id'            => $row['id'],
                'title'         => mb_strimwidth($row['title'], 0, 85, "..."),
                'date_start'    => date('d', strtotime($row['start'])),
                'month'         => date('F', strtotime($row['start'])),
                'day'           => date('l', strtotime($row['start'])),
                'interval'      => $row['is_currentmonth'] ? $interval->d.' days' : '---' 
            ]; 
        }

        return $data;
    }

}