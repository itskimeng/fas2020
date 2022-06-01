<?php
foreach ($pr_count as $key => $task) : ?>
    <?php
    if ($key == 3) {
        $key = 'Submitted to GSS';
        $color = 'bg-primary';
        $icon = 'fa-gear';
        $img_src = "GSS/views/PR/backend/images/dash_submitted.png";
    }
    if ($key == 4) {
        $key = 'Received by GSS';
        $color = 'bg-green';
        $img_src = "GSS/views/PR/backend/images/dash_received.png";
    }
    if ($key == 5) {
        $key = 'Processing';
        $color = 'bg-orange';
        $img_src = "GSS/views/PR/backend/images/dash_processing.png";
    }
    if ($key == 7) {
        $key = 'Awarded';
        $color = 'bg-red';
        $img_src = "GSS/views/PR/backend/images/dash_approved.png";
    }
    if ($key == 9) {
        $key = 'Delivered Item';
        $color = 'bg-purple';
        $img_src = "GSS/views/PR/backend/images/dash_approved.png";
    }

    ?>
    <div class="col-lg-2 col-xs-6" style="width:250px;">

        <div class="small-box <?= $color; ?> zoom">
            <div class="inner">
                <h3><?php echo $task; ?></h3>
                <p><?php echo $key; ?></p>
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