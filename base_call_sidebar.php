<?php 
session_start();

if ($data['is_admin']) { 
	$path = 'test1.php'; 
} elseif ($data['OFFICE_STATION'] == 1) {
	$path = 'sidebar2.php';     
} else {
	$path = 'sidebar3.php';
}

$path = include($path);

return $path;