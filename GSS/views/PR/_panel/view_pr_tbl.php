<div class="box box-primary box-solid dropbox">
  <div class="box-header with-border">
    <h5 class="box-title"><i class="fa fa-table"></i> Purchase Request Table </h5>
    <div class="box-tools pull-right">

    </div>
  </div>
  <div class="box-body box-emp">

    <div class="col-sm-12">
      <?= proc_text_input("hidden", '', 'cform-received-by', '', false, $_SESSION['currentuser']); ?>
      <?= proc_text_input("hidden", '', 'cform-pmo', '', false, $_GET['division']); ?>

      <table id="list_table" class="table table-striped table-bordered table-responsive table-hover dataTable no-footer" role="grid" aria-describedby="list_table_info">
        <thead>
          <tr role="row">
            <th rowspan="2" style="text-align:center; vertical-align: middle; width:10%!important; color:white; background-color: #5c617a;" class="sorting_disabled" colspan="1">PR NO.</th>

            <th rowspan="2" style="text-align:center; vertical-align: middle; width:10%!important; color:white; background-color: #5c617a; border-left: none; border-top-left-radius: 4px; -webkit-border-top-left-radius: 4px; -moz-border-radius-topleft: 4px;" class="sorting_disabled" colspan="1">
              <label>Office</label>
              <select required="" class="col-sm-2 form-control select2 office " name="office" id="office">
                <?php foreach ($pmo as $key => $data) : ?>
                  <option <?php if ($data['id'] == $office) {
                            echo 'selected';
                          } ?> value=<?= $data['id']; ?>><?= $data['office']; ?></option>
                <?php endforeach; ?>
              </select>
            </th>
            <th rowspan="2" style="width:10%;text-align:center; vertical-align: middle; color:white; background-color: #5c617a;" class="sorting_disabled" colspan="1">
              <label>Type</label>
            </th>
            <th rowspan="2" style="text-align:center; vertical-align: middle; color:white; background-color: #5c617a;width:5% !important;" class="sorting_disabled">Purpose</th>
            <th rowspan="2" style="text-align:center; vertical-align: middle; width:10%!important; color:white; background-color: #5c617a;" class="sorting_disabled" colspan="1">Price</th>
            <th colspan="2" style="text-align:center; vertical-align: middle; width:19%!important; color:white; background-color: #5c617a;" rowspan="1">Date Info</th>
            <th rowspan="2" style="text-align:center; vertical-align: middle; width:20%!important; color:white; background-color: #5c617a;" class="sorting_disabled" colspan="1">Status</th>


            <th rowspan="2" style="max-width:50%;text-align:center; vertical-align: middle; color:white; background-color: #5c617a;border-right: none; border-top-right-radius: 4px; -webkit-border-top-right-radius: 4px; -moz-border-radius-topright: 4px;" class="sorting_disabled" colspan="1">Actions</th>
          </tr>
          <tr role="row">
            <th style="text-align: center; vertical-align: middle; color:white; background-color: #5c617a;" class="sorting_disabled" rowspan="1" colspan="1">PR Date</th>
            <th style="text-align: center; vertical-align: middle; color:white; background-color: #5c617a;" class="sorting_disabled" rowspan="1" colspan="1">Target Date</th>
          </tr>

        </thead>
        <tbody id="list_body">
          <?php foreach ($pr_details as $key => $data) : ?>
            <?php
            $css = '';
            if ($data['urgent'] == 1) {
              $css .= 'style="background-color:#ef9a9a;color:#fff;"';
            } else {
              $css .= '';
            }
            ?>
            <tr>
              <td <?= $css; ?>><?= $data['pr_no']; ?></td>
              <td <?= $css; ?>><?= $data['division']; ?></td>
              <td <?= $css; ?> style="width:10% ;"><?= $data['type']; ?></td>
              <td <?= $css; ?>><?= $data['purpose']; ?></td>
              <td <?= $css; ?>><?= $data['total_abc']; ?></td>
              <td <?= $css; ?>><?= $data['pr_date']; ?></td>
              <td <?= $css; ?>><?= $data['target_date']; ?></td>
              <td <?= $css; ?>><?= $data['status']; ?></td>

              <td <?= $css; ?> style="width: 20%;">
                <?php
                 if (in_array($username, $admin)) {
                  echo proc_action_btn('View/Edit', '', '', 'btn btn-flat btn-success', '', "?division=" . $_GET['division'], "&id=" . $data['pr_no'], 'fa fa-eye', 'procurement_purchase_request_view.php');
                  echo proc_action_btn('Receive by GSS', '', '', 'btn btn-flat bg-purple', $data['pr_no'], '', '', 'fa fa-check-square', '#');
                } 
                else if ($_GET['division'] == $data['pmo_id'] || $_SESSION['username'] == $data['submitted_by']) {
                  if ($data['is_gss'] != NULL) {
                    echo proc_action_btn('Submit to GSS', 'disabled readonly', 'btn_submit_to_gss', 'btn btn-flat bg-purple', $data['pr_no'], '', '', 'fa fa-send', '#');
                  } else {
                    echo proc_action_btn('Submit to GSS', '', 'btn_submit_to_gss', 'btn btn-flat bg-purple', $data['pr_no'], '', '', 'fa fa-send', '#');
                  }
                  if ($data['is_budget'] != NULL) {
                    echo proc_action_btn('Submit to Budget', 'disabled readonly', '', 'btn btn-flat bg-blue', '', "&id=" . $data['pr_no'], "&username=" . $_SESSION['currentuser'], 'fa fa-send', $route . 'post_to_budget.php?division=' . $_GET['division'] . '&');
                  } else {
                    echo proc_action_btn('Submit to Budget', '', '', 'btn btn-flat bg-blue', '', "&id=" . $data['pr_no'], "&username=" . $_SESSION['currentuser'], 'fa fa-send', $route . 'post_to_budget.php?division=' . $_GET['division'] . '&');
                  }
                  echo proc_action_btn('View/Edit', '', '', 'btn btn-flat btn-success', '', "?division=" . $_GET['division'], "&id=" . $data['pr_no'], 'fa fa-eye', 'procurement_purchase_request_view.php');
                }else if ($_SESSION['username'] == $data['submitted_by']) {
                  echo proc_action_btn('View/Edit', '', '', 'btn btn-flat btn-success', '', "?division=" . $_GET['division'], "&id=" . $data['pr_no'], 'fa fa-eye', 'procurement_purchase_request_view.php');
                } else {
                }

                ?>

              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<!-- View Status History -->
<div class="modal fade" id="viewStatus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="height:500px;overflow:auto;">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>

      </div>
      <div class="modal-body">
      <div class="row">
        <div class="col-md-12" id="history">
          
          
        </div>
        <!-- /.col -->
      </div>
    </div>
      
    </div>
  </div>
</div>



<script type="text/javascript">
  function generateTable($data) {
    let row = '';
    let css = '';

    $.each($data, function(key, item) {
      if (item['urgent']) {
        css = 'style="background-color:#c2185b;color:#fff;"';
      } else {
        css = '';
      }
      row += '<tr>';
      row += '<td ' + css + '>' + item['pr_no'] + '</td>';
      row += '<td ' + css + '>' + item['division'] + '</td>';
      row += '<td ' + css + '>' + item['type'] + '</td>';
      row += '<td ' + css + '>' + item['purpose'] + '</td>';
      row += '<td ' + css + '>' + item['total_abc'] + '</td>';
      row += '<td ' + css + '>' + item['pr_date'] + '</td>';
      row += '<td ' + css + '>' + item['target_date'] + '</td>';
      row += '<td ' + css + '>' + item['status'] + '</td>';

      if (item['pmo_id'] == <?php echo $_GET['division'] ?>) {
        row += '<td ' + css + ' style="width: 20%;"><button class="btn btn-success" style = "width:100%; margin-bottom:2px;"><a href="procurement_purchase_request_view.php?id=' + item['pr_no'] + '" style="color: #fff;"><i class="fa fa-eye"></i> View</a></button><button data-value=' + item['pr_no'] + ' class="btn btn-primary" id="btn_received" style = "width:100%; margin-bottom:2px;"><i class="fa fa-get-pocket" aria-hidden="true"></i> Receive</button></td>';
      } else {
        row += '<td></td>';
      }


      row += '</tr>';
    });

    return row;
  }

  $(document).ready(function() {
    
    let dt = $('#list_table').DataTable({
      'lengthChange': true,
      'searching': true,
      'ordering': false,
      'info': true,
      'autoWidth': false,
    });

    $(document).on('change', '.office', function() {
      let office_val = $(this).val();
      let type_val = $('.type').val();

      let path = "GSS/route/filter_pr.php";
      let data = {
        office: office_val,
        type: type_val
      };
      $('#list_body').empty();
      $.get(path, data, function(data, status) {
        $('#list_table').DataTable().clear().destroy();
        let row = generateTable(JSON.parse(data));
        $('#list_body').append(row);

        $('#list_table').DataTable({
          // 'paging'      : true,  
          'lengthChange': true,
          'searching': true,
          'ordering': false,
          'info': true,
          'autoWidth': false,
        });
      });
    });
    $(document).on('change', '.type', function() {
      let type_val = $(this).val();
      let office_val = $('.office').val();

      let path = "PR/entity/filter_pr.php";
      let data = {
        type: type_val,
        office: office_val
      };
      $('#list_body').empty();
      $.get(path, data, function(data, status) {
        $('#list_table').DataTable().clear().destroy();
        let row = generateTable(JSON.parse(data));
        $('#list_body').append(row);

        $('#list_table').DataTable({
          // 'paging'      : true,  
          'lengthChange': true,
          'searching': true,
          'ordering': false,
          'info': true,
          'autoWidth': false,
        });
      });
    });
  });
  $(document).on('click', '#showModal',function(){
    let pr = $(this).val();
        let path = 'GSS/route/post_status_history.php';
        let data = {
          pr_no: pr
        };
      
        $.post(path, data, function (data, status) {
            $('#app_table').empty();
            let lists = JSON.parse(data);
            sample(lists);
            $('#viewStatus').modal();
            
        });
        function sample($data) {
        $.each($data, function (key, item) {
          console.log(item);
          let ul  = '<ul class="timeline">';
                    ul += '<li class="time-label">';
                    ul += '<span class="bg-red" id="action_date">'+item['action_date']+'</span>';
                    ul += '</li>';
                    ul += '<li>';
                    ul += '<i class="fa fa-clock-o bg-blue"></i>';
                    ul += '<div class="timeline-item">';
                    ul += '<h3 class="timeline-header"><a href="#">'+item['status']+'</a></h3>';
                    ul += '<div class="timeline-body">';
                    ul += item['username']+'<br>';
                    ul += item['action_date']+'';
                    ul += '</div>';
                    ul += '<div class="timeline-footer">';
                    ul += '</div>';
                    ul += '</div>';
                    ul += '</li>';
                    ul += '<li>';
                    ul += '<i class="fa fa-clock-o bg-gray"></i>';
                    ul += '</li>';
                    ul += '</ul>';
            $('#history').append(ul);
        });

        return $data;
    }
    $("#history").html("");

    })
</script>