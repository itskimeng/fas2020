<?php
session_start();
date_default_timezone_set('Asia/Manila');
require_once "../../Model/Connection.php";
require '../../Model/Procurement.php';
$date = new DateTime();
$conn = mysqli_connect("localhost", "fascalab_2020", "w]zYV6X9{*BN", "fascalab_2020");
$pr = new Procurement();
$rfq_id = $_POST['rfq_id'];
$pr_id = $_POST['pr_id'];
$rfq_no = $_POST['rfq_no'];
$pr_no = $_POST['pr_no'];
$rfq_mode = $_POST['mode'];
$pmo_id = $_POST['pmo_id'];
$particulars = $_POST['particulars'];


for ($i = 0; $i < count($_POST['pr_no']); $i++) {
    $rfq_date = ($_POST['rfq_date'][$i] == '') ? true : date('Y-m-d',strtotime($_POST['rfq_date'][$i]));
    //RFQ
    $pr->insert(
        'rfq',
        [
            'rfq_no' => $rfq_no,
            'pr_id' => $pr_id[$i],
            'rfq_mode_id' => $rfq_mode[$i],
            'pmo_id' => $pmo_id[$i],
            'purpose' => $particulars,
            'rfq_date' => $rfq_date,
            'pr_no' => $_POST['pr_no'][$i],
            'stat' => Procurement::STATUS_WITH_RFQ
        ]
    );
    // RFQ ITEMS
    $conn = mysqli_connect("localhost", "fascalab_2020", "w]zYV6X9{*BN", "fascalab_2020");
    $sql = "SELECT i.items, rfq.id AS `rfq_id` FROM pr AS pr LEFT JOIN pr_items i ON pr.pr_no = i.pr_no LEFT JOIN rfq ON pr.id = rfq.pr_id WHERE pr.id = '" . $pr_id[$i] . "' GROUP by items";
    $query = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($query)) {
        $pr->insert(
            'rfq_items',
            [
                'rfq_id' => $row['rfq_id'],
                'pr_id' => $pr_id[$i],
                'pr_no' => $_POST['pr_no'][$i],
                'app_id' =>  $row['items'],
                'description' => '',
                'qty' => '',
                'unit_id' => '',
                'abc' => '',
                'total_amount' => ''
            ]
        );
    }
    // HISTORY
    $pr->insert(
        'tbl_pr_history',
        [
            'pr_id' => $pr_id[$i],
            'ACTION_DATE' => date('Y-m-d H:i:s'),
            'ACTION_TAKEN' => Procurement::STATUS_WITH_RFQ,
            'ASSIGN_EMP' => $_SESSION['currentuser']
        ]
    );
    //PR
    $pr->update(
        'pr',
        [
            'stat' => Procurement::STATUS_WITH_RFQ,
        ],
        "id=$pr_id[$i]"
    );
    $rfq_id++;
}  
header('location:../../procurement_request_for_quotation.php?flag=1');
?>
   
