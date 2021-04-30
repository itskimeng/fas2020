<div class="col-md-3 col-sm-6 col-xs-12">
    <div class="info-box" style="height: 165px;">
      <div class="panel-heading bg-blue">
        <table class="">
          <tr>
            <td class="col-md-0">
              <img class="direct-chat-img" src="images/male-user.png" alt="message user image">    
            </td>
            <td class="col-md-12" >
              <div style="overflow-x:auto; text-align: center;"> 
                <b>PHILIPPINES STANDARD TIME</b>
              </div> 
            </td>
            <td class="col-md-0">
              <img class="direct-chat-img" src="images/ph.png" alt="message user image">
            </td>
          </tr>
        </table>
      </div>
      <div class="text-center">
        <p><strong><h1 style="color:red;"><font  id="clock">--:--:--</font> <?php echo date('A')?></h1></strong></p>
      </div>
      <div class="text-center"><b><?php echo date('l, F d, Y')?></b></div>
    
      <script type="text/javascript">
        setInterval(displayclock, 1000);
        function displayclock(){
          var time = new Date();
          var hrs = time.getHours();
          var min = time.getMinutes();
          var sec = time.getSeconds();

          if (hrs > 12){
            hrs = hrs - 12;
          }

          if (hrs == 0) {
            hrs = 12;
          }
          if (min < 10) {
            min = '0' + min;
          }

          if (hrs < 10) {
            hrs = '0' + hrs;
          }

          if (sec < 10) {
            sec = '0' + sec;
          }

          document.getElementById('clock').innerHTML = hrs + ':' + min + ':' +sec;
        }
      </script>
    </div>
  </div>