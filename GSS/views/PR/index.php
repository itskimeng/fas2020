<!-- <div id="overlay">
<img src="images/loading.gif" style=" position: fixed; left: 700px; top:250px; z-index: 9999;" /> 
</div>

<script>
  $(' overlay').fadeOut(3000);
</script>
<style>
  #overlay {
   position: fixed; 
   height: 100%; 
   width: 100%; 
   top:0; 
   left: 0; 
   background-color:#fff;
   z-index:9999;
   padding-top: 10px;
   opacity: 0.7;
 }


</style> -->
<style>
.shake {
    animation-name: shake;
    animation-duration: 1s;
    animation-fill-mode: both;
}

@keyframes shake {

    0%,
    100% {
        transform: translateX(0);
    }

    10%,
    30%,
    50%,
    70%,
    90% {
        transform: translateX(-10px);
    }

    20%,
    40%,
    60%,
    80% {
        transform: translateX(10px);
    }
}
</style>
<?php require_once 'GSS/controller/PurchaseRequestController.php'; ?>
<?php $menuchecker = menuChecker('procurement'); ?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>Purchase Request</h1>

        <ol class="breadcrumb">
            <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Procurement</a></li>
            <li class="active">Purchase Request</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <?php include('_panel/box.html.php'); ?>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="w3-panel w3-pale-red w3-border w3-leftbar w3-border-red">
                    <h3>REMINDER!</h3>
                    <div><label class="label label-danger">URGENT</label> - the status of this purchase request is
                        urgent and must be processed on the date submitted by the user. </div><br>
                </div>
            </div>
        </div>
        <div class="row">

            <div class="col-md-12">
                <?php include('_panel/purchase_request_tab.php'); ?>

            </div>
        </div>
    </section>
</div>

<!-- show pending pr -->
<div class="modal fade" id="pendingModal" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" style="border-radius:20px;">
            <div class="modal-header">

                
                <div id="box">
                <h4 class="modal-title"><img src="images/pending.png" style="width:40px;height:40px" /> <i>List of
                        Unfinished Purchase
                        Request</i></h4>
                    <div id="inside_box" class="w3-panel w3-pale-red w3-border w3-leftbar w3-border-red"
                        style="border-radius:20px;">
                        <h3>REMINDER!</h3>
                        <div>Please complete your unfinished purchase request to make another one</div><br>
                    </div>
                </div>
            </div>
            <div class="modal-body">
                <table id="pendingTable" class="table table-bordered table-striped" role="grid">
                    <thead>
                        <tr>
                            <th class="text-center">PR NUMBER</th>
                            <th class="text-center">OFFICE</th>
                            <th class="text-center">PURPOSE</th>
                            <th class="text-center">PRICE</th>
                            <th class="text-center">PR DATE</th>
                            <th class="text-center">ACTION</th>
                        </tr>
                    </thead>
                    <tbody id="tbody-pending">
                        <?php foreach($pending_pr as $key => $item):?>
                        <tr>
                            <td><?= $item['pr_no'];?></td>
                            <td><?= $item['pmo'];?></td>
                            <td><?= $item['purpose'];?></td>
                            <td><?= $item['total_abc'];?></td>
                            <td><?= $item['pr_date'];?></td>
                            <td style="background-color:;" class=" text-center">
                                <button class="btn btn-success btn-sm btn-view" title="View">
                                    <a
                                        href="procurement_purchase_request_view.php?division=&amp;id=<?= $item['id'];?>&amp;pr_no=<?= $item['pr_no'];?>">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                </button>
                                <button class="btn btn-danger btn-sm btn-view">
                                    <a
                                        href="GSS/route/post_to_budget.php?quarter=<?= $_GET['quarter'];?>&amp;division=&amp;pr_no=<?= $item['pr_no'];?>&amp;id=<?= $item['id'];?>">
                                        <i class="fa fa-share-square"></i>
                                    </a>
                                </button>
                                <button id="btn_submit_to_gss" disabled="" class="btn btn-primary btn-sm btn-view"
                                    title="Submit to GSS" data-id="<?= $item['id'];?>" value="<?= $item['pr_no'];?>">
                                    <i class="fa fa-send"></i>
                                </button>
                                <button id="sweet-4" class="btn btn-warning btn-sm btn-view" title="Cancel this PR"
                                    data-id="<?= $item['id'];?>" value="<?= $item['pr_no'];?>">
                                    <i class="fa fa-times-circle"></i>
                                </button>
                            </td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>