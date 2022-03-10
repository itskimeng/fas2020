<?php
session_start();
date_default_timezone_set('Asia/Manila');

require_once "../../Model/Connection.php";
require_once "../../Model/Procurement.php";

$pr = new Procurement();

            $sn = $_GET['stockNo'];
            $mode =  $_GET['mode'];

            $fad = ['10', '11', '12', '13', '14', '15', '16'];
            $ord = ['1', '2', '3', '5'];
            $lgmed = ['7', '18','7',];
            $lgcdd = ['8', '9', '17','9'];
            $cavite = ['20', '34', '35', '36', '45'];
            $laguna = ['21', '40', '41', '42', '47', '51', '52'];
            $batangas = ['19', '28', '29', '30', '44'];
            $rizal = ['23', '37', '38', '39', '46', '50'];
            $quezon = ['22', '31', '32', '33', '48', '49', '53'];
            $lucena_city = ['24'];
            $office = null;
            if (in_array($_GET['office'],$fad)) {
                $office = '10';
            } else if (in_array($_GET['office'],$ord)) {
                $office = '1';
            } else if (in_array($_GET['office'],$lgmed)) {
                $office = '18';
            } else if (in_array($_GET['office'],$lgcdd)) {
                $office = '17';
            } else if (in_array($_GET['office'],$cavite)) {
                $office = '20';
            } else if (in_array($_GET['office'],$laguna)) {
                $office = '21';
            } else if (in_array($_GET['office'],$batangas)) {
                $office = '19';
            } else if (in_array($_GET['office'],$rizal)) {
                $office = '23';
            } else if (in_array($_GET['office'],$quezon)) {
                $office = '22';
            } else if (in_array($_GET['office'],$lucena_city)) {
                $office = 24;
            }
$pr->update(
    'app',
    [
        'code' => $_GET['code'],
        'procurement' => $_GET['itemTitle'],
        'unit_id' => $_GET['unit'],
        'category_id' => $_GET['category'],
        'pmo_id' => $office,
        'qty' => $_GET['qty'],
        'price' => $_GET['app_price'],
        'app_price' => $_GET['app_price'],
        'mode_of_proc_id' => $mode,
    ],
    "sn='$sn'"
);
