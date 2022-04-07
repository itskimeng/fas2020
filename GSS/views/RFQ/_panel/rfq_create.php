<div class="col-md-12">
    <div id="rfq_panel">
        <?php include 'GSS/views/RFQ/_panel/rfq_panel.php'; ?>
    </div>
    <?php include 'GSS/views/RFQ/_panel/rfq_assign_multiple.php'; ?>
    
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
        $(".hideme").hide();
        $('#datepicker1').datepicker({
            autoclose: true
        })
        $(".switchToggle input").on("change", function(e) {
            const isOn = e.currentTarget.checked;

            if (isOn) {
                $(".hideme").show();

                $("#rfq_panel").hide();
$('#rfq_items').show();

                // $("#pr_item_list").hide();
                // $("#pos_panel").hide();


            } else {
                $(".hideme").hide();

                // $("#multiple_rfq").show();
                // $("#pos_panel").show();


            }
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
        let path = 'GSS/route/post_create_rfq.php?' + form+"&rfq="+$('#rfq').val();
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
                    window.location = "procurement_request_for_quotation.php?flag=1&rfq_no="+$('#rfq').val()+"&division=" + division + "";
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
            row += '<?= group_select_custom('pr_no', 'pr_no','pr_no[]', $rfq_pr_opts, '', 'select2', 0, false, '', true) ?>',
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
            // row += '<div class="input-group date" id="datepicker-group" data-provide="datepicker" data-date-format="dd/mm/yyyy" data-date-autoclose="true"><div class="input-group-addon"><i class="fa fa-calendar"></i></div><input type="text" class="form-control pull-right info-dates" id="datepicker1" name="rfq_date[]"  value="<?= date('Y-m-d');?>"> </div>',
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