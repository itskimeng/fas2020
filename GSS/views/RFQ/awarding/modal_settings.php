
<div class="modal fade" id="modal-settings" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title"><i class="fa fa-book"></i>Criteria for Awarding</h4>
            </div>
            <div class="modal-body">
            <form method="POST" action="GSS/route/post_supplier_winner.php">
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
                                <?php include 'quotation.php'; ?>
                            </tbody>
                        </table>
                        <?php if (isset($_GET['flag']) && $_GET['flag'] == 0) { ?>


                        <?php } else { ?>
                            <button type="submit" class="btn-style col-lg-12 btn-3 icon-save btn-sep" value=""><i class=" pull-left"></i> Award</button>

                        <?php } ?>
                </div>
            </div>
            </form>

            </div>

        </div>
    </div>
</div>