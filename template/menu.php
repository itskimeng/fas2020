
<?php

function checkMenu($pointer)
{
  $menu = [
  	'dashboard' => false,
  	'calendar' => false,
  	'databank' => false,
    'issuances' => false,
    'Directory' => false,
    'employees_directory' => false,
    'dtr' => false,
    'monitoring' => false,
    'ro_and_roo' => false,
    'official_business' => false,
    'travel_order' => false,
    'health_monitoring' => false,
    'procurement' => false,
    'asset' => false,
    'vehicle' => false,
  ];

  if (array_key_exists($pointer, $menu)) {
  	$menu[$pointer] = true;
    // var_dump($menu);
  }
  return $menu;
} 


?>
        
