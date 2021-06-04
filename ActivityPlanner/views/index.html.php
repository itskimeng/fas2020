<?php 
    require_once 'ActivityPlanner/controller/ActivityMonitoringController.php';
  ?>



  <div class="content-wrapper">
      <section class="content-header">
          <h1>
            Task Management
          </h1>
          
          <?php include('alert_message.html.php'); ?>

          <ol class="breadcrumb"> 
            <li>
              <a href="home.php">
                <i class="fa fa-dashboard"></i> 
                Home
              </a>
            </li> 
            <li>
              <a href="#">LGCDD</a>
            </li>
            <li class="active">
              Task Management
            </li>
          </ol> 
      </section>
      <section class="content">
        <div class="row">
          <?php include('_panel/box.html.php'); ?>
        </div>
        <div class="row">
          <div class="col-md-4">
            <?php include('_panel/program.html.php'); ?>
            <?php include('_panel/employee.html.php'); ?>

          </div>
          <div class="col-md-8">
            <?php include('_panel/table.html.php'); ?>
          </div>
        </div>
      </section>
  </div>

  <?php include('css.html.php');?>
  <?php include('modal_edit.html.php'); ?>
  <?php include('modal_delete.html.php'); ?>

  <script type="text/javascript">
    function shuffle(array) {
      var currentIndex = array.length,  randomIndex;

      // While there remain elements to shuffle...
      while (0 !== currentIndex) {

        // Pick a remaining element...
        randomIndex = Math.floor(Math.random() * currentIndex);
        currentIndex--;

        // And swap it with the current element.
        [array[currentIndex], array[randomIndex]] = [
          array[randomIndex], array[currentIndex]];
      }

      return array;
    }

    function generateEventData($data) {
      let modal = $('#edit_modal');
      let elements = ['event_id','emp_id','title','act_status','event_code','target_participants','description','collaborators','priority', 'profile', 'host', 'tgt_participants'];

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
            case 11:
              el.val($data[val]);
              el.select2();
              break;  
            default:
              el.val($data[val]);
          }
      });

      let cohost_field = modal.find('.widget-cohost-list');
      cohost_field.empty()
      let li = '';

      tmp_prof = [
        'https://bootdey.com/img/Content/avatar/avatar1.png', 
        'https://bootdey.com/img/Content/avatar/avatar2.png',
        'https://bootdey.com/img/Content/avatar/avatar3.png',
        'https://bootdey.com/img/Content/avatar/avatar4.png',
        'https://bootdey.com/img/Content/avatar/avatar5.png',
        'https://bootdey.com/img/Content/avatar/avatar6.png',
        'https://bootdey.com/img/Content/avatar/avatar7.png'
      ];

      $.each($data['co_hosts'], function(key, item){
        if (key <= 5) {
          li += '<li><a href="#"><img src="'+tmp_prof[key]+'" title="'+item+'"></a></li>';
        }
      });

      if ($data['co_hosts'].length > 6) {
        let size = $data['co_hosts'].length - 6;
        li += '<li class="number"><a href="#" title="Co-Hosts">+'+size+'</a></li>';
      }
      
      cohost_field.append(li);
      
      let daterange = modal.find('#daterange-btn');
      let date_from = modal.find('#cform-date_from');  
      let date_to = modal.find('#cform-date_to');

      for (let $i=1; $i<=$data.priority; $i++) {
        let star = $('#edit_modal .rate'+$i);
        star.addClass('active-star');
        star.css('color', 'gold');
      }

      let tt = priorityChecker($data.priority);
      $('#edit_modal #cform-priority_label').html(tt);


      if ($data.status == "Finished") {
        modal.find('save_changes').addClass('hidden');
      }

      let date_start = $data.date_start;
      let date_end = $data.date_end;

      if ($data.is_new > 0) {
        daterange.html(date_start.format('MMMM D, YYYY') + ' - ' + date_end.format('MMMM D, YYYY'));
        daterange.val(date_start.format('M/DD/YYYY') + ' - ' + date_end.format('M/DD/YYYY'));
        
        date_from.val(date_start.format('YYYYMMDD hh:mm A'));
        date_to.val(date_end.format('YYYYMMDD hh:mm A'));
      } else {
        daterange.html(date_start.format('MMMM D, YYYY hh:mm A') + ' - ' + date_end.format('MMMM D, YYYY hh:mm A'));
        daterange.val(date_start.format('M/DD/YYYY hh:mm A') + ' - ' + date_end.format('M/DD/YYYY hh:mm A'));
        
        date_from.val(date_start.format('YYYYMMDD hh:mm A'));
        date_to.val(date_end.format('YYYYMMDD hh:mm A'));
      }

      //Date range as a button
      // on change
      daterange.daterangepicker({
         timePicker: true, locale: { format: 'MMMM D, YYYY hh:mm A' },
          ranges   : {
            'Today'       : [moment(), moment()],
            'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month'  : [moment().startOf('month'), moment().endOf('month')],
            'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
          },
          // startDate: moment().subtract(29, 'days'),
          // endDate  : moment()
        }
        ,
        function (start, end) {
          daterange.html(start.format('MMMM D, YYYY hh:mm A') + ' - ' + end.format('MMMM D, YYYY hh:mm A'));
          daterange.val(date_start.format('M/DD/YYYY hh:mm A') + ' - ' + date_end.format('M/DD/YYYY hh:mm A'));
          date_from.val(start.format('YYYYMMDD hh:mm A'));
          date_to.val(end.format('YYYYMMDD hh:mm A'));
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

    function deleteEvent(el) {
      let tr = $(el).closest('tr');
      let $id = tr.find('.act_id');
      let modal = $('#delete_modal');
      let event_id = modal.find('#cform-delete_event_id');

      event_id.val($id.val());
    }

    function priorityChecker(num) {
        let txt = '';
        switch(num) {
          case '1':
            txt = 'Low Priority';
            break;
          case '2':
            txt = 'Normal Priority';
            break;
          case '3':
            txt = 'Medium Priority';
            break;
          case '4':
            txt = 'High Priority';
            break;
          case '5':
            txt = 'Urgent Priority';
            break;
        }

        return txt;
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


      $('.daterange').daterangepicker();
      let colab = $('#edit_modal').find('#cform-collaborators');
      let tgt_participants = $('#edit_modal').find('#cform-target_participants');

      colab.select2();
      tgt_participants.select2();

      $('#edit_modal .fa-star').click(function() {
        let num = $(this).attr('value');
        $('#edit_modal #cform-priority_label').html('');
        highlightStar(num, true);
        $('#edit_modal #cform-priority').val(num);
        let tt = priorityChecker(num);
        $('#edit_modal #cform-priority_label').html(tt);

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
        let act_cohosts = tr.find('.act_cohosts').val();

        let tgt_participants = tr.find('.tgt_participants').val();
        // let collaborators = JSON.parse(act_collaborators);

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
          collaborators: JSON.parse(act_collaborators),
          tgt_participants: JSON.parse(tgt_participants),
          co_hosts: JSON.parse(act_cohosts)
        };

        generateEventData($data);
      });

      // $('.delete_activity').click(function() {
      //   let  $data = [];
      //   let tr = $(this).closest('tr');
      //   let id = tr.find('.act_id').val()
        
      //   // deleteEvent(id);
      // });

      $('#edit_modal').on('hidden.bs.modal', function () {
        $('#edit_modal #cform-host').empty();
        clearStar();
      });

    });
  </script>