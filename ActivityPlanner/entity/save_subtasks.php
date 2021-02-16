<?php
session_start();
date_default_timezone_set('Asia/Manila');

require_once "../../connection.php";


    if (isset($_POST['submit'])) {
        $event_id = $_POST['event_id'];
        $event_program = $_POST['event_program'];

        // clear
        $clear = clearCollaborators($conn, 'event_subtasks', $event_id);

        foreach ($_POST['subtask'] as $key => $subtask) {
            if (($_POST['task_status'][$key] != "done") AND ($_POST['task_status'][$key] != "ongoing" ) AND $_POST['task_status'][$key] != "forchecking") {
                $task_id = $_POST['task_id'][$key];
                $person = $_POST['person'][$key];
                $status = $_POST['task_status'][$key];

                // timeline
                $timeline = explode("-", $_POST['timeline'][$key]);
                $date_from = strtotime($timeline[0]);
                $date_from = date('Y-m-d h:i:s', $date_from);
                $date_to = strtotime($timeline[1]);
                $date_to = date('Y-m-d h:i:s', $date_to);

                $date_from = new DateTime($date_from);
                $date_to = new DateTime($date_to);

                $emp = findEmployee($conn, 'tblemployeeinfo', $person);

                $code_series = getCodeSeries($conn, $event_program);

                $data = [
                    'event_id' => $event_id,
                    'event_program' => $event_program,
                    'code' => $code_series['code'],
                    'task_id' => $task_id,
                    'title' => $subtask,
                    'emp_id' => $emp['emp_n'],
                    'date_from' => $date_from->format('Y-m-d H:i:s'),  
                    'date_to' => $date_to->format('Y-m-d H:i:s')
                ];

                if (in_array($status, ['created', 'forchecking'])) {
                    $result = updateEventSubtask($conn, 'event_subtasks', $data);
                }

                if ($status == '' || $status == 'draft') {
                    $result = insertEventSubtask($conn, 'event_subtasks', $data);
                    setCodeSeries($conn, $event_program, $code_series['child']);
                }

                if (!$result) {
                    $result = mysqli_error($conn);
                    flashMessage("A problem occured while submitting your data", "danger", "ban");
                } else {
                    flashMessage("Event has been updated successfully", "success", "check");
                }
            }
        }

        // flashMessage("Event has been updated successfully", "success", "check");
    
    } else {
        // flashMessage("A problem occured while submitting your data", "danger", "ban");
    }
    

    
        
    
    // if (!empty($data['collaborators'])) {
    //     foreach ($data['collaborators'] as $collaborator) {
    //         $emp = findEmployee($conn, 'tblemployeeinfo', $collaborator);
            
    //         $query = insertCollaborator($conn, 'event_collaborators', $data['event_id'], $emp);
    //     }
    // }
    
    // $result = updateEvent($conn, 'events', $data);    

    header('location:../../base_planner_subtasks.html.php?event_planner_id='.$event_id.'&username='.$_SESSION["username"].'&division='.$_SESSION["division"].'');


    function getCodeSeries($conn, $id) {
        $container = $data = [];

        $sql = "SELECT year, parent, child FROM conf_code_series where id = '".$id."'";

        $result = mysqli_query($conn, $sql);
        $result = mysqli_fetch_array($result);

        $container['child'] = '0001' + $result['child'];
        $container['parent'] = $result['parent'];
        $container['year'] = $result['year'];

        if (strlen($container['parent']) == 1) {
            $container['parent'] = "000".$container['parent'];
        } else if (strlen($container['parent']) == 2) {
            $container['parent'] = "00".$container['parent'];
        } else if (strlen($container['parent']) == 3) {
            $container['parent'] = "0".$container['parent'];
        }

        if (strlen($container['child']) == 1) {
            $container['child'] = "000".$container['child'];
        } else if (strlen($container['child']) == 2) {
            $container['child'] = "00".$container['child'];
        } else if (strlen($container['child']) == 3) {
            $container['child'] = "0".$container['child'];
        }

        $data['code'] = $id.$container['year'].'-'.$container['parent'].'-'.$container['child'];
        $data['child'] = $container['child'];

        return $data;
    }  

    function setCodeSeries($conn, $id, $child) {
        $sql = "UPDATE conf_code_series SET child = ".$child." where id = '".$id."'";

        $result = mysqli_query($conn, $sql);
        
        return $result;
    } 

    function findEmployee($conn,$table,$data) {
        $sql = "SELECT EMP_N as emp_n, FIRST_M as fname, MIDDLE_M as mname, LAST_M as lname FROM $table WHERE EMP_N = $data";

        $emp = mysqli_query($conn, $sql);
        $result = mysqli_fetch_array($emp);
        
        return $result;    
    }

    function updateEventSubtask($conn,$table,$data) {
        $sql = "UPDATE ".$table." SET 
        event_id = ".$data['event_id'].", 
        title = '".$data['title']."', 
        emp_id = ".$data['emp_id'].", 
        date_from = '".$data['date_from']."', 
        date_to = '".$data['date_to']."'
        WHERE id = ".$data['task_id']."";

        $result = mysqli_query($conn, $sql);

        return $result;    
    }

    function insertEventSubtask($conn,$table,$data) {
        $sql = "INSERT INTO $table (event_id, title, emp_id, date_from, date_to, status, code) 
                VALUES(".$data['event_id'].", '".$data['title']."', ".$data['emp_id'].", '".$data['date_from']."', '".$data['date_to']."', 'Draft', '".$data['code']."')";

        $result = mysqli_query($conn, $sql);

        return $result;    
    }

    function clearCollaborators($conn,$table,$id) {
        $sql = "DELETE FROM $table WHERE event_id = $id AND status = 'Draft'";

        $result = mysqli_query($conn, $sql);

        return $result;    
    }

    function flashMessage($message="", $type="success") {
        $notification = [];

        $notification = [
            'message' => $message,
            'type' => $type,
            'icon' => $type == 'ban' ? 'ban' : 'check',
            'header' => $type == 'ban' ? 'Error' : 'Success'
        ];

        $_SESSION['alert'] = $notification;

        return 0;
    }  

