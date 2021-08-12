<?php
require '../../conn.php';
require '../../manager/ORSManager.php';
$view_data = new ORSManager();

$ors_data = $view_data->getSelectedORS($_POST['ors_id']);
echo $ors_data;
?>
