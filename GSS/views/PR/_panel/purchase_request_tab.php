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
            <div class="box">
                <div class="box-header with-border">
                    <div class="box-tools pull-right">

                    </div>
                </div>
                <div class="box-body">
                    <button class="btn btn-flat bg-green">

                        <a href="procurement_purchase_request_createv2.php?flag=0&id=<?= $get_pr_id['pr_id']; ?>&pr_no=<?= $get_pr['pr_no']; ?>&division=<?= $_GET['division']; ?>" style="color:#fff;">
                            <img src="GSS/views/backend/images/create.png" style="width:25px;" />
                            Create PR</a>
                    </button>

                    <button class="btn btn-flat bg-purple">
                        <a href="procurement_transparency.php" style="color:#fff;">
                            <img src="GSS/views/backend/images/transparency.png" style="width:25px;" />
                            Transparency Page</a>
                    </button><br><br>
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <span><i class="fa fa-bar-chart-o fa-fw"></i>PURCHASE REQUEST ENTRIES</span>
                            <span class="pull-right hidden-xs"><small><i class="fa fa-clock-o fa-fw"></i>as of <?= date('F d, Y h:i:a'); ?></small></span>
                        </div>
                        <div class="box-body box-emp">

                            <div class="col-sm-12">
                                <?= proc_text_input("hidden", '', 'cform-received-by', '', false, $_SESSION['currentuser']); ?>
                                <?= proc_text_input("hidden", '', 'cform-pmo', '', false, $_GET['division']); ?>


                                <table id="example2" class="table table-bordered table-striped display">
                                    <thead>
                                        <tr style="color: white; background-color: #367fa9;">
                                            <th class="hidden"></th>
                                            <th style="color:#367fa9;"></th>
                                            <th class="text-center">Purchase Request No.</th>
                                            <th class="text-center">Office</th>
                                            <th class="text-center">Type</th>
                                            <th class="text-center">Price</th>
                                            <th class="text-center">Purpose</th>
                                            <th class="text-center">PR Date</th>
                                            <th class="text-center">Target Date</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-center">Time Elapsed</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                        function action_button($data, $username, $admin, $division)
                                        {

                                            $btn_batch1 =
                                                '
                                                <button class="btn btn-success btn-sm btn-view" title="View">
                                                    <a href="procurement_purchase_request_view.php?division=' . $_GET['division'] . '&id=' . $data['id'] . '&pr_no=' . $data['pr_no'] . '" >
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                </button>
                                                <button class="btn btn-danger btn-sm btn-view">
                                                    <a href="GSS/route/post_to_budget.php?pr_no=' . $data['pr_no'] . '&id=' . $data['id'] . '">
                                                        <i class="fa fa-share-square"></i>
                                                    </a>
                                                </button>
                                                <button  id="btn_submit_to_gss" disabled class="btn btn-primary btn-sm btn-view" title="Submit to GSS" data-id="' . $data['id'] . '" value="' . $data['pr_no'] . '">
                                                    <i class="fa fa-send"></i>
                                                </button>
                                                <button id="sweet-4" class="btn btn-warning btn-sm btn-view" title="Cancel this PR" data-id="' . $data['id'] . '" value="' . $data['pr_no'] . '">
                                                    <i class="fa fa-times-circle"></i>
                                                </button> ';

                                            $btn_batch2 =
                                                '
                                                <button class="btn btn-success btn-sm btn-view" title="View">
                                                    <a href="procurement_purchase_request_view.php?division=' . $_GET['division'] . '&id=' . $data['id'] . '&pr_no=' . $data['pr_no'] . '" >
                                                        <i class="fa fa-eye"></i></a>
                                                            </button>
                                                <button class="btn btn-danger btn-sm btn-view" disabled>
                                                    <a href="GSS/route/post_to_budget.php?pr_no=' . $data['pr_no'] . '&id=' . $data['id'] . '">
                                                        <i class="fa fa-share-square"></i></a>
                                                            </button>
                                                <button  disabled id="btn_submit_to_gss"  class="btn btn-primary btn-sm btn-view" title="Submit to GSS" data-id="' . $data['id'] . '" value="' . $data['pr_no'] . '">
                                                    <i class="fa fa-send"></i></button>
                                                <button id="sweet-4" class="btn btn-warning btn-sm btn-view" title="Cancel this PR" data-id="' . $data['id'] . '" value="' . $data['pr_no'] . '"> <i class="fa fa-times-circle"></i></button>
                                                ';

                                            $btn_batch3 =
                                                '
                                                <button class="btn btn-success btn-sm btn-view" title="View">
                                                    <a href="procurement_purchase_request_view.php?division=' . $_GET['division'] . '&id=' . $data['id'] . '&pr_no=' . $data['pr_no'] . '" >
                                                        <i class="fa fa-eye"></i></a>
                                                            </button>
                                                <button class="btn btn-danger btn-sm btn-view" disabled>
                                                    <a href="GSS/route/post_to_budget.php?pr_no=' . $data['pr_no'] . '&id=' . $data['id'] . '">
                                                        <i class="fa fa-share-square"></i></a>
                                                            </button>
                                                <button  id="btn_submit_to_gss"  class="btn btn-primary btn-sm btn-view" title="Submit to GSS" data-id="' . $data['id'] . '" value="' . $data['pr_no'] . '">
                                                    <i class="fa fa-send"></i>
                                                        </button>
                                                <button id="sweet-4" class="btn btn-warning btn-sm btn-view" title="Cancel this PR" data-id="' . $data['id'] . '" value="' . $data['pr_no'] . '"> <i class="fa fa-times-circle"></i></button>
                                                ';
                                            $btn_batch4 =
                                                '
                                                    <button class="btn btn-success btn-sm btn-view" title="View">
                                                        <a href="procurement_purchase_request_view.php?division=' . $_GET['division'] . '&id=' . $data['id'] . '&pr_no=' . $data['pr_no'] . '" >
                                                            <i class="fa fa-eye"></i></a>
                                                                </button>
                                                    <button class="btn btn-danger disabled btn-sm btn-view" disabled>
                                                        <a href="GSS/route/post_to_budget.php?pr_no=' . $data['pr_no'] . '&id=' . $data['id'] . '"> 
                                                            <i class="fa fa-share-square"></i></a>
                                                                </button>
                                                    <button  disabled id="btn_submit_to_gss"  class="btn btn-primary btn-sm btn-view" title="Submit to GSS" data-id="' . $data['id'] . '" value="' . $data['pr_no'] . '">
                                                        <i class="fa fa-send"></i>
                                                            </button>
                                                    <button id="sweet-4" class="btn btn-warning btn-sm btn-view" title="Cancel this PR" data-id="' . $data['id'] . '" value="' . $data['pr_no'] . '">
                                                     <i class="fa fa-times-circle"></i></button>
                                                ';




                                            if (in_array($username, $admin)) {
                                                if ($data['stat'] == 0) {
                                                    echo $btn_batch1;
                                                } else if ($data['stat'] == 1) {
                                                    echo $btn_batch2;
                                                } else if ($data['stat'] == 2) {
                                                    echo $btn_batch3;
                                                } else if ($data['stat'] == 3) {
                                                    echo $btn_batch4;
                                                } else if ($data['stat'] == 16) {
                                                    echo $btn_batch3;
                                                } else {
                                                    echo $btn_batch4;
                                                }
                                            } else if ($username == $data['submitted_by']) {
                                                if ($data['stat'] == 0) {
                                                    echo $btn_batch1;
                                                } else if ($data['stat'] == 1) {
                                                    echo $btn_batch2;
                                                } else if ($data['stat'] == 3) {
                                                    echo $btn_batch4;
                                                } else if ($data['stat'] == 2) {
                                                    echo $btn_batch3;
                                                } else {
                                                    echo $btn_batch4;
                                                }
                                            } else {
                                                echo $btn_batch4;
                                            }
                                        }
                                       

                                        ?>

                                        <?php foreach ($pr_details as $key => $data) : ?>

                                            <?php $td = 'style="background-color:;"'; ?>

                                            <?php if ($data['urgent'] == 1) : ?>
                                                <?php $status = 'URGENT'; ?>

                                                <tr>
                                                    <td class="hidden" style="vertical-align: middle;"><?php echo $ors['id']; ?></td>

                                                    <td <?= $td; ?>><?= $data['pr_no']; ?><br></td>
                                                    <td <?= $td; ?>><?= $data['pr_no']; ?><br><label class="label label-danger"><?= $status; ?></label><br></td>
                                                    <td <?= $td; ?>><?= $data['division']; ?></td>
                                                    <td <?= $td; ?>><?= $data['type']; ?></td>
                                                    <td <?= $td; ?>><?= '₱'.number_format($data['total_abc'], 2); ?></td>
                                                    <td <?= $td; ?>><?= $data['purpose']; ?></td>
                                                    <td <?= $td; ?>><?= $data['pr_date']; ?></td>
                                                    <td <?= $td; ?>><?= $data['target_date']; ?></td>
                                                    <td <?= $td; ?>><?= $data['status']; ?></td>
                                                    <td <?= $td; ?>><?= $data['time_elapsed']; ?></td>
                                                    <td <?= $td; ?>> <?php include 'action_buttons.php'; ?></td>
                                                    <td class="hidden"><?= $data['reason']; ?></td>
                                                    <td class="hidden"> <?= $data['purpose']; ?> </td>
                                                    <td class="hidden"> <?= $data['rfq_no']; ?> </td>

                                                    <td class="hidden"><?= $data['abstract_no']; ?></td>
                                                    <td class="hidden"><?= $data['po_no']; ?></td>
                                                </tr>

                                            <?php else : ?>
                                                <?php if ($data['stat'] == 17) : ?>
                                                    <?php $td = 'style="background-color:#;"';
                                                    $css = '<label class="label label-danger">CANCELLED</label>';
                                                    ?>

                                                    <tr>
                                                        <td class="hidden" style="vertical-align: middle;"><?php echo $ors['id']; ?></td>

                                                        <td <?= $td; ?>><?= $data['pr_no']; ?><br></td>
                                                        <td <?= $td; ?>><?= $data['pr_no']; ?><br></td>
                                                        <td <?= $td; ?>><?= $data['division']; ?></td>
                                                        <td <?= $td; ?>><?= $data['type']; ?></td>
                                                        <td <?= $td; ?>><?= '₱'.number_format($data['total_abc'], 2); ?></td>
                                                        <td <?= $td; ?>><?= $data['purpose']; ?></td>
                                                        <td <?= $td; ?>><?= $data['pr_date']; ?></td>
                                                        <td <?= $td; ?>><?= $data['target_date']; ?></td>
                                                        <td <?= $td; ?>><?= $data['status']; ?></td>
                                                        <td <?= $td; ?>><?= $data['time_elapsed']; ?></td>
                                                        <td <?= $td; ?>> <?php include 'action_buttons.php'; ?></td>
                                                        <td class="hidden"><?= $data['reason']; ?></td>
                                                        <td class="hidden"> <?= $data['purpose']; ?> </td>
                                                        <td class="hidden"> <?= $data['rfq_no']; ?> </td>

                                                        <td class="hidden"><?= $data['abstract_no']; ?></td>
                                                        <td class="hidden"><?= $data['po_no']; ?></td>
                                                    </tr>
                                                <?PHP else : ?>
                                                    <tr>
                                                        <td class="hidden" style="vertical-align: middle;"><?php echo $ors['id']; ?></td>

                                                        <td <?= $td; ?>><?= $data['pr_no']; ?><br></td>
                                                        <td <?= $td; ?>><?= $data['pr_no']; ?><br></td>
                                                        <td <?= $td; ?>><?= $data['division']; ?></td>
                                                        <td <?= $td; ?>><?= $data['type']; ?></td>
                                                        <td <?= $td; ?>><?= '₱'.number_format($data['total_abc'], 2); ?></td>
                                                        <td <?= $td; ?>><?= $data['purpose']; ?></td>
                                                        <td <?= $td; ?>><?= $data['pr_date']; ?></td>
                                                        <td <?= $td; ?>><?= $data['target_date']; ?></td>
                                                        <td <?= $td; ?>><?= $data['status']; ?></td>
                                                        <td <?= $td; ?>><?= $data['time_elapsed']; ?></td>
                                                        <td <?= $td; ?>> <?php include 'action_buttons.php'; ?></td>
                                                        <td class="hidden"><?= $data['reason']; ?></td>
                                                        <td class="hidden"> <?= $data['purpose']; ?> </td>
                                                        <td class="hidden"> <?= $data['rfq_no']; ?> </td>

                                                        <td class="hidden"><?= $data['abstract_no']; ?></td>
                                                        <td class="hidden"><?= $data['po_no']; ?></td>
                                                    </tr>
                                                <?php endif; ?>
                                            <?php endif; ?>

                                        <?php endforeach ?>
                                    </tbody>
                                </table>



                            </div>
                        </div>
                    </div>
                </div>
                <!-- modal -->
                <!-- Button trigger modal -->


                <?php include 'modal_tracking.php'; ?>
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
<script>
    $(document).ready(function() {
        function format(data) {
            let tb = '<table class="table table-bordered" cellpadding="9">';
            tb += '<tr style="text-align: center; background-color: #FB8C00;color:#fff;">';
            tb += '<td width="12%"><b>Reason</b></td>';
            tb += '<td width="12%"><b>RFQ</b></td>';
            tb += '<td width="12%"><b>Abstract Number</b></td>';
            tb += '<td width="12%"><b>Purchase Order Number</b></td>';
            tb += '</tr>';
            tb += '<tr>';
            tb += '<td class="text-center">' + data.reason + '</td>';
            tb += '<td class="text-center">' + data.rfq + '</td>';
            tb += '<td class="text-center">' + data.awarded_to + '</td>';
            tb += '<td class="text-center">' + data.po_number + '</td>';
            tb += '</tr>';

            return tb;
        }
        var table = $('#example2').DataTable({
            // "ajax": "../ajax/data/objects.txt",
            "bInfo": false,

            'lengthChange': false,
            "dom": '<"pull-left"f><"pull-right"l>tip',

            'lengthChange': true,
            'searching': true,
            'ordering': true,
            'info': false,
            'autoWidth': false,


            "bLengthChange": false,
            "bFilter": true,
            "bInfo": false,
            "bAutoWidth": false,
            "columns": [{
                    "data": "id",
                    "visible": false
                },
                {
                    "className": 'details-control text-center',
                    "orderable": false,
                    "sortable": false,
                    "data": null,
                    "width": "5%",
                    "defaultContent": '<a type="button" class="btn btn-xs btn-success" style="border-radius:50%"><span class="fa fa-plus"></span></a>',
                },
                {
                    "data": "pr_no",
                    "width": "8%",
                    "className": 'text-center'
                },
                {
                    "data": "office",
                    "width": "5%",
                    "className": 'text-center'
                },
                {
                    "data": "type",
                    "width": "12%",
                    "className": 'text-center'
                },

                {
                    "data": "price",
                    "width": "5%",
                    "className": 'text-center'
                },
                {
                    "data": "purpose",
                    "width": "10%"
                },
                {
                    "data": "purchase_date",
                    "width": "8%"
                },

                {
                    "data": "target_date",
                    "width": "8%",
                    "className": 'text-center'
                },
                {
                    "data": "status",
                    "width": "8%",
                    "className": 'text-center'
                },
                
                {
                    "data": "time_elapsed",
                    "width": "8%",
                    "className": 'text-center'
                },

                {
                    "data": "action",
                    "width": "20%",
                    "sortable": false,
                    "className": 'text-center'
                },

                {
                    "data": "reason",
                    "visible": false
                },
                {
                    "data": "purpose",
                    "visible": false
                },
                {
                    "data": "rfq",
                    "visible": false
                },
                {
                    "data": "awarded_to",
                    "visible": false
                },
                {
                    "data": "po_number",
                    "visible": false
                },
            ],

            'searching': true,
        });
        $('#example2 tbody').on('click', 'td.details-control', function() {

            var tr = $(this).closest('tr');
            var row = table.row(tr);
            let tdf = tr.find('td:first');

            tdf.html('');

            if (row.child.isShown()) {
                // This row is already open - close it
                row.child.hide();
                tdf.append('<a type="button" class="btn btn-xs btn-success" style="border-radius:50%;"><span class="fa fa-plus"></span></a>');
                tr.removeClass('shown');
            } else {
                // Open this row
                row.child(format(row.data())).show();
                tdf.append('<a type="button" class="btn btn-cirle btn-xs btn-success" style="border-radius:50%"><span class="fa fa-minus"></span></a>');
                tr.addClass('shown');
                row.child().css('background-color', '#b4b4b4');
            }
        });

    })

    $(document).on('click', '#showModal', function() {
        let pr_id = $(this).data('id');
        let pr_no = $(this).data('value');
        let path = 'GSS/route/post_status_history.php';
        let data = {
            'id': pr_id,
            'pr_no': pr_no
        };

        $.post(path, data, function(data, status) {
            $('#app_table').empty();
            let lists = JSON.parse(data);
            sample(lists);
            $('#viewStatus').modal();
            $('#title_header').html('<i class="fa fa-list fa-fw"></i>Purchase Request Number:<b>' + pr_no + '</b>');

        });

        function duration(dt1, dt2) {

            var today = new Date(dt2);
            var Christmas = new Date(dt1);
            var diffMs = (Christmas - today); // milliseconds between now & Christmas
            var diffDays = Math.floor(diffMs / 86400000); // days
            var diffHrs = Math.floor((diffMs % 86400000) / 3600000); // hours
            var diffMins = Math.round(((diffMs % 86400000) % 3600000) / 60000); // minutes


            let result = ''
            if(diffDays == 0 && diffHrs == 0)
            {
                result = diffMins +" minutes";
            }else if(diffDays == 0){
                result = diffHrs+ "hours and "+diffMins +" minutes";

            }else{
                result = diffDays +" days and "+diffHrs+ "hours and "+diffMins +" minutes";

            }


            return result;

        }

        function sample($data) {
            let arr_val = [];
            let setTime = '';
            $.each($data, function(key, item) {
                arr_val.push(item['time_e']);








                let ul = '<ul class="timeline timeline-inverse">';
                ul += '<li class="time-label">';
                ul += '<span class="bg-red" id="action_date">' + item['action_date'] + '</span>';

                ul += '</li>';
                ul += '<li>';
                ul += '<i class="fa fa-clock-o bg-blue"></i>';

                ul += '<div class="timeline-item">';
                ul += '';

                ul += '<h3 class="timeline-header"><a href+="#">ACTION TAKEN:' + item['status'] + '</a></h3>';

                ul += '<div class="timeline-body">';
                ul += '<table class="table table-responsive borderless">';
                ul += '<tbody>';
                ul += '<tr>';
                ul += '<td width="115px"><label><i class="fa fa-clock-o"></i> Time</label></td>';
                ul += '<td width="5px">:</td>';
                ul += '<td>' + item['action_time']; + '</td>';
                ul += '</tr>';
                if (item['code'] !== '' && item['stat'] == 2) {
                    ul += '<tr>';
                    ul += '<td width="115px"><label><i class="fa fa-check-circle"></i> Code</label></td>';
                    ul += '<td width="5px">:</td>';
                    ul += '<td>' + item['code']; + '</td>';
                    ul += '</tr>';
                }
                ul += '<tr>';
                ul += '<td width="115px"><label><i class="fa fa-clock"></i> Time Elapsed</label></td>';
                ul += '<td width="5px">:</td>';
                if (item['stat'] == 1) {
                    ul += '<td>' + duration(arr_val[1], arr_val[0]) + '</td>';
                } else if (item['stat'] == 2) {
                    ul += '<td>' + duration(arr_val[2], arr_val[1]) + '</td>';
                } else if (item['stat'] == 3) {
                    ul += '<td>' + duration(arr_val[3], arr_val[2]) + '</td>';
                } else if (item['stat'] == 4) {
                    ul += '<td>' + duration(arr_val[4], arr_val[3]) + '</td>';
                } else if (item['stat'] == 5) {
                    ul += '<td>' + duration(arr_val[5], arr_val[4]) + '</td>';
                } else if (item['stat'] == 6) {
                    ul += '<td>' + duration(arr_val[6], arr_val[5]) + '</td>';
                } else if (item['stat'] == 7) {
                    ul += '<td>' + duration(arr_val[7], arr_val[6]) + '</td>';
                } else if (item['stat'] == 8) {
                    ul += '<td>' + duration(arr_val[8], arr_val[7]) + '</td>';
                } else if (item['stat'] == 9) {
                    ul += '<td>' + duration(arr_val[9], arr_val[8]) + '</td>';
                } else if (item['stat'] == 10) {
                    ul += '<td>' + duration(arr_val[10], arr_val[9]) + '</td>';
                } else if (item['stat'] == 11) {
                    ul += '<td>' + duration(arr_val[11], arr_val[10]) + '</td>';
                } else if (item['stat'] == 12) {
                    ul += '<td>' + duration(arr_val[12], arr_val[11]) + '</td>';
                } else if (item['stat'] == 13) {
                    ul += '<td>' + duration(arr_val[13], arr_val[12]) + '</td>';
                } else if (item['stat'] == 14) {
                    ul += '<td>' + duration(arr_val[14], arr_val[13]) + '</td>';
                } else if (item['stat'] == 15) {
                    ul += '<td>' + duration(arr_val[15], arr_val[14]) + '</td>';
                } else if (item['stat'] == 16) {
                    ul += '<td>' + duration(arr_val[16], arr_val[15]) + '</td>';
                } else if (item['stat'] == 17) {
                    ul += '<td>' + duration(arr_val[17], arr_val[16]) + '</td>';
                }else{
                    ul += '<td>~</td>';

                }
                ul += '</tr>';
                ul += '<tr>';
                ul += '<td><label><i class="fa fa-user"></i> Assigned by:</label></td>';
                ul += '<td>:</td>';
                ul += '<td>' + item['assign_employee'] + '<br><small>REGION IV-A - CALABARZON<br>' + item['office'] + '</small></td>';
                ul += '</tr>';
                ul += '</tbody>';
                ul += '</table>';
                ul += '</div>';

                ul += '</div>';
                ul += '</li>';

                ul += '</ul>';

                $('#history').append(ul);
            });
            return $data;
        }
        $("#history").html("");

    })
</script>