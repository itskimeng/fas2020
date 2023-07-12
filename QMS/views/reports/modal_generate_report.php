<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModal_modalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document" style="width: 40%;">
    <div class="modal-content modal-dialog-centered" style="border-radius: 5px;">
    
        <div class="row">  
          <div class="col-md-12">
            <br>
            <!-- CUSTOM BLOCKQUOTE -->
            <blockquote class="blockquote blockquote-custom bg-white p-5 shadow rounded">
                <form id="uploadForm" class="form">
                  <div class="blockquote-custom-icon-task bg-info shadow-sm">
                    <i class="fa fa-download text-white" style="font-size: 38pt;"></i>
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
                      <h2 class="text-center" style="color:#4cae4c;"><b>Generate Report</b></h2>
                    </div>
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
                      <label>Current Period: </label>
                    </div>
                    <div class="col-md-7">
                      <div class="form-group">
                        <input type="hidden" id="frequency" value="<?php echo count($currentperiod_opts); ?>">
                        <select id="cform-current_period" name="current_period" class="form-control select2 current_period" data-placeholder="-- Select Current Period --" required style="width:100%;" >
                          <option></option>
                          <?php foreach ($currentperiod_opts as $key => $opt): ?>
                            <option value="<?= $key; ?>" <?= ($qp_data['qp_covered_modal'] == $opt ? 'selected' : '') ?>><?= $opt; ?></option>
                          <?php endforeach ?>
                        </select>
                      </div>
                    </div>
                  </div>

                  <hr>

                  <div class="row">
                    <div class="col-md-6">
                      <button type="button" class="btn btn-secondary btn-md btn-block btn-cancel_task" data-dismiss="modal"><span class="fa fa-close"></span> Cancel</button>
                    </div>
                    
                    <div class="col-md-6">
                      <button type="submit" class="btn btn-success btn-md btn-block" value="Upload"><span class="fa fa-download"></span> Start</button>
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
    color: #4cae4c;

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

