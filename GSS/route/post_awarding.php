<?php
session_start();
date_default_timezone_set('Asia/Manila');

require_once "../../Model/Connection.php";
require_once "../../Model/Awarding.php";
$award = new Awarding();

for ($i=0; $i < count($_POST['supplier_price']) ; $i++) { 
   $award->insert(
    'supplier_quote',
    [   
        'id'=>null,
        'supplier_id'=>$_POST['selected_supplier'],
        'rfq_item_id'=>$_POST['rfq_item_id'][$i],
        'ppu'=>$_POST['supplier_price'][$i]
    ]);
}
header('location: ../../procurement_request_for_quotation.php');
?>



