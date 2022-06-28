<?php
session_start();
date_default_timezone_set('Asia/Manila');

require_once "../../Model/Connection.php";
require_once "../../Model/Procurement.php";

$pr = new Procurement();

$pr_no = $_POST['hidden-pr-no'];
$pr_id = $_POST['hidden-pr-id'];
$remarks = $_POST['remarks'];

$pr->update(
    'pr',
    [
        'remarks' => $remarks,
        'stat'    => Procurement::STATUS_RETURN_PR,
        'action_officer' => $_SESSION['currentuser'],
        'action_date' => date('Y-m-d H:i:s'),

    ],
    "pr_no='$pr_no'"
);

$pr->insert('tbl_pr_history',
[
    'PR_NO'=>$pr_no,
    'PR_ID'=>$pr_id,
    'ACTION_DATE'=>date('Y-m-d H:i:s'),
    'ACTION_TAKEN' => Procurement::STATUS_RETURN_PR, 
    'ASSIGN_EMP'=>$_SESSION['currentuser']
]);

?>
<script>
    window.location = '../../procurement_request_for_quotation.php';
</script>