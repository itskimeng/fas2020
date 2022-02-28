$('#btn_rfq_awarding').hide();
$('#btn_rfq_back').hide();

let maxAppend = 0


$(document).ready(function() {
    let flag = $('#flag').val();
    $('.select2').select2();
    $('#tbl_rfq_panel').hide();
    $('#tbl_view_rfq_info').hide();
    $('#pos_panel').hide();
   
    $('#tbl_rfq_panel').show();

})

    $(document).on('click', '#btn_create_rfq', function() {
        $('#tbl_pr_entries').hide();
        $('#pos_panel').hide();
        $('#tbl_rfq_panel').show();
    })

    $(document).on('click', '#btn_view_rfq', function() {
        $('#tbl_pr_entries').hide();
        $('#tbl_rfq_panel').hide();
        $('#pos_panel').show();
        $('#tbl_view_rfq_info').show();
    })

    $(document).on('click', '.btn-back', function() {
        $('#tbl_pr_entries').show();
        $('#tbl_rfq_panel').hide();
        $('#pos_panel').hide();
        $('#tbl_view_rfq_info').hide();


    })

    $(document).on('click', '#award', function() {
        $("#tab").tabs("option", "active", 1);
        $("#award").addClass('active');
        $("#rfq").removeClass('active');

        //  fetch data 
        let path = 'GSS/route/fetch_rfq_items.php';
        let path_details = 'GSS/route/fetch_rfq_details.php';
        let data = {
            pr_no: $(this).val()
        };

        $.get(path, data, function(data, status) {
            let lists = JSON.parse(data);
            $('#rfq_items').dataTable().fnClearTable();
            $('#rfq_items').dataTable().fnDestroy();
            appendRFQItems(lists);
        });

        $.get(path, data, function(data, status) {
            let lists = JSON.parse(data);
            $('#quotation_table').find('tbody').empty();
            appendQuatation(lists);
        });

        $.get(path_details, data, function(data, status) {
            let lists = JSON.parse(data);
            details(lists);
        });
    })

    $(document).on('click', '#back', function() {
        $("#tab").tabs("option", "active", 0);
        $("#award").removeClass('active');
        $("#rfq").addClass('active');
    })


    $(document).on('click', '#append_supplier', function() {
        let supplier_id = $(".supplier_list").find(':selected').attr('data-id');
        let supplier_value = $(".supplier_list").find(':selected').attr('data-value');
        let isExists = false;


        // if (maxAppend >= ) {
        //     toastr.error("You have reached  the number of maximum suppliers!");
        // } else {
        $('#btn_rfq_awarding').show();
        // var val = $('#selected_supplier').val();
        // if (val == supplier_id) {
        //     toastr.info("Supplier already exist!");

        // } else {
        //     isExists = false;
            let tr = '<th>';
            tr += supplier_id;
            tr += '<th hidden><input type="hidden" value="' + supplier_value + '" id="selected_supplier[]" name="selected_supplier" />';
            tr += '</th>';

            let row = '';
            row += '<td><div id="cgroup-total_amount" class="input-group col-lg-12"> <span class="input-group-addon"><strong>₱</strong></span> ';
            row += '<input type="number" class="form-control" name="supplier_price[]">';
            row += '</div></td>';
            $("#quotation_table>thead>tr").append(tr);
            $("#quotation_table>tbody>tr").append(row);
            $('#append_supplier').hide();
            $('#append_supplier').hide();
            $('#btn_rfq_back').show();
        // }

        // }
        // maxAppend++;

    })


    $(document).on('click', '#btn_rfq_back', function() {
        location.reload();
    })

  
    // FUNCTIONS

    function appendRFQItems($data) {
        $.each($data, function(key, item) {
            let tr = '<tr>';
            tr += '<td>' + item['id'] + '</td>';
            tr += '<td>' + item['item'] + '</td>';
            tr += '<td>' + item['desc'] + '</td>';
            tr += '<td>' + item['qty'] + '</td>';
            tr += '<td>' + item['cost'] + '</td>';
            tr += '<td>' + item['unit'] + '</td>';
            tr += '<td>' + item['total'] + '</td>';
            tr += '</tr>';
            $('#rfq_items').append(tr);
        });


        return $data;
    }

    function appendQuatation($data) {
        $.each($data, function(key, item) {
            let tr = '<tr>';
            tr += '<td>' + item['item'] + '</td>';
            tr += '<td hidden><input type="hidden" name="rfq_item_id[]" value="' + item['item_id'] + '" /></td>';
            tr += '</tr>';
            $("#quotation_table>tbody").append(tr);
            $('#cform-rfq-no-awarded').val(item['rfq_no']);
            $('#cform-pr-no-awarded').val(item['pr_no']);
        });


        return $data;
    }

    function details($data) {
        $.each($data, function(key, item) {
            $('#cform-rfq-purpose').text(item['purpose']);
            $('#cform-rfq-no').text(item['rfq_no']);
            $('#rfq_no').text(item['rfq_no']);
            $('#cform-rfq-rfq_date').text(item['rfq_date']);
            $('#cform-rfq-office').text(item['office']);
            $('#cform-rfq-pr-no').text(item['pr_no']);
            $('#cform-rfq-status').text(item['status']);
        });


        return $data;
    }