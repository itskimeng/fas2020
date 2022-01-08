<div class="box box-primary box-solid dropbox">
    <div class="box-header with-border">
    <div class="ribbon ribbon-top-right"><span>Required</span></div>

    <span class="fa-stack">
        <!-- The icon that will wrap the number -->
        <span class="fa fa-circle-o fa-stack-2x"></span>
        <!-- a strong element with the custom content, in this case a number -->
        <strong class="fa-stack-1x">
            1
        </strong>
    </span> <span style="font-size: larger;margin-top:-10px;">STEP</span>
      <div class="box-tools pull-right">

        <div class="btn-group">
             <!-- <a href='base_planner_emp_workspace.html.php?evp_id=<?php echo $event["id"];?>&username=<?php echo $_SESSION['username']; ?>&division=<?php echo $_GET['division']; ?>&emp_id=<?php echo $_SESSION['currentuser']; ?>' class="btn btn-block btn-primary"><i class="fa fa-anchor"></i> My Workspace</a>   -->
        </div>

      
      </div>
    </div>
    <div class="box-body box-emp">
    
    <div class="box-body box-emp">
        <div class="item panel panel-info">
            <div class="panel-heading">
                <p style="color:red;font-size:16px;"> <b> NOTE : </b> Please do not include this characters <b>( ' and " and & ) </b> the system will not accept this characters.Applicable to all fields. </p>
            </div>
        </div>
        <div class="col-lg-12">
                <h1>PR No. <span style="font-weight: bolder;"><?= $get_pr['pr_no']; ?> </span></h1>


                <input readonly autocomplete="off" value="<?= $get_pr['pr_no'];?>" class="form-control" name="pr_no" type="hidden" id="pr_no" class="demoInputBox" onBlur="checkAvailability()"><span id="user-availability-status"></span>
            <div class="form-group">
                <label>Office <label style="color: Red;">*</label></label>
                <select class="form-control select2" name="pmo">
                    <?php foreach ($pmo as $key => $pmo_data):?>
                    <option text="text"  value="<?= $pmo_data['office'];?>"><?= $pmo_data['office'];?></option>
                    <?php endforeach; ?>
                </select>
                <!-- Change by: Mark Kim A. Sacluti
                        Date: Sept 10, 2020
                        Requestes by: Shaira Glee -->
                <!-- <input type="text" class="form-control" style="width: 100%;" name="pmo" id="pmo" readonly value="FAD" > -->
            </div>
            <div class="form-group">
                <label>Type <label style="color: Red;">*</label></label>
                <select required class="form-control " style="width: 100%;" name="type" id="type">
                    <option value="1">Catering Services</option>
                    <option value="2">Meals, Venue and Accommodation</option>
                    <option value="5">Other Services</option>
                    <option value="3">Repair and Maintenance</option>
                    <option value="6">Reimbursement and Petty Cash</option>
                    <option value="4">Supplies, Materials and Devices</option>
                </select>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="form-group">
                <label>PR Date <label style="color: red;">*</label></label>
                <div class="input-group date">
                    <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </div>
                    <input required type="text" class="form-control pull-right" name="pr_date" id="datepicker1" value="01/01/2022">
                </div>
            </div>
            <div class="form-group">
                <label>Target Date <label style="color: Red;">*</label></label>
                <div class="input-group date">
                    <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" class="form-control pull-right" name="target_date" id="datepicker2" value="" required placeholder="mm/dd/yyyy">
                </div>
            </div>
            <div class="form-group">
                <label>Purpose <label style="color: Red;">*</label></label>
                <textarea name="purpose" style="margin: 0px; width: 480px; height: 163px; resize:none;" class="form-control"></textarea>
            </div>
        </div>
    </div>
    </div>
</div>      


<style>
    .form-control {
        display: block;
        width: 100%;
        height: 40px;
        font-size: large;
        font-weight: 400;
        line-height: 1.5;
        color: #495057;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid #ced4da;
        border-radius: 0.25rem;
        box-shadow: inset 0 0 0 transparent;
        transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
        transition: none;
    }
    .dataTables_filter {
text-align: left !important;
}
</style>