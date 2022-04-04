<?php if ( $nta_admin === true ) {?>
	<div class="col-md-12">
	  	<div class="box box-warning dropbox">

		    <div class="box-body table-responsive">
				<li class="btn btn-success"><a href="accounting_nta_create.php" style="color:white;text-decoration: none;">Create  <i class="fa fa-plus"></i></a></li>
			</div>
		</div>
	</div>
<?php } ?>
<div class="col-md-12">
  	<div class="box box-primary dropbox">

	    <div class="box-body table-responsive">

			<!-- main table -->
			<table id="example1" class="table table-striped table-bordered table-hover" style="background-color: white;">
				<thead>	
					<tr style="background-color: white;color:blue;">
						<th style="text-align:center" width="">NTA NO</th>
						<th style="text-align:center"  width="">DATE RECEIVED</th>
						<!-- <th style="text-align:center"  width="">DATE RECEIVED</th> -->
						<th style="text-align:center" width="">ACCOUNT NO</th>
						<th style="text-align:center" width="">SARO</th>
						<th style="text-align:center" width="">PARTICULAR</th>
						<th style="text-align:center" width="130">AMOUNT</th>
						<th style="text-align:center" width="">DISBURSEMENT</th>
						<th style="text-align:center" width="">BALANCE</th>
						<th style="text-align:center" width="120">ACTION</th>
					</tr>
				</thead>

				
				<?php foreach ($data as $key => $item): 

					$id = $item["id"];

					//$sarogroup = $item["sarogroup"];
					?>
					<tr align = ''>
						<td align="center"><?php echo $item['nta_number']; ?></td>
						<td align="center"><?php echo $item['nta_date']; ?></td>
						<td align="center"><?php echo $item['account_number']; ?></td>
						<td align="center"><?php echo $item['saro_number']; ?></td>
						<td align="center"><?php echo $item['particular']; ?></td>
						<td align="center"><?php echo $item['amount']; ?></td>
						<td align="center"><?php echo $item['obligated']; ?></td>
						<td align="center"><?php echo $item['balance']; ?></td>

						<td  >
							<center>
								<div class="btn-group">
									<?php if ( $nta_admin === true ) {?>

										<a  class = "btn btn-primary"  href='accounting_nta_update.php?getid=<?php echo $id?>&lock=<?php echo $item['is_lock']; ?>' data-placement="right" data-toggle="tooltip" title="Edit"> 
											<i class='fa fa-edit'></i>
										</a> 
										<!-- <a  class="btn btn-danger" onclick="return confirm('Delete This NCA/NTA Item?');" href='Finance/route/delete_nta.php?id=<?php echo $id?>' data-placement="right" data-toggle="tooltip" title="Delete">
											<i class='fa fa-trash-o'></i>
										</a> -->

									<?php } ?>
									<a  class = "btn btn-info"  href='view_nta_summary.php?nta_id=<?php echo $id?>' data-placement="right" data-toggle="tooltip" title="View">
										<i class='fa fa-eye'></i>
									</a>
								</div>
							</center> 
						</td>
 
					</tr>

				<?php endforeach ?>

			</table>
			<!-- main table -->
	    </div>
	</div>
</div>