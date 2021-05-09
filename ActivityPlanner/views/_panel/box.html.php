<!-- TO DO -->
<div class="col-lg-3 col-xs-6">
  <!-- small box -->
  <div class="small-box bg-gray dropbox">
    <div class="inner" style="color:white">
      <h3><?php echo $task_count['Created']; ?></h3>

      <p>To Do</p>
    </div>
    <div class="icon">
      <i class="fa fa-tasks"></i>
    </div>
    <a href="ActivityPlanner/views/pdf.html.php?status=Created&username=<?php echo $username; ?>&division=<?php echo $_GET['division']; ?>" class="small-box-footer">
      More info <i class="fa fa-arrow-circle-right"></i>
    </a>
  </div>
</div>
<!-- END TO DO -->

<!-- ONGOING -->
<div class="col-lg-3 col-xs-6">
  <!-- small box -->
  <div class="small-box bg-yellow dropbox">
    <div class="inner">
      <h3><?php echo $task_count['Ongoing']; ?></h3>

      <p>Ongoing</p>
    </div>
    <div class="icon">
      <i class="fa fa-refresh"></i>
    </div>
    <a href="ActivityPlanner/views/pdf.html.php?status=Ongoing&username=<?php echo $username; ?>&division=<?php echo $_GET['division']; ?>" class="small-box-footer">
      More info <i class="fa fa-arrow-circle-right"></i>
    </a>
  </div>
</div>
<!-- END ONGOING -->

<!-- PAUSED -->
<div class="col-lg-3 col-xs-6">
  <!-- small box -->
  <div class="small-box bg-aqua dropbox">
    <div class="inner">
      <h3><?php echo $task_count['For Checking']; ?></h3>

      <p>For Checking</p>
    </div>
    <div class="icon">
      <i class="fa fa-calendar-check-o"></i>
    </div>
    <a href="ActivityPlanner/views/pdf.html.php?status=For Checking&username=<?php echo $username; ?>&division=<?php echo $_GET['division']; ?>" class="small-box-footer">
      More info <i class="fa fa-arrow-circle-right"></i>
    </a>
  </div>
</div>
<!-- END PAUSED -->

<!-- DONE -->
<div class="col-lg-3 col-xs-6">
  <!-- small box -->
  <div class="small-box bg-green dropbox">
    <div class="inner">
      <h3><?php echo $task_count['Done']; ?></h3>

      <p>Done</p>
    </div>
    <div class="icon">
      <i class="fa fa-check-square-o"></i>
    </div>
    <a href="ActivityPlanner/views/pdf.html.php?status=Done&username=<?php echo $username; ?>&division=<?php echo $_GET['division']; ?>" class="small-box-footer">
      More info <i class="fa fa-arrow-circle-right"></i>
    </a>
  </div>
</div>
<!-- END DONE -->


