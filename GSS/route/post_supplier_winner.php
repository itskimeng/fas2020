<?php
session_start();
date_default_timezone_set('Asia/Manila');

require_once "../../Model/Connection.php";
require_once "../../Model/Awarding.php";
require_once "../../Model/Procurement.php";
function group_array($array)
{
     $val = array_unique($array);
     return $val;
}


$award = new Awarding();
$pr = new Procurement();
$rfq_no = $_POST['rfq_no'];
$pr_no = $_POST['pr_no'];
$is_multiple = $_SESSION['is_multiple']['is_multiple'];
// $rfq_id = $_SESSION['rfq_id'];


$conn = mysqli_connect("localhost", "fascalab_2020", "w]zYV6X9{*BN", "fascalab_2020");
    $sql = "SELECT
    rr.id as 'rfq_id',
    rr.rfq_no,
    sq.supplier_id,
    sq.is_winner AS 'winner'
FROM
    `supplier_quote` sq
LEFT JOIN supplier s ON s.id = sq.supplier_id
LEFT JOIN rfq_items ri ON ri.app_id = sq.rfq_item_id
LEFT JOIN rfq r ON r.id = ri.rfq_id
LEFT JOIN rfq rr ON rr.id = sq.rfq_id
LEFT JOIN app a ON a.id = ri.app_id
WHERE
    rr.rfq_no = '$rfq_no' and sq.is_winner  = 1
ORDER BY
    winner";
    $query = mysqli_query($conn, $sql);
    $data = [];
    while ($row = mysqli_fetch_assoc($query)) {
        $rfq_id[] = $row['rfq_id'];
        $supplier_id[] = $row['supplier_id'];
    }
    $id = implode(',',$rfq_id);
    $supp_id = implode(',',$supplier_id);
$award->select(
    "supplier_quote",
    "rfq_item_id",
    "rfq_no='" . $rfq_no . "'  group by rfq_item_id"
);
$result = $award->sql;
while ($row = mysqli_fetch_assoc($result)) {
    $award->select(
        "supplier_quote",
        "id,ppu,supplier_id",
        "rfq_item_id='" . $row['rfq_item_id'] . "' order by ppu limit 1"
    );
    $result1 = $award->sql;
    while ($row1 = mysqli_fetch_assoc($result1)) {
        $supplier_id = $row1['supplier_id'];

        $award->update(
            'supplier_quote',
            [
                'is_winner' => '1'
            ],
            "id ='" . $row1['id'] . "'"
        );


        
    }
}


// =====================================
if ($is_multiple) {
        $award->insert(
            'abstract_of_quote',
            [
                'id' => null,
                'abstract_no' => $_POST['abstract_no'],
                'supplier_id' => $supp_id,
                'rfq_id' => $id,
                'warranty' => '',
                'price_validity' => '',
                'date_created' => date('Y-m-d')
            ]
        );
    
} else {
    $award->insert(
        'abstract_of_quote',
        [
            'id' => null,
            'abstract_no' => $_POST['abstract_no'],
            'supplier_id' => $supp_id,
            'rfq_id' => $id,
            'warranty' => '',
            'price_validity' => '',
            'date_created' => date('Y-m-d')
        ]
    );
}

$award->insert(
    'tbl_supplier_winners',
    [
        'supplier_id' => $supp_id,
        'count'       => 1
    ]
);





$pr->update(
    'pr',
    [
        'stat' => Procurement::STATUS_AWARDED,
    ],
    "pr_no='$pr_no'"
);


header('Location:procurement_supplier_winner.php?flag=0&rfq_id=' . $_POST['rfq_id'] . '&abstract_no=' . $_POST['abstract_no'] . '&pr_no=' . $_POST['pr_no'] . '&rfq_no=' . $_POST['rfq_no'] . '');

?>
