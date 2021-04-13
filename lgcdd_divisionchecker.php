<?php

  $division = [8, 9, 17, 18];
  $is_allow = false;

  if (in_array($_SESSION['division'], $division)) {
    $is_allow = true;   
  } else if ($_SESSION['currentuser'] == 2818) {
  	$is_allow = true;  
  }
  
  return $is_allow;
