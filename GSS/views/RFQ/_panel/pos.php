<div class="col-md-6">
    <div class="box box-info dropbox">
        <div class="box-header">
            <h3 class="box-title"><i class="fa fa-book"></i> Supplier Ranking</h3>

        </div>
        <div class="box-body custom-box-body no-padding" style="height: 450px; max-height:230px; overflow-y: auto;">
            <table class="table table-striped">
                <tbody>
                    <tr>
                        <th>Rank</th>
                        <th>Address</th>
                        <th>No. of POs Awarded</th>
                    </tr>
                    <?php
                        ?>
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
</div>