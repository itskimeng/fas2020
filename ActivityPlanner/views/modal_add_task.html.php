<div class="modal fade" id="modal-add_task" tabindex="-1" role="dialog" aria-labelledby="modal-add_task_modalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document" style="width: 30%;">
    <div class="modal-content modal-dialog-centered" style="border-radius: 5px;">
      

      <form method="POST" action="ActivityPlanner/entity/save_subtasks.php" >
    
        <div class="row">  
          <div class="col-md-12">
            <br>
            <!-- CUSTOM BLOCKQUOTE -->
            <blockquote class="blockquote blockquote-custom bg-white p-5 shadow rounded">
                <div class="blockquote-custom-icon-task bg-info shadow-sm">
                  <i class="fa fa-tasks text-white" style="font-size: 38pt;"></i>
                </div>

                <div class="col-md-12">
                  <div class="row" style="margin-bottom: 3%;  border-bottom: 1px solid lightgray;">
                    <h2 class="text-center" style="color:#346e8c;"><b>ADD TASK</b></h2>
                  </div>
                </div>
                
                <?php echo input_hidden('event_id','event_id', 'event_id', $_GET['event_planner_id']); ?>
                <?php echo input_hidden('event_program','event_program', 'event_program', $event_data['event_program']); ?>
                <?php echo input_hidden('current_user','current_user', 'current_user', $event_data['current_user']); ?>

                <!-- <?php //echo group_text('Title','subtask','', '',1, false,''); ?> -->
                <?php echo group_textarea('Title', 'subtask', '', 2, true); ?>
                <?php echo group_select('Person','person',$collaborators, '','', 1, false, 1); ?>
                <?php echo group_daterange3('Timeline', 'timeline', 'timeline', '', '', 'daterange ', 1, false); ?>


                <hr>
                <div class="row">
                  
                  <div class="col-md-6">
                    <button type="button" class="btn btn-secondary btn-lg btn-block" data-dismiss="modal"><span class="fa fa-close"></span> Cancel</button>
                  </div>
                  
                  <div class="col-md-6">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" name="submit" value=""><span class="fa fa-save"></span> Save Changes</button>
                  </div>
                </div>
            </blockquote><!-- END -->
            
          </div>
        </div>
      
      </form>
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

