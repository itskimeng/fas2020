<div class="box box-info" id="pr_item_list" style="  box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23);">
                <div class="box-header with-border">
                    <b>Request for Quotation Details</b>

                    <div class="box-tools pull-right">

                    </div>
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
                                                        <th style="width: 20%; text-align: LEFT; vertical-align: MIDDLE;">RFQ No</th>
                                                        <td>
                                                            <div class="kv-attribute"><?= $rfq_details['rfq_no']; ?></div>

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
                                                        <th style="width: 20%; text-align: LEFT; vertical-align: MIDDLE;">PR No</th>
                                                        <td>
                                                            <div class="kv-attribute"><?= $rfq_details['pr_no']; ?></div>

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
                                                        <th style="width: 20%; text-align: LEFT; vertical-align: MIDDLE;">ABC</th>
                                                        <td>
                                                            <div class="kv-attribute">₱<?= $rfq_details['total']; ?></div>

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
                                                            <div class="kv-attribute"><?= $rfq_details['rfq_date']; ?></div>
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
                                                        <th style="width: 20%; text-align: LEFT; vertical-align: MIDDLE;">Purpose</th>
                                                        <td>
                                                            <div class="kv-attribute"><span class="text-justify"><em><?= $rfq_details['purpose'];?></em></span></div>

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
                                                            <div class="kv-attribute"><?= $rfq_details['office'];?></div>

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

                </div>
            </div>