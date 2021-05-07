<?php 
  require_once 'TemplateGenerator/controller/ParticipantsController.php';
?>

<div class="content-wrapper">
    <section class="content-header">
        <h1>
          List of Participants
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
            <a href="base_template_generator.html.php?division=<?php echo $_SESSION['division'];?>">
            	Certificate Generator
            </a>
          </li>
          <li class="active">
            List of Participants
          </li>
          
        </ol> 
    </section>
    <section class="content">
      <div class="row">
      	<div class="col-md-3">
          <?php include 'participants/details.php'; ?>
        </div>
        <div class="col-md-9">
          <?php include 'participants/table.php'; ?>
        </div> 
      </div> 
    </section>
</div>


<style type="text/css">

	.dropbox {
		box-shadow: 0 1px 2px rgb(0 0 0 / 50%);
	}

	#list_table {
		box-shadow: 0 1px 2px rgb(0 0 0 / 25%) !important;
	}

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
	// function myFunction() {
	//   window.open("base_template_preview.html.php", "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=500,left=500,width=400,height=400");
	// }
	// We can watch for our custom `fileselect` event like this
	$(document).ready( function() {
    	let dt = $('#list_table').DataTable({
	      'lengthChange': true,
	      'searching'   : true,
	      'ordering'    : false,
	      'info'        : true,
	      'autoWidth'   : false,
	      'lengthMenu': [10, 15, 20, 25],
	    });

	});
</script>




