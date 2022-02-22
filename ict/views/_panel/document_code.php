<style>
    .img-header {
  width: 200px !important;
  height: 200px !important;
}
</style>
<div class="row">
        <div class="col-lg-9">
          <img src="images/logo.png" class="img-header" align="left">
        <h1 style="font-family:'Times New Roman', Times, serif;font-size:24px;" >Republic of the Philippines</h1>
        <h2 style="font-family:'Times New Roman', Times, serif;font-size:30px;font-weight:bold">Department of the Interior and Local Government</h2>
        <h1 style="font-family:'Times New Roman', Times, serif; font-weight:bolder;"><u>ICT TECHNICAL ASSISTANCE REQUEST FORM</u></h1><br><br>
        <h3 style="font-family:'Times New Roman', Times, serif;font-size:20px;">NOTE: FILL-UP THIS FORM AND PLEASE WRITE LEGIBLY. (* - REQUIRED)</h3>

        </div>
        
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
                <input  required="" style="text-align:center;color:red;font-weight:bold;" type="hidden" readonly="" placeholder="Control No." name="control_no" class="form-control"  value="<?= $getControlNo['control_no']; ?>">
                <center><span style="text-align:center;color:red;font-weight:bold;font-size:24px;">
                <?=  $getControlNo['control_no'];?>
             </span></center>
            </div> 
        </div>
    </div> 