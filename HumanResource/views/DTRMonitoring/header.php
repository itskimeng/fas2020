<div class="col-md-12">
  <div class="box box-warning dropbox">
    <div class="box-header">
      <h5>Information</h5>
    </div>
    <div class="box-body">
      <div class="row">
          <div class="col-md-3">
            <?= group_select('Office', 'office', $office_opts, '', 'office', 1, $is_readonly); ?>
          </div>
      </div>
      <div class="row">
          <div class="col-md-3">
            <?= group_date2('Date Today', 'date_today', 'date_today', '', 'date_today'); ?>
          </div>
      </div>
    </div>
  </div>
</div>