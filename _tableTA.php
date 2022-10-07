<?php
session_start();
include('db.class.php'); // call db.class.php
$mydb = new db(); // create a new object, class db()
$division = $_GET['division'];

function countSubmitted()
{
  include 'connection.php';
  $a = ucwords(strtoupper($_SESSION['complete_name3']));
  $query = "SELECT count(*) as 'count_sub' FROM tbltechnical_assistance 
  where `STATUS_REQUEST` = 'Submitted' and `REQ_BY` = '".$a."' ";
  $result = mysqli_query($conn, $query);
  while($row = mysqli_fetch_array($result))
  {
    echo $row['count_sub'];
  }
}
function countReceived()
{
  include 'connection.php';
  $a = ucwords(strtoupper($_SESSION['complete_name3']));
  $query = "SELECT count(*) as 'count_rec' FROM tbltechnical_assistance 
  where `STATUS_REQUEST` = 'Received' and `REQ_BY` = '".$a."' ";
  $result = mysqli_query($conn, $query);
  while($row = mysqli_fetch_array($result))
  {
    echo $row['count_rec'];
  }
}
function countForAction()
{
  include 'connection.php'; 
  $a = ucwords(strtoupper($_SESSION['complete_name3']));
  $query = "SELECT count(*) as 'count_fa' FROM tbltechnical_assistance 
  where `STATUS_REQUEST` = 'For action' and `REQ_BY` = '".$a."' ";
  $result = mysqli_query($conn, $query);
  while($row = mysqli_fetch_array($result))
  {
    echo $row['count_fa'];
  }
}
function countCompleted()
{
  include 'connection.php';
  $a = ucwords(strtoupper($_SESSION['complete_name3']));
  $query = "SELECT count(*) as 'count_com' FROM tbltechnical_assistance 
  where `STATUS_REQUEST` = 'Completed' and `REQ_BY` = '".$a."' ";
  $result = mysqli_query($conn, $query);
  while($row = mysqli_fetch_array($result))
  {
    echo $row['count_com'];
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Procurement</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">


<style>
th{
  color:blue;
  text-align:center;
}
/* .dataTables_wrapper .dataTables_paginate {
    float: left;
} */

</style>
</head>

<body>
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="panel panel-defasult">
          <div class="box-body"> 
          
            <div>
                <h1>Monitoring of ICT Technical Assistance Request</h1><br>
                <?php 
                ?>
                
            </div>
            
     
            
            <?php
include 'connection.php';
            $name = $_SESSION['username'];
            $query = "SELECT * from tblemployeeinfo where UNAME = '$name'";
            $result = mysqli_query($conn,$query);
            if($row = mysqli_fetch_array($result))
            {
              if($_SESSION['username'] == 'masacluti' ||$_SESSION['username'] == 'seolivar' || $_SESSION['username'] == 'mmmonteiro' || $_SESSION['username'] == 'jecastillo' )
              {
                
  
                ?>
                  <div class="well">
                    <div class="row">
                        <div class="col-md-2">
                              <?php include 'current_month.php';?>
                        </div>
                        <div class="col-md-2">
                              <select class="form-control " id="selectYear" style="width: 100%;">
                                <?php 
                                for($i= 2020; $i < 2023; $i++)
                                {
                                 if($i==2022){
                                  echo '<option value='.$i.' selected>'.$i.'</option>';

                                 }else{
                                  echo '<option value='.$i.' >'.$i.'</option>';

                                 }
                                }
                                ?>
                              </select>
                              
                        </div>
                        <div class="col-md-2">
                          <ol style = "margin-left:-50px;"><button class="btn btn-primary" id = "fml"><i class="fa fa-file-excel-o"></i> Export PML Report</button></ol>
                        </div>&nbsp;
                        <div class="col-md-2" style = "margin-left:10px;">
                          <li class="btn btn-success" style = "margin-left:-40%;"><a  href="#" style="color:white;text-decoration: none;" id = "psl"><i class="fa fa-file-excel-o"></i> Export PSL Report</a></li>
                        </div>
                        <div class="col-md-2" style = "margin-left:-50px;">
                          <li class="btn btn-danger" style = "margin-left:-40%;"><a  href="#" style="color:white;text-decoration: none;" id = "css"><i class="fa fa-file-excel-o"></i> Export CSS Report</a></li>
                        </div>
  
                        <!-- <div class = "col-md-2" style = "float:right;margin-right:-30px;">
                          <li class="btn btn-success">
                          <a href="requestForm.php?division=<?php echo $_GET['division'];?>" style="color:white;text-decoration: none;">Create Request</a>
                          </li>

                        </div> -->
                    </div>
                  </div>
                <?php
              }
            }
          
            
            ?>
        
              <table id="example" class="table table-striped table-bordered table-responsive" style="background-color: white;">
                    <thead>
                        <th>CONTROL NO.</th>
                        <th>START DATE</th>
                        <th>START TIME</th>
                        <th>COMPLETED DATE</th>
                        <th>COMPLETED TIME</th>
                        <th>END USER</th>
                        <th>OFFICE</th>
                        <th>ISSUE/CONCERN</th>
                        <th>MODE OF REQUEST</th>
                        <th>ASSIGNED PERSON</th>
                        <th>STATUS</th>
                        <th style = "text-align:center;max-width:20%;">ACTION</th                        


                    </thead>
                        
                        


                </table>
      


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
      <script src="plugins/timepicker/bootstrap-timepicker.min.js"></script>
      <!-- SlimScroll -->
      <script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
      <!-- iCheck 1.0.1 -->
      <script src="plugins/iCheck/icheck.min.js"></script>
      <!-- FastClick -->
      <script src="bower_components/fastclick/lib/fastclick.js"></script>
      <!-- AdminLTE App -->
      <script src="dist/js/adminlte.min.js"></script>
      <!-- AdminLTE for demo purposes -->
      <!--<script src="dist/js/demo.js"></script>-->
      <!-- Page script -->
      <script>
     
  $(function () {
    let column_no = 0;

    $( '#table-filter' ).on( 'change', function () {
    // let months = ['January','February','March','April','May','June','July','August','September','October','November','December'];
    column_no = (this.value);
    }); 

  
    $('#fml').on('click', function()
    {
      let year = $('#selectYear').val();
      window.location = "_fmlReport.php?month="+column_no+"&year="+year;
    });

    $('#psl').on('click', function()
    {
      let year = $('#selectYear').val();

      window.location = "psl_iso.php?month="+column_no+"&year="+year;
    });

    $('#css').on('click', function()
    {
      let year = $('#selectYear').val();

      window.location = "cssPMLReport.php?month="+column_no+"&year="+year;
    });
    });

     
</script>


</div>
</div>


<div class="panel-footer"></div>
</div>
</div>

</body>
</html>
