<?php require_once 'Finance/controller/CashController.php'; ?>
<?php 
date_default_timezone_set('Asia/Manila');
$timeNow = (new DateTime('now'))->format('m/d/Y');
 ?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>Payment</h1>
    
    <ol class="breadcrumb"> 
      <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li> 
      <li><a href="#">Finance</a></li>
      <li>Cash Section</li>
      <li class="active">Payment</li>
    </ol> 
  </section>
  <section class="content">
    <div class="row">
    	<?php include 'tiles/tile.php'; ?>
    </div>
    <div class="row">
      <?php include('Finance/views/CashPayment/table.php'); ?>
    </div>
  </section>
</div>

<style type="text/css">
   th {
    background-color: #bce8f1; color: #31708f;
  }
</style>

<script src="Finance/views/CashPayment/custom_js.js" type="text/javascript"></script>
<!-- test -->



