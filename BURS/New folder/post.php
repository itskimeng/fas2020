<?php
require '../../conn.php';
require '../../manager/BURSManager.php';
$burs = new BURSManager();

if (isset($_POST['ors_id'])) {
    $burs_data = $burs->getSelectedBURS($_POST['burs_id']);
    echo $burs_data;
} else if (isset($_POST['burs'])) {
    $po_data = $burs->getSelectedPO($_POST['burs']);
    echo $po_data;
}
