$(document).ready(function () {
    if (window.location.href == 'http://localhost/fas/procurement_dashboard.php') {

    } else {


        let pr = $('#pr_no').val();
        let path = 'GSS/route/post_status_history.php';
        let data = {
            pr_no: pr,
        };

        $.post(path, data, function (data, status) {
            let lists = JSON.parse(data);
            sample(lists);
        });

        function sample($data) {
            let arr = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12'];
            $.each($data, function (key, item) {
                if (item.stat == 3) {
                    $('#stat-submitted').addClass('active');
                } else if (item.stat == 4) {
                    $('#stat-processed').addClass('active');
                } else if (item.stat == 5) {
                    $('#stat-rfq').addClass('active');
                } else if (item.stat == 8) {
                    $('#stat-obligated').addClass('active');

                } else if (item.stat == 11) {
                    $('#stat-disbursed').addClass('active');

                } else if (item.stat == 12) {
                    $('#stat-delivered').addClass('active');
                }
            });

            return $data;
        }
        $("#history").html("");
    }
    txtFields_action(true);



    $('#rfq_table').DataTable({
        "dom": '<"pull-left"f><"pull-right"l>tip',
        'paging': true,
        "searching": true,
        "paging": true,
        "info": false,
        "bLengthChange": false,
        "order": [
            [2, "desc"]
        ],
        "lengthMenu": [
            [3, 10, 20, -1],
            [3, 10, 20, 'All']
        ]

    })

    //btn
    

  

    $(document).on('click', '#btn_view_rfq', function () {
       
    });

    $(document).on('click', '#btn_rfq_edit', function () {
        $('#cform-rfq').prop("disabled", true);
        $('#cform-pr-no').prop("disabled", true);
        $('#cform-amount').prop("disabled", true);
        $('#cform-textarea').prop("disabled", true);
        $('#cform-rfqdate').prop("disabled", false);
        $('#cform-pr_date').prop("disabled", false);
        $('#cform-target_date').prop("disabled", false);
        $('#cform-office').prop("disabled", true);
        buttonAttr();


    })
    

    $(document).on('click', '#export_pos', function () {
        let supplier_id = $('.select2').val();
        let path = 'export_pos.php';

        let rfq_no = $('#cform-rfq').val();
        let pr_no = $('#cform-pr-no').val();
        let pmo = $('#cform-office').val();
        let purpose = $('#cform-textarea').val();

        generate_pos(path);

        function generate_pos(path) {

            window.location = 'export_pos.php?&supplier_id=' + supplier_id + '&rfq_no=' + rfq_no + '&pmo=' + pmo + '&purpose=' + purpose + '&pr_no=' + pr_no;

        }

    })
   

    function txtFields_action(flag = true) {
        $('#cform-rfq').prop("disabled", true);
        $('#cform-pr-no').prop("disabled", true);
        $('#cform-amount').prop("disabled", flag);
        $('#cform-textarea').prop("disabled", flag);
        $('#cform-rfqdate').prop("disabled", flag);
        $('#cform-pr_date').prop("disabled", flag);
        $('#cform-target_date').prop("disabled", flag);
        $('#cform-office').prop("disabled", flag);
    }

    function buttonAttr() {
        $('#btn_rfq_edit').text('Save');
        $('#btn_rfq_edit').removeClass("btn-primary")
        $('#btn_rfq_edit').addClass("btn-success")
        $("#btn_rfq_edit").attr('id', 'btn_rfq_save');
        $('#btn_rfq_save').val($('#cform-rfq').val());

    }



})