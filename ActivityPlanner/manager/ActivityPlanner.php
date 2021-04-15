<?php

class ActivityPlanner
{

	function isOPR($id='', $user='') {
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

	function fetchPrograms() {
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

    function fetchActivities() {
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

    function fetchAllTask($options) {
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
}