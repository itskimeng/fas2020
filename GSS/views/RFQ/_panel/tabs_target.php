<div class="tab-content" id="myTabContent">
    <div aria-labelledby="tab1-tab" id="tab1" class="tab-pane fade in active" role="tabpanel">
        <?php include 'GSS/views/RFQ/form/tabpanel_rfq.php'; ?>
    </div>

    <div aria-labelledby="tab2-tab" id="tab2" class="tab-pane" role="tabpanel">
    <div class="box box-danger">
            <div class="box-header with-border">
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse">
                        <i class="fa fa-minus"></i>
                    </button>
                </div>
            </div>

            <div class="box-body">
                <div class="col-md-4">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <span class="pull-right"></span>
                            <i class="fa fa-list-ul"></i> Pending Purchase Request
                        </div>
                        <div class="box-body box-emp" style="height: 800px; max-height: 340px; overflow-y: auto;">
                            <div class="about-page-content testimonial-page">
                                <div class="faq-content">
                                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                        <?php if (empty($rfq_pr_opts)) : ?>

                                            <div class="callout callout-warning">
                                                <h4> <i class="icon fa fa-warning"></i>There are pending purchase request.
                                                </h4>
                                                <p>This is a yellow callout.</p>
                                            </div>
                                        <?php endif; ?>
                                        <?php foreach ($rfq_pr_opts as $key => $data) : ?>
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
                <div class="col-lg-8">
                    <?php include 'rfq_entries.php'; ?>
                    <?php include 'rfq_create.php'; ?>
                    <?php include 'rfq_view.php'; ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div aria-labelledby="tab3-tab" id="tab3" class="tab-pane" role="tabpanel">
        <p>Aliquam finibus nisi eget bibendum porttitor. Donec ultrices pharetra quam non interdum. Nunc ante nunc, dictum eu scelerisque ac, venenatis ut metus. Suspendisse velit massa, ultricies id mattis maximus, porta sed neque. Nunc bibendum metus vel imperdiet consequat. Aliquam elit ipsum, aliquam ac maximus cursus, pulvinar at ipsum. Etiam condimentum quis justo id cursus. Phasellus sit amet urna eros.</p>
    </div>
    <div aria-labelledby="tab4-tab" id="tab4" class="tab-pane" role="tabpanel">
        <p>Aenean placerat tortor elit, quis mattis lectus vulputate convallis. Morbi interdum eros non velit faucibus dignissim. Sed vehicula ligula non vestibulum consectetur. Ut egestas, sapien eu auctor auctor, diam est scelerisque neque, vel finibus sem ex id sapien. Suspendisse nisi tortor, viverra vitae erat ut, ultrices fringilla purus. Donec eget pretium ante. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Integer suscipit risus leo, sit amet dignissim justo porta ac. Duis tempor, purus non iaculis placerat, nisl turpis iaculis lorem, in rhoncus risus nulla id elit. Cras turpis enim, posuere at orci eget, euismod posuere sapien. Proin dictum massa sed augue fringilla, non sodales odio vulputate.</p>
    </div>

</div>
<style>
    .pull-left {
        float: left !important;
        padding: 10px;
    }
</style>