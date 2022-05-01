<div class="col-md-12">
  <div class="box box-warning dropbox">
    <div class="box-body">
      <form id="cform-details" method="POST" enctype="multipart/form-data">
        <div class="row">
          <div class="col-md-3">
            <?php echo group_daterange3('Date', 'timeline', 'timeline', '', '', 'daterange ', 1, false); ?>
          </div>
        </div>

        <div class="row">
          <div class="col-md-3">
            <div class="form-group attendee">
              <label>File:</label>
              <div class="input-group">
                <label class="input-group-btn">
                  <span class="btn btn-primary">
                    Browse&hellip; <input type="file" name="uploadfile" id="uploadfile" style="display: none;">
                  </span>
                </label>
                <input type="text" id="uploadtxt" class="form-control" readonly>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12">
            <div class="btn-group">
              <button type="submit" class="btn btn-primary btn-generate"><i class="fa fa-filter"></i> Generate</button>
            </div>

            <div class="btn-group">
              <a href="javascript:void(0);" class="btn btn-default btn-clear"><i class="fa fa-refresh"></i> Clear</a>
            </div>
            
          </div>
        </div>
      </form>
    </div>
  </div>
</div>