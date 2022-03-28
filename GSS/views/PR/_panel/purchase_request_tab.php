<div id="tab">
    <ul role="tablist" class="nav nav-tabs bs-adaptive-tabs" id="myTab">
        <li role="presentation" class="active">
            <a aria-expanded="true" aria-controls="home" data-toggle="tab" role="tab" id="tab2-tab" href="#tab2">
                <img src="GSS/views/backend/images/procurement.png" style="width:25px;" />
                <label>Purchase Request Entries</label>
            </a>
        </li>
        <li role="presentation">
            <a aria-expanded="true" aria-controls="home" data-toggle="tab" role="tab" id="tab3-tab" href="#tab3">
                <img src="GSS/views/backend/images/loan.png" style="width:25px;" />
                <label>Fund Source Downloaded</label>
            </a>
        </li>
        <li role="presentation">
            <a aria-expanded="true" aria-controls="home" data-toggle="tab" role="tab" id="tab4-tab" href="#tab4">
                <img src="GSS/views/backend/images/report.png" style="width:25px;" />
                <label>Summary of Report</label>
            </a>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div aria-labelledby="tab2-tab" id="tab2" class="tab-pane active" role="tabpanel">
            <div class="box" style="height:500px!important;">
                <div class="box-header with-border">
                    <div class="box-tools pull-right">

                    </div>
                </div>
                <div class="box-body">
                    <button class="btn btn-flat bg-green">
                        <a href="procurement_purchase_request_create.php?pr_no=<?= $get_pr['pr_no']; ?>&division=<?= $_GET['division']; ?>" style="color:#fff;">
                            <img src="GSS/views/backend/images/create.png" style="width:25px;" />
                            Create PR</a>
                    </button>

                    <button class="btn btn-flat bg-purple">
                        <a href="procurement_transparency.php" style="color:#fff;">
                            <img src="GSS/views/backend/images/transparency.png" style="width:25px;" />
                            Transparency Page</a>
                    </button>
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
                                            <th rowspan="2" style="text-align:center; vertical-align: middle; width:10%!important; color:white; background-color: #337ab7;" class="sorting_disabled" colspan="1">PR NO.</th>

                                            <th rowspan="2" style="text-align:center; vertical-align: middle; width:10%!important; color:white; background-color: #337ab7; border-left: none; border-top-left-radius: 4px; -webkit-border-top-left-radius: 4px; -moz-border-radius-topleft: 4px;" class="sorting_disabled" colspan="1">
                                                <label>Office</label>
                                                <select required="" class="col-sm-2 form-control office " name="office" id="office">
                                                    <?php foreach ($pmo as $key => $data) : ?>
                                                        <option <?php if ($data['id'] == $office) {
                                                                    echo 'selected';
                                                                } ?> value=<?= $data['id']; ?>><?= $data['office']; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </th>
                                            <th rowspan="2" style="width:10%;text-align:center; vertical-align: middle; color:white; background-color: #337ab7;" class="sorting_disabled" colspan="1">
                                                <label>Type</label>
                                            </th>
                                            <th rowspan="2" style="text-align:center; vertical-align: middle; color:white; background-color: #337ab7;width:5% !important;" class="sorting_disabled">Purpose</th>
                                            <th rowspan="2" style="text-align:center; vertical-align: middle; width:10%!important; color:white; background-color: #337ab7;" class="sorting_disabled" colspan="1">Price</th>
                                            <th colspan="2" style="text-align:center; vertical-align: middle; width:19%!important; color:white; background-color: #337ab7;" rowspan="1">Date Info</th>
                                            <th rowspan="2" style="text-align:center; vertical-align: middle; width:20%!important; color:white; background-color: #337ab7;" class="sorting_disabled" colspan="1">Status</th>


                                            <th rowspan="2" style="max-width:50%;text-align:center; vertical-align: middle; color:white; background-color: #337ab7;border-right: none; border-top-right-radius: 4px; -webkit-border-top-right-radius: 4px; -moz-border-radius-topright: 4px;" class="sorting_disabled" colspan="1">Actions</th>
                                        </tr>
                                        <tr role="row">
                                            <th style="text-align: center; vertical-align: middle; color:white; background-color: #337ab7;" class="sorting_disabled" rowspan="1" colspan="1">PR Date</th>
                                            <th style="text-align: center; vertical-align: middle; color:white; background-color: #337ab7;" class="sorting_disabled" rowspan="1" colspan="1">Target Date</th>
                                        </tr>

                                    </thead>
                                    <tbody id="list_body">

                                        <?php foreach ($pr_details as $key => $data) : ?>
                                            <?php
                                            $css = '';
                                            if ($data['urgent'] == 1) {
                                                $css .= '<label class="label label-danger" style="    display: inline; padding: 0.2em 0.6em 0.3em; font-size: 75%; font-weight: 700; line-height: 1; color: #fff; text-align: center; white-space: nowrap; vertical-align: baseline; border-radius: 0.25em;">URGENT</label>';
                                            } else {
                                                $css .= '';
                                            }
                                            ?>
                                            <tr>
                                                <td><?= $data['pr_no']; ?><br><?= $css; ?></td>
                                                <td><?= $data['division']; ?></td>
                                                <td style="width:10% ;"><?= $data['type']; ?></td>
                                                <td><?= $data['purpose']; ?></td>
                                                <td><?= $data['total_abc']; ?></td>
                                                <td><?= $data['pr_date']; ?></td>
                                                <td><?= $data['target_date']; ?></td>
                                                <td><b><?= $data['status']; ?></b></td>

                                                <td style="width: 20%;"> <?php include 'action_buttons.php'; ?></td>
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
        <div role="tabpanel" class="tab-pane" id="tab3">
            <div class="box">
                <div class="box-header with-border">
                    <div class="box-tools pull-right">

                    </div>
                </div>
                <div class="box-body">
                    <div class="callout callout-warning">
                        <h4> <i class="icon fa fa-warning"></i> Working in Progress 
                        </h4>
                    </div>
                </div>
            </div>
        </div>

        <div role="tabpanel" class="tab-pane" id="tab4">
            <div class="box" style="height:500px!important;">
                <div class="box-header with-border">
                    <div class="box-tools pull-right">

                    </div>
                </div>
                <div class="box-body" style="height:500px!important;">
                    <div class="callout callout-warning">
                        <h4> <i class="icon fa fa-warning"></i> Working in Progress 
                        </h4>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>