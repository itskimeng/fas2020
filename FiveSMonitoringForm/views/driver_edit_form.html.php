<?php
    require_once 'FiveSMonitoringForm/controller/FiveSMonitoringController.php';
?>

<div class="content-wrapper">
    <section class="content-header">
        <h1>
          5S Edit Form
        </h1>
        
        <?php include('ActivityPlanner/views/alert_message.html.php'); ?>

        <ol class="breadcrumb"> 
          <li>
            <a href="home.php">
              <i class="fa fa-dashboard"></i> 
              Home
            </a>
          </li> 
          <li>
            <a href="base_fives_monitoring_form.html.php?division=<?php echo $_SESSION['division'];?>">
                5S Monitoring Form
            </a>
          </li>
          <li class="active">
            Edit Form
          </li>
          
        </ol> 
    </section>
    <section class="content">
      <div class="row">
    	<div class="col-md-12">
    		<?php include('driver_details.html.php'); ?>
    	</div>
      </div> 
    </section>
</div>


<style type="text/css">

	.btn-file {
	  position: relative;
	  overflow: hidden;
	}

	.btn-file input[type=file] {
	  position: absolute;
	  top: 0;
	  right: 0;
	  min-width: 100%;
	  min-height: 100%;
	  font-size: 100px;
	  text-align: right;
	  filter: alpha(opacity=0);
	  opacity: 0;
	  outline: none;
	  background: white;
	  cursor: inherit;
	  display: block;
	}

	.callout {
	    border-radius: 5px;
	    margin: 0 0 20px 0;
	    padding: 15px 30px 15px 15px;
	    border-left: 20px solid #eee;
	    border-top: 1px solid;
	    border-right: 1px solid;
		border-bottom: 1px solid;
	}
</style>

<script type="text/javascript">
	$(document).ready( function() {
		$('input').iCheck({
		    checkboxClass: 'icheckbox_square-red',
		    radioClass: 'iradio_square-red',
		    increaseArea: '20%' // optional
		  });

		$('#activity_date').daterangepicker();
    	$('#datepicker').datepicker({
	      autoclose: true
	    });

	    $("#datepicker").datepicker().datepicker("setDate", new Date());
		$('.attendee').addClass('hidden');
		$('#cgroup-attendee').addClass('hidden');

		$(document).on('change', ':file', function() {
		  let input = $(this);
		  let numFiles = input.get(0).files ? input.get(0).files.length : 1;
		  let label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
		  
		  input.trigger('fileselect', [numFiles, label]);
		  $('#uploadtxt').val(label);
		});

		$(document).on('change', '.attendee_type', function(){
			let selected = $(this).val();

			if (selected == 'single') {
				$('#cgroup-attendee').removeClass('hidden');
				$('.attendee').addClass('hidden');
			} else {
				$('#cgroup-attendee').addClass('hidden');
				$('.attendee').removeClass('hidden');
			}
		});


        $('input').on('ifChecked', function(event){
            let grp = $(this).closest('tr');
            let cur = $(this).val();
            let tb = $(this).closest('table');
            let tbody = tb.find('tbody tr');
            let footer = tb.find('tfoot');

            let subtotal = footer.find('.subtotal_field');
            // uncheck other checkbox in current row
            uncheckSelect(grp, cur);
            let total = runTotal(tbody, grp, cur);

            subtotal.text(total);
        });

        $(document).on('change', '.minimal', function(event){
            let grp = $(this).closest('tr');
            let cur = $(this).val();
            let tb = $(this).closest('table');
            let tbody = tb.find('tbody tr');
            let footer = tb.find('tfoot');

            let subtotal = footer.find('.subtotal_field');
            // uncheck other checkbox in current row
            // uncheckSelect(grp, cur);
            let total = runTotal(tbody, grp, cur);

            subtotal.text(total);
        });

        function runTotal($tbody, $grp, $cur) {
            let body = $tbody;
            let $list = {1:'one',2:'two',3:'three',4:'four',5:'five'};
            let total = 0;

            $.each(body, function(){
                let tr = $(this);
                $.each($list, function(key,item){
                    let chkbox = tr.find('.'+item);
                    if (chkbox.is(':checked')) {
                        // console.log(key);
                        total = parseInt(total) + parseInt(key);
                    }
                });
            });

            return total;
        }

        function uncheckSelect($grp, $pointer) {
            let $list = ['one','two','three','four','five'];

            $list = jQuery.grep($list, function(value) {
              return value != $pointer;
            });

            $.each($list, function(key, item){
                let el = $grp.find('.'+item);
                el.iCheck('uncheck');
            }); 

            return 0;
        }


    $('.next').click(function(){
      let nextId = $(this).parents('.tab-pane').next().attr("id");
      $('[href=#'+nextId+']').tab('show');
      return false;
    });

    $('.back').click(function(){
        let prevId = $(this).parents('.tab-pane').prev().attr("id");
        $('[href=#'+prevId+']').tab('show');
        return false;
    });

    $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
      //update progress
      let step = $(e.target).data('step');
      let percent = (parseInt(step) / 2) * 100;
      
      $('.progress-bar').css({width: percent + '%'});
      $('.progress-bar').text("Step " + step + " of 2");
      //e.relatedTarget // previous tab    
    });

    $('.first').click(function(){
      $('#myWizard a:first').tab('show');
    });


	});
</script>




