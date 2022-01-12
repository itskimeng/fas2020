<div class="box box-warning dropbox">
	<div class="box-header">
	  <h3 class="box-title"><i class="fa fa-book"></i> ORS From GSS</h3>
	  <div class="box-tools">
	    <div class="btn-group">
	    	<!-- <button class="btn btn-primary btn-sm">View More</button> -->
	    	<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-default">View More</button>
	    </div>
	  </div>
	</div>
	<div class="box-body no-padding" style="height: 230px; overflow-y: auto;">
	  <table class="table table-striped">
	    <tbody>
	    	<tr>
	      		<th style="width: 150px">Code</th>
	      		<th>Particular</th>
	      		<th style="width: 155px;">Amount</th>
	      		<th style="width: 50px;">Action</th>
	    	</tr>
	  		<?php foreach (array_slice($pos, 0, 4) as $key => $po): ?>
	  			<tr>
	  				<td><?= $po['ponum']; ?></td>
	  				<td><?= $po['payee']; ?></td>
	  				<td><?= $po['amount']; ?></td>
	  				<td>
	  					<a href="CreateObligation.php?id=<?= $po['id']; ?>&stat=1" class="btn btn-success btn-sm btn-view" title="Process"> <i class="fa fa-check-square"></i></a> 
                       
	  				</td>
	  			</tr>  	
	  		<?php endforeach ?>  
	  	</tbody>
	  </table>
	</div>
</div>