<?php 
  // include('macro.html.php'); 
  include('../../fas/ActivityMonitoring/entity/Constants.php');

  $path = $_SERVER['DOCUMENT_ROOT'];
  $path .= '/fas/ActivityPlanner/controller/ActivityMonitoringController.php';

  require_once($path);
?>


<div class="modal fade" id="edit_modal" tabindex="-1" role="dialog" aria-labelledby="edit_modalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content activity_content">
      <div class="modal-header activity_header" style="background-color: #f6cdd0;">
        
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <div id="cdropzone" class="form-group" style="text-align:center">
          <div class="col-md-12 image_container">
            <div id="real-container">
              <img src="images/logo.png" id="cform-profile" class="avatar" style="width: 150px; height: 150px; border-radius:90px"/>
            </div>  
            <!-- title -->
            <br>
            <label id="cform-host"></label>
            <br>
            <label>Host</label>
          </div>
        </div>  
      </div>
      <form method="POST" action="../../fas/ActivityPlanner/entity/update_event.php" >
        <div class="modal-body">
            <!-- input hidden -->
            <?php echo group_input_hidden('event_id', ''); ?>
            <?php echo group_input_hidden('emp_id', ''); ?>
            <!-- title -->
            <?php echo group_text('Code','event_code','', '',1, true,'event_code'); ?>
            <!-- title -->
            <?php echo group_text('Title','title','', '',1, false,'title'); ?>
            <!-- description -->
            <?php echo group_textarea('Description','description',''); ?>
            <!-- target participants -->
            <?php echo group_text('Target Participants','target_participants','', '',1, false,'target_participants'); ?>
            <!-- status -->
            <?php echo group_text('Status','act_status','', 'disabled', 1,false,'act_status'); ?>
            


            <!-- Date and time range -->
              <div class="form-group">
                <input type="hidden" id="cform-date_from" name="date_from"
               value="">
                <input type="hidden" id="cform-date_to" name="date_to"
               value="">
                <label>Activity Timeline:</label>
                <div class="input-group">
                  <button type="button" class="btn btn-default pull-right" id="daterange-btn">
                    <span>
                      <i class="fa fa-calendar"></i> Date range picker


                    </span>
                    <i class="fa fa-caret-down"></i>
                  </button>
                </div>
              </div>
              
            <!-- participants -->
            <?php echo group_selectmulti('Collaborators', 'collaborators', fetchEmployees1()); ?>
          
            <!-- priority -->
            <?php echo group_rateme('Priority','priority',''); ?>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" name="save_changes" class="btn btn-primary" onClick="closeEditModal()">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>

