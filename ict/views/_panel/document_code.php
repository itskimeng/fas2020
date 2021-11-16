<div class="row">
        <div class="col-lg-9"></div>
        <div class="col-lg-3">
            <div class="box box-primary box-solid dropbox">
                <div class="box-header with-border" style="background-color: #585f62;padding:2px" style="background-color: #585f62;">
                    <h1 class="box-title">Document Code</h1>
                </div>
                <div class="box-header with-border" style="background-color: white;color:black;padding:2px" style="background-color: #585f62;">
                    <h1 class="box-title">FM-QP-DILG-ISTMS-RO-17-01</h1>
                </div>
                <div class="box-header with-border" style="background-color: #585f62;padding:2px" style="background-color: #585f62;">
                    <h1 class="box-title" style="text-align: center;">Rev No. Eff. Date Page</h1>
                </div>
                <div class="box-header with-border" style="background-color: white;color:black;padding:2px" style="background-color: #585f62;">
                    <h1 class="box-title">00 06.15.21 1 of 1</h1>
                </div>
            
            </div> 
        
            <div class="box box-primary box-solid dropbox">
                <div class="box-header with-border" style="background-color: #585f62;" style="background-color: #585f62;">
                    <h1 class="box-title">ICT Technical Assistance Reference Number</h1>
                </div>
                <input  required="" style="text-align:center;color:red;font-weight:bold;" type="hidden" readonly="" placeholder="Control No." name="control_no" class="form-control" id="control_no" value="<?= $getControlNo; ?>">
                <center><span style="text-align:center;color:red;font-weight:bold;font-size:24px;">
                <?php  if($_GET['id'] == '' || empty($_GET['id'])) { echo $getControlNo; }else{ echo $_GET['id']; } ?>
             </span></center>
            </div> 
        </div>
    </div> 