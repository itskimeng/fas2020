<div class="col-md-12">
  	<div class="box box-primary dropbox">

	    <div class="box-body table-responsive">
			<table class="table" > 
			<!-- Header -->
			<tr>
				<td class="col-md-1">
					<li class="btn btn-success"><a href="accounting_nta_create.php" style="color:white;text-decoration: none;">Create  <i class="fa fa-plus"></i></a></li>
				</td>
				<td class="col-md-7" > 
				</td>
				<form method = "POST" action = "@Functions/ntadateexport.php">
					<td class="col-md-1" >
						<input type="text" class="" id="datepicker1" placeholder='From Date' name="datefrom" style="height: 35px; width: 250px" value = "<?php echo $timeNow;?>">
					</td>
				  	<td class="col-md-1" >
					  <input type="text" class="" id="datepicker2" placeholder='To Date' name="dateto" style="height: 35px; width: 250px" value = "<?php echo $timeNow;?>">
					</td>
					<td class="col-md-1" >
						<button type="submit" name="submit"  class="btn btn-success pull-right">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Export Data&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-print"></i></button>
					</td>
				</form>
			</tr>
			<!-- Header -->
			</table>
			<!-- main table -->
			<table id="example1" class="table table-striped table-bordered table-hover" style="background-color: white;">
				<thead>	
					<tr style="background-color: white;color:blue;">
						<th style="text-align:center" width="">NTA NO</th>
						<th style="text-align:center"  width="">DATE NTA</th>
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
						<td  ><?php echo $item['nta_number']; ?></td>
						<td  ><?php echo $item['nta_date']; ?></td>
						<!-- <td  ><?php echo $item['received_date']; ?></td> -->
						<td  ><?php echo $item['account_number']; ?></td>
						<td  ><?php echo $item['saro_number']; ?></td>
						<td  style="text-align:center"><?php echo $item['particular']; ?></td>
						<td  ><?php echo $item['amount']; ?></td>
						<td  ><?php echo $item['obligated']; ?></td>
						<td  ><?php echo $item['balance']; ?></td>

						<td  >
							<center>
								<div class="btn-group">
									<a  class = "btn btn-primary"  href='accounting_nta_update.php?getid=<?php echo $id?>' data-placement="right" data-toggle="tooltip" title="Edit"> <i class='fa'>&#xf044;</i></a> 
									<a  class="btn btn-danger" onclick="return confirm('Delete This NCA/NTA Item?');" href='Finance/route/delete_nta.php?id=<?php echo $id?>' data-placement="right" data-toggle="tooltip" title="Delete"><i class='fa fa-trash-o'></i></a>
									<a  class = "btn btn-info"  href='view_nta_summary.php?nta_id=<?php echo $id?>' data-placement="right" data-toggle="tooltip" title="View"><i class='fa'>&#xf06e;</i></a>
								</div>
							</center> 
						</td>
 
					</tr>

				<?php endforeach ?>


				<!-- <a href='@Functions/sarodeletefunction.php?getid=$id'> <i style='font-size:24px'<i class='fa fa-trash-o'></i> </a> -->
			</table>
			<!-- main table -->
	    </div>
	</div>
</div>