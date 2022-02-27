<?php include 'GSS/controller/RFQController.php'; ?>

<div class="content-wrapper">
    <section class="content-header">
        <h1>Abstract of Quotation</h1>

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
                    <ul role="tablist" class="nav nav-tabs bs-adaptive-tabs" id="myTab">
                        <li>
                            <a href="procurement_request_for_quotation.php">
                                <i class="fa fa-archive"></i>
                                <label>Request for Quotation</label>
                            </a>
                        </li>
                        <li class="active">
                            <a href="procurement_supplier_awarding.php">
                                <i class="fa fa-calendar"></i>
                                <label>For Awarding</label>
                            </a>
                        </li>
                        <li>
                            <a href="procurement_request_for_quotation.php">
                                <i class="fa fa-cog"></i> <label>Purchase Order</label>
                            </a>
                        </li>
                    </ul>
                    <?php include 'GSS/views/RFQ/form/tabpanel_awarding.php'; ?>
                </div>
                
            </div>


        </div>
</div>
</section>
</div>
<script  src="GSS/views/backend/js/custom.js"></script>
<script  src="GSS/views/backend/js/rfq_custom.js"></script>
