<div class="modal fade" id="modal-conflict_details" tabindex="-1" role="dialog" aria-labelledby="modal-add_task_modalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document" style="width: 65%;">
    <div class="modal-content modal-dialog-centered" style="border-radius: 5px;">
        <div class="row">  
          <div class="col-md-12">
            <br>
            <!-- CUSTOM BLOCKQUOTE -->
            <blockquote class="blockquote blockquote-custom bg-white p-5 shadow rounded">
                <div class="blockquote-custom-icon-task bg-info shadow-sm">
                  <i class="fa fa-exclamation-circle text-white" style="font-size: 38pt;"></i>
                </div>
                <br>
                  <h4 class="box-title">
                  Conflict Schedule List<small style="color: #ff4700eb;">the selected schedule has multiple conflict detected.</small>
                  </h4>
                <table id="list_table" class="table table-striped table-bordered table-responsive table-hover" role="grid">
                  <thead style="background-color: #3e8fc9;">
                    <tr>
                      <th style="color:white; text-align:center; width:30%;">Event/Activity</th>
                      <th style="color:white; text-align:center; width:30%;">Task</th>
                      <th style="color:white; text-align:center;">Date Start</th>
                      <th style="color:white; text-align:center;">Date End</th>
                    </tr>
                  </thead>
                  <tbody id="conflict_body">
                    
                  </tbody>
                </table>  

                <hr>
                <div class="row">
                  
                  <div class="col-md-6">
                    <button type="button" class="btn btn-secondary btn-lg btn-block btn-cancel-task_with_con" data-dismiss="modal"><span class="fa fa-close"></span> Cancel</button>
                  </div>
                  
                  <div class="col-md-6">
                    <button type="button" class="btn btn-warning btn-lg btn-block btn-add-task_with_con" name="submit" value=""><span class="fa fa-arrow-circle-right"></span> Proceed</button>
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
  
</style>

