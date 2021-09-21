<?php

function grabIpInfo($ip)
{

  $curl = curl_init();

  curl_setopt($curl, CURLOPT_URL, "https://api.ipgeolocationapi.com/geolocate/" . $ip);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);

  $returnData = curl_exec($curl);

  curl_close($curl);

  return $returnData;

}


$ipInfo = grabIpInfo($_SERVER["REMOTE_ADDR"]);
$ipJsonInfo = json_decode($ipInfo);

echo $ipJsonInfo->name;

?>

 <?php 
 $id = $_GET['id'];
 $conn=mysqli_connect("localhost","fascalab_2020","w]zYV6X9{*BN","fascalab_2020");
 $query = mysqli_query($conn,"SELECT ACCESSTYPE,DEPT_ID,TIN_N,ORD,APPROVEDBY,CONCAT(FIRST_M, ' ', MIDDLE_M, ' ', LAST_M) AS fullname FROM tblemployeeinfo WHERE EMP_N = $id");
 $row = mysqli_fetch_array($query);
 $role = $row['APPROVEDBY'];
 $ACCESSTYPE = $row['ACCESSTYPE'];
 $TIN_N = $row['TIN_N'];
 $ORD = $row['ORD'];
 $fullname = $row['fullname'];
 $DEPT_ID = $row['DEPT_ID'];

 if (isset($_POST['submit'])) {
  $UROLE = $_POST['UROLE'];
  $HR = $_POST['HR'];
  $TIN_N = $_POST['TIN_N'];
  $ORD = $_POST['ORD'];
  $DEPT_ID = $_POST['DEPT_ID'];
  $updateQ = mysqli_query($conn,"UPDATE tblemployeeinfo SET APPROVEDBY = '$UROLE', ACCESSTYPE = '$HR',TIN_N = '$TIN_N',ORD = '$ORD',DEPT_ID = '$DEPT_ID' WHERE EMP_N = $id");
  if ($updateQ) {
    echo ("<SCRIPT LANGUAGE='JavaScript'>
      window.alert('Successfuly Assigned!')
      window.location.href='Accounts.php';
      </SCRIPT>");
  }else{
    echo ("<SCRIPT LANGUAGE='JavaScript'>
      window.alert('Error Occured!');
      </SCRIPT>");

  }
}

?>
<style>
  .container input {
    position: absolute;
    opacity: 0;
    cursor: pointer;
    height: 0;
    width: 0;
  }
  .regular-checkbox {
    top: 0;
    left: 0;
    height: 25px;
    width: 25px;
    background-color: #eee;
  }
</style>
<!-- izitoast -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css"/>

<div class="box box-success">
  <div class="box-header with-border">
   <!-- <h1 align="center" style="font-family: Cambria;">User Role</h1> -->
   <!-- <br> -->
   <br>
 <!--   <form method="POST">
    <legend><?php echo $fullname?></legend>
    <div class="col-md-10" >

      <div class="form-group">
        <label>Bac Staff </label>
        <select class="form-control select2" name="DEPT_ID">
          <?php if ($DEPT_ID == 1): ?>
           <option value="1">Yes</option>
           <option value="NULL">No</option>
           <?php else: ?>
             <option value="NULL">No</option>
             <option value="1">Yes</option>
           <?php endif ?>

         </select>
       </div>
       <div class="form-group">
        <label>Human Resource </label>
        <select class="form-control select2" name="HR">
          <?php if ($ACCESSTYPE == 'user'): ?>
           <option value="user">User</option>
           <option value="admin">Admin</option>
           <?php else: ?>
             <option value="admin">Admin</option>
             <option value="user">User</option>
           <?php endif ?>

         </select>
       </div>
       <div class="form-group">
        <label>DTR Printing </label>
        <select class="form-control select2" name="TIN_N">
          <?php if ($TIN_N == '0' || $TIN_N == NULL): ?>
           <option value="0">No</option>
           <option value="1">Yes</option>
           <?php else: ?>
             <option value="1">Yes</option>
             <option value="0">No</option>
           <?php endif ?>

         </select>
       </div>

       <div class="form-group">
        <label>Asset Management </label>
        <select class="form-control select2" name="ORD">
          <?php if ($ORD == NULL || $ORD == '0'): ?>
           <option value="0">No</option>
           <option value="1">Yes</option>
           <?php else: ?>
             <option value="1">Yes</option>
             <option value="0">No</option>
           <?php endif ?>

         </select>
       </div>

       <br>
       <br>
       <button class="btn btn-primary" type="submit" name="submit">Submit</button>
     </div>
   </div>
 </form> -->


<legend><?php echo $fullname?></legend>
<div class="panel panel-success">
  <div class="panel-heading">
    <h2 class="panel-title" style="font-size: 30px;">Active Roles</h2>
  </div>
  <div class="panel-body">
    
    <?php 
    
    $selectExistingModules = ' SELECT `module_id` FROM `tbl_module_access` WHERE `user_id` = '.$id.' ';
    $execExistingModules = $conn->query($selectExistingModules);
    $resultModules = $execExistingModules->fetch_assoc();
    $existingModules = $resultModules['module_id'];
    $arrayModules = explode(',', $existingModules);
    

    $sql = ' SELECT `id`, `level`, `module_name`, `parent_id`, `status`, `date_created` FROM `tbl_modules` ORDER BY `id` ASC ';
    $exec = $conn->query($sql);
    while ($row = $exec->fetch_assoc())
    {
    ?>
   
      <?php 
      if ($row['level'] == 0) 
      { 
      ?>
        <div class="row" style="font-size: 20px; border-top: 2px solid gray; height: 39px !important;">
          <!-- <div class="col-md-1"></div> -->
          <div class="col-md-6"><b><?php echo $row['module_name']; ?></b></div>
          <div class="col-md-6">
            <center>
              <!-- <input type="checkbox" class="regular-checkbox" checked="" onchange="disableMenu(this,<?php echo $row['id']; ?>)"> -->
              <input type="checkbox" class="regular-checkbox" <?php  if (in_array( $row['id'], $arrayModules)) { echo "checked=''"; } ?> onchange="getMenuId(this,<?php echo $row['id']; ?>)">
            </center>
          </div>
        </div>


      <?php } else if($row['level'] == 1) { ?>
        <div class="menuClass<?php echo $row['parent_id']; ?>">
          <div class="row" style="font-size: 20px; border-top: 0.5px solid lightgray;">
            <div class="col-md-1"></div>
            <div class="col-md-6">* <?php echo $row['module_name']; ?></div>
            <div class="col-md-4">
              <center>
                <!-- <input type="checkbox" class="regular-checkbox" checked="" onchange="disableMenu1(this,<?php echo $row['id']; ?>)"> -->
                <input type="checkbox" class="regular-checkbox" <?php  if (in_array( $row['id'], $arrayModules)) { echo "checked=''"; } ?> onchange="getMenuId(this,<?php echo $row['id']; ?>)">
              </center>
            </div>
            <div class="col-md-1"></div>
          </div>
        </div>

      <?php } else { ?>
        <div class="menuClass<?php echo $row['parent_id']; ?>">
          <div class="row" style="font-size: 20px; border-top: 0.5px solid gray;">
            <div class="col-md-2"></div>
            <div class="col-md-5"><?php echo $row['module_name']; ?></div>
            <div class="col-md-4">
              <center>
                <input type="checkbox" class="regular-checkbox" <?php  if (in_array( $row['id'], $arrayModules)) { echo "checked=''"; } ?> onchange="getMenuId(this,<?php echo $row['id']; ?>)">
              </center>
            </div>
            <div class="col-md-1"></div>
          </div>
        </div>


    <?php } } ?>


    
  </div>
</div>
  <center><button class="btn btn-primary btn-lg mb-2" id="btnUpdateMenu">Update <i class="fa fa-sync-alt"></i></button></center>


</div>  
</div>  

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- izitoast -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js"></script>

<script>

  //-----------------------------------------FOR CHECKBOX VALIDATION---------------------------------------
    // function disableMenu(cb,menuId)
    // {
    //   let menuUpdate = '.menuClass'+menuId;

    //   if (cb.checked === true)
    //   {
    //     $(menuUpdate+" :input").prop('disabled', false);
    //   }
    //   else
    //   {
    //     $(menuUpdate+" :input").prop('disabled', true);
    //   }
      
    // }




    // function disableMenu1(cb,menuId)
    // {
    //   let menuUpdate = '.menuClass'+menuId;

    //   if (cb.checked === true)
    //   {
    //     $(menuUpdate+" :input").prop('disabled', false);
    //   }
    //   else
    //   {
    //     $(menuUpdate+" :input").prop('disabled', true);
    //   }
      
    // }
  //-----------------------------------------FOR CHECKBOX VALIDATION---------------------------------------


  var menuIdHolder = '<?php echo implode(",",$arrayModules); ?>';
  
  menuIdHolder = menuIdHolder + ',';

  function getMenuId(cb,menuId)
  {

    if (cb.checked === true)
    {
      menuIdHolder = menuIdHolder + menuId + ',';
    }
    else
    {
      menuIdHolder = menuIdHolder.replace(menuId+',','');
    }
    
  }

  $('#btnUpdateMenu').click(function(){
    
    let userId = <?php echo $id; ?>;
    let username = '<?php echo $_SESSION['username']; ?>';
    
    //ajax start
    $.ajax({  
      url:"@Functions/userManagement.php?userId="+userId+"&username="+username+"&menuIdHolder="+menuIdHolder, 
      method:"POST",  
      contentType:false,
      cache:false,
      processData:false,

      beforeSend:function() {
      }, 

      success:function(data){  
        
        // alert(data); 
        iziToast.show({
          title: "<?php echo $fullname; ?>",
          message: 'roles have been updated',
          pauseOnHover: true,
          position: 'topRight', // bottomRight, bottomLeft, topRight, topLeft, topCenter, bottomCenter, center
          theme: 'light', // dark
          color: 'green' // blue, red, green, yellow
        });

      }
            
    });  
    //ajax end 

  });



</script>

