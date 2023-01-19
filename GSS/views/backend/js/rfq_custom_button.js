$(document).ready(function () {
    // if (window.location.href == 'http://localhost/fas/procurement_dashboard.php') {

    // } else {


    //     let pr = $('#pr_no').val();
    //     let path = 'GSS/route/post_status_history.php';
    //     let data = {
    //         pr_no: pr,
    //     };

    //     $.post(path, data, function (data, status) {
    //         let lists = JSON.parse(data);
    //         sample(lists);
    //     });

    //     function sample($data) {
    //         let arr = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12'];
    //         $.each($data, function (key, item) {
    //             if (item.stat == 3) {
    //                 $('#stat-submitted').addClass('active');
    //             } else if (item.stat == 4) {
    //                 $('#stat-processed').addClass('active');
    //             } else if (item.stat == 5) {
    //                 $('#stat-rfq').addClass('active');
    //             } else if (item.stat == 8) {
    //                 $('#stat-obligated').addClass('active');

    //             } else if (item.stat == 11) {
    //                 $('#stat-disbursed').addClass('active');

    //             } else if (item.stat == 12) {
    //                 $('#stat-delivered').addClass('active');
    //             }
    //         });

    //         return $data;
    //     }
    //     $("#history").html("");
    // }
    txtFields_action(true);



  
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

   

    function txtFields_action(flag = true) {
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