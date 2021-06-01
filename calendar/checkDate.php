<?php
session_start();
require_once "db.php";


        // $sqlcheck = mysqli_query($conn, "SELECT * FROM events WHERE start >= '$start' AND ((end BETWEEN start AND end OR end <= '$end' OR end > '$end'))");
        $sqlcheck = mysqli_query($conn, "SELECT * FROM events WHERE DATE(`event_reminder`)  <= DATE(start)");
        if (mysqli_num_rows($sqlcheck) > 0) {
            while ($row = mysqli_fetch_assoc($sqlcheck)) {
            echo json_encode( array("title" => $row['title'], "start" => $row['start'], "end" => $row['end']));
            }
        }
           

?>
