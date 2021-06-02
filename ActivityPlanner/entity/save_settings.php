<?php
session_start();
date_default_timezone_set('Asia/Manila');

require_once '../manager/FlashMessage.php';
require_once "../../connection.php";
require_once "../manager/Notification.php";

if (isset($_POST['submit'])) {
    $flash = new FlashMessage();
    $notif = new Notification();

    $currentuser = $_SESSION['currentuser']; 

    foreach ($_POST['clb_id'] as $key => $collab) {
        $arr = ['opr'=>'','add'=>'','edit'=>'','delete'=>'','save'=> '','todo'=>'','post'=>'','approve'=>''];
        $opr = $add = $edit = $delete = $to_do = $post = $approve = '';

        foreach ($arr as $index => $item) {
            if (isset($_POST[$index][$collab])) {
                $arr[$index] = true;
            }
        }

        if ($arr['opr']) {
            $sql = "SELECT 
                ev.id as event_id, 
                ec.emp_id as emp_id,
                ev.code_series as code 
                FROM event_collaborators ec 
                LEFT JOIN events ev on ev.id = ec.event_id
                WHERE ec.id = $collab";

            $query = mysqli_query($conn, $sql);
            $result = mysqli_fetch_array($query);

            $today = new DateTime();

            $dd = [
                'atv_id' => $result['event_id'],
                'message' => 'You have been given admin access',
                'receiver' => $result['emp_id'],
                'creator' => $currentuser,
                'date_today' => $today->format('Y-m-d H:i:s'),
                'status' => 'Settings',
                'code' => $result['code']
            ];

            $notif->addNewSettings($conn, 'event_notif', $dd);  
        }

        $arr = json_encode($arr);
        $result = updateEventSubtask($conn,$collab,$arr);
    
    }

    $_SESSION['toastr'] = $notif->addFlash('success', 'Activity has been successfully updated', 'Settings');
    
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

