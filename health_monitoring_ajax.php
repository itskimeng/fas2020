<?php
date_default_timezone_set('Asia/Manila');

        include 'connection.php';
        $date = date('Y-m-d');
        $query = "SELECT * from `tblhealth_monitoring` WHERE `IS_SUBMIT` = 1 AND `UNAME` = '".$_POST['username']."' AND `DATE` = '".$date."' limit 1";

        $result = mysqli_query($conn, $query);
        while($row = mysqli_fetch_array($result))
        {
            echo $row['IS_SUBMIT'];
        }
    
?>