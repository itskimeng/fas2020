<div class="modal fade" id="editItemModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" style="width: 800px;">
        <div class="modal-content">

            <?php include 'item.php'; ?>

        </div>
    </div>
</div>
<script>
 
    $(document).on('change', '.app_item', function () {
        let selected_item = $('.app_item').val();
        let path = 'GSS/route/post_app_item.php';
        $.get({
            url: path,
            data: {
                procurement: selected_item
            },
            success: function (result) {
                var data = jQuery.parseJSON(result);
                $('.item_id').val(data.id);
                $('.procurement').val(data.procurement);
                $('.stocknumber').val(data.sn);
                $('.abc').val(data.price);
                $('.unit_id').val(data.unit);
            }
        })
    });
    </script>