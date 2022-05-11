<div class="box box-primary dropbox">
    <div class="box-body">
        <div class="row">
            <div class="col-md-12">


                <div class="btn-group">
                    <a href="dash_iar_create.php" class="btn btn-primary"><i class="fa fa-plus"></i> Create</a>
                </div>
            </div>
        </div>

    </div>
</div>

<div class="box box-primary dropbox">
    <div class="box-body table-responsive">
        <table id="iar_table" class="table table-striped table-bordered display dataTable no-footer" style="width: 100%;" role="grid" aria-describedby="example_info">
            <thead>
                <tr style="color: white; background-color: #367fa9;" role="row">
                    <?= generateHeader($header = array('IAR Number', 'IAR DATE', 'PO NUMBER', 'PO DATE', 'REQUISITION DEPARTMENT','ACTION')); ?>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($iar_opts as $key => $item) : ?>
                    <tr>
                        <td>IAR-NO-<?= $item['iar_no']; ?></td>
                        <td><?= $item['iar_date']; ?></td>
                        <td>PO-NO-<?= $item['po_no']; ?></td>
                        <td><?= $item['po_date']; ?></td>
                        <td><?= $item['po_date']; ?></td>
                        <td>
                        <button class="btn btn-md btn-primary"><a href="export_iar.php?getiar=<?= $item['id'];?>" style="decoration:none;"><i class="fa fa-download"></i> Export</a></button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?php
function generateHeader($header)
{
    $element = '';
    foreach ($header as $th) {
        $element .= '<th>' . $th . '</th>';
    }
    return $element;
}
?>