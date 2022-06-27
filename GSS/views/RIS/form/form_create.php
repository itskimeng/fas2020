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
            <form action="GSS/route/post_create_ris.php" method="POST">
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
                                    <label class="control-label">Division:</label><br>
                                    <?= proc_text_input('text', 'form-control', 'cform-division', 'division', false, ''); ?>
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
                                        <?= proc_text_input('text', 'form-control', 'cform-ris-no', 'ris_no', false, $ris_no['count_r']); ?>
                                    </div>

                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">Remarks:</label><br>
                                    <div class="input-group date">
                                        <div class="input-group-addon"><i class="fa fa-book"></i></div>
                                        <?= proc_text_input('text', 'form-control', 'cform-remarks', 'remarks', false, ''); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">Requested by:</label><br>
                                    <?= group_select('Search PO No', 'req_by', $officers, '', 'form-control', '', false, '', true); ?>

                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">Approved by:</label><br>
                                    <div class="input-group date">
                                        <div class="input-group-addon"><i class="fa fa-check"></i></div>
                                        <?= proc_text_input('text', 'form-control', 'cform-approved-by', 'approved_by', false, 'ARIEL O. IGLESIA'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">Issued by:</label><br>
                                    <div class="input-group date">
                                        <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                        <?= proc_text_input('text', 'form-control', 'cform-issued-by', 'issued_by', false, 'BEZALEEL O. SOLTURA'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">Received by:</label><br>
                                    <div class="input-group date">
                                        <div class="input-group-addon"><i class="fa fa-thumbs-up"></i></div>
                                        <?= proc_text_input('text', 'form-control', 'cform-received_by', 'received_by', false, ''); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">Purpose:</label><br>
                                    <div class="input-group date">
                                        <textarea style="width: 1413px; height: 176px;resize:none;" name="purpose"></textarea>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </form>
    </section>
</div>
<script>
    $(document).ready(function() {
        $(".select2").select2();
        $("#cform-req_by").select2();
        $("#cform-pr_no").select2();
        $("#cform-po_no").select2();
        $('#pr').hide();
        $('#cform-division').attr('disabled',true)
        $('#cform-po-no').attr('disabled',true)
        $('#cform-ris-no').attr('disabled',true)
        $('#cform-approved-by').attr('disabled',true)
        $('#cform-issued-by').attr('disabled',true)
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
                id: po_id,
                flag: 'po'
            },
            success: function(result) {
                var data = jQuery.parseJSON(result);
                $('#cform-po-no').val(data.po_no);
                $('#cform-supplier').val(data.supplier);
                $('#cform-division').val(data.office);

            }
        })
    });
    $(document).on('change', '#cform-pr_no', function() {
        let pr_id = $(this).val()
        let path = 'GSS/route/post_asset_po_items.php';
        $.post({
            url: path,
            data: {
                id: pr_id,
                flag: 'pr'
            },
            success: function(result) {
                var data = jQuery.parseJSON(result);
                $('#cform-po-no').val(data.po_no);
                $('#cform-supplier').val(data.supplier);
                $('#cform-division').val(data.office);

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