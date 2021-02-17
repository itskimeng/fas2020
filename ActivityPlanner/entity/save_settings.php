<?php
session_start();
date_default_timezone_set('Asia/Manila');

require_once "../../connection.php";

    if (isset($_POST['submit'])) {
        foreach ($_POST['clb_id'] as $key => $collab) {
            $arr = ['opr'=>'','add'=>'','edit'=>'','delete'=>'','todo'=>'','post'=>'','approve'=>''];
            $opr = $add = $edit = $delete = $to_do = $post = $approve = '';

            foreach ($arr as $index => $item) {
                if (isset($_POST[$index][$collab])) {
                    $arr[$index] = true;
                }
            }

            $arr = json_encode($arr);
            $result = updateEventSubtask($conn,$collab,$arr);
        }
    } 

    header('location:../../base_planner_subtasks.html.php?event_planner_id='.$_POST['event_planner_id'].''.'&username='.$_SESSION["username"].'&division='.$_SESSION["division"].'');



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

    function updateEventSubtask($conn,$id,$data) {
        $sql = "UPDATE event_collaborators SET 
        acl = '".$data."'
        WHERE id = ".$id."";

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

