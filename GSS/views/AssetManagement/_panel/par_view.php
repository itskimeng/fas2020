<?php require_once 'GSS/controller/AssetManagementController.php'; ?>

<div class="content-wrapper">
    <section class="content-header">
        <h1>Equipment Information</h1>

        <ol class="breadcrumb">
            <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Asset Management</a></li>
            <li class="active">Equipment Information</li>
        </ol>
    </section>

    <section class="content">

        <div class="row">
            <?php include 'par_view_form.php'; ?>
        </div>
    </section>
</div>
<script>
    $(function() {
        //Initialize Select2 Elements
        $('.select2').select2({
            dropdownParent: $("#exampleModal")
        })
    });
</script>