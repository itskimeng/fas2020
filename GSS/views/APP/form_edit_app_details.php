<div class="box-body">
    <?= proc_text_input('hidden', '', 'office_id','office_id', false, $_GET['division']);?>
    <div class="col-md-6">
        <div class="form-group"><label for="stockNo">Stock No</label><input readonly type="text" class="form-control" id="stockNo" name="stockNo" value="<?= $app_opts['sn']; ?>"></div>
        <div class="form-group"><label for="code">Code</label><input type="text" class="form-control" id="code" name="code" required="" value="<?= $app_opts['code']; ?>"></div>
        <div class="form-group"><label for="stockNo">Item Title</label><input type="text" class="form-control" id="itemTitle" name="itemTitle" required="" value="<?= $app_opts['title']; ?>"></div> <label for="Unit">Unit</label>

        <?= group_select('Unit', 'unit', $app_unit, $app_opts['unit'], 'select2', '', false, '', true); ?>
        <label for="Unit">Source of Funds</label>
        <?= group_select('Source of Funds', 'sf', $app_sf, $app_opts['fund_source'], 'select2', '', false, '', true); ?>


    </div>
    <div class="col-md-6">

        <div class="form-group">
            <label for="itemTitle">Category <i style="color: red;">*</i></label>
            <select id="cform-category" name="category" class="form-control select2" data-placeholder="-- Select Category --" required="1" style="width: 100%;" data-select2-id="cform-category" tabindex="-1" aria-hidden="true">
                <?php foreach ($app_category as $key => $item) : ?>
                    <?php
                    if ($app_opts['category'] == $item['id']) {
                        echo '<option selected value="' . $item['id'] . '">' . $item['category'] . '</option>';
                    } else {
                        echo '<option  value="' . $item['id'] . '">' . $item['category'] . '</option>';
                    }
                    ?>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="itemTitle">Office <i style="color: red;">*</i></label>
            <?= group_select('Office', 'office', $pmo_list, $app_opts['office'], 'select2', '', false, '', true); ?>

        </div>
        <div class="form-group"><label for="stockNo">Quantity</label><input type="number" class="form-control" id="qty" name="qty" required value="<?= $app_opts['quantity']; ?>"></div>
        <div class="form-group"><label for="stockNo">APP Price</label><input type="text" class="form-control" id="" name="app_price" required="" value="<?= $app_opts['app_price']; ?>"></div>
        <div class="form-group">
            <label for="Unit">Mode of Procurement</label>
            <?= group_select('Mode of Procurement', 'mode', $app_mode, $app_opts['mode'], 'select2', '', false, '', true); ?>

        </div>


    </div>
    <hr>
    <div class="col-md-12 pull-right">
        <div class="form-group">
            <button class="btn btn-flat bg-green" type="button" id="btn_app_edit">Save</button>
        </div>
    </div>

</div>