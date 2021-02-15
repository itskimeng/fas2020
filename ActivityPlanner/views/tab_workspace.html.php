<div class="active tab-pane" id="workspace">
  <form method="POST" action="../../fas/ActivityPlanner/entity/save_subtasks.php">
      <div class="box-body box-profile">
        
        <div class="row">
          <div class="form-group col-md-2">
            <button type="button" class="btn btn-block btn-primary btn-primary-addtask">Add Task</button>
          </div>
        </div>
        <div class="row" style="min-height: 532px !important;"> 
          <div class="col-md-12">
            <?php echo input_hidden('event_id','event_id', 'event_id', $_GET['event_planner_id']); ?>
            <?php echo input_hidden('event_program','event_program', 'event_program', $event_data['event_program']); ?>
            <?php echo input_hidden('current_user','current_user', 'current_user', $event_data['current_user']); ?>

            <table id="task_table" class="table table-bordered table-striped table-responsive">
              <thead style="background-color: gray" class="text-center">
                <tr> 

                  <th style="width:12%; color:white">Code</th>
                  <th style="width:22%; color:white">Title</th>
                  <th style="width:11%; color:white">Person</th>
                  <th style="width:10%; color:white">Status</th>
                  <th style="width:13%; color:white">Timeline</th>
                  <th style="width:11%; color:white">Start Date</th>
                  <th style="width:12%; color:white"></th>

                </tr>
              </thead>
              <tbody id="task_tbody" style="overflow-x: scroll;">
                  
                <?php foreach ($subtasks as $key=>$subtask): ?>
                  <tr>  
                    <td><?php echo $subtask['task_code']; ?></td>
                    <td>
                      <?php echo input_hidden('task_id', 'task_id[]', 'task_id', $subtask['task_id']); ?>
                      <?php echo input_hidden('is_new', 'is_new[]', 'is_new', $subtask['is_new']); ?>
                      <?php echo input_hidden('task_status', 'task_status[]', 'task_status', $subtask['status']); ?>
                      
                      <input type="hidden" id="cform-comment" name="comment[]" class="comment" value='<?php echo $subtask["comments"]; ?>'>

                      <?php if ($subtask['status'] == 'done'): ?>
                        <?php echo $subtask['title']; ?>
                        <?php echo input_hidden('subtask', 'subtask[]', 'subtask', $subtask['title']); ?>
                      <?php else: ?>  
                        <?php echo group_text('Title','subtask[]',$subtask['title'], '',0, $subtask['is_readonly'],''); ?>
                      <?php endif ?>
                    </td>
                    <td>
                      <?php if ($subtask['is_readonly']): ?>
                        <?php foreach ($collaborators as $key => $value): ?>
                          <?php if ($key == $subtask['emp_id']): ?>
                            <?php echo $value; ?>
                            <input type="hidden" id="cform-person" name="person[]" class="person" value="<?php echo $subtask['emp_id']; ?>">
                          <?php endif ?>
                        <?php endforeach ?>
                      <?php else: ?>
                        <?php echo group_select('Person','person[]',$collaborators, $subtask['emp_id'],'', 0, $subtask['is_readonly']); ?>
                      <?php endif ?>
                    </td>
                    <td style="text-align: center">
                        <div class="status-<?php echo $subtask['status']; ?>" style="border-radius: 4px; color:white">
                          <?php if ($subtask['status'] == "forchecking"): ?>
                            For Checking
                          <?php else: ?>
                            <?php echo $subtask['status'] != 'created' ? ucfirst($subtask['status']) : ''; ?>
                          <?php endif ?>

                        </div>
                      </p>
                    </td>
                    <td>
                      <?php if ($subtask['status'] == 'done'): ?>
                        <?php echo input_hidden('timeline', 'timeline[]', 'timeline', $subtask['date_from'] .'-'. $subtask['date_to']); ?>  

                        <?php echo $subtask['date_from']; ?><br>
                        <?php echo $subtask['date_to']; ?>
                      <?php else: ?>  
                        <?php echo group_daterange3('Timeline', 'timeline', 'timeline[]', $subtask['date_from'], $subtask['date_to'], 'daterange ', 0, $subtask['is_readonly']); ?>
                      <?php endif ?>
                    </td>
                    <td>
                      <?php echo $subtask['date_start']; ?><br>
                      <?php echo $subtask['date_end']; ?>
                    </td>
                    <td>
                      <div class="row" style="margin-top:-10px;">

                        <div class="margin">
                            <?php if ($subtask['status'] != "started" AND $subtask['status'] != "ongoing" AND ($subtask['status']) != "done" AND $subtask['status'] != "forchecking"): ?>
                              <div class="btn-group">
                                <a class="btn btn-app btn-remove_subtask" value="remove" title="Remove">
                                  <i class="fa fa-trash-o"></i>
                                </a>
                              </div>
                            <?php endif ?>

                            <?php if ($subtask['status'] == "draft"): ?>
                              <div class="btn-group">
                                <a class="btn btn-app btn-app_submit btn-start_subtask" value="created" title="Start">
                                  <i class="fa fa-play-circle-o"></i>
                                </a>
                              </div>
                            <?php endif?>

                            <?php if ($subtask['status'] == "forchecking"): ?>
                              <div class="btn-group">
                                <a class="btn btn-app btn-app_submit btn-pause_subtask" value="disapprove" data-toggle="tooltip" title="Disapprove">
                                  <i class="fa fa-pause-circle-o"></i>
                                </a>
                              </div>

                              <div class="btn-group">
                                <a class="btn btn-app btn-app_submit btn-stop_subtask" value="done" data-toggle="tooltip" title="Approve">
                                  <i class="fa fa-stop-circle-o"></i>
                                </a>
                              </div>

                            <?php endif?>

                            <div class="btn-group">
                              <a class="btn btn-app btn-app_comment" data-toggle="modal" data-target="#modal-comment" value="disapprove" data-toggle="tooltip" title="Notes">
                                <i class="fa fa-sticky-note-o"></i>
                              </a>
                            </div>

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
        <div class="row pull-right">
            <div class="margin">
              
              <div class="btn-group">
                <a href="../fas/base_menu.html.php?division=<?php echo $_SESSION["division"];?>" class="btn btn-block btn-default">Back</a>
              </div>

              <div class="btn-group">
                <button type="submit" name="submit" value="" class="btn btn-block btn-primary" id="submit_btn">Save</button>  
              </div>
              
            </div>
        </div>
      </div>
  </form> 
</div>