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

<script src="Finance/views/AccountingDisbursement/create_js.js" type="text/javascript"></script>

<script type="text/javascript">
  
  var counter = 2;
  var total_net_amount = 0;
  var nta_id = 0;
  //---------------------------------------------------------------------------
  // $("input[data-type='currency']").on({
  //     keyup: function() {
  //       formatCurrency($(this));
  //     },
  //     blur: function() { 
  //       formatCurrency($(this), "blur");
  //     }
  // });


  // function formatNumber(n) {
  //   // format number 1000000 to 1,234,567
  //   return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",")
  // }


  // function formatCurrency(input, blur) {
  //   // appends $ to value, validates decimal side
  //   // and puts cursor back in right position.
    
  //   // get input value
  //   var input_val = input.val();
    
  //   // don't validate empty input
  //   if (input_val === "") { return; }
    
  //   // original length
  //   var original_len = input_val.length;

  //   // initial caret position 
  //   var caret_pos = input.prop("selectionStart");
      
  //   // check for decimal
  //   if (input_val.indexOf(".") >= 0) {

  //     // get position of first decimal
  //     // this prevents multiple decimals from
  //     // being entered
  //     var decimal_pos = input_val.indexOf(".");

  //     // split number by decimal point
  //     var left_side = input_val.substring(0, decimal_pos);
  //     var right_side = input_val.substring(decimal_pos);

  //     // add commas to left side of number
  //     left_side = formatNumber(left_side);

  //     // validate right side
  //     right_side = formatNumber(right_side);
      
  //     // On blur make sure 2 numbers after decimal
  //     if (blur === "blur") {
  //       right_side += "00";
  //     }
      
  //     // Limit decimal to only 2 digits
  //     right_side = right_side.substring(0, 2);

  //     // join number by .
  //     input_val = "$" + left_side + "." + right_side;

  //   } else {
  //     // no decimal entered
  //     // add commas to number
  //     // remove all non-digits
  //     input_val = formatNumber(input_val);
  //     input_val = "$" + input_val;
      
  //     // final formatting
  //     if (blur === "blur") {
  //       input_val += ".00";
  //     }
  //   }
    
  //   // send updated string to input
  //   input.val(input_val);

  //   // put caret back in the right position
  //   var updated_len = input_val.length;
  //   caret_pos = updated_len - original_len + caret_pos;
  //   input[0].setSelectionRange(caret_pos, caret_pos);
  // }

  //---------------------------------------------------------------------------







  function format_number(n) {
    return parseFloat(n).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,");
  }

  function format_replace(n) {
    return n.replace(/,/g, '');
  }


  function generateNtaEntries() {
    let el = '<tr>';
    el += '<td>';
    el += counter;
    el += '</td>';
    el += '<td>';
    // el += '<select class="form-control" name="nta_number['+counter+']" id="nta_number" data-id="'+counter+'"><?php foreach ($getNta as $key => $nta): echo $nta['nta_item']; endforeach; ?></select>';
    el += '<select class="form-control nta_number" name="nta_number['+counter+']" id="nta_number"><option value="" selected="" disabled="">SelectNTA/NCA</option><?php foreach ($getNta as $key => $nta): echo $nta['nta_item']; endforeach; ?></select>';
    el += '</td>';
    el += '<td>';
    el += '<input type="number" name="nta_amount['+counter+']" id="amount" class="form-control amount" readonly>';
    el += '</td>';
    el += '<td>';
    el += '<input type="number" name="nta_balance['+counter+']" id="balance" class="form-control balance" readonly>';
    el += '</td>';
    el += '<td>';
    el += '<input type="number" name="disburse_amount['+counter+']" id="disburse_amount" class="form-control disburse_amount">';
    el += '</td>';
    el += '<td>';
    el += '<button type="button" class="btn btn-sm btn-danger btn-block btn-row_remove"><i class="fa fa-trash"></i></button>';
    el += '</td>';
    el += '</tr>';

    // $('#box-entries').prepend(el);
    $('#box-entries').append(el);
    counter++;
  }


  $(document).on('click', '.btn-generate', function(e){

    generateNtaEntries();

  });

  $(document).on('click', '.btn-row_remove', function(e){
    let row = $(this).closest('tr');
    row.remove();
    counter--;
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

        let amount = row.find('.amount').val(obj.amount);
        let balance = row.find('.balance').val(nta_balance);
      }
            
    });  
    //ajax end 

  });

  var sub_disbursement = 0; 

  $(document).on('keyup', '.disburse_amount', function(e){

    // let total_amount =  0;
    // $('#box-entries tr').each(function(e){
    //   let amount = $(this).find('.disburse_amount').val();
    //   total_amount = parseFloat(total_amount) + parseFloat(amount);
    // });

    // total_amount = format_number(total_amount);

    // // if (total_amount > total_net_amount) 
    // // {
    // //   toastr.warning('Total Disbursement Amount should not be less than Net Amount!', 'Alert')
    // // }
    // // else
    // // {
    // //   $('#total_disbursement').val(total_amount);
    // // }

  });



  $('#btnPostDisbursement').click(function(){

    if (nta_id == 0) 
    {
      toastr.warning('Please select NTA!', 'Alert')
    }
    else
    {
      $('#form_disbursed').submit();
    }

  });







  //pre calculation of taxes

  function sanitise(x) 
  {
    if (x == '') 
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
    let gross_amount = $('#gross_amount').val();

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

</script>


