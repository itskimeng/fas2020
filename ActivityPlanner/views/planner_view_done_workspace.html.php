<?php 
  require_once 'ActivityPlanner/controller/ActivityEmpWorkspaceController.php';
?>

<div class="content-wrapper">
    <section class="content-header">
      <h1>
        LGCDD Activity Planner
        <small>Workspace (<?php echo $employee; ?>)</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="home.php">
              <i class="fa fa-dashboard"></i> 
              Home
            </a></li>
        <li><a href="#"></a>LGCDD</a></li>
        <li>
          <a href="base_menu.html.php?division=<?php echo $_SESSION['division'];?>">
            Activity Planner
          </a>
        </li>
        <li class="active">Workspace</li>
        <li class="active">Done List</li>

      </ol>
    </section>
    <div>
      
    <!-- Main content -->
    <section class="content">
      <div class="row">
              
        <div class="col-md-12">
          <div class="box box-primary dropbox">
            <div class="box-header with-border">
              <h3 class="box-title"><i class="fa fa-gear"></i> List</h3>
              
            </div>

            <div class="box-body box-body_details">
              <div class="row"> 
                <div class="col-md-12">
                  <table id="list_table" class="table table-striped table-bordered table-responsive table-hover" role="grid">
                    <thead style="background-color: #007a95;">
                      <tr style="height: 60px;">
                        <th style = "text-align:center; width:15%; vertical-align: middle; color:white; background-color: #007a95; border-left: none; border-top-left-radius: 4px; -webkit-border-top-left-radius: 4px; -moz-border-radius-topleft: 4px;">
                          Event / Activity
                        </th>
                        <th style = "text-align:center; vertical-align: middle; width:12%; color:white">Host</th>
                        <th style = "text-align:center; vertical-align: middle; width:11%; color:white">Code</th>
                        <th style = "text-align:center; vertical-align: middle; width:20%; color:white">Task</th>
                        <th style = "text-align:center; vertical-align: middle; width:11%; color:white">Timeline</th>
                        <th style = "text-align:center; vertical-align: middle; width:4%; color:white">Rev.</th>
                        <th style = "text-align:center; vertical-align: middle; width:12%; color:white">Progress Date</th>
                        <th style = "text-align:center; vertical-align: middle; width:12%; color:white">Approver</th>
                        <th style = "text-align:center; vertical-align: middle;color:white; border-right: none; border-top-right-radius: 4px; -webkit-border-top-right-radius: 4px; -moz-border-radius-topright: 4px;">Link</th>         
                      </tr>
                      
                    </thead>
                    <tbody id="task_tbody" style="overflow-x: scroll;">
                      <?php foreach ($tasks_done as $key => $task): ?>
                          <tr>
                            <td><?php echo $task['event_title'] ?></td>
                            <td><?php echo $task['host'] ?></td>
                            <td><?php echo $task['code'] ?></td>
                            <td><?php echo $task['task_title'] ?></td>
                            <td>
                              <table class="table-bordered">
                                <tbody>
                                  <tr>
                                    <td class="text-center">
                                      <b>From</b>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td style="font-size: 12.5px;"><?php echo $task['timeline_start']; ?></td>
                                  </tr>
                                  <tr>
                                    <td class="text-center">
                                      <b>To</b>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td style="font-size: 12.5px;"><?php echo $task['timeline_end']; ?></td>
                                  </tr>
                                </tbody>
                              </table>    
                            </td>
                            <td style="text-align: center; color:red;">
                              <b><?php echo $task['task_counter'] ?></b>
                            </td>
                            <td>
                              <table class="table-bordered">
                                <tbody>
                                  <tr>
                                    <td class="text-center">
                                      <b>From</b>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td style="font-size: 12.5px;"><?php echo $task['progress_datestart']; ?></td>
                                  </tr>
                                  <tr>
                                    <td class="text-center">
                                      <b>To</b>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td style="font-size: 12.5px;"><?php echo $task['progress_dateend']; ?></td>
                                  </tr>
                                </tbody>
                              </table>   
                            </td>
                            <td><?php echo $task['approver']; ?></td>
                            <td>
                              <?php if (!empty($task['elink'])): ?>
                                <div class="btn-group">
                                  <a href="<?php echo $task['elink']; ?>" class="btn btn-app btn-open-exlink" value="open_link" title="Open Link">
                                    <i class="fa fa-external-link"></i>
                                  </a>
                                </div>
                              <?php endif ?>
                            </td>

                          </tr>
                      <?php endforeach ?>  
                    </tbody>
                  </table>
                  <br>
                </div>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section>
</div>    

<style type="text/css">
  a.btn-upload_docs, a.btn-open-exlink {
    min-width: 35px !important;
    height: 35px !important;
    padding: 6px !important;
    background-color: #ffb123!important;  
  }

  .dropbox {
    box-shadow: 0 1px 2px rgb(0 0 0 / 50%);
  }

  #list_table {
      box-shadow: 0 1px 2px rgb(0 0 0 / 15%);
    }
</style>

<script type="text/javascript">

  function updateTask($id, $status) {

      $.ajax({
          url: "ActivityPlanner/entity/run_emp_task.php",
          type: 'POST',
          data: {id: $id, status: $status},
          success: function(data, text_status, xhr) {
            $message = 'Task has been moved to ';
            if ($status == 'created') {
              $message = 'Task has been returned to ';
              $status = 'todo';
            }
            toastr["success"]($message + $status, " status");
          }
      });
    }

  function appendDetails($source, $destination) {
    let elements = ['title', 'venue', 'description', 'date_start', 'date_end', 'profile', 'host_name'];
    
    $.each(elements, function(key, item){
      let ss = $source.find('.'+item);
      let dd = $destination.find('.'+item);

      if (key == 5) {
        dd.attr('src', ss);
      } else if (key == 6) {
        dd.html('');
        dd.append('<b>'+ss.val()+'<b>');
      } else {
        dd.val(ss.val());
      }
    });
  }

  function generateComments($data) {
    let $element = '<div class="form-group">';
    $.each($data, function(key, item){
      $element += '<div class="box-comment">';
      $element += '<img class="img-circle img-sm" src="'+item['profile']+'" alt="User Image"> ';
      $element += '<div class="comment-text">';
      $element += '<span class="username">';
      $element +=  item['posted_by'];
      $element += '<span class="text-muted pull-right">'+item['posted_date']+'</span>';
      $element += '</span><br>';
      $element += item['remarks'];
      $element += '</div>';
      $element += '</div>';  
    });

    $element += '</div>';

    return $element;
  }

  function generateToDoList(data, marker) {
    $.each(data[marker], function(key, item) {
      let val = marker.toLowerCase().replace(/\s/g, '');

      let row = '<div class="external-event ui-draggable source ui-draggable-handle" value="'+val+'">';
      row += '<div class="col-md-8" style="font-size:11px;">';
      
      row += '<input type="hidden" id="cform-task_id" name="task_id[]" class="task_id" value="'+item['task_id']+'">';
      row += '<input type="hidden" id="cform-title" name="title[]" class="title" value="'+item['task_title']+'">'; 
      row += '<input type="hidden" id="cform-description" name="description[]" class="description" value="'+item['description']+'">'; 
      row += '<input type="hidden" id="cform-venue" name="venue[]" class="venue" value="'+item['venue']+'">'; 
      row += '<input type="hidden" id="cform-profile" name="profile[]" class="profile" value="'+item['profile']+'">';
      row += '<input type="hidden" id="cform-date_start" name="date_start[]" class="date_start" value="'+item['date_start']+'">'; 
      row += '<input type="hidden" id="cform-date_end" name="date_end[]" class="date_end" value="'+item['date_end']+'">'; 
      row += '<input type="hidden" id="cform-host_name" name="host_name[]" class="host_name" value="'+item['host']+'">'; 
      row += '<input type="hidden" id="cform-task_code" name="task_code[]" class="task_code" value="'+item['code']+'">'; 
      row += item['code'];
      row += '</div>';

      row += '<div class="col-md-3 pull-right">';
      row += '<img src="'+item['profile']+'" style="width:30px; height:30px; margin-left:7px;">';  
      row += '</div>';

      row += '<div class="col-md-12" style="height:60px">';
      row += '<p>'+item['task_title']+'</p>';
      row += '</div>';

      row += '<div class="col-md-12" style="font-size:10px;">';
      row += 'Timeline: '+item['timeline'];
      row += '</div>';

      if (item['progress_datestart'] != '' && item['progress_datestart'] != null) {
        row += '<div class="col-md-9" style="font-size:10px;">';
        row += 'Date Start: '+item['progress_datestart'];
        if (item['progress_dateend'] != '' && val == 'done') {
          row += '<br>Date End: '+item['progress_dateend'];
        }
        row += '</div>';
      }

      if (item['task_counter'] > 0) {
        row += '<div class="col-md-3 pull-right" style="color:red">';
        row += 'Rev'+item['task_counter'];
        row += '</div>';
      }

      row += '</div>';
      row += '</div>';

      $('.'+val+'_list').append(row);
    });
  }

  $(document).ready(function(){
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

    let dt = $('#list_table').DataTable( {
      // 'paging'      : true,  
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : false,
      'info'        : true,
      'autoWidth'   : false,
    } );

    // <?php
    //   // toastr output & session reset
    //   session_start();
    //   if (isset($_SESSION['toastr'])) {
    //       echo 'toastr.'.$_SESSION['toastr']['type'].'("'.$_SESSION['toastr']['message'].'", "'.$_SESSION['toastr']['title'].'")';
    //       unset($_SESSION['toastr']);
    //   }
    // ?> 

    $(document).on('click', '.btn-settings', function(el){
      let selection = $(this).val(); 
      generateSettings(selection);
    });

    var btn_settings_checker = '';

    function generateSettings(selection) {
      let sets = '';
      switch(selection) {
        case 'clear':
          clearSettings();
          btn_settings_checker = '';
          break;
        default:
          if (btn_settings_checker != selection) {
            btn_settings_checker = selection;
            generateDetailsView(selection);
          }
      }

      return selection;
    }

    function clearSettings() {
      $('.settings_view').addClass('hidden');
      $('#box-body_settings_view').html('');  
      location.reload();
    }

    function generateDetailsView(selection) {
      $('.settings_view').removeClass('hidden');
      
      let str = selection.toLowerCase().replace(/\b[a-z]/g, function(letter) {
          return letter.toUpperCase();
      });
      $('.settings_view_title').html(str);

      let path = 'ActivityPlanner/views/_workspace/'+selection+'_view.html.php';
      jQuery.get(path, function(data) {
        $('#box-body_settings_view').html('');  
        $('#box-body_settings_view').append(data);
      });
    }

    $(".origin").droppable({
      drop: function (event, ui) {
        let clone = $(ui.draggable).clone();
        let task_id = clone.find('.task_id').val();
        let status = $(this).attr('value');

        clone.attr('cloned', false);

        $(ui.draggable).remove();

        clone.draggable({
          zIndex: 900,
          helper: "clone"
        });
        
        $(this).append(clone);
        
        if (clone.attr('value') != status) {
          updateTask(task_id, status);  
          clone.attr('value', status);
        } 

      }
    });

    $(".destination").droppable({
      drop: function (event, ui) {
        let clone = $(ui.draggable).clone();
        let task_id = clone.find('.task_id').val();
        let status = $(this).attr('value');

        clone.attr('cloned', true);
        
        $(ui.draggable).remove();
            
          clone.draggable({
            zIndex: 900,
            helper: "clone"
          });

          $(this).append(clone);

          if (clone.attr('value') != status) {
            updateTask(task_id, status);  
            clone.attr('value', status);
          } 
      }
    });

    $(".source").draggable({
        zIndex: 100,
        helper:"clone"
    });

  $(document).on('click', '.source', function(){
    let details = $('.box-body_settings_view');
    appendDetails($(this), details);

    let task_id = $(this).find('.task_id');
    let currentuser = $(this).find('.currentuser');
    let task_code = $(this).find('.task_code');
    let elink = $(this).find('.external_link');

    let nb = $('.box-body_settings_view');
    let note_box = nb.find('.note_box');
    let notes_taskid = $('.settings_view').find('#cform-notes_taskid');
    let notes_boxtitle = $('.settings_view').find('.note_box_title');
    let external_link = nb.find('.external_link');
    let btn_elink = nb.find('.btn-open-exlink');
    let uptask_code = $('.settings_view').find('#cform-task-code');


    notes_boxtitle.text('');
    notes_boxtitle.text(task_code.val());
    uptask_code.val(task_code.val());


    notes_taskid.val(task_id.val());
    note_box.html('');

    external_link.val(elink.val());
    btn_elink.attr('href', '');
    btn_elink.attr('href', elink.val());

    $.ajax({
      url:"ActivityPlanner/entity/get_comments.php",
      type:"GET",
      data:{task_id: task_id.val(), currentuser: currentuser.val()},
      success:function(data){
        comment = JSON.parse(data);
        $element = generateComments(comment);
        note_box.append($element);
        
        // note_box.scrollTop(note_box.height()+1000);
      }
    });
  });

  $(document).on('click', '.btn-open-exlink', function(e){ 
      e.preventDefault(); 
      var url = $(this).attr('href'); 
      window.open(url);
  });

  $(document).on('click', '.btn-primary_post', function(){
    let taskid = $('.notes_taskid');
    let comment = $('.post_message');
    let note_box = $('.note_box');
    note_box.html('');

    $.ajax({
        url:"ActivityPlanner/entity/post_comment.php",
        type:"POST",
        data:{remarks: comment.val(), id: taskid.val()},
        success:function(data){

          data = JSON.parse(data);
          $element = generateComments(data);
          comment.val('');
          note_box.append($element);
          note_box.scrollTop(note_box.height()+1000);
          
          toastr["success"]("Note has been posted successfully");
        }
      });


  });

  $(document).on('click', '.btn-save_changes', function(){
    let id = $('#cform-notes_taskid');
    let elink = $('#cform-external_link');
    let code = $('#cform-task-code');
    let btn_open_exlink = $('.btn-open-exlink');

    let data = {id: id.val(), elink: elink.val(), code: code.val()};
    let path = "ActivityPlanner/entity/save_external_link2.php";

    $.get(path, data, function(checker, status){
      toastr.success("Successfully uploaded external link", code.val());
      btn_open_exlink.attr('href', elink.val());
    });
  });


  $(document).on('click', '.clear_done_panel', function(){
    let note_box = $('.note_box');
    let notes_taskid = $('.notes_taskid');
    let notes_boxtitle = $('.note_box_title');
  
    fireSwal(notes_boxtitle, note_box);
  });

  function fireSwal(field1, field2) {
      swal({
        title: "Are you sure?",
        text: "This wil clear all the preview task in done panel",
        type: "info",
        showCancelButton: true,
        closeOnConfirm: false,
        showLoaderOnConfirm: true
      }, function () {
        $.ajax({
          url:"ActivityPlanner/entity/clear_done_panel.php",
          type:"GET",
          data:{},
          success:function(data){
            field1.text('');
            field2.html('');
            setTimeout(function(){// wait for 5 secs(2)
              location.reload(); // then reload the page.(3) 
            }, 1000);
          }
        });
      });  
    }

  $('.done_panel').click(function(){
      let details = $('.box-body_details');
      appendDetails($(this), details);

      let task_id = $(this).find('.task_id');
      let currentuser = $(this).find('.currentuser');
      let task_code = $(this).find('.task_code');

      let note_box = $('.note_box');
      let notes_taskid = $('.notes_taskid');
      let notes_boxtitle = $('.note_box_title');
      
      notes_boxtitle.text('');
      notes_boxtitle.text(task_code.val());
      notes_taskid.val(task_id.val());
      note_box.html('');

      $.ajax({
        url:"ActivityPlanner/entity/get_comments.php",
        type:"GET",
        data:{task_id: task_id.val(), currentuser: currentuser.val()},
        success:function(data){
          comment = JSON.parse(data);
          $element = generateComments(comment);
          note_box.append($element);
          
          note_box.scrollTop(note_box.height()+1000);
        }
      });
    });

    $(document).on('click', '.btn-filter_clear', function(){
      location.reload();
    });

    $(document).on('click', '.btn-primary-filter', function(){
      let cur_emp = $('.currentemp').val();
      let act_program = $('.filter_program').val();
      let act_id = $('.filter_title').val();
      let timeline = $('#filter_timeline').val();

      $('.created_list').html('');
      $('.ongoing_list').html('');
      $('.forchecking_list').html('');
      $('.done_list').html('');

      $('.note_box').html('');
      $('.note_box_title').text('');

      $.ajax({
        url:"ActivityPlanner/entity/filter_emp_workspace.php",
        type:"GET",
        data:{
          act_program: act_program, 
          act_id: act_id, 
          cur_emp: cur_emp, 
          timeline: timeline
        },
        success:function(data){
          if (data != '') {
            let arr = ['Created', 'Ongoing', 'For Checking', 'Done'];
            let dd = JSON.parse(data);

            $.each(arr, function(key, item){
              generateToDoList(dd,item);  
            });
          }
        }
      });
    });

    $(document).on('click', '.btn-view_finished_task', function(){
      console.log('asdasd');
    });


  });
</script>





    

