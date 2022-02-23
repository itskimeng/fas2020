<?php 
$nta_id = $_GET['nta_id'];
require_once 'Finance/controller/NTAController.php';
include 'connection.php';

date_default_timezone_set('Asia/Manila');
$timeNow = (new DateTime('now'))->format('m/d/Y');
 ?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>NTA/NCA SUMMARY</h1>
    
    <ol class="breadcrumb"> 
      <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li> 
      <li><a href="#">Finance</a></li>
      <li>Accounting Section</li>
      <li class="active">NTA/NCA SUMMARY</li>
    </ol> 
  </section>
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box dropbox">
          <div class="box-body">

            <div class="row">
              <div class="col-md-6">
                <div class="btn-group">
                <a href="accounting_nta.php" class="btn btn-md btn-default" name=""><i class="fa fa-close"></i> Close </a>
              </div>
              </div>
            </div>
            <div id="modal-vimeo" class="modais" data-izimodal-transitionin="fadeInUp"></div>
          </div>
      </div>
    </div>
      <?php include('Finance/views/AccountingNta/nta_summary.php'); ?>
    </div>
  </section>
</div>

<style type="text/css">
   .main_th {
    background-color: #367fa9; color: white;
   font-size: 80% !important;
   text-align:center;
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
  

  $("#modal").iziModal();


  $(document).on('click', '.trigger', function (event) {
    event.preventDefault();
    // $('#modal').iziModal('setZindex', 99999);
    // $('#modal').iziModal('open', { zindex: 99999 });
    $('#modal').iziModal('open');
});

</script>

<?php
    // toastr output & session reset
    session_start();

    if (isset($_SESSION['toastr'])) {
        echo '<script>toastr.'.$_SESSION['toastr']['type'].'("'.$_SESSION['toastr']['message'].'", "'.$_SESSION['toastr']['title'].'")</script>';
        unset($_SESSION['toastr']);
    }
?>
  

