<div class="modal fade" id="editItemModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="col-lg-12">
            <form id="form-edit-item" method="GET">
                <div class="box box-primary">
                    <div class="box-body">
                        <div class="form-group">
                            <label>Items:</label>
                            <div class="input-group date">
                                <?= proc_group_select('Item', 'unit_item', $app_item_list, '1', '', '', false, '', true); ?>
                                <?= proc_text_input('text', 'form-control', 'app-id', 'app-id', $required = true, ''); ?>
                                <?= proc_text_input('text', 'form-control', 'app-items', 'app-items', $required = true, ''); ?>

                            </div>
                        </div>
                        <div class="form-group">

                            <?= proc_text_input('hidden', 'form-control', 'item-title', 'item-title', $required = true, ''); ?>
                            <?= proc_text_input('hidden', 'form-control', 'stocknumber', 'stocknumber', $required = true, ''); ?>
                            <?= proc_text_input('hidden', 'form-control', 'unit-id', 'unit-id', $required = true, ''); ?>
                            <?= proc_text_input('hidden', 'form-control', 'pr-id', 'pr-id', $required = true, $_GET['id']); ?>
                            <?= proc_text_input('hidden', 'form-control', 'pr-no', 'pr-no', $required = true, $_GET['pr_no']); ?>
                            <?php foreach ($pmo as $key => $pmo_data) : ?>
                                <?php if ($pmo_data['id'] == $_GET['division']) : ?>
                                    <?= proc_text_input('hidden', 'form-control', 'pmo', 'pmo', $required = true, $pmo_data['id']); ?>
                                <?php endif; ?>

                            <?php endforeach ?>
                        </div>
                        <div class="form-group">
                            <label>Unit:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <?= proc_text_input('text', 'form-control', 'unit', 'unit', $required = true, ''); ?>

                            </div>
                        </div>
                        <div class="form-group">
                            <label>Quantity:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <?= proc_text_input('text', 'form-control', 'quantity', 'quantity', $required = true, ''); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>ABC:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <?= proc_text_input('text', 'form-control', 'abc', 'abc', $required = true, ''); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Description:</label>
                            <div class="input-group">
                                <textarea style="width: 550px; height: 138px;resize:none;" id="description" name="description"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <button class="btn btn-primary btn-md col-lg-12 pull-right" type="button" id="btn-edit-item"><i class="fa fa-edit"></i> Update Item</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>