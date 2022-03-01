<div id="tab">
    <ul role="tablist" class="nav nav-tabs bs-adaptive-tabs" id="myTab">
        <li role="presentation" class="active">
            <a aria-expanded="true" aria-controls="home" data-toggle="tab" role="tab" id="tab1-tab" href="#tab1">
                <img src="GSS/views/backend/images/transparency.png" style="width:25px;" />
                <label>Transparency Table</label>
            </a>
        </li>
        <li role="presentation" class="<?= $active; ?>">
            <a aria-expanded="true" aria-controls="home" data-toggle="tab" role="tab" id="tab2-tab" href="#tab2">
                <img src="GSS/views/backend/images/procurement.png" style="width:25px;" />

                <label>Purchase Request Entries</label>
            </a>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">

        <div role="tabpanel" class="tab-pane active" id="tab1">
            <div class="box">
                <div class="box-header with-border">
                    <div class="box-tools pull-right">

                    </div>
                </div>
                <div class="box-body">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <span><i class="fa fa-bar-chart-o fa-fw"></i>PROCUREMENT STATISTICS</span>
                            <span class="pull-right hidden-xs"><small><i class="fa fa-clock-o fa-fw"></i>as of <?= date('F d, Y'); ?></small></span>
                        </div>
                        <div class="panel-body" style="padding-bottom: 0px;">

                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="panel">
                                        <div class="panel-body" style="padding-top: 0px; margin-top: 0px;">

                                            <br>
                                            <table class="table table-responsive">
                                                <tbody>
                                                    <tr>
                                                        <th>OFFICE</th>
                                                        <th>ENCODED</th>
                                                        <th>TOTAL FUNDS</th>
                                                    </tr>
                                                    <?php include 'office_stat.php'; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-9">
                                    <div class="chart" style="position: relative; height:40vh; width:80vw">
                                        <canvas id="barChart" style="height:300px"></canvas>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <span><i class="fa fa-bar-chart-o fa-fw"></i>TRANSPARENCY TABLE</span>
                            <span class="pull-right hidden-xs"><small><i class="fa fa-clock-o fa-fw"></i>as of <?= date('F d, Y'); ?></small></span>
                        </div>
                        <div class="panel-body" style="padding-bottom: 0px;">

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="panel">
                                        <div class="panel-body" style="padding-top: 0px; margin-top: 0px;">

                                            <br>
                                            <table id="transparency_table" class="table table-striped table-bordered table-responsive table-hover dataTable no-footer" >
                                                <tbody>
                                                    <tr>
                                                        <th>OFFICE</th>
                                                        <th>PR NO</th>
                                                        <th>PR DATE</th>
                                                        <th>PROCUREMENT</th>
                                                        <th>QUANTITY</th>
                                                        <th>UNIT</th>
                                                        <th>UNIT COST</th>
                                                        <th>SUPPLIER</th>
                                                        <th>SUPPLIER'S QUOTATION</th>
                                                    </tr>
                                                    <?php foreach ($trans_opt as $key => $data) : ?>
                                                        <tr>
                                                            <td><?= $data['pmo_title']; ?></td>
                                                            <td><?= $data['pr_no']; ?></td>
                                                            <td><?= $data['pr_date']; ?></td>
                                                            <td><?= $data['procurement']; ?></td>
                                                            <td>x<?= $data['qty']; ?></td>
                                                            <td><?= $data['unit']; ?></td>
                                                            <td><?= $data['abc']; ?></td>
                                                            <td><?= $data['supplier_title']; ?></td>
                                                            <td><?= $data['ppu']; ?></td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div aria-labelledby="tab2-tab" id="tab2" class="tab-pane" role="tabpanel">
            <div class="box">
                <div class="box-header with-border">
                    <div class="box-tools pull-right">

                    </div>
                </div>
                <div class="box-body">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <!-- <span><i class="fa fa-bar-chart-o fa-fw"></i></span> -->
                            <span class="pull-right hidden-xs"><small></span>
                        </div>
                        <div class="box-body box-emp">

                            <button class="btn btn-flat bg-green">
                                <a href="procurement_purchase_request_create.php?division=<?= $_GET['division']; ?>" style="color:#fff;">
                                    <img src="GSS/views/backend/images/create.png" style="width:25px;" />
                                    Create PR</a>
                            </button>
                        </div>
                    </div>
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <span><i class="fa fa-bar-chart-o fa-fw"></i>PURCHASE REQUEST ENTRIES</span>
                            <span class="pull-right hidden-xs"><small><i class="fa fa-clock-o fa-fw"></i>as of <?= date('F d, Y'); ?></small></span>
                        </div>
                        <div class="box-body box-emp">

                            <div class="col-sm-12">
                                <?= proc_text_input("hidden", '', 'cform-received-by', '', false, $_SESSION['currentuser']); ?>
                                <?= proc_text_input("hidden", '', 'cform-pmo', '', false, $_GET['division']); ?>

                                <table id="list_table" class="table table-striped table-bordered table-responsive table-hover dataTable no-footer" role="grid" aria-describedby="list_table_info">
                                    <thead>
                                        <tr role="row">
                                            <th rowspan="2" style="text-align:center; vertical-align: middle; width:10%!important; color:white; background-color: #5c617a;" class="sorting_disabled" colspan="1">PR NO.</th>

                                            <th rowspan="2" style="text-align:center; vertical-align: middle; width:10%!important; color:white; background-color: #5c617a; border-left: none; border-top-left-radius: 4px; -webkit-border-top-left-radius: 4px; -moz-border-radius-topleft: 4px;" class="sorting_disabled" colspan="1">
                                                <label>Office</label>
                                                <select required="" class="col-sm-2 form-control office " name="office" id="office">
                                                    <?php foreach ($pmo as $key => $data) : ?>
                                                        <option <?php if ($data['id'] == $office) {
                                                                    echo 'selected';
                                                                } ?> value=<?= $data['id']; ?>><?= $data['office']; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </th>
                                            <th rowspan="2" style="width:10%;text-align:center; vertical-align: middle; color:white; background-color: #5c617a;" class="sorting_disabled" colspan="1">
                                                <label>Type</label>
                                            </th>
                                            <th rowspan="2" style="text-align:center; vertical-align: middle; color:white; background-color: #5c617a;width:5% !important;" class="sorting_disabled">Purpose</th>
                                            <th rowspan="2" style="text-align:center; vertical-align: middle; width:10%!important; color:white; background-color: #5c617a;" class="sorting_disabled" colspan="1">Price</th>
                                            <th colspan="2" style="text-align:center; vertical-align: middle; width:19%!important; color:white; background-color: #5c617a;" rowspan="1">Date Info</th>
                                            <th rowspan="2" style="text-align:center; vertical-align: middle; width:20%!important; color:white; background-color: #5c617a;" class="sorting_disabled" colspan="1">Status</th>


                                            <th rowspan="2" style="max-width:50%;text-align:center; vertical-align: middle; color:white; background-color: #5c617a;border-right: none; border-top-right-radius: 4px; -webkit-border-top-right-radius: 4px; -moz-border-radius-topright: 4px;" class="sorting_disabled" colspan="1">Actions</th>
                                        </tr>
                                        <tr role="row">
                                            <th style="text-align: center; vertical-align: middle; color:white; background-color: #5c617a;" class="sorting_disabled" rowspan="1" colspan="1">PR Date</th>
                                            <th style="text-align: center; vertical-align: middle; color:white; background-color: #5c617a;" class="sorting_disabled" rowspan="1" colspan="1">Target Date</th>
                                        </tr>

                                    </thead>
                                    <tbody id="list_body">

                                        <?php foreach ($pr_details as $key => $data) : ?>
                                            <?php
                                            $css = '';
                                            if ($data['urgent'] == 1) {
                                                $css .= 'style="background-color:#ef9a9a;color:#fff;"';
                                            } else {
                                                $css .= '';
                                            }
                                            ?>
                                            <tr>
                                                <td <?= $css; ?>><?= $data['pr_no']; ?></td>
                                                <td <?= $css; ?>><?= $data['division']; ?></td>
                                                <td <?= $css; ?> style="width:10% ;"><?= $data['type']; ?></td>
                                                <td <?= $css; ?>><?= $data['purpose']; ?></td>
                                                <td <?= $css; ?>><?= $data['total_abc']; ?></td>
                                                <td <?= $css; ?>><?= $data['pr_date']; ?></td>
                                                <td <?= $css; ?>><?= $data['target_date']; ?></td>
                                                <td <?= $css; ?>><?= $data['status']; ?></td>

                                                <td <?= $css; ?> style="width: 20%;"> <?php include 'action_buttons.php'; ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>