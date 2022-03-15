<?php
session_start();
date_default_timezone_set('Asia/Manila');
require_once "../../Model/Connection.php";
require '../../Model/Procurement.php';
$conn = mysqli_connect("localhost", "fascalab_2020", "w]zYV6X9{*BN", "fascalab_2020");
$pr = new Procurement();
$today = new DateTime(); 
$rfq_id = $_POST['rfq_id'];
$pr_id = $_POST['pr_no'];
$rfq_no = $_POST['rfq'];
$rfq_mode = $_POST['mode'];
// $pmo = $_POST['pmo'];
$rfq_date = date('Y-m-d', strtotime($_POST['rfq_date']));

foreach ($_POST['pr_no'] as $multiple_pr_no) {
    $pr->insert(
        'rfq',
        [
            'rfq_no' => $rfq_no,
            'rfq_mode_id' => $rfq_mode,
            'pmo_id' => $pmo,
            'purpose' => '',
            'rfq_date' => $rfq_date,
            'pr_no' => $multiple_pr_no,
            'stat' => Procurement::STATUS_WITH_RFQ
        ]
    );

    $conn = mysqli_connect("localhost", "fascalab_2020", "w]zYV6X9{*BN", "fascalab_2020");
        $sql = "SELECT 
        i.items
                    
                    FROM
                        pr as pr
                    LEFT JOIN pr_items i on pr.pr_no = i.pr_no
                    LEFT JOIN rfq on pr.pr_no = rfq.pr_no
                    WHERE
                    pr.id = '$multiple_pr_no'
                    GROUP by items";
        $query = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($query)) {
    
            $pr->insert(
                'rfq_items',
                [
                    'rfq_id' => $rfq_id,
                    'pr_no' => $multiple_pr_no,
                    'app_id' =>  $row['items'],
                    'description' => '',
                    'qty' => '',
                    'unit_id' => '',
                    'abc' => '',
                    'total_amount' => ''
                ]
            );
        }

    $pr->insert(
        'tbl_pr_history',
        [
            'pr_id' => $multiple_pr_no,
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
        "id='$multiple_pr_no'"
    );
    $rfq_id++;
}
