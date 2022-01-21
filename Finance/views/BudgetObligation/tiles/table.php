<div class="box box-primary dropbox">
  <div class="box-header">
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
  </div>

  <div class="box-body">
    <div style="position: absolute;">
      <div class="btn-group">
        <button type="button" id="btn-advance_search" value="close" class="btn btn-block btn-secondary btn-sm">
          <i class="fa fa-search-plus"></i> Advance Filter
        </button>
      </div>

      <div class="btn-group">
        <a href="budget_create_obligation.php" id="btn-advance_search" value="close" class="btn btn-block btn-primary btn-sm">
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
          <th class="text-center">ORS Number</th>
          <th class="text-center">Payee</th>
          <th class="text-center">Particular</th>
          <th class="text-center">Amount</th>
          <th class="text-center">Status</th>
          <th class="text-center">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($ors_data as $key => $ors): ?>
          <tr>
            <td class="hidden" style="vertical-align: middle;"><?php echo $ors['id']; ?></td>
            <td style="vertical-align: middle;"></td>
            <td><?= $ors['type']; ?></td>
            <td>
              <?= $ors['date_created']; ?><br><i><b><?= $ors['created_by']; ?></b></i>
            </td>
            <td>
              <?php if (empty($ors['date_released'])): ?>
                <button  data-id="<?= $ors['id']; ?>" type="button" class="btn btn-sm btn-success btn-return" data-target="#exampleModal"><i class="fa fa-upload"></i> Submit</button>
              <?php else: ?>
                <?= $ors['date_submitted']; ?><br><i><b><?= $ors['submitted_by']; ?></b></i>
              <?php endif ?>
            </td>
            <td><?= $ors['serial_no']; ?></td>
            <td><?= $ors['supplier']; ?></td>
            <td><?= $ors['particular']; ?></td>
            <td><?= $ors['amount']; ?></td>
            <td><?= $ors['status']; ?></td>
            <td>
              <div class="btn-group">
                <a href="CreateObligation.php?id=<?= $po['id']; ?>&stat=1" class="btn btn-success btn-sm btn-view" title="Edit"> <i class="fa fa-edit"></i></a> 
                
              </div>
              <a href="CreateObligation.php?id=<?= $po['id']; ?>&stat=1" class="btn btn-danger btn-sm btn-view" title="Delete"> <i class="fa fa-trash"></i></a> 
            </td>
            <td class="hidden">
              <?php if (empty($ors['date_received'])): ?>
                <a class="btn btn-primary btn-sm" href="entity/post_received_ors.php?id='<?= $ors['id']; ?>'&stat=1"><i class="fa fa-download"></i> Receive</a>
              <?php else: ?>
                <i><b><?= $ors['received_by']; ?></b></i><br><?= $ors['date_received']; ?>      
              <?php endif ?>    
            </td>
            <td class="hidden">
              <?php if (empty($ors['date_obligated'])): ?>
                <a class="btn btn-warning btn-sm" href="entity/post_received_ors.php?id='<?= $ors['id']; ?>'&stat=1"><i class="fa fa-check-square-o"></i> Obligate</a>
              <?php else: ?>
                <i><b><?= $ors['obligated_by']; ?></b></i><br><?= $ors['date_obligated']; ?>      
              <?php endif ?>
            </td>
            <td class="hidden">
              <?php if (empty($ors['date_returned'])): ?>
                <button  data-id="<?= $ors['id']; ?>" type="button" class="btn btn-sm btn-danger btn-return" data-target="#exampleModal"><i class="fa fa-reply"></i> Return</button>
              <?php else: ?>
                <i><b><?= $ors['returned_by']; ?></b></i><br><?= $ors['date_returned']; ?>
              <?php endif ?>  
            </td>
            <td class="hidden">
              <?php if (empty($ors['date_released'])): ?>
                <button  data-id="<?= $ors['id']; ?>" type="button" class="btn btn-sm btn-success btn-return" data-target="#exampleModal"><i class="fa fa-mail-forward"></i> Release</button>
              <?php else: ?>
                <i><b><?= $ors['released_by']; ?></b></i><br><?= $ors['date_released']; ?>
              <?php endif ?>  
            </td>
            <td class="hidden"><?= $ors['po_code']; ?></td>
            <td class="hidden"><?= $ors['remarks']; ?></td>

          </tr> 



        <?php endforeach ?>
      </tbody>
      <tfoot>
        <!-- <tr>
          <th>Rendering engine</th>
          <th>Browser</th>
          <th>Platform(s)</th>
          <th>Engine version</th>
          <th>CSS grade</th>
        </tr> -->
      </tfoot>
    </table>
  </div>
</div>