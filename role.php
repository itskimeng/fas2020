 <?php 
$id = $_GET['id'];
$conn=mysqli_connect("localhost","fascalab_2020","w]zYV6X9{*BN","fascalab_2020");
$query = mysqli_query($conn,"SELECT UROLE,CONCAT(FIRST_M, ' ', MIDDLE_M, ' ', LAST_M) AS fullname FROM tblemployee WHERE EMP_N = $id");
$row = mysqli_fetch_array($query);
$role = $row['UROLE'];
$fullname = $row['fullname'];

if (isset($_POST['submit'])) {
$UROLE = $_POST['UROLE'];
$updateQ = mysqli_query($conn,"UPDATE tblemployee SET UROLE = '$UROLE' WHERE EMP_N = $id");
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
<div class="box box-success">
  <div class="box-header with-border">
   <h1 align="center" style="font-family: Cambria;">User Role</h1>
   <br>
   <br>
   <form method="POST">
    <legend><?php echo $fullname?></legend>
     <div class="col-md-10" >
       <div class="form-group">
        <label>Select Role </label>
        <?php if ($role == 1): ?>
          <select class="form-control select2" name="UROLE">
         <option value="1">Admin</option>
         <option value="NULL">User</option>
         <option value="3">BAC-GSS</option>
         <option value="2">Finance</option>
       </select>
        <?php endif ?>
         <?php if ($role == 2): ?>
          <select class="form-control select2" name="photo">
         <option value="2">Finance</option>
         <option value="1">Admin</option>
         <option value="NULL">User</option>
         <option value="3">BAC-GSS</option>
       </select>
        <?php endif ?>
        <?php if ($role == 3): ?>
          <select class="form-control select2" name="photo">
         <option value="3">BAC-GSS</option>
         <option value="1">Admin</option>
         <option value="NULL">User</option>
         <option value="2">Finance</option>
       </select>
        <?php endif ?>
        <?php if ($role == NULL): ?>
          <select class="form-control select2" name="photo">
         <option value="NULL">User</option>
         <option value="1">Admin</option>
         <option value="3">BAC-GSS</option>
         <option value="2">Finance</option>
       </select>
        <?php endif ?>

        <?php if ($role != NULL && $role != 1 && $role != 2 && $role != 3): ?>
          <select class="form-control select2" name="photo">
         <option disabled selected>Select Role</option>
         <option value="NULL">User</option>
         <option value="1">Admin</option>
         <option value="3">BAC-GSS</option>
         <option value="2">Finance</option>
       </select>
        <?php endif ?>
        <br>
        <br>
       <button class="btn btn-primary" type="submit" name="submit">Submit</button>
     </div>
   </div>
 </form>
</div>  
</div>  


