<?php
session_start();
date_default_timezone_set('Asia/Manila');

require_once "../../Model/Connection.php";
require_once "../../Model/Awarding.php";
$award = new Awarding();
$supplier = '';
$rfq_no = $_POST['cform-rfq-no-awarded'];
$pr_no = $_POST['cform-pr-no-awarded'];
$rfq_id = $_POST['rfq_id'];

if(isset($_POST['selected_supplier']))
{
    $supplier = $_POST['selected_supplier'];
}else{
    $supplier = $_POST['supplier'];
}
for ($i=0; $i < count($_POST['supplier_price']) ; $i++) { 
   $award->insert(
    'supplier_quote',
    [   
        'id'=>null,
        'supplier_id'=>$supplier,
        'rfq_id' => $rfq_id,
        'rfq_no' => $rfq_no,
        'rfq_item_id'=>$_POST['rfq_item_id'][$i],
        'ppu'=>$_POST['supplier_price'][$i]
    ]);
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

header('location:../../procurement_supplier_awarding.php?flag=1&pr_no='.$_POST['cform-pr-no-awarded'].'&rfq_no='.$_POST['cform-rfq-no-awarded'].'');
?>



