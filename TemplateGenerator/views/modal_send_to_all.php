<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModal_modalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document" style="width: 40%;">
    <div class="modal-content modal-dialog-centered" style="border-radius: 5px;">
      

        <!-- action="ActivityPlanner/entity/save_subtasks.php" -->
    
        <div class="row">  
          <div class="col-md-12">
            <br>
            <!-- CUSTOM BLOCKQUOTE -->
            <blockquote class="blockquote blockquote-custom bg-white p-5 shadow rounded">
                <div class="blockquote-custom-icon-task bg-info shadow-sm">
                  <i class="fa fa-tasks text-white" style="font-size: 38pt;"></i>
                </div>

                <form id="add-task-form">
                <div class="col-md-12 pull-right" style="position: absolute; top: 7px; left: -7%;">
                  <div class="row">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                    
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="row" style="margin-bottom: 3%;  border-bottom: 1px solid lightgray;">
                    <h2 class="text-center" style="color:#346e8c;"><b>EMAIL ATTACHMENT</b></h2>
                  </div>
                </div>

                <div class="row" style="font-size:14px;">
                  <i>
                  <ul>
                    <li> make sure that internet connection is stable to avoid interruption.</li>
                    <li> page will reload automatically once sending of attachments are complete.</li>
                    <li> do not close/reload this page while sending of attachments is on going.</li>
                  </ul>
                  </i>
                </div>


                <div class="progress_tracker" style="margin-bottom: 1%;">
                  <b><span class="progress_tracker_txt"></span></b>
                </div>

                <div id="progressbar" style="text-align: center;">
                  <div class="progress-label hidden">Loading...</div>
                  <div class="progress-label2"></div>
                </div>
                
                </form>


                <hr>
                <div class="row">
                  
                  <div class="col-md-6">
                    <button type="button" class="btn btn-secondary btn-lg btn-block btn-cancel_task" data-dismiss="modal"><span class="fa fa-close"></span> Cancel</button>
                  </div>
                  
                  <div class="col-md-6">
                    <button type="button" class="btn btn-primary btn-lg btn-block btn-add-task" id="start-send_email" name="submit" value=""><span class="fa fa-send"></span> Start</button>
                  </div>
                </div>
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

