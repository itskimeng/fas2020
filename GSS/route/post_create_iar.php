<?php
session_start();
date_default_timezone_set('Asia/Manila');
require_once "../../Model/Connection.php";
require '../../Model/Procurement.php';
$pr = new Procurement();
$today = new DateTime();

$rfq_id         =   $_POST['rfq_id'];
$rfq_no         =   $_POST['rfq_no'];
$supplier_id    =   $_POST['supplier_id'];
$pr_id          =   $_POST['pr_id'];
$pr_no          =   $_POST['pr_no'];
$po_no          =   $_POST['po_no'];
$supplier       =   $_POST['supplier'];
$po_date        =   date('Y-m-d',strtotime($_POST['po_date']));
$iar_no       =   $_POST['iar_no'];
$iar_date       =   date('Y-m-d',strtotime($_POST['iar_date']));
$invoice_no     =   $_POST['invoice_no'];
$invoice_date   =   date('Y-m-d',strtotime($_POST['invoice_date']));
$req_dept       =   $_POST['req_dept'];
$officer       =   $_POST['cform-officer'];


        $pr->insert(
            'iar',
            [
                'id' => null,
                'rfq_id' => $rfq_id,
                'rfq_no' => $rfq_no,
                'sup_id' => $supplier_id,
                'supplier' => $supplier,
                'pr_id' => $pr_id,
                'pr_no' => $pr_no,
                'po_no' => $po_no,
                'po_date' => $po_date,
                'dept' => $req_dept,    
                'iar_no' => $iar_no,
                'iar_date' => $iar_date,
                'invoice_no' => $invoice_no,
                'invoice_date' => $invoice_date,
                'officer' => $officer,
                'tim3' => date('Y-m-d')
            ]
        );
    

header('Location: ../../dash_iar_view.php');
