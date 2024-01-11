<div class="col-md-8">
    <div class="box box-primary">
        <div class="box-header with-border" align="left">
            <div class="col-md-11">
                <h1>Property No. &nbsp; <?= $ppe_opts['property_no']; ?></h1>
            </div>
        </div>
        <div class="box-body table-responsive no-padding">
            <div class="box-body">
                <div class="well">
                    <div class="row">
                        <div class="col-sm-12 col-md-6 col-lg-12">
                            <a href="base_par_edit.html.php?id=255" class="btn btn-primary"><i class="fa"></i>Update</a>
                            <button data-toggle="modal" data-target="#exampleModal" class="btn btn-success"><i class="fa fa-fw fa-user-md"></i>Assign Par</button>
                            <a href="export_par_receipt.php?id=<?= $_GET['id']; ?>" class="btn btn-warning"><i class="fa fa-fw fa-download"></i>Par Receipt</a>
                            <a href="report/BARCODE/pages/singleBarcode.php?id=<?= $_GET['id']; ?>" class="btn btn-info"><i class="fa fa-fw fa-download"></i>Par Sticker</a>
                            <input type="hidden" name="option" value="par_single">
                            <a href="export_pc.php?id=<?= $_GET['id']; ?>" class="btn btn-success"><i class="fa fa-fw fa-download"></i>Export PC</a>
                        </div>
                    </div>
                </div>

                <h4>Item(s)</h4>
                <table id="example1" class="table table-striped table-bordered" style="width:;background-color: white;">
                    <thead>
                        <tr style="background-color: white;color:blue;">
                            <th>End User(s)</th>
                            <th>Acquired Date</th>
                            <th>Position</th>
                            <th>Office</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($ppe_history as $key => $data) : ?>
                            <tr>
                                <td><?= $data['end_user']; ?></td>
                                <td><?= $data['date_acquired']; ?></td>
                                <td><?= $data['position']; ?></td>
                                <td><?= $data['office']; ?></td>
                            <tr>
                            <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="col-md-4">
    <div class="box box-primary">
        <div class="box-header with-border" align="left">
            <h4>PPE Details</h4>
        </div>
        <div class="box-body table-responsive no-padding">
            <div class="box-body">
                <table id="example1" class="table table-striped table-bordered" style="width:;background-color: white;">
                    <tbody>
                        <tr>
                            <th>Current User:</th>
                            <td><?= $ppe_details['current_user']; ?></td>
                        </tr>
                        <tr>
                            <th>Position:</th>
                            <td><?= $ppe_details['position']; ?></td>
                        </tr>
                        <tr>
                            <th>Office:</th>
                            <td><?= $ppe_details['office']; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="route/post_assign_par.php">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <?= group_select("Employee", "assign_par", $employees, "", "form-control select2", "", false, 1, true); ?>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btn_assign" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $('#btn_assign').click(function() {
        let sel_emp = $('#cform-assign_par').val();
        let ppe_id = '<?= $_GET['id']; ?>';
        $.post({
            url: 'GSS/route/post_assign_par.php',
            data: {
                emp_n: sel_emp,
                par_id: ppe_id
            },
            success: function(response) {
                toastr.success("Successfully assign this equipment to this employee.");
                setTimeout(
                    function() {
                        location.reload();
                    },
                    1000);
            }
        });
    })
</script>