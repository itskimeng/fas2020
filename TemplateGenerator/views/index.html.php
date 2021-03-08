<?php 
  require_once 'ActivityPlanner/controller/ActivityMonitoringController.php';
?>

<div class="content-wrapper">
    <section class="content-header">
        <h1>
          Template Generator
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
            Template Generator
          </li>
          
        </ol> 
    </section>
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <?php include('TemplateGenerator/views/edit_panel.html.php'); ?>
        </div> 
      </div> 
    </section>
</div>
