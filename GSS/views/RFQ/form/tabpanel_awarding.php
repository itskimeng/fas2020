<div class="box box-danger">
    <div class="box-header with-border">
        <div class="box-tools pull-right">

        </div>
    </div>

    <div class="box-body">
        <div class="container">
            <div class="col-lg-12">
                <button class="btn-style btn-2 btn-sep icon-back" id="back" style="margin-left:-50px !important;margin-bottom:5px;">
                    <a href="procurement_request_for_quotation.php?division=<?= $_GET['division']; ?>" style="color:#fff;"> Back </a>

                </button>
            </div>

        </div>
        <div class="col-lg-12">

            <div class="col-lg-4">

                <?php include 'GSS/views/RFQ/_panel/rfq_details.php'; ?>


            </div>
            <div class="col-lg-8">
                <?php include 'GSS/views/RFQ/_panel/rfq_items.php' ?>

            </div>
        </div>
        <div class="col-lg-12">
            <div class="col-lg-4">
                <div class="box box-info container" style="  box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23);">
                    <div class="box-header with-border" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="true" aria-controls="collapseExample" style="cursor: pointer;">
                        <b>Add Supplier Quote</b>
                        <div class="box-tools pull-right">
                            <p>
                                <button class="btn btn-box-tool">
                                    <i class="fa fa-minus"></i>
                                </button>
                            </p>
                        </div><!-- /.box-tools -->
                    </div><!-- /.box-header -->
                    <div>
                        <div class="collapse in" id="collapseExample" aria-expanded="true">
                            <br>
                            <div class="card card-body">

                                <div class="document-track-search">

                                    <div class="row">

                                        <div class="col-lg-12">
                                            <div class="form-group field-documenttracklatestsearch-category">
                                                <?= group_select('Supplier', 'supplier', $supplier_opts, '', 'select2 supplier_list', '', false, '', true); ?>
                                                <div class="help-block"></div>
                                            </div>
                                            <form method="POST" action="GSS/route/post_awarding.php">
                                                <?= proc_text_input('hidden', '', 'cform-rfq-no-awarded', 'cform-rfq-no-awarded', $required = false, $_GET['rfq_no']) ?>
                                                <?= proc_text_input('hidden', '', 'cform-pr-no-awarded', 'cform-pr-no-awarded', $required = false, $_GET['pr_no']) ?>


                                                <div>
                                                    <div class="box-body table-responsive" style="height: 500px; max-height: 250px; overflow-y: auto;">
                                                        <div id="p0" data-pjax-container="" data-pjax-push-state="" data-pjax-timeout="1000">

                                                            <div id="w1" class="grid-view">
                                                                <table class="table table-striped table-bordered" id="quotation_table" style="height: 100px !important;overflow: auto !important;">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Item</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <?php $count = ''; ?>
                                                                        <?php foreach ($rfq_items as $key => $item) : ?>
                                                                            <tr>
                                                                                <td><?= $item['item']; ?></td>
                                                                                <td hidden><input type="hidden" name="rfq_item_id[]" value="<?= $item['item_id']; ?>" /></td>
                                                                                <td hidden><input type="hidden" name="rfq_id" value="<?= $item['rfq_id']; ?>" /></td>
                                                                            </tr>
                                                                            <?php $count++; ?>
                                                                        <?php endforeach; ?>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>

                                                    </div><!-- /.box-body -->
                                                </div>
                                                <?= proc_action_btn('Back', '', 'btn_rfq_back', 'btn-style btn-2 icon-back btn-sep', '', '', '', '', '#'); ?>
                                                <?= proc_action_btn('Select Supplier', '', 'append_supplier', 'btn-style btn-1 icon-choose btn-sep', '', '', '', '', '#'); ?>
                                                <?= proc_action_btn('Save', '', 'btn_rfq_awarding', 'btn-style btn-1 icon-save btn-sep', '', '', '', '', 'submit'); ?>


                                            </form>
                                        </div>

                                    </div>

                                </div>

                            </div>
                        </div>
                    </div><!-- /.box-body -->
                </div>
            </div>
            <div class="col-lg-8">
                <div class="box box-info" style="  box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23);">
                    <div class="box-header with-border">
                        <b>Supplier Quotation Table</b>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse">
                                <i class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="box-body" style="height: 450px; max-height:380px; overflow-y: auto;">
                        <input type="hidden" name="_csrf" value="vGRFeQruDnCyGAJ-LaZs_mOYugb6I9jgKuz8B-KvmtWMCi1OSNp6IcNZOyh4nj22EtPMVqtCq6Jj2rhdipzxrA==">
                        <div id="kv-demo" class="kv-view-mode">
                            <div class="kv-detail-view">
                                <form method="POST" action="GSS/route/post_supplier_winner.php">
                                    <?= proc_text_input('hidden', 'form-control col-lg-6', 'rfq_no', 'rfq_no',  false, $_GET['rfq_no']); ?>
                                    <?= proc_text_input('hidden', 'form-control col-lg-6', 'pr_no', 'pr_no',  false, $_GET['pr_no']); ?>
                                    <?= proc_text_input('hidden', 'form-control col-lg-6', 'flag', 'flag',  false, $_GET['flag']); ?>
                                    <?= proc_text_input('hidden', 'form-control col-lg-6', 'abstract_no', 'abstract_no',  false, $abstract_no['abstract_no']); ?>
                                    <?php foreach ($rfq_items as $key => $item) : ?>
                                        <input type="hidden" name="rfq_id" value="<?= $item['rfq_id']; ?>" />
                                    <?php endforeach; ?>
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
                                    <?php if (isset($_GET['flag'])) { ?>
                                        <button type="submit" class="btn btn-flat col-lg-12 bg-green" id="export_abstract"><i class=" pull-left"></i>
                                            <a style="color:fff" href="procurement_export_abstract.php?rfq_no=<?= $_GET['rfq_no']; ?>&rfq_id=<?= $_GET['rfq_id']; ?>&abstract_no=<?= $_GET['abstract_no']; ?>&pr_no=<?= $_GET['pr_no']; ?>">Export</a>
                                        </button>

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
    </div>
</div>