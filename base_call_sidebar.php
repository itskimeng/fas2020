<?php 

if ($data['is_admin']) { 
	$path = 'test1.php'; 
} elseif ($data['OFFICE_STATION'] == 1 || $data['OFFICE_STATION'] == "1") {
	$path = 'sidebar3.php';     
} else {
	$path = 'sidebar3.php';
}

$path = include($path);

return $path;