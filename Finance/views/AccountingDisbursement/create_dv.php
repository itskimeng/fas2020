<?php 
function getNta()
    {
        include 'connection.php';
        $query = "SELECT particular from nta  order by id desc" ;
        $result = mysqli_query($conn, $query);
        echo '<option VALUE = "">NTA/NCA No.</option>';
        while($row = mysqli_fetch_array($result))
        {
            echo '<option>'.$row['particular'].'</option>';
            
        }
    }
 ?>

<div class="col-md-12">
	<div class="box box-primary dropbox">

		<div class="box-body table-responsive">

			<li class="btn btn-warning"><a href="accounting_disbursement.php" style="color:white;text-decoration: none;"><i class="fa fa-arrow-left"></i> Back</a></li>
			<br>
			<br>
			<!-- start of fields -->
			<div class="class"  >
			    <form method="POST" action='Disbursement_create_function.php' >

			        <div class="col-md-6 well" >
			         <!-- DV-->
			                <div class="row" >
			                <!-- Row 1 -->
			                        <div class="col-md-6 ">
			                            <!-- Partition 1 -->
			                           
			                            
			                            <table class="table"> 
			                           
			                            <tr>
			                            <td class="col-md-2">
			                            <b>TYPE<span style = "color:red;">*</span></b>

			                            </td>
			                            <td class="col-md-7">
			                            <select onchange="myFunctionORS()" class=" form-control select input" style="width: 100%; height: 40px;" name="mode" id="mode" required style="border-style: groove;">
			                            <option value = "">SELECT BURS/ORS</option>
			                            <option value = "BURS">BURS</option>
			                            <option value = "ORS">ORS</option>
			                            </select>
			                            </td>
			                            </tr>
			                            

			                            <tr>
			                            <td class="col-md-2"><b>BURS No.<span style = "color:red;">*</span></b></td>
			                            <td class="col-md-7">
			                            <input required value="" class="form-control input" type="text" class="" style="height: 35px;" id="ors" name="ors" placeholder="Enter BURS No." autocomplete="off">
			                           
			                                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
			                                <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
			                                <table class="table table-striped table-hover" id="main" >
			                                <tbody id="result" style="font-weight:bold" >
			                                </tbody>
			                                </table>

			                               
			                            </td>
			                            </tr>

			                            <tr>
			                            <td class="col-md-2"><b>ORS No.<span style = "color:red;">*</span></b></td>
			                            <td class="col-md-7">
			                            <input required value=""  class="form-control input" type="text" class="" style="height: 35px;" id="ors1" name="ors1" placeholder="Enter ORS No." autocomplete="off">
			                           
			                                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
			                                <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
			                                <table class="table table-striped table-hover" id="main1" >
			                                <tbody id="result1" style="font-weight:bold">
			                                </tbody>
			                                </table>

			                               
			                            </td>
			                            </tr>

			                            <tr>
			                            <td class="col-md-2"><b>DV No.<span style = "color:red;">*</span></b></td>
			                            <td class="col-md-7">
			                            <input required value=""  class="form-control input" type="text" class="" style="height: 35px;" id="dv" name="dv" placeholder="Enter DV No." autocomplete="off">
			                            </td>
			                            </tr>

			                           <!--  <tr>
			                            <td class="col-md-2"><b>DV Type<span style = "color:red;">*</span></b></td>
			                            <td class="col-md-7">
			                            <select required class="form-control select 2 input" style="width: 100%;" name="dvtype" id="dvtype" >
			                            <option value="">Select Type</option>
			                            <option value="Fund Transfer">Fund Transfer</option>
			                            <option value="Regular DV">Regular DV</option>

			                            </select>
			                            </td>
			                            </tr> -->

			                            </table>

			                        </div>


			                        <div class="col-md-6">
			                                <!-- Partition II -->

			                                <table class="table">

			                                <tr>
			                                <td class="col-md-3"><b>ORS Date.<span style = "color:red;">*</span></b></td>
			                                <td class="col-md-7">
			                                <input readonly required type="text" class="form-control input" style="height: 35px;" name="orsdate" id="orsdate" value = "" placeholder="mm/dd/yyyy"  autocomplete="off">
			                                </td>
			                                </tr>

			                                

			                                <tr>
			                                <td class="col-md-3"><b>DV Date.<span style = "color:red;">*</span></b></td>
			                                <td class="col-md-7">
			                                <input required type="text" class="form-control input" style="height: 35px;" name="dvdate" id="datepicker2" value = "<?php echo $timeNow;?>" placeholder="mm/dd/yyyy"  autocomplete="off">
			                                </td>
			                                </tr>
			                                <br>
			                              

			                               
			                                </table>

			                        </div>

			                </div>

			               

			                <div class="row">
			                <!-- Row 2 -->
			                   
			                        <div class="col-md-12">

			                            <table class="table">

			                            <tr>
			                            <td class="col-md-1"><b>PAYEE<span style = "color:red;">*</span></b></td>
			                            <td class="col-md-7">
			                            <input readonly required type="text" class="form-control input" style="height: 35px;" name="payee" id="payee" value = "" placeholder="Payee"  autocomplete="off">
			                            </td>
			                            </tr>

			                            <tr>
			                            <td class="col-md-1"><b>PARTICULARS<span style = "color:red;">*</span></b></td>
			                            <td class="col-md-7">
			                            <input  required type="text" class="form-control input" style="height: 70px;" name="particular" id="particular" value = "" placeholder="Particulars"  autocomplete="off">
			                            </td>
			                            </tr>

			                            <tr>
			                            <td class="col-md-1"><b>OBLIGATED AMOUNT<span style = "color:red;">*</span></b></td>
			                            <td class="col-md-7">
			                            <input readonly required type="text" class="form-control input" style="height: 35px;" name="amount" id="amount" value = "" placeholder="Obligated Amount"  autocomplete="off">
			                            </td>
			                            </tr>

			                            <tr>
			                            <td class="col-md-1"><b>TOTAL DEDUCTIONS<span style = "color:red;">*</span></b></td>
			                            <td class="col-md-7">
			                            <input readonly required type="text" class="form-control input" style="height: 35px;" name="deductions" id="deductions" value = "0" placeholder="Total Deductions"  autocomplete="off">
			                            </td>
			                            </tr>

			                            <tr>
			                            <td class="col-md-1"><b>NET AMOUNT<span style = "color:red;">*</span></b></td>
			                            <td class="col-md-7">
			                            <input readonly required type="text" class="form-control input" style="height: 35px;" name="net" id="net" value = "0" placeholder="Net Amount"  autocomplete="off">
			                            </td>
			                            </tr>

			                            <tr>
			                            <td class="col-md-1"><b>Remarks<span style = "color:red;">*</span></b></td>
			                            <td class="col-md-7">
			                            <textarea class="form-control input" placeholder="Remarks" id="remarks" name="remarks" style="width: 100%; height: 40px;" ></textarea> 
			                            </td>
			                            </tr>

			                            <tr>
			                            <td class="col-md-1"><b>Status<span style = "color:red;">*</span></b></td>
			                            <td class="col-md-7">
			                            <select class="form-control select input" style="width: 100%; height: 40px;" name="status" id="status" required >
			                            <option value = "">Select Status</option>
			                            <option value = "Draft">Draft</option>
			                            <option value = "Paid">Paid</option>
			                            <option value = "Returned">Returned</option>
			                            </select>
			                            </td>
			                            </tr>


			                            </table>

			                        </div>


			                            <div class="row">
			                                <div class="col-md-12">
			                                    <div class="col-md-12">
			                                        <!-- Table of Uacs -->
			                                        <table id="example" class="table table-bordered " style="background-color: white; width:100%; text-align:left">
			                                        <thead>
			                                        <tr style="background-color: #A9A9A9;  text-align:left; border-style: groove; " >
			                                        <th width='500'>FUND SOURCE</th>
			                                        <th width='500'>PPA </th>
			                                        <th width='500'>UACS </th>
			                                        <th width='500'>AMOUNT </th>

			                                        
			                                        </thead>

			                                        </table>

			                                        <!-- Table of Uacs -->

			                                    </div>

			                                </div>
			                            </div>


			                            <br>



			                            

		                        </div>
			                       
			                
			                

			         <!-- DV-->
			         
			        </div>
			        
			        
			        
			        <div class="col-md-6 ">
			        <!-- LD DAP -->
			            <div class="row">
			                <div class="col-md-12">
			                        
			                <div class="well ">
			                <div class="class-bordered">
			                <b><font style="font-size:25px; color:firebrick">DEDUCTIONS</font></b>  
			                </div>
			                
			             
			               
			                            
			                <table class="table"> 
			                        <tr>
			                        <td class="col-md-1"><b>TAX<span style = "color:red;"></span></b></td>
			                        <td class="col-md-7">
			                        <input required value="0" onkeyup="myFunctiontax()"  class="form-control input" type="number" step="any" class="" style="height: 35px;" id="tax" name="tax" placeholder="Tax" autocomplete="off">
			                        </td>
			                        </tr>

			                        <tr>
			                        <td class="col-md-1"><b>GSIS<span style = "color:red;"></span></b></td>
			                        <td class="col-md-7">
			                        <input required value="0" onkeyup="myFunctiongsis()"  class="form-control input" type="number" step="any" class="" style="height: 35px;" id="gsis" name="gsis" placeholder="GSIS" autocomplete="off">
			                        </td>
			                        </tr>

			                        <tr>
			                        <td class="col-md-1"><b>PAG IBIG<span style = "color:red;"></span></b></td>
			                        <td class="col-md-7">
			                        <input required value="0" onkeyup="myFunctionpagibig()" class="form-control input" type="number" step="any" class="" style="height: 35px;" id="pagibig" name="pagibig" placeholder="Pag Ibig" autocomplete="off">
			                        </td>
			                        </tr>

			                        <tr>
			                        <td class="col-md-1"><b>PHILHEALTH<span style = "color:red;"></span></b></td>
			                        <td class="col-md-7">
			                        <input required value="0" onkeyup="myFunctionphilhealth()"  class="form-control input" type="number" step="any" class="" style="height: 35px;" id="philhealth" name="philhealth" placeholder="Philhealth" autocomplete="off">
			                        </td>
			                        </tr>

			                        <tr>
			                        <td class="col-md-1"><b>OTHER PAYABLES<span style = "color:red;"></span></b></td>
			                        <td class="col-md-7">
			                        <input required value="0" onkeyup="myFunctionother()" class="form-control input" type="number" step="any" class="" style="height: 35px;" id="other" name="other" placeholder="Other Payables" autocomplete="off">
			                        </td>
			                        </tr>

			                    </table>

			 
			                </div>
			                <button class="add_form_field pull-right btn btn-info btn-xs">Add NTA/NCA &nbsp; 
			                <span style="font-size:16px; font-weight:bold;">+ </span>
			              </button>
			              <br>
			              <br>
			                 <div class="container1">

			                    
			                    <div class="col-md-3">


			                        
			                        <tr>
			                        <td class="col-md-1"><b>CHARGE TO<span style = "color:red;">*</span></b></td>
			                        <td class="col-md-7">
			                        <select class="form-control select" style="width: 100%; height: 40px;" name="charge[]" id="charge" required >
			                        <option value = "">Select NCA/NTA</option>
			                        <option value = "NCA">NCA</option>
			                        <option value = "NTA">NTA</option>
			                        </select>

			                        
			                        </td>
			                        </tr>
			                 

			                    </div>

			                    <div class="col-md-3">

			                        <tr>
			                        <td class="col-md-1"><b>NCA/NTA NO.<span style = "color:red;">*</span></b></td>
			                        <td class="col-md-7">

			                        <!-- <label>Employee Name</label>
			                        <select class="form-control select2" style= "color:blue;text-align:center;"  id = "ntano">

			                        
			                        </select>  -->
			                        <!-- <input required value=""  class="form-control input" type="text"  class="" style="height: 35px;" id="ntano" name="ntano[]" placeholder="NCA/NTA NO." autocomplete="off"> -->

			                        <select class="form-control select2" style= "color:black;text-align:center;"  id = "ntano" name = "ntano[]"> <?php getNta();?> </select>
			                        
			                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
			                            <table class="table table-striped table-hover" id="main2" >
			                                <tbody id="result2" style="font-weight:bold" >
			                                </tbody>
			                                </table>

			                          
			                        </td>
			                        </tr>

			                    </div>
			                  <div class="col-md-3">

			                  <tr>
			                  <td class="col-md-1"><b>AMOUNT<span style = "color:red;">*</span></b></td>
			                  <td class="col-md-7">
			                  <input required value=""  class="form-control input" type="number" step="any"  class="" style="height: 35px; width:100" id="ntaamount" name="ntaamount[]" placeholder="0" autocomplete="off">
			                  </td>
			                  </tr>

			                  </div>

			                    <div class="col-md-3">

			                        <tr>
			                        <td class="col-md-1"><b>NCA/NTA BALANCE<span style = "color:red;">*</span></b></td>
			                        <td class="col-md-7">
			                        <input readonly required value=""  class="form-control input" type="text"  class="" style="height: 35px;" id="ntabalance" name="ntabalance[]" placeholder="0" autocomplete="off">
			                        </td>
			                        </tr>

			                    </div>

			                </div>

			                </div>

			            </div>
			        

			        <!-- LD DAP -->

			        </div>

			           
			        <div class="row mt-5">
			        	<div class="col-md-12">
							<center><input type="submit" name="submit" class="btn btn-success btn-lg" value="Save" id="butsave" style="margin-right:10px"></center>
			        	</div>
			        </div>

			       
			                
			        <!-- End of fields -->

				</form>

			<!-- end class -->
			</div>

			<!-- end box body -->
		</div>


	</div>
</div>