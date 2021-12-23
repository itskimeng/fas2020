<?php foreach ($pr_count as $key => $task): ?>
  <?php 
if($key == 1)
{
  $key = 'Submitted';
  $color = 'bg-primary';
  $icon = 'fa-gear';
  $img_src = "PR/views/backend/images/dash_submitted.png";
}
if($key == 2)
{
  $key = 'Received';
  $color = 'bg-green';
  $img_src = "PR/views/backend/images/dash_received.png";


}
if($key == 3)
{
  $key = 'Processing';
  $color = 'bg-orange';
  $img_src = "PR/views/backend/images/dash_processing.png";


}
if($key == 4)
{
  $key = 'Completed';
  $color = 'bg-red';
  $img_src = "PR/views/backend/images/dash_approved.png";
}
?>
  <div class="col-lg-3 col-xs-6">

  <div class="small-box <?= $color;?> zoom">
                    <div class="inner">
                        <h3><?php echo $task; ?></h3>
                        <p><?php echo $key; ?></p>
                    </div>
                    <div class="icon">
                        <img class="zoom"  src="<?= $img_src;?>" style="width:100px;margin-top:20px;margin-right:10px;" align="right" alt="">

                    </div>
                    <a href="#" class="small-box-footer"><i class="fas fa-plus"></i> View More
                        &nbsp;
                    </a>
                </div>

 
  </div>
<?php endforeach ?>


