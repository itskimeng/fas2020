<?php require_once 'HumanResource/controller/DailyTimeRecordController.php'; ?>

<div class="content-wrapper">
  <section class="content-header">
    <h1>Daily Time Record</h1>
    
    <ol class="breadcrumb"> 
      <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li> 
      <li><a href="#">Human Resource</a></li>
      <li class="active">Daily Time Record</li>
    </ol> 
  </section>
    
  <section class="content">
    <div class="row">
      <?php include 'header.php'; ?>
    </div>
    <div class="row">
      <?php include 'dtr_table.php'; ?>
    </div>
  </section>
</div>

<style type="text/css">

   th {
    background-color: #367fa9 !important; 
    color: white;
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

  .delete_modal_header {
  text-align: center;
  background-color: #f15e5e;
  color: white;
  padding:5% !important;
  border-top-left-radius: 4px;
  border-top-right-radius: 4px;
  }

  * {
      box-sizing: border-box;
    }

    .fade-scale {
      transform: scale(0);
      opacity: 0;
      -webkit-transition: all .25s linear;
      -o-transition: all .25s linear;
      transition: all .25s linear;
    }

    .fade-scale.in {
      opacity: 1;
      transform: scale(1);
    }
</style>

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
  
  <?php
      // toastr output & session reset
      session_start();
      
      if (isset($_SESSION['toastr'])) {
          echo 'toastr.success("Transaction Updated", "Success!")';
          unset($_SESSION['toastr']);
      }
  ?>

  $('.year, .month').select2({
    allowClear: true,
    width: '100%'
  }); 

  var table = $('#dtr').DataTable( {
    'lengthChange': false,
    "lengthMenu": [32],
    "paging": false,
    "info": false,
    "columns": [
      { "data": "id", "visible": false },
      { "data": "date", "width": "12%", "className": 'text-center' },
      { "data": "am_in", "width": "12%", "className": 'text-center' },
      { "data": "am_out", "width": "12%", "className": 'text-center' },
      { "data": "pm_in", "width": "12%", "className": 'text-center' },
      { "data": "pm_out", "width": "12%", "className": 'text-center' },
      { "data": "undertime", "width": "12%", "className": 'text-center' },
    ],"order": [[0, 'asc']],
    'searching'   : true,
  });

  $(document).on('change', '#cform-month, #cform-year', function() {
     document.forms['det_form'].submit();
  });


</script>
