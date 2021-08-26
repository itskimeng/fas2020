<?php
require '../../conn.php';
require '../../manager/BURSManager.php';
$burs = new BURSManager();

if (isset($_POST['burs_id'])) {
    $burs_data = $burs->getSelectedBURS($_POST['burs_id']);
    echo $ors_data;
} else if (isset($_POST['ors'])) {
    $po_data = $burs->getSelectedPO($_POST['ors']);
    echo $po_data;
}
