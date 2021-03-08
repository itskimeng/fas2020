<?php
session_start();
date_default_timezone_set('Asia/Manila');

require_once '../manager/FlashMessage.php';
require_once "../../connection.php";

    if (isset($_POST['submit'])) {
        $flash = new FlashMessage();
        foreach ($_POST['clb_id'] as $key => $collab) {
            $arr = ['opr'=>'','add'=>'','edit'=>'','delete'=>'','save'=> '','todo'=>'','post'=>'','approve'=>''];
            $opr = $add = $edit = $delete = $to_do = $post = $approve = '';

            foreach ($arr as $index => $item) {
                if (isset($_POST[$index][$collab])) {
                    $arr[$index] = true;
                }
            }

            $arr = json_encode($arr);
            $result = updateEventSubtask($conn,$collab,$arr);
        }
        
        $flash->generateNew("Settings has been updated successfully", "success", "check");
    } 


    header('location:../../base_planner_subtasks.html.php?event_planner_id='.$_POST['event_planner_id'].''.'&username='.$_SESSION["username"].'&division='.$_SESSION["division"].'');

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

