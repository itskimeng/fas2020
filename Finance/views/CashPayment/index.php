<?php require_once 'Finance/controller/CashController.php'; ?>

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
    	<?php include 'Finance/views/CashPayment/filter.php'; ?>
      <?php include 'Finance/views/CashPayment/table.php'; ?>
    </div>
  </section>
</div>

<style type="text/css">
   th {
    background-color: #bce8f1; color: #31708f;
  }

  .dataTables_filter {
    text-align: right !important;
  }
</style>

<script type="text/javascript">

  <?php
    session_start();
    if (isset($_SESSION['toastr'])) {
        echo 'toastr.'.$_SESSION['toastr']['type'].'("'.$_SESSION['toastr']['message'].'", "'.$_SESSION['toastr']['title'].'")';
        unset($_SESSION['toastr']);
    }
  ?> 

  var table = $('#example').DataTable({
    "bFilter": true,
    "columns": [
      { "data": "acct_no", "className": 'text-center' },
      { "data": "date" },
      { "data": "dv_no", "className": 'text-center' },
      { "data": "payee", "className": 'text-center'  },
      { "data": "status", "className": 'text-center'  },      
      { "data": "action", "sortable": false, "className": 'text-center' }  
    ],"order": [[1, 'desc']],
    'searching'   : true,
  });
</script>



