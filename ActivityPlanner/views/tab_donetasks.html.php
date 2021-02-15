<div class="tab-pane" id="donetasks">
  <!-- <form method="POST" action="../../fas/ActivityPlanner/entity/save_subtasks.php"> -->
    <!-- <div class="box box-primary"> -->
      <div class="box-body box-profile">
        
        <div class="row">
          <!-- <div class="form-group col-md-2">
          <button type="button" class="btn btn-block btn-primary btn-primary-addtask">Add Task</button>
          </div> -->
        </div>
        <div class="row" style="min-height: 538px !important;"> 
          <div class="col-md-12">
            <?php echo input_hidden('event_id','event_id', 'event_id', $_GET['event_planner_id']); ?>
            <table id="task_table" class="table table-bordered table-striped table-responsive" >
              <thead style="background-color: gray" class="text-center">
                <tr> 
                  <!-- <th style="width:1%"></th> -->
                  <th style="width:25%; color:white">Title</th>
                  <th style="width:16%; color:white">Person</th>
                  <th style="width:12%; color:white">Status</th>
                  <th style="width:18%; color:white">Timeline</th>
                  <th style="width:15%; color:white">Start Date</th>
                  <!-- <th style="width:10%; color:white"></th> -->

                </tr>
              </thead>
              <tbody id="task_tbody">

                <?php if (count($subtasks_done) > 0): ?>
                  <?php foreach ($subtasks_done as $key=>$subtask): ?>
                    <tr>  
                      <!-- <td class="status-<?php //echo $subtask['status']; ?>"></td> -->
                      <td>
                        <?php echo input_hidden('task_id', 'task_id[]', 'task_id', $subtask['task_id']); ?>
                        <?php echo input_hidden('is_new', 'is_new[]', 'is_new', $subtask['is_new']); ?>
                        
                        <?php echo group_text('Title','subtask[]',$subtask['title'], '',0, false,''); ?>
                      </td>
                      <td>
                        <?php echo group_select('Person','person[]',$collaborators, $subtask['emp_id'],'', 0); ?>
                      </td>
                      <td style="text-align: center">
                        <!-- <div> -->
                          <div class="status-<?php echo $subtask['status']; ?>" style="border-radius: 4px; color:white">
                            <?php echo $subtask['status'] != '' ? ucfirst($subtask['status']) : ''; ?>
                          </div>
                        <!-- </div> -->
                                
                          
                        </p>
                      </td>
                      <td>
                        <?php echo group_daterange3('Timeline', 'timeline', 'timeline[]', $subtask['date_from'], $subtask['date_to'], 'daterange ', 0); ?>
                      </td>
                      <td>
                        <?php echo group_text('Start Date','subtask_start_date[]',$subtask['date_start'], '',0, 'true', ''); ?>
                      </td>
                      <!-- <td>
                        <div class="row">
                          <?php //if ($subtask['status'] != "started" AND $subtask['status'] != "ongoing" AND ($subtask['status']) != "done"): ?>
                            <a class="btn btn-app btn-remove_subtask" value="remove">
                              <i class="fa fa-trash-o"></i>
                            </a>
                          <?php //endif ?>

                          <?php ///if ($subtask['status'] == "" OR ($subtask['status']) == "paused" AND ($subtask['status']) != "ongoing"): ?>
                            <a class="btn btn-app btn-app_submit btn-start_subtask" value="ongoing">
                              <i class="fa fa-play-circle-o"></i>
                            </a>
                          <?php ///endif?>

                          <?php //if ($subtask['status'] == "started" OR $subtask['status'] == "ongoing"): ?>

                            <a class="btn btn-app btn-app_submit btn-pause_subtask" value="paused">
                              <i class="fa fa-pause-circle-o"></i>
                            </a>
                            <a class="btn btn-app btn-app_submit btn-stop_subtask" value="done">
                              <i class="fa fa-stop-circle-o"></i>
                            </a>

                          <?php //endif?>

                        </div>
                      </td> -->
                    </tr>
                  <?php endforeach ?>
                  <?php else: ?>
                    <tr>
                      <td class="text-center" colspan="5">No data to be displayed</td>
                    </tr>
                  <?php endif ?>

              </tbody>
            </table>
            <br>
          </div>
        </div>
      </div>
      <div class="box-footer">
        <div class="row pull-right">
          <div class="col-md-12">
            <!-- <a href="../fas/base_menu.html.php?division=<?php //echo $_SESSION["division"];?>" class="btn  default">Cancel</a> -->
            <!-- <button type="submit" name="submit" value="" class="btn blue" id="submit_btn">Save</button> -->
            
          </div>
        </div>
      </div>
    <!-- </div> -->
  <!-- </form>  -->
</div>