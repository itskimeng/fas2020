
<div class="box box-info" id="pr_item_list" style="  box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23);">
    <div class="box-header with-border">
        <b> Purchase Request List
        </b>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse">
                <i class="fa fa-minus"></i>
            </button>
        </div>
    </div>
    <div class="box-body" style="height: 450px; max-height:150px; overflow-y: auto;">
        <div class="table-responsive">
            <div class="about-page-content testimonial-page">
                <div class="faq-content">
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                        <?php if (empty($rfq_pending_pr_opts)) : ?>

                            <div class="callout callout-warning">
                                <h4> <i class="icon fa fa-warning"></i>There are no pending purchase request.
                                </h4>
                            </div>
                        <?php endif; ?>
                        <?php foreach ($rfq_pending_pr_opts as $key => $data) : ?>
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab">
                                    <h4 class="panel-title">
                                        <a class="collapsed" style="color: black !important;" role="button" data-toggle="collapse" data-parent="#accordion" href="#<?= $data['id']; ?>" aria-expanded="false">
                                            <i class="fa fa-circle-o text-red"></i> <span> PR NO:<?= $data['pr_no']; ?></span>
                                        </a>
                                    </h4>
                                </div>
                                <div id="<?= $data['id']; ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_CDP" aria-expanded="false" style="height: 0px;">
                                    <div class="panel-body">
                                        <ul class="fa-ul">
                                            <li style="display: block; margin-left: 3%">
                                                <a href="" style="color:black; font-weight:normal;" onhover="changeColor(this)">
                                                    <span class="fa-li"><i class="fa fa-circle text-yellow"></i></span>
                                                    OFFICE: <?= $data['office']; ?> </a>
                                            </li>
                                            <li style="display: block; margin-left: 3%">
                                                <a href="" style="color:black; font-weight:normal;" onhover="changeColor(this)">
                                                    <span class="fa-li"><i class="fa fa-circle text-yellow"></i></span>
                                                    AMOUNT: <?= $data['amount']; ?> </a>
                                            </li>
                                            <li style="display: block; margin-left: 3%"><a href="" style="color:black; font-weight:normal;" onhover="changeColor(this)">
                                                </a><a href="" style="color:black; font-weight:normal;" onhover="changeColor(this)">
                                                    <span class="fa-li"><i class="fa fa-circle text-yellow"></i></span>
                                                    PR DATE: <?= $data['pr_date']; ?></a>
                                            </li>
                                            <li style="display: block; margin-left: 3%">
                                                <a href="" style="color:black; font-weight:normal;" onhover="changeColor(this)">
                                                    <span class="fa-li"><i class="fa fa-circle text-yellow"></i></span>
                                                    TARGET DATE: <?= $data['target_date']; ?> </a>
                                            </li>





                                        </ul>
                                        <button class="btn btn-flat btn-block bg-purple btn-md" id="btn_create_rfq" value="<?= $data['pr_no']; ?>">
                                            <i class="glyphicon glyphicon-record"></i> CREATE RFQ
                                        </button>
                                      

                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>


                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

