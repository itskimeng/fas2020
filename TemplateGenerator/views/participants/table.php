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
	            	<a href='TemplateGenerator/entity/export_csv.php?&username=<?php echo $_SESSION['username']; ?>&division=<?php echo $_GET['division']; ?>&emp_id=<?php echo $_SESSION['currentuser']; ?>&certificate_type=<?php echo $_GET['certificate_type']; ?>&activity_title=<?php echo $_GET['activity_title']; ?>&date_from=<?php echo $_GET['date_from']; ?>&date_to=<?php echo $_GET['date_to']; ?>&activity_venue=<?php echo $_GET['activity_venue']; ?>&date_given=<?php echo $_GET['date_given']; ?>&date_generated=<?php echo $_GET['date_generated']; ?>&opr=<?php echo $_GET['opr']; ?>' class="btn btn-block btn-warning"><i class="fa fa-file-excel-o"></i> Export List</a>
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
                				<button type="button" class="btn btn-block btn-success send-attachment" value="<?php echo $item['id']; ?>" data-snd_counter="">
									<i class="fa fa-send"></i> <?php echo $item['send_counter'] > 0 ? 'Resend Attachment' : 'Send Attachment'; ?> <span class="label label-default"><?php echo $item['send_counter']; ?></span>
								</button>
								<button type="button" class="btn btn-block btn-warning generate_certificate" value="<?php echo $item['id']; ?>" data-snd_counter="">
									<i class="fa fa-download"></i> <?php echo $item['generate_counter'] > 0 ? 'Regenerate Certificate' : 'Generate Certificate'; ?> <span class="label label-default"><?php echo $item['generate_counter']; ?></span>
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

	.ui-progressbar {
    position: relative;
  }
  .progress-label {
    position: absolute;
    left: 50%;
    top: 4px;
    font-weight: bold;
    text-shadow: 1px 1px 0 #fff;
  }
</style>

<link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
  <!-- <link rel="stylesheet" href="/resources/demos/style.css"> -->

<script type="text/javascript">
	$(document).ready(function(){

		var progressbar = $( "#progressbar" ),
      progressLabel = $( ".progress-label" );

      progressLabel2 = $( ".progress-label2" );

      progressbar.progressbar({
	      value: false,
	      change: function() {
	        progressLabel.text( progressbar.progressbar( "value" ) + "%" );
	        // progressLabel2.text( progressbar.progressbar( "value" ) + "%" );
	      },
	      complete: function() {
	        progressLabel.text( "Complete!" );
	        // progressLabel2.text( "Complete!" );

	        setTimeout(function(){// wait for 5 secs(2)
                  location.reload(); // then reload the page.(3) 
            }, 2000);

	      }
	    });

	    // progressbar.progressbar({
	    //   value: 0
	    // });


		toastr.options = {
	      "closeButton": true,
	      "debug": true,
	      "newestOnTop": false,
	      "progressBar": true,
	      "positionClass": "toast-top-right",
	      "preventDuplicates": false,
	      "onclick": null,
	      "showDuration": "300",
	      "hideDuration": "1500",
	      "timeOut": "5000",
	      "extendedTimeOut": "1000",
	      "showEasing": "swing",
	      "hideEasing": "linear",
	      "showMethod": "fadeIn",
	      "hideMethod": "fadeOut"
	    }

	    $(document).on('click', '#start-send_email', function(){
	   		let $this = $(this);


	   		


	   		let ddata = <?php echo $nw_dd; ?>;

	   		let ff = $('.progress_tracker_txt');
	   		
	   		// $this.html('<i class="fa fa-cog fa-spin"></i> Generating Certificate..... <span class="label label-default"></span>'); 
	    	$this.attr('disabled', true);


	    	let len = ddata.length;
	    	let counter = 0;
	    	let pp2 = 0;

			ff.html('System is now Generating Certificates..');

			$('.progress-label').removeClass('hidden');
      		$('.ui-progressbar-value').removeClass('hidden');


	    	ddata.forEach(function(item, key){

		    	$.post('TemplateGenerator/entity/send_all_mail.php?id='+item, function(data, kk){
	    			counter = counter + 1;
	    			// console.log(counter);
		    		
		    		let percent = (counter / len) * 100;

		    		pp2 = Math.round(percent);
		    		console.log(percent);

		    		function progress() {
				      var val = progressbar.progressbar( "value" ) || 0;
				 
				      progressbar.progressbar( "value", pp2 );
				 
				      // if ( val < 99 ) {
				      //   setTimeout( progress, 2000 );
				      // }
				    }

				    ff.html('Sending Attachment to '+data);

    				setTimeout( progress, 120 );


     //        		$this.html('');
					// $this.html('<i class="fa fa-send"></i> Sending Attachment to '+data+'<span class="label label-default"></span>');
					// $this.attr('disabled', false);		   

		    	});
	   		});
	   		

	    });

		$(document).on('click', '.send-attachment', function(){
			let path = "TemplateGenerator/entity/mailer.php";
        	let data = {id: $(this).val()};
        	let $this = $(this);
	    	$this.find('i').toggleClass('fa-send fa-spinner fa-pulse');
	    	$this.attr('disabled', true);
	    	let tr = $(this).closest('tr');

	    	let email = tr.find("td").eq(3).html();

	    	if (email != '') {
				$.post(path, data,
		            function(data, status){
		        		let dd = JSON.parse(data);
		        		if (dd['msg'] == "Email is empty") {
	            			toastr["error"](dd);
		    				$this.find('i').removeClass('fa-spinner fa-pulse');
	                		$this.find('i').addClass('fa-send');
		    				$this.attr('disabled', false);
		        		} else {
	            			toastr.success(dd['msg'], 'Success');
	            			$this.html('');
							$this.html('<i class="fa fa-send"></i> Resend Attachment <span class="label label-default">'+dd['counter']+'</span>'); 

		    				$this.find('i').removeClass('fa-spinner fa-pulse');
	                		$this.find('i').addClass('fa-send');
		    				$this.attr('disabled', false);
		        		}
		            }
	          	);
	    	} else {
	    		toastr.warning('No email has been provided', 'Warning');
	    	}
		});

		$(document).on('click', '.generate_certificate', function(){
			let path = "TemplateGenerator/entity/checker.php";

        	let data = {id: $(this).val()};
        	let idd = $(this).val();
        	let $this = $(this);
	    	$this.find('i').toggleClass('fa-download fa-spinner fa-pulse');
	    	$this.attr('disabled', true);

			$.post(path, data, function(result, checker){
        		let dd = JSON.parse(result);
        		

    			toastr.success(dd['msg'], 'Success');
    			$this.html('');
				$this.html('<i class="fa fa-download"></i> Regenerate Certificate <span class="label label-default">'+dd['counter']+'</span>'); 

				$this.find('i').removeClass('fa-spinner fa-pulse');
        		$this.find('i').addClass('fa-download');
				$this.attr('disabled', false);

				window.open("TemplateGenerator/entity/generate.php?id="+ idd,"MyTargetWindowName");
            });
		});
	});
</script>