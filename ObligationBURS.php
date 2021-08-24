<?php session_start();
include 'controller/BURSController.php'; // call db.class.php

if (!isset($_SESSION['username'])) {
  header('location:index.php');
} else {
  error_reporting(0);
  ini_set('display_errors', 0);
  $username = $_SESSION['username'];
}
?>
<?php require_once 'menu_checker.php'; ?>
<?php $menuchecker = menuChecker('view_burs'); ?>
<!DOCTYPE html>
<html>
<!-- <style>
  a:hover {
  color: blue;
}
  .p:hover {
  color: blue;
}
  span:hover {
  color: blue;
}
</style> -->
<title>FAS | Obligation</title>

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
  <style>
    th {
      color: #a9242d;
      text-align: center;
    }

    td {
      text-align: left;
    }
  </style>
</head>

<body class="hold-transition skin-red-light fixed sidebar-mini">
  <div class="wrapper">
    <?php include('test1.php'); ?>

    <div class="content-wrapper">
      <section class="content-header">
        <ol class="breadcrumb">
          <li><a href="home.php"><i class=""></i> Home</a></li>
          <li class="active">Budget</li>
          <li class="active">Obligation</li>
        </ol>
        <?php include 'ORS/views/ors_dashboard.php'; ?>

        <?php include 'ORS/views/ors_filter.php'; ?>

        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12">
            <?php include('BURS/views/burs_table.php'); ?>
            <?php //include('obligationburstable.php'); ?>

          </div>
        </div>

      </section>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Reason:</h5>
            <form method="POST" action="entity/post_return.php?division=<?php echo $_GET['division']; ?>">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
            <input type="hidden" name="burs_id" id="id" />
            <input type="hidden" name="burs" value="burs" />
            <textarea cols=85 rows=5 style="outline:none;resize:none;" name="reason">a</textarea>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
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



        <script src="bower_components/jquery/dist/jquery.min.js"></script>
        <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
        <script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
        <script src="bower_components/fastclick/lib/fastclick.js"></script>
        <script src="dist/js/adminlte.min.js"></script>
        <script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

        <script>
          $(function() {
            $('#example2').DataTable()
            $('#example1').DataTable({
              'paging': true,
              'lengthChange': false,
              'searching': true,
              'ordering': false,
              'info': false,
              'autoWidth': false
            })
          })
        </script>

        <script>
          $(document).ready(function() {
            $('#datepicker1').datepicker({
              autoclose: true
            })
            $('#datepicker2').datepicker({
              autoclose: true
            })
          });
        </script>
        <!-- ============================================= -->

        <script type="text/javascript">
          $(document).ready(function() {
            $('#example1').DataTable();



          });
          $(document).ready(function() {

            $('.btn-return').click(function() {

              let id = $(this).data('id');
              $('#id').val(id);

              // AJAX request
              $('#exampleModal').modal('show');
            });

            $('#datepicker1').datepicker({
              autoclose: true
            })
            $('#datepicker2').datepicker({
              autoclose: true
            })
          });
        </script>

        <script>
          $(function() {
            //Initialize Select2 Elements


            //Date picker,
            $('#datepicker1').datepicker({
              autoclose: true
            })

            $('#datepicker2').datepicker({
              autoclose: true
            })
            $('#datepicker3').datepicker({
              autoclose: true
            })
            $('#datepicker4').datepicker({
              autoclose: true
            })


          })
        </script>
        <script>
          $(document).ready(function() {
            table = document.getElementById("item_table");

            tr = table.getElementsByTagName("th");
            var td = document.getElementById("tdvalue");

            if (td <= 0) {
              $('#finalizeButton').attr('disabled', 'disabled');
            } else {
              $('#finalizeButton').attr('enabled', 'enabled');
            }

            $('.link').click(function() {

              var f = $(this);
              var id = f.data('id');

              var pr_no = $('#pr_no').val();
              var pr_date = $('#pr_date').val();
              var pmo = $('#pmo').val();
              var purpose = $('#purpose').val();

              window.location =
                'ViewPRdetails1.php?data=' + id + '&pr_no=' + pr_no + '&pr_date=' + pr_date + '&pmo=' + pmo + '&purpose=' + purpose;
            });
          });
        </script>


</body>

</html>