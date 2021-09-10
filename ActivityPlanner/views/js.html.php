<script type="text/javascript">

  function closeEditModal() {
    $('#edit_modal').modal('hide');
  }

  function closeDeleteModal() {
    $('#delete_modal').modal('hide');
  }

  function generateTaskDetails($suffix, $data) {
    let modal = $('#modal-'+$suffix);
    let elements = ['task_id','code','subtask','person', 'timeline', 'external_link'];

    $.each(elements, function(key, val){
        let el = modal.find('#cform-'+val);
        switch(key) {
          // case 6:
          case 3:
            el.val($data[val]);
            el.select2();
          case 4:
            let daterange = modal.find('#'+val);
            let daterange_start = modal.find('input[name="daterangepicker_start"]');

            let date_start = moment($data.date_start);
            let date_end = moment($data.date_end);

            daterange.val(date_start.format('M/DD/YYYY hh:mm A') + ' - ' + date_end.format('M/DD/YYYY hh:mm A'));
            // daterange_start.val(date_start.format('M/DD/YYYY hh:mm A'));

            daterange.daterangepicker({
                opens: 'top', 
                timePicker: true,
                locale: {
                  format: 'M/DD/YYYY hh:mm A'
                }
            });
            break;
          case 5:
            let external_link = $data.external_link;
            let oexlink = modal.find('.btn-open-exlink');
            let oexlink_container = modal.find('.exlink-container');

            if (external_link != '' && external_link != null) {
              oexlink_container.removeClass('hidden');
            } else {
              oexlink_container.addClass('hidden');
            }

            oexlink.attr('href', external_link);
            el.val(external_link);

            break;
          default:
            el.val($data[val]);
        }
    });
  }

  function addSubtask() {

        let row = '<tr>';
        row += '<td></td>';
        row += '<td>';
        row += '<?php echo input_hidden('task_id', 'task_id[]', 'task_id', ""); ?>';
        row += '<?php echo input_hidden('is_new','is_new[]','is_new',true); ?>';
        row += '<?php echo input_hidden('task_status', 'task_status[]', 'task_status', ''); ?>';
        row += '<?php echo group_text('Title','subtask[]','', '',0, false,'input-sm'); ?>';
        row += '</td>';
        row += '<td>';
        row += '<?php echo group_select('Person','person[]',$collaborators, '','input-sm', 0); ?>';
        row += '</td>';
        row += '<td>';
        row += '<?php echo group_text('Status','subtask_status[]', '', '', 0, true, 'input-sm'); ?>';
        row += '</td>';
        row += '<td>';
        row += '';
        row += '</td>';
        row += '<td>';
        row += '<?php echo group_daterange3('Timeline', 'timeline', 'timeline[]', '', '', 'daterange input-sm', 0, false); ?>';
        row += '</td>';
        row += '<td>';
        row += '<?php echo group_text('Start Date','subtask_start_date[]','', '',0,true,'input-sm'); ?>';
        row += '</td>';

        row += '<td>';
        row += '<div class="row">';
        row += '<a class="btn btn-app btn-remove_newsubtask">';
        row += '<i class="fa fa-trash-o"></i>';
        row += '</a>';

        
        row += '</div>';
        row += '</td>';

        row += '</tr>';

        return row;
      }

  function commentLeft($name, $time, $remarks) {
    let $element = '<div class="direct-chat-msg">';

    $element += '<div class="direct-chat-info clearfix">';
    $element += '<span class="direct-chat-name pull-left">'+$name+'</span>';
    $element += '<span class="direct-chat-timestamp pull-right">'+$time+'</span>';
    $element += '</div>';

    $element += '<img class="direct-chat-img" src="images/logo.png" alt="Message User Image">';
    $element += '<div class="direct-chat-text">';
    $element += $remarks;
    $element += '</div>';

    $element += '</div>';

    return $element;  
  }

  function commentRight($name, $time, $remarks) {
    let $element = '<div class="direct-chat-msg right">';

    $element += '<div class="direct-chat-info clearfix">';
    $element += '<span class="direct-chat-name pull-right">'+$name+'</span>';
    $element += '<span class="direct-chat-timestamp pull-left">'+$time+'</span>';
    $element += '</div>';

    $element += '<img class="direct-chat-img" src="images/logo.png" alt="Message User Image">';
    $element += '<div class="direct-chat-text" style="text-align:right">';
    $element += $remarks;
    $element += '</div>';

    $element += '</div>';

    return $element;    
  }


  // function generateComments($data) {
  //   let $element = '<div class="form-group">';
  //   $.each($data, function(key, item){
  //     $element += '<div class="box-comment">';
  //     $element += '<img class="img-circle img-sm" src="'+item['profile']+'" alt="User Image">';
  //     $element += '<div class="comment-text">';
  //     $element += '<span class="username">';
  //     $element += item['posted_by'];
  //     $element += '<span class="text-muted pull-right">'+item['posted_date']+'</span>';
  //     $element += '</span>';
  //     $element += item['remarks'];
  //     $element += '</div>';
  //     $element += '</div>';  
  //   });

  //   $element += '</div>';

  //   return $element;
  // }

  function generateComments($data) {
    let $element = '<ul class="chat">';
    $.each($data, function(key, item){
      if (item['is_currentuser']) {
        $element += commentsRigt(item);
      } else {
        $element += commentsLeft(item);
      }
    });
    $element += '</ul>';

    return $element;
  }

  function commentsLeft(item) {
      $element = '<li class="left clearfix">';
      $element += '<div class="chat-img pull-left" style="width:45px; height:45px;">';
      $element += '<img src="'+item['profile']+'" alt="User Avatar">';
      $element += '</div>';
      $element += '<div class="chat-body clearfix">';
      $element += '<div class="header">';
      $element += '<strong class="primary-font" style="font-size: 10pt;">'+item['posted_by']+'</strong>';
      $element += '<small class="pull-right text-muted" style="font-size: 7.5pt;"><i class="fa fa-clock-o"></i> '+item['posted_date']+'</small>';
      $element += '</div>';
      $element += '<p style="font-size: 12pt;">';
      $element += item['remarks'];
      $element += '</p>';
      $element += '</div>';
      $element += '</li>';

      return $element;
  }
  
  function commentsRigt(item) {
    $element = '<li class="right clearfix">';
    $element += '<div class="chat-img pull-right" style="width:45px; height:45px;">';
    $element += '<img src="'+item['profile']+'" alt="User Avatar">';
    $element += '</div>';
    $element += '<div class="chat-body clearfix">';
    $element += '<div class="header">';
    $element += '<strong class="primary-font pull-right" style="font-size: 10pt;">'+item['posted_by']+'</strong>';
    $element += '<small class="text-muted" style="font-size: 7.5pt;"><i class="fa fa-clock-o"></i> '+item['posted_date']+'</small>';
    $element += '</div>';
    $element += '<p class="pull-right" style="font-size: 12pt;">';
    $element += item['remarks'];
    $element += '</p>';
    $element += '</div>';
    $element += '</li>';

    return $element;
  }


  $(document).ready(function() {   

    toastr.options = {
      "closeButton": true,
      "debug": true,
      "newestOnTop": false,
      "progressBar": true,
      "positionClass": "toast-top-right",
      "preventDuplicates": false,
      "onclick": null,
      "showDuration": "300",
      "hideDuration": "1500",
      "timeOut": "5000",
      "extendedTimeOut": "1000",
      "showEasing": "swing",
      "hideEasing": "linear",
      "showMethod": "fadeIn",
      "hideMethod": "fadeOut"
    }

    <?php
      // toastr output & session reset
      session_start();
      if (isset($_SESSION['toastr'])) {
          echo 'toastr.'.$_SESSION['toastr']['type'].'("'.$_SESSION['toastr']['message'].'", "'.$_SESSION['toastr']['title'].'")';
          unset($_SESSION['toastr']);
      }
    ?> 

    var boxWidth = $(".advance-box").width();

    $(document).on('click', '.btn-select_allcollab', function(){
      console.log('qwerty');
      $('#cform-person option').prop('selected', true);

      $('.ddd ').trigger('change');
    });

    $(document).on('click', '.show-advance-btn', function(){
      let dval = $(this).data('value');
      if (dval == 'hidden') {
        $(this).attr('data-value', 'show');
      } else {
        $(this).attr('data-value', 'hidden');
      } 

      $(".advance-box").toggle("slide", {direction:'right'}, 1800);
    });

    $('#cform-person').select2();

    $(document).on('click', '.btn-advance_actns', function(){
      let actn = $(this).data('action');
      let is_checker_valid = isCheckerValid(actn);
      let has_selected_checker = hasSelectedChecker();


      if (is_checker_valid && has_selected_checker) {
        if (actn == 'remove') {
          fireSwalDelete2();
        } else {
          let form = $('#advance-form').serialize(); 
          let path = getAdvancePath(actn);
          postTask(path, form);
        }
      } 
    });

    function fireSwalDelete2($id, row) {
      let path = "ActivityPlanner/entity/advance_delete.php";
      let form = $('#advance-form').serialize(); 
      swal({
        title: "Are you sure?",
        text: "This wil remove the selected task permanently",
        type: "info",
        showCancelButton: true,
        closeOnConfirm: false,
        showLoaderOnConfirm: true
      }, function () {
        postTask(path, form)
      });  
    }

    function hasSelectedChecker() {
      let is_valid = false;
    
      $('#task_tbody > tr').each(function() { 
        let tr = $(this).closest('tr');
        let actn_checker = tr.find('.actn_checker');
        if (actn_checker.is(':checked')) {
          is_valid = true;
        }
      });

      if (!is_valid) {
        toastr.warning('Please select atleast one task to proceed.', 'Oops<i class="fa fa-exclamation"></i>');
      }

      return is_valid;
    }

    function isCheckerValid(action) {
      let is_valid = true;
      
      switch(action) {
        case 'remove':
          $('#task_tbody > tr').each(function() { 
            let tr = $(this).closest('tr');
            let actn_checker = tr.find('.actn_checker');
            let status = tr.find('.task_status');
            if (actn_checker.is(':checked')) {
              if (status.val() == 'ongoing' || status.val() == 'forchecking') {
                is_valid = false;
              }
            }
          });

          if (!is_valid) {
            toastr.warning('<b>Ongoing and For Checking</b> tasks cannot be deleted <i class="fa fa-trash-o"></i>', 'Oops<i class="fa fa-exclamation"></i>');
          }
          break;

        case 'start':
          $('#task_tbody > tr').each(function() { 
            let tr = $(this).closest('tr');
            let actn_checker = tr.find('.actn_checker');
            let status = tr.find('.task_status');
            if (actn_checker.is(':checked')) {
              has_checker = true;
              if (status.val() == 'ongoing' || status.val() == 'forchecking' || status.val() == 'created') {
                is_valid = false;
              }
            }
          });  
          
          if (!is_valid) {
            toastr.warning('<b>Ongoing, For Checking and To Do</b> tasks cannot be set to start <i class="fa fa-play-circle-o"></i> again', 'Oops<i class="fa fa-exclamation"></i>');
          }
          break;

        case 'disapprove':
        case 'approve':
          $('#task_tbody > tr').each(function() { 
            let tr = $(this).closest('tr');
            let actn_checker = tr.find('.actn_checker');
            let status = tr.find('.task_status');
            if (actn_checker.is(':checked')) {
              has_checker = true;
              if (status.val() == 'ongoing' || status.val() == 'draft' || status.val() == 'created') {
                is_valid = false;
              }
            }
          });  

          if (!is_valid) {
            toastr.warning('Only <b>For Checking</b> tasks can be assessed <i class="fa fa-pencil-square-o"></i>.', 'Oops<i class="fa fa-exclamation"></i>');
          }
          break;
      }

      return is_valid;
    }

    function getAdvancePath(checker) {
      let path = '';
      switch(checker) {
        case 'remove':
          path = "ActivityPlanner/entity/advance_delete.php";
          break;
        case 'start':
          path = "ActivityPlanner/entity/advance_start.php";
          break;
        case 'disapprove':
          path = "ActivityPlanner/entity/advance_disapprove.php";
          break;
        case 'approve':
          path = "ActivityPlanner/entity/advance_approve.php";
          break;
      }

      return path;
    }

    $(document).on('click', '.btn-add-task_with_con', function(){
      $(this).find('span').toggleClass('fa-arrow-circle-right fa-spinner fa-pulse');
      $(this).attr('disabled', true);

      let form = $('#add-task-form').serialize();
      if ($('#modal-conflict_details').hasClass('editTask')) {
        form = $('#edit-task-form').serialize();
      }

      let save_path = "ActivityPlanner/entity/save_subtasks.php";
      postTask(save_path, form);
    });

    $(document).on('click', '.btn-add-task', function(){
      let form = $('#add-task-form').serialize();
      let check_path = "ActivityPlanner/entity/check_schedule.php";
      let save_path = "ActivityPlanner/entity/save_subtasks.php";
      let $this = $(this);

      let body = $('#modal-conflict_details').find('#conflict_body');
      body.empty();

      $.get(check_path, form, function(checker, status){
          if (status == 'success') {
            if (checker != '' && checker != null) {
              let data = JSON.parse(checker);
              let table = generateConflictDetails(data);
              $('#modal-add_task').modal('hide');
              $('#modal-conflict_details').modal('show');

              $('#modal-conflict_details').removeClass('editTask');
              $('#modal-conflict_details').addClass('addTask');
            } else {
              $this.html('');
              $this.html('<span class="fa fa-spinner fa-pulse"></span> Saving Changes');
              $this.attr('disabled', true);

              postTask(save_path, form);
            }
          }
        });
    });

    $('#modal-conflict_details').on('hidden.bs.modal', function () {
      if ($(this).hasClass('addTask')) {
        $('#modal-add_task').modal('show');
      } else {
        $('#modal-edit_task').modal('show');
      }
    });

    $('#modal-add_task').on('click', '.btn-cancel_task', function () {
      $('#modal-add_task').find('#cform-subtask').val('');
      $('#modal-add_task').find('#cform-person').val('');
    });

    function generateConflictDetails(data) {
      let tb = '';
      let body = $('#modal-conflict_details').find('#conflict_body');
      
      $.each(data, function(key, item){
        tb += '<tr style="background-color: orange; text-align: center;">';
        tb += '<td colspan="4"><b>'+item.name+'</b></td>';
        tb += '</tr>';
        $.each(item.data, function(index, person){
          tb += '<tr>';
          tb += '<td>'+person.activity+'</td>';
          tb += '<td>'+person.title+'</td>';
          tb += '<td>'+person.date_start+'</td>';
          tb += '<td>'+person.date_end+'</td>';
          tb += '</tr>';
        });

      });
      
      body.append(tb);
      
      return tb;
    }


    $(document).on('click', '.btn-update-task', function(){
      let form = $('#edit-task-form').serialize();
      let check_path = "ActivityPlanner/entity/check_schedule.php";
      let save_path = "ActivityPlanner/entity/save_subtasks.php";
      let $this = $(this);
      
      let body = $('#modal-conflict_details').find('#conflict_body');
      body.empty();

      $.get(check_path, form, function(checker, status){
          if (status == 'success') {
            if (checker != '' && checker != null) {
              let data = JSON.parse(checker);
              let table = generateConflictDetails(data);
              $('#modal-edit_task').modal('hide');
              $('#modal-conflict_details').modal('show'); 

              $('#modal-conflict_details').removeClass('addTask');
              $('#modal-conflict_details').addClass('editTask');       
            } else {
              $this.html('');
              $this.html('<span class="fa fa-spinner fa-pulse"></span> Saving Changes');
              $this.attr('disabled', true);

              postTask(save_path, form);
            }
          }
        }
      );
    });

    function postTask(path, data) {
      $.post(path, data,
        function(data, status){
          if (status == 'success') {
            setTimeout(function(){// wait for 5 secs(2)
              location.reload(); // then reload the page.(3) 
            }, 1000);
          }
        }
      );

      return data;
    }

    $('#timeline').daterangepicker({
        timePicker: true,
        startDate: moment().startOf('hour'),
        endDate: moment().startOf('hour'),
        locale: {
          format: 'M/DD/YYYY hh:mm A'
        }
    });

    $(document).on('click', '.btn-open-exlink', function(e){ 
        e.preventDefault(); 
        var url = $(this).attr('href'); 
        window.open(url);
    });

    $(document).on('click', '.btn-edit_task', function() {
      let tr = $(this).closest('tr');
      let task_id = tr.find('.task_id');  
      let path = "ActivityPlanner/entity/fetch_task.php";
      let data = {id: task_id.val()};

      $.get(path, data, function($data, status){
          if (status == 'success') {
            $data = JSON.parse($data);
            
            $dd = {
              task_id: $data['task_id'],
              code: $data['code'],
              subtask: $data['subtask'],
              date_start: $data['date_start'],
              date_end: $data['date_end'],
              external_link: $data['external_link'],
              person: JSON.parse($data.collaborators)
            };

            generateTaskDetails('edit_task', $dd);
          }
        }
      );
    });

    $(document).on('click', '.btn-upload_docs', function() {
      let tr = $(this).closest('tr');
      let task_id = tr.find('.task_id');  
      let path = "ActivityPlanner/entity/fetch_task.php";
      let data = {id: task_id.val()};

      $.get(path, data, function(data, status){
          if (status == 'success') {
            let $data = JSON.parse(data);
            generateTaskDetails('upload_docs', $data);
            $('#modal-upload_docs').modal('show');
          }
        }
      );
    });
    
    $(document).on('click', '.btn-remove_newsubtask', function() {
      row = $(this).closest('tr');
      row.remove();
    });

    $(document).on('click', '.btn-remove_subtask', function() {
      row = $(this).closest('tr');
      let task_id = row.find('.task_id');
      let status = row.find('.task_status');

      fireSwalDelete(task_id.val(), row);  
    });

    function fireSwalDelete($id, row) {
        let path = "ActivityPlanner/entity/delete_emp_task.php";
        let data = {id: $id};
        swal({
          title: "Are you sure?",
          text: "This wil remove the selected task",
          type: "info",
          showCancelButton: true,
          closeOnConfirm: false,
          showLoaderOnConfirm: true
        }, function () {
          $.post(path, data,
            function(data, status){
              if (status == 'success') {
                setTimeout(function(){// wait for 5 secs(2)
                  location.reload(); // then reload the page.(3) 
                }, 1000);
                row.remove();
              }
            }
          );
          
        });  
      }

    $(document).on('click', '.btn-app_comment', function(){
      let row = $(this).closest('tr');
      let td = row.find("td:eq(0)");
      let task_id = row.find('.task_id');
      let task_code = row.find('.task_code');

      let task_status = row.find('.task_status');
      let $modal = $('#modal-comment');
      let modal_title = $modal.find('.note_box_title');
      let $content = $modal.find('.chat-message');
      let $note_box = $modal.find('#note_box');
      let $cmnt_taskid = $modal.find('.comment_taskid');
      let code = $modal.find('.code');
      let currentuser = $('#cform-current_user').val();
      let footer_buttons = $modal.find('.footer-buttons');
      let path = "ActivityPlanner/entity/get_comments.php";
      data = {task_id: task_id.val(), currentuser: currentuser};

      $cmnt_taskid.val(task_id.val());
      code.val(task_code.val());

      modal_title.text('');
      modal_title.text(td.text());
      $content.html('');

      if (task_status.val() == 'done') {
        footer_buttons.addClass('hidden');
      } else {
        footer_buttons.removeClass('hidden');
      }

      $.get(path, data, function(data, status){
          if (status == 'success') {
            comment = JSON.parse(data);
            $element = generateComments(comment);
            
            $content.append($element);
          
            setTimeout(function(){// wait for 5 secs(2)
              console.log($content.height()+5000);
              $content.scrollTop($content.height()+5000);
            }, 200);
          }
        }
      );
    });

    $(document).on('click', '.btn-primary_post', function(){
      let $modal = $('#modal-comment');
      let comment = $modal.find('.post_message');

      if (comment.val() != '') {
        let $content = $modal.find('.chat-message');
        let taskid = $modal.find('.comment_taskid');
        let code = $modal.find('.code');

        let path = "ActivityPlanner/entity/post_comment.php";
        let data = {remarks: comment.val(), id: taskid.val(), code: code.val()};

        $.post(path, data, function(data, status){
            $content.html('');
            data = JSON.parse(data);
            $element = generateComments(data);
            comment.val('');
            $content.append($element);

            setTimeout(function(){// wait for 5 secs(2)
              $content.scrollTop($content.height()+5000);
            }, 200);
          }
        );
      } else {
        toastr.warning('Please enter a text', 'Oops<i class="fa fa-exclamation"></i>');
      }

    });

    $(document).on('click', '.btn-app_submit', function() {
      let $status = $(this).attr('value');
      let tr = $(this).closest('tr');
      let $id = tr.find('.task_id');
      $id = $id.val();

      fireSwal($id,$status);
    });

    function fireSwal($id,$status) {
      $is_new = false;
      $message = $status;
      if ($status == 'created') {
        $is_new = true;
        $message = "todo";
      }

      let path = "ActivityPlanner/entity/run_emp_task.v1.php";
      let data = {id: $id, status: $status, is_new: $is_new};

      swal({
        title: "Are you sure?",
        text: "This will automatically set the task to "+$message+"",
        type: "info",
        showCancelButton: true,
        closeOnConfirm: false,
        showLoaderOnConfirm: true
      }, function () {
        $.post(path, data, function(data, status){
            if (status == 'success') {
              setTimeout(function(){// wait for 5 secs(2)
                location.reload(); // then reload the page.(3) 
              }, 1000);
            }
          }
        );
        
      });
    }
  

    
  });

</script>