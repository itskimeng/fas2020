<?php
session_start();
date_default_timezone_set('Asia/Manila');
require_once "../../Model/Connection.php";
require '../../Model/Procurement.php';
$date = new DateTime();
$conn = mysqli_connect("localhost", "fascalab_2020", "w]zYV6X9{*BN", "fascalab_2020");
$pr = new Procurement();
$rfq_id = $_GET['rfq_id'];
$rfq_no = $_GET['rfq_no'];
$pr_no = $_GET['pr_no'];
$rfq_mode = $_GET['mode'];
$pmo_id = $_GET['pmo_id'];
$particulars = $_GET['particulars'];
$pr_id = str_split($_GET['pr_id']);
$rfq_date = date('Y-m-d',strtotime($_GET['rfq_date']));

$pr_id = $_GET['data-pr-id'];

// INSERT INTO RFQ
// INSERT PR HISTORY
// UPDATE STATUS OF PR
// UPDATE QUANTITY OF ITEM IN APP

for ($i = 0; $i < count($pr_id); $i++) {
    //RFQ
   
    // RFQ ITEMS
    $conn = mysqli_connect("localhost", "fascalab_2020", "w]zYV6X9{*BN", "fascalab_2020");
    $sql = "SELECT * FROM pr where id IN ($pr_id)";
    $query = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($query)) {
        $pr->insert(
            'rfq',
            [
                'rfq_no' => $rfq_no,
                'pr_id' => $row['id'],
                'rfq_mode_id' => $rfq_mode,
                'purpose' => $particulars,
                'rfq_date' => $rfq_date,
                'pr_no' => $row['pr_no'],
                'stat' => Procurement::STATUS_WITH_RFQ
            ]
        );
        $pr->insert(
            'tbl_pr_history',
            [
                'pr_id' => $row['id'],
                'ACTION_DATE' => date('Y-m-d H:i:s'),
                'ACTION_TAKEN' => Procurement::STATUS_WITH_RFQ,
                'ASSIGN_EMP' => $_SESSION['currentuser']
            ]
        );
        $pr->update(
            'pr',
            [
                'stat' => Procurement::STATUS_WITH_RFQ,
            ],
            "id='".$row['id']."'"
        );
    }
    
}  
header('location:../../procurement_request_for_quotation.php?');
?>
   
