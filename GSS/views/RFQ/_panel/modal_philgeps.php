<!-- Modal -->
<div class="modal fade" id="viewPhilGepsInfo" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <form method="POST" action="GSS/route/post_philgeps.php" id="phil_form">
            <div class="modal-content" style="width:80%!important;border-radius:10px;">
                <div class="modal-header">
                    <h3 class="modal-title" id="title_header">
                        <i class="fa fa-list fa-fw"></i>PhilGeps Information
                    </h3>

                </div>
                <div class="modal-body" id="history" style="height: 300px;">
                <?= proc_text_input('hidden', 'form-control', 'cform-id', 'cform-id', $required = true, '') ?>

                    <table class="table table-responsive table-bordered" style="font-size: 24px;">
                        <tr>
                            <td>PhilGeps No:</td>
                            <td><?= proc_text_input('text', 'form-control', 'cform-philgeps', 'cform-philgeps', $required = true, '') ?></td>
                        </tr>
                        <tr>
                            <td>Posted Date:</td>
                            <td>
                                <div class="form-group">

                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <?= proc_text_input('text', 'form-control pull-right', 'datepicker1', 'posted_date', $required = true, '') ?>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Closing Date:</td>
                            <td>
                                <div class="form-group">

                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <?= proc_text_input('text', 'form-control pull-right', 'datepicker2', 'closing_date', $required = true, '') ?>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="btn_philgeps" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    const philgeps_no         = $('#cform-philgeps');
    const posting_date        = $('#datepicker1');
    const closing_date        = $('#datepicker2');
    const form                = $('#phil_form');
    form.addEventListener('submit', e => {
        if (email.value === '' || email.value === null) {
				toastr.error("Error! All required fields must be filled-up");
            e.preventDefault();
        } else {
            return true;
        }
    });
</script>