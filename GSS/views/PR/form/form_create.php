<?php require_once 'GSS/controller/PurchaseRequestController.php'; ?>
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
    <form id="form_pr_item">
      <div class="row">
        <div class="col-lg-12">
          <?php include 'pr.php'; ?>
        </div>
        <?php include 'form_modal_pr.php'; ?>
      </div>
    </form>
    <form id="form_edit_item">
      <?php include 'form_modal_pr_edit.php'; ?>
    </form>
</div>

</section>
</div>
<script>
  $('#cform-unit').select2({
    dropdownParent: $('#exampleModal')
  });
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
  $(document).on('change','#pmo',function(){
    var $dropdown = $("#cform-fund-source");
    let office = $(this).find(':selected').data('code');
    let office_id = $(this).val()
    let path = 'GSS/route/fetch_fund_source.php';
    let data = {
        'pmo': office_id
      };
      $.post(path, data, function(data, status) {
      let lists = JSON.parse(data);
      $('#cform-fund-source option:selected').remove();

      sample(lists);

    });
    function sample($data){
      $.each($data, function(key, item) {
        $dropdown.append($("<option />").val(item['id']).text(item['lddap']));
    $('#fundsource').text(item['fundsource_amount']);

        });
    }
  
  })
  $(document).on('change','#cform-fund-source',function(){
    let amount = $(this).find(':selected').data('amount');
    $('#fundsource').text(amount);
  })
  $(document).ready(function(){
    let amount = $(this).find(':selected').data('amount');
    $('#fundsource').text(amount);
  })
</script>

