<div class="box box-warning dropbox">
	<div class="box-header">
	  <h3 class="box-title"><i class="fa fa-book"></i> Purchase Request</h3>
	  <div class="box-tools">
	    <div class="btn-group">
	    	<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-purchase_request"><i class="fa fa-plus-square"></i> View More</button>
	    </div>
	  </div>
	</div>
	<div class="box-body custom-box-body no-padding" style="height: 230px!important; max-height: 230px!important; overflow-y: hidden;">
	  <table class="table table-striped">
	    <tbody>
	    	<tr>
	      		<th class="text-center" width="17%">Code</th>
	      		<th class="text-center">Purpose</th>
	      		<th class="text-center" width="17%">Date Submitted</th>
	      		<th class="text-center" width="17%">Status</th>
	      		<th class="text-center" style="width: 50px;">Action</th>
	    	</tr>
	  		<?php foreach (array_slice($prs, 0, 4) as $key => $pr): ?>
	  			<tr>
	  				<td><?= $pr['pr_no']; ?></td>
	  				<td><?= $pr['purpose']; ?></td>
	  				<td><?= $pr['submitted_date']; ?></td>
	  				<td><?= $pr['status']; ?></td>
	  				<td>
	  					<?php if ($pr['status'] != 'CERTIFIED'): ?>
                            <button class="btn btn-success btn-sm col-lg-12 sweet-7" data-id="<?= $pr['id']; ?>" title="Check Available Funds"><i class="fa fa-search"> </i></button>	
	  					<?php endif ?>
	  				</td>
	  			</tr>  	
	  		<?php endforeach ?>  
	  	</tbody>
	  </table>
	</div>
</div>