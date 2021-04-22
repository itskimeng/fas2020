<?php

function menuChecker($pointer) 
{
  $menu = [
  	'dashboard' => false,
  	'calendar' => false,
  	'activity_planner' => false,
  	'template_generator' => false,
    'vehicle_request' => false,
    'dtr' => false,
    'employees_directory' => false,
    'official_business' => false,
    'travel_order' => false,
    'ro_and_roo' => false,
    'health_declaration_form' => false,
    'issuances' => false,
    'databank' => false,
    'phone_directory' => false,
    'procurement' => false,
    'ors_burs' => false,
    'dv' => false,
    'travel_claim' => false
  ];

  if (array_key_exists($pointer, $menu)) {
  	$menu[$pointer] = true;
  }


  return $menu;
}

