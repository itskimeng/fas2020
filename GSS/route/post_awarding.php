<?php
session_start();
date_default_timezone_set('Asia/Manila');

require_once "../../Model/Connection.php";
require_once "../../Model/Awarding.php";
$award = new Awarding();
$supplier = '';
$rfq_no = $_POST['cform-rfq-no-awarded'];
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

header('location:../../procurement_supplier_awarding.php?pr_no='.$_POST['cform-pr-no-awarded'].'&rfq_no='.$_POST['cform-rfq-no-awarded'].'');
?>


