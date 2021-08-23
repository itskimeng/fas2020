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
<?php
$id = $_GET['id'];
$conn = mysqli_connect("localhost", "fascalab_2020", "w]zYV6X9{*BN", "fascalab_2020");
// get data from db
$select = mysqli_query($conn, "SELECT ponum FROM saroob WHERE id = '$id '");

$row = mysqli_fetch_array($select);
$ponum = $row['ponum'];

$select_part = mysqli_query($conn, "SELECT * FROM burs WHERE po_no = '$ponum'");

$rowB = mysqli_fetch_array($select_part);
$supplier = $rowB['supplier'];
$purpose = $rowB['purpose'];
$doc_type = $rowB['doc_type'];
$amount = $rowB['amount'];
$date_received1 = $rowB['date_received'];
$date_return1 = $rowB['date_return'];
$po_no = $rowB['po_no'];

if ($date_return1 == NULL) {
  $date_return = $date_return1;
} else {
  $date_return = date("m-d-Y", strtotime($date_return1));
}

if ($date_received1 == NULL) {
  $date_received = $date_received1;
} else {
  $date_received = date("m-d-Y", strtotime($date_received1));
}
// end of get data from db

if (isset($_POST['submit'])) {

  $datereceived = $_POST['datereceived'];
  $d1 = date('Y-m-d', strtotime($datereceived));

  $datereprocessed = $_POST['datereprocessed'];
  $d2 = date('Y-m-d', strtotime($datereprocessed));

  $datereturned = $_POST['datereturned'];
  if ($datereturned == '') {
    $d3 = "";
  } else {
    $d3 = date('Y-m-d', strtotime($datereturned));
  }
  $datereleased = $_POST['datereleased'];
  $d4 = date('Y-m-d', strtotime($datereleased));

  $ors = $_POST['ors'];
  $po = $_POST['ponum'];
  $payee = $_POST['payee'];
  $particular = $_POST['particular'];
  $saronum = $_POST['saronum'];
  $ppa = $_POST['ppa'];
  $uacs = $_POST['uacs'];
  $amount = $_POST['amount'];
  $remarks = $_POST['remarks'];
  $sarogroup = $_POST['sarogroup'];
  // $status = $_POST['status'];
  $status = 'FROM GSS';

  //Update kasi meron ng data to sa pag submit palang ni user...
  $query = mysqli_query($conn, "UPDATE saroob SET  
  datereprocessed = now(),
   datereturned = '$d3',
    ors = '$ors', 
    ponum = '$po',
     payee = '$payee', 
     particular = '$particular',
      saronumber = '$saronum', ppa = '$ppa', uacs = '$uacs', amount = '$amount', remarks = '$remarks', sarogroup = '$sarogroup', status = '$status' WHERE ponum = '$ponum' ");

  // $query = mysqli_query($conn,"INSERT INTO saroob (datereceived,datereprocessed,datereturned,datereleased,ors,ponum,payee,particular,saronumber,ppa,uacs,amount,remarks,sarogroup,status) 
  // VALUES ('$d1','$d2 ','$d3','$d4','$ors','$po','$payee','$particular','$saronum','$ppa','$uacs','$amount','$remarks','$sarogroup','$status')");

  if ($query) {
    //updating obligation
    $update = mysqli_query($conn, "Update saro set obligated = obligated + $amount where saronumber = '$saronum' and uacs = '$uacs' ");
    //updating balance
    $update1 = mysqli_query($conn, "Update saro set balance = amount - obligated where saronumber = '$saronum' and uacs = '$uacs' ");
    // update nya lang stats sa burs para sa user buttons.
    $update2 = mysqli_query($conn, "UPDATE burs SET status = 4, date_proccess = now() WHERE id = '$ponum' ");

    header('Location:obligation.php?page=1&ipp=10&division='.$_GET['division'].'');

    $validate = mysqli_query($conn, "SELECT * FROM disbursement WHERE ors = '$ors' ");
  } else {
    header('Location:obligation.php?page=1&ipp=10&division='.$_GET['division'].'');

  }
}
?>
<!DOCTYPE html>

<html>
<?php
$connect = new PDO("mysql:host=localhost;dbname=fascalab_2020", "fascalab_2020", "w]zYV6X9{*BN");
function app($connect)
{
  $output = '';
  $query = "SELECT sarogroup FROM `saro` Group BY sarogroup ASC";
  $statement = $connect->prepare($query);
  $statement->execute();
  $result = $statement->fetchAll();
  foreach ($result as $row) {
    $output .= '<option text="text" value="' . $row["sarogroup"] . '">' . $row["sarogroup"] . '</option>';
  }
  return $output;
}

?>
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

<head>
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

<body class="hold-transition skin-red-light sidebar-mini">
  <div class="wrapper">
    <?php include('test1.php'); ?>

    <div class="content-wrapper">
      <section class="content-header">
        <ol class="breadcrumb">
          <li><a href="../frontend/web/"><i class=""></i> Home</a></li>
          <li class="active">Create Obligation</li>
        </ol>
        <br>
        <br>

        <!-- Start Panel -->
        <div class="panel panel-default">
          <br>

          <h1 align="">&nbspCreate Obligation</h1>
          <div class="box-header with-border">

            <br>
            <li class="btn btn-success"><a href="obligation.php" style="color:white;text-decoration: none;">Back</a></li>
            <br>
            <br>
            <!-- Start form -->
            <form method="POST">
              <!-- Start Menu -->
              <div class="class-bordered">
                <div class="row">
                  <div class="col-md-6">
                    <label>ORS Serial No.</label>
                    <input type="text" class="form-control" style="height: 35px;" id="" placeholder="Enter ORS Number" name="ors" required>
                    <br>
                    <label>PO No.</label>
                    <input value="<?php echo $po_no; ?>" type="text" class="form-control" style="height: 35px;" id="ponum" name="ponum">

                    <table class="table table-striped table-hover" id="main">
                      <tbody id="result">
                      </tbody>
                    </table>
                    <br>
                    <!-- Getting PO NUmber -->
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

              
                  </div>

                  <div class="col-md-6">
                    <label>Date Received</label>
                    <br>
                    <input readonly value="<?php echo $date_received; ?>" required type="text" class="form-control pull-right" id="datepicker1" placeholder='Enter Date' name="datereceived">
                    <br>
                    <br>
                    <br>
                    <label>Particular/Purpose</label>
                    <input readonly value="<?php echo $purpose; ?>" type="text" class="form-control" style="height: 35px;" id="particular" placeholder="Particular" name="particular">
                    <div hidden>
                      <label>Date Processed</label>
                      <br>
                      <div class="input-group date">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" class="form-control pull-right" id="datepicker2" placeholder='Enter Date' name="datereprocessed">
                        <br>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="class">
                <!-- ORS -->
                <div class="row">
                  <div class="col-md-6">
                    <label>Payee/Supplier</label>
                    <input readonly value="<?php echo $supplier; ?>" type="text" class="form-control" style="height: 35px;" id="payee" placeholder="Payee" name="payee">
                    <br>
                  </div>
                  <div class="col-md-6">
                    <div hidden>
                      <label>Date Returned</label>
                      <br>
                      <div class="input-group date">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input value="<?php echo $date_return; ?>" type="text" class="form-control pull-right" id="datepicker3" placeholder='Enter Date' name="datereturned">
                      </div>
                    </div>
                    <br>
                    <div hidden>
                      <label>Date Released</label>
                      <br>
                      <div class="input-group date">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" class="form-control pull-right" id="datepicker4" placeholder='Enter Date' name="datereleased">
                        <br>
                      </div>
                    </div>

                  </div>
                  <!-- @Funtions/obsearchvalue.php -->

                </div>
                <br>
                <!-- SARO -->
                <div class="row">
                  <div class="col-md-3">
                    <label>Fund Source</label>
                    <input required type="text" class="form-control" style="height: 40px;" id="saronum" placeholder="Fund Source" name="saronum" class="typeahead" />
                    <!-- <input type="text" name="txtCountry" id="txtCountry" class="typeahead"/> -->
                    <table class="table table-striped table-hover" id="main1">
                      <tbody id="result1">
                      </tbody>
                    </table>
                  </div>

                  <script>
                    $(document).ready(function() {
                      $("#result1").click(function() {
                        $("#main1").hide();
                      });
                    });
                  </script>
                  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
                  <script type="text/javascript">
                    $(document).ready(function() {
                      function load_data(query) {
                        $.ajax({
                          url: "@obsarosearch.php",
                          method: "POST",
                          data: {
                            query: query
                          },
                          success: function(data) {
                            $('#result1').html(data);
                          }
                        });
                      }
                      $('#saronum').keyup(function() {
                        var search = $(this).val();
                        if (search != '') {
                          load_data(search);
                        } else {
                          $("#main1").show();
                          load_data();
                          document.getElementById('saronum').value = "";
                          document.getElementById("main1").value = "";
                          document.getElementById("sarogroup").value = "";



                        }
                      });
                    });

                    function showRow1(row) {
                      var x = row.cells;
                      document.getElementById("saronum").value = x[0].innerHTML;
                      document.getElementById("sarogroup").value = x[5].innerHTML;


                    }
                  </script>

                  <div class="col-md-3">
                    <label>MFO/PPA</label>
                    <input required type="text" class="form-control" style="height: 40px;" id="ppa" placeholder="PPA" name="ppa">
                    <table class="table table-striped table-hover" id="main3">
                      <tbody id="result3">
                      </tbody>
                    </table>
                  </div>


                  <!-- PPA Search -->

                  <script>
                    $(document).ready(function() {
                      $("#result3").click(function() {
                        $("#main3").hide();
                      });
                    });
                  </script>
                  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
                  <script type="text/javascript">
                    $(document).ready(function() {
                      function load_data(query) {
                        $.ajax({
                          url: "@obsaroppasearch.php",
                          method: "POST",
                          data: {
                            query: query
                          },
                          success: function(data) {
                            $('#result3').html(data);
                          }
                        });
                      }
                      $('#ppa').keyup(function() {
                        var search = $(this).val();
                        if (search != '') {
                          load_data(search);
                        } else {
                          $("#main3").show();
                          document.getElementById('ppa').value = "";



                        }
                      });
                    });

                    function showRow3(row) {
                      var x = row.cells;
                      document.getElementById("ppa").value = x[0].innerHTML;


                    }
                  </script>

                  <!-- UACS Search -->
                  <script>
                    $(document).ready(function() {
                      $("#result2").click(function() {
                        $("#main2").hide();
                      });
                    });
                  </script>
                  <div class="col-md-3">
                    <label>UACS Object Code</label>
                    <input required type="text" class="form-control" style="height: 40px;" id="uacs" placeholder="UACS Code" name="uacs">
                    <table class="table table-striped table-hover" id="main2" name="main2">
                      <tbody id="result2">
                      </tbody>
                    </table>

                  </div>

                  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
                  <script type="text/javascript">
                    $(document).ready(function() {
                      function load_data(query) {
                        $.ajax({
                          url: "@obsarouacssearch.php",
                          method: "POST",
                          data: {
                            query: query
                          },
                          success: function(data) {
                            $('#result2').html(data);
                          }
                        });
                      }
                      $('#uacs').keyup(function() {
                        var search = $(this).val();
                        if (search != '') {
                          load_data(search);
                        } else {
                          $("#main2").show();
                          // document.getElementById('uacs').value = "";
                          //load_data();
                          /* document.getElementById("code").value = ""; */
                          document.getElementById("uacs").value = "";



                        }
                      });
                    });

                    function showRow2(row) {
                      var x = row.cells;
                      document.getElementById("uacs").value = x[0].innerHTML;




                    }
                  </script>

                  <div class="col-md-3">
                    <label>Amount</label>
                    <input value="<?php echo $amount; ?>" required type="text" class="form-control" style="height: 40px;" id="" placeholder="Amount" name="amount">
                  </div>
                </div>

                <br>
                <div class="row">
                  <div class="col-md-4">
                    <label>Remarks</label>
                    <textarea class="form-control" placeholder="Remarks" name="remarks" style="width: 100%; height: 40px;"></textarea>
                  </div>

                  <div class="col-md-4">
                    <label>Group</label>
                    <!-- <textarea class="form-control" placeholder="Remarks" name="remarks" ></textarea> -->
                    <!-- <select class="form-control select" style="width: 100%; height: 40px;" name="sarogroup" id="sarogroup" required > -->
                    <!-- <option>Select Group</option> -->
                    <!-- <?php echo app($connect); ?> -->
                    <!-- </select> -->
                    <input type="text" class="form-control" style="height: 40px;" id="sarogroup" placeholder="" name="sarogroup" readonly>
                  </div>
                  <div class="col-md-4" hidden>
                    <label>Status</label>
                    <!-- <textarea class="form-control" placeholder="Remarks" name="remarks" ></textarea> -->
                    <select class="form-control select" style="width: 100%; height: 40px;" name="status" id="status" required>
                      <option value="Obligated">Obligated</option>
                      <option value="Pending">Pending</option>
                      <!-- <option>Select Status</option> -->


                    </select>
                  </div>
                </div>
                <!-- END SARO -->
                <br>

              </div>
              <!-- End Menu -->
              <!-- End Panel -->
              <!-- Submit -->
          </div>
          &nbsp&nbsp&nbsp<button type="submit" name="submit" class="btn btn-success">Submit</button>
          <br>
          <br>
        </div>
        </form>
        <!--End Submit -->
    </div>

    </section>
  </div>

  </div>

  <script src="dist/js/demo.js">
  </script>
  <!-- <script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script> -->


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
  <script src="dist/js/demo.js"></script>
  <!-- Page script -->
  <script>
    $(function() {
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


</body>

</html>