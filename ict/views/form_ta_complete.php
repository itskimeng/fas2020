<?php include 'controller/TechnicalAssistanceController.php'; ?>

<div class="content-wrapper">
  <section class="content-header">
    <h1>ICT Technical Assistance</h1>

    <ol class="breadcrumb">
      <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">ICT TA</a></li>
      <li class="active">Create ICT TA Request</li>
    </ol>
  </section>
  <section class="content">
    <div class="box">
      <div class="panel panel-default">
        <div class="box-body">
          <div class="row">
            <div class="col-md-12 ">
              <?php include('_panel/view_info.php'); ?>
            </div>
          <div class="row">
            <div class="col-md-4">
              <?php include('_panel/filter_pr.html.php'); ?>  
            </div>

            <div class="col-md-8">
           
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<?php //include('css.html.php');
?>
<?php //include('modal_edit.html.php'); 
?>
<?php //include('modal_delete.html.php'); 
?>