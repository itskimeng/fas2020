<!-- here -->
<div class="col-md-12">
    <form id="rfq_form" class="form-vertical">
        <div class="box box-info dropbox">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="btn-group">
                            <button type="button" class="btn-style btn-2 btn-sep icon-back" id="back">
                                <a href="procurement_request_for_quotation.php?division=<?= $_GET['division']; ?>" style="color:#fff;"> Back </a>
                            </button>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="pull-right">
                            <div class="btn-group">
                                <button type="button" class="btn-style btn-1 btn-sep icon-download" data-toggle="modal" data-target="#modal-default"> Download POS</button>
                                <button type="button" class="btn-style btn-3 btn-sep icon-save" id="btn_rfq_save"><i class="fa fa-save"></i> Save</button>

                                <button type="button" class="btn-style btn-4 btn-sep icon-export pull-right" style="margin-left:5px;">
                                    <a href="procurement_export_rfq.php?pr_no=<?= $_GET['id'];?>&rfq_no=<?= $_GET['rfq_no']?>&rfq_id=<?= $_GET['rfq_id'];?>&id=<?= $_GET['id']; ?>" style="color:#fff;"> Export </a>
                                </button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="box box-info dropbox">
            <div class="box-header">
                <h3 class="box-title"><i class="fa fa-info-circle"></i> Information</h3>

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
                                                    <th style="width: 20%; text-align: LEFT; vertical-align: MIDDLE;">Purchase No</th>
                                                    <td>
                                                        <div class="kv-attribute">

                                                            <?= proc_text_input('text', 'form-control col-lg-6', 'cform-pr-no', 'pr_no',  true, ''); ?>
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

                                                            <?= proc_text_input('text', 'form-control col-lg-6', 'cform-rfq', 'rfq',  true, $rfq_no['rfq_no']); ?>
                                                            <?= proc_text_input('hidden', 'form-control col-lg-6', 'rfq_no', 'rfq_no',  false, $rfq_no['rfq_no']); ?>
                                                            <?= proc_text_input('hidden', '', 'supplier_id', 'supplier_id', $required = false, '') ?>
                                                            <?= proc_text_input('hidden', '', 'cform-office', 'cform-office', $required = false, '') ?>
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
                                                                <?= proc_text_input('text', 'form-control', 'cform-amount', 'rfq',  true, ''); ?>

                                                            </div>
                                                        </div>
                                                        <div class=" kv-form-attribute" style="display:none">
                                                            <div class="form-group highlight-addon field-documentroute-doc_no required">
                                                                <div><input type="text" id="documentroute-doc_no" class="form-control" name="Documentroute[DOC_NO]" aria-required="true">
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
                                                            <textarea style="width: 708px; height: 125px;resize:none;" id="cform-textarea"></textarea>

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
                                                                <input readonly disable type="text" class="form-control pull-right info-dates" id="cform-pr_date" name="pr_date" value="">
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
                                                                <input readonly type="text" class="form-control pull-right info-dates" id="cform-target_date" name="target_date" value="">
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
                                                                <?= proc_text_input('text', 'form-control pull-right info-dates', 'cform-rfqdate', 'cform-rfqdate',  true, ''); ?>

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
                                                            <div id="cgroup-total_amount" class="input-group col-lg-12">
                                                                <?= proc_group_select('', 'mode', $rfq_mode_opts, $rfq_report_opt['mode_id'], 'mode', '', false, '', true); ?>
                                                                <?= proc_text_input('hidden', 'form-control', 'division', 'division',  true, $_GET['division']); ?>

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
                                                    <th style="width: 20%; text-align: LEFT; vertical-align: MIDDLE;">Office</th>
                                                    <td>
                                                        <div class="kv-attribute">
                                                            <div class="input-group date">
                                                                <div class="input-group-addon"><i class="fa fa-building"></i></div>
                                                                <?= proc_text_input('text', 'form-control', 'cform-pmo', 'cform-office',  true, ''); ?>

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
        </div>
    </form>
</div>
<?php include 'modal_pos.php'; ?>
<script>
    $(document).ready(function() {
        $('.select2').select2();

        $(document).ready(function() {
            $('#cform-rfqdate').datepicker({
                autoclose: true
            })
            let rfq_id = "<?= $_GET['rfq_id']; ?>";
            let path = 'GSS/route/post_rfq.php';
            let data = {
                id: rfq_id,
            };

            $.post(path, data, function(data, status) {
                let lists = JSON.parse(data);
                sample(lists);
            });

            function sample($data) {
                $.each($data, function(key, item) {
                    $('#cform-rfq').val(item.rfq_no);
                    $('#cform-pr-no').val(item.pr_no);
                    $('#cform-amount').val(item.amount);
                    $('#cform-textarea').val(item.purpose);
                    $('#cform-rfqdate').val(item.rfq_date);
                    $('#cform-pmo').val(item.office);
                    $('#cform-pr_date').val(item.pr_date);
                    $('#cform-target_date').val(item.target_date);
                    });

                return $data;
            }
        })

    })
    $(document).on('change', '.select2', function() {
        $('#supplier_id').val($(this).val());
        $('#pr_no').val($(this).val());
    })
</script>