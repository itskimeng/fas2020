<?php
date_default_timezone_set('Asia/Manila');

require_once "../../../../Model/Connection.php";
require_once "../../../../Model/Procurement.php";

    $id = $_POST['id'];
    $count = 0;
    $category = '';
    $pr = new Procurement();


    $pr->select(
        "pr_items pr
        LEFT JOIN app on app.id = pr.items 
        LEFT JOIN item_unit item on item.id = pr.unit",
        "SUM(pr.qty * pr.abc) as total",
        "pr.pr_id = '".$id."' "
    );
    $result1 = $pr->sql;
    while ($row = mysqli_fetch_assoc($result1)) {
        $tr = '';
        $tr .= '₱'.number_format($row['total'],2);
        echo $tr;
    }


 
?>
