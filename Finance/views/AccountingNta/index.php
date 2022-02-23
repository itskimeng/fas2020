<?php require_once 'Finance/controller/NTAController.php'; ?>
<?php 
date_default_timezone_set('Asia/Manila');
$timeNow = (new DateTime('now'))->format('m/d/Y');
 ?>
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

<style type="text/css">
   th {
    background-color: #367fa9; color: white;
   font-size: 80% !important;
  }
  .small-box
  {
    border-radius: 15px;
    box-shadow: 0 1px 8px rgb(0,0,0);
  }
  .pull-left {
    float: right !important;
  }
</style>

<script src="Finance/views/AccountingNta/custom_js.js" type="text/javascript"></script>

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

<?php
    // toastr output & session reset
    session_start();

    if (isset($_SESSION['toastr'])) {
        echo '<script>toastr.'.$_SESSION['toastr']['type'].'("'.$_SESSION['toastr']['message'].'", "'.$_SESSION['toastr']['title'].'")</script>';
        unset($_SESSION['toastr']);
    }
?>
  

