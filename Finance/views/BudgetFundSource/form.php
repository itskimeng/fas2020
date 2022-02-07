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

<style type="text/css">
  .dropbox {
    box-shadow: 0 1px 2px rgb(0 0 0 / 50%);
  }

  .custom-tb-header {
    background-color: #a0cfea !important;
  }
</style>


<script type="text/javascript">
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
    el += '<?= group_textnew('UACS', 'uacs[]', '', 'uacs', false, 0); ?>';
    el += '</td>';
    el += '<td>';
    el += '<?= group_textnew('Group', 'group[]', '', 'group', false, 0); ?>';
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
    el += '<button type="button" class="btn btn-danger btn-block btn-row_remove"><i class="fa fa-close"></i> Remove</button>';
    el += '</td>';
    el += '</tr>';

    $('#box-entries').prepend(el);
  }

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
    // amount = parseFloat(amount);
    let total_amount = format_number(amount);
    // console.log(total_amount);
    balance.val(total_amount);
    $(this).val(total_amount);
    
    computeTotal();
  });

  $(document).on('click', '.btn-add_entry', function(e){
    generateObEntries();
  })

</script>