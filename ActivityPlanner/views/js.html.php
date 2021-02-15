<script type="text/javascript">

  function closeEditModal() {
    $('#edit_modal').modal('hide');
  }

  function closeDeleteModal() {
    $('#delete_modal').modal('hide');
  }

  function deleteEvent($id) {
    let modal = $('#delete_modal');
    let event_id = modal.find('#cform-delete_event_id');

    event_id.val($id);
  }

  function generateEventData($data) {
    let modal = $('#edit_modal');
    let elements = ['event_id','emp_id','title','act_status','event_code','target_participants','description','collaborators','priority', 'profile', 'host'];

    $.each(elements, function(key, val){
        let el = modal.find('#cform-'+val);

        switch(key) {
          case 7:
            el.val($data[val]);
            el.select2();
            break;
          case 9:
            el.attr('src', $data[val]);
            break;
          case 10:
            el.append($data[val]);  
            break;
          default:
            el.val($data[val]);
        }
    });
    
    let daterange = modal.find('#daterange-btn');
    let date_from = modal.find('#cform-date_from');  
    let date_to = modal.find('#cform-date_to');

    for (let $i=1; $i<=$data.priority; $i++) {
      let star = $('#edit_modal .rate'+$i);
      star.addClass('active-star');
      star.css('color', 'gold');
    }

    if ($data.status == "Finished") {
      modal.find('save_changes').addClass('hidden');
    }


    let date_start = $data.date_start;
    let date_end = $data.date_end;

    if ($data.is_new > 0) {
      daterange.html(date_start.format('MMMM D, YYYY') + ' - ' + date_end.format('MMMM D, YYYY'));
      date_from.val(date_start.format('YYYYMMDD hh:mm a'));
      date_to.val(date_end.format('YYYYMMDD hh:mm a'));
    } else {
      daterange.html(date_start.format('MMMM D, YYYY hh:mm a') + ' - ' + date_end.format('MMMM D, YYYY hh:mm a'));
      date_from.val(date_start.format('YYYYMMDD hh:mm a'));
      date_to.val(date_end.format('YYYYMMDD hh:mm a'));
    }

    //Date range as a button
    // on change
    daterange.daterangepicker({
       timePicker: true, timePickerIncrement: 30, locale: { format: 'MMMM D, YYYY hh:mm A' },
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        // startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        daterange.html(start.format('MMMM D, YYYY hh:mm A') + ' - ' + end.format('MMMM D, YYYY hh:mm A'));
        date_from.val(start.format('YYYYMMDD hh:mm a'));
        date_to.val(end.format('YYYYMMDD hh:mm a'));
      }
    );

  }

  function highlightStar($pointer, $active=false) {
    for (let $i=0; $i<=5; $i++) {
      if ($i <= $pointer) {
        $('#edit_modal .rate'+$i).css('color', 'gold');
        $('#edit_modal .rate'+$i).css('transform', 'scale(1.1)');
        if ($active) {
          $('#edit_modal .rate'+$i).addClass('active-star');
        }
      } else if (!$active) {
        if (!$('#edit_modal .rate'+$i).hasClass('active-star')) {
          $('#edit_modal .rate'+$i).css('color', '#ddd');
          $('#edit_modal .rate'+$i).css('transform', '');
          $('#edit_modal .rate'+$i).removeClass('active-star');
        }
      } else {
          $('#edit_modal .rate'+$i).css('color', '#ddd');
          $('#edit_modal .rate'+$i).css('transform', '');
          $('#edit_modal .rate'+$i).removeClass('active-star');
      }  
    }  
  }

  function unhighlightStar() {
    for (let $i=0; $i<=5; $i++) {
      if (!$('#edit_modal .rate'+$i).hasClass('active-star')) {
        $('#edit_modal .rate'+$i).css('color', '#ddd');
        $('#edit_modal .rate'+$i).css('transform', '');
      }  
    }  
  }

  function clearStar() {
    for (let $i=0; $i<=5; $i++) {
      $('#edit_modal .rate'+$i).css('color', '#ddd');
      $('#edit_modal .rate'+$i).removeClass('active-star');
      $('#edit_modal .rate'+$i).css('transform', '');  
    }   
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
 
    // let $element = '<div class="direct-chat-messages">';
    // let $element = '';
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

      // if (item['is_currentuser']) {
      //   $element += commentRight(item['posted_by'], item['posted_date'], item['remarks']);
      // } else {
      //   $element += commentLeft(item['posted_by'], item['posted_date'], item['remarks']);
      // }
    });

    $element += '</div>';

    return $element;
  }



  $(document).ready(function() {

    $('.daterange').daterangepicker();
    let colab = $('#edit_modal').find('#cform-collaborators');
    colab.select2();

    $('#edit_modal .fa-star').click(function() {
      let num = $(this).attr('value');
      highlightStar(num, true);
      $('#edit_modal #cform-priority').val(num);
    });

    $('#edit_modal .fa-star').hover(function() {
      highlightStar($(this).attr('value'));
    });

    $('#edit_modal .rate').mouseout(function() {
      unhighlightStar(5);
    });

    $(document).on('click', '.edit_activity', function() {
      let  $data = [];
      let tr = $(this).closest('tr');
      let act_collaborators = tr.find('.act_collaborators').val();

      $data = {
        event_code: tr.find('.act_code').val(),
        event_id: tr.find('.act_id').val(),
        emp_id: tr.find('.emp_id').val(),
        title: tr.find('.act_title').val(),
        host: tr.find('.host').val(),
        profile: tr.find('.profile').val(),
        act_status: tr.find('.act_status').val(),
        date_start: moment(tr.find('.date_start').val()),
        date_end: moment(tr.find('.date_end').val()),
        description: tr.find('.description').val(),
        priority: tr.find('.act_priority').val(),
        is_new: tr.find('.is_new').val(),
        target_participants: tr.find('.target_participants').val(),
        collaborators: JSON.parse(act_collaborators)
      };

      generateEventData($data);
    });

    $('.delete_activity').click(function() {
      let  $data = [];
      let tr = $(this).closest('tr');
      let id = tr.find('.act_id').val()
      
      deleteEvent(id);
    });

    $('#edit_modal').on('hidden.bs.modal', function () {
      $('#edit_modal #cform-host').empty();
      clearStar();
    });
    
    $(document).on('click', '.btn-primary-addtask', function() {
      let row = addSubtask();
      $('#task_table tbody:last').append(row);
      $('.daterange').daterangepicker();
    });

    $(document).on('click', '.btn-remove_newsubtask', function() {
      row = $(this).closest('tr');
      row.remove();
    });

    $(document).on('click', '.btn-remove_subtask', function() {
      row = $(this).closest('tr');
      row.remove();
    });

    $(document).on('click', '.btn-app_comment', function(){
      let row = $(this).closest('tr');
      let td = row.find("td:eq(0)");
      let task_id = row.find('.task_id');
      let $modal = $('#modal-comment');
      let modal_title = $modal.find('.note_box_title');
      let $content = $modal.find('.box-comments');
      let $cmnt_taskid = $modal.find('.comment_taskid');
      let currentuser = $('#cform-current_user').val();

      $cmnt_taskid.val(task_id.val());
      modal_title.text('');
      modal_title.text(td.text());
      $content.html('');

      $.ajax({
        url:"../../fas/ActivityPlanner/entity/get_comments.php",
        type:"GET",
        data:{task_id: task_id.val(), currentuser: currentuser},
        success:function(data){
          comment = JSON.parse(data);
          $element = generateComments(comment);
          $content.append($element);
        }
      });
    });

    $(document).on('click', '.btn-primary_post', function(){
      let $modal = $('#modal-comment');
      let comment = $modal.find('.post_message');
      let $content = $modal.find('.box-comments');
      let taskid = $modal.find('.comment_taskid');
 
      $.ajax({
          url:"../../fas/ActivityPlanner/entity/post_comment.php",
          type:"GET",
          data:{remarks: comment.val(), id: taskid.val()},
          success:function(data){

            $content.html('');
            data = JSON.parse(data);
            $element = generateComments(data);
            comment.val('');
            $content.append($element);
          }
        });


    });

    $(document).on('click', '.btn-app_submit', function() {
      let $status = $(this).attr('value');
      let tr = $(this).closest('tr');
      let $id = tr.find('.task_id');
      $id = $id.val();

      fireSwal($id,$status);
    });

    function fireSwal($id,$status) {
      swal({
        title: "Are you sure",
        text: "This will automatically "+$status+" your task.",
        type: "info",
        showCancelButton: true,
        closeOnConfirm: false,
        showLoaderOnConfirm: true
      }, function () {
        $.ajax({
          url:"../../fas/ActivityPlanner/entity/run_emp_task.php",
          type:"GET",
          data:{id: $id, status: $status},
          success:function(data){
            setTimeout(function(){// wait for 5 secs(2)
              location.reload(); // then reload the page.(3) 
            }, 1000);
          }
        });
        
      });
      
          
        
    }
  

    
  });

</script>