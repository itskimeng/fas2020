<?php require_once 'Finance/controller/ObligationController.php'; ?>

<div class="content-wrapper">
  <section class="content-header">
    <h1>Create Obligation</h1>
    
    <ol class="breadcrumb"> 
      <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li> 
      <li><a href="#">Finance</a></li>
      <li>Budget Section</li>
      <li>ORS/BURS</li>
      <li class="active">Create Obligation</li>
    </ol> 
  </section>
  <section class="content">
    <div class="row">
      <?php //include 'instruction.php'; ?>
    </div>

    <div class="row">
      <?php include 'information.php'; ?>
    </div>
    <div class="row">
      <?php include 'entries.php'; ?>
    </div>
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

  function generateObligation(obtype, is_dfund=false) {
    let el = '<div class="box box-primary dropbox">';
    el += '<div class="box-header">';
      el += '<h3 class="box-title"><i class="fa fa-book"></i> '+obtype+'</h3>';
      el += '<div class="box-tools pull-right">';
        el += '<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>';
        el += '<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>';
      el += '</div>';
    el += '</div>';
    el += '<div class="box-body no-padding">';
      el += '<div class="row">';
        el += '<div class="col-md-12">';
          el += '<table class="table table-striped">';
            el += '<tbody>';
              el += '<tr class="custom-tb-header">';
                el += '<th class="text-center">Serial No.</th>';
                el += '<th class="text-center">PO</th>';
                el += '<th class="text-center">Date Received</th>';
                el += '<th class="text-center">Date Obligated</th>';
                el += '<th class="text-center">Date Returned</th>';
                el += '<th class="text-center">Date Released</th>';
              el += '</tr>';
              el += '<tr>';
                el += '<td>';
                el += '<?= group_textnew('Serial Number', 'serial_no[]', '', 'serial_no', false, 0); ?>';
                el += '</td>';
                el += '<td>';
                el += '<?= group_textnew('Purchase Order', 'po_no[]', '', 'serial_no', false, 0); ?>';
                el += '</td>';
                el += '<td>';
                el += '<?= group_date2('Date Received', 'date_received[]', 'date_received', '', 'info-dates', 0); ?>';
                el += '</td>';
                el += '<td>';
                el += '<?= group_date2('Date Processed', 'date_processsed[]', 'date_processsed', '', 'info-dates', 0); ?>';
                el += '</td>';
                el += '<td>';
                el += '<?= group_date2('Date Returned', 'date_returned[]', 'date_returned', '', 'info-dates', 0); ?>';
                el += '</td>';
                el += '<td>';
                el += '<?= group_date2('Date Released', 'date_released[]', 'date_released', '', 'info-dates', 0); ?>';
                el += '</td>';
              el += '</tr>';
              el += '<tr class="custom-tb-header">';
                el += '<th class="text-center" width="25%">Payee</th>';
                el += '<th class="text-center" width="25%">Supplier</th>';
                el += '<th class="text-center" colspan="4">Particulars/Purpose</th>';
              el += '</tr>';
              el += '<tr>';
                el += '<td>';
                el += '<?= group_textnew('Payee', 'payee[]', '', 'payee', false, 0); ?>';
                el += '</td>';
                el += '<td>';
                el += '<?= group_textnew('Supplier', 'supplier[]', '', 'supplier', false, 0); ?>';
                el += '</td>';
                el += '<td colspan="4">';
                el += '<?= group_textarea('Particulars', 'particulars[]', '', 0, true, false); ?>';
                el += '</td>';
              el += '</tr>';

              if (is_dfund) {
                el += '<tr>';
                  el += '<td colspan="6">';
                    el += '<div class="row">';
                      el += '<div class="col-md-3">';
                        el += '<?= group_textnew('Fund Source', 'fund_source[]', '', 'fund_source'); ?>';
                      el += '</div>';
                      el += '<div class="col-md-3">';
                        el += '<?= group_textnew('MFO/PPA', 'ppa[]', '', 'ppa'); ?>';
                      el += '</div>';
                      el += '<div class="col-md-3">';
                        el += '<?= group_textnew('UACS Object Code', 'uacs[]', '', 'uacs'); ?>';
                      el += '</div>';
                      el += '<div class="col-md-3">';
                        el += '<?= group_textnew('Amount', 'amount[]', '', 'amount'); ?>';
                      el += '</div>';
                    el += '</div>';
                    el += '<div class="row">';
                      el += '<div class="col-md-6">';
                        el += '<?= group_textarea('Remarks', 'remarks', '', 1, true, false, 3); ?>';
                      el += '</div>';
                      el += '<div class="col-md-3">';
                        el += '<?= group_textnew('Group', 'group[]', '', 'group'); ?>';
                      el += '</div>';
                      el += '<div class="col-md-3">';
                        el += '<?= group_select('Status', 'status', ['Obligated', 'Pending'], '', 'status', 1); ?>';
                      el += '</div>';
                    el += '</div>';
                  el += '</td>';
                el += '</tr>';
              }

            el += '</tbody>';
          el += '</table>';
        el += '</div>';
      el += '</div>';
    el += '</div>';
    el += '</div>';
    
    $('#box-entries').prepend(el);
  }

  $('.info-dates').datepicker({
    autoclose: true
  })

  $(document).on('click', '.btn-generate', function(){
    let obtype = $('.ob_type').val();
    let dfunds = $('.dfunds').is(':checked');

    if (obtype == 'burs') {
      obtype = 'BURS';
    } else {
      obtype = 'ORS';
    }

    if (dfunds) {
      generateObligation(obtype + ' - Provincial Office', true);
    } else {
      generateObligation(obtype);
    }
  })


</script>