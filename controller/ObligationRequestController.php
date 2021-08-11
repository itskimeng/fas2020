<?php

require 'conn.php';
require 'manager/ORSManager.php';
$ors = new ORSManager();

$data = $ors->getORSdata();
$burs = $ors->getBURSdata();

// $ors_data = $ors->getSelectedORS(4146);












?>
