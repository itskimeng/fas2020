<?php
session_start();
require_once "db.php";
$return_arr = array();
$startdate  =       date('Y-m-d', strtotime($_POST['startdatetxtbox']));
$enddate    =       date('Y-m-d', strtotime($_POST['enddatetxtbox']));

        // $sqlcheck = mysqli_query($conn, "SELECT * FROM events WHERE start >= '$start' AND ((end BETWEEN start AND end OR end <= '$end' OR end > '$end'))");
        $sqlcheck = mysqli_query($conn, "SELECT * FROM events WHERE '$startdate'  <= DATE(end) AND '$enddate' >= DATE(start)");
        if (mysqli_num_rows($sqlcheck) > 0) {
            echo json_encode( array("flag" => "1", "start" => $startdate, "end" => $enddate));
            } else {
                echo json_encode( array("flag" => "0", "start" => $startdate, "end" => $enddate));
            }
           

?>
