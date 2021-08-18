<?php
require '../../conn.php';
require '../../manager/ORSManager.php';
$ors = new ORSManager();

if (isset($_POST['ors_id'])) {
    $ors_data = $ors->getSelectedORS($_POST['ors_id']);
    echo $ors_data;
} else if (isset($_POST['ors'])) {
    $po_data = $ors->getSelectedPO($_POST['ors']);
    echo $po_data;
}
