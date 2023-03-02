<div class="modal fade" id="pendingModal" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" style="border-radius:20px;width:100%">
            <div class="modal-header">

                
                <div id="box">
                <h4 class="modal-title"><i>List of
                        Unfinished Purchase
                        Request</i></h4>
                    <div id="inside_box" class="w3-panel w3-pale-red w3-border w3-leftbar w3-border-red"
                        style="border-radius:20px;">
                        <h3><img src="images/pending.png" style="width:40px;height:40px" /> REMINDER!</h3>
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
                            <th class="text-center">STATUS</th>
                            <th class="text-center" style="width:20%;">ACTION</th>
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
                            <td><?= $item['remarks'];?></td>
                            <td style="background-color:;" class=" text-center">
                                <button class="btn btn-success btn-sm btn-view" title="View">
                                    <a
                                        href="procurement_purchase_request_view.php?division=&amp;id=<?= $item['id'];?>&amp;pr_no=<?= $item['pr_no'];?>">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                </button>
                                <?php if($item['status'] == 4):?>
                                    
                                <?php else:?>
                                <button class="btn btn-danger btn-sm btn-view">
                                    <a
                                        href="GSS/route/post_to_budget.php?quarter=<?= $_GET['quarter'];?>&amp;division=&amp;pr_no=<?= $item['pr_no'];?>&amp;id=<?= $item['id'];?>">
                                        <i class="fa fa-share-square"></i>
                                    </a>
                                </button>
                                <?php endif; ?>
                                <?php if($item['status'] == 4):?>
                                    <button id="btn_submit_to_gss" class="btn btn-primary btn-sm btn-view"
                                    title="Submit to GSS" data-id="<?= $item['id'];?>" value="<?= $item['pr_no'];?>">
                                    <i class="fa fa-send"></i>
                                </button>
                                <?php else:?>
                                    <button id="btn_submit_to_gss" disabled="" class="btn btn-primary btn-sm btn-view"
                                    title="Submit to GSS" data-id="<?= $item['id'];?>" value="<?= $item['pr_no'];?>">
                                    <i class="fa fa-send"></i>
                                </button>
                                <?php endif; ?>
                                
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