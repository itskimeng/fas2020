
    
    <div class="col-md-12">
        <form id="uploadForm" class="form">
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
                <div class="col-md-3">
                    <span id="download-progress-text"></span>
                </div>
            </div>


            <input type="submit" class="button" value="Upload"/>
        </form>

        <!-- Progress bar -->
        <div class="progress-bar" id="progressBar">
            <div class="progress-bar-fill">
                <span class="progress-bar-text">0%</span>
            </div>
        </div>
        
    </div>