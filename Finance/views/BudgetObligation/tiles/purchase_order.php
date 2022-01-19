<div class="box box-warning dropbox">
	<div class="box-header">
	  <h3 class="box-title"><i class="fa fa-book"></i> Purchase Order</h3>
	  <div class="box-tools">
	    <div class="btn-group">
	    	<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-default"><i class="fa fa-plus-square"></i> View More</button>
	    </div>
	  </div>
	</div>
	<div class="box-body no-padding" style="height: 230px!important; max-height: 230px!important; overflow-y: hidden;">
	  <table class="table table-striped">
	    <tbody>
	    	<tr>
	      		<th class="text-center" style="width: 150px">Code</th>
	      		<th class="text-center">Particular</th>
	      		<th class="text-center" style="width: 155px;">Amount</th>
	      		<th class="text-center" style="width: 50px;">Action</th>
	    	</tr>
	  		<?php foreach (array_slice($pos, 0, 4) as $key => $po): ?>
	  			<tr>
	  				<td><?= $po['ponum']; ?></td>
	  				<td><?= $po['payee']; ?></td>
	  				<td><?= $po['amount']; ?></td>
	  				<td>
	  					<a href="budget_create_po_obligation.php?id=<?= $po['ponum']; ?>&stat=1" class="btn btn-success btn-sm btn-view" title="Process"> <i class="fa fa-rocket"></i></a> 
                       
	  				</td>
	  			</tr>  	
	  		<?php endforeach ?>  
	  	</tbody>
	  </table>
	</div>
</div>