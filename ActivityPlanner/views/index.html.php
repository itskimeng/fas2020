<?php 
    require_once 'ActivityPlanner/controller/ActivityMonitoringController.php';
  ?>



  <div class="content-wrapper">
      <section class="content-header">
          <h1>
            LGCDD Activity Planner
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
              Activity Planner
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

    function deleteEvent(el) {
      let tr = $(el).closest('tr');
      let $id = tr.find('.act_id');
      let modal = $('#delete_modal');
      let event_id = modal.find('#cform-delete_event_id');

      console.log($id.val());
      event_id.val($id.val());
    }

    $(document).ready(function() {    
      $('.daterange').daterangepicker();
      let colab = $('#edit_modal').find('#cform-collaborators');
      let tgt_participants = $('#edit_modal').find('#cform-target_participants');

      colab.select2();
      tgt_participants.select2();

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
        let tgt_participants = tr.find('.tgt_participants').val();

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
          tgt_participants: JSON.parse(tgt_participants)
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