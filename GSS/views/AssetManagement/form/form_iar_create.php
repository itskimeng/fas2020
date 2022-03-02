<?php require_once 'GSS/controller/AssetManagementController.php'; ?>

<div class="content-wrapper">
	<section class="content-header">
		<h1>Create IAR</h1>

		<ol class="breadcrumb">
			<li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="#">Procurement</a></li>
			<li>Asset Management</li>
			<li>IAR</li>
			<li class="active">Create IAR</li>
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
								<?= group_select('Search PO No', 'po_no', $po_opts, '', 'form-control select2', '', false, '', true); ?> </div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label class="control-label">Supplier</label><br>
								<?= proc_text_input('text', 'form-control','cform-supplier','supplier',false,''); ?>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label class="control-label">PO No.</label><br>
								<?= proc_text_input('text', 'form-control','cform-po-no','po_no',false,''); ?>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label class="control-label">PO Date:</label><br>
								<?= proc_text_input('text', 'form-control','cform-po-date','po_date',false,''); ?>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label class="control-label">Requisition Department:</label><br>
								<?= proc_text_input('text', 'form-control','cform-req-dept','req_dept',false,''); ?>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label class="control-label">IAR Date:</label><br>
								<?= proc_text_input('text', 'form-control','cform-iar-dept','iar_dept',false,''); ?>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label class="control-label">Invoice No.:</label><br>
								<?= proc_text_input('text', 'form-control','cform-iar-no','iar_no',false,''); ?>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label class="control-label">Invoice Date:</label><br>
								<?= proc_text_input('text', 'form-control','cform-invoice-date','invoice_date',false,''); ?>
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
	});
	$('#btn_create_iar').click(function(e) {
        $('input').each(function() {
            if(!$(this).val()){
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

			}
		})
	});
</script>