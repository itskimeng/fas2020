<div class="modal fade" id="modal-edit_task" tabindex="-1" role="dialog" aria-labelledby="modal-edit_task_modalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document" style="width: 30%;">
    <div class="modal-content modal-dialog-centered" style="border-radius: 5px;">
      
      
        <div class="row">  
          <div class="col-md-12">
            <br>
            <!-- CUSTOM BLOCKQUOTE -->
            <blockquote class="blockquote blockquote-custom bg-white p-5 shadow rounded">
                <div class="blockquote-custom-icon-task bg-info shadow-sm">
                  <i class="fa fa-edit text-white" style="font-size: 38pt;"></i>
                </div>

                <div class="col-md-12 pull-right" style="position: absolute; top: 7px; left: -7%;">
                  <div class="row">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                    
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="row" style="margin-bottom: 3%; border-bottom: 1px solid lightgray;">
                    <h2 class="text-center" style="color:#346e8c;"><b>EDIT TASK</b></h2>
                  </div>
                </div>

                <div class="tab-content">
                  
                  <div class="tab-pane fade active in" id="task">
                    <!-- <form method="POST" action="ActivityPlanner/entity/save_subtasks.php" > -->
                    <form id="edit-task-form">

                      <?php echo input_hidden('event_id','event_id', 'event_id', $_GET['event_planner_id']); ?>
                      <?php echo input_hidden('event_program','event_program', 'event_program', $event_data['event_program']); ?>
                      <?php echo input_hidden('current_user','current_user', 'current_user', $event_data['current_user']); ?>
                      <?php echo input_hidden('task_id','task_id', 'task_id', ''); ?>
                      
                      <?php echo group_text('Code','code','', '',1, true,''); ?>
                      <?php echo group_textarea('Task', 'subtask', '', 2, true); ?>

                      <?php echo group_daterange3('Timeline', 'timeline', 'timeline', '', '', 'daterange ', 1, false); ?>
                      <?php echo group_selectmulti_with_button('Collaborators', 'person', 'collaborators', $collaborators); ?>
                      
                    </form>
                      <hr>
                      <div class="row">
                        
                        <div class="col-md-6">
                          <button type="button" class="btn btn-secondary btn-lg btn-block" data-dismiss="modal"><span class="fa fa-close"></span> Cancel</button>
                        </div>
                        
                        <div class="col-md-6">
                          <button type="button" class="btn btn-primary btn-lg btn-block btn-update-task" name="submit" value=""><span class="fa fa-save"></span> Save Changes</button>
                        </div>
                      </div> 
                  </div>

                  <div class="tab-pane fade" id="notes">
                    
                  </div>

                </div>  
                
            </blockquote>
            
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
     left: 42%; 
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


