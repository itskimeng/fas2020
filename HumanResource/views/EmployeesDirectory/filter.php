<div class="col-md-12">
  <div class="box box-warning dropbox">
    <div class="box-header">
      <h4>Information</h4>
    </div>
    <div class="box-body">
      <form id="det_form" method="GET">
        <div class="row">
          <div class="col-md-4">
            <div class="row">
              <div class="col-md-10">
                <?= group_select2('Office', 'office', $office_opts, '', 'office'); ?>
              </div>
            </div>
          </div>

        </div>  

        <div class="row">
          <div class="col-md-12">
            <div class="btn-group">
              <button type="submit" class="btn btn-md btn-primary btn-block"><i class="fa fa-filter"></i> Filter</button>
            </div>

            <div class="btn-group">
              <button type="button" class="btn btn-md btn-warning btn-block btn-export" target="_blank"><i class="fa fa-download"></i> Export</button>
            </div>

            <div class="btn-group">
              <button type="button" class="btn btn-md btn-success btn-block btn-generate" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-download"></i> Generate</button>
            </div>

            <div class="btn-group">
              <a href="employees_directory.php" class="btn btn-md btn-default btn-block"><i class="fa fa-refresh" aria-hidden="true"></i> Clear</a>
            </div>
          </div>
        </div>
        

      </form>
      
    </div>
  </div>
</div>