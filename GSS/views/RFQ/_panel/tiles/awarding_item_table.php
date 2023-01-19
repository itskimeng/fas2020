<?php
date_default_timezone_set('Asia/Manila');

require_once "../../../../../Model/Connection.php";
require_once "../../../../../Model/Procurement.php";

    $id = $_POST['id'];
    $count = 0;
    $category = '';
    $pr = new Procurement();


    $pr->select(
        "supplier s",
        "id, supplier_title",
        "id IN (".$id.")"
    );
    $result1 = $pr->sql;

    while ($row = mysqli_fetch_assoc($result1)) {
        $count = mysqli_num_rows($result1);
        $tr[]= $row['supplier_title'];
        
        
    }


    $th = '';
    $th .= '<tr>';
    $th .= '<th>ITEM</th>';
    $th .= '<th>DESCRIPTION</th>';
    $th .= '<th>TOTAL ABC</th>';
    switch ($count) {
        case '1':
            $th .= '<th>'.$tr[0].'</th>';
            break;
        case '2':
            $th .= '<th>'.$tr[0].'</th>';
            $th .= '<th>'.$tr[1].'</th>';
            break;
        case '3':
            $th .= '<th>'.$tr[0].'</th>';
            $th .= '<th>'.$tr[1].'</th>';
            $th .= '<th>'.$tr[2].'</th>';
            break;
        case '4':
            $th .= '<th>'.$tr[0].'</th>';
            $th .= '<th>'.$tr[1].'</th>';
            $th .= '<th>'.$tr[2].'</th>';
            $th .= '<th>'.$tr[3].'</th>';
            break;
        case '5':
            $th .= '<th>'.$tr[0].'</th>';
            $th .= '<th>'.$tr[1].'</th>';
            $th .= '<th>'.$tr[2].'</th>';
            $th .= '<th>'.$tr[3].'</th>';
            $th .= '<th>'.$tr[4].'</th>';
            break;
        default:
            # code...
            break;
    }


    echo $th
 
?>