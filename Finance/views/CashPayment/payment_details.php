<?php

$getid = $_GET['getid'];
//echo $getid;

$servername = "localhost";

$username = "fascalab_2020";
$password = "w]zYV6X9{*BN";

$database = "fascalab_2020";
// Create connection
$conn = new mysqli($servername, $username, $password,$database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
//echo "Connected successfully";

// Getting values from id
$view_query = mysqli_query($conn, "SELECT * FROM ntaob where id ='$getid' ");

while ($row = mysqli_fetch_assoc($view_query)) {
        $id = $row["id"]; 
                  
        $accountno = $row["accountno"];
        $date1 = $row["date"];
        $date = date('m/d/Y', strtotime($date1));

        $payee = $row["payee"];
        $particular = $row["particular"];
        $dvno = $row["dvno"];
        $lddap = $row["lddap"];
        $orsno = $row["orsno"];
        $ppa = $row["ppa"];
        $uacs = $row["uacs"];
        $gross = $row["gross"];
        $totaldeduc = $row["totaldeduc"];
        $net = $row["net"];
        $remarks = $row["remarks"];
      
   
}
?>

<div class="col-md-12">
    <div class="box box-primary dropbox">

        <div class="box-body table-responsive">
            <li class="btn btn-success"><a href="cash_payment.php" style="color:white;text-decoration: none;">Back</a></li>

                <!-- Start form -->
                <form class="" method='POST' action="@Functions/ntaobupdatefunction.php" >
                    <!-- Start Menu -->

                    <input type="hidden" name="requestid" value = "<?php echo $getid;?>" >
                    <div class="class-bordered" >
                        <div class="row">
                            <div class="col-md-7">
                            <label>Account No.</label>
                                  <input value="<?php echo $accountno;?>"  type="text" class="form-control" style="height: 35px;" id="accountno" placeholder="Enter Account No." name="accountno"  required>
                                  <table class="table table-striped table-hover" id="main1">
                                  <tbody id="result1">
                                  </tbody>
                                  </table>
                                  <br>
                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
                        <script type="text/javascript">
                          $(document).ready(function(){
                            function load_data(query)
                            {
                              $.ajax({
                                url:"@ntaobvalue1.php",
                                method:"POST",
                                data:{query:query},
                                success:function(data)
                                {
                                  $('#result1').html(data);
                                }
                              });
                            }
                            $('#accountno').keyup(function(){
                              var search = $(this).val();
                              if(search != '')
                              {
                                load_data(search);
                              }
                              else
                              {
                                load_data();
                                document.getElementById('accountno').value = "";
                              }
                            });
                          });
                          function showRow1(row)
                          {
                            var x=row.cells;
                            document.getElementById("accountno").value = x[0].innerHTML;
                           
                            
                          }
                        </script>


                                  <label>DV No.</label>
                                  <input value="<?php echo $dvno;?>"  type="text" class="form-control" style="height: 35px;" id="dvno" placeholder="Enter DV No." name="dvno" required>
                                  <br>
                                
                                  
                                  <table class="table table-striped table-hover" id="main">
                                  <tbody id="result">
                                  </tbody>
                                  </table>
                                  <br>
                              <!-- Getting PO NUmber -->      
                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
                        <script>
                      $(document).ready(function(){
                        $("#result").click(function(){
                          $("#main").hide();
                        });
                      });
                      </script>
                        <script type="text/javascript">
                          $(document).ready(function(){
                            function load_data(query)
                            {
                              $.ajax({
                                url:"@ntaobvalue.php",
                                method:"POST",
                                data:{query:query},
                                success:function(data)
                                {
                                  $('#result').html(data);
                                }
                              });
                            }
                            $('#dvno').keyup(function(){
                              var search = $(this).val();
                              if(search != '')
                              {
                                load_data(search);
                              }
                              else
                              {
                                load_data();
                                $("#main").show();
                                document.getElementById('dvno').value = "";
                                document.getElementById('orsno').value = "";
                                document.getElementById('payee').value = "";
                                document.getElementById('particular').value = "";
                                document.getElementById('ppa').value = "";
                                document.getElementById('uacs').value = "";
                                document.getElementById("gross").value = "";
                                document.getElementById("totaldeduc").value = "";
                                document.getElementById("net").value = "";
                                
                              }
                            });
                          });
                          function showRow(row)
                          {
                            var x=row.cells;
                            document.getElementById("dvno").value = x[0].innerHTML;
                            document.getElementById("orsno").value = x[1].innerHTML;
                            document.getElementById("payee").value = x[2].innerHTML;
                            document.getElementById("particular").value = x[3].innerHTML;
                            document.getElementById("ppa").value = x[4].innerHTML;
                            document.getElementById("uacs").value = x[5].innerHTML;
                            document.getElementById("gross").value = x[6].innerHTML;
                            document.getElementById("totaldeduc").value = x[7].innerHTML;
                            document.getElementById("net").value = x[8].innerHTML;
                            
                          }
                        </script>
                         <label>ORS No.</label>
                         <input value="<?php echo $orsno;?>" readonly  type="text" class="typeahead form-control" style="height: 35px;" id="orsno" placeholder="Enter ORS Number" name="orsno">
                         <br>
                         <label>Payee</label>
                         <input value="<?php echo $payee;?>"  type="text" class="form-control" style="height: 35px;" id="payee" placeholder="Enter Payee" name="payee" readonly>
                         <br>  
                         <label>Particular</label>
                         <input value="<?php echo $particular;?>" type="text" class="form-control" style="height: 35px;" id="particular" placeholder="Enter Particular" name="particular" readonly>
                         <br>  
                         <label>PPA</label>
                         <input value="<?php echo $ppa;?>"  type="text" class="form-control" style="height: 35px;" id="ppa" placeholder="Enter PPA" name="ppa" readonly>
                         <br>
                         <label>UACS</label>
                         <input value="<?php echo $uacs;?>"  type="text" class="form-control" style="height: 35px;" id="uacs" placeholder="Enter UACS" name="uacs" readonly>
                         <br>
                        
                         <label>Gross</label>
                         <input value="<?php echo $gross;?>"  type="text" class="form-control" style="height: 35px;" id="gross" placeholder="Enter Amount" name="gross" readonly>
                         <br>  

                         <label>Total Deductions</label>
                         <input value="<?php echo $totaldeduc;?>" type="text" class="form-control" style="height: 35px;" id="totaldeduc" placeholder="Enter Tax" name="totaldeduc" readonly>
                         <br>   

                         <label>Net</label>
                         <input value="<?php echo $net;?>"  type="text" class="form-control" style="height: 35px;" id="net" placeholder="Enter Net" name="net" readonly>
                         <br>   
                        </div>

                        <div class="col-md-5">

                        <label>Date</label>
                        <br>
                        <div class="input-group date">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input value="<?php echo $date;?>" type="text" class="form-control pull-right" id="datepicker1" placeholder='Enter Date' name="date">
                        </div>
                        <br>
                        <br> 
                        

                        <label>LDDAP-ADA/Check</label>
                         <input value="<?php echo $lddap;?>"  type="text" class="form-control" style="height: 35px;" id="lddap" placeholder="Enter LDDAP-ADA/Check" name="lddap">
                         <br> 
                         <br>
                        <br> 
                        
                    

                         <label>Remarks</label>
                         <input value="<?php echo $remarks;?>"  type="text" class="form-control" style="height: 80px;" id="remarks" placeholder="Enter Remarks" name="remarks">
                         <br>
                         
                         <label>Status</label>
                         <select class="form-control select" style="width: 100%; height: 40px;" name="status" id="status" required >
                           <option value = "Paid">Paid</option>
                           <option value = "Unpaid">Unpaid</option>
                           <option value = "Return">Return</option>
                           <!-- <option value = "Pending">Pending</option> -->
                           <!-- <option>Select Status</option> -->
                         </select>
                            
                          <br>
                        <br>
                        

                        <label>DV Drive Link <i>(ex: https://drive.google.com/drive/folders/)</i></label>
                         <input value=""  type="text" class="form-control" style="height: 35px;" id="dv_link" placeholder="Google Drive Link" name="lddap">





                          </div>


                          <div class="col-md-3">

                          </div>
                                
                          
                        </div>
                       
                       
                        <center><button type="submit" name="submit"  class="btn btn-success btn-lg">Update <i class="fa fa-refresh"></i></button></center>
                                
                    </div>
                    
                    <div class="class">
                        
                    </div>
                        <!-- End Menu -->
                    <!-- End Panel -->
                    <!-- Submit -->
                    </div>
                    <!-- &nbsp&nbsp&nbsp<button type="submit" name="submit"  class="btn btn-success">Update</button> -->
                    <br>
                    <br>
                    </div>
                </form>
                <!--End Submit -->

            
            <!-- end box-primary -->
        </div>
    </div>
</div>