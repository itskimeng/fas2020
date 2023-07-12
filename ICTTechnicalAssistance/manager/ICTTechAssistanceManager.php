<?php
class ICTTechAssistanceManager  extends Connection
{
    public $conn = '';
    public $default_table = 'tbltechnical_assistance';

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
    public function getData($current_user, $quarter, $default_year, $status = ['created', 'ongoing', 'completed', 'for rating'])
    {
        $conn = mysqli_connect("localhost", "fascalab_2020", "w]zYV6X9{*BN", "fascalab_2020");
        $data = [];
        if (isset($current_user)) {
            foreach ($status as $stat) {
                switch ($quarter) {
                    case '1':
                        if($stat == 'for rating')
                        {
                            $condition = '';
                        }else{
                            $condition = "tbltechnical_assistance.status = '$stat' and";
                        }
                        $where = " $condition  MONTH(REQ_DATE) IN ('1','2','3') and YEAR(REQ_DATE) = '$default_year' ORDER BY id desc ";
                        break;
                    case '2':
                        if($stat == 'for rating')
                        {
                            $condition = '';
                        }else{
                            $condition = "tbltechnical_assistance.status = '$stat' and";
                        }
                        $where = "$condition  MONTH(REQ_DATE) IN ('4','5','6') and YEAR(REQ_DATE) = '$default_year' ORDER BY id desc ";
                        break;
                    case '3':
                        if($stat == 'for rating')
                        {
                            $condition = '';
                        }else{
                            $condition = "tbltechnical_assistance.status = '$stat' and";
                        }
                        $where = "$condition  MONTH(REQ_DATE) IN ('7','8','9') and YEAR(REQ_DATE) = '$default_year' ORDER BY id desc  ";
                        break;
                    case '4':
                        if($stat == 'for rating')
                        {
                            $condition = '';
                        }else{
                            $condition = "tbltechnical_assistance.status = '$stat' and";
                        }
                        $where = " $condition  MONTH(REQ_DATE) IN ('10','11','12') and YEAR(REQ_DATE) = '$default_year' ORDER BY id desc ";
                        break;

                    default:
                        $where = "tbltechnical_assistance.status='$stat' and MONTH(REQ_DATE) IN ('10','11','12') and YEAR(REQ_DATE) = '$default_year' ORDER BY id desc ";

                        break;
                }

                $sql = "SELECT
                        ID,
                        ASSIGN_DATE,
                        DATE_RATED,
                        CONTROL_NO,
                        REQ_BY,
                        OFFICE,
                        CONTACT_NO,
                        ISSUE_PROBLEM,
                        REQ_DATE,
                        ASSIST_BY,
                    tbltechnical_assistance.STATUS
                        ,
                        emp.LAST_M,
                        emp.FIRST_M,
                        emp.MIDDLE_M
                    FROM
                        tbltechnical_assistance
                    LEFT JOIN tblemployeeinfo emp ON  tbltechnical_assistance.REQ_BY = emp.EMP_N where $where";
                $query = mysqli_query($conn, $sql);

                while ($row = mysqli_fetch_assoc($query)) {
                    $is_rated = ($row['DATE_RATED'] == NULL || $row['DATE_RATED'] == '0000-00-00') ? false: true;
                    $data[$stat][] = [
                        'id'             => $row['ID'],
                        'emp_id'        =>$row['REQ_BY'],
                        'control_number' => $row['CONTROL_NO'],
                        'requested_by'   => $row['FIST_M'].' '.$row['LAST_M'],
                        'requested_date' => date('F d, Y', strtotime($row['REQ_DATE'])),
                        'status'         => $row['STATUS'],
                        'rictu_staff'   => $row['ASSIST_BY'],
                        'issue'         => $row['ISSUE_PROBLEM'],
                        'office'        => $row['OFFICE'],
                        'contact_no'    => $row['CONTACT_NO'],
                        'assist_by'    => $row['ASSIST_BY'],
                        'assign_date'   => date('F d, Y',strtotime($row['ASSIGN_DATE'])),
                        'is_rated' => true
                    ];
                }
            }
        } else {
            foreach ($status as $stat) {
                switch ($quarter) {
                    case '1':
                        if($stat == 'for rating')
                        {
                            $condition = '';
                        }else{
                            $condition = "tbltechnical_assistance.status = '$stat' and";
                        }
                        $where = " $condition  MONTH(REQ_DATE) IN ('1','2','3') and YEAR(REQ_DATE) = '$default_year' ORDER BY id desc ";
                        break;
                    case '2':
                        if($stat == 'for rating')
                        {
                            $condition = '';
                        }else{
                            $condition = "tbltechnical_assistance.status = '$stat' and";
                        }
                        $where = "$condition  MONTH(REQ_DATE) IN ('4','5','6') and YEAR(REQ_DATE) = '$default_year' ORDER BY id desc ";
                        break;
                    case '3':
                        if($stat == 'for rating')
                        {
                            $condition = '';
                        }else{
                            $condition = "tbltechnical_assistance.status = '$stat' and";
                        }
                        $where = "$condition  MONTH(REQ_DATE) IN ('7','8','9') and YEAR(REQ_DATE) = '$default_year' ORDER BY id desc  ";
                        break;
                    case '4':
                        if($stat == 'for rating')
                        {
                            $condition = '';
                        }else{
                            $condition = "tbltechnical_assistance.status = '$stat' and";
                        }
                        $where = " $condition  MONTH(REQ_DATE) IN ('10','11','12') and YEAR(REQ_DATE) = '$default_year' ORDER BY id desc ";
                        break;

                    default:
                        $where = "tbltechnical_assistance.status='$stat' and MONTH(REQ_DATE) IN ('10','11','12') and YEAR(REQ_DATE) = '$default_year' ORDER BY id desc ";

                        break;
                }

                $sql = "SELECT
                        ID,
                        ASSIGN_DATE,
                        DATE_RATED,
                        CONTROL_NO,
                        REQ_BY,
                        OFFICE,
                        CONTACT_NO,
                        ISSUE_PROBLEM,
                        REQ_DATE,
                        ASSIST_BY,
                    tbltechnical_assistance.STATUS ,
                        emp.LAST_M,
                        emp.FIRST_M,    
                        emp.MIDDLE_M
                    FROM
                        tbltechnical_assistance
                    LEFT JOIN tblemployeeinfo emp ON tbltechnical_assistance.REQ_BY = emp.EMP_N 
                        where  $where";
                     
                $query = mysqli_query($conn, $sql);
            

                while ($row = mysqli_fetch_assoc($query)) {
                    $is_rated = ($row['DATE_RATED'] == NULL || $row['DATE_RATED'] == '0000-00-00' || $row['DATE_RATED'] == '') ? 0:1;
                    $data[$stat][] = [
                        'id'             => $row['ID'],
                        'emp_id'        =>$row['REQ_BY'],
                        'control_number' => $row['CONTROL_NO'],
                        'requested_by'   => $row['FIRST_M'].' '.$row['LAST_M'],
                        'requested_date' => date('F d, Y', strtotime($row['REQ_DATE'])),
                        'status'         => $row['STATUS'],
                        'rictu_staff'   => $row['ASSIST_BY'],
                        'issue'         => $row['ISSUE_PROBLEM'],
                        'office'        => $row['OFFICE'],
                        'contact_no'    => $row['CONTACT_NO'],
                        'assist_by'    => $row['ASSIST_BY'],
                        'assign_date'   => $row['DATE_RATED'],
                        'is_rated' => $is_rated

                        

                    ];
                }
            }

        }

        return $data;
    }
    public function monitoringTable($current_user)
    {
        $where = ($current_user == '21232f297a57a5a743894a0e4a801fc3') ? 'ta.REQ_DATE >= "2023-01-01" ' : 'ta.REQ_DATE >= "2023-01-01" AND `REQ_BY` = "' . $current_user . '"';
        $sql = "SELECT 
               ta.ID,
               ta.REQ_BY AS 'EMP_ID',
               ta.CONTROL_NO,
               ta.REQ_DATE,
               ta.REQ_TIME,
               ta.START_DATE,
               ta.START_TIME,
               ta.COMPLETED_DATE,
               ta.COMPLETED_TIME,
               ta.OFFICE,
               ta.ISSUE_PROBLEM,
               ta.TYPE_REQ,
               ta.ASSIST_BY,
               ta.STATUS,
               ta.ASSIGN_DATE,
               ta.DATE_RATED,
               emp.FIRST_M,
               emp.LAST_M
               from $this->default_table ta
               LEFT JOIN tblemployeeinfo emp on ta.REQ_BY = emp.EMP_N where " . $where . " ORDER BY CONTROL_NO desc";
           

        $query = $this->db->query($sql);
        $data = [];
        $completed_date = '';
        $start_date = '';
        $completed_time = '';
        while ($row = mysqli_fetch_assoc($query)) {
            if ($row['START_DATE'] == null || $row['START_DATE'] == '') {
                $start_date = '';
                $start_time = '';
            } else {
                if ($row['COMPLETED_DATE'] == NULL || $row['COMPLETED_DATE'] == 'January 01, 1970') {
                    $completed_date = '';
                    $completed_time = '';
                } else {
                    $completed_date = date('M d, Y', strtotime($row['COMPLETED_DATE']));
                    $completed_time = date('h:i:A', strtotime($row['COMPLETED_TIME']));
                }

                $start_date = date('M d, Y', strtotime($row['REQ_DATE']));
                $start_time = date('g:i:A', strtotime($row['REQ_TIME']));
            }

            $data[] = [
                'id' => $row['ID'],
                'emp_id' => $row['EMP_ID'],
                'control_no'        => $row['CONTROL_NO'],
                'start_date'        => $start_date,
                'start_time'        => $start_time,
                'completed_date'    => $completed_date,
                'complete_time'     => $completed_time,
                'req_by'            => $row['FIRST_M'].' '.$row['LAST_M'],
                'office'            => $row['OFFICE'],
                'issue_problem'     => $row['ISSUE_PROBLEM'],
                'type_req'          => $row['TYPE_REQ'],
                'assist_by'         => $row['ASSIST_BY'],
                'status'    => $row['STATUS'],
                'assign_date' => $row['ASSIGN_DATE'],
                'date_rated' => $row['DATE_RATED'],
            ];
        }

        return $data;
    }
    public function fetchRICTUDetails($admins = ['Mark', 'Maybelline',])
    {
        $data = [];
        foreach ($admins as $staff) {
            $data[] = [
                'rictu_staff'   => ['Mark Kim A. Sacluti', 'Maybelline M. Monteiro'],
                'email_address' => ['markkimsacluti10101996@gmail.com', 'maybelline.monteiro@gmail.com'],
                'position'      => ['Network Administrator', 'IT Officer I'],
                'contact_details' => ['0955-100-3364', null]
            ];
        }   
        return $data;
    }
    public function fetchWorkLoad($staff = ['Mark', 'Maybelline','Mark','Maybelline','Mark', 'Maybelline','Mark','Maybelline'], $status = ['created','created', 'ongoing','ongoing','completed', 'completed', 'for rating','for rating'])
    {
        $data = [];
        $conn = mysqli_connect("localhost", "fascalab_2020", "w]zYV6X9{*BN", "fascalab_2020");

        foreach ($status as $key => $stat) {
            $query = "SELECT id FROM tbltechnical_assistance
                      WHERE ASSIST_BY  LIKE '%$staff[$key]%' 
                      and status='$stat'
                      and YEAR(REQ_DATE) = '2023'";
                      
                $query = mysqli_query($conn, $query);

            while ($row = mysqli_fetch_assoc($query)) {
                $data[$stat][] = ['id' => $row['id']];
            }
        }
        return $data;
    }
    public function fetchPSLDataSheet($quarter,$default_year)
    {
        switch (2) {
            case '1':
                $where = "MONTH(REQ_DATE) IN ('1','2','3') and YEAR(REQ_DATE) = '$default_year'";
                break;
            case '2':
                $where = "MONTH(REQ_DATE) IN ('4','5','6') and YEAR(REQ_DATE) = '$default_year'";
                break;
            case '3':
                $where = "MONTH(REQ_DATE) IN ('7','8','9') and YEAR(REQ_DATE) = '$default_year' ";
                break;
            case '4':
                $where = "MONTH(REQ_DATE) IN ('10','11','12') and YEAR(REQ_DATE) = '$default_year'";
                break;

            default:
                $where = "MONTH(REQ_DATE) IN ('10','11','12') and YEAR(REQ_DATE) = '$default_year'";

                break;
        }
        $sql = "SELECT REQ_DATE, COUNT(REQ_DATE) as 'count' FROM `tbltechnical_assistance` 
                WHERE $where 
                GROUP BY REQ_DATE";

       
              $query = $this->db->query($sql);
              $data = [];
              while ($row = mysqli_fetch_assoc($query)) {
                $data[] = [
                    'date' => date('F d, Y',strtotime($row['REQ_DATE'])),
                    'count'=> $row['count']
                ];
              }
              return $data;
    }

   
}
