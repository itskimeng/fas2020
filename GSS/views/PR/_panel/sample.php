<div class="filter_buttons fadeInDown" style="display:none;">
    <div class="row">
        <div class="col-md-3">
            <?= group_select('Year', 'filter_year', [2020, 2021, 2022], '', 'filter_year', 1, false); ?>
        </div>
        <div class="col-md-3">
            <?= group_select('Month', 'filter_month', $month_opts, '', 'filter_month', 1, false); ?>
        </div>
        <div class="col-md-3">
            <?= group_select('Payee', 'filter_payee', $payee_opts, '', 'filter_payee', 1, false); ?>
        </div>
        <div class="col-md-3">
            <?= group_select('Status', 'filter_status', '', '', 'filter_status', 1, false); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3">
            <?= group_select('data No.', 'filter_year', [2020, 2021, 2022], '', 'filter_year', 1, false); ?>
        </div>
        <div class="col-md-3">
            <?= group_date2('data Date', 'filter_data_date', 'filter_data_date', '', ''); ?>
        </div>
        <div class="col-md-3">
            <?= group_select('PO No.', 'filter_payee', $payee_opts, '', 'filter_payee', 1, false); ?>
        </div>
        <div class="col-md-3 text-right">
            <div class="form-group" style="margin-top:4px;">
                <br>
                <div class="btn-group">
                    <button type="button" id="btn-advance_search" value="close" class="btn btn-block btn-secondary btn-sm"><i class="fa fa-refresh"></i> Clear</button>
                </div>

                <div class="btn-group">
                    <button type="button" id="btn-advance_search" value="close" class="btn btn-block btn-primary btn-sm"><i class="fa fa-search-plus"></i> Filter</button>
                </div>
            </div>
        </div>
    </div>
    <hr>
</div>

<div style="position: absolute;margin-left:87%;">
    <!-- <div class="btn-group">
        <button type="button" id="btn-advance_search" value="close" class="btn btn-success btn-secondary btn-sm">
            <i class="fa fa-search-plus"></i> Advance Filter
        </button>
    </div> -->

    <div class="btn-group">
        <a href="procurement_purchase_request_createv2.php?flag=0&id=<?= $get_pr_id['pr_id'];?>&pr_no=<?= $get_pr['pr_no']; ?>&division=<?= $_GET['division']; ?>" id="btn-advance_search" value="close" class="btn btn-block btn-primary btn-sm">
            <i class="fa fa-plus"></i> Create Purchase Request
        </a>
    </div>
</div>
<table id="example2" class="table table-bordered table-striped display">
    <thead>
        <tr style="color: white; background-color: #367fa9;">
            <th class="hidden"></th>
            <th style="color:#367fa9;"></th>
            <th class="text-center">Purchase Request No.</th>
            <th class="text-center">Office</th>
            <th class="text-center">Type</th>
            <th class="text-center">Price</th>
            <th class="text-center">Purchase Date</th>
            <th class="text-center">Target Date</th>
            <!-- <th class="text-center">Received By</th> -->
            <th class="text-center">Action</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($pr_details as $key => $data) : ?>
      <tr>  
      <td class="hidden" style="vertical-align: middle;"><?php echo $ors['id']; ?></td>

        <td <?= $td; ?>><?= $data['pr_no']; ?><br><?= $css; ?></td>
        <td <?= $td; ?>><?= $data['pr_no']; ?><br><?= $css; ?></td>
        <td <?= $td; ?>><?= $data['division']; ?></td>
        <td <?= $td; ?>><?= $data['type']; ?></td>
        <td <?= $td; ?>><?= $data['total_abc']; ?></td>
        <td <?= $td; ?>><?= $data['pr_date']; ?></td>
        <td <?= $td; ?>><?= $data['target_date']; ?></td>
        <td style="width: 20%;text-align:center;background-color:#FFCDD2;"> <?php include 'action_buttons.php'; ?></td>
        <td class="hidden"><?= $data['status']; ?></td>
        <td class="hidden"><?= $data['reason_gss']; ?></td>
        <td class="hidden">
        <?= $data['purpose']; ?>
        </td>
        <td class="hidden">
         
        </td>
        <td class="hidden"><?= $data['po']; ?></td>
        <td class="hidden"></td>
      </tr>
    <?php endforeach ?>
    </tbody>
</table>

<script>
    $(document).ready(function() {
        function format(data) {
            let tb = '<table class="table table-bordered" cellpadding="9">';
            tb += '<tr style="text-align: center; background-color: #9CCC65; color: white;">';
            tb += '<td width="12%"><b>Status</b></td>';
            tb += '<td width="12%"><b>Reason</b></td>';
            tb += '<td><b>Purpose</b></td>';
            tb += '<td width="12%"><b>RFQ</b></td>';
            tb += '<td width="12%"><b>Awarded To</b></td>';
            tb += '<td width="12%"><b>PO Number</b></td>';
            tb += '</tr>';
            tb += '<tr>';
            tb += '<td class="text-center">' + data.status + '</td>';
            tb += '<td class="text-center">' + data.reason + '</td>';
            tb += '<td class="text-center">' + data.purpose + '</td>';
            tb += '<td class="text-center">' + data.rfq + '</td>';
            tb += '<td class="text-center">' + data.awarded_to + '</td>';
            tb += '<td class="text-center">' + data.po_number + '</td>';
            tb += '</tr>';

            return tb;
        }
        var table = $('#example2').DataTable({
            // "ajax": "../ajax/data/objects.txt",
            "bInfo" : false,

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
                    "data": "purchase_date",
                    "width": "8%"
                },
             
                {
                    "data": "target_date",
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
                    "data": "status",
                    "visible": false
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