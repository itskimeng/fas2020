
<?php
date_default_timezone_set('Asia/Manila');

require_once "../../Model/Connection.php";
require_once "../../Model/Procurement.php";

    $id = $_POST['pr_no'];
    $count = 0;
    $category = '';
    $pr = new Procurement();


    $pr->select(
        "pr_items",
        "*",
        "pr_no = '".$id."' "
    );
    $result1 = $pr->sql;
    if (mysqli_num_rows($result1) == 0) { 
        echo '0';

     } else { 
        while ($row = mysqli_fetch_assoc($result1)) {
          echo'1';
        }
     } 

 
?>
