<div class="box box-primary box-solid dropbox">
  <div class="box-header with-border">
    <h5 class="box-title"><i class="fa fa-table"></i> Purchase Request Table </h5>
    <div class="box-tools pull-right">

    </div>
  </div>
  <div class="box-body box-emp">

    <div class="col-sm-12">
    <?= proc_text_input("hidden", '','cform-received-by','',false,$_SESSION['currentuser']) ;?>
    <?= proc_text_input("hidden", '','cform-pmo','',false,$_GET['division']) ;?>

      <table id="list_table" class="table table-striped table-bordered table-responsive table-hover dataTable no-footer" role="grid" aria-describedby="list_table_info">
        <thead>
          <tr role="row">
            <th rowspan="2" style="text-align:center; vertical-align: middle; width:10%!important; color:white; background-color: #5c617a;" class="sorting_disabled" colspan="1">PR NO.</th>

            <th rowspan="2" style="text-align:center; vertical-align: middle; width:10%!important; color:white; background-color: #5c617a; border-left: none; border-top-left-radius: 4px; -webkit-border-top-left-radius: 4px; -moz-border-radius-topleft: 4px;" class="sorting_disabled" colspan="1">
              <label>Office</label>
              <select required="" class="col-sm-2 form-control select2 office " name="office" id="office">
                <?php foreach ($pmo as $key => $data) : ?>
                  <option <?php if ($data['id'] == $office) { echo 'selected'; } ?> value=<?= $data['id']; ?>><?= $data['office']; ?></option>
                <?php endforeach; ?>
              </select>
            </th>
            <th rowspan="2" style="width:10%;text-align:center; vertical-align: middle; color:white; background-color: #5c617a;" class="sorting_disabled" colspan="1">
              <label>Type</label>
            </th>
            <th rowspan="2" style="text-align:center; vertical-align: middle; color:white; background-color: #5c617a;width:5% !important;" class="sorting_disabled">Purpose</th>
            <th rowspan="2" style="text-align:center; vertical-align: middle; width:10%!important; color:white; background-color: #5c617a;" class="sorting_disabled" colspan="1">Status</th>
            <th rowspan="2" style="text-align:center; vertical-align: middle; width:10%!important; color:white; background-color: #5c617a;" class="sorting_disabled" colspan="1">Price</th>
            <th colspan="2" style="text-align:center; vertical-align: middle; width:19%!important; color:white; background-color: #5c617a;" rowspan="1">Date Info</th>
            <th rowspan="2" style="text-align:center; vertical-align: middle; width:10%!important; color:white; background-color: #5c617a;" class="sorting_disabled" colspan="1">Received By</th>

            <th rowspan="2" style="max-width:50%;text-align:center; vertical-align: middle; color:white; background-color: #5c617a;border-right: none; border-top-right-radius: 4px; -webkit-border-top-right-radius: 4px; -moz-border-radius-topright: 4px;" class="sorting_disabled" colspan="1">Actions</th>
          </tr>
          <tr role="row">
            <th style="text-align: center; vertical-align: middle; color:white; background-color: #5c617a;" class="sorting_disabled" rowspan="1" colspan="1">PR Date</th>
            <th style="text-align: center; vertical-align: middle; color:white; background-color: #5c617a;" class="sorting_disabled" rowspan="1" colspan="1">Target Date</th>
          </tr>

        </thead>
        <tbody id="list_body">
          <?php foreach ($pr_details as $key => $data) : ?>
            <tr>
              <td><?= $data['pr_no']; ?></td>
              <td><?= $data['division']; ?></td>
              <td style="width:10% ;"><?= $data['type']; ?></td>
              <td><?= $data['purpose']; ?></td>
              <td><?= $data['status']; ?></td>
              <td><?= $data['total_abc']; ?></td>
              <td><?= $data['pr_date']; ?></td>
              <td><?= $data['target_date']; ?></td>
              <td><?= $data['received_by']; ?></td>
              <td style="width: 20%;">
                <?php               
                 if($_GET['division'] == $data['pmo_id']) {
                  echo '<button class="btn btn-success" style = "width:100%; margin-bottom:2px;"><a href="procurement_purchase_request_view.php?division='.$_GET['division'].'&id='.$data['pr_no'].'" style="color: #fff;"><i class="fa fa-eye"></i> View</a></button>';
                }
                 else if ($_GET['division'] == $data['pmo_id'] || in_array($username, $admin)) {
                  echo '<button class="btn btn-success" style = "width:100%; margin-bottom:2px;"><a href="procurement_purchase_request_view.php?division='.$_GET['division'].'&id='.$data['pr_no'].'" style="color: #fff;"><i class="fa fa-eye"></i> View</a></button>';
                  echo '<button class="btn btn-primary" id="btn_received" style = "width:100%; margin-bottom:2px;" value="'.$data['pr_no'].'"><i class="fa fa-get-pocket" aria-hidden="true"></i> Receive</button>';
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


<style type="text/css">
  #list_table {
    box-shadow: 0 1px 2px rgb(0 0 0 / 15%);
  }
</style>

<script type="text/javascript">
  function generateTable($data) {
    let row = '';
    $.each($data, function(key, item) {
      row += '<tr>';
      row += '<td>' + item['pr_no'] + '</td>';
      row += '<td>' + item['division'] + '</td>';
      row += '<td>' + item['type'] + '</td>';
      row += '<td>' + item['purpose'] + '</td>';
      row += '<td>' + item['status'] + '</td>';
      row += '<td>' + item['total_abc'] + '</td>';
      row += '<td>' + item['pr_date'] + '</td>';
      row += '<td>' + item['target_date'] + '</td>';
      row += '<td>' + item['target_date'] + '</td>';
      if(item['pmo_id'] == <?php echo $_GET['division']?>){
        row += '<td style="width: 20%;"><button class="btn btn-success" style = "width:100%; margin-bottom:2px;"><a href="procurement_purchase_request_view.php?id='+item['pr_no']+'" style="color: #fff;"><i class="fa fa-eye"></i> View</a></button><button data-value='+item['pr_no']+' class="btn btn-primary" id="btn_received" style = "width:100%; margin-bottom:2px;"><i class="fa fa-get-pocket" aria-hidden="true"></i> Receive</button></td>';
      }else{
        row += '<td></td>';
      }


      row += '</tr>';
    });

    return row;
  }

  $(document).ready(function() {
    let dt = $('#list_table').DataTable({
      // 'paging'      : true,  
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
</script>