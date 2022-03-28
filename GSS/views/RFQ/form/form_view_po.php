<div class="box box-info dropbox">
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
                            <button class="btn-style btn-3 btn-sep icon-create pull-right">
                                <a href="budget_create_obligation.php?  new" style="color:#fff;"> CREATE OBLIGATION </a>
                            </button>

                                <button type="button" class="btn-style btn-4 btn-sep icon-export pull-right" style="margin-left:5px;">
                                <a href="export_po.php?supplier_id=<?= $po_ids['supplier_id'];?>&rfq_id=<?= $po_ids['rfq_id']; ?>&po_id=<?= $po_ids['po_id'];   ?>&division=<?= $_GET['division']; ?>" style="color:#fff;"> EXPORT </a>

                                </button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include 'po_details.php';?>
        <?php include 'rfq_details.php';?>


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