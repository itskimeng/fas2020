<div class="col-md-12">
  	<div class="box box-primary dropbox">

	    <div class="box-body table-responsive">

			<table class="table" > 
				<!-- Header -->
				<tr>
					<td class="col-md-1">
						<li class="btn btn-success"><a href="accounting_disbursement_create.php" style="color:white;text-decoration: none;">Create <i class="fa fa-plus"></i></a></li>
					</td>

					<td class="col-md-7" >
					</td>
					<form method = "POST" action = "@Functions/ddateexport1.php">
						<td class="col-md-1" style = "text-align:center;">
							<input type="text" class="" id="datepicker1" placeholder='From Date' name="datefrom" style="height: 35px; width: 220px" value = "<?php echo $timeNow;?>">
						</td>
						<td class="col-md-1" >
							<input type="text" class="" id="datepicker2" placeholder='To Date' name="dateto" style="height: 35px; width: 220px" value = "<?php echo $timeNow;?>">
						</td>
						<td class="col-md-1" >
							<button type="submit" name="submit"  class="btn btn-success pull-right ">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Filter/Export Data&nbsp;&nbsp;<i class="fa fa-print"></i></button>
						</td>
						<td class="col-md-1" >
							<button type="Summary" name="Summary"  class="btn btn-success pull-right">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Export Summary&nbsp;&nbsp;&nbsp;<i class="fa fa-list-alt"></i></button>
						</td>

					</form>


					</td>
				</tr>
			<!-- Header -->
			<table>    

			<br>
			<!-- main table -->
			<div class="col-md-0" style="overflow-x:auto;">
				<table id="example1" class="table table-striped table-bordered table-responsive" style="background-color: white;" >
					<thead>
						<tr style="background-color: white;color:blue;">
							<th style="text-align:center" width="">DVs No.</th>
							<th style="text-align:center" width="">ORS/BURS No.</th>
							<!-- <th style="text-align:center" width="">SR No.</th>
							<th style="text-align:center" width="">PPA</th>
							<th style="text-align:center" width="">UACS</th> -->
							<th style="text-align:center" width="">ORS/BURS DATE</th>
							<th style="text-align:center" width="">DATE RECEIVED</th>

							<th style="text-align:center" width="">DATE DISBURSED</th>
							<th style="text-align:center" width="">DATE RELEASED</th>
							<th style="text-align:center" width="400">PAYEE</th>
							<th style="text-align:center" width="400">PARTICULAR</th>
							<th style="text-align:center" width="">GROSS AMOUNT</th>
							<!--  <th style="text-align:center" width="">TAX</th>
							<th style="text-align:center" width="">GSIS</th>
							<th style="text-align:center" width="">PAGIBIG</th>
							<th style="text-align:center" width="">PHILHEALTH</th>
							<th style="text-align:center" width="">OTHER PAYABLES</th> -->
							<th style="text-align:center" width="">TOTAL DEDUCTIONS</th>
							<th style="text-align:center" width="">NET AMOUNT</th>
							<th style="text-align:center" width="">REMARKS</th>
							<th style="text-align:center" width="">STATUS</th>
							<th style="text-align:center" width="50">ACTION</th>
							<!-- <th style="text-align:center" width="150">FLAG</th> -->
						</tr>
					</thead>

					<?php
					
					foreach ($data as $key => $item): 

						$id = $item["ID"]; 
						$dv = $item["dv"];
						$ors = $item["ors"];
						$sr = $item["sr"];
						$ppa = $item["ppa"];
						$uacs = $item["uacs"];
						$datereceived = $item["datereceived"];
						$datereceived11 = date('F d, Y', strtotime($datereceived));
						$timereceived = $item["timereceived"];
						$payee = $item["payee"];
						$particular = $item["particular"];
						$amount1 = $item["amount"];
						$amount = number_format($amount1,2);
						$tax = $item["tax"];
						$gsis = $item["gsis"];
						$pagibig  = $item["pagibig"];
						$philhealth = $item["philhealth"];
						$other = $item["other"];
						$total1 = $item["total"];
						$total = number_format($total1,2);

						$net1 = $item["net"];
						$net = number_format($net1,2);
						$remarks = $item["remarks"];
						$status = $item["status"];


						//Getting Flag
						$flag = $item["flag"];

						$date_proccess1 = $item["date_proccess"];
						$date_proccess = date('F d, Y', strtotime($date_proccess1));
						$datereleased1 = $item["datereleased"];
						$datereleased = date('F d, Y', strtotime($datereleased1));


						$orsdate1 = $item["orsdate"];
						// echo $orsdate1;

						$orsdate = date('F d, Y', strtotime($orsdate1));
						?>
						<tr>
						<td><a href="" onclick="myFunction(this)" data-flag="<?php echo $flag;?>" data-ors="<?php echo $ors;?>" data-toggle="modal" data-target="#dv_data_Modal"><?php echo $dv;?></a></td>
						<td><?php echo $ors;?></td>

						<?php if ( $orsdate1 =='0000-00-00' || $orsdate1 == '1970-01-01' ): ?>
						<td></td>
						<?php else: ?>
						<td><?php echo $orsdate;?></td>
						<?php endif ?>

						<?php if ($datereceived == '1970-01-01' || $datereceived =='0000-00-00'): ?>
						<td><a href="received_dv.php?ors=<?php echo $ors;?>" class="btn btn-primary btn-xs">Receive</a></td>
						<?php else: ?>
						<td><?php echo $datereceived11;?></td>
						<?php endif ?>



						<?php if ($date_proccess1 != NULL  ): ?>
							<td><?php echo $date_proccess;?></td>
						<?php else: ?>
						<?php if ($datereceived != '0000-00-00'): ?>
							<td><a class="btn btn-success btn-xs" href='Disbursement_process.php?ors=<?php echo $ors;?>&flag=<?php echo $flag;?>&payee=<?php echo $payee;?>&particular=<?php echo $particular;?>&amount=<?php echo $amount;?>&orsdate=<?php echo $orsdate;?>'>Process</a> </td>
						<?php else: ?>
							<td></td>
						<?php endif ?>
						<?php endif ?> 


						<?php if ($date_proccess1 == '0000-00-00'): ?>
							<td>
							</td>
						<?php else: ?>
						<?php if ($datereleased1 != '0000-00-00'): ?>
							<td><?php echo $datereleased;?></td>
						<?php else: ?>

							<td><!-- <a class="btn btn-success btn-xs" href='release_dv.php?id=<?php echo $id; ?>' >Release</a>  --></td>
						<?php endif ?>

						<?php endif ?>



						<td><?php echo $payee;?></td>
						<td><?php echo $particular;?></td>
						<td><?php echo $amount;?></td>
						<td><?php echo $total;?></td>
						<td><?php echo $net;?></td>
						<td><?php echo $remarks;?></td>

						<td><?php if ($status == 'Paid') { echo "Disbursed"; } else { echo $status; } ?></td>

						<td>
							<a  class="btn btn-primary btn-xs" href='Disbursement_Update.php?id=<?php echo $ors?>'> <i class='fa'>&#xf044;</i>  Edit </a>
							<!-- <a  class = "btn btn-primary btn-xs" href='disbursementupdate.php?getid=<?php echo $id;?>' > <i class='fa'>&#xf044;</i> Edit</a> | 

							<a onclick="return confirm('Are you sure you want to delete this record?');" name=""  href="@Functions/ddeletefunction.php?getid=<?php echo $id;?>" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete</a>                                      -->
						</td>
						<!--   <td>
						<?php echo $flag;?>
						</td> -->
						</tr>
					<?php endforeach ?>

				</table>
			</div>

			<!-- main table -->

			<!-- additional module -->

	        <div id="dv_data_Modal" class="modal fade" role="dialog" >
	          <div class="modal-dialog modal-lg">
	            <div class="modal-content">
	            <div class="modal-header">
	              <button type="button" class="close" data-dismiss="modal">&times;</button>
	              <h4 class="modal-title">DISBURSEMENT</h4>
	            </div>
	            <div class="modal-body">
	              <!-- <form method="POST" action="ro_cancel.php" > -->
	              
	        
	              <div class="addmodal" >
	              <h4 class="modal-title">Breakdown for BURS/ORS No.&nbsp;<input style="border:none; font-weight:bolder"  type="text" name="ors11" id="ors11" value="" class=""/></h4>
	              
	           
	              <br>

	            
					<div class="row">
					<div class="col-md-12">
					<div class="col-md-12" >
					<!-- Table of Uacs -->
					<table id="example" class="table table-responsive table-stripped table-bordered " style="background-color: white; width:100%; text-align:left; border-style: groove;" >
					<thead>
					<tr style="background-color: #A9A9A9;  text-align:left; border-style: groove; " >

					<th width='500'>ID</th>
					<th width='500'>FUND SOURCE</th>
					<th width='500'>PPA </th>
					<th width='500'>UACS </th>
					<th width='500'>AMOUNT </th>
					<th width='500'>STATUS </th>
					<!-- <th width='500'>ACTION</th> -->

					</thead>

					</table>

					<!-- Table of Uacs -->

					</div>
					</div>
					</div>


	              <input hidden   type="text" name="ors1" id="ors1" value="" class=""/>
	              <br>
	              <input hidden  type="text" name="user" id="user" value="<?php echo $username1?>" class=""/>
	              <br>
	              <input hidden  type="text" name="now" id="now" value=" <?php date_default_timezone_set('Asia/Manila'); echo date('F d, Y') ?>" class=""/>
	              </tr>
	              </table>
	     
	                </div>
	           
	                <!-- </form> -->
	          </div>
	        </div>


			<!-- additional module -->

	    </div>


	</div>

</div>