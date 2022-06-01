<?php require_once 'HumanResource/controller/EmployeesDirectoryController.php'; ?>


<?php include('modal_export.php'); ?>

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

  $('.year, .month, .office, .m-office, .m-year, .m-month').select2({
    allowClear: true,
    width: '100%'
  }); 



</script>
