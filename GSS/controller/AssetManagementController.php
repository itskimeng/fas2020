<?php
session_start();
date_default_timezone_set('Asia/Manila');

require 'GSS/manager/AssetManagementManager.php';

$am = new AssetManagementManager();
$po_opts = $am->setPONo();

?>

