<div class="col-md-12">
  	<div class="box box-primary dropbox">

	    <div class="box-body table-responsive">
			<table class="table" > 
			<!-- Header -->
			<tr>
				<td class="col-md-1">
					<li class="btn btn-success"><a href="ntacreate.php" style="color:white;text-decoration: none;">Create  <i class="fa fa-plus"></i></a></li>
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
			<br>
			<!-- main table -->
			<table id="example1" class="table table-striped table-bordered table-hover" style="background-color: white;">
				<thead>	
					<tr style="background-color: white;color:blue;">
						<th style="text-align:center"  width="">DATE NTA</th>
						<th style="text-align:center"  width="">DATE RECEIVED</th>
						<th style="text-align:center" width="">ACCOUNT NO</th>
						<th style="text-align:center" width="">NTA NO</th>
						<th style="text-align:center" width="">SARO</th>
						<th style="text-align:center" width="300">PARTICULAR</th>
						<th style="text-align:center" width="">AMOUNT</th>
						<th style="text-align:center" width="">DISBURSEMENT</th>

						<th style="text-align:center" width="">BALANCE</th>
						<!--  <th style="text-align:center" width="800">UACS</th>
						<th style="text-align:center" width="800">AMOUNT</th>
						<th style="text-align:center" width="800">OBLIGATED</th>
						<th style="text-align:center" width="800">BALANCE</th>
						<th style="text-align:center" width="800">GROUP</th> -->
						<th style="text-align:center" width="200">ACTION</th>
					</tr>
				</thead>

				
				<?php foreach ($data as $key => $item): 

					$id = $item["id"];

					$datenta1 = $item["datenta"];
					$datenta = date('F d, Y', strtotime($datenta1));

					$datereceived1 = $item["datereceived"];
					$datereceived = date('F d, Y', strtotime($datereceived1));

					$accountno = $item["accountno"];
					$ntano = $item["ntano"];
					$saronumber = $item["saronumber"];
					$particular = $item["particular"];

					$amount1 = $item["amount"];
					$amount = number_format( $amount1,2);

					$obligated1 = $item["obligated"];
					$obligated = number_format( $obligated1,2);

					$balance1 = $item["balance"];
					$balance = number_format( $balance1,2);

					//$sarogroup = $item["sarogroup"];
					?>
					<tr align = ''>
						<?php if ( $datenta1=="0000-00-00" ): ?>
						<td></td>
						<?php else : ?>
						<td  ><?php echo $datenta ?></td>
						<?php endif ?>

						<?php if ( $datereceived1=="0000-00-00" ): ?>
						<td  ></td>
						<?php else : ?>
						<td  ><?php echo $datereceived ?></td>
						<?php endif ?>
						<td  ><?php echo $accountno ?></td>
						<td  ><?php echo $ntano ?></td>
						<td  ><?php echo $saronumber ?></td>
						<td  ><?php echo $particular ?></td>
						<td  ><?php echo $amount ?></td>
						<td  ><?php echo $obligated ?></td>
						<td  ><?php echo $balance ?></td>

						<td  >
							<center>
								<div class="btn-group">
									<a  class = "btn btn-primary"  href='ntaupdate.php?getid=<?php echo $id?>' data-placement="right" data-toggle="tooltip" title="Edit"> <i class='fa'>&#xf044;</i></a> 
									<a  class="btn btn-danger" onclick="return confirm('Delete This NCA/NTA Item?');" href='ntadelete.php?id=<?php echo $id?>' data-placement="right" data-toggle="tooltip" title="Delete"><i class='fa fa-trash-o'></i></a>
									<a  class = "btn btn-info"  href='ntatableViewMain.php?getntano=<?php echo $ntano?>&getparticular=<?php echo $particular?>&disbursed=<?php echo $obligated?>' data-placement="right" data-toggle="tooltip" title="View"><i class='fa'>&#xf06e;</i></a>
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