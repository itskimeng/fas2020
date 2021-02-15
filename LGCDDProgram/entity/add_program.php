<?php
session_start();
date_default_timezone_set('Asia/Manila');

require_once "../../connection.php";

    if (isset($_POST['submit'])) {
        $data['code'] = $_POST['code'];
        $data['name'] = $_POST['name'];        

        insertProgram($conn, 'event_programs', $data);
        insertProgramCode($conn, 'conf_code_series', $data);
    } 
    
    header('location:../../base_menu_lgcddprogram.html.php?username='.$_SESSION["username"].'&division='.$_SESSION["division"].'');



    function insertProgram($conn,$table,$data) {
        $sql = "INSERT INTO $table (code, name) 
                VALUES('".$data['code']."', '".$data['name']."')";

        $result = mysqli_query($conn, $sql);

        return $result;    
    }

    function insertProgramCode($conn,$table,$data) {
        $date = new DateTime();
        $yy = $date->format('y');
        
        $sql = "INSERT INTO $table (id, year) 
                VALUES('".$data['code']."', ".$yy.")";

        $result = mysqli_query($conn, $sql);

        return $result;    
    }

