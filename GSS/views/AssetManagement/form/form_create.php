<?php require_once 'GSS/controller/AssetManagementController.php'; ?>

<div class="content-wrapper">
    <section class="content-header">
        <h1><b>IAR No: <?= $iar_no['count_r']; ?></b></h1>

        <ol class="breadcrumb">
            <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Procurement</a></li>
            <li>Asset Management</li>
            <li>IAR </li>
            <li class="active">Create IAR</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <form action="GSS/route/post_create_iar.php" method="POST">
                <?= proc_text_input('hidden', 'form-control', 'cform-iar-no', 'iar_no', false,  $iar_no['count_r']); ?>
                <?= proc_text_input('hidden', 'form-control', 'cform-pr-no', 'pr_no', false, ''); ?>
                <?= proc_text_input('hidden', 'form-control', 'cform-pr-id', 'pr_id', false, ''); ?>
                <?= proc_text_input('hidden', 'form-control', 'cform-rfq-no', 'rfq_no', false, ''); ?>
                <?= proc_text_input('hidden', 'form-control', 'cform-rfq-id', 'rfq_id', false, ''); ?>
                <?= proc_text_input('hidden', 'form-control', 'cform-supplier-id', 'supplier_id', false, ''); ?>
                <div class="col-md-12">
                    <div class="box dropbox">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="btn-group">
                                        <a href="dash_iar_view.php" class="btn btn-md btn-warning" name=""><i class="fa  fa-arrow-circle-left"></i> Back</a>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="pull-right">
                                        <div class="btn-group">
                                            <button type="submit" class="btn btn-flat btn-md bg-green" name="save"><i class="fa fa-edit"></i> Save</button>
                                        </div>
                                        <div class="btn-group">
                                            <button type="submit" class="btn btn-flat btn-md bg-blue" name="save_new"><i class="fa fa-save"></i> Save &amp; New</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="box box-primary dropbox">
                        <div class="box-header">
                            <h3 class="box-title"><i class="fa fa-info-circle"></i> Information</h3>
                            <div class="box-tools">
                                <span class="label label-info" style="font-size: 14.5px; background-color: #06313b !important;"><?= $data['status']; ?></span>
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="row">
                            <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label">Purchase Order #:</label><br>

                                        <?= proc_group_select('Search PO No', 'po_no', $po_opts, '', 'form-control select2', '', false, '', true); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label">Officer:</label><br>

                                        <?= proc_group_select('Select officer', 'cform-officer', $iar_officer, '', 'form-control select2', '', false, '', true); ?>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label">Supplier</label><br>
                                        <?= proc_text_input('text', 'form-control', 'cform-supplier', 'supplier', false, ''); ?>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label">PO No.</label><br>
                                        <?= proc_text_input('text', 'form-control', 'cform-po-no', 'po_no', false, ''); ?>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label">PO Date:</label><br>
                                        <div class="input-group date">
                                            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                            <?= proc_text_input('text', 'form-control', 'cform-po-date', 'po_date', false, ''); ?>
                                        </div>

                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label">IAR Date:</label><br>
                                        <div class="input-group date">
                                            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                            <?= proc_text_input('text', 'form-control', 'cform-iar-date', 'iar_date', false, ''); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label">Invoice No.:</label><br>
                                        <?= proc_text_input('text', 'form-control', 'cform-invoice-no', 'invoice_no', false, ''); ?>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label">Invoice Date:</label><br>
                                        <div class="input-group date">
                                            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                            <?= proc_text_input('text', 'form-control', 'cform-invoice-date', 'invoice_date', false, ''); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label">Requisition Department:</label><br>
                                        <div class="input-group date">
                                            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                            <?= proc_text_input('text', 'form-control', 'cform-req-dept', 'req_dept', false, ''); ?>
                                        </div>
                                    </div>
                                </div>



                            </div>
                        </div>

                    </div>
            </form>
        </div>
    </section>
</div>
<script>
    $(document).ready(function() {
        $(".select2").select2();
        $('#cform-iar-date').datepicker({
            autoclose: true
        })

        $('#cform-invoice-date').datepicker({
            autoclose: true
        })
    });
    $('#btn_create_iar').click(function(e) {
        $('input').each(function() {
            if (!$(this).val()) {
                toastr.error("Error! All required fields must be filled-up");
                e.preventDefault();
                return false
            }
        });
    })
    $(document).on('change', '#cform-po_no', function() {
        let po_id = $(this).val()
        let path = 'GSS/route/post_asset_po_items.php';
        $.post({
            url: path,
            data: {
                id: po_id
            },
            success: function(result) {
                var data = jQuery.parseJSON(result);
                $('#cform-po-no').val(data.po_no);
                $('#cform-supplier').val(data.supplier);
                $('#cform-supplier-id').val(data.supplier_id);
                $('#cform-po-date').val(data.po_date);
                $('#cform-req-dept').val(data.office);
                $('#cform-rfq-no').val(data.rfq_no);
                $('#cform-pr-no').val(data.pr_no);
                $('#cform-pr-id').val(data.pr_id);
                $('#cform-rfq-id').val(data.rfq_id);

            }
        })
    });
</script>