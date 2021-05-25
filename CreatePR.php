<?php session_start();
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
?>
<!DOCTYPE html>
<html>
<title>FAS | Create PR</title>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="shortcut icon" type="image/png" href="dilg.png">

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
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

</head>

<?php
if ($username == 'charlesodi' || $username == 'mmmonteiro' || $username == 'cvferrer' || $username == 'masacluti' || $username == 'seolivar') {
  include('test1.php');
} else {

  if ($OFFICE_STATION == 1) {
    include('sidebar2.php');
  } else {
    include('sidebar3.php');
  }
}
?>
<div class="content-wrapper">
  <section class="content-header">
    <br>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Procurement</li>
      <li class="active">Create PR</li>
    </ol><br>
    <?php include('pr.php'); ?>

  </section>
</div>
<footer class="main-footer">
  <div class="pull-right hidden-xs">
    <b>Version</b> 1.0
  </div>
  <strong>DILG IV-A Regional Information and Communications Technology Unit (RICTU) © 2019 All Right Reserved .</strong>
</footer>

<script src="bower_components/jquery/dist/jquery.min.js"></script>
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<script src="dist/js/adminlte.min.js"></script>
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="_includes/sweetalert.css">
<link href="_includes/sweetalert2.min.css" rel="stylesheet" />
<script src="_includes/sweetalert2.min.js" type="text/javascript"></script>


<script>
  $(document).ready(function() {
    var table = $('#example1').DataTable({
      "lengthChange": false

    });
 
 $('#example1 tbody').on( 'click', 'tr', function () {
      var data = table.row(this).data();
      $('#id').val(data[0]);
      $('#stocknumber').val(data[2]);
      $('#unit').val(data[5]);
      $('#abc').val(data[3]);
   
 } );
    // $('#add').click(function(){
    //   var data = table.row(this).data();
    //   $('#stocknumber').val(data[0]);


    // })
    // $('#examplee1 tbody').on('click', 'tr', function() {
    //   $('#stocknumber').val(data[0]);
    //   // alert('You clicked on ' + data[0] + '\'s row');
    //   // swal({
    //   //   title: '',
    //   //   html: '' +
    //   //     '<textarea id="swal-input1" cols="45" rows="15" ></textarea>' +
    //   //     '<input type="number"id="swal-input2" class="swal2-input" placeholder="Quantity">',
    //   //   preConfirm: function() {
    //   //     return new Promise(function(resolve) {
    //   //       if (true) {
    //   //         resolve([
    //   //           document.getElementById('swal-input1').value,
    //   //           document.getElementById('swal-input2').value
    //   //         ]);
    //   //       }
    //   //     });
    //   //   }
    //   // }).then(function(result) {
    //   //   swal(JSON.stringify(result));
    //   // })






    // });

    $('#datepicker1').datepicker({
      autoclose: true
    })
    $('#datepicker2').datepicker({
      autoclose: true
    })
  });
</script>