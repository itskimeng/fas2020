<div class="box">
	<div class="box-header">
	</div>	
	<div class="box-body">
		<div class="row">
			<div class="col-md-12">
				
				<div class="margin" style="position:absolute; margin:0px">
					<div class="btn-group">
						<a class="btn btn-block btn-primary" data-toggle="modal" data-target="#modal-add-program"><i class="icon fa fa-plus"></i> Add Program</a>
					</div>
				</div>
				<table id="list_table" class="table table-striped table-bordered table-responsive table-hover" role="grid">
					<thead>
						<tr>
							<th style="text-align:center; vertical-align: middle; color: white; background-color: #73758799; border-left: none; border-top-left-radius: 4px; -webkit-border-top-left-radius: 4px; -moz-border-radius-topleft: 4px;">Code</th>
		                	<th style="text-align:center; vertical-align: middle; color: white; background-color: #73758799;">Name</th>
		                	<th style = "text-align:center; vertical-align: middle; width:15%; color: white; background-color: #73758799;border-right: none; border-top-right-radius: 4px; -webkit-border-top-right-radius: 4px; -moz-border-radius-topright: 4px;">Actions</th>         
		                </tr>
		                
					</thead>
					<tbody id="list_body">
						<?php foreach ($programs as $key => $program): ?>
							<tr>
								<td>
									<?php echo input_hidden('progid','progid','progid',$key); ?>
									<?php echo input_hidden('code','code','code',$program['code']); ?>
									<?php echo input_hidden('name','name','name',$program['name']); ?>

									<?php echo $program['code']; ?>	
								</td>
								<td>
									<?php echo $program['name']; ?>
								</td>
								<td>
									<div class="btn-group">
										<a class="btn btn-block btn-primary edit-program" data-toggle="modal" data-target="#modal-edit-program"><i class="icon fa fa-edit"></i> Edit</a>
									</div> 
									<div class="btn-group">
										<a class="btn btn-block btn-danger remove_program"><i class="icon fa fa-trash-o"></i> Delete</a>
									</div>
								</td>
							</tr>
							
						<?php endforeach ?>
						
					</tbody>
				</table>
			</div>
				
		</div>
		
	</div>	
</div>
