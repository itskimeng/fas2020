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

                            <button class="btn-style btn-4 btn-sep icon-export pull-right" style="margin-left:5px;">
                                <a style="color:fff" href="procurement_export_abstract.php?rfq_no=<?= $_GET['rfq_no']; ?>&rfq_id=<?= $_GET['rfq_id']; ?>&abstract_no=<?= $_GET['abstract_no']; ?>&pr_no=<?= $_GET['pr_no']; ?>">Export</a>

                            </button>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>