<div class="modal-body box item-list-table box-primary box-solid dropbox" style="height:700px;">
  <div class="box-header with-border">
    APP Item List
  </div>
    <div class="box-body box-emp">
        <div class="box-header with-border">
        <div class="row" class="box-body box-emp">
            <div class="col-lg-12">
            <label>APP Item <font style="color: Red;">*</font> </label>

            <?= group_select('Item', 'unit_item', $app_item_list, '', 'app_item', '', false, '', true); ?>
            </div>
            <div class="col-lg-12">
            <div >
                <input type="text" id="app_items" class="form-control item_id" />
            </div>
            <div hidden>
                <input type="text" id="item_title" class="form-control procurement" />
            </div>
            <br>
            <label>Stock/Property No. <font style="color: Red;">*</font> </label>
            <input type="text" id="stocknumber" class="form-control stocknumber" readonly>
            <br>
            <label>Quantity <font style="color: Red;">*</font></label>
            <br>
            <input class="form-control qty" type="number" id="qty">

            <label>Unit <font style="color: Red;">*</font></label>
            <input type="text" class="form-control unit" id="unit" readonly>
            <input type="hidden" class="form-control unit_id" id="unit_id" >
            <br>
            <label>Description/Specification </label>
            <textarea id="desc" rows="20" cols="50" class="form-control desc" style="height: 140px; width: 700px;resize:none;outline:none"></textarea>


            <label>Unit Cost <font style="color: Red;">*</font></label>
            <br>
            <input class="form-control abc" type="text" id="abc" readonly>
            <input input type="hidden" class="form-control" type="text" id="total_cost" readonly>
            <input input type="hidden" class="form-control" type="text" id="items1" readonly>
            <input input type="hidden" class="form-control" type="text" id="selected_item" readonly>
            </div>

        </div>
        </div>
    </div>
  <div class="col-lg-12">

    <button type="button" id="btn_updateItem" class="btn btn-primary col-lg-12" data-dismiss="modal"> Update </button><br><br>
  </div>
</div>
<script>
    $(document).on('click', '#btn_updateItem', function () {
        if ($('.qty').val() == '') {
            toast.error('Quantity must be filled up!');
        } else {
            $('#item_table tr:eq(1)').remove();
                 let path = 'GSS/route/post_edit_item.php';
        $.get({
            url: path,
            data:{
                'id' : $('#selected_item').val(),
                'app_item' : $('.item_id').val(),
                'sn' : $('#item').val(),
                'qty' : $('.qty').val(),
                'pr_no':'<?= $_GET['pr_no'];?>',
                'unit_id': $('.unit_id').val(),
                'desc': $('.desc').val(),
                'abc': $('.abc').val(),
                'pr_id': $('#pr_id').val()

            },
            success: function(result) {
                window.location = "procurement_purchase_request_view.php?division=<?= $_GET['division'];?>&id="+<?= $_GET['id'];?>;

            }
        })
            appendEditTable();

        }

    });
</script>