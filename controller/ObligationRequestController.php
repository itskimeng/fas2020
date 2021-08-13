<?php

require 'conn.php';
require 'manager/ORSManager.php';
$ors = new ORSManager();

$data = $ors->getORSdata();
$burs = $ors->getBURSdata();

$filter_ors = $ors->setORS();
$filter_payee = $ors->setPayee();
$filter_po = $ors->setPO();



















?>
