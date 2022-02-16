<div class="tab-content" id="myTabContent">
    <div aria-labelledby="tab1-tab" id="tab1" class="tab-pane fade in active" role="tabpanel">
        <?php include 'GSS/views/RFQ/form/tabpanel_rfq.php'; ?>
    </div>

    <div aria-labelledby="tab2-tab" id="tab2" class="tab-pane" role="tabpanel">
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
                <div class="col-lg-6">
                    <?php include 'rfq_items.php' ?>

                </div>
                <div class="col-lg-6">
                    <?php include 'rfq_details.php'; ?>
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

                                            <form id="w0">
                                                <div class="row">

                                                    <div class="col-lg-12">
                                                        <div class="form-group field-documenttracklatestsearch-category">
                                                            <label class="control-label" for="documenttracklatestsearch-category">Category</label>
                                                            <?= group_select('Supplier', 'supplier', $supplier_opts, '', 'select2 supplier_list', '', false, '', true); ?>
                                                            <?= proc_action_btn('Select Supplier', '', 'append_supplier', 'btn btn-flat bg-green', '', '', '', 'fa fa-excel-o', '#'); ?>

                                                            <div class="help-block"></div>
                                                        </div>
                                                    </div>

                                                </div>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- /.box-body -->
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="box box-info">
                            <div class="box-header with-border">

                                <div class="box-tools pull-right">
                                </div><!-- /.box-tools -->
                            </div><!-- /.box-header -->
                            <div class="box-body table-responsive">
                                <div id="p0" data-pjax-container="" data-pjax-push-state="" data-pjax-timeout="1000">

                                    <div id="w1" class="grid-view">
                                        <table class="table table-striped table-bordered" id="quotation_table">
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
                    </div>


                </div>
            </div>
        </div>
    </div>
    <div aria-labelledby="tab3-tab" id="tab3" class="tab-pane" role="tabpanel">
        <p>Aliquam finibus nisi eget bibendum porttitor. Donec ultrices pharetra quam non interdum. Nunc ante nunc, dictum eu scelerisque ac, venenatis ut metus. Suspendisse velit massa, ultricies id mattis maximus, porta sed neque. Nunc bibendum metus vel imperdiet consequat. Aliquam elit ipsum, aliquam ac maximus cursus, pulvinar at ipsum. Etiam condimentum quis justo id cursus. Phasellus sit amet urna eros.</p>
    </div>
    <div aria-labelledby="tab4-tab" id="tab4" class="tab-pane" role="tabpanel">
        <p>Aenean placerat tortor elit, quis mattis lectus vulputate convallis. Morbi interdum eros non velit faucibus dignissim. Sed vehicula ligula non vestibulum consectetur. Ut egestas, sapien eu auctor auctor, diam est scelerisque neque, vel finibus sem ex id sapien. Suspendisse nisi tortor, viverra vitae erat ut, ultrices fringilla purus. Donec eget pretium ante. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Integer suscipit risus leo, sit amet dignissim justo porta ac. Duis tempor, purus non iaculis placerat, nisl turpis iaculis lorem, in rhoncus risus nulla id elit. Cras turpis enim, posuere at orci eget, euismod posuere sapien. Proin dictum massa sed augue fringilla, non sodales odio vulputate.</p>
    </div>

</div>
<style>
    .pull-left {
        float: left !important;
        padding: 10px;
    }
</style>