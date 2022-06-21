<?php
session_start();
date_default_timezone_set('Asia/Manila');
require_once "../../Model/Connection.php";
require '../../Model/Procurement.php';
$pr = new Procurement();
$today = new DateTime();

$rfq_id         =   $_POST['rfq_id'];

$division       =   $_POST['division'];
$remarks       =   $_POST['remarks'];
$pr_id          =   $_POST['pr_id'];
$pr_no          =   $_POST['pr_no'];
$po_no          =   $_POST['po_no'];
$req_by          =   $_POST['req_by'];
$approved_by          =   $_POST['approved_by'];
$issued_by          =   $_POST['issued_by'];
$received_by          =   $_POST['received_by'];
$purpose          =   $_POST['purpose'];
$date_added = date('Y-m-d');

        $pr->insert(
            'ris',
            [
                'id' => null,
                'app_id' => null,
                'rfq_id' => $rfq_id,
                'iar_id' => null,
                'division' => $division,
                'pr_id' => $pr_id,
                'pr_no' => $pr_no,
                'po_no' => $po_no,
                'remarks' => $remarks,
                'request_by' => $req_by,
                'approved_by' => $approved_by,
                'issued_by' => $issued_by,
                'recieved_by' => $received_by,
                'purpose' => $purpose            ]
        );
    

header('Location: ../../dash_ris_view.php');
