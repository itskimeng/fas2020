<?php require_once 'Finance/controller/ObligationController.php'; ?>

<div class="content-wrapper">
  <section class="content-header">
    <h1>ORS/BURS</h1>
    
    <ol class="breadcrumb"> 
      <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li> 
      <li><a href="#">Finance</a></li>
      <li>Budget Section</li>
      <li class="active">ORS/BURS</li>
    </ol> 
  </section>
  <section class="content">
    <div class="row">
    	<?php include 'tiles/tile.php'; ?>
    </div>
    <div class="row">
      <div class="col-md-6">
        <?php include 'tiles/purchase_request.php'; ?>
      </div>
      
      <div class="col-md-6">
        <?php include 'tiles/purchase_order.php'; ?>
        
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12 col-6">
        <?php include 'tiles/table.php'; ?>
      </div>
    </div>
  </section>
</div>

<?php include 'modal_purchase_order.php'; ?>
<?php include 'modal_purchase_request.php'; ?>

<style type="text/css"><?php include 'custom_css.css'; ?></style>
<script type="text/javascript">
  $('#cform-filter_date_generated').datepicker({
    autoclose: true
  })

  $('#example2').DataTable({
    'lengthChange': false,
    'searching'   : true,
    'ordering'    : false,
    'info'        : true,
    'autoWidth'   : false
  });

  $(document).on('click', '#btn-advance_search', function(){
    let val = $(this).val();
    
    if (val == 'close') {
      $('.filter_buttons').removeClass('hidden');
      $(this).val('open');
      $(this).find('i').toggleClass('fa-search-plus fa-search-minus');
      $('.filter_buttons').show(1000);
      $('.filter_buttons').addClass('fadeInDown');
    } else {
      // $('.filter_buttons').addClass('hidden');
      $(this).val('close');
      $(this).find('i').toggleClass('fa-search-minus fa-search-plus');
      $('.filter_buttons').hide(1000);
      $('.filter_buttons').removeClass('fadeInDown');
    }
  });

</script>