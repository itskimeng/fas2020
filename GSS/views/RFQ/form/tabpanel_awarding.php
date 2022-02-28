<div class="box box-danger">
    <div class="box-header with-border">
        <div class="box-tools pull-right">

        </div>
    </div>

    <div class="box-body">
        <div class="container">
            <!-- <div class="col-lg-12">
                <button class="btn-style btn-2 btn-sep icon-back" id="back" style="margin-left:-50px !important;margin-bottom:5px;">
                    <a href="procurement_request_for_quotation.php?division=<?= $_GET['division']; ?>" style="color:#fff;"> Back </a>
                </button>
            </div> -->

        </div>
        <?php
        if (isset($_GET['flag'])) {
            include 'awarding_details.php';
        } else {
        ?>
            <div class="col-lg-12">
                <div class="col-lg-4">
                    <?php include 'GSS/views/RFQ/_panel/suppliers.php' ?>
                </div>
            </div>
        <?php
        }
        ?>

    </div>
</div>