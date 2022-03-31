<!-- Modal -->
<div class="modal fade" id="pr_modal_edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-body">
            <form id="app_form">

                <div class="modal-body box item-list-table box-primary box-solid dropbox" style="height:700px;">
                    <div class="box-header with-border">
                        APP Item List
                    </div>
                    <div class="box-body box-emp">
                        <div class="box-header with-border">
                            <div class="row" class="box-body box-emp">
                                <div class="col-lg-12">
                                    <label>APP Item <font style="color: Red;">*</font> </label>

                                    <select class="form-control select2" id="item" style="width:100%;" name="sn">

                                        <?php
                                        $conn = mysqli_connect("localhost", "fascalab_2020", "w]zYV6X9{*BN", "fascalab_2020");
                                        $data = [];

                                        $sql = "SELECT id,price,sn,price,procurement,unit_id,app_year from app where app_year = '2022'";

                                        $query = mysqli_query($conn, $sql);
                                        $data = [];

                                        while ($row = mysqli_fetch_assoc($query)) {
                                            echo '<option value="' . $row['id'] . '">' . $row['procurement'] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-lg-12">
                                    <div hidden>
                                        <input type="text" id="app_items" class="form-control item_id" />
                                    </div>
                                    <div hidden>
                                        <input type="text" id="item_title" class="form-control procurement" />
                                    </div>
                                    <div hidden >
                                        <input type="text" id="pr_no" class="form-control" name="pr_no" value="<?= $_GET['id'];?>" />
                                        <input type="text" id="pr_id" class="form-control" name="pr_id" value="<?= $pr_id['id'];?>" />
                                    </div>
                                    <br>
                                    <label>Stock/Property No. <font style="color: Red;">*</font> </label>
                                    <input type="text" id="stocknumber" class="form-control stocknumber" readonly>
                                    <br>
                                    <label>Quantity <font style="color: Red;">*</font></label>
                                    <br>
                                    <input class="form-control qty" type="number" name="qty" id="qty">

                                    <label>Unit <font style="color: Red;">*</font></label>
                                    <input type="text" class="form-control unit" id="unit" readonly>
                                    <input type="hidden" class="form-control unit_id" id="unit_id">
                                    <br>
                                    <label>Description/Specification </label>
                                    <textarea id="desc" rows="20" cols="50" class="form-control desc" style="height: 140px; width: 500px;resize:none;outline:none"></textarea>


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
                
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" id="btn_update" class="btn btn-primary">Save changes</button>
            </div>
        </div>
        </form>
    </div>
</div>
<script>
    $('#item').select2({
        dropdownParent: $('#pr_modal_edit')
    });
    

    $(document).on('change', '#item', function() {
        let selected_item = $('#item').val();
        let path = 'GSS/route/post_app_item.php';
        $.get({
            url: path,
            data: {
                procurement: selected_item
            },
            success: function(result) {
                var data = jQuery.parseJSON(result);
                $('.app_items').val(data.id);
                $('.item_id').val(data.id);
                $('.item_title').val(data.procurement);
                $('.stocknumber').val(data.sn);
                $('.abc').val(data.price);
                $('.unit').val(data.unit_id);
                $('.unit_id').val(data.unit);
            }
        })
    });
    $(document).on('click', '#btn_update', function() {
        let selected_item = $('#item').val();
  
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
            toastr.success("Update successfully!");
            setTimeout(function() { 
                location.reload(true);

    }, 2000);

            }
        })
    });
</script>