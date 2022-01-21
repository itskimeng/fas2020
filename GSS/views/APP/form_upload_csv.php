<div class="box box-primary box-solid">
    <div class="box-header with-border">
        <h5 class="box-title">
        Annual Procurement Plan
 List of Items
        </h5>
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
                        <div class="col-md-12">
                            <div class="pull-right" style="margin-bottom:10px;">
                                <div class="btn-group" role="group">

                                    <div class="btn-group pull-right">
                                        <a class="btn btn-md btn-danger" href="procurement_app_create.php?division=<?= $_GET['division'];?>" title="Add New Record" ><span class="glyphicon glyphicon-save"></span> Add New Record</a>
                                    </div>
                                    <div class="btn-group pull-right" style="margin-right:10px;">
                                        <a class="btn btn-md btn-success" href="#" title="Add New Record" ><span class="glyphicon glyphicon-save"></span> Generate APP Template</a>
                                    </div> 
                                </div>
                                <div class="btn-group" role="group">

                                    <div class="btn-group pull-right">
                                        <button id="w5" class="btn btn-warning dropdown-toggle" title="Export data in selected format" data-toggle="dropdown" aria-expanded="false"><i class="glyphicon glyphicon-export"></i> <span class="caret"></span></button>
                                        <ul id="w6" class="dropdown-menu">
                                            <li title="Comma Separated Values"><a id="w3-csv" class="export-full-csv" href="#" data-format="Csv" tabindex="-1"><i class="text-primary glyphicon glyphicon-floppy-open"></i> CSV</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <?php require_once 'form_table.php'; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>