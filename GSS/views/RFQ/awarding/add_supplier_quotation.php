<div class="box box-info container" style="  box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23);">
    <div class="box-header with-border" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="true" aria-controls="collapseExample" style="cursor: pointer;">
        <b>Add Supplier Quote</b>
        <div class="pull-right">
        </div>
    </div>
    <div>
        <div>
            <br>
            <div class="card card-body">
                <div class="document-track-search">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group field-documenttracklatestsearch-category">
                                <?= proc_group_select('Supplier', 'supplier', $supplier_award_opts, '', 'select2 supplier_list', '', false, '', true); ?>
                                <div class="help-block"></div>
                            </div>
                            <form id="supplier_quotation">
                                <?= proc_text_input('hidden', '', 'cform-rfq-no-awarded', 'cform-rfq-no-awarded', $required = false, $_GET['rfq_no']) ?>
                                <?= proc_text_input('hidden', '', 'cform-pr-no-awarded', 'cform-pr-no-awarded', $required = false, $_GET['pr_no']) ?>
                                <?= proc_text_input('hidden', '', 'cform-rfq-id', 'rfq_id', $required = false, $ids['id']) ?>
                                <div>
                                    <div class="box-body table-responsive">
                                        <div id="p0" data-pjax-container="" data-pjax-push-state="" data-pjax-timeout="1000">

                                            <div id="w1" class="grid-view">
                                                <table class="table table-striped table-bordered" id="quotation_table" style="max-height: 500px;height: 210px !important;overflow: auto !important;">
                                                    <thead>
                                                        <tr>
                                                            <th>Item</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $count = ''; ?>
                                                        <?php foreach ($rfq_items as $key => $item) : ?>
                                                            <tr>
                                                                <td><?= $item['item']; ?></td>
                                                                <?php
                                                                if (count($pr_items) == 1) {
                                                                    echo '<td hidden><input type="text" name="rfq_item_id" value="' . $item['item_id'] . '" /></td>';
                                                                } else {
                                                                    echo '<td hidden><input type="text" name="rfq_item_id[]" value="' . $item['item_id'] . '" /></td>';
                                                                }
                                                                ?>
                                                            </tr>
                                                            <?php $count++; ?>
                                                        <?php endforeach; ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <?= proc_action_btn('Back', '', 'btn_rfq_back', 'btn-style btn-2 icon-back btn-sep', '', '', '', '', '#'); ?>
                                <?= proc_action_btn('Select Supplier', '', 'append_supplier', 'btn-style btn-1 icon-choose btn-sep', '', '', '', '', '#'); ?>
                                <?= proc_action_btn('Save', '', 'btn_rfq_awarding', 'btn-style btn-1 icon-save btn-sep', '', '', '', '', '#'); ?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    generateQuotationTable();
    $(document).on('change', '#cform-supplier', function() {
        let supplier_id = $(".supplier_list").find(':selected').attr('data-id');
        let supplier_value = $(".supplier_list").find(':selected').attr('data-value');
        let isExists = false;

        $('#btn_rfq_awarding').show();

        let tr = '<th>';
        tr += supplier_id;
        tr += '<th hidden><input type="hidden" value="' + supplier_value + '" id="selected_supplier" name="selected_supplier" />';
        tr += '</th>';

        let row = '';
        row += '<td><div id="cgroup-total_amount" class="input-group col-lg-12"> <span class="input-group-addon"><strong>₱</strong></span> ';
        row += '<input type="number" class="form-control" id="supplier_price"  name="supplier_price[]">';
        row += '</div></td>';
        $("#quotation_table>thead>tr").append(tr);
        $("#quotation_table>tbody>tr").append(row);
        $('#append_supplier').hide();
        $('#append_supplier').hide();
        $('#btn_rfq_back').show();
        $(this).prop('disabled', true);
    })
    $(document).on('click', '#btn_rfq_awarding', function() {
        let form = $('#supplier_quotation').serialize();
        $.get({
            url: 'GSS/route/post_awarding.php?' + form,
            success: function(data) {
                generateQuotationTable();
                $('#cform-supplier').prop('disabled', false);
                loadItems();

            }
        })
    })

    function generateQuotationTable() {
        $.post({
            url: 'GSS/views/RFQ/form/quotation.php',
            data: {
                id: '<?= $_GET['rfq_id']; ?>'
            },
            success: function(data) {
                $('#quotation').html(data);
            }
        })

    }

    function loadItems() {
        $.post({
            url: 'GSS/views/RFQ/form/items.php',
            data: {
                pr_no: '<?= $_GET['pr_no']; ?>'
            },
            success: function(data) {
                $('#quotation_table').html(data);
            }
        })

    }
</script>