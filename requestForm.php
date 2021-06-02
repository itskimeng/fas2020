<?php
session_start();
date_default_timezone_set('Asia/Manila');

if (!isset($_SESSION['username'])) {
  header('location:index.php');
} else {
  error_reporting(0);
  ini_set('display_errors', 0);
  $username = $_SESSION['username'];
}
?>
<?php require_once 'menu_checker.php'; ?>
<?php $menuchecker = menuChecker('ict_ta'); ?>
<!DOCTYPE html>
<html>
<style>
  .label-text {
    font-weight: bold;
  }
</style>
<title>FAS | ICT Technical Assistance</title>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>FAS | Dashboard</title>
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

<body class="hold-transition skin-red-light fixed sidebar-mini">
  <div class="wrapper">
    <?php

    if ($_GET['division'] == 10 || $_GET['division'] == 11 || $_GET['division'] == 12 || $_GET['division'] == 13 || $_GET['division'] == 14 || $_GET['division'] == 16) {
      include('test1.php');
    } else {
      include('sidebar2.php');
    }
    ?>

    <div class="content-wrapper">
      <section class="content-header">
        <ol class="breadcrumb">
          <li><a href="home.php"><i class=""></i> Home</a></li>
          <li class="active">ICT Technical Assistance</li>
        </ol>
        <br>
        <br>

        <?php include('reqForm.php'); ?>

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
  </div>

  <script src="_includes/sweetalert.min.js"></script>

  <script src="bower_components/jquery/dist/jquery.min.js"></script>
  <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
  <script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
  <script src="bower_components/fastclick/lib/fastclick.js"></script>
  <!-- <script src="dist/js/adminlte.min.js"></script> -->
  <script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>


  <script src="bower_components/jquery/dist/jquery.min.js"></script>
  <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
  <script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
  <script src="bower_components/fastclick/lib/fastclick.js"></script>
  <script src="dist/js/adminlte.min.js"></script>
  <script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>


  <script>
    $(document).ready(function() {
      $('#datepicker1').datepicker({
        autoclose: true
      })
    });
    $(".datePicker1").datepicker({
      changeMonth: true,
      changeYear: true,
      yearRange: "1950:2020",
      dateFormat: 'M dd, yy'
    });
    $(".datePicker1").datepicker().datepicker("setDate", new Date());
  </script>

  <script>
    $('document').ready(function() {
      $('textarea').each(function() {
        $(this).val($(this).val().trim());
      });
    });
    $(function() {
      $('#example2').DataTable()
      $('#example1').DataTable({
        'paging': true,
        'lengthChange': true,
        'searching': true,
        'ordering': false,
        'info': true,
        'autoWidth': true
      })
    })
  </script>

  <script>
    function hidePanel(idName)
    {
      var x = document.getElementById(idName);
    if (x.classList.contains("hide")) {
      x.classList.remove("hide");
    } else {
      x.classList.add("hide");

    }
    }
  </script>