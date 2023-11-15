<?php

include '../connection.php';

if (isset($_POST['submit'])) 
{
  session_start();
  $username = $_POST['username'];
  $password = $_POST['password'];
  $_SESSION['username'] = $username ;
  $username = $_SESSION['username'];
  $sqlUsername = mysqli_query($conn,"SELECT CODE,EMP_N,isPlanningOfficer FROM tblemployeeinfo WHERE md5(UNAME) = '".md5($_POST['username'])."' LIMIT 1");
  
  $row = mysqli_fetch_array($sqlUsername);
  $salt       = $row['CODE'];
  $_SESSION['currentuser'] = $row['EMP_N']; 
  $_SESSION['planningofficer'] = $row['isPlanningOfficer']; 

  $password  = crypt($_POST['password'], '$2a$10$'.$salt.'$');
  $_SESSION['pass'] = $password;

  // ===============================================
  $query = "SELECT * FROM tblemployeeinfo WHERE md5(UNAME) = '".md5($_POST['username'])."' AND PSWORD = '".$password."' AND  BLOCK = 'N' LIMIT 1 ";
    //   echo $query;
    $result = mysqli_query($conn, $query);
    $val = array();
    // $numrows= mysqli_num_rows($query);
    if ($result->num_rows > 0) 
    {
        while($row = mysqli_fetch_array($result))
            {
                $OFFICE_STATION =$row['OFFICE_STATION'];
                $_SESSION['OFFICE_STATION'] = $OFFICE_STATION;
                $division =$row['DIVISION_C'];
                $TIN_N =$row['TIN_N'];
                $_SESSION['TIN_N'] = $TIN_N;  
                $ORD =$row['ORD'];
                $_SESSION['ORD'] = $ORD;
                $DEPT_ID =$row['DEPT_ID'];
                $_SESSION['DEPT_ID'] = $DEPT_ID;
                $division2 = $row['DIVISION_C'];
                $_SESSION['division'] = $division;
                $middle = $row['MIDDLE_M'];
                $_SESSION['complete_name'] = $row['FIRST_M'].' '.$middle[0].'. '.$row['LAST_M'];
                $encrypted_name = $row['FIRST_M'].' '.$middle[0].'. '.$row['LAST_M'];
                $_SESSION['complete_name2'] = $row['FIRST_M'].' '.$row['LAST_M'];
                $_SESSION['complete_name3'] = $row['FIRST_M'].' '.$middle.' '.$row['LAST_M'];
                $_SESSION['UNAME'] = $row['UNAME'];
                $_SESSION['province'] = $row['PROVINCE_C'];
                $_SESSION['role'] = md5('admin');

                // if ($division == 14 || $division == 10 || $division == 11 || $division == 12 || $division == 13) {
                        if ($username == 'itdummy1' || $username == 'mmmonteiro' || $username == 'jamonteiro' || $username == 'masacluti' || $username == 'cvferrer' || $username == 'seolivar' || $username == 'magonzales' || $username == 'aoiglesia' || $username == 'ljbanalan') {
                            $data[] = array(
                                'location' => 'home',
                                "message" => 'success',
                                "role"   => $_SESSION['role'],
                                "division"   => $division,
                                "username"   => $username,
                                );
                                echo json_encode($data);
                }else{
            
                    if ($OFFICE_STATION == 1) {
                        $data[] = array(
                            'location' => 'home1',
                            "message" => 'success',
                            "role"   => md5('user'),
                            "division"   => $division,
                            "username"   => $username,
                            );
                            echo json_encode($data);
                    }else{
                        $data[] = array(
                            'location' => 'home2',
                            "message" => 'success',
                            "role"   => md5('user'),
                            "division"   => $division,
                            "username"   => $username,
                            );
                            echo json_encode($data);
                    }
                }  
            }
        }else{
        session_start();
        $data[] = array(
            "message" => 'has_error'
            );
            echo json_encode($data);

        $_SESSION['has_error'] = 'has_error';
        $_SESSION['has_error2'] = 'has_error2';
        // echo ("<SCRIPT LANGUAGE='JavaScript'>
        // window.alert('Wrong username or password!');
        // window.location.href='index.php';
        // </SCRIPT>");
        }   
 

}


?>