<?php
session_start();
date_default_timezone_set('Asia/Manila');

require_once 'Model/Connection.php';
require_once 'Model/UploadDTR.php';
require_once 'HumanResource/manager/HRManager.php';

$hrm = new HRManager;

$admins = ['mmmonteiro', 'masacluti', 'seolivar', 'jbaco'];
$hr_admins = $hrm->moduleAccess(1);
$po_admins = $hrm->moduleAccess(2);

$sys_admins = $admins + $hr_admins + $po_admins;

$data = $hrm->fetchDTRUploadHistory();


