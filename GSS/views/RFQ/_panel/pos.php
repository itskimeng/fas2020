<div class="col-md-6">
    <div class="box box-info dropbox">
        <div class="box-header">
            <h3 class="box-title"><i class="fa fa-book"></i> Proof of Sending</h3>

        </div>
        <div class="box-body custom-box-body no-padding" style="height: 450px; max-height:230px; overflow-y: auto;">
            <table class="table table-striped">
                <tbody>
                    <tr>
                        <th class="text-center">Supplier</th>
                        <th class="text-center">Address</th>
                        <th class="text-center">Contact Person</th>
                        <th class="text-center">ACTION</th>
                    </tr>
                    <?php foreach ($supplier_opts as $key => $data) : ?>
                        <tr>
                            <td class="table-cell"><?= $data['supplier']; ?></td>
                            <td class="table-cell"><?= $data['supplier_address']; ?></td>
                            <td class="table-cell"><?= $data['contact_person']; ?></td>
                            <td class="table-cell">
                                <button type="button" class="btn btn-primary btn-sm" id="supplier_id" value="<?= $data['id'];?>" data-toggle="modal" data-target="#modal-default"><i class="fa fa-download"></i>Download</button>    
                            </td>
                        </tr>
                    <?php endforeach; ?>

                </tbody>
            </table>
        </div>
    </div>
</div>