<table class="table table-bordered table-responsive">
    <tbody>
        <tr>
        <?php if (!$form_submitted): ?>
          <div class="callout callout-info">
            <h4>Important Note:</h4>
            <ul>
                <li>
                    Once data is submitted, it cannot be edited again. Please review carefully before submitting the data</p>
                </li>
            </ul>
          </div>
        <?php endif ?>  
        </tr>
    </tbody>
</table>

<form method="POST" action="FiveSMonitoringForm/entity/post_submit.php">
<div class="row">
    <div class="col-xs-12 col-md-12">
        <?php echo input_hidden('pid','pid','pid', $pid); ?>

        <?php echo group_textarea('Comments/Suggestions','comment', $post_comment, 1, false, $form_submitted ? true:false); ?>
    </div>
</div>
<div class="row">
    <div class="col-xs-12">
        <?php if (!$form_submitted): ?>
            <button class="btn btn-primary btn-lg btn-block next" name="submit" value="" type="submit">Submit&nbsp;<span class="glyphicon glyphicon-chevron-right"></span>
            </button>
        <?php endif ?>
    </div>
</div>
</form>

<style type="text/css">
    .callout.callout-info {
    border-color: #0097bc !important;
    background-color: #42bddb !important;
}
    .callout {
    border-radius: 2px !important;
    margin: 0 0 0 0 !important;
    padding: 15px 30px 15px 15px;
    border-left: 5px solid #eee !important;
    border-top: 1px solid;
    border-right: 1px solid;
    border-bottom: 1px solid;
}
</style>

<script type="text/javascript">
    $(document).ready(function(){
        $('input').on('ifChecked', function(event){
            let grp = $(this).closest('tr');
            let cur = $(this).val();
            let tb = $(this).closest('table');
            let tbody = tb.find('tbody tr');
            let footer = tb.find('tfoot');

            let subtotal = footer.find('.subtotal_field');
            let hid_subtotal = footer.find('#cform-seiri_subtotal');

            // uncheck other checkbox in current row
            uncheckSelect(grp, cur);
            let total = runTotal(tbody, grp, cur);

            console.log('adasd');
            hid_subtotal.val(total);
            subtotal.text(total);
        });

        $(document).on('change', '.minimal', function(event){
            let grp = $(this).closest('tr');
            let cur = $(this).val();
            let tb = $(this).closest('table');
            let tbody = tb.find('tbody tr');
            let footer = tb.find('tfoot');

            let subtotal = footer.find('.subtotal_field');
            let hid_subtotal = footer.find('#cform-seiri_subtotal');

            let total = runTotal(tbody, grp, cur);

            console.log('zczxc');
            hid_subtotal.val(total);
            subtotal.text(total);
        });

        function runTotal($tbody, $grp, $cur) {
            let body = $tbody;
            let $list = {1:'one',2:'two',3:'three',4:'four',5:'five'};
            let total = 0;

            $.each(body, function(){
                let tr = $(this);
                $.each($list, function(key,item){
                    let chkbox = tr.find('.'+item);
                    if (chkbox.is(':checked')) {
                        // console.log(key);
                        total = parseInt(total) + parseInt(key);
                    }
                });
            });

            return total;
        }

        function uncheckSelect($grp, $pointer) {
            let $list = ['one','two','three','four','five'];

            $list = jQuery.grep($list, function(value) {
              return value != $pointer;
            });

            $.each($list, function(key, item){
                let el = $grp.find('.'+item);
                el.iCheck('uncheck');
            }); 

            return 0;
        }    
    });
</script>