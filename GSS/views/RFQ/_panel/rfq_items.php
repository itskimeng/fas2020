<div class="box box-info">
    <div class="box-header with-border">
        <b>RFQ Items</b>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse">
                <i class="fa fa-minus"></i>
            </button>
        </div>
    </div>
    <div class="box-body" style="height: 500px; max-height: 210px; overflow-y: auto;">
        <table class="table table-striped table-bordered" id="rfq_items" >
            <thead>
                <tr>
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
                <?php foreach ($rfq_items as $key => $item): ?>
                    <tr>
                        <td><?= $item['id'];?></td>
                        <td><?= $item['item'];?></td>
                        <td><?= $item['desc'];?></td>
                        <td><?= $item['qty'];?></td>
                        <td><?= $item['cost'];?></td>
                        <td><?= $item['unit'];?></td>
                        <td><?= $item['total'];?></td>
                    </tr>
                <?php endforeach;?>
            </tbody>
        </table>
    </div>
</div>