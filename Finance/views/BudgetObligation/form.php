<?php require_once 'Finance/controller/ObligationController.php'; ?>

<?php 
  function group_customselect2($label, $name, $options, $value, $class, $sel_type, $label_size=1, $readonly=false, $body_size=1, $required=true) {
    $element = '<div id="cgroup-'.$name.'" class="form-group">';
    if ($label_size > 0) {
      $element .= '<label class=" control-label">'.$label.':</label><br>';
    }

      if ($readonly) {
       $element .= '<select id="cform-'.$name.'" name="'.$name.'" class="form-control select2 '.$class.'" data-placeholder="-- Select '.$label.' --" disabled style="width: 100%;">';
      } else {
         $element .= '<select id="cform-'.$name.'" name="'.$name.'" class="form-control select2 '.$class.'" data-placeholder="-- Select '.$label.' --" required="'.$required.'" style="width: 100%;">'; 
      }

      $element .= group_customoptions2($options, $value, $label);

      $element .= '</select>';
    $element .= '<input type="hidden" id="hidden-'.$name.'" name="hidden-'.$name.'" value="'.$value.'" />';
    $element .= '</div>';

    return $element;
  }

  function group_customoptions2($fields, $selected, $label) {
      $element = '<option disabled selected>-- Please select '.$label.' --</option>';
      foreach ($fields as $key=>$value) {
          if ($key == $selected) {
              $element .= '<option value="'.$value['id'].'" data-ppa="'.$value['ppa'].'" selected="selected">'.$value['source_no'].'</option>';
          } else {
              $element .= '<option value="'.$value['id'].'" data-ppa="'.$value['ppa'].'">'.$value['source_no'].'</option>';
          }
      }

      return $element;
  }

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
              $element .= '<option value="'.$key.'" data-amount="'.$value['po_amount'].'" data-supplier="'.$value['supp_id'].'" data-creator="'.$value['username'].'"  selected="selected">'.$value['po'].'</option>';
          } else {
              $element .= '<option value="'.$key.'" data-amount="'.$value['po_amount'].'" data-supplier="'.$value['supp_id'].'" data-creator="'.$value['username'].'" data-pr="'.$value['pr_id'].'">'.$value['po'].'</option>';
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
    <form id="ob-form" method="POST" action="<?= $route ?>">
      <div class="row">
        <?php include 'information.php'; ?>
      </div>
      <div class="row">
        <?php if ($is_admin and !$is_readonly) : ?>
          <?php include 'entries.php'; ?>
        <?php elseif ($is_admin and in_array($data['status'], ['Released for PO', 'Released'])) : ?>
          <?php include 'entries.php'; ?>
        <?php endif ?>
      </div>
    </form>
    <section>
</div>

<?php include 'modal_return_edit.php'; ?>

<style type="text/css">
  .dropbox {
    box-shadow: 0 1px 2px rgb(0 0 0 / 50%);
  }

  .custom-tb-header {
    background-color: #a0cfea !important;
  }

  .delete_modal_header {
    text-align: center;
    background-color: #f15e5e;
    color: white;
    padding: 5% !important;
    border-top-left-radius: 4px;
    border-top-right-radius: 4px;
  }

  * {
    box-sizing: border-box;
  }

  .fade-scale {
    transform: scale(0);
    opacity: 0;
    -webkit-transition: all .25s linear;
    -o-transition: all .25s linear;
    transition: all .25s linear;
  }

  .fade-scale.in {
    opacity: 1;
    transform: scale(1);
  }

  .switchToggle input[type=checkbox] {
    height: 0;
    width: 0;
    visibility: hidden;
    position: absolute;
  }

  .switchToggle label {
    cursor: pointer;
    text-indent: -99999px;
    width: 70px;
    max-width: 60px;
    height: 25px;
    background: #d1d1d1;
    /*display: block; */
    border-radius: 100px;
    position: relative;
  }

  .switchToggle label:after {
    content: '';
    position: absolute;
    top: 2px;
    left: 2px;
    width: 20px;
    height: 20px;
    background: #fff;
    border-radius: 90px;
    transition: 0.3s;
  }

  .switchToggle input:checked+label,
  .switchToggle input:checked+input+label {
    background: #3e98d3;
  }

  .switchToggle input+label:before,
  .switchToggle input+input+label:before {
    content: 'No';
    position: absolute;
    top: 3px;
    left: 35px;
    width: 26px;
    height: 26px;
    border-radius: 90px;
    transition: 0.3s;
    text-indent: 0;
    color: #fff;
  }


  .switchToggle input:checked+label:before,
  .switchToggle input:checked+input+label:before {
    content: 'Yes';
    position: absolute;
    top: 3px;
    left: 10px;
    width: 26px;
    height: 26px;
    border-radius: 90px;
    transition: 0.3s;
    text-indent: 0;
    color: #fff;
  }

  .switchToggle input:checked+label:after,
  .switchToggle input:checked+input+label:after {
    left: calc(100% - 2px);
    transform: translateX(-100%);
  }

  .switchToggle label:active:after {
    width: 60px;
  }

  .toggle-switchArea {
    margin: 10px 0 10px 0;
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
    let total_amount = 0;
    $('#box-entries tr').each(function(e) {
      let amount = $(this).find('.amount_hidden').val();
      total_amount = parseFloat(total_amount) + parseFloat(amount);
    });

    total_amount = format_number(total_amount);
    console.log(total_amount);
    $('#cform-total_amount').val(total_amount);
  }

  function generateObEntries() {
    let el = '<tr>';
    el += '<td>';
    el += '<?= group_customselect2('Fund Source', 'fund_source[]', $fund_sources, '', 'fund_source', 0, 0); ?>';
    el += '</td>';
    el += '<td>';
    el += '<?= group_textnew('MFO/PPA', 'ppa[]', '', 'ppa', true, 0); ?>';
    el += '</td>';
    el += '<td>';
    el += '<?= group_select('UACS Object Code', 'uacs[]', '', '', 'uacs', 0); ?>';
    el += '</td>';
    el += '<td>';
    el += '<?= group_amount('Amount', 'amount[]', 0.00, 'entry_amount', false, 0); ?>';
    el += '<?= group_input_hidden('amount_hidden[] amount_hidden', 0.00); ?>';
    el += '<?= group_input_hidden('amount_limit[] amount_limit', 0.00); ?>';
    el += '</td>';
    el += '<td>';
    el += '<button type="button" class="btn btn-danger btn-block btn-row_remove"><i class="fa fa-close"></i> Remove</button>';
    el += '</td>';
    el += '</tr>';

    $('#box-entries').prepend(el);
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
    echo 'toastr.' . $_SESSION['toastr']['type'] . '("' . $_SESSION['toastr']['message'] . '", "' . $_SESSION['toastr']['title'] . '")';
    unset($_SESSION['toastr']);
  }
  ?>

  // $('.select2').select2();
  $('.select2').select2({
    allowClear: true,
    width: '100%'
  });

  $(document).ready(function(){
    $(document).on('keypress', '.amount, .entry_amount', function (event) {
      return isNumber(event, this)
    });
  })

  $('.info-dates').datepicker({
    autoclose: true
  })

  $("#ob-form").submit(function(e) {
    let po_amount = $('#cform-total_po_amount').val();
    let total_amount = $('#cform-total_amount').val();
    let status = $('#cform-status').val();
    let is_admin = $('#cform-is_admin').val();
    let dfunds = $('.dfunds').is(':checked');

    if (dfunds) {
      if (status != 'Submitted') {
        if (is_admin) {
          if (po_amount != total_amount) {
            toastr.warning('PO Amount and Total should be equal!', 'Alert')
            return false;
          }
        }
      }
    }
  });

  $(document).on('click', '.btn-return', function(el) {
    $('#modal_return_edit_obligation').modal('show');
  });

  $(document).on('change', '.po_no', function(e) {
    let po = $(this).val();
    let pr_id = $(this).find(':selected').data('pr');
    let amount = $(this).find(':selected').data('amount');
    let supp = $(this).find(':selected').data('supplier');
    let pr_creator = $(this).find(':selected').data('creator');

    if (po != null) {
      $('.amount').val(format_number(amount));
      $('#cform-po_amount').val(amount);
      $('#cform-supplier').val(supp);
      $('#hidden-supplier').val(supp);
      $('#cform-pr_id').val(pr_id);
      $('.pr_creator').val(pr_creator);

      $('.amount').attr('readonly', 'readonly');
      $('#cform-supplier').attr('readonly', 'readonly');
      $('#cform-supplier').attr('disabled', true);

      $('.po_no').attr('required', 'required');
    } else {
      $('#hidden-po_no').val('');
      $('.amount').val(0.00);
      $('#cform-po_amount').val(0.00);
      $('#cform-supplier').val('');
      $('#hidden-supplier').val('');

      $('.amount').attr('readonly', false);
      $('#cform-supplier').attr('readonly', false);
      $('#cform-supplier').removeAttr('disabled');
      $('.po_no').removeAttr('required');
      $('.amount').removeAttr('readonly');
      $('#cform-supplier').removeAttr('readonly');
    }

    $('#cform-supplier').trigger('change');
  })

  $(document).on('change', '.supplier', function(e) {
    let address = $(this).find(':selected').data('address');
    $('.address').val(address);
  })

  $(document).on('change', '.fund_source', function(e) {
    let row = $(this).closest('tr');
    let fs = $(this).val();
    let ppa = $(this).find(':selected').data('ppa');
    row.find('.ppa').val(ppa);
    let field_uacs = row.find('.uacs');
    field_uacs.empty();

    let path = 'Finance/route/generate_uacs.php?fs=' + fs;

    $.get(path, function(item, success) {
      let $data = JSON.parse(item);

      let opt = '<option value="" selected disabled>-- Please select UACS Object Code ---</option>';
      $.each($data, function(i, b) {
        opt += '<option value="' + i + '" data-amount="' + b.balance + '">' + b.code + '</option>';
      });

      field_uacs.append(opt);
    })
  })

  $(document).on('change', '.amount', function(e) {
    let row = $(this).closest('tr');
    let amt = $(this).val();

    amt = format_replace(amt);

    $(this).val(format_number(amt))
    computeTotal();
  });

  $(document).on('change', '.entry_amount', function(e){
    let row = $(this).closest('tr');
    let amt = $(this).val();
    let limit = row.find('.amount_limit').val();
    let uacs = row.find('.uacs option:selected').text();

    amt = format_replace(amt);
    limit = parseFloat(format_replace(limit));

    if (amt > limit) {
      amt = limit;
      toastr.warning('You have reached the limit amount of <b>' + format_number(limit) + '</b>', uacs + '<i class="fa fa-exclamation"></i>');
    }

    row.find('.amount_hidden').val(amt);
    $(this).val(format_number(amt))
    computeTotal();
  });

  $(document).on('change', '.uacs', function(e) {
    let uacs = $(this).find(':selected').data('amount');
    let row = $(this).closest('tr');

    row.find('.amount_hidden').val(uacs);
    row.find('.amount_limit').val(uacs);

    row.find('.entry_amount').val(format_number(uacs));
    computeTotal();
  });

  $(document).on('click', '.btn-generate', function(e) {
    let obtype = $('.ob_type').val();
    let dfunds = $('.dfunds').is(':checked');

    if (obtype != null) {
      generateObEntries();
      $('.btn-save').removeClass('hidden');
    } else {
      toastr.warning('Please select an <b>Obligation Type</b>.', 'Oops<i class="fa fa-exclamation"></i>');
    }

  });

  $(document).on('click', '.btn-row_remove', function(e) {
    let row = $(this).closest('tr');
    row.remove();
    computeTotal();
  })

  $(document).on('click', '.dfunds', function(e) {
    let dfund = $(this).is(':checked');
    let opt = '<option value="" selected disabled>-- Please select Payee ---</option>';

    $('#cform-supplier').empty();
    $('#cform-address').val('');

    if (dfund) {
      $('.btn-generate').removeClass('hidden');

      let huc_opts = '<?= json_encode($huc_opts); ?>';
      huc_opts = JSON.parse(huc_opts);

      $.each(huc_opts, function(i, b) {
        opt += '<option value="' + i + '" data-address="' + b.address + '">' + b.name + '</option>';
      });
    } else {
      $('.btn-generate').addClass('hidden');
      $('#box-entries').empty();

      let huc_opts = <?= json_encode(json_encode($supplier_opts)); ?>;
      huc_opts = JSON.parse(huc_opts);

      $.each(huc_opts, function(i, b) {
        opt += '<option value="' + i + '" data-address="' + b.address + '">' + b.name + '</option>';
      });
    }



    $('#cform-supplier').append(opt);
    $('#cform-supplier').select2();

    computeTotal();
  })

</script>