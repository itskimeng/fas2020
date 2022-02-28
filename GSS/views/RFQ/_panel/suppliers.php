<div class="box" style="  box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23);">
    <div class="box-header with-border">
        <b>Suppliers Monitoring</b>
        
    </div>
    <div class="box-body" style="height: 500px; max-height: 210px; overflow-y: auto;">
        <table class="table table-striped table-bordered">
            <thead>
                <tr class="bg-primary">
                    <th>Rank</th>
                    <th>Supplier Title</th>
                    <th>Counter</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($supplier as $key => $item) : ?>
                    <tr>
                        <td><?= $item['id']; ?>.</td>
                        <td><?= $item['supplier_title']; ?></td>
                        <td><?= $item['count']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>