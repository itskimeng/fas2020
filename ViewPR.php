<?php session_start();
if (!isset($_SESSION['username'])) {
  header('location:index.php');
} else {
  error_reporting(0);
  ini_set('display_errors', 0);
  $OFFICE_STATION = $_SESSION['OFFICE_STATION'];
  $username = $_SESSION['username'];
  $DEPT_ID = $_SESSION['DEPT_ID'];
}


// =====================================
?>
<!DOCTYPE html>
<html>

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>FAS | Purchase Request</title>
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
  <!-- Daterange picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

</head>

<body class="hold-transition skin-red-light fixed  sidebar-mini">
  <div class="wrapper">
    <?php
    if ($username == 'mmmonteiro'  || $username == 'masacluti' || $username == 'seolivar' || $username == 'aoiglesia') {
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
        <ol class="breadcrumb">
          <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Procurement</li>
          <li class="active">Purchase Request</li>
        </ol>
        <br>
        <br>

        <?php
          include('pr_table.php');
        ?>
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
  <script src="bower_components/jquery/dist/jquery.min.js"></script>
  <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
  <script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
  <script src="bower_components/fastclick/lib/fastclick.js"></script>
  <script src="dist/js/adminlte.min.js"></script>

  <script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
  <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">

  <script>
    $(document).ready(function() {
      $(".btn-tool-filter").click(function() {
        $(".card-body-filter").collapse('toggle');
      });
    })


    $(function() {
      $('#example1').DataTable({
        'paging': true,
        'lengthChange': false,
        'searching': true,
        'ordering': false,
        'info': false,
        'autoWidth': true
      })
    })

    $(document).ready(function() {
      $('#datepicker2').datepicker({
        autoclose: true
      })
      $(document).on('click', '#btn-filter', function() {
        let path = 'entity/filter_pr.php';
        let data = {
          pr_date: $('#datepicker2').val(),
          office: $('#office').val(),

        };

        $.get(path, data, function(data, status) {
          // $('#example1').empty();
          let lists = JSON.parse(data);
          $('#example1').dataTable().fnClearTable();
          $('#example1').dataTable().fnDestroy();
          generateMainTable(lists);
          $('#example1').DataTable({
           'lengthChange': true,
				      'searching'   : true,
				      'ordering'    : false,
				      'info'        : true,
				      'autoWidth'   : false,
          })
        });
      });

 
     
    });
  </script>
  <script type ="text/javascript">
 function generateMainTable($data) {
        $.each($data, function(key, item) {

          let tr = '<tr>';
          tr += '<td>' + item['pr_no'] + '</td>';
          tr += '<td>' + item['pr_date'] + '</td>';
          tr += '<td>' + item['pmo'] + '</td>';
          tr += '<td>' + item['type'] + '</td>';
          tr += '<td>' + item['purpose'] + '</td>';
          tr += '<td>' + item['target_date'] + '</td>';
          tr += '<td>' + item['submitted_date_budget'] + '</td>';
          tr += '<td>' + item['budget_availability_status'] + '</td>';

          tr += '<td>' + item['received_date'] + '</td>';
          tr += '<td>' + item['submitted_date'] + '</td>';
          tr += '<td>';


          if (item['actions'] == null) {
            tr += '<a href="ViewPRv.php?id=' + item['id'] + ' title="View" class="btn btn-info btn-xs"> <i class="fa">&#xf06e;</i> View</a> | <a href="ViewRFQdetails.php?id=' + item['id'] + '" class="btn btn-primary btn-xs"> <i class="fa">&#xf044;</i> Edit</a>';
            if (item['cancelled'] == null) {
              tr += '<a data-toggle="modal" data-target="#modal-info_' + item['id'] + '" class="btn btn-warning btn-xs"><i class="fa fa-fw fa-close"></i>Cancel</a>';
            } else {
              tr += '<font style="color:red;">Canceled </font>' + item['cancelled'] + '';
            }
          } else {
            tr += '<a href="ViewPRv.php?id=' + item['id'] + ' title="View" class="btn btn-info btn-xs"> <i class="fa">&#xf06e;</i> View</a>';
            if (item['cancelled'] == null) {
              tr += '| <a data-toggle="modal" data-target="#modal-info_' + item['id'] + '" class="btn btn-warning btn-xs"><i class="fa fa-fw fa-close"></i>Cancel</a>';
            } else {
              tr += '| <font style="color:red;">Canceled </font>' + item['cancelled'] + '';
            }
          }

          tr += '</td>';


          tr += '</tr>';
          $('#example1').append(tr);
        });

        return $data;
      }
  </script>

</body>

</html>