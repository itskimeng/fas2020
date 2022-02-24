<div class="panel panel-primary" id="multiple_assigning">
    <div class="panel-heading">
        <span class="pull-right"></span>
        <i class="fa fa-list-ul"></i>Multiple Assigning of RFQ
    </div>
    <div class="box-body box-emp">
        <form method="POST" action="GSS/route/post_assign_multiple_rfq.php" class="form-vertical">
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
                                                <td style="width: 30%;">
                                                    <div class="kv-attribute">

                                                        <?= proc_text_input('hidden', 'form-control col-lg-6', 'division', 'division',  true, $_GET['division']); ?>
                                                        <select class="form-control select2 col-lg-6" multiple="multiple" name="multi_pr_no[]" data-placeholder="Select a State" style="width: 100%;">
                                                            <?php foreach ($rfq_pr_opts as $key => $data) : ?>
                                                                <option> <?= $data['pr_no']; ?> </option>
                                                            <?php endforeach; ?>
                                                        </select>
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
                                                            <input placeholder="Amount" type="text" name="amount" class="form-control" id="amount1" value="" readonly>
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
                                                        <textarea disabled id="purpose1" name="purpose" style="width: 686px; height: 178px;resize:none;">

                                                        </textarea>

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
                                                <th style="width: 20%; text-align: LEFT; vertical-align: MIDDLE;">RFQ Date</th>
                                                <td>
                                                    <div class="kv-attribute">
                                                        <div class="input-group date">
                                                            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                                            <input type="text" class="form-control pull-right info-dates" id="rfq_date" name="rfq_date" "required=" required" "="" value=" <?= date('F d, Y'); ?>">

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
                                                            <?= group_select('', 'mode', $mode_opts, '', 'select2', '', false, '', true); ?>


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
                                                            <select class="form-control" name="pmo">
                                                                <?php foreach ($pmo as $key => $pmo_data) : ?>
                                                                    <?php if ($pmo_data['id'] == $_GET['division']) : ?>
                                                                        <option value="<?php echo $pmo_data['id']; ?>" data-code="<?php echo $pmo_data['office']; ?>" selected disabled="disabled"><?php echo $pmo_data['office']; ?></option>
                                                                    <?php else : ?>
                                                                        <option value="<?php echo $pmo_data['id']; ?>" data-code="<?php echo $pmo_data['office']; ?>"><?php echo $pmo_data['office']; ?></option>
                                                                    <?php endif ?>
                                                                <?php endforeach ?>
                                                            </select>
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
            <?= proc_action_btn('CREATE RFQ', '', '', 'btn btn-flat bg-purple col-lg-12', '', '', '', 'fa fa-excel-o', 'submit'); ?>

        </form>
    </div>

</div>  