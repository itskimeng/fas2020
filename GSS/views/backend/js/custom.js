//ANNUAL PROCUREMENT PLAN
$(document).ready(function () {

    $(document).on('click', '#btn-filter', function () {
        let path = 'GSS/route/app_filter.php';
        let data = {
            office: $('#office').val(),
            category: $('#category').val(),
            year: $('#year').val()
        };

        $.get(path, data, function (data, status) {
            $('#app_table').empty();
            let lists = JSON.parse(data);
            $('#app_table').dataTable().fnClearTable();
            $('#app_table').dataTable().fnDestroy();
            generateMainTable(lists);
            $('#app_table').DataTable({
                'paging': false,
                'lengthChange': false,
                'searching': true,
                "order": [
                    [7, "desc"]
                ],
                'info': false,
                'autoWidth': false

            })
        });
    });

    $(document).on('click', '.check-funds', function () {
        $('.check-funds').not(this).prop('checked', false);
    });

    $(document).on('click', '.check-mode', function () {
        $('.check-mode').not(this).prop('checked', false);
    });

    $(document).on('click', '#btnsubmit', function () {
        let form = $('#app_form').serialize();
        const form_id = document.getElementById('app_form');
        const title = document.getElementById('itemTitle');
        const code = document.getElementById('code');
        const unit = document.getElementById('cform-unit');
        let path = 'GSS/route/post_add_app.php?' + form;
        let check_sn = 'GSS/route/post_check.php';
        let sn = $('#stock_number').val();
        let office_id = $('#division').val();

        if (title.value == '' || code.value == '' || unit.value == '') {
            toastr.error("Error! All required fields must be filled-up");
        } else {
            checkSN(sn);
        }



        function checkSN(sn) {
            $.get({
                url: check_sn,
                data: {
                    stock_no: sn
                },
                success: function (data) {
                    if (data == true) {
                        fetchDuplicateEntry();

                        $('#exampleModal').modal('show');
                    } else {
                        insertData(path);
                        toastr.success("Successfully Added APP Item!");
                        setTimeout(
                            function () {
                                window.location = "procurement_app.php?division=" + office_id;
                            },
                            1000);

                    }
                }
            })
        }

        function insertData(path) {
            $.get({
                url: path,
                success: function (data) {}
            })
        }

        function generateStockTable($data) {
            $.each($data, function (key, item) {

                let tr = '<tr>';
                tr += '<td>' + item['sn'] + '</td>';
                tr += '<td>' + item['item'] + '</td>';
                tr += '<td>' + item['year'] + '</td>';
                tr += '<td>₱ ' + parseFloat(item['price']).toFixed(2) + '</td>';
                tr += '<td>' + item['mode'] + '</td>';
                tr += '</tr>';
                $('#app_duplicate_tbl').append(tr);
            });

            return $data;
        }

        function fetchDuplicateEntry() {
            let path = 'GSS/route/app_duplicate_sn.php';
            let data = {
                stock_number: $('#stock_number').val(),
            };
            $.get(path, data, function (data, status) {
                let lists = JSON.parse(data);
                    $('#app_duplicate_tbl').dataTable().fnClearTable();
                    $('#app_duplicate_tbl').dataTable().fnDestroy();
                generateStockTable(lists);
                $('#app_duplicate_tbl').DataTable({
                    'paging': false,
                    'lengthChange': false,
                    'searching': true,
                    "order": [
                        [5, "desc"]
                    ],
                    'info': false,
                    'autoWidth': false

                })

            });
        }
    });

    $(document).on('click', '#btnproceed', function () {
        let form = $('#app_form').serialize();
        let path = 'GSS/route/post_add_app.php?' + form;
        insertData(path);

        function insertData(path) {
            $.get({
                url: path,
                success: function (data) {}
            })
        }
    })



});

// PURCHASE REQUEST
$(document).ready(function () {
    $(".select2").select2({
        dropdownParent: $("#exampleModal")
    });
    var table = $('#example1').DataTable({
        "lengthChange": false,
        "dom": '<"pull-left"f><"pull-right"l>tip',
        "lengthMenu": [4, 40, 60, 80, 100],

    });
    $(this).addClass('highlight').siblings().removeClass('highlight');

    $('#example1 tbody').on('click', 'tr', function () {
        var data = table.row(this).data();
        $('#app_items').val(data[0]);
        $('#item_title').val(data[4]);
        $('#stocknumber').val(data[2]);
        $('#unit').val(data[5]);
        $('#abc').val(data[3]);
        $('#items1').val(data[1]);

        var data = table.row(this).data();

        $(this).addClass('highlight').siblings().removeClass('highlight');

    });

    $('#datepicker1').datepicker({
        autoclose: true
    })
    
    $('#datepicker2').datepicker({
        autoclose: true
    })
  







    // ============ BTN ================
    $(document).on('click', '#btn-delete', function () {
        $('#item_table tr:eq(1)').remove();
        calc_total();
        toastr.warning("Successfully removed this item");
    })

    $(document).on('click', '#btn_additem', function () {
        $('#td_hidden').show();

        if ($('#qty').val() == '') {
            toastr.error("Error! Some required fields need to be filled-up!");
            return;
        } else {

            appendTable();

        }
        calc_total();

    })

    $(document).on('click', '#btn_submit', function () {
        let serialize_data = $('#form_pr_item').serialize();
        let pmo = $('#cform-pmo').val();

        if ($('#cform-particulars').val() == '') {
            toastr.error("Error! All fields are required!");
        } else {


            $.get({
                url: 'GSS/route/post_create_pr.php?' + serialize_data,
                success: function (data) {
                    toastr.success("Successfully Added this PR!");
                    setTimeout(
                        function () {
                            window.location = "procurement_purchase_request.php?division=" + pmo;
                        },
                        1000);

                }
            })
        }

    })

    $(document).on('click', '#btn_submit_to_gss', function () {
        let path = "GSS/route/";
        let pr = $(this).val();
        if (pr != '') {
            pr = $(this).val();


        } else {
            pr = $('#btn_received').data('value');
        }
        let current_user = $('#cform-received-by').val();
        let division = $('#cform-pmo').val();

        $.post({
            url: path + "post_submit_to_gss.php",
            data: {
                pr_no: pr,
                received_by: current_user
            },
            success: function (data) {
                toastr.success("You have successfully submitted this Item!");
                setTimeout(
                    function () {
                        window.location = "procurement_purchase_request.php?division=" + division;
                    },
                    1000);


            }
        })
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
        let division = $('#cform-pmo').val();

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
                        window.location = "procurement_purchase_request.php?division=" + division;
                    },
                    1000);


            }
        })



    })

 

    $(document).on('click', '#btn_edit_pr', function () {
        let form = $('#pr_edit_form').serialize();
        let path = 'GSS/route/post_edit_pr.php?' + form;
        let pr = $(this).val();
        console.log(pr);
        let division = $('#division').val();
        update(path);

        function update(path) {
            $.get({
                url: path,
                data: {
                    pr_no: pr
                },
                success: function (data) {
                    window.location = "procurement_purchase_request_view.php?id=" + pr + '&division=' + division;

                }
            })
        }
    })






    // ============ get total =============


    function appendTable() {
        $row = $('<tr/>');
        let cellVal1 = '';
        let cellVal2 = '';
        let cellVal3 = '';
        let cellVal4 = '';
        let cellVal5 = '';
        let cellVal6 = '';
        let cellVal7 = '';
        let cellVal8 = '';
        let sum = 0;
        cellVal1 = $('#stocknumber').val();
        cellVal4 = $('#desc').val();
        cellVal2 = $('#unit').val();
        cellVal3 = $('#item_title').val();
        cellVal5 = $('#qty').val();
        cellVal6 = $('#abc').val();
        cellVal8 = $('#app_items').val();
        cellVal7 = parseFloat($('#abc').val() * $('#qty').val()).toFixed(2);
        let btn_del = "<button class='btn btn-danger btn-sm col-lg-12' id='btn-delete'><i class='fa fa-trash'></i> Remove</button>";
        let btn_view = "<button class='btn btn-info btn-sm col-lg-12' style='color:#fff;'><i class='fa fa-eye'></i> <a   style='color:#fff;' target = '_blank' href='https://www.google.com/search?q=" + cellVal3 + "&oq=" + cellVal3 + "'>Item Reference</a></button>";


        $row.append($("<td/>").text(cellVal1));
        $row.append($("<td/>").text(cellVal2));
        $row.append($("<td/>").text(cellVal3));
        $row.append($("<td/>").text(cellVal4));
        $row.append($("<td/>").text(cellVal5));
        $row.append($("<td/>").text(cellVal6));
        $row.append($("<td hidden />").text(cellVal8));
        $row.append($("<td hidden class='tp_item' />").text(cellVal7));
        $row.append($("<td />").text("₱ " + cellVal7.replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,")));
        $row.append("<td>" + btn_del + "" + btn_view + "</td>");

        $row.append("<td hidden><input type='hidden' name='unit1[]' value='" + cellVal2 + "' /></td>");
        $row.append("<td  hidden><input type='hidden' name='item_title[]' value='" + cellVal3 + "' /></td>");
        $row.append("<td  hidden><input type='hidden' name='description1[]' value='" + cellVal4 + "' /></td>");
        $row.append("<td  hidden><input type='hidden' name='qty1[]' value='" + cellVal5 + "' /></td>");
        $row.append("<td  hidden><input type='hidden' name='abc1[]' value='" + cellVal6 + "' /></td>");
        $row.append("<td  hidden><input type='hidden' name='grand_total[]' value='" + cellVal7.replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") + "' /></td>");
        $row.append("<td  hidden><input type='hidden' name='items1[]' value='" + cellVal6 + "' /></td>");
        $row.append("<td  hidden><input type='hidden' name='app_items[]' value='" + cellVal8 + "' /></td>");



        toastr.success("Successfully added this item!", cellVal3 + " Added!");

        $('#tbody_item').append($row);
    }

    function calc_total() {
        var sum = 0;
        $(".tp_item").each(function () {
            sum += parseFloat($(this).text());
        });
        $('#total_cost').val(sum);
        $('#total_val').text('₱' + sum.toLocaleString());
        $('#total_val').css('color', 'red');
        $('#total_val').css('font-weight', 'bolder');
        $('#total_val').css('font-size', 'larger');
    }


    function generateMainTable($data) {
        $.each($data, function (key, item) {

            let tr = '<tr>';
            tr += '<td>' + item['sn'] + '</td>';
            tr += '<td>' + item['category'] + '</td>';
            tr += '<td>' + item['procurement'] + '</td>';
            tr += '<td>' + item['pmo_title'] + '</td>';
            tr += '<td>' + item['mode'] + '</td>';
            tr += '<td>' + item['source'] + '</td>';
            tr += '<td>' + item['year'] + '</td>';
            tr += '<td><a href="../../route/app_history.php?id=?' + item['id'] + ' title="View" class="btn btn-info btn-xs"> <i class="fa">&#xf06e;</i> History </a></td>';
            tr += '<td><a href="../../route/app_history.php?id=?' + item['id'] + ' title="View" class="btn btn-info btn-xs"> <i class="fa">&#xf06e;</i> History </a></td>';


            tr += '</tr>';
            $('#app_table').append(tr);
        });

        return $data;
    }


});

//RFQ
