<?php

	$users = [3319, 3174, 2563, 3174, 2876, 3300];		
  $division = [8, 9, 17, 18, 10];
  $is_allow = false;

  if (in_array($_SESSION['division'], $division)) {
    $is_allow = true;   
  } else if ($_SESSION['currentuser'] == 2818) {
  	$is_allow = true;  
  } else if (in_array($_SESSION['currentuser'], $users)) {
  	$is_allow = true;  
  }
  
  return $is_allow;
