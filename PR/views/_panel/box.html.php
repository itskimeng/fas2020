<?php foreach ($pr_count as $key => $task) : ?>
  <?php
  if ($key == 1) {
    $key = 'Submitted to GSS';
    $color = 'bg-primary';
    $icon = 'fa-gear';
    $img_src = "PR/views/backend/images/dash_submitted.png";
  }
  if ($key == 2) {
    $key = 'Received by GSS';
    $color = 'bg-green';
    $img_src = "PR/views/backend/images/dash_received.png";
  }
  if ($key == 3) {
    $key = 'Processing';
    $color = 'bg-orange';
    $img_src = "PR/views/backend/images/dash_processing.png";
  }
  if ($key == 4) {
    $key = 'Awarded';
    $color = 'bg-red';
    $img_src = "PR/views/backend/images/dash_approved.png";
  }
  if ($key == 5) {
    $key = 'Delivered Item';
    $color = 'bg-purple';
    $img_src = "PR/views/backend/images/dash_approved.png";
  }

  ?>
  <div class="col-lg-2 col-xs-6" style="width:300px;">

    <div class="small-box <?= $color; ?> zoom">
      <div class="inner">
        <h3><?php echo $task; ?></h3>
        <p><?php echo $key; ?></p>
      </div>
      <div class="icon">
        <img class="zoom" src="<?= $img_src; ?>" style="width:100px;margin-top:20px;margin-right:10px;" align="right" alt="">

      </div>
      <a href="#" class="small-box-footer"><i class="fas fa-plus"></i> View More
        &nbsp;
      </a>
    </div>


  </div>
<?php endforeach ?>