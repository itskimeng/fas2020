<?php require_once 'GSS/controller/AssetManagementController.php'; ?>

<div class="content-wrapper">
    <section class="content-header">
        <h1>Inspection Acceptance Report</h1>

        <ol class="breadcrumb">
            <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Procurement</a></li>
            <li>Asset Management</li>
            <li class="active">IAR</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <?php include('_panel/box.html.php'); ?>
        </div>
        <div class="row">
            <div class="col-md-12">
                <?php include('_panel/iar_table.php'); ?>
            </div>
        </div>
    </section>
</div>