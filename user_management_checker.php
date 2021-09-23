<?php
$conn=mysqli_connect("localhost","fascalab_2020","w]zYV6X9{*BN","fascalab_2020");


// //SELECT USER ACCCESS

$sqlGetId = 'SELECT `EMP_N` FROM `tblemployeeinfo` WHERE `UNAME` = '.$_SESSION['username'].' ';
$execGetId = $conn->query($sqlGetId);
$rowId = $execGetId->fetch_assoc();

echo $row['EMP_N'];

  // $division = [8, 9, 17, 18, 10];
  // $is_allow = false;

  // if (in_array($_SESSION['division'], $division)) {
  //   $is_allow = true;   
  // } else if ($_SESSION['currentuser'] == 2818) {
  // 	$is_allow = true;  
  // }
  
  // return $is_allow;