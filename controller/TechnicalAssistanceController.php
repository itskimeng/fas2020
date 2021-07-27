<?php

require 'conn.php';
require 'manager/TechnicalAssistanceManager.php';
$control_no = isset($_GET['id']) ? $_GET['id'] : '';
$ta = new TechnicalAssistanceManager();

$data = $ta->fetchdata();
$type = $ta->getReqType();

$view_req = $ta->viewRequest($control_no);
$sub_request = $ta->getSubRequest();










?>
