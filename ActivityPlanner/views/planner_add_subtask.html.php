<?php 
  $path = $_SERVER['DOCUMENT_ROOT'];
  $path .= '/ActivityPlanner/controller/ActivitySubtaskController.php';

  require_once($path);
?>

<div class="content-wrapper">
    <section class="content-header">
      <h1>
        LGCDD Activity Planner
        <small>Add Task</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="home.php">
              <i class="fa fa-dashboard"></i> 
              Home
            </a></li>
        <li><a href="#"></a>LGCDD</a></li>
        <li><a href="#"></a>Activity Planner</a></li>
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
    
      <div class="row">
        <div class="col-md-3">
          <div class="box box-primary">
            <div class="box-body box-profile">
              <!-- <?php //if (!empty($event_data['profile'])): ?> -->
                <img class="profile-user-img img-responsive img-circle" src="<?php echo $event_data['host_profile']; ?>" alt="User profile picture">
              <!-- <?php //else: ?> -->
                <!-- <p data-letters="<?php //echo $event_data['host_initials']; ?>"> -->
              <!-- <?php //endif ?> -->

              <h3 class="profile-username text-center"><?php echo $event_data['host_name']; ?></h3>
              <p class="text-muted text-center"><?php echo $event_data['host_designation']; ?></p>
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

          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Details</h3>
            </div>
            <div class="box-body">
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
              <strong><i class="fa fa-pencil margin-r-5"></i> Priority Level</strong>
              <p>
            	<?php echo group_rateme('Priority','priority', $event_data['event_priority'], 0); ?>
              </p>
            </div>
          </div>
        </div>

        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#workspace" data-toggle="tab">Workspace</a></li>
              <li><a href="#tab_settings" data-toggle="tab">Access Control List</a></li>
            </ul>

            <div class="tab-content">
              <?php include('tab_workspace.html.php'); ?>
              <?php include('tab_settings_v2.html.php'); ?>

            </div>  
        </div>
      </div>

    </section>
</div>    

<?php include('modal_task_comment.html.php'); ?>




        
        
    	
        	
<style type="text/css">

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
	    background-color: #0fb360b5;
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
    height: 34px;
  }

  td > div.status-forchecking {
    background-color: #00bcff;
    padding-top: 7%;
    height: 34px;
  }

  td > div.status-done {
    background-color: #008000ab;
    padding-top: 7%;
    height: 34px;
  }


</style>


<?php include('js.html.php'); ?>




    

