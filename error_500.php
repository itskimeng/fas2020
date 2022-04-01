<?php include('base_call_connect.php'); ?> 
<?php include('connection.php'); ?> 
<?php require_once 'bower_components/phpti-master/src/ti.php'; ?>

<?php require_once 'menu_checker.php'; ?>
<?php $menuchecker = menuChecker(''); ?>

<?php include 'base_menu.html.php'; ?>

<?php startblock('title') ?>
  Object Codes
<?php endblock('title') ?>

<?php startblock('content') ?>
  <div class="content-wrapper">
    <section class="content-header">
        <h1>Error 500</h1>
        
        <ol class="breadcrumb"> 
          <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li> 
          <li class="active">Error 500</li>
        </ol> 
    </section>
    
    <section class="content">
      <div class="row" style="padding-top:80px;">
        <div class="error-page">
        <h2 class="headline text-red"><i class="fa fa-wrench"></i></h2>
        <div class="error-content">
          <h3><i class="fa fa-warning text-red"></i> System enhancement ongoing.</h3>
          <p>
          We're currently working on the enhancement of the system and unfortunately this module is included.
          Meanwhile, you may <a href="home.php">return to the dashboard</a>.<br><br>
          Sorry for the incovience. Have a good day!
          </p>
        </div>
        </div>
      </div> 
    </section>
</div>
<?php endblock() ?>

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
<script src="https://code.jquery.com/jquery-migrate-3.0.0.min.js"></script>
