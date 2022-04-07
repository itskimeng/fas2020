<div class="box box-primary" id="rfq_items" style="  box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23);">
    <div class="box-header with-border">
        <b>RFQ Items</b>
        <div class="box-tools pull-right">
           
        </div>
    </div>
    <div class="box-body" style="height: 500px; max-height: 263px; overflow-y: auto;">
        <table class="table table-striped table-bordered" id="rfq_items">
            <thead>
                <tr class="bg-primary">
                    <th>#</th>
                    <th>Items</th>
                    <th>Description</th>
                    <th>Quantity</th>
                    <th>Unit Cost</th>
                    <th>Unit</th>
                    <th>Total Cost</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pr_items as $key => $item) : ?>
                    <tr>
                        <td><?= $item['id']; ?></td>
                        <td><?= $item['item']; ?></td>
                        <td><?= $item['desc']; ?></td>
                        <td><?= $item['qty']; ?></td>
                        <td><?= $item['cost']; ?></td>
                        <td><?= $item['unit']; ?></td>
                        <td><?= $item['total']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>