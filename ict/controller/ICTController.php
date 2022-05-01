<?php
session_start();
date_default_timezone_set('Asia/Manila');

require 'ict/manager/ICTManager.php';
$ta = new ICTManager();

$fetch_ict_opts = $ta->fetch();
