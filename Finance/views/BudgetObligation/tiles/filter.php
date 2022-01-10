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
              <button type="button" id="btn-advance_search" value="close" class="btn btn-block btn-secondary"><i class="fa fa-refresh"></i> Clear</button>
            </div>

            <div class="btn-group">
              <button type="button" id="btn-advance_search" value="close" class="btn btn-block btn-primary"><i class="fa fa-search-plus"></i> Filter</button>
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
        <button type="button" id="btn-advance_search" value="close" class="btn btn-block btn-secondary">
          <i class="fa fa-search-plus"></i> Advance Filter
        </button>
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
            <th><?= $ors['datereceived']; ?></th>
            <th><?= $ors['date_obligated']; ?></th>
            <th><?= $ors['date_returned']; ?></th>
            <th><?= $ors['date_released']; ?></th>
            <th><?= $ors['ors']; ?></th>
            <th><?= $ors['ponum']; ?></th>
            <th><?= $ors['payee']; ?></th>
            <th><?= $ors['particular']; ?></th>
            <th><?= $ors['amount']; ?></th>
            <th></th>
            <th></th>
            <th></th>
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