<div class="box box-info container" style="  box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23);">
    <div class="box-header with-border" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="true" aria-controls="collapseExample" style="cursor: pointer;">
        <b>Add Supplier Quote</b>
        <div class="pull-right">
        </div>
    </div>
    <div>
        <div class="collapse in" id="collapseExample" aria-expanded="true">
            <br>
            <div class="card card-body">
                <div class="document-track-search">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group field-documenttracklatestsearch-category">
                                <?= group_select('Supplier', 'supplier', $supplier_award_opts, '', 'select2 supplier_list', '', false, '', true); ?>
                                <div class="help-block"></div>
                            </div>
                            <form method="POST" action="GSS/route/post_awarding.php">
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
                                                                <td hidden><input type="hidden" name="rfq_item_id[]" value="<?= $item['item_id']; ?>" /></td>
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
                                <?= proc_action_btn('Save', '', 'btn_rfq_awarding', 'btn-style btn-1 icon-save btn-sep', '', '', '', '', 'submit'); ?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>