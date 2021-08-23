<div class="row">
    <div class="col-md-4">
        <div class="box box-primary box-solid dropbox">
            <div class="box-header with-border">
                <h5 class="box-title"><i class="fa fa-book"></i> FOR RECEIVING: Purchase Request</h5>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                </div>
                <!-- /.box-tools -->
            </div>
            <div class="box-body box-emp" style="height: 374px; max-height: 250px; overflow-y: auto;">
                <div class="about-page-content testimonial-page">
                    <div class="faq-content">
                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

                           
                            <?php foreach ($avl_code as $key => $item):?>
                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab">
                                        <h4 class="panel-title">
                                            <a class="collapsed" style="color: black !important;" role="button" data-toggle="collapse" data-parent="#accordion" href="#<?= $item['id'];?>" aria-expanded="false">
                                                <i class="fa fa-folder"></i> <span> PR NO:<?= $item['pr_no'];?></span>
                                            </a>
                                            <span class="label  pull-right <?php echo $item['span-class'];?>"><?= $item['status'];?></span>
                                        </h4>
                                    </div>
                                    <div id="<?= $item['id'];?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_CDP" aria-expanded="false">
                                        <div class="panel-body">
                                            <ul class="fa-ul">
                                                <li style="display: block; margin-left: 3%">
                                                    <a class="program_activity" href="" style="color:black; font-weight:normal;" onhover="changeColor(this)">
                                                        <span class="fa-li"><i class="fa fa-circle text-yellow"></i></span>
                                                        OFFICE: <?= $item['office'];?>
                                                </li>
                                                <li style="display: block; margin-left: 3%">
                                                    <a class="program_activity" href="" style="color:black; font-weight:normal;" onhover="changeColor(this)">
                                                        <span class="fa-li"><i class="fa fa-circle text-yellow"></i></span>
                                                       PURSPOSE:<?= $item['purpose'];?> </a>
                                                </li>
                                                <li style="display: block; margin-left: 3%">
                                                    <a class="program_activity" href="base_planner_subtasks.html.php?event_planner_id=461&amp;username=masacluti&amp;division=10" style="color:black; font-weight:normal;" onhover="changeColor(this)">
                                                        <span class="fa-li"><i class="fa fa-circle text-yellow"></i></span>
                                                       DATE SUBMITTED: <?= $item['submitted_date'];?> </a>
                                                </li>
                                           
                                            </ul>
                                            <?php if($item['status'] == 'CERTIFIED'){?>

                                            <?php }else{ ?>
                                                <button class="btn btn-success btn-md col-lg-12 sweet-7" data-id="<?= $item['id'];?>"> <i class="fa fa-check-circle"> </i> Check Fund Available</button>

                                            <?php }?>
                                        </div>
                                    </div>
                            </div>
                            <?php endforeach;?>
                           

                          

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="col-md-8">
    <div class="box box-primary box-solid dropbox">
                <div class="box-header with-border">
                <h5 class="box-title"><i class="fa fa-search"></i> Advanced Search</h5>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                </div>
                <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="card">
                    <div class="card-header">
                        <div class="card-tools">

                        </div>
                    </div>

                    <form id="form-filter">
                        <div class="card-body card-body-filter collapse show">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Year</label>
                                        <select class="form-control select2 select2-hidden-accessible" id="year" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                            <option value="" selected></option>
                                            <option value="2021">2021</option>
                                            <option value="2020">2020</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-4 ">
                                    <div class="form-group">
                                        <label>Month</label>
                                        <select class="form-control select2 select2-hidden-accessible" id="month" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                            <option selected></option>

                                            <?php
                                            $months = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
                                            $i = 1;

                                            foreach ($months as $month) {

                                                echo "
                                              <option value=\"" . $i . "\">" . $month . "</option>";
                                                $i++;
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">


                                    <div class="form-group">
                                        <label>Payee</label>
                                        <select class="form-control select2 select2-hidden-accessible " id="payee" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                            <option selected></option>

                                            <?php foreach ($filter_ors as $key => $ors) : ?>
                                                <option value="<?php echo $ors['payee']; ?>" data-id="<?php echo $ors['id']; ?>"><?php echo $ors['payee']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>ORS Number</label>
                                        <select class="form-control select2 select2-hidden-accessible ors_select" id="ors_num" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                            <?php foreach ($filter_ors as $key => $ors) : ?>
                                                <option value="<?php echo $ors['ors']; ?>" data-id="<?php echo $ors['id']; ?>"><?php echo $ors['ors']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>ORS Date</label>
                                        <input type="text" class="form-control pull-right" name="target_date" id="datepicker2" value="" required="" placeholder="mm/dd/yyyy" autocomplete="off">
                                    </div>
                                </div>


                                <div class="col-md-4 ">
                                    <div class="form-group">
                                        <label>PO Number</label>
                                        <input type="text" id="ponum" class="form-control pull-right" value="" required="" autocomplete="off">
                                    </div>
                                </div>


                            </div>
                            <div class="row">
                                <div class="col-md-4">


                                    <div class="form-group">
                                        <label>Status</label>
                                        <input type="text" id="status" class="form-control pull-right" value="" required="" autocomplete="off" readonly>
                                    </div>
                                </div>



                            </div>





                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group float-right">
                                        <div class="d-grid gap-2 d-md-block">

                                            <button class="btn btn-primary btn-md pull-right" id="btn-filter" type="button"><i class="fa fa-search"></i> Filter</button>
                                            <button class="btn btn-default btn-md pull-right" id="btn-reset" type="button"><i class="fa fa-sync-alt"></i> Reset</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row float-right">
                                <div class="col-md-12">


                                </div>
                            </div>

                        </div>
                    </form>
                </div>

            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>