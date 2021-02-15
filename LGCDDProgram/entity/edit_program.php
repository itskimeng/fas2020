<?php
session_start();
date_default_timezone_set('Asia/Manila');

require_once "../../connection.php";

    if (isset($_POST['submit'])) {
        $data['progid'] = $_POST['progid'];
        $data['code'] = $_POST['code'];
        $data['name'] = $_POST['name'];        

        updateProgram($conn, 'event_programs', $data);
    } 
    
    header('location:../../base_menu_lgcddprogram.html.php?username='.$_SESSION["username"].'&division='.$_SESSION["division"].'');



    function updateProgram($conn,$table,$data) {
        $sql = "UPDATE $table SET 
                code = '".$data['code']."', name = '".$data['name']."'
                WHERE id = ".$data['progid']."";

        $result = mysqli_query($conn, $sql);

        return $result;    
    }

