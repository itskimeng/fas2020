<?php
session_start();
date_default_timezone_set('Asia/Manila');

require_once "../../Model/Connection.php";
require_once "../../Model/Awarding.php";
require_once "../../Model/Procurement.php";


$award = new Awarding();
$pr = new Procurement();
$rfq_no = $_POST['rfq_no'];
$pr_no = $_POST['pr_no'];
$supplier_id = '';
$is_multiple = $_SESSION['is_multiple']['is_multiple'];
$rfq_id = $_SESSION['rfq_id'];


$conn = mysqli_connect("localhost", "fascalab_2020", "w]zYV6X9{*BN", "fascalab_2020");
    $sql = "SELECT id,pr_no FROM pr_items where YEAR(date_a) = '2022'";
    $query = mysqli_query($conn, $sql);
    $data = [];
    while ($row = mysqli_fetch_assoc($query)) {
        $pr = strlen($row['pr_no']);
        echo $row['pr_no'].'-'.$pr.'<br>';
        if($pr == 13)
        {
            
        $award->update(
            'pr_items',
            [
                'pr_no' => 
            ],
            "id ='" . $row['id'] . "'"
        );
        
    }

   
    // $result1 = $award->sql;
    // while ($row1 = mysqli_fetch_assoc($result1)) {
    //     $pr_no = $row1['pr_no'];
    //     $id = $row1['id'];

    //     // $award->update(
    //     //     'pr_items',
    //     //     [
    //     //         'pr_id' => $id
    //     //     ],
    //     //     "pr_no ='" . $pr_no . "'"
    //     // );

    // }
   
?>
