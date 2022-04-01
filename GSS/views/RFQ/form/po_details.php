<div class="box box-info" id="pr_item_list" style="box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23);">
                <div class="box-header with-border">
                    <b> Purchase Order Details
                    </b>
                    <div class="box-tools pull-right">

                    </div>
                </div>
                <!-- <div class="col-xs-12">
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
                     //proc_text_input('hidden', '', 'stat', '', false, $pr_data['stat']); 

                </div> -->



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
                                                            <div class="kv-attribute">₱<?=number_format($po_opts['po_amount'],2); ?></div>

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
                                                        <th style="width: 20%; text-align: LEFT; vertical-align: MIDDLE;">NOA</th>
                                                        <td>
                                                            <div class="kv-attribute">
                                                                <button class="btn btn-xs btn-flat bg-purple">
                                                                    <a href="procurement_export_noa.php?division=<?= $_GET['division'];?>&po_no=<?= $_GET['po_no'];?>&pr_no=<?= $_GET['pr_no'];?>&rfq_no=<?= $_GET['rfq_no'];?>" style="color:#fff;">
                                                                        Notice of Award
                                                                    </a>
                                                                </button></div>

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
                                                        <th style="width: 20%; text-align: LEFT; vertical-align: MIDDLE;">NTP</th>
                                                        <td>
                                                            <div class="kv-attribute">
                                                            <button class="btn btn-xs btn-flat bg-purple">
                                                            <a href="procurement_export_ntp.php?division=<?= $_GET['division'];?>&po_no=<?= $_GET['po_no'];?>&pr_no=<?= $_GET['pr_no'];?>&rfq_no=<?= $_GET['rfq_no'];?>" style="color:#fff;">
                                                            Notice to Proceed
                                                            </a></button></div>

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

                    


                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div  id="multiCollapseExample1">
                                <div class="card card-body" style="height: 500px; max-height: 250px; overflow-y: auto;">
                                    <table class="table table-responsive">
                                        <tbody>
                                            <tr class="bg-blue">
                                                <th style="width:20%;">Item</th>
                                                <th style="width:20%;">Item Description</th>
                                                <th>Unit</th>
                                                <th>Quantity</th>
                                                <th>Unit Cost</th>
                                                <th>Total Cost</th>
                                            </tr>
                                            <?php 
                                            foreach ($po_items as $key => $data) : ?>
                                                <tr>
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
            <script>
                
        let pr = "<?= $_GET['po_no'];?>";

        let path = 'GSS/route/post_status_history.php';
        let data = {
            pr_no: pr,
        };

        $.post(path, data, function (data, status) {
            let lists = JSON.parse(data);
            sample(lists);
        });

        function sample($data) {
            let arr = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12'];
            $.each($data, function (key, item) {
                if (item.stat == 3) {
                    $('#stat-submitted').addClass('active');
                } else if (item.stat == 4) {
                    $('#stat-processed').addClass('active');
                } else if (item.stat == 5) {
                    $('#stat-rfq').addClass('active');
                } else if (item.stat == 8) {
                    $('#stat-obligated').addClass('active');

                } else if (item.stat == 11) {
                    $('#stat-disbursed').addClass('active');

                } else if (item.stat == 12) {
                    $('#stat-delivered').addClass('active');
                }
            });

            return $data;
        }
        $("#history").html("");
            </script>