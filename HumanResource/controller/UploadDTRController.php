<?php
session_start();
date_default_timezone_set('Asia/Manila');

require_once 'Model/Connection.php';
require_once 'Model/UploadDTR.php';
require_once 'HumanResource/manager/HRManager.php';

$hrm = new HRManager;

$admins = ['mmmonteiro', 'jbaco', 'hpsolis', 'jecastillo'];
$hr_admins = $hrm->moduleAccess(1);
$po_admins = $hrm->moduleAccess(2);
$sys_admins = array_merge($po_admins, $hr_admins, $admins);
$data = $hrm->fetchDTRUploadHistory();


