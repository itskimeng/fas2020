
 <div class="box-body table-responsive">

	<!-- main table -->
	<div class="col-md-0" style="overflow-x:auto;">
		<table id="example2" class="table table-striped table-bordered table-responsive" style="background-color: white;" >
		     <thead>
				<tr style="color: white; background-color: #367fa9;">
					<th class="hidden"></th>
					<th style="color:#367fa9;" width="2%"></th>
					<th class="text-center">DVs No.</th>
					<th class="text-center">ORS No.</th>
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

			<?php foreach ($data as $key => $item): ?>

				<tr>
		            <td class="hidden" style="vertical-align: middle;"><?php echo $item["id"]; ?></td>
		            <td style="vertical-align: middle; width: 5%;"></td>

					<td>
						<a href="" onclick="myFunction(this)" data-flag="<?php echo $item["type"];?>" data-ors="<?php echo $item["id"];?>" data-toggle="modal" data-target="#dv_data_Modal"><b><?php echo $item['dv_number']; ?></b></a>
					</td>

					<td><b><?php echo $item['serial_no'];?></b></td>

					<td><?php echo $item['date_created']; ?></td>

					<?php if (empty($item['dv_date_received']) || $item['dv_date_received']== '00/00/0000'): ?>
						<td><a href="received_dv.php?ors=<?php echo $item["id"];?>" class="btn btn-primary"><i class="fa fa-download"></i> Receive</a></td>
					<?php else: ?>
						<td><?php echo $item['dv_date_received'] ?></td>
					<?php endif ?>



					<?php if (empty($item['dv_date_received']) || $item['dv_date_received']== '00/00/0000'): ?>
						<td><a class="btn btn-success" href='#' disabled=''><i class="fa fa-refresh"> Process</i></a></td>
					<?php else: ?>
						<?php if (empty($item['dv_date_released']) || $item['dv_date_released']== '00/00/0000'): ?>
							<td>
								<a class="btn btn-success" href='accounting_disbursement_process.php?ors=<?php echo $item["id"];?>&flag=<?php echo $item["type"];?>&payee=<?php echo $item['supplier'];?>&particular=<?php echo $item['particular'];?>&amount=<?php echo $item['amount'];?>&orsdate=<?php echo date('F d, Y', strtotime($item["date_created"]));?>'><i class="fa fa-refresh"> Process</i></a>
							</td>
						<?php else: ?>
							<td><?php echo $item['dv_date_released']; ?></td>
						<?php endif ?>
					<?php endif ?>

					<td><?php echo $item['supplier'];?></td>
					<td><?php echo $item['particular'];?></td>
					<td><?php echo $item['amount'];?></td>
					<td><?php echo $item['total'];?></td>
					<td><?php echo $item['net_amount'];?></td>
					<td><?php echo $item['dv_remarks'];?></td>

					<td>
						<b>
							<span>
								<?php if ($item['dv_status'] == '') 
								{ 
									echo "<span class='badge bg-yellow'>Pending<span>"; 
								} 
								else if ($item['dv_status'] == 'Disbursed') 
								{ 
									echo "<span class='badge bg-blue'>Disbursed<span>"; 
								} 
								else if ($item['dv_status'] == 'Received - Cash') 
								{ 
									echo "<span class='badge bg-green'>Received - Cash<span>"; 
								} 
								else 
								{ 
									echo "<span class='badge bg-primary'>Draft<span>"; 
								} ?>
								
							</span>
						</b>
					</td>

					<?php if ($item['dv_status'] == ''): ?>
						<td>
							<a href="received_dv.php?ors=<?php echo $item["id"];?>" class="btn btn-warning">
								<i class="fa fa-download" title="Receive"></i>
							</a>
						</td>
					<?php elseif ($item['dv_status'] == 'Draft'): ?>
						<td>
							<a  class="btn btn-success" href='accounting_disbursement_process.php?ors=<?php echo $item["id"];?>&flag=<?php echo $item["type"];?>&status=Draft' title="update"> <i class='fa fa-edit'></i></a>
						</td>
					<?php else: ?>
						<td>
							<a  class="btn btn-primary" href='accounting_disbursement_update.php?ors=<?php echo $item["id"];?>&flag=<?php echo $item["type"];?>' title="view"> <i class='fa fa-eye'></i></a>
						</td>
					<?php endif ?>

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