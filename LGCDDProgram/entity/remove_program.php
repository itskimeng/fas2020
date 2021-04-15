<?php
session_start();
date_default_timezone_set('Asia/Manila');

require_once "../../connection.php";

    
$id = $_GET['id'];
$code = $_GET['code'];

removeProgram($conn, 'event_programs', $id);
removeProgramCode($conn, 'conf_code_series', $code);

     
header('location:../../base_cdd_programs.html.php?username='.$_SESSION["username"].'&division='.$_SESSION["division"].'');



function removeProgram($conn,$table,$id) {
    $sql = "DELETE FROM $table WHERE id = ".$id."";

    $result = mysqli_query($conn, $sql);

    return $result;    
}

function removeProgramCode($conn,$table,$id) {
    $sql = "DELETE FROM $table WHERE id = '".$id."' ";

    $result = mysqli_query($conn, $sql);

    return $result;    
}

