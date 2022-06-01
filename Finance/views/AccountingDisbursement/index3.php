<?php require_once 'Finance/controller/DisbursementController.php'; ?>
<?php 
  $timeNow = (new DateTime('now'))->format('m/d/Y');
?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>End-User Disbursement</h1>
    
    <ol class="breadcrumb"> 
      <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li> 
      <li><a href="#">Finance</a></li>
      <li>Accounting Section</li>
      <li class="active">Disbursement for PO</li>
    </ol> 
  </section>
  <section class="content">
    <div class="row">
      <?php include('Finance/views/AccountingDisbursement/summary.php'); ?>
    </div>  
    <div class="row">
      <?php include 'filter.php'; ?>
    </div>
    <div class="row">
      <div class="col-lg-12 col-6">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li><a href="accounting_disbursement.php">Normal &nbsp;<small class="label pull-right bg-blue"><?= count($data);?></small></a></li>
              <li><a href="accounting_disbursement_po.php">Disbursement for PO &nbsp;<small class="label pull-right bg-blue"><?= count($data1);?></small></a></li>
              <li class="active"><a href="enduser_disbursement.php" type="button" data-toggle="tab"><strong>End User Disbursement</strong></a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
                <?php include('Finance/views/AccountingDisbursement/table3.php'); ?>
              </div>
              <div class="tab-pane" id="tab_2">
              </div>
            </div>
          </div>

      </div>
    </div>
  </section>
</div>

<style type="text/css">
   th {
    background-color: #367fa9 !important; 
    color: white;
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
  .dataTables_filter
  {
    float: right;
  }
</style>

<script src="Finance/views/AccountingDisbursement/custom_js.js" type="text/javascript"></script>

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

</script>


