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
          <i class="fa fa-search-plus"></i> Filter
        </button>
      </div>

      <div class="btn-group">
        <a href="budget_create_obligation.php" id="btn-advance_search" value="close" class="btn btn-block btn-primary btn-sm">
          <i class="fa fa-plus"></i> Create
        </a>
      </div>
    </div>
    <table id="example2" class="table table-bordered table-striped" role="grid">
      <thead>
        <tr>
          <th>Date Received</th>
          <th>Date Obligated</th>
          <th>Date Returned</th>
          <th>Date Released</th>
          <th>ORS Number</th>
          <th>PO Number</th>
          <th>Payee</th>
          <th>Particular</th>
          <th>Amount</th>
          <th>Remarks</th>
          <th>Status</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($ors_data as $key => $ors): ?>
          <tr>
            <td>
              <?php if (!empty($ors['date_received']) AND ($ors['date_received'] != '0000-00-00')): ?>
                <a class="btn btn-primary btn-xs" href="entity/post_received_ors.php?id='<?= $ors['id']; ?>'&stat=1">Received</a>
              <?php else: ?>
                <i><b><?= $ors['received_by']; ?></b></i><br><?= $ors['datereceived']; ?>      
              <?php endif ?>    
            </td>
            <td><?= $ors['date_obligated']; ?></td>
            <td>
              <?php if (!empty($ors['date_returned']) AND ($ors['date_returned'] != '0000-00-00')): ?>
                <!-- <a class="btn btn-primary btn-xs" href="entity/post_received_ors.php?id='<?= $ors['id']; ?>'&stat=1">Received</a> -->
                <button  data-id="<?= $ors['id']; ?>" type="button" class="btn btn-xs btn-danger btn-return"  data-target="#exampleModal"> Return </button>
              <?php else: ?>
                jkjh
              <?php endif ?>  
            </td>
            <td><?= $ors['date_released']; ?></td>
            <td><?= $ors['ors']; ?></td>
            <td><?= $ors['ponum']; ?></td>
            <td><?= $ors['payee']; ?></td>
            <td><?= $ors['particular']; ?></td>
            <td><?= $ors['amount']; ?></td>
            <td><?= $ors['remarks']; ?></td>
            <td><?= $ors['status']; ?></td>
            <td>
              <div class="btn-group">
                <a href="CreateObligation.php?id=<?= $po['id']; ?>&stat=1" class="btn btn-success btn-sm btn-view" title="Process"> <i class="fa fa-check-square"></i></a> 
                
              </div>
              <a href="CreateObligation.php?id=<?= $po['id']; ?>&stat=1" class="btn btn-danger btn-sm btn-view" title="Process"> <i class="fa fa-trash"></i></a> 
            </td>
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