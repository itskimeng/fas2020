<div class="active tab-pane" id="workspace">
  <div class="box-header">  
    <div class="row">
      
      <div class="col-md-1">
        <div class="btn-group">
          <?php if ($is_opr OR in_array('add', $access_list)): ?>
            <button type="button" class="btn btn-block btn-primary btn-modal-add_task" data-toggle="modal" data-target="#modal-add_task"><i class="fa fa-plus"></i> Add Task</button>
          <?php endif ?>
        </div>
      </div>

      <div class="col-md-10" style="right: -3%;">
        <div class="pull-right advance-box">
          
          <div class="btn-group">
            <?php if ($is_opr OR in_array('add', $access_list)): ?>
              <button type="button" class="btn btn-block btn-danger btn-advance_actns" data-action="remove"><i class="fa fa-trash-o"></i> Remove Selected</button>
            <?php endif ?>
          </div>
            
          <div class="btn-group">
            <?php if ($is_opr OR in_array('add', $access_list)): ?>
              <button type="button" class="btn btn-block btn-success btn-advance_actns" data-action="start"><i class="fa fa-play-circle-o"></i> Start Selected</button>
            <?php endif ?>
          </div>

          <div class="btn-group">
            <?php if ($is_opr OR in_array('add', $access_list)): ?>
              <button type="button" class="btn btn-block btn-warning btn-advance_actns" data-action="disapprove"><i class="fa fa-thumbs-down"></i> Disapprove Selected</button>
            <?php endif ?>
          </div>

          <div class="btn-group">
            <?php if ($is_opr OR in_array('add', $access_list)): ?>
              <button type="button" class="btn btn-block btn-success btn-advance_actns" data-action="approve"><i class="fa fa-thumbs-o-up"></i> Approve Selected</button>
            <?php endif ?>
          </div>

        </div>
      </div>

      <div class="col-md-1">
        <div class="pull-right">
          
          <div class="btn-group">
            <?php if ($is_opr OR in_array('add', $access_list)): ?>
              <button type="button" class="btn btn-block btn-default show-advance-btn slide-left" title="Show Advance Buttons" data-value="hidden"><i class="fa fa-gear"></i> </button>
            <?php endif ?>
          </div>
        
        </div>
      </div>
    
    </div>
  </div>

  <div class="box-body box-profile">      
    <form id="advance-form">
      <div class="row"> 
        <div class="col-md-12">
          <?php echo input_hidden('event_id','event_id', 'event_id', $_GET['event_planner_id']); ?>
          <?php echo input_hidden('event_program','event_program', 'event_program', $event_data['event_program']); ?>
          <?php echo input_hidden('current_user','current_user', 'current_user', $event_data['current_user']); ?>

          <table id="list_table" class="table table-striped table-bordered table-responsive table-hover" role="grid">
            <thead style="background-color: #007a95;">
              <tr style="height: 60px;">
                <th style = "text-align:center; vertical-align: middle; width:18%; color:white">Code & Task</th>
                <th style = "text-align:center; vertical-align: middle; width:15%; color:white">Collaborators</th>
                <th style = "text-align:center; vertical-align: middle; width:11%; color:white">Status</th>
                <th style = "text-align:center; vertical-align: middle; width:7%; color:white">Rev.<br>Count</th>
                <th style = "text-align:center; vertical-align: middle; width:16%; color:white">Timeline</th>
                <th style = "text-align:center; vertical-align: middle; width:16%; color:white">Progress Dates</th>
                <th style = "text-align:center; vertical-align: middle;color:white; border-right: none; border-top-right-radius: 4px; -webkit-border-top-right-radius: 4px; -moz-border-radius-topright: 4px;">Actions</th>         
              </tr>
              
            </thead>
            <tbody id="task_tbody" style="overflow-x: scroll;">
                
              <?php foreach ($subtasks as $key=>$subtask): ?>
                <tr data-details="<?php echo $subtasks_json; ?>">
                  <td style="font-size: 13.5px;">
                    <?php echo input_hidden('task_code', 'task_code[]', 'task_code', $subtask['task_code']); ?>
                    <?php echo input_hidden('task_id', 'task_id[]', 'task_id', $subtask['task_id']); ?>
                    <?php echo input_hidden('is_new', 'is_new['.$subtask['task_id'].']', 'is_new', $subtask['is_new']); ?>
                    <?php echo input_hidden('task_status', 'task_status['.$subtask['task_id'].']', 'task_status', $subtask['status']); ?>
                    
                    <input type="hidden" id="cform-comment" name="comment[]" class="comment" value='<?php echo $subtask["comments"]; ?>'>

                    <div class="row">
                      <div class="col-md-2" style="margin-right: -13px; z-index: 999;">
                        <?php if ($subtask['status'] != 'done' AND $subtask['status'] != 'ongoing'): ?>
                          <?php echo group_input_checkbox('actn_checker', 'actn_checker', 'actn_checker['.$subtask['task_id'].']', 'actn_checker', '', 0, 2); ?>
                        <?php endif ?>
                      </div>
                      <div class="col-md-10">
                        <b><?php echo $subtask['task_code']; ?></b><br>
                        <?php echo $subtask['title']; ?>
                      </div>
                    </div>
                  </td>
                  <td style="font-size: 13.5px;"><?php echo $subtask['person']; ?></td>
                  <td class="text-center" style="font-size: 13.5px;">
                    <div class="status-<?php echo $subtask['status']; ?>" style="border-radius: 4px; color:white; font-size:11px;">
                      <?php if ($subtask['status'] == "forchecking"): ?>
                        For Checking
                      <?php else: ?>
                        <?php echo $subtask['status'] != 'created' ? ucfirst($subtask['status']) : 'To Do'; ?>
                      <?php endif ?>
                    </div>
                  </td>
                  <td style="text-align: center; color:red;"><b><?php echo $subtask['task_counter']; ?></b></td>
                  <td>
                    <table class="table-bordered">
                      <tbody>
                        <tr><td class="text-center"><b>From</b></td></tr>
                        <tr><td style="font-size: 13.5px;"><?php echo $subtask['date_from']; ?></td></tr>
                        <tr><td class="text-center"><b>To</b></td></tr>
                        <tr><td style="font-size: 13.5px;"><?php echo $subtask['date_to']; ?></td></tr>
                      </tbody>
                    </table>
                  </td>
                  <td>
                    <?php if (!empty($subtask['date_start'])): ?>
                      <table class="table-bordered">
                        <tbody>
                          <tr><td class="text-center"><b>Start</b></td></tr>
                          <tr><td style="font-size: 13.5px;"><?php echo $subtask['date_start']; ?></td></tr>
                          <?php if (!empty($subtask['date_end'])): ?>
                            <tr><td class="text-center"><b>End</b></td></tr>
                            <tr><td style="font-size: 13.5px;"><?php echo $subtask['date_end']; ?></td></tr>
                          <?php endif?>
                        </tbody>
                      </table>
                    <?php endif ?>
                  </td>
                  <td>
                    <div class="row" style="margin-top:-10px;">

                      <div class="margin">
                        <?php if ($is_opr OR in_array('edit', $access_list)): ?>

                          <?php if ($subtask['status'] != "started" AND $subtask['status'] != "ongoing" AND ($subtask['status']) != "done" AND $subtask['status'] != "forchecking"): ?>
                            <div class="btn-group">
                              <a class="btn btn-app btn-edit_task" value="edit" title="Edit" data-toggle="modal" data-target="#modal-edit_task">
                                <i class="fa fa-edit"></i>
                              </a>
                            </div>
                          <?php endif ?>

                        <?php endif ?>  

                        <?php if ($is_opr OR in_array('delete', $access_list)): ?>

                          <?php if ($subtask['status'] != "started" AND $subtask['status'] != "ongoing" AND ($subtask['status']) != "done" AND $subtask['status'] != "forchecking"): ?>
                          <?php endif ?>

                        <?php endif ?>   

                        <?php if ($is_opr OR in_array('post', $access_list)): ?>
                          <div class="btn-group">
                            <a class="btn btn-app btn-app_comment" data-toggle="modal" data-target="#modal-comment" value="disapprove" data-toggle="tooltip" title="Notes">
                              <i class="fa fa-sticky-note-o"></i>
                            </a>
                          </div>
                        <?php endif ?>

                        <?php if ($is_opr): ?>
                          <div class="btn-group">
                            <a class="btn btn-app btn-upload_docs" value="upload" title="Upload">
                              <i class="fa fa-link"></i>
                            </a>
                          </div>
                        <?php else: ?>
                          <?php if (!empty($subtask['external_link'])): ?>
                            <div class="btn-group">
                              <a href="<?php echo $subtask['external_link']; ?>" class="btn btn-app btn-open-exlink" value="open_link" title="Open Link">
                                <i class="fa fa-external-link"></i>
                              </a>
                            </div>
                          <?php endif ?>
                        <?php endif ?>


                        </div>  
                      
                    </div>
                  </td>
                </tr>
                
              <?php endforeach ?>

            </tbody>
          </table>
          <br>
        </div>
      </div>
    </form>
  </div>
  <div class="box-footer">
    <div class="col-md-12">
      <div class="row pull-right">
            
        <div class="btn-group">
          <a href="base_activity_planner.html.php?division=<?php echo $_SESSION["division"];?>" class="btn btn-block btn-default"><i class="fa fa-angle-left"></i> Back</a>
        </div>

      </div>
    </div>
  </div>

</div>

<style type="text/css">
  #list_table {
    box-shadow: 0 1px 2px rgb(0 0 0 / 15%);
  }

  .advance-box{
        /*float:left;*/
        overflow: hidden;
        display: none;
        /*background: #f0e68c;*/
    }
    /* Add padding and border to inner content
    for better animation effect */
    .advance-box-inner{
        /*width: 400px;*/
        /*padding: 10px;*/
        /*border: 1px solid #a29415;*/
    }
</style>