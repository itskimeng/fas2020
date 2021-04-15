<?php require_once 'bower_components/phpti-master/src/ti.php'; ?>

<?php include('base_call_connect.php'); ?> 
<?php include('connection.php'); ?> 

<!DOCTYPE html>
<html>
  <head>
    <link rel="shortcut icon" type="image/png" href="dilg.png">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>FAS | <?php emptyblock('title'); ?></title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    
    <!-- all sets will be loaded here -->
    <?php startblock('assets'); ?>
      <?php include 'base_menu.css.php'; ?>
    
      <script src="calendar/fullcalendar/lib/jquery.min.js"></script>
      <script src="calendar/fullcalendar/lib/moment.min.js"></script>
      <script src="calendar/fullcalendar/fullcalendar.min.js"></script>
    
      <?php include 'base_menu.js.php'; ?>
    <?php endblock() ?>
    <!-- end all -->

  </head>
  <body >
    <!-- <?php //startblock('sidebar'); ?> -->
      <?php include 'base_call_sidebar.php'; ?>
    <!-- <?php //endblock(); ?> -->

    <div class="wrapper">
      <!-- all contents will be included here -->
      <?php emptyblock('content'); ?>
      <!-- end all -->
    </div>
    
    <div id="footer">
      <?php startblock('footer'); ?>
        <?php include 'base_footer.html.php'; ?>
      <?php endblock(); ?>
    </div>
    </body>
</html>

