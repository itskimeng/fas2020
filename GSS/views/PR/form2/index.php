<div class="col-md-12">
            <div class="callout callout-info callout-dismissable">
                <p><i class="fa fa-info-circle"></i>&nbsp; REMINDER</p>
                    <ul style="margin-left: -2.5%;">
                        <li></i>To avoid losing the item, click the <b>"Save as Draft"</b> option first.</li>
                        <li></i>Please click the <b>copy purchase request</b> button to duplicate another item.</li>
                        <li></i> To finish the purchase request, click <b>"Save and Proceed."</b></li>
                    </ul>
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
                                    <div class="col-md-6">
                                        <div class="pull-right">
                                            <div class="btn-group">
                                            &nbsp;&nbsp;<button type="button" class="btn-style btn-1 btn-sep icon-save"  id="btn_submit">Save and Proceed</button>
                                            </div>
                                        </div>&nbsp;
                                        <?php if($_GET['stat'] == 'draft'){?>
                                        <?php }else{  ?>
                                            <div class="pull-right">
                                            <div class="btn-group">
                                            &nbsp;&nbsp;<button type="button" class="btn-style btn-3 btn-sep icon-download" id="btn_draft"></i>Save as Draft</button>
                                            </div>
                                        </div>
                                        <?php } ?>

                                      
                                        <div class="pull-right">
                                            <div class="btn-group">
                                                &nbsp;&nbsp;<button id="btn-copy" type="button" class="btn-style btn-4 btn-sep icon-copy">Copy Purchase Request</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="box box-primary" style="height: 780px;overflow-y: auto;">
                            <div class="box-header">
                                <?= proc_text_input('text', 'form-control col-lg-12', 'cform-app-code', 'cform-app-code', $required = true, 'Choose app item here!', 'data-target="#exampleModal"') ?>
                            </div>
                            <div class="box-body">
                                <table class="table table-bordered" id="monitoring">
                                    <thead class="bg-primary">
                                        <th>STOCK NUMBER</th>
                                        <th>UNIT</th>
                                        <th>ITEM</th>
                                        <th>DESCRIPTION</th>
                                        <th>QUANTITY</th>
                                        <th>PRICE PER ITEM</th>
                                        <th>TOTAL AMOUNT</th>
                                        <th>ACTION</th>
                                    </thead>
                                    <tbody id="items">

                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="box box-primary">
                            <div class="box-header">
                                <h3 class="box-title" style="color: red;font-weight:bold;font-size: 40px;">GRAND TOTAL:</h3>
                            </div>
                            <div class="box-body">
                                <h1 id="total_abc" style="font-weight:bold;"></h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="box box-primary">
                            <div class="box-header">
                                <input type="checkbox" class="minimal form-check-input" name="chk-urgent" value="1" />
                                <label STYLE="line-height:35px;">URGENT</label>
                            </div>
                            <div class="box-body">
                                <div class="form-group">
                                    <label>Purchase Number:</label>

                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" class="form-control pull-right" id="datepicker" value="<?= $_GET['pr_no']; ?>" name="pr_no">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Office:</label>
                                    <div class="input-group date">
                                        <div class="input-group-addon"><i class="fa fa-building"></i>
                                        </div>
                                        <select class="form-control" name="cform-pmo" id="pmo" name="cform-pmo" style="width: 100%;">
                                            <?php foreach ($pmo as $key => $pmo_data) : ?>
                                                <?php if ($pmo_data['id'] == $_GET['division']) : ?>
                                                    <option value="<?php echo $pmo_data['id']; ?>" data-code="<?php echo $pmo_data['office']; ?>" selected><?php echo $pmo_data['office']; ?></option>
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
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>