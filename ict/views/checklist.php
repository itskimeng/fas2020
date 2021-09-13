<?php

function category($pointer) 
{ 
  $menu = [
  	'DESKTOP/LAPTOP REPAIR' => false,
    'INTERNET CONNECTIVITY' => false,
    'APPLICATION/SOFTWARE/SYSTEM ASSISTANCE' => false,
    'HARDWARE INSTALLATION' => false,
    'GOVMAIL ASSISTANCE' =>false,
    'POSTING/UPDATING OF INFORMATION IN THE DILG WEBSITE' => false,
    'PRINTER/SCANNER/COPIER' => false,
    'IP TELEPHONY' => false,
    'OTHERS (please specify)' => false
  ];  

  if (array_key_exists($pointer, $menu)) {
  	$menu[$pointer] = true;
  }
  return $menu;
}
function sub_category($pointer)
{
  $code = [
    '1' => false,
    '2' => false,
    '3' => false,
    '4' => false,
    '5' => false,
    '6' => false,
    '7' => false,
    '8' => false,
    '9' => false,
    '10' => false,
    '11' => false,
    '12' => false,
    '13' => false,
    '14' => false,
    '15' => false,
    '16' => false,
    '17' => false,
    '18' => false,
    '19' => false,
    '20' => false,
    '21' => false,
    '22' => false,
    '23' => false,
    '24' => false,
    '25' => false,
    '25' => false,
    '25' => false,
    '26'=> false,
    '27'=> false,
    '28'=> false,
    '29'=> false,
    '30'=> false,
    '31'=> false,
    '32'=> false,
    '33'=> false,
    '34'=> false,
    '35'=> false,
    '36'=> false,
  ];
  if (array_key_exists($pointer, $code)) {
  	$code[$pointer] = true;
  }
  return $code;

}



