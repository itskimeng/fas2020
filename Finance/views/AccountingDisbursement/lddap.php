<?php require_once 'Finance/controller/DisbursementController.php'; ?>
<?php 
  $timeNow = (new DateTime('now'))->format('m/d/Y');
?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>Province Disbursement Summary</h1>
    
    <ol class="breadcrumb"> 
      <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li> 
      <li><a href="#">Finance</a></li>
      <li>Accounting Section</li>
      <li class="active">Province Disbursement Summary</li>
    </ol> 
  </section>
  <section class="content">
    <div class="row">
      <?php include('Finance/views/AccountingDisbursement/lddap_summary.php'); ?>
    </div>  
  </section>
</div>

<style type="text/css">
   th {
    /*background-color: #367fa9 !important; */
    /*color: white;*/
   /*font-size: 80% !important;*/
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
  .dataTables_filter
  {
    float: right;
  }
</style>

<!-- <script src="Finance/views/AccountingDisbursement/custom_js.js" type="text/javascript"></script> -->

<script type="text/javascript">

    toastr.options = {
      "closeButton": true,
      "debug": true,
      "newestOnTop": false,
      "progressBar": true,
      "positionClass": "toast-top-right",
      "preventDuplicates": false,
      "onclick": null,
      "showDuration": "500",
      "hideDuration": "1500",
      "timeOut": "5000",
      "extendedTimeOut": "1000",
      "showEasing": "swing",
      "hideEasing": "linear",
      "showMethod": "fadeIn",
      "hideMethod": "fadeOut"
    }

  // toastr.success('Transaction Updated.', 'Success');

</script>

<script type="text/javascript">

  
  <?php
      // toastr output & session reset
      session_start();
      
      if (isset($_SESSION['toastr'])) {
          echo 'toastr.success("Transaction Updated", "Success!")';
          unset($_SESSION['toastr']);
      }
  ?>


   $('#timeline').daterangepicker({
    opens: 'right',
    showButtonPanel: false,
    startDate: moment().startOf('hour'),
    endDate: moment().startOf('hour'),
    locale: {
    format: 'M/DD/YYYY'
    }
  });

   
    $('#example1').DataTable();

</script>


