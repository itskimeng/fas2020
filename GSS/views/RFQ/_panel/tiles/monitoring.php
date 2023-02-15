<table class="table table-condensed table-striped" id="monitoring" >
    <thead style="background: linear-gradient(90deg, #FFCDD2,#F44336);color:#fff;">
        <tr>
            <th style="width:10%" class="hidden"></th>
            <th style="color:#367fa9;"></th>
            <th>PR NO</th>
            <th>ABC</th>
            <th>Particulars</th>
            <th>End-User</th>
            <th>Date Received</th>
            <th>Received by</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($rfq_data as $key => $data) : ?>
            <tr>
                <td class="hidden" style="vertical-align: middle;"><?php echo $ors['id']; ?> </td>
                <td><?= $data['pr_no']; ?></td>
                <td><?= $data['pr_no']; ?></td>
                <td><?= '₱' . number_format($data['amount'], 2); ?></td>
                <td> <?= $data['purpose']; ?> </td>
                <td> <?= $data['division']; ?> </td>
                <td> <?= $data['received_date']; ?> </td>
                <td> FAD-GSS</td>
                <td style="width:10%;text-align:center;"><?= $data['stat']; ?></td>
                <td class="hidden"> <?= $data['rfq_no']; ?> </td>
                <td class="hidden"> <?= $data['rfq_date']; ?> </td>
                <td class="hidden"> <?= $data['target_date']; ?> </td>
                <td class="hidden"> <?= $data['abstract_no']; ?> </td>
                <td class="hidden"> <?= $data['po_no']; ?> </td>
                <td class="hidden"> <?= $data['po_no']; ?> </td>
                <td class="hidden"> <?= $data['po_no']; ?> </td>
            </tr>
        <?php endforeach; ?>

    </tbody>
</table>
<link href="GSS/views/RFQ/_panel/tiles/dataTables.css" rel="stylesheet" />
<script type="text/javascript" src="GSS/views/RFQ/_panel/tiles/dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        var monitoring = $('#monitoring').DataTable({
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
                    "data": "abc",
                    "width": "8%",
                    "className": 'text-center'
                },
                {
                    "data": "particulars",
                    "width": "8%",
                    "className": 'text-center'
                },
                {
                    "data": "end_user",
                    "width": "8%",
                    "className": 'text-center'
                },
                {
                    "data": "date_received",
                    "width": "8%",
                    "className": 'text-center'
                },
                {
                    "data": "received_by",
                    "width": "8%",
                    "className": 'text-center'
                },
                {
                    "data": "status",
                    "width": "8%",
                    "className": 'text-center'
                },
                {
                    "data": "rfq_no",
                    "width": "8%",
                    "className": 'text-center'
                },
                {
                    "data": "rfq_date",
                    "width": "8%",
                    "className": 'text-center'
                },
                {
                    "data": "target_date",
                    "width": "8%",
                    "className": 'text-center'
                },
                {
                    "data": "abstract_no",
                    "width": "8%",
                    "className": 'text-center'
                },
                {
                    "data": "po_no",
                    "width": "8%",
                    "className": 'text-center'
                },
                {
                    "data": "po_amount",
                    "width": "8%",
                    "className": 'text-center'
                },
                {
                    "data": "supplier",
                    "width": "8%",
                    "className": 'text-center'
                },
               
               

            ],

            'searching': true,
        })
        function format(data) {
            console.log(data);
            let tb = '<table class="table table-bordered" cellpadding="9">';
            tb += '<tr style="text-align: center;color:#fff;" class="bg-primary">';
            tb += '<td width="12%"><b>RFQ</b></td>';
            tb += '<td width="12%"><b>RFQ Date</b></td>';
            tb += '<td width="12%"><b>Target Date</b></td>';
            tb += '<td width="12%"><b>Abstract No</b></td>';
            tb += '<td width="12%"><b>PO No</b></td>';
            tb += '<td width="12%"><b>PO Amount</b></td>';
            tb += '<td width="12%"><b>Supplier</b></td>';
            tb += '</tr>';
            tb += '<tr>';
            tb += '<td class="text-center">' + data.rfq_no + '</td>';
            tb += '<td class="text-center">' + data.rfq_date + '</td>';
            tb += '<td class="text-center">' + data.target_date + '</td>';
            tb += '<td class="text-center">' + data.abstract_no + '</td>';
            tb += '<td class="text-center">' + data.po_no + '</td>';
            tb += '<td class="text-center">' + data.po_amount + '</td>';
            tb += '<td class="text-center">' + data.supplier + '</td>';
            tb += '</tr>';



            return tb;
        }
        $('#monitoring tbody').on('click', 'td.details-control', function() {
            var tr = $(this).closest('tr');
            var row = monitoring.row(tr);
            let tdf = tr.find('td:first');

            tdf.html('');

            if (row.child.isShown()) {
                // This row is already open - close it
                row.child.hide();
                tdf.append(
                    '<a type="button" class="btn btn-xs btn-success" style="border-radius:50%;"><span class="fa fa-plus"></span></a>'
                );
                tr.removeClass('shown');
            } else {
                // Open this row
                row.child(format(row.data())).show();
                tdf.append(
                    '<a type="button" class="btn btn-cirle btn-xs btn-success" style="border-radius:50%"><span class="fa fa-minus"></span></a>'
                );
                tr.addClass('shown');
                row.child().css('background-color', '#b4b4b4');
            }
        });
    })
</script>