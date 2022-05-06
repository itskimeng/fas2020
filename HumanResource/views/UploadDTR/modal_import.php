<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModal_modalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document" style="width: 40%;">
    <div class="modal-content modal-dialog-centered" style="border-radius: 5px;">
      

        <!-- action="ActivityPlanner/entity/save_subtasks.php" -->
    
        <div class="row">  
          <div class="col-md-12">
            <br>
            <!-- CUSTOM BLOCKQUOTE -->
            <blockquote class="blockquote blockquote-custom bg-white p-5 shadow rounded">
                <form id="uploadForm" class="form">
                  <div class="blockquote-custom-icon-task bg-info shadow-sm">
                    <i class="fa fa-upload text-white" style="font-size: 38pt;"></i>
                  </div>

                  <div class="col-md-12 pull-right" style="position: absolute; top: 7px; left: -7%;">
                    <div class="row">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="row" style="margin-bottom: 3%;  border-bottom: 1px solid lightgray;">
                      <h2 class="text-center" style="color:#346e8c;"><b>IMPORT DTR</b></h2>
                    </div>
                  </div>

                  <div class="row" style="font-size:14px;">
                    <i>
                    <ul>
                      <li> Make sure that internet connection is stable.</li>
                      <li> Do not close/reload this page while importing of dtr is on going to avoid interruption.</li>
                      <li> Page will reload automatically once uploading of dtr is complete.</li>
                      <li> Time of uploading will vary on the size of the file.</li>
                      <li> Please be patient while uploading is on going.</li>
                    </ul>
                    </i>
                  </div>

                  <hr>

                  <div class="progress_tracker" style="margin-bottom: 1%;">
                    <b><span class="progress_tracker_txt"></span></b>
                  </div>

                  <div id="progressbar" style="text-align: center;">
                    <div class="progress-label hidden">Loading...</div>
                    <div class="progress-label2"></div>
                  </div>
                    
                  <div class="row">
                    <div class="col-md-3">
                      <label>Date Range: </label>
                    </div>
                    <div class="col-md-7">
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon input-sm">
                            <i class="fa fa-calendar"></i> </div>
                            <input type="text" name="timeline" class="form-control pull-right timeline" placeholder="Please Select Date" value=" <?= date('m/d/Y'); ?> - <?= date('m/d/Y'); ?>" id="timeline">
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-3">
                      <label>File:</label>
                    </div>
                    <div class="col-md-7">
                      <div class="form-group attendee">
                        <div class="input-group">
                          <label class="input-group-btn">
                            <span class="btn btn-primary">
                              Browse&hellip; <input type="file" name="uploadfile" id="uploadfile" style="display: none;" required>
                            </span>
                          </label>
                          <input type="text" id="uploadtxt" class="form-control" readonly>
                        </div>
                      </div>
                    </div>
                  </div>
                  
                  <div class="row">
                    <div class="col-md-12">
                      <!-- Progress bar -->
                      <div class="progress-bar" id="progressBar" style="margin-bottom: 15px;">
                          <div class="progress-bar-fill">
                              <span class="progress-bar-text">0%</span>
                          </div>
                      </div>
                    </div>
                  </div>

                  <hr>

                  <div class="row">
                    <div class="col-md-6">
                      <button type="button" class="btn btn-secondary btn-md btn-block btn-cancel_task" data-dismiss="modal"><span class="fa fa-close"></span> Cancel</button>
                    </div>
                    
                    <div class="col-md-6">
                      <button type="submit" class="btn btn-primary btn-md btn-block" value="Upload"><span class="fa fa-upload"></span> Start</button>
                    </div>
                  </div>

                </form>

            </blockquote><!-- END -->
            
          </div>
        </div>
      
    </div>
  </div>
</div>

<style type="text/css">
  .modal-dialog {
  vertical-align: middle;
}
  /*
*
* ==========================================
* CUSTOM UTIL CLASSES
* ==========================================
*
*/
.blockquote {
    padding: 10px 20px;
    margin: 0 0 20px;
    font-size: 17.5px;
     border-left: 0px; 
}

.blockquote-custom-icon-task {
    width: 75px;
    height: 75px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    position: absolute;
    top: -18px;
    background-color: white;
    color: #346e8c;

     left: 44%; 
}



/*
*
* ==========================================
* FOR DEMO PURPOSES
* ==========================================
*
*/
body {
  background: #eff0eb;
  /*background-image: url('https://i.postimg.cc/MTbfnkj6/bg.png');*/
  background-size: cover;
  background-repeat: no-repeat;
}

.select2-container--default .select2-selection--multiple .select2-selection__choice {
    background-color: #3C8DBA !important;
    border-color: #367fa9 !important;
    padding: 1px 10px !important;
    color: #fff;
}

.select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
    color: #d8d6d6 !important;
}
  
</style>

