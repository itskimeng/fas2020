<?php
require '../../conn.php';
require '../../manager/ORSManager.php';
$view_data = new ORSManager();

if (isset($_POST['ors_id'])) {
    $ors_data = $view_data->getSelectedORS($_POST['ors_id']);
echo $ors_data;

} else if (isset($_POST['ors'])) {
    $po_data = $view_data->getSelectedPO($_POST['ors']);
echo $po_data;

}
