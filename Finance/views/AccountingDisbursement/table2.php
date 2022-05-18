
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
					<!-- <th class="text-center">Date Received</th> -->
					<!-- <th class="text-center">Date Disbursed</th> -->
					<!-- <th class="text-center">Attachment</th> -->
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

			<?php foreach ($data1 as $key => $item): 

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
					<td><?php echo $item['serial_no'];?></td>
					<td><?php echo $item['date_created']; ?></td>

					<!-- <?php if (empty($item['dv_date_received']) || $item['dv_date_received']== '00/00/0000'): ?>
					<td><a href="received_dv.php?ors=<?php echo $ors;?>" class="btn btn-primary"><i class="fa fa-download"></i> Receive</a></td>
					<?php else: ?>
					<td><?php echo $item['dv_date_received'] ?></td>
					<?php endif ?> -->



		<!-- 			<?php if (empty($item['dv_date_received']) || $item['dv_date_received']== '00/00/0000'): ?>
						<td><a class="btn btn-success" href='#' disabled=''><i class="fa fa-refresh"> Process</i></a></td>
					<?php else: ?>
						<?php if (empty($item['dv_date_released']) || $item['dv_date_released']== '00/00/0000'): ?>
							<td><a class="btn btn-success" href='accounting_disbursement_process.php?ors=<?php echo $ors;?>&flag=<?php echo $flag;?>&payee=<?php echo $payee;?>&particular=<?php echo $particular;?>&amount=<?php echo $amount;?>&orsdate=<?php echo $orsdate;?>'><i class="fa fa-refresh"> Process</i></a> </td>
						<?php else: ?>
							<td><?php echo $item['dv_date_released']; ?></td>
						<?php endif ?>
					<?php endif ?>
 -->
					<td><?php echo $payee;?></td>
					<td><?php echo $particular;?></td>
					<td><?php echo $amount1;?></td>
					<td><?php echo $item['total'];?></td>
					<td><?php echo $item['net_amount'];?></td>
					<td><?php echo $dv_remarks;?></td>
					<td><b><span><?php echo $item['dv_status'];?></span></b></td>

					<?php if ($item['dv_status'] == 'For Sign'): ?>
						<!-- <td><a href="received_dv.php?ors=<?php echo $ors;?>" class="btn btn-warning"><i class="fa fa-download" title="Receive PO"></i></a></td> -->
						<td>
							<!-- <button class="btn btn-success" title="Sign" data-toggle="modal" data-target="#modal_sign"><i class="fa fa-edit"></i></button> -->
							<button class="btn btn-success" title="Sign" onclick="view_modal(<?php echo $item['dv_id'] ?>);"><i class="fa fa-edit"></i></button>
						</td>

					<?php elseif ($item['dv_status'] == 'Signed'): ?>
						<td>
							<a href="Finance/views/AccountingDisbursement/signed_files/<?php echo $item['ds_temp_name']; ?>" class="btn btn-success btn-sm" target="_blank">View <i class="fa fa-link"></i></a>
						</td>

					<?php else: ?>
						<td><a href="received_dv_po.php?ors=<?php echo $ors;?>" class="btn btn-warning"><i class="fa fa-download" title="Receive PO"></i></a></td>
					<?php endif ?>
					

					<!--   <td>
					<?php echo $flag;?>
					</td> -->
				</tr>
			<?php endforeach ?>

		</table>
	</div>

	<!-- main table -->

	<!-- additional module -->
	<form action="Finance/route/sign_dv.php" method="POST" enctype="multipart/form-data">
		<div class="modal fade" id="modal_sign" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h3 class="modal-title" id="exampleModalLabel">Please upload attachment</h3>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		        <!-- <center><input type="file" name=""></center> -->
		        <input type="" id="dv_id" style="display: none;" name="dv_id">
		        <center>
		            <div class="input-group" style="width: 75%;">
		                <label class="input-group-btn">
		                    <span class="btn btn-primary">
		                        Browse file <input type="file" style="display: none;" name="signatory" required="">
		                    </span>
		                </label>
		                <input type="text" class="form-control" readonly>
		            </div>
	            </center>

		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		        <button type="submit" class="btn btn-primary">Save changes</button>
		      </div>
		    </div>
		  </div>
		</div>
	</form>
	<!-- additional module -->

</div>



<script type="text/javascript">
	
$(function() {

  // This code will attach `fileselect` event to all file inputs on the page
  $(document).on('change', ':file', function() {
    var input = $(this),
        numFiles = input.get(0).files ? input.get(0).files.length : 1,
        label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
    input.trigger('fileselect', [numFiles, label]);
  });

  
  $(document).ready( function() {
//below code executes on file input change and append name in text control
      $(':file').on('fileselect', function(event, numFiles, label) {

          var input = $(this).parents('.input-group').find(':text'),
              log = numFiles > 1 ? numFiles + ' files selected' : label;

          if( input.length ) {
              input.val(log);
          } else {
              if( log ) alert(log);
          }

      });
  });
  
});

function view_modal(id)
{
	$('#dv_id').val(id);
	$('#modal_sign').modal('show');
}



</script>