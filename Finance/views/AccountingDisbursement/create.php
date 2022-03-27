<?php require_once 'Finance/controller/DisbursementController.php'; ?>
<?php 
	date_default_timezone_set('Asia/Manila');
	$timeNow = (new DateTime('now'))->format('m/d/Y');
?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>Create Disbursement</h1>
    
    <ol class="breadcrumb"> 
      <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li> 
      <li><a href="#">Finance</a></li>
      <li>Accounting Section</li>
      <li class="active">Generate Disbursement</li>
    </ol> 
  </section>
  <section class="content">
    <div class="row">
    	<?php include 'tiles/tile.php'; ?>
    </div>
    <div class="row">
      <?php include('Finance/views/AccountingDisbursement/create_dv.php'); ?>
    </div>
  </section>
</div>

<style type="text/css">
   th {
    background-color: #bce8f1; color: #31708f;
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
	.input {border-style: groove;}

	.tb {

	border: 1px solid black;
	}
</style>

<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

<!-- <script src="Finance/views/AccountingDisbursement/create_js.js" type="text/javascript"></script> -->

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
    session_start();
    if (isset($_SESSION['toastr'])) {
        echo 'toastr.'.$_SESSION['toastr']['type'].'("'.$_SESSION['toastr']['message'].'", "'.$_SESSION['toastr']['title'].'")';
        unset($_SESSION['toastr']);
    }
  ?> 
  
  var counter = 2;
  var total_net_amount = 0;
  var lddap_id = 0;
  var total_amount =  0;



  function format_number(n) {
    return parseFloat(n).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,");
  }

  function format_replace(n) {
    return n.replace(/,/g, '');
  }


  function generateNtaEntries() {
    let el = '<tr>';
    el += '<td>';
    // el += '<select class="form-control" name="nta_number[]" id="nta_number" data-id=""><?php foreach ($getNta as $key => $nta): echo $nta['nta_item']; endforeach; ?></select>';
    el += '<select class="form-control lddap_number" name="lddap_number[]" id="lddap_number"><option value="" selected="" disabled="">Select LDDAP</option><?php foreach ($getLddap as $key => $lddap): echo '<option value="'.$lddap['id'].'">'.$lddap['lddap'].'</option>'; endforeach; ?></select>';
    el += '</td>';
    el += '<td>';
    el += '<input type="text" name="lddap_date[]" id="amount" class="form-control lddap_date" readonly>';
    el += '</td>';
    el += '<td>';
    el += '<input type="text" name="lddap_balance[]" id="balance" class="form-control lddap_balance" readonly>';
    el += '</td>';
    el += '<td>';
    el += '<input type="text" name="lddap_amount[]" id="lddap_amount" class="form-control lddap_amount">';
    el += '<input type="hidden" name="lddap_amount1[]" id="lddap_amount1" class="form-control lddap_amount1">';
    el += '</td>';
    el += '<td>';
    el += '<button type="button" class="btn btn-sm btn-danger btn-block btn-row_remove"><i class="fa fa-trash"></i></button>';
    el += '</td>';
    el += '</tr>';

    $('#nta-entries').append(el);
  }


  $(document).on('click', '.btn-generate', function(e){

    generateNtaEntries();

  });

  $(document).on('click', '.btn-row_remove', function(e){
    let row = $(this).closest('tr');
    // let amount = row.find('.disburse_amount').val();
    // total_amount = total_amount - amount;
    // total_amount = format_number(total_amount);
    // $('#total_disbursement').val(total_amount);
    $('#nta-entries tr').each(function(e){
      lddap_id = $(this).find('.lddap_number').val();
    });
    row.remove();
  })




  $(document).on('change', '.lddap_number', function(e){
    let row = $(this).closest('tr');

    lddap_id = $(this).find(":selected").val();

   //ajax start
    $.ajax({  
      url:"Finance/route/fetch_lddap_details.php?id="+lddap_id, 
      cache:false,

      beforeSend:function() {
      }, 

      success:function(data){  
        
        const obj = JSON.parse(data);

        let lddap_balance = format_number(obj.balance);


        row.find('.lddap_date').val(obj.lddap_date);
        row.find('.lddap_balance').val(lddap_balance);
      }

     });
    //ajax end 

  });

</script>

