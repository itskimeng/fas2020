
<?php
session_start();
date_default_timezone_set('Asia/Manila');
require_once "../../Model/Connection.php";
require '../../Model/Procurement.php';
$pr = new Procurement();
$today = new DateTime();

$po_no    =   $_POST['cform-po-no'];
$rfq_no   =   $_POST['cform-rfq-no'];
$rfq_id   =   $_POST['cform-rfq-id'];
$pr_id   =   $_POST['cform-pr-id'];
$supplier =   $_POST['supplier'];
$amount   =   $_POST['cform-amount'];
$po_date  =   date('Y-m-d', strtotime($_POST['cform-po-date']));
$ntp_date =   date('Y-m-d', strtotime($_POST['cform-ntp-date']));
$noa_date =   date('Y-m-d', strtotime($_POST['cform-noa-date']));
$is_multiple = $_SESSION['is_multiple']['is_multiple'];
$rfq_ids = $_SESSION['rfq_id'];

function group_array($array)
{
    $val = array_unique($array);
    return $val;
}

if ($is_multiple == 1) {
    $pr->select(
        "rfq r",
        "
        r.id,
        r.rfq_no",
        " r.rfq_no = '$rfq_no' "
    );
    $result = $pr->sql;
    while ($row = mysqli_fetch_assoc($result)) {
        $pr->insert(
            'po',
            [
                'id' => null,
                'po_no' => $po_no,
                'rfq_no' => $rfq_no,
                'rfq_id' => $row['id'],
                'pr_id' => $pr_id,
                'po_date' => $po_date,
                'noa_date' => $noa_date,
                'ntp_date' => $ntp_date,
                'po_amount' => $amount,
            ]
        );
    }
} else {
    $pr->insert(
        'po',
        [
            'id' => null,
            'po_no' => $po_no,
            'rfq_no' => $rfq_no,
            'rfq_id' => $rfq_id,
            'pr_id' => $pr_id,
            'po_date' => $po_date,
            'noa_date' => $noa_date,
            'ntp_date' => $ntp_date,
            'po_amount' => $amount,
        ]
    );
}


$pr->update(
    'rfq',
    [
        'stat' => Procurement::STATUS_SIGNED_PO
    ],
    "rfq_no='$rfq_no'"
);
header('Location: ../../procurement_request_for_quotation.php');
exit();