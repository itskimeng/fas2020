<div class="table-responsive" style="overflow-x: hidden !important;">
    <div id="w7" class="grid-view">
        <table class="table table-striped table-bordered" id="app_table" >
            <thead>
                <tr>
                    <th>STOCK NO</th>
                    <th width="150">CATEGORY</th>
                    <th width="300">ITEM</th>
                    <th width="150">OFFICE</th>
                    <th width="250">MODE OF PROCUREMENT</th>
                    <th width="150">SOURCE OF FUNDS</th>
                    <th>APP YEAR</th>
                    <th>HISTORY</th>

                    <th width="0">ACTION</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($app as $key => $item) : ?>

                    <tr>
                        <td> <?= $item['sn']; ?> </td>
                        <td> <?= $item['category']; ?></td>
                        <td> <?= $item['procurement']; ?> </td>
                        <td> <?= $item['pmo_title']; ?></td>
                        <td> <?= $item['mode']; ?></td>
                        <td> <?= $item['source']; ?></td>
                        <td> <?= $item['year']; ?></td>
                        <td> <a href='<?= $path ?>/app_history.php?id=<?= $item['id']; ?>' title="View" class="btn btn-info btn-xs"> <i class='fa'>&#xf06e;</i> History </a></td>
                        <td><a href='<?= $path ?>/UpdateAPP.php?id=<?= $item['id']; ?>' title="Edit" class="btn btn-primary btn-xs"> <i class='fa'>&#xf044;</i>Edit</a></td>

                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
       
    </div>
</div>