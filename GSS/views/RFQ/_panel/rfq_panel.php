<form id="rfq_form" class="form-vertical">
    <div class="box box-info dropbox">
        <div class="box-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="btn-group">
                        <button type="button" class="btn-style btn-2 btn-sep icon-back" id="back">
                             Back 
                        </button>
                    </div>

                </div>
                <div class="col-md-6">
                    <div class="pull-right">


                        <div class="btn-group">
                            <button type="button" class="btn-style btn-3 btn-sep icon-save btn-create-rfq" id="create"><i class="fa fa-save"></i> Save</button>
                            <!-- <button type="button" class="btn btn-md btn-success btn-create-rfq" id="create" name="save"><i class="fa fa-edit"></i> Save</button> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="box box-info dropbox" id="rfq_panel">
        <div class="box-header">
            <h3 class="box-title"><i class="fa fa-info-circle"></i> Information</h3>
            <div class="switchToggle pull-right">
                <input type="checkbox" id="cform-dfunds" class="dfunds" name="dfunds"><label for="cform-dfunds">Assign Multiple PR's</label>
                <span>&nbsp; <b>Assign Multiple PR's</b></span>
            </div>
        </div>
        <div class="box-body">
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
                                                        <?= proc_text_input('hidden', 'form-control col-lg-6', 'pr_id', 'pr_id',  false, ''); ?>
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
                                                        <!-- //proc_text_input('text', 'form-control col-lg-6', 'purpose', 'purpose',  true, ''); -->
                                                        <?= group_textarea('', 'purpose', '', $label_size = 1, $required = true, $readonly = false, $rowsize = 3) ?>
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
                                                    <div>
                                                        <div class="input-group date">
                                                            <!-- <input type="text" class="form-control pull-right" name="mode" id="mode"> -->
                                                            <?= proc_group_select('', 'mode', $rfq_mode_opts, '', 'form-control select2', 0, false, '', true) ?>

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
                                                            <input type="hidden" class="form-control pull-right" name="pmo_id" id="pmo_id">

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

<style>
    .mode_of_proc {
        width: 10%;
    }
</style>
<script>
    $(document).ready(function() {
        $(document).ready(function() {
            $('#datepicker1').datepicker({
                autoclose: true
            })
            let pr = '<?= $_GET['pr_no']; ?>';
            let path = 'GSS/route/post_rfq.php';
            let data = {
                pr_no: pr,
            };

            $.post(path, data, function(data, status) {
                let lists = JSON.parse(data);
                sample(lists);
                appendAPPItems(lists);
            });

            function sample($data) {
                $.each($data, function(key, item) {
                    $('#pr_no').val(item.pr_no);
                    $('#pr_id').val('<?= $_GET['id']; ?>');
                    $('#abc').val(item.abc);
                    $('#qty').val(item.qty);
                    $('#items').val(item.items);
                    $('#description').val(item.description);
                    $('#unit').val(item.unit);
                    $('#create').val(item.pr_no);
                    $('#cform-purpose').val(item.purpose);
                    $('.mode_of_proc').val(item.mode);
                    $('#pr_date').val(item.pr_date);
                    $('#target_date').val(item.target_date);
                    $('#cform-total_amount').val(item.amount);
                    $('#office').val(item.office);
                    $('#pmo_id').val(item.pmo_id);
                    $('#amount').val(item.abc);
                });

                return $data;
            }

            function appendAPPItems($data) {
                $.each($data, function(key, item) {
                    let tr = '<tr>';
                    tr += '<td> <input type="hidden" value="' + item['items'] + '" name="app_id[]" /></td>';
                    tr += '</tr>';
                    $('#app_items').append(tr);
                });
                return $data;
            }

        })

        $('#pr_no').prop('readonly', true);
        $('#cform-total_amount').prop('readonly', true);
        $('#office').prop('readonly', true);
        $('#rfq').prop('readonly', false);

    })
</script>