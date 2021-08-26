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
  <link rel="stylesheet" href="BURS/CSS/ribbon.css">
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

        <?php include 'BURS/views/burs_filter.php'; ?>

        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12">
            <?php include('BURS/views/burs_table.php'); ?>
            <?php //include('obligationburstable.php'); 
            ?>

          </div>
        </div>

      </section>
    </div>
    <!-- Modal -->


    <br>

    <footer class="main-footer">
      <br>
      <div class="pull-right hidden-xs">
        <b>Version</b> 1.0
      </div>
      <strong>DILG IV-A Regional Information and Communications Technology Unit (RICTU) © 2019 All Right Reserved .</strong>

    </footer>
  </div>

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
          <!-- <input type="text" name="burs" value="burs" /> -->
          <textarea cols=85 rows=5 style="outline:none;resize:none;" name="reason"></textarea>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
        </form>
      </div>
    </div>
  </div>
  <div class="modal fade" id="viewPanel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" style="width: 50%;">
      <div class="modal-content view-body">
        <div class="ribbon ribbon-top-right"><span class="status"></span></div>

        <div class="modal-header" style="padding: 1rem;">
          <h3 class="modal-title text-light" id="exampleModalLabel">BURS: Viewing ORS Data</h3>
        </div>
        <div class="modal-body  ">
          <br><br>
          <div>
            <div class="row">
              <div class="col-md-12">

                <div>
                  <div class="box-header with-border">
                    <div class="class-bordered well">
                      <div class="row">
                        <div class="col-md-6">
                          <label>BURS Serial Number</label>
                          <input type=" text" value="" class="form-control burs" style="height: 35px;" id="" placeholder="Enter ORS Number" name="ors" value="" disabled>
                          <label>PO NO.</label>
                          <input type=" text" class="typeahead form-control ponum" style="height: 35px;" id="" placeholder="Search PO Number" name="ponum" value="" disabled>
                        </div>

                        <div class="col-md-6">
                          <label>Date Received</label>
                          <div class="input-group date">
                            <div class="input-group-addon">
                              <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control pull-right datereceived" id="datepicker1" placeholder='Enter Date' name="datereceived" value="" disabled>
                          </div>

                          <label>Date Processed</label>
                          <div class="input-group date">
                            <div class="input-group-addon">
                              <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control pull-right datereprocessed" id="datepicker2" placeholder='Enter Date' name="datereprocessed" value="" disabled>
                          </div>
                        </div>
                      </div>
                    </div>


                    <div class="class well">
                      <!-- ORS -->
                      <div class="row">
                        <div class="col-md-6">
                          <label>Payee/Supplier</label>
                          <input type="text" class="form-control payee" style="height: 35px;" id="payee" placeholder="Payee" name="payee" value="" disabled>

                          <label>Particular/Purpose</label>
                          <input type="text" readonly class="form-control particular" style="height: 35px;" id="particular" placeholder="Particular" name="particular" value="" disabled>

                        </div>



                        <div class="col-md-6">
                          <label>Date Returned</label>

                          <div class="input-group date">
                            <div class="input-group-addon">
                              <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control pull-right datereturned" id="datepicker3" placeholder='Enter Date' name="datereturned" value="" disabled>
                          </div>


                          <label>Date Released</label>

                          <div class="input-group date">
                            <div class="input-group-addon">
                              <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control pull-right datereleased" id="datepicker4" placeholder='Enter Date' name="datereleased" value="" disabled>

                          </div>

                        </div>

                      </div>


                      <br>
                      <div class="row">
                        <div class="col-md-3">
                          <label>Fund Source</label>
                          <input type="text" class="form-control saronumber" style="height: 40px;" id="saronum" placeholder="Fund Source" name="saronum" value="" class="typeahead" disabled />
                          <!-- <input type="text" name="txtCountry" id="txtCountry" class="typeahead"/> -->
                          <table class="table table-striped table-hover" id="main1">
                            <tbody id="result1">
                            </tbody>
                          </table>
                        </div>


                        <div class="col-md-3">
                          <label>PPA</label>
                          <input type="text" class="form-control ppa" style="height: 40px;" id="ppa" placeholder="PPA" name="ppa" value="" disabled>
                        </div>
                        <div class="col-md-2">
                          <label>UACS Code</label>
                          <input type="text" class="form-control uacs" style="height: 40px;" id="uacs" placeholder="UACS Code" name="uacs" value="" disabled>
                        </div>
                        <div class="col-md-2">
                          <label>Amount</label>
                          <input type="text" class="form-control amount" style="height: 40px;" id="" placeholder="Amount" name="amount" value="" readonly>
                        </div>

                      </div>



                      <!-- END SARO -->


                    </div>
                    <!-- End Menu -->
                    <!-- End Panel -->
                    <!-- Submit -->
                  </div>
                </div>
              </div>
            </div>
          </div </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="editPanel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
      <div class="ribbon ribbon-top-right"><span class="status"></span></div>
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
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
        </form>
      </div>
    </div>
  </div>



    <script src="bower_components/jquery/dist/jquery.min.js"></script>
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <script src="bower_components/fastclick/lib/fastclick.js"></script>
    <script src="dist/js/adminlte.min.js"></script>
    <script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <script src="BURS/js/custom.js"></script>
    <link rel="stylesheet" href="bower_components/select2/dist/css/select2.min.css">
    <script src="bower_components/select2/dist/js/select2.full.min.js"></script>
    <script src="_includes/sweetalert.min.js" type="text/javascript"></script>
    <link rel="stylesheet" href="_includes/sweetalert.css">

    <script>
      $(function() {
        $('#example2').DataTable()
        $('#example1').DataTable({
          'paging': false,
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