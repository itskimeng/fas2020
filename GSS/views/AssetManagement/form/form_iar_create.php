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
							<?= group_select('Search PO No', 'po_no', $po_opts, '', 'form-control select2', '', false, '', true);?>							</div>
						</div>
					</div>
				</div>

			</div>
	</section>
</div>
<script>
    $(document).ready(function () {
    $(".select2").select2();
    });
    </script>