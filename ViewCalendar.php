<?php
session_start();
date_default_timezone_set('Asia/Manila');

if (!isset($_SESSION['username'])) {
  header('location:index.php');
} else {
  error_reporting(0);
  ini_set('display_errors', 0);
  $username = $_SESSION['username'];
  $DEPT_ID = $_SESSION['DEPT_ID'];
  $OFFICE_STATION = $_SESSION['OFFICE_STATION'];
}
$division = $_GET['division'];
require_once 'calendar/sample/bdd.php';
require_once 'calendar/sample/dbaseCon.php';
require_once 'calendar/sample/sql_statements.php';

$sql = "SELECT DIVISION_M, id, title, start, end, description,venue, tblpersonneldivision.DIVISION_COLOR as 'color', cancelflag, office,enp,posteddate, events.remarks,UNAME 
FROM events 
inner join tblpersonneldivision on events.office = tblpersonneldivision.DIVISION_N
inner join tblemployeeinfo on events.postedby = tblemployeeinfo.EMP_N
where cancelflag = 0 and events.status = 1 ";
$req = $bdd->prepare($sql);
$req->execute();
$events = $req->fetchAll();



$sql = "SELECT id, code, name FROM event_programs";
$req = $bdd->prepare($sql);
$req->execute();
$result = $req->fetchAll();
$programs = [];

foreach ($result as $res) {
  $programs[$res['code']] = $res['code'];
}

function viewEvents($is_allow = false, $options = [])
{
?>
  <form method="POST" id="add_act">
    <input type="hidden" name="eventid" id="eventid">
    <input type="hidden" name="function" value="check">
    <table class="table table-bordered" style="width:100%;">
      <tr>
        <td class="col-md-2" style="font-weight:bold">Activity Title<span style="color:red;">*</span></td>
        <td class="col-md-5"><input required type="text" class="form-control" name="titletxtbox" id="titletxtbox" /></td>
      </tr>
      <?php if ($is_allow) : ?>
        <tr>
          <!-- test -->
          <td class="col-md-2" style="font-weight:bold">Program<span style="color:red;">*</span>
            <a type="button" class="btn btn-block btn-primary" href="base_cdd_programs.html.php?username=<?php echo $_SESSION['username']; ?>&division=<?php echo $_GET['division']; ?>"><i class="icon fa fa-plus"></i> Add Program</a>
          </td>
          <td class="col-md-5">
            <select id="program" name="program" class="form-control  program" data-placeholder="-- Select Program">
              <?php echo group_options($options, '') ?>
            </select>
          </td>
        </tr>
      <?php endif ?>

      <tr>
        <td class="col-md-2" style="font-weight:bold">Start Date<span style="color:red;">*</span></td>
        <td class="col-md-5">
          <input required type="text" class="form-control datepicker1" name="startdatetxtbox" id="datepicker1" value="" required autocomplete=off>
        </td>
      </tr>
      <tr>
        <td class="col-md-2" style="font-weight:bold">End Date</td>
        <td class="col-md-5">
          <input type="text" class="form-control datepicker2" id="datepicker2" name="enddatetxtbox" placeholder="mm/dd/yyyy" autocomplete=off />
        </td>
      </tr>
      <tr>
        <td class="col-md-2" style="font-weight:bold">Description</td>
        <td class="col-md-5"><input type="text" class="form-control" name="descriptiontxtbox" id="descriptiontxtbox" value="" /></td>
      </tr>
      <tr>
        <td class="col-md-2" style="font-weight:bold">Venue<span style="color:red;">*</span></td>
        <td class="col-md-5"><input required type="text" class="form-control" name="venuetxtbox" id="venuetxtbox" value="" /></td>
      </tr>
      <tr>
        <td class="col-md-2" style="font-weight:bold">Expected Number of Participants<span style="color:red;">*</span></td>
        <td class="col-md-5"><input required type="number" min="0" name="enptxtbox" id="enptxtbox" class="form-control" value="" /></td>
      </tr>
      <tr>
        <td class="col-md-2" style="font-weight:bold">Target Participants<span style="color:red;">*</span></td>
        <td class="col-md-5">
          <div class="form-group">
            <select required class="form-control select2" name="remarks[]" multiple="multiple" data-placeholder="Select a State" style="width: 100%;">
              <option>Regional Office</option>
              <option>Provincial Office</option>
              <option>HUC</option>
              <option>C/MLGOOs</option>
              <option>LGUs</option>
              <option>NGAs</option>
              <option>Others</option>
            </select>
          </div>
          <!-- <input required type = "text" class = "form-control" name = "remarks" id= "remarks" value = "" /> -->
        </td>
      </tr>
      <tr>
        <td class="col-md-2" style="font-weight:bold">Posted By</td>
        <td class="col-md-5">
          <input readonly type="text" class="form-control" id="postedby" name = "postedby"value="<?php echo $_SESSION['username']; ?>" />
        </td>
      </tr>
      <tr>
        <td class="col-md-2" style="font-weight:bold">Remind Me:</td>
        <td class="col-md-5">
          <input required type="text" class="form-control" name="notify" id="reminder" value="" required autocomplete=off>
        </td>
      </tr>
      <tr>
        <td class="col-md-2" style="font-weight:bold">Posted Date</td>
        <td class="col-md-5"><input disabled type="text" class="form-control datepicker3" placeholder="Posted Date" id="datepicker3" name="enddatetxtbox" /></td>
      </tr>


    </table>
    <input id="submitForm"  name="submit" style="text-align:center;margin-left:5px;" class="pull-right btn btn-success" value="Save">

  </form>
<?php

}

function getCurrentID()
{
  include 'connection.php';
  $sqlQuery = "SELECT ID FROM `events`  ORDER BY ID DESC LIMIT 1";
  $result = mysqli_query($conn, $sqlQuery);
  if ($row = mysqli_fetch_array($result)) {
    echo $row['ID'];
  }
}

function viewEvents2()
{
?>

  <form method="POST" action="calendar/edit-event.php" id="edit_act">
    <input type="hidden" name="eventid" id="eventid">
    <?php

    if ($_SESSION['planningofficer'] == 1) {
    ?>
      <table class="table table-bordered" style="width:100%;">
        <tr>
          <td class="col-md-2" style="font-weight:bold">Activity Title<span style="color:red;">*</span></td>
          <td class="col-md-5"><input disabled type="text" class="form-control" name="titletxtbox" id="titletxtbox" value="" /></td>
        </tr>
        <tr>
          <td class="col-md-2" style="font-weight:bold">Start Date<span style="color:red;">*</span></td>
          <td class="col-md-5">
            <input disabled type="text" class="form-control datepicker1" name="startdatetxtbox" id="datepicker1" value="" placeholder="mm/dd/yyyy" required autocomplete=off>
          </td>
        </tr>
        <tr>
          <td class="col-md-2" style="font-weight:bold">End Date</td>
          <td class="col-md-5">
            <input autocomplete="off" disabled type="text" class="form-control" name="enddatetxtbox" id="datepicker2" value="" />
          </td>
        </tr>
        <tr>
          <td class="col-md-2" style="font-weight:bold">Description</td>
          <td class="col-md-5"><input disabled type="text" class="form-control" name="descriptiontxtbox" id="descriptiontxtbox" value="" /></td>
        </tr>
        <tr>
          <td class="col-md-2" style="font-weight:bold">Venue<span style="color:red;">*</span></td>
          <td class="col-md-5"><input disabled type="text" class="form-control" name="venuetxtbox" id="venuetxtbox" value="" /></td>
        </tr>
        <tr>
          <td class="col-md-2" style="font-weight:bold">Expected Number of Participants<span style="color:red;">*</span></td>
          <td class="col-md-5"><input disabled type="number" min="0" name="enptxtbox" id="enptxtbox" class="form-control" value="" /></td>
        </tr>
        <tr>
          <td class="col-md-2" style="font-weight:bold">Target Participants<span style="color:red;">*</span></td>
          <td class="col-md-5">
            <input disabled type="text" class="form-control" name="remarks" id="remarks" value="" />
          </td>
        </tr>
        <tr>
          <td class="col-md-2" style="font-weight:bold">Posted By</td>
          <td class="col-md-5">
            <input readonly type="text" class="form-control" id="postedby" />
          </td>
        </tr>
        <tr>
          <td class="col-md-2" style="font-weight:bold">Posted Date</td>
          <td class="col-md-5"><input disabled type="text" class="form-control" placeholder="Posted Date" id="datepicker3" name="enddatetxtbox" /></td>
        </tr>


      </table>
    <?php

    } else {

    ?>
      <table class="table table-bordered" style="width:100%;">
        <tr>
          <td class="col-md-2" style="font-weight:bold">Activity Title<span style="color:red;">*</span></td>
          <td class="col-md-5"><input disabled type="text" class="form-control" name="titletxtbox" id="titletxtbox" value="" /></td>
        </tr>
        <tr>
          <td class="col-md-2" style="font-weight:bold">Start Date<span style="color:red;">*</span></td>
          <td class="col-md-5">
            <input disabled type="text" class="form-control datepicker1" name="startdatetxtbox" id="datepicker1" value="" placeholder="mm/dd/yyyy" required autocomplete=off>
          </td>
        </tr>
        <tr>
          <td class="col-md-2" style="font-weight:bold">End Date</td>
          <td class="col-md-5">
            <input disabled type="text" placeholder="mm/dd/yyyy" class="form-control" name="enddatetxtbox" id="datepicker2" value="" />
          </td>
        </tr>
        <tr>
          <td class="col-md-2" style="font-weight:bold">Description</td>
          <td class="col-md-5"><input disabled type="text" class="form-control" name="descriptiontxtbox" id="descriptiontxtbox" value="" /></td>
        </tr>
        <tr>
          <td class="col-md-2" style="font-weight:bold">Venue<span style="color:red;">*</span></td>
          <td class="col-md-5"><input disabled type="text" class="form-control" name="venuetxtbox" id="venuetxtbox" value="" /></td>
        </tr>
        <tr>
          <td class="col-md-2" style="font-weight:bold">Expected Number of Participants<span style="color:red;">*</span></td>
          <td class="col-md-5"><input disabled type="number" min="0" name="enptxtbox" id="enptxtbox" class="form-control" value="" /></td>
        </tr>
        <tr>
          <td class="col-md-2" style="font-weight:bold">Target Participants<span style="color:red;">*</span></td>
          <td class="col-md-5">
            <input disabled type="text" class="form-control" name="remarks" id="remarks" value="" />
          </td>
        </tr>
        <tr>
          <td class="col-md-2" style="font-weight:bold">Posted By</td>
          <td class="col-md-5">
            <input disabled type="text" class="form-control" id="postedby" value="" />
          </td>
        </tr>
        <tr>
          <td class="col-md-2" style="font-weight:bold">Posted Date</td>
          <td class="col-md-5"><input disabled type="text" class="form-control" placeholder="Posted Date" id="datepicker3" name="enddatetxtbox" /></td>
        </tr>


      </table>
    <?php
    }
    ?>


    <?php


    echo ' <a id = "edit"  style = "text-align:center;margin-left:5px;" class = "pull-right btn btn-primary"> Edit</a>';
    echo ' <input id = "save"  type = "submit" name = "submit" style = "text-align:center;margin-left:5px;" class = "pull-right btn btn-success" value = "Save Changes"> ';


    ?>

  </form>
<?php
}
?>

<?php
require_once 'lgcdd_divisionchecker.php';
require_once 'ActivityPlanner/views/macro.html.php';
?>

<?php require_once 'menu_checker.php'; ?>
<?php $menuchecker = menuChecker('calendar'); ?>

<!DOCTYPE html>
<html>

<head>
  <link rel="shortcut icon" type="image/png" href="dilg.png">

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>FAS | Calendar</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
        folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <!-- Google Font -->
  <link rel="stylesheet" href="bower_components/select2/dist/css/select2.min.css">

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <link rel="stylesheet" href="calendar/fullcalendar/fullcalendar.min.css" />
  <script src="calendar/fullcalendar/lib/jquery.min.js"></script>
  <script src="calendar/fullcalendar/lib/moment.min.js"></script>
  <script src="calendar/fullcalendar/fullcalendar.min.js"></script>
  <script src="bower_components/select2/dist/js/select2.full.min.js"></script>
  <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

  <script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

  <style>
    #calendar {
      width: 100%;
      padding: 10px;
      margin: 0 auto;
      background-color: #ECEFF1;
    }

    .response {
      height: 60px;
    }

    .success {
      background: #cdf3cd;
      padding: 10px 60px;
      border: #c3e6c3 1px solid;
    }
  </style>
  <?php
  if ( $username == 'mmmonteiro'  || $username == 'masacluti' || $username == 'seolivar' || $username == 'jecastillo' || $username == 'jsodsod') {
    include('test1.php');
  } else {

    if ($OFFICE_STATION == 1) {
      include('sidebar2.php');
    } else {
      include('sidebar3.php');
    }
  }
  ?>
  <?php include 'connection.php'; ?>
  <?php //include 'push/index.php'; ?>

  <div class="content-wrapper">
    <section class="content-header">
      <br>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Calendar of Activities</li>
      </ol><br>

      <div id="openviewWeather">
        <a class="weatherwidget-io" href="https://forecast7.com/en/12d88121d77/philippines/" data-label_1="Philippines" data-label_2="Weather" data-font="Roboto" data-icons="Climacons Animated" data-theme="original" data-accent="rgba(1, 1, 1, 0.0)"></a>
      </div>

      <script>
        ! function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (!d.getElementById(id)) {
            js = d.createElement(s);
            js.id = id;
            js.src = 'https://weatherwidget.io/js/widget.min.js';
            fjs.parentNode.insertBefore(js, fjs);
          }
        }(document, 'script', 'weatherwidget-io-js');
      </script>
      <?php include 'calendar_view.php'; ?>
      &nbsp;
      &nbsp;

      <!-- modal -->
      <div class="modal fade" id="myModal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header"  style="background-color:#ffcdd2;">
              <h4 class="modal-title">
                <?php
                if ($_SESSION['planningofficer'] == 1) {
                  echo  '<label id ="title">View Activity</label>';
                } else {
                  echo  '<label id ="title" >View Activity</label>';
                }
                ?>
              </h4>

              <button type="button" class="close" data-dismiss="modal">&times;
              </button>
            </div>
            <div class="modal-body">
              <?php echo viewEvents2(); ?>
            </div>
            <div class="modal-footer">
            </div>
          </div>
        </div>
      </div>

      <div class="modal fade" id="myModal2">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header" style="background-color:#ffcdd2;">
              <h4 class="modal-title" ><b>Add Activity</b></h4>
              <button type="button" class="close" data-dismiss="modal">&times;
              </button>
            </div>
            <div class="modal-body">
              <?php echo viewEvents($is_allow, $programs); ?>
            </div>
            <div class="modal-footer">
            </div>
          </div>
        </div>
      </div>

      <!-- conflict details -->
      <div class="modal fade" id="conflict_details">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header" style = "height:40px;background-image: linear-gradient(#ffebee, #ffcdd2, #ef9a9a);">
              <h4 class="modal-title">
                Conflict Details
                <small><i class="fa fa-info-circle"></i> Scheduling conflict detected</small>
              </h4>

              <button type="button" class="close" data-dismiss="modal">&times;
              </button>
            </div>
            <div class="modal-body">
              <table class="table table-bordered table-hover" id = "confDetais" width = 100% style = "table-layout: fixed;">
              <th>Activity Title</th>
              <th>Start Date</th>    
              <th>End Date</th>
              <th>Target Participants</th>
              <tbody>

              </tbody>
              </table>
            </div>
            <div class="modal-footer">
              <button class="btn btn-sm btn-danger" id="closeModal">Close</button>
              <button class="btn btn-sm btn-success" id="proceed">Proceed</button>

            </div>
          </div>
        </div>
      </div>




      <br>

    </section>
  </div>


  <footer class="main-footer">
    <br>

    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0
    </div>
    <strong>DILG IV-A Regional Information and Communications Technology Unit (RICTU) © 2019 All Right Reserved .</strong>
  </footer>
  <br>

  <div class="control-sidebar-bg"></div>
  </div>

  <!-- <script src="bower_components/jquery/dist/jquery.min.js"></script> -->
  <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
  <script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
  <script src="bower_components/fastclick/lib/fastclick.js"></script>
  <script src="dist/js/adminlte.min.js"></script>
  <script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
  <script src="_includes/sweetalert.min.js" type="text/javascript"></script>
  <link rel="stylesheet" href="_includes/sweetalert.css">
  <link href="_includes/sweetalert2.min.css" rel="stylesheet" />
  <script src="_includes/sweetalert2.min.js" type="text/javascript"></script>
  <script>
    $(function() {
      var flag = '';
      var start = '';
      var end = '';
      $('#submitForm').click(function() {

        event.preventDefault();

        //validate fields
        var fail = false;
        var fail_log = '';
        var name;
        $('#add_act').find('select, textarea, input').each(function() {
          if (!$(this).prop('required')) {

          } else {
            if (!$(this).val()) {
              fail = true;
              name = $(this).attr('name');
              fail_log = "All required field is required";
            }

          }
        });
        $('#send').click(function(){
          alert('a');
        })

        //submit if fail never got set to true
        function showConflictDetails(startDate,endDate)
        {
          $.ajax({
            url: 'conflict_details.php',
            type: 'POST',
            data:{
              start:startDate,
              end:endDate
            },
            success: function(response) {
          $('#confDetais').html(response);
            }});
        }
        
        
       
    
           
        if (!fail) {
          var dataval = $('#add_act').serialize();
          $.ajax({
            url: 'calendar/calfunc.php',
            type: 'POST',
            dataType: 'json',
            cache: false,
            data: $('#add_act').serialize(),
            success: function(response) {
              if (response.flag == 1) {
                
               let start = response.start;
               let end = response.end;
               showConflictDetails(start,end);
                $('#myModal2').modal('hide');
                $('#conflict_details').modal('show');
              } else {
                $.ajax({
                  type: 'POST',
                  url: 'calendar/add-event.php',
                  data: $('#add_act').serialize(),
                  success: function(data) {

                    // setTimeout(function() {
                      // displayMessage('Event Details successfull saved.');
                   window.location = "ViewCalendar.php?division=<?php echo $_SESSION['division'];?>";

                    // }, 3000);

                  }
                });

              }
            }
          });
        } else {

          swal({
            title: "Field is required",
            text: "You have left a empty field and value must be entered.",
            type: "warning",
            showCancelButton: false,
            confirmButtonClass: "btn-danger",

          })
        }



      });

      $('#closeModal').click(function() {
        $('#conflict_details').modal('hide');

      

      })
      $('#proceed').click(function() {
        $.ajax({
          type: 'POST',
          url: 'calendar/add-event.php?flag=1',
          data: $('#add_act').serialize(),
          success: function(data) {
            window.location = "ViewCalendar.php?division=<?php echo $_SESSION['division']; ?>&flag=0";
            displayMessage('Event Details successfull saved.');
           

          }
        });
      })

      //Initialize Select2 Elements
      $('.select2').select2({
        theme: "classic",
      })

    });
  </script>
  <script>
    $('#title').html("View Activity");


    $('#save').hide();

    function test() {
      $('#edit').show();

    }
    $("#edit").click(function() {
      $('#save').show();
      $('#edit').hide();



      $('#title').html("Edit Activity");
      $('#titletxtbox').prop("disabled", false);
      $('#datepicker1').prop("disabled", false);
      $('#datepicker2').prop("disabled", false);
      $('#descriptiontxtbox').prop("disabled", false);
      $('#venuetxtbox').prop("disabled", false);
      $('#enptxtbox').prop("disabled", false);
      $('#remarks').prop("disabled", false);

    });
    $('#title').html("View Activity");

    function displayMessage(message) {
      $(".response").html("<div class='alert alert-success' role='alert' style = 'background-color:#ef9a9a;'>" + message + "<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
      setInterval(function() {
        $(".alert").fadeOut();
      }, 3000);
    }
    $('#modal').click(function() {
      $('#myModal2').modal('show');

    })







    $(document).ready(function() {


      $("#all").prop("checked", true);
      $("#ord").prop("checked", true);
      $("#fad").prop("checked", true);
      $("#lgcdd").prop("checked", true);
      $("#lgmed").prop("checked", true);
      $("#mbrtg").prop("checked", true);
      $("#pdmu").prop("checked", true);

      $("#addll").prop("checked", true);
      $("#cavite").prop("checked", true);
      $("#laguna").prop("checked", true);
      $("#batangas").prop("checked", true);
      $("#quezon").prop("checked", true);
      $("#rizal").prop("checked", true);
      $("#lucena").prop("checked", true);


      $(".datepicker1").datepicker({
        changeMonth: true,
        changeYear: true,
        yearRange: "1950:2020",
        dateFormat: 'M dd, yy'
      });
      $("#reminder").datepicker({
        changeMonth: true,
        changeYear: true,
        yearRange: "1950:2020",
        dateFormat: 'M dd, yy'
      });
      $("#datepicker1").datepicker({
        changeMonth: true,
        changeYear: true,
        yearRange: "1950:2020",
        dateFormat: 'M dd, yy'
      });
      $(".datepicker1").datepicker().datepicker("setDate", new Date());
      $("#datepicker2").datepicker({
        changeMonth: true,
        changeYear: true,
        yearRange: "1950:2020",
        dateFormat: 'M dd, yy'
      });
      $(".datepicker2").datepicker({
        changeMonth: true,
        changeYear: true,
        yearRange: "1950:2020",
        dateFormat: 'M dd, yy'
      });

      $("#datepicker3").datepicker({
        changeMonth: true,
        changeYear: true,
        yearRange: "1950:2020",
        dateFormat: 'M dd, yy'
      });
      $(".datepicker3").datepicker().datepicker("setDate", new Date());



    })
    $(document).ready(function() {
      $("#all").click(function() {
        $('#all').not(this).prop('checked', this.checked);
        $('#ord').not(this).prop('checked', this.checked);
        $('#fad').not(this).prop('checked', this.checked);
        $('#lgcdd').not(this).prop('checked', this.checked);
        $('#mbrtg').not(this).prop('checked', this.checked);
        $('#lgmed').not(this).prop('checked', this.checked);
        $('#pdmu').not(this).prop('checked', this.checked);
        $('#cavite').not(this).prop('checked', this.checked);
        $('#laguna').not(this).prop('checked', this.checked);
        $('#batangas').not(this).prop('checked', this.checked);
        $('#quezon').not(this).prop('checked', this.checked);
        $('#rizal').not(this).prop('checked', this.checked);
        $('#lucena').not(this).prop('checked', this.checked);
      });



      $('#calendar').fullCalendar({
        header: {
          left: 'prev,next today',
          center: 'title',
          right: 'month,basicWeek,basicDay'
        },
        editable: false,
        eventLimit: true,
        selectable: true,
        selectHelper: true,

        select: function(start, end, allDay) {
          $('#myModal').modal('show');
        },
        eventClick: function(event, element) {
          if (event.office == <?php echo $_GET['division']; ?>) {
            test();
          } else {
            $('#title').html("View Activity");

            $('#save').hide();
            $('#edit').hide();
          }
          $('#titletxtbox').prop("disabled", true);
          $('#datepicker1').prop("disabled", true);
          $('#datepicker2').prop("disabled", true);
          $('#descriptiontxtbox').prop("disabled", true);
          $('#venuetxtbox').prop("disabled", true);
          $('#enptxtbox').prop("disabled", true);
          $('#remarks').prop("disabled", true);

          $('#myModal').modal('show');

          $('#myModal').find('#eventid').val(event.id);
          $('#myModal').find('#titletxtbox').val(event.title);
          $('#myModal').find('#datepicker1').val(moment(event.start).format('MM/DD/YYYY'));
          if (event.end == '0000-00-00 00:00:00' || event.end == null || event.end == '1970-01-01 00:00:00') {
            $('#myModal').find('#datepicker2').val('');
          } else {
            $('#myModal').find('#datepicker2').val(moment(event.end).subtract(1, "days").format('MM/DD/YYYY'));

          }
          // $('#myModal').find('#datepicker2').val(moment(event.end).format('MM/DD/YYYY'));
          $('#myModal').find('#datepicker3').val(moment(event.posteddate).format('MM/DD/YYYY'));
          $('#myModal').find('#descriptiontxtbox').val(event.description);
          $('#myModal').find('#remarks').val(event.remarks);
          $('#myModal').find('#postedby').val(event.postedby);
          $('#myModal').find('#venuetxtbox').val(event.venue);
          $('#myModal').find('#enptxtbox').val(event.enp);


        },
        eventRender: function(calEvent, element, view) {

          var show_username, show_type = true,
            show_calendar = true;
          //  ===================


          if ($('input[id=ord]').is(':checked')) {
            $("#all").prop("checked", false);
          } else if ($('input[id=fad]').is(':checked')) {
            $("#all").prop("checked", false);
          } else if ($('input[id=lgcdd]').is(':checked')) {
            $("#all").prop("checked", false);
          } else if ($('input[id=mbrtg]').is(':checked')) {
            $("#all").prop("checked", false);
          } else if ($('input[id=lgmed]').is(':checked')) {
            $("#all").prop("checked", false);
          } else if ($('input[id=pdmu]').is(':checked')) {
            $("#all").prop("checked", false);
          }
          if ($('input[id=ord]').is(':checked') &&
            $('input[id=fad]').is(':checked') &&
            $('input[id=lgcdd]').is(':checked') &&
            $('input[id=mbrtg]').is(':checked') &&
            $('input[id=lgmed]').is(':checked') &&
            $('input[id=pdmu]').is(':checked') &&
            $('input[id=cavite]').is(':checked') &&
            $('input[id=batangas]').is(':checked') &&
            $('input[id=laguna]').is(':checked') &&
            $('input[id=rizal]').is(':checked') &&
            $('input[id=quezon]').is(':checked') &&
            $('input[id=lucena]').is(':checked')
          )

          {
            $("#all").prop("checked", true);
          }
          // ===========================================================




          if ($('input[id=all]').is(':checked')) {

            return ['0', calEvent.office].indexOf($('#selectDivision').val()) >= 0
          } else {
            var types = $('#type_filter').val();
            if (types && types.length > 0) {
              if (types[0] == "all") {
                show_type = true;

                return show_type;
              } else {
                show_type = types.indexOf(calEvent.title) >= 0;
                return show_type;
              }
              return show_type;
            }
            return filter(calEvent);
          }


          // ============================


        },



        events: [
          <?php
          foreach ($events as $event) :

            $start = explode(" ", $event['start']);
            $end = explode(" ", $event['end']);
            if ($start[1] == '00:00:00') {
              $start = $start[0];
            } else {
              $start = $event['start'];
            }
            if ($end[1] == '00:00:00') {
              $end =  date('Y-m-d', strtotime("+1 day", strtotime($end[0])));
            } else {
              $end = $event['end'];
            }


            $enddate = str_replace('-', '/', $end);
            $realenddate = date('Y-m-d', strtotime($enddate));

            if ($_SESSION['planningofficer'] == 1) {
              if (TRUE) {
          ?> {
                  id: '<?php echo $event['id']; ?>',
                  title: '<?php echo $event['title']; ?>',
                  start: '<?php echo $start; ?>',
                  end: '<?php echo $realenddate; ?>',
                  description: '<?php echo $event['description']; ?>',
                  venue: '<?php echo $event['venue']; ?>',
                  color: '<?php echo $event['color']; ?>',
                  office: '<?php echo $event['office']; ?>',
                  posteddate: '<?php echo $event['posteddate']; ?>',
                  remarks: '<?php echo preg_replace('/[^\w]/', ' ', $event['remarks']); ?>',
                  postedby: '<?php echo $event['UNAME']; ?>',
                  enp: '<?php echo $event['enp']; ?>',
                  hasConflict: false



                },
              <?php
              }
            } else {

              if (TRUE) {
              ?> {
                  id: '<?php echo $event['id']; ?>',
                  title: '<?php echo '' . $event['title']; ?>',
                  start: '<?php echo $start; ?>',
                  end: '<?php echo $realenddate; ?>',
                  description: '<?php echo $event['description']; ?>',
                  venue: '<?php echo $event['venue']; ?>',
                  color: '<?php echo $event['color']; ?>',
                  office: '<?php echo $event['office']; ?>',
                  posteddate: '<?php echo $event['posteddate']; ?>',
                  remarks: '<?php echo preg_replace('/[^\w]/', ' ', $event['remarks']); ?>',
                  postedby: '<?php echo $event['UNAME']; ?>',
                  enp: '<?php echo $event['enp']; ?>',
                  hasConflict: false

                },
          <?php
              }
            }
          endforeach;
          ?>
        ]


      });


      $('.export').click(function() {
        var month = $('.select_month').val();

        // window.location ="export_calendar.php?month=&division=<?php echo $_GET['division']; ?>"
      })
      // ==================================================
      $(".filter").keyup(function() {
        if ($('#type_filter').val() == '') {
          $("#all").prop("checked", true);
          $("#ord").prop("checked", true);
          $("#fad").prop("checked", true);
          $("#lgcdd").prop("checked", true);
          $("#lgmed").prop("checked", true);
          $("#mbrtg").prop("checked", true);
          $("#pdmu").prop("checked", true);
          $("#addll").prop("checked", true);
          $("#cavite").prop("checked", true);
          $("#laguna").prop("checked", true);
          $("#batangas").prop("checked", true);
          $("#quezon").prop("checked", true);
          $("#rizal").prop("checked", true);
          $("#lucena").prop("checked", true);
        } else {
          $("#all").prop("checked", false);
          $("#ord").prop("checked", false);
          $("#fad").prop("checked", false);
          $("#lgcdd").prop("checked", false);
          $("#lgmed").prop("checked", false);
          $("#mbrtg").prop("checked", false);
          $("#pdmu").prop("checked", false);
          $("#addll").prop("checked", false);
          $("#cavite").prop("checked", false);
          $("#laguna").prop("checked", false);
          $("#batangas").prop("checked", false);
          $("#quezon").prop("checked", false);
          $("#rizal").prop("checked", false);
          $("#lucena").prop("checked", false);

        }

        $('#calendar').fullCalendar('rerenderEvents');
      });
      // ===================================================
      $('#selectDivision').hide();

      // ===================================================
      $(".select_month").on("change", function(event) {
        $('#calendar').fullCalendar('changeView', 'month', this.value);
        $('#calendar').fullCalendar('gotoDate', "2020-" + this.value + "-1");
      });



      // $('.calFilter').on('change', function() {
      //     $('.calFilter').not(this).prop('checked', false);  
      // });
      $('input[type=radio][name=user_selector]').on('change', function() {
        $('#calendar').fullCalendar('rerenderEvents');
      });
      /* When a checkbox changes, re-render events */
      $('input:checkbox.calFilter').on('change', function() {
        $('#calendar').fullCalendar('rerenderEvents');
      });
    });

    var months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];;
    var date = new Date();
    var month = months[date.getMonth()];
    switch (month) {
      case 'January':
        $("#selectMonth").append('<select class="select_month form-control"><option value="1" selected>January</option><option value="2">February</option><option value="3">March</option><option value="4">April</option><option value="5">May</option><option value="6">June</option><option value="7">July</option><option value="8">August</option><option value="9">September</option><option value="10">October</option><option value="11">November</option><option value="12">December</option></select>');
        break;
      case 'February':
        $("#selectMonth").append('<select class="select_month form-control"><option value="1">January</option><option value="2" selected>February</option><option value="3">March</option><option value="4">April</option><option value="5">May</option><option value="6">June</option><option value="7">July</option><option value="8">August</option><option value="9">September</option><option value="10">October</option><option value="11">November</option><option value="12">December</option></select>');
        break;
      case 'March':
        $("#selectMonth").append('<select class="select_month form-control"><option value="1">January</option><option value="2">February</option><option value="3" selected>March</option><option value="4">April</option><option value="5">May</option><option value="6">June</option><option value="7">July</option><option value="8">August</option><option value="9">September</option><option value="10">October</option><option value="11">November</option><option value="12">December</option></select>');
        break;
      case 'April':
        $("#selectMonth").append('<select class="select_month form-control"><option value="1">January</option><option value="2">February</option><option value="3">March</option><option value="4" selected>April</option><option value="5">May</option><option value="6">June</option><option value="7">July</option><option value="8">August</option><option value="9">September</option><option value="10">October</option><option value="11">November</option><option value="12">December</option></select>');
        break;
      case 'May':
        $("#selectMonth").append('<select class="select_month form-control"><option value="1">January</option><option value="2">February</option><option value="3">March</option><option value="4">April</option><option value="5" selected>May</option><option value="6">June</option><option value="7">July</option><option value="8">August</option><option value="9">September</option><option value="10">October</option><option value="11">November</option><option value="12">December</option></select>');
        break;
      case 'June':
        $("#selectMonth").append('<select class="select_month form-control"><option value="1">January</option><option value="2">February</option><option value="3">March</option><option value="4">April</option><option value="5">May</option><option value="6" selected>June</option><option value="7">July</option><option value="8">August</option><option value="9">September</option><option value="10">October</option><option value="11">November</option><option value="12">December</option></select>');
        break;
      case 'July':
        $("#selectMonth").append('<select class="select_month form-control"><option value="1">January</option><option value="2">February</option><option value="3">March</option><option value="4">April</option><option value="5">May</option><option value="6">June</option><option value="7" selected>July</option><option value="8">August</option><option value="9">September</option><option value="10">October</option><option value="11">November</option><option value="12">December</option></select>');
        break;
      case 'August':
        $("#selectMonth").append('<select class="select_month form-control"><option value="1">January</option><option value="2">February</option><option value="3">March</option><option value="4">April</option><option value="5">May</option><option value="6">June</option><option value="7">July</option><option value="8" selected>August</option><option value="9">September</option><option value="10">October</option><option value="11">November</option><option value="12">December</option></select>');
        break;
      case 'September':
        $("#selectMonth").append('<select class="select_month form-control"><option value="1">January</option><option value="2">February</option><option value="3">March</option><option value="4">April</option><option value="5">May</option><option value="6">June</option><option value="7">July</option><option value="8">August</option><option value="9" selected>September</option><option value="10">October</option><option value="11">November</option><option value="12">December</option></select>');
        break;
      case 'October':
        $("#selectMonth").append('<select class="select_month form-control"><option value="1">January</option><option value="2">February</option><option value="3">March</option><option value="4">April</option><option value="5">May</option><option value="6">June</option><option value="7">July</option><option value="8">August</option><option value="9">September</option><option value="10" selected>October</option><option value="11">November</option><option value="12">December</option></select>');
        break;
      case 'November':
        $("#selectMonth").append('<select class="select_month form-control"><option value="1">January</option><option value="2">February</option><option value="3">March</option><option value="4">April</option><option value="5">May</option><option value="6">June</option><option value="7">July</option><option value="8">August</option><option value="9">September</option><option value="10">October</option><option value="11" selected>November</option><option value="12" >December</option></select>');
        break;
      case 'December':
        $("#selectMonth").append('<select class="select_month form-control"><option value="1">January</option><option value="2">February</option><option value="3">March</option><option value="4">April</option><option value="5">May</option><option value="6">June</option><option value="7">July</option><option value="8">August</option><option value="9">September</option><option value="10">October</option><option value="11">November</option><option value="12" selected>December</option></select>');
        break;
    }
    //   var array = [];
    //   var [a,b] = '';
    //   $('input[type="checkbox"]').bind('click',function() {
    //   if($(this).is(':checked')) {
    //     [a,b] = [array.push($(this).val())];
    //   }
    // });

    $('#export').click(function() {
      var values = [].filter.call(document.getElementsByName('offices[]'), function(c) {
        return c.checked;
      }).map(function(c) {
        return c.value;
      });
      var a = JSON.stringify(values);
      var array = $.parseJSON(a);

      // console.log(array);



      // 
      var getmonth = $(".select_month").val();
      var getYear = $("#selectYear").val();

      window.location = "export_calendar.php?office_id=" + array + "&&month=" + getmonth + "&&year=" + getYear + "&date=<?php echo date("Y-m-d"); ?>&division=<?php echo $_GET['division']; ?>"
    });




    function filter(calEvent) {
      var vals = [];
      $('input:checkbox.calFilter:checked').each(function() {
        vals.push($(this).val());
        // alert(vals.push($(this).val()));
      });

      return vals.indexOf(calEvent.office) !== -1;


    }
  </script>
  <script>
    var newEvent;
    var editEvent;

    $(document).ready(function() {



      //WEATHER GRAMATICALLY

      function retira_acentos(str) {
        var com_acento = "ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝRÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûüýþÿr";
        var sem_acento = "AAAAAAACEEEEIIIIDNOOOOOOUUUUYRsBaaaaaaaceeeeiiiionoooooouuuuybyr";
        var novastr = "";
        for (i = 0; i < str.length; i++) {
          troca = false;
          for (a = 0; a < com_acento.length; a++) {
            if (str.substr(i, 1) == com_acento.substr(a, 1)) {
              novastr += sem_acento.substr(a, 1);
              troca = true;
              break;
            }
          }
          if (troca == false) {
            novastr += str.substr(i, 1);
          }
        }
        return novastr.toLowerCase().replace(/\s/g, '-');
      }

      //WEATHER THEMES

      // document.getElementById('switchWeatherTheme').addEventListener('change', function(){

      //   var valueTheme = $(this).val();
      //   var widget = document.querySelector('.weatherwidget-io');
      //   widget.setAttribute('data-theme', valueTheme);
      //   __weatherwidget_init();

      // });

      //WEATHER LOCATION
      var input = document.getElementById('searchTextField');
      var autocomplete = new google.maps.places.Autocomplete(input);

      google.maps.event.addListener(autocomplete, 'place_changed', function() {
        var place = autocomplete.getPlace();
        var latitude = place.geometry.location.lat();
        var longitude = place.geometry.location.lng();
        var newPlace = retira_acentos(place.name);

        var urlDataWeather = 'https://forecast7.com/en/' + latitude.toFixed(2).replace(/\./g, 'd').replace(/\-/g, 'n') + longitude.toFixed(2).replace(/\./g, 'd').replace(/\-/g, 'n') + '/' + newPlace + '/';

        alert(urlDataWeather);

        var weatherWidget = document.querySelector('.weatherwidget-io');
        weatherWidget.href = urlDataWeather;
        weatherWidget.dataset.label_1 = place.name;
        __weatherwidget_init();

        //document.getElementById('city2').value = place.name;
        //document.getElementById('cityLat').value = place.geometry.location.lat();
        //document.getElementById('cityLng').value = place.geometry.location.lng();
        //alert("This function is working!");
        //alert(place.name);
        // alert(place.address_components[0].long_name);

      });

    });
  </script>
  </body>

</html>