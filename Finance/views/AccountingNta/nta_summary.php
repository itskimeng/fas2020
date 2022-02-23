<div class="col-md-12">
  	<div class="box box-primary dropbox">
		<div class="box-header">
			<table>
				<thead>
					<tr style="background-color: #cbdded;">
						<th width="170"><h3 class="box-title mt-5"><i class="fa fa-dot-circle"></i> NTA NUMBER </h3></th>
						<th width="50"><center><h3 class="box-title mt-5"><i class="fa fa-dot-circle"></i> <b>:</b> </h3></center></th>
						<th width="200"><h3 class="box-title mt-5"><i class="fa fa-dot-circle"></i> <b><?php echo $nta_details['nta_number']; ?></b> </h3></th>
					</tr>
					<tr style="background-color: #cbdded;">
						<th width="170"><h3 class="box-title mt-5"><i class="fa fa-dot-circle"></i> PARTICULAR</h3></th>
						<th width="50"><center><h3 class="box-title mt-5"><i class="fa fa-dot-circle"></i> <b>:</b> </h3></center></th>
						<th width="200"><h3 class="box-title mt-5"><i class="fa fa-dot-circle"></i> <b><?php echo $nta_details['particular']; ?></b> </h3></th>
					</tr>
					<tr style="background-color: #0f4a7d; color: white;">
						<th width="170"><h3 class="box-title mt-5"><i class="fa fa-dot-circle"></i> TOTAL AMOUNT</h3></th>
						<th width="50"><center><h3 class="box-title mt-5"><i class="fa fa-dot-circle"></i> <b>:</b> </h3></center></th>
						<th width="200"><h3 class="box-title mt-5"><i class="fa fa-dot-circle"></i> <b><?php echo '₱'.number_format($nta_details['amount'], 2); ?></b> </h3></th>
					</tr>
					<tr style="background-color: #913030; color: white;">
						<th width="170"><h3 class="box-title mt-5"><i class="fa fa-dot-circle"></i> DISBURSED AMOUNT</h3></th>
						<th width="50"><center><h3 class="box-title mt-5"><i class="fa fa-dot-circle"></i> <b>:</b> </h3></center></th>
						<th width="200"><h3 class="box-title mt-5"><i class="fa fa-dot-circle"></i> <b><?php echo '₱'.number_format($nta_details['obligated'], 2); ?></b> </h3></th>
					</tr>	
					<tr style="background-color: #357f2c; color: white;">
						<th width="170"><h3 class="box-title mt-5"><i class="fa fa-dot-circle"></i> BALANCE</h3></th>
						<th width="50"><center><h3 class="box-title mt-5"><i class="fa fa-dot-circle"></i> <b>:</b> </h3></center></th>
						<th width="200"><h3 class="box-title mt-5"><i class="fa fa-dot-circle"></i> <b><?php echo '₱'.number_format($nta_details['balance'], 2); ?></b> </h3></th>
					</tr>
				</thead>
			</table>

		</div>
	    <div class="box-body table-responsive">
			<!-- main table -->
			<table id="example1" class="table table-striped table-bordered table-hover" style="background-color: white;">
				<thead>	
					<tr>
						<th class="main_th" width="50">DVs No.</th>
						<th class="main_th" width="">ORS/BURS No.</th>
						<th class="main_th" width="">ORS DATE</th>
						<th class="main_th" width="">DATE DISBURSED</th>
						<th class="main_th" width="">PAYEE</th>
						<th class="main_th" width="">GROSS AMOUNT</th>
						<th class="main_th" width="">TOTAL DEDUCTIONS</th>
						<th class="main_th" width="">NET AMOUNT</th>
						<th class="main_th" width="">DISBURSED AMOUNT</th>
						<th class="main_th" width="">REMARKS</th>
						<th class="main_th" width="">STATUS</th>
					</tr>
				</thead>

				<tbody>
					<?php foreach ($getNtaSummary as $key => $nta_summary): ?>
						<tr>
							<td><button class="btn btn-info btn-xs" onclick="openSummary('<?php echo 'view_dv_uacs.php?id='.$nta_summary['ob_id']; ?>');"><?php echo $nta_summary['dv_number']; ?></button></td>
							<td><?php echo $nta_summary['ob_serial_no']; ?></td>
							<td><?php echo $nta_summary['ob_date_created']; ?></td>
							<td><?php echo $nta_summary['dv_date_process']; ?></td>
							<td><?php echo $nta_summary['supplier']; ?></td>
							<td><?php echo $nta_summary['ob_amount']; ?></td>
							<td><?php echo $nta_summary['dv_total']; ?></td>
							<td><?php echo $nta_summary['dv_net_amount']; ?></td>
							<td>
								<?php 
									if ($nta_summary['nta_disbursed_amount'] > $nta_summary['ob_amount']) 
									{
										// echo '<a href="view_dv_summary.php?id='.$nta_summary['nta_dv_id'].'">'.$nta_summary['nta_disbursed_amount'].'</a>'; 

										echo '<center><button class = "btn btn-info btn-xs" onclick="checkModal(\'view_dv_summary.php?id='.$nta_summary['nta_dv_id'].'\')">'.$nta_summary['nta_disbursed_amount'].'</button></center>';
									}
									else
									{
										echo '<center>'.$nta_summary['nta_disbursed_amount'].'</center>'; 
									}
								?>
							</td>
							<td><?php echo $nta_summary['dv_remarks']; ?></td>
							<td><?php echo $nta_summary['dv_status']; ?></td>

						</tr>
					<?php endforeach ?>
				</tbody>


				<!-- <a href='@Functions/sarodeletefunction.php?getid=$id'> <i style='font-size:24px'<i class='fa fa-trash-o'></i> </a> -->
			</table>
			<!-- main table -->
	    </div>
	</div>
</div>

<script type="text/javascript">
	function checkModal(nta_link)
	{
		$(".modais").iziModal({
			title: 'Disbursement Voucher Amount Summary',
			headerColor: '#388eaf',
			iframe: true,
			iframeHeight: 350,
			width: 1000,
			// openFullscreen: true,
			iframeURL: nta_link, 
			onClosing: function(){
			  window.location.reload(true); // Use true to always force reload from the server
			}
		});
		$('.modais').iziModal('open')
	}


	function openSummary(nta_link)
	{
		$(".modais").iziModal({
			title: 'Disbursement Breakdown',
			headerColor: '#388eaf',
			iframe: true,
			iframeHeight: 350,
			width: 1000,
			// openFullscreen: true,
			iframeURL: nta_link, 
			onClosing: function(){
			  window.location.reload(true); // Use true to always force reload from the server
			}
		});
		$('.modais').iziModal('open')
	}
</script>