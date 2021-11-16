var coll = document.getElementsByClassName("collapsible");
var i;

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("activecollap");
    var content = this.nextElementSibling;
    if (content.style.display === "block") {
      content.style.display = "none";
    } else {
      content.style.display = "block";
    }
  });
}
$('#submit').click(function() {

  var cb1 = document.getElementById("checkboxgroup_g1").checked;
  var cb2 = document.getElementById("checkboxgroup_g2").checked;
  var cb3 = document.getElementById("checkboxgroup_g3").checked;
  var cb4 = document.getElementById("checkboxgroup_g4").checked;
  var cb5 = document.getElementById("checkboxgroup_g5").checked;
  var cb6 = document.getElementById("checkboxgroup_g6").checked;
  var cb7 = document.getElementById("checkboxgroup_g7").checked;
  var cb8 = document.getElementById("checkboxgroup_g8").checked;
  var cb9 = document.getElementById("checkboxgroup_g9").checked;


  if (cb1 == '' && cb2 == '' && cb3 == '' && cb4 == '' && cb5 == '' && cb6 == '' && cb7 == '' && cb8 == '' && cb9 == '') {
    alert('Required Field:Choose at least one Type of Request');
    return false;
  }
  return true;
})
$(function() {

  //Date picker,
  $(".datePicker1").datepicker({
    changeMonth: true,
    changeYear: true,
    yearRange: "1950:2020",
    dateFormat: 'M dd, yy'
  });
  $(".datePicker1").datepicker().datepicker("setDate", new Date());


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







$(function() {
  enable_cb1();
  enable_cb2();
  enable_cb3();
  enable_cb4();
  enable_cb5();
  enable_cb6();
  enable_cb7();
  enable_cb8();
  enable_cb9();
  $("#checkboxgroup_g1").click(enable_cb1);
  $("#checkboxgroup_g2").click(enable_cb2);
  $("#checkboxgroup_g3").click(enable_cb3);
  $("#checkboxgroup_g4").click(enable_cb4);
  $("#checkboxgroup_g5").click(enable_cb5);
  $("#checkboxgroup_g6").click(enable_cb6);
  $("#checkboxgroup_g7").click(enable_cb7);
  $("#checkboxgroup_g8").click(enable_cb8);
  $("#checkboxgroup_g9").click(enable_cb9);





});
$('#cb3_4').on('change', function(e) {
  if (e.target.checked) {
    $('#myModal').modal();
  }
});


































function enable_cb1() {
  if (this.checked) {
    if($('.checkboxgroup_g1').val() == '1')
      {
        $('#cb1').not(this).prop('checked', true);
        $("input.txt1").attr("disabled",true);
        $("input.txt2").attr("disabled",true);
        $("input.txt3").attr("disabled",true);
        $("input.txt4").attr("disabled",true);
      }

    // $('#others1').val('');
    // $('#others2').val('');
    // $('#others3').val('');



    $(".checkboxgroup_g1").removeAttr("disabled");
    $(".checkboxgroup_g2").attr("disabled", true);
    $(".checkboxgroup_g3").attr("disabled", true);
    $(".checkboxgroup_g4").attr("disabled", true);
    $(".checkboxgroup_g5").attr("disabled", true);
    $(".checkboxgroup_g6").attr("disabled", true);
    $(".checkboxgroup_g7").attr("disabled", true);
    $(".checkboxgroup_g8").attr("disabled", true);
    $(".checkboxgroup_g9").attr("disabled", true);

    $('.checkboxgroup_g2').not(this).prop('checked', false);
    $('.checkboxgroup_g3').not(this).prop('checked', false);
    $('.checkboxgroup_g4').not(this).prop('checked', false);
    $('.checkboxgroup_g5').not(this).prop('checked', false);
    $('.checkboxgroup_g6').not(this).prop('checked', false);
    $('.checkboxgroup_g7').not(this).prop('checked', false);
    $('.checkboxgroup_g8').not(this).prop('checked', false);
    $('.checkboxgroup_g9').not(this).prop('checked', false);




  } else {

    $('.checkboxgroup_g1').not(this).prop('checked', false);


    $(".checkboxgroup_g1").attr("disabled", true);
    $(".checkboxgroup_g2").attr("disabled", true);
    $(".checkboxgroup_g3").attr("disabled", true);
    $(".checkboxgroup_g4").attr("disabled", true);
    $(".checkboxgroup_g5").attr("disabled", true);
    $(".checkboxgroup_g6").attr("disabled", true);
    $(".checkboxgroup_g7").attr("disabled", true);
    $(".checkboxgroup_g8").attr("disabled", true);
    $(".checkboxgroup_g9").attr("disabled", true);

  }
}

function enable_cb2() {
  if (this.checked) {
    if ($('.checkboxgroup_g2').val() == '6') {
      $('#cb2').not(this).prop('checked', true);
      $("#portals").removeAttr("disabled");
      $("input.txt1").attr("disabled",true);
        $("input.txt2").attr("disabled",true);
        $("input.txt3").attr("disabled",true);
        $("input.txt4").attr("disabled",true);
 
    }




    $(".checkboxgroup_g2").removeAttr("disabled");
    $('.checkboxgroup_g1').not(this).prop('checked', false);

    $(".checkboxgroup_g1").attr("disabled", true);
    $(".checkboxgroup_g3").attr("disabled", true);
    $(".checkboxgroup_g4").attr("disabled", true);
    $(".checkboxgroup_g5").attr("disabled", true);
    $(".checkboxgroup_g6").attr("disabled", true);
    $(".checkboxgroup_g6").attr("disabled", true);
    $(".checkboxgroup_g7").attr("disabled", true);
    $(".checkboxgroup_g8").attr("disabled", true);
    $(".checkboxgroup_g9").attr("disabled", true);


    $('.checkboxgroup_g3').not(this).prop('checked', false);
    $('.checkboxgroup_g4').not(this).prop('checked', false);
    $('.checkboxgroup_g5').not(this).prop('checked', false);
    $('.checkboxgroup_g6').not(this).prop('checked', false);
    $('.checkboxgroup_g7').not(this).prop('checked', false);
    $('.checkboxgroup_g8').not(this).prop('checked', false);
    $('.checkboxgroup_g9').not(this).prop('checked', false);
  } else {
    // $('#site').val('');
    // $('#purpose').val('');
    // $('#purpose2').val('');

    $('.checkboxgroup_g2').not(this).prop('checked', false);

    $(".checkboxgroup_g1").attr("disabled", true);
    $(".checkboxgroup_g2").attr("disabled", true);
    $(".checkboxgroup_g3").attr("disabled", true);
    $(".checkboxgroup_g4").attr("disabled", true);
    $(".checkboxgroup_g5").attr("disabled", true);
    $(".checkboxgroup_g6").attr("disabled", true);
    $(".checkboxgroup_g7").attr("disabled", true);
    $(".checkboxgroup_g8").attr("disabled", true);
    $(".checkboxgroup_g9").attr("disabled", true);


    // document.getElementById("site").disabled = true;
    // document.getElementById("purpose").disabled = true;
    // document.getElementById("purpose2").disabled = true;
  }
}

function enable_cb3() {
  if (this.checked) {
    if ($('.checkboxgroup_g3').val() == '10') {
      $('#cb3').not(this).prop('checked', true);
      $("input.txt1").attr("disabled",true);
        $("input.txt2").attr("disabled",true);
        $("input.txt3").attr("disabled",true);
        $("input.txt4").attr("disabled",true);
    }
    // $('#site').val('');
    // $('#purpose').val('');
    // $('#purpose2').val('');
    // $('#softwares').val('');
    // $('#changeaccount').val('');
    // $('#others1').val('');
    // $('#others2').val('');
    // $('#others3').val('');

    $(".checkboxgroup_g3").removeAttr("disabled");
    // document.getElementById("softwares").disabled = false;
    $(".checkboxgroup_g1").attr("disabled", true);
    $(".checkboxgroup_g2").attr("disabled", true);
    $(".checkboxgroup_g4").attr("disabled", true);
    $(".checkboxgroup_g5").attr("disabled", true);
    $(".checkboxgroup_g6").attr("disabled", true);
    $(".checkboxgroup_g7").attr("disabled", true);
    $(".checkboxgroup_g8").attr("disabled", true);
    $(".checkboxgroup_g9").attr("disabled", true);

    $('.checkboxgroup_g1').not(this).prop('checked', false);
    $('.checkboxgroup_g2').not(this).prop('checked', false);
    $('.checkboxgroup_g4').not(this).prop('checked', false);
    $('.checkboxgroup_g5').not(this).prop('checked', false);
    $('.checkboxgroup_g6').not(this).prop('checked', false);
    $('.checkboxgroup_g7').not(this).prop('checked', false);
    $('.checkboxgroup_g8').not(this).prop('checked', false);
    $('.checkboxgroup_g9').not(this).prop('checked', false);

  } else {
    // document.getElementById("softwares").disabled = true;

    // $('#softwares').val('');
    $('.checkboxgroup_g3').not(this).prop('checked', false);

    $(".checkboxgroup_g1").attr("disabled", true);
    $(".checkboxgroup_g2").attr("disabled", true);
    $(".checkboxgroup_g3").attr("disabled", true);
    $(".checkboxgroup_g4").attr("disabled", true);
    $(".checkboxgroup_g5").attr("disabled", true);
    $(".checkboxgroup_g6").attr("disabled", true);
    $(".checkboxgroup_g7").attr("disabled", true);
    $(".checkboxgroup_g8").attr("disabled", true);
    $(".checkboxgroup_g9").attr("disabled", true);


  }
}

function enable_cb4() {
  if (this.checked) {
    if ($('.checkboxgroup_g4').val() == '13') {
      $('#cb4').not(this).prop('checked', true);
      $("input.txt1").removeAttr("disabled");
      $("input.txt1").prop("required",true);
      $("input.txt3").attr("disabled",true);
        $("input.txt4").attr("disabled",true);
    }
    
  


    $(".checkboxgroup_g4").removeAttr("disabled");
    $(".checkboxgroup_g1").attr("disabled", true);
    $(".checkboxgroup_g2").attr("disabled", true);
    $(".checkboxgroup_g3").attr("disabled", true);
    $(".checkboxgroup_g5").attr("disabled", true);
    $(".checkboxgroup_g6").attr("disabled", true);
    $(".checkboxgroup_g7").attr("disabled", true);
    $(".checkboxgroup_g8").attr("disabled", true);
    $(".checkboxgroup_g9").attr("disabled", true);


    $('.checkboxgroup_g1').not(this).prop('checked', false);
    $('.checkboxgroup_g2').not(this).prop('checked', false);
    $('.checkboxgroup_g3').not(this).prop('checked', false);
    $('.checkboxgroup_g5').not(this).prop('checked', false);
    $('.checkboxgroup_g6').not(this).prop('checked', false);
    $('.checkboxgroup_g7').not(this).prop('checked', false);
    $('.checkboxgroup_g8').not(this).prop('checked', false);
    $('.checkboxgroup_g9').not(this).prop('checked', false);
    
  } else {
    $('.checkboxgroup_g4').not(this).prop('checked', false);
    $("input.txt1").attr("disabled",true);
    $("input.txt2").attr("disabled",true);
    $(".checkboxgroup_g1").attr("disabled", true);
    $(".checkboxgroup_g2").attr("disabled", true);
    $(".checkboxgroup_g3").attr("disabled", true);
    $(".checkboxgroup_g4").attr("disabled", true);
    $(".checkboxgroup_g5").attr("disabled", true);
    $(".checkboxgroup_g6").attr("disabled", true);
    $(".checkboxgroup_g7").attr("disabled", true);
    $(".checkboxgroup_g8").attr("disabled", true);
    $(".checkboxgroup_g9").attr("disabled", true);
  }
}

function enable_cb5() {
  if (this.checked) {
    // document.getElementById("changeaccount").disabled = false;
    if ($('.checkboxgroup_g5').val() == '20') {
      $('#cb5').not(this).prop('checked', true);
      $("input.txt1").attr("disabled",true);
        $("input.txt2").attr("disabled",true);
        $("input.txt3").attr("disabled",true);
        $("input.txt4").attr("disabled",true);
    }
    // $('#site').val('');
    // $('#purpose').val('');
    // $('#purpose2').val('');
    // $('#softwares').val('');
    // $('#changeaccount').val('');
    $('#others1').val('');
    $('#others2').val('');
    $('#others3').val('');



    $(".checkboxgroup_g5").removeAttr("disabled");
    $(".checkboxgroup_g1").attr("disabled", true);
    $(".checkboxgroup_g2").attr("disabled", true);
    $(".checkboxgroup_g3").attr("disabled", true);
    $(".checkboxgroup_g4").attr("disabled", true);
    $(".checkboxgroup_g6").attr("disabled", true);
    $(".checkboxgroup_g7").attr("disabled", true);
    $(".checkboxgroup_g8").attr("disabled", true);
    $(".checkboxgroup_g9").attr("disabled", true);

    $('.checkboxgroup_g1').not(this).prop('checked', false);
    $('.checkboxgroup_g2').not(this).prop('checked', false);
    $('.checkboxgroup_g3').not(this).prop('checked', false);
    $('.checkboxgroup_g4').not(this).prop('checked', false);
    $('.checkboxgroup_g6').not(this).prop('checked', false);
    $('.checkboxgroup_g7').not(this).prop('checked', false);
    $('.checkboxgroup_g8').not(this).prop('checked', false);
    $('.checkboxgroup_g9').not(this).prop('checked', false);

  } else {
    // document.getElementById("changeaccount").disabled = true;
    // $('#changeaccount').val('');
    $('.checkboxgroup_g5').not(this).prop('checked', false);

    $(".checkboxgroup_g1").attr("disabled", true);
    $(".checkboxgroup_g2").attr("disabled", true);
    $(".checkboxgroup_g3").attr("disabled", true);
    $(".checkboxgroup_g4").attr("disabled", true);
    $(".checkboxgroup_g5").attr("disabled", true);
    $(".checkboxgroup_g6").attr("disabled", true);
    $(".checkboxgroup_g7").attr("disabled", true);
    $(".checkboxgroup_g8").attr("disabled", true);
    $(".checkboxgroup_g9").attr("disabled", true);



  }
}

function enable_cb6() {
  if (this.checked) {
    if($('.checkboxgroup_g6').val() == '22')
      {
        $('#cb6').not(this).prop('checked', true);
        $("input.txt1").attr("disabled",true);
        $("input.txt2").attr("disabled",true);
        $("input.txt3").attr("disabled",true);
        $("input.txt4").attr("disabled",true);
      };


    // $('#others1').val('');
    // $('#others2').val('');
    // $('#others3').val('');



    $(".checkboxgroup_g6").removeAttr("disabled");
    $(".checkboxgroup_g2").attr("disabled", true);
    $(".checkboxgroup_g3").attr("disabled", true);
    $(".checkboxgroup_g4").attr("disabled", true);
    $(".checkboxgroup_g5").attr("disabled", true);
    $(".checkboxgroup_g1").attr("disabled", true);
    $(".checkboxgroup_g7").attr("disabled", true);
    $(".checkboxgroup_g8").attr("disabled", true);
    $(".checkboxgroup_g9").attr("disabled", true);

    $('.checkboxgroup_g1').not(this).prop('checked', false);
    $('.checkboxgroup_g2').not(this).prop('checked', false);
    $('.checkboxgroup_g3').not(this).prop('checked', false);
    $('.checkboxgroup_g4').not(this).prop('checked', false);
    $('.checkboxgroup_g5').not(this).prop('checked', false);
    $('.checkboxgroup_g7').not(this).prop('checked', false);
    $('.checkboxgroup_g8').not(this).prop('checked', false);
    $('.checkboxgroup_g9').not(this).prop('checked', false);




  } else {

    $('.checkboxgroup_g6').not(this).prop('checked', false);


    $(".checkboxgroup_g1").attr("disabled", true);
    $(".checkboxgroup_g2").attr("disabled", true);
    $(".checkboxgroup_g3").attr("disabled", true);
    $(".checkboxgroup_g4").attr("disabled", true);
    $(".checkboxgroup_g5").attr("disabled", true);
    $(".checkboxgroup_g6").attr("disabled", true);
    $(".checkboxgroup_g7").attr("disabled", true);
    $(".checkboxgroup_g8").attr("disabled", true);
    $(".checkboxgroup_g9").attr("disabled", true);

  }
}

function enable_cb7() {
  if (this.checked) {
    if ($('.checkboxgroup_g7').val() == '24') {
      $('#cb7').not(this).prop('checked', true);
      $("input.txt1").attr("disabled",true);
        $("input.txt2").attr("disabled",true);
        $("input.txt3").attr("disabled",true);
        $("input.txt4").attr("disabled",true);
    }else{
      $('#cb7').not(this).prop('checked', false);

    }
    // $('#site').val('');
    // $('#purpose').val('');
    // $('#purpose2').val('');
    // $('#softwares').val('');
    // $('#changeaccount').val('');
    // $('#others1').val('');
    // $('#others2').val('');
    // $('#others3').val('');



    $(".checkboxgroup_g1").attr("disabled", true);
    $(".checkboxgroup_g2").attr("disabled", true);
    $(".checkboxgroup_g3").attr("disabled", true);
    $(".checkboxgroup_g4").attr("disabled", true);
    $(".checkboxgroup_g5").attr("disabled", true);
    $(".checkboxgroup_g6").attr("disabled", true);
    $(".checkboxgroup_g7").removeAttr("disabled");
    $(".checkboxgroup_g8").attr("disabled", true);
    $(".checkboxgroup_g9").attr("disabled", true);

    $('.checkboxgroup_g1').not(this).prop('checked', false);
    $('.checkboxgroup_g2').not(this).prop('checked', false);
    $('.checkboxgroup_g3').not(this).prop('checked', false);
    $('.checkboxgroup_g4').not(this).prop('checked', false);
    $('.checkboxgroup_g5').not(this).prop('checked', false);
    $('.checkboxgroup_g6').not(this).prop('checked', false);
    $('.checkboxgroup_g8').not(this).prop('checked', false);
    $('.checkboxgroup_g9').not(this).prop('checked', false);




  } else {

    $('.checkboxgroup_g7').not(this).prop('checked', false);


    $(".checkboxgroup_g1").attr("disabled", true);
    $(".checkboxgroup_g2").attr("disabled", true);
    $(".checkboxgroup_g3").attr("disabled", true);
    $(".checkboxgroup_g4").attr("disabled", true);
    $(".checkboxgroup_g5").attr("disabled", true);
    $(".checkboxgroup_g6").attr("disabled", true);
    $(".checkboxgroup_g7").attr("disabled", true);
    $(".checkboxgroup_g8").attr("disabled", true);
    $(".checkboxgroup_g9").attr("disabled", true);

  }
}

function enable_cb8() {
  if (this.checked) {
    if ($('.checkboxgroup_g8').val() == '32') {
      $('#cb9').not(this).prop('checked', true);
      $("input.txt1").attr("disabled",true);
        $("input.txt2").attr("disabled",true);
        $("input.txt3").attr("disabled",true);
        $("input.txt4").attr("disabled",true);
    }
    // $('#site').val('');
    // $('#purpose').val('');
    // $('#purpose2').val('');
    // $('#softwares').val('');
    // $('#changeaccount').val('');
    $('#others1').val('');
    $('#others2').val('');
    $('#others3').val('');



    $(".checkboxgroup_g1").attr("disabled", true);
    $(".checkboxgroup_g2").attr("disabled", true);
    $(".checkboxgroup_g3").attr("disabled", true);
    $(".checkboxgroup_g4").attr("disabled", true);
    $(".checkboxgroup_g5").attr("disabled", true);
    $(".checkboxgroup_g6").attr("disabled", true);
    $(".checkboxgroup_g7").attr("disabled", true);
    $(".checkboxgroup_g8").removeAttr("disabled");
    $(".checkboxgroup_g9").attr("disabled", true);

    $('.checkboxgroup_g1').not(this).prop('checked', false);
    $('.checkboxgroup_g2').not(this).prop('checked', false);
    $('.checkboxgroup_g3').not(this).prop('checked', false);
    $('.checkboxgroup_g4').not(this).prop('checked', false);
    $('.checkboxgroup_g5').not(this).prop('checked', false);
    $('.checkboxgroup_g6').not(this).prop('checked', false);
    $('.checkboxgroup_g7').not(this).prop('checked', false);
    $('.checkboxgroup_g9').not(this).prop('checked', false);




  } else {

    $('.checkboxgroup_g8').not(this).prop('checked', false);


    $(".checkboxgroup_g1").attr("disabled", true);
    $(".checkboxgroup_g2").attr("disabled", true);
    $(".checkboxgroup_g3").attr("disabled", true);
    $(".checkboxgroup_g4").attr("disabled", true);
    $(".checkboxgroup_g5").attr("disabled", true);
    $(".checkboxgroup_g6").attr("disabled", true);
    $(".checkboxgroup_g7").attr("disabled", true);
    $(".checkboxgroup_g8").attr("disabled", true);
    $(".checkboxgroup_g9").attr("disabled", true);

  }
}

function enable_cb9() {

  if (this.checked) {
    if ($('.checkboxgroup_g4').val() == '9') {
      $('#cb4').not(this).prop('checked', true);
      $("input.txt1").removeAttr("disabled");
      $("input.txt2").attr("disabled",true);
        $("input.txt3").attr("disabled",true);
      $("input.txt4").prop("required",true);

    }
    $("#others1").removeAttr("disabled");
    $("input.txt1").attr("disabled",true);
    $("input.txt2").attr("disabled",true);
    $("input.txt3").attr("disabled",true);
    $("input.txt4").attr("disabled",false);







    $(".checkboxgroup_g1").attr("disabled", true);
    $(".checkboxgroup_g2").attr("disabled", true);
    $(".checkboxgroup_g3").attr("disabled", true);
    $(".checkboxgroup_g4").attr("disabled", true);
    $(".checkboxgroup_g5").attr("disabled", true);
    $(".checkboxgroup_g6").attr("disabled", true);
    $(".checkboxgroup_g7").attr("disabled", true);
    $(".checkboxgroup_g8").attr("disabled", true);
    $(".checkboxgroup_g9").removeAttr("disabled");

    $('.checkboxgroup_g1').not(this).prop('checked', false);
    $('.checkboxgroup_g2').not(this).prop('checked', false);
    $('.checkboxgroup_g3').not(this).prop('checked', false);
    $('.checkboxgroup_g4').not(this).prop('checked', false);
    $('.checkboxgroup_g5').not(this).prop('checked', false);
    $('.checkboxgroup_g6').not(this).prop('checked', false);
    $('.checkboxgroup_g7').not(this).prop('checked', false);
    $('.checkboxgroup_g8').not(this).prop('checked', false);




  } else {

    $('.checkboxgroup_g9').not(this).prop('checked', false);
    $("input.txt1").attr("disabled",true);
    $("input.txt2").attr("disabled",true);
    $("input.txt3").attr("disabled",true);
    $("input.txt4").attr("disabled",true);



    $(".checkboxgroup_g1").attr("disabled", true);
    $(".checkboxgroup_g2").attr("disabled", true);
    $(".checkboxgroup_g3").attr("disabled", true);
    $(".checkboxgroup_g4").attr("disabled", true);
    $(".checkboxgroup_g5").attr("disabled", true);
    $(".checkboxgroup_g6").attr("disabled", true);
    $(".checkboxgroup_g7").attr("disabled", true);
    $(".checkboxgroup_g8").attr("disabled", true);
    $(".checkboxgroup_g9").attr("disabled", true);

  }
}

$('.checkboxgroup_g1').on('change', function() {
  $('.checkboxgroup_g1').not(this).prop('checked', false);
});
$('.checkboxgroup_g2').on('change', function() {
  $('.checkboxgroup_g2').not(this).prop('checked', false);
});
$('.checkboxgroup_g3').on('change', function() {
  $('.checkboxgroup_g3').not(this).prop('checked', false);
});
$('.checkboxgroup_g4').on('change', function() {
  $('.checkboxgroup_g4').not(this).prop('checked', false);
    $('.checkboxgroup_g4:checked').each(function(){
      if(this.value == "13")
      {
        $("input.txt1").removeAttr("disabled");
       

      }else if(this.value == "18")
      {
        $("input.txt1").attr("disabled",true);
        $("input.txt2").removeAttr("disabled");
        $("input.txt2").prop("required",true);

      }else{
        $("input.txt1").attr("disabled",true);
        $("input.txt2").attr("disabled",true);

      }
    })  
});
$('.checkboxgroup_g5').on('change', function() {
  $('.checkboxgroup_g5').not(this).prop('checked', false);
});
$('.checkboxgroup_g6').on('change', function() {
  $('.checkboxgroup_g6').not(this).prop('checked', false);
  
});

$('.checkboxgroup_g7').on('change', function() {
  $('.checkboxgroup_g7').not(this).prop('checked', false);
  $('.checkboxgroup_g7:checked').each(function(){
      if(this.value == "30")
      {
        $("input.txt3").removeAttr("disabled");
        $("input.txt3").prop("required",true);
      }else{
        $("input.txt3").attr("disabled",true);

      }
    })  
});


$('.checkbox_group').on('change', function() {
  $('.checkbox_group').not(this).prop('checked', false);
  $('.checkboxsubgroup7').not(this).prop('checked',false);

});

$('.checkboxsubgroup7').on('change', function() {
  $('.checkboxsubgroup7').not(this).prop('checked', false);
  
});




// DATE PICKER
$(function() {
  $(".datePicker1").datepicker({
    changeMonth: true,
    changeYear: true,
    yearRange: "1950:2020",
    dateFormat: 'M dd, yy'
  });
  $(".datePicker2").datepicker({
    changeMonth: true,
    changeYear: true,
    yearRange: "1950:2020",
    dateFormat: 'M dd, yy'
  });
  $(".datePicker3").datepicker({
    changeMonth: true,
    changeYear: true,
    yearRange: "1950:2020",
    dateFormat: 'M dd, yy'
  });


});
