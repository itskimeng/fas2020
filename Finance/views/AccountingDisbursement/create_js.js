$(document).ready(function(){
  $('#datepicker1').datepicker({
      autoclose: true
    })
});

$(document).ready(function(){
  $('#datepicker2').datepicker({
      autoclose: true
    })
});


$(document).ready(function(){
  $('#datepicker3 ').datepicker({
      autoclose: true
    })
});

$(document).ready(function(){
  $('#datepicker4 ').datepicker({
      autoclose: true
    })
});

$(document).ready(function(){
  $('.timepicker1').datepicker({
      autoclose: true
    })
});

$(document).ready(function(){
  $('.timepicker2').datepicker({
      autoclose: true
    })
});



 $(document).ready(function(){


$(".datePicker1" ).datepicker({changeMonth: true, changeYear: true, yearRange: "1950:2020", dateFormat:'M dd, yy'});
$(".datePicker1").datepicker().datepicker("setDate", new Date());

  //Set ors disabled



    $('#ors').prop('disabled', true);
    $('#ors1').prop('disabled', true);




    $("#result1").click(function(){
    $("#main1").hide();
    // alert(filter_data);
   
    // alert(filter_data);

    filter_data = $('#ors1').val();

    $('#example').DataTable().destroy();
    dataTE();

    //  alert(mode);
    
    });
  });




 //declare variable for filtering                               
  $(document).ready(function(){
  

  function load_data(query)
  {
 
  $.ajax({
  
  url:"@disbursementvalue.php",
  method:"POST",
  data:{query:query,
  },


  success:function(data)
  {
  $('#result1').html(data);
  }
  });
  }
  $('#ors1').keyup(function(){
  var search = $(this).val();
  if(search != '')
  {
  load_data(search);

 
  
  }
  else
  {
  
  $("#main1").show();
  load_data();

  filter_data = '';
  $('#example').DataTable().destroy();
  dataEE();

  document.getElementById('payee').value = "";
  document.getElementById('particular').value = "";
  document.getElementById("amount").value = "";
  document.getElementById("orsdate").value = "";
  document.getElementById("net").value = "0";
  }
  });
  });
  function showRow(row)
  {
  var x=row.cells;
  document.getElementById("ors1").value = x[0].innerHTML;
  document.getElementById("orsdate").value = x[3].innerHTML;
  document.getElementById("payee").value = x[4].innerHTML;
  document.getElementById("particular").value = x[5].innerHTML;
  document.getElementById("amount").value = x[6].innerHTML;
  document.getElementById("deductions").value = "0";
  document.getElementById("net").value = x[6].innerHTML;
  }

  //function of table
  function dataTE(){
  
  // var filter_data ='0001';
  

  var table = $('#example').DataTable( {
  'scrollX'     : true,
  'paging'      : true,
  'lengthChange': true,
  'searching'   : false,
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
  "ajax": {
  "url": "DATATABLE/Disbursement_data.php",
  "type": "POST",
  "data": {
  "filter_data": filter_data,
 
  
  }}
  
  } );
  }
  /* Delete function */
  function dataEE(){
  
  var filter_data ='';
  
  var table = $('#example').DataTable( {
  'scrollX'     : true,
  'paging'      : true,
  'lengthChange': true,
  'searching'   : false,
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
  "ajax": {
  "url": "DATATABLE/Disbursement_data_del.php",
  "type": "POST",
  "data": {
  "filter_data": filter_data
  
  }}
  


  } );
  }



                          
$(document).ready(function(){
  //Set ors disabled


  $("#result2").click(function(){
  $("#main2").hide();

  });
});

//declare variable for filtering


$(document).ready(function(){


function load_data(query)
{
  $.ajax({

  url:"@ntavalue.php",
  method:"POST",
  data:{query:query,
  },


  success:function(data)
  {
  $('#result2').html(data);
  }
  });
  }

  $('#ntano').keyup(function(){
  var search = $(this).val();
  if(search != '')
  {
  load_data(search);


  }
  else
  {

  $("#main2").show();
  load_data();

  document.getElementById('ntano').value = "";
  document.getElementById('ntabalance').value = "";


  }
  });
});

function showRow2(row)
{
  var x=row.cells;
  document.getElementById("ntano").value = x[0].innerHTML;
  document.getElementById("ntabalance").value = x[1].innerHTML;

}


 $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'mm/dd/yyyy' })
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


 $(document).ready(function() {
    var max_fields = 10;
    var wrapper = $(".container1");
    var add_button = $(".add_form_field");

    var x = 1;
    $(add_button).click(function(e) {
      e.preventDefault();
      if (x < max_fields) {
        x++;
        var list = "Hello";
            $(wrapper).append('<div ><br><br><br><br><a href="#" style="margin-right:50px" class="delete btn btn-danger btn-xs pull-right"><i class="fa fa-trash-o"></i></a><br><br><div class="col-md-3"><tr><td class="col-md-1"><b>CHARGE TO<span style = "color:red;">*</span></b></td><td class="col-md-7"><select class="form-control select" style="width: 100%; height: 40px;" name="charge[]" id="charge" required > <option value = "">Select NCA/NTA</option> <option value = "NCA">NCA</option> <option value = "NTA">NTA</option> </select> </td> </tr> </div> <div class="col-md-3"> <tr> <td class="col-md-1"><b>NCA/NTA NO.<span style = "color:red;">*</span></b></td> <td class="col-md-7">  <select class="form-control select2" style= "color:black;text-align:center;"  id = "ntano" name="ntano[]"> <?php getNta();?> </select>  </td> </tr> </div><div class="col-md-3"> <tr> <td class="col-md-1"><b>AMOUNT<span style = "color:red;">*</span></b></td> <td class="col-md-7"> <input required value=""  class="form-control input" type="number" step="any"  class="" style="height: 35px;" id="ntaamount" name="ntaamount[]" placeholder="0" autocomplete="off"> </td> </tr> </div>  <div class="col-md-3"> <tr> <td class="col-md-1"><b>NCA/NTA BALANCE<span style = "color:red;">*</span></b></td> <td class="col-md-7"> <input readonly value=""  class="form-control input" type="text"  class="" style="height: 35px;" id="ntabalance" name="ntabalance" placeholder="0" autocomplete="off"> </td> </tr> </div></div>'); //add input box
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


var deductions = $("input[name='deductions']"); 
deductions.val('');

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



var deductions = $("input[name='deductions']"); 
deductions.val('');

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

var deductions = $("input[name='deductions']"); 
deductions.val('');

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


/* Functions for deductions */
function myFunctiontax() {
  var tax = document.getElementById("tax").value;
  var gsis = document.getElementById("gsis").value;
  var pagibig = document.getElementById("pagibig").value;
  var philhealth = document.getElementById("philhealth").value;
  var other = document.getElementById("other").value;


  var deductions1 = $("input[name='deductions']");
  var net1 = $("input[name='net']");
  var tax1 = $("input[name='tax']");

  if(tax==''){
  net1.val('0');
  deductions1.val('0');
  //tax1.val('0');

  }
  else{
  var allsum = parseFloat(tax) + parseFloat(gsis) + parseFloat(pagibig) + parseFloat(philhealth) + parseFloat(other);

  var deductions1 = $("input[name='deductions']");
  deductions1.val(allsum);

  var amount = document.getElementById('amount').value;
  var deductions = document.getElementById('deductions').value;
  var result = parseFloat(amount).toFixed(2) - parseFloat(deductions).toFixed(2);
  if (!isNaN(result)) {

  document.getElementById('net').value = result.toFixed(2);

  }
  
  }
        

}





function myFunctiongsis() {
  var tax = document.getElementById("tax").value;
  var gsis = document.getElementById("gsis").value;
  var pagibig = document.getElementById("pagibig").value;
  var philhealth = document.getElementById("philhealth").value;
  var other = document.getElementById("other").value;


  var deductions1 = $("input[name='deductions']");
  var net1 = $("input[name='net']");
  var gsis1 = $("input[name='gsis']");

  if(gsis==''){
  net1.val('0');
  deductions1.val('0');
  //gsis1.val('0');

  }
  else{
  var allsum = parseFloat(tax) + parseFloat(gsis) + parseFloat(pagibig) + parseFloat(philhealth) + parseFloat(other);

  var deductions1 = $("input[name='deductions']");
  deductions1.val(allsum);

  var amount = document.getElementById('amount').value;
  var deductions = document.getElementById('deductions').value;
  var result = parseFloat(amount).toFixed(2) - parseFloat(deductions).toFixed(2);
  if (!isNaN(result)) {

  document.getElementById('net').value = result.toFixed(2);

  }
  
  }
        

}


function myFunctionpagibig() {
  var tax = document.getElementById("tax").value;
  var gsis = document.getElementById("gsis").value;
  var pagibig = document.getElementById("pagibig").value;
  var philhealth = document.getElementById("philhealth").value;
  var other = document.getElementById("other").value;


  var deductions1 = $("input[name='deductions']");
  var net1 = $("input[name='net']");
  var pagibig1 = $("input[name='pagibig']");

  if(pagibig==''){
  net1.val('0');
  deductions1.val('0');
  //pagibig1.val('0');

  }
  else{
  var allsum = parseFloat(tax) + parseFloat(gsis) + parseFloat(pagibig) + parseFloat(philhealth) + parseFloat(other);

  var deductions1 = $("input[name='deductions']");
  deductions1.val(allsum);

  var amount = document.getElementById('amount').value;
  var deductions = document.getElementById('deductions').value;
  var result = parseFloat(amount).toFixed(2) - parseFloat(deductions).toFixed(2);
  if (!isNaN(result)) {

  document.getElementById('net').value = result.toFixed(2);

  }
  
  }
        

}

function myFunctionphilhealth() {
  var tax = document.getElementById("tax").value;
  var gsis = document.getElementById("gsis").value;
  var pagibig = document.getElementById("pagibig").value;
  var philhealth = document.getElementById("philhealth").value;
  var other = document.getElementById("other").value;


  var deductions1 = $("input[name='deductions']");
  var net1 = $("input[name='net']");
  var philhealth1 = $("input[name='philhealth']");

  if(philhealth==''){
  net1.val('0');
  deductions1.val('0');
  //philhealth1.val('0');

  }
  else{
  var allsum = parseFloat(tax) + parseFloat(gsis) + parseFloat(pagibig) + parseFloat(philhealth) + parseFloat(other);

  var deductions1 = $("input[name='deductions']");
  deductions1.val(allsum);

  var amount = document.getElementById('amount').value;
  var deductions = document.getElementById('deductions').value;
  var result = parseFloat(amount).toFixed(2) - parseFloat(deductions).toFixed(2);
  if (!isNaN(result)) {

  document.getElementById('net').value = result.toFixed(2);

  }
  
  }
        

}

function myFunctionother() {
  var tax = document.getElementById("tax").value;
  var gsis = document.getElementById("gsis").value;
  var pagibig = document.getElementById("pagibig").value;
  var philhealth = document.getElementById("philhealth").value;
  var other = document.getElementById("other").value;


  var deductions1 = $("input[name='deductions']");
  var net1 = $("input[name='net']");
  var other1 = $("input[name='other']");

  if(other==''){
  net1.val('0');
  deductions1.val('0');
  //other1.val('0');

  }
  else{
  var allsum = parseFloat(tax) + parseFloat(gsis) + parseFloat(pagibig) + parseFloat(philhealth) + parseFloat(other);

  var deductions1 = $("input[name='deductions']");
  deductions1.val(allsum);

  var amount = document.getElementById('amount').value;
  var deductions = document.getElementById('deductions').value;
  var result = parseFloat(amount).toFixed(2) - parseFloat(deductions).toFixed(2);
  if (!isNaN(result)) {
  
  document.getElementById('net').value = result.toFixed(2);

  }
  
  }
        

}

  $( "#" ).click(function() {
    
    var mode = $('#mode').val();
    var ors = $('#ors').val();
    var ors1 = $('#ors1').val();
    var orsdate = $('#orsdate').val();
    var dv = $('#dv').val();
    var dvdate = $('#datepicker2').val();
    var payee = $('#payee').val();
    var particular = $('#particular').val();
    var net = $('#net').val();
    var amount = $('#amount').val();
    var deductions = $('#deductions').val();

    var tax = $('#tax').val();
    var gsis = $('#gsis').val();
    var pagibig = $('#pagibig').val();
    var philhealth = $('#philhealth').val();
    var other = $('#other').val(); 
    var remarks = $('#remarks').val(); 
    var status = $('#status').val(); 


    var charge1 = $('#charge').val(); 
    var charge = JSON.stringify(charge1);

    var ntano1 = $('#ntano').val(); 
    var ntano = JSON.stringify(ntano1);

    var ntaamount1 = $('#ntaamount').val(); 
    var ntaamount = JSON.stringify(ntaamount1);
    // alert(charge);

    /* var users = $('input[name="charge[]"]').map(function(){ 
    return this.value; 
    }).get();
    var users = $('input[name="ntano[]"]').map(function(){ 
    return this.value; 
    }).get();
    var users = $('input[name="amount[]"]').map(function(){ 
    return this.value; 
    }).get(); */



    if(dv==""){
      alert('DV no. is a required field.');
    }
    else{
      $.ajax({
        url: "Disbursement_create_function.php",
        type: "post",
        data: {mode : mode,
        charge : charge,
        ntano : ntano,
        ntaamount : ntaamount,
        ors : ors, 
        ors1 : ors1, 
        orsdate : orsdate, 
        dv : dv, 
        dvdate : dvdate, 
        payee : payee, 
        particular : particular, 
        net : net, 
        amount : amount, 
        deductions : deductions,
        tax : tax, 
        gsis : gsis, 
        pagibig : pagibig, 
        philhealth : philhealth,
        other : other,
        remarks : remarks,
        status : status,
        charge : charge,
        ntano : ntano,
        amount : amount},
        success : function(data){
        alert(data); /* alerts the response from php.*/
        window.location.href='disbursement.php';
        }
        });

    }


   

    // alert(mode);

});

