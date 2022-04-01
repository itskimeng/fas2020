<?php
function group_select_custom($label, $id, $name, $options, $value, $class, $label_size = 1, $readonly = false, $body_size = 1, $required = true)
{
    $element = '<div id="cgroup-' . $name . '" class="form-group">';
    if ($label_size > 0) {
        $element .= '<label class=" control-label">' . $label . ':</label><br>';
    }

    if ($readonly) {
        $element .= '<select id="cform-' . $id . '" name="' . $name . '" class="form-control select2 ' . $class . '" data-placeholder="-- Select ' . $label . ' --" readonly disabled style="width: 100%;">';
        // $element .= '<input type="hidden" name="hidden-'.$name.'" value="'.$value.'" />'
    } else {
        $element .= '<select id="cform-' . $id . '" name="' . $name . '" class="form-control select2 ' . $class . '" data-placeholder="-- Select ' . $label . ' --" required="' . $required . '" style="width: 100%;">';
    }

    $element .= group_options_custom($options, $value, $label);

    $element .= '</select>';
    $element .= '<input type="hidden" name="hidden-' . $name . '" value="' . $value . '" />';
    $element .= '</div>';

    return $element;
}
function group_options_custom($fields, $selected, $label)
{
    $element = '<option disabled selected>-- Please select ' . $label . ' --</option>';
    foreach ($fields as $key => $value) {
        if ($key == $selected) {
            $element .= '<option value="' . $value[$label] . '" data-id = "' . $value['id'] . '"  data-value="' . $key . '" selected="selected">' . $value[$label] . '</option>';
        } else {
            $element .= '<option value="' . $value[$label] . '" data-id = "' . $value['id'] . '" data-pmo_id ="' . $value['pmo_id'] . '"  data-pmo = "' . $value['pmo'] . '" data-value="' . $key . '">' . $value[$label] . '</option>';
        }
    }

    return $element;
}

?>
<form id="multiple_rfq" method="POST" action="GSS/route/post_assign_multiple_rfq.php">
    <div class="box box-primary dropbox hideme">
        <div class="box-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="btn-group">

                        <button type="button" class="btn-style btn-2 btn-sep icon-back" id="back">
                            Back </a>
                        </button>
                    </div>

                </div>
                <div class="col-md-6">
                    <div class="pull-right">


                        <div class="btn-group">
                            <button type="submit" class="btn-style btn-3 btn-sep icon-save">Save</button>
                            <button type="button" class="btn-style btn-1 btn-sep icon-choose" id="btn_add_multiple">Add PR Item</button>
                            <!-- <button type="button" class="btn btn-md btn-success btn-create-rfq" id="create" name="save"><i class="fa fa-edit"></i> Save</button> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="box box-primary hideme" style="  box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23);">
                <div class="box-header with-border">

                </div>
                <div class="box-body">
                    <!-- Color Picker -->
                    <div class="form-group">
                        <label>RFQ No#:</label>
                        <?= proc_text_input('text', 'form-control col-lg-6', 'rfq_no', 'rfq_no[]',  false, $rfq_no['rfq_no']); ?>

                    </div>
                    <!-- /.form group -->

                    <!-- Color Picker -->
                    <div class="form-group">
                        <label>Mode of Procurement:</label>

                        <?= group_select('', 'mode[]', $rfq_mode_opts, '', 'form-control select2', 0, false, '', true) ?>

                        <!-- /.input group -->
                    </div>
                    <!-- /.form group -->

                    <!-- time Picker -->
                    <div class="bootstrap-timepicker">
                        <div class="form-group">
                            <label>RFQ Date:</label>

                            <div class="input-group date" id="datepicker-group" data-provide="datepicker" data-date-format="dd/mm/yyyy" data-date-autoclose="true">
                                <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                <input type="text" class="form-control pull-right info-dates" id="datepicker1" name="rfq_date[]" value="<?= date('d/m/Y'); ?>">
                            </div>
                            <!-- /.input group -->
                        </div>
                        <!-- /.form group -->
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
        <div class="box box-info hideme" style="  box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23);">
    <div class="box-header with-border">
        <b>RFQ Items</b>
        <div class="box-tools pull-right">
           
        </div>
    </div>
    <div class="box-body" style="height: 202px!important; max-height: 263px; overflow-y: auto;">
        <table class="table table-striped table-bordered" id="rfq_items">
            <thead>
                <tr class="bg-primary">
                    <th>#</th>
                    <th>Items</th>
                    <th>Description</th>
                    <th>Quantity</th>
                    <th>Unit Cost</th>
                    <th>Unit</th>
                    <th>Total Cost</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($rfq_items as $key => $item) : ?>
                    <tr>
                        <td><?= $item['id']; ?></td>
                        <td><?= $item['item']; ?></td>
                        <td><?= $item['desc']; ?></td>
                        <td><?= $item['qty']; ?></td>
                        <td><?= $item['cost']; ?></td>
                        <td><?= $item['unit']; ?></td>
                        <td><?= $item['total']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
        </div>
    </div>


    <div class="box box-primary hideme" style="  box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23);">
        <div class="box-header with-border">
            <b> Request for Quotation Entries
            </b>


        </div>
        <div class="box-body" >
            <div class="row">
                <div class="col-md-6" style="height: 450px; max-height:300px; overflow-y: auto;">

                    <div class="table-responsive">
                        <table class="table table-condensed table-striped">
                            <thead class="bg-primary">
                                <tr>
                                    <th width="18%">PR NO</th>
                                    <th width="18%">OFFICE</th>
                                    <th width="18%" style="text-align: center;">ACTIONS</th>
                                </tr>
                            </thead>

                            <tbody id="multiple_pr">
                                <tr>
                                    <td>
                                        <?= group_select_custom('pr_no', 'pr_no', 'pr_no[]', $rfq_pr_opts, '', 'select2', 0, false, '', true) ?>
                                        <?= proc_text_input('hidden', 'form-control col-lg-6', 'rfq_id', 'rfq_id',  false, $rfq_no['id']); ?>

                                    </td>
                                    <td>
                                        <?= proc_text_input('text', 'form-control col-lg-6', 'pmo', 'pmo[]',  true, ''); ?>
                                        <?= proc_text_input('hidden', 'form-control col-lg-6', 'office_id', 'pmo_id[]',  true, ''); ?>
                                        <?= proc_text_input('hidden', 'form-control col-lg-6', 'id', 'pr_id[]',  true, ''); ?>
                                    </td>
                                    <!-- <td>
                             proc_text_input('text', 'form-control col-lg-6', 'particulars', 'particulars[]',  true, ''); ?>
                                 group_select('', 'mode[]', $rfq_mode_opts, '', 'form-control select2', 0, false, '', true) ?> -->

                                    <!-- </td> -->
                                    <?= proc_text_input('hidden', 'form-control col-lg-6', 'rfq', 'rfq_no[]',  true, $rfq_no['rfq_no']); ?>
                                    <!-- <div class="input-group date" id="datepicker-group" data-provide="datepicker" data-date-format="dd/mm/yyyy" data-date-autoclose="true">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" class="form-control pull-right info-dates" id="datepicker1" name="rfq_date[]" value="<?= date('Y-m-d'); ?>">
                                </div> -->

                                    <td style="text-align: center;">
                                        <button type="button" class="btn btn-md btn-flat bg-green"><i class="fa fa-eye"></i></button>
                                        <button type="button" class="btn btn-md btn-flat bg-red" id="btn_del_multiple"><i class="fa fa-trash"></i></button>
                                    </td>

                                </tr>
                            </tbody>

                        </table>

                    </div>
                </div>
                <div class="col-md-6">
                <div class="form-group">
                        <label>PARTICULARS:</label>
                        <textarea name="particulars" style="width: 596px; height: 190px;resize:none;"></textarea>

                    </div>
                </div>
            </div>

        </div>
    </div>
</form>
<script>
    $(document).ready(function() {
        $('#rfq_no').prop('readonly', true);
    })
</script>