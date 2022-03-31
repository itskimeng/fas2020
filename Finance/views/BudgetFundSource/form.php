<?php require_once 'Finance/controller/FundSourceController.php'; ?>



<div class="content-wrapper">
  <section class="content-header">
    <h1>Edit Fund Source</h1>
    
    <ol class="breadcrumb"> 
      <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li> 
      <li><a href="#">Finance</a></li>
      <li>Budget Section</li>
      <li>Fund Source</li>
      <li class="active">Edit Fund Source</li>
    </ol> 
  </section>
  <section class="content">
    <form method="POST" action="<?= $route; ?>">
      <div class="row">
        <?php include 'information.php'; ?>
      </div>
      <div class="row">
        <?php include 'entries.php'; ?>
      </div>
    </form>
  <section>

</div>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" crossorigin="anonymous">


<style type="text/css">
  .dropbox {
    box-shadow: 0 1px 2px rgb(0 0 0 / 50%);
  }

  .custom-tb-header {
    background-color: #a0cfea !important;
  }

  .holder{
  background: #fff;
  border-radius:5px;  
  box-shadow: 0 2px 3px 0 rgba(0,0,0,.1); 
  margin:100px auto;
  padding:30px 20px 20px;
  width:400px;
}

td{
  border-bottom:1px solid #f6f6f6;
  padding:5px 10px;
}

td:nth-child(2){
  text-align: right;
  width: 40px;
}

tr:last-child td{
  border:none;
  padding:30px 10px 10px;
  text-align: center;
}

input[type=checkbox] {
  cursor: pointer;
  height: 30px;
  margin:4px 0 0;
  position: absolute;
  opacity: 0;
  width: 30px;
  z-index: 2;
}

input[type=checkbox] + span {
  background: #105a84;
  border-radius: 50%;
  box-shadow: 0 2px 3px 0 rgba(0,0,0,.1);
  display: inline-block;
  height: 30px;
  margin:4px 0 0;
  position:relative;
  width: 30px;
  transition: all .2s ease;
}

input[type=checkbox] + span::before, input[type=checkbox] + span::after{
  background:#fff;
  /*content: '';*/
  display:block;
  position:absolute;
  width:4px;
  transition: all .2s ease;
}

input[type=checkbox] + span::before{
  height:16px;
  left:13px;
  top:7px;
  -webkit-transform:rotate(-45deg);
  transform:rotate(-45deg);
}

input[type=checkbox] + span::after{
  height:16px;
  right:13px;
  top:7px;
  -webkit-transform:rotate(45deg);
  transform:rotate(45deg);
}

input[type=checkbox]:checked + span {
  background:#0b803c; 
  content: '\f023';        
}

input[type=checkbox]:checked + span::before{
  height: 9px;
  left: 9px;
  top: 13px;
  -webkit-transform:rotate(-47deg);
  transform:rotate(-47deg);
}

input[type=checkbox]:checked + span::after{
  height: 15px;
  right: 11px;
  top: 8px;
}


</style>


<script type="text/javascript">
  <?php
    session_start();
    if (isset($_SESSION['toastr'])) {
        echo 'toastr.'.$_SESSION['toastr']['type'].'("'.$_SESSION['toastr']['message'].'", "'.$_SESSION['toastr']['title'].'")';
        unset($_SESSION['toastr']);
    }
  ?> 
  
  function setInputFilter(textbox, inputFilter) {
    ["input", "keydown", "keyup", "mousedown", "mouseup", "select", "contextmenu", "drop"].forEach(function(event) {
      textbox.addEventListener(event, function() {
        if (inputFilter(this.value)) {
          this.oldValue = this.value;
          this.oldSelectionStart = this.selectionStart;
          this.oldSelectionEnd = this.selectionEnd;
        } else if (this.hasOwnProperty("oldValue")) {
          this.value = this.oldValue;
          this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
        } else {
          this.value = "";
        }
      });
    });
  }
  
  function format_number(n) {
    return parseFloat(n).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,");
  }

  function format_replace(n) {
    return n.replace(/,/g, '');
  }

  function computeTotal() {
    let total_amount = total_obligated = total_balance = 0;
    $('#box-entries tr').each(function(e){
      let amount = $(this).find('.amount_hidden').val();
      let obligated_amt = $(this).find('.obligated_hidden').val();
      let balance = $(this).find('.balance_hidden').val();

      total_amount = parseFloat(total_amount) + parseFloat(amount);
      if ($.isNumeric(obligated_amt)) {
        total_obligated = parseFloat(total_obligated) + parseFloat(obligated_amt);
      }

      if ($.isNumeric(balance)) {
        total_balance = parseFloat(total_balance) + parseFloat(balance);
      }
    });

    total_amount = format_number(total_amount);
    total_obligated = format_number(total_obligated);
    total_balance = format_number(total_balance);

    $('#cform-total_amount').val(total_amount);
    $('#cform-total_obligated').val(total_obligated);
    $('#cform-total_balance').val(total_balance);
  }

  function generateObEntries() {
    let el = '<tr>';
    el += '<td>';
    el += '<?= group_select('Expense Class', 'expense_class[]', $expenseclass_opts, '', 'expense_class', 0); ?>';
    el += '</td>';
    el += '<td>';
    el += '<?= group_select('UACS', 'uacs[]', $uacs_opts, '', 'uacs', 0); ?>';
    el += '</td>';
    el += '<td>';
    el += '<?= group_amount('Amount', 'amount[]', 0.00, 'amount', false, 0); ?>';
    el += '<?= group_input_hidden('amount_hidden[] amount_hidden', 0.00); ?>';
    el += '</td>';
    el += '<td>';
    el += '<?= group_amount('Obligated Amount', 'obligated_amt[]', 0.00, 'obligated_amt', true, 0); ?>';
    el += '<?= group_input_hidden('obligated_hidden[] obligated_hidden', 0.00); ?>';
    el += '</td>';
    el += '<td>';
    el += '<?= group_amount('Balance', 'balance[]', 0.00, 'balance', true, 0); ?>';
    el += '<?= group_input_hidden('balance_hidden[] balance_hidden', 0.00); ?>';
    el += '</td>';
    el += '<td>';
    el += '<div class="btn-group"><button type="button" class="btn btn-danger btn-block btn-row_remove"><i class="fa fa-close"></i> Remove</button></div>';
    el += '</td>';
    el += '</tr>';

    $('#box-entries').append(el);
    // let uacs = row.find('.uacs');
    // let expense_class = row.find('.expense_class');

    // console.log(row);


    // uacs.select2();
    // expense_class.select2();



    return el;
  }

  function isNumber(evt, element) {
      var charCode = (evt.which) ? evt.which : event.keyCode

      if (
          (charCode != 45 || $(element).val().indexOf('-') != -1) &&      // “-” CHECK MINUS, AND ONLY ONE.
          (charCode != 46 || $(element).val().indexOf('.') != -1) &&      // “.” CHECK DOT, AND ONLY ONE.
          (charCode < 48 || charCode > 57))
          return false;

      return true;
  }    

  $(document).ready(function(){
    $('select').select2();

  //   $(document).on('keypress', '.amount', function(e){
  //    var keyCode = e.which;
    
  //     // 8 - (backspace)
  //     // 32 - (space)
  //     // 48-57 - (0-9)Numbers
    
 
  //    if ((keyCode != 8 || keyCode == 32) && (keyCode < 48 || keyCode > 57 || keyCode == 110)) { 
  //     e.preventDefault();
  //   }
  // });

    $(document).on('keypress', '.amount', function (event) {
      return isNumber(event, this)
    });
  })

  //  $('.select2').select2({
  //   allowClear: true,
  //   width: '100%'
  // });

  $(document).on('change', '._lock', function(e){
    let is_lock = $(this).is(':checked');
    let span = $(this).next('span');
    let tr = $(this).closest('tr');
    let dd = tr.find('.is_lock');
    let exp_class = tr.find('.expense_class');
    span.html('');

    if (is_lock) {
      dd.val(true);
      span.html('<i class="fa fa-lock"></i>');
      exp_class.attr('disabled', true);
      exp_class.attr('readonly', true);
    } else {
      dd.val(false);
      span.html('<i class="fa fa-unlock-alt"></i>');
      exp_class.removeAttr('disabled');
      exp_class.removeAttr('readonly');
    }
  });

  $('.date_created').datepicker({
    autoclose: true
  })

  $(document).on('click', '.btn-row_remove', function(e){
    let row = $(this).closest('tr');
    row.remove();
    computeTotal();
  })

  $(document).on('change', '.amount', function(e){
    let row = $(this).closest('tr');
    let balance = row.find('.balance');
    let hidden_amount = row.find('.amount_hidden');
    let hidden_balance = row.find('.balance_hidden');

    let amount = $(this).val();

    if (amount == NaN || amount == '' || amount == null) {
      amount = 0;
    } else {
      amount = format_replace(amount);
    }

    hidden_amount.val(amount);
    hidden_balance.val(amount);
    let total_amount = format_number(amount);
    balance.val(total_amount);
    $(this).val(total_amount);
    
    computeTotal();
  });

  $(document).on('click', '.btn-add_entry', function(e){
    generateObEntries();
    // $('select').select2();

    let last_row = $('#box-entries tr:last');
    let exp = last_row.find('.expense_class');
    let uacs = last_row.find('.uacs');

    exp.select2();
    uacs.select2();
  })

</script>