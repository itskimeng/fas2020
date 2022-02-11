<div class="tab-content" id="myTabContent">
    <div aria-labelledby="tab1-tab" id="tab1" class="tab-pane fade in active" role="tabpanel">
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
                    <div class="box box-primary box-solid dropbox">
                        <div class="box-header with-border">
                            <h5 class="box-title"><i class="fa fa-book"></i> For Certification of Availability of Funds</h5>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                </button>
                            </div>
                            <!-- /.box-tools -->
                        </div>
                        <div class="box-body box-emp" style="height: 800px; max-height: 340px; overflow-y: auto;">
                            <div class="about-page-content testimonial-page">
                                <div class="faq-content">
                                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
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
                                                            </li><a href="" style="color:black; font-weight:normal;" onhover="changeColor(this)">
                                                            </a>
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
                    <div class="panel panel-primary" id="tbl_pr_entries">
                        <div class="panel-heading">
                            <span class="pull-right"><i class="glyphicon glyphicon-question-sign" data-toggle="tooltip" data-html="true" data-placement="top" title="" data-original-title="All the transaction you have made will be display here."></i></span>
                            <i class="fa fa-list-ul"></i> Purchase Request Entries
                        </div>
                        <div class="table-responsive">
                            <table class="table table-condensed table-striped" id="rfq_table">
                                <thead>
                                    <tr>
                                        <th>RFQ NO</th>
                                        <th>PR NO</th>
                                        <th>RFQ DATE.</th>
                                        <th>PR DATE</th>
                                        <th>TARGET DATE</th>
                                        <th>STATUS</th>

                                        <th style="text-align: center;">ACTION</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php foreach ($rfq_data as $key => $data) : ?>
                                        <tr>
                                            <td><?= $data['rfq']; ?></td>
                                            <td><?= $data['pr_no']; ?></td>
                                            <td><?= $data['rfq_date']; ?></td>
                                            <td><?= $data['pr_date']; ?></td>
                                            <td><?= $data['target_date']; ?></td>
                                            <td><?= $data['status']; ?></td>


                                            <td>

                                                <button class="btn btn-flat btn-block bg-purple btn-md" id="btn_create_rfq" value="<?= $data['pr_no']; ?>">
                                                    <i class="glyphicon glyphicon-record"></i> CREATE RFQ
                                                </button>
                                                <?php if ($data['status'] == 4) : ?>
                                                    <button class="btn btn-flat btn-block bg-green btn-md" value="<?= $data['pr_no']; ?>">
                                                        <a href="export_rfq.php?id=<?= $data['pr_no']; ?>" style="color:#fff">
                                                            <i class="fa fa-file-excel-o"></i> EXPORT RFQ</a>
                                                    </button>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>


                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="panel panel-primary" id="tbl_rfq_panel">
                        <div class="panel-heading">
                            <span class="pull-right"><i class="glyphicon glyphicon-question-sign" data-toggle="tooltip" data-html="true" data-placement="top" title="" data-original-title="All the transaction you have made will be display here."></i></span>
                            <i class="fa fa-list-ul"></i> Purchase Request Entries
                        </div>

                        <form id="rfq_form" class="form-vertical">
                            <br>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-flat btn-warning btn-back"><i class="fa fa-edit"></i> Back</button>
                                        </div>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-flat btn-primary btn-create-rfq" id="create"><i class="fa fa-save"></i> Create</button>
                                        </div><br>
                                    </div>
                                </div>
                            </div><br>

                            <div id="w1-container" class="kv-view-mode">
                                <div class="kv-detail-view">
                                    <table id="w1" class="table table-bordered table-striped detail-view" data-krajee-kvdetailview="kvDetailView_4eb2b924">
                                        <tbody>
                                            <tr class="kv-child-table-row">
                                                <td class="kv-child-table-cell" colspan="2">
                                                    <table class="kv-child-table">
                                                        <tbody>
                                                            <tr>
                                                                <th style="width: 20%; text-align: LEFT; vertical-align: MIDDLE;">Purchase No</th>
                                                                <td>
                                                                    <div class="kv-attribute">

                                                                        <?= proc_text_input('text', 'form-control col-lg-6', 'pr_no', 'pr_no',  true, ''); ?>
                                                                        <?= proc_text_input('hidden', 'form-control col-lg-6', 'division', 'division',  true, $_GET['division']); ?>
                                                                    </div>
                                                                    <div class="kv-form-attribute" style="display:none">
                                                                        <div class="form-group highlight-addon field-documentroute-id">
                                                                            <div><input type="text" id="documentroute-id" class="form-control" name="Documentroute[id]" value="1751014">
                                                                                <div class="help-block"></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <th style="width: 20%; text-align: LEFT; vertical-align: MIDDLE;">RFQ No</th>
                                                                <td>
                                                                    <div class="kv-attribute">

                                                                        <?= proc_text_input('text', 'form-control col-lg-6', 'rfq', 'rfq',  true, $rfq_no['rfq_no']); ?>
                                                                    </div>
                                                                    <div class="kv-form-attribute" style="display:none">
                                                                        <div class="form-group highlight-addon field-documentroute-id">
                                                                            <div><input type="text" id="documentroute-id" class="form-control" name="Documentroute[id]" value="1751014">
                                                                                <div class="help-block"></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr class="kv-child-table-row">
                                                <td class="kv-child-table-cell" colspan="2">
                                                    <table class="kv-child-table">
                                                        <tbody>
                                                            <tr>
                                                                <th style="width: 20%; text-align: LEFT; vertical-align: MIDDLE;">Amount</th>
                                                                <td>
                                                                    <div class="kv-attribute">
                                                                        <div id="cgroup-total_amount" class="input-group col-lg-6">
                                                                            <span class="input-group-addon"><strong>₱</strong></span>
                                                                            <input id="cform-total_amount" placeholder="Amount" type="text" name="amount" class="form-control" id="amount" value="">
                                                                        </div>
                                                                    </div>
                                                                    <div class=" kv-form-attribute" style="display:none">
                                                                        <div class="form-group highlight-addon field-documentroute-doc_no required">
                                                                            <div><input type="text" id="documentroute-doc_no" class="form-control" name="Documentroute[DOC_NO]" value="R4A-2021-07-27-001" aria-required="true">
                                                                                <div class="help-block"></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr class="kv-child-table-row">
                                                <td class="kv-child-table-cell" colspan="2">
                                                    <table class="kv-child-table">
                                                        <tbody>
                                                            <tr>
                                                                <th style="width: 20%; text-align: LEFT; vertical-align: MIDDLE;">Purpose</th>
                                                                <td>
                                                                    <div class="kv-attribute">
                                                                        <?= proc_text_input('text', 'form-control col-lg-6', 'purpose', 'purpose',  true, ''); ?>

                                                                    </div>
                                                                    <div class="kv-form-attribute" style="display:none">
                                                                        <div class="form-group highlight-addon field-documentroute-doc_no required">
                                                                            <div><input type="text" id="documentroute-doc_no" class="form-control" name="Documentroute[DOC_NO]" value="R4A-2021-07-27-001" aria-required="true">
                                                                                <div class="help-block"></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr class="kv-child-table-row">
                                                <td class="kv-child-table-cell" colspan="2">
                                                    <table class="kv-child-table">
                                                        <tbody>
                                                            <tr>
                                                                <th style="width: 20%; text-align: LEFT; vertical-align: MIDDLE;">PR Date</th>
                                                                <td>
                                                                    <div class="kv-attribute">
                                                                        <div class="input-group date">
                                                                            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                                                            <input readonly disable type="text" class="form-control pull-right info-dates" id="pr_date" name="pr_date" value="">
                                                                        </div>
                                                                    </div>
                                                                    <div class="kv-form-attribute" style="display:none">
                                                                        <div class="form-group highlight-addon field-documentroute-route_date">
                                                                            <div><input type="text" id="documentroute-route_date" class="form-control" name="Documentroute[ROUTE_DATE]" value="2021-07-27 12:03:00">
                                                                                <div class="help-block"></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <th style="width: 20%; text-align: LEFT; vertical-align: MIDDLE;">Target Date</th>
                                                                <td>
                                                                    <div class="kv-attribute">
                                                                        <div class="input-group date">
                                                                            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                                                            <input readonly type="text" class="form-control pull-right info-dates" id="target_date" name="target_date" value="">
                                                                        </div>
                                                                    </div>
                                                                    <div class="kv-form-attribute" style="display:none">
                                                                        <div class="form-group highlight-addon field-documentroute-route_date">
                                                                            <div><input type="text" id="documentroute-route_date" class="form-control" name="Documentroute[ROUTE_DATE]" value="2021-07-27 12:03:00">
                                                                                <div class="help-block"></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr class="kv-child-table-row">
                                                <td class="kv-child-table-cell" colspan="2">
                                                    <table class="kv-child-table">
                                                        <tbody>
                                                            <tr>
                                                                <th style="width: 20%; text-align: LEFT; vertical-align: MIDDLE;">RFQ Date</th>
                                                                <td>
                                                                    <div class="kv-attribute">
                                                                        <div class="input-group date">
                                                                            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                                                            <input type="text" class="form-control pull-right info-dates" id="datepicker1" name="rfq_date" "required=" required" "="" value=" <?= date('F d, Y'); ?>">

                                                                        </div>
                                                                    </div>
                                                                    <div class="kv-form-attribute" style="display:none">
                                                                        <div class="form-group highlight-addon field-documentroute-route_date">
                                                                            <div><input type="text" id="documentroute-route_date" class="form-control" name="Documentroute[ROUTE_DATE]" value="2021-07-27 12:03:00">
                                                                                <div class="help-block"></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </td>

                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr class="kv-child-table-row">
                                                <td class="kv-child-table-cell" colspan="2">
                                                    <table class="kv-child-table">
                                                        <tbody>
                                                            <tr>
                                                                <th style="width: 20%; text-align: LEFT; vertical-align: MIDDLE;">Office</th>
                                                                <td>
                                                                    <div class="kv-attribute">
                                                                        <div class="input-group date">
                                                                            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                                                            <input type="text" class="form-control pull-right info-dates" id="datepicker1" name="rfq_date" "required=" required" "="" value=" <?= date('F d, Y'); ?>">

                                                                        </div>
                                                                    </div>
                                                                    <div class="kv-form-attribute" style="display:none">
                                                                        <div class="form-group highlight-addon field-documentroute-route_date">
                                                                            <div><input type="text" id="documentroute-route_date" class="form-control" name="Documentroute[ROUTE_DATE]" value="2021-07-27 12:03:00">
                                                                                <div class="help-block"></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </td>

                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div aria-labelledby="tab2-tab" id="tab2" class="tab-pane" role="tabpanel">
        <p>Etiam consectetur ornare metus, a semper turpis auctor quis. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Morbi rutrum dapibus neque nec vehicula. Proin at tempus nunc. Duis vel augue vitae nibh dignissim sodales. Vivamus in sem ac massa convallis rutrum at a orci. Cras sagittis nisi ac ipsum vulputate lacinia. In vulputate tempus elementum. Phasellus pulvinar dolor nec justo molestie porttitor. Phasellus a massa odio. Sed eget orci eu nibh sodales ullamcorper.</p>
    </div>
    <div aria-labelledby="tab3-tab" id="tab3" class="tab-pane" role="tabpanel">
        <p>Aliquam finibus nisi eget bibendum porttitor. Donec ultrices pharetra quam non interdum. Nunc ante nunc, dictum eu scelerisque ac, venenatis ut metus. Suspendisse velit massa, ultricies id mattis maximus, porta sed neque. Nunc bibendum metus vel imperdiet consequat. Aliquam elit ipsum, aliquam ac maximus cursus, pulvinar at ipsum. Etiam condimentum quis justo id cursus. Phasellus sit amet urna eros.</p>
    </div>
    <div aria-labelledby="tab4-tab" id="tab4" class="tab-pane" role="tabpanel">
        <p>Aenean placerat tortor elit, quis mattis lectus vulputate convallis. Morbi interdum eros non velit faucibus dignissim. Sed vehicula ligula non vestibulum consectetur. Ut egestas, sapien eu auctor auctor, diam est scelerisque neque, vel finibus sem ex id sapien. Suspendisse nisi tortor, viverra vitae erat ut, ultrices fringilla purus. Donec eget pretium ante. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Integer suscipit risus leo, sit amet dignissim justo porta ac. Duis tempor, purus non iaculis placerat, nisl turpis iaculis lorem, in rhoncus risus nulla id elit. Cras turpis enim, posuere at orci eget, euismod posuere sapien. Proin dictum massa sed augue fringilla, non sodales odio vulputate.</p>
    </div>

</div>