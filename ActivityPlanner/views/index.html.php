<?php 
  require_once 'ActivityPlanner/controller/ActivityMonitoringController.php';
?>


<div class="content-wrapper">
    <section class="content-header">
      <!-- <button><a href="update_series_code.php">Run</a></button> -->
        
        <h1>
          LGCDD Activity Planner
        </h1>
        <ol class="breadcrumb"> 
          <li>
            <a href="home.php">
              <i class="fa fa-dashboard"></i> 
              Home
            </a>
          </li> 
          <li class="active">
            LGCDD Activity Planner
          </li>
        </ol> 
    </section>
    <section class="content">
      <div class="row">
        <?php include('_panel/box.html.php'); ?>
      </div>
      <div class="row">
        <div class="col-md-4">
          <?php include('_panel/program.html.php'); ?>
          <?php include('_panel/employee.html.php'); ?>

        </div>
        <div class="col-md-8">
          <?php include('_panel/table.html.php'); ?>
        </div>
      </div>
    </section>
</div>

<?php include('css.html.php');?>
<?php include('modal_edit.html.php'); ?>
<?php include('modal_delete.html.php'); ?>
<?php include('js.html.php'); ?>





    

