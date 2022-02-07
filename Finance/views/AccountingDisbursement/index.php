<?php require_once 'Finance/controller/DisbursementController.php'; ?>
<?php 
  $timeNow = (new DateTime('now'))->format('m/d/Y');
?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>Disbursement</h1>
    
    <ol class="breadcrumb"> 
      <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li> 
      <li><a href="#">Finance</a></li>
      <li>Accounting Section</li>
      <li class="active">Disbursement</li>
    </ol> 
  </section>
  <section class="content">
    <div class="row">
    	<?php include 'tiles/tile.php'; ?>
    </div>
    <div class="row">
      <?php include('Finance/views/AccountingDisbursement/summary.php'); ?>
    </div>  
    <div class="row">
      <?php include('Finance/views/AccountingDisbursement/table.php'); ?>
    </div>
  </section>
</div>

<style type="text/css">
   th {
    background-color: #367fa9; color: white;
   font-size: 80% !important;
  }
  .zoom
  {
    transition: transform .6s;
  }
  .small-box
  {
    border-radius: 15px;
    box-shadow: 0 1px 8px rgb(0,0,0);
  }
</style>

<script src="Finance/views/AccountingDisbursement/custom_js.js" type="text/javascript"></script>



