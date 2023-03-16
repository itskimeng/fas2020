<div class="col-md-3">
    <?php include('ticket_panel/drafts.html.php'); ?>
</div>
<div class="col-md-3">
    <?php include('ticket_panel/ongoing.php'); ?>
</div>
<div class="col-md-3">
    <?php include('ticket_panel/completed.html.php'); ?>

</div>
<div class="col-md-3">
    <?php include('ticket_panel/forrated.html.php'); ?>

</div>
<style type="text/css">
    .dropbox {
        box-shadow: 0 1px 2px rgb(0 0 0 / 50%);
        margin-top: 5%;
    }

    .widget-user .widget-user-image {
        position: absolute;
        top: 32px;
        left: 12%;
        margin-left: -45px;
    }

    .custom-profile {
        height: 100% !important;
        width: 100% !important;
        object-fit: cover;
    }

    div .widget-user-image>.img-circle {
        border-radius: 15%;
        border: 1px solid #c0c1c14a;
    }

    img {
        max-width: 100%;
        max-height: 100%;
        object-fit: cover;
    }

    [data-letters]:before {
        content: attr(data-letters);
        display: inline-block;
        font-size: 1em;
        width: 2.5em;
        height: 2.5em;
        line-height: 2.5em;
        text-align: center;
        border-radius: 15% !important;
        background: #a6249a !important;
        vertical-align: middle;
        /*margin-right:1em;*/
        color: white;
        /*margin-top: -13px;*/
    }
    
</style>
<script type="text/javascript">
    <?php if($_GET['role'] == '21232f297a57a5a743894a0e4a801fc3'): ?>
    function updateTask($id, $status) {
        $.ajax({
            url: "ICTTechnicalAssistance/route/run_ict_task.php",
            type: 'POST',
            data: {
                id: $id,
                status: $status
            },
            success: function(data, text_status, xhr) {
                $message = 'Task has been moved to ';
                if ($status == 'created') {
                    $message = 'Task has been returned to ';
                    $status = 'draft';
                }

                toastr["success"]($message + $status, $id);
            }
        });
    }

    function appendDetails($source, $destination) {
        let elements = ['title', 'venue', 'description', 'date_start', 'date_end', 'profile', 'host_name'];

        $.each(elements, function(key, item) {
            let ss = $source.find('.' + item);
            let dd = $destination.find('.' + item);

            if (key == 5) {
                dd.attr('src', ss);
            } else if (key == 6) {
                dd.html('');
                dd.append('<b>' + ss.val() + '<b>');
            } else {
                dd.val(ss.val());
            }
        });
    }

    function generateComments($data) {
        let $element = '<ul class="chat">';
        $.each($data, function(key, item) {
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
        $element += '<span class="chat-img pull-left">';
        $element += '<img src="' + item['profile'] + '" alt="User Avatar">';
        $element += '</span>';
        $element += '<div class="chat-body clearfix">';
        $element += '<div class="header">';
        $element += '<strong class="primary-font" style="font-size: 10pt;">' + item['posted_by'] + '</strong>';
        $element += '<small class="pull-right text-muted" style="font-size: 7.5pt;"><i class="fa fa-clock-o"></i> ' + item['posted_date'] + '</small>';
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
        $element += '<span class="chat-img pull-right">';
        $element += '<img src="' + item['profile'] + '" alt="User Avatar">';
        $element += '</span>';
        $element += '<div class="chat-body clearfix">';
        $element += '<div class="header">';
        $element += '<small class="text-muted" style="font-size: 7.5pt;"><i class="fa fa-clock-o"></i> ' + item['posted_date'] + '</small>';
        $element += '<strong class="primary-font pull-right" style="font-size: 10pt;">' + item['posted_by'] + '</strong>';
        $element += '</div>';
        $element += '<p style="font-size: 12pt;" class="pull-right">';
        $element += item['remarks'];
        $element += '</p>';
        $element += '</div>';
        $element += '</li>';

        return $element;
    }


    function generateToDoList(data, marker) {
        $.each(data[marker], function(key, item) {
            let val = marker.toLowerCase().replace(/\s/g, '');

            let row = '<div class="external-event ui-draggable source ui-draggable-handle" value="' + val + '">';
            row += '<div class="col-md-8" style="font-size:11px;">';

            row += '<input type="hidden" id="cform-task_id" name="task_id[]" class="task_id" value="' + item['task_id'] + '">';
            row += '<input type="hidden" id="cform-title" name="title[]" class="title" value="' + item['task_title'] + '">';
            row += '<input type="hidden" id="cform-description" name="description[]" class="description" value="' + item['description'] + '">';
            row += '<input type="hidden" id="cform-venue" name="venue[]" class="venue" value="' + item['venue'] + '">';
            row += '<input type="hidden" id="cform-profile" name="profile[]" class="profile" value="' + item['profile'] + '">';
            row += '<input type="hidden" id="cform-date_start" name="date_start[]" class="date_start" value="' + item['date_start'] + '">';
            row += '<input type="hidden" id="cform-date_end" name="date_end[]" class="date_end" value="' + item['date_end'] + '">';
            row += '<input type="hidden" id="cform-host_name" name="host_name[]" class="host_name" value="' + item['host'] + '">';
            row += '<input type="hidden" id="cform-task_code" name="task_code[]" class="task_code" value="' + item['code'] + '">';
            row += item['code'];
            row += '</div>';

            row += '<div class="col-md-3 pull-right">';
            row += '<img src="' + item['profile'] + '" style="width:30px; height:30px; margin-left:7px;">';
            row += '</div>';

            row += '<div class="col-md-12" style="height:60px">';
            row += '<p>' + item['task_title'] + '</p>';
            row += '</div>';

            row += '<div class="col-md-12" style="font-size:10px;">';
            row += 'Timeline: ' + item['timeline'];
            row += '</div>';

            if (item['progress_datestart'] != '' && item['progress_datestart'] != null) {
                row += '<div class="col-md-9" style="font-size:10px;">';
                row += 'Date Start: ' + item['progress_datestart'];
                if (item['progress_dateend'] != '' && val == 'done') {
                    row += '<br>Date End: ' + item['progress_dateend'];
                }
                row += '</div>';
            }

            if (item['task_counter'] > 0) {
                row += '<div class="col-md-3 pull-right" style="color:red">';
                row += 'Rev' + item['task_counter'];
                row += '</div>';
            }

            row += '</div>';
            row += '</div>';

            $('.' + val + '_list').append(row);
        });
    }

    $(document).ready(function() {
        toastr.options = {
            "closeButton": true,
            "debug": true,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": true,
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

        $(document).on('click', '.show-done_collaborators', function() {
            let source = $(this).closest('.source_done');
            let vv = $(this).data('value');

            let collab = source.find('.advance-done_collab');
            let collab2 = source.find('.advance-done_collab2');

            collab.toggle('slide', {
                direction: 'right'
            }, 1500);

            // window.setTimeout(show_popup(vv, $(this), collab2), 5000 ); // 5 seconds
            if (vv == 'details') {
                $(this).data('value', 'collaborators');
                collab2.css('display', 'block');
                collab2.css('margin-top', '');
            } else {
                collab2.css('margin-top', '-26%');
                collab2.css('display', 'none');
                $(this).data('value', 'details');
            }

        });
        $(".search_draft").on("keyup", function() {
            var text = $(this).val().toLowerCase();
            var items = $(".search_txtdraft");

            //first, hide all:
            items.parent().hide();

            //show only those matching user input:
            items.filter(function() {
                return $(this).text().toLowerCase().indexOf(text) == 0;
            }).parent().show();
        });
        $(".search_ongoing").on("keyup", function() {
            var text = $(this).val().toLowerCase();
            var items = $(".search_txtongoing");

            //first, hide all:
            items.parent().hide();

            //show only those matching user input:
            items.filter(function() {
                return $(this).text().toLowerCase().indexOf(text) == 0;
            }).parent().show();
        });
      
        $(".search_completed").on("keyup", function() {
            var text = $(this).val().toLowerCase();
            var items = $(".search_txtcompleted");

            //first, hide all:
            items.parent().hide();

            //show only those matching user input:
            items.filter(function() {
                return $(this).text().toLowerCase().indexOf(text) == 0;
            }).parent().show();
        });
      
      

        
        $(document).on('click', '.show-todo_collaborators', function() {
            let source = $(this).closest('.source');
            let vv = $(this).data('value');

            let collab = source.find('.advance-todo_collab');
            let collab2 = source.find('.advance-todo_collab2');

            collab.toggle('slide', {
                direction: 'right'
            }, 1500);

            // window.setTimeout(show_popup(vv, $(this), collab2), 5000 ); // 5 seconds
            if (vv == 'details') {
                $(this).data('value', 'collaborators');
                collab2.css('display', 'block');
                collab2.css('margin-top', '');
            } else {
                collab2.css('margin-top', '-26%');
                collab2.css('display', 'none');
                $(this).data('value', 'details');
            }

        });

        $(document).on('click', '.show-ongoing_collaborators', function() {
            let source = $(this).closest('.source');
            let vv = $(this).data('value');

            let collab = source.find('.advance-ongoing_collab');
            let collab2 = source.find('.advance-ongoing_collab2');

            collab.toggle('slide', {
                direction: 'right'
            }, 1500);

            // window.setTimeout(show_popup(vv, $(this), collab2), 5000 ); // 5 seconds
            if (vv == 'details') {
                $(this).data('value', 'collaborators');
                collab2.css('display', 'block');
                collab2.css('margin-top', '');
            } else {
                collab2.css('margin-top', '-26%');
                collab2.css('display', 'none');
                $(this).data('value', 'details');
            }

        });

        $(document).on('click', '.show-forchecking_collaborators', function() {
            let source = $(this).closest('.source');
            let vv = $(this).data('value');

            let collab = source.find('.advance-forchecking_collab');
            let collab2 = source.find('.advance-forchecking_collab2');

            collab.toggle('slide', {
                direction: 'right'
            }, 1500);

            // window.setTimeout(show_popup(vv, $(this), collab2), 5000 ); // 5 seconds
            if (vv == 'details') {
                $(this).data('value', 'collaborators');
                collab2.css('display', 'block');
                collab2.css('margin-top', '');
            } else {
                collab2.css('margin-top', '-26%');
                collab2.css('display', 'none');
                $(this).data('value', 'details');
            }

        });


        function show_popup(vv, $dt, collab2) {
            if (vv == 'details') {
                $dt.data('value', 'collaborators');
                collab2.css('display', 'block');
                collab2.css('margin-top', '');
            } else {
                collab2.css('margin-top', '-26%');
                collab2.css('display', 'none');
                $dt.data('value', 'details');
            }
        };

        $(document).on('click', '.btn-settings', function(el) {
            let selection = $(this).val();
            generateSettings(selection);
        });

        var btn_settings_checker = '';

        function generateSettings(selection) {
            let sets = '';
            switch (selection) {
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

            let path = 'ActivityPlanner/views/_workspace/' + selection + '_view.html.php';
            jQuery.get(path, function(data) {
                $('#box-body_settings_view').html('');
                $('#box-body_settings_view').append(data);
            });
        }

        $(".origin").droppable({
            drop: function(event, ui) {
                let clone = $(ui.draggable).clone();
                let control_no = clone.find('.control_no').val();
                let status = $(this).attr('value');
                clone.attr('cloned', false);

                $(ui.draggable).remove();

                clone.draggable({
                    zIndex: 900,
                    helper: "clone"
                });

                $(this).append(clone);

                if (clone.attr('value') != status) {
                    updateTask(control_no, status);
                    clone.attr('value', status);
                }

            }
        });

        $(".destination").droppable({
            drop: function(event, ui) {
                let clone = $(ui.draggable).clone();
                let control_no = clone.find('.control_no').val();
                let status = $(this).attr('value');

                clone.attr('cloned', true);

                $(ui.draggable).remove();

                clone.draggable({
                    zIndex: 900,
                    helper: "clone"
                });

                $(this).append(clone);

                if (clone.attr('value') != status) {
                    updateTask(control_no, status);
                    clone.attr('value', status);
                }
            }
        });

        $(".source").draggable({
            zIndex: 100,
            helper: "clone"
        });


        function fireSwal(field1, field2) {
            swal({
                title: "Are you sure?",
                text: "This wil clear all the preview task in done panel",
                type: "info",
                showCancelButton: true,
                closeOnConfirm: false,
                showLoaderOnConfirm: true
            }, function() {
                $.ajax({
                    url: "ActivityPlanner/entity/clear_done_panel.php",
                    type: "GET",
                    data: {},
                    success: function(data) {
                        field1.text('');
                        field2.html('');
                        setTimeout(function() { // wait for 5 secs(2)
                            location.reload(); // then reload the page.(3) 
                        }, 1000);
                    }
                });
            });
        }

        $('.done_panel').click(function() {
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
                url: "ActivityPlanner/entity/get_comments.php",
                type: "GET",
                data: {
                    task_id: task_id.val(),
                    currentuser: currentuser.val()
                },
                success: function(data) {
                    comment = JSON.parse(data);
                    $element = generateComments(comment);
                    note_box.append($element);

                    note_box.scrollTop(note_box.height() + 1000);
                }
            });
        });

        $(document).on('click', '.btn-filter_clear', function() {
            location.reload();
        });

        $(document).on('click', '.btn-primary-filter', function() {
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
                url: "ActivityPlanner/entity/filter_emp_workspace.php",
                type: "GET",
                data: {
                    act_program: act_program,
                    act_id: act_id,
                    cur_emp: cur_emp,
                    timeline: timeline
                },
                success: function(data) {
                    if (data != '') {
                        let arr = ['Created', 'Ongoing', 'For Checking', 'Done'];
                        let dd = JSON.parse(data);

                        $.each(arr, function(key, item) {
                            generateToDoList(dd, item);
                        });
                    }
                }
            });
        });

     
    

    });
    <?php else: ?>
        $(document).ready(function(){
            $(".search_draft").on("keyup", function() {
            var text = $(this).val().toLowerCase();
            var items = $(".search_txtdraft");

            //first, hide all:
            items.parent().hide();

            //show only those matching user input:
            items.filter(function() {
                return $(this).text().toLowerCase().indexOf(text) == 0;
            }).parent().show();
        });
        $(".search_ongoing").on("keyup", function() {
            var text = $(this).val().toLowerCase();
            var items = $(".search_txtongoing");

            //first, hide all:
            items.parent().hide();

            //show only those matching user input:
            items.filter(function() {
                return $(this).text().toLowerCase().indexOf(text) == 0;
            }).parent().show();
        });
      
        $(".search_completed").on("keyup", function() {
            var text = $(this).val().toLowerCase();
            var items = $(".search_txtcompleted");

            //first, hide all:
            items.parent().hide();

            //show only those matching user input:
            items.filter(function() {
                return $(this).text().toLowerCase().indexOf(text) == 0;
            }).parent().show();
        });
        })
    <?php endif;?>
</script>