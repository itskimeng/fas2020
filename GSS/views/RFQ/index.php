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
                
               <?php include '_panel/tabs.php';?>
               <?php include '_panel/tabs_target.php';?>
            </div>


        </div>
</div>
</section>
</div>

<script>
    $(document).ready(function() {
        $('.select2').select2();
        $('#tbl_rfq_panel').hide();
        $('#tbl_view_rfq_info').hide();
        $('#pos_panel').hide();

    })
    $(document).on('click', '#btn_create_rfq', function() {
        $('#tbl_pr_entries').hide();
        $('#pos_panel').hide();

        $('#tbl_rfq_panel').show();
    })
    $(document).on('click', '#btn_view_rfq', function() {
        $('#tbl_pr_entries').hide();
        $('#tbl_rfq_panel').hide();
        $('#pos_panel').show();
        $('#tbl_view_rfq_info').show();
    })
    $(document).on('click', '.btn-back', function() {
        $('#tbl_pr_entries').show();
        $('#tbl_rfq_panel').hide();
        $('#pos_panel').hide();
        $('#tbl_view_rfq_info').hide();

    })
</script>