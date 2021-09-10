<?php 
  //require_once 'ActivityPlanner/controller/ActivityMonitoringController.php';
?>

<div class="content-wrapper">
    <section class="content-header">
        <h1>
          Certificate Generator
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
            Certificate Generator
          </li>
          
        </ol> 
    </section>
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <?php include('TemplateGenerator/views/table.html.php'); ?>
        </div> 
      </div> 
    </section>
</div>

<style type="text/css">
  .dropbox {
    box-shadow: 0 1px 2px rgb(0 0 0 / 50%);
  }

  #list_table {
    box-shadow: 0 1px 2px rgb(0 0 0 / 15%);
  }
</style>
