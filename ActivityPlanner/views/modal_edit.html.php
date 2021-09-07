<?php 
  require_once 'ActivityPlanner/controller/ActivityMonitoringController.php';
?>


<div class="modal fade" id="edit_modal" tabindex="-1" role="dialog" aria-labelledby="edit_modalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document" style="width: 30%;">
    <div class="modal-content modal-dialog-centered activity_content">

      <div class="box box-widget widget-user card-custom">
            <div class="widget-user-header bg-aqua-active card-custom-img" style="background-image: url(http://res.cloudinary.com/d3/image/upload/c_scale,q_auto:good,w_1110/trianglify-v1-cs85g_cc5d2i.jpg);">      
              <div class="col-md-12 pull-right" style="top: -11px;">
                <div class="row">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  
                </div>
              </div>
              <div class="col-md-12 pull-right" style="top: 16px; text-align: right;">
                <div class="row">
                    <h3 id="cform-host" class="widget-user-username"></h3>
                    <h5 class="widget-user-desc">Host</h5>
                </div>
              </div>
            </div>

            <div class="widget-user-image" style="width: 130px; height: 130px;">
              <img class="img-circle custom-profile" id="cform-profile" src="images/logo.png" alt="User Avatar">
            </div>

            <div class="col-md-12">
              <div class="widget">
                <div class="widget-content pull-right">
                    <ul class="widget-cohost-list">
                        
                    </ul>
                </div>
              </div>
            </div>  

            <div class="box-footer">
              <form id="activity-edit_form" method="POST" action="ActivityPlanner/entity/update_event.php" >
        
                <div class="col-md-12">
                  <!-- input hidden -->
                  <?php echo group_input_hidden('event_id', ''); ?>
                  <?php echo group_input_hidden('emp_id', ''); ?>
                  <!-- title -->
                  <?php echo group_text('Code','event_code','', '',1, true,'event_code'); ?>
                  <!-- title -->
                  <?php //echo group_text('Title','title','', '',1, false,'title'); ?>
                  <?php echo group_textarea('Title', 'title', '', 1, true); ?>

                  
                  <!-- Date and time range -->
                  <div class="form-group">
                    <input type="hidden" id="cform-date_from" name="date_from"
                   value="">
                    <input type="hidden" id="cform-date_to" name="date_to"
                   value="">
                    <label>Activity Timeline:</label>
                    <div class="input-group">
                      <button type="button" class="btn btn-default pull-right daterange" id="daterange-btn">
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
                  <!-- <?php //echo group_text('Target Participants','target_participants','', '',1, false,'target_participants'); ?> -->

                  <!-- participants -->
                  <?php echo group_selectmulti('Target Participants', 'tgt_participants', 'tgt_participants', $participants_opt); ?>

                  <!-- status -->
                  <?php echo group_text('Status','act_status','', 'disabled', 1,false,'act_status'); ?>  
                  
                  <!-- participants -->
                  <?php echo group_selectmulti('Collaborators', 'collaborators', 'collaborators', $emp_opt); ?>
                
                  <!-- priority -->
                  <?php echo group_rateme('Priority','priority',''); ?>
                  
                  <hr>
                </div>
                <div class="col-md-12">
                  <div class="row">
                    
                    <div class="col-md-6">
                      <button type="button" class="btn btn-lg btn-default btn-block" data-dismiss="modal"><i class="fa fa-chevron-left"></i> Close</button>
                    </div>
                    
                    <div class="col-md-6">
                      <button type="submit" name="save_changes" class="btn btn-lg btn-primary btn-block" onClick="closeEditModal()"><i class="fa fa-save"></i> Save Changes</button>
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

#cform-priority_label {
  padding-top: 3%;
}


.widget {
    background: #fff;
    /*margin-bottom: .75rem;
    display: block;
    position: relative;
    margin-top:40px;*/
}
.widget-cohost-list > li {
    display: inline-block;
}
.widget-cohost-list {
    padding: 0;
    list-style-type: none;
}
.widget-cohost-list {
    margin: 0;
    white-space: nowrap;
    overflow: hidden;
}
.widget-cohost-list > li + li {
    margin-left: -1.125rem;
}
.widget-cohost-list > li a {
    display: block;
    border: 0.125rem solid #fff;
    overflow: hidden;
    width: 4.25rem;
    height: 4.25rem;
    margin-bottom: -0.3125rem;
    line-height: 3.5rem;
    text-align: center;
    text-decoration: none;
    -webkit-border-radius: 2.25rem;
    -moz-border-radius: 2.25rem;
    border-radius: 2.25rem;
}
.widget-cohost-list > li a img {
    display: block;
    max-width: 100%;
}
.widget-cohost-list > li.number a {
    background: #c7c7cc;
    color: #fff;
}
.widget-content, .widget-footer {
    padding-right: .8rem;
    background: #fff;
    position: relative;
}

</style>

<script type="text/javascript">
  $(document).ready(function(){

    // $('#activity-edit_form').on('submit', function(e){
      // validation code here
      // console.log('qweqwe');
      // if(!valid) {
        // e.preventDefault();
      // } else {
        // e.preventDefault();
      // }
    // });

  })
</script>

