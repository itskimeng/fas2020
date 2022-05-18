
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

			<?php foreach ($data as $key => $item): 

				if ($item['po_supplier'] == 1) 
				{
					$po_supplier = 'Cavite';
				}
				else if ($item['po_supplier'] == 2) 
				{
					$po_supplier = 'Laguna';
				}
				else if ($item['po_supplier'] == 3) 
				{
					$po_supplier = 'Batangas';
				}
				else if ($item['po_supplier'] == 4) 
				{
					$po_supplier = 'Rizal';
				}
				else if ($item['po_supplier'] == 5) 
				{
					$po_supplier = 'Quezon';
				}
				else
				{
					$po_supplier = 'Lucena';
				}

				?>

				<tr>
		            <td class="hidden" style="vertical-align: middle;"><?php echo $item["id"]; ?></td>
		            <td style="vertical-align: middle; width: 5%;"></td>

					<td align="center">
						<b><?php if ($item['dv_number'] != '') { echo $item['dv_number']; } else { echo '------'; } ?></b>
					</td>

					<td>
						<span class="badge bg-green" onclick="openSummary('<?php echo 'view_dv_uacs.php?id='.$item['id']; ?>');">
							<b><?php echo $item['serial_no'];?></b>
						</span>
					</td>

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

					<td align="center"><?php if ($item['supplier'] != '') { echo $item['supplier']; } else { echo $po_supplier; } ?></td>
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
							<button class="btn btn-danger btn_return" id="" data-toggle="modal" data-target="#modal_return" title="Return" onclick="getObId('<?php echo $item["id"]; ?>');"><i class="fa fa-undo"></i></button>
						</td>
					<?php elseif ($item['dv_status'] == 'Draft'): ?>
						<td>
							<a  class="btn btn-success" href='accounting_disbursement_process.php?ors=<?php echo $item["id"];?>&flag=<?php echo $item["type"];?>&status=Draft' title="update"> <i class='fa fa-edit'></i></a>
							<button class="btn btn-danger btn_return" id="" data-toggle="modal" data-target="#modal_return" title="Return" onclick="getObId('<?php echo $item["id"]; ?>', '<?php echo $item["dv_id"]; ?>');"><i class="fa fa-undo"></i></button>
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

</div>
<div id="modal-vimeo" class="modais" data-izimodal-transitionin="fadeInUp"></div>

<script type="text/javascript">
	
	function openSummary(nta_link)
	{
		$(".modais").iziModal({
			title: 'Fundsource Breakdown',
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