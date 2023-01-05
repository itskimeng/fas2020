<style>
.shake {
    animation-name: shake;
    animation-duration: 1s;
    animation-fill-mode: both;
}

@keyframes shake {

    0%,
    100% {
        transform: translateX(0);
    }

    10%,
    30%,
    50%,
    70%,
    90% {
        transform: translateX(-10px);
    }

    20%,
    40%,
    60%,
    80% {
        transform: translateX(10px);
    }
}
</style>
<?php require_once 'GSS/controller/PurchaseRequestController.php'; ?>
<?php $menuchecker = menuChecker('procurement'); ?>
<?php $admin = ['masacluti','ctronquillo','cmfiscal','mmmonteiro'];?>

<div class="content-wrapper">
    <section class="content-header">
        <h1>Purchase Request</h1>

        <ol class="breadcrumb">
            
            <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Procurement</a></li>
            <li class="active">Purchase Request</li>
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
                    <div><label class="label label-danger">URGENT</label> - the status of this purchase request is
                        urgent and must be processed on the date submitted by the user. </div><br>
                </div>
            </div>
        </div>
        <?php 
                    if(in_array($_SESSION['username'],$admin))
                    {
                      include 'filter.php';
                    }
                    ?>


        <div class="col-md-12">
            <?php include('_panel/purchase_request_tab.php'); ?>
            <?php include('modal/modal_pending_pr.php');?>

        </div>
</div>
</section>
</div>