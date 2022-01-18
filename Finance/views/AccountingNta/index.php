<?php require_once 'Finance/controller/NTAController.php'; ?>

<div class="content-wrapper">
  <section class="content-header">
    <h1>NTA/NCA</h1>
    
    <ol class="breadcrumb"> 
      <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li> 
      <li><a href="#">Finance</a></li>
      <li>Accounting Section</li>
      <li class="active">NTA/NCA</li>
    </ol> 
  </section>
  <section class="content">
    <div class="row">
    	<?php include 'tiles/tile.php'; ?>
    </div>
    <div class="row">
      <?php include('Finance/views/AccountingNta/table.php'); ?>
    </div>
  </section>
</div>


