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
            <div class="col-md-12">
                <?php include('_panel/iar_table.php'); ?>
            </div>
        </div>
    </section>
</div>
<script>
    $(document).ready(function(){
        $('#iar_table').dataTable({
        "dom": '<"pull-left"f><"pull-right"l>tip',
        'paging': true,
        "searching": true,
        "paging": true,
        "info": false,
        "bLengthChange": false,
        "lengthMenu": [
            [10, 20, -1],
            [10, 20, 'All']
        ],
        "ordering": false
        });
    })
</script>