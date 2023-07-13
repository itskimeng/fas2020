<?php
include "config.php";
include "dbaseCon.php";
$DBConn = dbConnect();
$conn = mysqli_connect("localhost", "fascalab_2020", "w]zYV6X9{*BN", "fascalab_2020");
$connect = new PDO("mysql:host=localhost;dbname=fascalab_2020", "fascalab_2020", "w]zYV6X9{*BN");
$get_id = $_GET['id'];
$division777 = $_GET['division'];
$username777 = $_GET['username'];
function tblpersonnel($connect)
{
  $output = '';
  $query = "SELECT DIVISION_N,DIVISION_M FROM `tblpersonneldivision` WHERE DIVISION_N = 1 || DIVISION_N = 10 || DIVISION_N = 18 || DIVISION_N = 17 || DIVISION_N = 9 || DIVISION_N = 7 || DIVISION_N = 19 || DIVISION_N = 20 || DIVISION_N = 21 || DIVISION_N = 22 || DIVISION_N = 23 || DIVISION_N = 24 AND DIVISION_M IS NOT NULL ORDER BY DIVISION_M ASC  ";
  $statement = $connect->prepare($query);
  $statement->execute();
  $result = $statement->fetchAll();
  foreach ($result as $row) {
    $output .= '<option text="text" value="' . $row["DIVISION_N"] . '">' . $row["DIVISION_M"] . '</option>';
  }
  return $output;
}

function tbldilgposition($connect)
{
  $output = '';
  $query = "SELECT POSITION_ID,POSITION_M FROM `tbldilgposition` ORDER BY POSITION_M ASC ";
  $statement = $connect->prepare($query);
  $statement->execute();
  $result = $statement->fetchAll();
  foreach ($result as $row) {
    $output .= '<option text="text" value="' . $row["POSITION_ID"] . '">' . $row["POSITION_M"] . '</option>';
  }
  return $output;
}

function tbldesignation($connect)
{
  $output = '';
  $query = "SELECT DESIGNATION_ID,DESIGNATION_M FROM `tbldesignation` ORDER BY DESIGNATION_M ASC ";
  $statement = $connect->prepare($query);
  $statement->execute();
  $result = $statement->fetchAll();
  foreach ($result as $row) {
    $output .= '<option text="text" value="' . $row["DESIGNATION_ID"] . '">' . $row["DESIGNATION_M"] . '</option>';
  }
  return $output;
}

function fill_unit_select_box($connect)
{
  $output = '';
  $query = "SELECT salary_grade FROM tbl_salary_grade GROUP BY salary_grade ASC ";
  $statement = $connect->prepare($query);
  $statement->execute();
  $result = $statement->fetchAll();
  foreach ($result as $row) {
    $output .= '<option text="text" value="' . $row["salary_grade"] . '">' . $row["salary_grade"] . '</option>';
  }
  return $output;
}

$sqltable   = "tblemployeeinfo";

$checkQuery = "SELECT * FROM $sqltable a LEFT JOIN tblpersonneldivision b on b.DIVISION_N = a.DIVISION_C LEFT JOIN tbldesignation c on c.DESIGNATION_ID = a.DESIGNATION LEFT JOIN tbldilgposition d on d.POSITION_ID = a.POSITION_C WHERE a.EMP_N = '" . $_GET['id'] . "' LIMIT 1";

$checkQuery1 = mysqli_query($conn, "SELECT c.province_id,c.province_title FROM $sqltable a LEFT JOIN tblprovinse c on c.province_id = a.PROVINCE_C WHERE a.EMP_N = '" . $_GET['id'] . "' LIMIT 1");

$row1 = mysqli_fetch_array($checkQuery1);
$province11               = $row1["province_title"];

if (ifRecordExist($checkQuery)) {
  $queryRs = $DBConn->query($checkQuery);
  if ($queryRs->num_rows) {
    $row  = $queryRs->fetch_assoc();
    $EMP_NUMBER1             = $row["EMP_NUMBER"];
    $region1                 = $row["REGION_C"];
    $province1               = $row["PROVINCE_C"];
    $municipality1           = $row["CITYMUN_C"];
    $lname1                  = utf8_encode($row["LAST_M"]);
    $fname1                  = utf8_encode($row["FIRST_M"]);
    $mname1                  = utf8_encode($row["MIDDLE_M"]);
    $gender1                 = $row["SEX_C"];
    $designation1            = $row["DESIGNATION_M"];
    $designation11           = $row["DESIGNATION"];
    $position1               = $row["POSITION_M"];
    $position11              = $row["POSITION_C"];
    $birthdate1              = $row["BIRTH_D"];
    $bday1                   = date('m/d/Y', strtotime($birthdate1));
    $email1                  = $row["EMAIL"];
    $cellphone1              = $row["MOBILEPHONE"];
    $username1               = $row["UNAME"];
    $division1               = $row["DIVISION_C"];
    $division11              = $row["DIVISION_M"];
    $office1                 = $row["OFFICE_STATION"];
    $profile                 = $row['PROFILE'];
    $ACTIVATED               = $row['ACTIVATED'];
    $alter_email             = $row["ALTER_EMAIL"];
    $suffix                  = $row["SUFFIX"];
    $status                  = $row["CIVIL_STATUS"];
    $office_address          = $row['REMARKS_M'];
    $office_landline         = $row["STATUS_OF_APP"]; // eto 
    $office_contact          = $row['LANDPHONE'];
    $permanent_address       = $row['PERMANENT_ADDRESS'];
    $current_address         = $row['CURRENT_ADDRESS'];
    $philhealth_no         = $row['PHILH_N'];

    $generation = $row['GENERATION'];
    $awards = $row['AWARDS'];
    $hea = $row['HEA'];
    $q1 = $row['Q1'];
    $q2 = $row['Q2'];
    $q3 = $row['Q3'];
    $q4 = $row['Q4'];
    $q5 = $row['Q5'];
    $q6 = $row['Q6'];
    $q7 = $row['Q7'];//gyno
    $q8 = $row['Q8'];//health
    $ind_id = $row['IND_ID'];
    $pwd_id = $row['PWD_ID'];
    $s_id = $row['SOLO_PARENT_ID'];
    $health_issues = $row['HEALTH_ISSUES'];
    $years_in_service = $row['YEARS_IN_SERVICE'];
    $gdisorder_text = $row['GYNECOLOGICAL'];
$stepp = $row['STEP'];

  }
}



$checkQuery1 = mysqli_query($conn, "SELECT b.city_id,b.city_title FROM $sqltable a LEFT JOIN tblmunicipality b on b.city_id = a.CITYMUN_C WHERE b.province = $province1 AND a.EMP_N = '" . $_GET['id'] . "' LIMIT 1");
$row1 = mysqli_fetch_array($checkQuery1);
$city_id           = $row1["city_id"];
$municipality11           = $row1["city_title"];
$cid = $_GET['id'];

$get_details = mysqli_query($conn, "SELECT * FROM tblemployeeinfo WHERE EMP_N = " . $_GET['id'] . " ");
$rowEmp = mysqli_fetch_array($get_details);
$pagibig = $rowEmp['PAGIBIG_N'];
$pagibig_premium = $rowEmp['pagibig_premium'];
$tin = $rowEmp['TIN_N'];
$philhealth = $rowEmp['PHIL_N'];
$gsis = $rowEmp['GSIS_N'];
$salary = $rowEmp['SALARY_GRADE'];
$bir = $rowEmp['TIN_N'];
$employment_date1 = $rowEmp['DATE_HIRED'];
$employment_date = date('m/d/Y', strtotime($employment_date1));

if (isset($_POST['submit'])) {
  $region          = '04';
  $province        = $_POST["province"];
  $municipality    = $_POST["municipality"];
  $employeeid      = "";
  $fname           = strtoupper($_POST["fname"]);
  $mname           = strtoupper($_POST["mname"]);
  $lname           = strtoupper($_POST["lname"]);
  $gender          = $_POST["gender"];
  $designation     = $_POST["designation"];
  $position        = $_POST["position"];
  $division        = $_POST["division"];
  $office          = $_POST["office"];
  $birthdate1      = $_POST["birthdate"];
  $birthdate       = date('Y-m-j H:i:s', strtotime($birthdate1));
  $email           = $_POST["email"];
  $alter_email     = $_POST["alter_email"];
  $contact         = $_POST["contact"];
  $username        = $_POST["username"];
  $password        = $_POST["password"];
  $repassword      = $_POST["repassword"];
  $cluster         = "";
  $access          = "";
  $publish         = "";
  $usetype         = "";
  $activated       = "Yes";
  $cellphone       = $_POST["cellphone"];
  $office_address  = $_POST["office_address"];  //eto
  $office_landline  = $_POST["office_landline"]; // eto 
  $office_contact  = $_POST["office_contact"]; // eto 
  $suffix          = $_POST["suffix"]; //eto      
  $status          = $_POST["status"];  // eto
  $target_dir      = "images/profile/";
  $target_file     = $target_dir . basename($_FILES["image"]["name"]);
  $uploadOk        = 1;
  $imageFileType   = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
  $pagibig         = $_POST["pagibig"];
  $pagibig_premium = $_POST["pagibig_premium"];
  $tin             = $_POST["tin"];
  $bir             = $_POST["bir"];
  $philhealth      = $_POST["philhealth"];
  $gsis            = $_POST["gsis"];
  $salary1          = $_POST["salary"];
  $step1            = $_POST["step"];
  $e_stats         = $_POST["e_stats"];
  $employee_number = $_POST["employee_number"];
  $employment_date11 = $_POST["employment_date"];
  $permanent_address = $_POST["permanent_address"];
  $current_address = $_POST["current_address"];
  $employment_date = date('Y-m-d', strtotime($employment_date11));

  $generation        = $_POST['generation'];
  $awards            = $_POST['awards'];
  $education_attainment = $_POST['education_attainment'];
  $children_below_6     = $_POST['children_below_6'];
  $indigenous_group     = $_POST['indigenous_group'];
  $indigenous_id     = $_POST['indigenous_id'];
  $p_id     = $_POST['pwd_id'];
  $pwd                  = $_POST['pwd'];
  $solo_parent          = $_POST['solo_parent'];
  $solo_parent_id          = $_POST['solo_parent_id'];
  $health_issues         = $_POST['health_issues'];
  $gdisorder             = $_POST['gdisorder_text'];
  $health_concern         = $_POST['health_concern'];
  $with_gynecological = $_POST['gdisorder'];
  $years_inservice      = $_POST['years_inservice'];
  $below_18             = $_POST['below_18'];
  $special_needs             = $_POST['special_needs'];




  $sqlEMP_N =  "SELECT EMP_NUMBER FROM tblemployeeinfo WHERE EMP_NUMBER = '" . $employee_number . "' LIMIT 1";
  // if (!ifRecordExist($sqlEMP_N)){
  $cont = true;

  if ($repassword != $password) {
    echo ("<SCRIPT LANGUAGE='JavaScript'>
      window.alert('Password do not match!')
      window.location.href = 'UpdateEmployee.php?id=$cid&division=$division777&username=$username777&3d=" . $_GET['3d'] . " ';
      </SCRIPT>");
  } else {
    if ($cont == true) {
      if (!empty(basename($_FILES["image"]["name"]))) {
        if (!empty($_FILES["image"]["name"])) {
          $update_image = mysqli_query($conn, "UPDATE tblemployeeinfo SET PROFILE = '$target_file' WHERE EMP_N = '" . $_GET['id'] . "' ");
          // Check if file already exists
          if (file_exists($target_file)) {
            // echo "Sorry, file already exists.";
            $uploadOk = 0;
          }
          // Check file size
          if ($_FILES["image"]["size"] > 9000000) {
            // echo "Sorry, your file is too large.";
            $uploadOk = 0;
          }
          // Allow certain file formats
          if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            // echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
          }
          // Check if $uploadOk is set to 0 by an error
          if ($uploadOk == 0) {
            // if everything is ok, try to upload file
          } else {
            if (!empty($_FILES["image"]["tmp_name"])) {
              if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                echo "The file " . basename($_FILES["image"]["name"]) . " has been uploaded.";
              } else {
                echo "Sorry, there was an error uploading your file.";
              }
            }
          }
        }
      }
      $currentuser = $_SESSION['username'];
      $query = mysqli_query($conn, "UPDATE $sqltable SET LAST_M='$lname', FIRST_M='$fname', MIDDLE_M='$mname', BIRTH_D='$birthdate', SEX_C='$gender',
      REGION_C='$region', PROVINCE_C='$province', CITYMUN_C='$municipality',
      POSITION_C='$position',PERMANENT_ADDRESS = '$permanent_address', CURRENT_ADDRESS = '$current_address',STATUS_OF_APP = '$office_landline',
      MOBILEPHONE='$cellphone', EMAIL='$email',
      ALTER_EMAIL='$alter_email', 
      `GENERATION`='$generation',
      `AWARDS`='$awards',
      `HEA`='$education_attainment',
      `Q1`='$children_below_6',
      `Q2`='$indigenous_group',
      `Q3`='$pwd',
      `Q4`='$solo_parent',
      `Q5`='$below_18',
      `Q6`='$special_needs',
      `Q7`='$with_gynecological',
      `Q8`='$health_concern',
      `TIN_N`='$tin',
      `PHILH_N` = '$philhealth',
      `PAGIBIG_N` = '$pagibig',
      `IND_ID`='$indigenous_id',
      `PWD_ID`='$p_id',
      `SOLO_PARENT_ID`='$solo_parent_id',
      `HEALTH_ISSUES`= '$health_issues',
      `GYNECOLOGICAL` = '$gdisorder',
      `YEARS_IN_SERVICE`='$years_inservice', 
      `SALARY_GRADE` = '$salary1',
      `STEP` = '$step1',
      DATE_HIRED ='$employment_date', 
      LANDPHONE='$contact', 
      OFFICE_STATION='$office', 
      DIVISION_C='$division',
       ACTIVATED='" . $e_stats . "', 
       UNAME='$username',
       DESIGNATION='$designation',
       SUFFIX='$suffix',
       LANDPHONE='$office_contact',REMARKS_M='$office_address', UPDATED_BY='$currentuser' WHERE EMP_N = '$cid' LIMIT 1");
     
       

      # code...
      $select = mysqli_query($conn, "SELECT $step1 FROM tbl_salary_grade WHERE salary_grade = '$salary' ");
      $row = mysqli_fetch_array($select);
      $salaryS = $row[$step];

      $save_salary = $salaryS * .09;

      if ($salaryS > 59999) {

        $phil = 900;
        $insert_deduct = mysqli_query($conn, "
        UPDATE tbl_deductions SET  monthly_salary ='$salaryS',rlip = '$save_salary',philhealth = '$phil' WHERE emp_no = '$EMP_NUMBER1'  ");
      } else {
        $phil = $salaryS * 0.03 / 2;
        $insert_deduct = mysqli_query($conn, "
        UPDATE tbl_deductions SET  monthly_salary ='$salaryS',rlip = '$save_salary',philhealth = '$phil' WHERE emp_no = '$EMP_NUMBER1'  ");
      }


      if ($employee_number != $EMP_NUMBER1) {
        $queryEMP = mysqli_query($conn, "UPDATE $sqltable SET EMP_NUMBER='$employee_number' WHERE EMP_N = '$cid' LIMIT 1");

        $update_emp2 = mysqli_query($conn, "UPDATE tbl_employee SET emp_no = '$employee_number' WHERE emp_no = '$EMP_NUMBER1'");
        $update_tbl_deductions = mysqli_query($conn, "UPDATE tbl_deductions SET emp_no = '$employee_number' WHERE emp_no = '$EMP_NUMBER1' ");
        $update_tbl_deduction_loans = mysqli_query($conn, "UPDATE tbl_deduction_loans SET emp_no = '$employee_number' WHERE emp_no = '$EMP_NUMBER1' ");

        $updateBir = mysqli_query($conn, "UPDATE bir SET emp_no = '$employee_number' WHERE emp_no = '$EMP_NUMBER1' ");

        $updateMp2 = mysqli_query($conn, "UPDATE mp2 SET emp_no = '$employee_number' WHERE emp_no = '$EMP_NUMBER1' ");

        $updatePrem = mysqli_query($conn, "UPDATE pagibig_premium SET emp_no = '$employee_number' WHERE emp_no = '$EMP_NUMBER1' ");

        $updateHistory = mysqli_query($conn, "UPDATE tbl_deduction_loans_history SET emp_no = '$employee_number' WHERE emp_no = '$EMP_NUMBER1' ");

        $updateLoan = mysqli_query($conn, "UPDATE tbl_loan SET emp_no = '$employee_number' WHERE emp_no = '$EMP_NUMBER1' ");

        $updateLoanHistory = mysqli_query($conn, "UPDATE tbl_loan_history SET emp_no = '$employee_number' WHERE emp_no = '$EMP_NUMBER1' ");
      }
      if ($e_stats == 'Yes') {

        $selectPayrollEmp = mysqli_query($conn, "SELECT emp_no FROM tbl_employee WHERE emp_no = '$employee_number'");
        if (mysqli_num_rows($selectPayrollEmp) > 0) {
          $selectProvince = mysqli_query($conn, "SELECT LGU_M FROM tbl_province WHERE PROVINCE_C = '$province");
          $rowP = mysqli_fetch_array($selectProvince);
          $station = $rowP['LGU_M'];

          $update_emp = mysqli_query($conn, "UPDATE tbl_employee SET pagibig = '$pagibig',pagibig_premium = '$pagibig_premium',tin = '$tin',station = '$station',bir = '$bir',philhealth = '$philhealth',gsis = '$gsis',salary = '$salary1',step = '$step1',l_name = '$lname',f_name = '$fname',m_name = '$mname',employment_date = '$employment_date' WHERE emp_no = '$employee_number'");
        } else {

          if ($province == '') {
            $province = 77;
          }
          $selectProvince = mysqli_query($conn, "SELECT LGU_M FROM tbl_province WHERE PROVINCE_C = '$province");
          $rowP = mysqli_fetch_array($selectProvince);
          $station = $rowP['LGU_M'];

          $insertqwe = mysqli_query($conn, "INSERT INTO tbl_employee(emp_no,l_name,f_name,m_name,pagibig,pagibig_premium,tin,bir,philhealth,gsis,salary,step,employment_date,station) VALUES('$employee_number','$pagibig','$lname','$fname','$mname','$pagibig_premium','$tin','$bir','$philhealth','$gsis','$salary','$step','$employment_date','$station')");

          $save_salary = $salaryS * .09;
          if ($salaryS > 59999) {
            $phil = 900;
            $insert_deduct = mysqli_query($conn, "INSERT INTO tbl_deductions(emp_no,monthly_salary,rlip,pera,philhealth) VALUES('$employee_number','$salaryS','$save_salary',2000,'$phil')");
          } else {
            $phil = $salaryS * 0.03 / 2;
            $insert_deduct = mysqli_query($conn, "INSERT INTO tbl_deductions(emp_no,monthly_salary,rlip,pera,philhealth) VALUES('$employee_number','$salaryS','$save_salary',2000,'$phil')");
          }
        }
      } else {
        $update_emp2 = mysqli_query($conn, "DELETE FROM tbl_employee  WHERE emp_no = '$EMP_NUMBER1'");
        $update_tbl_deductions = mysqli_query($conn, "DELETE FROM tbl_deductions  WHERE emp_no = '$EMP_NUMBER1' ");
        $update_tbl_deduction_loans = mysqli_query($conn, "UPDATE FROM tbl_deduction_loans  WHERE emp_no = '$EMP_NUMBER1' ");

        $updateBir = mysqli_query($conn, "DELETE FROM bir  WHERE emp_no = '$EMP_NUMBER1' ");

        $updateMp2 = mysqli_query($conn, "DELETE FROM mp2  WHERE emp_no = '$EMP_NUMBER1' ");

        $updatePrem = mysqli_query($conn, "DELETE FROM pagibig_premium  WHERE emp_no = '$EMP_NUMBER1' ");

        $updateHistory = mysqli_query($conn, "DELETE FROM tbl_deduction_loans_history  WHERE emp_no = '$EMP_NUMBER1' ");

        $updateLoan = mysqli_query($conn, "DELETE FROM tbl_loan  WHERE emp_no = '$EMP_NUMBER1' ");

        $updateLoanHistory = mysqli_query($conn, "DELETE FROM tbl_loan_history  WHERE emp_no = '$EMP_NUMBER1' ");
      }

      if ($query) {
        $update_stat = mysqli_query($conn, "UPDATE tblemployeeinfo SET CIVIL_STATUS = '$status' WHERE EMP_N = $cid");

        $user_id = $_GET['id'];
        if ($password != '') {
          $code     = substr(str_replace('+', '.', base64_encode(pack('N4', mt_rand(), mt_rand(), mt_rand(), mt_rand()))), 0, 22);
          $password   = crypt($password, '$2a$10$' . $code . '$');
          $update_ac = mysqli_query($conn, "UPDATE tblemployeeinfo SET PSWORD='$password', CODE='$code' WHERE EMP_N = $user_id ");
        } else {
        }
        if ($_GET['3d'] == 3) {
          echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('Successfuly Updated!')
        window.location.href = 'UpdateEmployee.php?id=$cid&division=$division777&username=$username777&3d=" . $_GET['3d'] . " ';
        </SCRIPT>");
        } else {
          echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('Successfuly Updated!')
        window.location.href = 'UpdateEmployee.php?id=$cid&division=$division777&username=$username777';
        </SCRIPT>");
        }
      } //end else if password match




    } else {
      //echo mysqli_connect_error();
    }
  }
}

?>


<script src="jquery-1.12.0.min.js" type="text/javascript"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.1.62/jquery.inputmask.bundle.js"></script>


<div class="box box-success">
  <div class="box-header with-border">
    <?php
    $extension = pathinfo($profile, PATHINFO_EXTENSION);
    ?>
    <form method="POST" enctype="multipart/form-data">
      <div class="widget-user-header bg-aqua-active card-custom-img" style="background-image: url(http://res.cloudinary.com/d3/image/upload/c_scale,q_auto:good,w_1110/trianglify-v1-cs85g_cc5d2i.jpg);background-size:cover;background-repeat:no-repeat;">

        <div class="box-header with-border">
          <div class="pull-left">
            <div class="center">
              <div class="circle">
                <!-- User Profile Image -->
                <div>
                  <img class="profile-pic" src="
                  <?php
                  if (file_exists($profile)) {
                    switch ($extension) {
                      case 'jpg':
                        if ($profile == '') {
                          echo 'images/male-user.png';
                        } else if ($profile == $profile) {
                          echo $profile;
                        } else {
                          echo 'images/male-user.png';
                        }
                        break;
                      case 'JPG':
                        if ($profile == '') {
                          echo 'images/male-user.png';
                        } else if ($profile == $profile) {
                          echo $profile;
                        } else {
                          echo 'images/male-user.png';
                        }
                        break;
                      case 'jpeg':
                        if ($profile == '') {
                          echo 'images/male-user.png';
                        } else if ($profile == $profile) {
                          echo $profile;
                        } else {
                          echo 'images/male-user.png';
                        }
                        break;
                      case 'png':
                        if ($profile == '') {
                          echo 'images/male-user.png';
                        } else if ($profile == $profile) {
                          echo $profile;
                        } else {
                          echo 'images/male-user.png';
                        }
                        break;
                      default:
                        echo 'images/male-user.png';
                        break;
                    }
                  } else {
                    echo 'images/male-user.png';
                  }

                  ?>" id="img" style="height: 100% !important; width: 100% !important; object-fit: cover;">

                </div>

                <!-- Default Image -->
                <!-- <i class="fa fa-user fa-5x"></i> -->
              </div>

              <style>
                .circle {
                  border-radius: 1000px !important;
                  overflow: hidden;
                  width: 180px;
                  height: 180px;
                  border: 8px solid rgba(199 199 199 / 70%);
                  /* position: absolute; */
                  top: 72px;
                }

                .p-image {
                  position: absolute;
                  top: 226px;
                  right: 137px;
                  color: #666666;
                  transition: all .3s cubic-bezier(.175, .885, .32, 1.275);
                }

                .widget-user .widget-user-header {
                  padding: 20px;
                  height: 120px;
                  border-top-right-radius: 3px;
                  border-top-left-radius: 3px;
                }

                .widget-user .widget-user-header {
                  padding: 20px;
                  height: 120px;
                  border-top-right-radius: 3px;
                  border-top-left-radius: 3px;
                }
              </style>
            </div>
            <input name="image" class="pull-right" type="file" id="image" onchange="readURL(this)" />
          </div>
        </div>
      </div>
      <div class="box-body">
        <div class="well">
          <div class="row">
            <div class="col-md-3">
              <div class="form-group">
                <label>Employee No. <font style="color:red;">*</font></label>
                <input value="<?php echo $EMP_NUMBER1; ?>" type="text" class="form-control" placeholder="Employee No." name="employee_number" id="employee_number">
              </div>

              <div class="form-group">
                <label>Last Name<font style="color:red;">*</font></label>
                <input required type="text" value="<?php echo $lname1; ?>" name="lname" class="form-control" placeholder="Last Name">
              </div>

              <div class="form-group">
                <label>First Name<font style="color:red;">*</font></label>
                <input required value="<?php echo $fname1; ?>" type="text" name="fname" class="form-control" placeholder="First Name">
              </div>

              <div class="form-group">
                <label>Middle Name<font style="color:red;">*</font></label>
                <input required value="<?php echo $mname1; ?>" type="text" name="mname" class="form-control" placeholder="Middle Name">
              </div>

              <div class="form-group">
                <label>Extension Name<font style="color:red;"></font></label>
                <input value="<?php echo $suffix; ?>" type="text" name="suffix" class="form-control" placeholder="Extension Name">
              </div>

              <div class="form-group">
                <label>Sex<font style="color:red;">*</font></label>
                <select class="form-control select2" name="gender">
                  <?php if ($gender1 == 'Male') : ?>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                  <?php else : ?>
                    <option value="Female">Female</option>
                    <option value="Male">Male</option>
                  <?php endif ?>
                </select>
              </div>

              <div class="form-group">
                <label>Civil Status<font style="color:red;">*</font></label>
                <?php if ($status == 'Single') : ?>
                  <select class="form-control select2" name="status">
                    <option value="Single">Single</option>
                    <option value="Maried">Married</option>
                  </select>
                <?php else : ?>
                  <select class="form-control select2" name="status">
                    <option value="Maried">Married</option>
                    <option value="Single">Single</option>
                  </select>
                <?php endif ?>
              </div>

              <div class="form-group">
                <label>Birth Date<font style="color:red;">*</font></label>
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input autocomplete="new-password" required type="text" value="<?php echo $bday1; ?>" name="birthdate" class="form-control pull-right" id="datepicker" placeholder="Birth Date">
                </div>

              </div>




            </div>

            <div class="col-md-3">


              <div class="form-group">
                <label>Office Station<font style="color:red;">*</font></label>
                <select required id="mySelect2" class="form-control" name="office">
                  <?php if ($office1 == 0) : ?>
                    <option selected disabled></option>
                    <option value="1">Regional Office</option>
                    <option value="2">Provincial/HUC Office</option>
                    <option value="3">Cluster Office</option>
                    <option value="4">City/Municipal Office</option>
                  <?php endif ?>
                  <?php if ($office1 == 1) : ?>
                    <option value="1">Regional Office</option>
                    <option value="2">Provincial/HUC Office</option>
                    <option value="3">Cluster Office</option>
                    <option value="4">City/Municipal Office</option>
                  <?php endif ?>
                  <?php if ($office1 == 2) : ?>
                    <option value="2">Provincial/HUC Office</option>
                    <option value="1">Regional Office</option>
                    <option value="3">Cluster Office</option>
                    <option value="4">City/Municipal Office</option>
                  <?php endif ?>
                  <?php if ($office1 == 3) : ?>
                    <option value="3">Cluster Office</option>
                    <option value="1">Regional Office</option>
                    <option value="2">Provincial/HUC Office</option>
                    <option value="4">City/Municipal Office</option>
                  <?php endif ?>
                  <?php if ($office1 == 4) : ?>
                    <option value="4">City/Municipal Office</option>
                    <option value="1">Regional Office</option>
                    <option value="2">Provincial/HUC Office</option>
                    <option value="3">Cluster Office</option>
                  <?php endif ?>

                </select>
              </div>

              <div class="form-group">
                <label>Province</label>
                <input type="text" name="province" hidden>

                <?php

                if ($office1 == 1) : ?>
                  <select class="form-control select2" style="width: 100%;" name="province" id="sel_depart">
                    <option value="<?php echo $province1; ?>"><?php echo $province11; ?></option>
                    <option value="10">Batangas</option>
                    <option value="21">Cavite</option>
                    <option value="34">Laguna</option>
                    <option value="56">Quezon</option>
                    <option value="58">Rizal</option>
                  </select>
                <?php else : ?>
                  <select class="form-control select2" style="width: 100%;" name="province" id="sel_depart">
                    <option value="<?php echo $province1; ?>"><?php echo $province11; ?></option>
                    <option value="10">Batangas</option>
                    <option value="21">Cavite</option>
                    <option value="34">Laguna</option>
                    <option value="56">Quezon</option>
                    <option value="58">Rizal</option>
                  </select>
                <?php endif ?>
              </div>

              <div class="form-group">
                <label>City/Municipality</label>
                <input type="text" name="municipality" hidden>
                <?php if ($office1 == 1 || $office1 == 2 || $office1 == 3) : ?>
                  <select id="sel_user" name="municipality" class="form-control select2">
                    <option value="<?php echo $city_id; ?>" selected><?php echo $municipality11; ?></option>
                    <option value="0"></option>
                  </select>
                <?php endif ?>

                <?php if ($office1 == 4) : ?>
                  <select id="sel_user" name="municipality" class="form-control select2">
                    <option value="<?php echo $city_id; ?>" selected><?php echo $municipality11; ?></option>
                    <option value="0"></option>
                  </select>
                <?php endif ?>

                <?php if ($office1 == 0) : ?>
                  <select id="sel_user" name="municipality" class="form-control select2">
                    <option value="<?php echo $city_id; ?>" selected><?php echo $municipality11; ?></option>
                    <option value="0"></option>
                  </select>
                <?php endif ?>
              </div>

              <div class="form-group">
                <label>Office/Division<font style="color:red;">*</font></label>
                <select required class="form-control select2" style="width: 100%;" name="division" id="">
                  <option value="<?php echo $division1; ?>" selected><?php echo $division11; ?></option>
                  <?php echo tblpersonnel($connect) ?>
                </select>
              </div>

              <div class="form-group">
                <label>Position<font style="color:red;">*</font></label>
                <select required class="form-control select2" style="width: 100%;" name="position" id="">
                  <option value="<?php echo $position11; ?>" selected><?php echo $position1; ?></option>
                  <?php echo tbldilgposition($connect) ?>
                </select>
              </div>

              <div class="form-group">
                <label>Designation<font style="color:red;">*</font></label>
                <select required class="form-control select2" style="width: 100%;" name="designation" id="">
                  <option value="<?php echo $designation11; ?>" selected><?php echo $designation1; ?></option>
                  <?php echo tbldesignation($connect) ?>
                </select>
              </div>

              <div class="form-group">
                <label>Employment Status<font style="color:red;">*</font></label>
                <?php if ($ACTIVATED == 'Yes') : ?>
                  <select class="form-control select2" name="e_stats">
                    <option value="Yes">Regular</option>
                    <option value="No">COS</option>
                  </select>
                <?php else : ?>
                  <select class="form-control select2" name="e_stats">
                    <option value="No">COS</option>
                    <option value="Yes">Regular</option>
                  </select>
                <?php endif ?>
              </div>

              <div class="form-group">
                <label>Employment Date &nbsp<b style="color:red;">*</b></label>
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input autocomplete="new-password" required type="text" name="employment_date" class="form-control pull-right" id="datepicker2" value="<?php echo $employment_date ?>" placeholder="Employment Date">
                </div>
              </div>





            </div>

            <div class="col-md-3">


              <div class="form-group">
                <label>Mobile <font style="color:red;">*</font></label>
                <input value="<?php echo $cellphone1; ?>" type="text" name="cellphone" class="form-control cp" placeholder="ex. 0995-2647-434">
              </div>

              <div class="form-group">
                <label>Personal Email Address <font style="color:red;">*</font></label>
                <input value="<?php echo $email1; ?>" type="text" name="email" class="form-control" placeholder="">
              </div>
              <div class="form-group">
                <label>Permanent Residential <font style="color:red;">*</font></label>
                <input value="<?php echo $permanent_address; ?>" type="text" name="permanent_address" class="form-control" placeholder="">
              </div>
              <div class="form-group">
                <label>Current Residential Address <font style="color:red;">*</font></label>
                <input value="<?php echo $current_address; ?>" type="text" name="current_address" class="form-control" placeholder="">
              </div>
              <div class="form-group">
                <label>Office Landline</label>
                <input value="<?php echo $office_landline; ?>" type="text" name="office_landline" class="form-control cp" placeholder="">
              </div>
              <div class="form-group">
                <label>Office Mobile</label>
                <input value="<?php echo $office_contact; ?>" type="text" name="office_contact" class="form-control cp" placeholder="">
              </div>


              <div class="form-group">
                <label>Office Email Address <font style="color:red;">*</font></label>
                <input value="<?php echo $alter_email; ?>" type="text" name="alter_email" class="form-control">
              </div>

              <div class="form-group">
                <label>Office Address</label>
                <input value="<?php echo $office_address; ?>" type="text" name="office_address" class="form-control">
              </div>



            </div>
            <?php if ($ACTIVATED == 'No') : ?>
              <div hidden>
              <?php else : ?>
                <div>
                <?php endif ?>
                <div class="col-md-3">
                  <div class="form-group">
                    <label>Salary Grade &nbsp<b style="color:red;">*</b></label>
                    <select class="form-control select2" name="salary" id="salary">
                      <option value=""></option>
                      <?php
                    $salary_grade_level = array(
                      "1" => "1",
                      "2" => "2"
                  );
                  
                  for ($i = 3; $i <= 33; $i++) {
                      $salary_grade_level[(string)$i] = (string)$i;
                  }
                      foreach ($salary_grade_level as $value => $label) {
                        $selected = ($salary == $value) ? "selected" : "";
                        echo "<option value=\"$value\" $selected>$label</option>";
                      }
                      
                      ?>
                    </select>
                  </div>

                  <div class="form-group">
                  <label>Step <font style="color:red;">*</font></label>
                  <select class="form-control select2" name="step">
                    <option value=""></option>
                    <?php
                    $step_level = array(
                      "1" => "1",
                      "2" => "2",
                      "3" => "3",
                      "4" => "4",
                      "5" => "5",
                      "6" => "6",
                      "7" => "7",
                      "8" => "8",
                    );
                    foreach ($step_level as $value => $label) {
                      $selected = ($stepp == $value) ? "selected" : "";
                      echo "<option value=\"$value\" $selected>$label</option>";
                    }
                    ?>
                  </select>
                  </div>

                  <div class="form-group">
                    <label>TIN</label>
                    <input class="form-control" type="text" name="tin" id="tin" autocomplete="off" value="<?php echo $tin ?>">
                  </div>

                  <div class="form-group">
                    <label>GSIS Number</label>
                    <input class="form-control" type="text" name="gsis" id="gsis" autocomplete="off" value="<?php echo $gsis ?>">
                  </div>

                  <div class="form-group">
                    <label>Philhealth Number</label>
                    <input class="form-control" type="text" name="philhealth" id="philhealth" autocomplete="off" value="<?php echo $philhealth_no ?>">
                  </div>

                  <div class="form-group">
                    <label>PAGIBIG Number</label>
                    <input class="form-control" type="text" name="pagibig" id="pagibig" autocomplete="off" value="<?php echo $pagibig ?>">
                  </div>
                  <div class="form-group">
                    <label>PAGIBIG Premium</label>
                    <input class="form-control" type="text" name="pagibig_premium" id="pagibig_premium" autocomplete="off" value="<?php echo $pagibig_premium ?>">
                  </div>
                  <div class="form-group">
                    <label>BIR Tax</label>
                    <input class="form-control" type="text" name="bir" id="bir" autocomplete="off" value="<?php echo $bir ?>">
                  </div>
                </div>

                </div>
              </div>
          </div>
          <div class="well">
            <div class="box-header with-border">
            </div>
            <div class="box-body">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Generation<font style="color:red;">*</font></label>

                    <select class="form-control select2" name="generation">
                      <option value=""></option>
                      <?php
                      $generation_option = array(
                        'Boomers (1946-1964)' => "Boomers (1946-1964)",
                        'Gen X (1965-1980)' => "Gen X (1965-1980)",
                        'Millenials Gen Y (1981-1996)' => "Millenials Gen Y (1981-1996)",
                        'Gen Z (1997-2012)' => "Gen Z (1997-2012)",
                      );
                      foreach ($generation_option as $value => $label) {
                        $selected = ($generation == $value) ? "selected" : "";
                        echo "<option value=\"$value\" $selected>$label</option>";
                      }
                      ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Awards Received<font style="color:red;">*</font></label>
                    <textarea name="awards" class="form-control" style="height: 105px;resize:none;"><?= $awards; ?></textarea>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Highest Educational Attainment<font style="color:red;">*</font></label>
                  <select class="form-control select2" name="education_attainment">
                    <option value=""></option>
                    <?php
                    $education_options = array(
                      'High School Diploma' => "High School Diploma",
                      'Associates Degree' => "Associate's Degree",
                      'Bachelors Degree' => "Bachelor's Degree",
                      'Masters Degree' => "Master's Degree",
                      'Doctorate Degree' => "Doctorate Degree",
                      'Professional Degree' => "Professional Degree (e.g. Law, Medicine)",
                      'Technical or Vocational Degree' => "Technical or Vocational Degree",
                      'Some College, No Degree' => "Some College, No Degree",
                      'Other' => "Other (please specify)"
                    );
                    foreach ($education_options as $value => $label) {
                      $selected = ($hea == $value) ? "selected" : "";
                      echo "<option value=\"$value\" $selected>$label</option>";
                    }
                    ?>
                  </select>


                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>No. of children - below 18<font style="color:red;">*</font></label>
                  <select class="form-control select2" name="below_18">
                    <option value=""></option>
                    <?php
                    $below_18_option = array(
                      '1' => "1",
                      '2' => "2",
                      '3' => "3",
                      '4' => "4",
                      '5' => "5",
                      'NA' => "NA",
                    );
                    foreach ($below_18_option as $value => $label) {
                      $selected = ($q5 == $value) ? "selected" : "";
                      echo "<option value=\"$value\" $selected>$label</option>";
                    }
                    ?>
                  </select>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>No. of children with special needs:<font style="color:red;">*</font></label>
                  <select class="form-control select2" name="special_needs">
                    <option value=""></option>
                    <?php
                    $special_needs_options = array(
                      '1' => "1",
                      '2' => "2",
                      '3' => "3",
                      '4' => "4",
                      '5' => "5",
                      'NA' => "NA",
                    );
                    foreach ($special_needs_options as $value => $label) {
                      $selected = ($q6 == $value) ? "selected" : "";
                      echo "<option value=\"$value\" $selected>$label</option>";
                    }
                    ?>
                  </select>
                </div>
              </div>
              <?php
              $ind = (!empty($ind_id)) ? "style='display:block;'" : "style='display:none;'";
              $pw = (!empty($pwd_id)) ? "style='display:block;'" : "style='display:none;'";
              $s = (!empty($s_id)) ? "style='display:block;'" : "style='display:none;'";
              $hc = (!empty($health_issues)) ? "style='display:block;'" : "style='display:none;'";

              $i = (!empty($ind_id)) ? "col-md-6" : "col-md-4";
              $p = (!empty($pwd_id)) ? "col-md-6" : "col-md-4";
              $sp = (!empty($s_id)) ? "col-md-6" : "col-md-4";


              ?>
              <div class="<?= $i; ?>">
                <div class="form-group">
                  <label>Are you a member of any indigenous group?<font style="color:red;">*</font></label>
                  <select class="form-control select2" name="indigenous_group" id="indigenous_group">
                    <option value=""></option>
                    <?php
                    $indigenous = array(
                      'Yes' => "Yes",
                      'No' => "No",
                    );
                    foreach ($indigenous as $value => $label) {
                      $selected = ($q2 == $value) ? "selected" : "";
                      echo "<option value=\"$value\" $selected>$label</option>";
                    }
                    ?>
                  </select>
                </div>
              </div>

              <div id="indigenous_textfield" <?= $ind; ?>>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Please specify your Indigenous ID:</label>
                    <input style="border: 1px solid red;" VALUE="<?= $ind_id; ?>" type="text" class="form-control" name="indigenous_id">
                  </div>
                </div>
              </div>

              <div class="<?= $p; ?>">
                <div class="form-group">
                  <label>Are you a PWD?<font style="color:red;">*</font></label>
                  <select class="form-control select2" name="pwd" id="pwd_group">
                  <option value=""></option>

                    <?php
                    $PWD = array(
                      'Yes' => "Yes",
                      'No' => "No",
                    );
                    foreach ($PWD as $value => $label) {
                      $selected = ($q3 == $value) ? "selected" : "";
                      echo "<option value=\"$value\" $selected>$label</option>";
                    }
                    ?>



                  </select>
                </div>
              </div>

              <div id="pwd_textfield" <?= $pw; ?>>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Please specify your PWD ID:</label>
                    <input style="border: 1px solid red;" VALUE="<?= $pwd_id; ?>" type="text" class="form-control" name="pwd_id">

                  </div>
                </div>
              </div>
              <div class="<?= $sp; ?>">
                <div class="form-group">
                  <label>Are you a Solo Parent?<font style="color:red;">*</font></label>
                  <select class="form-control select2" id="solo_parent" name="solo_parent">
                  <option value=""></option>

                    <?php
                    $solo = array(
                      'Yes' => "Yes",
                      'No' => "No",
                    );
                    foreach ($solo as $value => $label) {
                      $selected = ($q4 == $value) ? "selected" : "";
                      echo "<option value=\"$value\" $selected>$label</option>";
                    }
                    ?>
                  </select>
                  </select>
                </div>
              </div>
              <div id="solo_parent_textfield" <?= $s; ?>>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Please specify your Solo Parent ID:</label>
                    <input style="border: 1px solid red;" type="text" value="<?= $solo_parent_id; ?>" class="form-control" name="solo_parent_id">
                  </div>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label>With Children 6 y/s and below<font style="color:red;">*</font></label>
                  <select class="form-control select2" name="children_below_6">
                    <option value=""></option>
                    <?php
                    $children = array(
                      'Yes' => "Yes",
                      'No' => "No",
                    );
                    foreach ($children as $value => $label) {
                      $selected = ($q1 == $value) ? "selected" : "";
                      echo "<option value=\"$value\" $selected>$label</option>";
                    }
                    ?>
                  </select>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label>Years in the Department<font style="color:red;">*</font></label>
                  <input type="number" value="<?= $years_in_service; ?>" name="years_inservice" class="form-control" placeholder="Years in the Department">
                </div>
              </div>

            </div>
          </div>
          <div class="well">
            <div class="box-header with-border">
            </div>
            <div class="box-body">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>*With existing Gynecological Disorder? (For female employees)<font style="color:red;">*</font> </label>
                    <select class="form-control select2" name="gdisorder" id="gdisorder">
                      <option value=""></option>
                      <?php
                      $gdisorder = array(
                        'Yes' => "Yes",
                        "None" => "None",
                        'Prefer not to say' => "Prefer not to say",
                      );
                      foreach ($gdisorder as $value => $label) {
                        $selected = ($q7 == $value) ? "selected" : "";
                        echo "<option value=\"$value\" $selected>$label</option>";
                      }
                      ?>
                    </select>
                  </div>
                </div>
                <div id="gdisorder_panel" <?= $hc; ?>>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Please specify:</label>
                      <textarea style="width: 1350px; height: 126px;resize:none;" name="gdisorder_text" id="gdisorder_text"><?= $gdisorder_text;?></textarea>
                  </div>
                </div>
              </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>With existing Health Concerns?</label>
                    <select class="form-control select2" name="health_concern" id="health_concern">
                      <option value=""></option>
                      <?php
                      $health_concern = array(
                        'Yes' => "Yes",
                        "None" => "None",
                        'Prefer not to say' => "Prefer not to say",
                      );
                      foreach ($health_concern as $value => $label) {
                        $selected = ($q8 == $value) ? "selected" : "";
                        echo "<option value=\"$value\" $selected>$label</option>";
                      }
                      
                      ?>
                    </select>
                  </div>
                </div>
                <div id="health_concern_panel" <?= $hc; ?>>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Please specify:</label>
                      <textarea style="width: 1350px; height: 126px;resize:none;" name="health_issues"><?= $health_issues;?></textarea>
                  </div>
                </div>
              </div>

              </div>
            </div>
          </div>
        </div>
        <div class="well">
          <div class="box-header with-border">
            <h3 class="box-title">Username and Password</h3>
          </div>
          <div class="box-body">
            <div class="row">
              <div class="col-md-3">
                <div class="form-group">
                  <label>Username<font style="color:red;">*</font> </label>
                  <input readonly autocomplete="new-password" value="<?php echo $username1; ?>" type="text" name="username" id="username" class="form-control" placeholder="Username">

                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label>Password<font style="color:red;">*</font> </label>
                  <input autocomplete="new-password" type="password" name="password" id="password" class="form-control" placeholder="Password">
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label>Re-type Password<font style="color:red;">*</font></label>
                  <input autocomplete="new-password" type="password" name="repassword" id="repassword" class="form-control" placeholder="Re-type Password">
                </div>
              </div>
              <div class="col-md-12">
                <label><input type="checkbox" id="show_pass" value="value"> Show Password</label>
              </div>

            </div>
          </div>
        </div>
        <?php //else: 
        ?>

        <div class="well" hidden>
          <div class="box-header with-border">
            <h3 class="box-title">Username and Password</h3>
          </div>
          <div class="box-body">
            <div class="row">
              <div class="col-md-3">
                <div class="form-group">
                  <label>Username<font style="color:red;">*</font> </label>
                  <input autocomplete="new-password" value="<?php echo $username1; ?>" type="text" name="username" id="username" class="form-control" placeholder="Username">

                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label>Password<font style="color:red;">*</font> </label>
                <input autocomplete="new-password" type="password" name="password" id="password" class="form-control" placeholder="Password">
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label>Re-type Password<font style="color:red;">*</font></label>
              <input autocomplete="new-password" type="password" name="repassword" id="repassword" class="form-control" placeholder="Re-type Password">
            </div>
          </div>

        </div>
        <?php //endif 
        ?>
        <?php if ($_GET['view'] == 1) : ?>

        <?php else : ?>
          <div class="row">
            <div class="col-xs-2" align="center">
              <button class="btn btn-block btn-primary pull-right" name="submit" type="submit" id="submit">
                <font size="">Save</font>
              </button>
            </div>
          </div>
        <?php endif ?>

        <!-- username and pw -->
      </div>
  </div>


</div>
</div>




</div>
</form>


<script>
  $('#mySelect2').on('change', function() {
    var value = $(this).val();
    if (value == '1') {
      $('#sel_depart').find('option').remove().end().append('<option  selected></option><option value="10">Batangas</option><option value="21">Cavite</option><option value="34">Laguna</option><option value="56">Quezon</option>  <option value="58">Rizal</option>');
      $('#sel_user').find('option').remove().end().append('<option  selected></option>');
      document.getElementById("sel_depart").disabled = true;
      document.getElementById("sel_user").disabled = false;

    }
    if (value == '2' || value == '3') {
      $('#sel_depart').find('option').remove().end().append('<option  selected></option><option value="10">Batangas</option><option value="21">Cavite</option><option value="34">Laguna</option><option value="56">Quezon</option>  <option value="58">Rizal</option>');
      $('#sel_user').find('option').remove().end().append('<option  selected></option>');
      document.getElementById("sel_depart").disabled = false;
      document.getElementById("sel_user").disabled = false;

    }
    if (value == '4') {
      $('#sel_depart').find('option').remove().end().append('<option  selected></option><option value="10">Batangas</option><option value="21">Cavite</option><option value="34">Laguna</option><option value="56">Quezon</option>  <option value="58">Rizal</option>');
      $('#sel_user').find('option').remove().end().append('<option  selected></option>');
      document.getElementById("sel_depart").disabled = false;
      document.getElementById("sel_user").disabled = false;
    }
  });
</script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<script type="text/javascript">
  $(document).ready(function() {
    // Add an event listener to the select dropdown
    // document.getElementById('indigenous_group').addEventListener('change', function() {
    //   // Get the selected value
    //   var selectedValue = this.value;

    //   // Check if the selected value is 'Yes'
    //   if (selectedValue === 'Yes') {
    //     // Show the text field
    //     document.getElementById('indigenous_textfield').style.display = 'block';
    //   } else {
    //     // Hide the text field
    //     document.getElementById('indigenous_textfield').style.display = 'none';
    //   }
    // });
    $('#indigenous_group').on('change', function() {
      let selected_val = $(this).val();
      if (selected_val === 'Yes') {
        // Show the text field
        $('#indigenous_textfield').css('display', 'block');

      } else {
        // Hide the text field
        $('#indigenous_textfield').css('display', 'none');
      }
    })
    $('#health_concern').on('change', function() {
      let selected_val = $(this).val();
      if (selected_val === 'Yes') {
        // Show the text field
        $('#health_concern_panel').css('display', 'block');
      } else {
        // Hide the text field
        $('#health_concern_panel').css('display', 'none');
      }
    })

    $('#gdisorder').on('change', function() {
      let selected_val = $(this).val();
      if (selected_val === 'Yes') {
        // Show the text field
        $('#gdisorder_panel').css('display', 'block');
      } else {
        // Hide the text field
        $('#gdisorder_panel').css('display', 'none');
        $('#gdisorder_text').val("");
      }
    })


    $('#pwd_group').on('change', function() {
      let selected_val = $(this).val();
      if (selected_val === 'Yes') {
        // Show the text field
        $('#pwd_textfield').css('display', 'block');

      } else {
        // Hide the text field
        $('#pwd_textfield').css('display', 'none');
      }
    })

    $('#solo_parent').on('change', function() {
      let selected_val = $(this).val();
      if (selected_val === 'Yes') {
        // Show the text field
        $('#solo_parent_textfield').css('display', 'block');

      } else {
        // Hide the text field
        $('#solo_parent_textfield').css('display', 'none');
      }
    })
    $("#sel_depart").change(function() {
      var deptid = $(this).val();

      $.ajax({
        url: 'getUsers.php',
        type: 'post',
        data: {
          depart: deptid
        },
        dataType: 'json',
        success: function(response) {

          var len = response.length;

          $("#sel_user").empty();
          for (var i = 0; i < len; i++) {
            var id = response[i]['citymun_c'];
            var name = response[i]['citymun_m'];

            $("#sel_user").append("<option value='" + id + "'>" + name + "</option>");

          }
        }
      });


    });

  });
</script>
<script>
  $(window).load(function() {
    var phones = [{
      "mask": "####-###-####"
    }, {
      "mask": "####-###-####"
    }];
    $('.cp').inputmask({
      mask: phones,
      greedy: false,
      definitions: {
        '#': {
          validator: "[0-9]",
          cardinality: 1
        }
      }
    });
  });



  function readURL(input) {
    var url = input.value;
    var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
    if (input.files && input.files[0] && (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg")) {
      var reader = new FileReader();

      reader.onload = function(e) {
        $('#img').attr('src', e.target.result);
      }

      reader.readAsDataURL(input.files[0]);
    } else {
      $('#img').attr('src', 'images/male-user.png');
    }
  }

  function checkAvailability() {
    $("#loaderIcon").show();
    jQuery.ajax({
      url: "ch1.php",
      data: 'employee_number=' + $("#employee_number").val(),
      type: "POST",
      success: function(data) {
        $("#user-email-availability-status").html(data);
        $("#loaderIcon").hide();
      },
      error: function() {}
    });
  }

  function checkUsernameAvailability() {
    $("#loaderIcon").show();
    jQuery.ajax({
      url: "ch1.php",
      data: 'username=' + $("#username").val(),
      type: "POST",
      success: function(data) {
        $("#user-username-availability-status").html(data);
        $("#loaderIcon").hide();
      },
      error: function() {}
    });
  }
</script>