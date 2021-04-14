<?php
    session_start();
    date_default_timezone_set('Asia/Manila');

    require_once '../manager/ActivityPlanner.php';

    $ap = new ActivityPlanner();
    
    $program = $_GET['act_program'];
    $id = $_GET['act_id'];
    $emp_id = $_GET['cur_emp'];
    $timeline = explode('-', $_GET['timeline']);
    $date_from = strtotime($timeline[0]);
    $date_to = strtotime($timeline[1]);

    $date_start = date('Y-m-d', $date_from);
    $date_end = date('Y-m-d', $date_to);

    $options = [
        'program' => $program,
        'id' => $id,
        'emp_id' => $emp_id,
        'date_from' => $date_start .' 00:00:00',
        'date_to' => $date_end .' 23:59:59',
        'status' => ['Created', 'Ongoing', 'Paused', 'For Checking', 'Done']
    ];
    
    $result = $ap->fetchAllTask($options);

    echo $result;