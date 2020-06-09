<?php
// require_once('functions.php'); 
error_reporting(0);
ini_set('display_errors', 0);
session_start();

$conn = mysqli_connect("localhost","fascalab_2020","w]zYV6X9{*BN","fascalab_2020");



$username = $_SESSION['username'];
$select_user = mysqli_query($conn,"SELECT DIVISION_C FROM tblemployeeinfo WHERE UNAME = '$username'");
$rowdiv = mysqli_fetch_array($select_user);
$DIVISION_C = $rowdiv['DIVISION_C'];
if ($DIVISION_C == '10' || $DIVISION_C == '11' || $DIVISION_C == '12' || $DIVISION_C == '13' || $DIVISION_C == '14' || $DIVISION_C == '15' || $DIVISION_C == '16' ) {

  $pmo_id = 5;
}elseif ($DIVISION_C == '1' || $DIVISION_C == '2' || $DIVISION_C == '3' || $DIVISION_C == '5'  ) {

  $pmo_id = 1;
}elseif ($DIVISION_C == '18' ) {

  $pmo_id = 3;
}elseif ($DIVISION_C == '8' || $DIVISION_C == '17' ) {

  $pmo_id = 4;
}elseif ($DIVISION_C == '9' ) {

  $pmo_id = 6;
}elseif ($DIVISION_C == '7' ) {

  $pmo_id = 7;
}
if (isset($_POST['submit'])) {
  $po_no = $_POST['po_no'];
  $supplier = $_POST['supplier'];
  $purpose = $_POST['purpose'];
  $amount = $_POST['amount'];
  $address = $_POST['address'];
  $burs = $_POST['burs'];

  $office = "DILG IV-A";

  $insert = mysqli_query($conn,"INSERT INTO burs(po_no,supplier,purpose,amount,address,office,doc_type) VALUES('$po_no','$supplier','$purpose','$amount','$address','$pmo_id','$burs')");
  if ($insert) {
    echo ("<SCRIPT LANGUAGE='JavaScript'>
      window.alert('Successfuly Saved!')
      window.location.href = 'ViewBURS.php';
      </SCRIPT>");
  }  else{
   echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Error Occured in Saving');
    </SCRIPT>");
 }


}
?>

<!DOCTYPE html>
<html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<body>
  <script type="text/javascript">
    $(document).ready(function(){
      function load_data(query)
      {
        $.ajax({
          url:"fetch_burs.php",
          method:"POST",
          data:{query:query},
          success:function(data)
          {
            $('#result').html(data);
          }
        });
      }
      $('#po_no').keyup(function(){
        var search = $(this).val();
        if(search != '')
        {
          load_data(search);
        }
        else
        {

        }
      });
    });
    function showRow(row)
    {
      var x=row.cells;
      document.getElementById("po_no").value = x[0].innerHTML;
      document.getElementById("supplier").value = x[1].innerHTML;
      document.getElementById("address").value = x[2].innerHTML;
      document.getElementById("purpose").value = x[3].innerHTML;
      document.getElementById("amount").value = x[4].innerHTML;
    }
  </script>

  <div class="box box-default">
    <div class="box-header with-border">
      <h1 align="">&nbspCreate ORS/BURS</h1>
      <div class="box-header with-border">
      </div>
      <br>
      &nbsp &nbsp &nbsp   <li class="btn btn-success btn-s"><a href="ViewBURS.php" style="color:white;text-decoration: none;">Back</a></li>

      <br>
      <br>
      <form method="POST" autocomplete="off" >
        <div class="box-body">
          <div class="well">
            <div class="row">
              <div class="col-md-6">
               <div class="form-group">
                <label>Please Select : <small style="color:red;">*</small></label><br>
                <input type="checkbox" class="checkbox1" name="burs" value="1" checked> ORS &nbsp&nbsp&nbsp
                <input type="checkbox" class="checkbox1" name="bursburs" value="2"> BURS
                <!-- <select name="burs" class="form-control select2">
                  <option value="1">ORS</option>
                  <option value="2">BURS</option>
                </select> -->
              </div>
              <script>
                $('.checkbox1').on('change', function() {
                  $('.checkbox1').not(this).prop('checked', false);  
                });
              </script>
              <div class="form-group">
                <label>PO No. :  </label>
                <input autocomplete = "false"  class="form-control" name="po_no" type="text" id="po_no">
                <table class="table table-striped table-hover" id="main">
                  <tbody id="result" onclick="myFunction()">
                  </tbody>
                </table>

              </div>
              <div class="form-group">
                <label>Payee/Supplier : <small style="color:red;">*</small></label>
                <input required autocomplete = "false"  class="form-control" name="supplier" type="text" id="supplier">
              </div>

            </div>
            <div class="col-md-6">

             <div class="form-group">
              <label>Address :</label>
              <input required autocomplete = "false"  class="form-control" name="address" type="text" id="address">
            </div>

            <div class="form-group">
              <label>Particular/Purpose : <small style="color:red;">*</small></label>
              <input required autocomplete = "false"  class="form-control" name="purpose" type="text" id="purpose">
            </div>

            <div class="form-group">
              <label>Amount : <small style="color:red;">*</small></label>
              <input onKeyPress='return dec(event)' required autocomplete = "false"  class="form-control" name="amount" type="number" id="amount">

            </div>

          </div>


        </div>
      </div>
    </div>
    <button class="btn btn-primary btn-s" style="float: right;" id="finalizeButton" type="submit" name="submit" onclick="return confirm('Are you sure you want to save now?');">Save</button>
    <br>
  </form>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>  
  <br>
</body>
<script>
$(document).ready(function(){
  $("#result").click(function(){
    $("#main").hide();
  });
});
</script>
<script>
function myFunction() {
  document.getElementById("supplier").readOnly = true;
  document.getElementById("address").readOnly = true;
  document.getElementById("purpose").readOnly = true;
  document.getElementById("amount").readOnly = true;
}
</script>

<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'mm/dd/yyyy' })
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
