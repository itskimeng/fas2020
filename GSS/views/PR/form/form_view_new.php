<?php require_once 'GSS/controller/PurchaseRequestController.php'; ?>
<?php require_once 'GSS/controller/APPController.php'; ?>


<div class="content-wrapper">
  <section class="content-header">
    <h1>Purchase Request</h1>

    <ol class="breadcrumb">
      <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Procurement</a></li>
      <li class="active">View Purchase Request</li>
    </ol>
  </section>
  <section class="content">
    <form id="pr_edit_form" method="post">
      <div class="row">
        <div class="col-lg-12">
          <?php include 'form_view_info_new.php'; ?>
        </div>
        <?php include 'form_modal_pr.php'; ?>
        <?php include 'modal_edit.php'; ?>
      </div>
    </form>
</div>

</section>
</div>
<script>
 $(document).on('click', '#btn-edit', function () {
  $('.app_item').val();

        // let sn = $(this).val();
        // let path = 'GSS/route/fetch_app_items.php';
        // let data = {
        //     stock_n: sn
        // };
        // $.post(path, data, function(data, status) {
        //     let lists = JSON.parse(data);
        //     itemInfo(lists);
        // });
        // function itemInfo($data) {
        //     $.each($data, function(key, item) {
        //       console.log(item.id);

        //     });
    
    
        //     return $data;
        // }
      }) 
      </script>
<script>
     
  $('#cform-unit_item').select2({
    dropdownParent: $('#editItemModal')
  });
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
        $('#app_items').val(data.id);
        $('#item_title').val(data.procurement);
        $('#stocknumber').val(data.sn);
        $('#abc').val(data.price);
        $('#unit').val(data.unit_id);
      }
    })
  });
</script>