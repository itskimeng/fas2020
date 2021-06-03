<div class="active tab-pane" id="workspace">
  <form method="POST" action="ActivityPlanner/entity/save_subtasks.php">
      
      <div class="box-header">
        
        <div class="row">
          <div class="col-md-12">
            <div class="btn-group">
              <?php if ($is_opr OR in_array('add', $access_list)): ?>
                <button type="button" class="btn btn-block btn-primary btn-modal-add_task" data-toggle="modal" data-target="#modal-add_task"><i class="fa fa-plus"></i> Add Task</button>
              <?php endif ?>
            </div>
          </div>
          
        </div>
      </div>

      <div class="box-body box-profile">
        
        <div class="row"> 
          <div class="col-md-12">
            <?php echo input_hidden('event_id','event_id', 'event_id', $_GET['event_planner_id']); ?>
            <?php echo input_hidden('event_program','event_program', 'event_program', $event_data['event_program']); ?>
            <?php echo input_hidden('current_user','current_user', 'current_user', $event_data['current_user']); ?>

            <table id="list_table" class="table table-striped table-bordered table-responsive table-hover" role="grid">
              <thead style="background-color: #007a95;">
                <tr style="height: 60px;">
                  <th style = "text-align:center; vertical-align: middle; color:white; background-color: #007a95; border-left: none; border-top-left-radius: 4px; -webkit-border-top-left-radius: 4px; -moz-border-radius-topleft: 4px; width: 14%;">
                    Code
                  </th>
                  <th style = "text-align:center; vertical-align: middle; width:16%; color:white">Task</th>
                  <th style = "text-align:center; vertical-align: middle; width:11%; color:white">Collaborator</th>
                  <th style = "text-align:center; vertical-align: middle; width:10%; color:white">Status</th>
                  <th style = "text-align:center; vertical-align: middle; width:5%; color:white">Rev.</th>
                  <th style = "text-align:center; vertical-align: middle; width:15%; color:white">Timeline</th>
                  <th style = "text-align:center; vertical-align: middle; width:15%; color:white">Progress Date</th>
                  <th style = "text-align:center; vertical-align: middle;color:white; border-right: none; border-top-right-radius: 4px; -webkit-border-top-right-radius: 4px; -moz-border-radius-topright: 4px;">Actions</th>         
                </tr>
                
              </thead>
              <tbody id="task_tbody" style="overflow-x: scroll;">
                  
                <?php foreach ($subtasks as $key=>$subtask): ?>
                  <tr data-details="<?php echo $subtasks_json; ?>">  
                    <td style="font-size: 13.5px;"><?php echo $subtask['task_code']; ?></td>
                    <td style="font-size: 13.5px;">
                      <?php echo input_hidden('task_code', 'task_code[]', 'task_code', $subtask['task_code']); ?>
                      
                      <?php echo input_hidden('task_id', 'task_id[]', 'task_id', $subtask['task_id']); ?>
                      <?php echo input_hidden('is_new', 'is_new[]', 'is_new', $subtask['is_new']); ?>
                      <?php echo input_hidden('task_status', 'task_status[]', 'task_status', $subtask['status']); ?>
                      
                      <input type="hidden" id="cform-comment" name="comment[]" class="comment" value='<?php echo $subtask["comments"]; ?>'>
                      
                      <?php echo $subtask['title']; ?>
                    </td>
                    <td style="font-size: 13.5px;">  
                      <?php echo $subtask['person']; ?>
                    </td>
                    <td class="text-center" style="font-size: 13.5px;">
                        <div class="status-<?php echo $subtask['status']; ?>" style="border-radius: 4px; color:white; font-size:11px;">
                          <?php if ($subtask['status'] == "forchecking"): ?>
                            For Checking
                          <?php else: ?>
                            <?php echo $subtask['status'] != 'created' ? ucfirst($subtask['status']) : 'To Do'; ?>
                          <?php endif ?>
                        </div>
                    </td>
                    <td style="text-align: center; color:red;">
                      <b><?php echo $subtask['task_counter']; ?></b>
                    </td>
                    <td>

                      <table class="table-bordered">
                        <tbody>
                          <tr>
                            <td class="text-center">
                              <b>From</b>
                            </td>
                          </tr>
                          <tr>
                            <td style="font-size: 12.5px;"><?php echo $subtask['date_from']; ?></td>
                          </tr>
                          <tr>
                            <td class="text-center">
                              <b>To</b>
                            </td>
                          </tr>
                          <tr>
                            <td style="font-size: 12.5px;"><?php echo $subtask['date_to']; ?></td>
                          </tr>
                        </tbody>
                      </table>
                    </td>
                    <td>
                      <?php if (!empty($subtask['date_start'])): ?>
                        <table class="table-bordered">
                          <tbody>
                            <tr>
                              <td class="text-center">
                                <b>Start</b>
                              </td>
                            </tr>
                            <tr>
                              <td style="font-size: 12.5px;"><?php echo $subtask['date_start']; ?></td>
                            </tr>
                            <?php if (!empty($subtask['date_end'])): ?>
                              <tr>
                                <td class="text-center">
                                  <b>End</b>
                                </td>
                              </tr>
                              <tr>
                                <td style="font-size: 12.5px;"><?php echo $subtask['date_end']; ?></td>
                              </tr>
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
                              <div class="btn-group">
                                <a class="btn btn-app btn-remove_subtask" value="remove" title="Remove">
                                  <i class="fa fa-trash-o"></i>
                                </a>
                              </div>
                            <?php endif ?>

                          <?php endif ?>  

                          <?php if ($is_opr OR in_array('todo', $access_list)): ?>
                            <?php if ($subtask['status'] == "draft"): ?>
                              <div class="btn-group">
                                <a class="btn btn-app btn-app_submit btn-start_subtask" value="created" title="Start">
                                  <i class="fa fa-play-circle-o"></i>
                                </a>
                              </div>
                            <?php endif?>
                          <?php endif ?>

                          <?php if ($is_opr OR in_array('approve', $access_list)): ?>
                            <?php if ($subtask['status'] == "forchecking"): ?>
                              <div class="btn-group">
                                <a class="btn btn-app btn-app_submit btn-pause_subtask" value="disapprove" data-toggle="tooltip" title="Disapprove">
                                  <i class="fa fa-thumbs-o-down"></i>
                                </a>
                              </div>

                              <div class="btn-group">
                                <a class="btn btn-app btn-app_submit btn-stop_subtask" value="done" data-toggle="tooltip" title="Approve">
                                  <i class="fa fa-thumbs-o-up"></i>
                                </a>
                              </div>

                            <?php endif?>
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
  </form> 
</div>

<style type="text/css">
  #list_table {
    box-shadow: 0 1px 2px rgb(0 0 0 / 15%);
  }
</style>