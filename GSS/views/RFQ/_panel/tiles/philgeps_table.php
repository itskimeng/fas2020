<table class="table table-condensed table-striped" id="philgeps_table">
    <thead class="bg-primary">
        <tr>
            <th>RFQ NUMBER</th>
            <th>PARTICULARS</th>
            <th>POSTING DATE</th>
            <th>CLOSING DATE</th>
            <th>CLOSING TIME</th>
            <th>OPENING TIME</th>
            <th>STATUS</th>

        </tr>
    </thead>
    <tbody>
        <?php foreach ($rfq_data as $key => $data) : ?>
            <tr>
                <td><?= $data['rfq_no'] ?></td>
                <td style="width:15%;"> <?= $data['purpose']; ?> </td>
                <td>  </td>
                <td>  </td>

                <td></td>
                <td></td>
           
                <td style="width:10%;text-align:center;">posted to website</td>
            </tr>
        <?php endforeach; ?>

    </tbody>
</table>
<script>
    $(document).ready(function() {
        var table = $('#philgeps_table').DataTable({
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
            ]
        })
    });
    </script>

