<div class="box box-primary dropbox">
	<div class="box-header">
		<div class="col-md-6">
			<div class="row">
				<div class="btn-group">
			    	<a href="base_template_generator.html.php?division=<?php echo $_SESSION["division"];?>" class="btn btn-block btn-default"><i class="fa fa-chevron-left"></i> Back</a>
			    </div>
	        </div>
		</div>

		<div class="col-md-6">
			<div class="row pull-right">
				<div class="btn-group">
	            	<a href='base_template_generator_add_form.html.php?&username=<?php echo $_SESSION['username']; ?>&division=<?php echo $_GET['division']; ?>&emp_id=<?php echo $_SESSION['currentuser']; ?>' class="btn btn-block btn-primary"><i class="fa fa-plus"></i> Create New</a>
	            </div>
				<div class="btn-group">
	            	<a href='TemplateGenerator/entity/export_csv.php?&username=<?php echo $_SESSION['username']; ?>&division=<?php echo $_GET['division']; ?>&emp_id=<?php echo $_SESSION['currentuser']; ?>&certificate_type=<?php echo $_GET['certificate_type']; ?>&activity_title=<?php echo $_GET['activity_title']; ?>&date_from=<?php echo $_GET['date_from']; ?>&date_to=<?php echo $_GET['date_to']; ?>&activity_venue=<?php echo $_GET['activity_venue']; ?>&date_given=<?php echo $_GET['date_given']; ?>&date_generated=<?php echo $_GET['date_generated']; ?>&opr=<?php echo $_GET['opr']; ?>' class="btn btn-block btn-warning"><i class="fa fa-file-excel-o"></i> Export CSV</a>
	            </div>
	        </div>
		</div>
	</div>
	<div class="box-body">
		<table id="list_table" class="table table-striped table-bordered table-responsive table-hover" role="grid">
			<thead>
				<tr style="height: 60px!important;">
	              <th style = "text-align:center; vertical-align: middle; width: 35%; color: white; background-color: #389bc9; border-left: none; border-top-left-radius: 4px; -webkit-border-top-left-radius: 4px; -moz-border-radius-topleft: 4px;">Participant</th>
	              <th style = "text-align:center; vertical-align: middle; width: 20%; color:black; color: white; background-color: #389bc9;">Position</th>
	              <th style = "text-align:center; vertical-align: middle; width: 20%; color:black; color: white; background-color: #389bc9;">Office</th>
	              <th style = "text-align:center; vertical-align: middle; width: 22%; color:black; color: white; background-color: #389bc9;">Email Address</th>
	              <th style = "text-align:center; vertical-align: middle; color:black; color: white; background-color: #389bc9; border-right: none; border-top-right-radius: 4px; -webkit-border-top-right-radius: 4px; -moz-border-radius-topright: 4px;"></th>
	        	</tr>
		    </thead>
			<tbody id="list_body">
				<?php foreach ($details as $key => $item): ?>
					<tr>
						<td><?php echo $item['attendee']; ?></td>
						<td><?php echo $item['position']; ?></td>
						<td><?php echo $item['office']; ?></td>
						<td><?php echo $item['email']; ?></td>
						<td>
							<div class="btn-group">
                				<button type="button" class="btn btn-block btn-success send-attachment" value="<?php echo $item['id']; ?>">
									<i class="fa fa-send"></i> Send Attachment
								</button>
                			</div>	
						</td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>   	
	</div>
</div> 

<style type="text/css">
	a.btn-app-edit {
	  padding: 7px;
	  min-width: 25% !important;
	  height: 36px !important;
	  background-color: #0fcf77 !important;
	}
</style>

<script type="text/javascript">
	$(document).ready(function(){

		toastr.options = {"closeButton": true};

		$(document).on('click', '.send-attachment', function(){
			let path = "TemplateGenerator/entity/mailer.php";
        	let data = {id: $(this).val()};
        	let $this = $(this);
	    	$this.find('i').toggleClass('fa-send fa-spinner fa-pulse');
	    	$this.attr('disabled', true);

			$.post(path, data,
	            function(data, status){
	        		
	        		if (data == "Email is empty") {
            			toastr["error"](data);
	    				$this.find('i').removeClass('fa-spinner fa-pulse');
                		$this.find('i').addClass('fa-send');
	    				$this.attr('disabled', false);
	        		} else {
            			toastr["success"](data);
	    				$this.find('i').removeClass('fa-spinner fa-pulse');
                		$this.find('i').addClass('fa-send');
	    				$this.attr('disabled', false);
                		
	        		}
	            }
          	);
		});
	});
</script>