<?php require_once 'Finance/controller/NTAController.php'; ?>
<?php 
date_default_timezone_set('Asia/Manila');
$timeNow = (new DateTime('now'))->format('m/d/Y');
 ?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>CREATE NTA/NCA</h1>
    
    <ol class="breadcrumb"> 
      <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li> 
      <li><a href="#">Finance</a></li>
      <li>Accounting Section</li>
      <li class="active">CREATE NTA/NCA</li>
    </ol> 
  </section>
  <section class="content">
    <div class="row">
      <?php include('Finance/views/AccountingNta/create_nta.php'); ?>
    </div>
  </section>
</div>

<style type="text/css">
   th {
    background-color: #bce8f1; color: #31708f;
  }
  .small-box
  {
    border-radius: 15px;
    box-shadow: 0 1px 8px rgb(0,0,0);
  }
</style>

<script src="Finance/views/AccountingNta/create_js.js" type="text/javascript"></script>


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


    //post data
  $('#btn_post').click(function(){

    let nta_number = $('#nta_number').val();
    let saro_number = $('#saro_number').val();
    let account_number = $('#account_number').val();
    let particular = $('#particular').val();
    let amount = $('#amount').val();
    let nta_quarter = $('#nta_quarter').find(":selected").val();

    if ( (nta_number == '') || (saro_number == '') || (account_number == '') || (particular == '')  || (amount == '') || (nta_quarter == '') ) 
    {
      toastr.error('Please fill out required fields.', 'Incomplete Data');
    }
    else
    {
      $('#form_add').submit();
    }

  })

</script>
