<?php require_once 'GSS/controller/PurchaseRequestController.php'; ?>
<?php $admin = ['masacluti', 'ctronquillo', 'cmfiscal', 'mmmonteiro']; ?>

<div class="content-wrapper">
    <section class="content-header">
        <h1>Supplier Awarding Information</h1>

        <ol class="breadcrumb">

            <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Procurement</a></li>
            <li class="active">Purchase Request</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-3">
                <?php include ('tiles/supplier_info.html.php');?>
            </div>

            <div class="col-md-9">
                <?php include ('tiles/supplier_winning_info.html.php');?>

            </div>
        </div>
    </section>
</div>