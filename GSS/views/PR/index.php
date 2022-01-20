<?php require_once 'GSS/controller/PurchaseRequestController.php'; ?>

<div class="content-wrapper">
  <section class="content-header">
    <h1>Purchase Request</h1>
    
    <ol class="breadcrumb"> 
      <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li> 
      <li><a href="#">Procurement</a></li>
      <li class="active">Purchase Request</li>
    </ol> 
  </section>
  <section class="content">
    <div class="row">
      <?php include('_panel/box.html.php'); ?>
    </div>
    <div class = "row">
      <div class="col-lg-12">
        <?php include ('_panel/settings.php'); ?>     
      </div>
    </div>
    <div class="row">
      <div class="col-md-4">
        <?php include('_panel/filter_pr.html.php'); ?>
        <?php //include('_panel/employee.html.php'); ?>
      </div>
      
      <div class="col-md-8">
      <?php include('_panel/view_pr_tbl.php'); ?>


      </div>
    </div>
  </section>
</div>

