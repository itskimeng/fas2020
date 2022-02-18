<div class="box box-danger">
    <div class="box-header with-border">
        <div class="box-tools pull-right">

        </div>
    </div>

    <div class="box-body">
        <div class="container">
            <div class="col-lg-12">
                <button class="btn-style btn-2 btn-sep icon-back" id="back" style="margin-left:-50px !important;margin-bottom:5px;">
                    Back
                </button>
            </div>

        </div>
        <div class="col-lg-4">
        <?php include 'GSS/views/RFQ/_panel/rfq_details.php'; ?>


        </div>
        <div class="col-lg-8">
        <?php include 'GSS/views/RFQ/_panel/rfq_items.php' ?>

        </div>
        <div class="col-lg-12">
            <div class="col-lg-4">
                <div class="box box-info">
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
                <canvas id="barChart" style="height: 230px; width: 339px;" width="339" height="230"></canvas>
            </div>


        </div>
    </div>
</div>
