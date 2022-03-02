<div class="filter_buttons fadeInDown" style="display:none;">
  <div class="row">
    <div class="col-md-3">
        <?= group_select('Year', 'filter_year', [2020, 2021, 2022], '', 'filter_year', 1, false); ?>
    </div>
    <div class="col-md-3">
        <?= group_select('Month', 'filter_month', $month_opts, '', 'filter_month', 1, false); ?>
    </div>
    <div class="col-md-3">
        <?= group_select('Payee', 'filter_payee', $payee_opts, '', 'filter_payee', 1, false); ?>
    </div>
    <div class="col-md-3">
        <?= group_select('Status', 'filter_status', '', '', 'filter_status', 1, false); ?>
    </div>  
  </div>

  <div class="row">
    <div class="col-md-3">
        <?= group_select('ORS No.', 'filter_year', [2020, 2021, 2022], '', 'filter_year', 1, false); ?>
    </div>
    <div class="col-md-3">
        <?= group_date2('ORS Date', 'filter_ors_date', 'filter_ors_date', '', ''); ?>
    </div>
    <div class="col-md-3">
        <?= group_select('PO No.', 'filter_payee', $payee_opts, '', 'filter_payee', 1, false); ?>
    </div>
    <div class="col-md-3 text-right">
      <div class="form-group" style="margin-top:4px;">
        <br>
        <div class="btn-group">
          <button type="button" id="btn-advance_search" value="close" class="btn btn-block btn-secondary btn-sm"><i class="fa fa-refresh"></i> Clear</button>
        </div>

        <div class="btn-group">
          <button type="button" id="btn-advance_search" value="close" class="btn btn-block btn-primary btn-sm"><i class="fa fa-search-plus"></i> Filter</button>
        </div>
      </div>
    </div>
  </div>
  <hr>
</div>

<div style="position: absolute;">
  <div class="btn-group">
    <button type="button" id="btn-advance_search" value="close" class="btn btn-block btn-secondary btn-sm">
      <i class="fa fa-search-plus"></i> Advance Filter
    </button>
  </div>

  <div class="btn-group">
    <a href="budget_create_obligation.php?new" id="btn-advance_search" value="close" class="btn btn-block btn-primary btn-sm">
      <i class="fa fa-plus"></i> Create
    </a>
  </div>
</div>
<table id="example2" class="table table-bordered table-striped display">
  <thead>
    <tr style="color: white; background-color: #367fa9;">
      <th class="hidden"></th>
      <th style="color:#367fa9;"></th>
      <th class="text-center">Type</th>
      <th class="text-center">Date Created</th>
      <th class="text-center">Date Submitted</th>
      <th class="text-center">Serial Number</th>
      <th class="text-center">Payee</th>
      <th class="text-center">Particular</th>
      <th class="text-center">Amount</th>
      <th class="text-center">Status</th>
      <th class="text-center">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($ors_data['normal'] as $key => $ors): ?>
      <tr>
        <td class="hidden" style="vertical-align: middle;"><?php echo $ors['id']; ?></td>
        <td style="vertical-align: middle;"></td>
        <td><?= $ors['type']; ?></td>
        <td>
          <?= $ors['date_created']; ?><br><i><b>~<?= $ors['created_by']; ?>~</b></i>
        </td>
        <td>
          <?php if (empty($ors['date_submitted']) AND in_array($ors['status'], ['Draft', 'Returned'])): ?>
            <?php if ($ors['userid'] == $_SESSION['currentuser']): ?>
              <a href="Finance/route/update_obligation_status.php?id=<?= $ors['id']; ?>&status=Submitted" class="btn btn-sm btn-success"><i class="fa fa-upload"></i> Submit</a>
            <?php else: ?>
              ---
            <?php endif ?>
          <?php else: ?>
            <?= $ors['date_submitted']; ?><br><i><b>~<?= $ors['submitted_by']; ?>~</b></i>
          <?php endif ?>
        </td>
        <td><span class="badge bg-info"><?= $ors['serial_no']; ?></span></td>
        <td><?= $ors['supplier']; ?></td>
        <td><?= $ors['particular']; ?></td>
        <td><?= $ors['amount']; ?></td>
        <td><?= $ors['status']; ?></td>
        <td>
          <div class="btn-group">

            <a href="budget_obligation_edit.php?id=<?= $ors['id']; ?>" class="btn btn-success btn-sm btn-view" title="Edit"> <i class="fa fa-edit"></i></a>
            <a href="budget_obligation_history.php?id=<?= $ors['id']; ?>" class="btn btn-primary btn-sm btn-view" title="View Approval History"> <i class="fa fa-history"></i></a> 

          </div>
          <?php if ($ors['userid'] == $_SESSION['currentuser']): ?>
            <?php if (!in_array($ors['status'], ['Released', 'Submitted', 'Received', 'Obligated'])): ?>
              <div class="btn-group">
                <a type="button" class="btn btn-danger btn-sm btn-view btn-remove_obligation" data-toggle="modal" data-target="#modal_delete_obligation" data-source_id="<?= $ors['id']; ?>"><i class="fa fa-trash"></i></a>
              </div>
            <?php endif ?>
          <?php endif ?>
        </td>
        <td class="hidden">

          <?php if ($ors['status'] == 'Submitted' AND $is_admin): ?>
            <a href="Finance/route/update_obligation_status.php?id=<?= $ors['id']; ?>&status=Received" class="btn btn-primary btn-sm"><i class="fa fa-download"></i> Receive</a>
          <?php elseif (empty($ors['date_received']) AND $is_admin AND $ors['status'] == 'Submitted'): ?>
            <a href="Finance/route/update_obligation_status.php?id=<?= $ors['id']; ?>&status=Received" class="btn btn-primary btn-sm"><i class="fa fa-download"></i> Receive</a>
          <?php elseif (!empty($ors['date_received'])): ?>
            <?= $ors['date_received']; ?><br><i><b>~<?= $ors['received_by']; ?>~</b></i> 
          <?php elseif ($ors['status'] == 'Released' OR !empty($ors['date_received'])): ?>   
            <?= $ors['date_received']; ?><br><i><b>~<?= $ors['received_by']; ?>~</b></i> 
          <?php else: ?>
            ---     
          <?php endif ?>

        </td>
        <td class="hidden">
          <?php if ($ors['status'] == 'Received'): ?>
            <?php if (empty($ors['date_obligated']) AND $is_admin): ?>
              <a href="Finance/route/update_obligation_status.php?id=<?= $ors['id']; ?>&status=Obligated" class="btn btn-warning btn-sm"><i class="fa fa-check-square-o"></i> Obligate</a>
            <?php elseif (!empty($ors['date_obligated'])): ?>
              <?= $ors['date_obligated']; ?><br><i><b>~<?= $ors['obligated_by']; ?>~</b></i> 
            <?php else: ?>
              ---     
            <?php endif ?>
          <?php elseif ($ors['status'] == 'Released' OR !empty($ors['date_obligated'])): ?>
            <?= $ors['date_obligated']; ?><br><i><b>~<?= $ors['obligated_by']; ?>~</b></i> 
          <?php else: ?>
            ---     
          <?php endif ?>
        </td>
        <td class="hidden">
          <?php if (in_array($ors['status'], ['Submitted', 'Received', 'Obligated', 'Released'])): ?>
            <?php if (empty($ors['date_released']) AND empty($ors['date_returned']) AND $is_admin): ?>
                <a type="button" data-id="<?= $ors['id']; ?>" data-ors_num="<?= $ors['serial_no']; ?>" class="btn btn-sm btn-danger btn-return" data-target="#exampleModal"><i class="fa fa-reply"></i> Return</a>
            <?php elseif (!empty($ors['date_returned'])): ?>
              <?= $ors['date_returned']; ?><br><i><b>~<?= $ors['returned_by']; ?>~</b></i>
            <?php else: ?>
              ---
            <?php endif ?>
          <?php elseif ($ors['status'] == 'Returned'): ?>
            <?= $ors['date_returned']; ?><br><i><b>~<?= $ors['returned_by']; ?>~</b></i>
          <?php else: ?>
            ---
          <?php endif ?>
          
        </td>
        <td class="hidden">
          <?php if ($ors['status'] == 'Obligated'): ?>
            <?php if (empty($ors['date_released']) AND $is_admin): ?>
              <a href="Finance/route/update_obligation_status.php?id=<?= $ors['id']; ?>&status=Released" data-id="<?= $ors['id']; ?>" type="button" class="btn btn-sm btn-success btn-return" data-target="#exampleModal"><i class="fa fa-mail-forward"></i> Release</a>
            <?php elseif (!empty($ors['date_released'])): ?>
              <?= $ors['date_released']; ?><br><i><b>~<?= $ors['released_by']; ?>~</b></i>
            <?php else: ?>
              ---
            <?php endif ?>
          <?php elseif ($ors['status'] == 'Released'): ?>
            <?= $ors['date_released']; ?><br><i><b>~<?= $ors['released_by']; ?>~</b></i>
          <?php else: ?>
            ---
          <?php endif ?>   
        </td>
        <td class="hidden"><?= $ors['po_code']; ?></td>
        <td class="hidden"><?= $ors['remarks']; ?></td>
      </tr> 
    <?php endforeach ?>
  </tbody>
</table>