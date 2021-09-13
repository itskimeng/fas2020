<?php
$username = $_SESSION['username'];
require_once('_includes/setting.php');
require_once('_includes/dbaseCon.php');
require_once('_includes/library.php');
require_once('_includes/sql_statements.php');
require 'ict/views/checklist.php';
require 'ict/views/table.php';


$id = $_GET['id'];
$request = $_GET['req'];
$sub = $_GET['sub_req'];
include 'connection.php';
$sql = "SELECT * from tbltechnical_assistance as ta where ta.CONTROL_NO = '$id'";


$result = mysqli_query($conn, $sql);
if ($row = mysqli_fetch_array($result)) {
  $is_checked = category($row['TYPE_REQ']);
  $is_selected = sub_category(($row['TYPE_REQ_DESC']));
  $sub = sub_category(($row['TEXT1']));
  $sub_req = $row['TYPE_REQ_DESC'];
}




// carlo panget
// exit();

?>

<!DOCTYPE html>
<html>

<head>
  <title>FAS | Rate Service</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

</head>

<body>
  <!-- <button class="btn btn-lg btn-danger sweet-14" onclick="_gaq.push(['_trackEvent', 'example, 'try', 'Danger']);">Danger</button> -->
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="panel panel-default">
          <div class="box-body">
            <div>
              <h1>ICT Technical Assistance</h1><br>
            </div>

            <input type="hidden" name="curuser" value="" id="selectedUser" />
            <?php echo fillTableInfo(); ?>
            <br>



            <!-- START OF TYPE OF REQUEST -->
            <u style="margin-top:20px;">TYPE OF REQUEST</u>
            <form method="POST" enctype="multipart/form-data" class="myformStyle" action="JASPER/sample/sample1.php">
              <div class="row">
                <div class="col-lg-12">
                  <div class="col-lg-4">
                    <?php
                    foreach ($type as $key => $request) {
                      if ($request['id'] == 1) {
                        if ($is_checked['DESKTOP/LAPTOP REPAIR']) {
                          echo '<input type="checkbox" checked name="req_type_category[]" id="checkboxgroup_g1" class="checkbox_group form-check-input checked_request" value="' . $request['title'] . '" /> 
                        <b><span class="checkboxtext"> ' . $request['title'] . ' </span></b><br>';
                        } else {
                          echo '<input type="checkbox" name="req_type_category[]" id="checkboxgroup_g1" class="checkbox_group form-check-input checked_request" value="' . $request['title'] . '" /> 
                        <b><span class="checkboxtext"> ' . $request['title'] . ' </span></b><br>';
                        }
                      }
                    }

                    ?>
                    <div style="margin-left:30px;padding-top:10px;">
                      <?php
                      foreach ($data as $key => $request_type) {
                        if ($request_type['id'] == 1) {
                          if ($is_selected[$request_type['request_id']]) {
                            echo '<input style="margin-bottom:10px;" checked  type="checkbox" name="req_type_subcategory[]" id= "' . $request_type['enable'] . '" class="' . $request_type['req_class'] . ' form-check-input checked_request" id="' . $request_type['req_id'] . '" value="' . $request_type['request_id'] . '"><span class="checkboxSub"> ' . $request_type['request_type'] . ' </span><br>';
                          } else {
                            echo '<input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" id= "' . $request_type['enable'] . '" class="' . $request_type['req_class'] . ' form-check-input checked_request" id="' . $request_type['req_id'] . '" value="' . $request_type['request_id'] . '"><span class="checkboxSub"> ' . $request_type['request_type'] . ' </span><br>';
                          }
                        }
                      }
                      ?>
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <?php
                    foreach ($type as $key => $request) {
                      if ($request['id'] == 4) {
                        if ($is_checked['APPLICATION/SOFTWARE/SYSTEM ASSISTANCE']) {

                          echo '<input type="checkbox" checked name="req_type_category[]" id="checkboxgroup_g4" class="checkbox_group form-check-input checked_request" value="' . $request['title'] . '"><b><span class="checkboxtext"> ' . $request['title'] . ' </span></b><br>';
                        } else {
                          echo '<input type="checkbox" name="req_type_category[]" id="checkboxgroup_g4" class="checkbox_group form-check-input checked_request" value="' . $request['title'] . '"><b><span class="checkboxtext"> ' . $request['title'] . ' </span></b><br>';
                        }
                      }
                    }

                    ?>
                    <div style="margin-left:30px;padding-top:10px;">
                      <?php
                      foreach ($data as $key => $request_type) {
                        if ($request_type['id'] == 4) {
                          if ($request_type['request_id'] == 14 || $request_type['request_id'] == 19) {
                            echo  $request_type['request_type'] . '<br>';
                          } else {
                            if ($is_selected[$request_type['request_id']]) {
                              echo '<input style="margin-bottom:10px;" type="checkbox" checked name="req_type_subcategory[]" class="' . $request_type['req_class'] . ' form-check-input checked_request" id="' . $request_type['enable'] . '"  value="' . $request_type['request_id'] . '"><span class="checkboxSub"> ' . $request_type['request_type'] . ' </span><br>';
                            } else {
                              echo '<input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="' . $request_type['req_class'] . ' form-check-input checked_request" id="' . $request_type['enable'] . '"  value="' . $request_type['request_id'] . '"><span class="checkboxSub"> ' . $request_type['request_type'] . ' </span><br>';
                            }
                          }
                        }
                      }
                      ?>
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <?php
                    foreach ($type as $key => $request) {
                      if ($request['id'] == 7) {
                        if ($is_checked['INTERNET CONNECTIVITY']) {
                          echo '<input type="checkbox" checked name="req_type_category[]" id="checkboxgroup_g7" class="checkbox_group form-check-input checked_request" value="' . $request['title'] . '"> <b><span class="checkboxtext"> ' . $request['title'] . ' </span></b><br>';
                        } else {
                          echo '<input type="checkbox" name="req_type_category[]" id="checkboxgroup_g7" class="checkbox_group form-check-input checked_request" value="' . $request['title'] . '"> <b><span class="checkboxtext"> ' . $request['title'] . ' </span></b><br>';
                        }
                      }
                    }

                    ?>
                    <div style="margin-left:30px;padding-top:10px;">
                      <?php
                      foreach ($data as $key => $request_type) {

                        if ($request_type['id'] == 7) {
                          if ($is_selected[$request_type['request_id']]) {
                            if ($request_type['request_id'] == 25 || $request_type['request_id'] == 26 || $request_type['request_id'] == 28 || $request_type['request_id'] == 29) {
                              echo '<input style="margin-left:30px;" type="checkbox" checked name="text1[]" class="' . $request_type['req_class'] . ' form-check-input checked_request" id="' . $request_type['enable'] . '" value="' . $request_type['request_id'] . '"><span class="checkboxSub"> ' . $request_type['request_type'] . ' </span><br>';
                            } else if ($request_type['request_id'] == 31) {
                              echo  $request_type['request_type'];
                            } else {
                              echo '<input style="margin-bottom:10px;" type="checkbox" checked name="req_type_subcategory[]" class="' . $request_type['req_class'] . ' form-check-input checked_request" id="' . $request_type['enable'] . '" value="' . $request_type['request_id'] . '"><span class="checkboxSub"> ' . $request_type['request_type'] . ' </span><br>';
                            }
                          } else {
                            if ($request_type['request_id'] == 25 || $request_type['request_id'] == 26 || $request_type['request_id'] == 28 || $request_type['request_id'] == 29) {
                              echo '<input style="margin-left:30px;" type="checkbox" name="text1[]" class="' . $request_type['req_class'] . ' form-check-input checked_request" id="' . $request_type['enable'] . '" value="' . $request_type['request_id'] . '"><span class="checkboxSub"> ' . $request_type['request_type'] . ' </span><br>';
                            } else if ($request_type['request_id'] == 31) {
                              echo  $request_type['request_type'];
                            } else {
                              echo '<input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="' . $request_type['req_class'] . ' form-check-input checked_request" id="' . $request_type['enable'] . '" value="' . $request_type['request_id'] . '"><span class="checkboxSub"> ' . $request_type['request_type'] . ' </span><br>';
                            }
                          }
                        }
                      }
                      ?>
                    </div>
                  </div>

                </div>
              </div>
              <div class="row">
                <div class="col-lg-12">
                  <div class="col-lg-4">
                    <?php
                    foreach ($type as $key => $request) {
                      if ($request['id'] == 2) {
                        if ($is_checked['HARDWARE INSTALLATION']) {

                          echo '<input type="checkbox" checked name="req_type_category[]" id="checkboxgroup_g2" class="checkbox_group form-check-input checked_request" value="' . $request['title'] . '" /> <b><span class="checkboxtext"> ' . $request['title'] . ' </span></b><br>';
                        } else {
                          echo '<input type="checkbox" name="req_type_category[]" id="checkboxgroup_g2" class="checkbox_group form-check-input checked_request" value="' . $request['title'] . '" /> <b><span class="checkboxtext"> ' . $request['title'] . ' </span></b><br>';
                        }
                      }
                    }

                    ?>
                    <div style="margin-left:30px;padding-top:10px;">
                      <?php
                      foreach ($data as $key => $request_type) {

                        if ($request_type['id'] == 2) {
                          if ($is_selected[$request_type['request_id']]) {

                            echo '<input style="margin-bottom:10px;" type="checkbox" checked name="req_type_subcategory[]" class="' . $request_type['req_class'] . ' form-check-input checked_request" id="' . $request_type['enable'] . '" value="' . $request_type['request_id'] . '"><span class="checkboxSub"> ' . $request_type['request_type'] . ' </span><br>';
                          } else {
                            echo '<input style="margin-bottom:10px;" type="checkbox"  name="req_type_subcategory[]" class="' . $request_type['req_class'] . ' form-check-input checked_request" id="' . $request_type['enable'] . '" value="' . $request_type['request_id'] . '"><span class="checkboxSub"> ' . $request_type['request_type'] . ' </span><br>';
                          }
                        }
                      }
                      ?>
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <?php
                    foreach ($type as $key => $request) {
                      if ($request['id'] == 5) {
                        if ($is_checked['GOVMAIL ASSISTANCE']) {

                          echo '<input type="checkbox" checked name="req_type_category[]" id="checkboxgroup_g5" class="checkbox_group form-check-input checked_request" value="' . $request['title'] . '"><b><span class="checkboxtext"> ' . $request['title'] . ' </span></b><br>';
                        } else {
                          echo '<input type="checkbox"  name="req_type_category[]" id="checkboxgroup_g5" class="checkbox_group form-check-input checked_request" value="' . $request['title'] . '"><b><span class="checkboxtext"> ' . $request['title'] . ' </span></b><br>';
                        }
                      }
                    }

                    ?>
                    <div style="margin-left:30px;padding-top:10px;">
                      <?php
                      foreach ($data as $key => $request_type) {
                        if ($request_type['id'] == 5) {
                          if ($is_selected[$request_type['request_id']]) {

                            if ($request_type['request_id'] == 14 || $request_type['request_id'] == 19) {
                              echo '<input style="margin-left:30px;" style="margin-bottom:10px;" type="checkbox" checked name="req_type_subcategory[]" class="' . $request_type['req_class'] . ' form-check-input checked_request" id="' . $request_type['req_id'] . '"  value="' . $request_type['request_type'] . '"><span class="checkboxSub"> ' . $request_type['request_type'] . ' </span><br>';
                            } else {
                              echo '<input style="margin-bottom:10px;" type="checkbox" checked name="req_type_subcategory[]" class="' . $request_type['req_class'] . ' form-check-input checked_request" id="' . $request_type['enable'] . '"  value="' . $request_type['request_id'] . '"><span class="checkboxSub"> ' . $request_type['request_type'] . ' </span><br>';
                            }
                          } else {

                            if ($request_type['request_id'] == 14 || $request_type['request_id'] == 19) {
                              echo '<input style="margin-left:30px;" style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="' . $request_type['req_class'] . ' form-check-input checked_request" id="' . $request_type['req_id'] . '"  value="' . $request_type['request_type'] . '"><span class="checkboxSub"> ' . $request_type['request_type'] . ' </span><br>';
                            } else {
                              echo '<input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="' . $request_type['req_class'] . ' form-check-input checked_request" id="' . $request_type['enable'] . '"  value="' . $request_type['request_id'] . '"><span class="checkboxSub"> ' . $request_type['request_type'] . ' </span><br>';
                            }
                          }
                        }
                      }
                      ?>
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <?php
                    foreach ($type as $key => $request) {
                      if ($request['id'] == 8) {
                        if ($is_checked['POSTING/UPDATING OF INFORMATION IN THE DILG WEBSITE']) {

                          echo '<input type="checkbox" checked name="req_type_category[]" class="checkbox_group form-check-input checked_request" value="' . $request['title'] . '"> <b><span class="checkboxtext"> ' . $request['title'] . ' </span></b><br>';
                        } else {
                          echo '<input type="checkbox" name="req_type_category[]" class="checkbox_group form-check-input checked_request" value="' . $request['title'] . '"> <b><span class="checkboxtext"> ' . $request['title'] . ' </span></b><br>';
                        }
                      }
                    }

                    ?>
                    <!-- <div style="margin-left:30px;padding-top:10px;">
                    <?php
                    foreach ($data as $key => $request_type) {

                      if ($request_type['id'] == 8) {
                        if ($request_type['request_id'] == 16) {
                          echo $request_type['request_type'] . '<br>';
                        } else {
                          echo '<input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g3 form-check-input checked_request" id="' . $request_type['req_id'] . '" value="' . $request_type['request_id'] . '"><span class="checkboxSub"> ' . $request_type['request_type'] . ' </span><br>';
                        }
                      }
                    }
                    ?>
                  </div> -->
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-12">
                  <div class="col-lg-4">
                    <?php
                    foreach ($type as $key => $request) {
                      if ($request['id'] == 3) {
                        if ($is_checked['PRINTER/SCANNER/COPIER']) {

                          echo '<input type="checkbox" checked  name="req_type_category[]" id="checkboxgroup_g3" class="checkbox_group form-check-input checked_request" value="' . $request['title'] . '" /> <b><span class="checkboxtext"> ' . $request['title'] . ' </span></b><br>';
                        } else {
                          echo '<input type="checkbox" name="req_type_category[]" id="checkboxgroup_g3" class="checkbox_group form-check-input checked_request" value="' . $request['title'] . '" /> <b><span class="checkboxtext"> ' . $request['title'] . ' </span></b><br>';
                        }
                      }
                    }

                    ?>
                    <div style="margin-left:30px;padding-top:10px;">
                      <?php
                      foreach ($data as $key => $request_type) {

                        if ($request_type['id'] == 3) {
                          if ($is_selected[$request_type['request_id']]) {


                            echo '<input style="margin-bottom:10px;" type="checkbox" checked name="req_type_subcategory[]" class="' . $request_type['req_class'] . ' form-check-input checked_request" id="' . $request_type['enable'] . '" value="' . $request_type['request_id'] . '"><span class="checkboxSub"> ' . $request_type['request_type'] . ' </span><br>';
                          } else {
                            echo '<input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="' . $request_type['req_class'] . ' form-check-input checked_request" id="' . $request_type['enable'] . '" value="' . $request_type['request_id'] . '"><span class="checkboxSub"> ' . $request_type['request_type'] . ' </span><br>';
                          }
                        }
                      }
                      ?>
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <?php
                    foreach ($type as $key => $request) {
                      if ($request['id'] == 6) {
                        if ($is_checked['dddIP TELEPHONE']) {

                          echo '<input type="checkbox" checked name="req_type_category[]" id="checkboxgroup_g6" class="checkbox_group form-check-input checked_request" value="' . $request['title'] . '"><b><span class="checkboxtext"> ' . $request['title'] . ' </span></b><br>';
                        } else {
                          echo '<input type="checkbox" name="req_type_category[]" id="checkboxgroup_g6" class="checkbox_group form-check-input checked_request" value="' . $request['title'] . '"><b><span class="checkboxtext"> ' . $request['title'] . ' </span></b><br>';
                        }
                      }
                    }

                    ?>
                    <div style="margin-left:30px;padding-top:10px;">
                      <?php
                      foreach ($data as $key => $request_type) {
                        if ($request_type['id'] == 6) {
                          if ($is_selected[$request_type['request_id']]) {

                            if ($request_type['request_id'] == 14 || $request_type['request_id'] == 19) {
                              echo '<input style="margin-left:30px;" style="margin-bottom:10px;" type="checkbox" checked name="req_type_subcategory[]" class="' . $request_type['req_class'] . ' form-check-input checked_request" id="' . $request_type['req_id'] . '"  value="' . $request_type['request_id'] . '"><span class="checkboxSub"> ' . $request_type['request_type'] . ' </span><br>';
                            } else {
                              echo '<input style="margin-bottom:10px;" type="checkbox" checked name="req_type_subcategory[]" class="' . $request_type['req_class'] . ' form-check-input checked_request" id="' . $request_type['enable'] . '"  value="' . $request_type['request_id'] . '"><span class="checkboxSub"> ' . $request_type['request_type'] . ' </span><br>';
                            }
                          } else {
                            if ($request_type['request_id'] == 14 || $request_type['request_id'] == 19) {
                              echo '<input style="margin-left:30px;" style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="' . $request_type['req_class'] . ' form-check-input checked_request" id="' . $request_type['req_id'] . '"  value="' . $request_type['request_id'] . '"><span class="checkboxSub"> ' . $request_type['request_type'] . ' </span><br>';
                            } else {
                              echo '<input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="' . $request_type['req_class'] . ' form-check-input checked_request" id="' . $request_type['enable'] . '"  value="' . $request_type['request_id'] . '"><span class="checkboxSub"> ' . $request_type['request_type'] . ' </span><br>';
                            }
                          }
                        }
                      }
                      ?>
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <?php
                    foreach ($type as $key => $request) {
                      if ($request['id'] == 9) {
                        if ($is_checked['OTHERS (please specify)']) {
                          echo '<input type="checkbox" checked name="req_type_category[]" id="checkboxgroup_g9" class="checkbox_group form-check-input checked_request" value="' . $request['title'] . '"> <b><span class="checkboxtext"> ' . $request['title'] . ' </span></b><br>';
                        } else {
                          echo '<input type="checkbox" name="req_type_category[]" id="checkboxgroup_g9" class="checkbox_group form-check-input checked_request" value="' . $request['title'] . '"> <b><span class="checkboxtext"> ' . $request['title'] . ' </span></b><br>';
                        }
                      }
                    }

                    ?>
                    <div style="margin-left:30px;padding-top:10px;">
                      <?php
                      foreach ($data as $key => $request_type) {

                        if ($request_type['id'] == 9) {
                          if ($request_type['request_id'] == 16) {
                            echo $request_type['request_type'] . '<br>';
                          } else {
                            echo  $request_type['request_type'] . '<br>';
                          }
                        }
                      }
                      ?>
                    </div>
                  </div>

                </div>
              </div>

              <table border=1 style="margin-top:20px;width:100%;">
                <tr>
                  <td colspan=4 class="center-text label-text" style="width:50%;"><i>END-USER</i></td>
                  <td colspan=4 class="center-text label-text"><i>RICTU</i></td>
                </tr>
                <tr>
                  <td colspan=4 class="label-text">ISSUE/PROBLEM/ERROR DETAILS:</td>
                  <td colspan=4 class="label-text">FINDINGS AND RESOLUTION/RECOMMENDATION<span style="color:red;">*</span></td>
                </tr>
                <tr>
                  <td colspan=4>
                    <textarea class="disabletxtarea" rows="23" name="issue" cols="56" style="background-color:#EEEEEE;resize:none;width:100%;">
                              <?php echo showIssue(); ?>
                              </textarea>
                  </td>

                  <td colspan=4 rowspan=2>
                    <textarea class="disabletxtarea" rows="25" name="issue" cols="56" style="background-color:#EEEEEE;resize:none;width:100%;">

                              <?php echo showDiagnose(); ?>
                              </textarea>
                  </td>

                </tr>
                <tr>
                  <td colspan=4 class="label-text">ACCEPTANCE OF ICT TECHNICAL ASSISTANCE RENDERED:</td>

                </tr>
                <tr>
                  <td colspan=4 style="background-color:#EEEEEE;text-align:center;"><u><?php echo setSig(); ?></u><br><span class="label-text">Signature over Printed Name</span></td>


                  <?php
                  include 'connection.php';

                  if (mysqli_connect_errno()) {
                    echo mysqli_connect_error();
                  }
                  $id = $_GET['id'];
                  $query = "SELECT * FROM `tbltechnical_assistance` where `CONTROL_NO` ='$id' ";
                  $result = mysqli_query($conn, $query);
                  while ($row = mysqli_fetch_array($result)) {
                    switch ($row['STATUS']) {
                      case '1':
                  ?>
                        <td colspan=2 class="label-text">
                          <input type="checkbox" class="checkbox_group" id="resolved" name="isComplete" value="1" checked />
                          &nbsp;&nbsp;&nbsp;&nbsp;Resolved<span style="color:red;">*</span>
                        </td>
                        <td colspan=2 class="label-text">
                          <input type="checkbox" class="checkbox_group" id="defective" name="isComplete" value="0" />&nbsp;&nbsp;&nbsp;&nbsp;
                          Defective(to be referred to GSS for repair)<span style="color:red;">*</span>
                        </td>
                      <?php
                        break;

                      case '0':
                      ?>
                        <td colspan=2 class="label-text">
                          <input type="checkbox" class="checkbox_group" id="resolved" name="isComplete" value="1" />
                          &nbsp;&nbsp;&nbsp;&nbsp;Resolved<span style="color:red;">*</span>
                        </td>
                        <td colspan=2 class="label-text">
                          <input type="checkbox" class="checkbox_group" id="defective" name="isComplete" value="0" checked />&nbsp;&nbsp;&nbsp;&nbsp;
                          Defective(to be referred to GSS for repair)<span style="color:red;">*</span>
                        </td>
                      <?php
                        break;
                      default:
                      ?>
                        <td colspan=2 class="label-text">
                          <input type="checkbox" class="checkbox_group" id="resolved" name="isComplete" value="1" />
                          &nbsp;&nbsp;&nbsp;&nbsp;Resolved<span style="color:red;">*</span>
                        </td>
                        <td colspan=2 class="label-text">
                          <input type="checkbox" class="checkbox_group" id="defective" name="isComplete" value="0" />&nbsp;&nbsp;&nbsp;&nbsp;
                          Defective(to be referred to GSS for repair)<span style="color:red;">*</span>
                        </td>
                  <?php
                        break;
                    }
                  }
                  ?>

                <tr>
                  <td colspan=4 class="label-text">DEAR END USER, YOUR FEEDBACK IS IMPORTANT TO US:</td>



                  <td style="width:12.5%;" class="label-text">Started Date:<span style="color:red;">*</span></td>
                  <td style="width:12.5%;">
                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input disabled type="text" name="started_date" placeholder="Started Date" class="datePicker1" value="<?PHP echo setStartDate(); ?>" required>

                    </div>
                  </td>
                  <td style="width:12.5%;" class="label-text">Completed Date:<span style="color:red;">*</span></td>
                  <td style="width:12.5%;">
                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input disabled type="text" name="completed_date" placeholder="Completed Date" class="datePicker1" value="<?php echo setCompletedDate(); ?>" required>
                    </div>
                  </td>

                </tr>
                <tr>
                  <td colspan=4>
                  <td style="width:12.5%;" class="label-text">Started Time:<span style="color:red;">*</span></td>
                  <td style="width:12.5%;">
                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input disabled id="timepicker" type="text" name="started_time" placeholder="Started Time" value="<?php echo setStartTime(); ?>" required>

                    </div>
                  </td>
                  <td style="width:12.5%;" class="label-text">Completed Time: <span style="color:red;">*</span></td>
                  <td style="width:12.5%;">
                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input disabled id="timepicker2" type="text" name="completed_time" placeholder="Completed Time" value="<?php echo setCompletedTime(); ?>" required>

                    </div>
                  </td>
                </tr>
                <tr>
                  <td colspan=4 style="background-color:#EEEEEE;border:5px solid red;">
                    <ol>
                      <li class="label-text">Timeliness
                        <label style="font-weight:normal;">Was the ICT Staff able to provide immediate assistance within three (3) hours or agreed timeline?(Yes/No) </label><?php echo setTimeliness(); ?>
                      </li>
                      <li class="label-text">Quality
                        <p style="font-weight:normal;">At a rating scale of 1 to 5, kindly rate the service rendered?<br>(5-Outstanding, 4- Very Satisfactory, 3 - Satisfactory, 2 - Unsatisfactory, 1 - Poor)
                          <?php echo setQuality(); ?>
                      </li>
                    </ol>
                  </td>
                  <td colspan=4 style="background-color:#EEEEEE;text-align:center;"><u><?php echo setSigICT(); ?></u><br><span class="label-text">Signature over Printed Name</span></td>

                </tr>






              </table><br>

          </div>
        </div>
      </div>
    </div>
  </div>

</body>

</html>
<!-- Button trigger modal -->
<button type="button" class="btn btn-lg btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
  Save
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document" style="width:70%;">
    <div class="modal-content" style="background-color:rgba(57,58,56,0.1);border-radius:30px;">
      <!-- <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle" style="text-align:center;font-family:'Cambria';font-size:24px;">CUSTOMER SATISFACTORY SURVEY FORM</h5>
       
      </div> -->
      <div class="modal-body">
        <div class="row">
          <div class="col-lg-12">
            <div class="col-lg-2">
            </div>
            <div class="col-lg-10">
              <div class="content">
                <ul class="nav nav-pills" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" data-toggle="pill" href="#login" style="margin-left:-140px;">A. SERVICE DIMENSION</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" data-toggle="pill" href="#regis" style="margin-right:-140px;">B. SUGGESTION FOR IMPROVEMENT</a>
                  </li>
                </ul>
                <div class="tab-content bg-success" style="background-color:#fff;">
                  <div id="login" class="container tab-pane active">
                    <table border=1 id="cssTable">
                      <tbody class="table-scroll">
                        <tr>
                          <td></td>
                          <td></td>
                          <td style="text-align:center;font-weight:bold;" class="tdSpacing">
                            (5)<br>
                            Strongly Agree<br>
                            Lubos na
                            sumasang ayon
                            <br><img src="images/happy.gif" style="width:50px;height:50px;">
                          </td>
                          <td style="text-align:center;font-weight:bold;" class="tdSpacing">
                            (4)<br>
                            Agree<br>
                            Sumasang ayon
                            <br>
                            <img src="images/4.gif" style="width:50px;height:50px;">
                          </td>
                          <td style="text-align:center;font-weight:bold;" class="tdSpacing">
                            (3)<br>
                            Neutral<br>
                            Sumasangayon o hindi sumasangayon<br>
                            <img src="images/3.gif" style="width:50px;height:50px;">
                          </td>
                          <td style="text-align:center;font-weight:bold;" class="tdSpacing">
                            (2)<br>
                            Disagree<br>
                            Hindi
                            Sumasang ayon<br>
                            <img src="images/2.gif" style="width:50px;height:50px;">
                          </td>
                          <td style="text-align:center;font-weight:bold;" class="tdSpacing">
                            (1)<br>
                            Strongly Disagree<br>
                            Lubos na hindi sumasang ayon<br>
                            <img src="images/1.gif" style="width:50px;height:50px;">
                          </td>
                        </tr>
                        <tr>
                          <td class="tdTitle tdSpacing">Responsiveness</td>
                          <input type="hidden" value="Responsiveness" name="sd[]" />

                          <td class="tdSpacing" style="text-align:justify;" class="tdSpacing">
                            The service was willingly and <br>
                            promptly extended to the <br>client/customer.<br>
                            Maagap na naibibigay ang<br> serbisyo sa kliyente </td>
                          <td class="tdSpacing" style="font-size:24px; font-weight:bold; text-align:center;"><input type="checkbox" class="g1" value="5" name="rating[]" style="width:25px;height:25px;" /> </td>
                          <td class="tdSpacing" style="font-size:24px; font-weight:bold;text-align:center;"><input type="checkbox" class="g1" value="4" name="rating[]" style="width:25px;height:25px;" /></td>
                          <td class="tdSpacing" style="font-size:24px; font-weight:bold;text-align:center;"><input type="checkbox" class="g1" value="3" name="rating[]" style="width:25px;height:25px;" /></td>
                          <td class="tdSpacing" style="font-size:24px; font-weight:bold;text-align:center;"><input type="checkbox" class="g1" value="2" name="rating[]" style="width:25px;height:25px;" /></td>
                          <td class="tdSpacing" style="font-size:24px; font-weight:bold;text-align:center;"><input type="checkbox" class="g1" value="1" name="rating[]" style="width:25px;height:25px;" /></td>
                        </tr>
                        <tr>
                          <td class="tdTitle tdSpacing">Reliability</td>
                          <input type="hidden" value="Reliability" name="sd[]" />

                          <td class="tdSpacing" style="text-align:justify;">
                            Performed the service within the expectations of the client/customer served.
                            Naisagawa ang serbisyo ayon sa inaasahan ng kliyente.
                          </td>
                          <td class="tdSpacing" style="font-size:24px; font-weight:bold;text-align:center;"><input type="checkbox" class="g2" value="5" name="rating[]" style="width:25px;height:25px;" /> </td>
                          <td class="tdSpacing" style="font-size:24px; font-weight:bold;text-align:center;"><input type="checkbox" class="g2" value="4" name="rating[]" style="width:25px;height:25px;" /></td>
                          <td class="tdSpacing" style="font-size:24px; font-weight:bold;text-align:center;"><input type="checkbox" class="g2" value="3" name="rating[]" style="width:25px;height:25px;" /></td>
                          <td class="tdSpacing" style="font-size:24px; font-weight:bold;text-align:center;"><input type="checkbox" class="g2" value="2" name="rating[]" style="width:25px;height:25px;" /></td>
                          <td class="tdSpacing" style="font-size:24px; font-weight:bold;text-align:center;"><input type="checkbox" class="g2" value="1" name="rating[]" style="width:25px;height:25px;" /></td>
                        </tr>
                        <tr>
                          <td class="tdTitle tdSpacing">Access & Facilities </td>
                          <input type="hidden" value="Access & Facilities" name="sd[]" />

                          <td class="tdSpacing" style="text-align:justify;">
                            Facilities/resources/modes of technology were readily available for convenient transactions.
                            May maayos at angkop na pasilidad at sistema para sa serbisyo.
                          </td>
                          <td class="tdSpacing" style="font-size:24px; font-weight:bold;text-align:center;"><input type="checkbox" class="g3" value="5" name="rating[]" style="width:25px;height:25px;" /> </td>
                          <td class="tdSpacing" style="font-size:24px; font-weight:bold;text-align:center;"><input type="checkbox" class="g3" value="4" name="rating[]" style="width:25px;height:25px;" /></td>
                          <td class="tdSpacing" style="font-size:24px; font-weight:bold;text-align:center;"><input type="checkbox" class="g3" value="3" name="rating[]" style="width:25px;height:25px;" /></td>
                          <td class="tdSpacing" style="font-size:24px; font-weight:bold;text-align:center;"><input type="checkbox" class="g3" value="2" name="rating[]" style="width:25px;height:25px;" /></td>
                          <td class="tdSpacing" style="font-size:24px; font-weight:bold;text-align:center;"><input type="checkbox" class="g3" value="1" name="rating[]" style="width:25px;height:25px;" /></td>
                        </tr>
                        <tr>
                          <td class="tdTitle tdSpacing">Communication</td>
                          <input type="hidden" value="Communication" name="sd[]" />
                          <td class="tdSpacing" style="text-align:justify;">
                            Materials associated with the service are easily understood and feedback mechanisms are present relevant to the client’s concern.
                            May sapat na impormasyon na madaling maunawaan at may mekanismo para matugunan ang mga puna o mungkahi
                          </td>
                          <td class="tdSpacing" style="font-size:24px; font-weight:bold;text-align:center;"><input type="checkbox" class="g4" value="5" name="rating[]" style="width:25px;height:25px;" /> </td>
                          <td class="tdSpacing" style="font-size:24px; font-weight:bold;text-align:center;"><input type="checkbox" class="g4" value="4" name="rating[]" style="width:25px;height:25px;" /></td>
                          <td class="tdSpacing" style="font-size:24px; font-weight:bold;text-align:center;"><input type="checkbox" class="g4" value="3" name="rating[]" style="width:25px;height:25px;" /></td>
                          <td class="tdSpacing" style="font-size:24px; font-weight:bold;text-align:center;"><input type="checkbox" class="g4" value="2" name="rating[]" style="width:25px;height:25px;" /></td>
                          <td class="tdSpacing" style="font-size:24px; font-weight:bold;text-align:center;"><input type="checkbox" class="g4" value="1" name="rating[]" style="width:25px;height:25px;" /></td>
                        </tr>
                        <tr>
                          <td class="tdTitle tdSpacing">Costs</td>
                          <input type="hidden" value="Costs" name="sd[]" />
                          <td class="tdSpacing" style="text-align:justify;">
                            Value for money spent on services rendered.
                            Tama ang kaukulang bayad para sa serbisyo o iba pang gastos para sa transaksyon.
                          </td>
                          <td class="tdSpacing" style="font-size:24px; font-weight:bold;text-align:center;"><input type="checkbox" class="g5" value="5" name="rating[]" style="width:25px;height:25px;" /> </td>
                          <td class="tdSpacing" style="font-size:24px; font-weight:bold;text-align:center;"><input type="checkbox" class="g5" value="4" name="rating[]" style="width:25px;height:25px;" /></td>
                          <td class="tdSpacing" style="font-size:24px; font-weight:bold;text-align:center;"><input type="checkbox" class="g5" value="3" name="rating[]" style="width:25px;height:25px;" /></td>
                          <td class="tdSpacing" style="font-size:24px; font-weight:bold;text-align:center;"><input type="checkbox" class="g5" value="2" name="rating[]" style="width:25px;height:25px;" /></td>
                          <td class="tdSpacing" style="font-size:24px; font-weight:bold;text-align:center;"><input type="checkbox" class="g5" value="1" name="rating[]" style="width:25px;height:25px;" /></td>
                        </tr>
                        <tr>
                          <td colspan="4" class="tdSpacing" style="text-align:center;font-weight:bold;">
                            <input type="radio" style="width:25px; height:25px;" /> is free of charge
                          </td>
                          <td colspan="3" class="tdSpacing" style="text-align:center;font-weight:bold;">
                            <input type="radio" style="width:25px; height:25px;" /> not applicable
                          </td>
                        </tr>
                        <tr>
                          <td class="tdTitle tdSpacing">Integrity</td>
                          <input type="hidden" value="Integrity" name="sd[]" />
                          <td class="tdSpacing" style="text-align:justify;">
                            Provided services with high morale and spirit of honesty.
                            Naglingkod nang may katapatan at mataas na integridad.

                          </td>
                          <td class="tdSpacing" style="font-size:24px; font-weight:bold;text-align:center;"><input type="checkbox" class="g6" value="5" name="rating[]" style="width:25px;height:25px;" /> </td>
                          <td class="tdSpacing" style="font-size:24px; font-weight:bold;text-align:center;"><input type="checkbox" class="g6" value="4" name="rating[]" style="width:25px;height:25px;" /></td>
                          <td class="tdSpacing" style="font-size:24px; font-weight:bold;text-align:center;"><input type="checkbox" class="g6" value="3" name="rating[]" style="width:25px;height:25px;" /></td>
                          <td class="tdSpacing" style="font-size:24px; font-weight:bold;text-align:center;"><input type="checkbox" class="g6" value="2" name="rating[]" style="width:25px;height:25px;" /></td>
                          <td class="tdSpacing" style="font-size:24px; font-weight:bold;text-align:center;"><input type="checkbox" class="g6" value="1" name="rating[]" style="width:25px;height:25px;" /></td>
                        </tr>
                        <tr>
                          <td class="tdTitle tdSpacing">Assurance</td>
                          <input type="hidden" value="Assurance" name="sd[]" />
                          <td class="tdSpacing" style="text-align:justify;">
                            The service was provided by competent personnel.
                            Naibigay ang serbisyo nang may sapat na kakayahan at kaalaman.

                          </td>
                          <td class="tdSpacing" style="font-size:24px; font-weight:bold;text-align:center;"><input type="checkbox" class="g7" value="5" name="rating[]" style="width:25px;height:25px;" /> </td>
                          <td class="tdSpacing" style="font-size:24px; font-weight:bold;text-align:center;"><input type="checkbox" class="g7" value="4" name="rating[]" style="width:25px;height:25px;" /></td>
                          <td class="tdSpacing" style="font-size:24px; font-weight:bold;text-align:center;"><input type="checkbox" class="g7" value="3" name="rating[]" style="width:25px;height:25px;" /></td>
                          <td class="tdSpacing" style="font-size:24px; font-weight:bold;text-align:center;"><input type="checkbox" class="g7" value="2" name="rating[]" style="width:25px;height:25px;" /></td>
                          <td class="tdSpacing" style="font-size:24px; font-weight:bold;text-align:center;"><input type="checkbox" class="g7" value="1" name="rating[]" style="width:25px;height:25px;" /></td>
                        </tr>
                        <tr>
                          <td class="tdTitle tdSpacing">Outcome</td>
                          <input type="hidden" value="Outcome" name="sd[]" />
                          <td class="tdSpacing" style="text-align:justify;">
                            The overall expectations of the client are met.
                            Nakamit ang kabuuang serbisyong inaasahan.


                          </td>
                          <td class="tdSpacing" style="font-size:24px; font-weight:bold;text-align:center;"><input type="checkbox" class="g8" value="5" name="rating[]" style="width:25px;height:25px;" /> </td>
                          <td class="tdSpacing" style="font-size:24px; font-weight:bold;text-align:center;"><input type="checkbox" class="g8" value="4" name="rating[]" style="width:25px;height:25px;" /></td>
                          <td class="tdSpacing" style="font-size:24px; font-weight:bold;text-align:center;"><input type="checkbox" class="g8" value="3" name="rating[]" style="width:25px;height:25px;" /></td>
                          <td class="tdSpacing" style="font-size:24px; font-weight:bold;text-align:center;"><input type="checkbox" class="g8" value="2" name="rating[]" style="width:25px;height:25px;" /></td>
                          <td class="tdSpacing" style="font-size:24px; font-weight:bold;text-align:center;"><input type="checkbox" class="g8" value="1" name="rating[]" style="width:25px;height:25px;" /></td>
                        </tr>
                      </tbody>
                    </table>


                  </div>
                  <div id="regis" class="container tab-pane fade">
                    <span class="spanTitle" style="margin-left:15%;">Mga mungkahi at obserbasyon para sa pagpapabuti ng serbisyo </span>

                    <textarea name="suggestion" class="cssTA" cols=150 rows=5 style="resize:none;border:groove 6px skyblue;font-stretch: ultra-expanded;font-size:24px;font-family:Lucida Grande,Verdana;">
                </textarea>
                    </form>
                    <div class="spanTitle">
                      <img src="images/Isko.gif" style="width:auto;height:500px;margin-left:-50px;margin-top:-245px;float:left;z-index:-10;position:static">

                      Name of Client (Optional): <?php echo '<u>' . $_SESSION['complete_name'] . '</u>'; ?> Contact Number (Optional)_____________Date Accomplished: November 16, 2020
                      <br<br>
                        <br><br>
                        <br<br>
                          <br><br>
                          <br<br>

                            ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
                            Privacy Statement

                            DILG is committed to protecting your privacy. Any information gathered using this tool will be treated with utmost confidentiality and shall be solely used to improve our services being provided to the public. Thank you very much.

                            (Ang DILG ay nangangako na protektahan ang iyong privacy. Anumang impormasyong natipon gamit ang sarbeyl na ito ay ituturing na lubos na pagiging kompidensiyal at gagamitin lamang upang mapabuti ang aming mga serbisyo. Maraming salamat.)
                    </div>
                  </div><br><br><br>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary sweet-14" style="float: right;" onclick="_gaq.push(['_trackEvent', 'example, 'try', 'Danger']); " id="finalizeButton" type="button" onclick="return confirm('Are you sure you want to save now?');">Save changes</button>
                </div>
              </div>
            </div>
          </div>
        </div>


      </div>

    </div>
  </div>
</div>



<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Select2 -->
<script src="bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- InputMask -->
<script src="plugins/input-mask/jquery.inputmask.js"></script>
<script src="plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- date-range-picker -->
<script src="bower_components/moment/min/moment.min.js"></script>
<script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- bootstrap color picker -->
<script src="bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
<!-- bootstrap time picker -->
<!-- SlimScroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="plugins/iCheck/icheck.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>


<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->

<script src="_includes/sweetalert.min.js"></script>
<link rel="stylesheet" href="_includes/sweetalert.css">
<script>
  $('document').ready(function() {
    $('textarea').each(function() {
      $(this).val($(this).val().trim());
    });


    // MODAL CHECKBOXES
    $('.g1').on('change', function() {
      $('.g1').not(this).prop('checked', false);
    });

    $('.g2').on('change', function() {
      $('.g2').not(this).prop('checked', false);
    });

    $('.g3').on('change', function() {
      $('.g3').not(this).prop('checked', false);
    });

    $('.g4').on('change', function() {
      $('.g4').not(this).prop('checked', false);
    });

    $('.g5').on('change', function() {
      $('.g5').not(this).prop('checked', false);
    });

    $('.g6').on('change', function() {
      $('.g6').not(this).prop('checked', false);
    });

    $('.g7').on('change', function() {
      $('.g7').not(this).prop('checked', false);
    });

    $('.g8').on('change', function() {
      $('.g8').not(this).prop('checked', false);
    });

    // check if theres no check on checkbox



  });



  var c_n = $('#control_no').val();
  var type = 'user';
  document.querySelector('.sweet-14').onclick = function() {
    var count = document.querySelectorAll("#cssTable :checked").length;
    if (count == 0) {
      // alert(count);

      alert('Kindly checked all checkboxes in the field.');

    } else if (count <= 7) {
      var r = $("#cssTable .g1").val();

      alert(r);

      alert('Kindly checked all checkboxes in the field.');

    } else {




      // =================================
      swal({
        title: "Are you sure you want to proceed?",
        text: "Control No:" + c_n,
        type: "info",
        showCancelButton: true,
        confirmButtonClass: 'btn-danger',
        confirmButtonText: 'Yes',
        closeOnConfirm: false,
        showLoaderOnConfirm: true
      }, function() {
        var queryString = $('#saveAll').serialize();
        $.ajax({
          url: "rateServiceForm_save.php",
          method: "POST",
          data: $("#saveAll, #info").serialize(),

          success: function(data) {
            setTimeout(function() {
              swal("Record saved successfully!");
            }, 3000);
            <?php
            if ($username == 'ljbanalan' || $username == 'mmmonteiro' || $username == 'masacluti' || $username == 'seolivar' || $username == 'jsodsod' || $username == 'jecastillo') {
            ?>
              window.location = "processing.php?division=<?php echo $_GET['division']; ?>&ticket_id=";

            <?php
            } else {
            ?>
              window.location = "techassistance.php?division=<?php echo $_GET['division']; ?>&ticket_id=";

            <?php
            }
            ?>
          }
        });
      });
      // ================================
    }
  }
  $(function() {

    $('.select2').on('change', function() {
      var value = this.value;
      $.ajax({
        url: "_fetchOfficeInfo.php",
        method: "POST",
        data: {
          id: value
        },
        success: function(data) {
          var result = JSON.parse(data);
          $('#selectedUser').val(result[0].currentuser);
          $('#office').val(result[0].office);
          $('#position').val(result[0].position);
          $('#phone').val(result[0].phone);
          $('#email').val(result[0].email);
        }
      });
    });

    //Initialize Select2 Elements
    $('.select2').select2()

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', {
      'placeholder': 'dd/mm/yyyy'
    })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', {
      'placeholder': 'mm/dd/yyyy'
    })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY hh:mm A'
      }
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker({
        ranges: {
          'Today': [moment(), moment()],
          'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days': [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month': [moment().startOf('month'), moment().endOf('month')],
          'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate: moment()
      },
      function(start, end) {
        $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Date picker,
    $(".datePicker1").datepicker({
      changeMonth: true,
      changeYear: true,
      yearRange: "1950:2020",
      dateFormat: 'M dd, yy'
    });
    // $(".datePicker1").datepicker().datepicker("setDate", new Date());


    $('#datepicker2').datepicker({
      autoclose: true
    })
    $('#datepicker3').datepicker({
      autoclose: true
    })
    $('#datepicker4').datepicker({
      autoclose: true
    })

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass: 'iradio_minimal-blue'
    })
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass: 'iradio_minimal-red'
    })
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass: 'iradio_flat-green'
    })

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    //Timepicker
    $('.timepicker').timepicker({
      showInputs: false
    })
  })
</script>
<script type="text/javascript">
  $(function() {
    document.getElementById("site").disabled = true;
    document.getElementById("purpose").disabled = true;
    document.getElementById("purpose2").disabled = true;
    document.getElementById("softwares").disabled = true;
    document.getElementById("changeaccount").disabled = true;
    document.getElementById("others1").disabled = true;
    document.getElementById("others2").disabled = true;
    document.getElementById("others3").disabled = true;


    enable_cb1();
    enable_cb2();
    enable_cb3();
    enable_cb4();
    enable_cb5();
    $("#checkboxgroup_g1").click(enable_cb1);
    $("#checkboxgroup_g2").click(enable_cb2);
    $("#checkboxgroup_g3").click(enable_cb3);
    $("#checkboxgroup_g4").click(enable_cb4);
    $("#checkboxgroup_g5").click(enable_cb5);

  });
  $('.checkboxgroup').on('change', function() {
    $('.checkboxgroup').not(this).prop('checked', false);
  });

  function enable_cb1() {
    if (this.checked) {
      $(".checkboxgroup_g1").removeAttr("disabled");
    } else {
      $(".checkboxgroup_g1").attr("disabled", true);
    }
  }

  function enable_cb2() {
    if (this.checked) {
      $(".checkboxgroup_g2").removeAttr("disabled");
      document.getElementById("site").disabled = false;
      document.getElementById("purpose").disabled = false;
      document.getElementById("purpose2").disabled = false;


    } else {
      $(".checkboxgroup_g2").attr("disabled", true);
      document.getElementById("site").disabled = true;
      document.getElementById("purpose").disabled = true;
      document.getElementById("purpose2").disabled = true;


    }
  }

  function enable_cb3() {
    if (this.checked) {
      $(".checkboxgroup_g3").removeAttr("disabled");
      document.getElementById("softwares").disabled = false;

    } else {
      $(".checkboxgroup_g3").attr("disabled", true);
      document.getElementById("softwares").disabled = true;

    }
  }

  function enable_cb4() {
    if (this.checked) {
      $(".checkboxgroup_g4").removeAttr("disabled");
    } else {
      $(".checkboxgroup_g4").attr("disabled", true);
    }
  }

  function enable_cb5() {
    if (this.checked) {
      $(".checkboxgroup_g5").removeAttr("disabled");
      document.getElementById("changeaccount").disabled = false;

    } else {
      $(".checkboxgroup_g5").attr("disabled", true);
      document.getElementById("changeaccount").disabled = true;


    }
  }
  $('.checkboxgroup_g1').on('change', function() {
    $('.checkboxgroup_g1').not(this).prop('checked', false);
  });
  $('.checkboxgroup_g2').on('change', function() {
    $('.checkboxgroup_g2').not(this).prop('checked', false);
  });
  $('.checkboxgroup_g3').on('change', function() {
    $('.checkboxgroup_g3').not(this).prop('checked', false);
  });
  $('.checkboxgroup_g4').on('change', function() {
    $('.checkboxgroup_g4').not(this).prop('checked', false);
  });
  $('.checkboxgroup_g5').on('change', function() {
    $('.checkboxgroup_g5').not(this).prop('checked', false);
  });
  $('.checkboxgroup_g6').on('change', function() {
    $('.checkboxgroup_g6').not(this).prop('checked', false);
  });


  $('.checkbox_group').on('change', function() {
    $('.checkbox_group').not(this).prop('checked', false);
  });

  // DATE PICKER
  $(function() {
    $(".datePicker1").datepicker({
      changeMonth: true,
      changeYear: true,
      yearRange: "1950:2020",
      dateFormat: 'M dd, yy'
    });
    $(".datePicker2").datepicker({
      changeMonth: true,
      changeYear: true,
      yearRange: "1950:2020",
      dateFormat: 'M dd, yy'
    });
    $(".datePicker3").datepicker({
      changeMonth: true,
      changeYear: true,
      yearRange: "1950:2020",
      dateFormat: 'M dd, yy'
    });


  });
</script>