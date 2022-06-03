<div class="modal fade" id="itemModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="col-lg-12">
            <form id="form-add-item" method="GET">
                <div class="box box-primary">
                    <div class="box-body">
                        <div class="form-group">
                            <label>Item:</label>
                            <div class="input-group date">
                                <?= proc_group_select('Item', 'unit', $app_item_list, '1', '', '', false, '', true); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <?= proc_text_input('hidden', 'form-control', 'cform-app-items', 'cform-app-items', $required = true, ''); ?>
                            <?= proc_text_input('hidden', 'form-control', 'cform-item-title', 'cform-item-title', $required = true, ''); ?>
                            <?= proc_text_input('hidden', 'form-control', 'cform-stocknumber', 'cform-stocknumber', $required = true, ''); ?>
                            <?= proc_text_input('hidden', 'form-control', 'cform-unit-id', 'cform-unit-id', $required = true, ''); ?>
                            <?= proc_text_input('hidden', 'form-control', 'cform-pr-id', 'cform-pr-id', $required = true, $_GET['id']); ?>
                            <?= proc_text_input('hidden', 'form-control', 'cform-pr-no', 'cform-pr-no', $required = true, $get_pr['pr_no']); ?>
                            <?php foreach ($pmo as $key => $pmo_data) : ?>
                                <?php if ($pmo_data['id'] == $_GET['division']) : ?>
                                    <?= proc_text_input('hidden', 'form-control', 'cform-pmo', 'cform-pmo', $required = true, $pmo_data['id']); ?>
                                <?php endif; ?>

                            <?php endforeach ?>
                        </div>
                        <div class="form-group">
                            <label>Unit:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-balance-scale"></i>
                                </div>
                                <input type ="text" class="form-control" id="cform-unit-title" name="cform-unit" disabled/>

                            </div>
                        </div>
                        <div class="form-group">
                            <label>Quantity:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <?= proc_text_input('text', 'form-control', 'cform-quantity', 'cform-quantity', $required = true, ''); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>ABC:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type ="text" class="form-control" id="cform-abc"  disabled/>
                                <input type ="hidden" class="form-control" id="cform-abc-hidden" name="cform-abc" />


                            </div>
                        </div>

                        <div class="form-group">
                            <label>Description:</label>
                            <div class="input-group">
                                <textarea style="width: 550px; height: 138px;resize:none;" id="cform-description" name="cform-description"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <button class="btn btn-success btn-md col-lg-12" type="button" id="btn-add-item"> Add Item</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>