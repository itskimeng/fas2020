
<div class="box box-primary box-solid dropbox">
  <div class="box-header with-border">
    <h5 class="box-title"><i class="fa fa-table"></i> Purchase Request Table <i class="fa fa-cog" style="margin-left:580px;" id ="settings" ></i></h5>
    <div class="box-tools pull-right">

      <div class="btn-group">
        <!-- <a href='base_planner_emp_workspace.html.php?evp_id=<?php echo $event["id"]; ?>&username=<?php echo $_SESSION['username']; ?>&division=<?php echo $_GET['division']; ?>&emp_id=<?php echo $_SESSION['currentuser']; ?>' class="btn btn-block btn-primary"><i class="fa fa-anchor"></i> My Workspace</a>   -->
      </div>


    </div>
  </div>
  <div class="box-body box-emp" style="height: 800px; max-height: 800px; overflow-y: scroll;">

      <div class="col-sm-12">

        <table id="list_table" class="table table-striped table-bordered table-responsive table-hover dataTable no-footer" role="grid" aria-describedby="list_table_info">  
          <thead>
            <tr role="row">
            <th rowspan="2" style="text-align:center; vertical-align: middle; width:10%!important; color:white; background-color: #5c617a;" class="sorting_disabled" colspan="1">PR NO.</th>

              <th rowspan="2" style="text-align:center; vertical-align: middle; width:10%!important; color:white; background-color: #5c617a; border-left: none; border-top-left-radius: 4px; -webkit-border-top-left-radius: 4px; -moz-border-radius-topleft: 4px;" class="sorting_disabled" colspan="1">
                <label>Office</label>
                <select required="" class="col-sm-2 form-control select2 office " name="office" id="office">
                <?php foreach ($pmo as $key => $data):?>
                    <option <?php if($data['id'] == $office) { echo 'selected';}?> value=<?= $data['id'];?>  ><?= $data['office'];?></option>
                  <?php endforeach;?>
                </select>
              </th>
              <th rowspan="2" style="width:10%;text-align:center; vertical-align: middle; color:white; background-color: #5c617a;" class="sorting_disabled" colspan="1">
              <label>Type</label>

                <!-- <select required="" class="col-sm-2 form-control select2 type " style="width:100%;" name="type" id="type">
              <option value="ALL">ALL</option>
                      
                <option value="6">Reimbursement and Petty Cash</option>
                      <option value="1">Catering Services</option>
                      <option value="2">Meals, Venue and Accommodation</option>
                      <option value="3">Repair and Maintenance</option>
                      <option value="4">Supplies, Materials and Devices</option>
                      <option value="5">Other Services</option>
                </select> -->
            </th>
              <th rowspan="2" style="text-align:center; vertical-align: middle; color:white; background-color: #5c617a;width:5% !important;" class="sorting_disabled">Purpose</th>
              <th rowspan="2" style="text-align:center; vertical-align: middle; width:10%!important; color:white; background-color: #5c617a;" class="sorting_disabled" colspan="1">Status</th>
              <th colspan="2" style="text-align:center; vertical-align: middle; width:19%!important; color:white; background-color: #5c617a;" rowspan="1">Date Info</th>
              <th rowspan="2" style="max-width:50%;text-align:center; vertical-align: middle; color:white; background-color: #5c617a;border-right: none; border-top-right-radius: 4px; -webkit-border-top-right-radius: 4px; -moz-border-radius-topright: 4px;" class="sorting_disabled" colspan="1">Actions</th>
            </tr>
            <tr role="row">
              <th style="text-align: center; vertical-align: middle; color:white; background-color: #5c617a;" class="sorting_disabled" rowspan="1" colspan="1">PR Date</th>
              <th style="text-align: center; vertical-align: middle; color:white; background-color: #5c617a;" class="sorting_disabled" rowspan="1" colspan="1">Target Date</th>
            </tr>
          </thead>
          <tbody id="list_body">
          <?php foreach ($pr_details as $key => $data):?>
            <tr>
              <td><?= $data['pr_no'];?></td>
              <td><?= $data['division'];?></td>
              <td style="width:10% ;"><?= $data['type'];?></td>
              <td><?= $data['purpose'];?></td>
              <td><?= $data['status'];?></td>
              <td><?= $data['pr_date'];?></td>
              <td><?= $data['target_date'];?></td>
              <td style="width: 20%;">
             <?php
                if(in_array($data['pmo'], $division))
                {
                  echo '<button class="btn btn-success" style = "width:100%; margin-bottom:2px;"><a href="ViewPRv.php" style="color: #fff;">View</a></button>';
                }else{
                  echo '<button class="btn btn-success" style = "width:100%; margin-bottom:2px;"><a href="ViewPRv.php" style="color: #fff;">View</a></button>';

                }
              
             ?>
                <!-- <button class="btn btn-primary" style = "width: 100%; margin-bottom:2px;">Edit</button>
                <button class="btn btn-danger"  style = "width: 100%; margin-bottom:2px;">Return</button> -->
              </td>
            </tr>
          <?php endforeach;?>
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
		let row ='';
		$.each($data, function(key, item){
			row += '<tr>';
      row += '<td>'+item['pr_no']+'</td>';
      row += '<td>'+item['division']+'</td>';
      row += '<td>'+item['type']+'</td>';
      row += '<td>'+item['purpose']+'</td>';
      row += '<td>'+item['status']+'</td>';
      row += '<td>'+item['pr_date']+'</td>';
      row += '<td>'+item['target_date']+'</td>';
      row += '<td style="width: 20%;"> <button class="btn btn-success" style="width:100%;"><a href="ViewPRv.php?id='+item['id']+'" style="color: #fff;">View</a></button></td>';
	

      row += '</tr>';
		});

		return row;
	}

	$(document).ready(function(){
		let dt = $('#list_table').DataTable( {
	      // 'paging'      : true,  
	      'lengthChange': true,
	      'searching'   : true,
	      'ordering'    : false,
	      'info'        : true,
	      'autoWidth'   : false,
	    } );

	    $(document).on('change', '.office', function(){
	    	let office_val = $(this).val();	 
	    	let type_val = $('.type').val();	  

	    	let path = "GSS/route/filter_pr.php";
	    	let data = {office: office_val,type:type_val};
	    	$('#list_body').empty();
	    	$.get(path, data, function(data, status){
			    	$('#list_table').DataTable().clear().destroy();
			        let row = generateTable(JSON.parse(data));
			        $('#list_body').append(row);

			        $('#list_table').DataTable( {
				      // 'paging'      : true,  
				      'lengthChange': true,
				      'searching'   : true,
				      'ordering'    : false,
				      'info'        : true,
				      'autoWidth'   : false,
				    });
		        }
		     );
	    });
      $(document).on('change', '.type', function(){
	    	let type_val = $(this).val();	  
	    	let office_val = $('.office').val();	 

	    	let path = "PR/entity/filter_pr.php";
	    	let data = {type: type_val,office:office_val};
	    	$('#list_body').empty();
	    	$.get(path, data, function(data, status){
			    	$('#list_table').DataTable().clear().destroy();
			        let row = generateTable(JSON.parse(data));
			        $('#list_body').append(row);

			        $('#list_table').DataTable( {
				      // 'paging'      : true,  
				      'lengthChange': true,
				      'searching'   : true,
				      'ordering'    : false,
				      'info'        : true,
				      'autoWidth'   : false,
				    });
		        }
		     );
	    });
	});
</script>
