<?php
session_start();
date_default_timezone_set('Asia/Manila');
require_once "../../Model/Connection.php";
require '../../Model/Procurement.php';
$conn = mysqli_connect("localhost", "fascalab_2020", "w]zYV6X9{*BN", "fascalab_2020");



$pr = new Procurement();
$today = new DateTime();

$rfq_no = $_GET['rfq_no'];
$purpose = $_GET['purpose'];
$rfq_date = date('Y-m-d', strtotime($_GET['rfq_date']));
$pr_no = $_GET['pr_no'];
$rfq_idd = '';
$app_id = '';
$desc = '';
$unit = '';
$qty = '';
$abc = '';
$total = '';




$pr->insert(
    'rfq',
    [
        'rfq_no' => $rfq_no,
        'purpose' => $purpose,
        'rfq_date' => $rfq_date,
        'pr_no' => $pr_no,
        'stat' => Procurement::STATUS_WITH_RFQ
    ]
);
$pr->insert(
    'tbl_pr_history',
    [
        'PR_NO' => $pr_no,
        'ACTION_DATE' => date('Y-m-d H:i:s'),
        'ACTION_TAKEN' => Procurement::STATUS_WITH_RFQ,
        'ASSIGN_EMP' => $_SESSION['currentuser']
    ]
);
$pr->update(
    'pr',
    [
        'stat' => Procurement::STATUS_WITH_RFQ,
    ],
    "pr_no='$pr_no'"
);

//  FOR THE MEAN TIME !!! FUCK!
$pr->select("rfq", "*", "rfq_no='$rfq_no'");
$result1 = $pr->sql;
$row1 = mysqli_fetch_assoc($result1);
while ($row1 = mysqli_fetch_assoc($result1)) {
    $rfq_idd = $row1['id'];
    // $pr->update(
    //     'rfq_items',
    //     [
    //         'rfq_id' => $rfq_idd,
    //     ],
    //     "pr_no='$pr_no'"
    // );

}


$sql = "SELECT items,description,qty,unit,abc,(qty*abc) as 'total' from pr_items  LEFT JOIN rfq on pr_items.pr_no = rfq.pr_no where  pr_items.pr_no = '$pr_no'";
echo $sql;
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
    $app_id = $row['items'];
    $desc = $row['description'];
    $qty = $row['qty'];
    $unit = $row['unit'];
    $abc = $row['abc'];
    $total = $row['total'];
    $pr->insert(
        'rfq_items',
        [
            'rfq_id' => $rfq_idd,
            'pr_no' => $pr_no,
            'app_id' => $app_id,
            'description' => $desc,
            'qty' => $qty,
            'unit_id' => $unit,
            'abc' => $abc,
            'total_amount' => $total
        ]
    );
}
// $pr->select("pr_items", "*", "pr_no = '$pr_no'");
// $result1 = $pr->sql;
// $row1 = mysqli_fetch_assoc($result1);
// while ($row1 = mysqli_fetch_assoc($result1)) {
//     $app_id = $row1['id'];
//     echo $app_id;
// }


// $pr->select("rfq", "items,description,qty,unit,abc,(qty*abc) as 'total'", "pr_no='$pr_no'");
// $result = $pr->sql;
// $row = mysqli_fetch_assoc($result);
// while ($row = mysqli_fetch_assoc($result)) {
//         $app_id = $row['items'];
//         $desc = $row['description'];
//         $qty = $row['qty'];
//         $unit = $row['unit'];
//         $abc = $row['abc'];
//         $total = $row['total'];
// }
