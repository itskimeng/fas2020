<?php include 'GSS/controller/RFQController.php'; ?>
<?php require_once 'GSS/controller/PurchaseRequestController.php'; ?>

<div class="content-wrapper">
    <section class="content-header">
    <h2>ABSTRACT NO:<?= $abstract_no['abstract_no']; ?></h2>

        <ol class="breadcrumb">
            <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Procurement</a></li>
            <li class="active">Abstract of Quotation</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <?php include('_panel/box.html.php'); ?>
        </div>

        <div class="row">
                <?php include 'GSS/views/RFQ/form/awarding_details.php'; ?>
        </div>
        <div>
    </section>
</div>
<script src="GSS/views/backend/js/custom.js"></script>
<script src="GSS/views/backend/js/rfq_custom.js"></script>