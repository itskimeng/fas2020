<div class="col-md-12">
  <div class="box box-warning dropbox">
    <div class="box-body">
      <div class="row">
        <div class="col-md-3">
          <?php echo group_daterange3('Date', 'timeline', 'timeline', '', '', 'daterange ', 1, false); ?>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <div class="btn-group">
            <a href="javascript:void(0);" class="btn btn-primary btn-filter"><i class="fa fa-filter"></i> Filter</a>
          </div>

          <div class="btn-group">
            <a href="javascript:void(0);" class="btn btn-default btn-clear"><i class="fa fa-refresh"></i> Clear</a>
          </div>

          <?php if ($is_admin): ?>
            <div class="btn-group">
              <a href="javascript:void(0);" class="btn btn-warning" disabled><i class="fa fa-download"></i> Export</a>
            </div>

            <div class="btn-group">
              <a href="budget_fundsource_create.php" class="btn btn-success"><i class="fa fa-download"></i> Create</a>
            </div>
          <?php endif ?>
        </div>
      </div>

    </div>
  </div>
</div>