<?php
session_start();
date_default_timezone_set('Asia/Manila');

// require_once "../manager/FlashMessage.php";
require_once "../manager/Collaborators.php";
require_once "../../connection.php";
require_once "../manager/Notification.php";


    $data['event_id'] = isset($_POST['event_id']) ? $_POST['event_id'] : '';
    $data['event_code'] = isset($_POST['event_code']) ? $_POST['event_code'] : '';
    $data['emp_id'] = isset($_POST['emp_id']) ? $_POST['emp_id'] : '';
    $data['title'] = isset($_POST['title']) ? $_POST['title'] : '';
    $data['description'] = isset($_POST['description']) ? $_POST['description'] : '';
    $data['status'] = isset($_POST['status']) ? $_POST['status'] : '';
    $date_start = isset($_POST['date_from']) ? strtotime($_POST['date_from']) : '';
    $date_end = isset($_POST['date_to']) ? strtotime($_POST['date_to']) : '';
    $data['priority'] = isset($_POST['priority']) ? $_POST['priority'] : '';
    $data['collaborators'] = isset($_POST['collaborators']) ? $_POST['collaborators'] : '';
    $data['tgt_participants'] = isset($_POST['tgt_participants']) ? implode(", ", $_POST['tgt_participants']) : '';

    $data['rate'] = isset($_POST['rate']) ? $_POST['rate'] : '';
    
    // call instance of class
    // $flash = new FlashMessage();
    $notif = new Notification();
    $collaborator = new Collaborators();


    $date_start = date('Y-m-d h:i a', $date_start);
    $date_end = date('Y-m-d h:i a', $date_end);

    $date_start = new DateTime($date_start);
    $date_end = new DateTime($date_end);

    $data['date_start'] = $date_start->format('Y-m-d H:i:s');
    $data['date_end'] = $date_end->format('Y-m-d H:i:s');

    $data['time_start'] = $date_start->format('H:i:s');
    $data['time_end'] = $date_end->format('H:i:s');

    // print_r($data['date_start']);
    // print_r($data['date_end']);
    // die();

    if ($data['time_start'] != $data['time_end']) {
        $all_collabs = $collaborator->fetchAll($conn,'event_collaborators',$data['event_id']);

        foreach ($all_collabs as $collab) {    
            $subtask = checkEmpSubtaskExist($conn, 'event_subtasks', $data['event_id'], $collab);
            $acl = checkEmpACLExist($conn, 'event_collaborators', $data['event_id'], $collab);
            if ($subtask == 0 AND $acl == false) {
                // if no existing task AND no acl set yet
                // clear entry for collaborator
                $collaborator->clear($conn, 'event_collaborators', $data['event_id'], $collab);
            }
        }
        
        if (!empty($data['collaborators'])) {
            foreach ($data['collaborators'] as $collab) {
                $emp = findEmployee($conn, 'tblemployeeinfo', $collab);
                $person = $collaborator->find($conn, 'event_collaborators', $data['event_id'], $collab);
                
                if ($person == 0) {
                    $query = $collaborator->addNew($conn, 'event_collaborators', $data['event_id'], $emp);
                }
            }
        }

        $result = updateEvent($conn, 'events', $data);    

        if (!$result) {
            $result = mysqli_error($conn);
            $_SESSION['toastr'] = $notif->addFlash('error', 'A problem occured while submitting your data', $data["event_code"]);
        } else {
            $_SESSION['toastr'] = $notif->addFlash('success', 'Activity has been updated successfully', $data["event_code"]);
        }
    } elseif ($data['date_start'] != $data['date_end']) {
         $all_collabs = $collaborator->fetchAll($conn,'event_collaborators',$data['event_id']);

        foreach ($all_collabs as $collab) {    
            $subtask = checkEmpSubtaskExist($conn, 'event_subtasks', $data['event_id'], $collab);
            $acl = checkEmpACLExist($conn, 'event_collaborators', $data['event_id'], $collab);
            if ($subtask == 0 AND $acl == false) {
                // if no existing task AND no acl set yet
                // clear entry for collaborator
                $collaborator->clear($conn, 'event_collaborators', $data['event_id'], $collab);
            }
        }
        
        if (!empty($data['collaborators'])) {
            foreach ($data['collaborators'] as $collab) {
                $emp = findEmployee($conn, 'tblemployeeinfo', $collab);
                $person = $collaborator->find($conn, 'event_collaborators', $data['event_id'], $collab);
                
                if ($person == 0) {
                    $query = $collaborator->addNew($conn, 'event_collaborators', $data['event_id'], $emp);
                }
            }
        }

        $result = updateEvent($conn, 'events', $data);    

        if (!$result) {
            $result = mysqli_error($conn);
            $_SESSION['toastr'] = $notif->addFlash('error', 'A problem occured while submitting your data', $data["event_code"]);
        } else {
            $_SESSION['toastr'] = $notif->addFlash('success', 'Activity has been updated successfully', $data["event_code"]);
        }   
    } else {
        $_SESSION['toastr'] = $notif->addFlash('warning', 'Error in editing, Date & Time is invalid!', $data["event_code"]);
    }


    header('location:../../base_activity_planner.html.php?division='.$_SESSION['division']);


    function checkEmpACLExist($conn, $table, $ev_id, $emp) {
        $sql = "SELECT acl as acl FROM $table WHERE event_id = $ev_id AND emp_id = $emp";
        $acl_list = ['opr','add','edit','delete','todo','post','approve'];
        $checker = false;

        $query = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($query)) {
            $acl = json_decode($row['acl']);
            foreach ($acl_list as $list) {
                if ($acl->$list) {
                    $checker = true;
                }
            }
        }

        return $checker;
    }

    // function fetchAllCollaborators($conn,$table,$ev_id) {
    //     $sql = "SELECT event_id, emp_id FROM $table WHERE event_id =  $ev_id";
    //     $data = [];
    //     $query = mysqli_query($conn, $sql);

    //     while ($row = mysqli_fetch_assoc($query)) {
    //         $data[] = $row['emp_id'];
    //     }

        
    //     return $data;    
    // }

    // function findCollaborator($conn,$table,$ev_id,$emp) {
    //     $sql = "SELECT COUNT(*) as count FROM $table WHERE event_id =  $ev_id AND emp_id = $emp";

    //     $emp = mysqli_query($conn, $sql);
    //     $result = mysqli_fetch_array($emp);
        
    //     return $result['count'];    
    // }

    function findEmployee($conn,$table,$data) {
        $sql = "SELECT EMP_N as emp_n, FIRST_M as fname, MIDDLE_M as mname, LAST_M as lname FROM $table WHERE EMP_N = $data";

        $emp = mysqli_query($conn, $sql);
        $result = mysqli_fetch_array($emp);
        
        return $result;    
    }

    // function insertCollaborator($conn,$table,$id, $data) {
    //     $acl = ['opr'=>'', 'add'=>'', 'edit'=>'', 'delete'=>'', 'todo'=>'', 'post'=>'', 'approve'=>''];
    //     $acl = json_encode($acl);

    //     $sql = "INSERT INTO ".$table." (event_id, emp_id, emp_fname, emp_mname, emp_lname, acl) 
    //             VALUES(".$id.", ".$data['emp_n'].",'".$data['fname']."', '".$data['mname']."', '".$data['lname']."','".$acl."')";
                
    //     $result = mysqli_query($conn, $sql);

    //     return $result;    
    // }

    function updateEvent($conn,$table,$data) {
        $sql = "UPDATE ".$table." SET 
            title = '".$data['title']."',
            description = '".$data['description']."', 
            title = '".$data['title']."',
            priority = '".$data['priority']."',
            start = '".$data['date_start']."',
            end = '".$data['date_end']."',
            priority = '".$data['priority']."',
            is_new = false,
            remarks = '".$data['tgt_participants']."'
            WHERE id = '".$data['event_id']."'
            ";
        
        $result = mysqli_query($conn, $sql);

        return $result;    
    }

    function checkEmpSubtaskExist($conn, $table, $ev_id, $id) {
        $sql = "SELECT COUNT(*) as count FROM $table WHERE event_id = $ev_id AND emp_id = $id";   
        $emp = mysqli_query($conn, $sql);
        $result = mysqli_fetch_array($emp);

        return $result['count']; 
    }

    // function clearCollaborators($conn,$table,$ev_id, $id) {
    //     $sql = "DELETE FROM $table WHERE event_id = $ev_id AND emp_id = $id";
    //     $result = mysqli_query($conn, $sql);

    //     return $result;    
    // }

    // function flashMessage($message="", $type="success") {
    //     $_SESSION['message'] = $message;
    //     $_SESSION['alert_type'] = $type;
        
    //     if ($type == "ban") {
    //         $_SESSION['alert_icon'] = "ban";
    //     } else {
    //         $_SESSION['alert_icon'] = "check";
    //     }

    //     return 0;
    // }

