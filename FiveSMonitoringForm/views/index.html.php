<?php 
  require_once 'FiveSMonitoringForm/controller/FiveSMonitoringController.php';
?>

<div class="content-wrapper">
    <section class="content-header">
        <h1>
          5S Monitoring Form
        </h1>
        
        <?php include('ActivityPlanner/views/alert_message.html.php'); ?>

        <ol class="breadcrumb"> 
          <li>
            <a href="home.php">
              <i class="fa fa-dashboard"></i> 
              Home
            </a>
          </li> 
          <li class="active">
            5S Monitoring Form
          </li>
          
        </ol> 
    </section>
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <?php include('FiveSMonitoringForm/views/table.html.php'); ?>
        </div> 
      </div> 
    </section>
</div>
