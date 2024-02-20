<?php
session_start();
date_default_timezone_set('Asia/Manila');
require_once "../../Model/Connection.php";
require '../../Model/AssetManagement.php';
$am = new AssetManagement();
$today = new DateTime();
$conn = mysqli_connect("localhost", "fascalab_2020", "w]zYV6X9{*BN", "fascalab_2020");

    $emp_n = $_POST['emp_n'];
    $par_id = $_POST['par_id'];

$am->update(
    'rpcppe',
    [
        // 'pmo' => $office,
        'date_acquired' => date('y-m-d')
    
    ],
    "id='$par_id'"
);

$am->insert('par_assign', 
[
    'ppe_id'=> $par_id,
    'emp_id' => $emp_n
]);


