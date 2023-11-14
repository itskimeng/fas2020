<!-- <div class="col-md-12">
    <div class="callout callout-info callout-dismissable" style="background-color: #3F51B5 !important;">
        <p><i class="fa fa-info-circle"></i>&nbsp; REMINDER</p>
        <ul style="margin-left: -2.5%;">
            <li></i>To avoid losing the item, click the <b>"Save"</b> option first.</li>
            <li></i>Please click the <b>copy purchase request</b> button to duplicate another item.</li>
            <li></i> To finish the purchase request, click <b>"Save and Proceed."</b></li>
        </ul>
    </div>
</div> -->


<!-- Modal -->
<style>
    img {
        width: 100%;
        border-radius: 12px;
        height: 214px;
        object-fit: cover;

    }

    #container {
        max-width: 300px;
        padding: 5px;
        /* Center the container in middle on horizontal axis */
        margin: 0 auto;

        /* Add empty space above the container (20% of the view height) */
    }

    .card {
        /* Change background color */
        background-color: white;

        /* Add border */
        border: 1px solid #bacdd8;

        /* Add space between the border and the content */
        padding: 8px;

        border-radius: 12px;
    }

    .tag {
        padding: 4px 8px;
        border: 1px solid #e5eaed;

        border-radius: 50px;
        font-size: 12px;
        font-weight: 600;
        color: #788697;
    }

    /* Style div elements that have class equal to name */
    .name {
        font-size: 24px;
        font-weight: 600;

        margin-top: 16px;
    }

    /* Style p element */
    p {
        font-size: 14px;
        color: #7f8c9b;
        line-height: 150%;
    }

    /* Style button element */
    button {
        border: none;
        padding: 12px 24px;
        border-radius: 50px;

        font-weight: 600;
        color: #0077ff;
        background-color: #e0efff;

        /* Button is inline-block element by default, it need to have block display for margin: 0 auto; to work */
        margin: 0 auto;
        display: block;

        /* Button is a clickable element, therefore it should have a pointer cursor */
        cursor: pointer;
    }

    .card__details {
        /* Add space around the details */
        padding: 16px 8px 8px 8px;
    }

    button:focus,
    button:hover {
        background-color: #0077ff;
        color: #e0efff;
    }

    .count {
        position: absolute;
        top: 0;
        right: 0;
        z-index: 2;
        font-size: 11px;
        border-radius: 50%;
        background: #E65100;
        width: 25px;
        height: 25px;
        line-height: 25px;
        display: block;
        text-align: center;
        color: white;
        font-family: 'Roboto', sans-serif;
        font-weight: bold;
    }
</style>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">

        <div class="modal-content shadow-lg p-3 mb-5 bg-white rounded" style="border-radius:10px;">

            <div class="modal-body">
                <form id="form_pr_reserve">
                    <center>
                        <h1>Do you wish to continue with </h1>
                    </center>
                    <h1>Purchase Request No: <span class="text-primary"><b><?= $_GET['pr_no']; ?></b></span>?</h1>
                    <center>
                        <button type="button" class="btn btn-lg btn-primary" style="box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);margin:10%;border-radius:50px;" id="btn_proceed"><i class="fa fa-arrow-circle-right"></i> PROCEED TO ENCODING</button>
                    </center>
                    <table class="table table-responsive">
                        <tbody>
                            <tr>
                                <td><b>END-USER:</b></td>
                                <td><?= $_SESSION['complete_name']; ?></td>
                                <td hidden><?= proc_text_input('hidden', '', '', 'cform-user-hidden', false, $_SESSION['currentuser']); ?></td>
                                <td hidden><?= proc_text_input('hidden', '', '', 'cform-pr-no-hidden', false, $_GET['pr_no']); ?></td>
                            </tr>
                            <tr>
                                <td><b>OFFICE :</b></td>
                                <td>REGIONAL OFFICE</td>
                            </tr>
                            <tr>
                                <td><b>Region :</b></td>
                                <td>REGION IV-A - CALABARZON</td>
                            </tr>

                            <tr>

                                <td hidden><?= proc_text_input('hidden', '', '', 'cform-office-hidden', false, $_GET['division']) ?></td>
                            </tr>

                        </tbody>
                    </table>
                </form>
            </div>

        </div>
    </div>
</div>

<form id="form_pr_item">
    <div class="row">
        <div class="col-lg-12">
            <div class="box box-primary dropbox">
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="btn-group">
                                <button class="btn btn-warning"><i class="fa fa-arrow-circle-left"></i> <a class="link" href="procurement_purchase_request.php?division=<?= $_GET['division']; ?>">Back</a></button>

                            </div>
                        </div>
                        <?php if ($_GET['stat'] == 'draft') : ?>
                            <div class="col-md-6">
                                <div class="pull-right">
                                    <div class="btn-group">
                                        &nbsp;&nbsp;<button type="button" class="btn-style btn-1 btn-sep icon-save" id="btn_submit">Save and Proceed</button>
                                    </div>
                                </div>&nbsp;



                                <div class="pull-right">
                                    <div class="btn-group">
                                        &nbsp;&nbsp;<button id="btn-copy" type="button" class="btn-style btn-4 btn-sep icon-copy">Copy Purchase Request</button>
                                    </div>
                                </div>
                            </div>
                        <?php else : ?>

                        <?php endif; ?>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">

            <div class="box box-primary">
                <div class="box-header">
                    <input type="checkbox" class="minimal form-check-input" name="chk-urgent" value="1" />
                    <label STYLE="line-height:35px;">URGENT</label>
                    <div class="ribbon ribbon-top-right"><span>Required</span></div>
                </div>
                <div class="box-body">
                    <div class="form-group"><br><br>
                        <label>Purchase Request Number:</label>

                        <div class="input-group date">
                            <div class="input-group-addon">
                                <i class="fa fa-cog"></i>
                            </div>
                            <input type="text" disabled class="form-control pull-right" id="pr_no" value="<?= $_GET['pr_no']; ?>" name="pr_no">
                        </div>
                    </div>
                    <?= proc_text_input('hidden', '', '', 'cform-id', false, $_GET['id']); ?>

                    <div class="form-group">
                        <label>Office:</label>
                        <div class="input-group date">
                            <div class="input-group-addon"><i class="fa fa-building"></i>
                            </div>
                            <select class="form-control" name="cform-pmo" id="pmo" name="cform-pmo" style="width: 100%;">
                                <?php foreach ($pmo as $key => $pmo_data) : ?>
                                    <?php if ($pmo_data['id'] == $_GET['division']) : ?>
                                        <option value="<?php echo $pmo_data['id']; ?>" data-code="<?php echo $pmo_data['office']; ?>" selected disabled><?php echo $pmo_data['office']; ?></option>
                                    <?php else : ?>
                                        <option value="<?php echo $pmo_data['id']; ?>" data-code="<?php echo $pmo_data['office']; ?>"><?php echo $pmo_data['office']; ?></option>
                                    <?php endif ?>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Type:</label>

                        <div class="input-group date">
                            <div class="input-group-addon"><i class="fa fa-wrench"></i>
                            </div>
                            <select required class="form-control " style="width: 100%;" name="type" id="type">
                                <option value="1">Catering Services</option>
                                <option value="2">Meals, Venue and Accommodation</option>
                                <option value="5">Other Services</option>
                                <option value="3">Repair and Maintenance</option>
                                <option value="6">Reimbursement and Petty Cash</option>
                                <option value="4">Supplies, Materials and Devices</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Purchase Request Date:</label>

                        <div class="input-group date">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control pull-right" id="datepicker1" name="pr_date">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Purchase Request Target Date:</label>

                        <div class="input-group date">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control pull-right" id="datepicker2" name="target_date">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Particulars:</label>

                        <div class="input-group">

                            <textarea style="width: 370px; height: 138px;resize:none;" id="cform-particulars" name="purpose"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                    <?php if ($_GET['stat'] == 'draft') : ?>
                        <?php else:?>
                            <div>
                            <div class="btn-group">
                                <button type="button" style="width:100%;" class="btn-style btn-1 btn-sep icon-save" id="btn_draft"><i class="fa fa-save"></i> Save</button>
                            </div>
                        </div>
                        <?php endif;?>

                        
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-8">
            <div class="box box-primary" style="height: 780px;overflow-y: auto;">
                <div class="box-header">
                    <div id="gtotal">
                        <h3 class="box-title" style="font-weight:bold;font-size: 40px;">GRAND TOTAL: Php <span id="total_abc" style="font-weight:bold;">0.00</span>
                        </h3>
                        <span style="font-size: 50px; float: right; margin-top: -10px;">
                            <i class="fa fa-shopping-cart" class="pull-right"></i>
                            <span class="count">1</span>

                        </span>
                    </div>
                    <?= proc_text_input('text', 'form-control col-lg-12', 'cform-app-code', 'cform-app-code', $required = true, 'Choose item here!', 'data-target="#itemModal"') ?>
                </div>
                <div class="box-body">
                    <?php foreach ($app_item_list as $key => $item) : ?>
                        <div class="col-md-4">
                            <div id="container">
                                <div class="card">
                                    <img src="images/item.jpg" alt="Lago di Braies">
                                    <div class="card__details">
                                        <span class="tag">2.1.2 Supplies/Devices</span>
                                        <span class="tag">Shopping</span>
                                        <div class="name" toolto[]><?= mb_strimwidth($item, 0, 18, "..."); ?></div>
                                        <p>Stock No: S4144</p>
                                        <p>Price: 2,500.00</p>
                                        <p>Unit: piece</p>
                                        <p><input type="number" class="form-control" name="quantity" /></p>
                                        <p><input type="hidden" class="form-control" name="cform-pr-id" value="<?= $_GET['id']; ?>" /></p>
                                        <p><input type="hidden" class="form-control" name="cform-app-items" value='<?= $item['id']; ?>' /></p>
                                        <p><input type="hidden" class="form-control" name="cform-unit-id" value='<?= $item['unit_id']; ?>' /></p>
                                        <p><input type="hidden" class="form-control" name="cform-abc" value='<?= $item['price']; ?>' /></p>
                                        <button type="button" id="btn-add-item">Add to Cart</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>


                    <!-- <table class="table table-bordered" id="monitoring">
                        <thead style="background-color:#1A237E;color:#fff;">
                            <th>STOCK NUMBER</th>
                            <th>UNIT</th>
                            <th>ITEM</th>
                            <th>DESCRIPTION</th>
                            <th>QUANTITY</th>
                            <th>UNIT COST</th>
                            <th>TOTAL COST</th>
                            <th>ACTION</th>
                        </thead>
                        <tbody id="items">

                        </tbody>
                    </table> -->

                </div>
            </div>
        </div>


    </div>
</form>
</div>

<script>
    $(window).on('load', function() {
        if (<?= $_GET['flag']; ?> == 1) {

        } else {
            $('#exampleModal').modal({
                backdrop: 'static',
                keyboard: false
            });
        }
    });
</script>