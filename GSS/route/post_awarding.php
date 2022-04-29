<?php
session_start();
date_default_timezone_set('Asia/Manila');

require_once "../../Model/Connection.php";
require_once "../../Model/Awarding.php";
require_once "../../Model/Procurement.php";
$conn = mysqli_connect("localhost", "fascalab_2020", "w]zYV6X9{*BN", "fascalab_2020");

$award = new Awarding();
$pr = new Procurement();

$supplier   =   '';
$rfq_item   =   '';
$rfq_no     =   $_GET['cform-rfq-no-awarded'];
$pr_no      =   $_GET['cform-pr-no-awarded'];
$rfq_id     =   $_GET['rfq_id'];
$supplier   =   $_GET['selected_supplier'];


    $sql = "SELECT  app.id AS item_id FROM pr_items pr LEFT JOIN app ON app.id = pr.items LEFT JOIN item_unit item ON item.id = pr.unit LEFT JOIN pr i ON i.id = pr.pr_id LEFT JOIN rfq ON rfq.pr_id = i.id WHERE rfq.id = '" . $rfq_id . "'";
    $query = mysqli_query($conn, $sql); 
    while ($row = mysqli_fetch_assoc($query)) {

    for ($i=0; $i < count($_GET['selected_supplier']) ; $i++) { 
    $award->insert(
        'supplier_quote',
        [   
            'id'=>null,
            'supplier_id'=>$supplier,
            'rfq_id' => $rfq_id,
            'rfq_no' => $rfq_no,
            'rfq_item_id'=> $row['item_id'],
            'ppu'=>$_GET['supplier_price'][$i]
        ]);
    }
}
$award->update(
    'rfq',
    [
        'is_awarded' => 1,
    ],
    "rfq_no='$rfq_no'"
);
$award->update(
    'pr',
    [
        'stat' => Procurement::STATUS_AWARDED,
    ],
    "pr_no='$pr_no'"
);
$pr->insert(
    'tbl_pr_history',
    [
        'PR_NO' => $pr_no,
        'ACTION_DATE' => date('Y-m-d H:i:s'),
        'ACTION_TAKEN' => Procurement::STATUS_AWARDED,
        'ASSIGN_EMP' => $_SESSION['currentuser']
    ]
);
?>



