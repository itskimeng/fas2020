<!-- <?php 
  //require_once '..\..\views\macro.html.php';
?> -->

<div class="col-md-2">
  <img class="profile-user-img img-responsive img-circle" src="images/logo.png" alt="User profile picture">
        <h6 class="text-center host_name"><b>Host</b></h6>
        
</div>
<div class="col-md-3">
  <!-- title -->
    <!-- <?php //echo group_text('Title','title','', '', 1, false,'title'); ?> -->
    <div id="cgroup-title" class="form-group">
      <label class="control-label">Title</label><br>
      <input id="cform-title" placeholder="Title" type="text" name="title" class="form-control title" value="" required novalidate />
    </div>  
    <!-- venue -->
    <!-- <?php //echo group_text('Venue','venue','', '', 1, false,'venue'); ?> -->
    <div id="cgroup-venue" class="form-group">
      <label class="control-label">Venue</label><br>
      <input id="cform-venue" placeholder="venue" type="text" name="venue" class="form-control venue" value="" required novalidate />
    </div>  
</div>
<div class="col-md-3">
  <!-- description -->
        <!-- <?php //echo group_textarea('Description','description',''); ?>  -->
        <div class="form-group">
          <label>Description</label>
          <textarea id="cform-description" name="description" class="form-control description" rows="3" placeholder="Description" required>
          </textarea>
        </div>  
</div>
<div class="col-md-3">
  <!-- title -->
    <!-- <?php //echo group_text('Date Start','date_start','', '', 1, false,'date_start'); ?> -->
    <div id="cgroup-date_start" class="form-group">
      <label class="control-label">Date Start</label><br>
      <input id="cform-date_start" placeholder="date_start" type="text" name="date_start" class="form-control date_start" value="" required novalidate />
    </div>  
    <!-- description -->
        <!-- <?php //echo group_text('Date End','date_end','', '', 1, false,'date_end'); ?> -->
    <div id="cgroup-date_end" class="form-group">
      <label class="control-label">Date End</label><br>
      <input id="cform-date_end" placeholder="date_end" type="text" name="date_end" class="form-control date_end" value="" required novalidate />
    </div>  
</div>
<div class="col-md-3">
  
    <!-- description -->
</div>