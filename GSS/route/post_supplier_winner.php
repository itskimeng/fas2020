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

$conn = mysqli_connect("localhost", "fascalab_2020", "w]zYV6X9{*BN", "fascalab_2020");
$sql = "SELECT
                sq.supplier_id,
                s.supplier_title,
                a.procurement,
                SUM(sq.ppu),
                sq.rfq_no
            FROM
                `supplier_quote` sq
            LEFT JOIN supplier s ON
                sq.supplier_id = s.id
            LEFT JOIN app a ON
                sq.rfq_item_id = a.id
            LEFT JOIN rfq_items ri ON
                sq.rfq_item_id = ri.app_id
            LEFT JOIN rfq r ON
                ri.rfq_id = r.id
            WHERE
            sq.rfq_no ='$rfq_no'
            GROUP BY
                sq.supplier_id
            ORDER BY
                sq.ppu ASC
            LIMIT 1";
            
$query = mysqli_query($conn, $sql);
$data = [];
while ($row = mysqli_fetch_assoc($query)) {
    $supplier_id = $row['supplier_id'];
    $rfq_no = $row['rfq_no'];
    $award->update(
        'supplier_quote',
        [
            'is_winner' => '1'
        ],
        "rfq_no = '$rfq_no' and supplier_id='$supplier_id'"
    );
}
    $award->insert(
    'abstract_of_quote',
    [   
        'id'=>null,
        'abstract_no'=>$_POST['abstract_no'],
        'supplier_id' => $supplier_id,
        'rfq_id' => $_POST['rfq_id'],
        'warranty'=>'',
        'price_validity'=>'',
        'date_created'=>date('Y-m-d')
    ]);
    $award->insert(
        'tbl_supplier_winners',
        [
            'supplier_id' => $supplier_id,
            'count'       => 1
        ]);
        $pr->update(
            'pr',
            [
                'stat' => Procurement::STATUS_AWARDED,
            ],
            "pr_no='$pr_no'"
        );
        

header('location: ../../procurement_supplier_winner.php?flag=0&rfq_id='.$_POST['rfq_id'].'&abstract_no='.$_POST['abstract_no'].'&pr_no='.$_POST['pr_no'].'&rfq_no='.$_POST['rfq_no'].'');
