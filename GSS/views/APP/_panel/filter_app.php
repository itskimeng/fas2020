<div class="box box-primary box-solid dropbox collapsed-box">
    <div class="box-header with-border">
        <h5 class="box-title"><i class="fa fa-search"></i> Advanced Search</h5>

        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="    fa fa-minus"></i>
            </button>
        </div>
        <!-- /.box-tools -->
    </div>
    <div class="box-body">
        <div class="card">
            <div class="card-header">
                <div class="card-tools">

                </div>
            </div>

            <form id="form-filter">
                <div class="card-body card-body-filter collapse show">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Office</label>
                                <select class="form-control select2 " style="width: 100%;" id="office">
                                    <?php foreach ($pmo as $key => $item) : ?>
                                        <option value=<?= $item; ?>><?= $item; ?></option>
                                    <?php endforeach; ?>

                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Category</label>
                                <select class="form-control select2 " style="width: 100%;" id="category">
                                    <?php foreach ($app_category as $key => $item) : ?>
                                        <option value="<?= $item['category']; ?>"><?= $item['category']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>APP Year</label>
                                <select class="form-control select2 " style="width: 100%;" id="year">
                                  <option value="2022">2022</option>
                                  <option value="2021">2021</option>
                                  <option value="2019">2019</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">






                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group float-right">
                                <div class="d-grid gap-2 d-md-block">

                                    <button class="btn btn-primary btn-md pull-right" id="btn-filter" type="button"><i class="fa fa-search"></i> Filter</button>
                                    <button class="btn btn-default btn-md pull-right" id="btn-reset" type="button"><i class="fa fa-sync-alt"></i> Reset</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row float-right">
                        <div class="col-md-12">


                        </div>
                    </div>

                </div>
            </form>
        </div>

    </div>
</div>