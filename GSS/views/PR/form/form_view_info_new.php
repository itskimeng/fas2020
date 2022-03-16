<button class="btn btn-warning"><i class="fa fa-arrow-circle-left"></i> <a class="link" href="<?= $path ?>/../../../procurement_purchase_request.php?division=<?= $_GET['division']; ?>">Back</a></button>


<div class="box box-primary dropbox">
    <div class="ribbon ribbon-top-right"></div>
    <div class="box-header">
        <h3 class="box-title"><i class="fa fa-book"></i>Purchase Request
        </h3>
        <button class="btn btn-info pull-right" type="button"><?= $pr_data['status']; ?></button>
    </div>
    <div class="box-body no-padding">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped">
                    <tbody>
                        <tr>
                            <th class="text-center">
                                <label STYLE="line-height:35px;">TOTAL FUND: 1000</label>
                            </th>
                            <th class="text-center">
                                <?php if ($pr_data['is_urgent'] == 1) : ?>
                                    <?php $checked = "checked"; ?>
                                <?php endif; ?>
                                <input type="checkbox" <?= $checked; ?> class="minimal form-check-input" name="chk-urgent" value="1" />
                                <label STYLE="line-height:35px;">URGENT</label>
                            </th>

                        </tr>
                        <tr class="custom-tb-header">
                            <th class="text-center">PR No.</th>
                            <th class="text-center">Office</th>
                            <th class="text-center">Type</th>
                            <th class="text-center">Fund Source</th>
                            <th class="text-center">PR Date</th>
                            <th class="text-center">Target Date</th>

                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <input placeholder="PR Number" type="text" name="pr_no" class="form-control serial_no" value="<?= $pr_data['pr_no']; ?>" readonly novalidate="">
                                </div>
                            </td>
                            <td>
                                <div id=" cgroup-po_no[]" class="form-group">
                                    <?= proc_text_input("hidden", '', 'cform-pmo', 'cform-pmo', false, $_GET['division']); ?>

                                    <input type="text" name="office" class="form-control" value="<?= $pr_data['office']; ?>" readonly novalidate="">

                                </div>
                            </td>
                            <td>
                                <div class=" form-group">

                                    <?= group_select('Type', 'type', $type_opt, $pr_data['mode'], '', '', false, '', true); ?>
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <?= group_select('Fund Source', 'cform-found-source', $fs_opt, $pr_data['fs'], '', '', false, '', true); ?>
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <div class="input-group date">
                                        <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                        <?= proc_text_input("text", "form-control pull-right info-dates", "datepicker1", "pr_date", true, $pr_data['pr_date']); ?>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <div class="input-group date">
                                        <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                        <?= proc_text_input("text", "form-control pull-right info-dates", "datepicker2", "target_date", true, $pr_data['target_date']); ?>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr class="custom-tb-header">

                            <th class="text-center" colspan="6">Particulars/Purpose</th>
                        </tr>
                        <tr>
                            <td colspan="6">
                                <div class="form-group">
                                    <textarea style="resize:none;" id="cform-particulars" name="purpose" class="form-control particulars[]" rows="3"><?= $pr_data['purpose']; ?></textarea>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="box box-primary dropbox">
    <div class="box-header">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-book"></i> Add Item
        </button>
        <div class="box-tools pull-right"><button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button><button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button></div>
    </div>
    <div class="box-body no-padding container">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped table-responsive" id="item_table">
                    <th class="bg-blue">Stock No.</th>
                    <th class="bg-blue">Unit</th>
                    <th class="bg-blue">Item</th>
                    <th class="bg-blue">Description</th>
                    <th class="bg-blue">Quantity</th>
                    <th class="bg-blue">Unit Cost</th>
                    <th class="bg-blue">Total Cost</th>
                    <th class="bg-blue">Action</th>
                    <tbody id="tbody_item">

                    </tbody>
                    <?php foreach ($pr_items as $key => $data) : ?>
                        <tr>
                            <td><?= $data['stock_number']; ?></td>
                            <td><?= $data['unit']; ?></td>
                            <td><?= $data['items']; ?></td>
                            <td style="width:10%"><?= $data['description']; ?></td>
                            <td><?= $data['qty']; ?></td>
                            <td>
                                ₱<?= number_format($data['total'], 2); ?>
                            </td>
                            <td>
                                ₱<?= number_format($data['abc'], 2); ?>
                            </td>
                            <td>
                                <button class='btn btn-danger btn-sm col-lg-12' id='btn-delete'><i class='fa fa-trash'></i> Remove</button>
                                <button class='btn btn-info btn-sm col-lg-12' style='color:#fff;'><i class='fa fa-eye'></i> <a style='color:#fff;' target='_blank' href='https://www.google.com/search?q=" + cellVal3 + "&oq=" + cellVal3 + "'>Item Reference</a></button>
                            </td>

                        </tr>

                    <?php endforeach; ?>
                    <tr id="td_hidden" hidden>
                        <td colspan="8">
                            <label>Instruction/ Additional Notes</label>
                            <textarea class="form-control"> </textarea>
                        </td>
                        <td>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
<button class="btn btn-success col-lg-12 pull-right" type="button" id="btn_edit_pr" value="<?= $pr_data['pr_no']; ?>"><i class="fa fa-save"></i> Save</button>

<style>
    .form-control {
        display: block;
        width: 100%;
        height: 40px;
        font-size: large;
        font-weight: 400;
        line-height: 1.5;
        color: #495057;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid #ced4da;
        border-radius: 0.25rem;
        box-shadow: inset 0 0 0 transparent;
        transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
        transition: none;
    }

    .dataTables_filter {
        text-align: left !important;
    }

    .btn-warning {
        margin-bottom: 5px !important;
    }

    .link {
        color: #fff;
    }
</style>