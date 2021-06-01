
    window.onload=function(){ 
        var counter = 5//Math.floor(Math.random() * 60) + 1; // set the timer
        var interval = setInterval(function() {
            counter--;
           $("#seconds").text(counter);
           if (counter == 0) {
            sendNotification();
            updateStatus();
            if($('#id').val() == null)
                {
                clearInterval(interval);
                }else{
                counter = 60;
                }
        }
        },1000);
    };

    function sendNotification()
    {

        var queryString = $('#submit').serialize();
        $.ajax({
            type: "GET",
            url: "http://192.168.43.136:8080/send/?" + queryString + "",
            data: $("#submit").serialize(),
            success: function(data) {
                if($('#id').val() == null)
                {
                    console.log("donE");
                }else{
                        setTimeout(function() {
                        window.location = window.location
                        },500);
                    }   
                }
            }).done(function() {
                console.log("done");
            }).fail(function() {
                // failedMessage();
            });

    }
    function updateStatus()
    {
        var title_id = $('#title_id').val();
        $.ajax({
            type: "POST",
            url: "update.php",
            data: {
                id: title_id
            },
            success: function(){
                console.log("Update Successfully");
            }
        });
        
    }
   