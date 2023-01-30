<table class="table table-condensed table-striped" id="rfq_table" style="border:2px solid #9CCC65;">
    <thead  style="background:linear-gradient(90deg, #9CCC65, #1B5E20);color:#fff;">
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
<link type="text/css" href="//gyrocode.github.io/jquery-datatables-checkboxes/1.2.12/css/dataTables.checkboxes.css" rel="stylesheet" />
<script type="text/javascript" src="//gyrocode.github.io/jquery-datatables-checkboxes/1.2.12/js/dataTables.checkboxes.min.js"></script>