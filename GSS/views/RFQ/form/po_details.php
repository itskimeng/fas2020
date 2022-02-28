<div class="box" id="pr_item_list" style="  box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23);">
                <div class="box-header with-border">
                    <b> Purchase Order Details
                    </b>
                    <div class="box-tools pull-right">

                    </div>
                </div>
                <div class="col-xs-12">
                    <center>
                        <ul class="nav nav-tabs process-model more-icon-preocess" role="tablist">
                            <li role="presentation" id="stat-submitted" class="active"><a href="#discover" aria-controls="discover" role="tab" data-toggle="tab"><i class="fa fa-search" aria-hidden="true"></i>
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
                    <?= proc_text_input('hidden', '', 'stat', '', false, $pr_data['stat']); ?>

                </div>

                <div class="box-header with-border">
                    <b>Purchase Order Information</b>

                </div>

                <div class="box-body">
                    <div id="w1-container" class="kv-view-mode">
                        <div class="kv-detail-view">
                            <table id="w1" class="table table-bordered table-striped detail-view" data-krajee-kvdetailview="kvDetailView_4eb2b924">
                                <tbody>
                                    <tr class="kv-child-table-row">
                                        <td class="kv-child-table-cell" colspan="2">
                                            <table class="kv-child-table">
                                                <tbody>
                                                    <tr>
                                                        <th style="width: 20%; text-align: LEFT; vertical-align: MIDDLE;">Purchase Order No.</th>
                                                        <td>
                                                            <div class="kv-attribute"><?= $po_opts['po_no']; ?></div>

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
                                                        <th style="width: 20%; text-align: LEFT; vertical-align: MIDDLE;">PO Amount</th>
                                                        <td>
                                                            <div class="kv-attribute">₱<?= number_format($po_opts['po_amount'], 2); ?></div>

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
                                                        <th style="width: 20%; text-align: LEFT; vertical-align: MIDDLE;">PO Date</th>
                                                        <td>
                                                            <div class="kv-attribute"><?= $po_opts['po_date']; ?></div>
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
                                                        <th style="width: 20%; text-align: LEFT; vertical-align: MIDDLE;">Supplier</th>
                                                        <td>
                                                            <div class="kv-attribute"><span class="text-justify"><em><?= $supp_opts['supplier_title'];?></em></span></div>

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
                                                        <th style="width: 20%; text-align: LEFT; vertical-align: MIDDLE;">Address</th>
                                                        <td>
                                                            <div class="kv-attribute"><?= $supp_opts['supplier_address'];?></div>

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
                                                        <th style="width: 20%; text-align: LEFT; vertical-align: MIDDLE;">Contact No</th>
                                                        <td>
                                                            <div class="kv-attribute"><?= $supp_opts['contact_details'];?></div>

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
                                                                <b>WITH RFQ</b>
                                                                <input type="hidden" class="" id="pr_no" name="" ""="" value="2022-02-0001">
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




                    <hr>
                    <div class="col-md-12">

                        <div class="btn-group">
                            <a class="btn btn-flat btn-info" data-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">View Item<i class="fa fa-angle-double-down fa-fw"></i></a>
                        </div>


                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="collapse multi-collapse" id="multiCollapseExample1">
                                <div class="card card-body" style="height: 500px; max-height: 250px; overflow-y: auto;">
                                    <p><b><i>Here is the list of the other recipients in this routed document:</i></b></p>
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
                                            <tr>
                                                <td>Load card (smart 100)</td>
                                                <td style="width:10%"></td>
                                                <td></td>
                                                <td>1</td>
                                                <td>
                                                    <div id="cgroup-total_amount" class="input-group col-lg-6">
                                                        <span class="input-group-addon"><strong>₱</strong></span>
                                                        <input placeholder="Amount" type="text" disabled="" class="form-control" value="100.00">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div id="cgroup-total_amount" class="input-group col-lg-6">
                                                        <span class="input-group-addon"><strong>₱</strong></span>
                                                        <input placeholder="Amount" type="text" disabled="" class="form-control" value="100.00">
                                                    </div>
                                                </td>

                                            </tr>

                                            <tr>
                                                <td>Car tint (front)</td>
                                                <td style="width:10%"></td>
                                                <td></td>
                                                <td>1</td>
                                                <td>
                                                    <div id="cgroup-total_amount" class="input-group col-lg-6">
                                                        <span class="input-group-addon"><strong>₱</strong></span>
                                                        <input placeholder="Amount" type="text" disabled="" class="form-control" value="1,400.00">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div id="cgroup-total_amount" class="input-group col-lg-6">
                                                        <span class="input-group-addon"><strong>₱</strong></span>
                                                        <input placeholder="Amount" type="text" disabled="" class="form-control" value="1,400.00">
                                                    </div>
                                                </td>

                                            </tr>

                                            <tr>
                                                <td>Wiper Blade </td>
                                                <td style="width:10%"></td>
                                                <td></td>
                                                <td>1</td>
                                                <td>
                                                    <div id="cgroup-total_amount" class="input-group col-lg-6">
                                                        <span class="input-group-addon"><strong>₱</strong></span>
                                                        <input placeholder="Amount" type="text" disabled="" class="form-control" value="300.00">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div id="cgroup-total_amount" class="input-group col-lg-6">
                                                        <span class="input-group-addon"><strong>₱</strong></span>
                                                        <input placeholder="Amount" type="text" disabled="" class="form-control" value="300.00">
                                                    </div>
                                                </td>

                                            </tr>

                                            <tr>
                                                <td>Tab, arrow flags, 7 colors per pack</td>
                                                <td style="width:10%"></td>
                                                <td></td>
                                                <td>1</td>
                                                <td>
                                                    <div id="cgroup-total_amount" class="input-group col-lg-6">
                                                        <span class="input-group-addon"><strong>₱</strong></span>
                                                        <input placeholder="Amount" type="text" disabled="" class="form-control" value="40.00">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div id="cgroup-total_amount" class="input-group col-lg-6">
                                                        <span class="input-group-addon"><strong>₱</strong></span>
                                                        <input placeholder="Amount" type="text" disabled="" class="form-control" value="40.00">
                                                    </div>
                                                </td>

                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>