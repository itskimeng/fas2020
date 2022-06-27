<?php
session_start();
date_default_timezone_set('Asia/Manila');
require_once "../../Model/Connection.php";
require '../../Model/Procurement.php';
$conn = mysqli_connect("localhost", "fascalab_2020", "w]zYV6X9{*BN", "fascalab_2020");
     

$pr = new Procurement();
$today = new DateTime();

$rfq_no = $_GET['rfq'];

// $purpose = $_GET['purpose'];
$rfq_date = date('Y-m-d', strtotime($_GET['rfq_date']));
$pr_no = $_GET['pr_no'];
$rfq_id = $_GET['rfq_id'];
$app_id = getAPP($pr_no);
$desc = $_GET['description'];
$unit = $_GET['unit'];
$qty = $_GET['qty'];
$abc = $_GET['abc'];
$total = $_GET['amount'];
$pr_id = $_GET['pr_id'];
$pmo_id = $_GET['pmo_id'];
$mode = $_GET['mode'];
$purpose = $_GET['purpose'];

for ($i=0; $i < count($_GET['app_id']) ; $i++) { 

    for ($i=0; $i < count($_GET['app_id']) ; $i++) { 
        $pr->insert(
            'rfq_items',
            [
                'rfq_id' => $_GET['rfq_id'],
                'pr_no' => $pr_no,
                'pr_id' => $pr_id,
                'app_id' => $_GET['app_id'][$i],
                'description' => $desc,
                'qty' => $qty,
                'unit_id' => $unit,
                'abc' => $abc,
                'total_amount' => $total
            ]
        );
    }
}



$pr->insert(
    'rfq',
    [
        'rfq_no' => $rfq_no,
        'pr_id' => $pr_id,
        'pmo_id' => $pmo_id,
        'rfq_date' => $rfq_date,
        'pr_no' => $pr_no,
        'rfq_mode_id' => $mode,
        'purpose' => $purpose,
        'stat' => Procurement::STATUS_WITH_RFQ
    ]
);
$pr->insert(
    'tbl_pr_history',
    [
        'PR_NO' => $pr_no,
        'PR_ID' => $pr_id,
        'ACTION_DATE' => date('Y-m-d H:i:s'),
        'ACTION_TAKEN' => Procurement::STATUS_WITH_RFQ,
        'ASSIGN_EMP' => $_SESSION['currentuser']
    ]
);
$pr->update(
    'pr',
    [
        'stat' => Procurement::STATUS_WITH_RFQ,
        'action_officer' => $_SESSION['currentuser'],
        'action_date' => date('Y-m-d H:i:s')

    ],
    "pr_no='$pr_no'"
);


function getAPP($pr_no)
{
    $conn = mysqli_connect("localhost", "fascalab_2020", "w]zYV6X9{*BN", "fascalab_2020");
    $data = [];

    $sql = "SELECT i.items
                
                FROM
                    pr as pr
                LEFT JOIN pr_items i on pr.pr_no = i.pr_no
                LEFT JOIN rfq on pr.pr_no = rfq.pr_no
                WHERE
                pr.pr_no = '$pr_no'
                GROUP by items";
                echo $sql;
    $query = mysqli_query($conn, $sql);
    $data = '';
    while ($row = mysqli_fetch_assoc($query)) {
        $data =$row['items'];
    }
    return $data;
}
