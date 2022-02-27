<div class="panel panel-primary" id="tbl_rfq_panel">
    <div class="panel-heading">
        <span class="pull-right"><i class="glyphicon glyphicon-question-sign" data-toggle="tooltip" data-html="true" data-placement="top" title="" data-original-title="All the transaction you have made will be display here."></i></span>
        <i class="fa fa-list-ul"></i> Request for Quotation Entries
    </div>

    <form id="rfq_form" class="form-vertical">
        <br>
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-12">
                   
                    <div class="btn-group">
                        <?= proc_text_input('hidden', 'form-control col-lg-6', 'rfq_id', 'rfq_id',  false, $rfq_id['rfq_id']); ?>
                        <?= proc_text_input('hidden', 'form-control col-lg-6', 'abc', 'abc',  false, ''); ?>
                        <?= proc_text_input('hidden', 'form-control col-lg-6', 'items', 'items',  false, ''); ?>
                        <?= proc_text_input('hidden', 'form-control col-lg-6', 'description', 'description',  false, ''); ?>
                        <?= proc_text_input('hidden', 'form-control col-lg-6', 'qty', 'qty',  false, ''); ?>
                        <?= proc_text_input('hidden', 'form-control col-lg-6', 'unit', 'unit',  false, ''); ?>
                        <table id="app_items">
                            <tr>
                                <td></td>
                            </tr>
                        </table>
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
                                                    <?= proc_text_input('hidden', 'form-control col-lg-6', 'rfq_no', 'rfq_no',  false, $rfq_no['rfq_no']); ?>
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
                                            <th style="width: 20%; text-align: LEFT; vertical-align: MIDDLE;">Mode of Procurement</th>
                                            <td>
                                                <div class="kv-attribute">
                                                    <div class="input-group date">
                                                        <input type="text" class="form-control pull-right" name="mode" id="mode">

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
                                                        <div class="input-group-addon"><i class="fa fa-building"></i></div>
                                                        <input type="text" class="form-control pull-right" name="office" id="office">

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
    </form>

</div>
