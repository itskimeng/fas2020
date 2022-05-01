<?php
session_start();
date_default_timezone_set('Asia/Manila');

require_once 'Model/Connection.php';
require_once 'Model/UploadDTR.php';
require_once 'HumanResource/manager/HRManager.php';

$hrm = new HRManager;

// $data = $hrm->fetch();
$data = $hrm->fetchDTRUploadHistory();

$office_opts = [
	'FAD' 		=> 'FAD',
	'LGCDD' 	=> 'LGCDD',
	'LGMED' 	=> 'LGMED',
	'ORD' 		=> 'ORD'
];


