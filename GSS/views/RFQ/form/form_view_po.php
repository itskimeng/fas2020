<div class="box box-danger">
    

    <div class="box-body">
        <!-- <form action="GSS/route/post_create_po.php" method="POST"> -->
        <div class="container">
            <div class="col-lg-12">
                <button class="btn-style btn-2 btn-sep icon-back" id="back" style="margin-left:-50px !important;margin-bottom:5px;">
                    <a href="procurement_request_for_quotation.php?division=<?= $_GET['division']; ?>" style="color:#fff;"> Back </a>
                </button>
                <button class="btn-style btn-3 btn-sep icon-create pull-right" id="back" style="margin-right:-50px;">
                    <a href="budget_create_obligation.php?new" style="color:#fff;"> CREATE ORS </a>
                </button>
                <button class="btn-style btn-1 btn-sep icon-create pull-right" id="back" style="margin-right:10px;">
                    <a href="procurement_request_for_quotation.php?division=<?= $_GET['division']; ?>" style="color:#fff;"> CREATE DV </a>
                </button>
                <button class="btn-style btn-4 btn-sep icon-export pull-right" id="back" style="margin-right:10px;">
                    <a href="procurement_request_for_quotation.php?division=<?= $_GET['division']; ?>" style="color:#fff;"> EXPORT </a>
                </button>
                <!-- <button class="btn-style btn-3 btn-sep icon-save" id="back">
                        <a href="procurement_request_for_quotation.php?division=<?= $_GET['division']; ?>" style="color:#fff;"> Save </a>
                    </button> -->

            </div>


        </div>
        <div class="col-lg-12">
            <?php include 'po_details.php';?>
        </div>
        <div class="col-lg-12">
        <?php include 'rfq_details.php';?>
            
        </div>
        <!-- </form> -->

    </div>
</div>
<script>
    $(document).ready(function() {

        if ($('#stat').val() == 0) {
            $('#stat-submitted').addClass("active");
        } else if ($('#stat').val() == 3) {
            $('#stat-submitted').addClass("active");
        } else if ($('#stat').val() == 4) {
            $('#stat-submitted').addClass("active");
            $('#stat-processed').addClass("active");

        } else if ($('#stat').val() == 5) {
            $('#stat-rfq').addClass("active");
            $('#stat-submitted').addClass("active");
            $('#stat-processed').addClass("active");

        } else if ($('#stat').val() == 8) {
            $('#stat-obligated').addClass("active");
            $('#stat-rfq').addClass("active");
            $('#stat-submitted').addClass("active");
            $('#stat-processed').addClass("active");

        } else if ($('#stat').val() == 11) {
            $('#stat-disbursed').addClass("active");
            $('#stat-obligated').addClass("active");
            $('#stat-rfq').addClass("active");
            $('#stat-submitted').addClass("active");
            $('#stat-processed').addClass("active");

        } else if ($('#stat').val() == 9) {
            $('#stat-delivered').addClass("active");
            $('#stat-disbursed').addClass("active");
            $('#stat-obligated').addClass("active");
            $('#stat-rfq').addClass("active");
            $('#stat-submitted').addClass("active");
            $('#stat-processed').addClass("active");

        }

    })
</script>