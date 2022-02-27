<div class="box box-danger">
    <div class="box-header with-border">
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse">
                <i class="fa fa-minus"></i>
            </button>
        </div>
    </div>

    <div class="box-body">
        <div class="col-md-12">
            <div class="box">
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="btn-group">
                                <button class="btn-style btn-2 btn-sep icon-back" id="back">
                                    <a href="procurement_request_for_quotation.php?division=<?= $_GET['division']; ?>" style="color:#fff;"> Back </a>
                                </button>
                            </div>
                            <!-- <div class="btn-group">
                                <button class="btn-style btn-1 btn-sep icon-multiple" id="btn-multiple">
                                    Multiple Assigning
                                 </button>
                            </div> -->



                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-md-3">
            <?php include 'GSS/views/RFQ/_panel/pending_pr.php'; ?>
        </div>
        <div class="col-lg-9">
            <?php include 'GSS/views/RFQ/_panel/rfq_entries.php'; ?>
            <?php //include 'GSS/views/RFQ/_panel/rfq_create.php'; ?>
            <?php //include 'GSS/views/RFQ/_panel/rfq_multiple.php'; ?>
            <?php //include 'GSS/views/RFQ/_panel/rfq_view.php'; ?>
            </form>
        </div>
    </div>
</div>