<?php
include('db.class.php'); // call db.class.php
?>

<!DOCTYPE html>
<html>
<head>
  <title>Financial Management System</title>

  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css"> -->



</head>
<body>
<div class="box">
  <div class="box-body">
      <div class=""> 
        <div class="">
          <br>

          <h1 align="">&nbspDisbursement</h1>
          <div class="box-header"style="overflow-x:auto;">
          </div>
          <br>
          <br>
         
          <br>
          <div class=""  style="overflow-x:auto;">

            <div class="col-md-1" style="overflow-x:auto;">
             <li class="btn btn-success"><a href="@disbursementcreate.php" style="color:white;text-decoration: none;">Create</a></li>
            </div>
            <div class="col-md-10" style="overflow-x:auto;">
            <form method = "POST" action = "@Functions/ddateexport1.php">
                <div class="input-group date" style="overflow-x:auto;">
                  <div class="input-group-addon" style="overflow-x:auto;">
                    FROM   <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control" id="datepicker1" placeholder='From Date' name="datefrom" style="height: 35px; width: 200px">

                  <div class="input-group date" style="overflow-x:auto;">
                    <div class="input-group-addon" style="overflow-x:auto;">
                      TO <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" class="form-control" id="datepicker2" placeholder='To Date' name="dateto" style="height: 35px; width: 200px">
                    <button type="submit" name="submit" style="width:%; height: 35px" class="btn btn-success ">Filter/Export Data</button>

                    &nbsp  <button type="Summary" name="Summary" style="width:%; height: 35px" class="btn btn-success ">Export Summary</button>
          
                   
                  </div>                        
                </form>

            </div>
            <div class="col-md-1" style="overflow-x:auto;">
           
            </div>

            <div class="col-md-0" style="overflow-x:auto;">


           
              </div>
              <br>
              <br>
            </div>
            <table id="example1" class="table table-striped table-bordered " style="background-color: white; overflow-x:auto;" >
              <thead>
                <tr style="background-color: white;color:blue;">
                 
                  <th style="text-align:center" width="800">DVs No.</th>
                  <th style="text-align:center" width="800">ORS/BURS No.</th>
                  <th style="text-align:center" width="800">SR No.</th>
                  <th style="text-align:center" width="800">PPA</th>
                  <th style="text-align:center" width="800">UACS</th>
                  <th style="text-align:center" width="800">DATE RECEIVED</th>
                  <th style="text-align:center" width="800">DATE DISBURSE</th>
                  <th style="text-align:center" width="800">DATE RELEASE</th>
                  <th style="text-align:center" width="800">PAYEE</th>
                  <th style="text-align:center" width="800">PARTICULAR</th>
                  <th style="text-align:center" width="800">AMOUNT</th>
                  <th style="text-align:center" width="800">TAX</th>
                  <th style="text-align:center" width="800">GSIS</th>
                  <th style="text-align:center" width="800">PAGIBIG</th>
                  <th style="text-align:center" width="800">PHILHEALTH</th>
                  <th style="text-align:center" width="800">OTHER PAYABLES</th>
                  <th style="text-align:center" width="800">TOTAL DEDUCTIONS</th>
                  <th style="text-align:center" width="800">NET</th>
                  <th style="text-align:center" width="800">REMARKS</th>
                  <th style="text-align:center" width="800">STATUS</th>
                  <th style="text-align:center" width="800">ACTION</th>
                </tr>
              </thead>
              <?php
              $servername = "localhost";
              $username = "root";
              $password = "";
              $database = "db_dilg_pmis";
            // Create connection
              $conn = new mysqli($servername, $username, $password,$database);
              $view_query = mysqli_query($conn, "SELECT * FROM disbursement order by id desc");
              while ($row = mysqli_fetch_assoc($view_query)) {
                $id = $row["ID"]; 
                $dv = $row["dv"];
                $ors = $row["ors"];
                $sr = $row["sr"];
                $ppa = $row["ppa"];
                $uacs = $row["uacs"];
                $datereceived = $row["datereceived"];
                $datereceived11 = date('F d, Y', strtotime($datereceived));
                $timereceived = $row["timereceived"];
                $payee = $row["payee"];
                $particular = $row["particular"];
                $amount = $row["amount"];
                $tax = $row["tax"];
                $gsis = $row["gsis"];
                $pagibig  = $row["pagibig"];
                $philhealth = $row["philhealth"];
                $other = $row["other"];
                $total = $row["total"];
                $net = $row["net"];
                $remarks = $row["remarks"];
                $status = $row["status"];
                $date_proccess = $row["date_proccess"];
                $date_proccess1 = date('F d, Y', strtotime($date_proccess));
                $datereleased = $row["datereleased"];
                ?>
                <tr>
                 
                  <td><?php echo $dv;?></td>
                  <td><?php echo $ors;?></td>
                  <td><?php echo $sr;?></td>
                  <td><?php echo $ppa;?></td>
                  <td><?php echo $uacs;?></td>
                  <?php if ($datereceived == '1970-01-01' || $datereceived =='0000-00-00'): ?>
                    <td><a href="received_dv.php?id=<?php echo $id;?>" class="btn btn-primary btn-xs">Received</a></td>
                    <?php else: ?>
                      <td><?php echo $datereceived11;?></td>
                    <?php endif ?>
                    <!-- <?php if ($datereceived != '0000-00-00'): ?>
                      <td><a class="btn btn-success btn-xs" href='CreateDisbursement.php?id=<?php echo $id; ?>&stat=1' >Proccess</a> </td>
                      <?php else: ?>
                        <?php if ($datereleased != '0000-00-00'): ?>
                          <td><?php echo $datereleased;?></td>
                          <?php else: ?>
                            <td></td>
                          <?php endif ?>
                          <td></td>
                          <?php endif ?> -->
                          <?php if ($date_proccess != NULL): ?>
                            <td><?php echo $date_proccess1;?></td>
                            <?php else: ?>
                              <?php if ($datereceived != '0000-00-00'): ?>
                                <td><a class="btn btn-success btn-xs" href='@disbursementcreate.php?id=<?php echo $id; ?>&stat=1' >Proccess</a> </td>
                                <?php else: ?>
                                  <td></td>
                                <?php endif ?>
                              <?php endif ?> 
                              <?php if ($datereleased != '0000-00-00'): ?>
                                <td><?php echo $datereleased;?></td>
                                <?php else: ?>
                                  <?php if ($date_proccess == NULL): ?>
                                    <td></td>
                                    <?php else: ?>
                                      <td><a class="btn btn-success btn-xs" href='release_dv.php?id=<?php echo $id; ?>&stat=1' >Release</a> </td>
                                    <?php endif ?>
                                  <?php endif ?>
                                  <td><?php echo $payee;?></td>
                                  <td><?php echo $particular;?></td>
                                  <td><?php echo $amount;?></td>
                                  <td><?php echo $tax;?></td>
                                  <td><?php echo $gsis;?></td>
                                  <td><?php echo $pagibig;?></td>
                                  <td><?php echo $philhealth;?></td>
                                  <td><?php echo $other;?></td>
                                  <td><?php echo $total;?></td>
                                  <td><?php echo $net;?></td>
                                  <td><?php echo $remarks;?></td>
                                  <?php if ($status=='Disbursed'): ?>
                                    <td style='background-color:green'><b>Disbursed</b></td>
                                    <?php else: ?>
                                      <?php if ($status=='Pending'): ?>
                                        <td style='background-color:red'><b>Pending</b></td>
                                        <?php else: ?>
                                          <td></td>
                                        <?php endif ?>
                                      <?php endif ?>
                                      <td>
                                        <a href='@disbursementupdate.php?getid=<?php echo $id;?>'> <i style='font-size:24px' class='fa'>&#xf044;</i> </a>
                                        <a href='@Functions/ddeletefunction.php?getid=<?php echo $id;?>'> <i style='font-size:24px'> <i class='fa fa-trash-o'></i></i> </a>
                                      </td>
                                    
                                    </tr>
                                  <?php } ?>    
                                </table>
                              </div>
                            </div>
                          </div>
                        </div>
                      </body>
                      <script type="text/javascript">
                        $(document).ready(function() {
                          $('#example1').DataTable();
                        } );
                      </script>
                    </div>
                  </div>
                  <div class="panel-footer"></div>
                </div>
              </div>
              
            </body>
            </html>

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
              <!-- <script src="dist/js/adminlte.min.js"></script> -->
              <!-- AdminLTE for demo purposes -->
              <!-- <script src="dist/js/demo.js"></script> -->
              <!-- Page script -->
              <script>
                $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, locale: { format: 'MM/DD/YYYY hh:mm A' }})
    //Date range as a button
    $('#daterange-btn').daterangepicker(
    {
      ranges   : {
        'Today'       : [moment(), moment()],
        'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
        'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
        'This Month'  : [moment().startOf('month'), moment().endOf('month')],
        'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
      },
      startDate: moment().subtract(29, 'days'),
      endDate  : moment()
    },
    function (start, end) {
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
      radioClass   : 'iradio_minimal-blue'
    })
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    })
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
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
