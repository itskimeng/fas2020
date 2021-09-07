<?php foreach ($task_count as $key => $task): ?>
  <div class="col-lg-3 col-xs-6">

    <?php if ($key == 'Created'): ?>
      <?php $color = 'bg-gray'; ?>
      <?php $icon = 'fa-tasks'; ?>
    <?php elseif ($key == 'Ongoing'): ?>
      <?php $color = 'bg-yellow'; ?>
      <?php $icon = 'fa-refresh'; ?>
    <?php elseif ($key == 'For Checking'): ?>
      <?php $color = 'bg-aqua'; ?>
      <?php $icon = 'fa-calendar-check-o'; ?>
    <?php else: ?>
      <?php $color = 'bg-green'; ?>
      <?php $icon = 'fa-check-square-o'; ?>
    <?php endif ?>

    <div class="small-box <?php echo $color; ?> dropbox">
      <div class="inner" style="color:white">
        <h3><?php echo $task; ?></h3>
        <p><?php echo $key; ?></p>
      </div>
      <div class="icon">
        <i class="fa <?php echo $icon;   ?>"></i>
      </div>
      <a href="ActivityPlanner/views/pdf.html.php?status=<?php echo $key; ?>&username=<?php echo $username; ?>&division=<?php echo $_GET['division']; ?>" class="small-box-footer">
        More info <i class="fa fa-arrow-circle-right"></i>
      </a>
    </div>
  </div>
<?php endforeach ?>


