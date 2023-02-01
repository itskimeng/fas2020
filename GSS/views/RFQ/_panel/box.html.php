<?php 
foreach ($pr_count as $key => $task) : ?>
  <?php
  if ($key == 3) {
    $key = 'Submitted to GSS';
    $color = 'background:linear-gradient(90deg, #26A69A,#004D40);color:#fff;';
    $icon = 'fa-gear';
    $img_src = "GSS/views/PR/backend/images/dash_submitted.png";
  }
  if ($key == 4) {
    $key = 'Received by GSS';
    $color = 'background:linear-gradient(90deg, #8BC34A,#1B5E20);color:#fff;';
    $img_src = "GSS/views/PR/backend/images/dash_received.png";
  }
  if ($key == 5) {
    $key = 'Processing';
    $color = 'background:linear-gradient(90deg, #FFA726,#FF6F00);color:#fff;';
    $img_src = "GSS/views/PR/backend/images/dash_processing.png";
  }
  if ($key == 7) {
    $key = 'Awarded';
    $color = 'background:linear-gradient(90deg, #F44336,#B71C1C);color:#fff;';
    $img_src = "GSS/views/PR/backend/images/dash_approved.png";
  }
  if ($key == 9) {
    $key = 'Delivered Item';
    $color = 'background:linear-gradient(90deg, #AB47BC,#4A148C);color:#fff;';
    $img_src = "GSS/views/PR/backend/images/dash_approved.png";
  }

  ?>
  <div class="col-lg-2 col-xs-6" style="width:310px;">

    <div class="small-box zoom" style="<?= $color; ?>">
      <div class="inner">
        <h1><?php echo $task; ?></h3>
        <p style="font-size:20pt;"><?php echo $key; ?></p>
      </div>
      <div class="icon">
        <img class="zoom" src="<?= $img_src; ?>" style="width:80px;margin-top:20px;margin-right:10px;" align="right" alt="">

      </div>
      <a href="#" class="small-box-footer"><i class="fas fa-plus"></i> View More
        &nbsp;
      </a>
    </div>


  </div>
<?php endforeach ?>