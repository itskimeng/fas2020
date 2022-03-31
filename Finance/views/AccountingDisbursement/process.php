<?php require_once 'Finance/controller/DisbursementController.php'; ?>
<?php 
	date_default_timezone_set('Asia/Manila');
	$timeNow = (new DateTime('now'))->format('m/d/Y');
?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>Process Disbursement</h1>
    
    <ol class="breadcrumb"> 
      <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li> 
      <li><a href="#">Finance</a></li>
      <li>Accounting Section</li>
      <li class="active">Process Disbursement</li>
    </ol> 
  </section>
  <section class="content">
    <div class="row">
    	<?php include 'tiles/tile.php'; ?>
    </div>
    <div class="row">
      <?php include('Finance/views/AccountingDisbursement/process_dv.php'); ?>
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
  var nta_id = 0;
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
    el += '<select class="form-control nta_number" name="nta_number[]" id="nta_number"><option value="" selected="" disabled="">Select NTA/NCA</option><?php foreach ($getNta as $key => $nta): echo '<option value="'.$nta['id'].'">'.$nta['nta_item'].'</option>'; endforeach; ?></select>';
    el += '</td>';
    el += '<td>';
    el += '<input type="text" name="nta_amount[]" id="amount" class="form-control amount" readonly>';
    el += '</td>';
    el += '<td>';
    el += '<input type="text" name="nta_balance[]" id="balance" class="form-control balance" readonly>';
    el += '</td>';
    el += '<td>';
    el += '<input type="text" name="disburse_amount[]" id="disburse_amount" class="form-control disburse_amount">';
    el += '<input type="hidden" name="disburse_amount1[]" id="disburse_amount1" class="form-control disburse_amount1">';
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
      nta_id = $(this).find('.nta_number').val();
    });
    row.remove();
    updateSubTotal();
  })




  $(document).on('change', '.nta_number', function(e){
    let row = $(this).closest('tr');


    nta_id = $(this).find(":selected").val();

   //ajax start
    $.ajax({  
      url:"Finance/route/fetch_nta_details.php?id="+nta_id, 
      cache:false,
        beforeSend:function() {
      }, 

      success:function(data){  

        const obj = JSON.parse(data);
        // alert(obj.amount);
        // alert(obj.balance);
        let nta_balance = obj.balance;
        if (nta_balance == 0) 
        {
          nta_balance = obj.amount;
        }



        let amount = obj.amount;
        let balance = nta_balance;

        obj.amount = format_number(obj.amount);
        nta_balance = format_number(nta_balance);

        // let amount = row.find('.amount').val(obj.amount);
        // let balance = row.find('.balance').val(nta_balance);

        row.find('.amount').val(obj.amount);
        row.find('.balance').val(nta_balance);
      }

    });  
    //ajax end 

  });

  var sub_disbursement = 0; 

  updateSubTotal();

  function updateSubTotal() {
    let total_amount =  0;
    $('#nta-entries tr').each(function(e){
      nta_id = $(this).find('.nta_number').val();
      let amount = $(this).find('.disburse_amount').val();
      let amount1 = $(this).find('.disburse_amount1').val();

      amount = sanitise(amount);
      amount1 = sanitise(amount1);
      // $(this).find('.disburse_amount1').val(amount);
      if (isNaN(amount)) 
      {
        amount = 0;
      }
      if (isNaN(amount1)) 
      {
        amount1 = 0;
      }
      total_amount = total_amount + amount1 + amount;
    });
    $('.total_disbursement').val(total_amount);

  }


  // $(document).on('keyup', '.disburse_amount', function(e){
  $(document).on('blur', '.disburse_amount', function(e){
    let row = $(this).closest('tr');

    updateSubTotal();
    // amount = row.find('.disburse_amount').val();
    // total_amount = parseFloat(total_amount) + parseFloat(amount);

    // if (total_amount < total_net_amount)
    // {
    //   toastr.warning('Total Disbursement Amount should not be less than Net Amount!', 'Alert')
    // }
    // else
    // {
    //   total_amount = format_number(total_amount);

    //   if (isNaN(total_amount)) 
    //   {
    //     $('#total_disbursement').val(amount);
    //   }
    //   else
    //   {
    //     $('#total_disbursement').val(total_amount);
    //   }
    // }

    // amount = format_number(amount);
    // row.find('.disburse_amount').val(amount);

  });



  $('#btnPostDisbursement').click(function(){
    let x_total = $('.total_disbursement').val();
    let x_total_net = $('#total_net_amount').val();
    if (nta_id == 0 || nta_id == null) 
    {
      toastr.warning('Please select NTA!', 'Alert')
    }
    else if ( x_total_net !=  x_total)
    {
      toastr.warning('Total Amount and Net Amount should be equal!', 'Alert')
    }
    else
    {
      $('#form_disbursed').attr('action', 'Finance/route/process_disbursement.php');
      $('#form_disbursed').submit();
    }

  });



  $('#btnUpdateDisbursement').click(function(){
    let x_total = $('.total_disbursement').val();
    let x_total_net = $('#total_net_amount').val();
    if (nta_id == 0 || nta_id == null) 
    {
      toastr.warning('Please select NTA!', 'Alert')
    }
    else if ( x_total_net !=  x_total)
    {
      toastr.warning('Total Amount and Net Amount should be equal!', 'Alert')
    }
    else
    {
      $('#form_disbursed').attr('action', 'Finance/route/update_disbursement.php');
      $('#form_disbursed').submit();
    }

  });







  //pre calculation of taxes

  function sanitise(x) 
  {
    if (isNaN(x)) 
    {
      return 0;
    }
    else
    {
      return  parseFloat(x);
    }
  }

  function taxValidate(tax)
  {
    $(tax).val(
      function(index, value){
      return value.substr(0, value.length - 1);
      // return this.substr(0, value.length - 1);
    })
  }


  function calculateTotal()
  {
    let gross_amount = $('#x_gross_amount').val();

    let tax = $('#tax').val();
    let gsis = $('#gsis').val();
    let pagibig = $('#pagibig').val();
    let philhealth = $('#philhealth').val();
    let other = $('#other').val();

    tax = sanitise(tax);
    gsis = sanitise(gsis);
    pagibig = sanitise(pagibig);
    philhealth = sanitise(philhealth);
    other = sanitise(other);


    let tax_amount = tax + gsis + pagibig + philhealth + other;
    total_net_amount = gross_amount - tax_amount;
    
    if (total_net_amount < 0) 
    {
      taxValidate('#tax');
      taxValidate('#gsis');
      taxValidate('#pagibig');
      taxValidate('#philhealth');
      taxValidate('#other');
      toastr.warning('Total Tax Amount should not be greater than Gross Amount!', 'Alert')
    }
    else
    {
      tax_amount = format_number(tax_amount);
      // total_net_amount = format_number(total_net_amount);
      $('#tax_amount').val(tax_amount);
      $('#total_net_amount').val(total_net_amount);
    }
  }


  $("#tax").on("keyup change", function(e) {
    calculateTotal();
  });
  $("#gsis").on("keyup change", function(e) {
    calculateTotal();
  });
  $("#pagibig").on("keyup change", function(e) {
    calculateTotal();
  });
  $("#philhealth").on("keyup change", function(e) {
    calculateTotal();
  });
  $("#other").on("keyup change", function(e) {
    calculateTotal();
  });


  function formatTax(tax)
  {
    $(tax).on("blur", function(e) {
      let x = $(this).val();
      x = format_number(x);
      $(tax).val(x);
    });
  }



  // formatTax("#tax");
  // formatTax("#gsis");
  // formatTax("#pagibig");
  // formatTax("#philhealth");
  // formatTax("#other");


  var x_gross_amount = $('#gross_amount').val();
  x_gross_amount = format_number(x_gross_amount);
  $('#gross_amount').val(x_gross_amount);


</script>


