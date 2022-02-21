<?php require_once 'GSS/controller/RFQController.php'; ?>

<div class="content-wrapper">
    <section class="content-header">
        <h1>Request for Quotation</h1>

        <ol class="breadcrumb">
            <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Procurement</a></li>
            <li class="active">Request for Quotation</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <?php include('_panel/box.html.php'); ?>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="w3-panel w3-pale-red w3-border w3-leftbar w3-border-red">
                    <h3>REMINDER!</h3>
                    <div><label class="label label-danger">URGENT</label> - the status of this purchase request is urgent and must be processed on the date submitted by the user. </div><br>
                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                
                <div id="tab">
                    <?php include '_panel/tabs.php'; ?>
                    <?php include '_panel/tabs_target.php'; ?>
                </div>
            </div>


        </div>
</div>
</section>
</div>
<script  src="GSS/views/backend/js/rfq_custom.js"></script>

