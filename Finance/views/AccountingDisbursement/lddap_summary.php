
<div class="col-md-12">
  	<div class="box box-warning dropbox">
		<div class="box-header">
			<a href="accounting_disbursement.php" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Back</a>
		</div>
	</div>
</div>


<div class="col-md-12">
  	<div class="box box-primary dropbox">
		<div class="box-header">
			<?php foreach ($endUserDv1 as $key => $item):
				$lddap_id = $item['id'];
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
			<table>
				<thead>
					<tr style="background-color: #f3d7d9;">
						<th width="200"><h3 class="box-title mt-5"><i class="fa fa-dot-circle"></i> <b>PROVINCE</b> </h3></th>
						<th width="50"><center><h3 class="box-title mt-5"><i class="fa fa-dot-circle"></i> <b>:</b> </h3></center></th>
						<th width="300"><h3 class="box-title mt-5"><i class="fa fa-dot-circle"></i> <b><?php echo $po_supplier; ?></b> </h3></th>
					</tr>
					<tr style="background-color: #cbdded;">
						<th width="200"><h3 class="box-title mt-5"><i class="fa fa-dot-circle"></i> <b>LDDAP</b> </h3></th>
						<th width="50"><center><h3 class="box-title mt-5"><i class="fa fa-dot-circle"></i> <b>:</b> </h3></center></th>
						<th width="300"><h3 class="box-title mt-5"><i class="fa fa-dot-circle"></i> <b><?php echo $item['lddap']; ?></b> </h3></th>
					</tr>
					<tr style="background-color: #cbdded;">
						<th width="200"><h3 class="box-title mt-5"><i class="fa fa-dot-circle"></i> <b>LDDAP DATE</b></h3></th>
						<th width="50"><center><h3 class="box-title mt-5"><i class="fa fa-dot-circle"></i> <b>:</b> </h3></center></th>
						<th width="300"><h3 class="box-title mt-5"><i class="fa fa-dot-circle"></i> <b><?php echo $item['lddap_date']; ?></b> </h3></th>
					</tr>
					<tr style="background-color: #4883d5; color: white;">
						<th width="200"><h3 class="box-title mt-5"><i class="fa fa-dot-circle"></i> DISBUSEMENT VOUCHER </h3></th>
						<th width="50"><center><h3 class="box-title mt-5"><i class="fa fa-dot-circle"></i> <b>:</b> </h3></center></th>
						<th width="300"><h3 class="box-title mt-5"><i class="fa fa-dot-circle"></i> <b><?php echo $item['dv_no']; ?></b> </h3></th>
					</tr>
					<tr style="background-color: #0f4a7d; color: white;">
						<th width="200"><h3 class="box-title mt-5"><i class="fa fa-dot-circle"></i> PARTICULAR</h3></th>
						<th width="50"><center><h3 class="box-title mt-5"><i class="fa fa-dot-circle"></i> <b>:</b> </h3></center></th>
						<th width="300"><i class="fa fa-dot-circle"></i> <?php echo $item['particular']; ?></th>
					</tr>
					<tr style="background-color: #959b08; color: white;">
						<th width="200"><h3 class="box-title mt-5"><i class="fa fa-dot-circle"></i> TOTAL AMOUNT</h3></th>
						<th width="50"><center><h3 class="box-title mt-5"><i class="fa fa-dot-circle"></i> <b>:</b> </h3></center></th>
						<th width="300"><h3 class="box-title mt-5"><i class="fa fa-dot-circle"></i> <b><?php echo $item['fundsource_amount']; ?></b> </h3></th>
					</tr>
					<tr style="background-color: #913030; color: white;">
						<th width="200"><h3 class="box-title mt-5"><i class="fa fa-dot-circle"></i> DISBURSED AMOUNT</h3></th>
						<th width="50"><center><h3 class="box-title mt-5"><i class="fa fa-dot-circle"></i> <b>:</b> </h3></center></th>
						<th width="300"><h3 class="box-title mt-5"><i class="fa fa-dot-circle"></i> <b><?php echo $item['disbursed_amount']; ?></b> </h3></th>
					</tr>
					<tr style="background-color: #357f2c; color: white; height: 40px;">
						<th width="200"><h3 class="box-title mt-5"><i class="fa fa-dot-circle"></i> BALANCE</h3></th>
						<th width="50"><center><h3 class="box-title mt-5"><i class="fa fa-dot-circle"></i> <b>:</b> </h3></center></th>
						<th width="300"><h3 class="box-title mt-5"><i class="fa fa-dot-circle"></i> <b><?php echo $item['balance']; ?></b> </h3></th>
					</tr>
				</thead>
			</table>
			<?php endforeach ?>
		</div>
	    <div class="box-body table-responsive">
			<!-- main table -->
			<table id="example1" class="table table-striped table-bordered table-hover" style="background-color: white;">
				<thead style="background-color: #367fa9 !important; color: white; font-size: 80% !important;">	
					<tr>
						<th class="main_th" width=""><center>DV No.</center></th>
						<th class="main_th" width=""><center>DATE DISBURSED</center></th>
						<th class="main_th" width=""><center>TOTAL DEDUCTIONS</center></th>
						<th class="main_th" width=""><center>DISBURSED AMOUNT</center></th>
						<th class="main_th" width=""><center>STATUS</center></th>
						<th class="main_th" width=""><center>ACTION</center></th>
					</tr>
				</thead>

				<tbody>
					<?php foreach ($getDvEntries as $key => $dv_summary): ?>
						<tr>
							<td align="center"><span class="badge bg-green"><?php echo $dv_summary['dv_no']; ?></span></td>
							<td align="center"><?php echo $dv_summary['dv_date']; ?></td>
							<td align="center">0</td>
							<td align="center"><?php echo $dv_summary['net_amount']; ?></td>
							<td align="center">
								<?php if ($dv_summary['status'] == 'Draft'): ?>
									<span class="badge bg-primary">Draft</span>
								<?php else: ?>
									<span class="badge bg-green">Disbursed</span>
								<?php endif ?>
							</td>
							<td align="center">
								<?php if ($dv_summary['status'] == 'Draft'): ?>
									<a href="accounting_disbursement_create.php?id=<?php echo $dv_summary['id'] ?>&lddap_id=<?php echo $dv_summary['p_id'] ?>" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
								<?php endif ?>
							</td>
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