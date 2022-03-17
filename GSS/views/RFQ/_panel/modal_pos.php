<div class="modal fade" id="modal-default" style="display: none;">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span></button>
                            <h4 class="modal-title"><i class="fa fa-book"></i>List of PR Number</h4>
                        </div>
                        <div class="modal-body" style="height: 120px;">
                            <?= group_select('Type', 'type', $fetch_rfq_pos, $pr_data['pr_type'], '', '', false, '', true); ?>
                            <?= proc_text_input('hidden', '', 'cform-rfq', 'cform-rfq', $required = false, '') ?>
                            <?= proc_text_input('hidden', '', 'cform-pr-no', 'cform-pr-no', $required = false, '') ?>
                            <?= proc_text_input('hidden', '', 'cform-textarea', 'cform-textarea', $required = false, '') ?>
                            <?= proc_text_input('hidden', '', 'cform-office', 'cform-office', $required = false, '') ?>

                            <button class="btn btn-success btn-md col-lg-12" id="export_pos">Proceed</button>
                        </div>

                    </div>
                </div>
            </div>