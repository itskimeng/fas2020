<div class="col-md-6">
    <div class="box box-info dropbox">
        <div class="box-header">
            <h3 class="box-title"><i class="fa fa-book"></i> Purchase Request</h3>
        </div>
        <div class="box-body custom-box-body no-padding" style="height: 450px; max-height:230px; overflow-y: auto;">
        <?= proc_text_input("hidden", '', 'cform-received-by', '', false, $_SESSION['currentuser']); ?>

            <table class="table table-striped">
                <tbody>
                    <tr>
                        <th class="text-center" width="25%">PR NO</th>
                        <th class="text-center">OFFICE</th>
                        <th class="text-center">TOTAL ABC</th>
                        <th class="text-center" width="25%">DATE SUBMITTED</th>
                        <th class="text-center">ACTION</th>
                    </tr>
                    <?php if (empty($rfq_pending_pr_opts)) : ?>
                        <tr>
                            <td colspan=5>
                                <div class="callout callout-warning">
                                    <h4> <i class="icon fa fa-warning"></i> No data available in table
                                    </h4>
                                </div>
                            </td>
                        </tr>

                    <?php endif; ?>
                    <?php foreach ($rfq_pending_pr_opts as $key => $data) : ?>
                        <tr>
                            <td><?= $data['pr_no']; ?></td>
                            <td><?= $data['office']; ?></td>
                            <td><?= $data['amount']; ?></td>
                            <td><?= $data['pr_date']; ?></td>
                            <td style="text-align:center;">
                                <button id="btn_received_by_gss" value="<?= $data['pr_no']; ?>" class="btn bg-purple btn-sm" title="Received by GSS" >
                                    <i class="fa fa-rocket"></i>
                                </button>

                                <!-- <button type="button" class="btn btn-primary btn-sm" id="btn_create_rfq" value="<?= $data['pr_no']; ?>">
                                    <a href="procurement_request_for_quotation_create.php?id=<?= $data['id']; ?>&pr_no=<?= $data['pr_no']; ?>"><i class="fa fa-plus-square"></i></a>
                                </button> -->
                                <button type="button" data-toggle="modal" id="btn-return" data-target="#exampleModal" value="<?= $data['pr_no']; ?>" class="btn btn-danger btn-sm" title="Return" value="<?= $data['pr_no']; ?>"><i class="fa fa-undo"></i>
                                </button>

                            </td>
                        </tr>
                    <?php endforeach; ?>

                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><i class="fa fa-book"></i> Purchase Request List</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>

            </div>
            <form method="POST" action="GSS/route/post_return_pr.php" id="form">
                <div class="modal-body">
                    Remarks:
                    <textarea style="width: 572px; height: 143px;resize:none;" name="remarks">
        </textarea>
                    <?= proc_text_input('hidden', '', 'hidden-pr-no', 'hidden-pr-no', $required = true, '') ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $(document).on('click', '#btn-return', function() {
        $('#hidden-pr-no').val($(this).val());
    })
    $(document).on('click', '#btn_received_by_gss', function () {
        let path = "GSS/route/";
        let pr = $(this).val();
        if (pr != '') {
            pr = $(this).val();


        } else {
            pr = $('#btn_received').data('value');
        }
        let current_user = $('#cform-received-by').val();
        let division = '<?= $_GET['division'];?>'

        $.post({
            url: path + "post_received.php",
            data: {
                pr_no: pr,
                received_by: current_user
            },
            success: function (data) {
                toastr.success("You have successfully received this PR!");
                setTimeout(
                    function () {
                        window.location = "procurement_request_for_quotation.php?division=" + division;
                    },
                    1000);


            }
        })



    })
</script>