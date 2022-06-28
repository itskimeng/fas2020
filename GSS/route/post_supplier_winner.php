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
$pr_id = $_POST['pr_id'];
$supplier_id = '';
$is_multiple = $_SESSION['is_multiple']['is_multiple'];
$rfq_id = [];


$conn = mysqli_connect("localhost", "fascalab_2020", "w]zYV6X9{*BN", "fascalab_2020");
    $sql = "SELECT id FROM rfq where rfq.rfq_no= '$rfq_no'";
    $query = mysqli_query($conn, $sql);
    $data = [];
    while ($row = mysqli_fetch_assoc($query)) {
        $rfq_id[] = $row['id'];
    }
    
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
        "rfq_item_id='" . $row['rfq_item_id'] . "' and ppu != 0 order by ppu limit 1"
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


        // =====================================
        if ($is_multiple) {
            for ($i=0; $i < count($rfq_id) ; $i++) { 
                 $award->insert(
                    'abstract_of_quote',
                    [
                        'id' => null,
                        'abstract_no' => $_POST['abstract_no'],
                        'supplier_id' => $supplier_id,
                        'rfq_id' => $rfq_id[$i],
                        'warranty' => '',
                        'price_validity' => '',
                        'date_created' => date('Y-m-d')
                    ]
                );
            }
            foreach ($rfq_id as $key => $data) {
              
            }
        } else {
            $award->insert(
                'abstract_of_quote',
                [
                    'id' => null,
                    'abstract_no' => $_POST['abstract_no'],
                    'supplier_id' => $supplier_id,
                    'rfq_id' => $_POST['rfq_id'],
                    'warranty' => '',
                    'price_validity' => '',
                    'date_created' => date('Y-m-d')
                ]
            );
        }
        
        $award->insert(
            'tbl_supplier_winners',
            [
                'supplier_id' => $supplier_id,
                'count'       => 1
            ]
        );
    }
}
$pr->update(
    'pr',
    [
        'stat' => Procurement::STATUS_AWARDED,
        'action_officer' => $_SESSION['currentuser'],
        'action_date' => date('Y-m-d H:i:s')

    ],
    "pr_no='$pr_no'"
);

$pr->insert(
    'tbl_pr_history',
    [
        'PR_NO' => $pr_no,
        'PR_ID' => $pr_id,
        'ACTION_DATE' => date('Y-m-d H:i:s'),
        'ACTION_TAKEN' => Procurement::STATUS_AWARDED,
        'ASSIGN_EMP' => $_SESSION['currentuser']
    ]
);



header('location: ../../procurement_supplier_awarding.php?flag=0&abstract_no=' . $_POST['abstract_no'] . '&pr_no=' . $pr_no . '&rfq_no=' . $rfq_no . '&rfq_id=' . $_POST['rfq_id'].'');
exit();
?>
