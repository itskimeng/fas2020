<form id="form_pr_item">
    <div class="row">

        <div class="col-lg-12">
            <p>
                <button type="button" id="modalButton" class="btn btn-flat bg-orange" value=""><a href="procurement_purchase_request.php?division=<?= $_GET['division']; ?>" style="color: #fff;"><i class=" fa fa-arrow-circle-left"></i> RETURN</a></button>
                <button type="button" id="modalButton" class="btn btn-flat bg-green " value=""><a href="procurement_purchase_request_edit.php?id=<?= $_GET['id']; ?>&division=<?= $_GET['division']; ?>" style="color: #fff;"><i class=" fa fa-edit"></i> EDIT</a></button>
                <button type="button" id="modalButton" class="btn btn-flat bg-purple pull-right " value="/documentroute/createreject?routeno=1751014&amp;docno=R4A-2021-07-27-001&amp;receivedfrom=1551&amp;userid=8516"><i class="fa fa-file-excel-o"></i><a style="color:#fff;" href="export_pr.php?pr_no=<?= $_GET['id']; ?>"> EXPORT PR</a></button>
            </p>
            <div class="box box-info">
                <div class="col-xs-12">
                    <center>
                        <ul class="nav nav-tabs process-model more-icon-preocess" role="tablist">
                            <li role="presentation" id="stat-submitted"><a href="#discover" aria-controls="discover" role="tab" data-toggle="tab"><i class="fa fa-search" aria-hidden="true"></i>
                                    <p>Submitted</p>
                                </a></li>
                            <li role="presentation" id="stat-processed"><a href="#strategy" aria-controls="strategy" role="tab" data-toggle="tab"><i class="fa fa-send-o" aria-hidden="true"></i>
                                    <p>Processed</p>
                                </a></li>
                            <li role="presentation" id="stat-rfq"><a href="#optimization" aria-controls="optimization" role="tab" data-toggle="tab"><i class="fa fa-qrcode" aria-hidden="true"></i>
                                    <p>With RFQ</p>
                                </a></li>
                            <li role="presentation" id="stat-obligated"><a href="#content" aria-controls="content" role="tab" data-toggle="tab"><i class="fa fa-newspaper-o" aria-hidden="true"></i>
                                    <p>Obligated</p>
                                </a></li>
                            <li role="presentation" id="stat-disbursed"><a href="#content" aria-controls="content" role="tab" data-toggle="tab"><i class="fa fa-money" aria-hidden="true"></i>
                                    <p>Disbursed</p>
                                </a></li>
                            <li role="presentation" id="stat-delivered"><a href="#reporting" aria-controls="reporting" role="tab" data-toggle="tab"><i class="fa fa-clipboard" aria-hidden="true"></i>
                                    <p>Delivered</p>
                                </a></li>
                        </ul>
                    </center>

                </div>

                <div class="box-header with-border">
                    <b>Purchase Request Information</b>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse">
                            <i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>

                <div class="box-body">
                    <form id="w0" class="form-vertical" action="/documentroute/incomingview?id=&amp;routeno=1751014" method="post" role="form">
                        <input type="hidden" name="_csrf" value="4PINMeoPoUwA0CHj9Eji8Y2wtLsVAqLR92FPDzlhe-G4wEJr00z2G0Szc7q5L5G-xv_97Xtk1PyfUhV8blQt0A==">
                        <div id="w1-container" class="kv-view-mode">
                            <div class="kv-detail-view">
                                <table id="w1" class="table table-bordered table-striped detail-view" data-krajee-kvdetailview="kvDetailView_4eb2b924">
                                    <tbody>
                                        <tr class="kv-child-table-row">
                                            <td class="kv-child-table-cell" colspan="2">
                                                <table class="kv-child-table">
                                                    <tbody>
                                                        <tr>
                                                            <th style="width: 20%; text-align: LEFT; vertical-align: MIDDLE;">Purchase No.</th>
                                                            <td>
                                                                <div class="kv-attribute"><?= $pr_data['pr_no']; ?></div>
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
                                                            <th style="width: 20%; text-align: LEFT; vertical-align: MIDDLE;">Office/Province:</th>
                                                            <td>
                                                                <div class="kv-attribute"><?= $pr_data['office']; ?></div>
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
                                                                <div class="kv-attribute"><?= $pr_data['pr_date']; ?></div>
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
                                                            <th style="width: 20%; text-align: LEFT; vertical-align: MIDDLE;">Target Date</th>
                                                            <td>
                                                                <div class="kv-attribute"><?= $pr_data['target_date']; ?></div>
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
                                                            <th style="width: 20%; text-align: LEFT; vertical-align: MIDDLE;">Type</th>
                                                            <td>
                                                                <div class="kv-attribute"><span class="text-justify"><em><?= $pr_data['type']; ?></em></span></div>
                                                                <div class="kv-form-attribute" style="display:none">
                                                                    <div class="form-group highlight-addon field-documentroute-docsubject">
                                                                        <div><textarea id="documentroute-docsubject" class="form-control" name="Documentroute[docSubject]" rows="4">RSAKM IMPLAN: GUIDE FOR PREPARATION OF RSAKM ACCOMPLISHMENT PRESENTATION IN THE ERIC CALABARZON AND MIMAROPA MEETINGS ON 28 JULY 2021</textarea>
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
                                                                <div class="kv-attribute"><?= $pr_data['purpose']; ?></div>
                                                                <div class="kv-form-attribute" style="display:none">
                                                                    <div class="form-group highlight-addon field-documentroute-docdesc">
                                                                        <div><textarea id="documentroute-docdesc" class="form-control" name="Documentroute[docDesc]" rows="2">RSAKM IMPLAN: GUIDE FOR PREPARATION OF RSAKM ACCOMPLISHMENT PRESENTATION IN THE ERIC CALABARZON AND MIMAROPA MEETINGS ON 28 JULY 2021</textarea>
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
                                                        <tr></tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>

                                        <tr class="kv-child-table-row">
                                            <td class="kv-child-table-cell" colspan="2">
                                                <table class="kv-child-table">
                                                    <tbody>
                                                        <tr>
                                                            <th style="width: 20%; text-align: LEFT; vertical-align: MIDDLE;">ABC</th>
                                                            <td>
                                                                <div class="kv-attribute">₱ <?= number_format($pr['total'], 2); ?></div>
                                                                <div class="kv-form-attribute" style="display:none">
                                                                    <div class="form-group highlight-addon field-documentroute-actionname">
                                                                        <div><input type="text" id="documentroute-actionname" class="form-control" name="Documentroute[actionName]" value="APPROPRIATE STAFF ACTION">
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
                                                            <th style="width: 20%; text-align: LEFT; vertical-align: MIDDLE;">Current Status</th>
                                                            <td>
                                                                <div class="kv-attribute">
                                                                    <b><?= $pr_data['status']; ?></b>
                                                                    <?= proc_text_input('hidden', '', 'pr_no', '', false, $pr_data['pr_no']); ?>
                                                                    <?= proc_text_input('hidden', '', 'stat', '', false, $pr_data['stat']); ?>

                                                                </div>
                                                                <div class="kv-form-attribute" style="display:none">
                                                                    <div class="form-group highlight-addon field-documentroute-route_remarks">
                                                                        <div><textarea id="documentroute-route_remarks" class="form-control" name="Documentroute[ROUTE_REMARKS]" rows="4"></textarea>
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
                                                        <tr></tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </form>


                    <!-- All attached files -->
                    <!-- <p><span class="fa fa-info-circle fa-fw"></span><i>There are <b class="text-danger">5 ITEMS</b> in this Purchase Request.</i></p> -->
                    <hr>
                    <div class="col-md-12">
                    
                        <div class="btn-group">
                            <a class="btn btn-flat btn-info" data-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">View Item<i class="fa fa-angle-double-down fa-fw"></i></a>
                        </div>
                        <div class="btn-group">
                            <a href="javascript:void(0);" data-toggle="modal" data-target="#exampleModal" class="btn btn-flat btn-primary " id="btn-multiple"><i class="fa fa-book"></i> Add More Item</a>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="collapse multi-collapse" id="multiCollapseExample1">
                                <div class="card card-body" style="height: 500px; max-height: 250px; overflow-y: auto;">
                                    <table class="table table-responsive">
                                        <tbody>
                                            <tr class="bg-blue">
                                                <th>Item</th>
                                                <th style="width:10%;">Item Description</th>
                                                <th>Unit</th>
                                                <th>Quantity</th>
                                                <th>Unit Cost</th>
                                                <th>Total Cost</th>
                                            </tr>
                                            <?php foreach ($pr_items as $key => $data) : ?>
                                                <tr>
                                                    <td><?= $data['items']; ?></td>
                                                    <td><?= $data['items']; ?></td>
                                                    <td><?= $data['items']; ?></td>
                                                    <td><?= $data['items']; ?></td>
                                                    <td style="width:10%"><?= $data['description']; ?></td>
                                                    <td><?= $data['unit']; ?></td>
                                                    <td><?= $data['qty']; ?></td>
                                                    <td>
                                                        <div id="cgroup-total_amount" class="input-group col-lg-6">
                                                            <span class="input-group-addon"><strong>₱</strong></span>
                                                            <input placeholder="Amount" type="text" disabled class="form-control" value="<?= number_format($data['total'], 2); ?>">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div id="cgroup-total_amount" class="input-group col-lg-6">
                                                            <span class="input-group-addon"><strong>₱</strong></span>
                                                            <input placeholder="Amount" type="text" disabled class="form-control" value="<?= number_format($data['abc'], 2); ?>">
                                                        </div>
                                                    </td>

                                                </tr>
                                           
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>