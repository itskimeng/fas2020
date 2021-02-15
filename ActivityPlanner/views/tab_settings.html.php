<div class="tab-pane" id="tab_settings">
  <h3>Access Control List</h3>
  <form method="POST" action="../../fas/ActivityPlanner/entity/save_settings.php">
    <div class="box-body box-profile">
      <div class="row">
        <div class="form-group col-md-12">
        </div>
      </div>
      <div class="row col-md-12">
      <?php foreach ($collaborators1 as $key => $person): ?>
        <div class="form-group col-md-12">
          <label>
            <?php echo input_hidden('clb_id','clb_id[]','clb_id',$key) ?>
            <?php echo $person['name']; ?>    
          </label>
        </div>
        <div class="col-md-12 acl">
          <?php echo group_input_checkbox('OPR', 'opr', 'opr['.$key.'][]', 'opr', $person['acl']->opr, 2, $person['acl']->opr); ?>
          <?php echo group_input_checkbox('Add', 'add', 'add['.$key.'][]', 'collab add', $person['acl']->add, 2, $person['acl']->add); ?>
          <?php echo group_input_checkbox('Edit', 'edit', 'edit['.$key.'][]', 'collab edit', $person['acl']->edit, 2, $person['acl']->edit); ?>
          <?php echo group_input_checkbox('Delete', 'delete', 'delete['.$key.'][]', 'collab delete', $person['acl']->delete, 2, $person['acl']->delete); ?>
          <?php echo group_input_checkbox('To Do', 'todo', 'todo['.$key.'][]', 'collab todo', $person['acl']->todo, 2, $person['acl']->todo); ?>
          <?php echo group_input_checkbox('Post', 'post', 'post['.$key.'][]', 'collab post', $person['acl']->post, 2, $person['acl']->post); ?>
          <?php echo group_input_checkbox('Approve', 'approve', 'approve['.$key.'][]', 'collab approve', $person['acl']->approve, 2, $person['acl']->approve); ?>
        </div>
        <div class="form-group col-md-12">
          <hr>
        </div>
      <?php endforeach ?>                
      </div>
    </div>
    <div class="box-footer">
      <div class="row pull-right">
        <div class="col-md-12">
          <button type="submit" name="submit" value="" class="btn blue" id="submit_btn">Save</button>
        </div>
      </div>
    </div>
  </form>
</div>               

<script type="text/javascript">

  $(document).ready(function(){
    
    $(document).on('click','.opr', function(){
      let is_checked = $(this).is(':checked');
      let grp = $(this).closest('.acl');
      let box = ['add', 'edit', 'delete', 'todo', 'post', 'approve'];

      $.each(box, function(key, item){
        let el = grp.find('.'+item);
        el.prop('checked', is_checked);
      });

    });

    $(document).on('click','.collab', function(){
      // let is_checked = $(this).is(':checked');
      let grp = $(this).closest('.acl');
      let opr = grp.find('.opr');
      let box = ['add', 'edit', 'delete', 'todo', 'post', 'approve'];
      let checker = true;

      $.each(box, function(key, item){
        let el = grp.find('.'+item);
        if (!el.is(':checked')) {
          checker = el.is(':checked');
        }  
      });

      // if (checker) {
        opr.prop('checked', checker);
      // } else {
        // opr.prop('checked', true);
      // }

    });

  });
</script>