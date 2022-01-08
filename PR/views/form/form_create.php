<?php require_once 'PR/controller/PurchaseRequestController.php'; ?>

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
        <div class="col-lg-4">
          <?php include 'pr.php'; ?>
        </div>
        <div class="col-lg-8">

          <?php include 'item_details_table.php'; ?>
          <?php include 'item_table.php'; ?>

         
        </div>
      </div>
    </form>
</div>

</section>
</div>

<script>
  $(document).ready(function() {

    var table = $('#example1').DataTable({
      "lengthChange": false,
      "dom": '<"pull-left"f><"pull-right"l>tip',
      "lengthMenu": [4, 40, 60, 80, 100],

    });
    $(this).addClass('highlight').siblings().removeClass('highlight');

    $('#example1 tbody').on('click', 'tr', function() {
      var data = table.row(this).data();
      $('#id').val(data[0]);
      $('#item_title').val(data[4]);
      $('#stocknumber').val(data[2]);
      $('#unit').val(data[5]);
      $('#abc').val(data[3]);
      $('#items1').val(data[1]);

      var data = table.row(this).data();
      // below some operations with the data
      // How can I set the row color as red?
      $(this).addClass('highlight').siblings().removeClass('highlight');

    });

    $('#datepicker1').datepicker({
      autoclose: true
    })
    $('#datepicker2').datepicker({
      autoclose: true
    })







    // ============ BTN ================
    $(document).on('click', '#btn-delete', function() {
      $('#item_table tr:eq(1)').remove();
      calc_total();
      toastr.warning("Successfully removed this item");
    })

    $(document).on('click', '#btn_additem', function() {
      $('#td_hidden').show();

      if ($('#qty').val() == '') {
        toastr.error("Error! Some required fields need to be filled-up!");
        return;


      } else {

        appendTable();

      }
      calc_total();

    })

    $(document).on('click', '#btn_submit', function() {
      let serialize_data = $('#form_pr_item').serialize();
      console.log(serialize_data);
      $.get({
        url: 'PR/entity/post_create_pr.php?' + serialize_data,
        success: function(data) {
          console.log('success');
        }
      })

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
      let sum = 0;
      cellVal1 = $('#stocknumber').val();
      cellVal4 = $('#desc').val();
      cellVal2 = $('#unit').val();
      cellVal3 = $('#item_title').val();
      cellVal5 = $('#qty').val();
      cellVal6 = $('#abc').val();
      cellVal7 = parseFloat($('#abc').val() * $('#qty').val()).toFixed(2);
      let btn_del = "<button class='btn btn-danger btn-sm col-lg-12' id='btn-delete'><i class='fa fa-trash'></i> Remove</button>";
      let btn_view = "<button class='btn btn-info btn-sm col-lg-12' style='color:#fff;'><i class='fa fa-eye'></i> <a   style='color:#fff;' target = '_blank' href='https://www.google.com/search?q=" + cellVal3 + "&oq=" + cellVal3 + "'>View Item</a></button>";


      $row.append($("<td/>").text(cellVal1));
      $row.append($("<td/>").text(cellVal2));
      $row.append($("<td/>").text(cellVal3));
      $row.append($("<td/>").text(cellVal4));
      $row.append($("<td/>").text(cellVal5));
      $row.append($("<td/>").text(cellVal6));
      $row.append($("<td class='tp_item'/>").text(cellVal7));
      $row.append("<td>" + btn_del + "" + btn_view + "</td>");

      $row.append("<td><input type='hidden' name='unit1[]' value='"+cellVal2+"' /></td>");
      $row.append("<td><input type='hidden' name='item_title[]' value='"+cellVal3+"' /></td>");
      $row.append("<td><input type='hidden' name='description1[]' value='"+cellVal4+"' /></td>");
      $row.append("<td><input type='hidden' name='qty1[]' value='"+cellVal5+"' /></td>");
      $row.append("<td><input type='hidden' name='abc1[]' value='"+cellVal6+"' /></td>");
      $row.append("<td><input type='hidden' name='grand_total[]' value='"+cellVal7+"' /></td>");



      toastr.success("Successfully added this item!", cellVal3 + " Added!");

      $('#tbody_item').append($row);
    }

    function calc_total() {
      var sum = 0;
      $(".tp_item").each(function() {
        sum += parseFloat($(this).text());
        console.log(sum);
      });
      $('#total_cost').val(sum);
      $('#total_val').text('₱' + sum + '.00');
      $('#total_val').css('color', 'red');
      $('#total_val').css('font-weight', 'bolder');
      $('#total_val').css('font-size', 'larger');
    }

  });
</script>