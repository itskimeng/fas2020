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
                            <span class="pull-right hidden-xs"><small><i class="fa fa-clock-o fa-fw"></i>as of <?= date('F d, Y'); ?></small></span>
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
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php foreach ($pr_details as $key => $data) : ?>

                                            <?php $td = 'style="background-color:;"'; ?>

                                            <?php if ($data['urgent'] == 1) : ?>
                                                <?php $status = 'URGENT'; ?>

                                                <tr>
                                                    <td class="hidden" style="vertical-align: middle;"><?php echo $ors['id']; ?></td>

                                                    <td <?= $td; ?>><?= $data['pr_no']; ?><br></td>
                                                    <td <?= $td; ?>><?= $data['pr_no']; ?><br><label class="label label-danger"><?= $status; ?></label></td>
                                                    <td <?= $td; ?>><?= $data['division']; ?></td>
                                                    <td <?= $td; ?>><?= $data['type']; ?></td>
                                                    <td <?= $td; ?>><?= $data['total_abc']; ?></td>
                                                    <td <?= $td; ?>><?= $data['purpose']; ?></td>
                                                    <td <?= $td; ?>><?= $data['pr_date']; ?></td>
                                                    <td <?= $td; ?>><?= $data['target_date']; ?></td>
                                                    <td <?= $td; ?>><?= $data['status']; ?></td>
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
                                                        <td <?= $td; ?>><?= $data['total_abc']; ?></td>
                                                        <td <?= $td; ?>><?= $data['purpose']; ?></td>
                                                        <td <?= $td; ?>><?= $data['pr_date']; ?></td>
                                                        <td <?= $td; ?>><?= $data['target_date']; ?></td>
                                                        <td <?= $td; ?>><?= $data['status']; ?></td>
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
                                                        <td <?= $td; ?>><?= $data['total_abc']; ?></td>
                                                        <td <?= $td; ?>><?= $data['purpose']; ?></td>
                                                        <td <?= $td; ?>><?= $data['pr_date']; ?></td>
                                                        <td <?= $td; ?>><?= $data['target_date']; ?></td>
                                                        <td <?= $td; ?>><?= $data['status']; ?></td>
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
                    "width": "8%",
                    "className": 'text-center'
                },
                {
                    "data": "type",
                    "width": "12%",
                    "className": 'text-center'
                },

                {
                    "data": "price",
                    "width": "10%",
                    "className": 'text-center'
                },
                {
                    "data": "purpose",
                    "width": "20%"
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
                    "data": "action",
                    "width": "10%",
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
        // Add event listener for opening and closing details
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
</script>