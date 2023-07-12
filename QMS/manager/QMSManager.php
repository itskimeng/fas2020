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
            '1'    => '1st Quarter',
            '2'    => '2nd Quarter',
            '3'    => '3rd Quarter',
            '4'    => '4th Quarter'
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

    public function fetchFormula()
    {
        return $formula = [
            'A/Bx100'                           => 'A/Bx100',
            'No. of Days Elapsed B-A'           => 'No. of Days Elapsed B-A',
            'Notice of Suspension/Disallowance' => 'Notice of Suspension/Disallowance',
            'A/(B+C)-Dx100'                     => 'A/(B+C)-Dx100'
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
                    o.rev_no,
                    o.EffDate,
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
        $proc_owner = $this->fetchProcessOwnersList();

        $pos = explode(",",$result['process_owner']);
        $sdata = [];

        foreach($pos as $po)
        {
            $id = $result['id'];
            $frequency_monitoring = $result['frequency_monitoring'];
            $coverage = $result['coverage'];
            $office = $result['office'];
            $rev_no = $result['rev_no'];
            $EffDate = $result['EffDate'];
            $process_owner = $proc_owner[$po];
            $qp_code = $result['qp_code'];
            $procedure_title = $result['procedure_title'];
            $sdata[$id][] = $process_owner;
        }

        foreach($sdata as $id => $process_owner)
        {
            $data = [
                "id" => $id,
                "frequency_monitoring" => $frequency_monitoring,
                "coverage" => $coverage,
                "office" => $office,
                "rev_no" => $rev_no,
                "EffDate" => $EffDate,
                "process_owner" => $process_owner,
                "qp_code" => $qp_code,
                "procedure_title" => $procedure_title
            ];
        }

            // print_r($data);
            // die();
        return $data;
    }

    public function fetchFrequencyMonitoring()
    {
        return $office = [
            1   => QMSProcedure::FREQUENCY_1,
            2   => QMSProcedure::FREQUENCY_2,
            // 3   => QMSProcedure::FREQUENCY_3
        ];
    }

    public function fetchObjectiveData($id)
    {
        $sql = "SELECT
                    id,
                    qop_id,
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
                    rate_e
                    -- is_gap_analysis,
                    -- gap_analysis
                FROM
                    tbl_qoe
                WHERE
                    id = $id";

        $getQry = $this->db->query($sql);
        $result = mysqli_fetch_array($getQry);

        return $result;
    }

    // public function fetchQOEFrequency1($entry_id, $id)
    // {
    //     $sql = "SELECT
    //                 a.id,
    //                 a.qop_entry_id,
    //                 a.qoe_id,
    //                 a.rate,
    //                 a.is_na,
    //                 a.indicator,
    //                 a.year,
    //                 b.is_gap_analysis,
    //                 b.gap_analysis,
    //                 qr.qp_covered
    //             FROM
    //                 tbl_qoe_frequency_entry a
    //             LEFT JOIN
    //                 tbl_gap_analysis b ON
    //                 a.qop_entry_id = b.qop_entry_id
    //             LEFT JOIN
    //                 tbl_qop_report qr ON
    //                 qr.id = a.qop_entry_id
    //             WHERE
    //                 a.qop_entry_id = $entry_id
    //             AND
    //                 a.qoe_id = $id";

    //             // if (!empty($id))
    //             // {
    //             //     $sql .= " AND a.qoe_id = $qoe_id";
    //             // }
    // //    print_r($sql);
    // //    die();
    //     $getQry = $this->db->query($sql);
    //     $data = [];
    //             // print_r($getQry);
    //             // die();
    //     while ($row = mysqli_fetch_array($getQry)) {
    //         $rate = (array)json_decode($row['rate']);
    //         $is_na = (array)json_decode($row['is_na']);
    //         // print_r($row);
    //         // die();
    //         $data[] = [
    //             'id'    => $row['id'],
    //             'qop_entry_id' => $row['qop_entry_id'],
    //             'qoe_id'    => $row['qoe_id'],
    //             'rate'  => $rate,
    //             'is_na' => $is_na,
    //             'total' => $this->getTotal($rate),
    //             'indicator' => $row['indicator'],
    //             'year'  => $row['year'],
    //             'is_gap_analysis' => $row['is_gap_analysis'],
    //             'gap_analysis' => $row['gap_analysis'],
    //             'qp_covered'    =>  $row['qp_covered']
    //         ];
    //     }
    //     // print_r($data);
    //     // die();
    //     return $data;
    // }

    public function fetchQOEFrequency($entry_id, $id)
    {
        $sql = "SELECT
                    a.id,
                    a.qop_entry_id,
                    a.qoe_id,
                    a.rate,
                    a.is_na,
                    a.indicator,
                    a.year,
                    b.qop_entry_id,
                    b.qoe_id,
                    b.is_gap_analysis,
                    b.gap_analysis
                FROM
                    tbl_qoe_frequency_entry a
                INNER JOIN
                    tbl_gap_analysis b ON
                    a.qop_entry_id = b.qop_entry_id
                WHERE
                    a.qop_entry_id = $entry_id
                AND
                    a.qoe_id = $id
                AND
                    b.qoe_id = $id";

                // if (!empty($id))
                // {
                //     $sql .= " AND a.qoe_id = $qoe_id";
                // }
    //    print_r($sql);
    //    die();
        $getQry = $this->db->query($sql);
        $data = [];
                // print_r($getQry);
                // die();
        while ($row = mysqli_fetch_array($getQry)) {
            $rate = (array)json_decode($row['rate']);
            $is_na = (array)json_decode($row['is_na']);
            // print_r($row);
            // die();
            $data[] = [
                'id'    => $row['id'],
                'qop_entry_id' => $row['qop_entry_id'],
                'qoe_id'    => $row['qoe_id'],
                'rate'  => $rate,
                'is_na' => $is_na,
                'total' => $this->getTotal($rate),
                'indicator' => $row['indicator'],
                'year'  => $row['year'],
                'is_gap_analysis' => $row['is_gap_analysis'],
                'gap_analysis' => $row['gap_analysis']
            ];
        }
        // print_r($data);
        // die();
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
                o.rev_no,
                o.EffDate,
                o.frequency_monitoring,
                process_owner,
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
        $sampdata = [];
        $data = [];

        while ($row = mysqli_fetch_assoc($getQry)) {
            // print_r(explode(',',$row['process_owner']));

            $coverage_opts = $this->fetchCoverage();
            $office_opts = $this->fetchOfficeOpts();
            $proc_owner = $this->fetchProcessOwnersList();
            $is_owner = $currentuser == $row['emp_n'] ? true : false;

            $pos = explode(',',$row['process_owner']);
            
            foreach($pos as $po)
            {
                $coverage = $coverage_opts[$row['coverage']];
                $office = $office_opts[$row['office']];
                $rev_no = $row['rev_no'];
                $EffDate = $row['EffDate'];
                $process_owner = $proc_owner[$po];
                $procedure_title = $row['procedure_title'];
                $qp_code = $row['qp_code'];
                $emp_n = $row['emp_n'];
                $is_owner = $is_owner;
                $frequency_monitoring = $row['frequency_monitoring'];
                $id = $row['id'];
                $fullname = $row['fullname'];
                $sampdata[$id][] = $process_owner;

                // print_r($row);
                // print_r($row['id']."-".$proc_owner[$po]."<br>");
                // $data[$row['id']] = [
                //     'coverage'          => $coverage_opts[$row['coverage']],
                //     'office'            => $office_opts[$row['office']],
                //     'rev_no'            => $row['rev_no'],
                //     'EffDate'           => $row['EffDate'],
                //     'process_owner'     => $proc_owner[$po],
                //     'procedure_title'   => $row['procedure_title'],
                //     'qp_code'           => $row['qp_code'],
                //     'emp_n'             => $row['emp_n'],
                //     'is_owner'          => $is_owner,
                //     'frequency_monitoring' => $row['frequency_monitoring'],
                //     'id'                => $row['id']
                // ];
            }   

            foreach($sampdata as $id => $process_owner)
            {
                // echo $id." - ".implode(",", $process_owner). "<br>";
                $data[$row['id']] = [
                    'coverage'          => $coverage,
                    'office'            => $office,
                    'rev_no'            => $rev_no,
                    'EffDate'           => $EffDate,
                    'process_owner'     => implode("<br>", $process_owner),
                    'procedure_title'   => $procedure_title,
                    'qp_code'           => $qp_code,
                    'emp_n'             => $emp_n,
                    'is_owner'          => $is_owner,
                    'frequency_monitoring' => $frequency_monitoring,
                    'id'                => $id
                ];
            }
        }
        return $data;
    }

    public function fetchAdmins($id)
    {
        // $is_admin = false;
        $is_admin = true;
        if (in_array($id, [3300, 2563, 3174, 3319, 3310])) {//sdcatapang, mmmonteiro, masacluti, ljbanalan
            $is_admin = true;
        }

        return $is_admin;
    }

    public function fetchQOEs($id)
    {
        $sql = "SELECT
                    a.id,
                    a.objective,
                    a.target_percentage,
                    a.indicator_a,
                    a.indicator_b,
                    a.indicator_c,
                    a.indicator_d,
                    a.formula,
                    a.indicator_e,
                    b.gap_analysis,
                    b.is_gap_analysis
                FROM
                    tbl_qoe a
                LEFT JOIN tbl_gap_analysis b ON
                    a.id = b.qoe_id
                WHERE
                    a.qop_id = $id";

        $getQry = $this->db->query($sql);
        $data = [];
        // print_r($sql);
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
                'qoe_id'            => $row['id']
            ];
            // print_r($data);
        }

        return $data;
    }

    public function fetchProcessOwner($id) {
        $sql = "SELECT
                -- CONCAT(ei.FIRST_M, ' ', substring(ei.MIDDLE_M, 1, 1), '. ', ei.LAST_M) as fullname
                o.id as id,
                o.process_owner as process_owner
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
        $proce_owner = $this->fetchProcessOwnersList();
        $result = mysqli_fetch_array($getQry);
        $pro_owner = explode(",", $result['process_owner']);
        foreach($pro_owner as $po)
        {
            $id = $result['id'];
            $po = $proce_owner[$po];
            $podata[$id][] = $po;

        }
        foreach($podata as $id => $po){
            $process_owner = [
                'process_owner' => implode("\n\n", $po)
            ];
        }
        // print_r($process_owner);
        return $process_owner['process_owner'];
    }

    public function fetchDivision($id){
        $sql = "SELECT
                    ei.DIVISION_C as Division
                FROM
                    tbl_qop o
                LEFT JOIN tblemployeeinfo e ON
                    e.EMP_N = o.created_by
                LEFT JOIN tbl_qms_process_owners pr ON
                    pr.id = o.process_owner
                LEFT JOIN tblemployeeinfo ei ON
                    ei.EMP_N = pr.emp_id
                LEFT JOIN tblpersonneldivision pd ON
                    pd.DIVISION_N = ei.DIVISION_C
                WHERE o.id = $id";

        $getQry = $this->db->query($sql);
        $result = mysqli_fetch_assoc($getQry);

        return $result['Division'];
    }


    public function fetchQMSDocuments()
    {
        $sql = "SELECT * from issuances WHERE qms_type = 3";
        $getQry = $this->db->query($sql);
        $data = [];

        while ($row = mysqli_fetch_assoc($getQry)) {
            $data[$row['qms_type']][] = [
                'id'            => $row['id'],
                'link'          => $row['url'],
                'title'         => $row['subject'],
                'date_issued'   => date('M d, Y', strtotime($row['date_issued']))
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

    public function fetchQMSStats()
    {
        $sql = "SELECT id, coverage, qp_code, procedure_title, DATE_FORMAT(date_updated, '%M %d, %Y') AS date_updated
                from tbl_qop";

        $getQry = $this->db->query($sql);
        while ($row = mysqli_fetch_assoc($getQry)){
            $data[] = [
                'id'                => $row['id'],
                'qp_code'           => $row['qp_code'],
                'procedure_title'   => $row['procedure_title'],
                'date_updated'      => $row['date_updated']

            ];
        }
        // print_r($data);
        // die();

        return $data;
    }

    public function update_gap($dataGA)
    {
        $c = "SELECT * FROM `tbl_gap_analysis` WHERE qop_entry_id = ".$dataGA['qop_id']." AND qoe_id = ".$dataGA['qoe_id']."";
        $q = $this->db->query($c);
        $rc = mysqli_num_rows($q);
        // print_r($c);
        // print_r($rc);
        // die();
        if($rc == 0){
        $sql = "INSERT INTO `tbl_gap_analysis`(`qop_entry_id`,`qoe_id`,`is_gap_analysis`,`gap_analysis`)
                VALUES ('".$dataGA['qop_id']."','".$dataGA['qoe_id']."','".$dataGA['is_gap_analysis']."','".$dataGA['gap_analysis']."')";
        // $sql = " UPDATE tbl_qoe_frequency_entry SET is_gap_analysis = ".$dataGA['is_gap_analysis']." WHERE id = ".$dataGA['id']." ";
        $this->db->query($sql);
        // print_r($sql);
        // die();
        }
    }

    public function remove_gap_analysis($dataGA)
    {
        // $sql = " UPDATE tbl_gap_analysis SET is_gap_analysis = ".$dataGA['is_gap_analysis'].", gap_analysis ='' WHERE qop_entry_id = ".$dataGA['qop_id']." AND qoe_id = ".$dataGA['qoe_id']." ";
        $sql = " UPDATE tbl_gap_analysis SET gap_analysis = '', is_gap_analysis = '".$dataGA['is_gap_analysis']."' WHERE  qoe_id = ".$dataGA['qoe_id']." AND qop_entry_id =".$dataGA['qop_id']." ";
        // print_r($sql);
        // die();
        $getQry = $this->db->query($sql);
    }

    public function update_gap_analysis($dataGA)
    {
        // $sql = " UPDATE tbl_gap_analysis SET is_gap_analysis = '".$dataGA['is_gap_analysis']."', gap_analysis = '".$dataGA['gap_analysis']."' WHERE qop_entry_id = ".$dataGA['qop_id']." AND qoe_id = ".$dataGA['qoe_id']." ";
        $sql = " UPDATE tbl_gap_analysis SET is_gap_analysis = '".$dataGA['is_gap_analysis']."', gap_analysis = '".$dataGA['gap_analysis']."' WHERE  qoe_id = ".$dataGA['qoe_id']." AND qop_entry_id = ".$dataGA['qop_id']." ";
        // print_r($sql);
        // die();
        $getQry = $this->db->query($sql);
    }


    public function fetchQP($id = 0)
    {
        $sql = " SELECT
                    qp.id AS id,
                    qp.frequency_monitoring AS frequency_monitoring,
                    qp.coverage AS coverage,
                    qp.qp_code AS qp_code,
                    qp.process_owner AS process_owner,
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
        $proce_owner = $this->fetchProcessOwnersList();
        $data = [];

        while ($row = mysqli_fetch_assoc($getQry)) {
            $pro_owner = explode(",", $row['process_owner']);

            foreach($pro_owner as $po)
            {
                $id = $row['id'];
                $qp_code = $row['qp_code'];
                $frequency_monitoring = $row['frequency_monitoring'];
                $coverage = $row['coverage'];
                $office = $row['office'];
                $procedure_title = $row['procedure_title'];
                $prowner = $proce_owner[$po];
                $prdata[$id][] = $prowner;
            }

            foreach($prdata as $id => $prowner)
            {
                // print_r($prowner);
                $data[$row['id']] = [
                    'id'                    => $id,
                    'qp_code'               => $qp_code,
                    'frequency_monitoring'  => $frequency_monitoring,
                    'coverage'              => $coverage,
                    'office'                => $office,
                    'procedure_title'       => $procedure_title,
                    'process_owner'         => implode(",",$prowner)
                    // 'process_owner'         => $row['FIRST_M'].' '.$row['LAST_M']
                ];
            }

        }


        // print_r($data);
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
                // $tf = $qry_f->fetch_assoc();
                // print_r($tf);
                // die();

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

                $csql = "SELECT * FROM `tbl_gap_analysis` WHERE qop_entry_id = ".$entry_id." AND qoe_id = ".$row_f['qoe_id']."";
                $vsql = $this->db->query($csql);
                $rc = mysqli_num_rows($vsql);

                if($rc == 0)
                {
                    $sql = "INSERT INTO `tbl_gap_analysis`(`qop_entry_id`,`qoe_id`,`is_gap_analysis`,`gap_analysis`) VALUES ('".$entry_id."','".$row_f['qoe_id']."','1',' ')";
                    $this->db->query($sql);
                }

            }
            // print_r($qry_f->fetch_assoc());
            // die();
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
                qp.process_owner,
                qp.procedure_title AS procedure_title,
                eo.LAST_M AS lastname,
                eo.FIRST_M AS firstname,
                eo.MIDDLE_M AS middlename,
                pd.DIVISION_M AS division,
                cb.UNAME AS created_by,
                cb.EMP_N AS creator_id,
                fq.year AS year_created,
                fq.qoe_id AS qoe_id,
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


        if (!in_array($_SESSION['currentuser'], [3300, 2563, 3174, 3319, 3310])) //sdcatapang, mmmonteiro, masacluti, ljbanalan
        {
            $sql .= ' AND qp.office = '.$_SESSION['division'];
        }


        $sql .= ' GROUP BY fq.qop_entry_id ORDER BY qr.id DESC ';

        $getQry = $this->db->query($sql);
        $proce_owner = $this->fetchProcessOwnersList();

        $data = [];

        while ($row = mysqli_fetch_assoc($getQry)) {
            $pro_owner = explode(",",$row['process_owner']);
            
            foreach($pro_owner as $po)
            {
                $id = $row['id'];
                $prowner = $proce_owner[$po];
                $ssdata[$id][] = $prowner;
            }

            foreach($ssdata as $id => $prowner)
            {
                $data[$row['id']] = [
                    'id'                    => $row['id'],
                    'qop_id'                => $row['qop_id'],
                    'qoe_id'                => $row['qoe_id'],
                    'date_created'          => $row['date_created'],
                    'created_by'            => $row['created_by'],
                    'status'                => $row['status'],
                    'frequency_monitoring'  => $row['frequency_monitoring'],
                    'coverage'              => $row['coverage'],
                    'qp_code'               => $row['qp_code'],
                    'procedure_title'       => $row['procedure_title'],
                    'process_owner'         => implode(", ",$prowner),
                    // 'process_owner'         => $row['firstname'].' '.$row['lastname'],
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

        }
        // print_r($sql);
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
        // print_r($sql);
        // die();
        $this->db->query($sql);
    }

    public function delete_gap_entry($id)
    {
        $sql = " DELETE FROM `tbl_gap_analysis` WHERE qop_entry_id = ".$id." ";
        // print_r($sql);
        // die();
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
        if (in_array($id, [3300, 2563, 3174, 3319, 3310])) {//sdcatapang, mmmonteiro, masacluti, ljbanalan
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

