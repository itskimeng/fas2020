
<?php require_once 'dashboard_tiles/controller/dashboardController.php'; ?>

<?php if ($_SESSION['OFFICE_STATION'] != 1): ?>
  <?php require_once 'dashboard_tiles/dtr_function.php'; ?>
<?php endif ?>


<div class="col-md-12">
  <div class="row">
    <?php include 'dashboard_tiles/standard_time.php'; ?> 
    <?php include 'dashboard_tiles/calendar_events.php'; ?>
  </div>
</div>

<div class="col-md-12">
  <div class="row">

    <?php if ($_SESSION['OFFICE_STATION'] != 1): ?>
        <?php include 'dashboard_tiles/online_dtr.php'; ?>
    <?php else: ?>
        <?php include 'dashboard_tiles/latest_memo.php'; ?>
    <?php endif ?>


    <?php include 'dashboard_tiles/announcements.php'; ?>
    <?php include 'dashboard_tiles/birthday_celebrants.php'; ?>
  </div>
</div>

<div class="col-md-12">
  <div class="row">
    <?php include 'dashboard_tiles/employees.php'; ?>
    <?php include 'dashboard_tiles/procurements.php'; ?>
    <?php include 'dashboard_tiles/obligations.php'; ?>
  </div>
</div>

<div class="col-md-12">
  <div class="row">
    <?php include 'dashboard_tiles/issuances.php'; ?>
    <?php include 'dashboard_tiles/disbursement.php'; ?>
    <?php include 'dashboard_tiles/payment.php'; ?>
  </div>
</div>


<style type="text/css">
  .info-box {
        box-shadow: 0 1px 2px rgb(0 0 0 / 47%);
  }
</style>

<script>
  $(document).ready(function(){

    $("#ck").click(function(){
      if($(this).prop("checked") == true){
        $('#s3').prop("disabled", false);
        $('#s2').prop("disabled", false);
      }
      else if($(this).prop("checked") == false){
        $('#s3').prop("disabled", true);
        $('#s2').prop("disabled", true);
      }
    });
  });
</script>
<script>
  document.getElementById('to').onchange = function() {
    document.getElementById('t_o').disabled = !this.checked;
  };
  function yesnoCheck() {
    $(".H1").hide();
    $(".H2").show();
    if ($('#to').is(':checked')) {

    }else{
      $(".H1").show();
      $(".H2").hide();
    }
  }

  document.getElementById('ob').onchange = function() {
    document.getElementById('o_b').disabled = !this.checked;
  };
  function yesnoCheck1() {
    $(".H1").hide();
    $(".H22").show();
    if ($('#ob').is(':checked')) {
    }else{
      $(".H1").show();
      $(".H22").hide();
    }
  }

</script>