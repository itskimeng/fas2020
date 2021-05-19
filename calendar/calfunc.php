<?php
session_start();
require_once "db.php";
// $return_arr = array();
// $return_arr[] = array("flag"=>$flag,"start"=>$start,"end"=>$end);
// echo json_encode($return_arr);
$startdate  =       date('Y-m-d', strtotime($_POST['startdatetxtbox']));
$enddate    =       date('Y-m-d', strtotime($_POST['enddatetxtbox']));
$_SESSION['start'] = $startdate;
$_SESSION['end'] = $enddate;

        // $sqlcheck = mysqli_query($conn, "SELECT * FROM events WHERE start >= '$start' AND ((end BETWEEN start AND end OR end <= '$end' OR end > '$end'))");
        $sqlcheck = mysqli_query($conn, "SELECT * FROM events WHERE '$startdate'  <= DATE(end) AND '$enddate' >= DATE(start)");
        if (mysqli_num_rows($sqlcheck) > 0) {
            echo '1';
        } else {
            echo '0';
        }

        

?>
