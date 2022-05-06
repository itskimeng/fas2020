<div class="box box-primary box-solid dropbox">
    <div class="box-header with-border">
        <h5 class="box-title" data-widget="collapse"><i class="fa fa-suitcase"></i> List of Client's Purchase Request</h5>
        <div class="box-tools pull-right">
            <div class="btn-group">
            </div>
        </div>
    </div>
    <div class="box-body box-emp" style="height: auto; max-height: auto; overflow-y: scroll;">
        <?php foreach ($pr_opts as $key => $item) : ?>
            <div class="about-page-content testimonial-page">
                <div class="faq-content">
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                        <div class="panel panel-default" style="padding: 3px !important;">
                            <div class="panel-heading" role="tab">
                                <h4 class="panel-title">
                                    <a class="collapsed" style="color: black !important;" role="button" data-toggle="collapse" data-parent="#accordion" href="#<?= $item['id']; ?>" aria-expanded="false">
                                        <i class="fa fa-folder"></i> <span> PR NO:<?= $item['pr_no']; ?></span>
                                    </a>
                                    <?php if ($item['months'] == 0  && $item['days'] == 0) { ?>
                                    <?php } else if ($item['months'] == 0) { ?>
                                        <span class="label  pull-right label-success"><i class="fa fa-clock-o pull-right"></i><?= $item['days'] . ' days'; ?></span>
                                    <?php } else { ?>
                                       <span class="label  pull-right label-danger"> <i class="fa fa-clock-o pull-right"></i><?= $item['months'] . 'month and ' . $item['days'] . 'day'; ?></span>
                                    <?php } ?>


                                </h4>
                            </div>
                            <div id="<?= $item['id']; ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_CDP" aria-expanded="false" style="height: 0px;">
                                <div class="panel-body">
                                    <ul class="fa-ul">
                                        <li style="display: block; margin-left: 3%">

                                            <span class="fa-li"><i class="fa fa-circle text-yellow"></i></span>
                                            OFFICE: <?= $item['office']; ?> </a>
                                        </li>
                                        </a>
                                        <li style="display: block; margin-left: 3%">

                                            <span class="fa-li"><i class="fa fa-circle text-yellow"></i></span>
                                            PURSPOSE: <?= $item['purpose']; ?>
                                        </li>
                                        <li style="display: block; margin-left: 3%">

                                            <span class="fa-li"><i class="fa fa-circle text-yellow"></i></span>
                                            DATE SUBMITTED: <?= $item['pr_date']; ?>
                                        </li>
                                    </ul>

                                </div>
                            </div>

                        </div>

                    </div>
                </div>

            </div>
        <?php endforeach; ?>
    </div>
</div>