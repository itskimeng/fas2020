<?php 
  require_once 'ActivityPlanner/controller/ActivityMonitoringController.php';
?>


<div class="modal fade" id="edit_modal" tabindex="-1" role="dialog" aria-labelledby="edit_modalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document" style="width: 30%;">
    <div class="modal-content modal-dialog-centered activity_content">

      <div class="box box-widget widget-user card-custom">
            <div class="widget-user-header bg-aqua-active card-custom-img" style="background-image: url(http://res.cloudinary.com/d3/image/upload/c_scale,q_auto:good,w_1110/trianglify-v1-cs85g_cc5d2i.jpg);">      
                  <div class="col-md-12 pull-right" style="top: 35px; text-align: right;">
                    <div class="row">
                        <h3 id="cform-host" class="widget-user-username"></h3>
                        <h5 class="widget-user-desc">Host</h5>
                    </div>
                </div>
            </div>
            <div class="widget-user-image" style="width: 130px; height: 130px;">
              <img class="img-circle custom-profile" id="cform-profile" src="images/logo.png" alt="User Avatar">
            </div>
            <div class="box-footer">
              <form method="POST" action="ActivityPlanner/entity/update_event.php" >
        
                <div class="col-md-12">
                    <!-- input hidden -->
                    <?php echo group_input_hidden('event_id', ''); ?>
                    <?php echo group_input_hidden('emp_id', ''); ?>
                    <!-- title -->
                    <?php echo group_text('Code','event_code','', '',1, true,'event_code'); ?>
                    <!-- title -->
                    <?php echo group_text('Title','title','', '',1, false,'title'); ?>
                    
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
                    <!-- description -->
                    <?php echo group_textarea('Description','description',''); ?>

                    <!-- target participants -->
                    <?php echo group_text('Target Participants','target_participants','', '',1, false,'target_participants'); ?>
                    <!-- status -->
                    <?php echo group_text('Status','act_status','', 'disabled', 1,false,'act_status'); ?>  
                    
                    <!-- participants -->
                    <?php echo group_selectmulti('Collaborators', 'collaborators', $emp_opt); ?>
                  
                    <!-- priority -->
                    <?php echo group_rateme('Priority','priority',''); ?>
                    
                    <div class="row">
                      <div class="col-md-12">
                        <hr>
                      </div>
                    </div>

                    <div class="row pull-right">
                      <div class="col-md-12">
                        <div class="btn-group">
                          <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-chevron-left"></i> Close</button>
                        </div>
                        <div class="btn-group">  
                          <button type="submit" name="save_changes" class="btn btn-primary" onClick="closeEditModal()"><i class="fa fa-save"></i> Save Changes</button>
                        </div>
                        
                      </div>
                      
                    </div>
                </div>
              </form>
              
            </div>
      </div> 
    </div>
  </div>
</div>

<style type="text/css">

  img {
      max-width: 100%;
      max-height: 100%;
  }

  .custom-profile {
    height: 100% !important;
    width: 100% !important;
    object-fit: cover;
  }


  .widget-user .widget-user-image {
    position: absolute;
    top: 32px;
    left: 12%;
    margin-left: -45px;
}

  .card-custom {
  overflow: hidden;
  min-height: 450px;
  box-shadow: 0 0 15px rgba(10, 10, 10, 0.3);
}

.card-custom-img {
  height: 200px;
  min-height: 139px;
  background-repeat: no-repeat;
  background-size: cover;
  background-position: center;
  border-color: inherit;
}

/* First border-left-width setting is a fallback */
.card-custom-img::after {
  position: absolute;
  content: '';
  top: 100px;
  left: 0;
  width: 0;
  height: 0;
  border-style: solid;
  border-top-width: 40px;
  border-right-width: 0;
  border-bottom-width: 0;
  border-left-width: 545px;
  border-left-width: calc(575px - 5vw);
  border-top-color: transparent;
  border-right-color: transparent;
  border-bottom-color: transparent;
  border-left-color: inherit;
}

</style>

