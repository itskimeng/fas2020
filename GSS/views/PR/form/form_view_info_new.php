<div class="box box-primary dropbox">
    <div class="box-body">
        <div class="row">
            <div class="col-md-6">
                <div class="btn-group">
                    <button class="btn btn-warning"><i class="fa fa-arrow-circle-left"></i> <a class="link" href="<?= $path ?>/../../../procurement_purchase_request.php?division=<?= $_GET['division']; ?>">Back</a></button>

                </div>
            </div>
            <div class="col-md-6">
                <div class="pull-right">
                    <div class="btn-group">

                        <button type="button" id="modalButton" class="btn btn-flat bg-purple pull-right " value="/documentroute/createreject?routeno=1751014&amp;docno=R4A-2021-07-27-001&amp;receivedfrom=1551&amp;userid=8516"><i class="fa fa-file-excel-o"></i><a style="color:#fff;" href="export_pr.php?pr_no=<?= $_GET['pr_no']; ?>"> EXPORT PR</a></button>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<div class="box box-primary dropbox">
    <div class="ribbon ribbon-top-right"></div>
    <div class="box-header">
        <h3 class="box-title"><i class="fa fa-book"></i>Purchase Request
        </h3>
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
                        <tr class="custom-tb-header bg-primary">
                            <th class="text-center bg-blue">PR No.</th>
                            <th class="text-center bg-blue">Office</th>
                            <th class="text-center bg-blue">Type</th>
                            <!-- <th class="text-center bg-blue">Fund Source</th> -->
                            <th class="text-center bg-blue">PR Date</th>
                            <th class="text-center bg-blue">Target Date</th>

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
                                    <?php
                                    if ($pr_data['stat'] == 1 || $pr_data['stat'] == 2 || $pr_data['stat'] == 4 || $pr_data['stat'] == 5 || $pr_data['stat'] == 7 || $pr_data['stat'] == 8) {
                                    } else {
                                        echo proc_group_select('Type', 'type', $type_opt, $pr_data['pr_type'], '', '', true, '', true);
                                    }
                                    ?>
                                </div>
                            </td>
                            <!-- <td>
                                <div class="form-group">
                                     //group_select('Fund Source', 'cform-found-source', $fs_opt, $pr_data['fs'], '', '', false, '', true); 
                                </div>
                            </td> -->
                            <td>
                                <div class="form-group">
                                    <div class="input-group date">
                                        <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                        <?php
                                      
                                            echo proc_text_input("text", "form-control pull-right info-dates", "datepicker1", "pr_date", true, $pr_data['pr_date']);
                                        
                                        ?>
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
        <?php
        if ($pr_data['stat'] == 1 || $pr_data['stat'] == 2 ||   $pr_data['stat'] == 3 || $pr_data['stat'] == 4 || $pr_data['stat'] == 5 || $pr_data['stat'] == 7 || $pr_data['stat'] == 8) {
        } else {
        ?>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                <i class="fa fa-book"></i> Add Item
            </button>

        <?php
        } ?>

    </div>
    <div class="box-body no-padding">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped table-responsive" id="item_table">
                    <th class="bg-blue">Stock No.</th>
                    <th class="bg-blue">Unit</th>
                    <th class="bg-blue">Item</th>
                    <th class="bg-blue" style="width:45%;text-align: left;">Description</th>
                    <th class="bg-blue">Quantity</th>
                    <th class="bg-blue">Unit Cost</th>
                    <th class="bg-blue" style="width:15%">Total Cost</th>
                    <?php
                    if ($pr_data['stat'] == 1 || $pr_data['stat'] == 2 ||   $pr_data['stat'] == 3 || $pr_data['stat'] == 4 || $pr_data['stat'] == 5 || $pr_data['stat'] == 7 || $pr_data['stat'] == 8) {
                    } else {
                    ?>
                        <th class="bg-blue">Action</th>

                    <?php
                    } ?>
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
                                ₱<?= number_format($data['abc'], 2); ?>
                            </td>
                            <td>
                                ₱<?= number_format($data['total']* $data['qty'],2); ?>

                            </td>
                            <?php
                            if ($pr_data['stat'] == 1 || $pr_data['stat'] == 2 ||  $pr_data['stat'] == 3 || $pr_data['stat'] == 4 || $pr_data['stat'] == 5 || $pr_data['stat'] == 7 || $pr_data['stat'] == 8) {
                            } else {
                            ?>
                                <td>
                                    <button type="button" class='btn btn-primary btn-md' id='btn-edit' value="<?= $data['stock_number']; ?>" data-toggle="modal" data-target="#pr_modal_edit"><i class='fa fa-edit'></i></button>
                                    <button class='btn btn-danger btn-md' id='btn-delete' value="<?= $data['id']; ?>"><i class='fa fa-trash'></i></button>
                                </td>

                            <?php
                            }
                            ?>


                        </tr>

                    <?php endforeach; ?>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="pull-right" colspan=10 style="color:red;font-weight:bold;">
                            TOTAL ABC
                        </td>
                        <td>₱ <?= number_format($pr['total'], 2); ?></td>
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
<?php

if ($pr_data['stat'] == 1 || $pr_data['stat'] == 2 || $pr_data['stat'] == 3 || $pr_data['stat'] == 4 || $pr_data['stat'] == 5 || $pr_data['stat'] == 7 || $pr_data['stat'] == 8) {
} else {
?>
    <button class="btn btn-success col-lg-12 pull-right" type="button" id="btn_edit_pr" value="<?= $pr_data['pr_no']; ?>"><i class="fa fa-save"></i> Save</button>

<?php
}
?>

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
<script>


</script>