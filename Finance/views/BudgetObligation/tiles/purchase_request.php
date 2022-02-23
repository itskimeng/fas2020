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
	      		<th class="text-center" width="17%">CODE</th>
	      		<th class="text-center">PURPOSE</th>
	      		<th class="text-center" width="20%">DATE SUBMITTED</th>
	      		<th class="text-center"></th>
	    	</tr>
	  		<?php foreach (array_slice($prs, 0, 4) as $key => $pr): ?>
	  			<tr>
	  				<td class="text-center">
	  					<span class="badge bg-info"><a href="procurement_purchase_request_view.php?division=<?= $_SESSION['division']; ?>&id=<?= $pr['pr_no']; ?>" style="color: inherit;">PR-<?= $pr['pr_no']; ?></a></span>
	  				</td>
	  				<td><?= $pr['purpose']; ?></td>
	  				<td class="text-center"><?= $pr['submitted_date']; ?></td>
	  				<td>
	  					<div class="col-md-12">
		  					<?php if ($pr['status'] != 'CERTIFIED'): ?>
	                            <button type="button" class="btn btn-primary btn-sm btn-availability_code" data-toggle="modal" data-target="#modal_pr_availability_code" data-id="<?= $pr['id']; ?>"><i class="fa fa-search"></i></button>
		  					<?php endif ?>
	  					</div>
	  				</td>
	  			</tr>  	
	  		<?php endforeach ?>  
	  	</tbody>
	  </table>
	</div>
</div>