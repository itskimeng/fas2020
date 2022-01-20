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
                    [5, "desc"]
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
        let path = 'GSS/route/post_add_app.php?' + form;
        let check_sn = 'GSS/route/post_check.php';
        let sn = $('#stock_number').val();
        checkSN(sn);

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
    $(document).on('click', '#btnproceed', function(){
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
});