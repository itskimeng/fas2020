
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


  function myFunction(orsget) {

    //getting from data-id from link
    var ors = orsget.getAttribute("data-ors");
    var flag = orsget.getAttribute("data-flag");

    var ors1 = $("input[name='ors1']");
    var ors11 = $("input[name='ors11']");

    ors1.val(flag);
    ors11.val(ors);


    $(document).ready(function(){

    var ors = orsget.getAttribute("data-ors");
    var flag = $('#ors1').val();
    // alert(flag);



    $('#example').DataTable().destroy();
    dataT();

    });

    function dataT(){

    // var filter_data ='0001';


    var table = $('#example').DataTable( {


    'paging'      : true,
    'lengthChange': false,
    'searching'   : true,
    'ordering'    : false,
    'info'        : false,
    'autoWidth'   : false,  
    "processing": true,
    "serverSide": false,
    // "columnDefs": [{"render": createManageBtn, "data": null, "targets": [6]}],

    "ajax": {
    "url": "DATATABLE/DV_data.php",
    "type": "POST",
    "data": {
    "filter_data": ors,
    "flag": flag,


    }}

    } );


    $('#example tbody').on( 'click', '#editORS', function () {
    var data = table.row( $(this).parents('tr') ).data();
    window.location="obupdate.php?getid="+data[0];
    });

    $('#example tbody').on( 'click', '#delete', function () {
    var data = table.row( $(this).parents('tr') ).data();
    window.location="@Functions/obdeletefunction.php?getidDelete="+data[0];
    });


    function createManageBtn() {


    return '<a  class="btn btn-primary btn-xs" onclick="myFunc()" id="editORS"><i class="fa">&#xf044;</i>&nbsp;&nbsp;Edit&nbsp;&nbsp;</a> | <a  class="btn btn-danger btn-xs" onclick="myFunc()" onclick="" id="delete"><i class="fa fa-trash-o"></i>  Delete</a>';



    }
    function myFunc() {
    confirm("Are you sure you want to delete this obligation?")
    console.log("Button was clicked!!!");
    // alert(data[0]);
    }





    }


  }

  $(document).ready(function(){
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

  })
  $(function () {
    $('#').DataTable()
    $('#').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : false,
      'info'        : true,
      'autoWidth'   : true,
      "scrollX": true
    })
  })

  $(function () {
    $('#example1').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : false,
      'info'        : false,
      'autoWidth'   : false
    })
  })