<?php 
  require_once 'ActivityPlanner/controller/ActivitySubtaskController.php';
?>

<div class="content-wrapper">
    <section class="content-header">
      <h1>
        LGCDD Activity Planner
        <small>Add Task</small>
      </h1>
      
      <!-- <?php //include('alert_message.html.php'); ?> -->

      <ol class="breadcrumb">
        <li>
          <a href="home.php">
            <i class="fa fa-dashboard"></i> Home
          </a>
        </li>
        <li>
          <a href="#">LGCDD</a>
        </li>
        <li>
          <a href="base_menu.html.php?division=<?php echo $_SESSION['division'];?>">
            Activity Planner
          </a>
        </li>
        <li class="active">Add Task</li>
      </ol>
    </section>
    <div>
      <?php if(isset($_SESSION['alert'])): ?>
        <div <?php echo 'class="alert alert-'.$_SESSION['alert']['type'].' alert-dismissible "';?> style="position: absolute; right:-137%">
          <button type="button" class="close" data-dismiss="alert" >&times;</button>
          <h4>
            <i <?php echo 'class="icon fa fa-'.$_SESSION['alert']["icon"].'" ';?> ></i> 
            <?php echo $_SESSION['alert']['header']; ?>!
          </h4>
          <?php echo $_SESSION['alert']['message']; ?>
        </div>
      <?php endif ?>
      <?php unset($_SESSION['alert']); ?>
    </div>

    <!-- Main content -->
    <section class="content">

    <!-- <?php //include 'loader.php'; ?> -->
      <div class="loader">
        <!-- insert loader -->
      </div>

      <div class="row">
        <div class="col-md-3">

        <div class="box box-widget widget-user card-custom">
          <div class="widget-user-header bg-aqua-active card-custom-img" style="background-image: url(http://res.cloudinary.com/d3/image/upload/c_scale,q_auto:good,w_1110/trianglify-v1-cs85g_cc5d2i.jpg);">

          </div>
          <div class="widget-user-image" style="width: 130px; height: 130px;">
            <img class="img-circle custom-profile" id="cform-profile" src="<?php echo $event_data['host_profile']; ?>" alt="User Avatar">
          </div><br><br>  
          <h3 class="profile-username text-center"><?php echo $event_data['host_name']; ?></h3>
          <p class="text-muted text-center">Host</p>
          

          <div class="col-md-12">
            <div class="row">
              <div class="col-md-12">
                <ul class="list-group ">
                  <li class="list-group-item text-center">
                    <b>"<?php echo $event_data['event_title'].""; ?>"</b>
                  </li>
                  <li class="list-group-item text-center">
                    <?php echo $event_data['code_series'].""; ?>
                  </li>
                </ul>
                
              </div>
                  
              
            </div>
            
          </div>
        </div>
        
        <div class="box box-primary dropbox">
          <div class="box-header with-border">
            <div class="col-md-12">
              <h3 class="box-title">Details</h3>
            </div>
          </div>
          <div class="box-body">
            <div class="col-md-12">
              <strong><i class="fa fa-book margin-r-5"></i> Description</strong>
              <p class="text-muted">
                <?php echo $event_data['event_description'].""; ?>
              </p>
              <hr>
              <strong><i class="fa fa-calendar-times-o margin-r-5"></i>Activity Timeline</strong>
              <p class="text-muted">
                <?php echo $event_data['event_start']; ?><br>
                <?php echo $event_data['event_end']; ?>
              </p>
              <hr>
              <strong><i class="fa fa-map-marker margin-r-5"></i>Venue</strong>
              <p class="text-muted">
                <?php echo $event_data['event_venue']; ?>
              </p>
              <hr>
              <strong><i class="fa fa-users margin-r-5"></i>Target Participants</strong>
              <p class="text-muted">
                <?php echo $event_data['target_participants']; ?>
              </p>
              <hr>
              <strong><i class="fa fa-pencil margin-r-5"></i> Priority Level</strong>
              <p>
            	<?php echo group_rateme('Priority','priority', $event_data['event_priority'], 0); ?>
              </p>
              
            </div>
          </div>
        </div>
      </div>

        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom dropbox">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#workspace" data-toggle="tab"><b>Workspace</b></a></li>
              <?php if ($is_opr OR in_array('opr', $access_list)): ?>
                <li><a href="#tab_settings" data-toggle="tab"><b>Access Control List</b></a></li>
              <?php endif ?>
            </ul>

            <div class="tab-content">
              <?php include('tab_workspace.html.php'); ?>

              <?php if ($is_opr OR in_array('opr', $access_list)): ?>
                <?php include('tab_settings_v2.html.php'); ?>
              <?php endif ?>
            </div>  
        </div>
      </div>

    </section>
</div>    

<?php include('modal_conflict_details.php'); ?>
<?php include('modal_add_task.html.php'); ?>
<?php include('modal_edit_task.html.php'); ?>
<?php include('modal_task_comment.html.php'); ?>
<?php include('modal_upload_docs.html.php'); ?>

        	
<style type="text/css">
  .dropbox {
    box-shadow: 0 1px 2px rgb(0 0 0 / 50%);
  }

  img {
      max-width: 100%;
      max-height: 100%;
  }

  .widget-user .widget-user-image {
    position: absolute;
    top: 23px;
    left: 42%;
    margin-left: -45px;
}

  .custom-profile {
    height: 100% !important;
    width: 100% !important;
    object-fit: cover;
  }

  .card-custom {
  overflow: hidden;
  min-height: 350px;
  box-shadow: 0 0 15px rgba(10, 10, 10, 0.3);
}

.card-custom-img {
  height: 200px;
  min-height: 119px;
  background-repeat: no-repeat;
  background-size: cover;
  background-position: center;
  border-color: inherit;
}

/* First border-left-width setting is a fallback */
.card-custom-img::after {
  position: absolute;
  content: '';
  top: 80px;
  left: 0;
  width: 0;
  height: 0;
  border-style: solid;
  border-top-width: 40px;
  border-right-width: 0;
  border-bottom-width: 0;
  border-left-width: 545px;
  border-left-width: calc(575px - 5vw);
  border-top-color: transparent;
  border-right-color: transparent;
  border-bottom-color: transparent;
  border-left-color: inherit;
}

[data-letters]:before {
  content:attr(data-letters);
  display:inline-block;
  font-size:1em;
  width:2.5em;
  height:2.5em;
  line-height:2.5em;
  text-align:center;
  border-radius:50%;
  background:plum;
  vertical-align:middle;
  margin-right:1em;
  color:white;
        /*margin: 0 auto;*/
    /*width: 100px;*/
    /*padding: 3px;*/
    /*border: 3px solid #d2d6de;*/
  }

	a.btn-remove_subtask,a.btn-remove_newsubtask {
	    min-width: 35px !important;
	    height: 35px !important;
	    padding: 6px !important;
	    background-color: #f84056d1!important;
	}

	a.btn-pause_subtask {
    min-width: 35px !important;
    height: 35px !important;
    padding: 6px !important;
  }

  a.btn-start_subtask, a.btn-stop_subtask {
	    min-width: 35px !important;
	    height: 35px !important;
	    padding: 6px !important;
	    background-color: #0fb360b5!important;
	}

  a.btn-edit_task {
    min-width: 35px !important;
    height: 35px !important;
    padding: 6px !important;
    background-color: #3c8dbc!important;  
  }

  a.btn-upload_docs, a.btn-open-exlink {
    min-width: 35px !important;
    height: 35px !important;
    padding: 6px !important;
    background-color: #ffb123!important;  
  }

  a.btn-app_comment {
      min-width: 35px !important;
      height: 35px !important;
      padding: 6px !important;
      background-color: #fff040d1!important;
  }

  td > div.status-ongoing {
    background-color: orange;
    padding-top: 7%;
    height: 26px;
  }

  td > div.status-forchecking {
    background-color: #00bcff;
    padding-top: 7%;
    height: 26px;
  }

  td > div.status-done {
    background-color: #008000ab;
    padding-top: 7%;
    height: 26px;
  }

  td > div.status-created, td > div.status-draft {
    background-color: #aeb2b3;
    padding-top: 7%;
    height: 26px;
  }


</style>

<script type="text/javascript">
  $(document).ready(function(){
    let dt = $('#list_table').DataTable( {
        // 'paging'      : true,  
        'lengthChange': true,
        'searching'   : true,
        'ordering'    : false,
        'info'        : true,
        'autoWidth'   : false,
      } );
  });
</script>

<?php include('js.html.php'); ?>




    

