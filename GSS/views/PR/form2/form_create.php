<?php require_once 'GSS/controller/PurchaseRequestFormController.php'; ?>
<?php require_once 'GSS/controller/APPController.php'; ?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>Purchase Request</h1>

        <ol class="breadcrumb">
            <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Procurement</a></li>
            <li class="active">Create Purchase Request</li>
        </ol>
    </section>
    <section class="content">
        <?php include 'form_index.php'; ?>
    </section>
</div>


<!-- Modal Create-->
<?php include 'form_modal_create.php'; ?>

<!-- Model Edit -->
<?php include 'form_modal_edit.php'; ?>

<script>
   
    function generateItemsTable() {
        $.post({
            url: 'GSS/views/PR/form2/items_table.php',
            data: {
                id: '<?= $_GET['id']; ?>',
                pr_no: '<?= $get_pr['pr_no']; ?>'
            },
            success: function(data) {
                $('#items').html(data);

            }
        })

    }

    function fetchABC() {
        $.post({
            url: 'GSS/views/PR/form2/fetch_abc.php',
            data: {
                id: '<?= $_GET['id']; ?>',
            },
            success: function(data) {
                $('#total_abc').html(data);
            }
        })

    }

    function ScanPRTable($id) {
        $.post({
            url: 'GSS/route/post_scan.php',
            data: {
                pr_no: '<?= $get_pr['pr_no']; ?>'
            },
            success: function(data) {
                alert(data);
                toastr.warning("Oops! PR-Number: <?= $_GET['pr_no']; ?> is already exist!.");
            }
        })

    }

    function fetchDraftPR(id) {

        let path = 'GSS/views/PR/form2/fetch_draft_pr.php';
        let data = {
            pr_id: id
        }
        $.post(path, data, function(data, status) {
            let lists = JSON.parse(data);
            prInfo(lists);
        });

        function prInfo($data) {
            $.each($data, function(key, item) {
                $('#pr_no').val(item.pr_no);
                $('#datepicker1').val(item.pr_date);
                $('#datepicker2').val(item.target_date);
                $('#cform-particulars').val(item.purpose);
                $('select[name="type"]').val(item.type);
                $('select[name="cform-pmo"]').val(item.office);
            

            });


            return $data;
        }

    }



    $(document).on('click','#btn_proceed',function(){
        let serialize_data = $('#form_pr_reserve').serialize();
   
        $.get({
            url: 'GSS/route/post_pr_toproceed.php?'+serialize_data,
            success: function(data) {
                window.location = 'procurement_purchase_request_createv2.php?flag=1&id=<?= $_GET['id'] ?>&pr_no=<?= $_GET['pr_no'] ?>';
            }
        })
    })
    $(document).on('click', '#btn-copy', function() {
        let id = '<?= $_GET['id']; ?>';
        let pr_no = '<?= $_GET['pr_no']; ?>';
        let path = 'GSS/route/check_pr.php';
        let data = {
            pr_id: id,
            pr_no: pr_no
        }
        $.post(path, data, function(data, status) {
            let lists = JSON.parse(data);
            check(lists);
        });

        function check($data) {

            $.each($data, function(key, item) {
                if (id == item['id']) {
                    window.location = 'procurement_purchase_request_copy.php?id=<?= $_GET['id']; ?>&pr_no=<?= $_GET['pr_no']; ?>&stat=draft';
                } else {
                    toastr.error("To continue, click the Save as draft button.");

                }
            });


            return $data;
        }
    })
    $(document).on('click', '#btn_draft', function() {
        let serialize_data = $('#form_pr_item').serialize();
        let pmo = $('#pmo').val();
        if (
            $('#cform-particulars').val() == null ||
            $('#cform-particulars').val() == '' ||
            $('#type option:selected').length == 0 ||
            $('#datepicker2').val() == 'November 30, -0001' ||
            $('#datepicker2').val() == '0000-00-00' ||
            $('#datepicker2').val() == null ||
            $('#datepicker2').val() == '0000-00-00') {
            toastr.error("Error! All fields are required!");

        } else {

        $.get({
            url: 'GSS/route/post_submit_draft.php?'+serialize_data,
            success: function(data) {
                toastr.success("This purchase request is current save as Draft!");
                $('#btn_copy').show();
                setTimeout(
                    function () {
                        window.location = 'procurement_purchase_request_createv2.php?flag=1&id=<?= $_GET['id'] ?>&pr_no=<?= $_GET['pr_no'] ?>&stat=draft';
                    },
                    1000);
            }
        })
    }


    })
    $(document).on('click', '#btn_submit', function() {
        let serialize_data = $('#form_pr_item').serialize();
        let pmo = $('#pmo').val();
        let pr_no ='<?php echo $_GET['pr_no'];?>';


        if ($('#cform-particulars').val() == '') {
            toastr.error("Error! All fields are required!");
        } else {
            $.get({
                url: 'GSS/route/post_create_pr.php?pr_no='+pr_no+'&cform-pmo=' + pmo + '&' + serialize_data,
                success: function(data) {
                    toastr.success("Successfully Added this PR!");
                    setTimeout(
                        function() {
                            window.location = "procurement_purchase_request.php?division=" + pmo;
                        },
                        1000);

                }
            })
        }

    })
    $(document).on('click', '#btn-add-item', function() {
        let form = $('#form-add-item').serialize();
        $.get({
            url: 'GSS/route/post_create_pr_item.php?' + form,
            success: function(data) {
                generateItemsTable();
                fetchABC();

                $('#itemModal').modal('hide');


            }
        })
    })
    $(document).on('click', '#btn-edit', function() {
        $('#selected_item').val($(this).val());
        let sn = $(this).val();
        let path = 'GSS/route/fetch_app_items.php';
        let data = {
            stock_n: sn,
            pr_id: '<?= $_GET['id']; ?>'
        }
        $.post(path, data, function(data, status) {
            let lists = JSON.parse(data);
            check(lists);
        });

        function check($data) {

            $.each($data, function(key, item) {
                if (sn == item['sn']) {

                    $('#cform-unit_item').append($("<option selected />").val(item['id']).text(item['procurement']));
                    $('#app-items').val(item['item']);
                    $('#app-id').val(item['id']);
                    $('#quantity').val(item['qty']);
                    $('#stocknumber').val(item['sn']);
                    $('#abc').val(item['price']);
                    $('#abc-hidden').val(item['price']);
                    $('#unit').val(item['unit_id']);
                    $('#unit-id').val(item['unit']);
                    $('#description').text(item['desc']);

                } else {
                    $('#cform-unit_item').append($("<option />").val(item['id']).text(item['procurement']));
                }
            });


            return $data;
        }
    })
    $(document).on('click', '#btn-edit-item', function() {
        let form = $('#form-edit-item').serialize();
        $.get({
            url: 'GSS/route/post_edit_item.php?' + form + '&id=<?= $_GET['id']; ?>+',
            success: function(data) {
                generateItemsTable();
                fetchABC();

                $('#editItemModal').modal('hide');
            }
        })
    })
    $(document).on('click', '#btn-delete-item', function() {
        $.post({
            url: 'GSS/route/post_del_item.php',
            data: {
                'id': $(this).val()
            },
            success: function(data) {
                generateItemsTable();
                fetchABC();
                toastr.success("Successfully remove this item!");

            }
        })
    })
    $(document).on('change', '#cform-unit', function() {
        let selected_item = $('#cform-unit').val();
        let path = 'GSS/route/post_app_item.php';
        $.get({
            url: path,
            data: {
                procurement: selected_item
            },
            success: function(result) {
                var data = jQuery.parseJSON(result);
                $('#cform-app-items').val(data.id);
                $('#cform-item-title').val(data.procurement);
                $('#cform-stocknumber').val(data.sn);
                $('#cform-abc').val(data.price);
                $('#cform-abc-hidden').val(data.price);
                $('#cform-unit-title').val(data.unit_id);
                $('#cform-unit-id').val(data.unit);


            }
        })
    });
    $(document).on('change', '#cform-unit_item', function() {
        let selected_item = $('#cform-unit_item').val();
        let path = 'GSS/route/post_app_item.php';
        $.get({
            url: path,
            data: {
                procurement: selected_item
            },
            success: function(result) {
                var data = jQuery.parseJSON(result);
                $('#app-items').val(data.id);
                $('#item-title').val(data.procurement);
                $('#stocknumber').val(data.sn);
                $('#abc').val(data.price);
                $('#unit').val(data.unit_id);
                $('#unit-id').val(data.unit);
            }
        })
    });
    $(document).ready(function() {

        generateItemsTable();
        fetchABC();
        fetchDraftPR(<?= $_GET["id"]; ?>);
      
        $("#cform-app-code").click(function() {
            $("#itemModal").modal("show");
            $('#cform-unit').select2({
                dropdownParent: $('#itemModal'),
                width: '550'
            });
            $('#cform-unit_item').select2({
                dropdownParent: $('#itemModal'),
                width: '550'

            });
            $('#cform-unit_item').select2({
                dropdownParent: $('#editItemModal'),
                width: '550'

            });
            



        })
        $('#datepicker1').datepicker({
            autoclose: true
        })
        $('#datepicker2').datepicker({
            autoclose: true
        })
        
        if('<?= $_GET['stat']?>' == 'draft')
        {
            $('#cform-app-code').prop('disabled', false);

        }else{
        $('#cform-app-code').prop('disabled', true);

        }


        $('#cform-pmo').prop('disabled', false);
        $('#cform-quantity').prop('disabled', false);
        $('#cform-pr-id').prop('disabled', false);
        $('#cform-pr-no').prop('disabled', false);
        $('#cform-stocknumber').prop('disabled', false);
        $('#cform-app-items').prop('disabled', false);
        $('#cform-unit-id').prop('disabled', false);
        $('#quantity').prop('disabled', false);
        $('#stocknumber').prop('disabled', false);
        $('#unit-id').prop('disabled', false);
        $('#pr-id').prop('disabled', false);
        $('#pr-no').prop('disabled', false);
        // $('#pmo').prop('disabled', false);






    })
</script>