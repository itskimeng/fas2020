<form method="POST" action="GSS/route/post_assign_multiple_rfq.php">
    <div class="box box-info hideme" style="  box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23);">
        <div class="box-header with-border">
            <b> Request for Quotation Entries
            </b>
            <button type="button" class="btn btn-flat bg-blue pull-right" id="btn_add_multiple">Add PR No</button>
            <button type="submit" class="btn btn-flat bg-green pull-right">Save</button>


        </div>
        <div class="box-body" style="height: 450px; max-height:300px; overflow-y: auto;">
            <div class="table-responsive">
                <table class="table table-condensed table-striped">
                    <thead class="bg-primary">
                        <tr>
                            <th width="18%">PR NO</th>
                            <th width="18%">MODE OF PROCUREMENT</th>
                            <th width="18%">RFQ NO</th>
                            <th width="15%">RFQ DATE</th>
                            <th width="5%">ACTIONS</th>
                        </tr>
                    </thead>

                    <tbody id="multiple_pr">
                        <tr>
                            <td>
                                <?= group_select('', 'pr_no[]', $rfq_pr_opts, '', 'select2', 0, false, '', true) ?>
                                <?= proc_text_input('hidden', 'form-control col-lg-6', 'rfq_id', 'rfq_id',  false, $rfq_id['rfq_id']); ?>

                            </td>
                            <td>
                                <?= group_select('', 'mode[]', $rfq_mode_opts, '', 'select2', 0, false, '', true) ?>

                            </td>
                            <td>
                                <?= proc_text_input('text', 'form-control col-lg-6', 'rfq', 'rfq',  true, $rfq_no['rfq_no']); ?>
                            </td>
                            <td>
                                <div class="input-group date" id="datepicker-group" data-provide="datepicker" data-date-format="dd/mm/yyyy" data-date-autoclose="true">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" class="form-control pull-right info-dates" id="datepicker1" name="rfq_date[]" "required=" required" "="" value=" <?= date('F d, Y'); ?>">
                                </div>

                            </td>
                            <td>
                                <button type = "button"  class="btn btn-md btn-flat bg-green"><i class="fa fa-eye"></i></button>
                                <button type = "button" class="btn btn-md btn-flat bg-red" id="btn_del_multiple"><i class="fa fa-trash"></i></button>
                            </td>

                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</form>