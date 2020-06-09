<?php
include('db.class.php'); // call db.class.php

?>
<!DOCTYPE html>
<html>
<head>
  <title>Stock Management System</title>

  

</head>
<body>
<div class="box">
  <div class="box-body">
        <div class="class-responsive"> 
          <div class="class-responsive">
      
            
 
      
            <h1 align="">Supplies Ledger</h1>
             <div class="" >
    </div>
    <br>
    
    <div class="class-responsive">

    <table class="table" > 


<tr>
<td class="col-md-1">

</td>

<td class="col-md-9" >


</td>
<form method = "POST" action = "@stockledgersearch.php">
<td class="col-md-1">
<input  type="text" class="" style="height: 35px; width: 400px" id="stocksearch" placeholder="Search Stock No. Here" name="stocksearch" autofocus>
</td>

<td class="col-md-1">
<button type="submit" name="submit"  class="btn btn-success ">Search</button>
</td>
</form>


</tr>
</table> 
          
       
            <table id="example1" class="table table-striped table-bordered" style="background-color: white;">
                <thead>
                    <tr style="background-color: white;color:blue;">
                        
                        
                        <th width="800">STOCK NO.</th>
                        <th width="800">ITEMS</th>
                        <th width="800">UNIT OF MEASUREMENT</th>
                        <th width="800">BALANCE BEFORE</th>
                        <th width="800">DELIVERY</th>
                        <th width="800">AVAILABLE BALANCE</th>
                        <th width="800">ISSUE MONTH</th>
                        <th width="800">BALANCE AFTER</th>
                        <th width="800">CURRENT PRICE</th>



                    </tr>
                </thead>
            
            <?php
            $servername = "localhost";
            $username = "fascalab_2020";
            $password = "w]zYV6X9{*BN";
            $database = "fascalab_2020";
            
            // Create connection
            $conn = new mysqli($servername, $username, $password,$database);
            $view_query = mysqli_query($conn, "SELECT * FROM old_stock order by id asc");

                while ($row = mysqli_fetch_assoc($view_query)) {
                  $id = $row["id"];  
                  $code = $row["code"];
                  $items = $row["items"];
                  $sn = $row["sn"];
                  $unit = $row["unit"];
                  $balanceone = $row["one"];
                  $one = $row["one"];
                  $delivery = $row["delivery"];
                  $avail_balance = $row["avail_balance"];
                  $issue_month = $row["issue_month"];
                  $balancetwo = $row["two"];
                  $two = $row["two"];
                  $current_price = $row["current_price"];
                

                  
                    
                    echo "<tr align = ''>
                  
                    <td><a href='@supplyledger.php?getsn=$sn'>$sn</a></td>
                    <td>$items</td>
                    <td>$unit</td>
                    <td>$balanceone</td>
                    <td>$delivery</td>
                    <td>$avail_balance</td>
                    <td>$issue_month</td>
                    <td>$balancetwo</td>
                    <td>$current_price</td>
                    

                    </tr>"; 
                }
                echo "</table>";
            ?>       
                
            </table>
           
<script type="text/javascript">
    $(document).ready(function() {
        $('#example1').DataTable();
    } );
</script>

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



</body>
</html>



