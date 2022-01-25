<?php require_once 'GSS/controller/PurchaseRequestController.php'; ?>
<?php require_once 'GSS/controller/APPController.php'; ?>


<div class="content-wrapper">
  <section class="content-header">
    <h1>Purchase Request</h1>

    <ol class="breadcrumb">
      <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Procurement</a></li>
      <li class="active">Create Purchase Request</li>
    </ol>
  </section>
  <section class="content">
    <form id="form_pr_item">
      <div class="row">
        <div class="col-lg-12">
          <?php include 'pr.php'; ?>
        </div>     
        <?php include 'form_modal_pr.php'; ?>
       </div>
    </form>
</div>

</section>
</div>
