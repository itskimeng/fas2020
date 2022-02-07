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
                <div class="col-lg-12">
                    <div class="panel panel-primary" id="tbl_pr_entries">
                        <div class="panel-heading">
                            <span class="pull-right"><i class="glyphicon glyphicon-question-sign" data-toggle="tooltip" data-html="true" data-placement="top" title="" data-original-title="All the transaction you have made will be display here."></i></span>
                            <i class="fa fa-list-ul"></i> Purchase Request Entries
                        </div>
                        <div class="table-responsive">
                            <table class="table table-condensed table-striped">
                                <thead>
                                    <tr>
                                        <th>PR NO.</th>
                                        <th>PR DATE.</th>
                                        <th>TARGET DATE.</th>
                                        <th>AMOUNT</th>

                                        <th style="text-align: center;">ACTION</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <td>Dec. 03, 2021</td>
                                        <td>Dec. 03, 2021</td>
                                        <td>Dec. 03, 2021</td>
                                        <td>Dec. 03, 2021</td>

                                        <td>
                                            <a class="btn btn-flat btn-block bg-green btn-xs" href="/claims/transaction/view?id=10492" title="View this transaction">
                                                <i class="glyphicon glyphicon-search"></i> View Details
                                            </a>
                                            <button class="btn btn-flat btn-block bg-purple btn-xs" id="btn_create_rfq">
                                                <i class="glyphicon glyphicon-edit"></i> CREATE RFQ
                                            </button>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="panel panel-primary" id="tbl_rfq_panel">
                        <div class="panel-heading">
                            <span class="pull-right"><i class="glyphicon glyphicon-question-sign" data-toggle="tooltip" data-html="true" data-placement="top" title="" data-original-title="All the transaction you have made will be display here."></i></span>
                            <i class="fa fa-list-ul"></i> Purchase Request Entries
                        </div>
                        <form id="w0" class="form-vertical">
                            
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
                                                                    <?= proc_text_input('hidden', 'form-control col-lg-6', 'pr_no', 'pr_no',  true,'d');?>
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
                                                                        <input id="cform-total_amount" placeholder="Total Alloment Amount" type="text" name="total_amount" class="form-control total_amount" value="" "required="required" "="" novalidate="" readonly="">
                                                                    </div>
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
                                                                <th style="width: 20%; text-align: LEFT; vertical-align: MIDDLE;">Purpose</th>
                                                                <td>
                                                                    <div class="kv-attribute">R4A-2021-07-27-001</div>
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
                                                                    <div class="kv-attribute">July 27, 2021 12:03 PM</div>
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
                                                                <th style="width: 20%; text-align: LEFT; vertical-align: MIDDLE;">RFQ No.</th>
                                                                <td>
                                                                    <div class="kv-attribute"><span class="text-justify"><em>RSAKM IMPLAN: GUIDE FOR PREPARATION OF RSAKM ACCOMPLISHMENT PRESENTATION IN THE ERIC CALABARZON AND MIMAROPA MEETINGS ON 28 JULY 2021</em></span></div>
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
                                                                <th style="width: 20%; text-align: LEFT; vertical-align: MIDDLE;">RFQ Date</th>
                                                                <td>
                                                                    <div class="kv-attribute">July 27, 2021 12:03 PM</div>
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
                                                                <th style="width: 20%; text-align: LEFT; vertical-align: MIDDLE;">Quotation Date</th>
                                                                <td>
                                                                    <div class="kv-attribute">July 27, 2021 12:03 PM</div>
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
                                                                <th style="width: 20%; text-align: LEFT; vertical-align: MIDDLE;">RFQ</th>
                                                                <td>
                                                                    <div class="kv-attribute">RSAKM IMPLAN: GUIDE FOR PREPARATION OF RSAKM ACCOMPLISHMENT PRESENTATION IN THE ERIC CALABARZON AND MIMAROPA MEETINGS ON 28 JULY 2021</div>
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
                                                            <tr>
                                                                <th style="width: 20%; text-align: LEFT; vertical-align: MIDDLE;">Created by</th>
                                                                <td>
                                                                    <div class="kv-attribute"><b>MARY JANICE BALAHADIA</b><br><small>REGION 4A-LGMED</small></div>
                                                                    <div class="kv-form-attribute" style="display:none">
                                                                        <div class="form-group highlight-addon field-documentroute-sendername">
                                                                            <div><input type="text" id="documentroute-sendername" class="form-control" name="Documentroute[senderName]" value="MARY JANICE BALAHADIA">
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