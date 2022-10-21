<div class="col-md-12">
	<div class="box dropbox">
  		<div class="box-body">
  			<div class="row">
  				<div class="col-md-6">
					<div class="btn-group">
						<a href="qms_report_submission.php" class="btn btn-md btn-default" name=""><i class="fa  fa-arrow-circle-left"></i> Close</a>
					</div>
  				</div>
  				<?php //if ($is_admin): ?>
	  				<div class="col-md-6">
	  					<div class="pull-right">
	  						<div class="btn-group">
								<button type="submit" class="btn btn-md btn-success" name="save"><i class="fa fa-edit"></i> Save</button>
							</div>	
	  					</div>
	  				</div>
  				<?php //endif ?>
  			</div>
  		</div>
  	</div>		
</div>


<div class="col-md-12">
	<div class="box box-primary dropbox">
		<div class="box-header">
			<h3 class="box-title"><i class="fa fa-info-circle"></i> Information</h3>
			<div class="box-tools">
				<span class="label label-info" style="font-size: 14.5px; background-color: #06313b !important;"><?= $data['status']; ?></span>	
			</div>
		</div>
  		<div class="box-body">
  			<div class="row">
  				<div class="col-md-12">
  					<div class="row">
  						<div class="col-md-3">
  							<label> QP Code </label>
  							<select name="qp_code_select" id="qp_code_select" class="form-control" style="font-size: 15px; font-weight: bold;" required="">
  								<option value="" selected="" disabled>--Select QP Code--</option>
  								<?php foreach ($qp_codes as $key => $qp_code): ?>
  									<option value="<?php echo $qp_code['id']; ?>"><b><?php echo $qp_code['qp_code']; ?></b> <i>(<?php echo $qp_frequency[$qp_code['frequency_monitoring']]; ?>)</i></option>
  								<?php endforeach ?>
  							</select>
						</div>
  						<div class="col-md-3">
  							<div class="row">
  								<div class="col-sm-8">
		  							<label for="">Period Covered</label>
		  							<select name="qp_covered" id="qp_covered" class="form-control" required="">
		  								<option value="" selected="" disabled>--Select Period--</option>
		  							</select>
  								</div>
  								<div class="col-sm-4">
		  							<label for="" id="label_year">Year</label>
		  							<select name="qp_year" id="qp_year" class="form-control" required="">
		  								<!-- <option value="" selected="" disabled>-Select Year-</option> -->
		  								<option value="2021">2021</option>
		  								<option value="2022" selected="">2022</option>
		  								<option value="2023">2023</option>
		  							</select>
  								</div>
  							</div>
  						</div>
  						<div class="col-md-3">
  							<label for=""> Date Created: </label>
  							<input type="text" class="form-control" readonly name="date_created" value="<?php echo date("M d, Y"); ?>">
  						</div>
  						<div class="col-md-3">
  							<label for=""> Created By: </label>
  							<input type="text" class="form-control" readonly name="created_by" value="<?php echo $_SESSION['UNAME']; ?>">
  						</div>
  					</div>
  					<div class="row">
		  				<div class="col-md-3">
		  					<div class="row">
		  						<div class="col-md-12">
		  							<label for=""> Coverage: </label>
		  							<input type="text" class="form-control" readonly id="coverage">
		  							<input type="hidden" class="form-control" readonly id="parent_id" name="parent_id">
		  						</div>
		  					</div>

		  					<div class="row">
		  						<div class="col-md-12">
		  							<label for=""> Office: </label>
		  							<input type="text" class="form-control" readonly id="office">
		  						</div>
		  					</div>
		  					<div class="row">
		  						<div class="col-md-12">
		  							
		  						</div>
		  					</div>

		  				</div>
		  				<div class="col-md-3">
		  					<div class="row">
		  						<div class="col-md-12">
		  							<label for=""> Process Owner: </label>
		  							<input type="text" class="form-control" readonly id="process_owner">
		  						</div>
		  					</div>

		  					<div class="row">
		  						<div class="col-md-12">
		  							<label for=""> Frequency of Monitoring: </label>
		  							<input type="text" class="form-control" readonly id="frequency">
		  						</div>
		  					</div>
		  				</div>
		  				<div class="col-md-6">
		  					<div class="row">
		  						<div class="col-md-12">
		  							<label for="">Procedure Title</label>
		  							<textarea name="" cols="20" rows="4" class="form-control mt-2" id="procedure_title" readonly></textarea>
		  						</div>
		  					</div>

		  					<div class="row">
		  						<div class="col-md-6">
		  							<div class="row">
			  							<div class="col-md-12">
				  							
				  						</div>
		  							</div>
		  						</div>

		  						<div class="col-md-6">
		  							<div class="row">
			  							<div class="col-md-12">
				  						</div>
		  							</div>
		  						</div>
		  					</div>
		  				</div>
		  				
		  			</div>	

  				</div>
  			</div>
  		</div>
  	</div>		
</div>

<script>

	const coverage_val = ['', 'Region', 'Region and Province', 'Region, Province and Field', 'Central, Region, Province and Field'];
	const frequency_val = ['', 'Monthly', 'Quarterly', 'Annually'];
	
  $('#qp_code_select').on('change', function(){
  	let qp_code_val =  $('#qp_code_select').val();


	//ajax start
	$.ajax({  
		url:"QMS/route/fetch_qp.php?id="+qp_code_val, 
		method:"POST",  
		//post:data  
		contentType:false,
		cache:false,
		processData:false,

		beforeSend:function() {

		}, 

		success:function(data){  

			data = data.substring(1);
			data = data.slice(0, -1); 
			var obj = jQuery.parseJSON ( data );
			
			$('#coverage').val(coverage_val[obj.coverage]);
			$('#parent_id').val(obj.id);
			$('#office').val(obj.office);
			$('#process_owner').val(obj.process_owner);
			$('#frequency').val(frequency_val[obj.frequency_monitoring]);
			$('#procedure_title').val(obj.procedure_title);

		    if (obj.frequency_monitoring == 1)
		    {
		        $('#qp_covered')
		            .find('option')
		            .remove()
		            .end()
		            .append('<option value="" selected="" disabled>--Select Period--</option>')
		            .append('<option value="January">January</option>')
		            .append('<option value="February">February</option>')
		            .append('<option value="March">March</option>')
		            .append('<option value="April">April</option>')
		            .append('<option value="May">May</option>')
		            .append('<option value="June">June</option>')
		            .append('<option value="July">July</option>')
		            .append('<option value="August">August</option>')
		            .append('<option value="September">September</option>')
		            .append('<option value="October">October</option>')
		            .append('<option value="November">November</option>')
		            .append('<option value="December">December</option>')
		        $('#qp_year').css("display", "block");
		        $('#label_year').css("display", "block");
		    }
		    else if (obj.frequency_monitoring == 2)
		    {
		        $('#qp_covered')
		            .find('option')
		            .remove()
		            .end()
		            .append('<option value="" selected="" disabled>--Select Period--</option>')
		            .append('<option value="1st Quarter">1st Quarter</option>')
		            .append('<option value="2nd Quarter">2nd Quarter</option>')
		            .append('<option value="3rd Quarter">3rd Quarter</option>')
		            .append('<option value="4th Quarter">4th Quarter</option>')
		        $('#qp_year').css("display", "block");
		        $('#label_year').css("display", "block");
		    }
		    else if (obj.frequency_monitoring == 3)
		    {
		        $('#qp_covered')
		            .find('option')
		            .remove()
		            .end()
		            .append('<option value="" selected="" disabled>--Select Period--</option>')
		            .append('<option value="2021">2021</option>')
		            .append('<option value="2022">2022</option>')
		            .append('<option value="2023">2023</option>')

		       
		        $(document).on('change', '#qp_covered', function(){
		        	let year_val = $(this).val();
		            $('#qp_year').val(year_val);
		        });
		        $('#qp_year').css("display", "none");
		        $('#label_year').css("display", "none");
		    }
		    else
		    {
		        $('#qp_covered')
		            .find('option')
		            .remove()
		            .end()
		        $('#qp_year').css("display", "block");
		        $('#label_year').css("display", "block");
		    }
		    
		}

	});  
	//ajax end 
    
  });

</script>