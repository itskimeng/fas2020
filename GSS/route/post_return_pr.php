<?php
session_start();
date_default_timezone_set('Asia/Manila');

require_once "../../Model/Connection.php";
require_once "../../Model/Procurement.php";

$pr = new Procurement();

$pr_no = $_POST['hidden-pr-no'];
$remarks = $_POST['remarks'];

$pr->update(
    'pr',
    [
        'remarks' => $remarks,
        'stat'    => Procurement::STATUS_RETURN_PR
    ],
    "pr_no='$pr_no'"
);
?>
<script>
    window.location = '../../procurement_request_for_quotation.php';
</script>