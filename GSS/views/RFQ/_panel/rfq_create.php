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

<div class="col-md-12">
    <div id="rfq_panel">
        <?php include 'GSS/views/RFQ/_panel/rfq_panel.php'; ?>
    </div>

</div>


<!-- Modal -->
<div class="modal fade" id="assignMultiple" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="width: 900px;margin-left:-15%;margin-top:15%;border-radius: 2%;">
            <div class="modal-header">
                <div style="    width: 75px; height: 75px; border-radius: 50%; display: flex; align-items: center; justify-content: center; position: absolute; top: -18px; background-color: white; color: #4cae4c; left: 48%;">
                    <img src="GSS/views/backend/images/logo.png" style="width:60px; height:60px;" />
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="multiple_rfq">

                    <div id='multi_rfq_panel'>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="box box-primary hideme" style="height: 302px; box-shadow: rgba(0, 0, 0, 0.16) 0px 3px 6px, rgba(0, 0, 0, 0.23) 0px 3px 6px;">
                                    <div class="box-header with-border">
                                    Assigning multiple Purchase Request Number
                                    </div>
                                    <div class="box-body">
                                        <div class="col-lg-6">
                                            <!-- Color Picker -->
                                            <div class="form-group">
                                                <label>RFQ No#:</label>
                                                <input type="text" class="form-control col-lg-6" id="rfq_no" name="rfq_no" value="<?= $rfq_no['rfq_no'];?>" readonly=""> <input type="hidden" class="form-control col-lg-6" id="rfq_id" name="rfq_id" value="64">

                                            </div>
                                            <!-- /.form group -->

                                            <!-- Color Picker -->
                                            <div class="form-group">
                                                <label>Mode of Procurement:</label>

                                                <div id="cgroup-mode[]" class="form-group"><select id="cform-mode[]" name="mode[]" class="form-control select2 form-control select2" data-placeholder="-- Select  --" required="1" style="width:100%;">
                                                        <option disabled="" selected="">-- Please select --</option>
                                                        <option value="1" data-id="Small Value Procurement" data-value="1">Small Value Procurement</option>
                                                        <option value="2" data-id="Shopping" data-value="2">Shopping</option>
                                                        <option value="4" data-id="NP Lease of Venue" data-value="4">NP Lease of Venue</option>
                                                        <option value="5" data-id="Direct Contracting" data-value="5">Direct Contracting</option>
                                                        <option value="6" data-id="Agency to Agency" data-value="6">Agency to Agency</option>
                                                        <option value="7" data-id="Public Bidding" data-value="7">Public Bidding</option>
                                                        <option value="8" data-id="Not Applicable N/A" data-value="8">Not Applicable N/A</option>
                                                    </select><input type="hidden" name="hidden-mode[]" value=""></div>
                                                <!-- /.input group -->
                                            </div>
                                            <!-- /.form group -->

                                            <!-- time Picker -->
                                            <div class="bootstrap-timepicker">
                                                <div class="form-group">
                                                    <label>RFQ Date:</label>

                                                    <div class="input-group date" id="datepicker-group" data-provide="datepicker" data-date-format="dd/mm/yyyy" data-date-autoclose="true">
                                                        <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                                        <input type="text" class="form-control pull-right info-dates" id="datepicker1" name="rfq_date" value="">
                                                    </div>
                                                    <!-- /.input group -->
                                                </div>
                                                <!-- /.form group -->
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>PARTICULARS:</label>
                                                <textarea name="particulars" style="width: 406px; height: 190px;resize:none;"></textarea>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="box box-primary hideme">

                                    <div class="box-body">
                                        <table class="table table-condensed table-striped" id="example" style="width:100%;">
                                            <thead class="bg-primary">
                                                <tr>
                                                    <th></th>
                                                    <th>PR NO</th>
                                                    <th hidden>OFFICE</th>
                                                    <th>OFFICE</th>
                                                    <th>PURPOSE</th>
                                                    <th>PR DATE</th>
                                                    <th>MODE OF PROCUREMENT</th>
                                                    <th>QUANTITY</th>
                                                    <th>UNIT COST</th>
                                                    <th>TOTAL AMOUNT</th>

                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php foreach ($rfq_data as $key => $data) : ?>
                                                   
                                                    <tr>

                                                        <td><?= $data['pr_id']; ?></td>
                                                        <td class="text-center" style="width:15%;"> <?= $data['pr_no']; ?> </td>
                                                        <td hidden>
                                                        <?= proc_text_input('text', 'form-control col-lg-6', 'abc', 'pmo_id[]',  false, $data['office']); ?>
                                                        <?= proc_text_input('text', 'form-control col-lg-6', 'abc', 'pr_no[]',  false, $data['pr_no']); ?>
                                                            
                                                        
                                                        <?= $data['office']; ?> </td>
                                                        <td> <?= $data['division']; ?> </td>
                                                        <td> <?= $data['purpose']; ?> </td>
                                                        <td> <?= $data['pr_date']; ?> </td>
                                                        <td><?= proc_group_select('', 'mode', $rfq_mode_opts, '', 'form-control select2', 0, false, '', true) ?></td>
                                                        <td> <?= $data['qty']; ?> </td>
                                                        <td> <?= $data['abc']; ?> </td>
                                                        <td> <?= $data['amount']; ?> </td>

                                                    </tr>
                                                <?php endforeach; ?>

                                            </tbody>
                                        </table>
                                        <button type="submit" class="btn btn-success" style="width: 100%;" id="btn_copy">Save</button>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<style>
    .dropbox {
        box-shadow: 0 1px 2px rgb(0 0 0 / 50%);
    }

    .custom-tb-header {
        background-color: #a0cfea !important;
    }

    .delete_modal_header {
        text-align: center;
        background-color: #f15e5e;
        color: white;
        padding: 5% !important;
        border-top-left-radius: 4px;
        border-top-right-radius: 4px;
    }

    * {
        box-sizing: border-box;
    }

    .fade-scale {
        transform: scale(0);
        opacity: 0;
        -webkit-transition: all .25s linear;
        -o-transition: all .25s linear;
        transition: all .25s linear;
    }

    .fade-scale.in {
        opacity: 1;
        transform: scale(1);
    }

    .switchToggle input[type=checkbox] {
        height: 0;
        width: 0;
        visibility: hidden;
        position: absolute;
    }

    .switchToggle label {
        cursor: pointer;
        text-indent: -99999px;
        width: 70px;
        max-width: 60px;
        height: 25px;
        background: #d1d1d1;
        /*display: block; */
        border-radius: 100px;
        position: relative;
    }

    .switchToggle label:after {
        content: '';
        position: absolute;
        top: 2px;
        left: 2px;
        width: 20px;
        height: 20px;
        background: #fff;
        border-radius: 90px;
        transition: 0.3s;
    }

    .switchToggle input:checked+label,
    .switchToggle input:checked+input+label {
        background: #3e98d3;
    }

    .switchToggle input+label:before,
    .switchToggle input+input+label:before {
        content: 'No';
        position: absolute;
        top: 3px;
        left: 35px;
        width: 26px;
        height: 26px;
        border-radius: 90px;
        transition: 0.3s;
        text-indent: 0;
        color: #fff;
    }


    .switchToggle input:checked+label:before,
    .switchToggle input:checked+input+label:before {
        content: 'Yes';
        position: absolute;
        top: 3px;
        left: 10px;
        width: 26px;
        height: 26px;
        border-radius: 90px;
        transition: 0.3s;
        text-indent: 0;
        color: #fff;
    }

    .switchToggle input:checked+label:after,
    .switchToggle input:checked+input+label:after {
        left: calc(100% - 2px);
        transform: translateX(-100%);
    }

    .switchToggle label:active:after {
        width: 60px;
    }

    .toggle-switchArea {
        margin: 10px 0 10px 0;
    }
</style>

<link type="text/css" href="//gyrocode.github.io/jquery-datatables-checkboxes/1.2.12/css/dataTables.checkboxes.css" rel="stylesheet" />
<script type="text/javascript" src="//gyrocode.github.io/jquery-datatables-checkboxes/1.2.12/js/dataTables.checkboxes.min.js"></script>

<script>
    $(document).ready(function() {

        var table = $('#example').DataTable({
            "dom": '<"pull-left"f><"pull-right"l>tip',
            'paging': true,
            "searching": true,
            "paging": true,
            "info": false,
            "bLengthChange": false,
            "lengthMenu": [
                [5, 10, -1],
                [5, 10, 'All']
            ],
            "ordering": true,
            'columnDefs': [{
                'targets': 0,
                'checkboxes': {
                    'selectRow': true
                }
            }],
            'select': {
                'style': 'multi'
            },

        });
        $('#multiple_rfq').on('submit', function(e) {
            var form = this;
            var rows_selected = table.column(0).checkboxes.selected();
            $.each(rows_selected, function(index, rowId) {
                // Create a hidden element 
                $(form).append(
                    $('<input>')
                    .attr('type', 'hidden')
                    .attr('name', 'id[]')
                    .val(rowId)
                );
            });

            let data_id = "" + rows_selected.join("") + "";
            let form_serialize = $('#multiple_rfq').serialize();
            console.log(data_id);
            $.post({
                url: 'GSS/route/post_assign_multiple_rfq.php?pr_id='+data_id+'&'+form_serialize,
                success: function(data) {
                    toastr.success("This item was successfully copied into your purchasing table.");
                }
            })

            e.preventDefault();
        });
    });
</script>
<script>
    $('#rfq_items').hide();

    function selectRefresh() {
        $('#cform-mode').select2({
            tags: true,
            placeholder: "Select an Option",
            allowClear: true,
        });
    }
    let count_id = 0;
    $(document).ready(function() {
        $('#datepicker1').datepicker({
            autoclose: true
        })
        $(".switchToggle input").on("change", function(e) {
            $('#assignMultiple').modal('show');
        });
        selectRefresh();

    });


    $(document).ready(function() {
        $('#rfq_table').DataTable({
            "lengthChange": false,
            "dom": '<"pull-left"f><"pull-right"l>tip',
            "lengthMenu": [4, 40, 60, 80, 100],
        });
    })
    $(document).on('click', '#back', function() {
        window.location = 'procurement_request_for_quotation.php';
    })
    $(document).on('click', '.btn-create-rfq', function() {
        let form = $('#rfq_form').serialize();
        let path = 'GSS/route/post_create_rfq.php?' + form + "&rfq=" + $('#rfq').val();
        let pr = $(this).val();
        let division = $('#division').val();
        update(path);

        function update(path) {
            $.get({
                url: path,
                data: {
                    pr_no: pr
                },
                success: function(data) {
                    window.location = "procurement_request_for_quotation.php?flag=1&rfq_no=" + $('#rfq').val() + "&division=" + division + "";
                }
            })
        }
    })
    let count = 1;
    let ids = 0;
    $(document).on('click', '#btn_add_multiple', function() {
        let row = '';
        row += '<tr>';
        row += '<td>',
            row += '<?= group_select_custom('pr_no', 'pr_no', 'pr_no[]', $rfq_pr_opts, '', 'select2', 0, false, '', true) ?>',
            row += '</td>',
            row += '<td>',
            row += '<input type="text" class="form-control col-lg-6" id="pmo' + count + '" name="pmo[]" required="required" "="" value="">';
        row += '<input type="hidden" class="form-control col-lg-6" id="pr_id' + count + '" name="pr_id[]" required="required" "="" value="">';
        row += '<input type="hidden" class="form-control col-lg-6" id="pmo_id' + count + '" name="pmo_id[]" required="required" "="" value="">';
        // row += '<td>',
        // row += '<input type="text" class="form-control col-lg-6" id="particulars' + count + '" name="particulars[]" required="required" "="" value="">';
        // row += '</td>',
        // row += '<td>',
        // row += 'group_select('', 'mode[]', $rfq_mode_opts, '', 'form-control select2', 0, false, '', true) ?>',
        // row += '</td>',
        // row += '<td>',
        // row += 'proc_text_input('text', 'form-control col-lg-6', 'rfq', 'rfq_no[]',  true, $rfq_no['rfq_no']) ?>',
        // row += '</td>',
        // row += '<td>',
        // row += '<div class="input-group date" id="datepicker-group" data-provide="datepicker" data-date-format="dd/mm/yyyy" data-date-autoclose="true"><div class="input-group-addon"><i class="fa fa-calendar"></i></div><input type="text" class="form-control pull-right info-dates" id="datepicker1" name="rfq_date[]"  value="<?= date('Y-m-d'); ?>"> </div>',
        // row += '</td>',
        row += '<td style="text-align:center;"><button type = "button" class="btn btn-md btn-flat bg-green" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-eye"></i></button>' +
            '<button type = "button" class="btn btn-md btn-flat bg-red" id="btn_del_multiple"><i class="fa fa-trash"></i></button>' +
            '</td>',

            row += '</tr>';

        $('#multiple_pr').append(row);

        $('.select2', '#multiple_pr').select2();

        count++;

    });
    $(document).on('click', '#btn_del_multiple', function() {
        $('#multiple_pr tr:eq(1)').remove();
        toastr.warning("Successfully removed this item");
    })
    $(document).on('change', '#cform-pr_no', function() {
        let pmo_id = $(this).find(':selected').data('pmo_id');
        let pmo = $(this).find(':selected').data('pmo');
        let pr_id = $(this).find(':selected').data('id');
        if (ids > 0) {
            $('#pmo' + ids).val(pmo);
            $('#pr_id' + ids).val(pr_id);
            $('#pr_id').val(pr_id);
            $('#pmo_id' + ids).val(pmo_id);
        } else {
            $('#id').val(pr_id);

            $('#pmo').val(pmo);
            $('#office_id').val(pmo_id);

        }
        ids++;

    })
</script>