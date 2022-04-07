<div class="col-lg-12">
    <?php include 'GSS/views/RFQ/awarding/action_buttons.php'; ?>
    <h2>ABSTRACT NO:<?= $abstract_no['abstract_no']; ?></h2>
</div>

<div class="col-lg-12">
    <?php include 'GSS/views/RFQ/awarding/rfq_items.php'; ?>
</div>
<div class="col-lg-12">
    <?php include 'GSS/views/RFQ/awarding/add_supplier_quotation.php' ?>
</div>
<form method="POST" action="GSS/route/post_supplier_winner.php">
    <div class="col-lg-12">
        <div class="box box-info" style="  box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23);">
            <div class="box-header with-border">
                <b>Supplier Quotation Table</b>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-settings">
                        <i class="fa fa-cog"></i>Settings
                    </button>
                    <button type="submit" class="btn btn-success">
                        <i class="fa fa-trophy"></i>Award
                    </button>


                </div>
            </div>
            <div class="box-body" style="height: 450px; max-height:380px; overflow-y: auto;">
                <input type="hidden" name="_csrf" value="vGRFeQruDnCyGAJ-LaZs_mOYugb6I9jgKuz8B-KvmtWMCi1OSNp6IcNZOyh4nj22EtPMVqtCq6Jj2rhdipzxrA==">
                <div id="kv-demo" class="kv-view-mode">
                    <div class="kv-detail-view">
                        <?= proc_text_input('hidden', 'form-control col-lg-6', 'rfq_no', 'rfq_no',  false, $_GET['rfq_no']); ?>
                        <?= proc_text_input('hidden', 'form-control col-lg-6', 'pr_no', 'pr_no',  false, $_GET['pr_no']); ?>
                        <?= proc_text_input('hidden', 'form-control col-lg-6', 'flag', 'flag',  false, $_GET['flag']); ?>
                        <?= proc_text_input('hidden', 'form-control col-lg-6', 'abstract_no', 'abstract_no',  false, $abstract_no['abstract_no']); ?>
                        <?= proc_text_input('hidden', '', 'cform-rfq-id', 'rfq_id', $required = false, $ids['id']) ?>


                        <table class="table table-striped table-bordered" id="rfq_items">
                            <thead class="bg-primary">
                                <th>Supplier</th>
                                <th>Item</th>
                                <th>Price Per Unit</th>
                            </thead>
                            <tbody id="quotation">

                            </tbody>
                        </table>



                    </div>
                </div>
            </div>
        </div>
        <?php include 'GSS/views/RFQ/awarding/modal_settings.php'; ?>
    </div>
</form>