<?php require_once 'GSS/controller/AssetManagementController.php'; ?>

<div class="content-wrapper">
    <section class="content-header">
        <h1>Create RIS</h1>

        <ol class="breadcrumb">
            <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Procurement</a></li>
            <li>Asset Management</li>
            <li>RIS</li>
            <li class="active">Create RIS</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box dropbox">
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="btn-group">
                                    <a href="asset_management.php" class="btn btn-md btn-default" name=""><i class="fa  fa-arrow-circle-left"></i> Close</a>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="pull-right">
                                    <div class="btn-group">
                                        <button type="submit" class="btn btn-flat btn-md bg-green" name="save"><i class="fa fa-edit"></i> Save</button>
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
                        <h3 class="box-title"><input type="checkbox" class="minimal form-check-input" name="chk-urgent" value="1" id="is_petty"> <label style="line-height:35px;">Petty Cash?</label></h3>

                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-3" id="po">
                                <?= group_select('Search PO No', 'po_no', $po_opts, '', 'form-control select2', '', false, '', true); ?>
                            </div>
                            <div class="col-md-3" id="pr">
                                <?= group_select('Search PR No', 'pr_no', $pr_opts, '', 'form-control select2', '', false, '', true); ?>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Office:</label><br>
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
                                <label class="control-label">RIS No:</label><br>
                                <div class="input-group date">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <?= proc_text_input('text', 'form-control', 'cform-po-date', 'po_date', false, ''); ?>
                                </div>

                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Remarks:</label><br>
                                <div class="input-group date">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <?= proc_text_input('text', 'form-control', 'cform-iar-dept', 'iar_dept', false, ''); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Requested by:</label><br>
                                <?= group_select('Search PO No', 'req_by', $officers, '', 'form-control select2', '', false, '', true); ?>

                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Approved by:</label><br>
                                <div class="input-group date">
                                    <div class="input-group-addon"><i class="fa fa-check"></i></div>
                                    <?= proc_text_input('text', 'form-control', 'cform-invoice-date', 'invoice_date', false, 'ARIEL O. IGLESIA'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Issued by:</label><br>
                                <div class="input-group date">
                                    <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                    <?= proc_text_input('text', 'form-control', 'cform-invoice-date', 'invoice_date', false, 'BEZALEEL O. SOLTURA'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Received by:</label><br>
                                <div class="input-group date">
                                    <div class="input-group-addon"><i class="fa fa-thumbs-up"></i></div>
                                    <?= proc_text_input('text', 'form-control', 'cform-invoice-date', 'invoice_date', false, ''); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">Purpose:</label><br>
                                <div class="input-group date">
                                    <textarea style="width: 1413px; height: 176px;resize:none;"></textarea>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
    </section>
</div>
<script>
    $(document).ready(function() {
        $(".select2").select2();
        $("#cform-req_by").select2();
        $("#cform-pr_no").select2();
        $('#pr').hide();


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
    $(document).on('change', '.select2', function() {
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
                $('#cform-po-date').val(data.po_date);

            }
        })
    });
    $(document).on('click', '#is_petty', function() {
        if ($(this).is(":checked")) {
            $('#po').hide();
            $('#pr').show();

        } else {
            $('#po').show();
            $('#pr').hide();

        }
    })
</script>