<?php session_start();
if(!isset($_SESSION['username'])){
header('location:index.php');
}else{
  error_reporting(0);
ini_set('display_errors', 0);
$username = $_SESSION['username'];
}

?>
<?php 
require_once 'calendar/sample/bdd.php';
require_once 'calendar/sample/dbaseCon.php';
require_once 'calendar/sample/sql_statements.php';

$sql = "SELECT id, title, start, end, color, cancelflag,office FROM events where cancelflag = 0 and status = 1 ";
$req = $bdd->prepare($sql);
$req->execute();
$events = $req->fetchAll();
function viewEvents()
{
        ?>
            <form method = "POST" action = "calendar/add-event.php">
                <input  type = "hidden" name = "eventid" value = "<?php echo $row['id'];?>">
                <table class="table table-bordered" style = "width:100%;"> 
                    <tr>
                        <td class="col-md-2">Event/Activity Title<span style = "color:red;">*</span></td>
                            <td class="col-md-5"><input required type = "text" class = "form-control" name = "titletxtbox" value = ""  /></td>
                                </tr>
                    <tr>
                        <td class="col-md-2">Start Date<span style = "color:red;">*</span></td>
                            <td class="col-md-5">
                                <input required type="text" class = "form-control" name = "startdatetxtbox" id="datepicker1" value = "" placeholder="mm/dd/yyyy"  required autocomplete = off  >
                                    </td>
                                        </tr>
                    <tr>
                        <td class="col-md-2">End Date</td>
                            <td class="col-md-5">
                                <input  type = "text" placeholder="mm/dd/yyyy" class = "form-control" name = "enddatetxtbox"  id="datepicker2" value = "" /></td>
                                    </tr>
                    <tr>
                        <td class="col-md-2">Description</td>
                            <td class="col-md-5"><input  type = "text" class = "form-control" name = "descriptiontxtbox" value = "" /></td>
                                </tr>
                    <tr>
                        <td class="col-md-2">Venue<span style = "color:red;">*</span></td>
                            <td class="col-md-5"><input required type = "text" class = "form-control" name = "venuetxtbox" value = "" /></td>
                                </tr>
                    <tr>
                        <td class="col-md-2">Expected Number of Participants<span style = "color:red;">*</span></td>
                            <td class="col-md-5"><input required type = "number" min = "0" name = "enptxtbox" class = "form-control" value = ""  /></td>
                                </tr>
                    <tr>
                        <td class="col-md-2">Target Participants<span style = "color:red;">*</span></td>  
                            <td class="col-md-5">
                            <input required type = "text" class = "form-control" name = "remarks" value = "" />
                                </td>
                                    </tr>
                    <tr>
                        <td class="col-md-2">Posted By</td>
                            <td class="col-md-5">                              
                            <input readonly type = "text"  class = "form-control" value = "<?php echo $_SESSION['username'];?>"  />
                                    </td>
                                        </tr>
                    <tr>
                        <td class="col-md-2">Posted Date</td>
                            <td class="col-md-5"><input disabled type = "text" class = "form-control" placeholder = "Posted Date" id="datepicker3" name = "enddatetxtbox"  /></td>
                                </tr>
                   
                    
                </table>
                <button style = "text-align:center;" class = "btn btn-success"><i class = "fa fa-arrow-left"></i>&nbsp;<a href= "ViewCalendar.php" style = "color:#fff;decoration:none;">Back</a></button>
                <input type = "submit" name = "submit" style = "text-align:center;margin-left:5px;" class = "pull-right btn btn-success" value = "Save"> 

            </form>
        <?php
    
}
function getCurrentID()
{
    include 'connection.php';
    $sqlQuery = "SELECT ID FROM `events`  ORDER BY ID DESC LIMIT 1";
    $result = mysqli_query($conn, $sqlQuery);
    if ($row = mysqli_fetch_array($result)) {
        echo $row['ID'];
    }
}
?>
<!DOCTYPE html>
<html>
<title>FAS: Events Management Dashboard</title>
<head>
<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="shortcut icon" type="image/png" href="dilg.png">
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic"> </head>
  <!-- CALENDAR -->
  <link rel="stylesheet" href="calendar/fullcalendar/fullcalendar.min.css" />
  <script src="calendar/fullcalendar/lib/jquery.min.js"></script>
  <script src="calendar/fullcalendar/lib/moment.min.js"></script>
  <script src="calendar/fullcalendar/fullcalendar.min.js"></script>

  <style> .response { height: 60px; } .success { background: #cdf3cd; padding: 10px 60px; border: #c3e6c3 1px solid;} </style>

<body >
<div class="wrapper">
  <?php include('connection.php');?>
  <?php include('sidebar.php');?>
  
  <div class="content-wrapper">
    <section class="content-header">
        <ol class="breadcrumb">
          <li><a href="home.php"><i class=""></i> Home</a></li>
          <li class="active">Add Events</li>
        </ol><br><br><br>
        <div class="row">
          <div class="col-md-12">
              <div class="box">
                  <div class="panel panel-defasult">
                      <div class="box-body"> 
                        <div class = "response"></div>   
                              <h1>Add Event/Activity</h1>
                          <div class="well col-md-6" >
                            
                                    <?php echo viewEvents();?>
                                </div>
                          <div class = "col-md-6" id='calendar'></div>
                              
                            </div>
                            
                      </div>
                      
              </div>
          </div>
        </div>
    </section>
  </div>
</div>
<?php
if($_GET['flag'] == 1)
{
    ?>
    <script>
    $(document).ready(function(){
        displayMessage('Data has been successfully added.');
        setInterval(function() { window.location="ViewEvent.php?eventid=<?php echo getCurrentID();?>"; }, 2000);
    });</script>
    <?php
}
?>
<!-- <script src="bower_components/jquery/dist/jquery.min.js"></script> -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="dist/js/adminlte.min.js"></script>
<script src="_includes/sweetalert.min.js"></script>



<script>
function displayMessage(message)
 {
  $(".response").html("<div class='alert alert-success' role='alert' style = 'background-color:#ef9a9a;'>"+message+"<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
    setInterval(function() { $(".alert").fadeOut(); }, 3000);
}
$(document).ready(function(){
    $( "#datepicker1" ).datepicker({changeMonth: true, changeYear: true, yearRange: "1950:2020", dateFormat:'M dd, yy'});
    $( "#datepicker2" ).datepicker({changeMonth: true, changeYear: true, yearRange: "1950:2020", dateFormat:'M dd, yy'});
    $( "#datepicker3" ).datepicker({changeMonth: true, changeYear: true, yearRange: "1950:2020", dateFormat:'M dd, yy'});
    $("#datepicker1").datepicker().datepicker("setDate", new Date());



});
   


</script>

<script>

$(document).ready(function() {
  $('#calendar').fullCalendar({
    header: {
      left: 'prev,next today',
      center: 'title',
      right: 'month,basicWeek,basicDay'
    },
    editable: false,
    eventLimit: true, // allow "more" link when too many events
    selectable: true,
    selectHelper: true,
    select: function(start, end) {
    $('#ModalAdd #start').val(moment(start).format('YYYY-MM-DD HH:mm:ss'));
    $('#ModalAdd #end').val(moment(end).format('YYYY-MM-DD HH:mm:ss'));
    $('#ModalAdd').modal('show');
    },
    eventRender: function(event, element) {  
    element.find('.fc-time').hide();
    },
    eventDrop: function (event, delta) {
                    var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
                    var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
                    $.ajax({
                        url: 'edit-event.php',
                        data: 'title=' + event.title + '&start=' + start + '&end=' + end + '&id=' + event.id,
                        type: "POST",
                        success: function (response) {
                            displayMessage("Updated Successfully");
                        }
                    });
                },
  events: [
  <?php foreach($events as $event): 

    $start = explode(" ", $event['start']);
    $end = explode(" ", $event['end']);
    if($start[1] == '00:00:00'){
      $start = $start[0];
    }else{
      $start = $event['start'];
    }
    if($end[1] == '00:00:00'){
      $end = $end[0];
    }else{
      $end = $event['end'];
    }


  $enddate = str_replace('-', '/', $end);
$realenddate = date('Y-m-d',strtotime($enddate . "+1 days"));

if($_SESSION['planningofficer'] == 1){
    if (TRUE) {
      ?>
      {
        id: '<?php echo $event['id']; ?>',
        title: '<?php echo $event['title']; ?>',
        start: '<?php echo $start; ?>',
        end: '<?php echo $realenddate; ?>',
        color: '<?php echo $event['color']; ?>',
        office: '<?php echo $event['office']; ?>',
        url: 'ViewEvent.php?eventid=<?php echo $event['id']; ?>',

      },
    <?php 
    }
  }else{

    if (TRUE) {
      ?>
      {
        id: '<?php echo $event['id']; ?>',
        title: '<?php echo $event['title']; ?>',
        start: '<?php echo $start; ?>',
        end: '<?php echo $realenddate; ?>',
        color: '<?php echo $event['color']; ?>',
        office: '<?php echo $event['office']; ?>',

      },
    <?php 
    }
  }
  endforeach; ?>
    ]
  });





/*function edit(event){
  start = event.start.format('YYYY-MM-DD HH:mm:ss');
  if(event.end){
    end = event.end.format('YYYY-MM-DD HH:mm:ss');
  }else{
    end = start;
  }
  
  id =  event.id;
  
  Event = [];
  Event[0] = id;
  Event[1] = start;
  Event[2] = end;
  
  $.ajax({
   url: 'editEventDate.php',
   type: "POST",
   data: {Event:Event},
   success: function(rep) {
      if(rep == 'OK'){
        alert('Saved');
      }else{
        alert('Could not be saved. try again.'); 
      }
    }
  });
}*/

});
$("#selectMonth").append('<select class="select_month form-control"><option value="1">January</option><option value="2">February</option><option value="3">March</option><option value="4">April</option><option value="5">May</option><option value="6">June</option><option value="7">July</option><option value="8">August</option><option value="9">September</option><option value="10">October</option><option value="11">November</option><option value="12">December</option></select>');

$(".select_month").on("change", function(event) {
$('#calendar').fullCalendar('changeView', 'month', this.value);
$('#calendar').fullCalendar('gotoDate', "2020-"+this.value+"-1");

});


</script>
</body>
</html>
