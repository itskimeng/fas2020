<button class="btn btn-warning"><i class="fa fa-arrow-circle-left"></i> <a class="link" href = "<?= $path?>/../../../procurement_purchase_request.php">Back</a></button>
<div class="box box-primary dropbox">
    <div class="box-header">
        <h3 class="box-title"><i class="fa fa-book"></i>Purchase Request</h3>
        <div class="box-tools pull-right"><button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button><button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button></div>
    </div>
    <div class="box-body no-padding">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped">
                    <tbody>
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
                                    <input placeholder="PR Number" type="text" name="pr_no" class="form-control serial_no" value="<?= $get_pr['pr_no']; ?>" readonly novalidate="">
                                </div>
                            </td>
                            <td>
                                <div id=" cgroup-po_no[]" class="form-group">
                                    <select class="form-control" name="pmo">



                                        <?php foreach ($pmo as $key => $pmo_data) : ?>
                                            <?php if ($pmo_data['id'] == $_GET['division']) : ?>
                                                <option value="<?php echo $pmo_data['id']; ?>" data-code="<?php echo $pmo_data['office']; ?>" selected><?php echo $pmo_data['office']; ?></option>
                                            <?php else : ?>
                                                <option value="<?php echo $pmo_data['id']; ?>" data-code="<?php echo $pmo_data['office']; ?>"><?php echo $pmo_data['office']; ?></option>
                                            <?php endif ?>
                                        <?php endforeach ?>



                                    </select>
                                </div>
                            </td>
                            <td>
                                <div class=" form-group">
                                    <div class="input-group date">
                                        <div class="input-group-addon"><i class="fa fa-wrench"></i>
                                        </div>
                                        <select required class="form-control " style="width: 100%;" name="type" id="type">
                                            <option value="1">Catering Services</option>
                                            <option value="2">Meals, Venue and Accommodation</option>
                                            <option value="5">Other Services</option>
                                            <option value="3">Repair and Maintenance</option>
                                            <option value="6">Reimbursement and Petty Cash</option>
                                            <option value="4">Supplies, Materials and Devices</option>
                                        </select>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <div class="input-group date">
                                        <div class="input-group-addon"><i class="fa fa-money"></i></div>
                                        <select required class="form-control " style="width: 100%;" name="fund_source" id="type">
                                            <option value="1">TF</option>
                                            <option value="2">TF Regular</option>
                                            <option value="5">Regular Fund</option>

                                        </select>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <div class="input-group date">
                                        <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                        <?= proc_text_input("text", "form-control pull-right info-dates", "datepicker1", "pr_date", true, '') ?>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <div class="input-group date">
                                        <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                        <?= proc_text_input("text", "form-control pull-right info-dates", "datepicker2", "target_date", true, '') ?>
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
                                    <textarea style="resize:none;" id="cform-particulars[]" name="purpose" class="form-control particulars[]" rows="3"></textarea>
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
    <div class="box-body no-padding">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped" id="item_table">
                    <th>Stock No.</th>
                    <th>Unit</th>
                    <th>Item</th>
                    <th>Description</th>
                    <th>Quantity</th>
                    <th>Unit Cost</th>
                    <th>Total Cost</th>
                    <th>Action</th>
                    <tbody id="tbody_item">

                    </tbody>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td style="text-align:right;color:red;font-weight:bolder;">TOTAL COST</td>
                        <td><span id="total_val"></span></td>
                    </tr>
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
<button class="btn btn-success col-lg-6 pull-right" type="button" id="btn_submit"><i class="fa fa-save"></i> Save</button>



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
    .btn-warning{
        margin-bottom: 5px  !important;
    }
    .link{
        color:#fff;
    }
    
</style>