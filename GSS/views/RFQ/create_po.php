<?php include 'GSS/controller/RFQController.php'; ?>
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
            <div class="col-md-12">
    
                    <?php include 'GSS/views/RFQ/form/form_create_po.php'; ?>
                
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