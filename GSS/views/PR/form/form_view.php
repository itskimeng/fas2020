<?php require_once 'GSS/controller/PurchaseRequestController.php'; ?>


<div class="content-wrapper">
    <section class="content-header">
        <h1>Purchase Request</h1>

        <ol class="breadcrumb">
            <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Procurement</a></li>
            <li class="active">Purchase No <?= $pr_data['pr_no']; ?></li>
        </ol>
    </section>
    <section class="content">
        <?php include 'form_view_info.php';?>

    </section>
</div>
<script>
    $('#stat-submitted').addClass("active");
</script>