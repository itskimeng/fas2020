<?php session_start();
include 'controller/ObligationRequestController.php'; // call db.class.php

if (!isset($_SESSION['username'])) {
  header('location:index.php');
} else {
  error_reporting(0);
  ini_set('display_errors', 0);
  $username = $_SESSION['username'];
}
?>
<?php require_once 'menu_checker.php'; ?>
<?php $menuchecker = menuChecker('ors_burs'); ?>
<!DOCTYPE html>
<html>
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


/* common */
.ribbon {
    width: 150px;
    height: 150px;
    overflow: hidden;
    position: absolute;
}

.ribbon::before,
.ribbon::after {
    position: absolute;
    z-index: -1;
    content: '';
    display: block;
    border: 5px solid #2980b9;
}

.ribbon span {
    position: absolute;
    display: block;
    width: 225px;
    padding: 15px 0;
    background-color: #3498db;
    box-shadow: 0 5px 10px rgba(0, 0, 0, .1);
    color: #fff;
    font: 700 18px/1 'Lato', sans-serif;
    text-shadow: 0 1px 1px rgba(0, 0, 0, .2);
    text-transform: uppercase;
    text-align: center;
    left: 50px;
  top: 100px;
}


/* top right*/
.ribbon-top-right {
    top: -10px;
    right: -10px;
}

.ribbon-top-right::before,
.ribbon-top-right::after {
    border-top-color: transparent;
    border-right-color: transparent;
}

.ribbon-top-right::before {
    top: 0;
    left: 0;
}

.ribbon-top-right::after {
    bottom: 0;
    right: 0;
}

.ribbon-top-right span {
    left: -25px;
    top: 30px;
    transform: rotate(45deg);
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
        <!-- ==============================DASH =============================== -->
        <?php //include 'ORS/views/ors_dashboard.php'; ?>
        <?php include 'ORS/views/ors_filter.php'; ?>




        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12">
            <?php include('ORS/views/ors_table.php'); ?>

          </div>
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
                <input type="hidden" name="ors_id" id="id" />
                <textarea cols=90 rows=5 style="outline:none;resize:none;" name="reason"></textarea>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
              </div>
              </form>
            </div>
          </div>
        </div>

        <div class="modal fade" id="editPanel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document" >
            <div class="modal-content">
            <div class="ribbon ribbon-top-right"><span class="status">DD</span></div>
              <div class="modal-header" style="background-color:#bce8f1;color:#31708f;height:60px;">
                <h2 class="modal-title" id="exampleModalLabel"><b>ORS No.<span id="ors"></span></b></h2>
                  
              </div>
              <div class="modal-body">
              <table id="example" class="table table-responsive table-stripped table-bordered " style="background-color: white; width:80%; text-align:center; border-style: groove;">
                  <thead>
                    <tr>

                      <th width='500'>ID</th>
                      <th width='800'>FUND SOURCE</th>
                      <th width='500'>PPA </th>
                      <th width='500'>UACS </th>
                      <th width='500'>AMOUNT </th>
                      <th width='700'>ACTION</th>

                  </thead>
                  <tbody id="table-body">
                    <tr>
                    
               
           
                    </tr>
                  </tbody>

                </table>

              </div>
             
              </form>
            </div>
          </div>
        </div>
        <div class="modal fade" id="deletePanel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                <input type="hidden" name="ors_id" id="id" />
                <textarea cols=90 rows=5 style="outline:none;resize:none;" name="reason"></textarea>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
              </div>
              </form>
            </div>
          </div>
        </div>
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
  <?php include 'ORS/views/ors_view_modal.php'; ?>


  <script src="bower_components/jquery/dist/jquery.min.js"></script>
  <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
  <script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
  <script src="bower_components/fastclick/lib/fastclick.js"></script>
  <link rel="stylesheet" href="bower_components/select2/dist/css/select2.min.css">

  <script src="dist/js/adminlte.min.js"></script>
  <script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
  <script src="bower_components/select2/dist/js/select2.full.min.js"></script>
  

  <script src="ORS/js/custom.js"></script>

  <script>
    $(function() {
      $('#example1').DataTable({
        'paging': false,
        'lengthChange': false,
        'searching': true,
        'ordering': false,
        'info': false,
        'autoWidth': false

      })
    })

 


    $('#datepicker3').datepicker({
      autoclose: true
    })
    $('#datepicker2').datepicker({
      autoclose: true
    })
  </script>

  <!-- ===================== -->




  </script>
</body>

</html>