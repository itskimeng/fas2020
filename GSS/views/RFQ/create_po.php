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
        <form action="GSS/route/post_create_po.php" method="POST">

            <div class="col-md-12">
                <div class="box box-primary dropbox">
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="btn-group">
                                    <button type="button" class="btn-style btn-2 btn-sep icon-back" id="back">
                                        <a href="procurement_request_for_quotation.php?division=<?= $_GET['division']; ?>" style="color:#fff;"> Back </a>
                                    </button>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="pull-right">
                                    <div class="btn-group">
                                        <div class="col-lg-12">

                                            <button id="btn_create_po" class="btn-style btn-3 btn-sep icon-save">
                                                Save
                                            </button>

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <?php include 'GSS/views/RFQ/form/form_create_po.php'; ?>

            </div>
            </form>


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
<script>
    $(document).ready(function(){
    $('#btn_create_po').click(function(e) {
        $('input').each(function() {
            if(!$(this).val()){
                toastr.error("Error! All required fields must be filled-up");
                e.preventDefault();
                return false
            }
        });
    })
        $('#winner_supplier').prop('readonly',true);
        $('#cform-amount').prop('readonly',true);
        $('#cform-rfq-no').prop('readonly',true);
        $('#cform-po-no').prop('readonly',true);
    })
</script>