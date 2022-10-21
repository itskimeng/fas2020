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

    public function fetchYearOpts()
    {
        return $months = [
            '2021'    => '2021', 
            '2022'    => '2022',
            '2023'    => '2023'
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
  // print_r($sql);
  //       die();
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
                    rate_c,
                    indicator_d,
                    rate_d,
                    formula,
                    indicator_e,
                    rate_e,
                    is_gap_analysis,
                    gap_analysis
                FROM
                    tbl_qoe 
                WHERE
                    id = $id";

        $getQry = $this->db->query($sql);
        $result = mysqli_fetch_array($getQry);

        return $result;
    }

    public function fetchQOEFrequency($entry_id, $id=null) 
    {
        $sql = "SELECT
                    *
                FROM
                    tbl_qoe_frequency_entry
                WHERE
                    qop_entry_id = $entry_id";

                if (!empty($id)) 
                {
                    $sql .= " AND qoe_id = $id";
                }
       // print_r($sql);
       // die();
        $getQry = $this->db->query($sql);
        $data = [];

        while ($row = mysqli_fetch_array($getQry)) {
            $rate = (array)json_decode($row['rate']);
            $is_na = (array)json_decode($row['is_na']);

            $data[] = [
                'id'    => $row['id'],
                'rate'  => $rate,
                'is_na' => $is_na,
                'total' => $this->getTotal($rate),
                'indicator' => $row['indicator'],
                'year'  => $row['year']
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
                o.frequency_monitoring,
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
                'is_owner'          => $is_owner,
                'frequency_monitoring' => $row['frequency_monitoring'],
                'id'                => $row['id']
            ]; 
        }

        return $data;
    }

    public function fetchAdmins($id)
    {
        // $is_admin = false;
        $is_admin = true;
        if (in_array($id, [3300, 2563, 3174, 3319])) {//sdcatapang, mmmonteiro, masacluti
            $is_admin = true;
        }

        return $is_admin;
    }

    public function fetchQOEs($id) 
    {
        $sql = "SELECT
                    id,
                    objective,
                    target_percentage,
                    indicator_a,
                    indicator_b,
                    indicator_c,
                    indicator_d,
                    formula,
                    indicator_e,
                    is_gap_analysis,
                    gap_analysis
                FROM
                    tbl_qoe 
                WHERE
                    qop_id = $id";
                    
        $getQry = $this->db->query($sql);
        $data = [];
        
        while ($row = mysqli_fetch_assoc($getQry)) {
            $data[$row['id']] = [
                'objective'         => $row['objective'],
                'target_percentage' => $row['target_percentage'],
                'indicator_a'       => $row['indicator_a'],
                'indicator_b'       => $row['indicator_b'],
                'indicator_c'       => $row['indicator_c'],
                'indicator_d'       => $row['indicator_d'],
                'indicator_e'       => $row['indicator_e'],
                'formula'           => $row['formula'],
                'is_gap_analysis'   => $row['is_gap_analysis'],
                'gap_analysis'      => $row['gap_analysis'],
                'qoe_id'                => $row['id']
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


    public function update_gap($data)
    {
        $sql = " UPDATE tbl_qoe SET is_gap_analysis = ".$data['is_gap_analysis']." WHERE id = ".$data['id']." ";
        $getQry = $this->db->query($sql);
    }

    public function remove_gap_analysis($data)
    {
        $sql = " UPDATE tbl_qoe SET gap_analysis = '' WHERE id = ".$data['id']." ";

        $getQry = $this->db->query($sql);
    }

    public function update_gap_analysis($data)
    {
        $sql = " UPDATE tbl_qoe SET gap_analysis = '".$data['gap_analysis']."' WHERE id = ".$data['id']." ";

        $getQry = $this->db->query($sql);
    }


    public function fetchQP($id = 0)
    {
        $sql = " SELECT
                    qp.id AS id,
                    qp.frequency_monitoring AS frequency_monitoring,
                    qp.coverage AS coverage,
                    qp.qp_code AS qp_code,
                    qp.procedure_title AS procedure_title,
                    qp.created_by AS created_by,
                    qp.date_created AS date_created,
                    qp.updated_by AS updated_by,
                    qp.date_updated AS date_updated,
                    ei.FIRST_M AS FIRST_M,
                    ei.LAST_M AS LAST_M,
                    pd.DIVISION_M AS office

                FROM tbl_qop qp
                LEFT JOIN tbl_qms_process_owners qo ON
                    qo.id = qp.process_owner
                LEFT JOIN tblemployeeinfo ei ON
                    ei.EMP_N = qo.emp_id
                LEFT JOIN tblpersonneldivision pd ON
                    pd.DIVISION_N = qp.office
                    ";

        if ($id != 0) 
        {
            $sql .= ' WHERE qp.id = '.$id;
        }

        $getQry = $this->db->query($sql);
        $data = [];
        
        while ($row = mysqli_fetch_assoc($getQry)) {
            $data[] = [
                'id'                    => $row['id'],
                'qp_code'               => $row['qp_code'],
                'frequency_monitoring'  => $row['frequency_monitoring'],
                'coverage'              => $row['coverage'],
                'office'                => $row['office'],
                'procedure_title'       => $row['procedure_title'],
                'process_owner'         => $row['FIRST_M'].' '.$row['LAST_M']
            ]; 
        }

        return $data;
    }

    public function create_qop_entry($data, $qp_covered)
    {
        $sql = " INSERT INTO `tbl_qop_report`(`qop_id`, `date_created`, `created_by`, `qp_covered`) VALUES ( ".$data.", NOW(), ".$_SESSION['currentuser'].", '".$qp_covered."' ) ";
        $this->db->query($sql);
        $last_id = mysqli_insert_id($this->db);

        return $last_id;
    }

    public function duplicate_qop_frequency($parent_id, $entry_id, $year)
    {
        $sql = " SELECT `id` FROM `tbl_qoe` WHERE qop_id = ".$parent_id." ";
        $qry = $this->db->query($sql);

        while ($row = $qry->fetch_assoc()) 
        {
            $sql_f = " SELECT `id`, `qoe_id`, `indicator`, `rate`, `is_na`, `date_updated`, `updated_by` FROM `tbl_qoe_frequency_entry_cache` WHERE qoe_id = ".$row['id']." AND year = ".$year." ";
            $qry_f = $this->db->query($sql_f);
            $rowcount=mysqli_num_rows($qry_f);

            if ($rowcount == 0) 
            {
                $sql_f = " SELECT `id`, `qoe_id`, `indicator`, `rate`, `is_na`, `date_updated`, `updated_by` FROM `tbl_qoe_frequency` WHERE qoe_id = ".$row['id']." ";
                $qry_f = $this->db->query($sql_f);
            }
     

            $qry_f = $this->db->query($sql_f);
            while ($row_f = $qry_f->fetch_assoc()) 
            {
                $sql_f_d = " INSERT INTO `tbl_qoe_frequency_entry`(`qop_entry_id`, `qoe_id`, `indicator`, `rate`, `is_na`, `date_updated`, `updated_by`, `year`) VALUES ( ".$entry_id.", ".$row_f['qoe_id'].", '".$row_f['indicator']."', '".$row_f['rate']."', '".$row_f['is_na']."', NOW(), ".$_SESSION['currentuser'].", ".$year." ) ";
                $this->db->query($sql_f_d);

                if ($rowcount == 0) 
                {
                    $sql_f_d = " INSERT INTO `tbl_qoe_frequency_entry_cache`(`qop_entry_id`, `qoe_id`, `indicator`, `rate`, `is_na`, `date_updated`, `updated_by`, `year`) VALUES ( ".$entry_id.", ".$row_f['qoe_id'].", '".$row_f['indicator']."', '".$row_f['rate']."', '".$row_f['is_na']."', NOW(), ".$_SESSION['currentuser'].", ".$year." ) ";
                    $this->db->query($sql_f_d);
                }


            }
        }
    }


    public function fetch_qop_entries($id)
    {
        $sql = " 
            SELECT
                qr.id AS id,
                qr.qop_id AS qop_id,
                DATE_FORMAT(qr.date_created, '%m-%d-%Y') AS date_created,
                qr.status AS status,
                qr.qp_covered AS qp_covered,
                qp.frequency_monitoring AS frequency_monitoring,
                qp.coverage AS coverage,
                qp.qp_code AS qp_code,
                qp.procedure_title AS procedure_title,
                eo.LAST_M AS lastname,
                eo.FIRST_M AS firstname,
                eo.MIDDLE_M AS middlename,
                pd.DIVISION_M AS division,
                cb.UNAME AS created_by,
                cb.EMP_N AS creator_id,
                fq.year AS year_created,
                DATE_FORMAT(qr.date_updated, '%m-%d-%Y') AS date_updated,
                ub.UNAME AS updated_by,
                pd.DIVISION_N  AS division_id
            FROM
                tbl_qop_report qr
            LEFT JOIN tbl_qop qp ON
                qp.id = qr.qop_id
            LEFT JOIN tbl_qms_process_owners qo ON
                qo.id = qp.process_owner
            LEFT JOIN tblemployeeinfo eo ON
                eo.EMP_N = qo.emp_id
            LEFT JOIN tblpersonneldivision pd ON
                pd.DIVISION_N = qp.office
            LEFT JOIN tblemployeeinfo cb ON
                cb.EMP_N = qr.created_by
            LEFT JOIN tbl_qoe_frequency_entry fq ON
                fq.qop_entry_id = qr.id
            LEFT JOIN tblemployeeinfo ub ON
                ub.EMP_N = qr.updated_by

            WHERE qr.status IN(0, 1, 2, 3)
        ";

        if ($id != 0) 
        {
            $sql .= ' AND qr.id = '.$id;
        }


        if (!in_array($_SESSION['currentuser'], [3300, 2563, 3174, 3319])) //sdcatapang, mmmonteiro, masacluti
        {
            $sql .= ' AND qp.office = '.$_SESSION['division'];
        }


        $sql .= ' GROUP BY fq.qop_entry_id ORDER BY qr.id DESC '; 
        
        $getQry = $this->db->query($sql);
        $data = [];
        
        while ($row = mysqli_fetch_assoc($getQry)) {
            $data[] = [
                'id'                    => $row['id'],
                'qop_id'                => $row['qop_id'],
                'date_created'          => $row['date_created'],
                'created_by'            => $row['created_by'],
                'status'                => $row['status'],
                'frequency_monitoring'  => $row['frequency_monitoring'],
                'coverage'              => $row['coverage'],
                'qp_code'               => $row['qp_code'],
                'procedure_title'       => $row['procedure_title'],
                'process_owner'         => $row['firstname'].' '.$row['lastname'],
                'middlename'            => $row['middlename'],
                'division'              => $row['division'],
                'creator_id'            => $row['creator_id'],
                'qp_covered'            => $row['frequency_monitoring'] == 3 ? '' : $row['qp_covered'],
                'qp_covered_modal'      => $row['qp_covered'],
                'year_created'          => $row['year_created'],
                'date_updated'          => $row['date_updated'] != NULL ? "~".$row['date_updated']."~" : "~".$row['date_created']."~",
                'updated_by'            => $row['updated_by'] != '' ? "~".$row['updated_by']."~" : "~".$row['created_by']."~",
                'division_id'           => $row['division_id']
            ];
        }

        return $data;
    }


    public function delete_qop_entry($id)
    {
        $sql = " DELETE FROM `tbl_qop_report` WHERE id = ".$id." ";
        $this->db->query($sql);
    }

    public function delete_qoe_entry($id)
    {
        $sql = " DELETE FROM `tbl_qoe_frequency_entry` WHERE qop_entry_id = ".$id." ";
        $this->db->query($sql);
    }


    public function update_entry_status($id, $status)
    {
        $sql = " UPDATE `tbl_qop_report` SET status = ".$status.", date_updated = NOW(), updated_by = ".$_SESSION['currentuser']."  WHERE id = ".$id." ";
        $this->db->query($sql);
    }


    public function delete_qop($id)
    {
        $sql = " DELETE FROM `tbl_qop` WHERE id = ".$id." ";
        $this->db->query($sql);
    }

    public function delete_qoe($id)
    {
        $sql = " DELETE FROM `tbl_qoe_frequency` WHERE qop_entry_id = ".$id." ";
        $this->db->query($sql);
    }

    public function get_qp_covered($id)
    {
        $sql = " SELECT `qp_covered` FROM `tbl_qop_report` WHERE id= ".$id." ";
        $getQry = $this->db->query($sql);
        $row = $getQry->fetch_assoc();

        return $row;
    }

    public function fetch_sys_admin($id)
    {
        $sys_admin = false;
        if (in_array($id, [3300, 2563, 3174, 3319])) {//sdcatapang, mmmonteiro, masacluti
            $sys_admin = true;
        }

        return $sys_admin;
    }


    public function fetchQOEFrequencyBase($entry_id) 
    {
        $sql = "SELECT
                    *
                FROM
                    tbl_qoe_frequency
                WHERE
                    qoe_id = $entry_id";
        // print_r($sql);
        // die();           
        $getQry = $this->db->query($sql);
        $data = [];

        while ($row = mysqli_fetch_array($getQry)) {
            $rate = (array)json_decode($row['rate']);
            $is_na = (array)json_decode($row['is_na']);

            $data[] = [
                'id'    => $row['id'],
                'rate'  => $rate,
                'is_na' => $is_na,
                'total' => $this->getTotal($rate),
                'indicator' => $row['indicator'],
                'year'  => 's'
            ];
        }

        return $data;
    }

    public function fetchQOEFrequencyYear($entry_id, $id=null) 
    {
        $sql = "SELECT
                    *
                FROM
                    tbl_qoe_frequency_entry
                WHERE
                    qop_entry_id = $entry_id";

                if (!empty($id)) 
                {
                    $sql .= " AND qoe_id = $id";
                }
       // print_r($sql);
       // die();
        $getQry = $this->db->query($sql);
        $data = [];

        while ($row = mysqli_fetch_array($getQry)) {
            // $rate = (array)json_decode($row['rate']);
            // $is_na = (array)json_decode($row['is_na']);
            $rate = json_decode($row['rate']);
            $is_na = json_decode($row['is_na']);

            $data[] = [
                'id'    => $row['id'],
                'rate'  => $rate,
                'is_na' => $is_na,
                // 'total' => $this->getTotal($rate),
                'total' => $rate,
                'indicator' => $row['indicator'],
                'year'  => $row['year']
            ];
        }

        return $data;
    }

}

