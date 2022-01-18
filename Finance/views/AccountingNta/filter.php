<div class="col-md-12">
  	<div class="box box-primary dropbox">

	    <div class="box-body table-responsive">
			<table class="table" > 
			<!-- Header -->
			<tr>
				<td class="col-md-1">
					<li class="btn btn-success"><a href="ntacreate.php" style="color:white;text-decoration: none;">Create</a></li>
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
						<button type="submit" name="submit"  class="btn btn-success pull-right">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Export Data&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
					</td>
				</form>
			</tr>
			<!-- Header -->
			</table>
	    </div>
	</div>
</div>