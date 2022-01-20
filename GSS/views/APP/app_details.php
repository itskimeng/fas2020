<div class="panel panel-primary">
    <div class="panel-heading">
        <span class="glyphicon glyphicon-info-sign"></span> Please provide the needed information below. Fill out all the required fields (<i style="color: red;">*</i>).
    </div>
    <form role="form" id="app_form">
        <div class="box-body">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="stockNo">Stock No.</label>
                    <?= app_text_input('text', 'form-control', 'stock_number', 'stockNo', false, 'S' . $app_stockn); ?>
                </div>
                <div class="form-group">
                    <label for="code">Code <i style="color: red;">*</i></label>
                    <?= app_text_input('text', 'form-control', 'code', 'code', true, ''); ?>

                </div>
                <div class="form-group">
                    <label for="itemTitle">Item Title <i style="color: red;">*</i></label>
                    <?= app_text_input('type', 'form-control', 'itemTitle', 'itemTitle', true, ''); ?>
                </div>
                <div class="form-group">
                    <label>Unit <i style="color: red;">*</i></label>
                    <select class="form-control select2" style="width: 100%;" name="unit" data-placeholder="--Select Unit --">';
                        <?php foreach ($app_unit as $key => $item) : ?>
                            <option value="<?= $item['item_unit'] ?>"><?= $item['item_unit'] ?></option>
                        <?php endforeach; ?>
                    </select>

                </div>
                <div class="form-group">
                    <fieldset>
                        <legend style="size:10px;">Source of Fund <i style="color: red;">*</i></legend>
                    </fieldset>
                    <div class="col-md-12">
                        <label style="display:inline-block;line-height:35px;">
                            <?= app_text_input('checkbox', 'minimal form-check-input check-funds', 'stockNo', 'sf[]', false, 'RLTF'); ?>
                            Regular, Local and Trust Fund
                        </label>

                    </div>
                    <div class="col-md-12">
                        <label style="display:inline-block;line-height:35px;">
                            <?= app_text_input('checkbox', 'minimal form-check-input check-funds', 'stockNo', 'sf[]', true, 'LF'); ?> Local Fund
                            <label>

                    </div>
                    <div class="col-md-12">
                        <label style="display:inline-block;line-height:35px;">

                            <?= app_text_input('checkbox', 'minimal form-check-input check-funds', 'stockNo', 'sf[]', true, 'RF'); ?> Regular Fund
                        </label>

                    </div>

                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Remarks<i style="color: red;">*</i></label>
                    <?= app_text_input('text', 'form-control', 'stockNo', 'remarks', true, ''); ?>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="itemTitle">Category <i style="color: red;">*</i></label>
                    <select class="form-control select2" style="width: 100%;" id="category" name="category" data-placeholder="--Select Category --">';
                        <?php foreach ($app_category as $key => $item) : ?>
                            <option value="<?= $item['category'] ?>"><?= $item['category'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="itemTitle">Office <i style="color: red;">*</i></label>
                    <select class="form-control select2 " style="width: 100%;" id="office" name="office" disabled>
                        <?php foreach ($pmo_list as $key => $office) : ?>
                            <?php if ($office['id'] == $division) : ?>
                                <option value="<?php echo $office['id']; ?>" data-code="<?php echo $office['pmo']; ?>" selected><?php echo $office['pmo']; ?></option>
                            <?php else : ?>
                                <option value="<?php echo $office['id']; ?>" data-code="<?php echo $office['pmo']; ?>"><?php echo $office['pmo']; ?></option>
                            <?php endif ?>
                        <?php endforeach ?>

                    </select>



                </div>
                <div class="form-group">
                    <label for="code">Quantity <i style="color: red;">*</i></label>
                    <?= app_text_input('number', 'form-control', 'qty', 'qty', true, ''); ?>
                </div>
                <div class="form-group">
                    <label for="itemTitle">APP Price<i style="color: red;">*</i></label>
                    <?= app_text_input('type', 'form-control', '', 'app_price', true, ''); ?>
                </div>
                <div class="form-group">
                    <fieldset>
                        <legend>Mode of Procurement</legend>
                        <div class="col-md-4">
                            <label style="display:inline-block;line-height:35px;">
                                <?= app_text_input('checkbox', 'minimal form-check-input check-mode', 'stockNo', 'mode[]', true, '2'); ?> Shopping
                            </label>
                        </div>
                        <div class="col-md-4">
                            <label style="display:inline-block;line-height:35px;">
                                <?= app_text_input('checkbox', 'minimal form-check-input check-mode', 'stockNo', 'mode[]', true, '4'); ?> NP Lease of Venue
                            </label>
                        </div>
                        <div class="col-md-4">
                            <label style="display:inline-block;line-height:35px;">
                                <?= app_text_input('checkbox', 'minimal form-check-input check-mode', 'stockNo', 'mode[]', true, '5'); ?> Direct Contracting
                            </label>
                        </div>
                        <div class="col-md-4">
                            <label style="display:inline-block;line-height:35px;">
                                <?= app_text_input('checkbox', 'minimal form-check-input check-mode', 'stockNo', 'mode[]', true, '6'); ?> Agency to Agency
                            </label>
                        </div>
                        <div class="col-md-4">
                            <label style="display:inline-block;line-height:35px;">
                                <?= app_text_input('checkbox', 'minimal form-check-input check-mode', 'stockNo', 'mode[]', true, '7'); ?> Public Bidding
                            </label>
                        </div>
                        <div class="col-md-4">
                            <label style="display:inline-block;line-height:35px;">
                                <?= app_text_input('checkbox', 'minimal form-check-input check-mode', 'stockNo', 'mode[]', true, '8'); ?> Not Applicable
                            </label>
                        </div>
                        <div class="col-md-12">
                            <label style="display:inline-block;line-height:35px;">
                                <?= app_text_input('checkbox', 'minimal form-check-input check-mode', 'stockNo', 'mode[]', true, '1'); ?> Small Value Procurement
                            </label>
                        </div>
                    </fieldset>
                </div>


            </div>
            <hr>
            <div class="col-md-12 ">
                <div class="form-group">
                    <button type="button" id="btnsubmit" class="btn btn-success"><i class="fa fa-save"></i> Save Record</button>
                    <button type="reset" class="btn btn-default">CLEAR</button>
                </div>
            </div>
    </form>
</div>
