<?php
session_start();
date_default_timezone_set('Asia/Manila');

require_once "../../Model/Connection.php";
require_once "../../Model/Procurement.php";

$pr = new Procurement();
$pr_no = $_POST['pr_no'];
$pr->update( 'pr', [ 'received_by' => $name,'stat' => Procurement::STATUS_RECEIVED_BY_GSS ], "pr_no='$pr_no'" );
