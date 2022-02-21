<?php
session_start();
date_default_timezone_set('Asia/Manila');

require_once "../../Model/Connection.php";
require_once "../../Model/Awarding.php";

$award = new Awarding();
$pr_no = $_POST['pr_no'];


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
            ri.pr_no = '$pr_no'
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
header('location: ../../procurement_awarding.php?pr_no='.$_POST['pr_no'].'&rfq_no='.$_POST['rfq_no'].'');
