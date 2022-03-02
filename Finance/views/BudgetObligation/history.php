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
                    <tr style="color: white; background-color: #0c486a;">
                      <th class="text-center">DATE</th>
                      <th class="text-center">USER</th>
                      <th class="text-center">MENU</th>
                      <th class="text-center">ACTION</th>
                      <th class="text-center">REMARKS</th>
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
                        <td style="vertical-align: bottom; text-align: center;">
                          <?= ucfirst($his['action']); ?>
                        </td>
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

<style type="text/css">
  
</style>