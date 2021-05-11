<script type="text/javascript">

  function closeEditModal() {
    $('#edit_modal').modal('hide');
  }

  function closeDeleteModal() {
    $('#delete_modal').modal('hide');
  }

  function generateTaskDetails($data) {
    let modal = $('#modal-edit_task');
    let elements = ['task_id','code','subtask','person', 'timeline'];

    $.each(elements, function(key, val){
        let el = modal.find('#cform-'+val);
        switch(key) {
          case 4:
            let daterange = modal.find('#'+val);
            let date_start = moment($data.date_start);
            let date_end = moment($data.date_end);

            daterange.val(date_start.format('M/DD/YYYY hh:mm A') + ' - ' + date_end.format('M/DD/YYYY hh:mm A'));
    
            daterange.daterangepicker({
                timePicker: true,
                locale: {
                  format: 'M/DD/YYYY hh:mm A'
                }
            });
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


  function generateComments($data) {
    let $element = '<div class="form-group">';
    $.each($data, function(key, item){
      $element += '<div class="box-comment">';
      $element += '<img class="img-circle img-sm" src="'+item['profile']+'" alt="User Image">';
      $element += '<div class="comment-text">';
      $element += '<span class="username">';
      $element += item['posted_by'];
      $element += '<span class="text-muted pull-right">'+item['posted_date']+'</span>';
      $element += '</span>';
      $element += item['remarks'];
      $element += '</div>';
      $element += '</div>';  
    });

    $element += '</div>';

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
      "hideDuration": "1000",
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
      if(isset($_SESSION['toastr']))
      {
          echo 'toastr.'.$_SESSION['toastr']['type'].'("'.$_SESSION['toastr']['message'].'", "'.$_SESSION['toastr']['title'].'")';
          unset($_SESSION['toastr']);
      }
    ?> 

    $(document).on('click', '.btn-add-task', function(){
      let form = $('#add-task-form').serialize();
      let check_path = "ActivityPlanner/entity/check_schedule.php";
      let save_path = "ActivityPlanner/entity/save_subtasks.php";

      $.get(check_path, form, function(checker, status){
          if (status == 'success') {
            if (checker > 0) {
              swal({
                title: "Do you really wish to continue?",
                text: "A conflict in schedule has been detected!",
                type: "info",
                showCancelButton: true,
                closeOnConfirm: false,
                showLoaderOnConfirm: true
              }, function () {
                postTask(save_path, form);
              });        
            } else {
              postTask(save_path, form);
            }
          }
        }
      );
    });


    function postTask(path, data) 
    {
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

    // $(document).on('click', '.btn-primary-addtask', function() {
    //   let row = addSubtask();
    //   $('#task_table tbody:last').append(row);
    //   $('.daterange').daterangepicker();
    // });

    $(document).on('click', '.btn-edit_task', function() {
      let tr = $(this).closest('tr');
      let task_id = tr.find('.task_id');  
      let path = "ActivityPlanner/entity/fetch_task.php";
      let data = {id: task_id.val()};

      $.get(path, data, function(data, status){
          if (status == 'success') {
            let $data = JSON.parse(data);
            generateTaskDetails($data);
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
      let task_status = row.find('.task_status');
      let $modal = $('#modal-comment');
      let modal_title = $modal.find('.note_box_title');
      let $content = $modal.find('.box-comments');
      let $cmnt_taskid = $modal.find('.comment_taskid');
      let currentuser = $('#cform-current_user').val();
      let footer_buttons = $modal.find('.footer-buttons');
      let path = "ActivityPlanner/entity/get_comments.php";
      data = {task_id: task_id.val(), currentuser: currentuser};

      $cmnt_taskid.val(task_id.val());
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
          }
        }
      );
    });

    $(document).on('click', '.btn-primary_post', function(){
      let $modal = $('#modal-comment');
      let comment = $modal.find('.post_message');
      let $content = $modal.find('.box-comments');
      let taskid = $modal.find('.comment_taskid');
      let path = "ActivityPlanner/entity/post_comment.php";
      let data = {remarks: comment.val(), id: taskid.val()};

      $.post(path, data, function(data, status){
          $content.html('');
          data = JSON.parse(data);
          $element = generateComments(data);
          comment.val('');
          $content.append($element);
        }
      );

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

      let path = "ActivityPlanner/entity/run_emp_task.php";
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