<?php 
  require_once '..\..\views\macro.html.php';
?>

<div class="col-md-2">
  <img class="profile-user-img img-responsive img-circle" src="images/logo.png" alt="User profile picture">
        <h6 class="text-center host_name"><b>Host</b></h6>
        
</div>
<div class="col-md-3">
  <!-- title -->
    <?php echo group_text('Title','title','', '', 1, false,'title'); ?>
    <!-- venue -->
    <?php echo group_text('Venue','venue','', '', 1, false,'venue'); ?>
</div>
<div class="col-md-3">
  <!-- description -->
        <?php echo group_textarea('Description','description',''); ?> 
</div>
<div class="col-md-3">
  <!-- title -->
    <?php echo group_text('Date Start','date_start','', '', 1, false,'date_start'); ?>
    <!-- description -->
        <?php echo group_text('Date End','date_end','', '', 1, false,'date_end'); ?>
</div>
<div class="col-md-3">
  
    <!-- description -->
</div>