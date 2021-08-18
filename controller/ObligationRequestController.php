<?php

require 'conn.php';
require 'manager/ORSManager.php';
require 'ORS/views/paginator.class.php';

$pages = new Paginator;
$pages->default_ipp = 15;
$sql_forms = $conn->query("SELECT * FROM `saroob` ORDER BY `saroob`.`id` DESC");
$pages->items_total = $sql_forms->num_rows;
$pages->mid_range = 9;
$pages->paginate();


$ors = new ORSManager();

$data = $ors->getORSdata($pages->limit);
$burs = $ors->getBURSdata();

$filter_ors = $ors->setORS();
$filter_payee = $ors->setPayee();
$filter_po = $ors->setPO();























?>
