<table class="table table-condensed table-striped" id="rfq_table">
    <thead  style="background: linear-gradient(90deg, #FFCDD2,#F44336);color:#fff;">
        <tr>
            <th></th>
            <th>PR NO</th>
            <th>ABC</th>
            <th>Particulars</th>
            <th>End-user</th>
            <th>Date Received</th>
            <th>Received By</th>
            <th>RFQ NO</th>
            <th>Mode of Procurement</th>
            <th>RFQ Date</th>
            <th>Status</th>

        </tr>
    </thead>
    <tbody>
        <?php foreach ($rfq_data as $key => $data) : ?>
            <tr>
                <td> <?= $data['pr_id']; ?> </td>   
                <td style="width:10%;text-align:center;"> <a style="text-decoration:none;" href="procurement_purchase_request_view.php?id=<?= $data['pr_id']; ?>&division=<?= $_GET['division']; ?>"> <b><?= $data['pr_no']; ?></b><br> </a> </td>
                <td><?= '₱' . number_format($data['amount'], 2); ?></td>
                <td style="width:15%;"> <?= $data['purpose']; ?> </td>
                <td> <?= $data['division']; ?> </td>

                <td><?= $data['received_date']; ?></td>
                <td>FAD-GSS</td>
                <td> 
                    <?php if ($data['rfq_no'] == null) : ?> 
                    <button id="btn-create-rfq" class="btn btn-xs btn-success"> Create RFQ </button>

                    <?php else : ?> 
                        <b>
                        <a style="text-decoration:none;" href="procurement_request_for_quotation_view.php?id=<?= $data['pr_id']; ?>&rfq_no=<?= $data['rfq_no']; ?>&rfq_id=<?= $data['rfq_id']; ?>">
                            <?= $data['rfq_no']; ?>
                    </a></b></td>
                        
                        <?php endif; ?> 

                <td><?= $data['mode'];?></td>
                <td> <?= $data['rfq_date']; ?> </td>
                <td style="width:10%;text-align:center;"><?= $data['stat']; ?></td>
            </tr>
        <?php endforeach; ?>

    </tbody>
</table>
<link href="GSS/views/RFQ/_panel/tiles/dataTables.css" rel="stylesheet" />
<script type="text/javascript" src="GSS/views/RFQ/_panel/tiles/dataTables.min.js"></script>
<script>
    $(document).ready(function(){
        var table = $('#rfq_table').DataTable({
            "bInfo": false,
            'lengthChange': false,
            "dom": '<"pull-left"f><"pull-right"l>tip',
            'ordering': false,
            "bFilter": true,
            "bAutoWidth": false,
            "dom": '<"pull-left"f><"pull-right"l>tip',
            'paging': true,
            "searching": true,
            "paging": true,
            "info": false,
            "bLengthChange": false,
            "lengthMenu": [
                [5, 20, -1],
                [5, 20, 'All']
            ],
            'columnDefs': [{
                'targets': 0,
                'checkboxes': {
                    'selectRow': true
                }
            }],
            'select': {
                'style': 'multi'
            },
        })

        $(document).on('click', '#btn-create-rfq', function() {
            var form = $('#form-rfq').val();
            var rows_selected = table.column(0).checkboxes.selected();
            $.each(rows_selected, function(index, rowId) {
                $(form).append(
                    $('<input>')
                    .attr('type', 'hidden')
                    .attr('name', 'id[]')
                    .val(rowId)
                );
            });

            let data_id = "'" + rows_selected.join("','") + "'";
            prDataList(data_id); // show selected pr on the table
            $('#rfq_modal').modal('show');
        })
    })
</script>