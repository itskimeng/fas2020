<div class="modal fade" id="modal-edit_task" tabindex="-1" role="dialog" aria-labelledby="modal-edit_task_modalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content activity_content">
      <div class="modal-header activity_header" style="background-color: #f6cdd0;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4><i class="fa fa-gears"></i> Edit Task</h4>
      </div>
      <form method="POST" action="ActivityPlanner/entity/save_subtasks.php" >
        <div class="modal-body">

          <?php echo input_hidden('event_id','event_id', 'event_id', $_GET['event_planner_id']); ?>
          <?php echo input_hidden('event_program','event_program', 'event_program', $event_data['event_program']); ?>
          <?php echo input_hidden('current_user','current_user', 'current_user', $event_data['current_user']); ?>
          <?php echo input_hidden('task_id','task_id', 'task_id', ''); ?>
          
          <?php echo group_text('Code','code','', '',1, true,''); ?>
          <?php echo group_text('Title','subtask','', '',1, false,''); ?>
          <?php echo group_select('Person','person',$collaborators, '','', 1, false); ?>
          <?php echo group_daterange3('Timeline', 'timeline', 'timeline', '', '', 'daterange ', 1, false); ?>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" name="submit" value="" class="btn btn-primary" onClick="closeEditModal()">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>

