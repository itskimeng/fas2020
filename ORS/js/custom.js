$(document).ready(function () {
    $('.select2').select2()
    $('.ors_select').select2()

    $(document).on('click', '.btn-return', function () {

        let id = $(this).data('id');
        $('#id').val(id);

        // AJAX request
        $('#exampleModal').modal('show');
    });
    $(document).on('click', '.btn-view', function () {
        let id = $(this).data('id');
        $('#id').val(id);

        $.post({
            url: 'ORS/function/post.php',
            data: {
                ors_id: id
            },
            success: function (response) {
                clear_ors();
                view_ors(JSON.parse(response));
                $('#viewPanel').modal('show');
            }
        });
        // AJAX request
    });
    $(document).on('click', '.btn-edit', function () {
        let id = $(this).data('id'); //ors number
        $('#ors').text(id);
        let path = 'entity/post_orsbreakdown.php';
        let data = {
            ors_id: id,
        };
        $.get(path, data, function (data, status) {
            $("#table-body").empty();

            let lists = JSON.parse(data);

            // $('#example').dataTable().fnClearTable();
            // $('#example').dataTable().fnDestroy();
            view_breakdown(lists);
            // $('#example').DataTable({
            //     'lengthChange': true,
            //     'searching': true,
            //     'ordering': false,
            //     'info': true,
            //     'autoWidth': false,
            // })
            
        });
    });
    $(document).on('click', '#btn-filter', function () {
        let path = 'entity/filter_ors.php';
        let data = {
            ors: $('#ors_num').val(),
            ponum: $('#ponum').val(),
            status: $('#status').val(),
            year:$('#year').val(),
            month:$('#month').val(),
            ors_date:$('#datepicker2').val(),
       

        };

        $.get(path, data, function (data, status) {
            // $('#example1').empty();
            let lists = JSON.parse(data);
            $('#example1').dataTable().fnClearTable();
            $('#example1').dataTable().fnDestroy();
            generateMainTable(lists);
            $('#example1').DataTable({
                'paging': false,
                'lengthChange': false,
                'searching': true,
                "order": [[ 5, "desc" ]],
                'info': false,
                'autoWidth': false

            })
        });
    });
    $(document).on('click', '#btn-reset', function () {
        location.reload();
    })
    $(document).on('click','.sweet-7', function() {
          let pr_id = $(this).data('id');
          swal({
            title: "",
            text: "Please input the availability code",
            type: "input",
            showCancelButton: true,
            closeOnConfirm: false,
            inputPlaceholder: "Write something"
          }, function(inputValue) {
            if (inputValue === false) return false;
            // insert availability code
            $.ajax({
              url: "entity/post_availability_code.php",
              method: "POST",
              data: {
                code: inputValue,
                id: pr_id
              },
              success: function(data) {
                swal("Save successfully!", "Availability Code: " + inputValue, "success");
                //window.location = 'ViewRFQ.php?division=<?php echo $_GET['division']; ?>';
              }
            });
    
            if (inputValue === "") {
              swal.showInputError("You need to write something!");
              return false
            }
    
    
          });
        })
    $(".ors_select").change(function () {
        $.post({
            url: 'ORS/function/post.php',
            data: {
                ors: $(this).val()
            },
            success: function (response) {
                // $('#ors_num').val(response.ponum);
                setpo(JSON.parse(response));


            }
        });
    });
});

function view_ors(elements) {

    let viewPanel = $('.view-body');
    let ors_elements = ["ors", "ponum", "datereceived", "datereprocessed", "payee", "particular", "datereturned", "datereleased", "saronumber", "ppa", "uacs", "amount", "status"];
    $.each(ors_elements, function (key, value) {
        let data = viewPanel.find('.' + value);
        data.val(elements[value]);
        $('.status').text(elements.status);
        console.log(elements.status);
    });

}

function view_breakdown($data) {
    $.each($data, function (key, value) {
        $('.status').text(value['status']);

      let tr = '<tr>';
      tr += '<td>' +value['id']+ '</td>';
      tr += '<td>' +value['saronumber']+ '</td>';
      tr += '<td>' +value['ppa']+ '</td>';
      tr += '<td>' +value['uacs']+ '</td>';
      tr += '<td>' +value['amount']+ '</td>';
      tr += '<td><a  href="obupdate.php?getid='+value['id']+'" class = "btn btn-primary btn-sm><i class="fa fa-edit"></i>Edit</a></td>';
      tr += '</tr>';
      $('#table-body').append(tr);
       
    });
    return $data;

}

function setpo(elements) {

    let viewPanel = $('.show');
    let ors_elements = ["ponum"];
    $.each(ors_elements, function (key, value) {
        let data = viewPanel.find('#' + value);
        console.log('#' + value);
        data.val(elements.ponum);
    });

}


function clear_ors() {

    let viewPanel = $('.view-body');
    let ors_elements = ["ors", "ponum", "datereceived", "datereprocessed", "payee", "particular", "datereturned", "datereleased", "saronumber", "ppa", "uacs", "amount", "status"];
    $.each(ors_elements, function (key, value) {
        let data = viewPanel.find('.' + value);
        data.val('');
        $('#status').text('');
    });
}
function generateMainTable($data) {
    $.each($data, function (key, item) {

        let tr = '<tr>';
        tr += '<td ' + item['style'] + '>' +item['count']+'</td>';
        tr += '<td ' + item['style'] + '>' + item['date_received'] + '</td>';
        tr += '<td ' + item['style'] + '>' + item['date_obligated'] + '</td>';
        tr += '<td ' + item['style'] + '>' + item['date_return'] + '</td>';
        tr += '<td ' + item['style'] + '>' + item['date_released'] + '</td>';
        tr += '<td ' + item['style'] + '>' + item['ors'] + '</td>';
        tr += '<td ' + item['style'] + '>' + item['ponum'] + '</td>';
        tr += '<td ' + item['style'] + '>' + item['payee'] + '</td>';
        tr += '<td ' + item['style'] + '>' + item['particular'] + '</td>';
        tr += '<td ' + item['style'] + '>' + item['amount'] + '</td>';

        tr += '<td ' +item['style']+'>' + item['remarks'] + '</td>';
        tr += '<td ' +item['style']+'>' + item['status'] + '</td>';
        tr += '<td colspan="1" ' + item['style'] + '> ';

        tr += item['actions'];

        tr += '</td>';


        tr += '</tr>';
        $('#example1').append(tr);
    });

    return $data;
}
