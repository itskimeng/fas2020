<div class="box box-danger">
    <div class="box-header with-border">
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse">
                <i class="fa fa-minus"></i>
            </button>
        </div>
    </div>

    <div class="box-body">
        <div class="col-md-3">
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
                                        <h4> <i class="icon fa fa-warning"></i>There are no pending purchase request.
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
            <div class="panel panel-primary" id="pos_panel">
                <div class="panel-heading">
                    <span class="pull-right"></span>
                    <i class="fa fa-list-ul"></i>Proof of Sending
                </div>
                <div class="box-body box-emp">
                <?= group_select('Supplier', 'supplier', $supplier_opts, '', 'select2', '', false, '', true);?>
                <?= proc_action_btn('Generate','','export_pos', 'btn btn-flat bg-purple','', '', '', 'fa fa-excel-o', '#'); ?>
                </div>

            </div>
        </div>
        <div class="col-lg-9">
            <?php include 'GSS/views/RFQ/_panel/rfq_entries.php'; ?>
            <?php include 'GSS/views/RFQ/_panel/rfq_create.php'; ?>
            <?php include 'GSS/views/RFQ/_panel/rfq_view.php'; ?>
            </form>
        </div>
    </div>
</div>