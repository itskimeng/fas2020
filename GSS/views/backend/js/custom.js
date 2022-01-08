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
                "order": [[ 5, "desc" ]],
                'info': false,
                'autoWidth': false

            })
        });
    });

    function generateMainTable($data) {
        $.each($data, function (key, item) {
          
            let tr = '<tr>';
            tr += '<td>' +item['sn']+'</td>';
            tr += '<td>' + item['category'] + '</td>';
            tr += '<td>' + item['procurement'] + '</td>';
            tr += '<td>' + item['pmo_title'] + '</td>';
            tr += '<td>' + item['mode'] + '</td>';
            tr += '<td>' + item['source'] + '</td>';
            tr += '<td>' + item['year'] + '</td>';
            tr += '<td>' + item['payee'] + '</td>';
            tr += '<td><a href="../../route/app_history.php?id=?'+item['id']+' title="View" class="btn btn-info btn-xs"> <i class="fa">&#xf06e;</i> History </a></td>';
            tr += '<td><a href="../../route/app_history.php?id=?'+item['id']+' title="View" class="btn btn-info btn-xs"> <i class="fa">&#xf06e;</i> History </a></td>';
     
    
           
            tr += '</tr>';
            $('#app_table').append(tr);
        });
    
        return $data;
    }
});