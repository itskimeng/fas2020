<div class="box box-widget widget-user dropbox">
  <div class="widget-user-header bg-aqua-active">
    <h3 class="widget-user-username"><?php echo $data['opr']; ?></h3>
    <h5 class="widget-user-desc"><?php echo !empty($data['opr']) ? 'OPR' : ''; ?></h5>
  </div>
  <div class="widget-user-image">
    <img class="img-circle" src="images/logo.png" alt="User Avatar">
  </div>
  <div class="box-footer">
    <div class="row">
      <div class="col-sm-12">
        <div class="description-block">
          <h5 class="description-header">"<?php echo $data['activity_title']; ?>"</h5>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="info-box dropbox">
  <div class="box-header with-border">
    <h3 class="box-title">Activity Details</h3>
  </div>
  <div class="box-body">
    <strong><i class="fa fa-calendar-times-o margin-r-5"></i>Activity Date</strong>
    <p class="text-muted">
      <?php echo $dates; ?>
    </p>
    <hr>
    <strong><i class="fa fa-map-marker margin-r-5"></i>Activity Venue</strong>
    <p class="text-muted">
      <?php echo $data['activity_venue']; ?>
    </p>
    <hr>
    <strong><i class="fa fa-calendar-times-o margin-r-5"></i>Issued Date</strong>
    <p class="text-muted">
      <?php echo $data['date_given']; ?>
    </p>
    <hr>
    <strong><i class="fa fa-calendar-times-o margin-r-5"></i>Issued Place</strong>
    <p class="text-muted">
      <?php echo $data['place']; ?>
    </p>
  </div>
</div>