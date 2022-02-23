<!DOCTYPE html>
<html>
  <head>
    <link rel="shortcut icon" type="image/png" href="dilg.png">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>FAS | <?php emptyblock('title'); ?></title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    
    
    <!-- all assets will be loaded here -->
    <?php startblock('assets'); ?>
      <?php include 'base_menu.css.php'; ?>
    
      <script src="calendar/fullcalendar/lib/jquery.min.js"></script>
      <script src="calendar/fullcalendar/lib/moment.min.js"></script>
      <script src="calendar/fullcalendar/fullcalendar.min.js"></script>
      <script src="_includes/sweetalert.min.js"></script>
      <!-- izimodal -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/izimodal/1.5.1/js/iziModal.min.js"></script>
      
      <link href="_includes/sweetalert2.min.css" rel="stylesheet"/>
      <link rel="stylesheet" href="_includes/sweetalert.css">
      
      <!-- izimodal -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izimodal/1.5.1/css/iziModal.min.css"/>

    
      <?php include 'base_menu.js.php'; ?>
    <?php endblock() ?>
    <!-- end all -->

  </head>
  <body >

    <div class="wrapper">
      <?php emptyblock('content') ?>
      <?php require 'macro/macro.php'; ?>
    </div>
    
    </body>

    <button onclick="topFunction()" id="btn-move-top" class="btn-move-top" title="Go to top">
      <i class="fa fa-2x fa-arrow-circle-up"></i>
    </button>

    <script type="text/javascript">
      let btn_moveTop = document.getElementById("btn-move-top");
      window.onscroll = function() {scrollFunction()};

      function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
          btn_moveTop.style.display = "block";
        } else {
          btn_moveTop.style.display = "none";
        }
      }

      function topFunction() {
        $('body,html').animate({
            scrollTop : 0
        }, 500);
      }
    </script>
</html>

