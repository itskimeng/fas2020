<?php

class ActivityPlanner
{

	public function isOPR($id='', $user='') {
        $conn = mysqli_connect("localhost","fascalab_2020","w]zYV6X9{*BN","fascalab_2020");
        $is_opr = true;

        $sql = "SELECT CASE WHEN COUNT(*) > 0 THEN 'true' ELSE 'false' END AS bool 
        FROM events WHERE id = $id AND postedby = $user";

        $query = mysqli_query($conn, $sql); 
        $row = mysqli_fetch_assoc($query);
        
        if (empty($row)) {
            $is_opr = false;
        }

        return $is_opr;
    }

	public function fetchProgramCode() {
        $conn = mysqli_connect("localhost","fascalab_2020","w]zYV6X9{*BN","fascalab_2020");

        $programs = [];

        $sql = "SELECT id, code, name FROM event_programs"; 
        $query = mysqli_query($conn, $sql);
        
        $programs['ALL'] = 'ALL';
        while ($row = mysqli_fetch_assoc($query)) {
            $programs[$row['code']] = $row['code'];
        }

        return $programs;
    }

    public function fetchRegisteredPrograms() {
        $conn=mysqli_connect("localhost","fascalab_2020","w]zYV6X9{*BN","fascalab_2020");
        $data = [];

        $arr = $this->fetchProgramCode();

        $sql1 = "SELECT 
                    events.id as event_id, 
                    events.title as title,
                    events.program as program,
                    events.start as date_start, 
                    events.end as date_end
                FROM events
                LEFT JOIN tblpersonneldivision tp on tp.DIVISION_N = events.office
                LEFT JOIN tblemployeeinfo te on te.EMP_N = events.postedby
                LEFT JOIN tbldesignation tbl_desg on tbl_desg.DESIGNATION_ID = te.DESIGNATION
                WHERE tp.DIVISION_M like '%CDD%'";

        $sql = $sql1. " AND events.program != 'Others'";
        $last = " ORDER BY events.program, events.id DESC";

        $query = mysqli_query($conn, $sql.$last);

        while ($row = mysqli_fetch_assoc($query)) {
            if (in_array($row['program'], $arr)) {
                $start_date = new DateTime($row['date_start']);
                $end_date = new DateTime($row['date_end']);

                // if ($start_date->format('Y-m-d') == $end_date->format('Y-m-d')) {
                //     $date_range = date_format($end_date, 'M d, Y'); 
                // } elseif ($start_date->format('Y-m') === $end_date->format('Y-m')) {
                //     $date_range = date_format($start_date, 'M d ') .' to '. date_format($end_date, 'd, Y'); 
                // } else {
                //     $date_range = date_format($start_date, 'M d, Y') .' and '. date_format($end_date, 'M d, Y');
                // }

                if ($start_date->format('Y-m-d') == $end_date->format('Y-m-d')) {
                    $date_range = date_format($end_date, 'M d, Y'); 
                } elseif ($start_date->format('Y-m') === $end_date->format('Y-m')) {
                    $date_range = date_format($start_date, 'M d ') .' to '. date_format($end_date, 'd, Y'); 
                } else {
                    $date_range = date_format($start_date, 'M d, Y') .' to '. date_format($end_date, 'M d, Y');
                }

                $data[$row['program']][] = [
                    'event_id'      => $row['event_id'],
                    'activity'      => $row['title'],
                    'date_range'    => $date_range
                ];      
            }
        } 


        $sql = $sql1. " AND events.program = 'Others'";
        $last = " ORDER BY events.program, events.id DESC";

        $query = mysqli_query($conn, $sql.$last);

        while ($row = mysqli_fetch_assoc($query)) {
            if (in_array($row['program'], $arr)) {
                $start_date = new DateTime($row['date_start']);
                $end_date = new DateTime($row['date_end']);

                if ($start_date->format('Y-m-d') == $end_date->format('Y-m-d')) {
                    $date_range = date_format($end_date, 'M d, Y'); 
                } elseif ($start_date->format('Y-m') === $end_date->format('Y-m')) {
                    $date_range = date_format($start_date, 'M d ') .' to '. date_format($end_date, 'd, Y'); 
                } else {
                    $date_range = date_format($start_date, 'M d, Y') .' and '. date_format($end_date, 'M d, Y');
                }

                $data[$row['program']][] = [
                    'event_id'      => $row['event_id'],
                    'activity'      => $row['title'],
                    'date_range'   => $date_range
                ];      
            }
        } 

        return $data;
    }

    public function fetchActivities() {
        $conn=mysqli_connect("localhost","fascalab_2020","w]zYV6X9{*BN","fascalab_2020");
        $data = [];
        $sql = "SELECT 
                    events.id as id, 
                    events.title as title,
                    events.program as program,
                    events.code_series as code
                FROM events
                LEFT JOIN tblpersonneldivision tp on tp.DIVISION_N = events.office
                LEFT JOIN tblemployeeinfo te on te.EMP_N = events.postedby
                LEFT JOIN tbldesignation tbl_desg on tbl_desg.DESIGNATION_ID = te.DESIGNATION
                    WHERE tp.DIVISION_M like '%CDD%'
                    ORDER BY events.id DESC";

        $query = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_assoc($query)) {
            $data[$row['id']] = $row['code'] .' : '.$row['title'];
        } 

        return $data;
    }

    public function fetchAllTask($options) {
        $conn=mysqli_connect("localhost","fascalab_2020","w]zYV6X9{*BN","fascalab_2020");
        $program = $options['program'];
        $id = $options['id'];
        $emp_id = $options['emp_id'];
        $date_from = $options['date_from'];
        $date_to = $options['date_to'];
        $status = $options['status'];
        $data = [];

        foreach ($status as $stat) {

            $sql = "SELECT evs.id as task_id, evs.title as task_title, host.LAST_M as lname, host.FIRST_M as fname, host.PROFILE as profile, DATE_FORMAT(evs.date_from, '%m/%d/%Y') as date_start, DATE_FORMAT(evs.date_to, '%m/%d/%Y') as date_end, ev.venue as venue, ev.description as description, ev.title as event_title, DATE_FORMAT(ev.start, '%Y/%m/%d') as ev_datestart, DATE_FORMAT(ev.end, '%Y/%m/%d') as ev_dateend, evs.task_counter as task_counter, evs.code as code, DATE_FORMAT(evs.date_start, '%Y/%m/%d') as evs_progstart, DATE_FORMAT(evs.date_end, '%Y/%m/%d') as evs_progend
              FROM event_subtasks evs
              LEFT JOIN events ev ON ev.id = evs.event_id
              JOIN tblemployeeinfo host ON host.EMP_N = ev.postedby
              WHERE evs.emp_id = $emp_id AND evs.is_read = False ";

            if (!empty($program) AND $program != 'ALL') {
                $sql .= " AND ev.program = '".$program."' ";
            }

            if (!empty($id)) {
                $sql .= " AND evs.event_id = $id ";
            }
            
            if (!empty($date_from)) {
                $sql .= " AND evs.date_from >= '".$date_from."' AND evs.date_to <= '".$date_to."' AND evs.status = '".$stat."' ";
            }

            $query = mysqli_query($conn, $sql);

            while ($row = mysqli_fetch_assoc($query)) {
                $profile = $row['profile']; 
                if (!strpos($profile, '.png') || !strpos($profile, '.jpg') || !strpos($profile, '.jpeg')) {
                    $profile = 'images/logo.png';
                }

                $data[$stat][] = [
                    'task_id' => $row['task_id'],
                    'task_title' => mb_strimwidth($row['task_title'], 0, 62, "..."),
                    'event_title' => $row['event_title'],
                    'host' => $row['fname'] .' '. $row['lname'],
                    'profile' => $profile,
                    'timeline' => $row['date_start'] .' - '. $row['date_end'],
                    'date_start' => $row['ev_datestart'],
                    'date_end' => $row['ev_dateend'],
                    'venue' => $row['venue'],
                    'description' => $row['description'],
                    'task_counter' => $row['task_counter'] > 0 ? $row['task_counter'] : '',
                    'code' => $row['code'],
                    'progress_datestart' => $row['evs_progstart'],
                    'progress_dateend' => $row['evs_progend'],
                ]; 
            } 
        }

        return json_encode($data);  
    }

    public function fetchEmployees($user) {
        $conn=mysqli_connect("localhost","fascalab_2020","w]zYV6X9{*BN","fascalab_2020");
        $employees = [];
        $query = mysqli_query($conn, "
            SELECT tbl_emp.EMP_N as emp_id, tbl_emp.FIRST_M as fname, tbl_emp.MIDDLE_M as mname, tbl_emp.LAST_M as lname, tbl_pos.POSITION_M as position, tbl_desg.DESIGNATION_M as designation, tbl_pdiv.DIVISION_M as division 
          FROM tblemployeeinfo tbl_emp
          LEFT JOIN tblpersonneldivision tbl_pdiv on tbl_pdiv.DIVISION_N = tbl_emp.DIVISION_C
          LEFT JOIN tbldilgposition tbl_pos on tbl_pos.POSITION_ID = tbl_emp.POSITION_C
          LEFT JOIN tbldesignation tbl_desg on tbl_desg.DESIGNATION_ID = tbl_emp.DESIGNATION
          LEFT JOIN event_subtasks es on es.emp_id = tbl_emp.EMP_N
          WHERE tbl_pdiv.DIVISION_M like '%CDD%'
          ORDER BY tbl_emp.FIRST_M ASC");

        $colors = ['#5c95c7', '#c2d2e0'];
        $counter = 0;

        while ($row = mysqli_fetch_assoc($query)) {
            
            if ($counter < 2) {
                $color = $colors[$counter];
            } else {
                $counter = 0;
                $color = $colors[$counter];
            }

            $counter++;

            // get number of tasks per level
            $tasks = $this->fetchEmployeeTaskCount($row['emp_id']);
            $active_user = false;

            if ($user == $row['emp_id']) {
                $active_user = true;
            }
            
            $employees[$row['emp_id']] = [
                'name' => $row['fname'] .' ' .$row["lname"],
                'initials' => $row['fname'][0] .''.$row['lname'][0],
                'designation' => empty($row['designation']) ? 'Job Order' : $row['designation'],
                'tasks' => $tasks,
                'active_user' => $active_user,
                'color' => $color
            ];

        } 

        return $employees;  
    }

    public function fetchEmployeeTaskCount($id, $status=['Created','Done','Ongoing','For Checking']) {
        $conn=mysqli_connect("localhost","fascalab_2020","w]zYV6X9{*BN","fascalab_2020");
        $data = [];
        
        foreach ($status as $value) {
            $sql = "SELECT COUNT(*) as count FROM event_subtasks where emp_id LIKE '%$id%' AND status = '".$value."'";
            $query = mysqli_query($conn, $sql);

            $row = mysqli_fetch_assoc($query);
            $data[$value] = $row['count'] > 99 ? $row['count'] .'+' : $row['count'];

        }

        return $data;  
    }

    public function fetchTasksStatusCount($status = ['Created', 'Ongoing', 'For Checking', 'Done']) { 
        $conn=mysqli_connect("localhost","fascalab_2020","w]zYV6X9{*BN","fascalab_2020");
        $options = [];
        foreach ($status as $stat) {
            $sql = "SELECT COUNT(*) as count FROM event_subtasks where status = '".$stat."'";
            $query = mysqli_query($conn, $sql);

            $row = mysqli_fetch_assoc($query);
            $options[$stat] = $row['count'];
        }

        return $options;  
    }

    public function fetchEmployeeOptions() {
        $conn=mysqli_connect("localhost","fascalab_2020","w]zYV6X9{*BN","fascalab_2020");
        $employees = [];
        
        $sql = "
            SELECT tbl_emp.EMP_N as emp_id, CONCAT(tbl_emp.FIRST_M, ' ', tbl_emp.LAST_M) as fullname, tbl_pdiv.DIVISION_M as division 
          FROM tblemployeeinfo tbl_emp
          LEFT JOIN tblpersonneldivision tbl_pdiv on tbl_pdiv.DIVISION_N = tbl_emp.DIVISION_C
          LEFT JOIN tbldilgposition tbl_pos on tbl_pos.POSITION_ID = tbl_emp.POSITION_C
          LEFT JOIN tbldesignation tbl_desg on tbl_desg.DESIGNATION_ID = tbl_emp.DESIGNATION
          WHERE tbl_emp.REGION_C = '04' AND tbl_emp.PROVINCE_C = '' AND tbl_emp.CITYMUN_C = ''
          AND tbl_pdiv.DIVISION_M = 'LGCDD' OR tbl_emp.EMP_N = 3026
          ORDER BY tbl_emp.LAST_M ASC";

        $query = mysqli_query($conn, $sql);


        while ($row = mysqli_fetch_assoc($query)) {
            $employees[$row['emp_id']] = $row['fullname'];
        } 

        $sql = "
              SELECT tbl_emp.EMP_N as emp_id, CONCAT(tbl_emp.FIRST_M, ' ', tbl_emp.LAST_M) as fullname, tbl_pdiv.DIVISION_M as division 
          FROM tblemployeeinfo tbl_emp
          LEFT JOIN tblpersonneldivision tbl_pdiv on tbl_pdiv.DIVISION_N = tbl_emp.DIVISION_C
          LEFT JOIN tbldilgposition tbl_pos on tbl_pos.POSITION_ID = tbl_emp.POSITION_C
          LEFT JOIN tbldesignation tbl_desg on tbl_desg.DESIGNATION_ID = tbl_emp.DESIGNATION
          WHERE tbl_emp.REGION_C = '04' AND tbl_emp.PROVINCE_C = '' AND tbl_emp.CITYMUN_C = ''
          AND tbl_pdiv.DIVISION_M = 'LGCDD-PDMU'
          ORDER BY tbl_emp.LAST_M ASC";

        $query = mysqli_query($conn, $sql);


        while ($row = mysqli_fetch_assoc($query)) {
            $employees[$row['emp_id']] = $row['fullname'];
        } 

        return $employees;  
    }

    public function fetchEmployeeOptions2() {
        $conn=mysqli_connect("localhost","fascalab_2020","w]zYV6X9{*BN","fascalab_2020");
        $employees = [];

        $mp = $fp = 0;

        $defpics_male = [
            'https://www.bootdey.com/img/Content/avatar/avatar1.png',
            'https://www.bootdey.com/img/Content/avatar/avatar2.png',
            'https://www.bootdey.com/img/Content/avatar/avatar4.png',
            'https://www.bootdey.com/img/Content/avatar/avatar5.png',
            'https://www.bootdey.com/img/Content/avatar/avatar6.png',
            'https://www.bootdey.com/img/Content/avatar/avatar7.png'
        ];

        $defpics_female = [
            'https://www.bootdey.com/img/Content/avatar/avatar3.png',
            'https://www.bootdey.com/img/Content/avatar/avatar8.png'
        ];
        
        $sql = "
            SELECT 
            tbl_emp.EMP_N as emp_id, 
            tbl_emp.FIRST_M as fname, 
            tbl_emp.MIDDLE_M as mname, 
            tbl_emp.LAST_M as lname, tbl_pos.POSITION_M as position, 
            tbl_desg.DESIGNATION_M as designation, 
            tbl_pdiv.DIVISION_M as division, 
            tbl_emp.email as email, 
            tbl_emp.MOBILEPHONE as phone, 
            tbl_emp.PROFILE as profile,
            tbl_emp.SEX_C as gender
          FROM tblemployeeinfo tbl_emp
          LEFT JOIN tblpersonneldivision tbl_pdiv on tbl_pdiv.DIVISION_N = tbl_emp.DIVISION_C
          LEFT JOIN tbldilgposition tbl_pos on tbl_pos.POSITION_ID = tbl_emp.POSITION_C
          LEFT JOIN tbldesignation tbl_desg on tbl_desg.DESIGNATION_ID = tbl_emp.DESIGNATION
          WHERE tbl_emp.REGION_C = '04' AND tbl_emp.PROVINCE_C = '' AND tbl_emp.CITYMUN_C = ''";
          
        $param = " AND tbl_pdiv.DIVISION_M = 'LGCDD'
          OR tbl_emp.EMP_N = 3026
          ORDER BY tbl_emp.LAST_M ASC";


        $query = mysqli_query($conn, $sql.$param);

        $colors = ['#f3eff5', '#f1e9b8'];
        $counter = 0;

        while ($row = mysqli_fetch_assoc($query)) {
            
            if ($counter < 2) {
                $color = $colors[$counter];
            } else {
                $counter = 0;
                $color = $colors[$counter];
            }

            $counter++;

            // get number of tasks per level
            $tasks = $this->fetchEmployeeTaskCount($row['emp_id']);
            $active_user = false;

            if ($user == $row['emp_id']) {
                $active_user = true;
            }

            $position = 'Job Order';

            if (!empty($row['position'])) {
                if ($row['emp_id'] == 3251 || $row['emp_id'] == 2570) {
                    $position = $row['designation'] .' / '. $row['position'];
                } else {
                    $position = $row['position'];
                }
            }

            if (strpos($row['profile'], '.png') || strpos($row['profile'], '.jpg') || strpos($row['profile'], '.jpeg') || strpos($row['profile'], '.JPG') || strpos($row['profile'], '.JPEG')) {
                $profile = $row['profile']; 
            } else {
                if ($row['gender'] == 'Male') {
                    if ($mp > 5) {
                        $mp = 0;
                    }
                    $profile = $defpics_male[$mp]; 
                    $mp++;                
                } else {
                    if ($fp > 1) {
                        $fp = 0;
                    }
                    $profile = $defpics_female[$fp];                 
                    $fp++;
                }
            }
            
            $employees[$row['emp_id']] = [
                'name' => $row['fname'] .' ' .$row["lname"],
                'initials' => $row['fname'][0] .''.$row['lname'][0],
                'profile' => $profile,
                'position' => $position,
                'tasks' => $tasks,
                'active_user' => $active_user,
                'color' => $color,
                'email' => !empty($row['email']) ? $row['email'] : 'N/A',
                'phone' => !empty($row['phone']) ? $row['phone'] : 'N/A'
            ];

        }       

        $param = " AND tbl_pdiv.DIVISION_M = 'LGCDD-PDMU' ORDER BY tbl_emp.LAST_M ASC";
        $query = mysqli_query($conn, $sql.$param);

        $colors = ['#f3eff5', '#f1e9b8'];
        // $counter = 0;

        while ($row = mysqli_fetch_assoc($query)) {
            
            if ($counter < 2) {
                $color = $colors[$counter];
            } else {
                $counter = 0;
                $color = $colors[$counter];
            }

            $counter++;

            // get number of tasks per level
            $tasks = $this->fetchEmployeeTaskCount($row['emp_id']);
            $active_user = false;

            if ($user == $row['emp_id']) {
                $active_user = true;
            }

            if (strpos($row['profile'], '.png') || strpos($row['profile'], '.jpg') || strpos($row['profile'], '.jpeg') || strpos($row['profile'], '.JPG') || strpos($row['profile'], '.JPEG')) {
                $profile = $row['profile']; 
            } else {
                if ($row['gender'] == 'Male') {
                    if ($mp > 5) {
                        $mp = 0;
                    }
                    $profile = $defpics_male[$mp]; 
                    $mp++;                
                } else {
                    if ($fp > 1) {
                        $fp = 0;
                    }
                    $profile = $defpics_female[$fp];                 
                    $fp++;
                }
            }
            
            $employees[$row['emp_id']] = [
                'name' => $row['fname'] .' ' .$row["lname"],
                'initials' => $row['fname'][0] .''.$row['lname'][0],
                'profile' => $profile,
                'position' => empty($row['position']) ? 'Job Order' : $row['position'],
                'tasks' => $tasks,
                'active_user' => $active_user,
                'color' => $color,
                'email' => !empty($row['email']) ? $row['email'] : 'N/A',
                'phone' => !empty($row['phone']) ? $row['phone'] : 'N/A'
            ];
        } 

        return $employees;  
    }
}