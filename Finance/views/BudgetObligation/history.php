<?php include 'Finance/controller/OBHistoryController.php'; ?>

<?php 
  function group_custom_input_checkbox2($label, $id, $name, $class, $value, $label_size = 1, $body_size = 3, $checked = false)
  {
      $element = '<div class="form-group">';
    $element .= '<div class="switchToggle">';
    if ($value) {
      $element .= '<input type="checkbox" id="cform-'.$name.'" class="'.$class.'" name="'.$name.'" checked>';
    } else {
      $element .= '<input type="checkbox" id="cform-'.$name.'" class="'.$class.'" name="'.$name.'">';
    }
    $element .= '<label for="cform-'.$name.'">'.$label.'</label>';
    
    if ($label_size > 0) {
      $element .= '<span>&nbsp; <b>'.$label.'</b></span>';
    }

    $element .= '</div>';
    $element .= '</div>';

      return $element;
  }

  function group_customselect($label, $name, $options, $value, $class, $sel_type, $label_size=1, $readonly=false, $body_size=1, $required=true) {
    $element = '<div id="cgroup-'.$name.'" class="form-group">';
    if ($label_size > 0) {
      $element .= '<label class=" control-label">'.$label.':</label><br>';
    }

      if ($readonly) {
       $element .= '<select id="cform-'.$name.'" name="'.$name.'" class="form-control select2 '.$class.'" data-placeholder="-- Select '.$label.' --" disabled style="width: 100%;">';
      } else {
         $element .= '<select id="cform-'.$name.'" name="'.$name.'" class="form-control select2 '.$class.'" data-placeholder="-- Select '.$label.' --" required="'.$required.'" style="width: 100%;">'; 
      }

      if ($sel_type == 1) {
      $element .= group_customoptions_po($options, $value, $label);
      } else if ($sel_type == 2) {
      $element .= group_customoptions_supp($options, $value, $label);
      } else {
      $element .= group_customoptions_fs($options, $value, $label);
      }

      $element .= '</select>';
    $element .= '<input type="hidden" id="hidden-'.$name.'" name="hidden-'.$name.'" value="'.$value.'" />';
    $element .= '</div>';

    return $element;
  }

  function group_customoptions_supp($fields, $selected, $label) {
      $element = '<option disabled selected>-- Please select '.$label.' --</option>';
      foreach ($fields as $key=>$value) {
          if ($key == $selected) {
              $element .= '<option value="'.$key.'" data-address="'.$value['address'].'" selected="selected">'.$value['name'].'</option>';
          } else {
              $element .= '<option value="'.$key.'" data-address="'.$value['address'].'">'.$value['name'].'</option>';
          }
      }
      
      return $element;
  }

  function group_customoptions_po($fields, $selected, $label) {
      $element = '<option disabled selected>-- Please select '.$label.' --</option>';
      foreach ($fields as $key=>$value) {
          if ($key == $selected) {
              $element .= '<option value="'.$key.'" data-amount="'.$value['po_amount'].'" data-supplier="'.$value['supp_id'].'" selected="selected">'.$value['po'].'</option>';
          } else {
              $element .= '<option value="'.$key.'" data-amount="'.$value['po_amount'].'" data-supplier="'.$value['supp_id'].'">'.$value['po'].'</option>';
          }
      }
      
      return $element;
  }

  function group_customoptions_fs($fields, $selected, $label) {
      $element = '<option disabled selected>-- Please select '.$label.' --</option>';
      foreach ($fields as $key=>$value) {
          if ($key == $selected) {
              $element .= '<option value="'.$key.'" data-ppa="'.$value['ppa'].'" selected="selected">'.$value['source_no'].'</option>';
          } else {
              $element .= '<option value="'.$key.'" data-ppa="'.$value['ppa'].'">'.$value['source_no'].'</option>';
          }
      }
      
      return $element;
  }
?>


<div class="content-wrapper">
  <section class="content-header">
    <h1>Approval History</h1>
    
    <ol class="breadcrumb"> 
      <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li> 
      <li><a href="#">Finance</a></li>
      <li>Budget Section</li>
      <li class="active">Approval History</li>
    </ol> 
  </section>
  <section class="content">
    
    <div class="row">
      <div class="col-md-4">
        <div class="box box-warning dropbox">
          <div class="box-header">
            <h3 class="box-title"><i class="fa fa-book"></i> Obligation</h3>
            
          </div>
          <div class="box-body">
            <div class="row">
              <div class="col-md-12">
                <?= group_select('Obligation Type', 'ob_type', $obligation_opts, $obligation['ob_type'], 'ob_type', 1, true); ?>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <?= group_textnew('Code', 'code', $obligation['serial_no'], 'code', true); ?>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <?= group_customselect('Purchase Order', 'po_no', $po_opts, isset($poid) ? $poid : $obligation['pid'], 'po_no', 1, 1, true); ?>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <?php if (!empty($obligation['pid'])): ?>
                    <?= group_customselect('Payee', 'supplier', $obligation['is_dfunds'] ? $huc_opts : $supplier_opts, $obligation['supplier'], 'supplier', 2, 1, true); ?>
                  <?php else: ?>
                    <?= group_customselect('Payee', 'supplier', $obligation['is_dfunds'] ? $huc_opts : $supplier_opts, $data['supplier'], 'supplier', 2, 1, $is_readonly); ?>
                  <?php endif ?>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <?= group_textnew('Amount', 'amount', $obligation['total_amount'], 'amount', true); ?>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-8">
        <div class="box box-warning dropbox">
          <div class="box-header">
            <h3 class="box-title"><i class="fa fa-book"></i> Transaction History</h3>
            
          </div>
          <div class="box-body">
            <div class="row">
              <div class="col-md-12">
                <table class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>DATE</th>
                      <th>USER</th>
                      <th>MENU</th>
                      <th>ACTION</th>
                      <th>REMARKS</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($history as $key => $his): ?>
                      <tr>
                        <td>
                          <?= $his['interval']; ?><br>
                          <?= $his['action_date'];?>    
                        </td>
                        <td style="vertical-align: bottom; text-align: center"><?= $his['name']; ?></td>
                        <td style="vertical-align: bottom; text-align: center;">
                          <?php if ($his['menu'] == 'Payment'): ?>
                            <span class="badge bg-green">PAYMENT</span>
                          <?php elseif ($his['menu'] == 'Disbursement'): ?>
                            <span class="badge bg-orange">DISBURSEMENT</span>
                          <?php else: ?>
                            <span class="badge bg-blue">OBLIGATION</span>
                          <?php endif ?>  
                        </td>
                        <td style="vertical-align: bottom; text-align: center;"><?= $his['action']; ?></td>
                        <td style="vertical-align: bottom;"><?= $his['remarks']; ?></td>
                      </tr>
                    <?php endforeach ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<?php include 'modal_purchase_order.php'; ?>
<?php include 'modal_purchase_request.php'; ?>
<?php include 'modal_delete.php'; ?>
<?php include 'modal_return.php'; ?>
<?php include 'modal_pr_availability_code.php'; ?>
<?php include 'modal_pr_availability_code2.php'; ?>

<style type="text/css"><?php include 'custom_css.css'; ?></style>
<script type="text/javascript">

  <?php
      // toastr output & session reset
      session_start();
      if (isset($_SESSION['toastr'])) {
          echo 'toastr.'.$_SESSION['toastr']['type'].'("'.$_SESSION['toastr']['message'].'", "'.$_SESSION['toastr']['title'].'")';
          unset($_SESSION['toastr']);
      }
  ?>
  
  function format ( data ) {
    let tb = '<table class="table table-bordered" cellpadding="9">';
    tb += '<tr style="text-align: center; background-color: #f39c12; color: white;">';
    tb += '<td width="12%"><b>Date Received</b></td>';
    tb += '<td width="12%"><b>Date Obligated</b></td>';
    tb += '<td width="12%"><b>Date Returned</b></td>';
    tb += '<td width="12%"><b>Date Released</b></td>';
    tb += '<td width="20%"><b>PO Number</b></td>';
    tb += '<td><b>Remarks</b></td>';
    tb += '</tr>';
    tb += '<tr>';
    tb += '<td class="text-center">'+data.date_received+'</td>';
    tb += '<td class="text-center">'+data.date_obligated+'</td>';
    tb += '<td class="text-center">'+data.date_returned+'</td>';
    tb += '<td class="text-center">'+data.date_released+'</td>';
    tb += '<td class="text-center">'+data.ponum+'</td>';
    tb += '<td class="text-center">'+data.remarks+'</td>';
    tb += '</tr>';

    return tb;
  }

  $('#cform-filter_date_generated').datepicker({
    autoclose: true
  })

  var table = $('#example2').DataTable( {
    // "ajax": "../ajax/data/objects.txt",
    'lengthChange': false,
    "columns": [
      { "data": "id", "visible": false },
      {
        "className"     : 'details-control text-center',
        "orderable"     : false,
        "sortable"      : false,
        "data"          : null,
        "defaultContent": '<a type="button" class="btn btn-xs btn-primary" style="border-radius:50%"><span class="fa fa-plus"></span></a>',
      },
      { "data": "type", "width": "8%", "className": 'text-center' },
      { "data": "date_submitted", "width": "8%", "className": 'text-center' },
      { "data": "date_created", "width": "8%", "className": 'text-center' },
      { "data": "ors_number", "width": "10%", "className": 'text-center' },
      { "data": "payee", "width": "20%" },
      { "data": "particulars", "width": "15%" },
      { "data": "amount", "width": "10%", "className": 'text-center' },
      { "data": "status", "width": "10%", "className": 'text-center' },
      { "data": "action", "width": "10%", "sortable": false, "className": 'text-center' },
      { "data": "date_received", "visible": false },
      { "data": "date_obligated", "visible": false },
      { "data": "date_returned", "visible": false },
      { "data": "date_released", "visible": false },
      { "data": "ponum", "visible": false  },   
      { "data": "remarks", "visible": false },
    ],"order": [[1, 'asc']],
    'searching'   : true,
  });

  $(document).on('click', '.btn-availability_code', function(e){
    let row = $(this).closest('tr');
    let id = $(this).data('id');
    let code = row.find('td:eq(0)').html();

    let modal = $('#modal_pr_availability_code');
    let modal_sourceID = modal.find('#cform-id');
    let modal_sourceCodeTxt = modal.find('#source_code');
  
    modal_sourceID.val(id);
    modal_sourceCodeTxt.html(code);
  })

  $(document).on('click', '.btn-availability_code2', function(e){
    let row = $(this).closest('tr');
    let id = $(this).data('id');
    let code = row.find('td:eq(0)').html();

    let modal = $('#modal_pr_availability_code2');
    let modal_sourceID = modal.find('#cform-id');
    let modal_sourceCodeTxt = modal.find('#source_code');
  
    modal_sourceID.val(id);
    modal_sourceCodeTxt.html(code);
  })

  $(document).on('hidden.bs.modal', '#modal_pr_availability_code2', function(e) {
    $('#modal-purchase_request').modal('show');
    let modal = $('#modal_pr_availability_code').find('#cform-code');
    let modal2 = $('#modal_pr_availability_code2').find('#cform-code');

    modal.val('');
    modal2.val('');

    $('#modal_pr_availability_code2').find('.code').val('');
  });

  $(document).on('click', '.btn-remove_obligation', function(e){
    let row = $(this).closest('tr');
    let id = $(this).data('source_id');
    let code = row.find('td:eq(4)').html();

    let modal = $('#modal_delete_obligation');
    let modal_sourceID = modal.find('#cform-source_id');
    let modal_sourceCode = modal.find('#cform-source_code');
    let modal_sourceCodeTxt = modal.find('#source_code');

    modal_sourceID.val(id);
    modal_sourceCode.val(code);
    modal_sourceCodeTxt.html(code);
  })

  $(document).on('click', '.btn-return', function(e){
    let row = $(this).closest('tr');
    let id = $(this).data('id');
    let code = $(this).data('ors_num');

    let modal = $('#modal_return_obligation');
    let modal_sourceID = modal.find('#cform-id');
    let modal_sourceCodeTxt = modal.find('#source_code');

    modal_sourceID.val(id);
    modal_sourceCodeTxt.html(code);

    $('#modal_return_obligation').modal('show');
  })

  $(document).on('click', '#btn-advance_search', function(){
    let val = $(this).val();
    
    if (val == 'close') {
      $('.filter_buttons').removeClass('hidden');
      $(this).val('open');
      $(this).find('i').toggleClass('fa-search-plus fa-search-minus');
      $('.filter_buttons').show(1000);
      $('.filter_buttons').addClass('fadeInDown');
    } else {
      // $('.filter_buttons').addClass('hidden');
      $(this).val('close');
      $(this).find('i').toggleClass('fa-search-minus fa-search-plus');
      $('.filter_buttons').hide(1000);
      $('.filter_buttons').removeClass('fadeInDown');
    }
  });

  // Add event listener for opening and closing details
  $('#example2 tbody').on('click', 'td.details-control', function () {

      var tr = $(this).closest('tr');
      var row = table.row( tr );
      let tdf = tr.find('td:first');

      tdf.html('');

      if ( row.child.isShown() ) {
          // This row is already open - close it
          row.child.hide();
          tdf.append('<a type="button" class="btn btn-xs btn-primary" style="border-radius:50%"><span class="fa fa-plus"></span></a>');
          tr.removeClass('shown');
      }
      else {
          // Open this row
          row.child( format(row.data()) ).show();
          tdf.append('<a type="button" class="btn btn-cirle btn-xs btn-primary" style="border-radius:50%"><span class="fa fa-minus"></span></a>');
          tr.addClass('shown');
          row.child().css('background-color', '#b4b4b4');
      }
  } );


</script>