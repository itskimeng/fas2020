<div class="col-md-12">
  	<div class="box box-primary dropbox">

	    <div class="box-body table-responsive">
			<div class="section group"  style="overflow-x:auto;">

				<div class="col-md-1" >
					<li class="btn btn-success"><a href="ntaobcreate.php" style="color:white;text-decoration: none;">Create <i class="fa fa-plus"></i></a></li>
				</div>
			</div>
			<br>
			<!-- main table -->

				<table id="example1" class="table table-striped table-bordered " style="background-color: white; overflow-x:auto;" >
					<thead>
						<tr style="background-color: white;color:blue;">

							<th style="text-align:center" width="">ACCOUNT NO</th>
							<th style="text-align:center" width="">DATE</th>
							<th style="text-align:center" width="">PAYEE</th>
							<th style="text-align:center" width="">PARTICULAR</th>
							<th style="text-align:center" width="">DV NUMBER</th>
							<th style="text-align:center" width="">LDDAP-ADA/CHECK</th>
							<th style="text-align:center" width="">ORS NUMBER</th>
							<th style="text-align:center" width="">PPA</th>
							<th style="text-align:center" width="">UACS</th>
							<th style="text-align:center" width="">GROSS</th>
							<th style="text-align:center" width="">TAX</th>
							<th style="text-align:center" width="">NET</th>
							<th style="text-align:center" width="">REMARKS</th>
							<th style="text-align:center" width="">STATUS</th>
							<th style="text-align:center" width="150">ACTION</th>

						</tr>
					</thead>

					<?php foreach ($data as $key => $item): 

					$id = $item["id"]; 

					$accountno = $item["accountno"];

					$date1 = $item["date"];
					$date = date('F d, Y', strtotime($date1));

					$payee = $item["payee"];
					$particular = $item["particular"];
					$dvno = $item["dvno"];
					$lddap = $item["lddap"];
					$orsno = $item["orsno"];
					$ppa = $item["ppa"];
					$uacs = $item["uacs"];

					$gross1 = $item["gross"];
					$gross = number_format( $gross1,2);

					$totaldeduc = $item["totaldeduc"];
					$totaldeduc = number_format( $totaldeduc,2);

					$net1 = $item["net"];
					$net = number_format( $net1,2);

					$remarks = $item["remarks"];
					$status = $item["status"];

					?>

					<tr align = ''>
						<td style="text-align:center" ><?php echo $accountno?></td>
						<?php if ( $date1=="0000-00-00" ): ?>
						<td style="text-align:center" ></td>
						<?php else : ?>
						<td style="text-align:center" ><?php echo $date?></td>
						<?php endif ?>

						<td style="text-align:center" ><?php echo $payee?></td>
						<td style="text-align:center" ><?php echo $particular?></td>
						<td style="text-align:center" ><?php echo $dvno?></td>
						<td style="text-align:center" ><?php echo $lddap?></td>
						<td style="text-align:center" ><?php echo $orsno?></td>
						<td style="text-align:center" ><?php echo $ppa?></td>
						<td style="text-align:center" ><?php echo $uacs?></td>
						<td style="text-align:center" ><?php echo $gross?></td>
						<td style="text-align:center" ><?php echo $totaldeduc?></td>
						<td style="text-align:center" ><?php echo $net?></td>
						<td style="text-align:center" ><?php echo $remarks?></td>
						<td style="text-align:center" ><?php echo $status?></td>

						<td style="text-align:center" > 

						<!-- <a href='ntaobupdate.php?getid=<?php echo $id?>'> <i style='font-size:24px' class='fa'>&#xf044;</i> </a> -->
						<div class="btn-group">
							<a href="cash_paid_payment.php?getid=<?php echo $id?>&auth=paid" class="btn btn-success">Paid <i class="fa fa-thumbs-up"></i></a>
							<a href="" class="btn btn-danger">Return <i class="fa fa-undo"></i></a>
						</div>

						<!-- <a href='@Functions/sofexport.php?getid=<?php echo $id?>'> <i style='font-size:24px' class='fa fa-fw fa-download'></i></a>
						<a href='@obtableViewMain.php?getsaroID=<?php echo $saronumber?>&getuacs=<?php echo $uacs?>'> <i style='font-size:24px' class='fa'>&#xf06e;</i> </a> -->
						</td>

					</tr>


					<?php endforeach ?>

				</table>



			<!-- main table -->

	    </div>
	</div>
</div>