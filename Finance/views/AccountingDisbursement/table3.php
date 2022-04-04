
 <div class="box-body table-responsive">

	<!-- main table -->
	<div class="col-md-0" style="overflow-x:auto;">
		<table id="example2" class="table table-striped table-bordered table-responsive" style="background-color: white;" >
		     <thead>
				<tr style="color: white; background-color: #367fa9;">
					<th class="text-center">Office</th>
					<th class="text-center">LDDAP No.</th>
					<th class="text-center">LDDAP Date.</th>
					<th class="text-center">DV No.</th>
					<th class="text-center">Particular</th>
					<th class="text-center">Total Amount</th>
					<th class="text-center">Disbursed Amount</th>
					<th class="text-center">Balance</th>
					<th class="text-center">Action</th>
				</tr>
			</thead>

			<?php foreach ($endUserDv as $key => $item): 

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
					<td align="center"><b><?php echo $po_supplier;?></b></td>
					<td align="center"><span class="badge bg-green"><?php echo $item['lddap'];?></span></td>
					<td align="center"><?php echo $item['lddap_date'];?></td>
					<td align="center"><?php echo $item['dv_no'];?></td>
					<td align="center"><?php echo $item['particular'];?></td>
					<td align="center"><?php echo $item['fundsource_amount'];?></td>
					<td align="center"><?php echo $item['disbursed_amount'];?></td>
					<td align="center"><?php echo $item['balance'];?></td>
					<td align="center">
						<a href="lddap_history.php?lddap_id=<?php echo $item['id']; ?>" class="btn btn-primary"><i class="fa fa-eye"></i></a>
					</td>
					<!-- <td align="center"><a href="accounting_disbursement_create.php?id=<?php echo $item['id']; ?>&lddap=<?php echo $item['p_id']; ?>" class="btn btn-primary"><i class="fa fa-edit"></i></a></td> -->

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