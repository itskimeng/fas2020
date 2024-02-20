<div class="col-md-8">
    <div class="box">
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
                            <a href="UpdateRPCPPE.php?id=255" class="btn btn-primary"><i class="fa"></i>Update</a>
                            <button data-toggle="modal" data-target="#exampleModal" class="btn btn-success"><i class="fa fa-fw fa-user-md"></i>Assign Par</button>
                            <a href="export_par_receipt.php?id=<?= $_GET['id']; ?>" class="btn btn-warning"><i class="fa fa-fw fa-download"></i>Par Receipt</a>
                            <a href="report/BARCODE/pages/singleBarcode.php?id=<?= $_GET['id']; ?>" class="btn btn-info"><i class="fa fa-fw fa-download"></i>Par Sticker</a>
                            <input type="hidden" name="option" value="par_single">
                            <a href="export_pc.php?id=<?= $_GET['id']; ?>" class="btn btn-success"><i class="fa fa-fw fa-download"></i>Export PC</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label>Article</label>
                        <?= group_text("Article", "article", "", "", "", false, "", "", true) ?>
                    </div>
                    <div class="form-group">
                        <label>Desciption</label>
                        <?= group_text("Desciption", "desription", "", "", "", false, "", "", true) ?>
                    </div>
                    <div class="form-group">
                        <label>Serial No.</label>
                        <?= group_text("Serial No.", "serial_no", "", "", "", false, "", "", true) ?>
                    </div>
                    <div class="form-group">
                        <label>Property Number</label>
                        <?= group_text("Property Number", "property_umber", "", "", "", false, "", "", true) ?>
                    </div>
                    <div class="form-group">
                        <label>Date Aquired</label>
                        <?= group_text("", "desription", "", "", "", false, "", "date", true) ?>
                    </div>
                    <div class="form-group">
                        <label>Unit of Measure</label>
                        <?= group_text("Unit Measure", "unit_measure", "", "", "", false, "", "text", true) ?>
                    </div>
                    <div class="form-group">
                        <label>Unit Value</label>
                        <?= group_text("Unit Value", "unit_value", "", "", "", false, "", "text", true) ?>
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                         <?= group_select("Status","status",['Serviceable','Unserviceable'],"","form-control select2","",false,1,true); ?> 

                    </div>

                </div>
                <div class="col-lg-6">
                <div class="form-group">
                        <label>Office</label>
                         <?= group_select("Office","office",['Serviceable','Unserviceable'],"","form-control select2","",false,1,true); ?> 

                    </div>
                    <div class="form-group">
                        <label>Property Card</label>
                        <?= group_text("Desciption", "desription", "", "", "", false, "", "", true) ?>
                    </div>
                    <div class="form-group">
                        <label>Pysical Count</label>
                        <?= group_text("Desciption", "desription", "", "", "", false, "", "", true) ?>
                    </div>
                    <div class="form-group">
                        <label>Shortage(Quantity)</label>
                        <?= group_text("Desciption", "desription", "", "", "", false, "", "", true) ?>
                    </div>
                    <div class="form-group">
                        <label>Shortage(Value)</label>
                        <?= group_text("Desciption", "desription", "", "", "", false, "", "", true) ?>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>

<div class="col-md-4">
    <div class="box box-success">
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


<script>
     $(function() {
        //Initialize Select2 Elements
        $('.select2').select2()
    });
    $('#btn_assign').click(function() {
        let sel_emp = $('#cform-assign_par').val();
        let ppe_id = '<?= $_GET['id']; ?>';
        $.post({
            url: 'GSS/route/post_assign_par.php',
            data: {
                emp_n: sel_emp,
                par_id: ppe_id
            }
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