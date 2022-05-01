<?php
session_start();
date_default_timezone_set('Asia/Manila');

require_once "../../Model/Connection.php";
require_once "../../Model/Procurement.php";

$pr = new Procurement();

$id = $_POST['id'];


$pr->delete('supplier_quote',"id='$id'");