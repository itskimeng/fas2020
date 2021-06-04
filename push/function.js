var days = $('#days').val();
var dateSet = $('#dateSet').val();
var today = new Date();
var dd = String(today.getDate()).padStart(2, '0');
var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
var yyyy = today.getFullYear();
var curdate = '';
today = yyyy + '-' + mm + '-' + dd;

$.ajax({
    url: 'push/check.php',
    dataType: 'json',
    cache: false,
    success: function(data) {
        curdate = data.date;
        if (today == curdate || today == dateSet) {
               window.onload = function () {
                   var counter = 5//Math.floor(Math.random() * 60) + 1; // set the timer
                   var interval = setInterval(function () {
                       counter--;
                       $("#seconds").text(counter);
                       if (counter == 0) {
                           sendNotification();
                           updateStatus();
                           if ($('#id').val() == null) {
                               clearInterval(interval);
                           } else {
                               counter = 60;
                           }
                       }
                   }, 1000);
               };
           
               function sendNotification() {
           
                   var queryString = $('#submit').serialize();
                   $.ajax({
                       type: "GET",
                       url: "http://192.168.43.1:8080/send/?" + queryString + "",
                       data: $("#submit").serialize(),
                       success: function (data) {
                           if ($('#id').val() == null) {
                               console.log("donE");
                           } else {
                               setTimeout(function () {
                                   window.location = window.location
                               }, 500);
                           }
                       }
                   }).done(function () {
                       console.log("done");
                   }).fail(function () {
                   });
           
               }
           
               function updateStatus() {
                   var title_id = $('#title_id').val();
                   $.ajax({
                       type: "POST",
                       url: "push/update.php",
                       data: {
                           id: title_id
                       },
                       success: function () {
                           console.log("Update Successfully");
                       }
                   });
           
               }
             
           } else {
               console.log('not');
           }
    }
});



  

