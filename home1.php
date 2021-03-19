<?php 
include 'health_monitoring_functions.php';
// include 'TEST_01.php';

if(!isset($_SESSION['username']) || !isset($_SESSION['complete_name'])){
  header('location:logout.php');
}else{
  error_reporting(0);
ini_set('display_errors', 0);
$username = $_SESSION['username'];
$division = $_GET['division'];
$DEPT_ID = $_SESSION['DEPT_ID'];
$OFFICE_STATION = $_SESSION['OFFICE_STATION'];

}
?>

<?php include 'fives_monitoring_checker.php'; ?>

<!DOCTYPE html>
<html>
<title>FAS | Heath Monitoring</title>
<head>
<link rel="stylesheet" href="_includes/sweetalert.css">
  <link href="_includes/sweetalert2.min.css" rel="stylesheet"/>

 



  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="shortcut icon" type="image/png" href="dilg.png">

    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
        folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="bower_components/morris.js/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
    
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <script src="_includes/sweetalert.min.js" type="text/javascript"></script>
<link rel="stylesheet" href="_includes/sweetalert.css">
    
 
<style>
/* 
Max width before this PARTICULAR table gets nasty
This query will take effect for any screen smaller than 760px
and also iPads specifically.
*/
@media 
only screen and (max-width: 760px),
(min-device-width: 768px) and (max-device-width: 1024px)  {

	/* Force table to not be like tables anymore */
	#table_name { 
		display: block; 
	}
  #thead_name{ 
		display: block; 
	}
  #tbody_name { 
		display: block; 
	}
  #th_name{ 
		display: block; 
	}
  #td_name{ 
		display: block; 
	}
	
	/* Hide table headers (but not display: none;, for accessibility) */
	#thead_name tr { 
		position: absolute;
		top: -9999px;
		left: -9999px;
	}
	
	tr { border: 1px solid #ccc; }
	

	

	
	/*
	Label the data
	*/

}
  </style>
</head>
<div class="modal fade" id="welcome-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
  <div class="modal-dialog modal-lg" role="document" >
    <div class="modal-content">
      <div class="modal-header" style = "background-color:#B0BEC5;">
        <h5 class="modal-title" id="exampleModalLabel" style = "font-weight:bold;text-align:center;font-size:30px;">HEALTH DECLARATION FORM</h5>
        To change your information (Employee No, Name, Mobile Number, Email Address, Current Residential Address, Sex, Birth Date and Office), please update your PROFILE.
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method = "POST" action = "health_monitoring_functions.php?action=add">
      <div class="modal-body"  style = "max-height: calc(100vh - 210px);
    overflow-y: auto;">
      <div>

      <table border =1 style = "width:100%;" id = "table_name" class="table table-bordered table-hover">
        <tbody id  = "tbody_name">
        <tr>
        <td id  = "td_name" style = "background-color:#B0BEC5;">Employee No.:</td>
        <td id  = "td_name">
        <input style = "border: none;" type ="text" class = "form-control" value = "<?php getEmpNo();?>"   readonly/> 
        </td>
        <td id  = "td_name" style = "background-color:#B0BEC5;">Date:</td>
        <td id  = "td_name"><input  type = "text" class = "form-control datepicker2" id = "datepicker2" value = "<?php echo date('F d, Y');?>" disabled/></td>
        </tr>
          <tr>
            <td id  = "td_name" style = "background-color:#B0BEC5;">Name:</td>
            <td id  = "td_name"> 
            <input style = "border: none;" type ="text" class = "form-control" value = "<?php getLast();?>"  name = "lastname" readonly/> 
              
            </td>
            <td id  = "td_name"> 
              <input style = "border: none;" type ="text" class = "form-control" value = "<?php getFirst();?>"  name = "firstname" readonly/> 
            </td>
            <td id  = "td_name"> 
              <input style = "border: none;" type ="text" class = "form-control" value = "<?php getMiddle();?>"  name = "middlename" readonly/> 
            </td>
          </tr>
          <tr>
            <td id  = "td_name" style = "background-color:#B0BEC5;">Mobile Number:</td>
            <td id  = "td_name"> <input style = "border: none;" type ="text" class = "form-control" value = "<?php getContact();?>"  name = "contact_number" readonly/> </td>
            <td id  = "td_name" style = "background-color:#B0BEC5;"> Body Temp. </td> 
            <!-- id = "temp" oninput="temperatureConverter(this.value)" onchange="temperatureConverter(this.value) -->
            <td id  = "td_name"> <input type ="text"  class = "form-control" required name = "body_temp" /> 
            <!-- pattern="^\d*(\.\d{0,2})?$" min = 0 maxlength = 5 -->

            </td>
          </tr>
          <tr>
            <td id  = "td_name" style = "background-color:#B0BEC5;">Email Address:</td>
            <td id  = "td_name"> <input type ="text" style = " border: none;" class = "form-control" value = "<?php getEmail();?>"  name = "email" readonly/> </td>
            <td id  = "td_name" style = "background-color:#B0BEC5;"> Nationality: </td>
            <td id  = "td_name"> <input type ="text" style = " border: none;" class = "form-control" value = "Filipino" name = "nationality" readonly/> </td>
          </tr>
          <tr>
            <td id  = "td_name" style = "background-color:#B0BEC5;" rowspan = 2>Current Residential Address:</td>
            <td id  = "td_name" rowspan = 2><textarea   cols = 25 rows=3  style = "resize:none;background-color:#ECEFF1;border:none;" name = "curraddress" readonly><?php getAddress();?></textarea></td>
            <td id  = "td_name" style = "background-color:#B0BEC5;" rowspan = 2>Sex:<br><br>Age</td>
            <td id  = "td_name"> <input type ="text" style = " border: none;" class = "form-control" name = "gender" id = "gender" value = "<?php getGender(); ?>" readonly /> </td>
          </tr>
          <tr>
          <td id  = "td_name"><input type ="text" style = " border: none;" class = "form-control" name = "age" VALUE = "<?php calculateAge();?>" name = "age" readonly/> </td>
          </tr>
          <tr>
            <td id  = "td_name" style = "background-color:#B0BEC5;">Office/Unit:</td>
            <td id  = "td_name"> <input type ="text" style = " border: none;" class = "form-control" value = "<?php getOffice()?>" name= "office" readonly/> </td>
            <td id  = "td_name" style = "background-color:#B0BEC5;">Work Arrangement:</td>
            <td id  = "td_name"> 
                <select required class="form-control" style="width: 100%;" name="work_arrangement" id="sched" >
                    <option value="" selected></option>
                    <option value="SWF" >Skeletal Work Force</option>
                    <option value="AWA" >Alternate Work Arrangement</option>
                </select>
                <!-- <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right" id="reservation" name = "sched" required>
                </div> -->
            </td>

          </tr>
         
          <tr>
            <td id  = "td_name" style = "background-color:#B0BEC5;">Did you have any of the following in the last 14 days: fever, cough, colds, sore throat, diarrhea or difficulty in breathing?</td>
            <td id  = "td_name">
            <div class="form-check">
              <input type="checkbox" class="form-check-input checkbox1" id="cb1" name = "ans1" value = "YES" required>
              <label class="form-check-label" for="exampleCheck1">Yes</label>
            </div>
            <div class="form-check">
              <input type="checkbox" class="form-check-input checkbox1" id="cb2"  name = "ans1" value = "NO" >
              <label class="form-check-label" for="exampleCheck1">No</label>
            </div>
            </td>
            <td id  = "td_name" colspan = 2>Please provide details:<center><textarea  required cols = 56 rows=5  style = "resize:none;" id = "txt1" name = "ans1_details"></textarea></center></td>
          </tr>
          <tr>
            <td id  = "td_name" style = "background-color:#B0BEC5;">Have you worked, visited or travelled to any foreign countries in the past 14 days?</td>
            <td id  = "td_name">
            <div class="form-check">
              <input type="checkbox" class="form-check-input checkbox2" id="cb3" name = "ans2" value = "YES" required>
              <label class="form-check-label" for="exampleCheck1">Yes</label>
            </div>
            <div class="form-check">
              <input type="checkbox" class="form-check-input checkbox2" id="cb4" name = "ans2" value = "NO" >
              <label class="form-check-label" for="exampleCheck1">No</label>
            </div>
            </td>
            <td id  = "td_name" colspan = 2>Please provide specific details on the name of places and date of visit: (i.e. USA, Singapore, Italy, etc.)<center>
            <textarea required name = "ans2_details" cols = 56 rows=6 style = "resize:none;" id = "txt2"></textarea></center></td>
          </tr>
          <tr>
            <td id  = "td_name" style = "background-color:#B0BEC5;">Have you worked, visited or travelled to other places in the Philippines in the past 7 days?</td>
            <td id  = "td_name">
            <div class="form-check">
              <input type="checkbox" class="form-check-input checkbox3" id="cb5" name = "ans3" value = "YES" required> 
              <label class="form-check-label" for="exampleCheck1">Yes</label>
            </div>
            <div class="form-check">
              <input type="checkbox" class="form-check-input checkbox3" id="cb6" name = "ans3" value = "NO" >
              <label class="form-check-label" for="exampleCheck1">No</label>
            </div>
            </td>
            <td id  = "td_name" colspan = 2>Please provide specific details on the name of places and date of visit: (i.e. SM/Walter Mart Calamba, Bank, Fast Food Chain)<center>
            <textarea required name = "ans3_details" cols = 56 rows=6 style = "resize:none;" id = "txt3"></textarea></center></td>
          </tr>
          <tr>
          <td id  = "td_name" style = "background-color:#B0BEC5;">Have you been in close contact with farm animals or exposed to wild animals in the past 14 days?</td>
            <td id  = "td_name">
            <div class="form-check">
              <input type="checkbox" class="form-check-input checkbox4" id="cb7" name = "ans4" value = "YES" required>
              <label class="form-check-label" for="exampleCheck1 checkbox4">Yes</label>
            </div>
            <div class="form-check">
              <input type="checkbox" class="form-check-input checkbox4" id="cb8" name = "ans4" value = "NO" >
              <label class="form-check-label" for="exampleCheck1 checkbox4">No</label>
            </div>
            </td>
            <td id  = "td_name" colspan = 2>Please provide details:<center><textarea required name = "ans4_details" cols = 56 rows=5  style = "resize:none;" id = "txt4"></textarea></center></td>
          </tr>
          <tr>
          <td id  = "td_name" style = "background-color:#B0BEC5;">Have you been exposed to a person with COVID-19 or person under investigation for COVID-19?</td>
            <td id  = "td_name">
            <div class="form-check">
              <input type="checkbox" class="form-check-input checkbox5" id="cb9" name = "ans5" value = "YES" required>
              <label class="form-check-label" for="exampleCheck1">Yes</label>
            </div>
            <div class="form-check">
              <input type="checkbox" class="form-check-input checkbox5" id="cb10" name = "ans5" value = "NO" >
              <label class="form-check-label" for="exampleCheck1">No</label>
            </div>
            </td>
            <td id  = "td_name" colspan = 2>Please provide details:<center><textarea required name = "ans5_details" cols = 56 rows=5  style = "resize:none;" id = "txt5"></textarea></center></td>
          </tr>
          <tr>
          <td id  = "td_name" colspan = 4><b>FOR WOMEN:</b><br> When was your last menstruation period? 
          <input style = "width:80%;"type = "text" class = "form-control datepicker1 period" id = "datepicker1" name = "lastperiod" autocomplete = "off"/></td>
          </tr>
          <tr>
          <td id  = "td_name" style = "text-align:justify;" colspan = 4>Declaration:<br><br>
            The information I have given herein is true, correct and complete, I understand that failure to answer any question or any falsified response may have serious consequences. (Article 171 and 172 of the revised Penal Code of the Philippines).
            <br><br><span class = "pull-right" STYLE = "margin-left:50px;"> 
                <br><u STYLE  = "font-weight:bold;"><?php echo date('F d, Y');?></u><br>
                <input type = "hidden" value="<?php echo date('F d, Y');?>" name = "date_today" />
                <center>DATE</center>
            </span>                                            
            <span class = "pull-right" > <br><u STYLE  = "font-weight:bold;"><?php getSignature();?></u><br>NAME AND SIGNATURE </span>                                            
          </td>
          </tr>

        </tbody>
      </table>
      </div>
      </div >
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- ============================== Health Monitoring ======================= -->

        





<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script>
  $(document).ready(function() {
    if($('#gender').val() == 'Male')
    {
      $(".period").prop('disabled', true);
      $(".period").val('');

    }else if($('#gender').val() == 'Female'){
      $(".period").prop('disabled', false);
      $(".period").prop('required', true);
 
    }else{
      $(".period").prop('disabled', true);
      $(".period").val('');
    }
             // Setup - add a text input to each footer cell
    // $('#example thead tr').clone(true).appendTo( '#example thead' );
    // $('#example thead tr:eq(1) th').each( function (i) {
    //     var title = $(this).text();
    //     $(this).html( '<input type="text" placeholder="'+title+'" />' );
 
    //     $( 'input', this ).on( 'keyup change', function () {
    //         if ( table.column(i).search() !== this.value ) {
    //             table
    //                 .column(i)
    //                 .search( this.value )
    //                 .draw();
    //         }
    //     } );
    // } );
        
            var action = '';
            var table = $('#example').DataTable( {
      
              'scrollX'     : true,
              'paging'      : true,
              'lengthChange': true,
              'searching'   : true,
              'ordering'    : true,
              'info'        : true,
              'autoWidth'   : true,   aLengthMenu: [ [10, 10, 20, -1], [10, 10, 20, "All"] ],
              "bPaginate": false,
              "bLengthChange": false,
              "bFilter": true,
              "bInfo": false,
              "bAutoWidth": false,
                "processing": true,
                "serverSide": false,
                "ajax": "DATATABLE/health_monitoring.php"
                // "columnDefs": [ {
                //     "targets":10,
                //     "render": function (data, type, row, meta ) {  
                //     action = "<button class = 'btn btn-md btn-success' id = 'view'><i class = 'fa fa-eye'></i>View</button>&nbsp;<button class = 'btn btn-md btn-primary'><i class = 'fa fa-edit'></i>Edit</button>&nbsp;<button class = 'btn btn-md btn-danger'><i class = 'fa fa-trash'></i> Delete</button>";
                //     return action;
                //     }
                // }]
              

            } );

            
            $('#example tbody').on( 'click', '#view', function () {
              var data = table.row( $(this).parents('tr') ).data();
              window.location="ViewTravelClaim.php?&ro="+data[2];
            } );
        });


$(document).ready(function() 
{
  $.ajax({
  type: "POST",
  url: "health_monitoring_ajax.php",
  data:{
    username:'<?php echo $username;?>'
  },
  success: function(data) {
 if(data == 1)
 {
  $('#welcome-modal').modal('hide');
  $("#healthDec").html('<i class="fa fa-check" style="padding:2%;"></i> Thank you for accomplishing the <br><b>Online Health Declaration Form</b>');
  $(".btndisable").prop('disabled',true);
 }else{
  $('#welcome-modal').modal({
  backdrop: 'static',
  keyboard: false
  });
 }
    }
});


  // let is_show = '<?php //echo $show_confirmationmsg; ?>';

  // if (is_show) {
  //  $("#fivesForm").html('<i class="fa fa-check" style="padding:2%;"></i> Thank you for accomplishing the <br><b>5S Monitoring Form</b>');
  // }
      //   $(':input[type="number"]').change(function(){
      //      this.value = parseFloat(this.value).toFixed(2);
      // });
      
          $("#reservation").prop('disabled', true);

            $('#sched').on('change',function(e){
                var optionSelected = $("option:selected", this);
                var valueSelected = this.value;
                if(valueSelected == 'SWF')
                {
                    $("#reservation").prop('disabled', true);

                }else{
                $("#reservation").prop('disabled', false);
                }
            })
          $("#txt1").prop('disabled', true);
          $("#txt2").prop('disabled', true);
          $("#txt3").prop('disabled', true);
          $("#txt4").prop('disabled', true);
          $("#txt5").prop('disabled', true);

          $(document).on('click', '#fivesForm', function(){
            let user = '<?php echo $_SESSION['username']; ?>';
            let division = '<?php echo $_SESSION['division']; ?>';
            let currentuser = '<?php echo $_SESSION['currentuser']; ?>';
            let is_button_enabled = '<?php echo $button_enabled; ?>';
            let is_driver = '<?php echo $is_driver; ?>';

            if (is_button_enabled) {
              if (!is_driver) {
                window.location.href = "base_fives_add_form.html.php?&username="+user+"&division="+division+"&emp_id="+currentuser+"";
              } else {
                window.location.href = "base_fives_driver_add_form.html.php?&username="+user+"&division="+division+"&emp_id="+currentuser+"";
              }
            }
          })
       
      //   checkbox
        $('.checkbox1').on('change', function() { 
            $('.checkbox1').not(this).prop('checked', false);  
        });
        $('.checkbox2').on('change', function() { 
            $('.checkbox2').not(this).prop('checked', false);  
        });
        $('.checkbox3').on('change', function() { 
            $('.checkbox3').not(this).prop('checked', false);  
        });
        $('.checkbox4').on('change', function() { 
            $('.checkbox4').not(this).prop('checked', false);  
        });
        $('.checkbox5').on('change', function() { 
            $('.checkbox5').not(this).prop('checked', false);  
        });
      //   =================================
      //   =================================
      $("#cb1").change(function() {
          var cb1 = "";
          if($(this).is(":checked"))
          {
            cb1 = "CHECK";
          }else{
            cb1= "UNCHECK";
          }
          switch (cb1) {
            case 'CHECK':
                  $("#txt1").prop('disabled', false);
              break;
            case 'UNCHECK':
                  $("#txt1").prop('disabled', true);
            default:
            $("#txt1").val('');

              break;
          }
      });

      $("#cb2").change(function() {
            var cb2 = "";
            if($(this).is(":checked"))
            {
              cb2 = "CHECK";
            }else{
              cb2= "UNCHECK";
            }
            switch (cb2) {
              case 'CHECK':
                    $("#txt1").val('');
                    $("#txt1").prop('disabled', true);// disable the textarea
                    $("#cb1").prop('required', false); // disable the required parameter of YES checkbox

                break;
              case 'UNCHECK':
                    $("#cb1").prop('required', true);
              default:
              $("#txt1").prop('disabled', true);// ennable the textarea
                    $("#cb1").prop('required', true); // enable the required parameter of YES checkbox
                break;
        }
      });
          // $('#cb1').click(function(){
          //     if($(this).prop("checked") == true){
          //         $("#txt1").prop('disabled', false);
          //     }else{
          //         $("#txt1").prop('disabled', true);
          //     }
          // });
          // $('#cb2').click(function(){
          //     if($(this).prop("checked") == true){
          //         $("#txt1").prop('disabled', true);
          //         $("#cb1").prop('required', false);
          //     }else{
          //         $("#txt1").prop('disabled', true);
          //         $("#cb1").prop('required', true);

          //     }
          // });
      // ========================================
      //   =================================
      $("#cb3").change(function() {
          var cb3 = "";
          if($(this).is(":checked"))
          {
            cb3 = "CHECK";
          }else{
            cb3= "UNCHECK";
          }
          switch (cb3) {
            case 'CHECK':
                  $("#txt2").prop('disabled', false);
              break;
            case 'UNCHECK':
                  $("#txt2").prop('disabled', true);
            default:
            $("#txt2").val('');

              break;
          }
      });

      $("#cb4").change(function() {
            var cb4 = "";
            if($(this).is(":checked"))
            {
              cb4 = "CHECK";
            }else{
              cb4= "UNCHECK";
            }
            switch (cb4) {
              case 'CHECK':
                    $("#txt2").val('');
                    $("#txt2").prop('disabled', true);// disable the textarea
                    $("#cb3").prop('required', false); // disable the required parameter of YES checkbox
                break;
              case 'UNCHECK':
                    $("#cb3").prop('required', true);
              default:
              $("#txt2").prop('disabled', true);// ennable the textarea
                    $("#cb3").prop('required', true); // enable the required parameter of YES checkbox
                break;
        }
      });
          // $('#cb3').click(function(){
          //     if($(this).prop("checked") == true){
          //         $("#txt2").prop('disabled', false);
          //     }else{
          //         $("#txt2").prop('disabled', true);
          //     }
          // });
          // $('#cb4').click(function(){
          //     if($(this).prop("checked") == true){
          //         $("#txt2").prop('disabled', true);
          //         $("#cb3").prop('required', false);

          //     }else{
          //         $("#txt2").prop('disabled', true);
          //         $("#cb3").prop('required', true);

          //     }
          // });
      // ========================================
      $("#cb5").change(function() {
          var cb5 = "";
          if($(this).is(":checked"))
          {
            cb5 = "CHECK";
          }else{
            cb5 = "UNCHECK";
          }
          switch (cb5) {
            case 'CHECK':
                  $("#txt3").prop('disabled', false);
              break;
            case 'UNCHECK':
                  $("#txt3").prop('disabled', true);
            default:
            $("#txt3").val('');

              break;
          }
      });

      $("#cb6").change(function() {
            var cb6 = "";
            if($(this).is(":checked"))
            {
              cb6 = "CHECK";
            }else{
              cb6 = "UNCHECK";
            }
            switch (cb6) {
              case 'CHECK':
                    $("#txt3").val('');
                    $("#txt3").prop('disabled', true);// disable the textarea
                    $("#cb5").prop('required', false); // disable the required parameter of YES checkbox
                break;
              case 'UNCHECK':
                    $("#cb5").prop('required', true);
              default:
                $("#txt3").prop('disabled', true);// ennable the textarea
                    $("#cb5").prop('required', true); // enable the required parameter of YES checkbox
                break;
        }
      });
          // $('#cb5').click(function(){
          //     if($(this).prop("checked") == true){
          //         $("#txt3").prop('disabled', false);
          //     }else{
          //         $("#txt3").prop('disabled', true);
          //     }
          // });
          // $('#cb6').click(function(){
          //     if($(this).prop("checked") == true){
          //         $("#txt3").prop('disabled', true);
          //         $("#cb5").prop('required', false);

          //     }else{
          //         $("#txt3").prop('disabled', true);
          //         $("#cb5").prop('required', true);

          //     }
          // });
          // ===================================
          $("#cb7").change(function() {
            var cb7 = "";
            if($(this).is(":checked"))
            {
              cb7 = "CHECK";
            }else{
              cb7 = "UNCHECK";
            }
            switch (cb7) {
              case 'CHECK':
                    $("#txt4").prop('disabled', false);
                break;
              case 'UNCHECK':
                    $("#txt4").prop('disabled', true);
              default:
            $("#txt4").val('');

                break;
            }
          });

          $("#cb8").change(function() {
                var cb8 = "";
                if($(this).is(":checked"))
                {
                  cb8 = "CHECK";
                }else{
                  cb8 = "UNCHECK";
                }
                switch (cb8) {
                  case 'CHECK':
                        $("#txt4").val('');// disable the textarea
                        $("#txt4").prop('disabled', true);// disable the textarea
                        $("#cb7").prop('required', false); // disable the required parameter of YES checkbox
                    break;
                  case 'UNCHECK':
                        $("#cb7").prop('required', true);
                  default:
                    $("#txt4").prop('disabled', true);// ennable the textarea
                        $("#cb7").prop('required', true); // enable the required parameter of YES checkbox
                    break;
            }
          });
          // $('#cb7').click(function(){
          //     if($(this).prop("checked") == true){
          //         $("#txt4").prop('disabled', false);
          //     }else{
          //         $("#txt4").prop('disabled', true);
          //     }
          // });
          // $('#cb8').click(function(){
          //     if($(this).prop("checked") == true){
          //         $("#txt4").prop('disabled', true);
          //         $("#cb7").prop('required', false);

          //     }else{
          //         $("#txt4").prop('disabled', true);
          //         $("#cb7").prop('required', true);

          //     }
          // });
          // ===================================
          $("#cb9").change(function() {
            var cb9 = "";
            if($(this).is(":checked"))
            {
              cb9 = "CHECK";
            }else{
              cb9 = "UNCHECK";
            }
            switch (cb9) {
              case 'CHECK':
                    $("#txt5").prop('disabled', false);
                break;
              case 'UNCHECK':
                    $("#txt5").prop('disabled', true);
              default:
            $("#txt5").val('');

                break;
            }
          });

          $("#cb10").change(function() {
                var cb10 = "";
                if($(this).is(":checked"))
                {
                  cb10 = "CHECK";
                }else{
                  cb10 = "UNCHECK";
                }
                switch (cb10) {
                  case 'CHECK':
                        $("#txt5").val('');// disable the textarea
                        $("#txt5").prop('disabled', true);// disable the textarea
                        $("#cb9").prop('required', false); // disable the required parameter of YES checkbox
                    break;
                  case 'UNCHECK':
                        $("#cb9").prop('required', true);
                  default:
                    $("#txt5").prop('disabled', true);// ennable the textarea
                        $("#cb9").prop('required', true); // enable the required parameter of YES checkbox
                    break;
            }
          });
          // $('#cb9').click(function(){
          //     if($(this).prop("checked") == true){
          //         $("#txt5").prop('disabled', false);
          //     }else{
          //         $("#txt5").prop('disabled', true);
          //     }
          // });
          // $('#cb10').click(function(){
          //     if($(this).prop("checked") == true){
          //         $("#txt5").prop('disabled', true);
          //         $("#cb9").prop('required', false);

          //     }else{
          //         $("#txt5").prop('disabled', true);
          //         $("#cb9").prop('required', true);
          //     }
          // });

});
</script>
<?php 
  if ($username == 'ljbanalan' || $username == 'mmmonteiro' || $username == 'masacluti' || $username == 'seolivar' || $username == 'jsodsod' || $username == 'jecastillo') { 
    include('test1.php'); 
}else{ 

     if ($OFFICE_STATION == 1) {
  include('sidebar2.php');
           
        }else{
  include('sidebar3.php');
         
        } 
}
 ?>
  <div class="content-wrapper">
    <section class="content-header"><br>
      <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dash Board</li>
      </ol><br>

    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <div class="panel panel-defasult">
            <div class="box-body"> 
          
            <div>
                
            </div>
              
            <?php include 'dash_board.php';?>
    </section>
  </div>






  
  <footer class="main-footer">
    <br>
      <div class="pull-right hidden-xs">
        <b>Version</b> 1.0
      </div>
      <strong>DILG IV-A Regional Information and Communications Technology Unit (RICTU) © 2019 All Right Reserved .</strong>
    </footer>
    <br>
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<script src="dist/js/adminlte.min.js"></script>
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>





<!-- jQuery 3 -->
<!-- Bootstrap 3.3.7 -->
<!-- Select2 -->
<script src="bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- InputMask -->
<script src="plugins/input-mask/jquery.inputmask.js"></script>
<!-- date-range-picker -->
<script src="bower_components/moment/min/moment.min.js"></script>
<script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- bootstrap color picker -->

<!-- Page script -->
<script>
$(document).on('keydown', 'input[pattern]', function(e){
  var input = $(this);
  var oldVal = input.val();
  var regex = new RegExp(input.attr('pattern'), 'g');

  setTimeout(function(){
    var newVal = input.val();
    if(!regex.test(newVal)){
      input.val(oldVal); 
    }
  }, 0);
});
$(document).ready(function(){
  $('#datepicker1').datepicker({
      autoclose: true
    })
});
</script>



<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, locale: { format: 'MM/DD/YYYY hh:mm A' }})
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    })

  })
</script>


<script>
$(document).on('keydown', 'input[pattern]', function(e){
  var input = $(this);
  var oldVal = input.val();
  var regex = new RegExp(input.attr('pattern'), 'g');

  setTimeout(function(){
    var newVal = input.val();
    if(!regex.test(newVal)){
      input.val(oldVal); 
    }
  }, 0);
});
$(document).ready(function(){
  $('#datepicker1').datepicker({
      autoclose: true
    })
});
</script>



<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    })

  })
</script>
   
<script>
  $(function () {
    $('#example15').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : false,
      'ordering'    : false,
      'info'        : true,
      'autoWidth'   : true,
      aLengthMenu: [ [1, 10, 20, -1], [1, 10, 20, "All"] ],
      "bPaginate": false,
      "bLengthChange": false,
      "bFilter": true,
      "bInfo": false,
      "bAutoWidth": false,
      "pagingType": "simple",
      "language": {
      "paginate": {
      "previous": "<",
      "next":">"
}
}
    })
  })
</script>
   
  
   
  
  
