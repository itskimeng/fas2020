<?php require_once 'Finance/controller/CashController.php'; ?>
<?php 
date_default_timezone_set('Asia/Manila');
$timeNow = (new DateTime('now'))->format('m/d/Y');
 ?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>Paid Payment</h1>
    
    <ol class="breadcrumb"> 
      <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li> 
      <li><a href="#">Finance</a></li>
      <li>Cash Section</li>
      <li class="active">Paid Payment</li>
    </ol> 
  </section>
  <section class="content">
    <form method="POST" action="Finance/route/post_payment.php">
      <div class="row">
        <?php include('Finance/views/CashPayment/payment_details.php'); ?>
      </div>
    </form>
  </section>
</div>

<style type="text/css">
   th {
    background-color: #bce8f1; color: #31708f;
  }
</style>

<script type="text/javascript">
  $('.date_created').datepicker({
    autoclose: true
  })
</script>



