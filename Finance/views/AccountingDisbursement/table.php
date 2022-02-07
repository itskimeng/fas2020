<div class="col-md-12">
  	<div class="box box-primary dropbox">

	    <div class="box-body table-responsive">

<!-- 			<table class="table" > 
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
			<table>    --> 

			<!-- main table -->
			<div class="col-md-0" style="overflow-x:auto;">
				<table id="example2" class="table table-striped table-bordered table-responsive" style="background-color: white;" >
<!-- 					<thead>
						<tr style="background-color: white;color:blue;">
							<th style="text-align:center" width="">DVs No.</th>
							<th style="text-align:center" width="">ORS/BURS No.</th>
							<th style="text-align:center" width="">ORS/BURS DATE</th>
							<th style="text-align:center" width="">DATE RECEIVED</th>

							<th style="text-align:center" width="">DATE DISBURSED</th>
							<th style="text-align:center" width="">DATE RELEASED</th>
							<th style="text-align:center" width="400">PAYEE</th>
							<th style="text-align:center" width="400">PARTICULAR</th>
							<th style="text-align:center" width="">GROSS AMOUNT</th>
							<th style="text-align:center" width="">TOTAL DEDUCTIONS</th>
							<th style="text-align:center" width="">NET AMOUNT</th>
							<th style="text-align:center" width="">REMARKS</th>
							<th style="text-align:center" width="">STATUS</th>
							<th style="text-align:center" width="50">ACTION</th>
						</tr>
					</thead> -->


				     <thead>
						<tr style="color: white; background-color: #367fa9;">
							<th class="hidden"></th>
							<th style="color:#367fa9;"></th>
							<th class="text-center">DVs No.</th>
							<th class="text-center">Obligation No.</th>
							<th class="text-center">Date Created</th>
							<th class="text-center">Date Received</th>
							<th class="text-center">Date Disbursed</th>
							<th class="text-center">Payee</th>
							<th class="text-center">Particular</th>
							<th class="text-center">Gross Amount</th>
							<th class="text-center">Total Deduction</th>
							<th class="text-center">Net Amount</th>
							<th class="text-center">Remarks</th>
							<th class="text-center">Status</th>
							<th class="text-center">Action</th>
						</tr>
					</thead>

					<?php foreach ($data as $key => $item): 

						$id = $item["id"]; 
						$ors = $item["id"];
						$payee = $item["supplier"];
						$particular = $item["particular"];
						$amount1 = $item["amount"];
						$amount = number_format($amount1,2);
						$remarks = $item["remarks"];
						$status = $item["status"];
						$flag = $item["type"];
						$orsdate1 = $item["date_created"];
						$orsdate = date('F d, Y', strtotime($orsdate1));

						$tax = $item['tax'];
						$gsis = $item['gsis'];
						$pagibig = $item['pagibig'];
						$philhealth = $item['philhealth'];
						$other = $item['other'];
						$total = $item['total'];
						$net_amount = $item['net_amount'];
						$dv_remarks = $item['dv_remarks'];
						$dv_status = $item['dv_status'];
						$dv_date_received = $item['dv_date_received'];
						$dv_date_process = $item['dv_date_process'];
						$dv_date_released = $item['dv_date_released'];
						?>
						<tr>
				            <td class="hidden" style="vertical-align: middle;"><?php echo $ors; ?></td>
				            <td style="vertical-align: middle; width: 5%;"></td>
							<td><a href="" onclick="myFunction(this)" data-flag="<?php echo $flag;?>" data-ors="<?php echo $ors;?>" data-toggle="modal" data-target="#dv_data_Modal"><?php echo $item['dv_number']; ?></a></td>
							<td><?php echo $ors;?></td>
							<td><?php echo $item['date_created']; ?></td>

							<?php if (empty($item['dv_date_received']) || $item['dv_date_received']== '00/00/0000'): ?>
							<td><a href="received_dv.php?ors=<?php echo $ors;?>" class="btn btn-primary"><i class="fa fa-download"></i> Receive</a></td>
							<?php else: ?>
							<td><?php echo $item['dv_date_received'] ?></td>
							<?php endif ?>



							<?php if (empty($item['dv_date_received']) || $item['dv_date_received']== '00/00/0000'): ?>
								<td><a class="btn btn-success" href='#' disabled=''><i class="fa fa-refresh"> Process</i></a></td>
							<?php else: ?>
								<?php if (empty($item['dv_date_released']) || $item['dv_date_released']== '00/00/0000'): ?>
									<td><a class="btn btn-success" href='accounting_disbursement_process.php?ors=<?php echo $ors;?>&flag=<?php echo $flag;?>&payee=<?php echo $payee;?>&particular=<?php echo $particular;?>&amount=<?php echo $amount;?>&orsdate=<?php echo $orsdate;?>'><i class="fa fa-refresh"> Process</i></a> </td>
								<?php else: ?>
									<td><?php echo $item['dv_date_released']; ?></td>
								<?php endif ?>
							<?php endif ?>

							<td><?php echo $payee;?></td>
							<td><?php echo $particular;?></td>
							<td><?php echo $amount1;?></td>
							<td><?php echo $item['total'];?></td>
							<td><?php echo $item['net_amount'];?></td>
							<td><?php echo $dv_remarks;?></td>

							<td><b><?php if ($item['dv_status'] == '') { echo "Pending"; } else { echo $item['dv_status']; } ?></b></td>

							<td>
								<a  class="btn btn-primary" href='accounting_disbursement_update.php?ors=<?php echo $ors;?>&flag=<?php echo $flag;?>&payee=<?php echo $payee;?>&particular=<?php echo $particular;?>&amount=<?php echo $amount;?>&orsdate=<?php echo $orsdate;?>'> <i class='fa fa-edit'></i></a>
								<!-- <a  class="btn btn-danger" href='Disbursement_Update.php?id=<?php echo $ors?>'> <i class='fa fa-undo'></i></a> -->
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