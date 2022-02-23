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

    //Date picker,
    $('#datepicker1').datepicker({
      autoclose: true
    })

    $('#datepicker2').datepicker({
      autoclose: true
    })
    $('#datepicker3').datepicker({
      autoclose: true
    })
    $('#datepicker4').datepicker({
      autoclose: true
    })

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    })
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    //Timepicker
    $('.timepicker').timepicker({
      showInputs: false
    })
  })


  $(document).ready(function(){
  $("#quarter").change(function (){


    quarter = document.getElementById("quarter").value;
    var duration = $("input[name='duration']"); 

   
    if(quarter=='1Q'){
    duration.val('04/01/2020');
    }
    
    else if(quarter=='2Q'){
    duration.val('07/01/2020');
    }
    
    else if(quarter=='3Q'){
    duration.val('10/01/2020');
    }
    
    else if(quarter=='4Q'){
    duration.val('01/01/2021');
    }
    else{
      duration.val('');

    }
  

  });
});


   $(document).ready(function() {
    var mode = $("input[name='mode']").val();
    // alert(mode);
    var Fill = $("#mode").val();

    var status = $("#status").val();

    if(status=='Draft'){
      $("#status option[value=Draft]").attr('selected', 'selected');
    }
    else if(status=='Paid'){
      $("#status option[value=Paid]").attr('selected', 'selected');
    }
    else if(status=='Returned'){
      $("#status option[value=Returned]").attr('selected', 'selected');
    }
    else {
      $("#status option[value=]").attr('selected', 'selected');
    }
    /* LOADING of DATA TABLES */

    if(Fill=='BURS'){
            var bursno = '<?php echo $bursget?>';
            // alert(bursno);
            function dataTT(){

            var table = $('#example').DataTable( {
            'paging'      : true,
            'lengthChange': false,
            'searching'   : false,
            'ordering'    : false,
            'info'        : false,
            'autoWidth'   : false,  
            "processing": true,
            "serverSide": false,
            "ajax": {
            "url": "DATATABLE/Disbursement_data1.php",
            "type": "POST",
            "data": {
            "filter_data1": bursno,

            }}

            } );
            }

            $('#example').DataTable().destroy();
            dataTT();
            

    }
    else if(Fill=='ORS'){

            var orsno = '<?php echo $orsget?>';
            // alert(orsno);
        function dataTTE(){
          
        var table = $('#example').DataTable( {
        'paging'      : true,
        'lengthChange': false,
        'searching'   : false,
        'ordering'    : false,
        'info'        : false,
        'autoWidth'   : false,  
        "processing": true,
        "serverSide": false,
        "ajax": {
        "url": "DATATABLE/Disbursement_data.php",
        "type": "POST",
        "data": {
        "filter_data": orsno,


        }}

        } );
        }

        
        $('#example').DataTable().destroy();
        dataTTE();

    }
    else{


    }

    var dv = '<?php echo $dv?>';
    // alert(dv);
    function dataTTTE(){
          
          var table = $('#example1').DataTable( {
          'paging'      : true,
          'lengthChange': false,
          'searching'   : false,
          'ordering'    : false,
          'info'        : false,
          'autoWidth'   : false,  
          "processing": true,
          "serverSide": false,
          "ajax": {
          "url": "DATATABLE/Nta_data.php",
          "type": "POST",
          "data": {
          "filter_data": dv,
  
  
          }}
  
          } );
          }
  
          
          $('#example1').DataTable().destroy();
          dataTTTE();




    /* LOADING of DATA TABLES */
    
    //APPEND
    var max_fields = 10;
    var wrapper = $(".container1");
    var add_button = $(".add_form_field");

    var x = 1;
    $(add_button).click(function(e) {
      e.preventDefault();
      if (x < max_fields) {
        x++;
        var list = "Hello";
            $(wrapper).append('<div ><br><br><br><br><a href="#" style="margin-right:50px" class="delete btn btn-danger btn-xs pull-right"><i class="fa fa-trash-o"></i></a><br><br><div class="col-md-3"><tr><td class="col-md-1"><b>CHARGE TO<span style = "color:red;">*</span></b></td><td class="col-md-7"><select class="form-control select" style="width: 100%; height: 40px;" name="charge[]" id="charge" required > <option value = "">Select NCA/NTA</option> <option value = "NCA">NCA</option> <option value = "NTA">NTA</option> </select> </td> </tr> </div> <div class="col-md-4"> <tr> <td class="col-md-1"><b>NCA/NTA NO.<span style = "color:red;">*</span></b></td> <td class="col-md-7">  <select class="form-control select2" style= "color:black;text-align:center;"  id = "ntano" name="ntano[]"> <?php getNta();?> </select>  </td> </tr> </div><div class="col-md-2"> <tr> <td class="col-md-1"><b>AMOUNT<span style = "color:red;">*</span></b></td> <td class="col-md-7"> <input required value=""  class="form-control input" type="number" step="any"  class="" style="height: 35px;" id="ntaamount" name="ntaamount[]" placeholder="0" autocomplete="off"> </td> </tr> </div>  <div class="col-md-3"> <tr> <td class="col-md-1"><b>NCA/NTA BALANCE<span style = "color:red;">*</span></b></td> <td class="col-md-7"> <input  value=""  class="form-control input" type="text"  class="" style="height: 35px;" id="ntabalance" name="ntabalance" placeholder="0" autocomplete="off"> </td> </tr> </div></div>'); //add input box
          } else {
            alert('You Reached the limits')
          }
        });

       
                   

    $(wrapper).on("click", ".delete", function(e) {
        if(confirm("Are you sure you want to delete this NCA/NTA?")){
            
        e.preventDefault();
        $(this).parent('div').remove();
        x--;
        }
        else{


        }
        

        
    })

    //setting data



  });



function myFunctionORS()
{
var mode = document.getElementById("mode").value;

if(mode==""){
$('#ors').prop('disabled', true);
var ors = $("input[name='ors']"); 
ors.val('');

$('#ors1').prop('disabled', true);
var ors = $("input[name='ors1']"); 
ors.val('');


var payee = $("input[name='payee']"); 
payee.val('');
var particular = $("input[name='particular']"); 
particular.val('');
var amount = $("input[name='amount']"); 
amount.val('');
var orsdate = $("input[name='orsdate']"); 
orsdate.val('');


var total = $("input[name='total']"); 
total.val('');

var net = $("input[name='net']"); 
net.val('');

var tax = $("input[name='tax']"); 
tax.val('0');

var gsis = $("input[name='gsis']"); 
gsis.val('0');


var pagibig = $("input[name='pagibig']"); 
pagibig.val('0');

var philhealth = $("input[name='philhealth']"); 
philhealth.val('0');

var other = $("input[name='other']"); 
other.val('0');






}
else if(mode=="BURS"){

$('#ors1').prop('disabled', true);
var ors = $("input[name='ors1']");
ors.val('');

$('#ors').prop('disabled', false);
var ors = $("input[name='ors']"); 
ors.val('');

var payee = $("input[name='payee']"); 
payee.val('');
var particular = $("input[name='particular']"); 
particular.val('');
var amount = $("input[name='amount']"); 
amount.val('');
var orsdate = $("input[name='orsdate']"); 
orsdate.val('');



var total = $("input[name='total']"); 
total.val('');

var net = $("input[name='net']"); 
net.val('');

var tax = $("input[name='tax']"); 
tax.val('0');

var gsis = $("input[name='gsis']"); 
gsis.val('0');


var pagibig = $("input[name='pagibig']"); 
pagibig.val('0');

var philhealth = $("input[name='philhealth']"); 
philhealth.val('0');

var other = $("input[name='other']"); 
other.val('0');

}
else{
$('#ors').prop('disabled', true);
var ors = $("input[name='ors']"); 
ors.val('');

$('#ors1').prop('disabled', false);
var ors = $("input[name='ors1']"); 
ors.val('');

var payee = $("input[name='payee']"); 
payee.val('');
var particular = $("input[name='particular']"); 
particular.val('');
var amount = $("input[name='amount']"); 
amount.val('');
var orsdate = $("input[name='orsdate']"); 
orsdate.val('');

var total = $("input[name='total']"); 
total.val('');

var net = $("input[name='net']"); 
net.val('');

var tax = $("input[name='tax']"); 
tax.val('0');

var gsis = $("input[name='gsis']"); 
gsis.val('0');


var pagibig = $("input[name='pagibig']"); 
pagibig.val('0');

var philhealth = $("input[name='philhealth']"); 
philhealth.val('0');

var other = $("input[name='other']"); 
other.val('0');
//dataEE();

}

}