<table class="table table-bordered table-responsive">
    <tbody>
        <tr>
            <td><h4>S2 - Set in order - SEITON: <b class="pull-right" style="font-family: Adobe Arabic; font-size: 17pt;"><i>"A place for everything and everything in its place... No searching!"</i></b></h4></td>
        </tr>
    </tbody>
</table>
<form method="POST" action="FiveSMonitoringForm/entity/post_set.php">
    <div class="row">
        <div class="col-xs-12 col-md-12">
            <?php echo input_hidden('hidden_type','hidden_type','hidden_type','S2'); ?>
            <?php echo input_hidden('pid','pid','pid', $pid); ?>
            <table id="list_table" class="table table-striped table-bordered table-responsive table-hover" role="grid">
                <thead>
                    <tr>
                      <th style = "text-align:center; vertical-align: middle; width:40%; background-color: lightslategray; color:white;">Particulars</th>
                      <th style = "text-align:center; vertical-align: middle; background-color: #fa5961; color:white;">1</th>
                      <th style = "text-align:center; vertical-align: middle; background-color: #faab59; color:white;">2</th>
                      <th style = "text-align:center; vertical-align: middle; background-color: #e9de5a; color:white;">3</th>
                      <th style = "text-align:center; vertical-align: middle; background-color: #59a8fa; color:white;">4</th> 
                      <th style = "text-align:center; vertical-align: middle; background-color: #42e391; color:white;">5</th> 
                      <th style = "text-align:center; vertical-align: middle; background-color: lightslategray; color:white;">Comments/Action to be taken</th>
                  </tr>
              </thead>
              <tbody id="list_body">
                <?php if (!empty($pid) AND isset($fetchEditFormData['S2'])): ?>
                <?php echo input_hidden('is_new','is_new','is_new', false); ?>
                <?php foreach ($fetchData['S2'] as $key => $data): ?>
                    <tr>
                        <td>
                            <?php echo input_hidden('hidden_id','hidden_id[]','hidden_id',$data['id']); ?>
                            <?php echo input_hidden('hidden_entid','hidden_entid['.$data['id'].']','hidden_entid',!empty($fetchEditFormData['S2'][$data['id']]['id']) ? $fetchEditFormData['S2'][$data['id']]['id'] : ''); ?>
                            <b><?php echo $key+4; ?>.</b> <?php echo $data['particulars']; ?>
                        </td>
                        <td>
                            <?php if ($form_submitted AND $fetchEditFormData['S2'][$data['id']]['score'] == 1): ?> 
                                <div class="row">
                                    <i class="fa fa-check-square" style="font-size: 19pt;margin-left: 38%; margin-top: 10%; color: #e74040;"></i>
                                </div>
                                <?php else: ?>
                                    <?php echo group_input_checkbox_minimal('One', 'one', 'scores['.$data['id'].'][]', 'rating one', 'one', 0, '', $fetchEditFormData['S2'][$data['id']]['score'] == 1 ? true:false, $form_submitted ? true:false); ?>
                                <?php endif ?>

                            </td>
                            <td>
                                <?php if ($form_submitted AND $fetchEditFormData['S2'][$data['id']]['score'] == 2): ?> 
                                    <div class="row">
                                        <i class="fa fa-check-square" style="font-size: 19pt;margin-left: 38%; margin-top: 10%; color: #e74040;"></i>
                                    </div>
                                    <?php else: ?>
                                        <?php echo group_input_checkbox_minimal('Two', 'two', 'scores['.$data['id'].'][]', 'rating two', 'two', 0, '', $fetchEditFormData['S2'][$data['id']]['score'] == 2 ? true:false, $form_submitted ? true:false); ?>
                                    <?php endif ?>

                                </td>
                                <td>
                                    <?php if ($form_submitted AND $fetchEditFormData['S2'][$data['id']]['score'] == 3): ?> 
                                        <div class="row">
                                            <i class="fa fa-check-square" style="font-size: 19pt;margin-left: 38%; margin-top: 10%; color: #e74040;"></i>
                                        </div>
                                        <?php else: ?>
                                            <?php echo group_input_checkbox_minimal('Three', 'three', 'scores['.$data['id'].'][]', 'rating three', 'three', 0, '', $fetchEditFormData['S2'][$data['id']]['score'] == 3 ? true:false, $form_submitted ? true:false); ?>
                                        <?php endif ?>

                                    </td>
                                    <td>
                                        <?php if ($form_submitted AND $fetchEditFormData['S2'][$data['id']]['score'] == 4): ?> 
                                            <div class="row">
                                                <i class="fa fa-check-square" style="font-size: 19pt;margin-left: 38%; margin-top: 10%; color: #e74040;"></i>
                                            </div>
                                            <?php else: ?>
                                                <?php echo group_input_checkbox_minimal('Four', 'four', 'scores['.$data['id'].'][]', 'rating four', 'four', 0, '', $fetchEditFormData['S2'][$data['id']]['score'] == 4 ? true:false, $form_submitted ? true:false); ?>
                                            <?php endif ?>

                                        </td>
                                        <td>
                                            <?php if ($form_submitted AND $fetchEditFormData['S2'][$data['id']]['score'] == 5): ?> 
                                                <div class="row">
                                                    <i class="fa fa-check-square" style="font-size: 19pt;margin-left: 38%; margin-top: 10%; color: #e74040;"></i>
                                                </div>
                                                <?php else: ?>
                                                    <?php echo group_input_checkbox_minimal('Five', 'five', 'scores['.$data['id'].'][]', 'rating five', 'five', 0, '', $fetchEditFormData['S2'][$data['id']]['score'] == 5 ? true:false, $form_submitted ? true:false); ?>
                                                <?php endif ?>

                                            </td>
                                            <td>
                                                <?php echo group_textarea('Comments','comments['.$data['id'].']', $fetchEditFormData['S2'][$data['id']]['comments'], 0, false, $form_submitted ? true:false); ?>
                                            </td>
                                        </tr>    
                                    <?php endforeach ?>   
                                    <?php else: ?>
                                        <?php echo input_hidden('is_new','is_new','is_new', true); ?>

                                        <?php foreach ($fetchData['S2'] as $key => $data): ?>
                                            <tr>
                                                <td>
                                                    <?php echo input_hidden('hidden_id','hidden_id[]','hidden_id',$data['id']); ?>
                                                    <b><?php echo $key+4; ?>.</b> <?php echo $data['particulars']; ?>
                                                </td>
                                                <td>
                                                    <?php echo group_input_checkbox_minimal('One', 'one', 'scores['.$data['id'].'][]', 'rating one', 'one', 0, ''); ?>
                                                </td>
                                                <td>
                                                    <?php echo group_input_checkbox_minimal('Two', 'two', 'scores['.$data['id'].'][]', 'rating two', 'two', 0, ''); ?>
                                                </td>
                                                <td>
                                                    <?php echo group_input_checkbox_minimal('Three', 'three', 'scores['.$data['id'].'][]', 'rating three', 'three', 0, ''); ?>
                                                </td>
                                                <td>
                                                    <?php echo group_input_checkbox_minimal('Four', 'four', 'scores['.$data['id'].'][]', 'rating four', 'four', 0, ''); ?>
                                                </td>
                                                <td>
                                                    <?php echo group_input_checkbox_minimal('Five', 'five', 'scores['.$data['id'].'][]', 'rating five', 'five', 0, ''); ?>
                                                </td>
                                                <td>
                                                    <?php echo group_textarea('Comments','comments['.$data['id'].']','', 0, false); ?>
                                                </td>
                                            </tr>    
                                        <?php endforeach ?>
                                    <?php endif ?>

                                </tbody>
                                <tfoot style="background-color: lightslategray; color:white;">
                                    <tr>
                                        <td>
                                            <?php echo input_hidden('seiton_subtotal','seiton_subtotal','seiton_subtotal', $fetchData1['seiton_subtotal']); ?>
                                            <b class="pull-right">Subtotal</b>
                                        </td>
                                        <td colspan="5" class="subtotal_field" style="text-align: center; font-size: 15pt; font-weight: bold;">
                                            <b><?php echo $fetchData1['seiton_subtotal']; ?></b>
                                        </td>
                                        <td></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <?php if (!$form_submitted): ?>
                                <button class="btn btn-primary btn-lg btn-block next" name="submit" value="" type="submit">Continue&nbsp;<span class="glyphicon glyphicon-chevron-right"></span></button>
                            <?php endif ?>

                    </div>
                </div>
            </form>


            <script type="text/javascript">
                $(document).ready(function(){
                    $('input').on('ifChecked', function(event){
                        let grp = $(this).closest('tr');
                        let cur = $(this).val();
                        let tb = $(this).closest('table');
                        let tbody = tb.find('tbody tr');
                        let footer = tb.find('tfoot');

                        let subtotal = footer.find('.subtotal_field');
                        let hid_subtotal = footer.find('#cform-seiton_subtotal');

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
                        let hid_subtotal = footer.find('#cform-seiton_subtotal');

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
