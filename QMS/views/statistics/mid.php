<div class="row">
	<div class="col-md-12">
	  <div class="box box-warning dropbox">
			<div class="box-header">
			  <h3 class="box-title"><i class="fa fa-list-ul"></i> Summary of Reports Submission</h3>
			</div>
			<div class="box-body custom-box-body no-padding">
				<table id="example" class="table table-striped">
					<thead>
						<tr>
							<th class="text-center" width="20%">DOCUMENT CODE</th>
				      		<th class="text-center" >TITLE</th>
							<th class="text-center" width="15%">PERIOD COVERED</th>
				      		<th class="text-center" width="15%">DATE SUBMITTED</th>
				    	</tr>
					</thead>
				    <tbody>
						<?php foreach ($qp_data as $key => $qp): ?>
				    	<tr class="text-center">
				    		<td ><?= $qp['qp_code'];?></td>
				    		<td class="text-left"><?= $qp['procedure_title'];?></td>
							<td ><?= $qp['qp_covered'];?></td>
				    		<td ><?= $qp['date_updated'];?></td>
				    	</tr>
						<?php endforeach; ?>
				  	</tbody>
				</table>
			</div>
			<!-- <div class="box-footer text-center">
				<div class="btn-group">
			    	<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-purchase_request"><i class="fa fa-plus-square"></i> View More</button>
			    </div>
			</div> -->
		</div>
	</div>

</div>
