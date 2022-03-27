<?php require_once 'GSS/controller/RFQController.php'; ?>
<?php require_once 'GSS/controller/PurchaseRequestController.php'; ?>

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
       
        </div>
        <div class="row">
            <div class="col-md-12">
            <!-- <div id="tab">   -->
                    <!-- <ul role="tablist" class="nav nav-tabs bs-adaptive-tabs" id="myTab">
                        <li>
                            <a href="procurement_request_for_quotation.php">
                                <i class="fa fa-archive"></i>
                                <label>Request for Quotation</label>
                            </a>
                        </li>
                        <li >
                            <a href="procurement_supplier_awarding.php">
                                <i class="fa fa-calendar"></i>
                                <label>For Awarding</label>
                            </a>
                        </li>
                        <li class="active">
                            <a href="procurement_purchase_order_create.php">
                                <i class="fa fa-cog"></i> <label>Purchase Order</label>
                            </a>
                        </li>
                    </ul> -->
                    <?php include 'GSS/views/RFQ/form/form_view_po.php'; ?>
                <!-- </div> -->
                
            </div>


        </div>
</div>
</section>
</div>
<script>
      $(document).ready(function() {
        $('#cform-po-date').datepicker({
            autoclose: true
        })
        $('#cform-ntp-date').datepicker({
            autoclose: true
        })
        $('#cform-noa-date').datepicker({
            autoclose: true
        })
        $('.select2').select2();
    })
</script>